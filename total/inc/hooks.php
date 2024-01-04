<?php

require get_template_directory() . '/inc/hooks/general.php';
require get_template_directory() . '/inc/hooks/header.php';
require get_template_directory() . '/inc/hooks/footer.php';
require get_template_directory() . '/inc/hooks/front-page.php';
require get_template_directory() . '/inc/hooks/single.php';
require get_template_directory() . '/inc/hooks/archive.php';
require get_template_directory() . '/inc/hooks/sidebar.php';

if (total_is_woocommerce_activated()) {
    require get_template_directory() . '/inc/hooks/woocommerce.php';
}