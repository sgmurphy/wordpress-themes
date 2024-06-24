<?php
/**
 * Blogus Theme Customizer
 *
 * @package Blogus
 */

if (!function_exists('blogus_get_option')):
/**
 * Get theme option.
 *
 * @since 1.0.0
 *
 * @param string $key Option key.
 * @return mixed Option value.
 */
function blogus_get_option($key) {

	if (empty($key)) {
		return;
	}

	$value = '';

	$default       = blogus_get_default_theme_options();
	$default_value = null;

	if (is_array($default) && isset($default[$key])) {
		$default_value = $default[$key];
	}

	if (null !== $default_value) {
		$value = get_theme_mod($key, $default_value);
	} else {
		$value = get_theme_mod($key);
	}

	return $value;
}
endif;

// Load customize default values.
require get_template_directory().'/inc/ansar/customize/customizer-callback.php';

// Load customize default values.
require get_template_directory().'/inc/ansar/customize/customizer-default.php';


$repeater_path = trailingslashit( get_template_directory() ) . '/inc/ansar/customizer-repeater/functions.php';
if ( file_exists( $repeater_path ) ) {
require_once( $repeater_path );
}

function banner_slider_option($control) {

        $banner_slider_option = $control->manager->get_setting('banner_options_main')->value();

        if($banner_slider_option == 'banner_slider_section_option'){
            return true;
        } else{
           return false;
        }
    }

    function banner_slider_category_function($control){
  $no_option = $control->manager->get_setting('banner_options_main')->value();
  $banner_slider_category_option = $control->manager->get_setting('banner_slider_section_option')->value();
        if ($banner_slider_category_option == 'banner_slider_category_option' && $no_option == 'banner_slider_section_option') {
            return true;
        }else{ return false;}
    }

    function header_video_act_call($control){
        $video_banner_section = $control->manager->get_setting('banner_options_main')->value();
    
        if($video_banner_section == 'header_video'){
            return true;
        }else{
            return false;
        }
        }


function slider_callback($control){
  $banner_slider_option = $control->manager->get_setting('banner_options_main')->value();
  $banner_slider_section_option = $control->manager->get_setting('banner_slider_section_option')->value();
if ($banner_slider_option == 'banner_slider_section_option' && $banner_slider_section_option == 'latest_post_show') {
            return true;
        }else{
            return false;
        }
    }


    function overlay_text($control){

    $banner_slider_option = $control->manager->get_setting('banner_options_main')->value();

    if($banner_slider_option == 'header_video' || $banner_slider_option == 'video_banner_section'){
        return true;
    }else{
       return false;
    }

}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function blogus_customize_register($wp_customize) {

	// Load customize controls.
	require get_template_directory().'/inc/ansar/customize/customizer-control.php';

    // Load customize sanitize.
	require get_template_directory().'/inc/ansar/customize/customizer-sanitize.php';

    $wp_customize->get_setting( 'custom_logo')->sanitize_callback  	= 'esc_url_raw';
    $wp_customize->get_setting( 'custom_logo')->transport  			= 'postMessage';
	$wp_customize->get_setting('blogname')->transport         = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    // use get control
    $wp_customize->get_control( 'header_textcolor')->label = __( 'Site Info Color', 'blogus' );
    $wp_customize->get_control( 'header_textcolor')->section = 'colors';   
    $wp_customize->get_control( 'header_textcolor')->priority = 1;   
    $wp_customize->get_control( 'header_textcolor')->default = '#000';
    $wp_customize->get_setting('background_color')->transport = 'refresh';

	if (isset($wp_customize->selective_refresh)) {

		// site logo
		$wp_customize->selective_refresh->add_partial('custom_logo', array(
			'selector'        => '.site-logo', 
			'render_callback' => 'custom_logo_selective_refresh'
		));
		
		// site title
        $wp_customize->selective_refresh->add_partial('blogname', array(
            'selector'        => '.site-title a, .site-title-footer a',
            'render_callback' => 'blogus_customize_partial_blogname',
        ));

		// site tagline
        $wp_customize->selective_refresh->add_partial('blogdescription', array(
            'selector'        => '.site-description , .site-description-footer',
            'render_callback' => 'blogus_customize_partial_blogdescription',
        ));

        $wp_customize->selective_refresh->add_partial('blogus_header_social_icons', array(
            'selector'        => '.bs-header-main .left-nav',
            'render_callback' => 'blogus_customize_partial_header_social_icons',
        ));

        $wp_customize->selective_refresh->add_partial('blogus_footer_social_icons', array(
            'selector'        => 'footer .bs-social ',
        ));


        $wp_customize->selective_refresh->add_partial('blogus_scrollup_enable', array(
            'selector'        => '.bs_upscr',
        ));

        $wp_customize->selective_refresh->add_partial('you_missed_title', array(
            'selector'        => '.missed .bs-widget-title .title',
            'render_callback' => 'blogus_customize_you_missed_title',
        ));

        $wp_customize->selective_refresh->add_partial('blogus_related_post_title', array(
            'selector'        => '.bs-card-box .relat-cls .title',
            'render_callback' => 'blogus_customize_blogus_related_post_title',
        ));

        $wp_customize->selective_refresh->add_partial('blogus_menu_search', array(
            'selector'        => '.bs-default .desk-header .msearch',
            'render_callback' => 'blogus_customize_partial_blogus_menu_search',
        ));

        $wp_customize->selective_refresh->add_partial('blogus_lite_dark_switcher', array(
            'selector'        => '.switch .slider',
        ));

        $wp_customize->selective_refresh->add_partial('blogus_footer_copyright', array(
            'selector'        => '.bs-footer-copyright .sep', 
        ));

        $wp_customize->selective_refresh->add_partial('header_social_icon_enable', array(
            'selector'        => '.bs-header-main .left-nav',
            'render_callback' => 'blogus_customize_partial_header_social_icons',
        ));

        $wp_customize->selective_refresh->add_partial('blogus_drop_caps_enable', array(
            'selector'        => '.content-right .bs-blog-post .bs-blog-meta, .content-full .bs-blog-post .bs-blog-meta', 
        ));

        $wp_customize->selective_refresh->add_partial('breadcrumb_settings', array(
            'selector'        => '.bs-breadcrumb-section ol.breadcrumb', 
        ));
        
        $wp_customize->selective_refresh->add_partial('blogus_content_layout', array(
            'selector'        => '.index-class .container > .row, .archive-class > .container > .row', 
			'render_callback' => 'blogus_customize_partial_content_layout',
        ));
		$wp_customize->selective_refresh->add_partial('blogus_page_layout', array(
			'selector'        => '.page-class > .container > .row',
			'render_callback' => 'blogus_customize_partial_page_layout',
		));
		$wp_customize->selective_refresh->add_partial('blogus_single_page_layout', array(
			'selector'        => '.single-class > .container > .row',
			'render_callback' => 'blogus_customize_partial_single_layout',
		));
	}

    $default = blogus_get_default_theme_options();

	/*Theme option panel info*/

    require get_template_directory().'/inc/ansar/customize/header-options.php';

	require get_template_directory().'/inc/ansar/customize/theme-options.php';

	/*theme general layout panel*/
	require get_template_directory().'/inc/ansar/customize/theme-layout.php';

	/*theme Frontpage panel*/
	require get_template_directory().'/inc/ansar/customize/frontpage-featured.php';

}
add_action('customize_register', 'blogus_customize_register');

function custom_logo_selective_refresh() {
    if( get_theme_mod( 'custom_logo' ) === "" ) return;
    echo '<div class="site-logo">'.the_custom_logo().'</div>';
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function blogus_customize_partial_blogname() {
	bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function blogus_customize_partial_blogdescription() {
	bloginfo('description');
}

function blogus_customize_partial_header_data_enable() {
    return get_theme_mod( 'header_data_enable' );
}

function blogus_customize_partial_footer_social_icon_enable() {
    return get_theme_mod( 'blogus_footer_social_icons' ); 
}

function blogus_customize_partial_sidebar_menu() {
    return get_theme_mod( 'sidebar_menu' ); 
}

function blogus_customize_partial_blogus_menu_subscriber() {
    return get_theme_mod( 'blogus_menu_subscriber' ); 
}

function blogus_customize_you_missed_title() {
    return get_theme_mod( 'you_missed_title' ); 
}

function blogus_customize_blogus_related_post_title() {
    return get_theme_mod( 'blogus_related_post_title' ); 
}

function blogus_customize_partial_content_layout() {
	return do_action('blogus_action_main_content_layouts');
}

function blogus_customize_partial_header_social_icons() {
	return do_action('blogus_action_header_social_section');
}

function blogus_customize_partial_page_layout() {
	return get_template_part('template-parts/content', 'page');
}

function blogus_customize_partial_single_layout() {
	return get_template_part('template-parts/content', 'single');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function blogus_customize_preview_js() {
	wp_enqueue_script('blogus-customizer', get_template_directory_uri().'/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'blogus_customize_preview_js');


/************************* Related Post Callback function *********************************/

    function blogus_rt_post_callback ( $control ) 
    {
        if( true == $control->manager->get_setting ('blogus_enable_related_post')->value()){
            return true;
        }
        else {
            return false;
        }       
    }

/************************* Theme Customizer with Sanitize function *********************************/
function blogus_theme_option( $wp_customize )
{
    function blogus_sanitize_text( $input ) {
        return wp_kses_post( force_balance_tags( $input ) );
    }

            /*--- Site title Font size **/
    $wp_customize->add_setting('blogus_title_font_size',
        array(
            'default'           => 60,
            'capability'        => 'edit_theme_options',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control('blogus_title_font_size',
        array(
            'label'    => esc_html__('Site Title Size', 'blogus'),
            'section'  => 'title_tagline',
            'type'     => 'number',
            'priority' => 50,
        )
    );

    $wp_customize->add_setting('header_textcolor_dark_layout',
    array(
        'default' => '#fff',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control('header_textcolor_dark_layout',
    array(
        'label' => esc_html__('Site Title/Tagline Color (Dark Mode)', 'blogus'),
        'section' => 'colors',
        'type' => 'color',
        'priority' => 2,
    ));

    $wp_customize->add_setting('blogus_skin_mode_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
    );

    $wp_customize->add_control(
        new Blogus_Section_Title(
            $wp_customize,
            'blogus_skin_mode_title',
            array(
                'label' => esc_html__('Theme layout', 'blogus'),
                'section' => 'colors',
                'priority' => 10,

            )
        )
    );

    

    $wp_customize->add_setting(
        'blogus_skin_mode', array(
        'default'           => 'defaultcolor',
        'sanitize_callback' => 'blogus_sanitize_radio'
    ) );
    
    
    $wp_customize->add_control(
        new Blogus_Radio_Image_Control( 
            // $wp_customize object
            $wp_customize,
            // $id
            'blogus_skin_mode',
            // $args
            array(
                'settings'      => 'blogus_skin_mode',
                'section'       => 'colors',
                'priority' => 20,
                'choices'       => array(
                    'defaultcolor'    => get_template_directory_uri() . '/images/color/white.png',
                    'dark' => get_template_directory_uri() . '/images/color/black.png',
                )
            )
        )
    );

    $wp_customize->add_setting('blogus_primary_menu_color',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Blogus_Section_Title(
        $wp_customize,
        'blogus_primary_menu_color',
        array(
            'label' => esc_html__('Primary Menu Color', 'blogus'),
            'section' => 'colors',
            'priority' => 30,

        )
    )
);

    $wp_customize->add_setting('primary_menu_bg_color',
    array(
        'default' => '#0025ff',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
    );

   $wp_customize->add_control('primary_menu_bg_color',
    array(
        'label' => esc_html__('Background Color', 'blogus'),
        'section' => 'colors',
        'type' => 'color',
        'priority' => 40,
    ));

}
add_action('customize_register','blogus_theme_option');

if ( ! function_exists( 'blogus_get_social_icon_default' ) ) {

    function blogus_get_social_icon_default() {
        return apply_filters(
            'blogus_get_social_icon_default',
            json_encode(
                array(
                    array(
                        'icon_value' => 'fab fa-facebook',
                        'link'       => '#',
                        'id'         => 'customizer_repeater_header_social_001',
                    ),
                    array(
                        'icon_value' => 'fa-brands fa-x-twitter',
                        'link'       =>  '#',
                        'id'         => 'customizer_repeater_header_social_003',
                    ),
                    array(
                        'icon_value' => 'fab fa-instagram',
                        'link'       =>  '#',
                        'id'         => 'customizer_repeater_header_social_005',
                    ),
                    array(
                        'icon_value' => 'fab fa-youtube',
                        'link'       =>  '#',
                        'id'         => 'customizer_repeater_header_social_006',
                    ),
                    
                    array(
                        'icon_value' => 'fab fa-telegram',
                        'link'       => '#',
                        'id'         => 'customizer_repeater_header_social_008',
                    ),
                )
            )
        );
    }
}