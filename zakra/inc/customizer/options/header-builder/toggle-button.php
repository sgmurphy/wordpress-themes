<?php

$options = array(
	'zakra_header_builder_toggle_button_heading' => array(
		'type'         => 'customind-accordion',
		'title'        => esc_html__( 'Load Google fonts locally', 'zakra' ),
		'section'      => 'zakra_header_builder_toggle_button',
		'sub_controls' => apply_filters(
			'zakra_header_builder_toggle_button_sub_controls',
			array(
				'zakra_header_builder_toggle_button' => array(
					'default' => 0,
					'title'   => esc_html__( 'Enable', 'zakra' ),
					'type'    => 'customind-toggle',
					'section' => 'zakra_header_builder_toggle_button',
				),
			)
		),
		'input_attrs'  => array(
			'collapsible' => apply_filters( 'zakra_header_builder_toggle_button_accordion_collapsible', false ),
		),
	),
);

if ( ! zakra_is_zakra_pro_active() ) {
	$options['zakra_toggle_button_upgrade'] = array(
		'type'        => 'customind-upsell',
		'description' => esc_html__( 'Unlock more features available in Pro version.', 'zakra' ),
		'title'       => esc_html__( 'Learn more', 'zakra' ),
		'url'         => esc_url( 'https://zakratheme.com/pricing/?utm_source=zakra-theme&utm_medium=customizer-option-name&utm_campaign=zakra-customizer+&utm_content=Learn+More' ),
		'section'     => 'zakra_header_builder_toggle_button',
		'priority'    => 100,
	);
}

zakra_customind()->add_controls( $options );
