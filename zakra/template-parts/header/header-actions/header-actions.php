<?php
/**
 * Header actions template file.
 *
 * @package zakra
 *
 * @since 3.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$desktop_class = $args[ 'is_desktop' ] ? 'zak-header-actions--desktop' : '';

$header_search   = get_theme_mod( 'zakra_enable_header_search', true );
$header_wishlist = get_theme_mod( 'zakra_enable_woocommerce_wishlist', true );

if ( $header_search || class_exists( 'WooCommerce' ) ) {
	?>

    <div class="<?php zakra_css_class( 'zakra_header_action_class' ); ?> <?php echo esc_attr( $desktop_class ); ?>">

		<?php echo apply_filters( 'zakra_header_search', zakra_search_icon_menu_item() ); ?>

		<?php if ( class_exists( 'WooCommerce' ) ) : ?>

            <div class="zak-header-action">
				<?php
				if ( $header_wishlist ) {
					do_action( 'yith_wcwl_items_count' );
				}
				?>
				<?php echo apply_filters( 'zakra_woocommerce_header_cart', '' ); ?>
            </div>
		<?php endif; ?>
    </div> <!-- #zak-header-actions -->

	<?php
}
