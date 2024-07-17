<?php
/**
 * Load CSS & Javascript files.
 *
 * @package zakra
 *
 * TODO: @since.
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Zakra_Enqueue_Scripts' ) ) {

	/**
	 * Enqueue Scripts.
	 */
	class Zakra_Enqueue_Scripts {

		/**
		 * Instance.
		 *
		 * @access private
		 * @var object
		 */
		private static $instance;

		/**
		 * Initiator.
		 */
		public static function get_instance() {

			if ( ! isset( self::$instance ) ) {

				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Constructor.
		 */
		private function __construct() {

			$this->setup_hooks();
		}

		/**
		 * Define hooks.
		 *
		 * @return void
		 */
		public function setup_hooks() {

			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

			add_action( 'zakra_get_fonts', array( $this, 'get_fonts' ) );

			add_action( 'enqueue_block_editor_assets', array( $this, 'block_editor_styles' ), 1 );
		}

		/**
		 * Enqueue scripts and styles.
		 *
		 * @return void
		 * TODO: Refactor this, split code inside method.
		 */
		public function enqueue_scripts() {

			$suffix = zakra_get_script_suffix();

			/**
			 * Styles.
			 */
			// Font Awesome 4.
			$font_awesome_styles = array(
				array(
					'handle'  => 'font-awesome-all',
					'file'    => '/lib/font-awesome/css/all',
					'version' => '6.2.4',
				),
				array(
					'handle'  => 'font-awesome-solid',
					'file'    => '/lib/font-awesome/css/solid',
					'version' => '6.2.4',
				),
				array(
					'handle'  => 'font-awesome-solid',
					'file'    => '/lib/font-awesome/css/regular',
					'version' => '6.2.4',
				),
				array(
					'handle'  => 'font-awesome-solid',
					'file'    => '/lib/font-awesome/css/brands',
					'version' => '6.2.4',
				),
				array(
					'handle'  => 'font-awesome-4',
					'file'    => '/lib/font-awesome/css/font-awesome',
					'version' => '4.7.0',
				),
			);

			foreach ( $font_awesome_styles as $style ) {
				wp_register_style(
					$style['handle'],
					ZAKRA_PARENT_ASSETS_URI . $style['file'] . $suffix . '.css',
					false,
					$style['version']
				);
				wp_enqueue_style( $style['handle'] );
			}

			// Theme style.
			wp_register_style(
				'zakra-style',
				get_stylesheet_uri(),
				array(),
				ZAKRA_THEME_VERSION
			);

			wp_enqueue_style( 'zakra-style' );

			// Support RTL.
			wp_style_add_data( 'zakra-style', 'rtl', 'replace' );

			/**
			 * Dynamic CSS.
			 */
			// Dynamically generated styles from options.
			add_filter( 'zakra_dynamic_theme_css', array( 'Zakra_Dynamic_CSS', 'render_output' ) );

			// Enqueue required Google fonts for the theme.
			Zakra_Generate_Fonts::render_fonts();

			// Generate dynamic CSS to add inline styles for the theme.
			$theme_dynamic_css = apply_filters( 'zakra_dynamic_theme_css', '' );

			// Load dynamic CSS.
			if ( zakra_is_zakra_pro_active() ) {

				wp_add_inline_style( 'zakra-pro', $theme_dynamic_css );
			} else {

				wp_add_inline_style( 'zakra-style', $theme_dynamic_css );
			}

			/**
			 * Scripts.
			 */
			// Do not load scripts if AMP.
			if ( zakra_is_amp() ) {

				return;
			}

			// Script for menus.
			wp_enqueue_script(
				'zakra-navigation',
				ZAKRA_PARENT_ASSETS_URI . '/js/navigation' . $suffix . '.js',
				array(),
				ZAKRA_THEME_VERSION,
				true
			);

			// Accessiblity JS for keyboard only users.
			wp_enqueue_script(
				'zakra-skip-link-focus-fix',
				ZAKRA_PARENT_ASSETS_URI . '/js/skip-link-focus-fix' . $suffix . '.js',
				array(),
				ZAKRA_THEME_VERSION,
				true
			);

			// Zakra main JavaScript file.
			wp_enqueue_script(
				'zakra-custom',
				ZAKRA_PARENT_ASSETS_URI . '/js/zakra-custom' . $suffix . '.js',
				array(),
				ZAKRA_THEME_VERSION,
				true
			);

			// JS file for comment form.
			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {

				wp_enqueue_script( 'comment-reply' );
			}
		}

		/**
		 * Hook function to get the required Google fonts as chosen from typography options.
		 *
		 * @return void
		 * TODO: @since.
		 */
		public function get_fonts() {

			/**
			 * Default values.
			 */
			$typography_default_400 = array(
				'font-family' => 'default',
				'font-weight' => '400',
			);

			$typography_default_500 = array(
				'font-family' => 'default',
				'font-weight' => '500',
			);

			$base_typography                  = get_theme_mod( 'zakra_body_typography', $typography_default_400 );
			$base_heading_typography          = get_theme_mod( 'zakra_heading_typography', $typography_default_400 );
			$site_title_typography            = get_theme_mod( 'zakra_site_title_typography', $typography_default_400 );
			$site_tagline_typography          = get_theme_mod( 'zakra_site_tagline_typography', $typography_default_400 );
			$primary_menu_typography          = get_theme_mod( 'zakra_main_menu_typography', $typography_default_400 );
			$primary_menu_dropdown_typography = get_theme_mod( 'zakra_sub_menu_typography', $typography_default_400 );
			$mobile_menu_typography           = get_theme_mod( 'zakra_mobile_menu_typography', $typography_default_400 );
			$breadcrumb_typography            = get_theme_mod( 'zakra_breadcrumb_typography', $typography_default_400 );
			$add_to_cart_typography           = get_theme_mod( 'zakra_shop_product_button_typography', $typography_default_400 );
			$product_price_typography         = get_theme_mod( 'zakra_shop_product_price_typography', $typography_default_400 );
			$product_title_typography         = get_theme_mod( 'zakra_shop_product_title_typography', $typography_default_400 );
			$view_cart_typography             = get_theme_mod( 'zakra_shop_product_view_cart_typography', $typography_default_400 );

			$post_page_title_typography = get_theme_mod( 'zakra_post_page_title_typography', $typography_default_500 );
			$blog_post_title_typography = get_theme_mod( 'zakra_blog_post_title_typography', $typography_default_500 );
			$h1_typography              = get_theme_mod( 'zakra_h1_typography', $typography_default_500 );
			$h2_typography              = get_theme_mod( 'zakra_h2_typography', $typography_default_500 );
			$h3_typography              = get_theme_mod( 'zakra_h3_typography', $typography_default_500 );
			$h4_typography              = get_theme_mod( 'zakra_h4_typography', $typography_default_500 );
			$h5_typography              = get_theme_mod( 'zakra_h5_typography', $typography_default_500 );
			$h6_typography              = get_theme_mod( 'zakra_h6_typography', $typography_default_500 );
			$widget_heading_typography  = get_theme_mod( 'zakra_widget_title_typography', $typography_default_500 );
			$widget_content_typography  = get_theme_mod( 'zakra_widget_content_typography', $typography_default_500 );
			$drawer_menu_typography     = get_theme_mod( 'zakra_header_drawer_menu_typography', $typography_default_500 );

			// Grouped typography options with default font-wight of 400.
			$zakra_typography_options_one = array(
				$base_typography,
				$base_heading_typography,
				$site_title_typography,
				$site_tagline_typography,
				$primary_menu_typography,
				$primary_menu_dropdown_typography,
				$mobile_menu_typography,
				$breadcrumb_typography,
				$add_to_cart_typography,
				$product_price_typography,
				$product_title_typography,
				$view_cart_typography,
			);

			// Grouped typography options with default font-wight of 500.
			$zakra_typography_options_two = array(
				$post_page_title_typography,
				$blog_post_title_typography,
				$h1_typography,
				$h2_typography,
				$h3_typography,
				$h4_typography,
				$h5_typography,
				$h6_typography,
				$widget_heading_typography,
				$widget_content_typography,
				$drawer_menu_typography,
			);

			// TODO: Optimize these.
			foreach ( $zakra_typography_options_one as $zakra_typography_option_one ) {

				if ( isset( $zakra_typography_option_one['font-family'] ) && 'default' === $zakra_typography_option_one['font-family'] ) {

					$zakra_typography_option_one['font-family'] = '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Helvetica, Arial, sans-serif';
				}

				if ( isset( $zakra_typography_option_one['font-family'] ) ) {

					Zakra_Generate_Fonts::add_font( $zakra_typography_option_one['font-family'], isset( $zakra_typography_option_one['font-weight'] ) ? $zakra_typography_option_one['font-weight'] : '400' );
				}
			}

			foreach ( $zakra_typography_options_two as $zakra_typography_option_two ) {

				if ( isset( $zakra_typography_option_two['font-family'] ) && 'default' === $zakra_typography_option_two['font-family'] ) {

					$zakra_typography_option_two['font-family'] = '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Helvetica, Arial, sans-serif';
				}

				if ( isset( $zakra_typography_option_two['font-family'] ) ) {

					Zakra_Generate_Fonts::add_font( $zakra_typography_option_two['font-family'], isset( $zakra_typography_option_two['font-weight'] ) ? $zakra_typography_option_two['font-weight'] : '500' );
				}
			}
		}

		/**
		 * Enqueue block editor styles.
		 *
		 * TODO: @since.
		 */
		function block_editor_styles() {

			wp_enqueue_style( 'zakra-block-editor-styles', ZAKRA_PARENT_URI . '/style-editor-block.css' );
		}
	}

}

Zakra_Enqueue_Scripts::get_instance();
