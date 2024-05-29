<?php
/**
 * The template for displaying search results pages.
 *
 * @package Newsup
 */
get_header(); ?>
<!--==================== Newsup breadcrumb section ====================-->
<?php get_template_part('index','banner'); ?>
<!--==================== main content section ====================-->
<div id="content">
    <!--container-->
    <div class="container-fluid">
    <!--row-->
        <div class="row">
        <?php $newsup_page_layout = get_theme_mod('newsup_page_layout','page-align-content-right');
            if($newsup_page_layout == "page-align-content-left"){ ?>
                <aside class="col-md-4 sidebar-left">
                    <?php get_sidebar();?>
                </aside>
            <?php } ?>

            <div class="<?php echo esc_attr($newsup_page_layout == 'page-full-width-content' ? 'col-md-12' : 'col-md-8 content-right') ?>">
                <div class="mg-card-box padding-20 search">
                    <h2><?php /* translators: %s: search term */ printf( esc_html__( 'Search Results for: %s','newsup'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h2>
                </div>
                <?php get_template_part( 'template-parts/content', 'search' ); ?>
            </div>

            <?php if($newsup_page_layout == "page-align-content-right") { ?>
                <aside class="col-md-4 sidebar-right">
                    <?php get_sidebar();?>
                </aside>
            <?php } ?>
        </div><!--/row-->
    </div><!--/container-->
</div>
<?php get_footer();