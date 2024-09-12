<?php

// https://woocommerce.com/products/woocommerce-additional-variation-images/

add_action('init', function () {
	if (! blocksy_woocommerce_has_flexy_view()) {
		return;
	}

	add_action(
		'wp_enqueue_scripts',
		function () {
			wp_dequeue_script('wc_additional_variation_images_script');
		},
		500
	);
});

add_filter(
	'woocommerce_available_variation',
	function ($result, $product, $variation) {
		if (! blocksy_woocommerce_has_flexy_view()) {
			return $result;
		}

		$post_id = $variation->get_id();

		global $sitepress, $woocommerce_wpml;

		if (
			$sitepress
			&&
			$woocommerce_wpml
		) {
			$post_id = apply_filters('wpml_object_id', $variation->get_id(), 'product_variation', TRUE, $sitepress->get_default_language());
		}

		$variation_values = get_post_meta($post_id, 'blocksy_post_meta_options');

		if (empty($variation_values)) {
			$variation_values = [[]];
		}

		if (! $variation_values[0]) {
			$variation_values[0] = [];
		}

		$variation_values = $variation_values[0];

		$original_image = wc_get_product_attachment_props(
			$product->get_image_id()
		);

		$original_image['id'] = $product->get_image_id();

		if (
			! isset($original_image['url'])
			||
			empty($original_image['url'])
		) {
			$original_image['src'] = wc_placeholder_img_src('full');
		}

		$result['blocksy_original_image'] = $original_image;

		unset($result['blocksy_original_image']['url']);

		$result['blocksy_gallery_source'] = blocksy_akg(
			'gallery_source', $variation_values, 'default'
		);

		if (wp_doing_ajax()) {
			$gallery_args = [
				'product' => $product,
				'forced_single' => true,
			];

			remove_action(
				'woocommerce_product_thumbnails',
				'woocommerce_show_product_thumbnails',
				20
			);

			global $blocksy_current_variation;

			if ($variation) {
				$blocksy_current_variation = $variation;
			}

			$result['blocksy_gallery_html'] = blocksy_render_view(
				dirname(__FILE__) . '/../single/woo-gallery-template.php',
				$gallery_args
			);

			$blocksy_current_variation = null;

			if (blocksy_get_theme_mod('gallery_style', 'horizontal') === 'vertical') {
				$result['blocksy_gallery_style'] =  'thumbs-left';
			} else {
				$result['blocksy_gallery_style'] =  'thumbs-bottom';
			}
		}

		return $result;
	},
	10, 3
);

add_action(
	'wp_ajax_blocksy_get_product_view_for_variation',
	'blocksy_get_product_view_for_variation'
);

add_action(
	'wp_ajax_nopriv_blocksy_get_product_view_for_variation',
	'blocksy_get_product_view_for_variation'
);

function blocksy_get_product_view_for_variation() {
	if (! isset($_GET['product_id'])) {
		wp_send_json_error();
	}

	$product = wc_get_product(absint($_GET['product_id']));

	if (! $product) {
		wp_send_json_error();
	}

	$gallery_args = [
		'product' => $product,
		'forced_single' => true,
		'skip_default_variation' => true
	];

	if (
		isset($_GET['retrieve_json'])
		&&
		$_GET['retrieve_json'] === 'yes'
	) {
		if (isset($_GET['variation_id'])) {
			$product = wc_get_product(absint($_GET['variation_id']));
		}

		if (! $product) {
			wp_send_json_error();
		}

		$images_ids = blocksy_product_get_gallery_images(
			$product,
			[
				'enforce_first_image_replace' => true
			]
		);

		$images_ids = array_slice($images_ids, 0, 2);

		$images = [];

		foreach ($images_ids as $image_id) {
			$image_data = wc_get_product_attachment_props($image_id);
			$image_data['id'] = $image_id;
	
			$images[] = $image_data;
		}

		wp_send_json_success([
			'images' => $images
		]);
	}

	if (
		isset($_GET['is_quick_view'])
		&&
		$_GET['is_quick_view'] === 'yes'
	) {
		global $blocksy_is_quick_view;
		$blocksy_is_quick_view = true;

		$gallery_args['forced_single'] = false;
	}

	remove_action(
		'woocommerce_product_thumbnails',
		'woocommerce_show_product_thumbnails',
		20
	);

	if (isset($_GET['variation_id'])) {
		$variation_id = false;

		if (isset($_GET['variation_id'])) {
			$variation_id = absint($_GET['variation_id']);
		}

		if ($variation_id) {
			$variation = wc_get_product($variation_id);

			global $blocksy_current_variation;

			if ($variation) {
				$blocksy_current_variation = $variation;
			}
		}
	}

	$blocksy_gallery_style = 'thumbs-bottom';

	if (blocksy_get_theme_mod('gallery_style', 'horizontal') === 'vertical') {
		$blocksy_gallery_style = 'thumbs-left';
	}

	wp_send_json_success([
		'html' => blocksy_render_view(
			dirname(__FILE__) . '/../single/woo-gallery-template.php',
			$gallery_args
		),
		'blocksy_gallery_style' => $blocksy_gallery_style,
	]);
}

