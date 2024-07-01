<?php
/**
 * The template for displaying all WooCommerce pages.
 *
 * @package Blogus
 */
get_header(); ?>
<!-- #main -->
<main id="content" class="woo-class">
	<div class="container">
		<!--==================== breadcrumb section ====================-->
		<?php do_action('blogus_action_archive_page_title'); ?>
		<div class="row">
			<div class="col-md-12">
				<div class="bs-card-box padding-20">
					<?php woocommerce_content(); ?>
				</div>
			</div>
		</div><!-- .container -->
	</div>	
</main><!-- #main -->
<?php get_footer(); ?>