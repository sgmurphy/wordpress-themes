<?php
if (!function_exists('newsup_header_section')) :
/**
 *  Header Top Bar
 *
 * @since Newsup
 *
 */
function newsup_header_section(){
    
    $header_social_icon_enable = esc_attr(get_theme_mod('header_social_icon_enable','true'));
    $header_data_enable = esc_attr(get_theme_mod('header_data_enable','true'));
    $header_time_enable = esc_attr(get_theme_mod('header_time_enable','true'));
 if(($header_data_enable == true) || ($header_time_enable == true) || ($header_social_icon_enable == true)) {
?>
<div class="mg-head-detail hidden-xs">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6 col-xs-12">
                <ul class="info-left">
                    <?php newsup_date_display_type(); ?>
                </ul>
            </div>
            <div class="col-md-6 col-xs-12">
                <ul class="mg-social info-right">
                    <?php if($header_social_icon_enable == true) { do_action('newsup_action_header_social_icon'); } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php 
} }
endif;
add_action('newsup_action_header_section', 'newsup_header_section', 5);


if (!function_exists('newsup_header_search')) :
    /**
     *  Header Search
     *
     * @since Newsup
     *
     */
    function newsup_header_search() { 
        $header_search_enable = get_theme_mod('header_search_enable','true');
        if($header_search_enable == true) { ?>
            <div class="dropdown show mg-search-box pr-2">
                <a class="dropdown-toggle msearch ml-auto" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search"></i>
                </a> 
                <div class="dropdown-menu searchinner" aria-labelledby="dropdownMenuLink">
                    <?php get_search_form(); ?>
                </div>
            </div>
        <?php }
    }
endif;
add_action('newsup_action_header_search', 'newsup_header_search');


if (!function_exists('newsup_header_subscribe')) :
    /**
     *  Header subscribe
     *
     * @since Newsup
     *
     */
    function newsup_header_subscribe() { 
       
        $header_subsc_enable = get_theme_mod('header_subsc_enable','true');
        $subsc_target = get_theme_mod('newsup_subsc_link_target','true') == 'true' ? 'target="_blank"':'';
        $newsup_subsc_link = get_theme_mod('newsup_subsc_link','#');
        if($header_subsc_enable == true) { ?>
          <a href="<?php echo esc_url($newsup_subsc_link); ?>" <?php echo $subsc_target ?> class="btn-bell btn-theme mx-2"><i class="fa fa-bell"></i></a>
        <?php }
    }
endif;
add_action('newsup_action_header_subscribe', 'newsup_header_subscribe');