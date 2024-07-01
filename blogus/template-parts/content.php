<?php
/**
 * The template for displaying the content.
 * @package Blogus
 */
?>
<div id="blog-list" class="blog-post-list">
    <?php while(have_posts()){ the_post(); ?> 
        <div id="post-<?php the_ID(); ?>" <?php post_class('bs-blog-post list-blog'); ?>>
            <?php blogus_post_image_display_type($post);  ?>
            <article class="small col text-xs">
              <?php $blogus_global_category_enable = get_theme_mod('blogus_global_category_enable','true');
              if($blogus_global_category_enable == 'true') { blogus_post_categories(); } ?>
              <h4 class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
              <?php blogus_post_meta(); blogus_posted_content(); ?>
            </article>
        </div> 
    <?php }
    blogus_page_pagination(); ?>
</div>
<?php