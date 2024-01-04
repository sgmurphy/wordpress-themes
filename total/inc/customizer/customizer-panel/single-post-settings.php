<?php

/* SINGLE POST SECTION */
$wp_customize->add_section('total_blog_options_section', array(
    'title' => esc_html__('Single Post Settings', 'total'),
    'priority' => 45
));

$wp_customize->add_setting('total_single_display_featured_image', array(
    'sanitize_callback' => 'total_sanitize_checkbox',
    'default' => false
));

$wp_customize->add_control(new Total_Toggle_Control($wp_customize, 'total_single_display_featured_image', array(
    'section' => 'total_blog_options_section',
    'label' => esc_html__('Display Featured Image', 'total'),
)));

$wp_customize->add_setting('total_single_post_settings_upgrade_text', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Upgrade_Info_Control($wp_customize, 'total_single_post_settings_upgrade_text', array(
    'section' => 'total_blog_options_section',
    'label' => esc_html__('For more settings,', 'total'),
    'choices' => array(
        esc_html__('SINGLE POST  -', 'total'),
        esc_html__('Choose featured image size', 'total'),
        esc_html__('Display social share button', 'total'),
        esc_html__('Display Author Box & Related Post', 'total'),
        esc_html__('Show/Hide & Reorder all the elements with drag and drop', 'total'),
        esc_html__('----------------', 'total'),
        esc_html__('BLOG/ARCHIVE PAGE  -', 'total'),
        esc_html__('4 differently designed blog page', 'total'),
        esc_html__('Option to display Full Content, Custom Excerpt or WordPress Excerpt', 'total'),
        esc_html__('Show/Hide Posted Date, Author, Comment, Category & Tag', 'total'),
    ),
    'active_callback' => 'total_is_upgrade_notice_active',
    'upgrade_text' => esc_html__('Upgrade to Pro', 'total'),
    'upgrade_url' => 'https://hashthemes.com/wordpress-theme/total/?utm_source=wordpress&utm_medium=total-link&utm_campaign=total-upgrade'
)));
