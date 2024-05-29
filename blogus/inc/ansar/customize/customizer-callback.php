<?php
/**
 * Customizer callback functions for active_callback.
 *
 * @package Blogus
 */

/*select page for slider*/
if (!function_exists('blogus_main_banner_section_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function blogus_main_banner_section_status($control)
    {

        if (true == $control->manager->get_setting('show_main_news_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for Featured links*/
if (!function_exists('blogus_featued_links_section_status')) :

    /**
     * Check if Featured links section is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function blogus_featued_links_section_status($control)
    {

        if (true == $control->manager->get_setting('show_featured_links_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

if (!function_exists('content_layout_status')) :

    function content_layout_status($control)
    {
        if ( ($control->manager->get_setting('blogus_content_layout')->value() == 'align-content-left') || ($control->manager->get_setting('blogus_content_layout')->value() == 'full-width-content') || ($control->manager->get_setting('blogus_content_layout')->value() == 'align-content-right')) {
            return true;
        } else {
            return false;
        }

    }

endif;
