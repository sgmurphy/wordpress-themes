<?php
$blogus_slider_category = blogus_get_option('select_slider_news_category');
$blogus_number_of_slides = blogus_get_option('number_of_slides');
$blogus_all_posts_main = blogus_get_posts($blogus_number_of_slides, $blogus_slider_category);
$blogus_count = 1;

if ($blogus_all_posts_main->have_posts()) :
    while ($blogus_all_posts_main->have_posts()) : $blogus_all_posts_main->the_post();

    global $post;
    $blogus_url = blogus_get_freatured_image_url($post->ID, 'blogus-slider-full');
    $slider_meta_enable = get_theme_mod('slider_meta_enable','true');
    $slider_overlay_enable = get_theme_mod('slider_overlay_enable','true'); ?>

    <div class="swiper-slide">
        <div class="bs-slide back-img one <?php if ($slider_overlay_enable != false){ ?>overlay<?php } ?>" style="background-image: url('<?php echo esc_url($blogus_url); ?>');">
            <a class="link-div" href="<?php the_permalink(); ?>"> </a>
            <div class="inner">
                <?php if($slider_meta_enable == true) { ?><?php blogus_post_categories(); ?><?php } ?>
                <h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                <?php if($slider_meta_enable == true) { blogus_post_meta(); } ?>
            </div>
        </div>
    </div> <?php 

    endwhile;
endif;
wp_reset_postdata(); ?>