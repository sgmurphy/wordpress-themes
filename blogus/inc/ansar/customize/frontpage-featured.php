<?php

/**
 * Option Panel
 *
 * @package Blogus
 */

$blogus_default = blogus_get_default_theme_options();

/**
 * Frontpage options section
 *
 * @package blogus
 */


    //Editor Choice
    $wp_customize->add_section('blogus_featured_links_section',
        array(
            'title' => esc_html__('Featured Links', 'blogus'),
            'priority' => 36,
            'capability' => 'edit_theme_options',
        )
    );

    $wp_customize->add_setting('show_featured_links_section',
    array(
        'default' => false,
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'blogus_sanitize_checkbox',
    )
    );

    $wp_customize->add_control(new Blogus_Toggle_Control( $wp_customize, 'show_featured_links_section', 
        array(
            'label' => __('Hide/Show Featured Links', 'blogus'),
            'type' => 'toggle',
            'section' => 'blogus_featured_links_section',
            'priority' => 100,
        )
    ));

    //Featured Post One
    $wp_customize->add_setting('featured_post_one',
        array(
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        new blogus_Section_Title(
            $wp_customize,
            'featured_post_one',
            array(
                'label'             => esc_html__( 'Featured Post', 'blogus' ),
                'section'           => 'blogus_featured_links_section',
                'priority'          => 100,
                'active_callback' => 'blogus_featued_links_section_status'
            )
        )
    );

    $wp_customize->add_setting('fatured_post_image_one',
    array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control($wp_customize, 'fatured_post_image_one',
            array(
                'label' => esc_html__('Image', 'blogus'),
                'section' => 'blogus_featured_links_section',
                'priority'          => 110,
                'active_callback' => 'blogus_featued_links_section_status'
            )
        )
    ); 

    $wp_customize->add_setting('featured_post_one_btn_txt',
        array(
            'default' => $blogus_default['featured_post_one_btn_txt'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control('featured_post_one_btn_txt',
        array(
            'label' => esc_html__('Button Text', 'blogus'),
            'section' => 'blogus_featured_links_section',
            'type' => 'url',
            'priority' => 120,
            'active_callback' => 'blogus_featued_links_section_status'
        )
    ); 

    $wp_customize->add_setting('featured_post_one_url',
        array(
            'default' => $blogus_default['featured_post_one_url'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control('featured_post_one_url',
        array(
            'label' => esc_html__('Button Link', 'blogus'),
            'section' => 'blogus_featured_links_section',
            'type' => 'url',
            'priority' => 130,
            'active_callback' => 'blogus_featued_links_section_status'
        )
    );

    $wp_customize->add_setting('featured_post_one_url_new_tab',
        array(
            'default' => true,
            'sanitize_callback' => 'blogus_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(new Blogus_Toggle_Control( $wp_customize, 'featured_post_one_url_new_tab', 
        array(
            'label' => esc_html__('Open link in new tab', 'blogus'),
            'type' => 'toggle',
            'section' => 'blogus_featured_links_section',
            'priority' => 140,
            'active_callback' => 'blogus_featued_links_section_status'
        )
    )); 

    //Featured Post Two
    $wp_customize->add_setting('featured_post_two',
        array(
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        new blogus_Section_Title(
            $wp_customize,
            'featured_post_two',
            array(
                'label'             => esc_html__( 'Featured Post', 'blogus' ),
                'section'           => 'blogus_featured_links_section',
                'priority'          => 150,
                'active_callback' => 'blogus_featued_links_section_status'
            )
        )
    );


    $wp_customize->add_setting('fatured_post_image_two',
        array(
            'default' => $blogus_default['fatured_post_image_two'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control($wp_customize, 'fatured_post_image_two',
            array(
                'label' => esc_html__('Image', 'blogus'),
                'section' => 'blogus_featured_links_section',
                'flex_width' => true,
                'flex_height' => true,
                'priority'          => 160,
                'active_callback' => 'blogus_featued_links_section_status'
            )
        )
    );


    $wp_customize->add_setting('featured_post_two_btn_txt',
        array(
            'default' => $blogus_default['featured_post_two_btn_txt'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control('featured_post_two_btn_txt',
        array(
            'label' => esc_html__('Button Text', 'blogus'),
            'section' => 'blogus_featured_links_section',
            'type' => 'url',
            'priority' => 170,
            'active_callback' => 'blogus_featued_links_section_status'
        )
    );


    $wp_customize->add_setting('featured_post_two_url',
        array(
            'default' => $blogus_default['featured_post_two_url'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control('featured_post_two_url',
        array(
            'label' => esc_html__('Button Link', 'blogus'),
            'section' => 'blogus_featured_links_section',
            'type' => 'url',
            'priority' => 180,
            'active_callback' => 'blogus_featued_links_section_status'
        )
    );

    $wp_customize->add_setting('featured_post_two_url_new_tab',
        array(
            'default' => true,
            'sanitize_callback' => 'blogus_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(new Blogus_Toggle_Control( $wp_customize, 'featured_post_two_url_new_tab', 
        array(
            'label' => esc_html__('Open link in new tab', 'blogus'),
            'type' => 'toggle',
            'section' => 'blogus_featured_links_section',
            'priority' => 190,
            'active_callback' => 'blogus_featued_links_section_status'
        )
    )); 

    //Featured Post Three
    $wp_customize->add_setting('featured_post_three',
        array(
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        new blogus_Section_Title(
            $wp_customize,
            'featured_post_three',
            array(
                'label'             => esc_html__( 'Featured Post', 'blogus' ),
                'section'           => 'blogus_featured_links_section',
                'priority'          => 200,
                'active_callback' => 'blogus_featued_links_section_status'
            )
        )
    );


    $wp_customize->add_setting('fatured_post_image_three',
        array(
            'default' => $blogus_default['fatured_post_image_three'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control($wp_customize, 'fatured_post_image_three',
            array(
                'label' => esc_html__('Image', 'blogus'),
                'section' => 'blogus_featured_links_section',
                'flex_width' => true,
                'flex_height' => true,
                'priority'          => 210,
                'active_callback' => 'blogus_featued_links_section_status'
            )
        )
    );


    $wp_customize->add_setting('featured_post_three_btn_txt',
        array(
            'default' => $blogus_default['featured_post_three_btn_txt'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control('featured_post_three_btn_txt',
        array(
            'label' => esc_html__('Button Text', 'blogus'),
            'section' => 'blogus_featured_links_section',
            'type' => 'url',
            'priority' => 220,
                'active_callback' => 'blogus_featued_links_section_status'
        )
    );


    $wp_customize->add_setting('featured_post_three_url',
        array(
            'default' => $blogus_default['featured_post_three_url'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control('featured_post_three_url',
        array(
            'label' => esc_html__('Button Link', 'blogus'),
            'section' => 'blogus_featured_links_section',
            'type' => 'url',
            'priority' => 230,
            'active_callback' => 'blogus_featued_links_section_status'
        )
    );

    $wp_customize->add_setting('featured_post_three_url_new_tab',
        array(
            'default' => true,
            'sanitize_callback' => 'blogus_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(new Blogus_Toggle_Control( $wp_customize, 'featured_post_three_url_new_tab', 
        array(
            'label' => esc_html__('Open link in new tab', 'blogus'),
            'type' => 'toggle',
            'section' => 'blogus_featured_links_section',
            'priority' => 240,
            'active_callback' => 'blogus_featued_links_section_status'
        )
    )); 