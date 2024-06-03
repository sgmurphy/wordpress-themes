<?php if (!function_exists('blogus_header_social_section')) :
/**
 *  Header
 *
 * @since Blogus
 *
 */
function blogus_header_social_section() { 
    $header_social_icon_enable = get_theme_mod('header_social_icon_enable','1');
      if($header_social_icon_enable == 1) { ?>
        <ul class="bs-social info-left">
          <?php
            $social_icons = get_theme_mod( 'blogus_header_social_icons', blogus_get_social_icon_default() );
            $social_icons = json_decode( $social_icons );
            if ( $social_icons != '' ) {
              foreach ( $social_icons as $social_item ) {
                $social_icon = ! empty( $social_item->icon_value ) ? apply_filters( 'blogus_translate_single_string', $social_item->icon_value, 'Header section' ) : '';
                $open_new_tab = ! empty( $social_item->open_new_tab ) ? apply_filters( 'blogus_translate_single_string', $social_item->open_new_tab, 'Header section' ) : '';
                $social_link = ! empty( $social_item->link ) ? apply_filters( 'blogus_translate_single_string', $social_item->link, 'Header section' ) : ''; ?>
                
                <li><a <?php if ($open_new_tab == 'yes') { echo 'target="_blank"'; } ?> 
                      href="<?php echo esc_url( $social_link ); ?>">
                      <i class="<?php echo esc_attr( $social_icon ); ?>"></i>
                    </a>
                </li>
                <?php
              }
            }
          ?>
      </ul>
  <?php }
}
endif;
add_action('blogus_action_header_social_section', 'blogus_header_social_section', 2);