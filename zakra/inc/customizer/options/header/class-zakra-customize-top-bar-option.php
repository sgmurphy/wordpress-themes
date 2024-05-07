<?php
/**
 * Header top options.
 *
 * @package     zakra
 */

defined( 'ABSPATH' ) || exit;

/*========================================== HEADER > HEADER TOP ==========================================*/
if ( ! class_exists( 'Zakra_Customize_Top_Bar_Option' ) ) :

	/**
	 * Header top customizer options.
	 */
	class Zakra_Customize_Top_Bar_Option extends Zakra_Customize_Base_Option
	{

		/**
		 * Include customize options.
		 *
		 * @param array $options Customize options provided via the theme.
		 * @param \WP_Customize_Manager $wp_customize Theme Customizer object.
		 *
		 * @return mixed|void Customizer options for registering panels, sections as well as controls.
		 */
		public function register_options( $options, $wp_customize )
		{

			$configs = array(

				array(
					'name'     => 'zakra_top_bar_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'label'    => esc_html__( 'Top Bar', 'zakra' ),
					'section'  => 'zakra_header_top',
					'priority' => 5,
				),

				array(
					'name'     => 'zakra_top_bar_general_subheading',
					'type'     => 'control',
					'control'  => 'zakra-subtitle',
					'label'    => esc_html__( 'General', 'zakra' ),
					'section'  => 'zakra_header_top',
					'priority' => 5,
				),

				array(
					'name'     => 'zakra_enable_top_bar',
					'default'  => false,
					'type'     => 'control',
					'control'  => 'zakra-toggle',
					'label'    => esc_html__( 'Enable', 'zakra' ),
					'section'  => 'zakra_header_top',
					'priority' => 5,
				),

				// Divider.
				array(
					'name'       => 'zakra_top_bar_divider',
					'type'       => 'control',
					'control'    => 'zakra-divider',
					'style'      => 'dashed',
					'section'    => 'zakra_header_top',
					'priority'   => 25,
					'dependency' => array(
						'zakra_enable_top_bar',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_top_bar_style_subheading',
					'type'       => 'control',
					'control'    => 'zakra-subtitle',
					'label'      => esc_html__( 'Style', 'zakra' ),
					'section'    => 'zakra_header_top',
					'priority'   => 30,
					'dependency' => array(
						'zakra_enable_top_bar',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_top_bar_color_group',
					'type'       => 'control',
					'control'    => 'zakra-group',
					'label'      => esc_html__( 'Color', 'zakra' ),
					'section'    => 'zakra_header_top',
					'priority'   => 30,
					'dependency' => array(
						'zakra_enable_top_bar',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_top_bar_color',
					'default'    => '#FAFAFA',
					'type'       => 'sub-control',
					'control'    => 'zakra-color',
					'parent'     => 'zakra_top_bar_color_group',
					'section'    => 'zakra_header_top',
					'transport'  => 'postMessage',
					'priority'   => 30,
					'dependency' => array(
						'zakra_enable_top_bar',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_top_bar_background_group',
					'type'       => 'control',
					'control'    => 'zakra-group',
					'label'      => esc_html__( 'Background', 'zakra' ),
					'section'    => 'zakra_header_top',
					'priority'   => 40,
					'dependency' => array(
						'zakra_enable_top_bar',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_top_bar_background',
					'default'    => array(
						'background-color'      => '#18181B',
						'background-image'      => '',
						'background-repeat'     => 'repeat',
						'background-position'   => 'center center',
						'background-size'       => 'contain',
						'background-attachment' => 'scroll',
					),
					'type'       => 'sub-control',
					'control'    => 'zakra-background',
					'section'    => 'zakra_header_top',
					'parent'     => 'zakra_top_bar_background_group',
					'priority'   => 40,
					'dependency' => array(
						'zakra_enable_top_bar',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_top_bar_column_1_heading',
					'type'       => 'control',
					'control'    => 'zakra-title',
					'label'      => esc_html__( 'Column 1', 'zakra' ),
					'section'    => 'zakra_header_top',
					'priority'   => 70,
					'dependency' => array(
						'zakra_enable_top_bar',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_top_bar_column_1_content_type',
					'default'    => 'text_html',
					'type'       => 'control',
					'control'    => 'select',
					'section'    => 'zakra_header_top',
					'choices'    => array(
						'none'      => esc_html__( 'None', 'zakra' ),
						'text_html' => esc_html__( 'Text/HTML', 'zakra' ),
						'menu'      => esc_html__( 'Menu', 'zakra' ),
						'widget'    => esc_html__( 'Widget', 'zakra' ),
					),
					'priority'   => 75,
					'dependency' => array(
						'zakra_enable_top_bar',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_top_bar_column_1_html',
					'default'    => '',
					'type'       => 'control',
					'control'    => 'zakra-editor',
					'section'    => 'zakra_header_top',
					'transport'  => 'postMessage',
					'partial'    => array(
						'selector'        => '.zak-top-bar__1',
						'render_callback' => 'Zakra_Customizer_Partials::customize_partial_top_bar_column_1_html',
					),
					'label'      => esc_html__( 'Text/HTML for Column 1', 'zakra' ),
					'priority'   => 80,
					'dependency' => array(
						'conditions' => array(
							array(
								'zakra_enable_top_bar',
								'==',
								true,
							),
							array(
								'zakra_top_bar_column_1_content_type',
								'==',
								'text_html',
							),
						),
						'operator'   => 'AND',
					),
				),

				array(
					'name'       => 'zakra_top_bar_column_1_menu',
					'default'    => 'none',
					'type'       => 'control',
					'control'    => 'select',
					'section'    => 'zakra_header_top',
					'label'      => esc_html__( 'Select a Menu for Column 1', 'zakra' ),
					'choices'    => zakra_get_menu_options(),
					'priority'   => 85,
					'dependency' => array(
						'conditions' => array(
							array(
								'zakra_enable_top_bar',
								'==',
								true,
							),
							array(
								'zakra_top_bar_column_1_content_type',
								'==',
								'menu',
							),
						),
						'operator'   => 'AND',
					),
				),

				array(
					'name'          => 'zakra_top_bar_column_1_widget_navigation',
					'type'          => 'control',
					'control'       => 'zakra-navigate',
					'section'       => 'zakra_header_top',
					'navigate_info' => array(
						'target_container' => 'section',
						'target_id'        => 'sidebar-widgets-top-bar-col-1-sidebar',
						'target_label'     => esc_html__( 'Column 1', 'zakra' ),
					),
					'dependency'    => array(
						'conditions' => array(
							array(
								'zakra_enable_top_bar',
								'==',
								true,
							),
							array(
								'zakra_top_bar_column_1_content_type',
								'==',
								'widget',
							),
						),
						'operator'   => 'AND',
					),
					'priority'      => 85,
				),

				array(
					'name'       => 'zakra_top_bar_column_2_heading',
					'type'       => 'control',
					'control'    => 'zakra-title',
					'label'      => esc_html__( 'Column 2', 'zakra' ),
					'section'    => 'zakra_header_top',
					'priority'   => 90,
					'dependency' => array(
						'conditions' => array(
							array(
								'zakra_enable_top_bar',
								'==',
								true,
							),
							array(
								'zakra_top_bar_layout',
								'!=',
								'layout-1',
							),
						),
						'operator'   => 'AND',
					),
				),

				array(
					'name'       => 'zakra_top_bar_column_2_content_type',
					'default'    => 'none',
					'type'       => 'control',
					'control'    => 'select',
					'section'    => 'zakra_header_top',
					'choices'    => array(
						'none'      => esc_html__( 'None', 'zakra' ),
						'text_html' => esc_html__( 'Text/HTML', 'zakra' ),
						'menu'      => esc_html__( 'Menu', 'zakra' ),
						'widget'    => esc_html__( 'Widget', 'zakra' ),
					),
					'priority'   => 90,
					'dependency' => array(
						'conditions' => array(
							array(
								'zakra_enable_top_bar',
								'==',
								true,
							),
							array(
								'zakra_top_bar_layout',
								'!=',
								'layout-1',
							),
						),
						'operator'   => 'AND',
					),
				),

				array(
					'name'       => 'zakra_top_bar_column_2_html',
					'default'    => '',
					'type'       => 'control',
					'control'    => 'zakra-editor',
					'section'    => 'zakra_header_top',
					'transport'  => 'postMessage',
					'partial'    => array(
						'selector'        => '.zak-top-bar__2',
						'render_callback' => 'Zakra_Customizer_Partials::customize_partial_top_bar_column_2_html',
					),
					'label'      => esc_html__( 'Text/HTML for Column 2', 'zakra' ),
					'priority'   => 95,
					'dependency' => array(
						'conditions' => array(
							array(
								'zakra_enable_top_bar',
								'==',
								true,
							),
							array(
								'zakra_top_bar_column_2_content_type',
								'==',
								'text_html',
							),
						),
						'operator'   => 'AND',
					),
				),

				array(
					'name'       => 'zakra_top_bar_column_2_menu',
					'default'    => 'none',
					'type'       => 'control',
					'control'    => 'select',
					'section'    => 'zakra_header_top',
					'label'      => esc_html__( 'Select a Menu for Column 2', 'zakra' ),
					'choices'    => zakra_get_menu_options(),
					'priority'   => 95,
					'dependency' => array(
						'conditions' => array(
							array(
								'zakra_enable_top_bar',
								'==',
								true,
							),
							array(
								'zakra_top_bar_column_2_content_type',
								'==',
								'menu',
							),
						),
						'operator'   => 'AND',
					),
				),

				array(
					'name'          => 'zakra_top_bar_column_2_widget_navigation',
					'type'          => 'control',
					'control'       => 'zakra-navigate',
					'section'       => 'zakra_header_top',
					'navigate_info' => array(
						'target_container' => 'section',
						'target_id'        => 'sidebar-widgets-top-bar-col-2-sidebar',
						'target_label'     => esc_html__( 'Column 2', 'zakra' ),
					),
					'dependency'    => array(
						'conditions' => array(
							array(
								'zakra_enable_top_bar',
								'==',
								true,
							),
							array(
								'zakra_top_bar_column_2_content_type',
								'==',
								'widget',
							),
						),
						'operator'   => 'AND',
					),
					'priority'      => 95,
				),

			);

			$options = array_merge( $options, $configs );

			if ( ! zakra_is_zakra_pro_active() ) {

				$configs[] = array(
					'name'        => 'zakra_header_top_upgrade',
					'type'        => 'control',
					'control'     => 'zakra-upgrade',
					'label'       => esc_html__( 'Learn more', 'zakra' ),
					'description' => esc_html__( 'Unlock more features available in Pro version.', 'zakra' ),
					'url'         => esc_url( 'https://zakratheme.com/pricing/?utm_source=zakra-theme&utm_medium=customizer-option-name&utm_campaign=zakra-customizer+&utm_content=Learn+More ' ),
					'section'     => 'zakra_header_top',
					'priority'    => 145,
				);

				$options = array_merge( $options, $configs );
			}

			return $options;
		}

	}

	new Zakra_Customize_Top_Bar_Option();

endif;
