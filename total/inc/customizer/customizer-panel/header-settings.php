<?php

/* HEADER PANEL */
$wp_customize->get_setting('blogname')->transport = 'postMessage';
$wp_customize->get_setting('blogdescription')->transport = 'postMessage';
$wp_customize->get_setting('custom_logo')->transport = 'refresh';

$wp_customize->add_panel('total_header_settings_panel', array(
    'title' => esc_html__('Header Settings', 'total'),
    'priority' => 40
));

$wp_customize->get_section('title_tagline')->panel = 'total_header_settings_panel';
$wp_customize->get_section('title_tagline')->title = esc_html__('Title & Logo', 'total');
$wp_customize->remove_control('header_text');

$wp_customize->add_setting('total_titletagline_nav', array(
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Total_Tab_Control($wp_customize, 'total_titletagline_nav', array(
    'section' => 'title_tagline',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'total'),
            'icon' => 'dashicons dashicons-welcome-write-blog',
            'fields' => array(
                'custom_logo',
                'blogname',
                'blogdescription',
                'total_hide_title',
                'total_hide_tagline',
                'total_title_tagline_position',
                'site_icon'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'total'),
            'icon' => 'dashicons dashicons-art',
            'fields' => array(
                'total_logo_width',
                'total_tl_color_heading',
                'total_title_color',
                'total_tagline_color',
            ),
        )
    ),
)));

$wp_customize->add_setting('total_hide_title', array(
    'sanitize_callback' => 'total_sanitize_text',
    'default' => true,
));

$wp_customize->add_control('total_hide_title', array(
    'type' => 'checkbox',
    'section' => 'title_tagline',
    'label' => esc_html__('Hide Site Title', 'total')
));

$wp_customize->add_setting('total_hide_tagline', array(
    'sanitize_callback' => 'total_sanitize_text',
    'default' => true,
));

$wp_customize->add_control('total_hide_tagline', array(
    'type' => 'checkbox',
    'section' => 'title_tagline',
    'label' => esc_html__('Hide Site Tagline', 'total')
));

$wp_customize->add_setting('total_logo_width', array(
    'sanitize_callback' => 'total_sanitize_number_blank',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('total_logo_width_tablet', array(
    'sanitize_callback' => 'total_sanitize_number_blank',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('total_logo_width_mobile', array(
    'sanitize_callback' => 'total_sanitize_number_blank',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Total_Responsive_Range_Slider_Control($wp_customize, 'total_logo_width', array(
    'section' => 'title_tagline',
    'label' => esc_html__('Logo Width(px)', 'total'),
    'input_attrs' => array(
        'min' => 0,
        'max' => 1000,
        'step' => 1,
    ),
    'settings' => array(
        'desktop' => 'total_logo_width',
        'tablet' => 'total_logo_width_tablet',
        'mobile' => 'total_logo_width_mobile',
    ),
)));

$wp_customize->add_setting('total_tl_color_heading', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Heading_Control($wp_customize, 'total_tl_color_heading', array(
    'section' => 'title_tagline',
    'label' => esc_html__('Colors', 'total'),
)));


$wp_customize->add_setting('total_title_color', array(
    'default' => '#000000',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'total_title_color', array(
    'section' => 'title_tagline',
    'label' => esc_html__('Site Title Color', 'total')
)));

$wp_customize->add_setting('total_tagline_color', array(
    'default' => '#000000',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'total_tagline_color', array(
    'section' => 'title_tagline',
    'label' => esc_html__('Site Tagline Color', 'total')
)));

$wp_customize->add_setting('total_title_tagline_upgrade_text', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Upgrade_Info_Control($wp_customize, 'total_title_tagline_upgrade_text', array(
    'section' => 'title_tagline',
    'label' => esc_html__('For more settings,', 'total'),
    'choices' => array(
        esc_html__('Separate typography option for title & tagline', 'total'),
        esc_html__('Set spacing for title & tagline', 'total'),
        esc_html__('Display logo inline with title & tagline', 'total'),
    ),
    'priority' => 100,
    'active_callback' => 'total_is_upgrade_notice_active',
    'upgrade_text' => esc_html__('Upgrade to Pro', 'total'),
    'upgrade_url' => 'https://hashthemes.com/wordpress-theme/total/?utm_source=wordpress&utm_medium=total-link&utm_campaign=total-upgrade'
)));

/** Main Header Options */
$wp_customize->add_section('total_main_header_section', array(
    'title' => esc_html__('Main Header', 'total'),
    'panel' => 'total_header_settings_panel',
    'priority' => 30
));

$wp_customize->add_setting('total_main_header_nav', array(
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Total_Tab_Control($wp_customize, 'total_main_header_nav', array(
    'section' => 'total_main_header_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'total'),
            'icon' => 'dashicons dashicons-welcome-write-blog',
            'fields' => array(
                'total_sticky_header_enable',
                'total_enable_header_border'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'total'),
            'icon' => 'dashicons dashicons-art',
            'fields' => array(
                'total_mh_color_heading',
                'total_mh_bg_color',
                'total_mh_spacing_heading',
                'total_mh_spacing',
            ),
        )
    )
)));

$wp_customize->add_setting('total_sticky_header_enable', array(
    'sanitize_callback' => 'total_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Total_Switch_Control($wp_customize, 'total_sticky_header_enable', array(
    'section' => 'total_main_header_section',
    'label' => esc_html__('Sticky Header', 'total'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'total'),
        'off' => esc_html__('No', 'total')
    ))));

$wp_customize->add_setting('total_enable_header_border', array(
    'sanitize_callback' => 'total_sanitize_text',
    'default' => true
));

$wp_customize->add_control(new Total_Toggle_Control($wp_customize, 'total_enable_header_border', array(
    'section' => 'total_main_header_section',
    'label' => esc_html__('Enable Header Top Border', 'total')
)));

$wp_customize->add_setting('total_mh_color_heading', array(
    'sanitize_callback' => 'total_sanitize_text',
));

$wp_customize->add_control(new Total_Heading_Control($wp_customize, 'total_mh_color_heading', array(
    'section' => 'total_main_header_section',
    'label' => esc_html__('Colors', 'total'),
    'priority' => 5
)));

$wp_customize->add_setting('total_mh_bg_color', array(
    'sanitize_callback' => 'total_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Total_Alpha_Color_Control($wp_customize, 'total_mh_bg_color', array(
    'section' => 'total_main_header_section',
    'label' => esc_html__('Header Background Color', 'total'),
    'priority' => 5
)));

$wp_customize->add_setting('total_mh_spacing_heading', array(
    'sanitize_callback' => 'total_sanitize_text',
));

$wp_customize->add_control(new Total_Heading_Control($wp_customize, 'total_mh_spacing_heading', array(
    'section' => 'total_main_header_section',
    'label' => esc_html__('Spacing', 'total'),
)));

$wp_customize->add_setting('total_mh_spacing_left_desktop', array(
    'sanitize_callback' => 'total_sanitize_number_blank',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('total_mh_spacing_top_desktop', array(
    'sanitize_callback' => 'total_sanitize_number_blank',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('total_mh_spacing_bottom_desktop', array(
    'sanitize_callback' => 'total_sanitize_number_blank',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('total_mh_spacing_right_desktop', array(
    'sanitize_callback' => 'total_sanitize_number_blank',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Total_Dimensions_Control($wp_customize, 'total_mh_spacing', array(
    'section' => 'total_main_header_section',
    'label' => esc_html__('Header Spacing(px)', 'total'),
    'settings' => array(
        'desktop_left' => 'total_mh_spacing_left_desktop',
        'desktop_top' => 'total_mh_spacing_top_desktop',
        'desktop_bottom' => 'total_mh_spacing_bottom_desktop',
        'desktop_right' => 'total_mh_spacing_right_desktop'
    ),
    'input_attrs' => array(
        'min' => 0,
        'max' => 100,
        'step' => 1,
    ),
    'responsive' => false
)));

$wp_customize->add_setting('total_header_upgrade_text', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Upgrade_Info_Control($wp_customize, 'total_header_upgrade_text', array(
    'section' => 'total_main_header_section',
    'label' => esc_html__('For more header layouts and settings,', 'total'),
    'choices' => array(
        esc_html__('6 header styles', 'total'),
        esc_html__('Option to enable/disable top header', 'total'),
        esc_html__('Search and social button option on header', 'total'),
        esc_html__('7 menu hover styles', 'total'),
        esc_html__('Mega menu', 'total'),
        esc_html__('Advanced header color options', 'total'),
        esc_html__('Option for different header banner on each post/page', 'total'),
    ),
    'priority' => 100,
    'active_callback' => 'total_is_upgrade_notice_active',
    'upgrade_text' => esc_html__('Upgrade to Pro', 'total'),
    'upgrade_url' => 'https://hashthemes.com/wordpress-theme/total/?utm_source=wordpress&utm_medium=total-link&utm_campaign=total-upgrade'
)));

/* Primary Menu */
$wp_customize->add_section('total_menu_settings', array(
    'title' => esc_html__('Menu Settings', 'total'),
    'panel' => 'total_header_settings_panel',
));

$wp_customize->add_setting('total_pm_nav', array(
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Total_Tab_Control($wp_customize, 'total_pm_nav', array(
    'section' => 'total_menu_settings',
    'buttons' => array(
        array(
            'name' => esc_html__('Style', 'total'),
            'icon' => 'dashicons dashicons-art',
            'fields' => array(
                'total_pm_color_heading',
                'total_pm_separator1',
                'total_pm_menu_link_color',
                'total_pm_menu_link_hover_color',
                'total_pm_menu_hover_bg_color',
                'total_pm_separator2',
                'total_pm_submenu_bg_color',
                'total_pm_submenu_link_color',
                'total_pm_submenu_link_hover_color',
                'total_pm_submenu_link_bg_color',
                'total_pm_spacing_heading',
                'total_pm_menu_bar_spacing',
                'total_pm_menu_link_spacing',
                'total_pm_submenu_link_spacing',
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Typography', 'total'),
            'icon' => 'dashicons dashicons-edit',
            'fields' => array(
                'total_menu',
            ),
        ),
    )
)));

/* * **************************************************************** */
$wp_customize->add_setting('total_pm_color_heading', array(
    'sanitize_callback' => 'total_sanitize_text',
));

$wp_customize->add_control(new Total_Heading_Control($wp_customize, 'total_pm_color_heading', array(
    'section' => 'total_menu_settings',
    'label' => esc_html__('Colors', 'total'),
)));

/* * **************************************************************** */

$wp_customize->add_setting('total_pm_menu_link_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'total_pm_menu_link_color', array(
    'section' => 'total_menu_settings',
    'label' => esc_html__('Menu Link Color', 'total')
)));

$wp_customize->add_setting('total_pm_menu_link_hover_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'total_pm_menu_link_hover_color', array(
    'section' => 'total_menu_settings',
    'label' => esc_html__('Menu Link Color - Hover', 'total')
)));

$wp_customize->add_setting('total_pm_menu_hover_bg_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'total_pm_menu_hover_bg_color', array(
    'section' => 'total_menu_settings',
    'label' => esc_html__('Menu Link Backgroud Color - Hover', 'total')
)));

$wp_customize->add_setting('total_pm_separator2', array(
    'sanitize_callback' => 'total_sanitize_text',
));

$wp_customize->add_control(new Total_Separator_Control($wp_customize, 'total_pm_separator2', array(
    'section' => 'total_menu_settings',
)));

/* * **************************************************************** */

$wp_customize->add_setting('total_pm_submenu_bg_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'total_pm_submenu_bg_color', array(
    'section' => 'total_menu_settings',
    'label' => esc_html__('SubMenu Background Color', 'total')
)));

$wp_customize->add_setting('total_pm_submenu_link_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'total_pm_submenu_link_color', array(
    'section' => 'total_menu_settings',
    'label' => esc_html__('SubMenu Link Color', 'total')
)));

$wp_customize->add_setting('total_pm_submenu_link_hover_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'total_pm_submenu_link_hover_color', array(
    'section' => 'total_menu_settings',
    'label' => esc_html__('SubMenu Link Color - Hover', 'total')
)));

$wp_customize->add_setting('total_pm_submenu_link_bg_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'total_pm_submenu_link_bg_color', array(
    'section' => 'total_menu_settings',
    'label' => esc_html__('SubMenu Link Backgroud Color - Hover', 'total')
)));

/* * **************************************************************** */
$wp_customize->add_section('total_menu_typography', array(
    'panel' => 'total_typography',
    'title' => esc_html__('Menu', 'total')
));

$wp_customize->add_setting('total_menu_family', array(
    'default' => 'Oswald',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('total_menu_style', array(
    'default' => '400',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('total_menu_text_decoration', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('total_menu_text_transform', array(
    'default' => 'uppercase',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('total_menu_size', array(
    'default' => '14',
    'sanitize_callback' => 'absint',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('total_menu_line_height', array(
    'default' => '2.6',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('total_menu_letter_spacing', array(
    'default' => '0',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Total_Typography_Control($wp_customize, 'total_menu', array(
    'label' => esc_html__('Menu Typography', 'total'),
    'section' => 'total_menu_settings',
    'settings' => array(
        'family' => 'total_menu_family',
        'style' => 'total_menu_style',
        'text_decoration' => 'total_menu_text_decoration',
        'text_transform' => 'total_menu_text_transform',
        'size' => 'total_menu_size',
        'line_height' => 'total_menu_line_height',
        'letter_spacing' => 'total_menu_letter_spacing',
    ),
    'input_attrs' => array(
        'min' => 10,
        'max' => 40,
        'step' => 1
    )
)));

$wp_customize->add_setting('total_menu_upgrade_text', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Upgrade_Info_Control($wp_customize, 'total_menu_upgrade_text', array(
    'section' => 'total_menu_settings',
    'label' => esc_html__('For more settings,', 'total'),
    'choices' => array(
        esc_html__('Option to display search button, social icons & CTA button', 'total'),
        esc_html__('7 different menu styles', 'total'),
        esc_html__('Option to diplay different menu in mobile', 'total'),
        esc_html__('Set spacing of menu and submenu', 'total'),
        esc_html__('Set mobile menu breakpoint', 'total'),
        esc_html__('Inbuilt MegaMenu', 'total'),
    ),
    'priority' => 100,
    'active_callback' => 'total_is_upgrade_notice_active',
    'upgrade_text' => esc_html__('Upgrade to Pro', 'total'),
    'upgrade_url' => 'https://hashthemes.com/wordpress-theme/total/?utm_source=wordpress&utm_medium=total-link&utm_campaign=total-upgrade'
)));

$wp_customize->selective_refresh->add_partial(
    'blogname', array(
        'selector' => '.site-title a',
        'render_callback' => 'total_customize_partial_blogname',
    )
);
$wp_customize->selective_refresh->add_partial(
    'blogdescription', array(
        'selector' => '.site-description',
        'render_callback' => 'total_customize_partial_blogdescription',
    )
);
