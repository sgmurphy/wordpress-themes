<?php
/**
 * The template for displaying search results pages.
 *
 * @package Blogus
 */

get_header(); ?>
<!--==================== main content section ====================-->
<div id="content">
    <!--container-->
    <div class="container">
        <!--row-->
        <div class="row">
            <!--==================== Breadcrumb section ====================-->
            <?php do_action('blogus_breadcrumb_content'); ?>
            <?php do_action('blogus_search_main_content'); ?>
        </div>
        <!--/row-->
    </div>
    <!--/container-->
</div>
<?php get_footer(); ?>