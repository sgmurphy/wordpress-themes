<?php
/**
 * Page header options
 *
 * @package     zakra
 */

defined( 'ABSPATH' ) || exit;

/*== CONTENT > PAGE HEADER ==*/
if ( ! class_exists( 'Zakra_Customize_Blog_General_Option' ) ) :

	/**
	 * Archive/Blog option.
	 */
	class Zakra_Customize_Blog_General_Option extends Zakra_Customize_Base_Option {

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
					'name'     => 'zakra_page_header_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'label'    => esc_html__( 'Page Header', 'zakra' ),
					'section'  => 'zakra_page_header',
					'priority' => 5,
				),

				array(
					'name'     => 'zakra_page_header_general_heading',
					'type'     => 'control',
					'control'  => 'zakra-subtitle',
					'label'    => esc_html__( 'General', 'zakra' ),
					'section'  => 'zakra_page_header',
					'priority' => 5,
				),

				array(
					'name'     => 'zakra_enable_page_header',
					'default'  => true,
					'type'     => 'control',
					'control'  => 'zakra-toggle',
					'label'    => esc_html__( 'Enable', 'zakra' ),
					'section'  => 'zakra_page_header',
					'priority' => 5,
				),

				array(
					'name'      => 'zakra_page_header_layout',
					'default'   => 'style-1',
					'type'      => 'control',
					'control'   => 'zakra-radio-image',
					'label'     => esc_html__( 'Layout', 'zakra' ),
					'section'   => 'zakra_page_header',
					'transport' => 'postMessage',
					'image_col' => 2,
					'choices'   => array(
						'style-1'  => array(
							'label' => '',
							'url'   => ZAKRA_PARENT_INC_ICON_URI . '/breadcrumb-right.svg',
						),
						'style-2'  => array(
							'label' => '',
							'url'   => ZAKRA_PARENT_INC_ICON_URI . '/breadcrumb-left.svg',
						),
						'style-3' => array(
							'label' => '',
							'url'   => ZAKRA_PARENT_INC_ICON_URI . '/breadcrumb-center.svg',
						),
						'style-4'   => array(
							'label' => '',
							'url'   => ZAKRA_PARENT_INC_ICON_URI . '/breadcrumb-both-on-left.svg',
						),
						'style-5'  => array(
							'label' => '',
							'url'   => ZAKRA_PARENT_INC_ICON_URI . '/breadcrumb-both-on-right.svg',
						),
					),
					'dependency' => array(
						'zakra_enable_page_header',
						'==',
						true,
					),
					'priority'  => 10,
				),

				// Divider.
				array(
					'name'     => 'zakra_page_header_divider',
					'type'     => 'control',
					'control'  => 'zakra-divider',
					'style'    => 'dashed',
					'section'  => 'zakra_page_header',
					'priority' => 10,
					'dependency' => array(
						'zakra_enable_page_header',
						'==',
						true,
					),
				),

				array(
					'name'     => 'zakra_page_header_style',
					'type'     => 'control',
					'control'  => 'zakra-subtitle',
					'label'    => esc_html__( 'Style', 'zakra' ),
					'section'  => 'zakra_page_header',
					'priority' => 10,
					'dependency' => array(
						'zakra_enable_page_header',
						'==',
						true,
					),
				),

				array(
					'name'     => 'zakra_page_header_background_group',
					'type'     => 'control',
					'control'  => 'zakra-group',
					'label'    => esc_html__( 'Background', 'zakra' ),
					'section'  => 'zakra_page_header',
					'priority' => 10,
					'dependency' => array(
						'zakra_enable_page_header',
						'==',
						true,
					),
				),

				array(
					'name'      => 'zakra_page_header_background',
					'default'   => array(
						'background-color'      => '#E4E4E7',
						'background-image'      => '',
						'background-repeat'     => 'repeat',
						'background-position'   => 'top left',
						'background-size'       => 'contain',
						'background-attachment' => 'scroll',
					),
					'type'      => 'sub-control',
					'control'   => 'zakra-background',
					'parent'    => 'zakra_page_header_background_group',
					'section'   => 'zakra_page_header',
					'transport' => 'postMessage',
					'priority'  => 10,
					'dependency' => array(
						'zakra_enable_page_header',
						'==',
						true,
					),
				),

				array(
					'name'      => 'zakra_page_header_padding',
					'default'   => array(
						'top'    => '20',
						'right'  => '0',
						'bottom' => '20',
						'left'   => '0',
						'unit'   => 'px',
					),
					'suffix'    => array( 'px', 'em', 'rem', '%' ),
					'type'      => 'control',
					'control'   => 'zakra-dimensions',
					'label'     => esc_html__( 'Padding', 'zakra' ),
					'section'   => 'zakra_page_header',
					'transport' => 'postMessage',
					'priority'  => 10,
					'dependency' => array(
						'zakra_enable_page_header',
						'==',
						true,
					),
				),

				array(
					'name'     => 'zakra_page_title_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'label'    => esc_html__( 'Page Title', 'zakra' ),
					'section'  => 'zakra_page_header',
					'priority' => 15,
					'dependency' => array(
						'zakra_enable_page_header',
						'==',
						true,
					),
				),

				array(
					'name'     => 'zakra_page_title_general_heading',
					'type'     => 'control',
					'control'  => 'zakra-subtitle',
					'label'    => esc_html__( 'General', 'zakra' ),
					'section'  => 'zakra_page_header',
					'priority' => 15,
					'dependency' => array(
						'zakra_enable_page_header',
						'==',
						true,
					),
				),

				array(
					'name'     => 'zakra_page_title_position',
					'default'  => 'page-header',
					'type'     => 'control',
					'control'  => 'radio',
					'label'    => esc_html__( 'Position', 'zakra' ),
					'section'  => 'zakra_page_header',
					'choices'  => array(
						'page-header'  => esc_html__( 'Page Header', 'zakra' ),
						'content-area' => esc_html__( 'Content Area', 'zakra' ),
					),
					'priority' => 15,
					'dependency' => array(
						'zakra_enable_page_header',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_page_title_markup',
					'default'    => 'h1',
					'type'       => 'control',
					'control'    => 'select',
					'label'      => esc_html__( 'Markup', 'zakra' ),
					'section'    => 'zakra_page_header',
					'choices'    => array(
						'h1'   => esc_html__( 'Heading 1', 'zakra' ),
						'h2'   => esc_html__( 'Heading 2', 'zakra' ),
						'h3'   => esc_html__( 'Heading 3', 'zakra' ),
						'h4'   => esc_html__( 'Heading 4', 'zakra' ),
						'h5'   => esc_html__( 'Heading 5', 'zakra' ),
						'h6'   => esc_html__( 'Heading 6', 'zakra' ),
						'span' => esc_html__( 'Span', 'zakra' ),
						'p'    => esc_html__( 'Paragraph', 'zakra' ),
						'div'  => esc_html__( 'Div', 'zakra' ),
					),
					'priority'   => 15,
					'dependency' => array(
						'conditions' => array(
							array(
								'zakra_enable_page_header',
								'==',
								true,
							),
							array(
								'zakra_page_title_position',
								'==',
								'page-header',
							),
						),
						'operator'   => 'AND',
					),
				),

				// Divider.
				array(
					'name'     => 'zakra_page_title_divider',
					'type'     => 'control',
					'control'  => 'zakra-divider',
					'style'    => 'dashed',
					'section'  => 'zakra_page_header',
					'priority' => 20,
					'dependency' => array(
						'zakra_enable_page_header',
						'==',
						true,
					),
				),

				array(
					'name'     => 'zakra_page_title_style_heading',
					'type'     => 'control',
					'control'  => 'zakra-subtitle',
					'label'    => esc_html__( 'Style', 'zakra' ),
					'section'  => 'zakra_page_header',
					'priority' => 20,
					'dependency' => array(
						'zakra_enable_page_header',
						'==',
						true,
					),
				),

				array(
					'name'     => 'zakra_post_page_title_color_group',
					'type'     => 'control',
					'control'  => 'zakra-group',
					'label'    => esc_html__( 'Color', 'zakra' ),
					'section'  => 'zakra_page_header',
					'priority' => 20,
					'dependency' => array(
						'zakra_enable_page_header',
						'==',
						true,
					),
				),

				array(
					'name'      => 'zakra_post_page_title_color',
					'default'   => '#16181a',
					'type'      => 'sub-control',
					'control'   => 'zakra-color',
					'parent'    => 'zakra_post_page_title_color_group',
					'section'   => 'zakra_page_header',
					'transport' => 'postMessage',
					'priority'  => 20,
					'dependency' => array(
						'zakra_enable_page_header',
						'==',
						true,
					),
				),

				array(
					'name'     => 'zakra_post_page_title_typography_group',
					'type'     => 'control',
					'control'  => 'zakra-group',
					'label'    => esc_html__( 'Typography', 'zakra' ),
					'section'  => 'zakra_page_header',
					'priority' => 25,
					'dependency' => array(
						'zakra_enable_page_header',
						'==',
						true,
					),
				),

				array(
					'name'      => 'zakra_post_page_title_typography',
					'default'   => apply_filters(
						'zakra_post_page_title_typography_filter',
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
					'parent'    => 'zakra_post_page_title_typography_group',
					'section'   => 'zakra_page_header',
					'transport' => 'postMessage',
					'priority'  => 25,
					'dependency' => array(
						'zakra_enable_page_header',
						'==',
						true,
					),
				),
			);

			$options = array_merge( $options, $configs );

			if ( ! zakra_is_zakra_pro_active() ) {

				$configs[] = array(
					'name'        => 'zakra_page_header_upgrade_notice',
					'type'        => 'control',
					'control'     => 'zakra-upgrade',
					'label'       => esc_html__( 'Learn more', 'zakra' ),
					'description' => esc_html__( 'Unlock more features available in Pro version.', 'zakra' ),
					'url'         => esc_url( 'https://zakratheme.com/pricing/?utm_source=zakra-theme&utm_medium=customizer-option-name&utm_campaign=zakra-customizer+&utm_content=Learn+More ' ),
					'section'     => 'zakra_page_header',
					'priority'    => 110,
				);

				$options = array_merge( $options, $configs );
			}

			return $options;
		}


	}

	new Zakra_Customize_Blog_General_Option();

endif;
