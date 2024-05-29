<?php
/**
 * The template for displaying the Single content.
 * @package Newsup
 */

$newsup_single_page_layout = get_theme_mod('newsup_single_page_layout','single-align-content-right');
if($newsup_single_page_layout == "single-align-content-left") { ?>
        <aside class="col-lg-3 col-md-4">
                <?php get_sidebar();?>
        </aside>
<?php } ?>
        <div class="<?php echo esc_attr($newsup_single_page_layout == 'single-full-width-content' ? 'col-md-12' : 'col-lg-9 col-md-8') ?>">
                <?php do_action('newsup_action_main_single_content'); ?>
        </div>
<?php if($newsup_single_page_layout == "single-align-content-right") { ?>
        <aside class="col-lg-3 col-md-4">
                <?php get_sidebar();?>
        </aside>
<?php } ?>