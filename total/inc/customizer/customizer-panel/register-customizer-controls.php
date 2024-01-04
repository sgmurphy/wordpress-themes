<?php

if (!class_exists('Total_Register_Customizer_Controls')) {

    class Total_Register_Customizer_Controls {

        function __construct() {
            add_action('customize_register', array($this, 'register_customizer_settings'));
            add_action('customize_controls_enqueue_scripts', array($this, 'enqueue_customizer_script'));
            add_action('customize_preview_init', array($this, 'enqueue_customize_preview_js'));
        }

        public function register_customizer_settings($wp_customize) {
            /** Theme Options */
            require TOTAL_CUSTOMIZER_PATH . 'customizer-panel/homepage-settings.php';
            require TOTAL_CUSTOMIZER_PATH . 'customizer-panel/general-settings.php';
            require TOTAL_CUSTOMIZER_PATH . 'customizer-panel/typography-settings.php';
            require TOTAL_CUSTOMIZER_PATH . 'customizer-panel/color-settings.php';
            require TOTAL_CUSTOMIZER_PATH . 'customizer-panel/header-settings.php';
            require TOTAL_CUSTOMIZER_PATH . 'customizer-panel/single-post-settings.php';
            require TOTAL_CUSTOMIZER_PATH . 'customizer-panel/home-sections.php';
            require TOTAL_CUSTOMIZER_PATH . 'customizer-panel/footer-settings.php';

            /** For Additional Hooks */
            do_action('total_new_options', $wp_customize);
        }

        public function enqueue_customizer_script() {
            wp_enqueue_script('total-customizer', TOTAL_CUSTOMIZER_URL . 'customizer-panel/assets/customizer.js', array('jquery'), TOTAL_VERSION, true);
            if (is_rtl()) {
                wp_enqueue_style('total-customizer', TOTAL_CUSTOMIZER_URL . 'customizer-panel/assets/customizer.rtl.css', array(), TOTAL_VERSION);
            } else {
                wp_enqueue_style('total-customizer', TOTAL_CUSTOMIZER_URL . 'customizer-panel/assets/customizer.css', array(), TOTAL_VERSION);
            }

            wp_enqueue_style('font-awesome-v4-shims', get_template_directory_uri() . '/css/v4-shims.css', array(), TOTAL_VERSION);
        }

        public function enqueue_customize_preview_js() {
            wp_enqueue_script('total-customizer-preview', TOTAL_CUSTOMIZER_URL . 'customizer-panel/assets/customizer-preview.js', array('customize-preview'), TOTAL_VERSION, true);
        }

    }

    new Total_Register_Customizer_Controls();
}
