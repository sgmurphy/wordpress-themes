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
add_action('newsup_action_footer_missed', 'newsup_footer_missed');


if (!function_exists('newsup_footer_copyright')) :
    /**
     *  Footer Copyright
     *
     * @since Newsup
     *
     */
    function newsup_footer_copyright() { ?>
        <div class="container-fluid">
            <div class="row">
                <?php $newsup_enable_footer_menu = esc_attr(get_theme_mod('newsup_enable_footer_menu','true'));
                if($newsup_enable_footer_menu == true){ ?>
                <div class="col-md-6 text-xs">
                <?php } else { ?> 
                <div class="col-md-12 text-xs text-center">
                <?php } ?>
                    <p>
                    <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'newsup' ) ); ?>">
                    <?php
                    /* translators: placeholder replaced with string */
                    printf( esc_html__( 'Proudly powered by %s', 'newsup' ), 'WordPress' );
                    ?>
                    </a>
                    <span class="sep"> | </span>
                    <?php
                    /* translators: placeholder replaced with string */
                    printf( esc_html__( 'Theme: %1$s by %2$s.', 'newsup' ), 'Newsup', '<a href="' . esc_url( __( 'https://themeansar.com/', 'newsup' ) ) . '" rel="designer">Themeansar</a>' );
                    ?>
                    </p>
                </div>
                    <?php if($newsup_enable_footer_menu == true){ ?>
                        <div class="col-md-6 text-md-right text-xs">
                            <?php wp_nav_menu( array(
                                    'theme_location' => 'footer',
                                    'container'  => 'nav-collapse collapse navbar-inverse-collapse',
                                    'menu_class' => 'info-right',
                                    'fallback_cb' => 'newsup_fallback_page_menu',
                                    'walker' => new newsup_nav_walker()
                                ) ); 
                            ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php }
endif;
add_action('newsup_action_footer_copyright', 'newsup_footer_copyright');