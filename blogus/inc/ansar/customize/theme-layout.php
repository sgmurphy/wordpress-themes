<?php /*** Option Panel
 *
 * @package Blogus
 */
$blogus_default = blogus_get_default_theme_options();
/*theme option panel info*/
require get_template_directory() . '/inc/ansar/customize/frontpage-options.php';

// Add Theme Options Panel.
$wp_customize->add_panel('themes_layout',
    array(
        'title' => esc_html__('General Layout', 'blogus'),
        'priority' => 31,
        'capability' => 'edit_theme_options',
    )
);

//Sidebar Layout
$wp_customize->add_section( 'blogus_theme_sidebar_setting' , array(
    'title' => __('Sidebar Width', 'blogus'),
    'priority' => 15,
    'panel' => 'themes_layout',
) );


$wp_customize->add_setting('blogus_theme_sidebar_width',
    array(
        'default'           => 280,
        'capability'        => 'edit_theme_options',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('blogus_theme_sidebar_width',
    array(
        'label'    => esc_html__('Sidebar Width', 'blogus'),
        'section'  => 'blogus_theme_sidebar_setting',
        'type'     => 'number',
        'priority' => 50,
    )
);
   
$wp_customize->add_section('blog_layout_section',
    array(
        'title' => esc_html__('Blog Layout', 'blogus'),
        'priority' => 30,
        'capability' => 'edit_theme_options',
        'panel' => 'themes_layout',
    )
);
$wp_customize->add_setting(
    'blog_layout_title',
    array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'blogus_sanitize_text',
    )
);
$wp_customize->add_control(
'blog_layout_title',
    array(
        'type' => 'hidden',
        'label' => __('Blog Layout','blogus'),
        'section' => 'blog_layout_section',

    )
);

$wp_customize->add_setting(
    'blogus_content_layout', array(
    'default'           => 'align-content-right',
    'sanitize_callback' => 'blogus_sanitize_radio',
    'transport'  => 'postMessage',
) );
$wp_customize->add_control(
    new blogus_Radio_Image_Control( 
        // $wp_customize object
        $wp_customize,
        // $id
        'blogus_content_layout',
        // $args
        array(
            'settings'      => 'blogus_content_layout',
            'section'       => 'blog_layout_section',
            'choices'       => array(
                'align-content-left' => get_template_directory_uri() . '/images/fullwidth-left-sidebar.png',  
                'full-width-content'    => get_template_directory_uri() . '/images/fullwidth.png',
                'align-content-right'    => get_template_directory_uri() . '/images/right-sidebar.png',
                'grid-left-sidebar' => get_template_directory_uri() . '/images/grid-left-sidebar.png',
                'grid-fullwidth' => get_template_directory_uri() . '/images/grid-fullwidth.png',
                'grid-right-sidebar' => get_template_directory_uri() . '/images/grid-right-sidebar.png',
            )
        )
    )
);

// Layout Section.
$wp_customize->add_section('site_layout_settings',
    array(
        'title' => esc_html__('Single Layout', 'blogus'),
        'priority' => 35,
        'capability' => 'edit_theme_options',
        'panel' => 'themes_layout',
    )
);

$wp_customize->add_setting(
    'blogus_pro_single_page_heading',
    array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'blogus_sanitize_text',
        'priority' => 1,
    )
);
$wp_customize->add_control(
'blogus_pro_single_page_heading',
    array(
        'type' => 'hidden',
        'label' => __('Single Blog Pages','blogus'),
        'section' => 'site_layout_settings',
    )
);

$wp_customize->add_setting(
    'blogus_single_page_layout', array(
    'default'           => 'single-align-content-right',
    'sanitize_callback' => 'blogus_sanitize_radio',
    'transport'  => 'postMessage',
) );
$wp_customize->add_control(
    new blogus_Radio_Image_Control( 
        // $wp_customize object
        $wp_customize,
        // $id
        'blogus_single_page_layout',
        // $args
        array(
            'settings'      => 'blogus_single_page_layout',
            'section'       => 'site_layout_settings',
            'choices'       => array(
                'single-align-content-left' => get_template_directory_uri() . '/images/fullwidth-left-sidebar.png',
                'single-full-width-content'    => get_template_directory_uri() . '/images/fullwidth.png',
                'single-align-content-right'    => get_template_directory_uri() . '/images/right-sidebar.png',
            )
        )
    )
);

// Page Layout Section.
$wp_customize->add_section('page_layout_settings',
    array(
        'title' => esc_html__('Page', 'blogus'),
        'priority' => 40,
        'capability' => 'edit_theme_options',
        'panel' => 'themes_layout',
    )
);

$wp_customize->add_setting(
    'blogus_page_layout_heading',
    array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'blogus_sanitize_text',
        'priority' => 1,
    )
);
$wp_customize->add_control(
'blogus_page_layout_heading',
    array(
        'type' => 'hidden',
        'label' => __('Page','blogus'),
        'section' => 'page_layout_settings',
    )
);
    
$wp_customize->add_setting(
    'blogus_page_layout', array(
    'default'           => 'page-align-content-right',
    'sanitize_callback' => 'blogus_sanitize_radio',
    'transport'  => 'postMessage',
) );
$wp_customize->add_control(
    new blogus_Radio_Image_Control( 
        // $wp_customize object
        $wp_customize,
        // $id
        'blogus_page_layout',
        // $args
        array(
            'settings'      => 'blogus_page_layout',
            'section'       => 'page_layout_settings',
            'choices'       => array(
                'page-align-content-right'    => get_template_directory_uri() . '/images/right-sidebar.png',
                'page-align-content-left' => get_template_directory_uri() . '/images/fullwidth-left-sidebar.png',
                'page-full-width-content'    => get_template_directory_uri() . '/images/fullwidth.png',
            )
        )
    )
);