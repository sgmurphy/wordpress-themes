<?php
/**
 * Migrate options on theme updates.
 *
 * @package zakra
 *
 * @since 3.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Zakra_Migration' ) ) {

	/**
	 * Zakra_Migration class.
	 *
	 */

	class Zakra_Migration {
		/**
		 * @var array|false
		 */
		private $old_theme_mods;

		public function __construct() {

			if ( self::maybe_run_migration() || self::demo_import_migration() ) {
				/**
				 * Zakra revamp migrations.
				 */
				$this->old_theme_mods = get_theme_mods();
				add_action( 'after_setup_theme', array( $this, 'customizer_migration_v3' ), 20 );
			}
		}

		/**
		 * Migrate customizer options.
		 *
		 * @package Zakra
		 *
		 * @since 3.0.0
		 */
		public function customizer_migration_v3() {

			/**
			 * Revamp migration.
			 */
			// Site identity and tagline display.
			if ( 'blank' === get_theme_mod( 'header_textcolor' ) ) {

				set_theme_mod( 'zakra_enable_site_identity', false );
				set_theme_mod( 'zakra_enable_site_tagline', false );
			}

			// Site identity and tagline color.
			$header_text_color = get_theme_mod( 'header_textcolor' );

			if ( $header_text_color ) {

				set_theme_mod( 'zakra_site_identity_color', '#' . $header_text_color );
				remove_theme_mod( 'header_textcolor' );
			}

			$normal_options = array(
				array(
					'old_key' => 'zakra_base_color_primary',
					'new_key' => 'zakra_primary_color',
				),
				array(
					'old_key' => 'zakra_base_color_text',
					'new_key' => 'zakra_base_color',
				),
				array(
					'old_key' => 'zakra_base_color_border',
					'new_key' => 'zakra_border_color',
				),
				array(
					'old_key' => 'zakra_button_text_color',
					'new_key' => 'zakra_button_color',
				),
				array(
					'old_key' => 'zakra_button_text_hover_color',
					'new_key' => 'zakra_button_hover_color',
				),
				array(
					'old_key' => 'zakra_button_bg_color',
					'new_key' => 'zakra_button_background_color',
				),
				array(
					'old_key' => 'zakra_button_bg_hover_color',
					'new_key' => 'zakra_button_background_hover_color',
				),
				array(
					'old_key' => 'zakra_header_top_text_color',
					'new_key' => 'zakra_top_bar_color',
				),
				array(
					'old_key' => 'zakra_header_button_bg_color',
					'new_key' => 'zakra_header_button_background_color',
				),
				array(
					'old_key' => 'zakra_header_button_bg_hover_color',
					'new_key' => 'zakra_header_button_background_hover_color',
				),
				array(
					'old_key' => 'zakra_header_main_border_bottom_color',
					'new_key' => 'zakra_main_header_border_bottom_color',
				),
				array(
					'old_key' => 'zakra_primary_menu_text_color',
					'new_key' => 'zakra_main_menu_color',
				),
				array(
					'old_key' => 'zakra_primary_menu_text_hover_color',
					'new_key' => 'zakra_main_menu_hover_color',
				),
				array(
					'old_key' => 'zakra_primary_menu_text_active_color',
					'new_key' => 'zakra_main_menu_active_color',
				),
				array(
					'old_key' => 'zakra_page_title_enabled',
					'new_key' => 'zakra_page_title_position',
				),
				array(
					'old_key' => 'zakra_breadcrumbs_seperator_color',
					'new_key' => 'zakra_breadcrumb_separator_color',
				),
				array(
					'old_key' => 'zakra_post_content_archive_blog',
					'new_key' => 'zakra_blog_excerpt_type',
				),
				array(
					'old_key' => 'zakra_footer_widgets_border_top_color',
					'new_key' => 'zakra_footer_column_border_top_color',
				),
				array(
					'old_key' => 'zakra_footer_widgets_text_color',
					'new_key' => 'zakra_footer_column_widget_text_color',
				),
				array(
					'old_key' => 'zakra_footer_widgets_link_color',
					'new_key' => 'zakra_footer_column_widget_link_color',
				),
				array(
					'old_key' => 'zakra_footer_widgets_link_hover_color',
					'new_key' => 'zakra_footer_column_widget_link_hover_color',
				),
				array(
					'old_key' => 'zakra_scroll_to_top_bg_color',
					'new_key' => 'zakra_scroll_to_top_background',
				),
				array(
					'old_key' => 'zakra_scroll_to_top_bg_hover_color',
					'new_key' => 'zakra_scroll_to_top_hover_background',
				),
				array(
					'old_key' => 'zakra_scroll_to_top_color',
					'new_key' => 'zakra_scroll_to_top_icon_color',
				),
				array(
					'old_key' => 'zakra_header_top_left_content',
					'new_key' => 'zakra_top_bar_column_1_content_type',
				),
				array(
					'old_key' => 'zakra_header_top_left_content_html',
					'new_key' => 'zakra_top_bar_column_1_html',
				),
				array(
					'old_key' => 'zakra_header_top_left_content_menu',
					'new_key' => 'zakra_top_bar_column_1_menu',
				),
				array(
					'old_key' => 'zakra_header_top_right_content',
					'new_key' => 'zakra_top_bar_column_2_content_type',
				),
				array(
					'old_key' => 'zakra_header_top_right_content_html',
					'new_key' => 'zakra_top_bar_column_2_html',
				),
				array(
					'old_key' => 'zakra_header_top_right_content_menu',
					'new_key' => 'zakra_top_bar_column_2_menu',
				),
				array(
					'old_key' => 'zakra_footer_bar_section_one',
					'new_key' => 'zakra_footer_bar_column_1_content_type',
				),
				array(
					'old_key' => 'zakra_footer_bar_section_one_html',
					'new_key' => 'zakra_footer_bar_column_1_html',
				),
				array(
					'old_key' => 'zakra_footer_bar_section_one_menu',
					'new_key' => 'zakra_footer_bar_column_1_menu',
				),
				array(
					'old_key' => 'zakra_footer_bar_section_two',
					'new_key' => 'zakra_footer_bar_column_2_content_type',
				),
				array(
					'old_key' => 'zakra_footer_bar_section_two_html',
					'new_key' => 'zakra_footer_bar_column_2_html',
				),
				array(
					'old_key' => 'zakra_footer_bar_section_two_menu',
					'new_key' => 'zakra_footer_bar_column_2_menu',
				),
				array(
					'old_key' => 'zakra_header_button_text_color',
					'new_key' => 'zakra_header_button_color',
				),
				array(
					'old_key' => 'zakra_header_button_text_hover_color',
					'new_key' => 'zakra_header_button_hover_color',
				),
				array(
					'old_key' => 'zakra_scroll_to_top_hover_color',
					'new_key' => 'zakra_scroll_to_top_icon_hover_color',
				),

			);

			foreach ( $normal_options as $option ) {

				$old_value = get_theme_mod( $option['old_key'] );

				if ( $old_value ) {

					set_theme_mod( $option['new_key'], $old_value );
					remove_theme_mod( $option['old_key'] );
				}
			}

			// Enable migration.
			$enable_options = array(
				array(
					'old_key' => 'zakra_header_top_enabled',
					'new_key' => 'zakra_enable_top_bar',
					'default' => false,
				),
				array(
					'old_key' => 'zakra_scroll_to_top_enabled',
					'new_key' => 'zakra_enable_scroll_to_top',
					'default' => true,
				),
				array(
					'old_key' => 'zakra_enable_read_more_archive_blog',
					'new_key' => 'zakra_enable_blog_button',
					'default' => true,
				),
				array(
					'old_key' => 'zakra_breadcrumbs_enabled',
					'new_key' => 'zakra_enable_breadcrumb',
					'default' => true,
				),
				array(
					'old_key' => 'tg_header_menu_search_enabled',
					'new_key' => 'zakra_enable_header_search',
					'default' => true,
				),
			);

			foreach ( $enable_options as $option ) {

				if ( ! array_key_exists( $option['old_key'], $this->old_theme_mods ) ) {
					continue;
				}

				$old_value = get_theme_mod( $option['old_key'], $option['default'] );

				set_theme_mod( $option['new_key'], $old_value );

				remove_theme_mod( $option['old_key'] );
			}

			// Footer widgets.
			$footer_widgets = get_theme_mod( 'zakra_footer_widgets_enabled', true );

			if ( $footer_widgets ) {
				set_theme_mod( 'zakra_enable_footer_column', true );
				remove_theme_mod( 'zakra_footer_widgets_enabled' );
			} else {
				set_theme_mod( 'zakra_enable_footer_column', false );
				remove_theme_mod( 'zakra_footer_widgets_enabled' );
			}

			// Primary menu enable
			$primary_menu = get_theme_mod( 'zakra_primary_menu_disabled' );

			if ( ! empty( $primary_menu ) ) {
				set_theme_mod( 'zakra_enable_primary_menu', false );
			} else {
				set_theme_mod( 'zakra_enable_primary_menu', true );
			}

			// Widget title enable
			$widget_title_enable = get_theme_mod( 'zakra_footer_widgets_hide_title' );

			if ( ! empty( $widget_title_enable ) ) {

				set_theme_mod( 'zakra_enable_footer_widgets_title', false );
				remove_theme_mod( 'zakra_footer_widgets_hide_title' );
			} else {

				set_theme_mod( 'zakra_enable_footer_widgets_title', true );
				remove_theme_mod( 'zakra_footer_widgets_hide_title' );
			}

			// Header button.
			$header_button_text = get_theme_mod( 'zakra_header_button_text' );

			if ( $header_button_text ) {

				set_theme_mod( 'zakra_enable_header_button', true );
			}

			// Container layout.
			$container_layout = get_theme_mod( 'zakra_general_container_style', 'wide' );

			if ( $container_layout ) {

				switch ( $container_layout ) {
					case 'tg-container--wide':
						$container_layout_new = 'wide';
						break;
					case 'tg-container--boxed':
						$container_layout_new = 'boxed';
						break;
					case 'tg-container--separate':
						$container_layout_new = 'wide';
						set_theme_mod( 'zakra_content_area_layout', 'boxed' );
						break;
					default:
						$container_layout_new = 'wide';
				}

				set_theme_mod( 'zakra_container_layout', $container_layout_new );
				remove_theme_mod( 'zakra_general_container_style' );
			}

			// Slider control migration.
			$slider_options = array(
				array(
					'old_key' => 'zakra_general_container_width',
					'new_key' => 'zakra_container_width',
					'default' => array(
						'size' => 1170,
						'unit' => 'px',
					),
				),
				array(
					'old_key' => 'zakra_general_sidebar_width',
					'new_key' => 'zakra_sidebar_width',
					'default' => array(
						'size' => 30,
						'unit' => '%',
					),
				),
				array(
					'old_key' => 'zakra_header_button_roundness',
					'new_key' => 'zakra_header_button_border_radius',
					'default' => array(
						'size' => '',
						'unit' => 'px',
					),
				),
				array(
					'old_key' => 'zakra_header_main_border_bottom_width',
					'new_key' => 'zakra_main_header_border_bottom_width',
					'default' => array(
						'size' => 1,
						'unit' => 'px',
					),
				),
				array(
					'old_key' => 'zakra_footer_widgets_border_top_width',
					'new_key' => 'zakra_footer_column_border_top_width',
					'default' => array(
						'size' => '',
						'unit' => 'px',
					),
				),
				array(
					'old_key' => 'zakra_button_roundness',
					'new_key' => 'zakra_button_border_radius',
					'default' => array(
						'size' => '',
						'unit' => 'px',
					),
				),
				array(
					'old_key' => 'zakra_primary_menu_border_bottom_width',
					'new_key' => 'zakra_primary_menu_border_bottom_width',
					'default' => array(
						'size' => '',
						'unit' => 'px',
					),
				),
				array(
					'old_key' => 'zakra_footer_widgets_item_border_bottom_width',
					'new_key' => 'zakra_footer_widgets_item_border_bottom_width',
					'default' => array(
						'size' => '',
						'unit' => 'px',
					),
				),
				array(
					'old_key' => 'zakra_footer_bar_border_top_width',
					'new_key' => 'zakra_footer_bar_border_top_width',
					'default' => array(
						'size' => 1,
						'unit' => 'px',
					),
				),
				array(
					'old_key' => 'zakra_mobile_menu_breakpoint',
					'new_key' => 'zakra_mobile_menu_breakpoint',
					'default' => array(
						'size' => 768,
						'unit' => 'px',
					),
				),
			);

			// Loop through the options and migrate their values.
			foreach ( $slider_options as $option ) {

				// Check if id exist in database or not.
				if ( ! array_key_exists( $option['old_key'], $this->old_theme_mods ) ) {
					continue;
				}

				$old_value = get_theme_mod( $option['old_key'] );

				// Check if the value is scalar.
				if ( ! is_scalar( $old_value ) ) {
					continue;
				}

				if ( isset( $old_value ) ) {

					set_theme_mod(
						$option['new_key'],
						array(
							'size' => $old_value,
							'unit' => $option['default']['unit'],
						)
					);

					if ( $option['old_key'] !== $option['new_key'] ) {

						remove_theme_mod( $option['old_key'] );
					}
				}
			}

			// Extract size and unit from the value.
			$typography_converted_value = function ( $value ) {
				$unit_list = array( 'px', 'em', 'rem', '%', '-', 'vw', 'vh', 'pt', 'pc', '' );

				if ( ! $value ) {
					return array(
						'size' => '',
						'unit' => '',
					);
				}

				preg_match( '/^(\d+(?:\.\d+)?)(.*)$/', $value, $matches );

				$size = isset( $matches[1] ) ? (float) $matches[1] : '';
				$unit = isset( $matches[2] ) ? $matches[2] : '';

				if ( 'rem' === $unit ) {

					$size = $size * ( 14.4 / 10 );
				}

				if ( ! in_array( $unit, $unit_list ) ) {

					$unit = 'px';
				}

				$validUnits = array( 'px', 'em', 'rem' );

				if ( ! in_array( $unit, $validUnits ) ) {

					switch ( $unit ) {
						case 'pc':
							$size *= 16;
							$unit  = 'px';
							break;
						case 'vw':
							$size *= 19.2;
							$unit  = 'px';
							break;
						case 'vh':
							$size *= 10.8;
							$unit  = 'px';
							break;
						case '%':
							$size *= 1.6;
							$unit  = 'px';
							break;
						case 'pt':
							$size *= 1.333;
							$unit  = 'px';
							break;
						default:
							break;
					}
				}

				return array(
					'size' => $size,
					'unit' => $unit,
				);
			};

			$dimension_converted_value = function ( $value ) {
				$unit_list = array( 'px', 'em', 'rem', '%', '-', 'vw', 'vh', 'pt', 'pc' );

				if ( ! $value ) {
					return array(
						'size' => '',
						'unit' => 'px',
					);
				}

				preg_match( '/^(\d+(?:\.\d+)?)(.*)$/', $value, $matches );

				$size = isset( $matches[1] ) ? (float) $matches[1] : 0;
				$unit = isset( $matches[2] ) ? $matches[2] : '';

				if ( ! in_array( $unit, $unit_list ) ) {

					$unit = 'px';
				}

				if ( 'px' !== $unit ) {

					switch ( $unit ) {
						case 'em':
						case 'pc':
						case 'rem':
							$size *= 14.4;
							$unit  = 'px';
							break;
						case 'vw':
							$size *= 19.2;
							$unit  = 'px';
							break;
						case 'vh':
							$size *= 10.8;
							$unit  = 'px';
							break;
						case '%':
							$size *= 1.6;
							$unit  = 'px';
							break;
						case 'pt':
							$size *= 1.333;
							$unit  = 'px';
							break;
						default:
							break;
					}
				}

				return array(
					'size' => $size,
					'unit' => $unit,
				);
			};

			// Migrate the typography options.
			$typography_options = array(
				array(
					'old_key' => 'zakra_base_typography_body',
					'new_key' => 'zakra_body_typography',
				),
				array(
					'old_key' => 'zakra_base_typography_heading',
					'new_key' => 'zakra_heading_typography',
				),
				array(
					'old_key' => 'zakra_typography_h1',
					'new_key' => 'zakra_h1_typography',
				),
				array(
					'old_key' => 'zakra_typography_h2',
					'new_key' => 'zakra_h2_typography',
				),
				array(
					'old_key' => 'zakra_typography_h3',
					'new_key' => 'zakra_h3_typography',
				),
				array(
					'old_key' => 'zakra_typography_h4',
					'new_key' => 'zakra_h4_typography',
				),
				array(
					'old_key' => 'zakra_typography_h5',
					'new_key' => 'zakra_h5_typography',
				),
				array(
					'old_key' => 'zakra_typography_h6',
					'new_key' => 'zakra_h6_typography',
				),
				array(
					'old_key' => 'zakra_typography_site_title',
					'new_key' => 'zakra_site_title_typography',
				),
				array(
					'old_key' => 'zakra_typography_site_description',
					'new_key' => 'zakra_site_tagline_typography',
				),
				array(
					'old_key' => 'zakra_typography_primary_menu',
					'new_key' => 'zakra_main_menu_typography',
				),
				array(
					'old_key' => 'zakra_typography_primary_menu_dropdown_item',
					'new_key' => 'zakra_sub_menu_typography',
				),
				array(
					'old_key' => 'zakra_typography_mobile_menu',
					'new_key' => 'zakra_mobile_menu_typography',
				),
				array(
					'old_key' => 'zakra_typography_post_page_title',
					'new_key' => 'zakra_post_page_title_typography',
				),
				array(
					'old_key' => 'zakra_typography_blog_post_title',
					'new_key' => 'zakra_blog_post_title_typography',
				),
				array(
					'old_key' => 'zakra_typography_widget_heading',
					'new_key' => 'zakra_widget_title_typography',
				),
				array(
					'old_key' => 'zakra_typography_widget_content',
					'new_key' => 'zakra_widget_content_typography',
				),
			);

			foreach ( $typography_options as $option ) {

				$old_value = get_theme_mod( $option['old_key'] );

				if ( $old_value ) {

					$new_desktop_font = isset( $old_value['font-size']['desktop'] ) ? $typography_converted_value( $old_value['font-size']['desktop'] ) : array(
						'size' => '',
						'unit' => 'px',
					);

					$new_tablet_font = isset( $old_value['font-size']['tablet'] ) ? $typography_converted_value( $old_value['font-size']['tablet'] ) : array(
						'size' => '',
						'unit' => 'px',
					);

					$new_mobile_font = isset( $old_value['font-size']['mobile'] ) ? $typography_converted_value( $old_value['font-size']['mobile'] ) : array(
						'size' => '',
						'unit' => 'px',
					);

					$new_desktop_line_height = isset( $old_value['line-height']['desktop'] ) ? $typography_converted_value( $old_value['line-height']['desktop'] ) : array(
						'size' => '',
						'unit' => '-',
					);

					if ( empty( $new_desktop_line_height['unit'] ) ) {

						$new_desktop_line_height['unit'] = '-';
					}

					$new_tablet_line_height = isset( $old_value['line-height']['tablet'] ) ? $typography_converted_value( $old_value['line-height']['tablet'] ) : array(
						'size' => '',
						'unit' => '-',
					);

					if ( empty( $new_tablet_line_height['unit'] ) ) {

						$new_tablet_line_height['unit'] = '-';
					}

					$new_mobile_line_height = isset( $old_value['line-height']['mobile'] ) ? $typography_converted_value( $old_value['line-height']['mobile'] ) : array(
						'size' => '',
						'unit' => '-',
					);

					if ( empty( $new_mobile_line_height['unit'] ) ) {

						$new_mobile_line_height['unit'] = '-';
					}

					$new_desktop_letter_spacing = isset( $old_value['letter-spacing']['desktop'] ) ? $typography_converted_value( $old_value['letter-spacing']['desktop'] ) : array(
						'size' => '',
						'unit' => 'px',
					);

					$new_tablet_letter_spacing = isset( $old_value['letter-spacing']['tablet'] ) ? $typography_converted_value( $old_value['letter-spacing']['tablet'] ) : array(
						'size' => '',
						'unit' => 'px',
					);

					$new_mobile_letter_spacing = isset( $old_value['letter-spacing']['mobile'] ) ? $typography_converted_value( $old_value['letter-spacing']['mobile'] ) : array(
						'size' => '',
						'unit' => 'px',
					);

					$new_value = array(
						'font-family'    => isset( $old_value['font-family'] ) ? $old_value['font-family'] : '',
						'font-weight'    => isset( $old_value['font-weight'] ) ? $old_value['font-weight'] : '',
						'subsets'        => isset( $old_value['subsets'] ) ? $old_value['subsets'] : '',
						'font-size'      => array(
							'desktop' => array(
								'size' => $new_desktop_font['size'],
								'unit' => $new_desktop_font['unit'],
							),
							'tablet'  => array(
								'size' => $new_tablet_font['size'],
								'unit' => $new_tablet_font['unit'],
							),
							'mobile'  => array(
								'size' => $new_mobile_font['size'],
								'unit' => $new_mobile_font['unit'],
							),
						),
						'line-height'    => array(
							'desktop' => array(
								'size' => $new_desktop_line_height['size'],
								'unit' => $new_desktop_line_height['unit'],
							),
							'tablet'  => array(
								'size' => $new_tablet_line_height['size'],
								'unit' => $new_tablet_line_height['unit'],
							),
							'mobile'  => array(
								'size' => $new_mobile_line_height['size'],
								'unit' => $new_mobile_line_height['unit'],
							),
						),
						'letter-spacing' => array(
							'desktop' => array(
								'size' => $new_desktop_letter_spacing['size'],
								'unit' => $new_desktop_letter_spacing['unit'],
							),
							'tablet'  => array(
								'size' => $new_tablet_letter_spacing['size'],
								'unit' => $new_tablet_letter_spacing['unit'],
							),
							'mobile'  => array(
								'size' => $new_mobile_letter_spacing['size'],
								'unit' => $new_mobile_letter_spacing['unit'],
							),
						),
						'font-style'     => isset( $old_value['font-style'] ) ? $old_value['font-style'] : '',
						'text-transform' => isset( $old_value['text-transform'] ) ? $old_value['text-transform'] : '',
					);

					set_theme_mod( $option['new_key'], $new_value );
					remove_theme_mod( $option['old_key'] );
				}
			}

			// Breadcrumb typography.
			$breadcrumb_typography = get_theme_mod( 'zakra_breadcrumbs_font_size' );

			if ( $breadcrumb_typography ) {

				$new_value = array(
					'font-family' => '',
					'font-weight' => '',
					'font-size'   => array(
						'desktop' => array(
							'size' => $breadcrumb_typography,
							'unit' => 'px',
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
				);

				set_theme_mod( 'zakra_breadcrumb_typography', $new_value );
				remove_theme_mod( 'zakra_breadcrumbs_font_size' );
			}

			// Background migration.
			$background_option = array(
				array(
					'old_key' => 'zakra_header_top_bg',
					'new_key' => 'zakra_top_bar_background',
				),
				array(
					'old_key' => 'zakra_header_main_bg',
					'new_key' => 'zakra_main_header_background_color',
				),
				array(
					'old_key' => 'zakra_page_title_bg',
					'new_key' => 'zakra_page_header_background',
				),
				array(
					'old_key' => 'zakra_footer_widgets_bg',
					'new_key' => 'zakra_footer_column_background',
				),
				array(
					'old_key' => 'zakra_footer_bar_bg',
					'new_key' => 'zakra_footer_bar_background',
				),
			);

			foreach ( $background_option as $option ) {

				$old_value = get_theme_mod( $option['old_key'] );

				if ( $old_value ) {

					$new_background_value = array(
						'background-color'      => isset( $old_value['background-color'] ) ? $old_value['background-color'] : '',
						'background-image'      => isset( $old_value['background-image'] ) ? $old_value['background-image'] : '',
						'background-repeat'     => isset( $old_value['background-repeat'] ) ? $old_value['background-repeat'] : '',
						'background-position'   => isset( $old_value['background-position'] ) ? $old_value['background-position'] : '',
						'background-size'       => isset( $old_value['background-size'] ) ? $old_value['background-size'] : '',
						'background-attachment' => isset( $old_value['background-attachment'] ) ? $old_value['background-attachment'] : '',
					);

					set_theme_mod( $option['new_key'], $new_background_value );
					remove_theme_mod( $option['old_key'] );
				}
			}

			// Dimension control migration.
			$dimension_option = array(
				array(
					'old_key' => 'zakra_page_title_padding',
					'new_key' => 'zakra_page_header_padding',
				),
				array(
					'old_key' => 'zakra_header_button_padding',
					'new_key' => 'zakra_header_button_padding',
				),
				array(
					'old_key' => 'zakra_button_padding',
					'new_key' => 'zakra_button_padding',
				),
			);

			foreach ( $dimension_option as $option ) {

				// Check if id exist in database or not.
				if ( ! array_key_exists( $option['old_key'], $this->old_theme_mods ) ) {
					continue;
				}

				$old_value = get_theme_mod( $option['old_key'] );

				// Check if the old value have unit key on or not.
				if ( false !== strpos( wp_json_encode( $old_value ), 'unit' ) ) {
					continue;
				}

				if ( $old_value ) {

					$new_top = isset( $old_value['top'] ) ? $dimension_converted_value( $old_value['top'] ) : array(
						'size' => '',
						'unit' => 'px',
					);

					$new_right  = isset( $old_value['right'] ) ? $dimension_converted_value( $old_value['right'] ) : array(
						'size' => '',
						'unit' => 'px',
					);
					$new_bottom = isset( $old_value['bottom'] ) ? $dimension_converted_value( $old_value['bottom'] ) : array(
						'size' => '',
						'unit' => 'px',
					);
					$new_left   = isset( $old_value['left'] ) ? $dimension_converted_value( $old_value['left'] ) : array(
						'size' => '',
						'unit' => 'px',
					);

					$new_value = array(
						'top'    => $new_top['size'],
						'right'  => $new_right['size'],
						'bottom' => $new_bottom['size'],
						'left'   => $new_left['size'],
						'unit'   => $new_top['unit'],
					);

					set_theme_mod( $option['new_key'], $new_value );

					if ( $option['old_key'] !== $option['new_key'] ) {

						remove_theme_mod( $option['old_key'] );
					}
				}
			}

			// Sidebar layout migration.
			$sidebar_layout_option = array(
				array(
					'old_key' => 'zakra_structure_archive',
					'new_key' => 'zakra_archive_sidebar_layout',
				),
				array(
					'old_key' => 'zakra_structure_post',
					'new_key' => 'zakra_post_sidebar_layout',
				),
				array(
					'old_key' => 'zakra_structure_page',
					'new_key' => 'zakra_page_sidebar_layout',
				),
				array(
					'old_key' => 'zakra_structure_default',
					'new_key' => 'zakra_others_sidebar_layout',
				),

			);

			foreach ( $sidebar_layout_option as $option ) {

				$old_value = get_theme_mod( $option['old_key'] );

				if ( $old_value ) {

					$new_value = '';

					if ( 'tg-site-layout--default' === $old_value ) {

						$new_value = 'centered';
					} elseif ( 'tg-site-layout--left' === $old_value ) {
						$new_value = 'left';
					} elseif ( 'tg-site-layout--right' === $old_value ) {

						$new_value = 'right';
					} elseif ( 'tg-site-layout--no-sidebar' === $old_value ) {

						$new_value = 'contained';
					} elseif ( 'tg-site-layout--stretched' === $old_value ) {

						$new_value = 'stretched';
					}

					if ( ! empty( $new_value ) ) {

						set_theme_mod( $option['new_key'], $new_value );
						remove_theme_mod( $option['old_key'] );
					}
				}
			}

			// Main header layout migration.
			$old_value = get_theme_mod( 'zakra_header_main_style' );

			if ( $old_value ) {

				$new_value = '';

				if ( 'tg-site-header--left' === $old_value ) {

					$new_value = 'style-1';
				} elseif ( 'tg-site-header--center' === $old_value ) {

					$new_value = 'style-2';
				} elseif ( 'tg-site-header--right' === $old_value ) {

					$new_value = 'style-3';
				}

				if ( ! empty( $new_value ) ) {

					set_theme_mod( 'zakra_main_header_layout', 'layout-1' );
					set_theme_mod( 'zakra_main_header_layout_1_style', $new_value );
					remove_theme_mod( 'zakra_header_main_style' );
				}
			}

			// Main menu active style migration.
			$old_menu_active_style = get_theme_mod( 'zakra_primary_menu_text_active_effect' );

			if ( $old_menu_active_style ) {

				if ( 'tg-primary-menu--style-none' === $old_menu_active_style ) {

					$new_menu_active_style = 'style-1';
				} elseif ( 'tg-primary-menu--style-underline' === $old_menu_active_style ) {

					$new_menu_active_style = 'style-2';
				} elseif ( 'tg-primary-menu--style-left-border' === $old_menu_active_style ) {

					$new_menu_active_style = 'style-3';
				} elseif ( 'tg-primary-menu--style-right-border' === $old_menu_active_style ) {

					$new_menu_active_style = 'style-4';
				} else {

					$new_menu_active_style = 'style-1';
				}

				set_theme_mod( 'zakra_main_menu_layout_1_style', $new_menu_active_style );
				remove_theme_mod( 'zakra_primary_menu_text_active_effect' );
			}

			// Page header layout migration.
			$old_page_header_layout = get_theme_mod( 'zakra_page_title_alignment' );

			if ( $old_page_header_layout ) {

				if ( 'tg-page-header--left-right' === $old_page_header_layout ) {

					$new_page_header_layout = 'style-1';
				} elseif ( 'tg-page-header--right-left' === $old_page_header_layout ) {

					$new_page_header_layout = 'style-2';
				} elseif ( 'tg-page-header--both-center' == $old_page_header_layout ) {

					$new_page_header_layout = 'style-3';
				} elseif ( 'tg-page-header--both-left' === $old_page_header_layout ) {

					$new_page_header_layout = 'style-4';
				} elseif ( 'tg-page-header--both-right' === $old_page_header_layout ) {

					$new_page_header_layout = 'style-5';
				} else {

					$new_page_header_layout = 'style-1';
				}

				set_theme_mod( 'zakra_page_header_layout', $new_page_header_layout );
				remove_theme_mod( 'zakra_page_title_alignment' );
			}

			// Post meta style migration.
			$old_post_meta_style = get_theme_mod( 'zakra_blog_archive_meta_style' );

			if ( $old_post_meta_style ) {

				if ( 'tg-meta-style-one' === $old_post_meta_style ) {

					$new_post_meta_style = 'style-1';
				} elseif ( 'zak-style-2' === $old_post_meta_style ) {

					$new_post_meta_style = 'style-2';
				} else {

					$new_post_meta_style = 'style-1';
				}

				set_theme_mod( 'zakra_post_meta_style', $new_post_meta_style );
				remove_theme_mod( 'zakra_blog_archive_meta_style' );
			}

			// Footer column advanced style.
			$old_footer_column_advance_style = get_theme_mod( 'zakra_footer_widgets_style' );

			if ( $old_footer_column_advance_style ) {

				$new_footer_column_advance_style = '';

				if ( 'tg-footer-widget-col--one' === $old_footer_column_advance_style ) {

					$new_footer_column_advance_style = 'style-1';
				} elseif ( 'tg-footer-widget-col--two' === $old_footer_column_advance_style ) {

					$new_footer_column_advance_style = 'style-2';
				} elseif ( 'tg-footer-widget-col--three' === $old_footer_column_advance_style ) {

					$new_footer_column_advance_style = 'style-3';
				} elseif ( 'tg-footer-widget-col--four' === $old_footer_column_advance_style ) {

					$new_footer_column_advance_style = 'style-4';
				}

				if ( ! empty( $new_footer_column_advance_style ) ) {

					set_theme_mod( 'zakra_footer_column_layout', 'layout-1' );
					set_theme_mod( 'zakra_footer_column_layout_1_style', $new_footer_column_advance_style );
					remove_theme_mod( 'zakra_footer_widgets_style' );
				}
			}

			// Blog button style.
			$old_blog_button_alignment = get_theme_mod( 'zakra_read_more_align_archive_blog' );

			if ( $old_blog_button_alignment ) {

				$new_blog_button_alignment = '';

				if ( 'left' === $old_blog_button_alignment ) {

					$new_blog_button_alignment = 'style-1';
				} elseif ( 'right' === $old_blog_button_alignment ) {

					$new_blog_button_alignment = 'style-2';
				}

				if ( ! empty( $new_blog_button_alignment ) ) {

					set_theme_mod( 'zakra_blog_button_alignment', $new_blog_button_alignment );
					remove_theme_mod( 'zakra_read_more_align_archive_blog' );
				}
			}

			// Blog post elements.
			$old_blog_post_elements = get_theme_mod( 'zakra_structure_archive_blog' );

			if ( $old_blog_post_elements ) {

				$new_blog_post_elements = array();
				$blog_post_elements     = array( 'featured_image', 'title', 'meta', 'content' );

				foreach ( $blog_post_elements as $element ) {

					if ( in_array( $element, $old_blog_post_elements, true ) ) {

						$new_blog_post_elements[] = $element;
					}
				}

				set_theme_mod( 'zakra_blog_post_elements', $new_blog_post_elements );
				remove_theme_mod( 'zakra_structure_archive_blog' );
			}

			// Blog meta elements.
			$old_meta_elements = get_theme_mod( 'zakra_meta_structure_archive_blog' );

			if ( $old_meta_elements ) {

				$new_meta_elements = array();
				$meta_elements     = array( 'author', 'date', 'categories', 'tags', 'comments' );

				foreach ( $meta_elements as $element ) {

					if ( in_array( $element, $old_meta_elements, true ) ) {

						$new_meta_elements[] = $element;
					}
				}

				set_theme_mod( 'zakra_blog_meta_elements', $new_meta_elements );
				remove_theme_mod( 'zakra_meta_structure_archive_blog' );
			}

			// Single post elements.
			$old_single_post_elements = get_theme_mod( 'zakra_single_post_content_structure' );

			if ( $old_single_post_elements ) {

				$new_single_post_elements = array();
				$single_post_elements     = array( 'featured_image', 'title', 'meta', 'content' );

				foreach ( $single_post_elements as $element ) {

					if ( in_array( $element, $old_single_post_elements, true ) ) {

						$new_single_post_elements[] = $element;
					}
				}

				set_theme_mod( 'zakra_single_post_elements', $new_single_post_elements );
				remove_theme_mod( 'zakra_single_post_content_structure' );
			}

			// Single post meta elements.
			$old_single_meta_elements = get_theme_mod( 'zakra_single_blog_post_meta_structure' );

			if ( $old_single_meta_elements ) {

				$new_single_meta_elements = array();
				$single_meta_elements     = array( 'author', 'date', 'categories', 'tags', 'comments' );

				foreach ( $single_meta_elements as $element ) {

					if ( in_array( $element, $old_single_meta_elements, true ) ) {

						$new_single_meta_elements[] = $element;
					}
				}

				set_theme_mod( 'zakra_single_meta_elements', $new_single_meta_elements );
				remove_theme_mod( 'zakra_single_blog_post_meta_structure' );
			}

			// Footer bar style
			$footer_bar_style = get_theme_mod( 'zakra_footer_bar_style', 'tg-site-footer-bar--center' );

			if ( $footer_bar_style ) {

				if ( 'tg-site-footer-bar--left' === $footer_bar_style ) {

					$new_style = 'style-1';
				} else {

					$new_style = 'style-2';
				}

				set_theme_mod( 'zakra_footer_bar_style', $new_style );

			}

			// Sidebar widgets.
			$map = array(
				'header-top-left-sidebar'  => 'top-bar-col-1-sidebar',
				'header-top-right-sidebar' => 'top-bar-col-2-sidebar',
				'footer-bar-left-sidebar'  => 'footer-bar-col-1-sidebar',
				'footer-bar-right-sidebar' => 'footer-bar-col-2-sidebar',
			);

			$sidebarwidgets = get_option( 'sidebars_widgets' );

			foreach ( $map as $old => $new ) {

				if ( isset( $sidebarwidgets[ $old ] ) ) {

					$sidebarwidgets[ $new ] = $sidebarwidgets[ $old ];
					unset( $sidebarwidgets[ $old ] );
				}
			}

			// Post meta migration.
			$arg       = array(
				'post_type'      => 'any',
				'posts_per_page' => -1,
			);
			$the_query = new WP_Query( $arg );

			// The loop.
			while ( $the_query->have_posts() ) :
				$the_query->the_post();

				// Layout.
				$post_id                   = get_the_ID();
				$post_meta_style_old_value = get_post_meta( $post_id, 'zakra_layout', true );

				$post_meta_style_new_value = '';

				if ( 'tg-site-layout--default' === $post_meta_style_old_value ) {

					$post_meta_style_new_value = 'centered';
				} elseif ( 'tg-site-layout--left' === $post_meta_style_old_value ) {

					$post_meta_style_new_value = 'left';
				} elseif ( 'tg-site-layout--right' === $post_meta_style_old_value ) {

					$post_meta_style_new_value = 'right';
				} elseif ( 'tg-site-layout--no-sidebar' === $post_meta_style_old_value ) {

					$post_meta_style_new_value = 'contained';
				} elseif ( 'tg-site-layout--stretched' === $post_meta_style_old_value ) {

					$post_meta_style_new_value = 'stretched';
				} elseif ( 'tg-site-layout--customizer' === $post_meta_style_old_value ) {

					$post_meta_style_new_value = 'customizer';
				}

				if ( ! empty( $post_meta_style_new_value ) ) {

					add_post_meta( $post_id, 'zakra_sidebar_layout', $post_meta_style_new_value );
					delete_post_meta( $post_id, 'zakra_layout' );
				}

				// Header style.
				$post_meta_header_style = get_post_meta( get_the_ID(), 'zakra_header_style', true );

				$new_post_meta_header_style = '';
				if ( 'tg-site-header--left' === $post_meta_header_style ) {

					$new_post_meta_header_style = 'zak-layout-1-style-1';
				} elseif ( 'tg-site-header--center' === $post_meta_header_style ) {

					$new_post_meta_header_style = 'zak-layout-1-style-2';
				} elseif ( 'tg-site-header--right' === $post_meta_header_style ) {

					$new_post_meta_header_style = 'zak-layout-1-style-3';
				}

				if ( ! empty( $new_post_meta_header_style ) ) {

					add_post_meta( $post_id, 'zakra_main_header_style', $new_post_meta_header_style );
					delete_post_meta( $post_id, 'zakra_header_style' );
				}

				// Active menu item style.
				$post_meta_active_menu_item_style = get_post_meta( get_the_ID(), 'zakra_menu_item_active_style', true );

				if ( $post_meta_active_menu_item_style ) {

					if ( 'tg-primary-menu--style-none' === $post_meta_active_menu_item_style ) {

						$new_post_meta_active_menu_item_style = 'style-1';
					} elseif ( 'tg-primary-menu--style-underline' === $post_meta_active_menu_item_style ) {

						$new_post_meta_active_menu_item_style = 'style-2';
					} elseif ( 'tg-primary-menu--style-left-border' === $post_meta_active_menu_item_style ) {

						$new_post_meta_active_menu_item_style = 'style-3';
					} elseif ( 'tg-primary-menu--style-right-border' === $post_meta_active_menu_item_style ) {

						$new_post_meta_active_menu_item_style = 'style-4';
					} else {
						$new_post_meta_active_menu_item_style = 'style-1';
					}

					add_post_meta( $post_id, 'zakra_menu_active_style', $new_post_meta_active_menu_item_style );
					delete_post_meta( $post_id, 'zakra_menu_item_active_style' );
				}

				// Sidebar layout.
				$post_meta_sidebar_layout = get_post_meta( get_the_ID(), 'zakra_sidebar', true );

				if ( $post_meta_sidebar_layout ) {

					$new_slider_layout = '';

					if ( 'footer-sidebar-1' === $post_meta_sidebar_layout ) {

						$new_slider_layout = '1';
					} elseif ( 'footer-sidebar-2' === $post_meta_sidebar_layout ) {

						$new_slider_layout = '2';
					} elseif ( 'footer-sidebar-3' === $post_meta_sidebar_layout ) {

						$new_slider_layout = '3';
					} elseif ( 'footer-sidebar-4' === $post_meta_sidebar_layout ) {

						$new_slider_layout = '4';
					}

					if ( ! empty( $new_slider_layout ) ) {

						update_post_meta( $post_id, 'zakra_sidebar', $new_slider_layout );
					}
				}

			endwhile;

			// WooCommerce Sidebar layout migration.
			$wc_sidebar_layout_option = array(
				array(
					'old_key' => 'zakra_structure_wc',
					'new_key' => 'zakra_woocommerce_sidebar_layout',
				),
				array(
					'old_key' => 'zakra_structure_wc_product',
					'new_key' => 'zakra_woocommerce_single_product_sidebar_layout',
				),

			);

			foreach ( $wc_sidebar_layout_option as $option ) {

				$old_value = get_theme_mod( $option['old_key'] );

				if ( $old_value ) {

					$new_value = '';

					if ( 'tg-site-layout--default' === $old_value ) {

						$new_value = 'centered';
					} elseif ( 'tg-site-layout--left' === $old_value ) {
						$new_value = 'left';
					} elseif ( 'tg-site-layout--right' === $old_value ) {

						$new_value = 'right';
					} elseif ( 'tg-site-layout--no-sidebar' === $old_value ) {

						$new_value = 'contained';
					} elseif ( 'tg-site-layout--stretched' === $old_value ) {

						$new_value = 'stretched';
					}

					if ( ! empty( $new_value ) ) {

						set_theme_mod( $option['new_key'], $new_value );
						remove_theme_mod( $option['old_key'] );
					}
				}
			}

			// Set flag not to repeat the migration process, run it only once.
			update_option( 'zakra_customizer_migration_v3', true );
		}

		/**
		 * Return the value for customize migration on demo import.
		 *
		 * @return bool
		 */
		public static function demo_import_migration() {

			if ( isset( $_GET['zakra_notice_dismiss'] ) && isset( $_GET['_zakra_demo_import_migration_notice_dismiss_nonce'] ) ) {

				if ( ! wp_verify_nonce( wp_unslash( $_GET['_zakra_demo_import_migration_notice_dismiss_nonce'] ), 'zakra_demo_import_migration_notice_dismiss_nonce' ) ) { // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized

					wp_die( esc_html__( 'Action failed. Please refresh the page and retry.', 'zakra' ) );
				}

				return true;
			}

			return false;
		}

		/**
		 * @return bool
		 */
		public static function is_fresh_install() {

			/**
			 * If the option with keys zakra_stretched_style_transfer ( introduced in V1.0.8 )
			 * or zakra_migrations ( introduced V1.5.3 ) is available in the option table.
			 * It is not a fresh installation of the theme.
			 *
			 * @TODO Better way to check if it is a fresh installation of theme.
			 */
			if ( get_option( 'zakra_stretched_style_transfer' ) || get_option( 'zakra_migrations' ) ) {

				return false;
			}

			return true;
		}

		/**
		 * @return bool
		 */
		public static function maybe_run_migration() {

			/**
			 * Check migration is already run or not.
			 * If migration is already run then return false.
			 *
			 */
			$migrated = get_option( 'zakra_customizer_migration_v3' );

			if ( $migrated ) {

				return false;
			}

			/**
			 * If user don't import the demo and upgrade the theme.
			 * Then we need to run the migration.
			 *
			 */
			$result     = false;
			$theme_mods = get_theme_mods();

			update_option( 'zakra_customizer_old_data', $theme_mods );

			foreach ( $theme_mods as $key => $_ ) {

				if ( strpos( $key, 'zakra_' ) !== false ) {

					$result = true;
					break;
				}
			}

			return $result;
		}
	}

	new Zakra_Migration();

}
