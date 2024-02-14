<?php
/**
 * Container options.
 *
 * @package     zakra
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*========================================== CONTAINER ==========================================*/
if ( ! class_exists( 'Zakra_Customize_Content_Area_Option' ) ) :

	/**
	 * General option.
	 */
	class Zakra_Customize_Content_Area_Option extends Zakra_Customize_Base_Option {

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
					'name'     => 'zakra_content_area_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'label'    => esc_html__( 'Content Area', 'zakra' ),
					'section'  => 'zakra_content_area',
					'priority' => 5,
				),

				array(
					'name'     => 'zakra_content_area_general_heading',
					'type'     => 'control',
					'control'  => 'zakra-subtitle',
					'label'    => esc_html__( 'General', 'zakra' ),
					'section'  => 'zakra_content_area',
					'priority' => 5,
				),

				array(
					'name'      => 'zakra_content_area_layout',
					'default'   => 'bordered',
					'type'      => 'control',
					'control'   => 'zakra-radio-image',
					'section'   => 'zakra_content_area',
					'label'     => esc_html__( 'Layout', 'zakra' ),
					'priority'  => 10,
					'transport' => 'postMessage',
					'image_col' => 2,
					'choices'   => array(
						'bordered'     => array(
							'label' => esc_html__( 'Bordered', 'zakra' ),
							'url'   => ZAKRA_PARENT_INC_ICON_URI . '/content-bordered.svg',
						),
						'boxed'    => array(
							'label' => esc_html__( 'Boxed', 'zakra' ),
							'url'   => ZAKRA_PARENT_INC_ICON_URI . '/content-boxed.svg',
						),
					),
				),
			);

			$options = array_merge( $options, $configs );

			if ( ! zakra_is_zakra_pro_active() ) {

				$configs[] = array(
					'name'        => 'zakra_content_area_upgrade',
					'type'        => 'control',
					'control'     => 'zakra-upgrade',
					'label'       => esc_html__( 'Learn more', 'zakra' ),
					'description' => esc_html__( 'Unlock more features available in Pro version.', 'zakra' ),
					'url'         => esc_url( 'https://zakratheme.com/colormag-pricing/?utm_source=zakra-theme&utm_medium=customizer-option-name&utm_campaign=zakra-customizer+&utm_content=Learn+More ' ),
					'section'     => 'zakra_content_area',
					'priority'    => 100,
				);

				$options = array_merge( $options, $configs );
			}

			return $options;
		}

	}

	new Zakra_Customize_Content_Area_Option();

endif;
