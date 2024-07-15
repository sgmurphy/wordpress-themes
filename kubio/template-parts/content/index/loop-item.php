<div class="<?php kubio_print_archive_entry_class('wp-block wp-block-kubio-query-loop-item  position-relative wp-block-kubio-query-loop-item__container kubio-index__k__fx1L_l5Ny--container kubio-local-189-container d-flex   '); ?>"" data-kubio="kubio/query-loop-item">
	<div class="position-relative wp-block-kubio-query-loop-item__inner kubio-index__k__fx1L_l5Ny--inner kubio-local-189-inner d-flex h-flex-basis h-px-lg-0 v-inner-lg-0 h-px-md-0 v-inner-md-3 h-px-0 v-inner-0">
		<div class="position-relative wp-block-kubio-query-loop-item__align kubio-index__k__fx1L_l5Ny--align kubio-local-189-align h-y-container h-column__content h-column__v-align flex-basis-100 align-self-lg-start align-self-md-start align-self-start">
			<figure class="wp-block wp-block-kubio-post-featured-image  position-relative wp-block-kubio-post-featured-image__container kubio-index__k__6duco09NdG-container kubio-local-190-container h-aspect-ratio--16-9 <?php kubio_post_missing_featured_image_class(); ?>" data-kubio="kubio/post-featured-image" data-kubio-settings="{{kubio_settings_value}}">
				<?php if(has_post_thumbnail()): ?>
				<img class='position-relative wp-block-kubio-post-featured-image__image kubio-index__k__6duco09NdG-image kubio-local--image' src='<?php echo esc_url(get_the_post_thumbnail_url());?>' />
				<?php endif; ?>
				<div class="position-relative wp-block-kubio-post-featured-image__inner kubio-index__k__6duco09NdG-inner kubio-local-190-inner">
					<div class="position-relative wp-block-kubio-post-featured-image__align kubio-index__k__6duco09NdG-align kubio-local-190-align h-y-container align-self-lg-center align-self-md-center align-self-center"></div>
				</div>
			</figure>
			<div class="wp-block wp-block-kubio-post-meta  position-relative wp-block-kubio-post-meta__metaDataContainer kubio-index__k__T2yqalWyM-metaDataContainer kubio-local-191-metaDataContainer h-blog-meta" data-kubio="kubio/post-meta" id="post-metadata">
				<span class="metadata-item">
					<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta("ID"))); ?>">
						<?php echo esc_html(get_the_author_meta("display_name",get_post_field("post_author"))); ?>
					</a>
				</span>
				<span class="metadata-separator">
					-
				</span>
				<span class="metadata-item">
					<a href="<?php echo esc_url(get_day_link(get_post_time( 'Y' ),get_post_time( 'm' ),get_post_time( 'j' ))); ?>">
						<?php echo esc_html(get_the_date('j F Y')); ?>
					</a>
				</span>
				<span class="metadata-separator">
					-
				</span>
				<span class="metadata-item">
					<a href="">
						<?php echo esc_html(get_the_time()); ?>
					</a>
				</span>
			</div>
			<a class="position-relative wp-block-kubio-post-title__link kubio-index__k__yndIzn0LAb-link kubio-local-192-link d-block" href="<?php echo esc_url(get_the_permalink()); ?>">
				<h3 class="wp-block wp-block-kubio-post-title  position-relative wp-block-kubio-post-title__container kubio-index__k__yndIzn0LAb-container kubio-local-192-container" data-kubio="kubio/post-title">
					<?php the_title(); ?>
				</h3>
			</a>
			<p class="wp-block wp-block-kubio-post-excerpt  position-relative wp-block-kubio-post-excerpt__text kubio-index__k__fVTtKcA3Zp-text kubio-local-193-text" data-kubio="kubio/post-excerpt">
				<?php kubio_post_excerpt(array (
  'max_length' => 16,
)); ?>
			</p>
		</div>
	</div>
</div>
