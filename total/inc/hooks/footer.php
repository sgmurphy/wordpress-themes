<?php
if (!function_exists('total_scroll_top')) {

    function total_scroll_top() {
        $display_button = get_theme_mod('total_backtotop', true);
        if ($display_button) {
            ?>
            <div id="ht-back-top" class="ht-hide"><i class="fas fa-angle-up"></i></div>
            <?php
        }
    }

}

if (!function_exists('total_main_footer')) {

    function total_main_footer() {
        $total_footer_col = get_theme_mod('total_footer_col', 'col-4-1-1-1-1');
        $total_footer_array = explode('-', $total_footer_col);
        $count = count($total_footer_array);
        $footer_col = $count - 2;
        if (total_check_active_footer()) {
            ?>
            <div id="ht-main-footer">
                <div class="ht-container">
                    <div class="ht-main-footer <?php echo esc_attr($total_footer_col); ?>">
                        <?php
                        for ($i = 1; $i <= $footer_col; $i++) {
                            if (is_active_sidebar('total-footer' . $i)) {
                                ?>
                                <div class="ht-footer ht-footer<?php echo absint($i); ?>">
                                    <?php dynamic_sidebar('total-footer' . $i); ?>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
    }

}

if (!function_exists('total_bottom_footer')) {

    function total_bottom_footer() {
        ?>
        <div id="ht-bottom-footer">
            <div class="ht-container">
                <div class="ht-site-info ht-bottom-footer">
                    <?php
                    $show_credit = apply_filters('total_display_footer_credit', '__return_true');
                    $total_footer_copyright = get_theme_mod('total_footer_copyright');
                    if ($total_footer_copyright) {
                        echo do_shortcode($total_footer_copyright);
                        if ($show_credit) {
                            echo '<span class="sep"> | </span>';
                        }
                    }
                    if ($show_credit) {
                        printf(
                            // translators: 1-Theme URL, 2-Theme Author
                            esc_html__('%1$s by %2$s', 'total'), '<a href="https://hashthemes.com/wordpress-theme/total/" target="_blank">WordPress Theme - Total</a>', 'HashThemes');
                    }
                    ?>
                </div><!-- #site-info -->
            </div>
        </div>
        <?php
    }

}

if (!function_exists('total_footer_open')) {

    function total_footer_open() {
        $footer_class = apply_filters('total_footer_class', array('ht-site-footer'));
        echo '</div><!-- #content -->';
        echo '<footer id="ht-colophon" class="' . implode(' ', $footer_class) . '">';
    }

}

if (!function_exists('total_footer_close')) {

    function total_footer_close() {
        echo '</footer><!-- #colophon -->';
        echo '</div><!-- #page -->';
        wp_footer();
        echo '</body>';
        echo '</html>';
    }

}

add_action('total_footer_template', 'total_footer_open', 10);
add_action('total_footer_template', 'total_main_footer', 20);
add_action('total_footer_template', 'total_bottom_footer', 30);
add_action('total_footer_template', 'total_footer_close', 100);

add_action('wp_footer', 'total_scroll_top');

