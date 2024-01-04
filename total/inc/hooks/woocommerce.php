<?php
add_action('wp_loaded', 'total_woocommerce_remove_actions');

function total_woocommerce_remove_actions() {
    remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
    remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
    remove_action('woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10);
    remove_action('woocommerce_archive_description', 'woocommerce_product_archive_description', 10);
    remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
    remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
    remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
}

add_action('woocommerce_before_main_content', 'total_output_content_wrapper', 10);
add_action('woocommerce_after_main_content', 'total_output_content_wrapper_end', 10);
add_action('total_woocommerce_breadcrumb', 'woocommerce_breadcrumb', 10);
add_action('total_woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10);
add_action('total_woocommerce_archive_description', 'woocommerce_product_archive_description', 10);
add_action('woocommerce_after_shop_loop_item', 'total_title_wrap_close', 4);
add_action('woocommerce_before_shop_loop_item_title', 'total_title_wrap', 20);
add_action('total_shop_sidebar_template', 'total_shop_sidebar_content');

function total_output_content_wrapper() {
    echo '<div class="ht-main-header">';
    echo '<div class="ht-container">';
    echo '<h1 class="ht-main-title">';
    if (is_singular()) {
        the_title();
    } else {
        woocommerce_page_title();
    }
    echo '</h1>';
    do_action('total_woocommerce_archive_description');
    do_action('total_woocommerce_breadcrumb');
    echo '</div>';
    echo '</div>';

    echo '<div class="ht-container ht-clearfix">';
    echo '<div id="primary">';
}

function total_output_content_wrapper_end() {
    echo '</div>';
    get_sidebar('shop');
    echo '</div>';
}

function total_title_wrap() {
    echo '<div class="total-product-title-wrap">';
}

function total_title_wrap_close() {
    echo '</div>';
}

function total_shop_sidebar_content() {
    if (!is_active_sidebar('total-shop-sidebar')) {
        return;
    }
    ?>

    <div id="secondary" class="widget-area">
        <?php dynamic_sidebar('total-shop-sidebar'); ?>
    </div><!-- #secondary -->
    <?php
}

add_filter('woocommerce_show_page_title', '__return_false');
add_filter('woocommerce_product_description_heading', '__return_false');
add_filter('woocommerce_product_additional_information_heading', '__return_false');
add_filter('woocommerce_output_related_products_args', 'total_related_products_args');

function total_related_products_args($args) {
    $args['posts_per_page'] = 3;
    $args['columns'] = 3;
    return $args;
}
