<?php
/**
 * Footer Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Footer_Layout_Customizer' ) ) :
	/**
	 * Footer Customizer Options */
	class Responsive_Footer_Layout_Customizer {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {

			add_action( 'customize_register', array( $this, 'customizer_options' ) );
			add_action( 'responsive_footer_copyright', array( $this, 'footer_copyright' ), 10 );

		}
		
		public function footer_copyright() {
			$theme_author = responsive_get_theme_author_details();
		
			$content = get_option( 'footer-copyright' );
			if ( $content || is_customize_preview() ) {
				echo '<div class="footer_copyright">';						
						$content = str_replace( '[copyright]', '&copy;', $content );
						$content = str_replace( '[current_year]', gmdate( 'Y' ), $content );
						$content = str_replace( '[site_title]', get_bloginfo( 'name' ), $content );
						$content = str_replace( '[theme_author]', '<a href="' . esc_url( $theme_author['theme_author_url'] ) . '" rel="nofollow noopener" target="_blank">' . $theme_author['theme_name'] . '</a>', $content );
						echo do_shortcode( wp_kses_post( wpautop( $content ) ) );
				echo '</div>';
			}
		
		}

		/**
		 * Customizer options
		 *
		 * @since 0.2
		 *
		 * @param  object $wp_customize WordPress customization option.
		 */
		public function customizer_options( $wp_customize ) {
			$wp_customize->add_section(
				'responsive_footer_layout',
				array(
					'title'    => esc_html__( 'Layout', 'responsive' ),
					'panel'    => 'responsive_footer',
					'priority' => 10,

				)
			);

			// Adding General and Design tabs
			// error_log('Debug - footer tabs button control');
			$tabs_label            = esc_html__( 'Tabs', 'responsive' );
			$design_tab_ids_prefix = 'customize-control-';
			$design_tab_ids        = array(
				$design_tab_ids_prefix . 'responsive_footer_background_color',
				$design_tab_ids_prefix . 'responsive_footer_text_color',
				$design_tab_ids_prefix . 'responsive_footer_links_color',
				$design_tab_ids_prefix . 'responsive_footer_links_hover_color',
				$design_tab_ids_prefix . 'responsive_footer_border_color',
				$design_tab_ids_prefix . 'responsive_footer_background_image',
			);

			$general_tab_ids_prefix = 'customize-control-';
			$general_tab_ids        = array(
				$general_tab_ids_prefix . 'responsive_footer_full_width',
				$general_tab_ids_prefix . 'responsive_footer_elements_positioning',
				$general_tab_ids_prefix . 'responsive_footer_widgets_separator',
				$general_tab_ids_prefix . 'responsive_footer_widgets_columns',
				$general_tab_ids_prefix . 'responsive_footer_widgets_padding',
				$general_tab_ids_prefix . 'responsive_footer_widget_desktop_visibility',
				$general_tab_ids_prefix . 'responsive_footer_widget_tablet_visibility',
				$general_tab_ids_prefix . 'responsive_footer_widget_mobile_visibility',
				$general_tab_ids_prefix . 'responsive_footer_bar_separator',
				$general_tab_ids_prefix . 'footer_copyright',
				$general_tab_ids_prefix . 'responsive_copyright',
				$general_tab_ids_prefix . 'responsive_copyright_tablet',
				$general_tab_ids_prefix . 'responsive_copyright_mobile',
				$general_tab_ids_prefix . 'responsive_footer_bar_layout',
				$general_tab_ids_prefix . 'responsive_footer_bar_padding',
				$general_tab_ids_prefix . 'responsive_footer_border_size',
				$general_tab_ids_prefix . 'responsive_social_links_separator',
				$general_tab_ids_prefix . 'responsive_social_link_new_tab',
				$general_tab_ids_prefix . 'res_twitter',
				$general_tab_ids_prefix . 'res_facebook',
				$general_tab_ids_prefix . 'res_linkedin',
				$general_tab_ids_prefix . 'res_youtube',
				$general_tab_ids_prefix . 'res_rss',
				$general_tab_ids_prefix . 'res_instagram',
				$general_tab_ids_prefix . 'res_pinterest',
				$general_tab_ids_prefix . 'res_stumble',
				$general_tab_ids_prefix . 'res_vimeo',
				$general_tab_ids_prefix . 'res_yelp',
				$general_tab_ids_prefix . 'res_foursquare',
				$general_tab_ids_prefix . 'email_uid',
			);

			responsive_tabs_button_control( $wp_customize, 'footer_tabs', $tabs_label, 'responsive_footer_layout', 1, '', 'responsive_footer_general_tab', 'responsive_footer_design_tab', $general_tab_ids, $design_tab_ids, null );

			// Full Width Footer.
			$footer_full_width_label = __( 'Full Width Footer', 'responsive' );
			responsive_toggle_control( $wp_customize, 'footer_full_width', $footer_full_width_label, 'responsive_footer_layout', 10, 0, 'responsive_active_site_layout_contained', 'postMessage' );

			/**
			 * Footer Widget Separator.
			 */
			$footer_widgets_separator_label = esc_html__( 'Footer Widgets', 'responsive' );
			responsive_separator_control( $wp_customize, 'footer_widgets_separator', $footer_widgets_separator_label, 'responsive_footer_layout', 15 );

			// Number of Columns.
			$number_of_columns_label = __( 'Number of Columns', 'responsive' );
			responsive_drag_number_control( $wp_customize, 'footer_widgets_columns', $number_of_columns_label, 'responsive_footer_layout', 20, 0, null, 4, 0, 'postMessage' );

			// Widgets Padding.
			responsive_padding_control( $wp_customize, 'footer_widgets', 'responsive_footer_layout', 30, 20, 0, null );

			// Hide on Desktop.
			$footer_widget_desktop_visibility = __( 'Hide on Desktop', 'responsive' );
			responsive_toggle_control( $wp_customize, 'footer_widget_desktop_visibility', $footer_widget_desktop_visibility, 'responsive_footer_layout', 30, 0, null );

			// Hide on Tablet.
			$footer_widget_tablet_visibility = __( 'Hide on Tablet', 'responsive' );
			responsive_toggle_control( $wp_customize, 'footer_widget_tablet_visibility', $footer_widget_tablet_visibility, 'responsive_footer_layout', 30, 0, null );

			// Hide on Mobile.
			$footer_widget_mobile_visibility = __( 'Hide on Mobile', 'responsive' );
			responsive_toggle_control( $wp_customize, 'footer_widget_mobile_visibility', $footer_widget_mobile_visibility, 'responsive_footer_layout', 30, 0, null );

			/**
			 * Footer Widgets Alignment Separator
			 */
			$footer_widgets_columns_check = get_theme_mod( 'responsive_footer_widgets_columns' );
			if ( $footer_widgets_columns_check && '0' !== $footer_widgets_columns_check ) {
				$footer_widgets_alignment_separator_label = esc_html__( 'Footer Widgets Alignment', 'responsive' );
				responsive_separator_control( $wp_customize, 'footer_widgets_alignment_separator', $footer_widgets_alignment_separator_label, 'responsive_footer_layout', 40 );
			}

			// Footer Widget Alignment.
			$footer_widgets_columns = get_theme_mod( 'responsive_footer_widgets_columns' );
			for ( $i = 1; $i <= $footer_widgets_columns; $i++ ) {
				$_section                = 'responsive_footer_layout';
				$alignment_desktop_label = sprintf(
					/* translators: %s Column number */
					__( 'Area %s Desktop', 'responsive' ),
					$i
				);
				$alignment_tablet_label = sprintf(
					/* translators: %s Column number */
					__( 'Area %s Tablet', 'responsive' ),
					$i
				);
				$alignment_mobile_label = sprintf(
					/* translators: %s Column number */
					__( 'Area %s Mobile', 'responsive' ),
					$i
				);
				$alignment_choices = array(
					'left'   => esc_html__( 'dashicons-editor-alignleft', 'responsive' ),
					'center' => esc_html__( 'dashicons-editor-aligncenter', 'responsive' ),
					'right'  => esc_html__( 'dashicons-editor-alignright', 'responsive' ),
				);
				responsive_select_button_control( $wp_customize, 'footer_widget_alignment_desktop_' . $i, $alignment_desktop_label, $_section, 40, $alignment_choices, 'left', null, 'postMessage' );
				responsive_select_button_control( $wp_customize, 'footer_widget_alignment_tablet_' . $i, $alignment_tablet_label, $_section, 40, $alignment_choices, 'center', null, 'postMessage' );
				responsive_select_button_control( $wp_customize, 'footer_widget_alignment_mobile_' . $i, $alignment_mobile_label, $_section, 40, $alignment_choices, 'center', null, 'postMessage' );
			}

			/**
			 * Footer Bar Separator.
			 */
			$footer_bar_separator_label = esc_html__( 'Footer Bar', 'responsive' );
			responsive_separator_control( $wp_customize, 'footer_bar_separator', $footer_bar_separator_label, 'responsive_footer_layout', 100 );

			/*
			------------------------------------------------------------------
			// Copyright Text
			-------------------------------------------------------------------
			*/
			
			// 1st EDITOR
			$wp_customize->add_setting(
				'footer_copyright',
				array(
					'type' => 'option',
					'sanitize_callback' => 'wp_kses_post',
					'transport'   => 'refresh',
				),
			);
			
			$wp_customize->add_control(
				new Responsive_Customizer_Tinymce_Control(
					$wp_customize,
					'footer_copyright',
					array(
						'label' => __('Copyright Text', 'responsive'),
						'section' => 'responsive_footer_layout',
						'priority'    => 110,
					)
				)
			);

			// Hide Copyright.
			$copyright_visibility_label = __( 'Hide Copyright on Desktop', 'responsive' );
			responsive_toggle_control( $wp_customize, 'copyright', $copyright_visibility_label, 'responsive_footer_layout', 118, 0, null );

			// Hide on Tablet.
			$copyright_visibility_tablet_label = __( 'Hide Copyright on Tablet', 'responsive' );
			responsive_toggle_control( $wp_customize, 'copyright_tablet', $copyright_visibility_tablet_label, 'responsive_footer_layout', 119, 0, null );

			// Hide on Mobile.
			$copyright_visibility_mobile_label = __( 'Hide Copyright on Mobile', 'responsive' );
			responsive_toggle_control( $wp_customize, 'copyright_mobile', $copyright_visibility_mobile_label, 'responsive_footer_layout', 120, 0, null );

			// Footer Bar Layout.
			$footer_bar_layout_label = esc_html__( 'Layout', 'responsive' );
			$footer_layout_choices   = array(
				'horizontal' => esc_html__( 'Horizontal', 'responsive' ),
				'vertical'   => esc_html__( 'Vertical', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'footer_bar_layout', $footer_bar_layout_label, 'responsive_footer_layout', 130, $footer_layout_choices, 'horizontal', null, 'postMessage' );

			// Bar Padding.
			responsive_padding_control( $wp_customize, 'footer_bar', 'responsive_footer_layout', 140, 20, 0, null );

			// Bottom Border.

			$footer_border_label = __( 'Border Size', 'responsive' );

			responsive_number_control( $wp_customize, 'footer_border_size', $footer_border_label, 'responsive_footer_layout', 145, 1 );

			/**
			 * Social Links Separator.
			 */
			$social_links_separator_label = esc_html__( 'Social Links', 'responsive' );
			responsive_separator_control( $wp_customize, 'social_links_separator', $social_links_separator_label, 'responsive_footer_layout', 150 );

			// Social Link New Tab.
			$social_link_new_label = esc_html__( 'Open Social Icons in a new tab', 'responsive' );
			$social_link_choices   = array(
				'_self'  => esc_html__( 'No', 'responsive' ),
				'_blank' => esc_html__( 'Yes', 'responsive' ),
			);
			responsive_select_control( $wp_customize, 'social_link_new_tab', $social_link_new_label, 'responsive_footer_layout', 155, $social_link_choices, '_self', null );

			// Add Twitter Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[twitter_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_twitter',
					array(
						'label'    => __( 'Twitter', 'responsive' ),
						'section'  => 'responsive_footer_layout',
						'settings' => 'responsive_theme_options[twitter_uid]',
						'priority' => 156,
					)
				)
			);

			// Add Facebook Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[facebook_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_facebook',
					array(
						'label'    => __( 'Facebook', 'responsive' ),
						'section'  => 'responsive_footer_layout',
						'settings' => 'responsive_theme_options[facebook_uid]',
						'priority' => 157,
					)
				)
			);

			// Add LinkedIn Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[linkedin_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_linkedin',
					array(
						'label'    => __( 'LinkedIn', 'responsive' ),
						'section'  => 'responsive_footer_layout',
						'settings' => 'responsive_theme_options[linkedin_uid]',
						'priority' => 157,
					)
				)
			);

			// Add Youtube Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[youtube_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_youtube',
					array(
						'label'    => __( 'YouTube', 'responsive' ),
						'section'  => 'responsive_footer_layout',
						'settings' => 'responsive_theme_options[youtube_uid]',
						'priority' => 157,
					)
				)
			);

			// Add RSS Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[rss_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_rss',
					array(
						'label'    => __( 'RSS Feed', 'responsive' ),
						'section'  => 'responsive_footer_layout',
						'settings' => 'responsive_theme_options[rss_uid]',
						'priority' => 157,
					)
				)
			);

			// Add Instagram Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[instagram_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_instagram',
					array(
						'label'    => __( 'Instagram', 'responsive' ),
						'section'  => 'responsive_footer_layout',
						'settings' => 'responsive_theme_options[instagram_uid]',
						'priority' => 157,
					)
				)
			);

			// Add Pinterest Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[pinterest_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_pinterest',
					array(
						'label'    => __( 'Pinterest', 'responsive' ),
						'section'  => 'responsive_footer_layout',
						'settings' => 'responsive_theme_options[pinterest_uid]',
						'priority' => 157,
					)
				)
			);

			// Add StumbleUpon Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[stumbleupon_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_stumble',
					array(
						'label'    => __( 'StumbleUpon', 'responsive' ),
						'section'  => 'responsive_footer_layout',
						'settings' => 'responsive_theme_options[stumbleupon_uid]',
						'priority' => 157,
					)
				)
			);

			// Add Vimeo Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[vimeo_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_vimeo',
					array(
						'label'    => __( 'Vimeo', 'responsive' ),
						'section'  => 'responsive_footer_layout',
						'settings' => 'responsive_theme_options[vimeo_uid]',
						'priority' => 157,
					)
				)
			);

			// Add SoundCloud Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[yelp_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_yelp',
					array(
						'label'    => __( 'Yelp', 'responsive' ),
						'section'  => 'responsive_footer_layout',
						'settings' => 'responsive_theme_options[yelp_uid]',
						'priority' => 157,
					)
				)
			);

			// Add Foursquare Setting.
			$wp_customize->add_setting(
				'responsive_theme_options[foursquare_uid]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'res_foursquare',
					array(
						'label'    => __( 'Foursquare', 'responsive' ),
						'section'  => 'responsive_footer_layout',
						'settings' => 'responsive_theme_options[foursquare_uid]',
						'priority' => 157,
					)
				)
			);
			$wp_customize->add_setting(
				'responsive_theme_options[email_uid]',
				array(
					'sanitize_callback' => 'sanitize_email',
					'type'              => 'option',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'email_uid',
					array(
						'label'    => __( 'Email Address', 'responsive' ),
						'section'  => 'responsive_footer_layout',
						'settings' => 'responsive_theme_options[email_uid]',
						'priority' => 157,
					)
				)
			);
			
			/*
			------------------------------------------------------------------
				Design Controls
			-------------------------------------------------------------------
			*/
			
			// Background Color.
			$footer_background_label = __( 'Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_background', $footer_background_label, 'responsive_footer_layout', 10, Responsive\Core\get_responsive_customizer_defaults( 'footer_background' ) );

			// Text Color.
			$footer_text_label = __( 'Text Color', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_text', $footer_text_label, 'responsive_footer_layout', 20, Responsive\Core\get_responsive_customizer_defaults( 'footer_text' ) );

			// Links Color.
			$footer_links_color_label = __( 'Links Color', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_links', $footer_links_color_label, 'responsive_footer_layout', 30, Responsive\Core\get_responsive_customizer_defaults( 'footer_links' ) );

			// Links Hover Color .
			$footer_links_hover_color_label = __( 'Links Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_links_hover', $footer_links_hover_color_label, 'responsive_footer_layout', 40, Responsive\Core\get_responsive_customizer_defaults( 'footer_links_hover' ) );

			// Links Color.
			$footer_border_color_label = __( 'Border Color', 'responsive' );
			responsive_color_control( $wp_customize, 'footer_border', $footer_border_color_label, 'responsive_footer_layout', 50, '#aaaaaa');

		}
	}

endif;

return new Responsive_Footer_Layout_Customizer();
