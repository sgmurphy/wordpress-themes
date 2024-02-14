<?php
/**
 * Meta styles.
 *
 * @package     zakra
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*========================================== CONTENT > META ==========================================*/
if ( ! class_exists( 'Zakra_Customize_Blog_Meta_Option' ) ) :

	/**
	 * Single Blog Post option.
	 */
	class Zakra_Customize_Blog_Meta_Option extends Zakra_Customize_Base_Option {

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
					'name'        => 'zakra_meta_general_heading',
					'type'        => 'control',
					'control'     => 'zakra-title',
					'label'       => esc_html__( 'General', 'zakra' ),
					'section'     => 'zakra_meta',
					'priority'    => 5,
				),

				array(
					'name'      => 'zakra_post_meta_style',
					'default'   => 'style-1',
					'type'      => 'control',
					'control'   => 'zakra-radio-image',
					'label'     => esc_html__( 'Style', 'zakra' ),
					'section'   => 'zakra_meta',
					'image_col' => 2,
					'choices'   => array(
						'style-1' => array(
							'label' => '',
							'url'   => ZAKRA_PARENT_INC_ICON_URI . '/meta-style-one.svg',
						),
						'style-2' => array(
							'label' => '',
							'url'   => ZAKRA_PARENT_INC_ICON_URI . '/meta-style-two.svg',
						),
					),
					'priority'  => 10,
				),

			);

			$options = array_merge( $options, $configs );

			if ( ! zakra_is_zakra_pro_active() ) {

				$configs[] = array(
					'name'        => 'zakra_meta_upgrade',
					'type'        => 'control',
					'control'     => 'zakra-upgrade',
					'label'       => esc_html__( 'Learn more', 'zakra' ),
					'description' => esc_html__( 'Unlock more features available in Pro version.', 'zakra' ),
					'url'         => esc_url( 'https://zakratheme.com/colormag-pricing/?utm_source=zakra-theme&utm_medium=customizer-option-name&utm_campaign=zakra-customizer+&utm_content=Learn+More ' ),
					'section'     => 'zakra_meta',
					'priority'    => 20,
				);

				$options = array_merge( $options, $configs );
			}

			return $options;
		}

	}

	new Zakra_Customize_Blog_Meta_Option();

endif;
