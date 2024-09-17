<?php

$options = array(
	'zakra_footer_builder_widget_6_heading' => array(
		'type'         => 'customind-accordion',
		'title'        => esc_html__( 'Widget 6', 'zakra' ),
		'section'      => 'zakra_footer_builder_widget_6',
		'sub_controls' => apply_filters(
			'zakra_footer_builder_widget_6_sub_controls',
			array(
				'zakra_footer_widget_6_title_color'        => array(
					'default'   => '',
					'type'      => 'customind-color',
					'title'     => esc_html__( 'Title Color', 'zakra' ),
					'transport' => 'postMessage',
					'section'   => 'zakra_footer_builder_widget_6',
				),
				'zakra_footer_widget_6_title_typography'   => array(
					'default'   => array(
						'font-family'    => 'default',
						'font-weight'    => '600',
						'font-size'      => array(
							'desktop' => array(
								'size' => '2',
								'unit' => 'rem',
							),
							'tablet'  => array(
								'size' => '',
								'unit' => '',
							),
							'mobile'  => array(
								'size' => '',
								'unit' => '',
							),
						),
						'line-height'    => array(
							'desktop' => array(
								'size' => '1.3',
								'unit' => '-',
							),
							'tablet'  => array(
								'size' => '',
								'unit' => '',
							),
							'mobile'  => array(
								'size' => '',
								'unit' => '',
							),
						),
						'font-style'     => 'normal',
						'text-transform' => 'none',
					),
					'type'      => 'customind-typography',
					'transport' => 'postMessage',
					'title'     => esc_html__( 'Title Typography', 'zakra' ),
					'section'   => 'zakra_footer_builder_widget_6',
				),
				'zakra_footer_widget_6_link_divider'       => array(
					'type'    => 'customind-divider',
					'variant' => 'dashed',
					'section' => 'zakra_footer_builder_widget_6',
				),
				'zakra_footer_widget_6_link_color'         => array(
					'default'   => '',
					'type'      => 'customind-color',
					'title'     => esc_html__( 'Link', 'zakra' ),
					'transport' => 'postMessage',
					'section'   => 'zakra_footer_builder_widget_6',
				),
				'zakra_footer_widget_6_content_color_divider' => array(
					'type'    => 'customind-divider',
					'variant' => 'dashed',
					'section' => 'zakra_footer_builder_widget_6',
				),
				'zakra_footer_widget_6_content_color'      => array(
					'default'   => '',
					'type'      => 'customind-color',
					'title'     => esc_html__( 'Content Color', 'zakra' ),
					'transport' => 'postMessage',
					'section'   => 'zakra_footer_builder_widget_6',
				),
				'zakra_footer_widget_6_content_typography' => array(
					'default'   => array(
						'font-family'    => 'default',
						'font-weight'    => '600',
						'font-size'      => array(
							'desktop' => array(
								'size' => '',
								'unit' => 'px',
							),
							'tablet'  => array(
								'size' => '',
								'unit' => '',
							),
							'mobile'  => array(
								'size' => '',
								'unit' => '',
							),
						),
						'line-height'    => array(
							'desktop' => array(
								'size' => '1.8',
								'unit' => '-',
							),
							'tablet'  => array(
								'size' => '',
								'unit' => '',
							),
							'mobile'  => array(
								'size' => '',
								'unit' => '',
							),
						),
						'font-style'     => 'normal',
						'text-transform' => 'none',
					),
					'type'      => 'customind-typography',
					'transport' => 'postMessage',
					'title'     => esc_html__( 'Content Typography', 'zakra' ),
					'section'   => 'zakra_footer_builder_widget_6',
				),
			)
		),
		'collapsible'  => apply_filters( 'zakra_footer_builder_widget_6_accordion_collapsible', false ),
	),
);

if ( ! zakra_is_zakra_pro_active() ) {
	$options['zakra_footer_builder_widget_6_upgrade'] = array(
		'type'        => 'customind-upsell',
		'description' => esc_html__( 'Unlock more features available in Pro version.', 'zakra' ),
		'title'       => esc_html__( 'Learn more', 'zakra' ),
		'url'         => esc_url( 'https://zakratheme.com/pricing/?utm_source=zakra-theme&utm_medium=customizer-option-name&utm_campaign=zakra-customizer+&utm_content=Learn+More' ),
		'section'     => 'zakra_footer_builder_widget_6',
		'priority'    => 100,
	);
}

zakra_customind()->add_controls( $options );
