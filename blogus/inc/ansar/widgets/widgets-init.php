<?php

// Load widget base.
require_once get_template_directory() . '/inc/ansar/widgets/widgets-base.php';

/* Theme Widget sidebars. */
require get_template_directory() . '/inc/ansar/widgets/widgets-common-functions.php';

/* Theme Widgets*/

require get_template_directory() . '/inc/ansar/widgets/widget-author-info.php';
require get_template_directory() . '/inc/ansar/widgets/widget-recent-post.php';
require get_template_directory() . '/inc/ansar/widgets/widget-featured-post-widget.php';


/* Register site widgets */
if ( ! function_exists( 'blogus_widgets' ) ) :
    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function blogus_widgets() {
         
        register_widget( 'Blogus_author_info');
        register_widget( 'featured_post_Widget');

    }
endif;
add_action( 'widgets_init', 'blogus_widgets' );