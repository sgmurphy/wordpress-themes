<?php
if (!function_exists('blogus_header_type_section')) :
/**
 *  Header
 *
 * @since Blogus
 *
 */
function blogus_header_type_section()
{
$header_menu_layout = get_theme_mod('header_menu_layout','default');

if($header_menu_layout == 'default')
{ 

    blogus_header_default_section();
   
}
}
endif;
add_action('blogus_action_blogus_header_type_section', 'blogus_header_type_section', 6);