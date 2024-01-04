<?php
/**
 * Layout WooCommerce layout.
 *
 * @package     zakra
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Return if WooCommerce plugin is not activated.
if ( ! zakra_is_woocommerce_active() ) {
	return;
}

/*========================================== LAYOUT > WooCommerce ==========================================*/
if ( ! class_exists( 'Zakra_Customize_Layout_WooCommerce_Option' ) ) :

	/**
	 * Layout WooCommerce option.
	 */
	class Zakra_Customize_Layout_WooCommerce_Option extends Zakra_Customize_Base_Option {

		/**
		 * Include customize options.
		 *
		 * @param array                 $options      Customize options provided via the theme.
		 * @param \WP_Customize_Manager $wp_customize Theme Customizer object.
		 *
		 * @return mixed|void Customizer options for registering panels, sections as well as controls.
		 */
		public function register_options( $options, $wp_customize ) {

			$sidebar_layout_choices = apply_filters(
				'zakra_site_layout_choices',
				array(
					'default'    => array(
						'label' => 'Default',
						'url'   => ZAKRA_PARENT_INC_ICON_URI . '/sidebar-default.svg',
					),
					'left'       => array(
						'label' => 'Left Sidebar',
						'url'   => ZAKRA_PARENT_INC_ICON_URI . '/left-sidebar.svg',
					),
					'right'      => array(
						'label' => 'Right Sidebar',
						'url'   => ZAKRA_PARENT_INC_ICON_URI . '/right-sidebar.svg',
					),
					'centered'    => array(
						'label' => 'Centered',
						'url'   => ZAKRA_PARENT_INC_ICON_URI . '/sidebar-centered.svg',
					),
					'contained' => array(
						'label' => 'Contained',
						'url'   => ZAKRA_PARENT_INC_ICON_URI . '/sidebar-contained.svg',
					),
					'stretched'  => array(
						'label' => 'Stretched',
						'url'   => ZAKRA_PARENT_INC_ICON_URI . '/sidebar-stretched.svg',
					),
				)
			);

			$configs = array(

				array(
					'name'     => 'zakra_woocommerce_sidebar_layout_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'label'    => esc_html__( 'Layout', 'zakra' ),
					'section'  => 'zakra_woocommerce_sidebar_layout',
					'priority' => 5,
				),

				array(
					'name'     => 'zakra_woocommerce_default_sidebar_layout_heading',
					'type'     => 'control',
					'control'  => 'zakra-subtitle',
					'label'    => esc_html__( 'Default', 'zakra' ),
					'section'  => 'zakra_woocommerce_sidebar_layout',
					'priority' => 5,
				),

				array(
					'name'      => 'zakra_woocommerce_default_sidebar_layout',
					'default'   => 'right',
					'type'      => 'control',
					'control'   => 'zakra-radio-image',
					'section'   => 'zakra_woocommerce_sidebar_layout',
					'priority'  => 5,
					'image_col' => 2,
					'choices' => array_slice( $sidebar_layout_choices, 1, count($sidebar_layout_choices) ),
				),

				array(
					'name'     => 'zakra_woocommerce_default_sidebar_layout_divider',
					'type'     => 'control',
					'control'  => 'zakra-divider',
					'style'    => 'dashed',
					'section'  => 'zakra_woocommerce_sidebar_layout',
					'priority' => 10,
				),

				array(
					'name'     => 'zakra_woocommerce_sidebar_layout_subheading',
					'type'     => 'control',
					'control'  => 'zakra-subtitle',
					'label'    => esc_html__( 'WooCommerce', 'zakra' ),
					'section'  => 'zakra_woocommerce_sidebar_layout',
					'priority' => 10,
				),

				array(
					'name'      => 'zakra_woocommerce_sidebar_layout',
					'default'   => 'right',
					'type'      => 'control',
					'control'   => 'zakra-radio-image',
					'section'   => 'zakra_woocommerce_sidebar_layout',
					'priority'  => 10,
					'image_col' => 2,
					'choices'   => $sidebar_layout_choices,
				),

				array(
					'name'     => 'zakra_zakra_woocommerce_sidebar_layout_divider',
					'type'     => 'control',
					'control'  => 'zakra-divider',
					'style'    => 'dashed',
					'section'  => 'zakra_woocommerce_sidebar_layout',
					'priority' => 10,
				),

				array(
					'name'     => 'zakra_woocommerce_single_product_sidebar_layout_heading',
					'type'     => 'control',
					'control'  => 'zakra-subtitle',
					'label'    => esc_html__( 'Single Product', 'zakra' ),
					'section'  => 'zakra_woocommerce_sidebar_layout',
					'priority' => 20,
				),

				array(
					'name'      => 'zakra_woocommerce_single_product_sidebar_layout',
					'default'   => 'right',
					'type'      => 'control',
					'control'   => 'zakra-radio-image',
					'section'   => 'zakra_woocommerce_sidebar_layout',
					'priority'  => 20,
					'image_col' => 2,
					'choices'   => $sidebar_layout_choices,
				),

			);

			$options = array_merge( $options, $configs );

			return $options;
		}

	}

	new Zakra_Customize_Layout_WooCommerce_Option();

endif;
