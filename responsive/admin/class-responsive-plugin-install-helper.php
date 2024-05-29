<?php
/**
 * Plugin install helper.
 *
 * @package Responsive
 * @since Responsive 1.1.31
 */

/**
 * Class Responsive_Plugin_Install_Helper
 */
class Responsive_Plugin_Install_Helper {
	/**
	 * Instance of class.
	 *
	 * @var bool $instance instance variable.
	 */
	private static $instance;


	/**
	 * Check if instance already exists.
	 *
	 * @return Responsive_Plugin_Install_Helper
	 */
	public static function instance() {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Responsive_Plugin_Install_Helper ) ) {
			self::$instance = new Responsive_Plugin_Install_Helper();
		}

		return self::$instance;
	}

	/**
	 * Get plugin path based on plugin slug.
	 *
	 * @param string $slug Plugin slug.
	 *
	 * @return string
	 */
	public static function get_plugin_path( $slug ) {
		switch ( $slug ) {
			case 'wplegalpages':
				return $slug . '/wplegalpages.php';
			case 'gdpr-cookie-consent':
				return $slug . '/gdpr-cookie-consent.php';
			default:
				return $slug . '/' . $slug . '.php';
		}
	}

	/**
	 * Generate action button html.
	 *
	 * @param string $slug plugin slug.
	 * @param array  $settings settings.
	 *
	 * @return string
	 */
	public function get_button_html( $slug, $settings = array() ) {
		$button    = '';
		$redirect  = admin_url( 'admin.php?page=responsive_add_ons' );
		$reviewurl = 'https://wordpress.org/support/plugin/responsive-add-ons/reviews/';
		$state     = $this->check_plugin_state( $slug );
		if ( empty( $slug ) ) {
			return '';
		}

		$additional = '';

		if ( 'rateus' === $state ) {
			$additional = ' action_button active';
		}

		$button .= '<div class="plugin-card-' . esc_attr( $slug ) . esc_attr( $additional ) . '" style="padding: 8px 0 5px;">';

		$plugin_link_suffix = self::get_plugin_path( $slug );

		$nonce = add_query_arg(
			array(
				'action'        => 'activate',
				'plugin'        => rawurlencode( $plugin_link_suffix ),
				'plugin_status' => 'all',
				'paged'         => '1',
				'_wpnonce'      => wp_create_nonce( 'activate-plugin_' . $plugin_link_suffix ),
			),
			network_admin_url( 'plugins.php' )
		);
		switch ( $state ) {
			case 'install':
				$button .= '<a data-redirect="' . esc_url( $redirect ) . '" data-slug="' . esc_attr( $slug ) . '" class="install-now responsive-install-plugin button  " href="' . esc_url( $nonce ) . '" data-name="' . esc_attr( $slug ) . '" aria-label="Install ' . esc_attr( $slug ) . '">' . __( 'Install and activate &raquo;', 'responsive' ) . '</a>';
				break;

			case 'activate':
				$button .= '<a  data-redirect="' . esc_url( $redirect ) . '" data-slug="' . esc_attr( $slug ) . '" class="activate-now button button-primary" href="' . esc_url( $nonce ) . '" aria-label="Activate ' . esc_attr( $slug ) . '">' . esc_html__( 'Activate', 'responsive' ) . '</a>';
				break;

			case 'rateus':
				$button .= '<a  data-redirect="' . esc_url( $redirect ) . '" data-slug="' . esc_attr( $slug ) . '" class="rateus-now button" href="' . esc_url( $reviewurl ) . '" target="_blank" data-name="' . esc_attr( $slug ) . '" aria-label="Rate Us ' . esc_attr( $slug ) . '">' . __( 'Rate  us ★★★★★', 'responsive' ) . ' </a> ';
				break;

			case 'enable_cpt':
				$url     = admin_url( 'admin . php ? page = jetpack// /settings' );
				$button .= '<a  data-redirect="' . esc_url( $redirect ) . '" class="button" href="' . esc_url( $url ) . '">' . esc_html__( 'Activate', 'responsive' ) . ' ' . esc_html__( 'Jetpack Portfolio', 'responsive' ) . '</a>';
				break;
		} // End switch.
		$button .= '</div>';
		return $button;
	}

	/**
	 * Generates button html which is responsible to install & activate plugin.
	 *
	 * @param string $slug plugin slug.
	 * @param string $identifier Unique ID for button.
	 * @param string $redirect_to_page slug of page to redirect.
	 * @param string $button_text button text.
	 * @since 4.8.4
	 *
	 * @return string
	 */
	public function responsive_install_plugin_button( $slug, $identifier, $redirect_to_page, $button_text = 'Install' ) {
		$button   = '';
		$redirect = admin_url( 'admin.php?page=' . $redirect_to_page );
		$state    = $this->check_plugin_installed_activated( $slug );
		if ( empty( $slug ) ) {
			return '';
		}
		$button .= '<div class="plugin-card-' . esc_attr( $slug ) . '" style="padding: 8px 0 5px;">';

		$plugin_link_suffix = self::get_plugin_path( $slug, $button_text );

		$nonce = add_query_arg(
			array(
				'action'        => 'activate',
				'plugin'        => rawurlencode( $plugin_link_suffix ),
				'plugin_status' => 'all',
				'paged'         => '1',
				'_wpnonce'      => wp_create_nonce( 'activate-plugin_' . $plugin_link_suffix ),
			),
			network_admin_url( 'plugins.php' )
		);
		switch ( $state ) {
			case 'install':
				$button .= '<a id="responsive-theme-' . esc_attr( $identifier ) . '" data-redirect="' . esc_url( $redirect ) . '" data-slug="' . esc_attr( $slug ) . '" class="responsive-theme-install-plugin install-now button  " href="' . esc_url( $nonce ) . '" data-name="' . esc_attr( $slug ) . '" aria-label="Install ' . esc_attr( $slug ) . '">' . esc_html( $button_text ) . '</a>';
				break;

			case 'activate':
				$button .= '<a  data-redirect="' . esc_url( $redirect ) . '" data-slug="' . esc_attr( $slug ) . '" class="responsive-theme-activate-plugin activate-now button button-primary" href="' . esc_url( $nonce ) . '" aria-label="Activate ' . esc_attr( $slug ) . '">' . esc_html__( 'Activate', 'responsive' ) . '</a>';
				break;

			case 'activated':
				$button .= '<button class="responsive-plugin-activated-button-disabled button" aria-label="Activated ' . esc_attr( $slug ) . '">' . esc_html__( 'Activated', 'responsive' ) . '</button>';
				break;
		} // End switch.
		$button .= '</div>';
		return $button;
	}

	/**
	 * Check if plugin is installed and activated.
	 *
	 * @param string $slug plugin slug.
	 *
	 * @return bool
	 */
	public function check_plugin_installed_activated( $slug ) {
		$plugin_link_suffix = self::get_plugin_path( $slug );

		if ( file_exists( ABSPATH . 'wp-content/plugins/' . $plugin_link_suffix ) ) {
			$needs = is_plugin_active( $plugin_link_suffix ) ? 'activated' : 'activate';
			return $needs;
		} else {
			return 'install';
		}
	}

	/**
	 * Check plugin state.
	 *
	 * @param string $slug plugin slug.
	 *
	 * @return bool
	 */
	public function get_rateus_content( $slug ) {
		$state = $this->check_plugin_state( $slug );
		if ( empty( $slug ) ) {
			return '';
		}

		$rateus = '';

		if ( 'rateus' === $state ) {
			$rateus .= '<div class="rateus-ready-site">';
		}
		return $rateus;
	}

	/**
	 * Check plugin state.
	 *
	 * @param string $slug plugin slug.
	 *
	 * @return bool
	 */
	public function get_rateus_end_content( $slug ) {
		$state = $this->check_plugin_state( $slug );
		if ( empty( $slug ) ) {
			return '';
		}

		$rateus_end = '';

		if ( 'rateus' === $state ) {
			$rateus_end .= '</div>';
		}
		return $rateus_end;
	}

	/**
	 * Check plugin state.
	 *
	 * @param string $slug plugin slug.
	 *
	 * @return bool
	 */
	public function check_plugin_state( $slug ) {
		$plugin_link_suffix = self::get_plugin_path( $slug );

		if ( file_exists( ABSPATH . 'wp-content/plugins/' . $plugin_link_suffix ) ) {
			$needs = is_plugin_active( $plugin_link_suffix ) ? 'rateus' : 'activate';
			if ( 'rateus' === $needs && ! post_type_exists( 'portfolio' ) && 'jetpack' === $slug ) {
				return 'enable_cpt';
			}

			return $needs;
		} else {
			return 'install';
		}
	}

	/**
	 * Enqueue Function.
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( 'plugin-install' );
		wp_enqueue_script( 'updates' );
		wp_enqueue_script( 'responsive-plugin-install-helper', get_template_directory_uri() . '/inc/customizer/controls/ui/helper-plugin-install/helper-script.js', array( 'jquery' ), RESPONSIVE_THEME_VERSION, true );
		wp_localize_script(
			'responsive-plugin-install-helper',
			'responsive_plugin_helper',
			array(
				'activating' => esc_html__( 'Activating ', 'responsive' ),
			)
		);
		wp_localize_script(
			'responsive-plugin-install-helper',
			'pagenow',
			array( 'import' )
		);
	}
}
