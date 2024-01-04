<?php
/**
 * Zakra content area functions to be hooked.
 *
 * @package zakra
 */

if ( ! function_exists( 'zakra_post_readmore' ) ) :

	/**
	 * Post read more HTML.
	 *
	 * @param string $readmore_alignment CSS class.
	 */
	function zakra_post_readmore( $readmore_alignment ) {
		?>
		<div class="<?php zakra_css_class( 'zakra_read_more_wrapper_class' ); ?> zak-<?php echo esc_attr( $readmore_alignment ); ?>">

			<a href="<?php the_permalink(); ?>" class="entry-button">

				<?php echo apply_filters( 'zakra_read_more_text', esc_html__( 'Read More', 'zakra' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				<?php zakra_get_icon( 'arrow-right-long' ); ?>

			</a>
		</div> <!-- /.zak-entry-footer -->
		<?php
	}
endif;

if ( ! function_exists( 'zakra_get_sidebar' ) ) {

	function zakra_get_sidebar( $sidebar ) {

		$current_layout = zakra_get_current_layout();

		$sidebar_meta = get_post_meta( zakra_get_post_id(), 'zakra_sidebar', true );

		if ( $sidebar_meta ) {
			return $sidebar_meta;
		} else {
			if ( 'zak-site-layout--left' === $current_layout ) {
				return 'sidebar-left';
			}
		}

		return $sidebar;
	}
}
