<?php
/**
 * Header Search Options.
 *
 * @package zakra
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*== MENU > MOBILE MENU ==*/
if ( ! class_exists( 'Zakra_Customize_Header_Search_Option' ) ) :

	/**
	 * Header button customizer options.
	 */
	class Zakra_Customize_Header_Search_Option extends Zakra_Customize_Base_Option {

		/**
		 * Include customize options.
		 *
		 * @param array $options Customize options provided via the theme.
		 * @param \WP_Customize_Manager $wp_customize Theme Customizer object.
		 *
		 * @return mixed|void Customizer options for registering panels, sections as well as controls.
		 */
		public function register_options( $options, $wp_customize ) {

			$configs = array(

				array(
					'name'     => 'zakra_search_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'label'    => esc_html__( 'Search', 'zakra' ),
					'section'  => 'zakra_header_search',
					'priority' => 5,
				),

				array(
					'name'     => 'zakra_enable_header_search',
					'default'  => true,
					'type'     => 'control',
					'control'  => 'zakra-toggle',
					'label'    => esc_html__( 'Enable', 'zakra' ),
					'section'  => 'zakra_header_search',
					'priority' => 10,
				),

				array(
					'name'     => 'zakra_enable_product_search_search',
					'default'  => false,
					'type'     => 'control',
					'control'  => 'zakra-toggle',
					'label'    => esc_html__( 'Product Search', 'zakra' ),
					'section'  => 'zakra_header_search',
					'priority' => 10,
				),

			);

			$options = array_merge( $options, $configs );

			if ( ! zakra_is_zakra_pro_active() ) {

				$configs[] = array(
					'name'        => 'zakra_mobile_menu_upgrade',
					'type'        => 'control',
					'control'     => 'zakra-upgrade',
					'label'       => esc_html__( 'Learn more', 'zakra' ),
					'description' => esc_html__( 'Unlock more features available in Pro version.', 'zakra' ),
					'url'         => esc_url( 'https://zakratheme.com/pricing/?utm_source=zakra-theme&utm_medium=customizer-option-name&utm_campaign=zakra-customizer+&utm_content=Learn+More ' ),
					'section'     => 'zakra_header_search',
					'priority'    => 210,
				);

				$options = array_merge( $options, $configs );
			}

			return $options;
		}
	}

	new Zakra_Customize_Header_Search_Option();

endif;
