<?php
/**
 * Breadcrumb options
 *
 * @package     zakra
 */

defined( 'ABSPATH' ) || exit;

/*== CONTENT > PAGE HEADER ==*/
if ( ! class_exists( 'Zakra_Customize_Breadcrumb_Option' ) ) :

	/**
	 * Archive/Blog option.
	 */
	class Zakra_Customize_Breadcrumb_Option extends Zakra_Customize_Base_Option {

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
					'name'     => 'zakra_breadcrumbs_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'label'    => esc_html__( 'Breadcrumbs', 'zakra' ),
					'section'  => 'zakra_breadcrumb',
					'priority' => 5,
				),

				array(
					'name'     => 'zakra_breadcrumbs_general_heading',
					'type'     => 'control',
					'control'  => 'zakra-subtitle',
					'label'    => esc_html__( 'General', 'zakra' ),
					'section'  => 'zakra_breadcrumb',
					'priority' => 5,
				),

				array(
					'name'     => 'zakra_enable_breadcrumb',
					'default'  => true,
					'type'     => 'control',
					'control'  => 'zakra-toggle',
					'label'    => esc_html__( 'Enable', 'zakra' ),
					'section'  => 'zakra_breadcrumb',
					'priority' => 10,
				),

				// Divider.
				array(
					'name'     => 'zakra_breadcrumb_divider',
					'type'     => 'control',
					'control'  => 'zakra-divider',
					'style'    => 'dashed',
					'section'  => 'zakra_breadcrumb',
					'priority' => 30,
					'dependency' => array(
						'zakra_enable_breadcrumb',
						'==',
						true,
					),
				),

				array(
					'name'     => 'zakra_breadcrumb_style_subheading',
					'type'     => 'control',
					'control'  => 'zakra-subtitle',
					'label'    => esc_html__( 'Style', 'zakra' ),
					'section'  => 'zakra_breadcrumb',
					'priority' => 35,
					'dependency' => array(
						'zakra_enable_breadcrumb',
						'==',
						true,
					),
				),

				array(
					'name'     => 'zakra_breadcrumb_typography_group',
					'type'     => 'control',
					'control'  => 'zakra-group',
					'label'    => esc_html__( 'Typography', 'zakra' ),
					'section'  => 'zakra_breadcrumb',
					'priority' => 40,
					'dependency' => array(
						'zakra_enable_breadcrumb',
						'==',
						true,
					),
				),

				array(
					'name'      => 'zakra_breadcrumb_typography',
					'default'   => apply_filters(
						'zakra_breadcrumb_typography_filter',
						array(
							'font-family'    => 'default',
							'font-weight'    => '500',
							'font-size'      => array(
								'desktop' => array(
									'size' => '16',
									'unit' => 'px',
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
						)
					),
					'type'      => 'sub-control',
					'control'   => 'zakra-typography',
					'parent'    => 'zakra_breadcrumb_typography_group',
					'section'   => 'zakra_breadcrumb',
					'transport' => 'postMessage',
					'priority'  => 40,
					'dependency' => array(
						'zakra_enable_breadcrumb',
						'==',
						true,
					),
				),

				array(
					'name'     => 'zakra_breadcrumb_text_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'label'    => esc_html__( 'Text', 'zakra' ),
					'section'  => 'zakra_breadcrumb',
					'priority' => 55,
					'dependency' => array(
						'zakra_enable_breadcrumb',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_breadcrumbs_text_color_group',
					'type'       => 'control',
					'control'    => 'zakra-group',
					'label'      => esc_html__( 'Color', 'zakra' ),
					'section'    => 'zakra_breadcrumb',
					'priority'   => 90,
					'dependency' => array(
						'zakra_enable_breadcrumb',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_breadcrumbs_text_color',
					'default'    => '#16181a',
					'type'       => 'sub-control',
					'control'    => 'zakra-color',
					'section'    => 'zakra_breadcrumb',
					'parent'     => 'zakra_breadcrumbs_text_color_group',
					'transport'  => 'postMessage',
					'priority'   => 90,
					'dependency' => array(
						'zakra_enable_breadcrumb',
						'==',
						true,
					),
				),

				array(
					'name'     => 'zakra_breadcrumb_separator_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'label'    => esc_html__( 'Separator', 'zakra' ),
					'section'  => 'zakra_breadcrumb',
					'priority' => 95,
					'dependency' => array(
						'zakra_enable_breadcrumb',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_breadcrumb_separator_color_group',
					'type'       => 'control',
					'control'    => 'zakra-group',
					'label'      => esc_html__( 'Color', 'zakra' ),
					'section'    => 'zakra_breadcrumb',
					'priority'   => 95,
					'dependency' => array(
						'zakra_enable_breadcrumb',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_breadcrumb_separator_color',
					'default'    => '#16181a',
					'type'       => 'sub-control',
					'control'    => 'zakra-color',
					'section'    => 'zakra_breadcrumb',
					'parent'     => 'zakra_breadcrumb_separator_color_group',
					'transport'  => 'postMessage',
					'priority'   => 95,
					'dependency' => array(
						'zakra_enable_breadcrumb',
						'==',
						true,
					),
				),

				array(
					'name'     => 'zakra_breadcrumb_link_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'label'    => esc_html__( 'Link', 'zakra' ),
					'section'  => 'zakra_breadcrumb',
					'priority' => 95,
					'dependency' => array(
						'zakra_enable_breadcrumb',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_breadcrumbs_link_color_group',
					'default'    => '',
					'type'       => 'control',
					'control'    => 'zakra-group',
					'label'      => esc_html__( 'Color', 'zakra' ),
					'section'    => 'zakra_breadcrumb',
					'priority'   => 100,
					'dependency' => array(
						'zakra_enable_breadcrumb',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_breadcrumbs_link_color',
					'default'    => '#16181a',
					'type'       => 'sub-control',
					'control'    => 'zakra-color',
					'parent'     => 'zakra_breadcrumbs_link_color_group',
					'tab'        => esc_html__( 'Normal', 'zakra' ),
					'section'    => 'zakra_breadcrumb',
					'transport'  => 'postMessage',
					'priority'   => 100,
					'dependency' => array(
						'zakra_enable_breadcrumb',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_breadcrumbs_link_hover_color',
					'default'    => '#027abb',
					'type'       => 'sub-control',
					'control'    => 'zakra-color',
					'parent'     => 'zakra_breadcrumbs_link_color_group',
					'tab'        => esc_html__( 'Hover', 'zakra' ),
					'section'    => 'zakra_breadcrumb',
					'transport'  => 'postMessage',
					'priority'   => 100,
					'dependency' => array(
						'zakra_enable_breadcrumb',
						'==',
						true,
					),
				),
			);

			$options = array_merge( $options, $configs );

			if ( ! zakra_is_zakra_pro_active() ) {

				$configs[] = array(
					'name'        => 'zakra_page_header_upgrade',
					'type'        => 'control',
					'control'     => 'zakra-upgrade',
					'label'       => esc_html__( 'Learn more', 'zakra' ),
					'description' => esc_html__( 'Unlock more features available in Pro version.', 'zakra' ),
					'url'         => esc_url( 'https://zakratheme.com/pricing/?utm_source=zakra-theme&utm_medium=customizer-option-name&utm_campaign=zakra-customizer+&utm_content=Learn+More ' ),
					'section'     => 'zakra_breadcrumb',
					'priority'    => 110,
				);

				$options = array_merge( $options, $configs );
			}

			return $options;
		}


	}

	new Zakra_Customize_Breadcrumb_Option();

endif;
