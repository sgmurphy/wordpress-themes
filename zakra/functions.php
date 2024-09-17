<?php
/**
 * Zakra functions and definitions.
 *
 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package zakra
 *
 * @since 1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Define constants.
 */
require get_template_directory() . '/inc/base/class-zakra-constants.php';

/**
 * Helpers functions.
 */
require ZAKRA_PARENT_INC_DIR . '/helper/utils.php';

/**
 * Base.
 */
// Generate WordPress filter hook dynamically.
require ZAKRA_PARENT_INC_DIR . '/base/class-zakra-dynamic-filter.php';

// Adds classes to appropriate places.
require ZAKRA_PARENT_INC_DIR . '/base/class-zakra-css-classes.php';

// Generate dynamic CSS from styling options.
require ZAKRA_PARENT_INC_DIR . '/base/class-zakra-dynamic-css.php';

/**
 * Core.
 */
// After setup theme.
require ZAKRA_PARENT_INC_DIR . '/core/class-zakra-after-setup-theme.php';

// Load scripts.
require ZAKRA_PARENT_INC_DIR . '/core/class-zakra-enqueue-scripts.php';

// Widget-related functionalities.
require ZAKRA_PARENT_INC_DIR . '/core/class-zakra-widgets.php';

// Header Media.
require ZAKRA_PARENT_INC_DIR . '/core/custom-header.php';

/**
 * Update migrations.
 */
require ZAKRA_PARENT_INC_DIR . '/migration/class-zakra-migration.php';

/**
 * Customizer.
 */
require ZAKRA_PARENT_INC_DIR . '/customizer/class-zakra-customizer.php';

/**
 * Deprecated.
 */
require ZAKRA_PARENT_INC_DIR . '/deprecated/deprecated-filters.php';
require ZAKRA_PARENT_INC_DIR . '/deprecated/deprecated-functions.php';
require ZAKRA_PARENT_INC_DIR . '/deprecated/deprecated-hooks.php';

/**
 * Override global builder by page setting.
 */
require ZAKRA_PARENT_INC_DIR . '/meta-boxes/builder-meta-box.php';

/**
 * Templates.
 */
require ZAKRA_PARENT_INC_DIR . '/template-tags.php';
require ZAKRA_PARENT_INC_DIR . '/builder-template-tags.php';
require ZAKRA_PARENT_INC_DIR . '/template-functions.php';

// Template hooks.
require ZAKRA_PARENT_DIR . '/template-parts/hooks/hook-functions.php';

require ZAKRA_PARENT_DIR . '/template-parts/hooks/header/header.php';
require ZAKRA_PARENT_DIR . '/template-parts/hooks/header/top-bar.php';
require ZAKRA_PARENT_DIR . '/template-parts/hooks/header/header-main.php';
require ZAKRA_PARENT_DIR . '/template-parts/hooks/header/primary-menu.php';
require ZAKRA_PARENT_DIR . '/template-parts/hooks/header/header-actions.php';
require ZAKRA_PARENT_DIR . '/template-parts/hooks/header/header-buttons.php';
require ZAKRA_PARENT_DIR . '/template-parts/hooks/header/transparent-header.php';
require ZAKRA_PARENT_DIR . '/template-parts/hooks/header/header-media.php';

require ZAKRA_PARENT_DIR . '/template-parts/hooks/page-header/page-header.php';

require ZAKRA_PARENT_DIR . '/template-parts/hooks/content/content.php';
require ZAKRA_PARENT_DIR . '/template-parts/hooks/blog/blog.php';

require ZAKRA_PARENT_DIR . '/template-parts/hooks/footer/footer.php';

require ZAKRA_PARENT_DIR . '/template-parts/hooks/footer/scroll-to-top.php';
require ZAKRA_PARENT_DIR . '/template-parts/hooks/footer/footer-widgets.php';
require ZAKRA_PARENT_DIR . '/template-parts/hooks/footer/footer-bar.php';

require ZAKRA_PARENT_INC_DIR . '/hooks/hooks.php';
require ZAKRA_PARENT_INC_DIR . '/hooks/content.php';
require ZAKRA_PARENT_INC_DIR . '/hooks/customize.php';

require ZAKRA_PARENT_DIR . '/template-parts/hooks/builder.php';

/**
 * Plugins compatibility.
 */
// AMP.
if ( defined( 'AMP__VERSION' ) && ( ! version_compare( AMP__VERSION, '1.0.0', '<' ) ) ) {

	require_once ZAKRA_PARENT_INC_DIR . '/compatibility/amp/class-zakra-amp.php';
}

// Wishlist.
if ( class_exists( 'woocommerce' ) && defined( 'YITH_WCWL' ) ) {

	require ZAKRA_PARENT_INC_DIR . '/compatibility/yith/yith-wishlist.php';
}

// QuickView.
if ( class_exists( 'woocommerce' ) && defined( 'YITH_WCQV' ) ) {

	require ZAKRA_PARENT_INC_DIR . '/compatibility/yith/yith-quickview.php';
}

if ( defined( 'JETPACK__VERSION' ) ) {

	require ZAKRA_PARENT_INC_DIR . '/compatibility/jetpack/class-zakra-jetpack.php';
}

// WooCommerce.
if ( class_exists( 'WooCommerce' ) ) {

	require ZAKRA_PARENT_INC_DIR . '/compatibility/woocommerce/class-zakra-woocommerce.php';
}

// Elementor Pro.
require_once ZAKRA_PARENT_INC_DIR . '/compatibility/elementor/class-zakra-elementor-pro.php';

// Elementor Header Footer.
require_once ZAKRA_PARENT_INC_DIR . '/compatibility/elementor-header-footer/class-zakra-elementor-header-footer.php';

// Breadcrumbs class.
require_once ZAKRA_PARENT_INC_DIR . '/class-breadcrumb-trail.php';

// Svg icon class.
require_once ZAKRA_PARENT_INC_DIR . '/class-zakra-svg-icons.php';

// Load customind.
require_once ZAKRA_PARENT_INC_DIR . '/customizer/customind/init.php';

global $customind;
$customind->set_css_var_prefix( 'zakra' );

require ZAKRA_PARENT_INC_DIR . '/meta-boxes/class-zakra-meta-box.php';

// Admin screen.
if ( is_admin() ) {

	// Meta boxes.
	require ZAKRA_PARENT_INC_DIR . '/meta-boxes/class-zakra-meta-box-page-settings.php';

	// Theme options page.
	require ZAKRA_PARENT_INC_DIR . '/admin/class-zakra-admin.php';
	require ZAKRA_PARENT_INC_DIR . '/admin/class-zakra-notice.php';
	require ZAKRA_PARENT_INC_DIR . '/admin/class-zakra-welcome-notice.php';
	require ZAKRA_PARENT_INC_DIR . '/admin/class-zakra-upgrade-notice.php';
	require ZAKRA_PARENT_INC_DIR . '/admin/class-zakra-dashboard.php';
	require ZAKRA_PARENT_INC_DIR . '/admin/class-zakra-theme-review-notice.php';
	require ZAKRA_PARENT_INC_DIR . '/admin/class-zakra-changelog-parser.php';
	require ZAKRA_PARENT_INC_DIR . '/admin/class-zakra-demo-import-migration-notice.php';
	require ZAKRA_PARENT_INC_DIR . '/admin/class-zakra-pro-minimum-version-notice.php';
}

// Set default content width.
if ( ! isset( $content_width ) ) {

	$content_width = 812;
}

// Calculate $content_width value according to layout options from Customizer and meta boxes.
function zakra_content_width_rdr() {

	global $content_width;

	// Get layout type.
	$layout_type     = zakra_get_layout_type();
	$layouts_sidebar = [ 'left', 'right' ];

	/**
	 * Calculate content width.
	 */

	// Get required values from Customizer.
	$container_width = get_theme_mod(
		'zakra_container_width',
		[
			'size' => 1170,
			'unit' => 'px',
		]
	);
	$sidebar_width   = get_theme_mod(
		'zakra_sidebar_width',
		[
			'size' => 30,
			'unit' => '%',
		]
	);

	$container_width = isset( $container_width['size'] ) ? (int) $container_width['size'] : 1160;
	$content_width   = isset( $sidebar_width['size'] ) ? ( 100 - (float) $sidebar_width['size'] ) : 70;

	// Calculate Padding to reduce.
	$container_style = get_theme_mod( 'zakra_content_area_layout', 'bordered' );
	$content_padding = ( 'boxed' === $container_style ) ? 120 : 60;

	if ( in_array( $layout_type, $layouts_sidebar, true ) ) {

		$content_width = ( ( $container_width * $content_width ) / 100 ) - $content_padding;
	} else {

		$content_width = $container_width - $content_padding;
	}
}

add_action( 'template_redirect', 'zakra_content_width_rdr' );

add_filter( 'themegrill_demo_importer_show_main_menu', '__return_false' );

add_filter( 'themegrill_demo_importer_routes', 'zakra_demo_importer_routes', 10, 1 );

function zakra_demo_importer_routes( $routes ) {
	// Remove the existing routes from the TDI
	unset( $routes['themes.php?page=demo-importer&demo=:slug'] );
	unset( $routes['themes.php?page=demo-importer&browse=:sort'] );
	unset( $routes['themes.php?page=demo-importer&search=:query'] );
	unset( $routes['themes.php?page=demo-importer'] );

	// Add the new routes
	$routes['themes.php?page=zakra&tab=starter-templates&demo=:slug']    = 'preview';
	$routes['themes.php?page=zakra&tab=starter-templates&browse=:sort']  = 'sort';
	$routes['themes.php?page=zakra&tab=starter-templates&search=:query'] = 'search';
	$routes['themes.php?page=zakra&tab=starter-templates']               = 'sort';

	return $routes;
}

add_filter( 'themegrill_demo_importer_baseURL', 'zakra_demo_importer_baseURL', 10, 1 );

function zakra_demo_importer_baseURL( $base_url ) {
	// Update the base URL in the demo importer.
	$base_url = 'themes.php?page=zakra&tab=starter-templates';

	return $base_url;
}

add_filter( 'themegrill_demo_importer_redirect_link', 'zakra_demo_importer_redirect_url' );

function zakra_demo_importer_redirect_url( $redirect_url ) {
	// Update the base URL in the demo importer.
	$redirect_url = admin_url( 'themes.php?page=zakra&tab=starter-templates&browse=all' );

	return $redirect_url;
}

add_action( 'wp_ajax_install_plugin', 'zakra_plugin_action_callback' );
add_action( 'wp_ajax_activate_plugin', 'zakra_plugin_action_callback' );

function zakra_plugin_action_callback() {

	if ( ! isset( $_POST['security'] ) || ! wp_verify_nonce( $_POST['security'], 'zakra_demo_import_nonce' ) ) {
		wp_send_json_error( [ 'message' => 'Security check failed.' ] );
	}
	if ( ! current_user_can( 'install_plugins' ) ) {
		wp_send_json_error( [ 'message' => 'You are not allowed to perform this action.' ] );
	}

	$plugin      = sanitize_text_field( $_POST['plugin'] );
	$plugin_slug = sanitize_text_field( $_POST['slug'] );

	if ( zakra_is_plugin_installed( $plugin ) ) {
		if ( is_plugin_active( $plugin ) ) {
			wp_send_json_success( [ 'message' => 'Plugin is already activated.' ] );
		} else {
			// Activate the plugin
			$result = activate_plugin( $plugin );

			if ( is_wp_error( $result ) ) {
				wp_send_json_error( [ 'message' => 'Error activating the plugin.' ] );
			} else {
				wp_send_json_success( [ 'message' => 'Plugin activated successfully!' ] );
			}
		}
	} else {
		// Install and activate the plugin
		include_once ABSPATH . 'wp-admin/includes/plugin-install.php';
		include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
		$plugin_info = plugins_api( 'plugin_information', [ 'slug' => $plugin_slug ] );
		$upgrader    = new Plugin_Upgrader( new WP_Ajax_Upgrader_Skin() );
		$result      = $upgrader->install( $plugin_info->download_link );

		if ( is_wp_error( $result ) ) {
			wp_send_json_error( [ 'message' => 'Error installing the plugin.' ] );
		}

		$result = activate_plugin( $plugin );

		if ( is_wp_error( $result ) ) {
			wp_send_json_error( [ 'message' => 'Error activating the plugin.' ] );
		} else {
			wp_send_json_success( [ 'message' => 'Plugin installed and activated successfully!' ] );
		}
	}
}

function zakra_is_plugin_installed( $plugin_path ) {
	$plugins = get_plugins();
	return isset( $plugins[ $plugin_path ] );
}

function zakra_maybe_enable_builder() {

	if ( get_option( 'zakra_builder_migration' ) ) {
		return true;
	}

	if ( get_option( 'zakra_stretched_style_transfer' ) || get_option( 'zakra_migrations' ) || get_option( 'zakra_customizer_migration_v3' ) ) {
		return false;
	}

	return true;
}
