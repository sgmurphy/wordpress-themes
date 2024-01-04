<?php
/**
 * Template part for displaying single posts.
 *
 * @package Total
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="entry-content">
        <div class="single-entry-meta">
            <?php total_posted_on(); ?>
        </div><!-- .entry-meta -->

        <?php
        $total_single_display_featured_image = get_theme_mod('total_single_display_featured_image');
        if ($total_single_display_featured_image && has_post_thumbnail()) {
            echo '<div class="single-featured-img">';
            the_post_thumbnail('large');
            echo '</div>';
        }

        the_content();
        ?>

        <?php
        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'total'),
            'after' => '</div>',
        ));
        ?>
    </div><!-- .entry-content -->

</article><!-- #post-## -->

