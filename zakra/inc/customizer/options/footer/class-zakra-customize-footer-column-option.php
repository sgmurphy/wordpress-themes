<?php
/**
 * Footer widgets options.
 *
 * @package     zakra
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*== FOOTER > FOOTER WIDGETS ==*/
if ( ! class_exists( 'Zakra_Customize_Footer_Column_Option' ) ) :

	/**
	 * Option: Footer widget Option.
	 */
	class Zakra_Customize_Footer_Column_Option extends Zakra_Customize_Base_Option {

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
					'name'     => 'zakra_footer_column_general_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'label'    => esc_html__( 'General', 'zakra' ),
					'section'  => 'zakra_footer_column',
					'priority' => 5,
				),

				array(
					'name'     => 'zakra_enable_footer_column',
					'default'  => false,
					'type'     => 'control',
					'control'  => 'zakra-toggle',
					'label'    => esc_html__( 'Enable', 'zakra' ),
					'section'  => 'zakra_footer_column',
					'priority' => 10,
				),

				array(
					'name'       => 'zakra_footer_column_layout_1_style',
					'default'    => 'style-4',
					'type'       => 'control',
					'control'    => 'zakra-radio-image',
					'label'      => esc_html__( 'Advanced Style', 'zakra' ),
					'section'    => 'zakra_footer_column',
					'image_col'  => 2,
					'choices'    => apply_filters(
						'zakra_footer_widgets_style_choices',
						array(
							'style-1' => array(
								'label' => '',
								'url'   => ZAKRA_PARENT_INC_ICON_URI . '/footer-column-one.svg',
							),
							'style-2' => array(
								'label' => '',
								'url'   => ZAKRA_PARENT_INC_ICON_URI . '/footer-column-two.svg',
							),
							'style-3' => array(
								'label' => '',
								'url'   => ZAKRA_PARENT_INC_ICON_URI . '/footer-column-three.svg',
							),
							'style-4' => array(
								'label' => '',
								'url'   => ZAKRA_PARENT_INC_ICON_URI . '/footer-column-four.svg',
							),
						)
					),
					'priority'   => 25,
					'dependency' => array(
						'conditions' => array(
							array(
								'zakra_footer_column_layout',
								'!=',
								'layout-2',
							),
							array(
								'zakra_enable_footer_column',
								'==',
								true,
							),
						),
						'operator'   => 'AND',
					),
				),

				// Divider.
				array(
					'name'       => 'zakra_footer_column_divider',
					'type'       => 'control',
					'control'    => 'zakra-divider',
					'style'      => 'dashed',
					'section'    => 'zakra_footer_column',
					'priority'   => 30,
					'dependency' => array(
						'zakra_enable_footer_column',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_footer_column_style_subheading',
					'type'       => 'control',
					'control'    => 'zakra-subtitle',
					'label'      => esc_html__( 'Style', 'zakra' ),
					'section'    => 'zakra_footer_column',
					'priority'   => 30,
					'dependency' => array(
						'zakra_enable_footer_column',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_footer_column_background_group',
					'type'       => 'control',
					'control'    => 'zakra-group',
					'label'      => esc_html__( 'Background', 'zakra' ),
					'section'    => 'zakra_footer_column',
					'priority'   => 35,
					'dependency' => array(
						'zakra_enable_footer_column',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_footer_column_background',
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
					'parent'     => 'zakra_footer_column_background_group',
					'section'    => 'zakra_footer_column',
					'priority'   => 35,
					'transport'  => 'postMessage',
					'dependency' => array(
						'zakra_enable_footer_column',
						'==',
						true,
					),
				),

				// Divider.
				array(
					'name'       => 'zakra_footer_column_border_divider',
					'type'       => 'control',
					'control'    => 'zakra-divider',
					'style'      => 'dashed',
					'section'    => 'zakra_footer_column',
					'priority'   => 45,
					'dependency' => array(
						'zakra_enable_footer_column',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_footer_column_border_heading',
					'type'       => 'control',
					'control'    => 'zakra-subtitle',
					'label'      => esc_html__( 'Border Top', 'zakra' ),
					'section'    => 'zakra_footer_column',
					'priority'   => 45,
					'dependency' => array(
						'zakra_enable_footer_column',
						'==',
						true,
					),
				),

				array(
					'name'        => 'zakra_footer_column_border_top_width',
					'default'     => array(
						'size' => '',
						'unit' => 'px',
					),
					'suffix'      => array( 'px' ),
					'type'        => 'control',
					'control'     => 'zakra-slider',
					'label'       => esc_html__( 'Size', 'zakra' ),
					'section'     => 'zakra_footer_column',
					'transport'   => 'postMessage',
					'input_attrs' => array(
						'px' => array(
							'min'  => 0,
							'max'  => 20,
							'step' => 1,
						),
					),
					'priority'    => 50,
					'dependency'  => array(
						'zakra_enable_footer_column',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_footer_column_border_top_color_group',
					'type'       => 'control',
					'control'    => 'zakra-group',
					'label'      => esc_html__( 'Color', 'zakra' ),
					'section'    => 'zakra_footer_column',
					'priority'   => 55,
					'dependency' => array(
						'zakra_enable_footer_column',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_footer_column_border_top_color',
					'default'    => '#e9ecef',
					'type'       => 'sub-control',
					'control'    => 'zakra-color',
					'section'    => 'zakra_footer_column',
					'parent'     => 'zakra_footer_column_border_top_color_group',
					'transport'  => 'postMessage',
					'priority'   => 55,
					'dependency' => array(
						'zakra_enable_footer_column',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_footer_column_text_color_heading',
					'type'       => 'control',
					'control'    => 'zakra-title',
					'label'      => esc_html__( 'Text', 'zakra' ),
					'section'    => 'zakra_footer_column',
					'priority'   => 60,
					'dependency' => array(
						'zakra_enable_footer_column',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_footer_column_widget_text_color_group',
					'type'       => 'control',
					'control'    => 'zakra-group',
					'label'      => esc_html__( 'Color', 'zakra' ),
					'section'    => 'zakra_footer_column',
					'priority'   => 65,
					'dependency' => array(
						'zakra_enable_footer_column',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_footer_column_widget_text_color',
					'default'    => '#D4D4D8',
					'type'       => 'sub-control',
					'control'    => 'zakra-color',
					'section'    => 'zakra_footer_column',
					'parent'     => 'zakra_footer_column_widget_text_color_group',
					'transport'  => 'postMessage',
					'priority'   => 65,
					'dependency' => array(
						'zakra_enable_footer_column',
						'==',
						true,
					),
				),

				array(
					'name'       => ' zakra_footer_column_widget_link_color_heading',
					'type'       => 'control',
					'control'    => 'zakra-title',
					'label'      => esc_html__( 'Link', 'zakra' ),
					'section'    => 'zakra_footer_column',
					'priority'   => 65,
					'dependency' => array(
						'zakra_enable_footer_column',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_footer_column_widget_link_color_group',
					'default'    => '',
					'type'       => 'control',
					'control'    => 'zakra-group',
					'section'    => 'zakra_footer_column',
					'label'      => esc_html__( 'Color', 'zakra' ),
					'priority'   => 70,
					'dependency' => array(
						'zakra_enable_footer_column',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_footer_column_widget_link_color',
					'default'    => '',
					'type'       => 'sub-control',
					'control'    => 'zakra-color',
					'parent'     => 'zakra_footer_column_widget_link_color_group',
					'section'    => 'zakra_footer_column',
					'tab'        => esc_html__( 'Normal', 'zakra' ),
					'priority'   => 70,
					'dependency' => array(
						'zakra_enable_footer_column',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_footer_column_widget_link_hover_color',
					'default'    => '',
					'type'       => 'sub-control',
					'control'    => 'zakra-color',
					'parent'     => 'zakra_footer_column_widget_link_color_group',
					'section'    => 'zakra_footer_column',
					'tab'        => esc_html__( 'Hover', 'zakra' ),
					'priority'   => 70,
					'dependency' => array(
						'zakra_enable_footer_column',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_footer_column_widgets_title_heading',
					'type'       => 'control',
					'control'    => 'zakra-title',
					'label'      => esc_html__( 'Widget', 'zakra' ),
					'section'    => 'zakra_footer_column',
					'priority'   => 90,
					'dependency' => array(
						'zakra_enable_footer_column',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_footer_column_widgets_subtitle_heading',
					'type'       => 'control',
					'control'    => 'zakra-subtitle',
					'label'      => esc_html__( 'Title', 'zakra' ),
					'section'    => 'zakra_footer_column',
					'priority'   => 95,
					'dependency' => array(
						'zakra_enable_footer_column',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_enable_footer_widgets_title',
					'default'    => true,
					'type'       => 'control',
					'control'    => 'zakra-toggle',
					'label'      => esc_html__( 'Enable', 'zakra' ),
					'section'    => 'zakra_footer_column',
					'priority'   => 100,
					'dependency' => array(
						'zakra_enable_footer_column',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_footer_widgets_title_color_group',
					'type'       => 'control',
					'control'    => 'zakra-group',
					'label'      => esc_html__( 'Color', 'zakra' ),
					'section'    => 'zakra_footer_column',
					'priority'   => 105,
					'dependency' => array(
						'conditions' => array(
							array(
								'zakra_enable_footer_column',
								'==',
								true,
							),
							array(
								'zakra_enable_footer_widgets_title',
								'==',
								true,
							),
						),
						'operator'   => 'AND',
					),
				),

				array(
					'name'       => 'zakra_footer_widgets_title_color',
					'default'    => '',
					'type'       => 'sub-control',
					'control'    => 'zakra-color',
					'section'    => 'zakra_footer_column',
					'parent'     => 'zakra_footer_widgets_title_color_group',
					'priority'   => 105,
					'dependency' => array(
						'conditions' => array(
							array(
								'zakra_enable_footer_column',
								'==',
								true,
							),
							array(
								'zakra_enable_footer_widgets_title',
								'==',
								true,
							),
						),
						'operator'   => 'AND',
					),
				),

				// Divider.
				array(
					'name'       => 'zakra_footer_column_item_divider',
					'type'       => 'control',
					'control'    => 'zakra-divider',
					'style'      => 'dashed',
					'section'    => 'zakra_footer_column',
					'priority'   => 140,
					'dependency' => array(
						'zakra_enable_footer_column',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_footer_column_list_item_heading',
					'type'       => 'control',
					'control'    => 'zakra-subtitle',
					'label'      => esc_html__( 'List Item ', 'zakra' ),
					'section'    => 'zakra_footer_column',
					'priority'   => 140,
					'dependency' => array(
						'zakra_enable_footer_column',
						'==',
						true,
					),
				),

				array(
					'name'        => 'zakra_footer_widgets_item_border_bottom_width',
					'default'     => array(
						'size' => '',
						'unit' => 'px',
					),
					'suffix'      => array( 'px' ),
					'type'        => 'control',
					'control'     => 'zakra-slider',
					'label'       => esc_html__( 'Border Bottom Width', 'zakra' ),
					'section'     => 'zakra_footer_column',
					'transport'   => 'postMessage',
					'input_attrs' => array(
						'px' => array(
							'min'  => 0,
							'max'  => 20,
							'step' => 1,
						),
					),
					'priority'    => 160,
					'dependency'  => array(
						'zakra_enable_footer_column',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_footer_widgets_item_border_bottom_color_group',
					'type'       => 'control',
					'control'    => 'zakra-group',
					'label'      => esc_html__( 'Border Bottom Color', 'zakra' ),
					'section'    => 'zakra_footer_column',
					'priority'   => 165,
					'dependency' => array(
						'zakra_enable_footer_column',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_footer_widgets_item_border_bottom_color',
					'default'    => '#e9ecef',
					'type'       => 'sub-control',
					'control'    => 'zakra-color',
					'section'    => 'zakra_footer_column',
					'transport'  => 'postMessage',
					'parent'     => 'zakra_footer_widgets_item_border_bottom_color_group',
					'priority'   => 165,
					'dependency' => array(
						'zakra_enable_footer_column',
						'==',
						true,
					),
				),

			);

			$options = array_merge( $options, $configs );

			if ( ! zakra_is_zakra_pro_active() ) {

				$configs[] = array(
					'name'        => 'zakra_footer_widgets_upgrade',
					'type'        => 'control',
					'control'     => 'zakra-upgrade',
					'label'       => esc_html__( 'Learn more', 'zakra' ),
					'description' => esc_html__( 'Unlock more features available in Pro version.', 'zakra' ),
					'url'         => esc_url( 'https://zakratheme.com/pricing/?utm_source=zakra-theme&utm_medium=customizer-option-name&utm_campaign=zakra-customizer+&utm_content=Learn+More ' ),
					'section'     => 'zakra_footer_column',
					'priority'    => 165,
				);

				$options = array_merge( $options, $configs );
			}

			return $options;
		}

	}

	new Zakra_Customize_Footer_Column_Option();

endif;
