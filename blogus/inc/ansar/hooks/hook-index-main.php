<?php 
if (!function_exists('blogus_main_content')) :
    function blogus_main_content()
    {
        $blogus_content_layout = esc_attr(get_theme_mod('blogus_content_layout','align-content-right'));
        if($blogus_content_layout == "align-content-left" || $blogus_content_layout == "grid-left-sidebar") { ?>
            <!--col-lg-4-->
            <aside class="col-lg-4 sidebar-left">
                <?php get_sidebar();?>
            </aside>
            <!--/col-lg-4-->
        <?php } ?>
        
            <!--col-lg-8-->
        <?php if($blogus_content_layout == "align-content-right" || $blogus_content_layout == "align-content-left"){ ?>
            <div class="col-lg-8 content-right">
                <?php get_template_part('template-parts/content', get_post_format()); ?>
            </div>
        <?php } elseif($blogus_content_layout == "full-width-content") { ?>
            <div class="col-lg-12 content-full">
                <?php get_template_part('template-parts/content', get_post_format()); ?>
            </div>
        <?php }  
        
        if($blogus_content_layout == "grid-left-sidebar" || $blogus_content_layout == "grid-right-sidebar"){ ?>
            <div class="col-lg-8 content-right">
                <?php get_template_part('content','grid'); ?>
            </div>
        <?php } elseif($blogus_content_layout == "grid-fullwidth") { ?>
            <div class="col-lg-12 content-full">
                <?php get_template_part('content','grid'); ?>
            </div>
        <?php } ?>

            <!--/col-lg-8-->
        <?php if($blogus_content_layout == "align-content-right" || $blogus_content_layout == "grid-right-sidebar") { ?>
            <!--col-lg-4-->
            <aside class="col-lg-4 sidebar-right">
                <?php get_sidebar();?>
            </aside>
            <!--/col-lg-4-->
        <?php }        
    }
endif;
add_action('blogus_action_main_content_layouts', 'blogus_main_content', 40);


if (!function_exists('blogus_single_content')) :
    function blogus_single_content() { 
    $blogus_single_post_category = esc_attr(get_theme_mod('blogus_single_post_category','true'));
    $blogus_single_post_admin_details = esc_attr(get_theme_mod('blogus_single_post_admin_details','true'));
    $blogus_single_post_date = esc_attr(get_theme_mod('blogus_single_post_date','true'));
    $blogus_single_post_tag = esc_attr(get_theme_mod('blogus_single_post_tag','true'));
    $single_show_featured_image = esc_attr(get_theme_mod('single_show_featured_image','true'));
    if(have_posts()) {
        while(have_posts()) { the_post(); ?>
            <div class="bs-blog-post single"> 
                <div class="bs-header">
                    <?php $tags = get_the_tags();
                    $blogus_single_post_category = esc_attr(get_theme_mod('blogus_single_post_category','true'));
                    if($blogus_single_post_category == true){ blogus_post_categories(); } ?>
                    <h1 class="title"> 
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array('before' => esc_html_e('Permalink to: ','blogus'),'after'  => '') ); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h1>

                    <div class="bs-info-author-block">
                        <div class="bs-blog-meta mb-0"> 
                            <?php if($blogus_single_post_admin_details == true){ ?>
                                <span class="bs-author">
                                    <a class="auth" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>">
                                        <?php echo get_avatar( get_the_author_meta( 'ID') , 150); ?>
                                    </a> 
                                    <?php esc_html_e('By','blogus'); ?>
                                    <a class="ms-1" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>">
                                        <?php the_author(); ?>
                                    </a>
                                </span>
                            <?php } 
                            if($blogus_single_post_date == true){ blogus_date_content(); }
                            if($blogus_single_post_tag == true){
                            $tag_list = get_the_tag_list();
                            if($tag_list){ ?>
                            <span class="blogus-tags tag-links">
                            <?php $keys = array_keys($tags);
                            foreach ($tags as $key => $tag) {
                                $tag_link = get_tag_link($tag->term_id);
                                if ($key === end($keys)) {
                                    echo '<a href="'.esc_url($tag_link).'">#'.esc_html($tag->name).'</a>';
                                } else {
                                    echo ' <a href="'.esc_url($tag_link).'">#'.esc_html($tag->name).'</a>, ';
                                }
                                }  ?>
                            </span>
                            <?php } } ?>
                        </div>
                    </div>
                </div>
                <?php if($single_show_featured_image == true) {
                    if (has_post_thumbnail()) {
                        echo '<div class="bs-blog-thumb">';
                        the_post_thumbnail('', array('class' => 'img-fluid'));
                        echo '</div>';
                    
                        $thumbnail_id = get_post_thumbnail_id();
                        if ($thumbnail_id) {
                            $thumbnail_post = get_post($thumbnail_id);

                            if ($thumbnail_post) {
                                $caption = $thumbnail_post->post_excerpt;

                                if (!empty($caption)) {
                                    echo '<span class="featured-image-caption">' . esc_html($caption) . '</span>';
                                }
                            }
                        }
                    }
                } ?>
                <article class="small single">
                    <?php the_content(); 
                    blogus_edit_link();
                    blogus_social_share_post(get_post()); ?>
                    <div class="clearfix mb-3"></div>
                    <?php
                    $prev =  (is_rtl()) ? " fa-angle-double-right" : " fa-angle-double-left";
                    $next =  (is_rtl()) ? " fa-angle-double-left" : " fa-angle-double-right";
                    the_post_navigation(array(
                        'prev_text' => '<div class="fas' .$prev.'"></div><span> %title</span>',
                        'next_text' => '<span>%title </span><div class="fas' .$next.'"></div>',
                        'in_same_term' => true,
                    ));
                
                    wp_link_pages(array(
                        'before' => '<div class="single-nav-links">',
                        'after' => '</div>',
                    ));
                    ?>
                </article>
            </div>
        <?php }

        do_action('blogus_action_single_author_box');
        do_action('blogus_action_single_related_box');
    }
    do_action('blogus_action_single_comments_box');
}
endif;
add_action('blogus_action_main_single_content', 'blogus_single_content', 40);

if (!function_exists('blogus_single_author_box')) :
    function blogus_single_author_box() { 

        $blogus_enable_single_admin_details = esc_attr(get_theme_mod('blogus_enable_single_admin_details',true));
        if($blogus_enable_single_admin_details == true) { ?> 
        <div class="bs-info-author-block py-4 px-3 mb-4 flex-column justify-content-center text-center">
            <a class="bs-author-pic mb-3" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php echo get_avatar( get_the_author_meta( 'ID') , 150); ?></a>
            <div class="flex-grow-1">
              <h4 class="title"><?php esc_html_e('By','blogus'); ?> <a href ="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php the_author(); ?></a></h4>
              <p><?php the_author_meta( 'description' ); ?></p>
            </div>
        </div>
        <?php }
    }
endif;
add_action('blogus_action_single_author_box', 'blogus_single_author_box', 40);

if (!function_exists('blogus_single_related_box')) :
    function blogus_single_related_box() { 
        $blogus_enable_related_post = esc_attr(get_theme_mod('blogus_enable_related_post','true'));
        $blogus_enable_single_post_category = esc_attr(get_theme_mod('blogus_enable_single_post_category','true'));
        $blogus_related_post_title = get_theme_mod('blogus_related_post_title', esc_html__('Related Post','blogus'));
        $blogus_enable_single_post_date = esc_attr(get_theme_mod('blogus_enable_single_post_date','true'));
        $blogus_enable_single_post_admin_details = esc_attr(get_theme_mod('blogus_enable_single_post_admin_details','true'));
        if($blogus_enable_related_post == true){ ?>
            <div class="py-4 px-3 mb-4 bs-card-box bs-single-related">
                <!--Start bs-realated-slider -->
                <div class="bs-widget-title  mb-3 relat-cls">
                    <!-- bs-sec-title -->
                    <?php $blogus_related_post_title = get_theme_mod('blogus_related_post_title', esc_html__('Related Post','blogus'))?>
                    <h4 class="title"><?php echo esc_html($blogus_related_post_title);?></h4>
                </div>
                <!-- // bs-sec-title -->
                <div class="related-post">
                    <div class="row">
                        <!-- featured_post -->
                        <?php global $post;
                        $categories = get_the_category($post->ID);
                        $number_of_related_posts = 3;
                        if ($categories) {
                            $cat_ids = array();
                            foreach ($categories as $category) $cat_ids[] = $category->term_id;
                            $args = array(
                                'category__in' => $cat_ids,
                                'post__not_in' => array($post->ID),
                                'posts_per_page' => $number_of_related_posts, // Number of related posts to display.
                                'ignore_sticky_posts' => 1
                            );
                            $related_posts = new wp_query($args);
                            while ($related_posts->have_posts()) {
                            $related_posts->the_post();
                            global $post;
                            $url = blogus_get_freatured_image_url($post->ID, 'blogus-featured');
                            ?>
                            <!-- blog -->
                            <div class="col-md-4">
                                <div class="bs-blog-post three md back-img bshre mb-md-0" <?php if(has_post_thumbnail()) { ?> style="background-image: url('<?php echo esc_url($url); ?>');" <?php } ?>>
                                <a class="link-div" href="<?php the_permalink(); ?>"></a>
                                    <div class="inner">
                                        <?php if($blogus_enable_single_post_category == true) { blogus_post_categories(); } ?>
                                        <h4 class="title sm mb-0">
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array('before' => 'Permalink to: ','after'  => '') ); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </h4> 
                                        <div class="bs-blog-meta">
                                            <?php if($blogus_enable_single_post_admin_details == true){ 
                                            blogus_author_content();
                                            } 
                                            if($blogus_enable_single_post_date == true) { 
                                                blogus_date_content(); 
                                            } 
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- blog -->
                            <?php }
                        }
                        wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        <!--End mg-realated-slider -->
        <?php }
    }
endif;
add_action('blogus_action_single_related_box', 'blogus_single_related_box', 40);

if (!function_exists('blogus_single_comments_box')) :
    function blogus_single_comments_box() { 
        $blogus_enable_single_post_comments = esc_attr(get_theme_mod('blogus_enable_single_post_comments',true));
        if($blogus_enable_single_post_comments == true) {
            if (comments_open() || get_comments_number()) :
            comments_template();
            endif; 
        }
    }
endif;
add_action('blogus_action_single_comments_box', 'blogus_single_comments_box', 40);