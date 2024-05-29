<?php if( class_exists('woocommerce') && (is_account_page() || is_cart() || is_checkout())) { ?>
		<div class="col-md-12">
			<div class="mg-card-box padding-20">
			<?php if (have_posts()) {  while (have_posts()) : the_post();  the_content(); endwhile; } 
	
	} else {
		 	$newsup_page_layout = get_theme_mod('newsup_page_layout','page-align-content-right');
            if($newsup_page_layout == "page-align-content-left") { ?>
				<!--sidebar-->
				  	<!--col-md-4-->
						<aside class="col-md-4">
							<?php get_sidebar();?>
						</aside>
				  	<!--/col-md-4-->
			 	<!--/sidebar-->
            <?php } ?>

			<div class="<?php echo esc_attr($newsup_page_layout == 'page-full-width-content' ? 'col-md-12' : 'col-md-8') ?>">
				<div class="mg-card-box padding-20"> <?php 
					while ( have_posts() ) : the_post(); 
						the_post_thumbnail( '', array( 'class'=>'img-responsive' ) );
						the_content();
						
							wp_link_pages(array(
								'before' => '<div class="link btn-theme">' . esc_html__('Pages:', 'newsup'),
								'after' => '</div>',
							));
					endwhile;
					newsup_edit_link();

					if (comments_open() || get_comments_number()) :
						comments_template();
					endif; ?>	
				</div>
			</div>
			<!--Sidebar Area-->
			<?php if($newsup_page_layout == "page-align-content-right") { ?>
      			<!--sidebar-->
					<!--col-md-4-->
						<aside class="col-md-4">
							<?php get_sidebar();?>
						</aside>
					<!--/col-md-4-->
				<!--/sidebar-->
			<?php } ?>
			<!--Sidebar Area-->
	<?php } ?>