<?php
/**
 * Template part for displaying posts.
 *
 * @package Total
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ('post' == get_post_type()) : ?>
        <div class="entry-meta ht-post-info">
            <?php total_posted_on(); ?>
        </div><!-- .entry-meta -->
    <?php endif; ?>


    <div class="ht-post-wrapper">
        <?php
        if (has_post_thumbnail()) {
            $total_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'total-blog-header');
            if (isset($total_image[0])) {
                ?>
                <figure class="entry-figure">
                    <?php ?>
                    <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($total_image[0]); ?>" alt="<?php echo esc_attr(get_the_title()) ?>"></a>
                </figure>
                <?php
            }
        }
        ?>

        <header class="entry-header">
            <?php the_title(sprintf('<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>'); ?>
        </header><!-- .entry-header -->

        <div class="entry-categories">
            <?php echo total_entry_category(); // WPCS: XSS OK.  ?>
        </div>

        <div class="entry-content">
            <?php
            /* translators: %s: Name of current post */
            the_content(sprintf(
                            /* translators: title of the post */
                            wp_kses(__('Continue reading %s <span class="meta-nav">&rarr;</span>', 'total'), array('span' => array('class' => array()))), the_title('<span class="screen-reader-text">"', '"</span>', false)
            ));
            ?>

            <?php
            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'total'),
                'after' => '</div>',
            ));
            ?>
        </div><!-- .entry-content -->
    </div>
</article><!-- #post-## -->
