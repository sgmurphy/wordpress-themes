<?php
/**
 * Base Colors.
 *
 * @package     zakra
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*========================================== COLORS > BASE COLORS ==========================================*/
if ( ! class_exists( 'Zakra_Customize_Colors_Option' ) ) :

	/**
	 * Base option.
	 */
	class Zakra_Customize_Colors_Option extends Zakra_Customize_Base_Option {

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
					'name'     => 'zakra_theme_color_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'label'    => esc_html__( 'Theme Colors', 'zakra' ),
					'section'  => 'zakra_colors',
					'priority' => 5,
				),

				array(
					'name'     => 'zakra_primary_color_group',
					'type'     => 'control',
					'control'  => 'zakra-group',
					'label'    => esc_html__( 'Primary', 'zakra' ),
					'section'  => 'zakra_colors',
					'priority' => 5,
				),

				array(
					'name'     => 'zakra_primary_color',
					'default'  => '#027abb',
					'type'     => 'sub-control',
					'control'  => 'zakra-color',
					'parent'   => 'zakra_primary_color_group',
					'section'  => 'zakra_colors',
					'priority' => 5,
				),

				array(
					'name'     => 'zakra_base_color_group',
					'type'     => 'control',
					'control'  => 'zakra-group',
					'label'    => esc_html__( 'Base', 'zakra' ),
					'section'  => 'zakra_colors',
					'priority' => 10,
				),

				array(
					'name'     => 'zakra_base_color',
					'default'  => '#3F3F46',
					'type'     => 'sub-control',
					'control'  => 'zakra-color',
					'parent'   => 'zakra_base_color_group',
					'section'  => 'zakra_colors',
					'priority' => 10,
				),

				array(
					'name'     => 'zakra_border_color_group',
					'type'     => 'control',
					'control'  => 'zakra-group',
					'label'    => esc_html__( 'Border', 'zakra' ),
					'section'  => 'zakra_colors',
					'priority' => 10,
				),

				array(
					'name'     => 'zakra_border_color',
					'default'  => '#E4E4E7',
					'type'     => 'sub-control',
					'control'  => 'zakra-color',
					'parent'   => 'zakra_border_color_group',
					'section'  => 'zakra_colors',
					'priority' => 10,
				),

				// Link color.
				array(
					'name'     => 'zakra_link_color_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'label'    => esc_html__( 'Links', 'zakra' ),
					'section'  => 'zakra_colors',
					'priority' => 80,
				),

				array(
					'name'     => 'zakra_link_color_group',
					'type'     => 'control',
					'control'  => 'zakra-group',
					'label'    => esc_html__( 'Links', 'zakra' ),
					'section'  => 'zakra_colors',
					'priority' => 80,
				),

				array(
					'name'     => 'zakra_link_color',
					'default'  => '#027abb',
					'type'     => 'sub-control',
					'control'  => 'zakra-color',
					'parent'   => 'zakra_link_color_group',
					'tab'      => esc_html__( 'Normal', 'zakra' ),
					'section'  => 'zakra_colors',
					'priority' => 85,
				),

				array(
					'name'     => 'zakra_link_hover_color',
					'default'  => '#1e7ba6',
					'type'     => 'sub-control',
					'control'  => 'zakra-color',
					'parent'   => 'zakra_link_color_group',
					'tab'      => esc_html__( 'Hover', 'zakra' ),
					'section'  => 'zakra_colors',
					'priority' => 85,
				),

			);

			$options = array_merge( $options, $configs );

			if ( ! zakra_is_zakra_pro_active() ) {

				$configs[] = array(
					'name'        => 'zakra_base_colors_upgrade',
					'type'        => 'control',
					'control'     => 'zakra-upgrade',
					'label'       => esc_html__( 'Learn more', 'zakra' ),
					'description' => esc_html__( 'Unlock more features available in Pro version.', 'zakra' ),
					'url'         => esc_url( 'https://zakratheme.com/pricing/?utm_source=zakra-theme&utm_medium=customizer-option-name&utm_campaign=zakra-customizer+&utm_content=Learn+More ' ),
					'section'     => 'zakra_colors',
					'priority'    => 100,
				);

				$options = array_merge( $options, $configs );
			}

			return $options;
		}

	}

	new Zakra_Customize_Colors_Option();

endif;
