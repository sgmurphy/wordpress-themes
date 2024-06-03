<?php if (!function_exists('blogus_footer_social_section')) :
function blogus_footer_social_section() { $footer_social_icon_enable = get_theme_mod('footer_social_icon_enable','1');
  if($footer_social_icon_enable == 1) { ?>
    <div class="col-md-6">
      <ul class="bs-social justify-content-center justify-content-md-end">
        <?php
          $social_icons = get_theme_mod( 'blogus_footer_social_icons', blogus_get_social_icon_default() );
          $social_icons = json_decode( $social_icons );
          if ( $social_icons != '' ) {

            foreach ( $social_icons as $social_item ) {
              $social_icon = ! empty( $social_item->icon_value ) ? apply_filters( 'blogus_translate_single_string', $social_item->icon_value, 'Footer section' ) : '';
              $open_new_tab = ! empty( $social_item->open_new_tab ) ? apply_filters( 'blogus_translate_single_string', $social_item->open_new_tab, 'Footer section' ) : '';
              $social_link = ! empty( $social_item->link ) ? apply_filters( 'blogus_translate_single_string', $social_item->link, 'Footer section' ) : '';
              ?>
              <li>
                <a <?php if ($open_new_tab == 'yes') { echo 'target="_blank"'; } ?> href="<?php echo esc_url( $social_link ); ?>">
                  <i class="<?php echo esc_attr( $social_icon ); ?>"></i>
                </a>
              </li>
              <?php
            }
          }
        ?>
      </ul>
    </div>
  <?php }
}
endif;
add_action('blogus_action_footer_social_section', 'blogus_footer_social_section', 2);

if( ! function_exists( 'blogus_search_model' ) ) :
    function blogus_search_model() { ?>
        <div class="modal fade bs_model" id="exampleModal" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog  modal-lg modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
              </div>
              <div class="modal-body">
                <?php get_search_form(); ?>
              </div>
            </div>
          </div>
        </div>
    <?php }
endif;
add_action( 'blogus_search_model_content', 'blogus_search_model' );

if( ! function_exists( 'blogus_footer_widget_area' ) ) :
    function blogus_footer_widget_area() {
        if ( is_active_sidebar( 'footer_widget_area' ) ) { ?>
            <div class="bs-footer-widget-area">
                <div class="container">
                    <div class="row">
                        <?php dynamic_sidebar( 'footer_widget_area' ); ?>
                    </div>
                    <!--/row-->
                </div>
                <!--/container-->
            </div>
        <?php } 
    }
endif;
add_action( 'blogus_footer_widget_area_content', 'blogus_footer_widget_area' );

if( ! function_exists( 'blogus_footer_bottom_area' ) ) :
    function blogus_footer_bottom_area() {  ?>
        <!--Start bs-footer-widget-area-->
            <div class="bs-footer-bottom-area">
                <div class="container">
                    <div class="divide-line"></div>
                    <div class="row align-items-center">
                        <div class="col-md-6">
                        <div class="footer-logo">
                            <!-- Display the Custom Logo -->
                            <div class="site-logo">
                                <?php if(get_theme_mod('custom_logo') !== ""){ the_custom_logo(); } ?>
                            </div>
                            <div class="site-branding-text">
                            <p class="site-title-footer"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                            <p class="site-description-footer"><?php bloginfo('description'); ?></p>
                            </div>
                        </div>
                        </div>
                        <!--col-md-3-->
                        <?php do_action('blogus_action_footer_social_section'); ?>
                        <!--/col-md-3-->
                    </div>
                    <!--/row-->
                </div>
                <!--/container-->
            </div>
        <!--End bs-footer-widget-area-->
        <?php 
    }
endif;
add_action( 'blogus_footer_bottom_area_content', 'blogus_footer_bottom_area' );

if( ! function_exists( 'blogus_footer_copyright' ) ) :
  function blogus_footer_copyright() { $hide_copyright = esc_attr(get_theme_mod('hide_copyright',true));
    if ($hide_copyright == true ) { ?>
      <div class="bs-footer-copyright">
          <div class="container">
              <div class="row">
                <?php  if ( has_nav_menu( 'footer' ) ) { ?>
                  <div class="col-md-6 text-left text-xs">
                    <p class="mb-0">
                      <?php $blogus_footer_copyright = get_theme_mod( 'blogus_footer_copyright','Copyright &copy; All rights reserved' );
                        echo esc_html($blogus_footer_copyright); ?>
                      <span class="sep"> | </span>
                      <?php  printf(esc_html__('%1$s by %2$s.', 'blogus'), '<a href="https://themeansar.com/free-themes/blogus/" target="_blank">Blogus</a>', '<a href="https://themeansar.com" target="_blank">Themeansar</a>'); ?>
                       </a>
                      </p>
                  </div>
                  <div class="col-md-6 text-right text-xs">
                    <?php wp_nav_menu( array(
                        'theme_location' => 'footer',
                        'container'  => 'nav-collapse collapse navbar-inverse-collapse',
                        'menu_class' => 'info-right',
                        'fallback_cb' => 'blogus_fallback_page_menu',
                        'walker' => new blogus_nav_walker()
                      ) );  ?>
                  </div>
                <?php } else { ?>
                   <div class="col-md-12 text-center">
                    <p class="mb-0">
                      <?php $blogus_footer_copyright = get_theme_mod( 'blogus_footer_copyright','Copyright &copy; All rights reserved' );
                        echo esc_html($blogus_footer_copyright);
                      ?>
                      <span class="sep"> | </span>
                      <?php  printf(esc_html__('%1$s by %2$s.', 'blogus'), '<a href="https://themeansar.com/free-themes/blogus/" target="_blank">Blogus</a>', '<a href="https://themeansar.com" target="_blank">Themeansar</a>'); ?>
                       </a>
                      </p>
                  </div>
                <?php } ?>
                  </div>
              </div>
          </div>
      </div> 
    <?php } 
  }
endif;
add_action( 'blogus_footer_copyright_content', 'blogus_footer_copyright' );