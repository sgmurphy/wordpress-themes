<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Blogus
 */
get_header(); ?>
  <div id="content" class="container">
  <!--container--> 
    <!--row-->
    <div class="row">
      <?php do_action('blogus_breadcrumb_content'); ?>
      <!--container-->
      <div class="col-lg-12 text-center bs-section"> 
        <!--mg-error-404-->
        <div class="bs-error-404">
          <h1><?php esc_html_e('4','blogus'); ?><i class="fas fa-ban"></i>4</h1>
          <h4><?php esc_html_e('Oops! Page not found','blogus'); ?></h4>
          <p><?php esc_html_e("We are sorry, but the page you are looking for does not exist.","blogus"); ?></p>
          <a href="<?php echo esc_url(home_url());?>" onClick="history.back();" class="btn btn-theme"><?php esc_html_e('Go Back','blogus'); ?></a> </div>
        <!--/mg-error-404--> 
      </div>
      <!--/col-lg-12--> 
    </div>
    <!--/row--> 
  <!--/container-->
</div>
<?php
get_footer();