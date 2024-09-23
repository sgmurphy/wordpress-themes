<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package Newsup
 */
?>
    <div class="container-fluid missed-section mg-posts-sec-inner">
        <?php do_action('newsup_action_footer_missed'); ?>
    </div>
<!--==================== FOOTER AREA ====================-->
<?php $newsup_footer_widget_background = get_theme_mod('newsup_footer_widget_background');
$newsup_footer_overlay_color = get_theme_mod('newsup_footer_overlay_color'); 
if($newsup_footer_widget_background != '') { ?>
<footer class="footer back-img" style="background-image:url('<?php echo esc_url($newsup_footer_widget_background);?>');">
    <?php } else { ?>
<footer class="footer"> 
<?php } ?>
    <div class="overlay" style="background-color: <?php echo esc_attr($newsup_footer_overlay_color);?>;">
        <!--Start mg-footer-widget-area-->
        <?php if ( is_active_sidebar( 'footer_widget_area' ) ) { ?>
        <div class="mg-footer-widget-area">
            <div class="container-fluid">
                <div class="row">
                    <?php  dynamic_sidebar( 'footer_widget_area' ); ?>
                </div>
                <!--/row-->
            </div>
            <!--/container-->
        </div>
        <?php } ?>
        <!--End mg-footer-widget-area-->
        <!--Start mg-footer-widget-area-->
        <div class="mg-footer-bottom-area">
            <div class="container-fluid">
            <?php if ( is_active_sidebar( 'footer_widget_area' ) ) { ?>
                <div class="divide-line"></div>
            <?php } ?>
                <div class="row align-items-center">
                    <!--col-md-4-->
                    <div class="col-md-6">
                        <div class="site-logo">
                            <?php if(get_theme_mod('custom_logo') !== ""){ the_custom_logo(); } ?>
                        </div>
                        <?php if (display_header_text()) : ?>
                        <div class="site-branding-text">
                            <p class="site-title-footer"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html(get_bloginfo( 'name' )); ?></a></p>
                            <p class="site-description-footer"><?php echo esc_html(get_bloginfo( 'description' )); ?></p>
                        </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="col-md-6 text-right text-xs">
                        <ul class="mg-social">
                            <?php do_action('newsup_action_footer_social_icon'); ?> 
                        </ul>
                    </div>
                </div>
                <!--/row-->
            </div>
            <!--/container-->
        </div>
        <!--End mg-footer-widget-area-->
        <div class="mg-footer-copyright">
            <?php do_action('newsup_action_footer_copyright'); ?>
        </div>
        <!--/overlay-->
        </div>
    </footer>
    <!--/footer-->
  </div>
    <!--/wrapper-->
    <!--Scroll To Top-->
    <a href="#" class="ta_upscr bounceInup animated"><i class="fas fa-angle-up"></i></a>
    <!--/Scroll To Top-->
<!-- /Scroll To Top -->
<?php wp_footer(); ?>
</body>
</html>