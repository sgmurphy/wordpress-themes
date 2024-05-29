<?php

defined('ABSPATH') or die('No script please!');

define('TOTAL_CUSTOMIZER_URL', get_template_directory_uri() . '/inc/customizer/');
define('TOTAL_CUSTOMIZER_PATH', get_template_directory() . '/inc/customizer/');

if (!class_exists('Total_Customizer')) {

    class Total_Customizer {

        function __construct() {

            require TOTAL_CUSTOMIZER_PATH . 'customizer-functions.php';
            require TOTAL_CUSTOMIZER_PATH . 'custom-controls/typography/typography.php';
            
            if (!class_exists('TotalPlusCustomizer\Customizer')) {
                require TOTAL_CUSTOMIZER_PATH . 'customizer-custom-controls.php';
                require TOTAL_CUSTOMIZER_PATH . 'customizer-control-sanitization.php';
                require TOTAL_CUSTOMIZER_PATH . 'customizer-icon-manager.php';
                require TOTAL_CUSTOMIZER_PATH . 'customizer-panel/register-customizer-controls.php';
            }
        }

    }

    new Total_Customizer();
}


