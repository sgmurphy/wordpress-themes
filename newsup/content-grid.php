<?php
/**
 * The template for displaying the content.
 * @package Newsup
 */
?>
<div id="grid" class="row" >
    <?php while(have_posts()){ the_post();  
        $newsup_content_layout = esc_attr(get_theme_mod('newsup_content_layout','align-content-right')); ?>
        <div id="post-<?php the_ID(); ?>" <?php if($newsup_content_layout == "grid-fullwidth") { echo post_class('col-lg-4 col-md-6'); } else { echo post_class('col-md-6'); } ?>>
        <!-- mg-posts-sec mg-posts-modul-6 -->
            <div class="mg-blog-post-box"> 
                <?php newsup_post_image_display_type($post); ?>
                <article class="small">
                    <?php newsup_post_categories(); ?> 
                    <h4 class="entry-title title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>  
                    <?php newsup_post_meta(); ?>
                    <?php $newsup_excerpt = newsup_the_excerpt( absint( 20 ) );
                        if ( !empty( $newsup_excerpt ) ) { echo wp_kses_post( wpautop( $newsup_excerpt ) ); } ?>
                </article>
            </div>
        </div>
    <?php }  newsup_page_pagination(); ?>
</div>