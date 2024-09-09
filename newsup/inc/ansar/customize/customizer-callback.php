<?php
/**
 * Customizer callback functions for active_callback.
 *
 * @package Newsup
 */

/*select page for newsup_popular_tags_section_status*/
if (!function_exists('newsup_popular_tags_section_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function newsup_popular_tags_section_status($control){
        if (true == $control->manager->get_setting('show_popular_tags_section')->value()) {
            return true;
        } else {
            return false;
        }
    }
endif;

/*select page for newsup_flash_posts_section_status*/
if (!function_exists('newsup_flash_posts_section_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function newsup_flash_posts_section_status($control) {
        if (true == $control->manager->get_setting('show_flash_news_section')->value()) {
            return true;
        } else {
            return false;
        }
    }
endif;

/*select page for slider*/
if (!function_exists('newsup_main_banner_section_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function newsup_main_banner_section_status($control){
        if (true == $control->manager->get_setting('show_main_news_section')->value()) {
            return true;
        } else {
            return false;
        }
    }
endif;

/*select page for newsup_header_image_overlay_status*/
if (!function_exists('newsup_header_image_overlay_status')) :

    /**
     * Check if ticker section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function newsup_header_image_overlay_status($control){
        if (true !== $control->manager->get_setting('remove_header_image_overlay')->value()) {
            return true;
        } else {
            return false;
        }
    }
endif;