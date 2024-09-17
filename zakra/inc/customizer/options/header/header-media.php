<?php

$options = apply_filters(
	'zakra_header_media_options',
	array(
		'zakra_header_media_heading' => array(
			'type'     => 'customind-title',
			'title'    => esc_html__( 'Header Media', 'zakra' ),
			'section'  => 'header_image',
			'priority' => 5,
		),
	)
);

if ( ! zakra_is_zakra_pro_active() ) {
	$options['zakra_header_media_upgrade'] = array(
		'type'        => 'customind-upsell',
		'description' => esc_html__( 'Unlock more features available in Pro version.', 'zakra' ),
		'title'       => esc_html__( 'Learn more', 'zakra' ),
		'url'         => esc_url( 'https://zakratheme.com/pricing/?utm_source=zakra-theme&utm_medium=customizer-option-name&utm_campaign=zakra-customizer+&utm_content=Learn+More' ),
		'section'     => 'header_image',
		'priority'    => 100,
	);
}

zakra_customind()->add_controls( $options );
