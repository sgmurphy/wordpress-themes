<?php
/**
 * Zakra main admin class.
 *
 * @package Zakra
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class Zakra_Admin
 */
class Zakra_Admin {

	/**
	 * Zakra_Admin constructor.
	 */
	public function __construct() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}

	/**
	 * Localize array for import button AJAX request.
	 */
	public function enqueue_scripts() {
		wp_enqueue_style( 'zakra-admin-style', get_template_directory_uri() . '/inc/admin/css/admin.css', array(), ZAKRA_THEME_VERSION );

		wp_enqueue_script( 'zakra-plugin-install-helper', ZAKRA_PARENT_INC_URI . '/admin/js/admin.js', array( 'jquery' ), ZAKRA_THEME_VERSION, true );

		$welcome_data = array(
			'uri'       => esc_url( admin_url( '/themes.php?page=zakra&tab=starter-templates' ) ),
			'btn_text'  => esc_html__( 'Processing...', 'zakra' ),
			'nonce'     => wp_create_nonce( 'zakra_demo_import_nonce' ),
			'admin_url' => esc_url( admin_url() ),
			'ajaxurl'   => admin_url( 'admin-ajax.php' ), // Include this line for using admin-ajax.php
		);

		wp_localize_script( 'zakra-plugin-install-helper', 'zakraRedirectDemoPage', $welcome_data );
	}
}

new Zakra_Admin();
