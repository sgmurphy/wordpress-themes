<?php

/**
 * @package Total
 */
function total_dymanic_styles() {

    $dynamic_css = apply_filters('total_dynamic_styles', '__return_true');
    if (!$dynamic_css)
        return '';

    $custom_css = "";

    $color = get_theme_mod('total_template_color', '#FFC107');
    $color_rgba = total_hex2rgba($color, 0.9);

    $sidebar_width = get_theme_mod('total_sidebar_width', 30);

    $website_layout = get_theme_mod('total_website_layout', 'wide');
    $container_width = get_theme_mod('total_wide_container_width', 1170);
    $fluid_container_width = get_theme_mod('total_fluid_container_width', 80);
    $container_padding = get_theme_mod('total_container_padding', 80);

    $content_header_color = get_theme_mod('total_content_header_color', '#000000');
    $content_text_color = get_theme_mod('total_content_text_color', '#333333');
    $content_link_color = get_theme_mod('total_content_link_color', '#000000');
    $content_link_hov_color = get_theme_mod('total_content_link_hov_color');
    $title_color = get_theme_mod('total_title_color', '#333333');
    $tagline_color = get_theme_mod('total_tagline_color', '#333333');
    $logo_width = get_theme_mod('total_logo_width');
    $logo_width_tablet = get_theme_mod('total_logo_width_tablet');
    $logo_width_mobile = get_theme_mod('total_logo_width_mobile');
    $mh_bg_color = get_theme_mod('total_mh_bg_color');
    $mh_spacing_left_desktop = get_theme_mod('total_mh_spacing_left_desktop');
    $mh_spacing_right_desktop = get_theme_mod('total_mh_spacing_right_desktop');
    $mh_spacing_bottom_desktop = get_theme_mod('total_mh_spacing_bottom_desktop');
    $mh_spacing_top_desktop = get_theme_mod('total_mh_spacing_top_desktop');
    $menu_link_color = get_theme_mod('total_pm_menu_link_color');
    $menu_link_hover_color = get_theme_mod('total_pm_menu_link_hover_color');
    $menu_link_hover_bg_color = get_theme_mod('total_pm_menu_hover_bg_color');
    $submenu_bg_color = get_theme_mod('total_pm_submenu_bg_color');
    $submenu_link_color = get_theme_mod('total_pm_submenu_link_color');
    $submenu_link_hover_color = get_theme_mod('total_pm_submenu_link_hover_color');
    $submenu_link_hover_bg_color = get_theme_mod('total_pm_submenu_link_bg_color');
    $footer_bg_url = get_theme_mod('total_footer_bg_url', get_template_directory_uri() . '/images/footer-bg.jpg');
    $footer_bg_size = get_theme_mod('total_footer_bg_size', 'auto');
    $footer_bg_repeat = get_theme_mod('total_footer_bg_repeat', 'repeat');
    $footer_bg_position = str_replace('-', ' ', get_theme_mod('total_footer_bg_position', 'center-center'));
    $footer_bg_attachment = get_theme_mod('total_footer_bg_attachment', 'scroll');
    $footer_bg_color = get_theme_mod('total_footer_bg_color', '#222222');
    $footer_bg_overlay = get_theme_mod('total_footer_bg_overlay');
    $top_footer_title_color = get_theme_mod('total_top_footer_title_color', '#EEEEEE');
    $top_footer_text_color = get_theme_mod('total_top_footer_text_color', '#EEEEEE');
    $top_footer_anchor_color = get_theme_mod('total_top_footer_anchor_color', '#EEEEEE');
    $top_footer_anchor_color_hover = get_theme_mod('total_top_footer_anchor_color_hover');
    $bottom_footer_text_color = get_theme_mod('total_bottom_footer_text_color', '#EEEEEE');
    $bottom_footer_anchor_color = get_theme_mod('total_bottom_footer_anchor_color', '#EEEEEE');
    $bottom_footer_anchor_color_hover = get_theme_mod('total_bottom_footer_anchor_color_hover');
    $bottom_footer_bg_color = get_theme_mod('total_bottom_footer_bg_color');
    $service_left_bg = get_theme_mod('total_service_left_bg');
    $counter_bg = get_theme_mod('total_counter_bg');
    $cta_bg = get_theme_mod('total_cta_bg');

    $custom_css .= ":root {";
    $custom_css .= "--total-template-color: {$color};";
    $custom_css .= "--total-template-transparent-color: {$color_rgba};";
    $custom_css .= "--total-sidebar-width: {$sidebar_width}%;";
    $custom_css .= "--total-container-width: {$container_width}px;";
    $custom_css .= "--total-fluid-container-width: {$fluid_container_width}%;  ";
    $custom_css .= "--total-container-padding: {$container_padding}px;";
    $custom_css .= "--total-content-header-color: {$content_header_color};";
    $custom_css .= "--total-content-text-color : {$content_text_color};";
    $custom_css .= "--total-content-link-color :{$content_link_color};";
    $custom_css .= "--total-content-link-hov-color :{$content_link_hov_color};";
    $custom_css .= "--total-title-color :{$title_color};";
    $custom_css .= "--total-tagline-color : {$tagline_color};";
    if (is_numeric($logo_width)) {
        $custom_css .= "--total-logo-width : {$logo_width}px;";
    }
    if (is_numeric($logo_width_tablet)) {
        $custom_css .= "--total-logo-width-tablet : {$logo_width_tablet}px;";
    }
    if (is_numeric($logo_width_mobile)) {
        $custom_css .= "--total-logo-width-mobile : {$logo_width_mobile}px;";
    }
    if ($mh_bg_color) {
        $custom_css .= "--total-mh-bg-color : {$mh_bg_color};";
    }
    if (is_numeric($mh_spacing_left_desktop)) {
        $custom_css .= "--total-mh-spacing-left-desktop : {$mh_spacing_left_desktop}px;";
    }
    if (is_numeric($mh_spacing_right_desktop)) {
        $custom_css .= "--total-mh-spacing-right-desktop : {$mh_spacing_right_desktop}px;";
    }
    if (is_numeric($mh_spacing_top_desktop)) {
        $custom_css .= "--total-mh-spacing-top-desktop : {$mh_spacing_top_desktop}px;";
    }
    if (is_numeric($mh_spacing_bottom_desktop)) {
        $custom_css .= "--total-mh-spacing-bottom-desktop : {$mh_spacing_bottom_desktop}px;";
    }
    if ($menu_link_color) {
        $custom_css .= "--total-menu-link-color: {$menu_link_color};";
    }
    if ($menu_link_hover_color) {
        $custom_css .= "--total-menu-link-hov-color: {$menu_link_hover_color};";
    }
    if ($menu_link_hover_bg_color) {
        $custom_css .= "--total-menu-link-hover-bg-color: {$menu_link_hover_bg_color};";
    }
    if ($submenu_bg_color) {
        $custom_css .= "--total-submenu-bg-color: {$submenu_bg_color};";
    }
    if ($submenu_link_color) {
        $custom_css .= "--total-submenu-link-color: {$submenu_link_color};";
    }
    if ($submenu_link_hover_color) {
        $custom_css .= "--total-submenu-link-hover-color: {$submenu_link_hover_color};";
    }
    if ($submenu_link_hover_bg_color) {
        $custom_css .= "--total-submenu-link-hover-bg-color: {$submenu_link_hover_bg_color};";
    }

    if ($footer_bg_url) {
        $custom_css .= "--total-footer-bg-url: url({$footer_bg_url});";
        $custom_css .= "--total-footer-bg-size: {$footer_bg_size};";
        $custom_css .= "--total-footer-bg-repeat: {$footer_bg_repeat};";
        $custom_css .= "--total-footer-bg-position: {$footer_bg_position};";
        $custom_css .= "--total-footer-bg-attachment: {$footer_bg_attachment};";
        $custom_css .= "--total-footer-bg-overlay: {$footer_bg_overlay};";
    }

    if ($footer_bg_color) {
        $custom_css .= "--total-footer-bg-color: {$footer_bg_color};";
    }

    if ($top_footer_title_color) {
        $custom_css .= "--total-top-footer-title-color: {$top_footer_title_color};";
    }
    if ($top_footer_text_color) {
        $custom_css .= "--total-top-footer-text-color: {$top_footer_text_color};";
    }
    if ($top_footer_anchor_color) {
        $custom_css .= "--total-footer-anchor-color: {$top_footer_anchor_color};";
    }
    if ($top_footer_anchor_color_hover) {
        $custom_css .= "--total-footer-anchor-color-hover: {$top_footer_anchor_color_hover}; ";
    }
    if ($bottom_footer_text_color) {
        $custom_css .= "--total-bottom-footer-text-color: {$bottom_footer_text_color};";
    }
    if ($bottom_footer_anchor_color) {
        $custom_css .= "--total-bottom-footer-anchor-color: {$bottom_footer_anchor_color};";
    }
    if ($bottom_footer_anchor_color_hover) {
        $custom_css .= "--total-bottom-footer-anchor-color-hover: {$bottom_footer_anchor_color_hover};";
    }
    if ($bottom_footer_bg_color) {
        $custom_css .= "--total-bottom-footer-bg-color: {$bottom_footer_bg_color};";
    }
    if ($service_left_bg) {
        $custom_css .= "--total-service-left-bg: url({$service_left_bg});";
    }
    if ($counter_bg) {
        $custom_css .= "--total-counter-bg: url({$counter_bg});";
    }
    if ($cta_bg) {
        $custom_css .= "--total-cta-bg: url({$cta_bg});";
    }
    $custom_css .= "}";

    $custom_css .= ":root {" . total_typography_vars(array('total_body', 'total_menu', 'total_h')) . "}";

    $enable_header_border = get_theme_mod('total_enable_header_border', true);
    $enable_footer_border = get_theme_mod('total_enable_footer_border', true);

    if ($enable_header_border) {
        $custom_css .= ".ht-header{border-top: 4px solid var(--total-template-color)}";
    }

    if ($enable_footer_border) {
        $custom_css .= "#ht-colophon{border-top: 4px solid var(--total-template-color)}";
    }

    /* =============== Typography CSS =============== */

    if ($website_layout != 'fluid') {
        $custom_css .= "@media screen and (max-width:{$container_width}px){
            .ht-container,
            .elementor-section.elementor-section-boxed.elementor-section-stretched>.elementor-container,
            .elementor-template-full-width .elementor-section.elementor-section-boxed>.elementor-container{
                width: auto !important;
                padding-left: 30px !important;
                padding-right: 30px !important;
            }

            body.ht-boxed #ht-page{
                width: 95% !important;
            }

            .ht-slide-caption{
                width: 80% !important;
            }
        }";
    }

    return total_css_strip_whitespace($custom_css);
}

function total_typography_vars($keys) {
    if (!$keys && !is_array($keys)) {
        return;
    }
    $css = array();

    foreach ($keys as $key) {
        $italic = '';
        $family = get_theme_mod($key . '_family');
        $style = get_theme_mod($key . '_style');
        $text_decoration = get_theme_mod($key . '_text_decoration');
        $text_transform = get_theme_mod($key . '_text_transform');
        $size = get_theme_mod($key . '_size');
        $size_tablet = get_theme_mod($key . '_size_tablet');
        $size_mobile = get_theme_mod($key . '_size_mobile');
        $line_height = get_theme_mod($key . '_line_height');
        $line_height_tablet = get_theme_mod($key . '_line_height_tablet');
        $line_height_mobile = get_theme_mod($key . '_line_height_mobile');
        $letter_spacing = get_theme_mod($key . '_letter_spacing');
        $letter_spacing_tablet = get_theme_mod($key . '_letter_spacing_tablet');
        $letter_spacing_mobile = get_theme_mod($key . '_letter_spacing_mobile');
        $color = get_theme_mod($key . '_color');

        if (strpos($style, 'italic')) {
            $italic = 'italic';
        }

        $weight = absint($style);
        $key = str_replace('_', '-', $key);

        $css[] = (!empty($family) && $family != 'Default') ? "--" . $key . "-family: '{$family}', serif" : NULL;
        $css[] = !empty($weight) ? "--" . $key . "-weight: {$weight}" : NULL;
        $css[] = !empty($italic) ? "--" . $key . "-style: {$italic}" : NULL;
        $css[] = !empty($text_transform) ? "--" . $key . "-text-transform: {$text_transform}" : NULL;
        $css[] = !empty($text_decoration) ? "--" . $key . "-text-decoration: {$text_decoration}" : NULL;
        $css[] = !empty($size) ? "--" . $key . "-size: {$size}px" : NULL;
        $css[] = !empty($size_tablet) ? "--" . $key . "-size-tablet: {$size_tablet}px" : NULL;
        $css[] = !empty($size_mobile) ? "--" . $key . "-size-mobile: {$size_mobile}px" : NULL;
        $css[] = !empty($line_height) ? "--" . $key . "-line-height: {$line_height}" : NULL;
        $css[] = !empty($line_height_tablet) ? "--" . $key . "-line-height-tablet: {$line_height_tablet}" : NULL;
        $css[] = !empty($line_height_mobile) ? "--" . $key . "-line-height-mobile: {$line_height_mobile}" : NULL;
        $css[] = !empty($letter_spacing) ? "--" . $key . "-letter-spacing: {$letter_spacing}px" : NULL;
        $css[] = !empty($letter_spacing_tablet) ? "--" . $key . "-letter-spacing-tablet: {$letter_spacing_tablet}px" : NULL;
        $css[] = !empty($letter_spacing_mobile) ? "--" . $key . "-letter-spacing-mobile: {$letter_spacing_mobile}px" : NULL;
        $css[] = !empty($color) ? "--" . $key . "-color: {$color}" : NULL;
    }

    $css = array_filter($css);

    return implode(';', $css);
}
