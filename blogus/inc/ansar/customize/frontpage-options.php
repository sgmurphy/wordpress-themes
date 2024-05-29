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

 // Main banner Sider Section.
$wp_customize->add_section('frontpage_main_banner_section_settings',
    array(
        'title' => esc_html__('Featured Slider', 'blogus'),
        'priority' => 35,
        'capability' => 'edit_theme_options',
    )
); 

$wp_customize->add_setting(
    'slider_tabs',
    array(
        'default'           => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
); 
$wp_customize->add_control( new Custom_Tab_Control ( $wp_customize,'slider_tabs',
    array(
        'label'                 => '',
        'type' => 'custom-tab-control',
        'section'               => 'frontpage_main_banner_section_settings',
        'controls_general'      => json_encode  ( array( '#customize-control-select_slider_news_category',
                                                        '#customize-control-show_main_news_section', 
                                                    ) 
                                                ),

        'controls_design'       => json_encode  (array( '#customize-control-slider_overlay_enable',
                                                        '#customize-control-blogus_slider_overlay_color', 
                                                        '#customize-control-blogus_slider_overlay_text_color', 
                                                        '#customize-control-blogus_slider_title_font_size', 
                                                        '#customize-control-slider_meta_enable',
                                                    )
                                                ),
    )
));


// Setting - show_main_news_section.
$wp_customize->add_setting('show_main_news_section',
    array(
        'default' => $blogus_default['show_main_news_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'blogus_sanitize_checkbox',
    )
);

$wp_customize->add_control('show_main_news_section',
    array(
        'label' => esc_html__('Enable Slider Banner Section', 'blogus'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'checkbox',
        'priority' => 10,

    )
); 

// Setting - drop down category for slider.
$wp_customize->add_setting('select_slider_news_category',
    array(
        'default' => $blogus_default['select_slider_news_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
); 
$wp_customize->add_control(new Blogus_Dropdown_Taxonomies_Control($wp_customize, 'select_slider_news_category',
    array(
        'label' => esc_html__('Category', 'blogus'),
        'description' => esc_html__('Posts to be shown on banner slider section', 'blogus'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'dropdown-taxonomies',
        'taxonomy' => 'category',
        'priority' => 100,
        'active_callback' => 'blogus_main_banner_section_status',
    )));

        //SLider styling tabs
        $wp_customize->add_setting('slider_overlay_enable',
        array(
            'default' => true,
            'sanitize_callback' => 'blogus_sanitize_checkbox',
        )
        );
        $wp_customize->add_control(new blogus_Toggle_Control( $wp_customize, 'slider_overlay_enable', 
            array(
                'label' => esc_html__('Hide / Show Slider Overlay', 'blogus'),
                'type' => 'toggle',
                'section' => 'frontpage_main_banner_section_settings',
            )
        ));


        //slider Overlay 
       $wp_customize->add_setting(
            'blogus_slider_overlay_color', array( 'sanitize_callback' => 'blogus_sanitize_alpha_color','default' => '#00000099',
            
        ) );
        
        $wp_customize->add_control(new Blogus_Customize_Alpha_Color_Control( $wp_customize,'blogus_slider_overlay_color', array(
           'label'      => __('Overlay Color', 'blogus' ),
            'palette' => true,
            'section' => 'frontpage_main_banner_section_settings')
        ) );

        $wp_customize->add_setting(
        'blogus_slider_overlay_text_color', array( 'sanitize_callback' => 'sanitize_hex_color',
        
    ) );
    
    $wp_customize->add_control( 'blogus_slider_overlay_text_color', array(
       'label'      => __('Overlay Text Color', 'blogus' ),
        'type' => 'color',
        'section' => 'frontpage_main_banner_section_settings')
    );


        $wp_customize->add_setting('blogus_slider_title_font_size',
        array(
            'default'           => 38,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control('blogus_slider_title_font_size',
        array(
            'label'    => esc_html__('Slider title font Size', 'blogus'),
            'section'  => 'frontpage_main_banner_section_settings',
            'type'     => 'number',
        )
    );

    
    $wp_customize->add_setting('slider_meta_enable',
    array(
        'default' => true,
        'sanitize_callback' => 'blogus_sanitize_checkbox',
    )
    );
    $wp_customize->add_control(new blogus_Toggle_Control( $wp_customize, 'slider_meta_enable', 
        array(
            'label' => esc_html__('Hide / Show Meta', 'blogus'),
            'type' => 'toggle',
            'section' => 'frontpage_main_banner_section_settings',
        )
    ));