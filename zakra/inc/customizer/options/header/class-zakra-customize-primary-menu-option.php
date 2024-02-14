<?php
/**
 * Primary menu.
 *
 * @package zakra
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*== MENU > PRIMARY MENU ==*/
if ( ! class_exists( 'Zakra_Customize_Primary_Menu_Option' ) ) :

	/**
	 * Primary Menu option.
	 */
	class Zakra_Customize_Primary_Menu_Option extends Zakra_Customize_Base_Option
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
					'name'     => 'zakra_primary_menu_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'label'    => esc_html__( 'Primary Menu', 'zakra' ),
					'section'  => 'zakra_menu',
					'priority' => 5,
				),

				array(
					'name'     => 'zakra_primary_menu_general_heading',
					'type'     => 'control',
					'control'  => 'zakra-subtitle',
					'label'    => esc_html__( 'General', 'zakra' ),
					'section'  => 'zakra_menu',
					'priority' => 5,
				),

				array(
					'name'     => 'zakra_enable_primary_menu',
					'default'  => true,
					'type'     => 'control',
					'control'  => 'zakra-toggle',
					'label'    => esc_html__( 'Enable', 'zakra' ),
					'section'  => 'zakra_menu',
					'priority' => 10,
				),

				array(
					'name'       => 'zakra_primary_menu_extra',
					'default'    => false,
					'type'       => 'control',
					'control'    => 'zakra-toggle',
					'label'      => esc_html__( 'Priority plus navigation', 'zakra' ),
					'section'    => 'zakra_menu',
					'priority'   => 10,
					'dependency' => array(
						'zakra_enable_primary_menu',
						'==',
						true,
					),
				),

				// Divider.
				array(
					'name'       => 'zakra_primary_menu_divider',
					'type'       => 'control',
					'control'    => 'zakra-divider',
					'style'      => 'dashed',
					'section'    => 'zakra_menu',
					'priority'   => 15,
					'dependency' => array(
						'zakra_enable_primary_menu',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_primary_menu_border_heading',
					'type'       => 'control',
					'control'    => 'zakra-subtitle',
					'label'      => esc_html__( 'Border Bottom', 'zakra' ),
					'section'    => 'zakra_menu',
					'priority'   => 20,
					'dependency' => array(
						'zakra_enable_primary_menu',
						'==',
						true,
					),
				),

				array(
					'name'        => 'zakra_primary_menu_border_bottom_width',
					'default'     => array(
						'size' => '',
						'unit' => 'px',
					),
					'suffix'      => array( 'px' ),
					'type'        => 'control',
					'control'     => 'zakra-slider',
					'label'       => esc_html__( 'Width', 'zakra' ),
					'section'     => 'zakra_menu',
					'transport'   => 'postMessage',
					'priority'    => 20,
					'input_attrs' => array(
						'px' => array(
							'min'  => 0,
							'max'  => 20,
							'step' => 1,
						),
					),
					'dependency'  => array(
						'zakra_enable_primary_menu',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_primary_menu_border_bottom_color_group',
					'type'       => 'control',
					'control'    => 'zakra-group',
					'label'      => esc_html__( 'Color', 'zakra' ),
					'section'    => 'zakra_menu',
					'priority'   => 25,
					'dependency' => array(
						'zakra_enable_primary_menu',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_primary_menu_border_bottom_color',
					'default'    => '#e9ecef',
					'type'       => 'sub-control',
					'control'    => 'zakra-color',
					'parent'     => 'zakra_primary_menu_border_bottom_color_group',
					'section'    => 'zakra_menu',
					'priority'   => 25,
					'dependency' => array(
						'zakra_enable_primary_menu',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_main_menu_heading',
					'type'       => 'control',
					'control'    => 'zakra-title',
					'label'      => esc_html__( 'Main Menu', 'zakra' ),
					'section'    => 'zakra_menu',
					'priority'   => 25,
					'dependency' => array(
						'zakra_enable_primary_menu',
						'==',
						true,
					),
				),

				array(
					'name'     => 'zakra_main_menu_general_heading',
					'type'     => 'control',
					'control'  => 'zakra-subtitle',
					'label'    => esc_html__( 'General', 'zakra' ),
					'section'  => 'zakra_menu',
					'priority' => 30,
					'dependency' => array(
						'zakra_enable_primary_menu',
						'==',
						true,
					),
				),

				array(
					'name'            => 'zakra_main_menu_layout_1_style',
					'default'         => 'style-1',
					'type'            => 'control',
					'control'         => 'zakra-radio-image',
					'label'           => esc_html__( 'Advanced Style', 'zakra' ),
					'choices'         => apply_filters(
						'zakra_main_menu_layout_1_style_choices',
						array(
							'style-1' => array(
								'label' => 'None',
								'url'   => ZAKRA_PARENT_INC_ICON_URI . '/menu-active-none.svg',
							),
							'style-2' => array(
								'label' => 'Underline Border',
								'url'   => ZAKRA_PARENT_INC_ICON_URI . '/menu-active-underline.svg',
							),
							'style-3' => array(
								'label' => 'Left Border',
								'url'   => ZAKRA_PARENT_INC_ICON_URI . '/menu-active-left.svg',
							),
							'style-4' => array(
								'label' => 'Right Border',
								'url'   => ZAKRA_PARENT_INC_ICON_URI . '/menu-active-right.svg',
							),
						)
					),
					'image_col'       => 2,
					'section'         => 'zakra_menu',
					'priority'        => 35,
					'active_callback' => function () {
						if ( 'default' === get_theme_mod( 'zakra_primary_menu_item_style', 'default' ) && get_theme_mod( 'zakra_enable_primary_menu', true ) && 'layout-2' !== get_theme_mod( 'zakra_main_menu_layout', 'layout-1' ) ) {
							return true;
						}

						return false;
					},
				),

				array(
					'name'       => 'zakra_main_menu_style_divider',
					'type'       => 'control',
					'control'    => 'zakra-divider',
					'style'      => 'dashed',
					'section'    => 'zakra_menu',
					'priority'   => 36,
					'dependency' => array(
						'zakra_enable_primary_menu',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_main_menu_style_heading',
					'type'       => 'control',
					'control'    => 'zakra-subtitle',
					'label'      => esc_html__( 'Style', 'zakra' ),
					'section'    => 'zakra_menu',
					'priority'   => 36,
					'dependency' => array(
						'zakra_enable_primary_menu',
						'==',
						true,
					),
				),

				array(
					'name'            => 'zakra_main_menu_color_group',
					'type'            => 'control',
					'control'         => 'zakra-group',
					'label'           => esc_html__( 'Color', 'zakra' ),
					'section'         => 'zakra_menu',
					'priority'        => 40,
					'active_callback' => function () {
						if ( 'default' === get_theme_mod( 'zakra_primary_menu_item_style', 'default' ) && get_theme_mod( 'zakra_enable_primary_menu', true ) ) {
							return true;
						}

						return false;
					},
				),

				array(
					'name'            => 'zakra_main_menu_color',
					'default'         => '',
					'type'            => 'sub-control',
					'control'         => 'zakra-color',
					'parent'          => 'zakra_main_menu_color_group',
					'tab'             => esc_html__( 'Normal', 'zakra' ),
					'section'         => 'zakra_menu',
					'priority'        => 50,
					'active_callback' => function () {
						if ( 'default' === get_theme_mod( 'zakra_primary_menu_item_style', 'default' ) && get_theme_mod( 'zakra_enable_primary_menu', true ) ) {
							return true;
						}

						return false;
					},
				),

				array(
					'name'            => 'zakra_main_menu_hover_color',
					'default'         => '',
					'type'            => 'sub-control',
					'control'         => 'zakra-color',
					'parent'          => 'zakra_main_menu_color_group',
					'tab'             => esc_html__( 'Hover', 'zakra' ),
					'section'         => 'zakra_menu',
					'priority'        => 50,
					'active_callback' => function () {
						if ( 'default' === get_theme_mod( 'zakra_primary_menu_item_style', 'default' ) && get_theme_mod( 'zakra_enable_primary_menu', true ) ) {
							return true;
						}

						return false;
					},
				),

				array(
					'name'            => 'zakra_main_menu_active_color',
					'default'         => '',
					'type'            => 'sub-control',
					'control'         => 'zakra-color',
					'parent'          => 'zakra_main_menu_color_group',
					'tab'             => esc_html__( 'Active', 'zakra' ),
					'section'         => 'zakra_menu',
					'transport'       => 'postMessage',
					'priority'        => 50,
					'active_callback' => function () {
						if ( 'default' === get_theme_mod( 'zakra_primary_menu_item_style', 'default' ) && get_theme_mod( 'zakra_enable_primary_menu', true ) ) {
							return true;
						}

						return false;
					},
				),

				array(
					'name'       => 'zakra_main_menu_typography_group',
					'type'       => 'control',
					'control'    => 'zakra-group',
					'label'      => esc_html__( 'Typography', 'zakra' ),
					'section'    => 'zakra_menu',
					'priority'   => 60,
					'dependency' => array(
						'zakra_enable_primary_menu',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_main_menu_typography',
					'default'    => array(
						'font-family'    => 'default',
						'font-weight'    => 'regular',
						'font-size'      => array(
							'desktop' => array(
								'size' => '1.6',
								'unit' => 'rem',
							),
							'tablet'  => array(
								'size' => '',
								'unit' => '',
							),
							'mobile'  => array(
								'size' => '',
								'unit' => '',
							),
						),
						'line-height'    => array(
							'desktop' => array(
								'size' => '1.8',
								'unit' => '-',
							),
							'tablet'  => array(
								'size' => '',
								'unit' => '',
							),
							'mobile'  => array(
								'size' => '',
								'unit' => '',
							),
						),
						'font-style'     => 'normal',
						'text-transform' => 'none',
					),
					'type'       => 'sub-control',
					'control'    => 'zakra-typography',
					'parent'     => 'zakra_main_menu_typography_group',
					'section'    => 'zakra_menu',
					'transport'  => 'postMessage',
					'priority'   => 60,
					'dependency' => array(
						'zakra_enable_primary_menu',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_sub_menu_heading',
					'type'       => 'control',
					'control'    => 'zakra-title',
					'label'      => esc_html__( 'Sub Menu', 'zakra' ),
					'section'    => 'zakra_menu',
					'priority'   => 65,
					'dependency' => array(
						'zakra_enable_primary_menu',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_sub_menu_typography_group',
					'type'       => 'control',
					'control'    => 'zakra-group',
					'label'      => esc_html__( 'Typography', 'zakra' ),
					'section'    => 'zakra_menu',
					'priority'   => 75,
					'dependency' => array(
						'zakra_enable_primary_menu',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_sub_menu_typography',
					'default'    => array(
						'font-family'    => 'default',
						'font-weight'    => '400',
						'font-size'      => array(
							'desktop' => array(
								'size' => '1.6',
								'unit' => 'rem',
							),
							'tablet'  => array(
								'size' => '',
								'unit' => '',
							),
							'mobile'  => array(
								'size' => '',
								'unit' => '',
							),
						),
						'line-height'    => array(
							'desktop' => array(
								'size' => '1.8',
								'unit' => '-',
							),
							'tablet'  => array(
								'size' => '',
								'unit' => '',
							),
							'mobile'  => array(
								'size' => '',
								'unit' => '',
							),
						),
						'font-style'     => 'normal',
						'text-transform' => 'none',
					),
					'type'       => 'sub-control',
					'control'    => 'zakra-typography',
					'parent'     => 'zakra_sub_menu_typography_group',
					'section'    => 'zakra_menu',
					'transport'  => 'postMessage',
					'priority'   => 75,
					'dependency' => array(
						'zakra_enable_primary_menu',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_mobile_menu_heading',
					'type'       => 'control',
					'control'    => 'zakra-title',
					'label'      => esc_html__( 'Mobile Menu', 'zakra' ),
					'section'    => 'zakra_menu',
					'priority'   => 80,
					'dependency' => array(
						'zakra_enable_primary_menu',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_mobile_menu_typography_group',
					'type'       => 'control',
					'control'    => 'zakra-group',
					'label'      => esc_html__( 'Typography', 'zakra' ),
					'section'    => 'zakra_menu',
					'priority'   => 160,
					'dependency' => array(
						'zakra_enable_primary_menu',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_mobile_menu_typography',
					'default'    => array(
						'font-family'    => 'default',
						'font-weight'    => '400',
						'font-size'      => array(
							'desktop' => array(
								'size' => '1.6',
								'unit' => 'rem',
							),
							'tablet'  => array(
								'size' => '',
								'unit' => '',
							),
							'mobile'  => array(
								'size' => '1.6',
								'unit' => 'rem',
							),
						),
						'line-height'    => array(
							'desktop' => array(
								'size' => '1.8',
								'unit' => '-',
							),
							'tablet'  => array(
								'size' => '',
								'unit' => '',
							),
							'mobile'  => array(
								'size' => '1.8',
								'unit' => '-',
							),
						),
						'font-style'     => 'normal',
						'text-transform' => 'none',
					),
					'type'       => 'sub-control',
					'control'    => 'zakra-typography',
					'parent'     => 'zakra_mobile_menu_typography_group',
					'section'    => 'zakra_menu',
					'transport'  => 'postMessage',
					'priority'   => 160,
					'dependency' => array(
						'zakra_enable_primary_menu',
						'==',
						true,
					),
				),

			);

			$options = array_merge( $options, $configs );

			if ( ! zakra_is_zakra_pro_active() ) {

				$configs[] = array(
					'name'        => 'zakra_primary_menu_upgrade',
					'type'        => 'control',
					'control'     => 'zakra-upgrade',
					'label'       => esc_html__( 'Learn more', 'zakra' ),
					'description' => esc_html__( 'Unlock more features available in Pro version.', 'zakra' ),
					'url'         => esc_url( 'https://zakratheme.com/colormag-pricing/?utm_source=zakra-theme&utm_medium=customizer-option-name&utm_campaign=zakra-customizer+&utm_content=Learn+More ' ),
					'section'     => 'zakra_menu',
					'priority'    => 200,
				);

				$options = array_merge( $options, $configs );
			}

			return $options;
		}

	}

	new Zakra_Customize_Primary_Menu_Option();

endif;
