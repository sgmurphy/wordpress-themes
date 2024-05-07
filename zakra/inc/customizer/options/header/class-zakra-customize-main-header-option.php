<?php
/**
 * Header main options.
 *
 * @package zakra
 */

defined( 'ABSPATH' ) || exit;

/*========================================== HEADER > HEADER MAIN ==========================================*/
if ( ! class_exists( 'Zakra_Customize_Main_Header_Option' ) ) :

	/**
	 * Header main customizer options.
	 */
	class Zakra_Customize_Main_Header_Option extends Zakra_Customize_Base_Option {

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
					'name'     => 'zakra_main_header_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'label'    => esc_html__( 'Main Header', 'zakra' ),
					'section'  => 'zakra_main_header',
					'priority' => 5,
				),

				array(
					'name'     => 'zakra_main_header_general_heading',
					'type'     => 'control',
					'control'  => 'zakra-subtitle',
					'label'    => esc_html__( 'General', 'zakra' ),
					'section'  => 'zakra_main_header',
					'priority' => 6,
				),

				array(
					'name'      => 'zakra_main_header_layout',
					'default'   => 'layout-1',
					'type'      => 'control',
					'control'   => 'select',
					'label'     => esc_html__( 'Layout', 'zakra' ),
					'section'   => 'zakra_main_header',
					'transport' => 'postMessage',
					'priority'  => 10,
                    'choices'    => apply_filters(
                        'zakra_main_header_layout_choices',
                        array(
                            'layout-1' => esc_html__( 'Layout 1', 'zakra' ),
                            'layout-2' => esc_html__( 'Layout 2', 'zakra' ),
                        )
                    ),
					'partial' => array(
						'selector'        => '#zak-masthead',
						'render_callback' => 'Zakra_Customizer_Partials::customize_partial_header_main',
					)
				),

				array(
					'name'       => 'zakra_main_header_layout_1_style',
					'default'    => 'style-1',
					'type'       => 'control',
					'control'    => 'zakra-radio-image',
					'label'      => esc_html__( 'Advanced Style', 'zakra' ),
					'section'    => 'zakra_main_header',
					'priority'   => 20,
					'choices'    => apply_filters(
						'zakra_main_header_layout_1_style_choices',
						array(
							'style-1' => array(
								'label' => 'Left',
								'url'   => ZAKRA_PARENT_INC_ICON_URI . '/header-left.svg',
							),
							'style-2' => array(
								'label' => 'Center',
								'url'   => ZAKRA_PARENT_INC_ICON_URI . '/header-center.svg',
							),
							'style-3' => array(
								'label' => 'Right',
								'url'   => ZAKRA_PARENT_INC_ICON_URI . '/header-right.svg',
							),
						)
					),
					'image_col'  => 2,
					'dependency' => apply_filters(
						'zakra_main_header_style_cb',
						array(
							'zakra_main_header_layout',
							'==',
							'layout-1',
						)
					),
					'partial' => array(
						'selector'        => '#zak-masthead',
						'render_callback' => 'Zakra_Customizer_Partials::customize_partial_header_main',
					)
				),

				array(
					'name'       => 'zakra_main_header_layout_2_style',
					'default'    => 'style-1',
					'type'       => 'control',
					'control'    => 'zakra-radio-image',
					'label'      => esc_html__( 'Advanced Style', 'zakra' ),
					'section'    => 'zakra_main_header',
					'transport'  => 'postMessage',
					'priority'   => 20,
					'choices'    => apply_filters(
						'zakra_main_header_layout_2_style_choices',
						array(
							'style-1' => array(
								'label' => 'Two Row Logo Left',
								'url'   => ZAKRA_PARENT_INC_ICON_URI . '/two-row-logo-left.svg',
							),
						)
					),
					'image_col'  => 2,
					'dependency' => apply_filters(
						'zakra_main_header_style_cb',
						array(
							'zakra_main_header_layout',
							'==',
							'layout-2',
						)
					),
					'partial' => array(
						'selector'        => '#zak-masthead',
						'render_callback' => 'Zakra_Customizer_Partials::customize_partial_header_main',
					)
				),

				// Divider.
				array(
					'name'     => 'zakra_main_header_divider',
					'type'     => 'control',
					'control'  => 'zakra-divider',
					'style'    => 'dashed',
					'section'  => 'zakra_main_header',
					'priority' => 65,
				),

				array(
					'name'     => 'zakra_main_header_style_heading',
					'type'     => 'control',
					'control'  => 'zakra-subtitle',
					'label'    => esc_html__( 'Style', 'zakra' ),
					'section'  => 'zakra_main_header',
					'priority' => 65,
				),

				array(
					'name'     => 'zakra_main_header_background_color_group',
					'type'     => 'control',
					'control'  => 'zakra-group',
					'label'    => esc_html__( 'Background', 'zakra' ),
					'section'  => 'zakra_main_header',
					'priority' => 70,
				),

				array(
					'name'      => 'zakra_main_header_background_color',
					'default'   => array(
						'background-color'      => '',
						'background-image'      => '',
						'background-repeat'     => 'repeat',
						'background-position'   => 'center center',
						'background-size'       => 'contain',
						'background-attachment' => 'scroll',
					),
					'type'      => 'sub-control',
					'control'   => 'zakra-background',
					'parent'    => 'zakra_main_header_background_color_group',
					'section'   => 'zakra_main_header',
					'transport' => 'postMessage',
					'priority'  => 70,
				),

				// Divider.
				array(
					'name'     => 'zakra_main_header_divider_two',
					'type'     => 'control',
					'control'  => 'zakra-divider',
					'style'    => 'dashed',
					'section'  => 'zakra_main_header',
					'priority' => 90,
				),

				array(
					'name'     => 'zakra_main_header_border_bottom_heading',
					'type'     => 'control',
					'control'  => 'zakra-subtitle',
					'label'    => esc_html__( 'Border Bottom', 'zakra' ),
					'section'  => 'zakra_main_header',
					'priority' => 95,
				),

				array(
					'name'        => 'zakra_main_header_border_bottom_width',
					'default'     => array(
						'size' => 1,
						'unit' => 'px',
					),
					'suffix'      => array( 'px' ),
					'type'        => 'control',
					'control'     => 'zakra-slider',
					'label'       => esc_html__( 'Width', 'zakra' ),
					'section'     => 'zakra_main_header',
					'priority'    => 95,
					'input_attrs' => array(
						'px' => array(
							'min'  => 0,
							'max'  => 20,
							'step' => 1,
						),
					),
				),

				array(
					'name'     => 'zakra_main_header_border_bottom_color_group',
					'type'     => 'control',
					'control'  => 'zakra-group',
					'label'    => esc_html__( 'Color', 'zakra' ),
					'section'  => 'zakra_main_header',
					'priority' => 95,
				),

				array(
					'name'      => 'zakra_main_header_border_bottom_color',
					'default'   => '#E4E4E7',
					'type'      => 'sub-control',
					'control'   => 'zakra-color',
					'parent'    => 'zakra_main_header_border_bottom_color_group',
					'section'   => 'zakra_main_header',
					'priority'  => 100,
				),

				array(
					'name'     => 'zakra_main_header_components_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'label'    => esc_html__( 'Components', 'zakra' ),
					'section'  => 'zakra_main_header',
					'priority' => 180,
				),

				array(
					'name'          => 'zakra_search_navigation_info',
					'type'          => 'control',
					'control'       => 'zakra-navigate',
					'section'       => 'zakra_main_header',
					'navigate_info' => array(
						'target_container' => 'section',
						'target_id'        => 'zakra_header_search',
						'target_label'     => esc_html__( 'Header Search', 'zakra' ),
					),
					'priority'      => 185,
				),
			);

			$options = array_merge( $options, $configs );

			if ( ! zakra_is_zakra_pro_active() ) {

				$configs[] = array(
					'name'        => 'zakra_main_header_upgrade',
					'type'        => 'control',
					'control'     => 'zakra-upgrade',
					'label'       => esc_html__( 'Learn more', 'zakra' ),
					'description' => esc_html__( 'Unlock more features available in Pro version.', 'zakra' ),
					'url'         => esc_url( 'https://zakratheme.com/pricing/?utm_source=zakra-theme&utm_medium=customizer-option-name&utm_campaign=zakra-customizer+&utm_content=Learn+More ' ),
					'section'     => 'zakra_main_header',
					'priority'    => 250,
				);

				$options = array_merge( $options, $configs );
			}

			return $options;
		}

	}

	new Zakra_Customize_Main_Header_Option();

endif;
