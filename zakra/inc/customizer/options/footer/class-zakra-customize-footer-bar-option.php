<?php
/**
 * Footer bottom bar options.
 *
 * @package     zakra
 */

defined( 'ABSPATH' ) || exit;

/*========================================== FOOTER > FOOTER  BAR ==========================================*/
if ( ! class_exists( 'Zakra_Customize_Footer_Bar_Option' ) ) :

	/**
	 * Footer option.
	 */
	class Zakra_Customize_Footer_Bar_Option extends Zakra_Customize_Base_Option {

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
					'name'     => 'zakra_footer_bar_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'label'    => esc_html__( 'Footer Bar', 'zakra' ),
					'section'  => 'zakra_footer_bar',
					'priority' => 5,
				),

				array(
					'name'     => 'zakra_footer_bar_general_heading',
					'type'     => 'control',
					'control'  => 'zakra-subtitle',
					'label'    => esc_html__( 'General', 'zakra' ),
					'section'  => 'zakra_footer_bar',
					'priority' => 10,
				),

				array(
					'name'      => 'zakra_footer_bar_style',
					'default'   => 'style-2',
					'type'      => 'control',
					'control'   => 'zakra-radio-image',
					'label'     => esc_html__( 'Style', 'zakra' ),
					'section'   => 'zakra_footer_bar',
					'transport' => 'postMessage',
					'image_col' => 2,
					'choices'   => apply_filters(
						'zakra_footer_bar_style_choices',
						array(
							'style-1' => array(
								'label' => '',
								'url'   => ZAKRA_PARENT_INC_ICON_URI . '/footer-bar-left.svg',
							),
							'style-2' => array(
								'label' => '',
								'url'   => ZAKRA_PARENT_INC_ICON_URI . '/footer-bar-center.svg',
							),
						)
					),
					//                  'dependency' => apply_filters( 'zakra_footer_bar_style_cb', false ),
					'priority'  => 20,
				),

				// Divider.
				array(
					'name'     => 'zakra_footer_bar_style_divider',
					'type'     => 'control',
					'control'  => 'zakra-divider',
					'style'    => 'dashed',
					'section'  => 'zakra_footer_bar',
					'priority' => 30,
				),

				array(
					'name'     => 'zakra_footer_bar_style_heading',
					'type'     => 'control',
					'control'  => 'zakra-subtitle',
					'label'    => esc_html__( 'Style', 'zakra' ),
					'section'  => 'zakra_footer_bar',
					'priority' => 35,
				),

				array(
					'name'     => 'zakra_footer_bar_background_group',
					'type'     => 'control',
					'control'  => 'zakra-group',
					'label'    => esc_html__( 'Background', 'zakra' ),
					'section'  => 'zakra_footer_bar',
					'priority' => 40,
			//                  'dependency' => apply_filters( 'zakra_footer_bar_text_color_cb', false ),
				),

				array(
					'name'      => 'zakra_footer_bar_background',
					'default'   => array(
						'background-color'      => '#18181B',
						'background-image'      => '',
						'background-repeat'     => 'repeat',
						'background-position'   => 'center center',
						'background-size'       => 'contain',
						'background-attachment' => 'scroll',
					),
					'type'      => 'sub-control',
					'control'   => 'zakra-background',
					'parent'    => 'zakra_footer_bar_background_group',
					'section'   => 'zakra_footer_bar',
					'transport' => 'postMessage',
					'priority'  => 40,
				//                  'dependency' => apply_filters( 'zakra_footer_bar_bg_cb', false ),
				),

				// Divider.
				array(
					'name'     => 'zakra_footer_bar_border_top_divider',
					'type'     => 'control',
					'control'  => 'zakra-divider',
					'style'    => 'dashed',
					'section'  => 'zakra_footer_bar',
					'priority' => 50,
				),

				array(
					'name'     => 'zakra_footer_bar_border_heading',
					'type'     => 'control',
					'control'  => 'zakra-subtitle',
					'label'    => esc_html__( 'Border Top', 'zakra' ),
					'section'  => 'zakra_footer_bar',
					'priority' => 50,
			//                  'dependency' => apply_filters( 'zakra_footer_bar_border_heading_cb', false ),
				),

				array(
					'name'        => 'zakra_footer_bar_border_top_width',
					'default'     => array(
						'size' => 1,
						'unit' => 'px',
					),
					'suffix'      => array( 'px' ),
					'type'        => 'control',
					'control'     => 'zakra-slider',
					'label'       => esc_html__( 'Width', 'zakra' ),
					'section'     => 'zakra_footer_bar',
					'transport'   => 'postMessage',
					'priority'    => 55,
					'input_attrs' => array(
						'px' => array(
							'min'  => 0,
							'max'  => 100,
							'step' => 1,
						),
					),
				//                  'dependency' => apply_filters( 'zakra_footer_bar_border_top_width_cb', false ),
				),

				array(
					'name'     => 'zakra_footer_bar_border_top_color_group',
					'type'     => 'control',
					'control'  => 'zakra-group',
					'label'    => esc_html__( 'Color', 'zakra' ),
					'section'  => 'zakra_footer_bar',
					'priority' => 60,
				),

				array(
					'name'      => 'zakra_footer_bar_border_top_color',
					'default'   => '#3f3f46',
					'type'      => 'sub-control',
					'control'   => 'zakra-color',
					'parent'    => 'zakra_footer_bar_border_top_color_group',
					'section'   => 'zakra_footer_bar',
					'transport' => 'postMessage',
					'priority'  => 60,
			//                  'dependency' => apply_filters( 'zakra_footer_bar_border_top_color_cb', false ),
				),

				array(
					'name'     => 'zakra_footer_bar_column_1_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'label'    => esc_html__( 'Column 1', 'zakra' ),
					'section'  => 'zakra_footer_bar',
					'priority' => 65,
			//                  'dependency' => apply_filters( 'zakra_footer_bar_section_one_cb', false ),
				),

				array(
					'name'     => 'zakra_footer_bar_column_1_content_type',
					'default'  => 'text_html',
					'type'     => 'control',
					'control'  => 'select',
					'section'  => 'zakra_footer_bar',
					'choices'  => apply_filters(
						'zakra_footer_bar_section_one_choices',
						array(
							'none'      => esc_html__( 'None', 'zakra' ),
							'text_html' => esc_html__( 'Text/HTML', 'zakra' ),
							'menu'      => esc_html__( 'Menu', 'zakra' ),
							'widget'    => esc_html__( 'Widget', 'zakra' ),
						)
					),
					'priority' => 70,
				//                  'dependency' => apply_filters( 'zakra_footer_bar_section_one_cb', false ),
				),

				array(
					'name'        => 'zakra_footer_bar_column_1_html',
					'default'     => sprintf(
						/* translators: 1: Current Year, 2: Site Name, 3: Theme Link, 4: WordPress Link. */
						esc_html__( 'Copyright &copy; %1$s %2$s. Powered by %3$s and %4$s.', 'zakra' ),
						'{the-year}',
						'{site-link}',
						'{theme-link}',
						'{wp-link}'
					),
					'type'        => 'control',
					'control'     => 'zakra-editor',
					'section'     => 'zakra_footer_bar',
					'label'       => esc_html__( 'Text/HTML for Column 1', 'zakra' ),
					'description' => wp_kses(
						'<a href="' . esc_url( 'https://docs.zakratheme.com/en/article/dynamic-strings-for-footer-copyright-content-13empt5/' ) . '" target="_blank">' . esc_html__( 'Docs Link', 'zakra' ) . '</a>',
						array(
							'a' => array(
								'href'   => true,
								'target' => true,
							),
						)
					),
					'priority'    => 70,
					'transport'   => 'postMessage',
					'partial'     => array(
						'selector'        => '.zak-site-footer-section-1',
						'render_callback' => 'Zakra_Customizer_Partials::customize_partial_footer_bar_1_html',
					),
					'dependency'  => apply_filters(
						'zakra_footer_bar_section_one_html_cb',
						array(
							'zakra_footer_bar_column_1_content_type',
							'==',
							'text_html',
						)
					),
				),

				array(
					'name'       => 'zakra_footer_bar_column_1_menu',
					'default'    => 'none',
					'type'       => 'control',
					'control'    => 'select',
					'section'    => 'zakra_footer_bar',
					'label'      => esc_html__( 'Select a Menu for Column 1', 'zakra' ),
					'choices'    => zakra_get_menu_options(),
					'priority'   => 70,
					'dependency' => apply_filters(
						'zakra_footer_bar_section_one_menu_cb',
						array(
							'zakra_footer_bar_column_1_content_type',
							'===',
							'menu',
						)
					),
				),

				array(
					'name'          => 'zakra_footer_bar_column_1_widget_navigation',
					'type'          => 'control',
					'control'       => 'zakra-navigate',
					'section'       => 'zakra_footer_bar',
					'navigate_info' => array(
						'target_container' => 'section',
						'target_id'        => 'sidebar-widgets-footer-bar-col-1-sidebar',
						'target_label'     => esc_html__( 'Column 1', 'zakra' ),
					),
					'dependency'    => array(
						'conditions' => array(
							array(
								'zakra_footer_bar_column_1_content_type',
								'==',
								'widget',
							),
						),
						'operator'   => 'AND',
					),
					'priority'      => 70,
				),

				array(
					'name'     => 'zakra_footer_bar_column_2_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'label'    => esc_html__( 'Column 2', 'zakra' ),
					'section'  => 'zakra_footer_bar',
					'priority' => 80,
			//                  'dependency' => apply_filters( 'zakra_footer_bar_section_one_cb', false ),
				),

				array(
					'name'     => 'zakra_footer_bar_column_2_content_type',
					'default'  => 'none',
					'type'     => 'control',
					'control'  => 'select',
					'section'  => 'zakra_footer_bar',
					'choices'  => apply_filters(
						'zakra_footer_bar_section_two_choices',
						array(
							'none'      => esc_html__( 'None', 'zakra' ),
							'text_html' => esc_html__( 'Text/HTML', 'zakra' ),
							'menu'      => esc_html__( 'Menu', 'zakra' ),
							'widget'    => esc_html__( 'Widget', 'zakra' ),
						)
					),
					'priority' => 85,
				//                  'dependency' => apply_filters( 'zakra_footer_bar_section_two_cb', false ),
				),

				array(
					'name'       => 'zakra_footer_bar_column_2_html',
					'default'    => '',
					'type'       => 'control',
					'control'    => 'zakra-editor',
					'section'    => 'zakra_footer_bar',
					'label'      => esc_html__( 'Text/HTML for Column 2', 'zakra' ),
					'transport'  => 'postMessage',
					'partial'    => array(
						'selector'        => '.zak-site-footer-section-2',
						'render_callback' => 'Zakra_Customizer_Partials::customize_partial_footer_bar_section_two_html',
					),
					'priority'   => 85,
					'dependency' => apply_filters(
						'zakra_footer_bar_section_two_html_cb',
						array(
							'zakra_footer_bar_column_2_content_type',
							'===',
							'text_html',
						)
					),
				),

				array(
					'name'       => 'zakra_footer_bar_column_2_menu',
					'default'    => 'none',
					'type'       => 'control',
					'control'    => 'select',
					'section'    => 'zakra_footer_bar',
					'label'      => esc_html__( 'Select a Menu for Column 2', 'zakra' ),
					'choices'    => zakra_get_menu_options(),
					'priority'   => 85,
					'dependency' => apply_filters(
						'zakra_footer_bar_section_two_menu_cb',
						array(
							'zakra_footer_bar_column_2_content_type',
							'===',
							'menu',
						)
					),
				),

				array(
					'name'          => 'zakra_footer_bar_column_2_widget_navigation',
					'type'          => 'control',
					'control'       => 'zakra-navigate',
					'section'       => 'zakra_footer_bar',
					'navigate_info' => array(
						'target_container' => 'section',
						'target_id'        => 'sidebar-widgets-footer-bar-col-2-sidebar',
						'target_label'     => esc_html__( 'Column 2', 'zakra' ),
					),
					'dependency'    => array(
						'conditions' => array(
							array(
								'zakra_footer_bar_column_2_content_type',
								'==',
								'widget',
							),
						),
						'operator'   => 'AND',
					),
					'priority'      => 85,
				),

				array(
					'name'     => 'zakra_footer_bar_colors_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'label'    => esc_html__( 'Footer Content', 'zakra' ),
					'section'  => 'zakra_footer_bar',
					'priority' => 180,
			//                  'dependency' => apply_filters( 'zakra_footer_color_heading_cb', false ),
				),

				array(
					'name'     => 'zakra_footer_bar_text_color_group',
					'type'     => 'control',
					'control'  => 'zakra-group',
					'label'    => esc_html__( 'Color', 'zakra' ),
					'section'  => 'zakra_footer_bar',
					'priority' => 185,
			//                  'dependency' => apply_filters( 'zakra_footer_bar_text_color_cb', false ),
				),

				array(
					'name'      => 'zakra_footer_bar_text_color',
					'default'   => '#fafafa',
					'type'      => 'sub-control',
					'control'   => 'zakra-color',
					'parent'    => 'zakra_footer_bar_text_color_group',
					'section'   => 'zakra_footer_bar',
					'transport' => 'postMessage',
					'priority'  => 185,
			//                  'dependency' => apply_filters( 'zakra_footer_bar_text_color_cb', false ),
				),

				array(
					'name'     => 'zakra_footer_bar_link_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'label'    => esc_html__( 'Link', 'zakra' ),
					'section'  => 'zakra_footer_bar',
					'priority' => 200,
			//                  'dependency' => apply_filters( 'zakra_footer_color_heading_cb', false ),
				),

				array(
					'name'     => 'zakra_footer_bar_link_color_group',
					'default'  => '',
					'type'     => 'control',
					'control'  => 'zakra-group',
					'section'  => 'zakra_footer_bar',
					'label'    => esc_html__( 'Color', 'zakra' ),
					'priority' => 215,
			//                  'dependency' => apply_filters( 'zakra_footer_bar_link_color_group_cb', false ),
				),

				array(
					'name'      => 'zakra_footer_bar_link_color',
					'default'   => '',
					'type'      => 'sub-control',
					'control'   => 'zakra-color',
					'parent'    => 'zakra_footer_bar_link_color_group',
					'tab'       => esc_html__( 'Normal', 'zakra' ),
					'section'   => 'zakra_footer_bar',
					'transport' => 'postMessage',
					'priority'  => 215,
			//                  'dependency' => apply_filters( 'zakra_footer_bar_link_color_cb', false ),
				),

				array(
					'name'      => 'zakra_footer_bar_link_hover_color',
					'default'   => '',
					'type'      => 'sub-control',
					'control'   => 'zakra-color',
					'parent'    => 'zakra_footer_bar_link_color_group',
					'tab'       => esc_html__( 'Hover', 'zakra' ),
					'section'   => 'zakra_footer_bar',
					'transport' => 'postMessage',
					'priority'  => 215,
			//                  'dependency' => apply_filters( 'zakra_footer_bar_link_hover_color_cb', false ),
				),
			);

			$options = array_merge( $options, $configs );

			if ( ! zakra_is_zakra_pro_active() ) {

				$configs[] = array(
					'name'        => 'zakra_footer_bottom_bar_upgrade',
					'type'        => 'control',
					'control'     => 'zakra-upgrade',
					'label'       => esc_html__( 'Learn more', 'zakra' ),
					'description' => esc_html__( 'Unlock more features available in Pro version.', 'zakra' ),
					'url'         => esc_url( 'https://zakratheme.com/pricing/?utm_source=zakra-theme&utm_medium=customizer-option-name&utm_campaign=zakra-customizer+&utm_content=Learn+More ' ),
					'section'     => 'zakra_footer_bar',
					'priority'    => 300,
				);

				$options = array_merge( $options, $configs );
			}

			return $options;
		}

	}

	new Zakra_Customize_Footer_Bar_Option();

endif;
