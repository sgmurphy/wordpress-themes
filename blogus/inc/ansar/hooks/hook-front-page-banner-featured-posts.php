<?php
if (!function_exists('blogus_banner_featured_posts')):
    /**
     * Ticker Slider
     *
     * @since Blogus 1.0.0
     *
     */
    function blogus_banner_featured_posts()
    {
        $color_class = 'category-color-1';
        ?>
        <?php
        $blogus_enable_featured_news = blogus_get_option('show_featured_news_section');
        if ($blogus_enable_featured_news):
            $blogus_featured_news_title = blogus_get_option('featured_news_section_title');
	        $dir = 'ltr';
	        if(is_rtl()){
		        $dir = 'rtl';
	        }
            ?>
            <div class="ta-main-banner-featured-posts featured-posts" dir="<?php echo esc_attr($dir);?>">
                <?php if (!empty($blogus_featured_news_title)): ?>
                    <h4 class="header-tater1 ">
                                <span class="header-tater <?php echo esc_attr($color_class); ?>">
                                    <?php echo esc_html($blogus_featured_news_title); ?>
                                </span>
                    </h4>
                <?php endif; ?>


                <div class="section-wrapper">
                    <div class="ta-double-column list-style ta-container-row clearfix">
                        <?php
                        $blogus_featured_category = blogus_get_option('select_featured_news_category');
                        $blogus_number_of_featured_news = blogus_get_option('number_of_featured_news');

                        $featured_posts = blogus_get_posts($blogus_number_of_featured_news, $blogus_featured_category);
                        if ($featured_posts->have_posts()) :
                            while ($featured_posts->have_posts()) :
                                $featured_posts->the_post();

                                global $post;
                                $url = blogus_get_freatured_image_url($post->ID, 'thumbnail');
                                ?>

                                <div class="col-3 pad float-l " data-mh="ta-feat-list">
                                    <div class="read-single color-pad">
                                        <div class="data-bg read-img pos-rel col-4 float-l read-bg-img"
                                             data-background="<?php echo esc_url($url); ?>">
                                            <img src="<?php echo esc_url($url); ?>">

                                            <span class="min-read-post-format">
		  								<?php echo esc_attr(blogus_post_format($post->ID)); ?>
                                        <?php blogus_count_content_words($post->ID); ?>
                                        </span>

                                        </div>
                                        <div class="read-details col-75 float-l pad color-tp-pad">
                                            <div class="read-categories">
                                                <?php blogus_post_categories(); ?>
                                            </div>
                                            <div class="read-title">
                                                <h4>
                                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                </h4>
                                            </div>

                                            <div class="entry-meta">
                                                <?php blogus_post_meta(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>

        <?php endif;
    }
endif;

add_action('blogus_action_banner_featured_posts', 'blogus_banner_featured_posts', 10);