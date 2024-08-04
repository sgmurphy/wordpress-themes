<?php
if (!function_exists('total_body_classes')) {

    function total_body_classes($classes) {
        if (is_multi_author()) {
            $classes[] = 'group-blog';
        }

        $website_layout = get_theme_mod('total_website_layout', 'wide');

        $classes[] = 'ht-' . $website_layout;

        $post_type = array('post', 'page');

        if (is_singular($post_type)) {
            global $post;
            $sidebar_layout = get_post_meta($post->ID, 'total_sidebar_layout', true);
            $total_hide_title = get_post_meta($post->ID, 'total_hide_title', true);

            if (!$sidebar_layout) {
                $sidebar_layout = 'right_sidebar';
            }

            $classes[] = 'ht_' . $sidebar_layout;
            $classes[] = !$total_hide_title ? 'ht-titlebar-enabled' : 'ht-titlebar-disabled';
        }

        $sticky_header = get_theme_mod('total_sticky_header_enable', 'off');

        if ($sticky_header == 'on') {
            $classes[] = 'ht-sticky-header';
        }

        $total_enable_frontpage = get_theme_mod('total_enable_frontpage', false);

        if (is_front_page() && $total_enable_frontpage) {
            $classes[] = 'ht-enable-frontpage';
        }

        return $classes;
    }

}

if (!function_exists('total_change_wp_page_menu_args')) {

    function total_change_wp_page_menu_args($args) {
        $args['menu_class'] = 'ht-menu ht-clearfix';
        return $args;
    }

}

if (!function_exists('total_breadcrumb_trial')) {

    function total_breadcrumb_trial() {
        $display_breadcrumb = get_theme_mod('total_breadcrumb_enable', true);
        if ($display_breadcrumb) {
            $args = array(
                'show_browse' => false,
            );
            breadcrumb_trail($args);
        }
    }

}

if (!function_exists('total_remove_hentry_class')) {

    function total_remove_hentry_class($classes) {
        if (is_singular(array('post', 'page'))) {
            $classes = array_diff($classes, array('hentry'));
        }
        return $classes;
    }

}

if (!function_exists('total_comments_content')) {

    function total_comments_content() {
        if (post_password_required()) {
            return;
        }
        ?>

        <div id="comments" class="comments-area">

            <?php if (have_comments()): ?>
                <h3 class="comments-title">
                    <?php
                    $total_comment_count = get_comments_number();
                    if ('1' === $total_comment_count) {
                        printf(
                            /* translators: 1: title. */
                            esc_html__('One thought on &ldquo;%1$s&rdquo;', 'total'), '<span>' . esc_html(get_the_title()) . '</span>'
                        );
                    } else {
                        printf(// WPCS: XSS OK.
                            /* translators: 1: comment count number, 2: title. */
                            esc_html(_nx('%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $total_comment_count, 'comments title', 'total')), number_format_i18n($total_comment_count), '<span>' . esc_html(get_the_title()) . '</span>'
                        );
                    }
                    ?>
                </h3>

                <ul class="comment-list">
                    <?php
                    wp_list_comments(array(
                        'callback' => 'total_comment'
                    ));
                    ?>
                </ul><!-- .comment-list -->

                <?php if (get_comment_pages_count() > 1 && get_option('page_comments')): // Are there comments to navigate through?        ?>
                    <nav id="comment-nav-above" class="navigation pagination">
                        <?php paginate_comments_links(); ?>
                    </nav>
                <?php endif; ?>

            <?php endif; ?>

            <?php
            if (!comments_open() && '0' != get_comments_number() && post_type_supports(get_post_type(), 'comments')):
                ?>
                <p class="no-comments"><?php esc_html_e('Comments are closed.', 'total'); ?></p>
            <?php endif; ?>

            <?php
            $commenter = wp_get_current_commenter();
            $req = get_option('require_name_email');
            $aria_req = ($req ? " aria-required='true'" : '');

            $fields = array(
                'author' =>
                    '<div class="author-email-url ht-clearfix"><p class="comment-form-author"><input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) .
                    '" size="30"' . $aria_req . ' placeholder="' . esc_attr__('Name', 'total') . ($req ? '*' : '') . '" /></p>',
                'email' =>
                    '<p class="comment-form-email"><input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) .
                    '" size="30"' . $aria_req . ' placeholder="' . esc_attr__('Email', 'total') . ($req ? '*' : '') . '" /></p>',
                'url' =>
                    '<p class="comment-form-url"><input id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) .
                    '" size="30" placeholder="' . esc_attr__('Website', 'total') . '" /></p></div>',
            );

            if (has_action('set_comment_cookies', 'wp_set_comment_cookies') && get_option('show_comments_cookies_opt_in')) {
                $consent = empty($commenter['comment_author_email']) ? '' : ' checked="checked"';
                $fields['cookies'] = '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' . '<label for="wp-comment-cookies-consent">' . esc_html__('Save my name, email, and website in this browser for the next time I comment.', 'total') . '</label></p>';
            }

            $args = array(
                'fields' => apply_filters('comment_form_default_fields', $fields),
                'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="' . esc_attr__('Comment', 'total') . '">' .
                    '</textarea></p>',
            );

            comment_form($args);
            ?>

        </div><!-- #comments -->
        <?php
    }

}

if (!function_exists('total_404_content')) {

    function total_404_content() {
        ?>

        <div class="ht-main-header">
            <div class="ht-container">
                <h1 class="ht-main-title"><?php esc_html_e('404 Error', 'total'); ?></h1>
                <?php do_action('total_breadcrumbs'); ?>
            </div>
        </div><!-- .entry-header -->


        <div class="ht-container">
            <div class="oops-text"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'total'); ?></div>
            <span class="error-404"><?php esc_html_e('404', 'total'); ?></span>
        </div>

        <?php
    }

}

if (!function_exists('total_create_elementor_kit')) {

    function total_create_elementor_kit() {
        if (!did_action('elementor/loaded')) {
            return;
        }

        $kit = Elementor\Plugin::$instance->kits_manager->get_active_kit();

        if (!$kit->get_id()) {
            $created_default_kit = Elementor\Plugin::$instance->kits_manager->create_default();
            update_option('elementor_active_kit', $created_default_kit);
        }
    }

}

if (!function_exists('total_enable_wpform_export')) {

    function total_enable_wpform_export($args) {
        $args['can_export'] = true;
        return $args;
    }

}

if (!function_exists('total_premium_demo_config')) {

    function total_premium_demo_config($demos) {
        $premium_demos = array(
            'wave' => array(
                'name' => 'Total Plus - Wave',
                'type' => 'pro',
                'buy_url' => 'https://hashthemes.com/wordpress-theme/wave/',
                'image' => 'https://hashthemes.com/import-files/totalplus/screen/wave.jpg',
                'preview_url' => 'https://demo.hashthemes.com/total-plus/wave/',
            ),
            'total' => array(
                'name' => 'Total Plus - Total',
                'type' => 'pro',
                'buy_url' => 'https://hashthemes.com/wordpress-theme/total/',
                'image' => 'https://hashthemes.com/import-files/totalplus/screen/total.jpg',
                'preview_url' => 'https://demo.hashthemes.com/total-plus/total/',
            ),
            'main-demo' => array(
                'name' => 'Total Plus - Main Demo',
                'type' => 'pro',
                'buy_url' => 'https://hashthemes.com/wordpress-theme/total/',
                'image' => 'https://hashthemes.com/import-files/totalplus/screen/main-demo.jpg',
                'preview_url' => 'https://demo.hashthemes.com/total-plus/main/'
            ),
            'creative-agency' => array(
                'name' => 'Total Plus - Creative Agency',
                'type' => 'pro',
                'buy_url' => 'https://hashthemes.com/wordpress-theme/total/',
                'image' => 'https://hashthemes.com/import-files/totalplus/screen/creative-agency.jpg',
                'preview_url' => 'https://demo.hashthemes.com/total-plus/creative-agency'
            ),
            'one-page' => array(
                'name' => 'Total Plus - One Page',
                'type' => 'pro',
                'buy_url' => 'https://hashthemes.com/wordpress-theme/total/',
                'image' => 'https://hashthemes.com/import-files/totalplus/screen/one-page.jpg',
                'preview_url' => 'https://demo.hashthemes.com/total-plus/one-page'
            ),
            'construction' => array(
                'name' => 'Total Plus - Construction',
                'type' => 'pro',
                'buy_url' => 'https://hashthemes.com/wordpress-theme/total/',
                'image' => 'https://hashthemes.com/import-files/totalplus/screen/construction.jpg',
                'preview_url' => 'https://demo.hashthemes.com/total-plus/construction'
            ));

        $demos = array_merge($demos, $premium_demos);

        return $demos;
    }

}

if (!function_exists('total_register_required_plugins')) {

    function total_register_required_plugins() {
        $plugins = array(
            array(
                'name' => 'HashThemes Demo Importer',
                'slug' => 'hashthemes-demo-importer',
                'required' => false,
            ),
            array(
                'name' => 'Simple Floating Menu',
                'slug' => 'simple-floating-menu',
                'required' => false,
            ),
            array(
                'name' => 'Elementor',
                'slug' => 'elementor',
                'required' => false,
            ),
            array(
                'name' => 'Hash Elements',
                'slug' => 'hash-elements',
                'required' => false,
            ),
            array(
                'name' => 'Hash Form - Drag & Drop Form Builder',
                'slug' => 'hash-form',
                'required' => false,
            ),
        );

        $config = array(
            'id' => 'total', // Unique ID for hashing notices for multiple instances of TGMPA.
            'default_path' => '', // Default absolute path to bundled plugins.
            'menu' => 'total-install-plugins', // Menu slug.
            'has_notices' => true, // Show admin notices or not.
            'dismissable' => true, // If false, a user cannot dismiss the nag message.
            'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
            'is_automatic' => true, // Automatically activate plugins after installation or not.
            'message' => '', // Message to output right before the plugins table.
        );

        tgmpa($plugins, $config);
    }

}

if (!function_exists('total_add_custom_fonts')) {

    function total_add_custom_fonts($fonts) {
        if (class_exists('Hash_Custom_Font_Uploader_Public')) {
            if (!empty(Hash_Custom_Font_Uploader_Public::get_all_fonts_list())) {
                $new_fonts = array(
                    'label' => esc_html__('Custom Fonts', 'total'),
                    'fonts' => Hash_Custom_Font_Uploader_Public::get_all_fonts_list()
                );
                array_unshift($fonts, $new_fonts);
            }
        }
        return $fonts;
    }

}

add_filter('total_regsiter_fonts', 'total_add_custom_fonts');
add_filter('body_class', 'total_body_classes');
add_filter('post_class', 'total_remove_hentry_class');
add_action('total_breadcrumbs', 'total_breadcrumb_trial');
add_filter('wp_page_menu_args', 'total_change_wp_page_menu_args');
add_action('total_comments_template', 'total_comments_content');
add_action('total_404_template', 'total_404_content');
add_action('tgmpa_register', 'total_register_required_plugins');
add_filter('hdi_import_files', 'total_premium_demo_config');
add_action('init', 'total_create_elementor_kit');
add_filter('wpforms_post_type_args', 'total_enable_wpform_export');

