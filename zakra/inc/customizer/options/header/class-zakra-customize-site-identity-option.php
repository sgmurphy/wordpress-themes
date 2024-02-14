<?php
/**
 * Site Identity Options.
 *
 * @package     zakra
 */

defined( 'ABSPATH' ) || exit;

/*========================================== HEADER > SITE IDENTITY ==========================================*/
if ( ! class_exists( 'Zakra_Customize_Site_Identity_Option' ) ) :

	/**
	 * Site Identity customizer options.
	 */
	class Zakra_Customize_Site_Identity_Option extends Zakra_Customize_Base_Option {

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
					'name'     => 'zakra_site_logo_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'label'    => esc_html__( 'Site Logo', 'zakra' ),
					'section'  => 'title_tagline',
					'priority' => 5,
				),

				array(
					'name'        => 'zakra_retina_logo',
					'type'        => 'control',
					'control'     => 'image',
					'label'       => esc_html__( 'Retina Logo', 'zakra' ),
					'description' => esc_html__( 'Upload 2X times the size of your current logo. Eg: If your current logo size is 120*60 then upload 240*120 sized logo.', 'zakra' ),
					'section'     => 'title_tagline',
					'priority'    => 8,
				),

				array(
					'name'     => 'zakra_site_icon_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'label'    => esc_html__( 'Site Icon', 'zakra' ),
					'section'  => 'title_tagline',
					'priority' => 11,
				),

				array(
					'name'     => 'zakra_site_identity_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'label'    => esc_html__( 'Site Title', 'zakra' ),
					'section'  => 'title_tagline',
					'priority' => 13,
				),

				array(
					'name'     => 'zakra_enable_site_identity',
					'default'  => true,
					'type'     => 'control',
					'control'  => 'zakra-toggle',
					'label'    => esc_html__( 'Enable', 'zakra' ),
					'section'  => 'title_tagline',
					'priority' => 14,
				),


				array(
					'name'     => 'zakra_site_identity_color_group',
					'type'     => 'control',
					'control'  => 'zakra-group',
					'label'    => esc_html__( 'Color', 'zakra' ),
					'section'  => 'title_tagline',
					'priority' => 14,
					'dependency' => array(
						'zakra_enable_site_identity',
						'==',
						true,
					),
				),

				array(
					'name'      => 'zakra_site_identity_color',
					'default'   => '',
					'type'      => 'sub-control',
					'control'   => 'zakra-color',
					'tab'       => esc_html__( 'Normal', 'zakra' ),
					'parent'    => 'zakra_site_identity_color_group',
					'section'   => 'title_tagline',
					'transport' => 'postMessage',
					'priority'  => 14,
					'dependency' => array(
						'zakra_enable_site_identity',
						'==',
						true,
					),
				),

				array(
					'name'     => 'zakra_site_title_typography_group',
					'default'  => '',
					'type'     => 'control',
					'control'  => 'zakra-group',
					'label'    => esc_html__( 'Typography', 'zakra' ),
					'section'  => 'title_tagline',
					'priority' => 14,
					'dependency' => array(
						'zakra_enable_site_identity',
						'==',
						true,
					),
				),

				array(
					'name'      => 'zakra_site_title_typography',
					'default'   => array(
						'font-family'    => 'default',
						'font-weight'    => '400',
						'subsets'        => array( 'latin' ),
						'font-size'      => array(
							'desktop' => array(
								'size' => '4',
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
								'size' => '1.5',
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
					'type'      => 'sub-control',
					'control'   => 'zakra-typography',
					'parent'    => 'zakra_site_title_typography_group',
					'section'   => 'title_tagline',
					'transport' => 'postMessage',
					'priority'  => 14,
					'dependency' => array(
						'zakra_enable_site_identity',
						'==',
						true,
					),
				),

				array(
					'name'     => 'zakra_tagline_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'label'    => esc_html__( 'Tagline', 'zakra' ),
					'section'  => 'title_tagline',
					'priority' => 15,
				),

				array(
					'name'     => 'zakra_enable_site_tagline',
					'default'  => true,
					'type'     => 'control',
					'control'  => 'zakra-toggle',
					'label'    => esc_html__( 'Enable', 'zakra' ),
					'section'  => 'title_tagline',
					'priority' => 16,
				),

				array(
					'name'     => 'zakra_site_tagline_color_group',
					'type'     => 'control',
					'control'  => 'zakra-group',
					'label'    => esc_html__( 'Color', 'zakra' ),
					'section'  => 'title_tagline',
					'priority' => 16,
					'dependency' => array(
						'zakra_enable_site_tagline',
						'==',
						true,
					),
				),

				array(
					'name'      => 'zakra_site_tagline_color',
					'default'   => '',
					'type'      => 'sub-control',
					'control'   => 'zakra-color',
					'parent'    => 'zakra_site_tagline_color_group',
					'section'   => 'title_tagline',
					'transport' => 'postMessage',
					'priority'  => 16,
					'dependency' => array(
						'zakra_enable_site_identity',
						'==',
						true,
					),
				),

				array(
					'name'     => 'zakra_site_tagline_typography_group',
					'default'  => '',
					'type'     => 'control',
					'control'  => 'zakra-group',
					'label'    => esc_html__( 'Typography', 'zakra' ),
					'section'  => 'title_tagline',
					'priority' => 18,
					'dependency' => array(
						'zakra_enable_site_tagline',
						'==',
						true,
					),
				),

				array(
					'name'      => 'zakra_site_tagline_typography',
					'default'   => array(
						'font-family'    => 'default',
						'font-weight'    => '400',
						'subsets'        => array( 'latin' ),
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
					'type'      => 'sub-control',
					'control'   => 'zakra-typography',
					'parent'    => 'zakra_site_tagline_typography_group',
					'section'   => 'title_tagline',
					'transport' => 'postMessage',
					'priority'  => 18,
					'dependency' => array(
						'zakra_enable_site_tagline',
						'==',
						true,
					),
				),

			);

			$options = array_merge( $options, $configs );

			if ( ! zakra_is_zakra_pro_active() ) {

				$configs[] = array(
					'name'        => 'zakra_site_identity_upgrade',
					'type'        => 'control',
					'control'     => 'zakra-upgrade',
					'label'       => esc_html__( 'Learn more', 'zakra' ),
					'description' => esc_html__( 'Unlock more features available in Pro version.', 'zakra' ),
					'url'         => esc_url( 'https://zakratheme.com/colormag-pricing/?utm_source=zakra-theme&utm_medium=customizer-option-name&utm_campaign=zakra-customizer+&utm_content=Learn+More ' ),
					'section'     => 'title_tagline',
					'priority'    => 100,
				);

				$options = array_merge( $options, $configs );
			}

			return $options;
		}

	}

	new Zakra_Customize_Site_Identity_Option();

endif;
