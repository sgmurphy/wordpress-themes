<?php
function theme_options_color() {

	/*=================== Menus Color ===================*/
	$primary_menu_bg_color = get_theme_mod('primary_menu_bg_color', ''); 

	/*=================== Slider Overlay Color ===================*/
	$blogus_slider_overlay_color = get_theme_mod('blogus_slider_overlay_color','#00000099');
	$blogus_slider_overlay_text_color = get_theme_mod('blogus_slider_overlay_text_color','');
	$blogus_slider_title_font_size = get_theme_mod('blogus_slider_title_font_size',50);

	?>
<style type="text/css">
/*==================== Site title and tagline ====================*/
.site-title a, .site-description{
  color: #<?php echo esc_attr(get_theme_mod('header_textcolor', "000")); ?>;
}
body.dark .site-title a, body.dark .site-description{
  color: <?php echo esc_attr(get_theme_mod('header_textcolor_dark_layout', "#fff")); ?>;
}
/*==================== Menu color ====================*/

.bs-default .navbar-collapse ul, .navbar-wp .dropdown-menu > li > a:hover, .navbar-wp .dropdown-menu > li > a:focus {
    background: <?php echo esc_attr($primary_menu_bg_color); ?>;
}

/*=================== Slider Color ===================*/
.homemain .bs-slide.overlay:before{
	background-color: <?php echo esc_attr($blogus_slider_overlay_color); ?>;
} 
.bs-slide .inner .title a{
	color: <?php echo esc_attr($blogus_slider_overlay_text_color); ?>;
}

.bs-slide .inner .title{
	font-size: <?php echo esc_attr($blogus_slider_title_font_size); ?>px;

}
footer .bs-footer-copyright p, footer .bs-footer-copyright a {
	color: <?php echo esc_attr(blogus_get_option('blogus_footer_copy_text')); ?>;
}
footer .bs-footer-copyright {
	background: <?php echo esc_attr(blogus_get_option('blogus_footer_copy_bg')); ?>;
}

footer .bs-widget p, .site-title-footer a, .site-title-footer a:hover, .site-description-footer, .site-description-footer:hover, footer .bs-widget h6, footer .mg_contact_widget .bs-widget h6 {
	color: <?php echo esc_attr(blogus_get_option('blogus_footer_text_color')); ?>;
}
@media (max-width: 991px){
	.bs-slide .inner .title{
		font-size: 2.5em;
	}
}
@media (max-width: 640px){
	.bs-slide .inner .title{
		font-size: 1.5em;
	}
}
</style>
<?php } 
function custom_typography_function() { ?>
<style>
.site-branding-text p, .site-title a{
	font-weight:<?php echo esc_attr(get_theme_mod('site_title_fontweight','700')); ?>;
	font-family:<?php echo esc_attr(get_theme_mod('site_title_fontfamily','Josefin Sans')); ?>; 
}
.navbar-wp .navbar-nav > li> a, .navbar-wp .dropdown-menu > li > a{ 
	font-family:<?php echo esc_attr(get_theme_mod('blogus_menu_fontfamily','Josefin Sans')); ?>; 
}
</style>
<?php }