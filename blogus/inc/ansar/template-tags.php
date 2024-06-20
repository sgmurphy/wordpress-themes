<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Blogus
 */

if (!function_exists('blogus_post_categories')) :
    function blogus_post_categories($separator = '&nbsp')
    {
        $global_show_categories = blogus_get_option('global_show_categories');
        if ($global_show_categories == 'no') {
            return;
        }

        // Hide category and tag text for pages.
        if ('post' === get_post_type()) {

            global $post;
            ?>
            <div class="bs-blog-category">
            <?php $post_categories = get_the_category($post->ID);
            if ($post_categories) {
                $output = '';
                foreach ($post_categories as $post_category) {
                    $t_id = $post_category->term_id;
                    $color_id = "category_color_" . $t_id;

                    // retrieve the existing value(s) for this meta field. This returns an array
                    $term_meta = get_option($color_id);
                    $color_class = ($term_meta) ? $term_meta['color_class_term_meta'] : 'category-color-1';

                    $output .= '<a class="blogus-categories ' . esc_attr($color_class) . '" href="' . esc_url(get_category_link($post_category)) . '" alt="' . esc_attr(sprintf(__('View all posts in %s', 'blogus'), $post_category->name)) . '"> 
                                 ' . esc_html($post_category->name) . '
                             </a>';
                }
                $output .= '';
                echo $output;

            }
            ?>
        </div>
        <?php }
    }
endif;



if (!function_exists('blogus_get_category_color_class')) :
    function blogus_get_category_color_class($term_id)
    {
        $color_id = "category_color_" . $term_id;
        // retrieve the existing value(s) for this meta field. This returns an array
        $term_meta = get_option($color_id);
        $color_class = ($term_meta) ? $term_meta['color_class_term_meta'] : '';
        return $color_class;
    }
endif;

if (!function_exists('blogus_post_meta')) :

    function blogus_post_meta() {
        $global_post_date = get_theme_mod('global_post_date_author_setting','show-date-author');
        $blogus_global_comment_enable = get_theme_mod('blogus_global_comment_enable','true');?>

        <div class="bs-blog-meta">
        <?php if($global_post_date =='show-date-author') {
            blogus_author_content();
            blogus_date_content();  

        } elseif($global_post_date =='show-date-only') { 
            blogus_date_content();
        
        } elseif($global_post_date =='show-author-only') {
            blogus_author_content();

        } elseif($global_post_date =='hide-date-author') { }
        if($blogus_global_comment_enable == true) { ?>
            <span class="comments-link"> 
                <a href="<?php the_permalink(); ?>">
                <span><?php echo absint(get_comments_number()); ?></span><span><?php echo esc_html((get_comments_number() <= 1 ? 'Comment' : 'Comments') ,'blogus'); ?></span>
            </a> 
            </span>
        <?php } 
        blogus_edit_link(); ?>
        </div>
    <?php
    }
endif; 

if (!function_exists('blogus_menu_search')) :

    function blogus_menu_search() { $blogus_menu_search  = get_theme_mod('blogus_menu_search','true'); 
    
        if($blogus_menu_search == true) { ?>
            <a class="msearch ml-auto"  data-bs-target="#exampleModal"  href="#" data-bs-toggle="modal">
                <i class="fa fa-search"></i>
            </a> 
        <?php } 
    }
endif; 

if (!function_exists('blogus_menu_subscriber')) :

    function blogus_menu_subscriber() { 
        $blogus_menu_subscriber  = get_theme_mod('blogus_menu_subscriber','true');
        $blogus_subsc_link = get_theme_mod('blogus_subsc_link', '#'); 
        $blogus_subsc_open_in_new  = get_theme_mod('blogus_subsc_open_in_new', true);

        if($blogus_menu_subscriber == true) { ?>
          <a class="subscribe-btn" href="<?php echo esc_url($blogus_subsc_link); ?>" <?php if($blogus_subsc_open_in_new) { ?> target="_blank" <?php } ?>  ><i class="fas fa-bell"></i></a>
        <?php } 
    }
endif; 

if (!function_exists('blogus_lite_dark_switcher')) :

    function blogus_lite_dark_switcher() { $blogus_lite_dark_switcher = get_theme_mod('blogus_lite_dark_switcher', true);

        if($blogus_lite_dark_switcher == true){  
            if ( isset( $_COOKIE["blogus-site-mode-cookie"] ) ) {
                $blogus_skin_mode = $_COOKIE["blogus-site-mode-cookie"];
            } else {
                $blogus_skin_mode = get_theme_mod( 'blogus_skin_mode', 'defaultcolor' );
            } ?>          
            <label class="switch" for="switch">
                <input type="checkbox" name="theme" id="switch" class="<?php echo esc_attr( $blogus_skin_mode ); ?>" data-skin-mode="<?php echo esc_attr( $blogus_skin_mode ); ?>">
                <span class="slider"></span>
            </label>
        <?php }
    }
endif; 

if (!function_exists('blogus_menu_btns')) :
    function blogus_menu_btns() { 
        blogus_menu_search();
        blogus_menu_subscriber();
        blogus_lite_dark_switcher();
    }
endif; 

if (!function_exists('get_archive_title')) :
        
    function get_archive_title($title)
    {
        if (is_category()) {
            $title = single_cat_title();
        } elseif (is_tag()) {
            $title = single_tag_title();
        } elseif (is_author()) {
            $title = get_the_author();
        } elseif (is_year()) {
            $title = get_the_date('Y');
        } elseif (is_month()) {
            $title = get_the_date('F Y');
        } elseif (is_day()) {
            $title = get_the_date('F j, Y');
        } elseif (is_post_type_archive()) {
            $title = post_type_archive_title('', false);
        } else {
            $title =  get_the_title();
        }
        
        return $title;
    }

endif;
add_filter('get_the_archive_title', 'get_archive_title');

if (!function_exists('blogus_archive_page_title')) :
        
    function blogus_archive_page_title($title) { ?>
            <div class="bs-card-box page-entry-title">
                <h1 class="entry-title title mb-0"><?php echo get_the_archive_title();?></h1>
                <?php do_action('blogus_breadcrumb_content'); ?>
            </div>
        <?php
    }
endif;
add_action('blogus_action_archive_page_title', 'blogus_archive_page_title');

if ( ! function_exists( 'blogus_posted_content' ) ) :
    function blogus_posted_content() { 
      $blogus_blog_content  = get_theme_mod('blogus_blog_content','excerpt');
      $content_layout = get_theme_mod('blogus_content_layout','align-content-right');

        if ( 'excerpt' == $blogus_blog_content ){
            if(( 'align-content-right' == $content_layout ) || ( 'full-width-content' == $content_layout ) || ( 'align-content-left' == $content_layout )){
                $blogus_excerpt = blogus_the_excerpt( absint( 30 ) );
            } else {
                $blogus_excerpt = blogus_the_excerpt( absint( 20 ) );
            } 
            if ( !empty( $blogus_excerpt ) ) :                   
                echo wp_kses_post( wpautop( $blogus_excerpt ) );
            endif; 
        } else{ 
            the_content( __('Read More','blogus') );
        }
    }
endif;


if ( ! function_exists( 'blogus_date_content' ) ) :
    function blogus_date_content() { ?>
        <span class="bs-blog-date">
            <a href="<?php echo esc_url(get_month_link(esc_html(get_post_time('Y')),esc_html(get_post_time('m')))); ?>"><time datetime=""><?php echo esc_html(get_the_date()); ?></time></a>
        </span>
    <?php }
endif;

if ( ! function_exists( 'blogus_author_content' ) ) :
    function blogus_author_content() { ?>
        <span class="bs-author"> 
            <a class="auth" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"> 
            <?php echo get_avatar( get_the_author_meta( 'ID') , 150); ?><?php the_author(); ?>
            </a> 
        </span>
    <?php }
endif;

if ( ! function_exists( 'blogus_the_excerpt' ) ) :

    /**
     * Generate excerpt.
     *
     */
    function blogus_the_excerpt( $length = 0, $post_obj = null ) {

        global $post;

        if ( is_null( $post_obj ) ) {
            $post_obj = $post;
        }

        $length = absint( $length );

        if ( 0 === $length ) {
            return;
        }
       
        $source_content = $post_obj->post_content;

        if ( ! empty( get_the_excerpt($post_obj) ) ) {
            $source_content = get_the_excerpt($post_obj);
        } 
        // Check if non-breaking space exists in the text with variations
        if (preg_match('/\s*(&nbsp;|\xA0)\s*/u', $source_content)) {
            // Remove non-breaking space and its variations from the text
            $source_content = preg_replace('/\s*(&nbsp;|\xA0)\s*/u', ' ', $source_content); 
        }

        $source_content = preg_replace( '`\[[^\]]*\]`', '', $source_content );
        $trimmed_content = wp_trim_words( $source_content, $length, '&hellip;' );
        return $trimmed_content;

    }
endif;

if ( ! function_exists( 'blogus_breadcrumb_trail' ) ) :
    /**
     * Theme default breadcrumb function.
     *
     * @since 1.0.0
     */
    function blogus_breadcrumb_trail() {
        if ( ! function_exists( 'breadcrumb_trail' ) ) {
            // load class file
            require_once get_template_directory() . '/inc/ansar/breadcrumb-trail/breadcrumb-trail.php';
        }

        $breadcrumb_args = array(
            'container' => 'div',
            'show_browse' => false,
        );
        breadcrumb_trail( $breadcrumb_args );
    }
    add_action( 'blogus_breadcrumb_trail_content', 'blogus_breadcrumb_trail' );
endif;



if( ! function_exists( 'blogus_breadcrumb' ) ) :
    /**
     *
     * @package Blogus
     */
    function blogus_breadcrumb() {
        if ( is_front_page() || is_home() ) return;
        $breadcrumb_settings = get_theme_mod('breadcrumb_settings','1');
            if($breadcrumb_settings == 1)
            {

        $blogus_site_breadcrumb_type = get_theme_mod('blogus_site_breadcrumb_type','default');
            ?>
            <div class="bs-breadcrumb-section">
                <div class="overlay">
                    <div class="container">
                        <div class="row">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <?php if($blogus_site_breadcrumb_type == 'yoast') {
                                        if( function_exists( 'yoast_breadcrumb' ) )
                                        {
                                            yoast_breadcrumb();
                                        }
                                    }

                                    elseif($blogus_site_breadcrumb_type == 'navxt')
                                    {
                                        if( function_exists( 'bcn_display' ) )
                                        {
                                            bcn_display();
                                        }
                                        
                                    }

                                    elseif($blogus_site_breadcrumb_type == 'rankmath')
                                    {
                                        if( function_exists( 'rank_math_the_breadcrumbs' ) )
                                        {
                                            rank_math_the_breadcrumbs();
                                        }

                                        
                                    }
                                    else {
                                        do_action( 'blogus_breadcrumb_trail_content' );
                                    }
                                    ?> 
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
    <?php } }
endif;
add_action( 'blogus_breadcrumb_content', 'blogus_breadcrumb' );


if ( ! function_exists( 'blogus_page_pagination' ) ) :
    function blogus_page_pagination() { 
        
        $blogus_pagination_remove = get_theme_mod('blogus_pagination_remove','true'); ?>

        <div class="col-md-12 text-center d-md-flex justify-content-<?php if($blogus_pagination_remove == 'true') { echo 'between';} else { echo 'center';} ?>">
            <?php //Previous / next page navigation
                    
            $prev_text =  (is_rtl()) ? "right" : "left";
            $next_text =  (is_rtl()) ? "left" : "right";
            the_posts_pagination( array(
                'prev_text'          => '<i class="fa fa-angle-'.$prev_text.'"></i>',
                'next_text'          => '<i class="fa fa-angle-'.$next_text.'"></i>',
                ) 
            );
            if($blogus_pagination_remove == true) { ?>
                <div class="navigation"><p><?php posts_nav_link(); ?></p></div>
            <?php } ?>
        </div>
        <?php
    }
endif;

if( ! function_exists( 'blogus_search_main' ) ) :
    function blogus_search_main() { ?>
        <div class="col-lg-<?php echo ( !is_active_sidebar( 'sidebar-1' ) ? '12' :'8' ); ?>">
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php if ( have_posts() ) { /* Start the Loop */
                    while ( have_posts() ) { the_post(); ?> 
                        <!-- bs-posts-sec bs-posts-modul-6 -->
                        <div class="bs-posts-sec bs-posts-modul-6 bs-blog-post list-blog"> 
                            <?php blogus_post_image_display_type(get_post()); ?>
                            <article class="d-md-flex bs-posts-sec-post">
                                <div class="bs-sec-top-post py-3 col">
                                    <?php blogus_post_categories(); ?>
                                    <h4 class="entry-title title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                                    <?php blogus_post_meta(); ?>
                                    <div class="bs-content">
                                        <p><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
                                    </div>
                                </div>
                            </article> 
                        <!-- // bs-posts-sec block_6 -->
                        </div>
                    <?php } 
                    blogus_page_pagination();
                } else { ?> 
                    <!-- bs-posts-sec bs-posts-modul-6 -->
                    <div class="bs-posts-sec bs-posts-modul-6 bs-blog-post list-blog">    
                        <div class="inner">
                            <h2><?php esc_html_e( "Nothing Found", 'blogus' ); ?></h2>
                            <div class="">
                                <p>
                                    <?php esc_html_e( "Sorry, but nothing matched your search criteria. Please try again with some different keywords.", 'blogus' ); ?>
                                </p>
                                <?php get_search_form(); ?>
                            </div>
                        </div>
                    <!-- // bs-posts-sec block_6 -->
                    </div>
                <?php } ?> 
            </div>
            <!--col-lg-12-->
        </div>
        <aside class="col-lg-4">
            <?php get_sidebar();?>
        </aside>
    <?php }
endif;
add_action( 'blogus_search_main_content', 'blogus_search_main' );