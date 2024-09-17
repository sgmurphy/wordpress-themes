<?php

$options = array(
	'zakra_header_html_1_heading' => array(
		'type'         => 'customind-accordion',
		'title'        => esc_html__( 'HTML 1', 'zakra' ),
		'section'      => 'zakra_header_builder_html_1',
		'sub_controls' => apply_filters(
			'zakra_header_html_1_sub_controls',
			array(
				'zakra_header_html_1'                  => array(
					'default'  => '',
					'type'     => 'customind-editor',
					'title'    => esc_html__( 'Text/HTML for HTML 1', 'zakra' ),
					'section'  => 'zakra_header_builder_html_1',
					'priority' => 30,
				),
				'zakra_header_html_1_text_color'       => array(
					'title'     => esc_html__( 'Color', 'zakra' ),
					'default'   => '',
					'type'      => 'customind-color',
					'section'   => 'zakra_header_builder_html_1',
					'transport' => 'postMessage',
				),
				'zakra_header_html_1_link_color_group' => array(
					'type'         => 'customind-color-group',
					'title'        => esc_html__( 'Links', 'zakra' ),
					'section'      => 'zakra_header_builder_html_1',
					'sub_controls' => apply_filters(
						'zakra_header_html_1_link_color_sub_controls',
						array(
							'zakra_header_html_1_link_color'       => array(
								'default'   => '',
								'type'      => 'customind-color',
								'title'     => esc_html__( 'Normal', 'zakra' ),
								'transport' => 'postMessage',
								'section'   => 'zakra_header_builder_html_1',
							),
							'zakra_header_html_1_link_hover_color' => array(
								'default'   => '',
								'type'      => 'customind-color',
								'title'     => esc_html__( 'Hover', 'zakra' ),
								'transport' => 'postMessage',
								'section'   => 'zakra_header_builder_html_1',
							),
						)
					),
				),
				'zakra_header_html_1_font_size'        => array(
					'title'       => esc_html__( 'Font Size', 'zakra' ),
					'default'     => array(
						'size' => '',
						'unit' => 'px',
					),
					'type'        => 'customind-slider',
					'section'     => 'zakra_header_builder_html_1',
					'transport'   => 'postMessage',
					'units'       => array( 'px', 'em', 'rem' ),
					'defaultUnit' => 'px',
					'input_attrs' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					),
				),
				'zakra_header_html_1_margin'           => array(
					'default'     => array(
						'top'    => '',
						'right'  => '',
						'bottom' => '',
						'left'   => '',
						'unit'   => 'px',
					),
					'type'        => 'customind-dimensions',
					'title'       => 'Margin',
					'section'     => 'zakra_header_builder_html_1',
					'transport'   => 'postMessage',
					'units'       => array( 'px', 'em', '%', 'rem' ),
					'defaultUnit' => 'px',
				),
			)
		),
		'collapsible'  => apply_filters( 'zakra_header_html_1_accordion_collapsible', false ),
	),
);

if ( ! zakra_is_zakra_pro_active() ) {
	$options['zakra_html_1_upgrade'] = array(
		'type'        => 'customind-upsell',
		'description' => esc_html__( 'Unlock more features available in Pro version.', 'zakra' ),
		'title'       => esc_html__( 'Learn more', 'zakra' ),
		'url'         => esc_url( 'https://zakratheme.com/pricing/?utm_source=zakra-theme&utm_medium=customizer-option-name&utm_campaign=zakra-customizer+&utm_content=Learn+More' ),
		'section'     => 'zakra_header_builder_html_1',
		'priority'    => 100,
	);
}

zakra_customind()->add_controls( $options );
