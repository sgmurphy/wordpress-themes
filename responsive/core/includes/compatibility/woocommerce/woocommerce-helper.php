<?php
/**
 * All helper functions for woocommerce helper
 *
 *
 * @package Responsive
 */

namespace Responsive\WooCommerce;

/**
 * Set up theme defaults and register supported WordPress features.
 *
 * @return void
 */
function setup() {
	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'wp', $n( 'woocommerce_checkout' ) );
	add_filter( 'wp_nav_menu_items', $n( 'responsive_menu_cart_icon' ), 10, 2 );
	add_filter( 'woocommerce_add_to_cart_fragments', $n( 'woocommerce_header_add_to_cart_fragment' ), 10, 1 );

}

if ( ! function_exists( 'responsive_woo_woocommerce_template_loop_product_title' ) ) {

	/**
	 * Show the product title in the product loop. By default this is an H2.
	 */
	function responsive_woo_woocommerce_template_loop_product_title() {

		echo '<a href="' . esc_url( get_the_permalink() ) . '" class="responsive-loop-product__link">';
		responsive_template_loop_product_title();
		echo '</a>';
	}
}


if ( ! function_exists( 'responsive_template_loop_product_title' ) ) {

	/**
	 * Show the product title in the product loop. By default this is an H2.
	 */
	function responsive_template_loop_product_title() {
		echo '<h2 class="' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ) . '">' . get_the_title() . '</h2>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

if ( ! function_exists( 'responsive_woocommerce_shop_elements_positioning' ) ) {
	/**
	 * Returns blog single elements positioning
	 *
	 * @since 1.1.0
	 */
	function responsive_woocommerce_shop_elements_positioning() {

		// Default sections.
		$sections = array( 'category', 'title', 'price', 'short_desc', 'ratings', 'add_cart' );

		// Get sections from Customizer.
		$sections = get_theme_mod( 'responsive_woocommerce_shop_elements_positioning', $sections );

		// Turn into array if string.
		if ( $sections && ! is_array( $sections ) ) {
			$sections = explode( ',', $sections );
		}

		// Apply filters for easy modification.
		$sections = apply_filters( 'responsive_woocommerce_shop_elements_positioning', $sections );

		// Return sections.
		return $sections;

	}
}

if ( ! function_exists( 'responsive_woocommerce_product_elements_positioning' ) ) {
	/**
	 * Returns blog single elements positioning
	 *
	 * @since 1.1.0
	 */
	function responsive_woocommerce_product_elements_positioning() {

		// Default sections.
		$sections = array( 'title', 'price', 'ratings', 'short_desc', 'add_cart', 'meta' );

		// Get sections from Customizer.
		$sections = get_theme_mod( 'responsive_woocommerce_product_elements_positioning', $sections );

		// Turn into array if string.
		if ( $sections && ! is_array( $sections ) ) {
			$sections = explode( ',', $sections );
		}

		// Apply filters for easy modification.
		$sections = apply_filters( 'responsive_woocommerce_product_elements_positioning', $sections );

		// Return sections.
		return $sections;

	}
}
/**
 * Shop page - Short Description
 */
if ( ! function_exists( 'responsive_woo_shop_product_short_description' ) ) {
	/**
	 * Product short description
	 *
	 * @hooked woocommerce_after_shop_loop_item
	 *
	 * @since 1.1.0
	 */
	function responsive_woo_shop_product_short_description() {
		if ( has_excerpt() ) {
			the_excerpt();
		}
	}
}
/**
 * Shop page - Category
 */
if ( ! function_exists( 'responsive_woo_shop_parent_category' ) ) {
	/**
	 * Product Category
	 *
	 * @hooked woocommerce_after_shop_loop_item
	 *
	 * @since 1.1.0
	 */
	function responsive_woo_shop_parent_category() {
		if ( apply_filters( 'responsive_woo_shop_parent_category', true ) ) {

			echo '<p class="responsive_woo_shop_parent_category">';

			global $product;
			$product_categories = function_exists( 'wc_get_product_category_list' ) ? wc_get_product_category_list( get_the_ID(), ';', '', '' ) : $product->get_categories( ';', '', '' );

			$product_categories = htmlspecialchars_decode( wp_strip_all_tags( $product_categories ) );
			if ( $product_categories ) {
				list($parent_cat) = explode( ';', $product_categories );
				echo esc_html( $parent_cat );
			}
			echo '</p>';
		}
	}
}

/**
 * Checkout customization.
 *
 * @return void
 */
function woocommerce_checkout() {

	if ( is_admin() ) {
		return;
	}

		/**
		 * Checkout Page
		 */
		add_action( 'woocommerce_checkout_billing', array( WC()->checkout(), 'checkout_form_shipping' ) );

	// Checkout Page.
	remove_action( 'woocommerce_checkout_shipping', array( WC()->checkout(), 'checkout_form_shipping' ) );
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

/**
 * Adds cart icon to menu
 *
 * @param string $menu default menu.
 * @param array  $args check menu.
 */
function responsive_menu_cart_icon( $menu, $args ) {

	$menu_cart = get_theme_mod( 'responsive_menu_cart_icon' );
	// Only used for the main menu.
	if ( 'header-menu' === $args->theme_location ) {
		if ( 'icon-opencart' === $menu_cart ) {
			if ( null !== WC()->cart ) {
				$cart_contents_count = WC()->cart->get_cart_contents_count();
				$cart_total_markup   = '<span class="res-header-cart-total">' . WC()->cart->get_cart_total() . '</span>';

			}
			if ( class_exists( 'Responsive_Addons_Pro' ) || check_is_responsive_addons_greater() ) {
				$cart_title_markup = '<span class="res-woo-header-cart-title">' . __( 'Cart', 'responsive' ) . '</span>';
				$cart_title        = get_theme_mod( 'responsive_cart_title' );
				$cart_icon         = get_theme_mod( 'responsive_cart_icon', 'icon-opencart' );
				$cart_total        = get_theme_mod( 'responsive_cart_count' );

				if ( 1 === $cart_title && 1 === $cart_total ) {
					$menu .= '<li class="res-cart-link"><a href="' . esc_url( wc_get_cart_url() ) . '"><div class="res-addon-cart-wrap"><span class="res-header-cart-info-wrap"> ' . $cart_title_markup . '' . __( ' / ', 'responsive' ) . '' . $cart_total_markup . '</span><span class="res-cart-icon icon ' . esc_attr( $cart_icon ) . '" data-cart-total="' . $cart_contents_count . '"></span></div></a></li>';
				} elseif ( isset( $cart_title ) && 1 === $cart_title ) {
					$menu .= '<li class="res-cart-link"><a href="' . esc_url( wc_get_cart_url() ) . '"><div class="res-addon-cart-wrap">' . $cart_title_markup . ' <span class="res-cart-icon icon ' . esc_attr( $cart_icon ) . '" data-cart-total="' . $cart_contents_count . '"></span></div></a></li>';
				} elseif ( isset( $cart_total ) && 1 === $cart_total ) {
					$menu .= '<li class="res-cart-link"><a href="' . esc_url( wc_get_cart_url() ) . '"><div class="res-addon-cart-wrap"> ' . ' <span class="res-cart-icon icon ' . esc_attr( $cart_icon ) . '" data-cart-total="' . $cart_contents_count . '"></span>' . $cart_total_markup . '</div></a></li>';
				} else {
					$menu .= '<li class="res-cart-link"><a href="' . esc_url( wc_get_cart_url() ) . '"><div class="res-addon-cart-wrap"><span class="res-cart-icon fa ' . esc_attr( $cart_icon ) . '"  data-cart-total="' . $cart_contents_count . '"></span></div></a></li>';
				}
			} else {
				$menu .= '<li class="res-cart-link"><a href="' . esc_url( wc_get_cart_url() ) . '"><div class="res-addon-cart-wrap"><span class="res-cart-icon fa ' . esc_attr( $menu_cart ) . '" data-cart-total="' . $cart_contents_count . '"></span></div></a></li>';
			}
		}
	}
	return $menu;
}
/**
 * Show cart contents / total Ajax
 *
 * @param mixed $fragments Fragments.
 */
function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
	<span class="res-header-cart-total" ><?php echo wp_kses_post( $woocommerce->cart->get_cart_total() ); ?></span>
	<?php
	$fragments['span.res-header-cart-total'] = ob_get_clean();
	return $fragments;
}
