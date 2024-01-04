<?php
/**
 * Load google fonts locally option.
 *
 * @package    ThemeGrill
 * @subpackage Zakra
 * @since @todo.
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Zakra_Customize_Base_Option' ) ) {
	return;
}

/*============================ ADDITIONAL > OPTIMIZATION  ============================*/

if ( ! class_exists( 'Zakra_Customize_Optimization_Option' ) ) :

	/**
	 * Optimization option.
	 */
	class Zakra_Customize_Optimization_Option extends Zakra_Customize_Base_Option {

		/**
		 * Include customize options.
		 *
		 * @param array                 $options      Customize options provided via the theme.
		 * @param \WP_Customize_Manager $wp_customize Theme Customizer object.
		 *
		 * @return mixed|void Customizer options for registering panels, sections as well as controls.
		 */
		public function register_options( $options, $wp_customize ) {

			$configs = array(

				array(
					'name'     => 'zakra_load_google_fonts_locally_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'label'    => esc_html__( 'Load Google fonts locally', 'zakra' ),
					'section'  => 'zakra_optimization',
					'priority' => 5,
				),

				array(
					'name'     => 'zakra_load_google_fonts_locally',
					'default'  => 0,
					'type'     => 'control',
					'control'  => 'zakra-toggle',
					'label'    => esc_html__( 'Enable', 'zakra' ),
					'section'  => 'zakra_optimization',
					'priority' => 10,
				),

			);

			$options = array_merge( $options, $configs );

			return $options;
		}

	}

	new Zakra_Customize_Optimization_Option();

endif;
