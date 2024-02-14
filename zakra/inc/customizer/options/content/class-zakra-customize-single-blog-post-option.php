<?php
/**
 * Single blog post options.
 *
 * @package     zakra
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*========================================== CONTENT > SINGLE POST ==========================================*/
if ( ! class_exists( 'Zakra_Customize_Single_Blog_Post_Option' ) ) :

	/**
	 * Single Blog Post option.
	 */
	class Zakra_Customize_Single_Blog_Post_Option extends Zakra_Customize_Base_Option {

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
					'name'        => 'zakra_single_post_elements_heading',
					'type'        => 'control',
					'control'     => 'zakra-title',
					'label'       => esc_html__( 'Post Elements', 'zakra' ),
					'description' => esc_html__( 'Drag & Drop items to re-arrange the order', 'zakra' ),
					'section'     => 'zakra_single_blog_post',
					'priority'    => 40,
				),

				array(
					'name'     => 'zakra_single_post_elements',
					'default'  => array(
						'featured_image',
						'title',
						'meta',
						'content',
					),
					'type'     => 'control',
					'control'  => 'zakra-sortable',
					'section'  => 'zakra_single_blog_post',
					'choices'  => array(
						'featured_image' => esc_attr__( 'Featured Image', 'zakra' ),
						'title'          => esc_attr__( 'Title', 'zakra' ),
						'meta'           => esc_attr__( 'Meta Tags', 'zakra' ),
						'content'        => esc_attr__( 'Content', 'zakra' ),
					),
					'priority' => 45,
				),

				array(
					'name'        => 'zakra_single_meta_elements_heading',
					'type'        => 'control',
					'control'     => 'zakra-title',
					'label'       => esc_html__( 'Meta Elements', 'zakra' ),
					'description' => esc_html__( 'Drag & Drop items to re-arrange the order', 'zakra' ),
					'section'     => 'zakra_single_blog_post',
					'priority'    => 50,
				),

				array(
					'name'     => 'zakra_single_meta_elements',
					'default'  => array(
						'author',
						'date',
						'categories',
						'tags',
						'comments',
					),
					'type'     => 'control',
					'control'  => 'zakra-sortable',
					'section'  => 'zakra_single_blog_post',
					'choices'  => array(
						'comments'   => esc_attr__( 'Comments', 'zakra' ),
						'categories' => esc_attr__( 'Categories', 'zakra' ),
						'author'     => esc_attr__( 'Author', 'zakra' ),
						'date'       => esc_attr__( 'Date', 'zakra' ),
						'tags'       => esc_attr__( 'Tags', 'zakra' ),
					),
					'priority' => 55,
				),

			);

			$options = array_merge( $options, $configs );


			if ( ! zakra_is_zakra_pro_active() ) {

				$configs[] = array(
					'name'        => 'zakra_single_blog_post_upgrade',
					'type'        => 'control',
					'control'     => 'zakra-upgrade',
					'label'       => esc_html__( 'Learn more', 'zakra' ),
					'description' => esc_html__( 'Unlock more features available in Pro version.', 'zakra' ),
					'url'         => esc_url( 'https://zakratheme.com/colormag-pricing/?utm_source=zakra-theme&utm_medium=customizer-option-name&utm_campaign=zakra-customizer+&utm_content=Learn+More ' ),
					'section'     => 'zakra_single_blog_post',
					'priority'    => 200,
				);

				$options = array_merge( $options, $configs );
			}

			return $options;
		}



	}

	new Zakra_Customize_Single_Blog_Post_Option();

endif;
