<?php
/**
 * Override default customizer options.
 *
 * @package zakra
 */

/**
 * Override controls.
 */
// Outside container > background control.
$wp_customize->get_control( 'background_color' )->section  = 'zakra_container';
$wp_customize->get_control( 'background_color' )->priority = 70;
$wp_customize->get_control( 'background_color' )->type     = 'zakra-color';

$wp_customize->get_control( 'background_image' )->section  = 'zakra_container';
$wp_customize->get_control( 'background_image' )->priority = 75;

$wp_customize->get_control( 'background_preset' )->section  = 'zakra_container';
$wp_customize->get_control( 'background_preset' )->priority = 80;

$wp_customize->get_control( 'background_position' )->section  = 'zakra_container';
$wp_customize->get_control( 'background_position' )->priority = 85;

$wp_customize->get_control( 'background_size' )->section  = 'zakra_container';
$wp_customize->get_control( 'background_size' )->priority = 90;

$wp_customize->get_control( 'background_repeat' )->section  = 'zakra_container';
$wp_customize->get_control( 'background_repeat' )->priority = 95;

$wp_customize->get_control( 'background_attachment' )->section  = 'zakra_container';
$wp_customize->get_control( 'background_attachment' )->priority = 100;

// Site Identity.
$wp_customize->get_control( 'custom_logo' )->priority         = 6;
$wp_customize->get_control( 'site_icon' )->priority           = 12;
$wp_customize->get_control( 'blogname' )->priority            = 14;
$wp_customize->get_control( 'blogdescription' )->priority     = 16;

// Settings.
$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

$wp_customize->remove_control( 'display_header_text' );
$wp_customize->remove_control( 'header_textcolor' );

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'blogname',
		array(
			'selector'        => '.site-title a',
			'render_callback' => 'Zakra_Customizer_Partials::customize_partial_blogname',
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'blogdescription',
		array(
			'selector'        => '.site-description',
			'render_callback' => 'Zakra_Customizer_Partials::customize_partial_blogdescription',
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'document_title',
		array(
			'selector'        => 'head > title',
			'settings'        => array( 'blogname', 'blogdescription' ),
			'render_callback' => 'wp_get_document_title',
		)
	);
}

// Header Media.
$wp_customize->get_control( 'header_image' )->priority       = 6;
$wp_customize->get_control( 'header_video' )->priority       = 7;
$wp_customize->get_control( 'external_header_video' )->label = esc_html__( 'Header Video URL', 'zakra' );

// Modify WooCommerce default section priorities.
if ( class_exists( 'WooCommerce' ) ) {
	$wp_customize->get_panel( 'woocommerce' )->priority = 36;
}
