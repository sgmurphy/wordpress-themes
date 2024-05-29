<?php
/**
 * Footer Template
 *
 * @file           footer.php
 * @package        Responsive
 * @author         CyberChimps
 * @copyright      2020 CyberChimps
 * @license        license.txt
 * @version        Release: 1.2
 * @filesource     wp-content/themes/responsive/footer.php
 * @link           http://codex.wordpress.org/Theme_Development#Footer_.28footer.php.29
 * @since          available since Release 1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'check_is_responsive_addons_greater' ) ) {
	/**
	 * Check if Responsive Addons is installed.
	 */
	function check_is_responsive_addons_greater() {
		if ( is_plugin_active( 'responsive-add-ons/responsive-add-ons.php' ) ) {
			$raddons_version    = get_plugin_data( WP_PLUGIN_DIR . '/responsive-add-ons/responsive-add-ons.php' )['Version'];
			$is_raddons_greater = false;
			if ( version_compare( $raddons_version, '3.0.0', '>=' ) ) {
				$is_raddons_greater = true;
			}
			return $is_raddons_greater;
		}
		return false;
	}
}

/*
 * Globalize Theme options
 */
global $responsive_options;
$responsive_options = Responsive\Core\responsive_get_options();
global $responsive_blog_layout_columns;
do_action( 'cyberchimps_footer' );
$responsive_show_footer = true;
if ( class_exists( 'Responsive_Addons_Pro' ) || check_is_responsive_addons_greater() ) {
	if ( ( 1 === get_theme_mod( 'responsive_distraction_free_woocommerce', 0 ) ) && (
		( is_shop() && 1 === get_theme_mod( 'responsive_disable_shop_header_footer', 0 ) )
		|| ( is_product() && 1 === get_theme_mod( 'responsive_disable_single_product_header_footer', 0 ) )
		|| ( is_cart() && 1 === get_theme_mod( 'responsive_disable_cart_header_footer', 0 ) )
		|| ( is_checkout() && 1 === get_theme_mod( 'responsive_disable_checkout_header_footer', 0 ) )
		|| ( is_account_page() && 1 === get_theme_mod( 'responsive_disable_account_header_footer', 0 ) )
		|| ( is_product_category() && 1 === get_theme_mod( 'responsive_disable_product_category_header_footer', 0 ) )
		|| ( is_product_tag() && 1 === get_theme_mod( 'responsive_disable_product_tag_header_footer', 0 ) )
		) && 'on' === get_option( 'rpro_woocommerce_enable' )
	) {
		$responsive_show_footer = false;
	}
}
		// Elementor `footer` location.
if ( ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) && ! ( function_exists( 'rea_theme_template_render_at_location' ) && rea_theme_template_render_at_location( 'footer' ) ) && $responsive_show_footer ) {

	// Replaces default footer with custom footer.
	Responsive\responsive_custom_footer();

	if ( ! has_action( 'responsive_custom_footer' ) ) {

		?>
			<footer id="footer" class="clearfix site-footer" role="contentinfo" <?php responsive_schema_markup( 'site-footer' ); ?>>
				<?php Responsive\responsive_footer_top(); ?>
				<?php get_sidebar( 'footer' ); ?>

				<div class="footer-bar grid col-940">
					<div class="content-outer container">
						<div class="row">

						<?php
						get_sidebar( 'colophon' );

						$sections = array( 'social_icons', 'footer_menu', 'copy_right_text' );
						$sections = get_theme_mod( 'responsive_footer_elements_positioning', $sections );
						foreach ( $sections as $section ) {

							// Footer Menu.
							if ( 'footer_menu' === $section ) {
								if ( has_nav_menu( 'footer-menu' ) ) {
									get_template_part( 'partials/footer/footer-menu' );
								}
							}

							if ( 'social_icons' === $section ) {
								echo responsive_get_social_icons() ;// phpcs:ignore
							}

							// Copy Rights.
							if ( 'copy_right_text' === $section ) {
								get_template_part( 'partials/footer/copy-right' );
							}
						}

						?>

						</div>
					</div>
				</div>

				<?php Responsive\responsive_footer_bottom(); ?>
			</footer><!-- end #footer -->
		<?php
	}
}
			Responsive\responsive_footer_after();
?>
	</div><!-- end of #container -->

	<?php
	Responsive\responsive_container_end(); // after container hook.

	if ( get_theme_mod( 'responsive_scroll_to_top' ) ) {
		$scroll_top_devices = get_theme_mod( 'responsive_scroll_to_top_on_devices', 'both' );
		?>
		<div id="scroll" class="responsive-scroll" aria-label="<?php esc_attr_e( 'Scroll to Top', 'responsive' ); ?>" title="<?php esc_attr_e( 'Scroll to Top', 'responsive' ); ?>" data-on-devices="<?php echo esc_attr( $scroll_top_devices ); ?>"><span><?php esc_html_e( 'Top', 'responsive' ); ?></span></div>
		<?php
	}

	wp_footer();
	?>
</body>
</html>
