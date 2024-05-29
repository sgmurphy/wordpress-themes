<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Blogus
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) { return; }
$blogus_sidebar_stickey = get_theme_mod('blogus_sidebar_stickey',true); ?>

<div id="sidebar-right" class="bs-sidebar <?php if($blogus_sidebar_stickey == true) { ?> bs-sticky <?php } ?>">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div>