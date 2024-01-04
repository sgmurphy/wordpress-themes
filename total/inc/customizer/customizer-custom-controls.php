<?php

if (!class_exists('Total_Customizer_Custom_Controls')) {

    class Total_Customizer_Custom_Controls {

        function __construct() {
            add_action('customize_register', array($this, 'register_controls'));
            add_action('customize_controls_enqueue_scripts', array($this, 'enqueue_customizer_script'));
        }

        public function register_controls($wp_customize) {
            require TOTAL_CUSTOMIZER_PATH . 'custom-controls/alpha-color-control.php';
            require TOTAL_CUSTOMIZER_PATH . 'custom-controls/background-image-control.php';
            require TOTAL_CUSTOMIZER_PATH . 'custom-controls/color-tab-control.php';
            require TOTAL_CUSTOMIZER_PATH . 'custom-controls/date-control.php';
            require TOTAL_CUSTOMIZER_PATH . 'custom-controls/editor-control.php';
            require TOTAL_CUSTOMIZER_PATH . 'custom-controls/dimensions-control.php';
            require TOTAL_CUSTOMIZER_PATH . 'custom-controls/gallery-control.php';
            require TOTAL_CUSTOMIZER_PATH . 'custom-controls/graident-control.php';
            require TOTAL_CUSTOMIZER_PATH . 'custom-controls/heading-control.php';
            require TOTAL_CUSTOMIZER_PATH . 'custom-controls/icon-selector-control.php';
            require TOTAL_CUSTOMIZER_PATH . 'custom-controls/image-selector-control.php';
            require TOTAL_CUSTOMIZER_PATH . 'custom-controls/multiple-checkbox-control.php';
            require TOTAL_CUSTOMIZER_PATH . 'custom-controls/multiple-select-control.php';
            require TOTAL_CUSTOMIZER_PATH . 'custom-controls/multiple-selectize-control.php';
            require TOTAL_CUSTOMIZER_PATH . 'custom-controls/range-slider-control.php';
            require TOTAL_CUSTOMIZER_PATH . 'custom-controls/repeater-control.php';
            require TOTAL_CUSTOMIZER_PATH . 'custom-controls/responsive-range-slider-control.php';
            require TOTAL_CUSTOMIZER_PATH . 'custom-controls/chosen-select-control.php';
            require TOTAL_CUSTOMIZER_PATH . 'custom-controls/selector-control.php';
            require TOTAL_CUSTOMIZER_PATH . 'custom-controls/separator-control.php';
            require TOTAL_CUSTOMIZER_PATH . 'custom-controls/sortable-control.php';
            require TOTAL_CUSTOMIZER_PATH . 'custom-controls/switch-control.php';
            require TOTAL_CUSTOMIZER_PATH . 'custom-controls/tab-control.php';
            require TOTAL_CUSTOMIZER_PATH . 'custom-controls/text-info-control.php';
            require TOTAL_CUSTOMIZER_PATH . 'custom-controls/text-selector-control.php';
            require TOTAL_CUSTOMIZER_PATH . 'custom-controls/toggle-control.php';
            require TOTAL_CUSTOMIZER_PATH . 'custom-controls/typography/typography-control-class.php';
            require TOTAL_CUSTOMIZER_PATH . 'custom-controls/column-control/column-control.php';
            require TOTAL_CUSTOMIZER_PATH . 'custom-controls/preloader-control.php';
            require TOTAL_CUSTOMIZER_PATH . 'custom-controls/upgrade-section.php';
            require TOTAL_CUSTOMIZER_PATH . 'custom-controls/upgrade-info.php';
            require TOTAL_CUSTOMIZER_PATH . 'custom-controls/toggle-section.php';
            require TOTAL_CUSTOMIZER_PATH . 'custom-controls/border-control.php';
            require TOTAL_CUSTOMIZER_PATH . 'custom-controls/box-shadow-control.php';

            /** Register Control Type */
            $wp_customize->register_control_type('Total_Color_Tab_Control');
            $wp_customize->register_control_type('Total_Background_Image_Control');
            $wp_customize->register_control_type('Total_Tab_Control');
            $wp_customize->register_control_type('Total_Dimensions_Control');
            $wp_customize->register_control_type('Total_Responsive_Range_Slider_Control');
            $wp_customize->register_control_type('Total_Sortable_Control');
            $wp_customize->register_control_type('Total_Typography_Control');
            $wp_customize->register_control_type('Total_Icon_Selector_Control');
            $wp_customize->register_control_type('Total_Border_Control');
            $wp_customize->register_control_type('Total_Box_Shadow_Control');

            // Register custom section types.
            $wp_customize->register_section_type('Total_Upgrade_Section');
            $wp_customize->register_section_type('Total_Toggle_Section');
        }

        public function enqueue_customizer_script() {
            //See customizer-fonts-iucon.php file
            $icons = apply_filters('total_register_icon', array());

            if ($icons && is_array($icons)) {
                foreach ($icons as $icon) {
                    if (isset($icon['name']) && isset($icon['url'])) {
                        wp_enqueue_style($icon['name'], $icon['url'], array(), TOTAL_VERSION);
                    }
                }
            }

            wp_enqueue_script('selectize', TOTAL_CUSTOMIZER_URL . 'custom-controls/assets/js/selectize.js', array('jquery'), TOTAL_VERSION, true);
            wp_enqueue_script('chosen-jquery', TOTAL_CUSTOMIZER_URL . 'custom-controls/assets/js/chosen.jquery.js', array('jquery'), TOTAL_VERSION, true);
            wp_enqueue_script('wp-color-picker-alpha', TOTAL_CUSTOMIZER_URL . 'custom-controls/assets/js/wp-color-picker-alpha.js', array('jquery', 'wp-color-picker'), TOTAL_VERSION, true);
            wp_enqueue_script('total-customizer-control', TOTAL_CUSTOMIZER_URL . 'custom-controls/assets/js/customizer-controls.js', array('jquery', 'jquery-ui-datepicker'), TOTAL_VERSION, true);

            wp_enqueue_style('selectize', TOTAL_CUSTOMIZER_URL . 'custom-controls/assets/css/selectize.css', array(), TOTAL_VERSION);
            wp_enqueue_style('chosen', TOTAL_CUSTOMIZER_URL . 'custom-controls/assets/css/chosen.css', array(), TOTAL_VERSION);
            wp_enqueue_style('total-preloader', TOTAL_CUSTOMIZER_URL . 'preloader/css/preloader.css', array('wp-color-picker'), TOTAL_VERSION);
            wp_enqueue_style('font-awesome-v4-shims', get_template_directory_uri() . '/css/v4-shims.css', array(), TOTAL_VERSION);
            if (is_rtl()) {
                wp_enqueue_style('total-customizer-control', TOTAL_CUSTOMIZER_URL . 'custom-controls/assets/css/customizer-controls.rtl.css', array('wp-color-picker'), TOTAL_VERSION);
            } else {
                wp_enqueue_style('total-customizer-control', TOTAL_CUSTOMIZER_URL . 'custom-controls/assets/css/customizer-controls.css', array('wp-color-picker'), TOTAL_VERSION);
            }
        }

    }

    new Total_Customizer_Custom_Controls();
}



