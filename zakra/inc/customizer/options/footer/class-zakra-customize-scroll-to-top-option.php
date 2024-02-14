<?php
/**
 * Scroll to top styling.
 *
 * @package     zakra
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*== STYLING >  SCROLL TO TOP  ==*/
if ( ! class_exists( 'Zakra_Customize_Scroll_To_Top_Option' ) ) :

	/**
	 * Scroll_To_Top option.
	 */
	class Zakra_Customize_Scroll_To_Top_Option extends Zakra_Customize_Base_Option {

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
					'name'     => 'zakra_scroll_to_top_general_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'label'    => esc_html__( 'General', 'zakra' ),
					'section'  => 'zakra_footer_scroll_to_top',
					'priority' => 5,
				),

				array(
					'name'     => 'zakra_enable_scroll_to_top',
					'default'  => true,
					'type'     => 'control',
					'control'  => 'zakra-toggle',
					'label'    => esc_html__( 'Enable', 'zakra' ),
					'section'  => 'zakra_footer_scroll_to_top',
					'priority' => 10,
				),

				array(
					'name'       => 'zakra_scroll_to_top_background_group',
					'default'    => '',
					'type'       => 'control',
					'control'    => 'zakra-group',
					'label'      => esc_html__( 'Background', 'zakra' ),
					'section'    => 'zakra_footer_scroll_to_top',
					'priority'   => 50,
					'dependency' => array(
						'zakra_enable_scroll_to_top',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_scroll_to_top_background',
					'default'    => '#16181a',
					'type'       => 'sub-control',
					'control'    => 'zakra-color',
					'parent'     => 'zakra_scroll_to_top_background_group',
					'tab'        => esc_html__( 'Normal', 'zakra' ),
					'section'    => 'zakra_footer_scroll_to_top',
					'transport'  => 'postMessage',
					'priority'   => 55,
					'dependency' => array(
						'zakra_enable_scroll_to_top',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_scroll_to_top_hover_background',
					'default'    => '#1e7ba6',
					'type'       => 'sub-control',
					'control'    => 'zakra-color',
					'parent'     => 'zakra_scroll_to_top_background_group',
					'tab'        => esc_html__( 'Hover', 'zakra' ),
					'section'    => 'zakra_footer_scroll_to_top',
					'transport'  => 'postMessage',
					'priority'   => 55,
					'dependency' => array(
						'zakra_enable_scroll_to_top',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_scroll_to_top_icon_heading',
					'type'       => 'control',
					'control'    => 'zakra-title',
					'label'      => esc_html__( 'Icon', 'zakra' ),
					'section'    => 'zakra_footer_scroll_to_top',
					'priority'   => 70,
					'dependency' => array(
						'zakra_enable_scroll_to_top',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_scroll_to_top_icon_color_group',
					'default'    => '',
					'type'       => 'control',
					'control'    => 'zakra-group',
					'label'      => esc_html__( 'Color', 'zakra' ),
					'section'    => 'zakra_footer_scroll_to_top',
					'priority'   => 80,
					'dependency' => array(
						'zakra_enable_scroll_to_top',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_scroll_to_top_icon_color',
					'default'    => '#ffffff',
					'type'       => 'sub-control',
					'control'    => 'zakra-color',
					'parent'     => 'zakra_scroll_to_top_icon_color_group',
					'tab'        => esc_html__( 'Normal', 'zakra' ),
					'section'    => 'zakra_footer_scroll_to_top',
					'priority'   => 85,
					'dependency' => array(
						'zakra_enable_scroll_to_top',
						'==',
						true,
					),
				),

				array(
					'name'       => 'zakra_scroll_to_top_icon_hover_color',
					'default'    => '#ffffff',
					'type'       => 'sub-control',
					'control'    => 'zakra-color',
					'parent'     => 'zakra_scroll_to_top_icon_color_group',
					'tab'        => esc_html__( 'Hover', 'zakra' ),
					'section'    => 'zakra_footer_scroll_to_top',
					'priority'   => 85,
					'dependency' => array(
						'zakra_enable_scroll_to_top',
						'==',
						true,
					),
				),

			);

			$options = array_merge( $options, $configs );

			if ( ! zakra_is_zakra_pro_active() ) {

				$configs[] = array(
					'name'        => 'zakra_footer_scroll_to_top_upgrade',
					'type'        => 'control',
					'control'     => 'zakra-upgrade',
					'label'       => esc_html__( 'Learn more', 'zakra' ),
					'description' => esc_html__( 'Unlock more features available in Pro version.', 'zakra' ),
					'url'         => esc_url( 'https://zakratheme.com/colormag-pricing/?utm_source=zakra-theme&utm_medium=customizer-option-name&utm_campaign=zakra-customizer+&utm_content=Learn+More ' ),
					'section'     => 'zakra_footer_scroll_to_top',
					'priority'    => 100,
				);

				$options = array_merge( $options, $configs );
			}

			return $options;
		}

	}

	new Zakra_Customize_Scroll_To_Top_Option();

endif;
