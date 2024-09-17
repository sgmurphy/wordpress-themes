<?php
/**
 * Header builder markup for this theme
 *
 * @package zakra
 */

function zakra_header_default_builder() {
	return array(
		'desktop' => array(
			'top'    => array(
				'left'   => array(),
				'center' => array(),
				'right'  => array(),
			),
			'main'   => array(
				'left'   => array(
					'logo',
				),
				'center' => array(),
				'right'  => array(
					'primary-menu',
					'search',
				),
			),
			'bottom' => array(
				'left'   => array(),
				'center' => array(),
				'right'  => array(),
			),
		),
		'mobile'  => array(
			'top'    => array(
				'left'   => array(),
				'center' => array(),
				'right'  => array(),
			),
			'main'   => array(
				'left'   => array(
					'logo',
				),
				'centre' => array(),
				'right'  => array(
					'toggle-button',
				),
			),
			'bottom' => array(
				'left'   => array(),
				'center' => array(),
				'right'  => array(),
			),
		),
		'offset'  => array(
			'mobile-menu',
		),
	);
}

function zakra_get_area_class( $id ) {
	return str_replace( 'zakra-builder-', '', str_replace( '_', '-', $id ) );
}

/**
 * @param $cols - array of elements
 * @param $cols_area - left, center, right
 *
 * @return void
 */
function zakra_render_header_cols( $cols, $cols_area ) {
	echo '<div class="zak-header-' . esc_attr( zakra_get_area_class( $cols_area ) ) . '-col">';
	foreach ( $cols as $element ) {
		do_action( 'zakra_header_template_parts', $element );
		get_template_part( "template-parts/header-builder-elements/$element", '' );
	}
	echo '</div>';
}

function zakra_header_builder_markup() {
	$classes = zakra_css_class( 'zakra_header_class', false );

	// Convert the class list string into an array
	$classes_array = explode( ' ', $classes );

	// Remove the class 'zak-header'
	if ( ( $key = array_search( 'zak-header', $classes_array ) ) !== false ) {
		unset( $classes_array[ $key ] );
	}

	// Join the remaining classes into a string
	$class_string = implode( ' ', $classes_array );
	echo '<header id="zak-masthead" class="zak-header-builder ' . $class_string . '">';

	/**
	 * Hook - zakra_action_before_header
	 *
	 * @hooked zakra_header_start - 10
	 * @hooked zakra_transparent_header_start - 20
	 */
	do_action( 'zakra_action_before_header' );

	/**
	 * Hook - zakra_header_builder_inside_markup
	 *
	 * @hooked zakra_header_builder_inside_markup - 10
	 */
	do_action( 'zakra_header_builder_inside_markup' );

	/**
	 * Hook - zakra_header_builder_inside_markup
	 *
	 * @hooked zakra_header_builder_inside_markup - 10
	 */
	do_action( 'zakra_action_after_header' );
	echo '</header>';

	/**
	 * Hook - zakra_page_header
	 *
	 * @hooked zakra_page_header - 10
	 */
	do_action( 'zakra_page_header' );
}
$enable_builder = get_theme_mod( 'zakra_enable_builder', false );
if ( $enable_builder || zakra_maybe_enable_builder() ) {
	add_action( 'zakra_header', 'zakra_header_builder_markup' );
}

function zakra_header_builder_inside_markup() {

	$builder = get_theme_mod( 'zakra_header_builder', zakra_header_default_builder() );
	$builder = apply_filters( 'zakra_header_builder_options', $builder );

	echo '<div class="zak-row zak-desktop-row  zak-main-header">';
	$desktop_builder = filter_areas( $builder, 'desktop' );
	zakra_render_header_rows( $desktop_builder, 'desktop' );
	echo '</div>';

	echo '<div class="zak-row zak-mobile-row">';
	$mobile_builder = filter_areas( $builder, 'mobile' );
	zakra_render_header_rows( $mobile_builder, 'mobile' );
	echo '</div>';
}
add_action( 'zakra_header_builder_inside_markup', 'zakra_header_builder_inside_markup' );

function filter_areas( $builder, $device ) {
	return array_filter(
		isset( $builder[ $device ] ) ? $builder[ $device ] : zakra_header_default_builder()[ $device ],
		function ( $row ) {
			foreach ( $row as $cols ) {
				if ( ! empty( $cols ) ) {
					return true;
				}
			}
			return false;
		}
	);
}


function zakra_render_header_rows( $builder, $device ) {

	foreach ( $builder as $area => $row ) {
		if ( 'desktop' === $device && 'top' === $area ) {
			do_action( 'zakra_before_header_top' );
		}

		if ( apply_filters( 'zakra_disable_header_area', false, $area, $row, $builder ) ) {
			continue;
		}

		echo '<div class="zak-header-' . esc_attr( zakra_get_area_class( $area ) ) . '-row">';
		echo '<div class="zak-container">';
		echo '<div class="zak-' . esc_attr( zakra_get_area_class( $area ) ) . '-row">';

		foreach ( $row as $cols_area => $cols ) {
			zakra_render_header_cols( $cols, $cols_area );
		}

		echo '</div>';
		echo '</div>';
		echo '</div>';

		if ( 'desktop' === $device && 'top' === $area ) {
			do_action( 'zakra_after_header_top' );
		}
	}
}

// Footer builder markup.
function zakra_footer_builder_default() {
	return array(
		'desktop' => array(
			'top'    => array(
				'top-1' => array(),
				'top-2' => array(),
				'top-3' => array(),
				'top-4' => array(),
				'top-5' => array(),
			),
			'main'   => array(
				'main-1' => array(),
				'main-2' => array(),
				'main-3' => array(),
				'main-4' => array(),
				'main-5' => array(),
			),
			'bottom' => array(
				'bottom-1' => array( 'copyright' ),
				'bottom-2' => array(),
				'bottom-3' => array(),
				'bottom-4' => array(),
				'bottom-5' => array(),
			),
		),
		'offset'  => array(
			'mobile-menu',
		),
	);
}

function zakra_footer_get_area_class( $id ) {
	return str_replace( 'zakra-builder-', '', str_replace( '_', '-', $id ) );
}

function zakra_render_footer_cols( $cols, $cols_area ) {
	echo '<div class="zak-footer-' . esc_attr( zakra_footer_get_area_class( $cols_area ) ) . '-col">';
	foreach ( $cols as $element ) {
		get_template_part( "template-parts/footer-builder-elements/$element", '' );
	}
	echo '</div>';
}

function zakra_footer_builder_markup() {
	$footer_builder = get_theme_mod( 'zakra_footer_builder', zakra_footer_builder_default() );
	$footer_builder = apply_filters( 'zakra_footer_builder_options', $footer_builder );

	if ( empty( $footer_builder ) ) {
		return;
	}
	echo '<footer id="zak-footer" class="zak-footer zak-footer-builder' . zakra_footer_class() . '">';
	echo '<div class="zak-row zak-footer-desktop-row">';
	foreach ( $footer_builder['desktop'] as $area => $row ) {
		$non_empty_row = array_filter(
			array_map(
				function ( $r ) {
					return ! empty( $r );
				},
				$row
			)
		);

		if ( empty( $non_empty_row ) ) {
			continue;
		}

		if ( apply_filters( 'zakra_disable_footer_area', false, $area, $row, $footer_builder ) ) {
			continue;
		}

		echo '<div class="zak-footer-' . esc_attr( zakra_footer_get_area_class( $area ) ) . '-row" >';
		echo '<div class="zak-container" >';
		$classes = apply_filters(
			'zakra_footer_row_classes',
			array(
				'zak-' . esc_attr( zakra_footer_get_area_class( $area ) ) . '-row',
			),
			$area
		);
		echo '<div class="' . esc_attr( implode( ' ', $classes ) ) . '">';
		$i       = 1;
		$top_row = get_theme_mod( 'zakra_footer_' . $area . '_area_cols', ( 'top' === $area || 'main' === $area ) ? 4 : 1 );
		$top_row = apply_filters( 'zakra_footer_' . $area . '_area_cols', $top_row );

		foreach ( $row as $cols_area => $cols ) {
			if ( $i <= $top_row ) {
				zakra_render_footer_cols( $cols, $cols_area );
			}
			++$i;
		}
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
	echo '</div>';
	echo '</footer>';
}

$enable_builder = get_theme_mod( 'zakra_enable_builder', false );
if ( $enable_builder || zakra_maybe_enable_builder() ) {
	add_action( 'zakra_builder_footer', 'zakra_footer_builder_markup' );
}
