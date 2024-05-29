<?php
/**
 * The template for displaying the Single content.
 * @package Newsair
 */
?>
<!--==================== breadcrumb section ====================-->
<?php do_action('blogus_breadcrumb_content');
$blogus_single_page_layout = get_theme_mod('blogus_single_page_layout','single-align-content-right');
if($blogus_single_page_layout == "single-align-content-left") { ?>
        <aside class="col-lg-3">
                <?php get_sidebar();?>
        </aside>
<?php } ?> 
        <div class="<?php echo esc_attr($blogus_single_page_layout == 'single-full-width-content' ? 'col-lg-12' : 'col-lg-9') ?>">
                <?php do_action('blogus_action_main_single_content'); ?>
        </div>
<?php if($blogus_single_page_layout == "single-align-content-right") { ?>
        <aside class="col-lg-3">
                <?php get_sidebar();?>
        </aside>
<?php } ?>