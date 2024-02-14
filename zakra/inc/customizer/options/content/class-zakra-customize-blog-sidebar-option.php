<?php
/**
 * Sidebar options.
 *
 * @package     zakra
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Zakra_Customize_Blog_Sidebar_Option' ) ) :

	/**
	 * Sidebar options.
	 */
	class Zakra_Customize_Blog_Sidebar_Option extends Zakra_Customize_Base_Option {

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
					'name'     => 'zakra_widget_title_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'label'    => esc_html__( 'Widget Title', 'zakra' ),
					'section'  => 'zakra_sidebar',
					'priority' => 30,
				),

				array(
					'name'     => 'zakra_widget_title_typography_group',
					'type'     => 'control',
					'control'  => 'zakra-group',
					'label'    => esc_html__( 'Typography', 'zakra' ),
					'section'  => 'zakra_sidebar',
					'priority' => 60,
					'dependency' => array(
						'zakra_enable_sidebar_widgets_title',
						'!=',
						false,
					),
				),

				array(
					'name'      => 'zakra_widget_title_typography',
					'default'   => apply_filters(
						'zakra_widget_title_typography_filter',
						array(
							'font-family'    => 'default',
							'font-weight'    => '500',
							'subsets'        => array( 'latin' ),
							'font-size'      => array(
								'desktop' => array(
									'size' => '1.2',
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
									'size' => '1.3',
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
						)
					),
					'type'      => 'sub-control',
					'control'   => 'zakra-typography',
					'parent'    => 'zakra_widget_title_typography_group',
					'section'   => 'zakra_sidebar',
					'transport' => 'postMessage',
					'priority'  => 60,
					'dependency' => array(
						'zakra_enable_sidebar_widgets_title',
						'!=',
						false,
					),
				),

				array(
					'name'     => 'zakra_widget_content_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'label'    => esc_html__( 'Widget Content', 'zakra' ),
					'section'  => 'zakra_sidebar',
					'priority' => 75,
				),


				array(
					'name'     => 'zakra_widget_content_typography_group',
					'type'     => 'control',
					'control'  => 'zakra-group',
					'label'    => esc_html__( 'Typography', 'zakra' ),
					'section'  => 'zakra_sidebar',
					'priority' => 80,
				),

				array(
					'name'      => 'zakra_widget_content_typography',
					'default'   => apply_filters(
						'zakra_widget_content_typography_filter',
						array(
							'font-family'    => 'default',
							'font-weight'    => '400',
							'subsets'        => array( 'latin' ),
							'font-size'      => array(
								'desktop' => array(
									'size' => '14',
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
						)
					),
					'type'      => 'sub-control',
					'control'   => 'zakra-typography',
					'parent'    => 'zakra_widget_content_typography_group',
					'section'   => 'zakra_sidebar',
					'transport' => 'postMessage',
					'priority'  => 80,
				),

			);

			$options = array_merge( $options, $configs );

			if ( ! zakra_is_zakra_pro_active() ) {

				$configs[] = array(
					'name'        => 'zakra_sidebar_upgrade',
					'type'        => 'control',
					'control'     => 'zakra-upgrade',
					'label'       => esc_html__( 'Learn more', 'zakra' ),
					'description' => esc_html__( 'Unlock more features available in Pro version.', 'zakra' ),
					'url'         => esc_url( 'https://zakratheme.com/colormag-pricing/?utm_source=zakra-theme&utm_medium=customizer-option-name&utm_campaign=zakra-customizer+&utm_content=Learn+More ' ),
					'section'     => 'zakra_sidebar',
					'priority'    => 100,
				);

				$options = array_merge( $options, $configs );
			}

			return $options;
		}

	}

	new Zakra_Customize_Blog_Sidebar_Option();

endif;
