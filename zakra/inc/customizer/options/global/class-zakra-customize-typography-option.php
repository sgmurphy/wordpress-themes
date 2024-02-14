<?php
/**
 * Typography.
 *
 * @package     zakra
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*========================================== TYPOGRAPHY ==========================================*/
if ( ! class_exists( 'Zakra_Customize_Typography_Option' ) ) :

	/**
	 * Typography option.
	 */
	class Zakra_Customize_Typography_Option extends Zakra_Customize_Base_Option {

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
					'name'     => 'zakra_body_typography_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'section'  => 'zakra_typography',
					'label'    => esc_html__( 'Body', 'zakra' ),
					'priority' => 4,
				),

				array(
					'name'      => 'zakra_body_typography',
					'default'   => array(
						'font-family'    => 'default',
						'font-weight'    => '400',
						'font-size'      => array(
							'desktop' => array(
								'size' => '15',
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
					),
					'type'      => 'control',
					'transport' => 'postMessage',
					'control'   => 'zakra-typography',
					'section'   => 'zakra_typography',
					'priority'  => 5,
				),

				// Headings.
				array(
					'name'     => 'zakra_headings_typography_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'section'  => 'zakra_typography',
					'label'    => esc_html__( 'Headings', 'zakra' ),
					'priority' => 25,
				),

				array(
					'name'     => 'zakra_heading_typography_group',
					'default'  => '',
					'type'     => 'control',
					'control'  => 'zakra-group',
					'label'    => esc_html__( 'Heading', 'zakra' ),
					'section'  => 'zakra_typography',
					'priority' => 30,
				),

				array(
					'name'      => 'zakra_heading_typography',
					'default'   => apply_filters(
						'zakra_heading_typography_filter',
						array(
							'font-family'    => 'default',
							'font-weight'    => '400',
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
					'parent'    => 'zakra_heading_typography_group',
					'section'   => 'zakra_typography',
					'transport' => 'postMessage',
					'priority'  => 30,
				),

				// H1 - H6.
				array(
					'name'     => 'zakra_h1_typography_group',
					'type'     => 'control',
					'control'  => 'zakra-group',
					'label'    => esc_html__( 'H1', 'zakra' ),
					'section'  => 'zakra_typography',
					'priority' => 35,
				),

				array(
					'name'      => 'zakra_h1_typography',
					'default'   => apply_filters(
						'zakra_h1_typography_filter',
						array(
							'font-family'    => 'default',
							'font-weight'    => '500',
							'subsets'        => array( 'latin' ),
							'font-size'      => array(
								'desktop' => array(
									'size' => '2.5',
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
					'parent'    => 'zakra_h1_typography_group',
					'section'   => 'zakra_typography',
					'transport' => 'postMessage',
					'priority'  => 35,
				),

				array(
					'name'     => 'zakra_h2_typography_group',
					'type'     => 'control',
					'control'  => 'zakra-group',
					'label'    => esc_html__( 'H2', 'zakra' ),
					'section'  => 'zakra_typography',
					'priority' => 40,
				),

				array(
					'name'      => 'zakra_h2_typography',
					'default'   => apply_filters(
						'zakra_h2_typography_filter',
						array(
							'font-family'    => 'default',
							'font-weight'    => '500',
							'subsets'        => array( 'latin' ),
							'font-size'      => array(
								'desktop' => array(
									'size' => '2.5',
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
					'parent'    => 'zakra_h2_typography_group',
					'section'   => 'zakra_typography',
					'transport' => 'postMessage',
					'priority'  => 40,
				),

				array(
					'name'     => 'zakra_h3_typography_group',
					'type'     => 'control',
					'control'  => 'zakra-group',
					'label'    => esc_html__( 'H3', 'zakra' ),
					'section'  => 'zakra_typography',
					'priority' => 45,
				),

				array(
					'name'      => 'zakra_h3_typography',
					'default'   => apply_filters(
						'zakra_h3_typography_filter',
						array(
							'font-family'    => 'default',
							'font-weight'    => '500',
							'subsets'        => array( 'latin' ),
							'font-size'      => array(
								'desktop' => array(
									'size' => '2',
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
					'parent'    => 'zakra_h3_typography_group',
					'section'   => 'zakra_typography',
					'transport' => 'postMessage',
					'priority'  => 45,
				),

				array(
					'name'     => 'zakra_h4_typography_group',
					'type'     => 'control',
					'control'  => 'zakra-group',
					'label'    => esc_html__( 'H4', 'zakra' ),
					'section'  => 'zakra_typography',
					'priority' => 50,
				),

				array(
					'name'      => 'zakra_h4_typography',
					'default'   => apply_filters(
						'zakra_h4_typography_filter',
						array(
							'font-family'    => 'default',
							'font-weight'    => '500',
							'subsets'        => array( 'latin' ),
							'font-size'      => array(
								'desktop' => array(
									'size' => '1.75',
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
					'parent'    => 'zakra_h4_typography_group',
					'section'   => 'zakra_typography',
					'transport' => 'postMessage',
					'priority'  => 50,
				),

				array(
					'name'     => 'zakra_h5_typography_group',
					'type'     => 'control',
					'control'  => 'zakra-group',
					'label'    => esc_html__( 'H5', 'zakra' ),
					'section'  => 'zakra_typography',
					'priority' => 65,
				),

				array(
					'name'      => 'zakra_h5_typography',
					'default'   => apply_filters(
						'zakra_h5_typography_filter',
						array(
							'font-family'    => 'default',
							'font-weight'    => '500',
							'subsets'        => array( 'latin' ),
							'font-size'      => array(
								'desktop' => array(
									'size' => '1.313',
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
					'parent'    => 'zakra_h5_typography_group',
					'section'   => 'zakra_typography',
					'transport' => 'postMessage',
					'priority'  => 65,
				),

				array(
					'name'     => 'zakra_h6_typography_group',
					'type'     => 'control',
					'control'  => 'zakra-group',
					'label'    => esc_html__( 'H6', 'zakra' ),
					'section'  => 'zakra_typography',
					'priority' => 70,
				),

				array(
					'name'      => 'zakra_h6_typography',
					'default'   => apply_filters(
						'zakra_h6_typography_filter',
						array(
							'font-family'    => 'default',
							'font-weight'    => '500',
							'subsets'        => array( 'latin' ),
							'font-size'      => array(
								'desktop' => array(
									'size' => '1.125',
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
					'parent'    => 'zakra_h6_typography_group',
					'section'   => 'zakra_typography',
					'transport' => 'postMessage',
					'priority'  => 70,
				),

			);

			$options = array_merge( $options, $configs );

			if ( ! zakra_is_zakra_pro_active() ) {

				$configs[] = array(
					'name'        => 'zakra_typography_upgrade',
					'type'        => 'control',
					'control'     => 'zakra-upgrade',
					'label'       => esc_html__( 'Learn more', 'zakra' ),
					'description' => esc_html__( 'Unlock more features available in Pro version.', 'zakra' ),
					'url'         => esc_url( 'https://zakratheme.com/colormag-pricing/?utm_source=zakra-theme&utm_medium=customizer-option-name&utm_campaign=zakra-customizer+&utm_content=Learn+More ' ),
					'section'     => 'zakra_typography',
					'priority'    => 100,
				);

				$options = array_merge( $options, $configs );
			}

			return $options;
		}

	}

	new Zakra_Customize_Typography_Option();

endif;
