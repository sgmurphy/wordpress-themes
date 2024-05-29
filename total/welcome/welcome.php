<?php
if (!class_exists('Total_Welcome')) :

    class Total_Welcome {

        public $tab_sections = array();
        public $theme_name = ''; // For storing Theme Name
        public $theme_version = ''; // For Storing Theme Current Version Information
        public $free_plugins = array(); // For Storing the list of the Recommended Free Plugins

        /**
         * Constructor for the Welcome Screen
         */

        public function __construct() {

            /** Useful Variables */
            $theme = wp_get_theme();
            $this->theme_name = $theme->Name;
            $this->theme_version = $theme->Version;

            /** Define Tabs Sections */
            $this->tab_sections = array(
                'getting_started' => esc_html__('Getting Started', 'total'),
                'recommended_plugins' => esc_html__('Recommended Plugins', 'total'),
                'support' => esc_html__('Support', 'total'),
                'free_vs_pro' => esc_html__('Free Vs Pro', 'total')
            );

            /** List of Recommended Free Plugins */
            $this->free_plugins = array(
                'hashthemes-demo-importer' => array(
                    'name' => 'HashThemes Demo Importer',
                    'slug' => 'hashthemes-demo-importer',
                    'filename' => 'hashthemes-demo-importer',
                    'thumb_path' => 'https://ps.w.org/hashthemes-demo-importer/assets/icon-256x256.png'
                ),
                'elementor' => array(
                    'name' => 'Elementor Page Builder',
                    'slug' => 'elementor',
                    'filename' => 'elementor',
                    'thumb_path' => 'https://ps.w.org/elementor/assets/icon-256x256.png'
                ),
                'hash-form' => array(
                    'name' => 'Hash Form - Drag & Drop Form Builder',
                    'slug' => 'hash-form',
                    'filename' => 'hash-form',
                    'thumb_path' => 'https://ps.w.org/hash-form/assets/icon-256x256.gif'
                ),
                'hash-elements' => array(
                    'name' => 'Hash Elements',
                    'slug' => 'hash-elements',
                    'filename' => 'hash-elements',
                    'thumb_path' => 'https://ps.w.org/hash-elements/assets/icon-256x256.png'
                ),
                'simple-floating-menu' => array(
                    'name' => 'Simple Floating Menu',
                    'slug' => 'simple-floating-menu',
                    'filename' => 'simple-floating-menu',
                    'thumb_path' => 'https://ps.w.org/simple-floating-menu/assets/icon-256x256.png'
                ),
                'mini-ajax-woo-cart' => array(
                    'name' => 'Ajax Cart for WooCommerce',
                    'slug' => 'mini-ajax-woo-cart',
                    'filename' => 'mini-ajax-woo-cart',
                    'thumb_path' => 'https://ps.w.org/mini-ajax-woo-cart/assets/icon-256x256.gif'
                ),
            );

            /* Create a Welcome Page */
            add_action('admin_menu', array($this, 'welcome_register_menu'));

            /* Enqueue Styles & Scripts for Welcome Page */
            add_action('admin_enqueue_scripts', array($this, 'welcome_styles_and_scripts'));

            /* Adds Footer Rating Text */
            add_filter('admin_footer_text', array($this, 'admin_footer_text'));

            /* Create a Welcome Page */
            add_action('wp_loaded', array($this, 'admin_notice'), 20);

            add_action('after_switch_theme', array($this, 'erase_hide_notice'));

            add_action('wp_ajax_total_activate_plugin', array($this, 'activate_plugin'));

            add_action('admin_init', array($this, 'welcome_init'));
        }

        /** Trigger Welcome Message Notification */
        public function admin_notice() {
            add_action('admin_notices', array($this, 'admin_notice_content'));
        }

        /** Welcome Message Notification */
        public function admin_notice_content() {
            if (!$this->is_dismissed('welcome')) {
                $this->total_notice();
            }

            if (!$this->is_dismissed('review') && !empty(get_option('total_first_activation')) && time() > get_option('total_first_activation') + 15 * DAY_IN_SECONDS) {
                $this->review_notice();
            }
        }

        private function total_notice() {
            $screen = get_current_screen();

            if ('appearance_page_total-welcome' === $screen->id || (isset($screen->parent_file) && 'plugins.php' === $screen->parent_file && 'update' === $screen->id) || 'theme-install' === $screen->id) {
                return;
            }

            $slug = $filename = 'hashthemes-demo-importer';
            ?>
            <div class="updated notice total-welcome-notice total-notice">
                <?php $this->dismiss_button('welcome'); ?>
                <div class="total-welcome-notice-wrap">
                    <h2><?php esc_html_e('Congratulations!', 'total'); ?></h2>
                    <p><?php printf(esc_html__('%1$s is now installed and ready to use. You can start either by importing the ready made demo or get started by customizing it your self.', 'total'), $this->theme_name); ?></p>

                    <div class="total-welcome-info">
                        <div class="total-welcome-thumb">
                            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/screenshot.jpg'); ?>" alt="<?php echo esc_attr__('Total Demo', 'total'); ?>">
                        </div>

                        <?php
                        if ('appearance_page_hdi-demo-importer' !== $screen->id) {
                            ?>
                            <div class="total-welcome-import">
                                <h3><?php esc_html_e('Import Demo', 'total'); ?></h3>
                                <p><?php esc_html_e('Click below to install and active HashThemes Demo Importer Plugin.', 'total'); ?></p>
                                <p><?php echo $this->generate_hdi_install_button(); ?></p>
                            </div>
                            <?php
                        }
                        ?>

                        <div class="total-welcome-getting-started">
                            <h3><?php esc_html_e('Get Started', 'total'); ?></h3>
                            <p><?php printf(esc_html__('Here you will find all the necessary links and information on how to use %s.', 'total'), $this->theme_name); ?></p>
                            <p><a href="<?php echo esc_url(admin_url('admin.php?page=total-welcome')); ?>" class="button button-primary"><?php esc_html_e('Go to Setting Page', 'total'); ?></a></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }

        /** Register Menu for Welcome Page */
        public function welcome_register_menu() {
            add_menu_page(esc_html__('Welcome', 'total'), sprintf(esc_html__('%s Settings', 'total'), esc_html(str_replace(' ', '', $this->theme_name))), 'manage_options', 'total-welcome', array($this, 'welcome_screen'), 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA4MC4zNiA4MC4zNiI+PGRlZnM+PHN0eWxlPi5jbHMtMXtmaWxsOiNmZmY7fTwvc3R5bGU+PC9kZWZzPjx0aXRsZT5zc0Fzc2V0IDRAMzJ4PC90aXRsZT48ZyBpZD0iTGF5ZXJfMiIgZGF0YS1uYW1lPSJMYXllciAyIj48ZyBpZD0iTGF5ZXJfMS0yIiBkYXRhLW5hbWU9IkxheWVyIDEiPjxwYXRoIGNsYXNzPSJjbHMtMSIgZD0iTTczLDgwLjM2QTcuMzMsNy4zMywwLDAsMCw4MC4zNiw3M1Y3LjMzQTcuMzMsNy4zMywwLDAsMCw3MywwSDcuMzNBNy4zMyw3LjMzLDAsMCwwLDAsNy4zM1Y3M2E3LjMzLDcuMzMsMCwwLDAsNy4zMyw3LjMzWk01OC4yNiw0LjE0bDcsMy4yM0wyMi4xMywyNy4xMWwtNy0zLjIzWm0tOS4zNSwxOS0uNDYuN1Y3Mi45NGwtNy4zOSwzLjM1VjI4bC0xLjE2LS42OS0xNyw3Ljc0VjI4LjQ5TDY2LjM0LDguNjR2Ni41OFpNMjEuMzIsMzUuMDhsLTcuMzktMy4yNFYyNS4yNmw3LjM5LDMuMzVaTTMyLjA1LDcyLjk0VjMyLjY1bDcuMzktMy4zNXY0N1oiLz48L2c+PC9nPjwvc3ZnPg==', 60);
        }

        /** Welcome Page */
        public function welcome_screen() {
            $tabs = $this->tab_sections;
            ?>
            <div class="welcome-wrap">
                <div class="welcome-main-content">
                    <?php require_once get_template_directory() . '/welcome/sections/header.php'; ?>

                    <div class="welcome-section-wrapper">
                        <?php $section = isset($_GET['section']) && array_key_exists($_GET['section'], $tabs) ? $_GET['section'] : 'getting_started'; ?>

                        <div class="welcome-section <?php echo esc_attr($section); ?> clearfix">
                            <?php require_once get_template_directory() . '/welcome/sections/' . $section . '.php'; ?>
                        </div>
                    </div>
                </div>

                <div class="welcome-footer-content">
                    <?php require_once get_template_directory() . '/welcome/sections/footer.php'; ?>
                </div>
            </div>
            <?php
        }

        /** Enqueue Necessary Styles and Scripts for the Welcome Page */
        public function welcome_styles_and_scripts($hook) {
            if ('theme-install.php' !== $hook) {
                $importer_params = array(
                    'installing_text' => esc_html__('Installing Demo Importer Plugin', 'total'),
                    'activating_text' => esc_html__('Activating Demo Importer Plugin', 'total'),
                    'importer_page' => esc_html__('Go to Demo Importer Page', 'total'),
                    'importer_url' => admin_url('themes.php?page=hdi-demo-importer'),
                    'error' => esc_html__('Error! Reload the page and try again.', 'total'),
                    'ajax_nonce' => wp_create_nonce('total_activate_hdi_plugin')
                );
                wp_enqueue_script('total-welcome', get_template_directory_uri() . '/welcome/js/welcome.js', array('plugin-install', 'updates'), TOTAL_VERSION, true);
                wp_localize_script('total-welcome', 'importer_params', $importer_params);
            }

            if (is_rtl()) {
                wp_enqueue_style('total-welcome', get_template_directory_uri() . '/welcome/css/welcome.rtl.css', array(), TOTAL_VERSION);
            } else {
                wp_enqueue_style('total-welcome', get_template_directory_uri() . '/welcome/css/welcome.css', array(), TOTAL_VERSION);
            }
        }

        /* Check if plugin is installed */

        public function check_plugin_installed_state($slug, $filename) {
            return file_exists(ABSPATH . 'wp-content/plugins/' . $slug . '/' . $filename . '.php') ? true : false;
        }

        /* Check if plugin is activated */

        public function check_plugin_active_state($slug, $filename) {
            return is_plugin_active($slug . '/' . $filename . '.php') ? true : false;
        }

        /** Generate Url for the Plugin Button */
        public function plugin_generate_url($status, $slug, $file_name) {
            switch ($status) {
                case 'install':
                    return wp_nonce_url(add_query_arg(array(
                        'action' => 'install-plugin',
                        'plugin' => esc_attr($slug)
                                    ), network_admin_url('update.php')), 'install-plugin_' . esc_attr($slug));
                    break;

                case 'inactive':
                    return add_query_arg(array(
                        'action' => 'deactivate',
                        'plugin' => rawurlencode(esc_attr($slug) . '/' . esc_attr($file_name) . '.php'),
                        'plugin_status' => 'all',
                        'paged' => '1',
                        '_wpnonce' => wp_create_nonce('deactivate-plugin_' . esc_attr($slug) . '/' . esc_attr($file_name) . '.php'),
                            ), network_admin_url('plugins.php'));
                    break;

                case 'active':
                    return add_query_arg(array(
                        'action' => 'activate',
                        'plugin' => rawurlencode(esc_attr($slug) . '/' . esc_attr($file_name) . '.php'),
                        'plugin_status' => 'all',
                        'paged' => '1',
                        '_wpnonce' => wp_create_nonce('activate-plugin_' . esc_attr($slug) . '/' . esc_attr($file_name) . '.php'),
                            ), network_admin_url('plugins.php'));
                    break;
            }
        }

        /** Ajax Plugin Activation */
        public function activate_plugin() {
            if (!current_user_can('manage_options')) {
                return;
            }

            check_ajax_referer('total_activate_hdi_plugin', 'security');

            $slug = isset($_POST['slug']) ? $_POST['slug'] : '';
            $file = isset($_POST['file']) ? $_POST['file'] : '';
            $success = false;

            if (!empty($slug) && !empty($file)) {
                $result = activate_plugin($slug . '/' . $file . '.php');
                self::dismiss('welcome');
                if (!is_wp_error($result)) {
                    $success = true;
                }
            }
            echo wp_json_encode(array('success' => $success));
            die();
        }

        /** Adds Footer Notes */
        public function admin_footer_text($text) {
            $screen = get_current_screen();

            if ('toplevel_page_total-welcome' == $screen->id) {
                $text = sprintf(esc_html__('Please leave us a %s rating if you like our theme . A huge thank you from HashThemes in advance!', 'total'), '<a href="https://wordpress.org/support/theme/total/reviews/?filter=5#new-post" target="_blank">&#9733;&#9733;&#9733;&#9733;&#9733;</a>');
            }

            return $text;
        }

        /** Generate HashThemes Demo Importer Install Button Link */
        public function generate_hdi_install_button() {
            $slug = $filename = 'hashthemes-demo-importer';
            $import_url = '#';

            if ($this->check_plugin_installed_state($slug, $filename) && !$this->check_plugin_active_state($slug, $filename)) {
                $import_class = 'button button-primary total-activate-plugin';
                $import_button_text = esc_html__('Activate Demo Importer Plugin', 'total');
            } elseif ($this->check_plugin_installed_state($slug, $filename)) {
                $import_class = 'button button-primary';
                $import_button_text = esc_html__('Go to Demo Importer Page', 'total');
                $import_url = admin_url('themes.php?page=hdi-demo-importer');
            } else {
                $import_class = 'button button-primary total-install-plugin';
                $import_button_text = esc_html__('Install Demo Importer Plugin', 'total');
            }
            return '<a data-slug="' . esc_attr($slug) . '" data-filename="' . esc_attr($filename) . '" class="' . esc_attr($import_class) . '" href="' . $import_url . '">' . esc_html($import_button_text) . '</a>';
        }

        public function erase_hide_notice() {
            delete_option('total_dismissed_notices');
            delete_option('total_first_activation');
        }

        /**
         * Has a notice been dismissed?
         *
         * @param string $notice Notice name
         * @return bool
         */
        public static function is_dismissed($notice) {
            $dismissed = get_option('total_dismissed_notices', array());

            // Handle legacy user meta
            $dismissed_meta = get_user_meta(get_current_user_id(), 'total_dismissed_notices', true);
            if (is_array($dismissed_meta)) {
                if (array_diff($dismissed_meta, $dismissed)) {
                    $dismissed = array_merge($dismissed, $dismissed_meta);
                    update_option('total_dismissed_notices', $dismissed);
                }
                if (!is_multisite()) {
                    // Don't delete on multisite to avoid the notices to appear in other sites.
                    delete_user_meta(get_current_user_id(), 'total_dismissed_notices');
                }
            }

            return in_array($notice, $dismissed);
        }

        /**
         * Displays a dismiss button
         *
         * @param string $name Notice name
         * @return void
         */
        public function dismiss_button($name) {
            printf('<a class="notice-dismiss" href="%s"><span class="screen-reader-text">%s</span></a>', esc_url(wp_nonce_url(add_query_arg('total-hide-notice', $name), $name, 'total_notice_nonce')), esc_html__('Dismiss this notice.', 'total')
            );
        }

        /**
         * Handle a click on the dismiss button
         *
         * @return void
         */
        public function welcome_init() {
            if (!get_option('total_first_activation')) {
                update_option('total_first_activation', time());
            }

            if (get_option('total_hide_notice') && !$this->is_dismissed('welcome')) {
                delete_option('total_hide_notice');
                self::dismiss('welcome');
            }

            if (isset($_GET['total-hide-notice'], $_GET['total_notice_nonce'])) {
                $notice = sanitize_key($_GET['total-hide-notice']);
                if (check_admin_referer($notice, 'total_notice_nonce')) {
                    self::dismiss($notice);
                    wp_safe_redirect(remove_query_arg(array('total-hide-notice', 'total_notice_nonce'), wp_get_referer()));
                    exit;
                }
            }
        }

        /**
         * Displays a notice asking for a review
         *
         * @return void
         */
        private function review_notice() {
            ?>
            <div class="total-notice notice notice-info">
                <?php $this->dismiss_button('review'); ?>
                <div class="total-notice-logo">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80.36 80.36">
                        <g>
                            <path d="M73 80.36A7.33 7.33 0 0 0 80.36 73V7.33A7.33 7.33 0 0 0 73 0H7.33A7.33 7.33 0 0 0 0 7.33V73a7.33 7.33 0 0 0 7.33 7.33ZM58.26 4.14l7 3.23-43.13 19.74-7-3.23Zm-9.35 19-.46.7v49.1l-7.39 3.35V28l-1.16-.69-17 7.74v-6.56L66.34 8.64v6.58ZM21.32 35.08l-7.39-3.24v-6.58l7.39 3.35Zm10.73 37.86V32.65l7.39-3.35v47Z"/>
                        </g>
                    </svg>
                </div>

                <div class="total-notice-content">
                    <p>
                        <?php
                        printf(
                                /* translators: %1$s is link start tag, %2$s is link end tag. */
                                esc_html__('Great to see that you have been using Total Theme for some time. We hope you love it, and we would really appreciate it if you would %1$sgive us a 5 stars rating%2$s and spread your words to the world.', 'total'), '<a target="_blank" href="https://wordpress.org/support/theme/total/reviews/?filter=5#new-post">', '</a>'
                        );
                        ?>
                    </p>
                    <a target="_blank" class="button button-primary button-large" href="https://wordpress.org/support/theme/total/reviews/?filter=5#new-post"><span class="dashicons dashicons-thumbs-up"></span><?php echo esc_html__('Yes, of course', 'total') ?></a> &nbsp;
                    <a class="button button-large" href="<?php echo esc_url(wp_nonce_url(add_query_arg('total-hide-notice', 'review'), 'review', 'total_notice_nonce')); ?>"><span class="dashicons dashicons-yes"></span><?php echo esc_html__('I have already rated', 'total') ?></a>
                </div>
            </div>
            <?php
        }

        /**
         * Stores a dismissed notice in database
         *
         * @param string $notice
         * @return void
         */
        public static function dismiss($notice) {
            $dismissed = get_option('total_dismissed_notices', array());

            if (!in_array($notice, $dismissed)) {
                $dismissed[] = $notice;
                update_option('total_dismissed_notices', array_unique($dismissed));
            }
        }

    }

    new Total_Welcome();

endif;
