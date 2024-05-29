<?php if (!function_exists('blogus_featured_ads_section')) :
/**
 *  Header
 *
 * @since Blogus
 *
 */
function blogus_featured_ads_section()
{

if (is_front_page() || is_home()) {

$show_featured_links_section = get_theme_mod('show_featured_links_section',false);
$fatured_post_image_one = get_theme_mod('fatured_post_image_one'); 
$fatured_post_image_one_atc = wp_get_attachment_image($fatured_post_image_one);
$featured_post_one_btn_txt = get_theme_mod('featured_post_one_btn_txt');
$featured_post_one_url = get_theme_mod('featured_post_one_url');
$featured_post_one_url_new_tab = get_theme_mod('featured_post_one_url_new_tab', true);

$fatured_post_image_two = get_theme_mod('fatured_post_image_two');
$fatured_post_image_two_atc = wp_get_attachment_image($fatured_post_image_two);
$featured_post_two_btn_txt = get_theme_mod('featured_post_two_btn_txt');
$featured_post_two_url = get_theme_mod('featured_post_two_url');
$featured_post_two_url_new_tab = get_theme_mod('featured_post_two_url_new_tab', true);

$fatured_post_image_three = get_theme_mod('fatured_post_image_three');
$fatured_post_image_three_atc = wp_get_attachment_image($fatured_post_image_three);
$featured_post_three_btn_txt = get_theme_mod('featured_post_three_btn_txt');
$featured_post_three_url = get_theme_mod('featured_post_three_url');
$featured_post_three_url_new_tab = get_theme_mod('featured_post_three_url_new_tab', true);

if($show_featured_links_section == 'true') { 
?>
<div class="promoss mb-4">
  <div class="container">
    <div class="row">  
      <!-- /promo box -->        
      <div class="col-md-4">
                <div class="bs-widget promo bshre" style="background-image: url('<?php echo esc_url($fatured_post_image_one); ?>');">
                  <div class="inner-content">
                    <div class="text">
                    <?php if (!empty($featured_post_one_btn_txt)) { ?>
                      <h5>
                        <a <?php if($featured_post_one_url_new_tab) { ?> target="_blank" <?php } ?> href="<?php echo esc_url($featured_post_one_url); ?>"><?php echo esc_html($featured_post_one_btn_txt); ?></a>
                      </h5>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          <!-- /promo box -->
          <!-- promo box -->
          <div class="col-md-4">
                <div class="bs-widget promo bshre" style="background-image: url('<?php echo esc_url($fatured_post_image_two); ?>');">
                  <div class="inner-content">
                    <div class="text">    
                      <?php if (!empty($featured_post_two_btn_txt)) { ?>
                     <h5>
                      <a <?php if($featured_post_two_url_new_tab) { ?> target="_blank" <?php } ?> href="<?php echo esc_url($featured_post_two_url); ?>"><?php echo esc_html($featured_post_two_btn_txt); ?></a>
                     </h5>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          <!-- /promo box -->
          <!-- promo box -->
          <div class="col-md-4">
                <div class="bs-widget promo bshre" style="background-image: url('<?php echo esc_url($fatured_post_image_three); ?>');">
                  <div class="inner-content">
                    <div class="text">
                    <?php if (!empty($featured_post_three_btn_txt)) { ?>
                     <h5>
                      <a <?php if($featured_post_three_url_new_tab) { ?> target="_blank" <?php } ?> href="<?php echo esc_url($featured_post_three_url); ?>"><?php echo esc_html($featured_post_three_btn_txt); ?></a>
                     </h5>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          <!-- /promo box -->
      </div><!-- /row -->
    </div><!-- /container -->
</div>          


  
<?php 
} } }
endif;
add_action('blogus_action_featured_ads_section', 'blogus_featured_ads_section', 5);