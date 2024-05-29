<?php
/**
 * The template for displaying search results pages.
 *
 * @package Blogus
 */

get_header(); ?>
<!--==================== main content section ====================-->
<div id="content">
    <!--container-->
    <div class="container">
    <!--row-->
        <div class="row">
            <!--==================== Breadcrumb section ====================-->
            <?php do_action('blogus_breadcrumb_content'); ?>
            <div class="col-lg-<?php echo ( !is_active_sidebar( 'sidebar-1' ) ? '12' :'8' ); ?>">
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php if ( have_posts() ) { /* Start the Loop */
                        while ( have_posts() ) { the_post(); ?> 
                            <!-- bs-posts-sec bs-posts-modul-6 -->
                            <div class="bs-posts-sec bs-posts-modul-6 bs-blog-post list-blog"> 
                                <?php blogus_post_image_display_type($post); ?>
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
        </div><!--/row-->
    </div><!--/container-->
</div>
<?php get_footer(); ?>