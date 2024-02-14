<?php
/**
 * Sidebar Layout.
 *
 * @package     zakra
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*========================================== LAYOUT > General ==========================================*/
if ( ! class_exists( 'Zakra_Customize_Sidebar_Layout_Option' ) ) :

	/**
	 * Layout general option.
	 */
	class Zakra_Customize_Sidebar_Layout_Option extends Zakra_Customize_Base_Option {

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
					'default'   => array(
						'label' => 'Default',
						'url'   => ZAKRA_PARENT_INC_ICON_URI . '/sidebar-default.svg',
					),
					'left'      => array(
						'label' => 'Left Sidebar',
						'url'   => ZAKRA_PARENT_INC_ICON_URI . '/left-sidebar.svg',
					),
					'right'     => array(
						'label' => 'Right Sidebar',
						'url'   => ZAKRA_PARENT_INC_ICON_URI . '/right-sidebar.svg',
					),
					'centered'  => array(
						'label' => 'Centered',
						'url'   => ZAKRA_PARENT_INC_ICON_URI . '/sidebar-centered.svg',
					),
					'contained' => array(
						'label' => 'Contained',
						'url'   => ZAKRA_PARENT_INC_ICON_URI . '/sidebar-contained.svg',
					),
					'stretched' => array(
						'label' => 'Stretched',
						'url'   => ZAKRA_PARENT_INC_ICON_URI . '/sidebar-stretched.svg',
					),
				)
			);

			$configs = array(

				array(
					'name'     => 'zakra_sidebar_general_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'label'    => esc_html__( 'General', 'zakra' ),
					'section'  => 'zakra_sidebar_layout',
					'priority' => 5,
				),

				array(
					'name'        => 'zakra_sidebar_width',
					'default'     => array(
						'size' => 30,
						'unit' => '%',
					),
					'suffix'      => array( '%', 'px', 'em' ),
					'type'        => 'control',
					'control'     => 'zakra-slider',
					'label'       => esc_html__( 'Width', 'zakra' ),
					'section'     => 'zakra_sidebar_layout',
					'transport'   => 'postMessage',
					'priority'    => 5,
					'input_attrs' => array(
						'%' => array(
							'min'  => 15,
							'max'  => 100,
							'step' => 1,
						),
						'px' => array(
							'min'  => 15,
							'max'  => 100,
							'step' => 1,
						),
						'em' => array(
							'min'  => 15,
							'max'  => 100,
							'step' => 0.1,
						),
					),
				),

				array(
					'name'     => 'zakra_sidebar_layout_heading',
					'type'     => 'control',
					'control'  => 'zakra-title',
					'label'    => esc_html__( 'Layout', 'zakra' ),
					'section'  => 'zakra_sidebar_layout',
					'priority' => 10,
				),

				array(
					'name'     => 'zakra_sidebar_default_layout_heading',
					'type'     => 'control',
					'control'  => 'zakra-subtitle',
					'label'    => esc_html__( 'Default', 'zakra' ),
					'section'  => 'zakra_sidebar_layout',
					'priority' => 15,
				),

				array(
					'name'      => 'zakra_default_sidebar_layout',
					'default'   => 'right',
					'type'      => 'control',
					'control'   => 'zakra-radio-image',
					'section'   => 'zakra_sidebar_layout',
					'priority'  => 20,
					'image_col' => 2,
					'choices'   => array_slice( $sidebar_layout_choices, 1, count( $sidebar_layout_choices ) ),
				),

				array(
					'name'     => 'zakra_default_sidebar_divider',
					'type'     => 'control',
					'control'  => 'zakra-divider',
					'style'    => 'dashed',
					'section'  => 'zakra_sidebar_layout',
					'priority' => 20,
				),

				array(
					'name'     => 'zakra_sidebar_archive_layout_heading',
					'type'     => 'control',
					'control'  => 'zakra-subtitle',
					'label'    => esc_html__( 'Archive', 'zakra' ),
					'section'  => 'zakra_sidebar_layout',
					'priority' => 20,
				),

				array(
					'name'      => 'zakra_archive_sidebar_layout',
					'default'   => 'right',
					'type'      => 'control',
					'control'   => 'zakra-radio-image',
					'section'   => 'zakra_sidebar_layout',
					'priority'  => 20,
					'image_col' => 2,
					'choices'   => $sidebar_layout_choices,
				),

				array(
					'name'     => 'zakra_archive_sidebar_divider',
					'type'     => 'control',
					'control'  => 'zakra-divider',
					'style'    => 'dashed',
					'section'  => 'zakra_sidebar_layout',
					'priority' => 25,
				),

				array(
					'name'     => 'zakra_sidebar_single_post_layout_heading',
					'type'     => 'control',
					'control'  => 'zakra-subtitle',
					'label'    => esc_html__( 'Single Post', 'zakra' ),
					'section'  => 'zakra_sidebar_layout',
					'priority' => 30,
				),

				array(
					'name'      => 'zakra_post_sidebar_layout',
					'default'   => 'right',
					'type'      => 'control',
					'control'   => 'zakra-radio-image',
					'section'   => 'zakra_sidebar_layout',
					'priority'  => 30,
					'image_col' => 2,
					'choices'   => $sidebar_layout_choices,
				),

				array(
					'name'     => 'zakra_single_post_sidebar_divider',
					'type'     => 'control',
					'control'  => 'zakra-divider',
					'style'    => 'dashed',
					'section'  => 'zakra_sidebar_layout',
					'priority' => 30,
				),

				array(
					'name'     => 'zakra_page_heading',
					'type'     => 'control',
					'control'  => 'zakra-subtitle',
					'label'    => esc_html__( 'Page', 'zakra' ),
					'section'  => 'zakra_sidebar_layout',
					'priority' => 35,
				),

				array(
					'name'      => 'zakra_page_sidebar_layout',
					'default'   => 'right',
					'type'      => 'control',
					'control'   => 'zakra-radio-image',
					'section'   => 'zakra_sidebar_layout',
					'priority'  => 40,
					'image_col' => 2,
					'choices'   => $sidebar_layout_choices,
				),

				array(
					'name'     => 'zakra_page_sidebar_divider',
					'type'     => 'control',
					'control'  => 'zakra-divider',
					'style'    => 'dashed',
					'section'  => 'zakra_sidebar_layout',
					'priority' => 40,
				),

				array(
					'name'     => 'zakra_other_heading',
					'type'     => 'control',
					'control'  => 'zakra-subtitle',
					'label'    => esc_html__( 'Others', 'zakra' ),
					'section'  => 'zakra_sidebar_layout',
					'priority' => 150,
				),

				array(
					'name'      => 'zakra_others_sidebar_layout',
					'default'   => 'right',
					'type'      => 'control',
					'control'   => 'zakra-radio-image',
					'section'   => 'zakra_sidebar_layout',
					'priority'  => 150,
					'image_col' => 2,
					'choices'   => $sidebar_layout_choices,
				),

			);

			$options = array_merge( $options, $configs );

			if ( ! zakra_is_zakra_pro_active() ) {

				$configs[] = array(
					'name'        => 'zakra_layout_structure_upgrade',
					'type'        => 'control',
					'control'     => 'zakra-upgrade',
					'label'       => esc_html__( 'Learn more', 'zakra' ),
					'description' => esc_html__( 'Unlock more features available in Pro version.', 'zakra' ),
					'url'         => esc_url( 'https://zakratheme.com/colormag-pricing/?utm_source=zakra-theme&utm_medium=customizer-option-name&utm_campaign=zakra-customizer+&utm_content=Learn+More ' ),
					'section'     => 'zakra_sidebar_layout',
					'priority'    => 200,
				);

				$options = array_merge( $options, $configs );
			}

			return $options;
		}

	}

	new Zakra_Customize_Sidebar_Layout_Option();

endif;
