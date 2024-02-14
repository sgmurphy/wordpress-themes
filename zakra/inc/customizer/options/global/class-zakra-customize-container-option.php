<?php
/**
 * Container options.
 *
 * @package     zakra
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*========================================== CONTAINER ==========================================*/
if ( ! class_exists( 'Zakra_Customize_Container_Option' ) ) :

	/**
	 * General option.
	 */
	class Zakra_Customize_Container_Option extends Zakra_Customize_Base_Option {

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
					'name'     => 'zakra_container_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'label'    => esc_html__( 'Container', 'zakra' ),
					'section'  => 'zakra_container',
					'priority' => 5,
				),

				array(
					'name'     => 'zakra_container_general_heading',
					'type'     => 'control',
					'control'  => 'zakra-subtitle',
					'label'    => esc_html__( 'General', 'zakra' ),
					'section'  => 'zakra_container',
					'priority' => 5,
				),

				array(
					'name'      => 'zakra_container_layout',
					'default'   => 'wide',
					'type'      => 'control',
					'control'   => 'zakra-radio-image',
					'section'   => 'zakra_container',
					'label'     => esc_html__( 'Layout', 'zakra' ),
					'priority'  => 10,
					'transport' => 'postMessage',
					'image_col' => 2,
					'choices'   => array(
						'wide'     => array(
							'label' => esc_html__( 'Wide', 'zakra' ),
							'url'   => ZAKRA_PARENT_INC_ICON_URI . '/container-wide.svg',
						),
						'boxed'    => array(
							'label' => esc_html__( 'Boxed', 'zakra' ),
							'url'   => ZAKRA_PARENT_INC_ICON_URI . '/container-box.svg',
						),
					),
				),

				array(
					'name'        => 'zakra_container_width',
					'default'     => array(
						'size' => 1170,
						'unit' => 'px',
					),
					'suffix'      => array( 'px' ),
					'type'        => 'control',
					'control'     => 'zakra-slider',
					'label'       => esc_html__( 'Width', 'zakra' ),
					'section'     => 'zakra_container',
					'priority'    => 20,
					'transport'   => 'postMessage',
					'input_attrs' => array(
						'px' => array(
							'min'  => 768,
							'max'  => 1920,
							'step' => 1,
						),
					),
				),

				// Divider.
				array(
					'name'     => 'zakra_inside_container_divider',
					'type'     => 'control',
					'control'  => 'zakra-divider',
					'style'    => 'dashed',
					'section'  => 'zakra_container',
					'priority' => 55,
				),

				array(
					'name'     => 'zakra_inside_container_background_heading',
					'type'     => 'control',
					'control'  => 'zakra-subtitle',
					'label'    => esc_html__( 'Inside', 'zakra' ),
					'section'  => 'zakra_container',
					'priority' => 55,
				),

				array(
					'name'      => 'zakra_inside_container_background',
					'default'   => array(
						'background-color'      => '#ffffff',
						'background-image'      => '',
						'background-position'   => 'center center',
						'background-size'       => 'auto',
						'background-attachment' => 'scroll',
						'background-repeat'     => 'repeat',
					),
					'type'      => 'control',
					'control'   => 'zakra-background',
					'section'   => 'zakra_container',
					'transport' => 'postMessage',
					'priority'  => 60,
				),

				// Divider.
				array(
					'name'     => 'zakra_outside_container_divider',
					'type'     => 'control',
					'control'  => 'zakra-divider',
					'style'    => 'dashed',
					'section'  => 'zakra_container',
					'priority' => 60,
				),

				array(
					'name'     => 'zakra_outside_container_background_heading',
					'type'     => 'control',
					'control'  => 'zakra-subtitle',
					'label'    => esc_html__( 'Outside', 'zakra' ),
					'section'  => 'zakra_container',
					'priority' => 65,
				),

			);

			$options = array_merge( $options, $configs );

			if ( ! zakra_is_zakra_pro_active() ) {

				$configs[] = array(
					'name'        => 'zakra_container_upgrade',
					'type'        => 'control',
					'control'     => 'zakra-upgrade',
					'label'       => esc_html__( 'Learn more', 'zakra' ),
					'description' => esc_html__( 'Unlock more features available in Pro version.', 'zakra' ),
					'url'         => esc_url( 'https://zakratheme.com/colormag-pricing/?utm_source=zakra-theme&utm_medium=customizer-option-name&utm_campaign=zakra-customizer+&utm_content=Learn+More ' ),
					'section'     => 'zakra_container',
					'priority'    => 100,
				);

				$options = array_merge( $options, $configs );
			}

			return $options;
		}

	}

	new Zakra_Customize_Container_Option();

endif;
