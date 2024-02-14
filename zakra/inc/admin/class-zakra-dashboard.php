<?php
/**
 * Dashboard page class.
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Zakra_Dashboard class.
 */
class Zakra_Dashboard {

	/**
	 * Holds single instance of this class.
	 *
	 * @var Zakra_Dashboard
	 */
	private static $instance = null;

	/**
	 * Holds demo packages.
	 *
	 * @var array|object
	 */
	public $demo_packages;

	/**
	 * Theme.
	 *
	 * @var WP_Theme|null
	 */
	public $theme = null;

	/**
	 * Tabs.
	 *
	 * @var array
	 */
	public $tabs = array();

	/**
	 * Active tab.
	 *
	 * @var string
	 */
	public $active_tab = '';

	/**
	 * Instance.
	 *
	 * @return Zakra_Dashboard
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Constructor.
	 */
	private function __construct() {
		$this->setup_hooks();
	}
	/**
	 * Setup hooks.
	 *
	 * @return void
	 */
	private function setup_hooks() {
		add_action( 'admin_menu', array( $this, 'create_menu' ) );
		add_action( 'in_admin_header', array( $this, 'hide_admin_notices' ) );
		add_action( 'zakra_dashboard_tab_dashboard_content', array( $this, 'render_dashboard_tab' ) );
		add_action( 'zakra_dashboard_tab_starter-templates_content', array( $this, 'render_starter_templates_tab' ) );
		add_action( 'zakra_dashboard_tab_products_content', array( $this, 'render_products_tab' ) );
		add_action( 'zakra_dashboard_tab_free-vs-pro_content', array( $this, 'render_free_vs_pro_tab' ) );
		add_action( 'zakra_dashboard_tab_help_content', array( $this, 'render_help_tab' ) );
	}

	/**
	 * Create dashboard menu.
	 *
	 * @return void
	 */
	public function create_menu() {
		$this->theme = is_child_theme() ? wp_get_theme()->parent() : wp_get_theme();

		add_theme_page(
			$this->get_menu_name(),
			$this->get_menu_name(),
			$this->get_menu_capability(),
			$this->get_menu_slug(),
			array(
				$this,
				'render_dashboard_page',
			)
		);
	}

	/**
	 * Get menu capability.
	 *
	 * @return string
	 */
	public function get_menu_capability() {
		return apply_filters( 'zakra_dashboard_menu_capability', 'edit_theme_options' );
	}

	/**
	 * Get menu name.
	 *
	 * @return string
	 */
	public function get_menu_name() {
		return apply_filters( 'zakra_dashboard_menu_title', 'Zakra' );
	}

	/**
	 * Get menu slug.
	 *
	 * @return string
	 */
	public function get_menu_slug() {
		return apply_filters( 'zakra_dashboard_menu_slug', 'zakra' );
	}

	/**
	 * Hide admin notices from BlockArt admin pages.
	 */
	public function hide_admin_notices() {
		// Bail if we're not on a Zakra screen or page.
		if ( empty( $_REQUEST['page'] ) || false === strpos( sanitize_text_field( wp_unslash( $_REQUEST['page'] ) ), 'zakra' ) ) { // phpcs:ignore WordPress.Security.NonceVerification
			return;
		}

		global $wp_filter;
		$ignore_notices = apply_filters( 'zakra_ignore_hide_admin_notices', array() );

		foreach ( array( 'user_admin_notices', 'admin_notices', 'all_admin_notices' ) as $wp_notice ) {
			if ( empty( $wp_filter[ $wp_notice ] ) ) {
				continue;
			}

			$hook_callbacks = $wp_filter[ $wp_notice ]->callbacks;

			if ( empty( $hook_callbacks ) || ! is_array( $hook_callbacks ) ) {
				continue;
			}

			foreach ( $hook_callbacks as $priority => $hooks ) {
				foreach ( $hooks as $name => $callback ) {
					if ( ! empty( $name ) && in_array( $name, $ignore_notices, true ) ) {
						continue;
					}
					if (
						! empty( $callback['function'] ) &&
						! is_a( $callback['function'], '\Closure' ) &&
						isset( $callback['function'][0], $callback['function'][1] ) &&
						is_object( $callback['function'][0] ) &&
						in_array( $callback['function'][1], $ignore_notices, true )
					) {
						continue;
					}
					unset( $wp_filter[ $wp_notice ]->callbacks[ $priority ][ $name ] );
				}
			}
		}
	}

	/**
	 * Dashboard page.
	 *
	 * @return void
	 */
	public function render_dashboard_page() {
		// Add default tabs.
		$this->add_default_tabs();

		/**
		 * Runs before the dashboard page.
		 *
		 * @param Zakra_Dashboard $this Dashboard page.
		 */
		do_action( 'zakra_dashboard_page_init', $this );

		// Include main layout view file.
		include __DIR__ . '/views/layout.php';
	}

	/**
	 * Get active tab.
	 *
	 * @return string
	 */
	public function get_active_tab() {
		$active_tab = isset( $_GET['tab'] ) ? sanitize_text_field( wp_unslash( $_GET['tab'] ) ) : 'dashboard'; // phpcs:ignore WordPress.Security.NonceVerification
		$active_tab = apply_filters( 'zakra_dashboard_active_tab', $active_tab );

		if ( in_array( $this->active_tab, array_column( $this->tabs, 'id' ), true ) ) {
			$active_tab = $this->tabs[0]['id'] ?? '';
		}
		return $active_tab;
	}

	/**
	 * Add tab.
	 *
	 * @param array $assoc_args
	 * @return array
	 */
	public function add_tab( $assoc_args ) {
		$default_assoc_args = array(
			'name'  => '',
			'id'    => '',
			'class' => '',
		);
		$assoc_args         = wp_parse_args( $assoc_args, $default_assoc_args );
		$existing_tab       = array_search( $assoc_args['id'], array_column( $this->tabs, 'id' ), true );

		if ( false !== $existing_tab ) {
			$this->tabs[ $existing_tab ] = $assoc_args;
		} else {
			$this->tabs[] = $assoc_args;
		}

		return $this->tabs;
	}

	/**
	 * Remove tab.
	 *
	 * @param string $id
	 * @return array
	 */
	public function remove_tab( $id ) {
		$this->tabs = array_filter(
			$this->tabs,
			function( $tab ) use ( $id ) {
				return $tab['id'] !== $id;
			}
		);
		return $this->tabs;
	}

	/**
	 * Get tabs.
	 *
	 * @return array
	 */
	public function get_tabs() {
		return apply_filters( 'zakra_dashboard_tabs', $this->tabs );
	}

	/**
	 * Add default tabs.
	 *
	 * @return void
	 */
	private function add_default_tabs() {
		$this->add_tab(
			array(
				'id'   => 'dashboard',
				'name' => esc_html__( 'Dashboard', 'zakra' ),
			)
		);
		$this->add_tab(
			array(
				'id'   => 'starter-templates',
				'name' => esc_html__( 'Starter Templates', 'zakra' ),
			)
		);
		$this->add_tab(
			array(
				'id'   => 'products',
				'name' => esc_html__( 'Products', 'zakra' ),
			)
		);
		$this->add_tab(
			array(
				'id'   => 'free-vs-pro',
				'name' => esc_html__( 'Free Vs Pro', 'zakra' ),
			)
		);
		$this->add_tab(
			array(
				'id'   => 'help',
				'name' => esc_html__( 'Help', 'zakra' ),
			)
		);
	}

	/**
	 * Render dashboard tab.
	 *
	 * @return void
	 */
	public function render_dashboard_tab() {
		include __DIR__ . '/views/dashboard.php';
	}

	/**
	 * Render starter templates tab.
	 *
	 * @return void
	 */
	public function render_starter_templates_tab() {
		if ( is_plugin_active( 'themegrill-demo-importer/themegrill-demo-importer.php' ) ) {
			wp_enqueue_style( 'tg-demo-importer' );
			wp_enqueue_script( 'tg-demo-importer' );
			$this->demo_packages = get_transient( 'themegrill_demo_importer_packages' );
			include plugin_dir_path( TGDM_PLUGIN_FILE ) . '/includes/admin/views/html-admin-page-importer.php';
			return;
		}

		include __DIR__ . '/views/starter-templates.php';
	}

	/**
	 * Render products tab.
	 *
	 * @return void
	 */
	public function render_products_tab() {
		include __DIR__ . '/views/products.php';
	}

	/**
	 * Render free vs pro tab.
	 *
	 * @return void
	 */
	public function render_free_vs_pro_tab() {
		include __DIR__ . '/views/free-vs-pro.php';
	}

	/**
	 * Render help tab.
	 *
	 * @return void
	 */
	public function render_help_tab() {
		include __DIR__ . '/views/help.php';
	}

	/**
	 * Dashboard quick settings items.
	 *
	 * @return array
	 */
	public function get_dashboard_quick_settings() {
		$settings_items = array(
			array(
				'title' => esc_html__( 'Site Identity', 'zakra' ),
				'type'  => 'section',
				'id'    => 'title_tagline',
				'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
						  <path d="M17 22H5a2.982 2.982 0 0 1-2.121-.879A2.978 2.978 0 0 1 2 19v-4c0-.801.312-1.555.879-2.121a2.98 2.98 0 0 1 2.046-.878l-.288-.288a2.98 2.98 0 0 1-.879-2.121c0-.801.312-1.554.879-2.121l2.828-2.828c1.133-1.133 3.109-1.133 4.242 0l.293.294a2.984 2.984 0 0 1 .878-2.058A2.982 2.982 0 0 1 15 2h4c.801 0 1.555.312 2.121.879.567.566.879 1.32.879 2.121v12c0 1.335-.521 2.591-1.465 3.535S18.335 22 17 22zm0-2c.789 0 1.563-.32 2.121-.879S20 17.789 20 17V5a1.003 1.003 0 0 0-1-1h-4a1.003 1.003 0 0 0-1 1v12c0 .789.32 1.563.879 2.121S16.211 20 17 20zM5 14a1.003 1.003 0 0 0-1 1v4a1.003 1.003 0 0 0 1 1h7.924l-6-6H5zm4.586-8.235a.996.996 0 0 0-.707.292L6.051 8.885a.993.993 0 0 0-.293.707c0 .263.107.521.293.707L12 16.248V7.764l-1.707-1.707a.996.996 0 0 0-.707-.292zM17 18.01a1.003 1.003 0 0 1 0-2.005c.553 0 1 .442 1 .995v.01a1 1 0 0 1-1 1z"/>
						</svg>',
			),
			array(
				'title' => esc_html__( 'Main Header', 'zakra' ),
				'type'  => 'section',
				'id'    => 'zakra_main_header',
				'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
				  <path fill-rule="evenodd" d="M3.763 3.268A1.75 1.75 0 0 1 5 2.755h14a1.75 1.75 0 0 1 1.75 1.75v5a.75.75 0 0 1-.75.75H4a.75.75 0 0 1-.75-.75v-5c0-.464.184-.91.513-1.237ZM5 4.255a.25.25 0 0 0-.25.25v4.25h14.5v-4.25a.25.25 0 0 0-.25-.25H5Zm-1 9.49a.75.75 0 0 1 .75.75v.01a.75.75 0 0 1-1.5 0v-.01a.75.75 0 0 1 .75-.75Zm16 0a.75.75 0 0 1 .75.75v.01a.75.75 0 0 1-1.5 0v-.01a.75.75 0 0 1 .75-.75Zm-16 5a.75.75 0 0 1 .75.75v.01a.75.75 0 0 1-1.5 0v-.01a.75.75 0 0 1 .75-.75Zm5 0a.75.75 0 0 1 .75.75v.01a.75.75 0 0 1-1.5 0v-.01a.75.75 0 0 1 .75-.75Zm6 0a.75.75 0 0 1 .75.75v.01a.75.75 0 0 1-1.5 0v-.01a.75.75 0 0 1 .75-.75Zm5 0a.75.75 0 0 1 .75.75v.01a.75.75 0 0 1-1.5 0v-.01a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd"/>
				</svg>',
			),
			array(
				'title' => esc_html__( 'Footer Column', 'zakra' ),
				'type'  => 'section',
				'id'    => 'zakra_footer_column',
				'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
							  <path fill-rule="evenodd" d="M4 3.25a.75.75 0 0 1 .75.75v.01a.75.75 0 0 1-1.5 0V4A.75.75 0 0 1 4 3.25Zm5 0a.75.75 0 0 1 .75.75v.01a.75.75 0 0 1-1.5 0V4A.75.75 0 0 1 9 3.25Zm6 0a.75.75 0 0 1 .75.75v.01a.75.75 0 0 1-1.5 0V4a.75.75 0 0 1 .75-.75Zm5 0a.75.75 0 0 1 .75.75v.01a.75.75 0 0 1-1.5 0V4a.75.75 0 0 1 .75-.75Zm-16 5a.75.75 0 0 1 .75.75v.01a.75.75 0 0 1-1.5 0V9A.75.75 0 0 1 4 8.25Zm16 0a.75.75 0 0 1 .75.75v.01a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75ZM3.25 14a.75.75 0 0 1 .75-.75h16a.75.75 0 0 1 .75.75v5A1.75 1.75 0 0 1 19 20.75H5A1.75 1.75 0 0 1 3.25 19v-5Zm1.5.75V19a.25.25 0 0 0 .25.25h14a.25.25 0 0 0 .25-.25v-4.25H4.75Z" clip-rule="evenodd"/>
							</svg>',
			),
			array(
				'title' => esc_html__( 'Global Colors', 'zakra' ),
				'type'  => 'section',
				'id'    => 'zakra_colors',
				'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
				  <path fill-rule="evenodd" d="M12 3.75a8.25 8.25 0 1 0 0 16.5c.023 0 .046.001.068.003a.55.55 0 0 0 .468-.905 2.75 2.75 0 0 1 1.47-5.098H16.5c1.02 0 1.985-.362 2.684-.983.695-.618 1.066-1.436 1.066-2.267 0-3.923-3.609-7.25-8.25-7.25ZM5.106 5.106A9.75 9.75 0 0 1 12 2.25c5.299 0 9.75 3.837 9.75 8.75 0 1.29-.577 2.507-1.57 3.389-.99.879-2.314 1.361-3.68 1.361h-2.512a1.25 1.25 0 0 0-.625 2.344.745.745 0 0 1 .146.105 2.05 2.05 0 0 1-1.54 3.551A9.75 9.75 0 0 1 5.106 5.106Zm6.157 1.157a1.75 1.75 0 1 1 2.474 2.474 1.75 1.75 0 0 1-2.474-2.474Zm1.237.987a.25.25 0 1 0 0 .5.25.25 0 0 0 0-.5ZM7.263 9.263a1.75 1.75 0 1 1 2.474 2.474 1.75 1.75 0 0 1-2.474-2.474Zm1.237.987a.25.25 0 1 0 0 .5.25.25 0 0 0 0-.5Zm6.763-.987a1.75 1.75 0 1 1 2.474 2.474 1.75 1.75 0 0 1-2.474-2.474Zm1.237.987a.25.25 0 1 0 0 .5.25.25 0 0 0 0-.5Z" clip-rule="evenodd"/>
				</svg>',
			),
			array(
				'title' => esc_html__( 'Sidebar', 'zakra' ),
				'type'  => 'section',
				'id'    => 'zakra_sidebar_layout',
				'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
						  <path fill-rule="evenodd" d="M13.992 3.752a.75.75 0 0 1 .75-.75h.01a.75.75 0 0 1 0 1.5h-.01a.75.75 0 0 1-.75-.75Zm5 0a.75.75 0 0 1 .75-.75h.011a.75.75 0 0 1 0 1.5h-.011a.75.75 0 0 1-.75-.75ZM3.515 3.516a1.75 1.75 0 0 1 1.237-.513h5a.75.75 0 0 1 .75.75v16a.75.75 0 0 1-.75.75h-5a1.75 1.75 0 0 1-1.75-1.75v-14c0-.464.184-.91.513-1.237Zm1.237.987a.25.25 0 0 0-.25.25v14a.25.25 0 0 0 .25.25h4.25v-14.5h-4.25Zm14.24 4.249a.75.75 0 0 1 .75-.75h.011a.75.75 0 0 1 0 1.5h-.011a.75.75 0 0 1-.75-.75Zm0 6a.75.75 0 0 1 .75-.75h.011a.75.75 0 0 1 0 1.5h-.011a.75.75 0 0 1-.75-.75Zm-5 5.001a.75.75 0 0 1 .75-.75h.01a.75.75 0 0 1 0 1.5h-.01a.75.75 0 0 1-.75-.75Zm5 0a.75.75 0 0 1 .75-.75h.011a.75.75 0 0 1 0 1.5h-.011a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd"/>
						</svg>',
			),
			array(
				'title' => esc_html__( 'Blog', 'zakra' ),
				'type'  => 'section',
				'id'    => 'zakra_blog',
				'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
							  <path fill-rule="evenodd" d="M5 6.25A1.25 1.25 0 0 0 3.75 7.5v.75H4A1.75 1.75 0 1 1 2.25 10V7.5A2.75 2.75 0 0 1 5 4.75a.75.75 0 0 1 0 1.5Zm-1.25 3.5V10A.25.25 0 1 0 4 9.75h-.25ZM11 6.25A1.25 1.25 0 0 0 9.75 7.5v.75H10A1.75 1.75 0 1 1 8.25 10V7.5A2.75 2.75 0 0 1 11 4.75a.75.75 0 0 1 0 1.5Zm-1.25 3.5V10a.25.25 0 1 0 .25-.25h-.25ZM14.25 7a.75.75 0 0 1 .75-.75h6a.75.75 0 0 1 0 1.5h-6a.75.75 0 0 1-.75-.75Zm0 4a.75.75 0 0 1 .75-.75h6a.75.75 0 0 1 0 1.5h-6a.75.75 0 0 1-.75-.75Zm-9 4a.75.75 0 0 1 .75-.75h15a.75.75 0 0 1 0 1.5H6a.75.75 0 0 1-.75-.75Zm0 4a.75.75 0 0 1 .75-.75h15a.75.75 0 0 1 0 1.5H6a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd"/>
							</svg>',
			),
		);

		return apply_filters( 'zakra_dashboard_quick_settings', $settings_items );
	}

	/**
	 * Dashboard premium features.
	 *
	 * @return array
	 */
	public function get_dashboard_premium_features() {
		$premium_features_items = array(
			array(
				'title' => esc_html__( 'Top Bar', 'zakra' ),
				'link'  => 'https://docs.zakratheme.com/en/article/header-top-bar-overview-pro-40xyxb/',
			),
			array(
				'title' => esc_html__( 'Main Header', 'zakra' ),
				'link'  => 'https://docs.zakratheme.com/en/article/header-main-area-overview-pro-1niwud8/',
			),
			array(
				'title' => esc_html__( 'Primary Menu', 'zakra' ),
				'link'  => 'https://docs.zakratheme.com/en/article/primary-menu-overview-pro-8ezs4n/',
			),
			array(
				'title' => esc_html__( 'Blog', 'zakra' ),
				'link'  => 'https://docs.zakratheme.com/en/article/blogarchive-overview-pro-2w9ptx/',
			),
			array(
				'title' => esc_html__( 'Sticky Header', 'zakra' ),
				'link'  => 'https://docs.zakratheme.com/en/article/how-to-enable-sticky-header-for-your-site-pro-v41i7e/',
			),
			array(
				'title' => esc_html__( 'Header Transparent', 'zakra' ),
				'link'  => 'https://docs.zakratheme.com/en/article/how-to-make-the-header-transparent-pro-nxz05g/',
			),
			array(
				'title' => esc_html__( 'Footer Bar', 'zakra' ),
				'link'  => 'https://docs.zakratheme.com/en/article/footer-bottom-bar-overview-pro-783eio/',
			),
			array(
				'title' => esc_html__( 'Mobile Menu', 'zakra' ),
				'link'  => 'https://docs.zakratheme.com/en/article/mobile-menu-overview-pro-18z4iw/',
			),
			array(
				'title' => esc_html__( 'Single Post', 'zakra' ),
				'link'  => 'https://docs.zakratheme.com/en/article/how-to-add-content-on-single-posts-pro-1eocrnd/',
			),
			array(
				'title' => esc_html__( 'WooCommerce Layout', 'zakra' ),
				'link'  => 'https://docs.zakratheme.com/en/article/how-to-change-the-layout-of-woocommerce-page-pro-1uci0eh/',
			),
			array(
				'title' => esc_html__( 'Global Heading Color', 'zakra' ),
				'link'  => 'https://docs.zakratheme.com/en/article/how-to-change-the-heading-color-of-the-site-pro-1b1n3zv/',
			),
			array(
				'title' => esc_html__( 'Global Heading Typography', 'zakra' ),
				'link'  => 'https://docs.zakratheme.com/en/article/how-to-change-the-typography-of-the-site-pro-zqpave/',
			),
			// Add more items as needed
		);
		return apply_filters( 'zakra_dashboard_premium_features', $premium_features_items );
	}

	/**
	 * Get dashboard related products i.e plugins, themes.
	 *
	 * @return array
	 */
	public function get_dashboard_related_products() {
		$products = array(
			array(
				'name'        => 'Everest Forms',
				'file'        => 'everest-forms/everest-forms.php',
				'slug'        => 'everest-forms',
				'description' => 'Form Builder Plugin',
				'color'       => '#5317AA',
				'svg'         => '<svg xmlns="http://www.w3.org/2000/svg" width="41" height="40" viewBox="0 0 41 40" fill="none">
					<rect x="0.5" width="40" height="40" rx="3.63636" fill="#5317AA"/>
					<path d="M27.309 11.1045H22.9999L24.3223 13.3268H28.6186L27.309 11.1045Z"
						  fill="white"/>
					<path d="M30.0183 15.5527H25.7156L27.1025 17.7751H31.4085L30.0183 15.5527Z"
						  fill="white"/>
					<path
						d="M29.9506 26.6704H13.5493L20.4292 15.4136L23.2772 20.0002H20.4292L19.11 22.2225H27.2412L20.4292 11.2432L9.5885 28.8959H31.3408L29.9506 26.6704Z"
						fill="white"/>
				</svg>',
			),
			array(
				'name'        => 'BlockArt',
				'file'        => 'blockart-blocks/blockart.php',
				'slug'        => 'blockart-blocks',
				'description' => 'Page Builder Plugin',
				'color'       => '#2563EB',
				'svg'         => '<svg xmlns="http://www.w3.org/2000/svg" width="41" height="40" viewBox="0 0 41 40" fill="none">
					<rect x="0.5" width="40" height="40" rx="3.63636" fill="#2563EB"/>
					<path fill-rule="evenodd" clip-rule="evenodd"
						  d="M8.5 31.2027H32.5V8.5H8.5V31.2027ZM31.2027 29.9054H9.79728V9.7973H31.2027V29.9054ZM20.7109 11.7432L22.3204 17.1421L19.094 17.1563L20.7109 11.7432ZM18.0383 20.7249H23.3909L24.3433 25.5563L24.4319 27.3107H16.8496L16.9161 25.5351L18.0383 20.7249Z"
						  fill="white"/>
				</svg>',
			),
		);
		return apply_filters( 'zakra_dashboard_related_products', $products );
	}
}

Zakra_Dashboard::instance();
