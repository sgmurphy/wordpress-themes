<?php
/**
 * Header button options.
 *
 * @package zakra
 */

defined( 'ABSPATH' ) || exit;

/*========================================== HEADER > HEADER BUTTON ==========================================*/
if ( ! class_exists( 'Zakra_Customize_Header_Button_Option' ) ) :

	/**
	 * Header main customizer options.
	 */
	class Zakra_Customize_Header_Button_Option extends Zakra_Customize_Base_Option {

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
					'name'     => 'zakra_header_button_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'label'    => esc_html__( 'Button 1', 'zakra' ),
					'section'  => 'zakra_header_button',
					'priority' => 5,
				),

				array(
					'name'     => 'zakra_header_button_general_heading',
					'type'     => 'control',
					'control'  => 'zakra-subtitle',
					'label'    => esc_html__( 'General', 'zakra' ),
					'section'  => 'zakra_header_button',
					'priority' => 5,
				),

				array(
					'name'     => 'zakra_enable_header_button',
					'default'  => false,
					'type'     => 'control',
					'control'  => 'zakra-toggle',
					'label'    => esc_html__( 'Enable', 'zakra' ),
					'section'  => 'zakra_header_button',
					'priority' => 5,
				),

				array(
					'name'       => 'zakra_header_button_text',
					'default'    => '',
					'type'       => 'control',
					'control'    => 'text',
					'label'      => esc_html__( 'Text', 'zakra' ),
					'section'    => 'zakra_header_button',
					'priority'   => 10,
					'dependency' => array(
						'zakra_enable_header_button',
						'==',
						true,
					),
				),

				array(
					'name'        => 'zakra_header_button_link',
					'default'     => '',
					'type'        => 'control',
					'control'     => 'text',
					'label'       => esc_html__( 'Link', 'zakra' ),
					'section'     => 'zakra_header_button',
					'priority'    => 20,
					'input_attrs' => array(
						'placeholder' => esc_attr__( 'https://example.com', 'zakra' ),
					),
					'dependency'  => array(
						'zakra_enable_header_button',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_header_button_target',
					'default'    => false,
					'type'       => 'control',
					'control'    => 'zakra-toggle',
					'label'      => esc_html__( 'Open link in a new tab', 'zakra' ),
					'section'    => 'zakra_header_button',
					'priority'   => 30,
					'dependency' => array(
						'zakra_enable_header_button',
						'==',
						true,
					),
				),

				// Divider.
				array(
					'name'       => 'zakra_header_button_divider',
					'type'       => 'control',
					'control'    => 'zakra-divider',
					'style'      => 'dashed',
					'section'    => 'zakra_header_button',
					'priority'   => 40,
					'dependency' => array(
						'zakra_enable_header_button',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_header_button_style_heading',
					'type'       => 'control',
					'control'    => 'zakra-subtitle',
					'label'      => esc_html__( 'Style', 'zakra' ),
					'section'    => 'zakra_header_button',
					'priority'   => 45,
					'dependency' => array(
						'zakra_enable_header_button',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_header_button_color_group',
					'default'    => '',
					'type'       => 'control',
					'control'    => 'zakra-group',
					'label'      => esc_html__( 'Color', 'zakra' ),
					'section'    => 'zakra_header_button',
					'priority'   => 50,
					'dependency' => array(
						'zakra_enable_header_button',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_header_button_color',
					'default'    => '#ffffff',
					'type'       => 'sub-control',
					'control'    => 'zakra-color',
					'parent'     => 'zakra_header_button_color_group',
					'tab'        => esc_html__( 'Normal', 'zakra' ),
					'section'    => 'zakra_header_button',
					'transport'  => 'postMessage',
					'priority'   => 55,
					'dependency' => array(
						'zakra_enable_header_button',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_header_button_hover_color',
					'default'    => '#ffffff',
					'type'       => 'sub-control',
					'control'    => 'zakra-color',
					'parent'     => 'zakra_header_button_color_group',
					'tab'        => esc_html__( 'Hover', 'zakra' ),
					'section'    => 'zakra_header_button',
					'transport'  => 'postMessage',
					'priority'   => 60,
					'dependency' => array(
						'zakra_enable_header_button',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_header_button_background_color_group',
					'default'    => '',
					'type'       => 'control',
					'control'    => 'zakra-group',
					'label'      => esc_html__( 'Background', 'zakra' ),
					'section'    => 'zakra_header_button',
					'priority'   => 70,
					'dependency' => array(
						'zakra_enable_header_button',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_header_button_background_color',
					'default'    => '#027abb',
					'type'       => 'sub-control',
					'control'    => 'zakra-color',
					'parent'     => 'zakra_header_button_background_color_group',
					'tab'        => esc_html__( 'Normal', 'zakra' ),
					'section'    => 'zakra_header_button',
					'transport'  => 'postMessage',
					'priority'   => 80,
					'dependency' => array(
						'zakra_enable_header_button',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_header_button_background_hover_color',
					'default'    => '#ffffff',
					'type'       => 'sub-control',
					'control'    => 'zakra-color',
					'parent'     => 'zakra_header_button_background_color_group',
					'tab'        => esc_html__( 'Hover', 'zakra' ),
					'section'    => 'zakra_header_button',
					'transport'  => 'postMessage',
					'priority'   => 90,
					'dependency' => array(
						'zakra_enable_header_button',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_header_button_padding',
					'default'    => array(
						'top'    => '5',
						'right'  => '10',
						'bottom' => '5',
						'left'   => '10',
						'unit'   => 'px',
					),
					'suffix'     => array( 'px', 'em', 'rem', '%' ),
					'type'       => 'control',
					'control'    => 'zakra-dimensions',
					'label'      => esc_html__( 'Padding', 'zakra' ),
					'section'    => 'zakra_header_button',
					'transport'  => 'postMessage',
					'priority'   => 100,
					'dependency' => array(
						'zakra_enable_header_button',
						'==',
						true,
					),
				),

				// Divider.
				array(
					'name'       => 'zakra_header_button_border_divider',
					'type'       => 'control',
					'control'    => 'zakra-divider',
					'style'      => 'dashed',
					'section'    => 'zakra_header_button',
					'priority'   => 110,
					'dependency' => array(
						'zakra_enable_header_button',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_header_button_border_heading',
					'type'       => 'control',
					'control'    => 'zakra-subtitle',
					'label'      => esc_html__( 'Border', 'zakra' ),
					'section'    => 'zakra_header_button',
					'priority'   => 110,
					'dependency' => array(
						'zakra_enable_header_button',
						'==',
						true,
					),
				),

				array(
					'name'        => 'zakra_header_button_border_radius',
					'default'     => array(
						'size' => '',
						'unit' => 'px',
					),
					'suffix'      => array( 'px' ),
					'type'        => 'control',
					'control'     => 'zakra-slider',
					'label'       => esc_html__( 'Radius', 'zakra' ),
					'section'     => 'zakra_header_button',
					'transport'   => 'postMessage',
					'priority'    => 120,
					'dependency'  => array(
						'zakra_enable_header_button',
						'==',
						true,
					),
					'input_attrs' => array(
						'px' => array(
							'min'  => 0,
							'max'  => 30,
							'step' => 1,
						),
					),
				),

			);

			$options = array_merge( $options, $configs );

			if ( ! zakra_is_zakra_pro_active() ) {

				$configs[] = array(
					'name'        => 'zakra_header_button_upgrade',
					'type'        => 'control',
					'control'     => 'zakra-upgrade',
					'label'       => esc_html__( 'Learn more', 'zakra' ),
					'description' => esc_html__( 'Unlock more features available in Pro version.', 'zakra' ),
					'url'         => esc_url( 'https://zakratheme.com/colormag-pricing/?utm_source=zakra-theme&utm_medium=customizer-option-name&utm_campaign=zakra-customizer+&utm_content=Learn+More ' ),
					'section'     => 'zakra_header_button',
					'priority'    => 150,
				);

				$options = array_merge( $options, $configs );
			}

			return $options;
		}

	}

	new Zakra_Customize_Header_Button_Option();

endif;
