<?php 
/**
 * Blogus functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Blogus
 */

 	$blogus_theme_path = get_template_directory() . '/inc/ansar/';

	require( $blogus_theme_path . '/blogus-custom-navwalker.php' );
	require( $blogus_theme_path . '/default_menu_walker.php' );
	require( $blogus_theme_path . '/font/font.php');
	require( $blogus_theme_path . '/template-tags.php');
	require( $blogus_theme_path . '/template-functions.php');
	require( $blogus_theme_path. '/widgets/widgets-common-functions.php');
	require( $blogus_theme_path . '/custom-control/custom-control.php');
	require( $blogus_theme_path . '/custom-control/font/font-control.php');
	require_once get_template_directory() . '/inc/ansar/customizer-admin/blogus-admin-plugin-install.php';
	require_once( trailingslashit( get_template_directory() ) . 'inc/ansar/customize-pro/class-customize.php' );

	// Theme version.
	$blogus_theme = wp_get_theme();
	define( 'BLOGUS_THEME_VERSION', $blogus_theme->get( 'Version' ) );
	define ( 'BLOGUS_THEME_NAME', $blogus_theme->get( 'Name' ) );

	/*-----------------------------------------------------------------------------------*/
	/*	Enqueue scripts and styles.
	/*-----------------------------------------------------------------------------------*/
	require( $blogus_theme_path .'/enqueue.php');
	/* ----------------------------------------------------------------------------------- */
	/* Customizer */
	/* ----------------------------------------------------------------------------------- */
	require( $blogus_theme_path . '/customize/customizer.php');

	/* ----------------------------------------------------------------------------------- */
	/* Customizer */
	/* ----------------------------------------------------------------------------------- */

	require( $blogus_theme_path  . '/widgets/widgets-init.php');

	/* ----------------------------------------------------------------------------------- */
	/* Widget */
	/* ----------------------------------------------------------------------------------- */

	require( $blogus_theme_path  . '/hooks/hooks-init.php');

	/* custom-color file. */
	require( get_template_directory() . '/css/colors/theme-options-color.php');

	require get_template_directory().'/inc/ansar/hooks/blocks/header/header-init.php';

	/* Style For Sidebar*/
	require_once  get_template_directory()  . '/css/custom-style.php';


if ( ! function_exists( 'blogus_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function blogus_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on blogus, use a find and replace
	 * to change 'blogus' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'blogus', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// Add featured image sizes
        add_image_size('blogus-slider-full', 1280, 720, true); // width, height, crop
        add_image_size('blogus-featured', 1024, 0, false ); // width, height, crop
        add_image_size('blogus-medium', 720, 380, true); // width, height, crop

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary menu', 'blogus' ),
        'footer' => __( 'Footer menu', 'blogus' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	$args = array(
    'default-color' => '#eee',
    'default-image' => '',
	);
	add_theme_support( 'custom-background', $args );

    // Set up the woocommerce feature.
    add_theme_support( 'woocommerce');

     // Woocommerce Gallery Support
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

    // Added theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	/* Add theme support for gutenberg block */
	add_theme_support( 'align-wide' );
	add_theme_support( 'responsive-embeds' );

	//Custom logo
	add_theme_support( 'custom-logo');
	
	// custom header Support
			$args = array(
			'width'			=> '1600',
			'height'		=> '300',
			'flex-height'		=> false,
			'flex-width'		=> false,
			'header-text'		=> true,
			'default-text-color'	=> '000',
			'wp-head-callback'       => 'blogus_header_color',
		);
		add_theme_support( 'custom-header', $args );


	/*
     * Enable support for Post Formats on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/post-formats/
     */
    add_theme_support( 'post-formats', array( 'image', 'video', 'gallery', 'audio' ) );
	

}
endif;
add_action( 'after_setup_theme', 'blogus_setup' );


	function blogus_the_custom_logo() {
	
		if ( function_exists( 'the_custom_logo' ) ) {
			the_custom_logo();
		}

	}

	add_filter('get_custom_logo','blogus_logo_class');


	function blogus_logo_class($html)
	{
	$html = str_replace('custom-logo-link', 'navbar-brand', $html);
	return $html;
	}

	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @global int $content_width
	 */
	function blogus_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'blogus_content_width', 640 );
	}
	add_action( 'after_setup_theme', 'blogus_content_width', 0 );


	/**
	 * Load Jetpack compatibility file.
	 */
	if (defined('JETPACK__VERSION')) {
	    require get_template_directory() . '/inc/jetpack.php';
	}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blogus_widgets_init() {

	$blogus_footer_column_layout = esc_attr(get_theme_mod('blogus_footer_column_layout',3));
	
	$blogus_footer_column_layout = 12 / $blogus_footer_column_layout;
	
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Widget Area', 'blogus' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="bs-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="bs-widget-title"><h2 class="title">',
		'after_title'   => '</h2></div>',
	) );


	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area', 'blogus' ),
		'id'            => 'footer_widget_area',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="col-md-'.$blogus_footer_column_layout.' rotateInDownLeft animated bs-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="bs-widget-title"><h2 class="title">',
		'after_title'   => '</h2></div>',
	) );

}
add_action( 'widgets_init', 'blogus_widgets_init' );

//Editor Styling 
add_editor_style( array( 'css/editor-style.css') );