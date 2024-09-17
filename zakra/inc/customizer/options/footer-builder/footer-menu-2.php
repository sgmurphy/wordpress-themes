<?php
$menus        = wp_get_nav_menus();
$menu_choices = array();

foreach ( $menus as $menu ) {
	$menu_choices[ $menu->term_id ] = $menu->name;
}
$options = array(
	'zakra_footer_menu_2_heading' => array(
		'type'         => 'customind-accordion',
		'title'        => esc_html__( 'Footer Menu', 'zakra' ),
		'section'      => 'zakra_footer_builder_footer_menu_2',
		'sub_controls' => apply_filters(
			'zakra_footer_menu_2_sub_controls',
			array(
				'zakra_footer_menu_2'             => array(
					'default' => 'none',
					'type'    => 'customind-select',
					'title'   => esc_html__( 'Select a Menu', 'zakra' ),
					'section' => 'zakra_footer_builder_footer_menu_2',
					'choices' => zakra_get_menu_options(),
				),
				'zakra_footer_menu_2_color_group' => array(
					'type'         => 'customind-color-group',
					'title'        => 'Color',
					'section'      => 'zakra_footer_builder_footer_menu_2',
					'sub_controls' => array(
						'zakra_footer_menu_2_color'       => array(
							'default'   => '',
							'type'      => 'customind-color',
							'title'     => esc_html__( 'Normal', 'zakra' ),
							'transport' => 'postMessage',
							'section'   => 'zakra_footer_builder_footer_menu_2',
						),
						'zakra_footer_menu_2_hover_color' => array(
							'default'   => '',
							'type'      => 'customind-color',
							'title'     => esc_html__( 'Hover', 'zakra' ),
							'transport' => 'postMessage',
							'section'   => 'zakra_footer_builder_footer_menu_2',
						),
					),
				),
				'zakra_footer_menu_2_typography'  => array(
					'default'   => array(
						'font-family'    => 'Default',
						'font-weight'    => 'regular',
						'font-size'      => array(
							'desktop' => array(
								'size' => '1.6',
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
					'title'     => esc_html__( 'Typography', 'zakra' ),
					'transport' => 'postMessage',
					'section'   => 'zakra_footer_builder_footer_menu_2',
				),
			)
		),
		'collapsible'  => apply_filters( 'zakra_footer_menu_2_accordion_collapsible', false ),
	),
);

if ( ! zakra_is_zakra_pro_active() ) {
	$options['zakra_footer_menu_2_upgrade2'] = array(
		'type'        => 'customind-upsell',
		'description' => esc_html__( 'Unlock more features available in Pro version.', 'zakra' ),
		'title'       => esc_html__( 'Learn more', 'zakra' ),
		'url'         => esc_url( 'https://zakratheme.com/pricing/?utm_source=zakra-theme&utm_medium=customizer-option-name&utm_campaign=zakra-customizer+&utm_content=Learn+More' ),
		'section'     => 'zakra_footer_builder_footer_menu_2',
		'priority'    => 100,
	);

}

zakra_customind()->add_controls( $options );
