<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package Newsup
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<?php wp_body_open(); ?>
<div id="page" class="site">
<a class="skip-link screen-reader-text" href="#content">
<?php esc_html_e( 'Skip to content', 'newsup' ); ?></a>
  <div class="wrapper" id="custom-background-css">
    <header class="mg-headwidget">
      <!--==================== TOP BAR ====================-->
      <?php do_action('newsup_action_header_section');  ?>
      <div class="clearfix"></div>

      <?php $background_image = get_theme_support( 'custom-header', 'default-image' );
      $newsup_center_logo_title = get_theme_mod('newsup_center_logo_title', false);
      if ( has_header_image() ) { $background_image = get_header_image(); } ?>

      <div class="mg-nav-widget-area-back" style='background-image: url("<?php echo esc_url( $background_image ); ?>" );'>
        <?php $remove_header_image_overlay = get_theme_mod('remove_header_image_overlay',false); ?>
        <div class="overlay">
          <div class="inner" <?php if($remove_header_image_overlay == false) { 
              $newsup_header_overlay_color = get_theme_mod('newsup_header_overlay_color','rgba(32,47,91,0.4)');?> style="background-color:<?php echo esc_attr($newsup_header_overlay_color);?>;" <?php } ?>> 
              <div class="container-fluid">
                  <div class="mg-nav-widget-area">
                    <div class="row align-items-center">
                      <div class="<?php echo esc_attr($newsup_center_logo_title == false ? 'col-md-3 text-center-xs' : 'col-md-12 text-center mx-auto') ?>">
                        <div class="navbar-header">
                          <div class="site-logo">
                            <?php if(get_theme_mod('custom_logo') !== ""){ the_custom_logo(); } ?>
                          </div>
                          <div class="site-branding-text <?php echo esc_attr(!display_header_text() ? 'd-none' : ''); ?>">
                            <?php  if (is_front_page() || is_home()) { ?>
                                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html(get_bloginfo( 'name' )); ?></a></h1>
                            <?php } else { ?>
                                <p class="site-title"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html(get_bloginfo( 'name' )); ?></a></p>
                            <?php } ?>
                                <p class="site-description"><?php echo esc_html(get_bloginfo( 'description' )); ?></p>
                          </div>    
                        </div>
                      </div>
                      <?php if(!empty(newsup_get_option('banner_advertisement_section'))) { do_action('newsup_action_banner_advertisement'); } ?>
                    </div>
                  </div>
              </div>
          </div>
        </div>
      </div>
    <div class="mg-menu-full">
      <nav class="navbar navbar-expand-lg navbar-wp">
        <div class="container-fluid">
          <!-- Right nav -->
          <div class="m-header align-items-center">
              <?php $home_url = home_url(); ?>
              <a class="mobilehomebtn" href="<?php echo esc_url($home_url); ?>"><span class="fa-solid fa-house-chimney"></span></a>
              <!-- navbar-toggle -->
              <button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbar-wp" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation','newsup'); ?>">
                <span class="burger">
                  <span class="burger-line"></span>
                  <span class="burger-line"></span>
                  <span class="burger-line"></span>
                </span>
              </button>
              <!-- /navbar-toggle -->
              <?php do_action('newsup_action_header_search'); do_action('newsup_action_header_subscribe'); ?>
              
          </div>
          <!-- /Right nav --> 
          <div class="collapse navbar-collapse" id="navbar-wp">
            <div class="d-md-block">
              <?php  
                wp_nav_menu( array(
                  'theme_location' => 'primary',
                  'container'  => 'nav-collapse collapse',
                  'menu_class' => 'nav navbar-nav mr-auto '.(is_rtl() ? 'sm-rtl' : ''),
                  'fallback_cb' => 'newsup_fallback_page_menu',
                  'walker' => new newsup_nav_walker()
                ) ); 
              ?>
            </div>      
          </div>
          <!-- Right nav -->
          <div class="desk-header d-lg-flex pl-3 ml-auto my-2 my-lg-0 position-relative align-items-center">
            <?php do_action('newsup_action_header_search'); do_action('newsup_action_header_subscribe'); ?>
          </div>
          <!-- /Right nav -->
      </div>
      </nav> <!-- /Navigation -->
    </div>
</header>
<div class="clearfix"></div> <?php 
if (is_front_page() || is_home()) { 
  $show_popular_tags_title = newsup_get_option('show_popular_tags_title');
  $select_popular_tags_mode = newsup_get_option('select_popular_tags_mode');
  $number_of_popular_tags = newsup_get_option('number_of_popular_tags');
  newsup_list_popular_taxonomies($select_popular_tags_mode, $show_popular_tags_title, $number_of_popular_tags);
}
  do_action('newsup_action_banner_exclusive_posts'); 
  do_action('newsup_action_front_page_main_section_1'); ?>