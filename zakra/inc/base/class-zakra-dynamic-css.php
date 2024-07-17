<?php
/**
 * Zakra dynamic CSS generation file for theme options.
 *
 * Class Zakra_Dynamic_CSS
 *
 * @package    ThemeGrill
 * @subpackage Zakra
 * @since      Zakra 1.5.4
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Zakra_Dynamic_CSS' ) ) {

	/**
	 * Zakra dynamic CSS generation file for theme options.
	 *
	 * Class Zakra_Dynamic_CSS
	 */
	class Zakra_Dynamic_CSS {

		/**
		 * Return dynamic CSS output.
		 *
		 * @param string $dynamic_css Dynamic CSS.
		 * @param string $dynamic_css_filtered Dynamic CSS Filters.
		 *
		 * @return string Generated CSS.
		 */
		public static function render_output( $dynamic_css, $dynamic_css_filtered = '' ) {

			// Generate dynamic CSS.
			$parse_css = '';
			$breakpoint_media_default = array(
				'size' => 768,
				'unit' => 'px',
			);
			$breakpoint_media       = get_theme_mod( 'zakra_mobile_menu_breakpoint', $breakpoint_media_default );

			if ( is_string($breakpoint_media)) {

				$breakpoint_media = array(
					'size' => $breakpoint_media,
					'unit' => 'px',
				);
			}

			// Content margin.
			$content_padding_default = array(
				'size' => '',
				'unit' => 'px',
			);

			$content_padding = get_theme_mod( 'zakra_content_area_padding', $content_padding_default );

			$parse_css .= zakra_parse_slider_css(
				$content_padding_default,
				$content_padding,
				'.zak-primary, .zak-secondary',
				'padding-top, padding-bottom'
			);

			/**
			 * Container width.
			 */
			$container_width_default = array(
				'size' => 1170,
				'unit' => 'px',
			);

			$container_width = get_theme_mod( 'zakra_container_width', $container_width_default );

			$parse_css .= zakra_parse_slider_css(
				$container_width_default,
				$container_width,
				'.zak-container, .zak-container--boxed .zak-site',
				'max-width'
			);

			/**
			 * Sidebar width.
			 */
			$sidebar_width_default = array(
				'size' => 30,
				'unit' => '%',
			);

			$sidebar_width = get_theme_mod( 'zakra_sidebar_width', $sidebar_width_default );

			$content_width_css = array(
				'.zak-primary' => array(
					'width' => ( 100 - (float) $sidebar_width['size'] ) . '%',
				),
			);

			$parse_css .= '@media screen and (min-width: ' . $breakpoint_media['size'] . 'px) {';
			$parse_css .= zakra_parse_css( 70, ( 100 - (float) $sidebar_width['size'] ), $content_width_css );
			$parse_css .= zakra_parse_slider_css(
				$sidebar_width_default,
				$sidebar_width,
				'.zak-secondary ',
				'width'
			);
			$parse_css .= '}';

			// Primary color.
			$primary_color     = get_theme_mod( 'zakra_primary_color', '#027abb' );
			$primary_color_css = array(
				'a:hover, a:focus,
				.zak-primary-nav ul li:hover > a,
				.zak-primary-nav ul .current_page_item > a,
				.zak-entry-summary a,
				.zak-entry-meta a, .zak-post-content .zak-entry-footer a:hover,
				.pagebuilder-content a, .zak-style-2 .zak-entry-meta span,
				.zak-style-2 .zak-entry-meta a, 
				.entry-title:hover a,
				.zak-breadcrumbs .trail-items a,
				.breadcrumbs .trail-items a,
				.entry-content a,
				.edit-link a,
				.zak-footer-bar a:hover,
				.widget li a,
				#comments .comment-content a,
				#comments .reply,
				button:hover,
				.zak-button:hover,
				.zak-entry-footer .edit-link a,
				.zak-header-action .yith-wcwl-items-count .yith-wcwl-icon span,
				.pagebuilder-content a, .zak-entry-footer a,
				.zak-header-buttons .zak-header-button--2 .zak-button,
				.zak-header-buttons .zak-header-button .zak-button:hover,
				.woocommerce-cart .coupon button.button' => array(
					'color' => esc_html( $primary_color ),
				),

				'.zak-post-content .entry-button:hover .zak-icon,
				.zak-error-404 .zak-button:hover svg,
				.zak-style-2 .zak-entry-meta span .zak-icon,
				.entry-button .zak-icon' => array(
					'fill' => esc_html( $primary_color ),
				),
				'blockquote, .wp-block-quote,
				button, input[type="button"],
				input[type="reset"],
				input[type="submit"],
				.wp-block-button .wp-block-button__link,
				blockquote.has-text-align-right, .wp-block-quote.has-text-align-right,
				button:hover,
				.wp-block-button .wp-block-button__link:hover,
				.zak-button:hover,
				.zak-header-buttons .zak-header-button .zak-button,
				.zak-header-buttons .zak-header-button.zak-header-button--2 .zak-button,
				.zak-header-buttons .zak-header-button .zak-button:hover,
				.woocommerce-cart .coupon button.button,
				.woocommerce-cart .actions > button.button' => array(
					'border-color' => esc_html( $primary_color ),
				),

				'.zak-primary-nav.zak-layout-1-style-2 > ul > li.current_page_item > a::before,
				.zak-primary-nav.zak-layout-1-style-2 > ul a:hover::before,
				.zak-primary-nav.zak-layout-1-style-2 > ul > li.current-menu-item > a::before, 
				.zak-primary-nav.zak-layout-1-style-3 > ul > li.current_page_item > a::before,
				.zak-primary-nav.zak-layout-1-style-3 > ul > li.current-menu-item > a::before, 
				.zak-primary-nav.zak-layout-1-style-4 > ul > li.current_page_item > a::before,
				.zak-primary-nav.zak-layout-1-style-4 > ul > li.current-menu-item > a::before, 
				.zak-scroll-to-top:hover, button, input[type="button"], input[type="reset"],
				input[type="submit"], .zak-header-buttons .zak-header-button--1 .zak-button,
				.wp-block-button .wp-block-button__link,
				.zak-menu-item-cart .cart-page-link .count,
				.widget .wp-block-heading::before,
				#comments .comments-title::before,
				#comments .comment-reply-title::before,
				.widget .widget-title::before,
				.woocommerce-cart .actions .coupon button.button:hover,
				.woocommerce-cart .actions > button.button,
				.woocommerce-cart .actions > button.button:hover' => array(
					'background-color' => esc_html( $primary_color ),
				),

				'button, input[type="button"],
				input[type="reset"],
				input[type="submit"],
				.wp-block-button .wp-block-button__link,
				.zak-button' => array(
					'border-color'     => esc_html( $primary_color ),
					'background-color' => esc_html( $primary_color ),
				),
			);
			$parse_css         .= zakra_parse_css( '#027abb', $primary_color, $primary_color_css );

			// Text color.
			$text_color     = get_theme_mod( 'zakra_base_color', '#3F3F46' );
			$text_color_css = array(
				'body, .woocommerce-ordering select' => array(
					'color' => esc_html( $text_color ),
				),
			);
			$parse_css      .= zakra_parse_css( '#3F3F46', $text_color, $text_color_css );

			// Outside container background.
			$container_background_color     = get_theme_mod( 'background_color', '' );
			$container_background_color_css = array(
				'body.custom-background' => array(
					'background-color' => esc_html( $container_background_color ),
				),
			);
			$parse_css      .= zakra_parse_css( '', $container_background_color, $container_background_color_css );

			// Border color.
			$border_color     = get_theme_mod( 'zakra_border_color', '#E4E4E7' );
			$border_color_css = array(
				'.zak-header, .zak-post, .zak-secondary, .zak-footer-bar, .zak-primary-nav .sub-menu, .zak-primary-nav .sub-menu li, .posts-navigation, #comments, .post-navigation, blockquote, .wp-block-quote, .zak-posts .zak-post' => array(
					'border-color' => esc_html( $border_color ),
				),

				'hr .zak-container--separate, '                                                                                                                                                                   => array(
					'background-color' => esc_html( $border_color ),
				),
			);
			$parse_css        .= zakra_parse_css( '#E4E4E7', $border_color, $border_color_css );

			// Link colors.
			$link_color_normal     = get_theme_mod( 'zakra_link_color', '#027abb' );
			$link_color_normal_css = array(
				'.entry-content a' => array(
					'color' => esc_html( $link_color_normal ),
				),
			);
			$parse_css             .= zakra_parse_css( '#027abb', $link_color_normal, $link_color_normal_css );

			// Link hover color.
			$link_color_hover     = get_theme_mod( 'zakra_link_hover_color', '#027abb' );
			$link_color_hover_css = array(
				'.zak-entry-footer a:hover,
				.entry-button:hover,
				.zak-entry-footer a:hover,
				.entry-content a:hover,
				.pagebuilder-content a:hover, .pagebuilder-content a:hover' => array(
					'color' => esc_html( $link_color_hover ),
				),
				'.entry-button:hover .zak-icon'                                                                                                => array(
					'fill' => esc_html( $link_color_hover ),
				),
			);
			$parse_css            .= zakra_parse_css( '#027abb', $link_color_hover, $link_color_hover_css );

			// Inside container background color.
			$inside_container_background_default = array(
				'background-color'      => '#ffffff',
				'background-image'      => '',
				'background-position'   => 'center center',
				'background-size'       => 'auto',
				'background-attachment' => 'scroll',
				'background-repeat'     => 'repeat',
			);
			$inside_container_background         = get_theme_mod( 'zakra_inside_container_background', $inside_container_background_default );
			$parse_css                           .= zakra_parse_background_css( $inside_container_background_default, $inside_container_background, '.zak-content' );

			$body_typography_default = array(
				'font-family'    => 'default',
				'font-weight'    => '400',
				'font-size'      => array(
					'desktop' => array(
						'size' => '15',
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
				'line-height'    => array(
					'desktop' => array(
						'size' => '1.8',
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
			);

			$body_typography = get_theme_mod( 'zakra_body_typography', $body_typography_default );

			$parse_css .= zakra_parse_typography_css(
				$body_typography_default,
				$body_typography,
				'body',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			$heading_typography_default = apply_filters(
				'zakra_heading_typography_filter',
				array(
					'font-family'    => 'default',
					'font-weight'    => '400',
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
				)
			);

			$heading_typography = get_theme_mod( 'zakra_heading_typography', $heading_typography_default );

			$parse_css .= zakra_parse_typography_css(
				$heading_typography_default,
				$heading_typography,
				'h1, h2, h3, h4, h5, h6',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			$h1_typography_default = apply_filters(
				'zakra_h1_typography_filter',
				array(
					'font-family'    => 'default',
					'font-weight'    => '500',
					'subsets'        => array( 'latin' ),
					'font-size'      => array(
						'desktop' => array(
							'size' => '2.5',
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
				)
			);

			$h1_typography = get_theme_mod( 'zakra_h1_typography', $h1_typography_default );

			$parse_css .= zakra_parse_typography_css(
				$h1_typography_default,
				$h1_typography,
				'h1',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			$h2_typography_default = apply_filters(
				'zakra_h2_typography_filter',
				array(
					'font-family'    => 'default',
					'font-weight'    => '500',
					'subsets'        => array( 'latin' ),
					'font-size'      => array(
						'desktop' => array(
							'size' => '2.5',
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
				)
			);

			$h2_typography = get_theme_mod( 'zakra_h2_typography', $h2_typography_default );

			$parse_css .= zakra_parse_typography_css(
				$h2_typography_default,
				$h2_typography,
				'h2',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			$h3_typography_default = apply_filters(
				'zakra_h3_typography_filter',
				array(
					'font-family'    => 'default',
					'font-weight'    => '500',
					'subsets'        => array( 'latin' ),
					'font-size'      => array(
						'desktop' => array(
							'size' => '2',
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
				)
			);

			$h3_typography = get_theme_mod( 'zakra_h3_typography', $h3_typography_default );

			$parse_css .= zakra_parse_typography_css(
				$h3_typography_default,
				$h3_typography,
				'h3',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			$h4_typography_default = apply_filters(
				'zakra_h4_typography_filter',
				array(
					'font-family'    => 'default',
					'font-weight'    => '500',
					'subsets'        => array( 'latin' ),
					'font-size'      => array(
						'desktop' => array(
							'size' => '1.75',
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
				)
			);

			$h4_typography = get_theme_mod( 'zakra_h4_typography', $h4_typography_default );

			$parse_css .= zakra_parse_typography_css(
				$h4_typography_default,
				$h4_typography,
				'h4',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			$h5_typography_default = apply_filters(
				'zakra_h5_typography_filter',
				array(
					'font-family'    => 'default',
					'font-weight'    => '500',
					'subsets'        => array( 'latin' ),
					'font-size'      => array(
						'desktop' => array(
							'size' => '1.313',
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
				)
			);

			$h5_typography = get_theme_mod( 'zakra_h5_typography', $h5_typography_default );

			$parse_css .= zakra_parse_typography_css(
				$h5_typography_default,
				$h5_typography,
				'h5',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			$h6_typography_default = apply_filters(
				'zakra_h6_typography_filter',
				array(
					'font-family'    => 'default',
					'font-weight'    => '500',
					'subsets'        => array( 'latin' ),
					'font-size'      => array(
						'desktop' => array(
							'size' => '1.125',
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
				)
			);

			$h6_typography = get_theme_mod( 'zakra_h6_typography', $h6_typography_default );

			$parse_css .= zakra_parse_typography_css(
				$h6_typography_default,
				$h6_typography,
				'h6',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Button padding.
			$button_padding_default = array(
				'top'    => '10',
				'right'  => '15',
				'bottom' => '10',
				'left'   => '15',
				'unit'   => 'px',
			);

			$button_padding = get_theme_mod( 'zakra_button_padding', $button_padding_default );

			$parse_css .= zakra_parse_dimension_css(
				$button_padding_default,
				$button_padding,
				'button, input[type="button"], input[type="reset"], input[type="submit"], #infinite-handle span, .wp-block-button .wp-block-button__link',
				'padding'
			);

			// Button color.
			$button_color     = get_theme_mod( 'zakra_button_color', '' );
			$button_color_css = array(
				'button, input[type="button"], input[type="reset"], input[type="submit"], #infinite-handle span, .wp-block-button .wp-block-button__link' => array(
					'color' => esc_html( $button_color ),
				),
			);
			$parse_css        .= zakra_parse_css( '', $button_color, $button_color_css );

			// Button hover color.
			$button_hover_color     = get_theme_mod( 'zakra_button_hover_color', '' );
			$button_hover_color_css = array(
				'button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, #infinite-handle span:hover, .wp-block-button .wp-block-button__link:hover' => array(
					'color' => esc_html( $button_hover_color ),
				),
			);
			$parse_css              .= zakra_parse_css( '', $button_hover_color, $button_hover_color_css );

			// Button background color.
			$button_background_color     = get_theme_mod( 'zakra_button_background_color', '#027abb' );
			$button_background_color_css = array(
				'button, input[type="button"], input[type="reset"], input[type="submit"], #infinite-handle span, .wp-block-button .wp-block-button__link' => array(
					'background-color' => esc_html( $button_background_color ),
				),
			);
			$parse_css                   .= zakra_parse_css( '#027abb', $button_background_color, $button_background_color_css );

			// Button background hover color.
			$button_background_hover_color     = get_theme_mod( 'zakra_button_background_hover_color', '#ffffff' );
			$button_background_hover_color_css = array(
				'button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, #infinite-handle span:hover, .wp-block-button .wp-block-button__link:hover' => array(
					'background-color' => esc_html( $button_background_hover_color ),
				),
			);
			$parse_css                         .= zakra_parse_css( '#ffffff', $button_background_hover_color, $button_background_hover_color_css );

			/**
			 * Root font size.
			 */
			$html_font_size_default = array(
				'size' => '10',
				'unit' => 'px',
			);

			$html_font_size = get_theme_mod( 'zakra_root_font_size', $html_font_size_default );

			$parse_css .= zakra_parse_slider_css(
				$html_font_size_default,
				$html_font_size,
				':root',
				'--zak-root-font-size'
			);

			/**
			 * Button border radius.
			 */
			$button_border_radius_default = array(
				'size' => 0,
				'unit' => 'px',
			);

			$button_border_radius = get_theme_mod( 'zakra_button_border_radius', $button_border_radius_default );

			$parse_css .= zakra_parse_slider_css(
				$button_border_radius_default,
				$button_border_radius,
				'button, input[type="button"], input[type="reset"], input[type="submit"], #infinite-handle span, .wp-block-button .wp-block-button__link',
				'border-radius'
			);

			// Site title color.
			$site_title_color     = get_theme_mod( 'zakra_site_identity_color', '#16181a' );
			$site_title_color_css = array(
				'.site-title' => array(
					'color' => esc_html( $site_title_color ),
				),
			);
			$parse_css            .= zakra_parse_css( '#16181a', $site_title_color, $site_title_color_css );

			$typography_site_title_default = array(
				'font-family'    => 'default',
				'font-weight'    => 'regular',
				'subsets'        => array( 'latin' ),
				'font-size'      => array(
					'desktop' => array(
						'size' => '4',
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
						'size' => '1.5',
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
			);

			$typography_site_title = get_theme_mod( 'zakra_site_title_typography', $typography_site_title_default );

			$parse_css .= zakra_parse_typography_css(
				$typography_site_title_default,
				$typography_site_title,
				'.site-branding .site-title',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Site title tagline color.
			$site_tagline_color     = get_theme_mod( 'zakra_site_tagline_color', '#54595f' );
			$site_tagline_color_css = array(
				'.site-description' => array(
					'color' => esc_html( $site_tagline_color ),
				),
			);
			$parse_css              .= zakra_parse_css( '#54595f', $site_tagline_color, $site_tagline_color_css );

			$site_tagline_typography_default = array(
				'font-family'    => 'default',
				'font-weight'    => 'regular',
				'subsets'        => array( 'latin' ),
				'font-size'      => array(
					'desktop' => array(
						'size' => '1.6',
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
						'size' => '1.8',
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
			);

			$site_tagline_typography = get_theme_mod( 'zakra_site_tagline_typography', $site_tagline_typography_default );

			$parse_css .= zakra_parse_typography_css(
				$site_tagline_typography_default,
				$site_tagline_typography,
				'.site-branding .site-description',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Header top text color.
			$header_top_text_color     = get_theme_mod( 'zakra_top_bar_color', '#FAFAFA' );
			$header_top_text_color_css = array(
				'.zak-header .zak-top-bar' => array(
					'color' => esc_html( $header_top_text_color ),
				),
			);
			$parse_css                 .= zakra_parse_css( '#FAFAFA', $header_top_text_color, $header_top_text_color_css );

			// Header top background.
			$header_top_background_default = array(
				'background-color'      => '#18181B',
				'background-image'      => '',
				'background-position'   => 'center center',
				'background-size'       => 'auto',
				'background-attachment' => 'scroll',
				'background-repeat'     => 'repeat',
			);

			$header_top_background = get_theme_mod( 'zakra_top_bar_background', $header_top_background_default );

			$parse_css .= zakra_parse_background_css( $header_top_background_default, $header_top_background, '.zak-header .zak-top-bar' );

			// Header main background.
			$header_main_background_default = array(
				'background-color'      => '',
				'background-image'      => '',
				'background-position'   => 'center center',
				'background-size'       => 'auto',
				'background-attachment' => 'scroll',
				'background-repeat'     => 'repeat',
			);
			$header_main_background         = get_theme_mod( 'zakra_main_header_background_color', $header_main_background_default );
			$parse_css                      .= zakra_parse_background_css( $header_main_background_default, $header_main_background, '.zak-header .zak-main-header' );

			// Header main border bottom.
			$is_header_transparent                  = zakra_is_header_transparent_enabled();
			$header_main_border_bottom_css_selector = $is_header_transparent ? '.zak-header.zak-layout-1-transparent .zak-header-transparent-wrapper' : '.zak-header, .zak-header-sticky-wrapper .sticky-header';

			/**
			 * Header main border bottom width.
			 */
			$header_main_border_bottom_width_default = array(
				'size' => 1,
				'unit' => 'px',
			);

			$header_main_border_bottom_width = get_theme_mod( 'zakra_main_header_border_bottom_width', $header_main_border_bottom_width_default );

			$parse_css .= zakra_parse_slider_css(
				$header_main_border_bottom_width_default,
				$header_main_border_bottom_width,
				$header_main_border_bottom_css_selector,
				'border-bottom-width'
			);

			// Header main border bottom color.
			$header_main_border_bottom_color = get_theme_mod( 'zakra_main_header_border_bottom_color', '#E4E4E7' );

			$header_main_border_bottom_color_css = array(
				$header_main_border_bottom_css_selector => array(
					'border-bottom-color' => esc_html( $header_main_border_bottom_color ),
				),
			);

			$parse_css .= zakra_parse_css( '#E4E4E7', $header_main_border_bottom_color, $header_main_border_bottom_color_css );

			/**
			 *  Header button1 dynamic CSS.
			 */
			$button_on_mobile      = get_theme_mod( 'zakra_header_button_mobile' );
			$_mobile_button1_class = ( 1 === $button_on_mobile ) ? ', .zak-header-buttons .zak-button' : '';
			$button1_combine_class = '.zak-header-buttons .zak-header-button.zak-header-button--1 .zak-button' . $_mobile_button1_class;
			$mobile_button1_hover  = ( 1 === $button_on_mobile ) ? ', .zak-header-buttons .zak-button:hover' : '';
			$button1_combine_hover = '.zak-header-buttons .zak-header-button.zak-header-button--1 .zak-button:hover' . $mobile_button1_hover;

			// Header button padding.
			$header_button_padding_default = array(
				'top'    => '5',
				'right'  => '10',
				'bottom' => '5',
				'left'   => '10',
				'unit'   => 'px',
			);

			$header_button_padding = get_theme_mod( 'zakra_header_button_padding', $header_button_padding_default );

			$parse_css .= zakra_parse_dimension_css(
				$header_button_padding_default,
				$header_button_padding,
				$button1_combine_class,
				'padding'
			);

			// Header button text color.
			$header_button_text_color     = get_theme_mod( 'zakra_header_button_color', '#ffffff' );
			$header_button_text_color_css = array(
				$button1_combine_class => array(
					'color' => esc_html( $header_button_text_color ),
				),
			);
			$parse_css                    .= zakra_parse_css( '#ffffff', $header_button_text_color, $header_button_text_color_css );

			// Header button hover text color.
			$header_button_hover_text_color     = get_theme_mod( 'zakra_header_button_hover_color', '#ffffff' );
			$header_button_hover_text_color_css = array(
				$button1_combine_hover => array(
					'color' => esc_html( $header_button_hover_text_color ),
				),
			);
			$parse_css                          .= zakra_parse_css( '#ffffff', $header_button_hover_text_color, $header_button_hover_text_color_css );

			// Header background color.
			$header_button_background_color     = get_theme_mod( 'zakra_header_button_background_color', '#027abb' );
			$header_button_background_color_css = array(
				$button1_combine_class => array(
					'background-color' => esc_html( $header_button_background_color ),
				),
			);
			$parse_css                          .= zakra_parse_css( '#027abb', $header_button_background_color, $header_button_background_color_css );

			// Header button hover background color.
			$header_button_background_hover_color     = get_theme_mod( 'zakra_header_button_background_hover_color', '' );
			$header_button_background_hover_color_css = array(
				$button1_combine_hover => array(
					'background-color' => esc_html( $header_button_background_hover_color ),
				),
			);
			$parse_css                                .= zakra_parse_css( '#ffffff', $header_button_background_hover_color, $header_button_background_hover_color_css );

			/**
			 * Header button border radius.
			 */
			$header_button_border_radius_default = array(
				'size' => 0,
				'unit' => 'px',
			);

			$header_button_border_radius = get_theme_mod( 'zakra_header_button_border_radius', $header_button_border_radius_default );

			$parse_css .= zakra_parse_slider_css(
				$header_button_border_radius_default,
				$header_button_border_radius,
				$button1_combine_class,
				'border-radius'
			);

			/**
			 * Primary menu border bottom.
			 */
			$primary_menu_border_bottom_default = array(
				'size' => 0,
				'unit' => 'px',
			);

			$primary_menu_border_bottom = get_theme_mod( 'zakra_primary_menu_border_bottom_width', $primary_menu_border_bottom_default );

			$parse_css .= zakra_parse_slider_css(
				$primary_menu_border_bottom_default,
				$primary_menu_border_bottom,
				'.zak-header .main-navigation',
				'border-bottom-width'
			);

			// Primary menu border bottom.
			$primary_menu_border_bottom_color     = get_theme_mod( 'zakra_primary_menu_border_bottom_color', '#e9ecef' );
			$primary_menu_border_bottom_color_css = array(
				'.zak-header .main-navigation' => array(
					'border-bottom-color' => esc_html( $primary_menu_border_bottom_color ),
				),
			);
			$parse_css                            .= zakra_parse_css( '#e9ecef', $primary_menu_border_bottom_color, $primary_menu_border_bottom_color_css );

			// Primary menu item color.
			$primary_menu_item_color_normal     = get_theme_mod( 'zakra_main_menu_color', '' );
			$primary_menu_item_color_normal_css = array(
				'.zak-primary-nav ul li > a, .zak-main-nav.zak-primary-nav ul.zak-primary-menu > li > a, .zak-primary-nav.zak-menu-item--layout-2 > ul > li > a'                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          => array(
					'color' => esc_html( $primary_menu_item_color_normal ),
				),
				'.zak-primary-nav ul li > a .zak-icon, zak-main-nav.zak-primary-nav ul.zak-primary-menu li .zak-icon, .zak-primary-nav.zak-menu-item--layout-2 > ul > li > .zak-icon' => array(
					'fill' => esc_html( $primary_menu_item_color_normal ),
				),
			);
			$parse_css                          .= zakra_parse_css( '', $primary_menu_item_color_normal, $primary_menu_item_color_normal_css );

			// Primary menu item hover color.
			$primary_menu_item_color_hover     = get_theme_mod( 'zakra_main_menu_hover_color', '' );
			$primary_menu_item_color_hover_css = array(
				'.zak-primary-nav ul li:not(.current-menu-item):hover > a, .zak-primary-nav.zak-menu-item--layout-2 > ul > li:not(.current-menu-item):hover > a, .zak-primary-nav ul li:not(.current-menu-item):hover > a, .zak-main-nav.zak-primary-nav ul.zak-primary-menu li:not(.current-menu-item):hover > a'                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          => array(
					'color' => esc_html( $primary_menu_item_color_hover ),
				),
				'.zak-primary-nav ul li:hover > .zak-icon, .zak-primary-nav.zak-menu-item--layout-2 > ul > li:hover > .zak-icon' => array(
					'fill' => esc_html( $primary_menu_item_color_hover ),
				),
				'.zak-primary-nav.zak-layout-1-style-2 > ul li a:hover::before' => array(
					'background-color' => esc_html( $primary_menu_item_color_hover ),
				),
			);
			$parse_css                         .= zakra_parse_css( '', $primary_menu_item_color_hover, $primary_menu_item_color_hover_css );

			// Primary menu item active color.
			$primary_menu_item_color_active     = get_theme_mod( 'zakra_main_menu_active_color', '' );
			$primary_menu_item_color_active_css = array(
				'.zak-primary-nav ul li:active > a, .zak-primary-nav ul > li:not(.zak-header-button).current_page_item > a, .zak-primary-nav ul > li:not(.zak-header-button).current_page_ancestor > a, .zak-primary-nav ul > li:not(.zak-header-button).current-menu-item > a, .zak-primary-nav ul > li:not(.zak-header-button).current-menu-ancestor > a'                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          => array(
					'color' => esc_html( $primary_menu_item_color_active ),
				),
				'.zak-primary-nav.zak-layout-1-style-2 ul > li:not(.zak-header-button).current_page_item > a::before, .zak-primary-nav.zak-layout-1-style-2 ul > li:not(.zak-header-button).current_page_ancestor > a::before, .zak-primary-nav.zak-layout-1-style-2 ul > li:not(.zak-header-button).current-menu-item > a::before, .zak-primary-nav.zak-layout-1-style-2 ul > li:not(.zak-header-button).current-menu-ancestor > a::before, .zak-primary-nav.zak-layout-1-style-3 ul > li:not(.zak-header-button).current_page_item > a::before, .zak-primary-nav.zak-layout-1-style-3 ul > li:not(.zak-header-button).current_page_ancestor > a::before, .zak-primary-nav.zak-layout-1-style-3 ul > li:not(.zak-header-button).current-menu-item > a::before, .zak-primary-nav.zak-layout-1-style-3 ul > li:not(.zak-header-button).current-menu-ancestor > a::before, .zak-primary-nav.zak-layout-1-style-4 ul > li:not(.zak-header-button).current_page_item > a::before, .zak-primary-nav.zak-layout-1-style-4 ul > li:not(.zak-header-button).current_page_ancestor > a::before, .zak-primary-nav.zak-layout-1-style-4 ul > li:not(.zak-header-button).current-menu-item > a::before, .zak-primary-nav.zak-layout-1-style-4 ul > li:not(.zak-header-button).current-menu-ancestor > a::before' => array(
					'background-color' => esc_html( $primary_menu_item_color_active ),
				),
				'.zak-primary-nav ul li:hover > .zak-icon, .zak-primary-nav.zak-menu-item--layout-2 > ul > li span' => array(
					'fill' => esc_html( $primary_menu_item_color_active ),
				),
			);
			$parse_css                          .= zakra_parse_css( '', $primary_menu_item_color_active, $primary_menu_item_color_active_css );

			$main_menu_typography_default = array(
				'font-family'    => 'default',
				'font-weight'    => '400',
				'font-size'      => array(
					'desktop' => array(
						'size' => '1.6',
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
						'size' => '1.8',
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
			);

			$main_menu_typography = get_theme_mod( 'zakra_main_menu_typography', $main_menu_typography_default );

			$parse_css .= zakra_parse_typography_css(
				$main_menu_typography_default,
				$main_menu_typography,
				'.zak-primary-nav ul li a',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			$sub_menu_typography_default = array(
				'font-family'    => 'default',
				'font-weight'    => '400',
				'font-size'      => array(
					'desktop' => array(
						'size' => '1.6',
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
						'size' => '1.8',
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
			);

			$sub_menu_typography = get_theme_mod( 'zakra_sub_menu_typography', $sub_menu_typography_default );

			$parse_css .= zakra_parse_typography_css(
				$sub_menu_typography_default,
				$sub_menu_typography,
				'.zak-primary-nav ul li ul li a',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			$mobile_menu_typography_default = array(
				'font-family'    => 'default',
				'font-weight'    => '400',
				'font-size'      => array(
					'desktop' => array(
						'size' => '1.6',
						'unit' => 'rem',
					),
					'tablet'  => array(
						'size' => '',
						'unit' => '',
					),
					'mobile'  => array(
						'size' => '1.6',
						'unit' => 'rem',
					),
				),
				'line-height'    => array(
					'desktop' => array(
						'size' => '1.8',
						'unit' => '-',
					),
					'tablet'  => array(
						'size' => '',
						'unit' => '',
					),
					'mobile'  => array(
						'size' => '1.8',
						'unit' => '-',
					),
				),
				'font-style'     => 'normal',
				'text-transform' => 'none',
			);

			$mobile_menu_typography = get_theme_mod( 'zakra_mobile_menu_typography', $mobile_menu_typography_default );

			$parse_css .= zakra_parse_typography_css(
				$mobile_menu_typography_default,
				$mobile_menu_typography,
				'.zak-mobile-menu a',
				array(
					'mobile' => 600,
					'tablet' => 768,
				)
			);

			// Page header padding.
			$page_title_padding_default = array(
				'top'    => '20',
				'right'  => '0',
				'bottom' => '20',
				'left'   => '0',
				'unit'   => 'px',
			);

			$page_title_padding = get_theme_mod( 'zakra_page_header_padding', $page_title_padding_default );

			$parse_css .= zakra_parse_dimension_css(
				$page_title_padding_default,
				$page_title_padding,
				'.has-page-header .zak-page-header',
				'padding'
			);

			// Breadcrumbs font size.
			$breadcrumb_typography_default = array(
				'font-family' => 'default',
				'font-weight' => '500',
				'font-size'   => array(
					'desktop' => array(
						'size' => '16',
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

			$breadcrumb_typography = get_theme_mod( 'zakra_breadcrumb_typography', $breadcrumb_typography_default );

			$parse_css .= zakra_parse_typography_css(
				$breadcrumb_typography_default,
				$breadcrumb_typography,
				apply_filters( 'zakra_breadcrumb_typography_selector', '.zak-page-header .breadcrumb-trail ul li' ),
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Page/Post title color.
			$post_page_title_color     = get_theme_mod( 'zakra_post_page_title_color', '#16181a' );
			$post_page_title_color_css = array(
				'.zak-page-header .zak-page-title, .zakra-single-article .zak-entry-header .entry-title' => array(
					'color' => esc_html( $post_page_title_color ),
				),
			);
			$parse_css                 .= zakra_parse_css( '#16181a', $post_page_title_color, $post_page_title_color_css );

			// Page header background.
			$page_header_background_default = array(
				'background-color'      => '#E4E4E7',
				'background-image'      => '',
				'background-position'   => 'top left',
				'background-size'       => 'auto',
				'background-attachment' => 'scroll',
				'background-repeat'     => 'repeat',
			);
			$page_header_background         = get_theme_mod( 'zakra_page_header_background', $page_header_background_default );
			$parse_css                      .= zakra_parse_background_css( $page_header_background_default, $page_header_background, '.zak-page-header, .zak-container--separate .zak-page-header' );

			// Breadcrumbs text color.
			$breadcrumb_text_color     = get_theme_mod( 'zakra_breadcrumbs_text_color', '#16181a' );
			$breadcrumb_text_color_css = array(
				apply_filters( 'zakra_breadcrumbs_text_color_selector', '.zak-page-header .breadcrumb-trail ul li' ) => array(
					'color' => esc_html( $breadcrumb_text_color ),
				),
			);
			$parse_css                 .= zakra_parse_css( '#16181a', $breadcrumb_text_color, $breadcrumb_text_color_css );

			// Breadcrumbs separator color.
			$breadcrumb_separator_color     = get_theme_mod( 'zakra_breadcrumb_separator_color', '#51585f' );
			$breadcrumb_separator_color_css = array(
				apply_filters( 'zakra_breadcrumb_separator_color_selector', '.zak-page-header .breadcrumb-trail ul li::after' ) => array(
					'color' => esc_html( $breadcrumb_separator_color ),
				),
			);
			$parse_css                      .= zakra_parse_css( '#51585f', $breadcrumb_separator_color, $breadcrumb_separator_color_css );

			// Breadcrumbs link color.
			$breadcrumb_link_color     = get_theme_mod( 'zakra_breadcrumbs_link_color', '#16181a' );
			$breadcrumb_link_color_css = array(
				apply_filters( 'zakra_breadcrumbs_link_color_selector', '.zak-page-header .breadcrumb-trail ul li a' ) => array(
					'color' => esc_html( $breadcrumb_link_color ),
				),
			);
			$parse_css                 .= zakra_parse_css( '#16181a', $breadcrumb_link_color, $breadcrumb_link_color_css );

			// Breadcrumbs link hover color.
			$breadcrumb_link_hover_color     = get_theme_mod( 'zakra_breadcrumbs_link_hover_color', '#027abb' );
			$breadcrumb_link_hover_color_css = array(
				apply_filters( 'zakra_breadcrumbs_link_hover_color_selector', '.zak-page-header .breadcrumb-trail ul li a:hover ' ) => array(
					'color' => esc_html( $breadcrumb_link_hover_color ),
				),
			);
			$parse_css                       .= zakra_parse_css( '#027abb', $breadcrumb_link_hover_color, $breadcrumb_link_hover_color_css );

			$page_title_typography_default = apply_filters(
				'zakra_post_page_title_typography_filter',
				array(
					'font-family'    => 'default',
					'font-weight'    => '500',
					'subsets'        => array( 'latin' ),
					'font-size'      => array(
						'desktop' => array(
							'size' => '2.5',
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
				)
			);

			$page_title_typography = get_theme_mod( 'zakra_post_page_title_typography', $page_title_typography_default );

			$parse_css .= zakra_parse_typography_css(
				$page_title_typography_default,
				$page_title_typography,
				'.zak-page-header .zak-page-title, .zakra-single-article .zak-entry-header .entry-title',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			$blog_post_title_typography_default = array(
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
			);

			$blog_post_title_typography = get_theme_mod( 'zakra_blog_post_title_typography', $blog_post_title_typography_default );

			$parse_css .= zakra_parse_typography_css(
				$blog_post_title_typography_default,
				$blog_post_title_typography,
				apply_filters( 'zakra_blog_post_title_typography_selector', '.entry-title:not(.zak-page-title)' ),
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			$widget_title_typography_default = apply_filters(
				'zakra_widget_title_typography_filter',
				array(
					'font-family'    => 'default',
					'font-weight'    => '500',
					'subsets'        => array( 'latin' ),
					'font-size'      => array(
						'desktop' => array(
							'size' => '1.2',
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
				)
			);

			$widget_title_typography = get_theme_mod( 'zakra_widget_title_typography', $widget_title_typography_default );

			$parse_css .= zakra_parse_typography_css(
				$widget_title_typography_default,
				$widget_title_typography,
				'.zak-secondary .widget .widget-title, .zak-secondary .widget .wp-block-heading',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			$widget_content_typography_default = apply_filters(
				'zakra_widget_content_typography_filter',
				array(
					'font-family'    => 'default',
					'font-weight'    => 'regular',
					'subsets'        => array( 'latin' ),
					'font-size'      => array(
						'desktop' => array(
							'size' => '14',
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
					'line-height'    => array(
						'desktop' => array(
							'size' => '1.8',
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
				)
			);

			$widget_content_typography = get_theme_mod( 'zakra_widget_content_typography', $widget_content_typography_default );

			$parse_css .= zakra_parse_typography_css(
				$widget_content_typography_default,
				$widget_content_typography,
				'.zak-secondary .widget, .zak-secondary .widget li a',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Footer background.
			$footer_widgets_background_defaults = array(
				'background-color'      => '#18181B',
				'background-image'      => '',
				'background-repeat'     => 'repeat',
				'background-position'   => 'center center',
				'background-size'       => 'contain',
				'background-attachment' => 'scroll',
			);
			$footer_widgets_background          = get_theme_mod( 'zakra_footer_column_background', $footer_widgets_background_defaults );
			$parse_css                          .= zakra_parse_background_css( $footer_widgets_background_defaults, $footer_widgets_background, apply_filters( 'zakra_footer_widgets_bg_selector', '.zak-footer-cols' ) );

			// Footer widgets title color.
			$footer_widgets_title_color     = get_theme_mod( 'zakra_footer_widgets_title_color', '' );
			$footer_widgets_title_color_css = array(
				'.zak-footer .zak-footer-cols .widget-title, .zak-footer-cols h1, .zak-footer-cols h2, .zak-footer-cols h3, .zak-footer-cols h4, .zak-footer-cols h5, .zak-footer-cols h6' => array(
					'color' => esc_html( $footer_widgets_title_color ),
				),
			);
			$parse_css                      .= zakra_parse_css( '', $footer_widgets_title_color, $footer_widgets_title_color_css );

			// Footer widgets text color.
			$footer_widgets_text_color     = get_theme_mod( 'zakra_footer_column_widget_text_color', '' );
			$footer_widgets_text_color_css = array(
				'.zak-footer .zak-footer-cols, .zak-footer .zak-footer-cols p' => array(
					'color' => esc_html( $footer_widgets_text_color ),
				),
			);
			$parse_css                     .= zakra_parse_css( '', $footer_widgets_text_color, $footer_widgets_text_color_css );

			// Footer widgets link color.
			$footer_widgets_link_color     = get_theme_mod( 'zakra_footer_column_widget_link_color', '' );
			$footer_widgets_link_color_css = array(
				'.zak-footer .zak-footer-cols a, .zak-footer-col .widget ul a' => array(
					'color' => esc_html( $footer_widgets_link_color ),
				),
			);
			$parse_css                     .= zakra_parse_css( '', $footer_widgets_link_color, $footer_widgets_link_color_css );

			// Footer widgets link hover color.
			$footer_widgets_link_hover_color     = get_theme_mod( 'zakra_footer_column_widget_link_hover_color', '' );
			$footer_widgets_link_hover_color_css = array(
				'.zak-footer .zak-footer-cols a:hover, .zak-footer-col .widget ul a:hover, .zak-footer .zak-footer-cols a:focus' => array(
					'color' => esc_html( $footer_widgets_link_hover_color ),
				),
			);
			$parse_css                           .= zakra_parse_css( '', $footer_widgets_link_hover_color, $footer_widgets_link_hover_color_css );

			/**
			 * Footer widgets border top width.
			 */
			$footer_widgets_border_top_width_default = array(
				'size' => 1,
				'unit' => 'px',
			);

			$footer_widgets_border_top_width = get_theme_mod( 'zakra_footer_column_border_top_width', $footer_widgets_border_top_width_default );

			$parse_css .= zakra_parse_slider_css(
				$footer_widgets_border_top_width_default,
				$footer_widgets_border_top_width,
				'.zak-footer-cols',
				'border-top-width'
			);

			// Footer widgets border top color.
			$footer_widgets_border_top_color     = get_theme_mod( 'zakra_footer_column_border_top_color', '#e9ecef' );
			$footer_widgets_border_top_color_css = array(
				'.zak-footer-cols' => array(
					'border-top-color' => esc_html( $footer_widgets_border_top_color ),
				),
			);
			$parse_css                           .= zakra_parse_css( '#e9ecef', $footer_widgets_border_top_color, $footer_widgets_border_top_color_css );

			/**
			 * Footer widgets border bottom width.
			 */
			$footer_widgets_item_border_bottom_width_default = array(
				'size' => '',
				'unit' => 'px',
			);

			$footer_widgets_item_border_bottom_width = get_theme_mod( 'zakra_footer_widgets_item_border_bottom_width', $footer_widgets_item_border_bottom_width_default );

			$parse_css .= zakra_parse_slider_css(
				$footer_widgets_item_border_bottom_width_default,
				$footer_widgets_item_border_bottom_width,
				'.zak-footer-cols ul li',
				'border-bottom-width'
			);

			// Footer widgets item border bottom color.
			$footer_widgets_item_border_bottom__color     = get_theme_mod( 'zakra_footer_widgets_item_border_bottom_color', '#e9ecef' );
			$footer_widgets_item_border_bottom__color_css = array(
				'.zak-footer-cols ul li' => array(
					'border-bottom-color' => esc_html( $footer_widgets_item_border_bottom__color ),
				),
			);
			$parse_css                                    .= zakra_parse_css( '#e9ecef', $footer_widgets_item_border_bottom__color, $footer_widgets_item_border_bottom__color_css );

			// Footer bottom bar background.
			$footer_bar_background_defaults = array(
				'background-color'      => '#18181B',
				'background-image'      => '',
				'background-repeat'     => 'repeat',
				'background-position'   => 'center center',
				'background-size'       => 'contain',
				'background-attachment' => 'scroll',
			);
			$footer_bar                     = get_theme_mod( 'zakra_footer_bar_background', $footer_bar_background_defaults );
			$parse_css                      .= zakra_parse_background_css( $footer_bar_background_defaults, $footer_bar, '.zak-footer-bar' );

			// Footer bottom bar text color.
			$footer_bar_text_color     = get_theme_mod( 'zakra_footer_bar_text_color', '#fafafa' );
			$footer_bar_text_color_css = array(
				'.zak-footer-bar' => array(
					'color' => esc_html( $footer_bar_text_color ),
				),
			);
			$parse_css                 .= zakra_parse_css( '#51585f', $footer_bar_text_color, $footer_bar_text_color_css );

			// Footer bottom bar link color.
			$footer_bar_link_color     = get_theme_mod( 'zakra_footer_bar_link_color', '#16181a' );
			$footer_bar_link_color_css = array(
				'.zak-footer-bar a' => array(
					'color' => esc_html( $footer_bar_link_color ),
				),
			);
			$parse_css                 .= zakra_parse_css( '#16181a', $footer_bar_link_color, $footer_bar_link_color_css );

			// Footer bottom bar link hover color.
			$footer_bar_link_hover_color     = get_theme_mod( 'zakra_footer_bar_link_hover_color', '#027abb' );
			$footer_bar_link_hover_color_css = array(
				'.zak-footer-bar a:hover, .zak-footer-bar a:focus' => array(
					'color' => esc_html( $footer_bar_link_hover_color ),
				),
			);
			$parse_css                       .= zakra_parse_css( '#027abb', $footer_bar_link_hover_color, $footer_bar_link_hover_color_css );

			/**
			 * Footer bar border top width.
			 */
			$footer_bar_border_top_width_default = array(
				'size' => 1,
				'unit' => 'px',
			);

			$footer_bar_border_top_width = get_theme_mod( 'zakra_footer_bar_border_top_width', $footer_bar_border_top_width_default );

			$parse_css .= zakra_parse_slider_css(
				$footer_bar_border_top_width_default,
				$footer_bar_border_top_width,
				'.zak-footer-bar',
				'border-top-width'
			);

			// Footer bar border top color.
			$footer_bar_border_top_color     = get_theme_mod( 'zakra_footer_bar_border_top_color', '#3f3f46' );
			$footer_bar_border_top_color_css = array(
				'.zak-footer-bar' => array(
					'border-top-color' => esc_html( $footer_bar_border_top_color ),
				),
			);
			$parse_css                       .= zakra_parse_css( '#3f3f46', $footer_bar_border_top_color, $footer_bar_border_top_color_css );

			$scroll_to_top_normal_background_color     = get_theme_mod( 'zakra_scroll_to_top_background', '#16181a' );
			$scroll_to_top_normal_background_color_css = array(
				'.zak-scroll-to-top' => array(
					'background-color' => esc_html( $scroll_to_top_normal_background_color ),
				),
			);
			$parse_css                                 .= zakra_parse_css( '#16181a', $scroll_to_top_normal_background_color, $scroll_to_top_normal_background_color_css );

			$scroll_to_top_hover_background_color     = get_theme_mod( 'zakra_scroll_to_top_hover_background', '#1e7ba6' );
			$scroll_to_top_hover_background_color_css = array(
				'.zak-scroll-to-top:hover' => array(
					'background-color' => esc_html( $scroll_to_top_hover_background_color ),
				),
			);
			$parse_css                                .= zakra_parse_css( '#1e7ba6', $scroll_to_top_hover_background_color, $scroll_to_top_hover_background_color_css );

			$scroll_to_top_normal_color     = get_theme_mod( 'zakra_scroll_to_top_icon_color', '#ffffff' );
			$scroll_to_top_normal_color_css = array(
				'.zak-scroll-to-top' => array(
					'color' => esc_html( $scroll_to_top_normal_color ),
				),
				'.zak-scroll-to-top .zak-icon'                                                                                                => array(
					'fill' => esc_html( $scroll_to_top_normal_color ),
				),
			);
			$parse_css            .= zakra_parse_css( '#ffffff', $scroll_to_top_normal_color, $scroll_to_top_normal_color_css );

			$scroll_to_top_hover_color     = get_theme_mod( 'zakra_scroll_to_top_icon_hover_color', '#ffffff' );
			$scroll_to_top_hover_color_css = array(
				'.zak-scroll-to-top:hover' => array(
					'color' => esc_html( $scroll_to_top_hover_color ),
				),
				'.zak-scroll-to-top:hover .zak-icon' => array(
					'fill' => esc_html( $scroll_to_top_hover_color ),
				),
			);
			$parse_css            .= zakra_parse_css( '#ffffff', $scroll_to_top_hover_color, $scroll_to_top_hover_color_css );

			$parse_css .= $dynamic_css;

			return apply_filters( 'zakra_theme_dynamic_css', $parse_css );
		}

		/**
		 * Return dynamic CSS output.
		 *
		 * @param string $dynamic_css Dynamic CSS.
		 * @param string $dynamic_css_filtered Dynamic CSS Filters.
		 *
		 * @return string Generated CSS.
		 */
		public static function render_wc_output( $dynamic_css, $dynamic_css_filtered = '' ) {

			$parse_wc_css = '';

			$base_wc_primary_color     = get_theme_mod( 'zakra_primary_color', '#027abb' );
			$base_wc_primary_color_css = array(
				'.woocommerce-info::before,
				.woocommerce ul.products li.product .woocommerce-loop-product__title:hover,
				.wc-block-grid__product .wc-block-grid__product-title:hover,
				.woocommerce nav.woocommerce-pagination ul li a,.woocommerce nav.woocommerce-pagination ul li span,
				.woocommerce div.product p.price,.woocommerce div.product span.price,
				.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
				.woocommerce .widget_price_filter .price_slider_amount .button,
				.single-product .product .product_meta > span a'                                                                                                                                                                                                                                                                                                                                                                                                            => array(
					'color' => esc_html( $base_wc_primary_color ),
				),
				'.wc-block-grid__product-onsale,
				.woocommerce ul.products a.button,
				.wp-block-button .wp-block-button__link,
				.woocommerce a.button.alt,
				.woocommerce button.button,
				.woocommerce button.button.alt,
				.woocommerce nav.woocommerce-pagination ul li span.current,
				.woocommerce nav.woocommerce-pagination ul li a:hover,
				.woocommerce nav.woocommerce-pagination ul li a:focus,
				.woocommerce div.product form.cart .button,
				.woocommerce div.product .woocommerce-tabs #respond input#submit,
				.woocommerce .widget_price_filter .ui-slider-horizontal .ui-slider-range,
				.woocommerce .widget_price_filter .price_slider_amount .button:hover,
				.wc-block-grid__products .wc-block-grid__product .zakra-onsale-normal-wrapper span' => array(
					'background-color' => esc_html( $base_wc_primary_color ),
				),
				'.woocommerce nav.woocommerce-pagination ul li, .woocommerce div.product .woocommerce-tabs ul.tabs li.active, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce .widget_price_filter .price_slider_amount .button, .woocommerce-info'                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             => array(
					'border-color' => esc_html( $base_wc_primary_color ),
				),
				'.wp-block-woocommerce-cart .wp-block-woocommerce-cart-order-summary-block .wc-block-components-totals-coupon__content button.wc-block-components-totals-coupon__button,
				.wc-block-checkout button.wc-block-components-totals-coupon__button,
				.woocommerce .woocommerce-pagination .page-numbers li > a, .woocommerce .woocommerce-pagination .page-numbers li > span' => array(
					'color'        => esc_html( $base_wc_primary_color ),
					'border-color' => esc_html( $base_wc_primary_color ),
				),
				'.wc-block-checkout .wc-block-checkout__actions_row button.wc-block-components-checkout-place-order-button, .wc-block-checkout .wc-block-checkout__actions_row button.wc-block-components-checkout-place-order-button:hover,
				.wc-block-checkout .wp-block-woocommerce-checkout-actions-block .wc-block-checkout__actions_row .wc-block-components-checkout-return-to-cart-button:hover, .wc-block-checkout .wp-block-woocommerce-checkout-order-summary-block .wc-block-components-order-summary-item__image .wc-block-components-order-summary-item__quantity,
				.wc-block-components-drawer__content .wc-block-mini-cart__footer .wc-block-mini-cart__footer-actions .wp-element-button.wc-block-mini-cart__footer-checkout,
				.wc-block-components-drawer__content .wc-block-mini-cart__footer .wc-block-mini-cart__footer-actions .wp-element-button.wc-block-mini-cart__footer-cart:hover,
				.wc-block-grid__products .wc-block-grid__product .wp-block-button .wp-block-button__link:hover,
				.woocommerce .woocommerce-pagination .page-numbers .current' => array(
					'background-color' => esc_html( $base_wc_primary_color ),
				),
			);
			$parse_wc_css              .= zakra_parse_css( '#027abb', $base_wc_primary_color, $base_wc_primary_color_css );

			$base_wc_text_color     = get_theme_mod( 'zakra_base_color', '#3F3F46' );
			$base_wc_text_color_css = array(
				'.woocommerce ul.products li.product .price, .woocommerce .star-rating span, ul li.product .price, .wc-block-components-formatted-money-amount, .wc-block-grid__products .wc-block-grid__product .wc-block-grid__product-price' => array(
					'color' => esc_html( $base_wc_text_color ),
				),
			);
			$parse_wc_css           .= zakra_parse_css( '#3F3F46', $base_wc_text_color, $base_wc_text_color_css );

			$button_wc_text_color     = get_theme_mod( 'zakra_button_color', '' );
			$button_wc_text_color_css = array(
				'.woocommerce a.button, .woocommerce a.button.alt, .woocommerce button.button, .woocommerce button.button.alt, .woocommerce ul.products a.button, .woocommerce div.product form.cart .button, .wp-block-button .wp-block-button__link, .woocommerce button.button:disabled[disabled], .tg-sticky-panel .tg-checkout-btn a' => array(
					'color' => esc_html( $button_wc_text_color ),
				),
			);
			$parse_wc_css             .= zakra_parse_css( '', $button_wc_text_color, $button_wc_text_color_css );

			$button_wc_hover_text_color     = get_theme_mod( 'zakra_button_hover_color', '' );
			$button_wc_hover_text_color_css = array(
				'.woocommerce a.button:hover, .woocommerce a.button.alt:hover, .woocommerce button.button:hover, .woocommerce button.button.alt:hover, .woocommerce ul.products a.button:hover, .woocommerce div.product form.cart .button:hover, .tg-sticky-panel .tg-checkout-btn a:hover' => array(
					'color' => esc_html( $button_wc_hover_text_color ),
				),
			);
			$parse_wc_css                   .= zakra_parse_css( '', $button_wc_hover_text_color, $button_wc_hover_text_color_css );

			$button_wc_bg_color     = get_theme_mod( 'zakra_button_background_color', '#027abb' );
			$button_wc_bg_color_css = array(
				'.woocommerce a.button.alt, .woocommerce button.button, .woocommerce button.button.alt, .woocommerce ul.products a.button, .woocommerce div.product form.cart .button, .wp-block-button .wp-block-button__link, .tg-sticky-panel .tg-checkout-btn a' => array(
					'background-color' => esc_html( $button_wc_bg_color ),
				),
			);
			$parse_wc_css           .= zakra_parse_css( '#027abb', $button_wc_bg_color, $button_wc_bg_color_css );

			$button_wc_bg_hover_color     = get_theme_mod( 'zakra_button_background_hover_color', '#027ABB' );
			$button_wc_bg_hover_color_css = array(
				'.woocommerce a.button.alt:hover, .woocommerce button.button:hover, .woocommerce button.button.alt:hover, .woocommerce ul.products a.button:hover, .woocommerce div.product form.cart .button:hover, .product .wc-block-grid__product-add-to-cart .wp-block-button__link:hover, .tg-sticky-panel .tg-checkout-btn a:hover' => array(
					'background-color' => esc_html( $button_wc_bg_hover_color ),
				),
			);
			$parse_wc_css                 .= zakra_parse_css( '#027ABB', $button_wc_bg_hover_color, $button_wc_bg_hover_color_css );

			/**
			 * Button border radius for WooCommerce button.
			 */
			$button_wc_border_radius_default = array(
				'size' => 0,
				'unit' => 'px',
			);

			$button_wc_border_radius = get_theme_mod( 'zakra_button_roundness', $button_wc_border_radius_default );

			$parse_wc_css .= zakra_parse_slider_css(
				$button_wc_border_radius_default,
				$button_wc_border_radius,
				'.woocommerce a.button, .woocommerce a.button.alt, .woocommerce button.button, .woocommerce button.button.alt, .woocommerce ul.products a.button, .woocommerce div.product form.cart .button, .wp-block-button .wp-block-button__link, .tg-sticky-panel .tg-checkout-btn a',
				'border-radius'
			);

			// Button padding.
			$button_wc_padding_default = array(
				'top'    => '10',
				'right'  => '15',
				'bottom' => '10',
				'left'   => '15',
				'unit'   => 'px',
			);

			$button_wc_padding = get_theme_mod( 'zakra_button_padding', $button_wc_padding_default );

			$parse_wc_css .= zakra_parse_dimension_css(
				$button_wc_padding_default,
				$button_wc_padding,
				'.woocommerce a.button,.woocommerce-cart .actions > .button, .woocommerce a.button.alt, .woocommerce button.button, .woocommerce button.button.alt, .woocommerce ul.products a.button, .woocommerce div.product form.cart .button, .woocommerce ul.products li.product .button, .woocommerce button.button:disabled[disabled], .tg-sticky-panel .tg-checkout-btn a, .wc-block-grid__product .wc-block-grid__product-add-to-cart .wp-block-button__link',
				'padding'
			);

			$parse_wc_css .= $dynamic_css;

			return apply_filters( 'zakra_theme_wc_dynamic_css', $parse_wc_css );
		}

	}
}
