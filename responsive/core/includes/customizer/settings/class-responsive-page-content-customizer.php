<?php
/**
 * Theme Options Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Page_Content_Customizer' ) ) :
	/**
	 * Theme Options Customizer Options
	 */
	class Responsive_Page_Content_Customizer {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {

			add_action( 'customize_register', array( $this, 'customizer_options' ) );

		}

		/**
		 * Check if Responsive Pro is greater.
		 *
		 * @since 4.9.7
		 */
		public function is_pro_version_greater() {
			$is_pro_version_greater = false;
			if ( ! defined( 'RESPONSIVE_ADDONS_PRO_VERSION' ) ) {
				return false;
			}
			if ( version_compare( RESPONSIVE_ADDONS_PRO_VERSION, '2.6.3', '>' ) ) {
				$is_pro_version_greater = true;
			}
			return $is_pro_version_greater;
		}

		/**
		 * Customizer options
		 *
		 * @since 0.2
		 *
		 * @param  object $wp_customize WordPress customization option.
		 */
		public function customizer_options( $wp_customize ) {
			$tabs_label            = esc_html__( 'Tabs', 'responsive' );
			$design_tab_ids_prefix = 'customize-control-';
			$design_tab_ids        = array(
				$design_tab_ids_prefix . 'responsive_page_typography_title_separator',
				$design_tab_ids_prefix . 'page_title_typography-font-family',
				$design_tab_ids_prefix . 'page_title_typography-font-weight',
				$design_tab_ids_prefix . 'page_title_typography-font-style',
				$design_tab_ids_prefix . 'page_title_typography-text-transform',
				$design_tab_ids_prefix . 'page_title_typography-font-size',
				$design_tab_ids_prefix . 'page_title_typography-line-height',
				$design_tab_ids_prefix . 'page_title_typography-letter-spacing',
				$design_tab_ids_prefix . 'page_title_typography-color',
			);

			$general_tab_ids_prefix = 'customize-control-responsive_page_';
			$general_tab_ids        = array(
				$general_tab_ids_prefix . 'content_width',
				$general_tab_ids_prefix . 'elements_separator',
				$general_tab_ids_prefix . 'single_elements_positioning',
				$general_tab_ids_prefix . 'featured_image_separator',
				$general_tab_ids_prefix . 'featured_image_width',
				$general_tab_ids_prefix . 'featured_image_style',
				$general_tab_ids_prefix . 'featured_image_style',
				$general_tab_ids_prefix . 'featured_image_alignment',
				$general_tab_ids_prefix . 'title_separator',
				$general_tab_ids_prefix . 'title_alignment',
				$general_tab_ids_prefix . 'content_separator',
				$general_tab_ids_prefix . 'content_alignment',
				$general_tab_ids_prefix . 'content_width_separator',
				$general_tab_ids_prefix . 'single_elements_positioning_separator',
				$general_tab_ids_prefix . 'featured_image_width_separator',
				$general_tab_ids_prefix . 'featured_image_style_separator',
				$general_tab_ids_prefix . 'featured_image_alignment_separator',
				$general_tab_ids_prefix . 'title_alignment_separator',
			);
			responsive_tabs_button_control( $wp_customize, 'page_tabs', $tabs_label, 'responsive_page', 10, '', 'responsive_page_content_general_tab', 'responsive_page_content_design_tab', $general_tab_ids, $design_tab_ids, null );

			// Main Content Width.
			$page_content_width_label = esc_html__( 'Main Content Width (%)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'page_content_width', $page_content_width_label, 'responsive_page', 10, Responsive\Core\get_responsive_customizer_defaults( 'page_content_width' ), null, 100, 1, 'postMessage' );

			responsive_horizontal_separator_control($wp_customize, 'page_content_width_separator', 1, 'responsive_page', 12, 1, );

			/**
			 * Page Elements Positioning
			 */
			$wp_customize->add_setting(
				'responsive_page_single_elements_positioning',
				array(
					'default'           => array( 'title', 'featured_image', 'content' ),
					'sanitize_callback' => 'responsive_sanitize_multi_choices',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				new Responsive_Customizer_Sortable_Control(
					$wp_customize,
					'responsive_page_single_elements_positioning',
					array(
						'label'    => esc_html__( 'Page Elements', 'responsive' ),
						'section'  => 'responsive_page',
						'settings' => 'responsive_page_single_elements_positioning',
						'priority' => 20,
						'choices'  => responsive_page_elements(),
					)
				)
			);

			responsive_horizontal_separator_control($wp_customize, 'page_single_elements_positioning_separator', 2, 'responsive_page', 22, 1, );

			/**
			 * Entry Elements.
			 */
			$page_featured_image_label = esc_html__( 'Page Featured Image', 'responsive' );
			responsive_separator_control( $wp_customize, 'page_featured_image_separator', $page_featured_image_label, 'responsive_page', 30 );

			// Featured Image Width.
			$page_featured_image_width_label = esc_html__( 'Image Width Size (px)', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'page_featured_image_width', $page_featured_image_width_label, 'responsive_page', 35, '', null, 4800 );

			responsive_horizontal_separator_control($wp_customize, 'page_featured_image_width_separator', 1, 'responsive_page', 37, 1, );
			
			// Style.
			$featured_image_style_label   = esc_html__( 'Image Style', 'responsive' );
			$featured_image_style_choices = array(
				'default'   => esc_html__( 'Default', 'responsive' ),
				'stretched' => esc_html__( 'Stretched', 'responsive' ),
			);
			responsive_select_button_control( $wp_customize, 'page_featured_image_style', $featured_image_style_label, 'responsive_page', 40, $featured_image_style_choices, 'default', null, 'postMessage' );

			responsive_horizontal_separator_control($wp_customize, 'page_featured_image_style_separator', 1, 'responsive_page', 42, 1, );

			// Featured Image Alignment.
			$featured_image_alignment_label   = esc_html__( 'Image Alignment', 'responsive' );
			$featured_image_alignment_choices = array(
				'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
				'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
			);
			if ( is_rtl() ) {
				$featured_image_alignment_choices = array(
					'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
					'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
					'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
				);
			}
			responsive_select_button_control( $wp_customize, 'page_featured_image_alignment', $featured_image_alignment_label, 'responsive_page', 50, $featured_image_alignment_choices, 'left', null );

			responsive_horizontal_separator_control($wp_customize, 'page_featured_image_alignment_separator', 2, 'responsive_page', 52, 1, );

			// Alignment.
			$page_title_alignment_label   = esc_html__( 'Page Title Alignment', 'responsive' );
			$page_title_alignment_choices = array(
				'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
				'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
			);
			if ( is_rtl() ) {
				$page_title_alignment_choices = array(
					'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
					'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
					'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
				);
			}
			responsive_select_button_control( $wp_customize, 'page_title_alignment', $page_title_alignment_label, 'responsive_page', 70, $page_title_alignment_choices, 'left', null );

			responsive_horizontal_separator_control($wp_customize, 'page_title_alignment_separator', 2, 'responsive_page', 72, 1, );

			// Content Alignment.
			$page_content_alignment_label   = esc_html__( 'Page Content Alignment', 'responsive' );
			$page_content_alignment_choices = array(
				'justify' => esc_html__( 'dashicons-editor-justify', 'responsive' ),
				'left'    => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
				'center'  => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
				'right'   => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
			);
			if ( is_rtl() ) {
				$single_blog_content_alignment_choices = array(
					'justify' => esc_html__( 'dashicons-editor-justify', 'responsive' ),
					'left'    => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
					'center'  => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
					'right'   => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
				);
			}
			responsive_select_button_control( $wp_customize, 'page_content_alignment', $page_content_alignment_label, 'responsive_page', 90, $page_content_alignment_choices, 'left', null );

		}

	}

endif;

return new Responsive_Page_Content_Customizer();
