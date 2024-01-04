<?php

if (!function_exists('total_front_page_loop')) {

    function total_front_page_loop() {
        $total_enable_frontpage = get_theme_mod('total_enable_frontpage', false);

        if ($total_enable_frontpage) {
            $total_home_sections = total_home_section();

            get_template_part('sections/section', 'slider');

            foreach ($total_home_sections as $total_home_section) {
                $total_home_section = str_replace('total_', '', $total_home_section);
                $total_home_section = str_replace('_section', '', $total_home_section);
                get_template_part('sections/section', $total_home_section);
            }
        } else {
            if ('posts' == get_option('show_on_front')) {
                include( get_home_template() );
            } else {
                include( get_page_template() );
            }
        }
    }

}

add_action('total_front_page_template', 'total_front_page_loop');


if (!function_exists('total_home_page_loop')) {

    function total_home_page_loop() {
        $total_home_sections = total_home_section();

        get_template_part('sections/section', 'slider');

        foreach ($total_home_sections as $total_home_section) {
            $total_home_section = str_replace('total_', '', $total_home_section);
            $total_home_section = str_replace('_section', '', $total_home_section);
            get_template_part('sections/section', $total_home_section);
        }
    }

}

add_action('total_home_page_template', 'total_home_page_loop');
