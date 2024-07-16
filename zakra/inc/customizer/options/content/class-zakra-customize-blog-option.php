<?php
/**
 * Archive/ blog layout.
 *
 * @package     zakra
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*== POST/PAGE/BLOG > ARCHIVE/ BLOG ==*/
if ( ! class_exists( 'Zakra_Customize_Blog_Option' ) ) :

	/**
	 * Archive/Blog option.
	 */
	class Zakra_Customize_Blog_Option extends Zakra_Customize_Base_Option {

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
					'name'     => 'zakra_blog_page_title_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'label'    => esc_html__( 'Page Title', 'zakra' ),
					'section'  => 'zakra_blog',
					'priority' => 100,
				),

				array(
					'name'          => 'zakra_navigate_page_title_position',
					'type'          => 'control',
					'control'       => 'zakra-navigate',
					'section'       => 'zakra_blog',
					'navigate_info' => array(
						'target_container' => 'section',
						'target_id'        => 'zakra_page_header',
						'target_label'     => esc_html__( 'Page Title Position', 'zakra' ),
					),
					'priority'      => 110,
				),

				array(
					'name'     => 'zakra_category_description_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'label'    => esc_html__( 'Category Description', 'zakra' ),
					'section'  => 'zakra_blog',
					'priority' => 110,
				),

				array(
					'name'     => 'zakra_enable_category_description',
					'default'  => false,
					'type'     => 'control',
					'control'  => 'zakra-toggle',
					'label'    => esc_html__( 'Enable', 'zakra' ),
					'section'  => 'zakra_blog',
					'priority' => 110,
				),

				array(
					'name'     => 'zakra_blog_post_date_type_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'label'    => esc_html__( 'Post Date Type', 'zakra' ),
					'section'  => 'zakra_blog',
					'priority' => 110,
				),

				array(
					'name'     => 'zakra_blog_post_date_type',
					'default'  => 'published-date',
					'type'     => 'control',
					'control'  => 'select',
					'section'  => 'zakra_blog',
					'choices'  => apply_filters(
						'zakra_blog_post_date_type_choices',
						array(
							'published-date' => esc_html__( 'Published Date', 'zakra' ),
							'modified-date'  => esc_html__( 'Modified Date', 'zakra' ),
						)
					),
					'priority' => 110,
				),

				array(
					'name'        => 'zakra_post_elements_heading',
					'type'        => 'control',
					'control'     => 'zakra-title',
					'label'       => esc_html__( 'Post Elements', 'zakra' ),
					'description' => esc_html__( 'Drag & Drop items to re-arrange the order', 'zakra' ),
					'section'     => 'zakra_blog',
					'priority'    => 125,
				),

				array(
					'name'       => 'zakra_blog_post_elements',
					'default'    => array(
						'featured_image',
						'title',
						'meta',
						'content',
					),
					'type'       => 'control',
					'control'    => 'zakra-sortable',
					'section'    => 'zakra_blog',
					'choices'    => array(
						'featured_image' => esc_attr__( 'Featured Image', 'zakra' ),
						'title'          => esc_attr__( 'Title', 'zakra' ),
						'meta'           => esc_attr__( 'Meta Tags', 'zakra' ),
						'content'        => esc_attr__( 'Content', 'zakra' ),
					),
					'dependency' => apply_filters( 'zakra_structure_archive_blog_order', false ),
					'priority'   => 125,
				),

				array(
					'name'        => 'zakra_post_meta_elements_heading',
					'type'        => 'control',
					'control'     => 'zakra-title',
					'label'       => esc_html__( 'Meta Elements', 'zakra' ),
					'description' => esc_html__( 'Drag & Drop items to re-arrange the order', 'zakra' ),
					'section'     => 'zakra_blog',
					'priority'    => 130,
				),

				array(
					'name'       => 'zakra_blog_meta_elements',
					'default'    => array(
						'author',
						'date',
						'categories',
						'tags',
						'comments',
					),
					'type'       => 'control',
					'control'    => 'zakra-sortable',
					'section'    => 'zakra_blog',
					'choices'    => array(
						'comments'   => esc_attr__( 'Comments', 'zakra' ),
						'categories' => esc_attr__( 'Categories', 'zakra' ),
						'author'     => esc_attr__( 'Author', 'zakra' ),
						'date'       => esc_attr__( 'Date', 'zakra' ),
						'tags'       => esc_attr__( 'Tags', 'zakra' ),
					),
					'dependency' => apply_filters( 'zakra_structure_archive_blog_order', false ),
					'priority'   => 130,
				),

				array(
					'name'     => 'zakra_blog_post_title_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'label'    => esc_html__( 'Post title', 'zakra' ),
					'section'  => 'zakra_blog',
					'priority' => 150,
				),

				array(
					'name'     => 'zakra_blog_post_title_typography_group',
					'type'     => 'control',
					'control'  => 'zakra-group',
					'label'    => esc_html__( 'Typography', 'zakra' ),
					'section'  => 'zakra_blog',
					'priority' => 160,
				),

				array(
					'name'      => 'zakra_blog_post_title_typography',
					'default'   => array(
						'font-family'    => 'default',
						'font-weight'    => '500',
						'subsets'        => array( 'latin' ),
						'font-size'      => array(
							'desktop' => array(
								'size' => '2.25',
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
					),
					'type'      => 'sub-control',
					'control'   => 'zakra-typography',
					'parent'    => 'zakra_blog_post_title_typography_group',
					'section'   => 'zakra_blog',
					'transport' => 'postMessage',
					'priority'  => 160,
				),

				array(
					'name'     => 'zakra_blog_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'label'    => esc_html__( 'Excerpt', 'zakra' ),
					'section'  => 'zakra_blog',
					'priority' => 170,
				),

				array(
					'name'     => 'zakra_blog_excerpt_type',
					'default'  => 'excerpt',
					'type'     => 'control',
					'control'  => 'radio',
					'label'    => esc_html__( 'Type', 'zakra' ),
					'section'  => 'zakra_blog',
					'choices'  => array(
						'excerpt' => esc_html__( 'Excerpt', 'zakra' ),
						'content' => esc_html__( 'Full Content', 'zakra' ),
					),
					'priority' => 170,
				),

				array(
					'name'       => 'zakra_blog_button_heading',
					'type'       => 'control',
					'control'    => 'zakra-title',
					'label'      => esc_html__( 'Button', 'zakra' ),
					'section'    => 'zakra_blog',
					'priority'   => 185,
					'dependency' => array(
						'zakra_blog_excerpt_type',
						'==',
						'excerpt',
					),
				),

				array(
					'name'       => 'zakra_enable_blog_button',
					'default'    => true,
					'type'       => 'control',
					'control'    => 'zakra-toggle',
					'label'      => esc_html__( 'Enable', 'zakra' ),
					'section'    => 'zakra_blog',
					'priority'   => 190,
					'dependency' => array(
						'zakra_blog_excerpt_type',
						'==',
						'excerpt',
					),
				),

				array(
					'name'       => 'zakra_blog_button_alignment',
					'default'    => 'style-1',
					'type'       => 'control',
					'control'    => 'zakra-radio-image',
					'label'      => esc_html__( 'Alignment', 'zakra' ),
					'section'    => 'zakra_blog',
					'priority'   => 210,
					'image_col'  => 2,
					'choices'    => apply_filters(
						'zakra_blog_button_alignment',
						array(
							'style-1' => array(
								'label' => '',
								'url'   => ZAKRA_PARENT_INC_ICON_URI . '/read-more-left.svg',
							),
							'style-2' => array(
								'label' => '',
								'url'   => ZAKRA_PARENT_INC_ICON_URI . '/read-more-right.svg',
							),
						)
					),
					'dependency' => array(
						'conditions' => apply_filters(
							'zakra_blog_button_alignment_dependency',
							array(
								array(
									'zakra_blog_excerpt_type',
									'==',
									'excerpt',
								),
								array(
									'zakra_enable_blog_button',
									'==',
									true,
								),
							)
						),
						'operator'   => 'AND',
					),
				),

				array(
					'name'        => 'zakra_search_results_posts_per_page_heading',
					'type'        => 'control',
					'control'     => 'zakra-title',
					'label'       => esc_html__( 'Search Bar', 'zakra' ),
					'description' => esc_html__( 'Configure Search result', 'zakra' ),
					'section'     => 'zakra_blog',
					'priority'    => 220,
				),

				array(
					'name'        => 'zakra_search_results_posts_per_page',
					'default'     => array(
						'size' => 3,
					),
					'suffix'      => array( 'posts' ),
					'type'        => 'control',
					'control'     => 'zakra-slider',
					'label'       => esc_html__( 'Post Per Page', 'zakra' ),
					'section'     => 'zakra_blog',
					'transport'   => 'refresh',
					'priority'    => 225,
					'input_attrs' => array(
						'px' => array(
							'min'  => 1,
							'max'  => 99,
							'step' => 1,
						),
					),
				),

			);

			$options = array_merge( $options, $configs );

			if ( ! zakra_is_zakra_pro_active() ) {

				$configs[] = array(
					'name'        => 'zakra_blog_upgrade',
					'type'        => 'control',
					'control'     => 'zakra-upgrade',
					'label'       => esc_html__( 'Learn more', 'zakra' ),
					'description' => esc_html__( 'Unlock more features available in Pro version.', 'zakra' ),
					'url'         => esc_url( 'https://zakratheme.com/pricing/?utm_source=zakra-theme&utm_medium=customizer-option-name&utm_campaign=zakra-customizer+&utm_content=Learn+More ' ),
					'section'     => 'zakra_blog',
					'priority'    => 290,
				);

				$options = array_merge( $options, $configs );
			}

			return $options;
		}
	}

	new Zakra_Customize_Blog_Option();

endif;
