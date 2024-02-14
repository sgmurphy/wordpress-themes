<?php
/**
 * Button.
 *
 * @package     zakra
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*========================================== STYLING >  BUTTON ==========================================*/
if ( ! class_exists( 'Zakra_Customize_Button_Option' ) ) :

	/**
	 * Button option.
	 */
	class Zakra_Customize_Button_Option extends Zakra_Customize_Base_Option {

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
					'name'     => 'zakra_button_general_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'label'    => esc_html__( 'Button', 'zakra' ),
					'section'  => 'zakra_button',
					'priority' => 5,
				),

				array(
					'name'     => 'zakra_button_color_group',
					'type'     => 'control',
					'control'  => 'zakra-group',
					'label'    => esc_html__( 'Color', 'zakra' ),
					'section'  => 'zakra_button',
					'priority' => 5,
				),

				array(
					'name'     => 'zakra_button_color',
					'default'  => '#ffffff',
					'type'     => 'sub-control',
					'control'  => 'zakra-color',
					'parent'   => 'zakra_button_color_group',
					'tab'      => esc_html__( 'Normal', 'zakra' ),
					'section'  => 'zakra_button',
					'priority' => 5,
				),

				array(
					'name'     => 'zakra_button_hover_color',
					'default'  => '#ffffff',
					'type'     => 'sub-control',
					'control'  => 'zakra-color',
					'parent'   => 'zakra_button_color_group',
					'tab'      => esc_html__( 'Hover', 'zakra' ),
					'section'  => 'zakra_button',
					'priority' => 5,
				),

				array(
					'name'     => 'zakra_button_background_color_group',
					'type'     => 'control',
					'control'  => 'zakra-group',
					'label'    => esc_html__( 'Background', 'zakra' ),
					'section'  => 'zakra_button',
					'priority' => 5,
				),

				array(
					'name'     => 'zakra_button_background_color',
					'default'  => '#027abb',
					'type'     => 'sub-control',
					'control'  => 'zakra-color',
					'parent'   => 'zakra_button_background_color_group',
					'tab'      => esc_html__( 'Normal', 'zakra' ),
					'section'  => 'zakra_button',
					'priority' => 5,
				),

				array(
					'name'     => 'zakra_button_background_hover_color',
					'default'  => '',
					'type'     => 'sub-control',
					'control'  => 'zakra-color',
					'parent'   => 'zakra_button_background_color_group',
					'tab'      => esc_html__( 'Hover', 'zakra' ),
					'section'  => 'zakra_button',
					'priority' => 5,
				),

				array(
					'name'     => 'zakra_button_padding',
					'default'  => array(
						'top'    => '10',
						'right'  => '15',
						'bottom' => '10',
						'left'   => '15',
						'unit'   => 'px',
					),
					'suffix'   => array( 'px', 'em', 'rem', '%' ),
					'type'     => 'control',
					'control'  => 'zakra-dimensions',
					'label'    => esc_html__( 'Padding', 'zakra' ),
					'section'  => 'zakra_button',
					'priority' => 20,
				),

				// Divider.
				array(
					'name'     => 'zakra_button_border_divider',
					'type'     => 'control',
					'control'  => 'zakra-divider',
					'style'    => 'dashed',
					'section'  => 'zakra_button',
					'priority' => 40,
				),

				array(
					'name'     => 'zakra_button_border_heading',
					'type'     => 'control',
					'control'  => 'zakra-subtitle',
					'label'    => esc_html__( 'Border', 'zakra' ),
					'section'  => 'zakra_button',
					'priority' => 40,
				),

				array(
					'name'        => 'zakra_button_border_radius',
					'default'     => array(
						'size' => '',
						'unit' => 'px',
					),
					'suffix'      => array( 'px' ),
					'type'        => 'control',
					'control'     => 'zakra-slider',
					'label'         => esc_html__( 'Radius', 'zakra' ),
					'section'     => 'zakra_button',
					'transport'   => 'postMessage',
					'priority'    => 50,
					'input_attrs' => array(
						'px' => array(
							'min'  => 0,
							'max'  => 50,
							'step' => 1,
						),
					),
				),
			);

			$options = array_merge( $options, $configs );

			if ( ! zakra_is_zakra_pro_active() ) {

				$configs[] = array(
					'name'        => 'zakra_styling_button_upgrade',
					'type'        => 'control',
					'control'     => 'zakra-upgrade',
					'label'       => esc_html__( 'Learn more', 'zakra' ),
					'description' => esc_html__( 'Unlock more features available in Pro version.', 'zakra' ),
					'url'         => esc_url( 'https://zakratheme.com/colormag-pricing/?utm_source=zakra-theme&utm_medium=customizer-option-name&utm_campaign=zakra-customizer+&utm_content=Learn+More ' ),
					'section'     => 'zakra_button',
					'priority'    => 100,
				);

				$options = array_merge( $options, $configs );
			}

			return $options;
		}

	}

	new Zakra_Customize_Button_Option();

endif;
