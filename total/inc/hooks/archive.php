<?php
if (!function_exists('total_home_header')) {

    function total_home_header() {
        if (is_home() && !is_front_page()) {
            ?>
            <div class="ht-main-header">
                <div class="ht-container">
                    <h1 class="ht-main-title"><?php single_post_title(); ?></h1>
                    <?php do_action('total_breadcrumbs'); ?>
                </div>
            </div><!-- .entry-header -->
            <?php
        } else {
            ?>
            <div class="ht-main-header" style="padding: 0"></div>
            <?php
        }
    }

}

if (!function_exists('total_home_content')) {

    function total_home_content() {
        ?>
        <div class="ht-main-content ht-container ht-clearfix">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">

                    <?php
                    if (have_posts()):
                        while (have_posts()):
                            the_post();

                            get_template_part('template-parts/content', 'summary');

                        endwhile;

                        the_posts_pagination();
                    else:
                        get_template_part('template-parts/content', 'none');
                    endif;
                    ?>

                </main><!-- #main -->
            </div><!-- #primary -->

            <?php get_sidebar(); ?>

        </div>
        <?php
    }

}

if (!function_exists('total_search_header')) {

    function total_search_header() {
        ?>
        <div class="ht-main-header">
            <div class="ht-container">
                <h1 class="ht-main-title">
                    <?php
                    printf(
                        /* translators: search query text */
                        esc_html__('Search Results for: %s', 'total'), '<span>' . get_search_query() . '</span>'
                    );
                    ?>
                </h1>
                <?php do_action('total_breadcrumbs'); ?>
            </div>
        </div><!-- .entry-header -->
        <?php
    }

}

if (!function_exists('total_search_content')) {

    function total_search_content() {
        ?>
        <div class="ht-container ht-clearfix">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">

                    <?php
                    if (have_posts()):
                        while (have_posts()):
                            the_post();
                            get_template_part('template-parts/content', 'search');
                        endwhile;
                        the_posts_pagination();
                    else:
                        get_template_part('template-parts/content', 'none');
                    endif;
                    ?>

                </main><!-- #main -->
            </div><!-- #primary -->

            <?php get_sidebar(); ?>

        </div>

        <?php
    }

}

if (!function_exists('total_archive_header')) {

    function total_archive_header() {
        ?>
        <div class="ht-main-header">
            <div class="ht-container">
                <?php
                the_archive_title('<h1 class="ht-main-title">', '</h1>');

                the_archive_description('<div class="taxonomy-description">', '</div>');

                do_action('total_breadcrumbs');
                ?>
            </div>
        </div><!-- .ht-main-header -->
        <?php
    }

}

if (!function_exists('total_archive_content')) {

    function total_archive_content() {
        ?>
        <div class="ht-container ht-clearfix">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">

                    <?php
                    if (have_posts()):
                        while (have_posts()):
                            the_post();
                            get_template_part('template-parts/content', 'summary');
                        endwhile;
                        the_posts_pagination();
                    else:
                        get_template_part('template-parts/content', 'none');
                    endif;
                    ?>

                </main><!-- #main -->
            </div><!-- #primary -->

            <?php get_sidebar(); ?>

        </div>

        <?php
    }

}
add_action('total_home_template', 'total_home_header', 10);
add_action('total_home_template', 'total_home_content', 20);

add_action('total_search_template', 'total_search_header', 10);
add_action('total_search_template', 'total_search_content', 20);

add_action('total_archive_template', 'total_archive_header', 10);
add_action('total_archive_template', 'total_archive_content', 20);
