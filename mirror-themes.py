#! /usr/bin/env python3

import requests
import os
import zipfile
from backoff import on_exception, expo
from ratelimit import RateLimitException
from concurrent.futures import ThreadPoolExecutor

@on_exception(expo, RateLimitException, max_tries=8)
def get_plugins(page=1, active_installs_threshold=50000):
    plugins = []

    print(f'Fetching plugins info page {page}...')
    response = requests.get('https://api.wordpress.org/plugins/info/1.2/', params={'action': 'query_plugins', 'per_page': 250, 'page': page})

    if (response.status_code == 429):
        raise RateLimitException(response.content, 0)
    elif (response.status_code != 200):
        print(response.content)
        return

    data = response.json()

    for plugin in data['plugins']:
        if plugin['active_installs'] < active_installs_threshold:
            return plugins

        plugins.append({
            'slug': plugin['slug'],
            'version': plugin['version'],
            'active_installs': plugin['active_installs'],
            'download_link': plugin['download_link']
        })

    return plugins + get_plugins(page + 1, active_installs_threshold) if page < data['info']['pages'] else plugins

@on_exception(expo, RateLimitException, max_tries=8)
def get_themes(page=1, active_installs_threshold=50000):
    themes = []

    print(f'Fetching themes info page {page}...')
    response = requests.get('https://api.wordpress.org/themes/info/1.2/', params={'action': 'query_themes', 'request[browse]': 'popular', 'request[fields][active_installs]': 1, 'request[fields][downloadlink]': 1, 'request[per_page]': 1000, 'request[page]': page})

    if (response.status_code == 429):
        raise RateLimitException(response.content, 0)
    elif (response.status_code != 200):
        print(response.content)
        return

    data = response.json()

    for theme in data['themes']:
        if theme['active_installs'] < active_installs_threshold:
            return themes

        themes.append({
            'slug': theme['slug'],
            'version': theme['version'],
            'active_installs': theme['active_installs'],
            'download_link': theme['download_link']
        })

    return themes + get_themes(page + 1, active_installs_threshold) if page < data['info']['pages'] else themes

def download_file(url, filepath):
    print(f'Downloading {url}...')
    response = requests.get(url, allow_redirects=True)
    if response.status_code == 200:
        with open(filepath, 'wb') as f:
            f.write(response.content)

        try:
            with zipfile.ZipFile(filepath, 'r') as zip:
                zip.extractall()
                os.remove(filepath)
        except:
            print(f'Could not extract zip {filepath}')

if __name__ == '__main__':
    themes = get_themes(active_installs_threshold=50000)

    with ThreadPoolExecutor(max_workers=20) as executor:
        running_tasks = [executor.submit(download_file(theme['download_link'], f'{theme["slug"]}.{theme["version"]}.zip')) for theme in themes]
