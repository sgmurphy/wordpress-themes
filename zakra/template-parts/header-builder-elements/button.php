<?php
/**
 * Header buttons markup file.
 *
 * @package zakra
 *
 * TODO: @since.
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$button_enable = get_theme_mod( 'zakra_enable_header_button' );

$button_text   = get_theme_mod( 'zakra_header_button_text' );
$button_link   = get_theme_mod( 'zakra_header_button_link' );
$button_target = get_theme_mod( 'zakra_header_button_target' ) ? ' target="_blank"' : '';

if ( $button_text ) :
	?>
	<div class="zak-header-buttons">
		<?php

		if ( $button_text ) {
			?>

			<div class="zak-header-button zak-header-button--1">
				<a class="zak-button" href="<?php echo esc_url( $button_link ); ?>"
					<?php echo esc_attr( $button_target ); ?>
					class="<?php echo zakra_css_class( 'zakra_header_button_class', false ); ?>">
					<?php echo esc_html( $button_text ); ?>
				</a>
			</div>

			<?php
		}

		?>

	</div> <!-- /.zak-header-buttons -->
	<?php
endif;
