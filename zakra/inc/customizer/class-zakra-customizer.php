<?php
/**
 * Zakra Customizer Class
 *
 * @package zakra
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Include the customizer framework.
require_once dirname( __FILE__ ) . '/core/class-zakra-customizer-framework.php';
// Include the customizer base class.
require_once dirname( __FILE__ ) . '/core/class-zakra-customize-base-option.php';

if ( ! class_exists( 'Zakra_Customizer' ) ) :

	/**
	 * Zakra Customizer class
	 */
	class Zakra_Customizer {
		/**
		 * Constructor - Setup customizer
		 */
		public function __construct() {
			add_action( 'customize_register', array( $this, 'zakra_customize_register' ) );
			add_action( 'customize_register', array( $this, 'zakra_customize_options_file_include' ), 1 );
			add_filter( 'zakra_default_variants', array( $this, 'add_font_variants' ) );
			add_filter( 'zakra_fontawesome_src', array( $this, 'fontawesome_src' ) );
			add_action( 'customize_preview_init', array( $this, 'customize_preview_js' ),11 );
		}

		/**
		 * Include the required files for extending the custom Customize controls.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		public function zakra_customize_register( $wp_customize ) {

			// Override default.
			require ZAKRA_PARENT_CUSTOMIZER_DIR . '/override-defaults.php';
			require ZAKRA_PARENT_CUSTOMIZER_DIR . '/class-zakra-customizer-partials.php';
		}

		/**
		 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
		 *
		 * @since 3.0.0
		 */
		public function customize_preview_js() {
			$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

			wp_enqueue_script(
				'zakra-customizer-preview',
				ZAKRA_PARENT_CUSTOMIZER_URI . '/assets/js/zakra-customize-preview' . $suffix . '.js',
				array(
					'customize-preview',
				),
				ZAKRA_THEME_VERSION,
				true
			);
		}

		public function zakra_customize_options_file_include() {

			// Include the required customize section and panels register file.
			require ZAKRA_PARENT_CUSTOMIZER_DIR . '/class-zakra-customizer-register-panels-sections.php';

			/**
			 * Include the required customize options file.
			 */
			// Global.
			require ZAKRA_PARENT_CUSTOMIZER_DIR . '/options/global/class-zakra-customize-container-option.php';
			require ZAKRA_PARENT_CUSTOMIZER_DIR . '/options/global/class-zakra-customize-content-area-option.php';
			require ZAKRA_PARENT_CUSTOMIZER_DIR . '/options/global/class-zakra-customize-colors-option.php';
			require ZAKRA_PARENT_CUSTOMIZER_DIR . '/options/global/class-zakra-customize-sidebar-layout-option.php';
			require ZAKRA_PARENT_CUSTOMIZER_DIR . '/options/global/class-zakra-customize-typography-option.php';
			require ZAKRA_PARENT_CUSTOMIZER_DIR . '/options/global/class-zakra-customize-button-option.php';

			// Header.
			require ZAKRA_PARENT_CUSTOMIZER_DIR . '/options/header/class-zakra-customize-site-identity-option.php';
			require ZAKRA_PARENT_CUSTOMIZER_DIR . '/options/header/class-zakra-customize-header-media-option.php';
			require ZAKRA_PARENT_CUSTOMIZER_DIR . '/options/header/class-zakra-customize-top-bar-option.php';
			require ZAKRA_PARENT_CUSTOMIZER_DIR . '/options/header/class-zakra-customize-main-header-option.php';
			require ZAKRA_PARENT_CUSTOMIZER_DIR . '/options/header/class-zakra-customize-header-button-option.php';
			require ZAKRA_PARENT_CUSTOMIZER_DIR . '/options/header/class-zakra-customize-primary-menu-option.php';
			require ZAKRA_PARENT_CUSTOMIZER_DIR . '/options/header/class-zakra-customize-header-search-option.php';
			require ZAKRA_PARENT_CUSTOMIZER_DIR . '/options/header/class-zakra-customize-page-header-option.php';
			require ZAKRA_PARENT_CUSTOMIZER_DIR . '/options/header/class-zakra-customize-breadcrumb-option.php';

			// Content.
			require ZAKRA_PARENT_CUSTOMIZER_DIR . '/options/content/class-zakra-customize-blog-option.php';
			require ZAKRA_PARENT_CUSTOMIZER_DIR . '/options/content/class-zakra-customize-single-blog-post-option.php';
			require ZAKRA_PARENT_CUSTOMIZER_DIR . '/options/content/class-zakra-customize-blog-meta-option.php';
			require ZAKRA_PARENT_CUSTOMIZER_DIR . '/options/content/class-zakra-customize-blog-sidebar-option.php';

			// Footer.
			require ZAKRA_PARENT_CUSTOMIZER_DIR . '/options/footer/class-zakra-customize-footer-bar-option.php';
			require ZAKRA_PARENT_CUSTOMIZER_DIR . '/options/footer/class-zakra-customize-footer-column-option.php';
			require ZAKRA_PARENT_CUSTOMIZER_DIR . '/options/footer/class-zakra-customize-scroll-to-top-option.php';

			// Additional
			require ZAKRA_PARENT_CUSTOMIZER_DIR . '/options/additional/class-zakra-customize-optimization-option.php';

			// Blog.
			require ZAKRA_PARENT_CUSTOMIZER_DIR . '/options/woocommerce/class-zakra-customize-layout-woocommerce-option.php';
		}

		/**
		 * @param $array
		 *
		 * @return mixed
		 */
		public function add_font_variants( $array ) {
			$array[] = '500';
			$array[] = '500italic';
			$array[] = '700italic';

			return $array;
		}

		/**
		 * @param $path
		 *
		 * @return string
		 */
		public function fontawesome_src( $path ) {
			$path = '/assets/lib/font-awesome/css/font-awesome';

			return $path;
		}
	}
endif;

new Zakra_Customizer();
