<?php

$maybe_taxonomy = blocksy_maybe_get_matching_taxonomy($post_type->name, false);

if (! isset($has_post_elements)) {
	$has_post_elements = true;
}

$options = [
	[
		'post_title_panel' => [
			'label' => blocksy_safe_sprintf(
				__('%s Title', 'blocksy'),
				$post_type->labels->singular_name
			),
			'type' => 'ct-panel',
			'wrapperAttr' => [ 'data-label' => 'heading-label' ],
			'setting' => [ 'transport' => 'postMessage' ],
			'inner-options' => [

				blocksy_get_options('general/page-title', [
					'is_cpt' => $post_type->name . '_single',
					'has_default' => true,
					'is_single' => true,
					'enabled_label' => blocksy_safe_sprintf(
						__('%s Title', 'blocksy'),
						$post_type->labels->singular_name
					)
				]),

			]
		],

		blocksy_rand_md5() => [
			'type' => 'ct-title',
			'label' => blocksy_safe_sprintf(
				__('%s Structure', 'blocksy'),
				$post_type->labels->singular_name
			)
		],

		blocksy_rand_md5() => [
			'title' => __( 'General', 'blocksy' ),
			'type' => 'tab',
			'options' => [
				'page_structure_type' => [
					'label' => false,
					'type' => 'ct-image-picker',
					'value' => 'default',
					'design' => 'block',
					'attr' => [
						'data-type' => 'background',
						'data-state' => 'sync',
					],
					'setting' => [ 'transport' => 'postMessage' ],
					'choices' => [
						'default' => [
							'src'   => blocksy_image_picker_url( 'default.svg' ),
							'title' => __( 'Inherit from customizer', 'blocksy' ),
						],

						'type-3' => [
							'src'   => blocksy_image_picker_url( 'narrow.svg' ),
							'title' => __( 'Narrow Width', 'blocksy' ),
						],

						'type-4' => [
							'src'   => blocksy_image_picker_url( 'normal.svg' ),
							'title' => __( 'Normal Width', 'blocksy' ),
						],

						'type-2' => [
							'src'   => blocksy_image_picker_url( 'left-single-sidebar.svg' ),
							'title' => __( 'Left Sidebar', 'blocksy' ),
						],

						'type-1' => [
							'src'   => blocksy_image_picker_url( 'right-single-sidebar.svg' ),
							'title' => __( 'Right Sidebar', 'blocksy' ),
						],
					],
				],

				blocksy_rand_md5() => [
					'type' => 'ct-divider',
				],

				'content_style_source' => [
					'label' => __('Content Area Style Source', 'blocksy'),
					'type' => 'ct-radio',
					'value' => 'inherit',
					'view' => 'text',
					'choices' => [
						'inherit' => __('Inherit', 'blocksy'),
						'custom' => __('Custom', 'blocksy'),
					],
				],

				blocksy_rand_md5() => [
					'type' => 'ct-condition',
					'condition' => ['content_style_source' => 'custom'],
					'options' => [
						'content_style' => [
							'label' => __('Content Area Style', 'blocksy'),
							'type' => 'ct-radio',
							'value' => 'wide',
							'view' => 'text',
							'design' => 'block',
							'responsive' => true,
							'choices' => [
								'wide' => __( 'Wide', 'blocksy' ),
								'boxed' => __( 'Boxed', 'blocksy' ),
							],
						],
					]
				],

				'vertical_spacing_source' => [
					'label' => __('Content Area Vertical Spacing', 'blocksy'),
					'type' => 'ct-radio',
					'value' => 'inherit',
					'view' => 'text',
					'divider' => 'top',
					'choices' => [
						'inherit' => __('Inherit', 'blocksy'),
						'custom' => __('Custom', 'blocksy'),
					],
				],

				blocksy_rand_md5() => [
					'type' => 'ct-condition',
					'condition' => [ 'vertical_spacing_source' => 'custom' ],
					'options' => [

						'content_area_spacing' => [
							'label' => false,
							'desc' => __( 'You can customize the spacing value in general settings panel.', 'blocksy' ),
							'type' => 'ct-radio',
							'value' => 'both',
							'view' => 'text',
							'design' => 'block',
							'disableRevertButton' => true,
							'attr' => [ 'data-type' => 'content-spacing' ],
							'choice_attr' => [ 'data-tooltip-reveal' => 'top' ],
							'setting' => [ 'transport' => 'postMessage' ],
							'choices' => [
								'both'   => '<span></span>
								<i class="ct-tooltip">' . __( 'Top & Bottom', 'blocksy' ) . '</i>',

								'top'    => '<span></span>
								<i class="ct-tooltip">' . __( 'Only Top', 'blocksy' ) . '</i>',

								'bottom' => '<span></span>
								<i class="ct-tooltip">' . __( 'Only Bottom', 'blocksy' ) . '</i>',

								'none'   => '<span></span>
								<i class="ct-tooltip">' . __( 'Disabled', 'blocksy' ) . '</i>',
							],
							'desc' => blocksy_safe_sprintf(
								// translators: placeholder here means the actual URL.
								__( 'You can customize the global spacing value in General ➝ Layout ➝ %sContent Area Spacing%s.', 'blocksy' ),
								blocksy_safe_sprintf(
									'<a data-trigger-section="general" href="%s">',
									admin_url('/customize.php?autofocus[section]=general&ct_autofocus=general:layout_panel')
								),
								'</a>'
							),
						],

					],
				],
			]
		],

		blocksy_rand_md5() => [
			'title' => __('Design', 'blocksy'),
			'type' => 'tab',
			'options' => [
				blocksy_get_options('single-elements/structure-design', [
					'options_conditions' => [
						'content_style_source' => 'custom'
					]
				])
			],
		]
	],

	$has_post_elements ? [
		blocksy_rand_md5() => [
			'type' => 'ct-title',
			'label' => __( 'Post Elements', 'blocksy' ),
		],

		'disable_featured_image' => [
			'label' => __( 'Disable Featured Image', 'blocksy' ),
			'type' => 'ct-switch',
			'value' => 'no',
		]
	] : [],

	$has_post_elements && $maybe_taxonomy ? [
		'disable_post_tags' => [
			'label' => blocksy_safe_sprintf(
				__('Disable %s %s', 'blocksy'),
				$post_type->labels->singular_name,
				get_taxonomy($maybe_taxonomy)->label
			),
			'type' => 'ct-switch',
			'value' => 'no',
		],
	] : [],

	$has_post_elements ? [
		'disable_share_box' => [
			'label' => __( 'Disable Share Box', 'blocksy' ),
			'type' => 'ct-switch',
			'value' => 'no',
		],

		'disable_author_box' => [
			'label' => __( 'Disable Author Box', 'blocksy' ),
			'type' => 'ct-switch',
			'value' => 'no',
		],

		'disable_posts_navigation' => [
			'label' => __( 'Disable Posts Navigation', 'blocksy' ),
			'type' => 'ct-switch',
			'value' => 'no',
		],

		blocksy_rand_md5() => [
			'type' => 'ct-title',
			'label' => __( 'Page Elements', 'blocksy' ),
		],

		'disable_related_posts' => [
			'label' => __( 'Disable Related Posts', 'blocksy' ),
			'type' => 'ct-switch',
			'value' => 'no',
		],

		'disable_header' => [
			'label' => __( 'Disable Header', 'blocksy' ),
			'type' => 'ct-switch',
			'value' => 'no',
		],

		'disable_footer' => [
			'label' => __( 'Disable Footer', 'blocksy' ),
			'type' => 'ct-switch',
			'value' => 'no',
		],
	] : [],

	$has_post_elements ? apply_filters(
		'blocksy_extensions_metabox_post_bottom',
		[]
	) : [],
];


