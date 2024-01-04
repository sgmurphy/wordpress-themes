<?php

$wp_customize->add_section('total_footer_settings', array(
    'title' => esc_html__('Footer Settings', 'total'),
    'priority' => 60
));

$wp_customize->add_setting('total_footer_nav', array(
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Total_Tab_Control($wp_customize, 'total_footer_nav', array(
    'section' => 'total_footer_settings',
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'total'),
            'icon' => 'dashicons dashicons-welcome-write-blog',
            'fields' => array(
                'total_footer_col',
                'total_footer_copyright'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'total'),
            'icon' => 'dashicons dashicons-art',
            'fields' => array(
                'total_footer_bg',
                'total_enable_footer_border',
                'total_top_footer_heading',
                'total_top_footer_title_color',
                'total_top_footer_text_color',
                'total_top_footer_anchor_color',
                'total_top_footer_anchor_color_hover',
                'total_bottom_footer_heading',
                'total_bottom_footer_bg_color',
                'total_bottom_footer_text_color',
                'total_bottom_footer_anchor_color',
                'total_bottom_footer_anchor_color_hover'
            ),
        )
    ),
)));

$wp_customize->add_setting('total_footer_col', array(
    'sanitize_callback' => 'total_sanitize_text',
    'default' => 'col-4-1-1-1-1'
));

$wp_customize->add_control(new Total_Selector_Control($wp_customize, 'total_footer_col', array(
    'section' => 'total_footer_settings',
    'label' => esc_html__('Footer Column', 'total'),
    'class' => 'ht--one-third-width',
    'options' => array(
        'col-1-1' => TOTAL_CUSTOMIZER_URL . 'customizer-panel/assets/images/footer-columns/col-1-1.jpg',
        'col-2-1-1' => TOTAL_CUSTOMIZER_URL . 'customizer-panel/assets/images/footer-columns/col-2-1-1.jpg',
        'col-3-1-1-1' => TOTAL_CUSTOMIZER_URL . 'customizer-panel/assets/images/footer-columns/col-3-1-1-1.jpg',
        'col-4-1-1-1-1' => TOTAL_CUSTOMIZER_URL . 'customizer-panel/assets/images/footer-columns/col-4-1-1-1-1.jpg',
    )
)));

$wp_customize->add_setting('total_footer_bg_url', array(
    'sanitize_callback' => 'esc_url_raw',
    'default' => get_template_directory_uri() . '/images/footer-bg.jpg',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('total_footer_bg_id', array(
    'sanitize_callback' => 'absint',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('total_footer_bg_repeat', array(
    'default' => 'repeat',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('total_footer_bg_size', array(
    'default' => 'auto',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('total_footer_bg_position', array(
    'default' => 'center-center',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('total_footer_bg_attachment', array(
    'default' => 'scroll',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('total_footer_bg_color', array(
    'default' => '#222222',
    'sanitize_callback' => 'total_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('total_footer_bg_overlay', array(
    'sanitize_callback' => 'total_sanitize_color_alpha',
    'transport' => 'postMessage'
));

// Registers example_background control
$wp_customize->add_control(new Total_Background_Image_Control($wp_customize, 'total_footer_bg', array(
    'label' => esc_html__('Footer Background', 'total'),
    'section' => 'total_footer_settings',
    'settings' => array(
        'image_url' => 'total_footer_bg_url',
        'image_id' => 'total_footer_bg_id',
        'repeat' => 'total_footer_bg_repeat',
        'size' => 'total_footer_bg_size',
        'position' => 'total_footer_bg_position',
        'attachment' => 'total_footer_bg_attachment',
        'color' => 'total_footer_bg_color',
        'overlay' => 'total_footer_bg_overlay'
    )
)));

$wp_customize->add_setting('total_enable_footer_border', array(
    'sanitize_callback' => 'total_sanitize_text',
    'default' => true
));

$wp_customize->add_control(new Total_Toggle_Control($wp_customize, 'total_enable_footer_border', array(
    'section' => 'total_footer_settings',
    'label' => esc_html__('Enable Footer Top Border', 'total')
)));

$wp_customize->add_setting('total_top_footer_heading', array(
    'sanitize_callback' => 'total_sanitize_text',
));

$wp_customize->add_control(new Total_Heading_Control($wp_customize, 'total_top_footer_heading', array(
    'section' => 'total_footer_settings',
    'label' => esc_html__('Top Footer', 'total'),
)));

$wp_customize->add_setting('total_top_footer_title_color', array(
    'default' => '#EEEEEE',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'total_top_footer_title_color', array(
    'section' => 'total_footer_settings',
    'label' => esc_html__('Footer Title Color', 'total')
)));

$wp_customize->add_setting('total_top_footer_text_color', array(
    'default' => '#EEEEEE',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'total_top_footer_text_color', array(
    'section' => 'total_footer_settings',
    'label' => esc_html__('Footer Text Color', 'total')
)));

$wp_customize->add_setting('total_top_footer_anchor_color', array(
    'default' => '#EEEEEE',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'total_top_footer_anchor_color', array(
    'section' => 'total_footer_settings',
    'label' => esc_html__('Footer Anchor Color', 'total')
)));

$wp_customize->add_setting('total_top_footer_anchor_color_hover', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'total_top_footer_anchor_color_hover', array(
    'section' => 'total_footer_settings',
    'label' => esc_html__('Footer Anchor Color (Hover)', 'total')
)));

$wp_customize->add_setting('total_bottom_footer_heading', array(
    'sanitize_callback' => 'total_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Total_Heading_Control($wp_customize, 'total_bottom_footer_heading', array(
    'section' => 'total_footer_settings',
    'label' => esc_html__('Bottom Footer', 'total'),
)));

$wp_customize->add_setting('total_bottom_footer_bg_color', array(
    'sanitize_callback' => 'total_sanitize_color_alpha',
    'default' => 'rgba(0,0,0,0.1)',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Total_Alpha_Color_Control($wp_customize, 'total_bottom_footer_bg_color', array(
    'label' => esc_html__('Footer Background', 'total'),
    'section' => 'total_footer_settings'
)));

$wp_customize->add_setting('total_bottom_footer_text_color', array(
    'default' => '#EEEEEE',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'total_bottom_footer_text_color', array(
    'section' => 'total_footer_settings',
    'label' => esc_html__('Footer Text Color', 'total')
)));

$wp_customize->add_setting('total_bottom_footer_anchor_color', array(
    'default' => '#EEEEEE',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'total_bottom_footer_anchor_color', array(
    'section' => 'total_footer_settings',
    'label' => esc_html__('Footer Anchor Color', 'total')
)));

$wp_customize->add_setting('total_bottom_footer_anchor_color_hover', array(
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'total_bottom_footer_anchor_color_hover', array(
    'section' => 'total_footer_settings',
    'label' => esc_html__('Footer Anchor Color (Hover)', 'total')
)));

$wp_customize->add_setting('total_footer_copyright', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control('total_footer_copyright', array(
    'section' => 'total_footer_settings',
    'type' => 'textarea',
    'label' => esc_html__('Copyright Text', 'total'),
    'description' => esc_html__('Custom HTMl and Shortcodes Supported', 'total'),
    'priority' => 15
));

$wp_customize->add_setting('total_footer_upgrade_text', array(
    'sanitize_callback' => 'total_sanitize_text'
));

$wp_customize->add_control(new Total_Upgrade_Info_Control($wp_customize, 'total_footer_upgrade_text', array(
    'section' => 'total_footer_settings',
    'label' => esc_html__('For more settings,', 'total'),
    'choices' => array(
        esc_html__('5 different footer styles', 'total'),
        esc_html__('Set custom footer columns and width', 'total'),
        esc_html__('Remove footer credit text', 'total'),
        esc_html__('Typography for footer heading and text', 'total'),
        esc_html__('Set footer spacing', 'total'),
    ),
    'priority' => 100,
    'active_callback' => 'total_is_upgrade_notice_active',
    'upgrade_text' => esc_html__('Upgrade to Pro', 'total'),
    'upgrade_url' => 'https://hashthemes.com/wordpress-theme/total/?utm_source=wordpress&utm_medium=total-link&utm_campaign=total-upgrade'
)));
