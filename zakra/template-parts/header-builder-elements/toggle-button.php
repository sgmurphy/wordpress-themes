<?php
/**
 * Mobile toggle icon template file.
 *
 * @package zakra
 *
 * @since 3.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php
$mobile_menu_label      = get_theme_mod( 'zakra_mobile_menu_text', '' );
$enable_header_button   = get_theme_mod( 'zakra_enable_mobile_header_button', '' );
$enable_header_button_2 = get_theme_mod( 'zakra_enable_mobile_header_button_2', '' );

?>

<div class="zak-toggle-menu <?php zakra_css_class( 'zakra_header_mobile_menu_toggle_class' ); ?>"

	<?php echo wp_kses_post( apply_filters( 'zakra_nav_toggle_data_attrs', '' ) ); ?>>

	<?php
	// @codingStandardsIgnoreStart
	echo apply_filters( 'zakra_before_mobile_menu_toggle', '' ); // WPCS: CSRF ok.
	// @codingStandardsIgnoreEnd
	?>

	<button class="zak-menu-toggle"
			aria-label="<?php esc_attr_e( 'Primary Menu', 'zakra' ); ?>" >

		<?php
		if ( get_theme_mod( 'zakra_enable_header_search', true ) ) {

			zakra_get_icon( 'magnifying-glass-bars' );
		} else {

			zakra_get_icon( 'bars' );
		}

		?>

	</button> <!-- /.zak-menu-toggle -->

	<nav id="zak-mobile-nav" class="<?php zakra_css_class( 'zakra_mobile_nav_class' ); ?>"

		<?php echo wp_kses_post( apply_filters( 'zakra_nav_data_attrs', '' ) ); ?>>

		<div class="zak-mobile-nav__header">
			<?php if ( get_theme_mod( 'zakra_enable_header_search', true ) ) : ?>
				<?php get_search_form(); // Header search. ?>
			<?php endif; ?>

			<!-- Mobile nav close icon. -->
			<button id="zak-mobile-nav-close" class="zak-mobile-nav-close" aria-label="<?php esc_attr_e( 'Close Button', 'zakra' ); ?>">
				<?php zakra_get_icon( 'x-mark' ); ?>
			</button>
		</div> <!-- /.zak-mobile-nav__header -->
			<?php
			$builder = get_theme_mod( 'zakra_header_builder', zakra_header_default_builder() );
			echo '<div class="zak-mobile-header-row">';
			foreach ( $builder['offset'] as $cols ) {

				if ( isset( $cols ) ) {
					get_template_part( "template-parts/header-builder-elements/$cols", '' );
				}
			}
			echo '</div>';
			?>
	</nav> <!-- /#zak-mobile-nav-->

</div> <!-- /.zak-toggle-menu -->
