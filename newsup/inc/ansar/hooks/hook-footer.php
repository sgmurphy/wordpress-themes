<?php
if (!function_exists('newsup_footer_missed')) :
    /**
     *  Footer You Missed
     *
     * @since Newsup
     *
     */
    function newsup_footer_missed() { 
        $you_missed_enable = esc_attr(get_theme_mod('you_missed_enable','true'));
        if($you_missed_enable == true) { ?>  
        <div class="missed-inner">
            <div class="row">
                <?php $you_missed_title = get_theme_mod('you_missed_title', esc_html('You missed','newsup'));
                if($you_missed_title) { ?>
                <div class="col-md-12">
                    <div class="mg-sec-title">
                        <!-- mg-sec-title -->
                        <h4><?php echo esc_html($you_missed_title); ?></h4>
                    </div>
                </div>
                <?php } 
                global $post;
                $newsup_you_missed_loop = new WP_Query(array( 'post_type' => 'post', 'posts_per_page' => 4, 'order' => 'DESC',  'ignore_sticky_posts' => true));
                if ( $newsup_you_missed_loop->have_posts() ) :
                while ( $newsup_you_missed_loop->have_posts() ) : $newsup_you_missed_loop->the_post(); 
                $url = newsup_get_freatured_image_url($post->ID, 'newsup-featured'); ?>
                <!--col-md-3-->
                <div class="col-lg-3 col-sm-6 pulse animated">
                    <div class="mg-blog-post-3 minh back-img mb-lg-0" <?php if(has_post_thumbnail()) { ?> style="background-image: url('<?php echo esc_url($url); ?>');" <?php } ?>>
                        <a class="link-div" href="<?php the_permalink(); ?>"></a>
                        <div class="mg-blog-inner">
                        <?php newsup_post_categories(); ?> 
                        <h4 class="title"> <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array('before' => 'Permalink to: ','after'  => '') ); ?>"> <?php the_title(); ?></a> </h4>
                            <?php newsup_post_meta(); ?>
                        </div>
                    </div>
                </div>
                <!--/col-md-3-->
                <?php endwhile; endif; wp_reset_postdata(); ?>
            </div>
        </div>
        <?php
        }
    }
endif;
add_action('newsup_action_header_footer_missed', 'newsup_footer_missed');