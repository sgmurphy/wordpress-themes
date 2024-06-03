<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Blogus
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 *
 * @return array
 */
function blogus_body_classes($classes)
{
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    $global_site_mode_setting = blogus_get_option('global_site_mode_setting');
    $classes[] = $global_site_mode_setting;


    $single_post_featured_image_view = blogus_get_option('single_post_featured_image_view');
    if ($single_post_featured_image_view == 'full') {
        $classes[] = 'ta-single-full-header';
    }

    $global_hide_post_date_author_in_list = blogus_get_option('global_hide_post_date_author_in_list');
    if ($global_hide_post_date_author_in_list == true) {
        $classes[] = 'ta-hide-date-author-in-list';
    }

    global $post;

    $global_alignment = blogus_get_option('blogus_content_layout');
    $page_layout = $global_alignment;
    $disable_class = '';
    $frontpage_content_status = blogus_get_option('frontpage_content_status');
    if (1 != $frontpage_content_status) {
        $disable_class = 'disable-default-home-content';
    }

    // Check if single.
    if ($post && is_singular()) {
        $post_options = get_post_meta($post->ID, 'blogus-meta-content-alignment', true);
        if (!empty($post_options)) {
            $page_layout = $post_options;
        } else {
            $page_layout = $global_alignment;
        }
    }

    if ( isset( $_COOKIE["blogus-site-mode-cookie"] ) ) {
        $classes[] = $_COOKIE["blogus-site-mode-cookie"];
    } else {
    	$classes[] = get_theme_mod( 'blogus_skin_mode', 'defaultcolor' );
    }

    return $classes;
}

add_filter('body_class', 'blogus_body_classes');


/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function blogus_pingback_header()
{
    if (is_singular() && pings_open()) {
        echo '<link rel="pingback" href="', esc_url(get_bloginfo('pingback_url')), '">';
    }
}

add_action('wp_head', 'blogus_pingback_header');


/**
 * Returns posts.
 *
 * @since blogus 1.0.0
 */
if (!function_exists('blogus_get_posts')):
    function blogus_get_posts($number_of_posts, $category = '0')
    {

        $ins_args = array(
            'post_type' => 'post',
            'posts_per_page' => absint($number_of_posts),
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',
            'ignore_sticky_posts' => true
        );

        $category = isset($category) ? $category : '0';
        if (absint($category) > 0) {
            $ins_args['cat'] = absint($category);
        }

        $all_posts = new WP_Query($ins_args);

        return $all_posts;
    }

endif;



if (!function_exists('blogus_get_block')) :
    /**
     *
     * @param null
     *
     * @return null
     *
     * @since Blogus 1.0.0
     *
     */
    function blogus_get_block($block = 'grid', $section = 'post')
    {

        get_template_part('inc/ansar/hooks/blocks/block-' . $section, $block);

    }
endif;

/**
 * @param $post_id
 * @param string $size
 *
 * @return mixed|string
 */
function blogus_get_freatured_image_url($post_id, $size = 'blogus-featured')
{
    if (has_post_thumbnail($post_id)) {
        $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), $size);
        $url = $thumb !== false ? '' . $thumb[0] . '' : '""';

    } else {
        $url = '';
    }

    return $url;
}

if (!function_exists('blogus_categories_show')):
    function blogus_categories_show() { ?>
        <div class="bs-blog-category"> 
            <?php $cat_list = get_the_category_list();
            if(!empty($cat_list)) {   the_category(' ');  } ?>
        </div>
    <?php } 
endif; 

if (!function_exists('blogus_edit_link')) :

    function blogus_edit_link($view = 'default')
    {
        global $post;
            edit_post_link(
                sprintf(
                    wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                        __('Edit <span class="screen-reader-text">%s</span>', 'blogus'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ),
                '<span class="edit-link"><i class="fas fa-edit"></i>',
                '</span>'
            );

    } 
endif;

add_filter( 'woocommerce_show_page_title', 'blogus_hide_shop_page_title' );

function blogus_hide_shop_page_title( $title ) {
    if ( is_shop() ) $title = false;
    return $title;
}

function blogus_footer_logo_size()
{
    $blogus_footer_logo_width = get_theme_mod('blogus_footer_logo_width','210');
    $blogus_footer_logo_height = get_theme_mod('blogus_footer_logo_height','70'); ?>
    <style>
        footer .footer-logo img{
            width: <?php echo esc_attr($blogus_footer_logo_width); ?>px;
            height: <?php echo esc_attr($blogus_footer_logo_height); ?>px;
        } 
    </style>
<?php } 
add_action('wp_footer','blogus_footer_logo_size');

function blogus_social_share_post($post) {

    $single_show_share_icon = esc_attr(get_theme_mod('single_show_share_icon','true'));
    if($single_show_share_icon == true) {
        $post_link  = esc_url( get_the_permalink() );
        $post_title = get_the_title();

        $facebook_url = add_query_arg(
        array(
        'u' => $post_link,
        ),
        'https://www.facebook.com/sharer.php'
        );

        $twitter_url = add_query_arg(
        array(
        'url'  => $post_link,
        'text' => rawurlencode( html_entity_decode( wp_strip_all_tags( $post_title ), ENT_COMPAT, 'UTF-8' ) ),
            ),
            'http://twitter.com/share'
        );

        $email_title = str_replace( '&', '%26', $post_title );

        $email_url = add_query_arg(
        array(
        'subject' => wp_strip_all_tags( $email_title ),
        'body'    => $post_link,
            ),
        'mailto:'
        ); 

        $linkedin_url = add_query_arg(
            array('url'  => $post_link,
        'title' => rawurlencode( html_entity_decode( wp_strip_all_tags( $post_title ), ENT_COMPAT, 'UTF-8' ) )
            ),
        'https://www.linkedin.com/sharing/share-offsite/?url'
        );

        $pinterest_url = add_query_arg(
            array('url'  => $post_link,
            'title' => rawurlencode( html_entity_decode( wp_strip_all_tags( $post_title ), ENT_COMPAT, 'UTF-8' ) )
            ),
        'http://pinterest.com/pin/create/link/?url='
        );

        $reddit_url = add_query_arg(
        array('url' => $post_link,
        'title' => rawurlencode( html_entity_decode( wp_strip_all_tags( $post_title ), ENT_COMPAT, 'UTF-8' ) )
        ),
        'https://www.reddit.com/submit'
        );

        $telegram_url = add_query_arg(
        array('url' => $post_link,
        'title' => rawurlencode( html_entity_decode( wp_strip_all_tags( $post_title ), ENT_COMPAT, 'UTF-8' ) )
        ),
        'https://t.me/share/url?url='
        );

        $whatsapp_url = add_query_arg(
        array('text' => $post_link,
        'title' => rawurlencode( html_entity_decode( wp_strip_all_tags( $post_title ), ENT_COMPAT, 'UTF-8' ) )
        ),
        'https://api.whatsapp.com/send?text='
        );
        ?>
        <script>
        function pinIt()
        {
            var e = document.createElement('script');
            e.setAttribute('type','text/javascript');
            e.setAttribute('charset','UTF-8');
            e.setAttribute('src','https://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);
            document.body.appendChild(e);
        }
        </script>

        <div class="post-share">
            <div class="post-share-icons cf"> 
                <?php $blogus_blog_share_facebook_enable = get_theme_mod('blogus_blog_share_facebook_enable','true');
                if($blogus_blog_share_facebook_enable == true) { ?>
                    <a class="facebook" href="<?php echo esc_url("$facebook_url"); ?>" class="link " target="_blank" >
                        <i class="fab fa-facebook"></i>
                    </a>
                <?php } 
                $blogus_blog_share_twitter_enable = get_theme_mod('blogus_blog_share_twitter_enable','true');
                if($blogus_blog_share_twitter_enable == true) { ?>
                    <a class="x-twitter" href="<?php echo esc_url("$twitter_url"); ?>" class="link " target="_blank">
                        <i class="fa-brands fa-x-twitter"></i>
                    </a>
                <?php }
                $blogus_blog_share_email_enable = get_theme_mod('blogus_blog_share_email_enable','true');
                if($blogus_blog_share_email_enable == true) { ?>
                    <a class="envelope" href="<?php echo esc_url("$email_url"); ?>" class="link " target="_blank" >
                        <i class="fas fa-envelope-open"></i>
                    </a>
                <?php } 
                $blogus_blog_share_linkdin_enable = get_theme_mod('blogus_blog_share_linkdin_enable','true');
                if($blogus_blog_share_linkdin_enable == true) { ?>
                    <a class="linkedin" href="<?php echo esc_url("$linkedin_url"); ?>" class="link " target="_blank" >
                        <i class="fab fa-linkedin"></i>
                    </a>
                <?php  } 
                $blogus_blog_share_pintrest_enable = get_theme_mod('blogus_blog_share_pintrest_enable','true');
                if($blogus_blog_share_pintrest_enable == true) { ?>
                    <a href="javascript:pinIt();" class="pinterest">
                        <i class="fab fa-pinterest"></i>
                    </a>
                <?php } 
                $blogus_blog_share_telegram_enable = get_theme_mod('blogus_blog_share_telegram_enable','true');
                if($blogus_blog_share_telegram_enable == true) {?>
                    <a class="telegram" href="<?php echo esc_url("$telegram_url"); ?>" target="_blank" >
                        <i class="fab fa-telegram"></i>
                    </a>
                <?php } 
                $blogus_blog_share_whatsapp_enable = get_theme_mod('blogus_blog_share_whatsapp_enable','true');
                if($blogus_blog_share_whatsapp_enable == true) { ?>
                    <a class="whatsapp" href="<?php echo esc_url("$whatsapp_url"); ?>" target="_blank" >
                        <i class="fab fa-whatsapp"></i>
                    </a>
                <?php } 
                $blogus_blog_share_reddit_enable = get_theme_mod('blogus_blog_share_reddit_enable','true');
                if($blogus_blog_share_reddit_enable == true) { ?>
                    <a class="reddit" href="<?php echo esc_url("$reddit_url"); ?>" target="_blank" >
                        <i class="fab fa-reddit"></i>
                    </a>
                <?php } ?>
                <a class="print-r" href="javascript:window.print()"> <i class="fas fa-print"></i></a>
            </div>
        </div>
    <?php } 
} 

function blogus_post_image_display_type($post)
{
$url = blogus_get_freatured_image_url($post->ID, 'blogus-medium');
if($url) { ?>
    <div class="bs-blog-thumb lg back-img" style="background-image: url('<?php echo esc_url($url); ?>');">
        <a href="<?php the_permalink(); ?>" class="link-div"></a>
    </div> 
<?php } }

if ( ! function_exists( 'blogus_header_color' ) ) :

function blogus_header_color() {
    $blogus_logo_text_color = get_header_textcolor();
    $blogus_title_font_size = blogus_get_option('blogus_title_font_size',60);

    ?>
    <style type="text/css">
    <?php
        if ( ! display_header_text() ) :
    ?>
        .site-title,
        .site-description {
            position: absolute;
            clip: rect(1px, 1px, 1px, 1px);
        }
    <?php
        else :
    ?>
        .site-title a,
        .site-description {
            color: #<?php echo esc_attr( $blogus_logo_text_color ); ?>;
        }

        .site-branding-text .site-title a {
                font-size: <?php echo esc_attr( $blogus_title_font_size,60 ); ?>px;
            }

            @media only screen and (max-width: 640px) {
                .site-branding-text .site-title a {
                    font-size: 26px;

                }
            }

            @media only screen and (max-width: 375px) {
                .site-branding-text .site-title a {
                    font-size: 26px;

                }
            }

    <?php endif; ?>
    </style>
    <?php
}
endif;

//SCROLL TO TOP //
if ( ! function_exists( 'blogus_scrolltoup' ) ) :
function blogus_scrolltoup() {
$scrollup_layout = get_theme_mod('scrollup_layout','fa fa-angle-up');
$blogus_scrollup_enable = get_theme_mod('blogus_scrollup_enable','true');
if($blogus_scrollup_enable == true) { ?>
  <a href="#" class="bs_upscr bounceInup animated"><i class="<?php echo esc_attr($scrollup_layout);?>"></i></a> 
<?php } } endif; 

function blogus_dropcap() { $blogus_drop_caps_enable = get_theme_mod('blogus_drop_caps_enable','false');
if($blogus_drop_caps_enable == 'true'){ ?>
<style>
  .bs-blog-post p:nth-of-type(1)::first-letter {
    font-size: 60px;
    font-weight: 800;
    margin-right: 10px;
    line-height: 1; 
    float: left;
}
</style>
<?php } else { ?>
<style>
  .bs-blog-post p:nth-of-type(1)::first-letter {
    display: none;
}
</style>
<?php } } add_action('wp_head','blogus_dropcap'); 

function blogus_custom_header_background() { 
$color = get_theme_mod( 'background_color', get_theme_support( 'custom-background', 'default-color' ) );
?>
<style type="text/css" id="custom-background-css">
    :root {
        --wrap-color: <?php echo esc_attr($color); ?>
    }
</style>
<?php }
add_action('wp_head','blogus_custom_header_background');