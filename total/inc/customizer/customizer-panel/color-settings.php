<?php

$wp_customize->get_section('colors')->title = esc_html__('Color Settings', 'total');
$wp_customize->get_section('colors')->priority = 30;

//COLOR SETTINGS
$wp_customize->add_setting('total_template_color', array(
    'default' => '#FFC107',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'total_template_color', array(
    'section' => 'colors',
    'label' => esc_html__('Theme Primary Color', 'total')
)));

$wp_customize->add_setting('total_color_section_seperator1', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Separator_Control($wp_customize, 'total_color_section_seperator1', array(
    'section' => 'colors'
)));

$wp_customize->add_setting('total_color_content_info', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Text_Info_Control($wp_customize, 'total_color_content_info', array(
    'section' => 'colors',
    'label' => esc_html__('Content Colors', 'total'),
    'description' => esc_html__('This settings apply only in the single posts (ie page and post detail pages only)', 'total')
)));

$wp_customize->add_setting('total_content_header_color', array(
    'default' => '#000000',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'total_content_header_color', array(
    'section' => 'colors',
    'label' => esc_html__('Content Header Color(H1, H2, H3, H4, H5, H6)', 'total')
)));

$wp_customize->add_setting('total_content_text_color', array(
    'default' => '#333333',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'total_content_text_color', array(
    'section' => 'colors',
    'label' => esc_html__('Content Text Color', 'total')
)));

$wp_customize->add_setting('total_content_link_color', array(
    'default' => '#000000',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'total_content_link_color', array(
    'section' => 'colors',
    'label' => esc_html__('Content Link Color', 'total')
)));

$wp_customize->add_setting('total_content_link_hov_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'total_content_link_hov_color', array(
    'section' => 'colors',
    'label' => esc_html__('Content Link Hover Color', 'total'),
)));

$wp_customize->add_setting('total_color_upgrade_text', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Upgrade_Info_Control($wp_customize, 'total_color_upgrade_text', array(
    'section' => 'colors',
    'label' => esc_html__('For more color options,', 'total'),
    'priority' => 100,
    'active_callback' => 'total_is_upgrade_notice_active',
    'upgrade_text' => esc_html__('Upgrade to Pro', 'total'),
    'upgrade_url' => 'https://hashthemes.com/wordpress-theme/total/?utm_source=wordpress&utm_medium=total-link&utm_campaign=total-upgrade'
)));
