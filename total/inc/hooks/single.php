<?php
if (!function_exists('total_page_header')) {

    function total_page_header() {
        $total_hide_title = get_post_meta(get_the_ID(), 'total_hide_title', true);

        if (!$total_hide_title) {
            ?>
            <div class="ht-main-header">
                <div class="ht-container">
                    <?php the_title('<h1 class="ht-main-title">', '</h1>'); ?>
                    <?php
                    if (!is_front_page()) {
                        do_action('total_breadcrumbs');
                    }
                    ?>
                </div>
            </div><!-- .entry-header -->
            <?php
        }
    }

}

if (!function_exists('total_page_content')) {

    function total_page_content() {
        ?>
        <div class="ht-container ht-clearfix">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">

                    <?php while (have_posts()) : the_post();
                        ?>

                        <?php get_template_part('template-parts/content', 'page'); ?>

                        <?php
                        // If comments are open or we have at least one comment, load up the comment template.
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;
                        ?>

                    <?php endwhile; ?>

                </main>
            </div>

            <?php get_sidebar(); ?>
        </div>

        <?php
    }

}

if (!function_exists('total_single_header')) {

    function total_single_header() {
        $total_hide_title = get_post_meta(get_the_ID(), 'total_hide_title', true);

        if (!$total_hide_title) {
            ?>
            <div class="ht-main-header">
                <div class="ht-container">
                    <?php the_title('<h1 class="ht-main-title">', '</h1>'); ?>
                    <?php do_action('total_breadcrumbs'); ?>
                </div>
            </div>
            <?php
        }
    }

}

if (!function_exists('total_single_content')) {

    function total_single_content() {
        ?>
        <div class="ht-container ht-clearfix">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">

                    <?php while (have_posts()) : the_post(); ?>

                        <?php get_template_part('template-parts/content', 'single'); ?>

                        <?php
                        // If comments are open or we have at least one comment, load up the comment template.
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;
                        ?>

                    <?php endwhile; ?>

                </main>
            </div>

            <?php get_sidebar(); ?>

        </div>

        <?php
    }

}

add_action('total_page_template', 'total_page_header');
add_action('total_page_template', 'total_page_content');

add_action('total_single_template', 'total_single_header');
add_action('total_single_template', 'total_single_content');
