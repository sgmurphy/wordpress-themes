<div id="post-<?php the_ID(); ?>" class=" <?php get_post_class() ?> wp-block wp-block-kubio-query-layout  position-relative wp-block-kubio-query-layout__outer kubio-single__k__single-lAFSH8Xo9x-outer kubio-local-521-outer d-flex h-section-global-spacing align-items-lg-center align-items-md-center align-items-center" data-kubio="kubio/query-layout" id="blog-layout">
	<div class="position-relative wp-block-kubio-query-layout__inner kubio-single__k__single-lAFSH8Xo9x-inner kubio-local-521-inner h-section-grid-container h-section-boxed-container">
		<div class="wp-block wp-block-kubio-row  position-relative wp-block-kubio-row__container kubio-single__k__single-baLWB4dRKjp-container kubio-local-522-container gutters-row-lg-0 gutters-row-v-lg-0 gutters-row-md-0 gutters-row-v-md-0 gutters-row-0 gutters-row-v-0" data-kubio="kubio/row">
			<div class="position-relative wp-block-kubio-row__inner kubio-single__k__single-baLWB4dRKjp-inner kubio-local-522-inner h-row align-items-lg-stretch align-items-md-stretch align-items-stretch justify-content-lg-center justify-content-md-center justify-content-center gutters-col-lg-0 gutters-col-v-lg-0 gutters-col-md-0 gutters-col-v-md-0 gutters-col-0 gutters-col-v-0">
				<div class="wp-block wp-block-kubio-column  position-relative wp-block-kubio-column__container kubio-single__k__single-kxeqsSpdy-n-container kubio-local-523-container d-flex h-col-lg-auto h-col-md-auto h-col-auto" data-kubio="kubio/column">
					<div class="position-relative wp-block-kubio-column__inner kubio-single__k__single-kxeqsSpdy-n-inner kubio-local-523-inner d-flex h-flex-basis h-px-lg-3 v-inner-lg-0 h-px-md-3 v-inner-md-0 h-px-3 v-inner-0">
						<div class="position-relative wp-block-kubio-column__align kubio-single__k__single-kxeqsSpdy-n-align kubio-local-523-align h-y-container h-column__content h-column__v-align flex-basis-100 align-self-lg-start align-self-md-start align-self-start">
							<figure class="wp-block wp-block-kubio-post-featured-image  position-relative wp-block-kubio-post-featured-image__container kubio-single__k__single-rlYTEhTMib-container kubio-local-524-container h-aspect-ratio--16-9 <?php kubio_post_missing_featured_image_class(); ?>" data-kubio="kubio/post-featured-image" data-kubio-settings="{{kubio_settings_value}}">
								<?php if(has_post_thumbnail()): ?>
								<img class='position-relative wp-block-kubio-post-featured-image__image kubio-single__k__single-rlYTEhTMib-image kubio-local--image' src='<?php echo esc_url(get_the_post_thumbnail_url());?>' />
								<?php endif; ?>
								<div class="position-relative wp-block-kubio-post-featured-image__inner kubio-single__k__single-rlYTEhTMib-inner kubio-local-524-inner">
									<div class="position-relative wp-block-kubio-post-featured-image__align kubio-single__k__single-rlYTEhTMib-align kubio-local-524-align h-y-container align-self-lg-end align-self-md-end align-self-end"></div>
								</div>
							</figure>
							<div class="wp-block wp-block-kubio-post-meta  position-relative wp-block-kubio-post-meta__metaDataContainer kubio-single__k__KGesgqe_P-metaDataContainer kubio-local-525-metaDataContainer h-blog-meta" data-kubio="kubio/post-meta" id="post-metadata">
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
							<div class="wp-block wp-block-kubio-row  position-relative wp-block-kubio-row__container kubio-single__k__single-SbdKxHs2YI-container kubio-local-526-container gutters-row-lg-0 gutters-row-v-lg-0 gutters-row-md-0 gutters-row-v-md-0 gutters-row-0 gutters-row-v-0" data-kubio="kubio/row">
								<div class="position-relative wp-block-kubio-row__inner kubio-single__k__single-SbdKxHs2YI-inner kubio-local-526-inner h-row align-items-lg-stretch align-items-md-stretch align-items-stretch justify-content-lg-center justify-content-md-center justify-content-center gutters-col-lg-0 gutters-col-v-lg-0 gutters-col-md-0 gutters-col-v-md-0 gutters-col-0 gutters-col-v-0">
									<div class="wp-block wp-block-kubio-column  position-relative wp-block-kubio-column__container kubio-single__k__single-3VGwAjm9cX-container kubio-local-527-container d-flex h-col-lg-auto h-col-md-auto h-col-auto" data-kubio="kubio/column">
										<div class="position-relative wp-block-kubio-column__inner kubio-single__k__single-3VGwAjm9cX-inner kubio-local-527-inner d-flex h-flex-basis h-px-lg-0 v-inner-lg-0 h-px-md-0 v-inner-md-0 h-px-0 v-inner-0">
											<div class="position-relative wp-block-kubio-column__align kubio-single__k__single-3VGwAjm9cX-align kubio-local-527-align h-y-container h-column__content h-column__v-align flex-basis-100 align-self-lg-start align-self-md-start align-self-start">
												<?php the_content(); ?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="wp-block wp-block-kubio-row  position-relative wp-block-kubio-row__container kubio-single__k__oBH0ABWoeL-container kubio-local-528-container gutters-row-lg-0 gutters-row-v-lg-0 gutters-row-md-0 gutters-row-v-md-0 gutters-row-0 gutters-row-v-0" data-kubio="kubio/row">
								<div class="position-relative wp-block-kubio-row__inner kubio-single__k__oBH0ABWoeL-inner kubio-local-528-inner h-row align-items-lg-stretch align-items-md-stretch align-items-stretch justify-content-lg-center justify-content-md-center justify-content-center gutters-col-lg-0 gutters-col-v-lg-0 gutters-col-md-0 gutters-col-v-md-0 gutters-col-0 gutters-col-v-0">
									<div class="wp-block wp-block-kubio-column  position-relative wp-block-kubio-column__container kubio-single__k__wETEbWZUNc-container kubio-local-529-container d-flex h-col-lg-auto h-col-md-auto h-col-auto" data-kubio="kubio/column">
										<div class="position-relative wp-block-kubio-column__inner kubio-single__k__wETEbWZUNc-inner kubio-local-529-inner d-flex h-flex-basis h-px-lg-3 v-inner-lg-3 h-px-md-3 v-inner-md-3 h-px-3 v-inner-3">
											<div class="position-relative wp-block-kubio-column__align kubio-single__k__wETEbWZUNc-align kubio-local-529-align h-y-container h-column__content h-column__v-align flex-basis-100 align-self-lg-start align-self-md-start align-self-start">
												<p class="wp-block wp-block-kubio-text  position-relative wp-block-kubio-text__text kubio-single__k__single-1pwRcGAnh-text kubio-local-530-text" data-kubio="kubio/text">
													<?php esc_html_e('CATEGORIES:', 'kubio'); ?>
												</p>
												<div class="wp-block wp-block-kubio-post-categories  position-relative wp-block-kubio-post-categories__container kubio-single__k__up5pQ_Cww-container kubio-local-531-container kubio-post-categories-container" data-kubio="kubio/post-categories">
													<div class="position-relative wp-block-kubio-post-categories__placeholder kubio-single__k__up5pQ_Cww-placeholder kubio-local-531-placeholder kubio-post-categories-placeholder"></div>
													<div class="position-relative wp-block-kubio-post-categories__tags kubio-single__k__up5pQ_Cww-tags kubio-local-531-tags">
														<?php kubio_categories_list(__('No category', 'kubio')); ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="wp-block wp-block-kubio-row  position-relative wp-block-kubio-row__container kubio-single__k__single-1uGRU27HVz-container kubio-local-532-container gutters-row-lg-0 gutters-row-v-lg-1 gutters-row-md-0 gutters-row-v-md-1 gutters-row-0 gutters-row-v-1" data-kubio="kubio/row">
								<div class="position-relative wp-block-kubio-row__inner kubio-single__k__single-1uGRU27HVz-inner kubio-local-532-inner h-row align-items-lg-stretch align-items-md-stretch align-items-stretch justify-content-lg-start justify-content-md-start justify-content-start gutters-col-lg-0 gutters-col-v-lg-1 gutters-col-md-0 gutters-col-v-md-1 gutters-col-0 gutters-col-v-1">
									<div class="wp-block wp-block-kubio-column  position-relative wp-block-kubio-column__container kubio-single__k__single-K4Akm2YNqS-container kubio-local-533-container d-flex h-col-lg-auto h-col-md-auto h-col-auto" data-kubio="kubio/column">
										<div class="position-relative wp-block-kubio-column__inner kubio-single__k__single-K4Akm2YNqS-inner kubio-local-533-inner d-flex h-flex-basis h-px-lg-3 v-inner-lg-3 h-px-md-3 v-inner-md-3 h-px-3 v-inner-3">
											<div class="position-relative wp-block-kubio-column__align kubio-single__k__single-K4Akm2YNqS-align kubio-local-533-align h-y-container h-column__content h-column__v-align flex-basis-100 align-self-lg-start align-self-md-start align-self-start">
												<p class="wp-block wp-block-kubio-text  position-relative wp-block-kubio-text__text kubio-single__k__single-1pwRcGAnh-text kubio-local-534-text" data-kubio="kubio/text">
													<?php esc_html_e('Tags:', 'kubio'); ?>
												</p>
												<div class="wp-block wp-block-kubio-post-tags  position-relative wp-block-kubio-post-tags__container kubio-single__k__single-tlSt_AyBi-container kubio-local-535-container kubio-post-tags-container" data-kubio="kubio/post-tags">
													<div class="position-relative wp-block-kubio-post-tags__placeholder kubio-single__k__single-tlSt_AyBi-placeholder kubio-local-535-placeholder kubio-post-tags-placeholder"></div>
													<div class="position-relative wp-block-kubio-post-tags__tags kubio-single__k__single-tlSt_AyBi-tags kubio-local-535-tags">
														<?php kubio_tags_list(__('No tags', 'kubio')); ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php if(kubio_has_pagination()): ?>
							<div class="wp-block wp-block-kubio-query-pagination  position-relative wp-block-kubio-query-pagination__container kubio-single__k__single-nqLiVZCaYo-container kubio-local-536-container gutters-row-lg-0 gutters-row-v-lg-0 gutters-row-md-0 gutters-row-v-md-0 gutters-row-0 gutters-row-v-0" data-kubio="kubio/query-pagination">
								<div class="position-relative wp-block-kubio-query-pagination__inner kubio-single__k__single-nqLiVZCaYo-inner kubio-local-536-inner h-row align-items-lg-stretch align-items-md-stretch align-items-stretch justify-content-lg-center justify-content-md-center justify-content-center gutters-col-lg-0 gutters-col-v-lg-0 gutters-col-md-0 gutters-col-v-md-0 gutters-col-0 gutters-col-v-0">
									<div class="wp-block wp-block-kubio-column  position-relative wp-block-kubio-column__container kubio-single__k__single-3ndM77FkZV-container kubio-local-537-container d-flex h-col-lg h-col-md h-col-auto" data-kubio="kubio/column">
										<div class="position-relative wp-block-kubio-column__inner kubio-single__k__single-3ndM77FkZV-inner kubio-local-537-inner d-flex h-flex-basis h-px-lg-0 v-inner-lg-2 h-px-md-0 v-inner-md-2 h-px-0 v-inner-2">
											<div class="position-relative wp-block-kubio-column__align kubio-single__k__single-3ndM77FkZV-align kubio-local-537-align h-y-container h-column__content h-column__v-align flex-basis-100 align-self-lg-start align-self-md-start align-self-start">
												<?php if(kubio_has_pagination_button(true)): ?>
												<div class="position-relative wp-block-kubio-pagination-nav-button__spacing kubio-single__k__single-ELgmeRXRD--spacing kubio-local-538-spacing">
													<span class="wp-block wp-block-kubio-pagination-nav-button  position-relative wp-block-kubio-pagination-nav-button__outer kubio-single__k__single-ELgmeRXRD--outer kubio-local-538-outer kubio-button-container" data-kubio="kubio/pagination-nav-button">
														<a class="position-relative wp-block-kubio-pagination-nav-button__link kubio-single__k__single-ELgmeRXRD--link kubio-local-538-link h-w-100 h-global-transition" href="<?php kubio_get_navigation_button_link(true); ?>">
															<span class="position-relative wp-block-kubio-pagination-nav-button__text kubio-single__k__single-ELgmeRXRD--text kubio-local-538-text kubio-inherit-typography">
																<?php esc_html_e('Previous', 'kubio'); ?>
															</span>
														</a>
													</span>
												</div>
												<?php endif; ?>
											</div>
										</div>
									</div>
									<div class="wp-block wp-block-kubio-column  position-relative wp-block-kubio-column__container kubio-single__k__single-mMPMCQqWfs-container kubio-local-539-container d-flex h-col-lg h-col-md h-col-auto" data-kubio="kubio/column">
										<div class="position-relative wp-block-kubio-column__inner kubio-single__k__single-mMPMCQqWfs-inner kubio-local-539-inner d-flex h-flex-basis h-px-lg-0 v-inner-lg-2 h-px-md-0 v-inner-md-2 h-px-0 v-inner-2">
											<div class="position-relative wp-block-kubio-column__align kubio-single__k__single-mMPMCQqWfs-align kubio-local-539-align h-y-container h-column__content h-column__v-align flex-basis-100 align-self-lg-start align-self-md-start align-self-start">
												<?php if(kubio_has_pagination_button()): ?>
												<div class="position-relative wp-block-kubio-pagination-nav-button__spacing kubio-single__k__single-ACSe8L2gsX-spacing kubio-local-540-spacing">
													<span class="wp-block wp-block-kubio-pagination-nav-button  position-relative wp-block-kubio-pagination-nav-button__outer kubio-single__k__single-ACSe8L2gsX-outer kubio-local-540-outer kubio-button-container" data-kubio="kubio/pagination-nav-button">
														<a class="position-relative wp-block-kubio-pagination-nav-button__link kubio-single__k__single-ACSe8L2gsX-link kubio-local-540-link h-w-100 h-global-transition" href="<?php kubio_get_navigation_button_link(); ?>">
															<span class="position-relative wp-block-kubio-pagination-nav-button__text kubio-single__k__single-ACSe8L2gsX-text kubio-local-540-text kubio-inherit-typography">
																<?php esc_html_e('Next', 'kubio'); ?>
															</span>
														</a>
													</span>
												</div>
												<?php endif; ?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php endif; ?>
							<div class="wp-block wp-block-kubio-post-comments kubio-migration--1 position-relative wp-block-kubio-post-comments__commentsContainer kubio-single__k__single-s5UQRGEAN-commentsContainer kubio-local-541-commentsContainer" data-kubio="kubio/post-comments">
								<?php kubio_post_comments(array (
  'none' => __('No responses yet', 'kubio'),
  'one' => __('One response', 'kubio'),
  'multiple' => __('{COMMENTS-COUNT} Responses', 'kubio'),
  'disabled' => __('Comments are closed', 'kubio'),
  'avatar_size' => __('32', 'kubio'),
)); ?>
							</div>
							<div class="wp-block wp-block-kubio-post-comments-form  position-relative wp-block-kubio-post-comments-form__container kubio-single__k__single-oXoikmHxB-container kubio-local-542-container" data-kubio="kubio/post-comments-form">
								<?php comment_form(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
