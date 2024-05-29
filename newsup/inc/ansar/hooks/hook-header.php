<?php
if (!function_exists('newsup_header_section')) :
/**
 *  Slider
 *
 * @since Newsup
 *
 */
function newsup_header_section()
{
    
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