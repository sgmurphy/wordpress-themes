<?php
/**
 * Layout template.
 */

defined( 'ABSPATH' ) || exit;

$dashboard = Zakra_Dashboard::instance();
?>
<div class="zak-wrap">
	<div class="zak-metabox-holder">
		<div class="zakra-header">
			<div class="zak-container" id="zak-dashboard-menu">
				<a class="zak-title" href="<?php echo esc_url( 'https://themegrill.com/themes/zakra/' ); ?>"
					target="_blank">
					<img class="zak-icon"
						src="<?php echo esc_url( ZAKRA_PARENT_URI . '/inc/admin/images/zak-logo.png' ); ?>"
						alt="<?php esc_attr_e( 'Zakra', 'zakra' ); ?>">
				</a>
				<div class="zak-dashboard-menu-container">
					<ul id="zak-dashboard-menu-primary" class="zak-dashboard-menu-primary">
						<?php foreach ( $dashboard->get_tabs() as $dashboard_tab ) : ?>
							<?php
							$tab_url = add_query_arg(
								array(
									'page' => $dashboard->get_menu_slug(),
									'tab'  => $dashboard_tab['id'],
								),
								admin_url( 'themes.php' ),
							);
							$class   = array(
								'menu-item',
								"menu-item-{$dashboard_tab['id']}",
								$dashboard_tab['class'],
							);
							$class   = array_filter(
								$class,
								function( $c ) {
									return ! empty( $c );
								}
							);
							$class   = implode( ' ', $class );
							?>
						<li class="<?php echo esc_attr( $class ); ?>">
							<a id="<?php echo esc_attr( $dashboard_tab['id'] ); ?>"
								href="<?php echo esc_url( $tab_url ); ?>">
								<?php echo esc_html( $dashboard_tab['name'] ); ?>
							</a>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<div class="zak-dashboard-head-left">
					<span class="zak-version">
						<?php echo esc_html( $this->theme->get( 'Version' ) ); ?>
						<span class="zak-core">
							<?php esc_html_e( 'Core', 'zakra' ); ?>
						</span>
					</span>
					<?php if ( zakra_is_zakra_pro_active() ) : ?>
					<span class="zak-version zakra-pro-version" style="border-color: #27AE60; color: #27AE60;">
						<?php echo esc_html( ZAKRA_PRO_VERSION ); ?>
						<span class="zak-core">
							<?php esc_html_e( 'Pro', 'zakra' ); ?>
						</span>
					</span>
					<?php else : ?>
					<a class="zakra-pro-version"
						href="<?php echo esc_url( 'https://zakratheme.com/pricing/?utm_source=zakra-theme&utm_medium=header&utm_campaign=zakra-dashboard&utm_content=Upgrade+to+Pro ' ); ?>"
						target="_blank">
						<span class="zak-upgrade-to-pro">
							<?php esc_html_e( 'Upgrade to Pro', 'zakra' ); ?>
						</span>
					</a>
					<?php endif; ?>
					<span id="zak-notification" class="zak-notification">
						<img class="zak-notification-icon"
							src="<?php echo esc_url( ZAKRA_PARENT_URI . '/inc/admin/images/notification-button.gif' ); ?>"
							alt="<?php esc_attr_e( 'Zakra', 'zakra' ); ?>">
					</span>
				</div>
			</div>
			<!--/.zak-container-->
		</div>
		<!--/.zakra-header-->
		<?php
		$active_tab = $dashboard->get_active_tab();
		if ( ! empty( $active_tab ) ) {
			$action_handle = "zakra_dashboard_tab_{$active_tab}_content";
			has_action( $action_handle ) && do_action( $action_handle );
		}
		?>
	</div>
	<!--/.zak-metabox-holder-->
</div>
<!--/.wrap-->
<div id="zak-dialog" class="zak-dialog">
	<div class="zak-dialog-head">
		<h3><?php esc_html_e( 'Latest Updates', 'zakra' ); ?></h3>

		<div id="zak-dialog-close" class="zak-dialog-close">
			<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
				<path
					d="M10.052 9.34082L16.277 3.11582C16.577 2.81582 16.577 2.36582 16.277 2.06582C15.977 1.76582 15.5269 1.76582 15.227 2.06582L9.00195 8.29082L2.77695 2.06582C2.47695 1.76582 2.02695 1.76582 1.72695 2.06582C1.42695 2.36582 1.42695 2.81582 1.72695 3.11582L7.95195 9.34082L1.72695 15.5658C1.42695 15.8658 1.42695 16.3158 1.72695 16.6158C1.87695 16.7658 2.02695 16.8408 2.25195 16.8408C2.47695 16.8408 2.62695 16.7658 2.77695 16.6158L9.00195 10.3908L15.227 16.6158C15.377 16.7658 15.602 16.8408 15.752 16.8408C15.902 16.8408 16.127 16.7658 16.277 16.6158C16.577 16.3158 16.577 15.8658 16.277 15.5658L10.052 9.34082Z"
					fill="#999999" />
			</svg>
		</div>
	</div>
	<?php if ( zakra_is_zakra_pro_active() && zakra_plugin_version_compare( 'zakra-pro/zakra-pro.php', '2.0.7', '>' ) ) : ?>
	<div class="zak-tab-container">
		<button class="zak-tab-button active-button" onclick="showTab('free', this)">Free</button>
		<button class="zak-tab-button" onclick="showTab('pro', this)">Pro</button>
	</div>
	<?php endif; ?>

	<div id="free" class="zak-tab-content active-tab">
		<div class="zak-dialog-content">
			<?php ( new Zakra_Changelog_Parser( ZAKRA_PARENT_DIR . '/changelog.txt' ) )->render_changelog_html(); ?>
		</div>
	</div>
	<?php if ( zakra_is_zakra_pro_active() ) : ?>
		<div id="pro" class="zak-tab-content">
			<div class="zak-dialog-content">
				<?php ( new Zakra_Changelog_Parser( plugin_dir_path( ZAKRA_PRO_PLUGIN_FILE ) . '/changelog.txt' ) )->render_changelog_html(); ?>
			</div>
		</div>
	<?php endif; ?>
</div>
