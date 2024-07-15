<div class="wp-block wp-block-kubio-query-layout  position-relative wp-block-kubio-query-layout__outer kubio-index__k__1MCYzfcZN-outer kubio-local-184-outer d-flex h-section-global-spacing align-items-lg-center align-items-md-center align-items-center" data-kubio="kubio/query-layout" id="blog-layout">
	<div class="position-relative wp-block-kubio-query-layout__inner kubio-index__k__1MCYzfcZN-inner kubio-local-184-inner h-section-grid-container h-section-boxed-container">
		<div class="wp-block wp-block-kubio-row  position-relative wp-block-kubio-row__container kubio-index__k__baLWB4dRKjp-container kubio-local-185-container gutters-row-lg-0 gutters-row-v-lg-0 gutters-row-md-0 gutters-row-v-md-0 gutters-row-3 gutters-row-v-0" data-kubio="kubio/row">
			<div class="position-relative wp-block-kubio-row__inner kubio-index__k__baLWB4dRKjp-inner kubio-local-185-inner h-row align-items-lg-stretch align-items-md-stretch align-items-stretch justify-content-lg-center justify-content-md-center justify-content-center gutters-col-lg-0 gutters-col-v-lg-0 gutters-col-md-0 gutters-col-v-md-0 gutters-col-3 gutters-col-v-0">
				<div class="wp-block wp-block-kubio-column  position-relative wp-block-kubio-column__container kubio-index__k__kxeqsSpdy-n-container kubio-local-186-container d-flex h-col-lg h-col-md h-col-auto" data-kubio="kubio/column">
					<div class="position-relative wp-block-kubio-column__inner kubio-index__k__kxeqsSpdy-n-inner kubio-local-186-inner d-flex h-flex-basis h-px-lg-2 v-inner-lg-0 h-px-md-2 v-inner-md-0 h-px-2 v-inner-0">
						<div class="position-relative wp-block-kubio-column__align kubio-index__k__kxeqsSpdy-n-align kubio-local-186-align h-y-container h-column__content h-column__v-align flex-basis-100 align-self-lg-start align-self-md-start align-self-start">
							<div class="wp-block wp-block-kubio-query  position-relative wp-block-kubio-query__container kubio-index__k__CtKC_EuIZL-container kubio-local-187-container" data-kubio="kubio/query">
								<div class="wp-block wp-block-kubio-query-loop  position-relative wp-block-kubio-query-loop__container kubio-index__k__vrf0UGkWrN-container kubio-local-188-container gutters-row-lg-2 gutters-row-v-lg-0 gutters-row-md-2 gutters-row-v-md-0 gutters-row-0 gutters-row-v-0" data-kubio="kubio/query-loop" data-kubio-component="masonry" data-kubio-settings="{&quot;enabled&quot;:true,&quot;targetSelector&quot;:&quot;.wp-block-kubio-query-loop__inner&quot;}">
									<div class="position-relative wp-block-kubio-query-loop__inner kubio-index__k__vrf0UGkWrN-inner kubio-local-188-inner h-row">
										<?php kubio_theme()->get('archive-loop')->render(array (
  'view' => 'content/index/loop-item',
)); ?>
									</div>
								</div>
								<?php if(kubio_has_pagination()): ?>
								<div class="wp-block wp-block-kubio-query-pagination  position-relative wp-block-kubio-query-pagination__container kubio-index__k__vD7AVCTELY-container kubio-local-194-container gutters-row-lg-0 gutters-row-v-lg-2 gutters-row-md-2 gutters-row-v-md-2 gutters-row-0 gutters-row-v-2" data-kubio="kubio/query-pagination">
									<div class="position-relative wp-block-kubio-query-pagination__inner kubio-index__k__vD7AVCTELY-inner kubio-local-194-inner h-row align-items-lg-stretch align-items-md-stretch align-items-stretch justify-content-lg-center justify-content-md-center justify-content-center gutters-col-lg-0 gutters-col-v-lg-2 gutters-col-md-2 gutters-col-v-md-2 gutters-col-0 gutters-col-v-2">
										<div class="wp-block wp-block-kubio-column  position-relative wp-block-kubio-column__container kubio-index__k__tBYU0uM8Xx-container kubio-local-195-container d-flex h-col-lg-auto h-col-md-auto h-col-auto" data-kubio="kubio/column">
											<div class="position-relative wp-block-kubio-column__inner kubio-index__k__tBYU0uM8Xx-inner kubio-local-195-inner d-flex h-flex-basis h-px-lg-0 v-inner-lg-2 h-px-md-0 v-inner-md-2 h-px-0 v-inner-2">
												<div class="position-relative wp-block-kubio-column__align kubio-index__k__tBYU0uM8Xx-align kubio-local-195-align h-y-container h-column__content h-column__v-align flex-basis-auto align-self-lg-center align-self-md-center align-self-center">
													<?php if(kubio_has_pagination_button(true)): ?>
													<div class="position-relative wp-block-kubio-pagination-nav-button__spacing kubio-index__k__ELgmeRXRD--spacing kubio-local-196-spacing">
														<span class="wp-block wp-block-kubio-pagination-nav-button  position-relative wp-block-kubio-pagination-nav-button__outer kubio-index__k__ELgmeRXRD--outer kubio-local-196-outer kubio-button-container" data-kubio="kubio/pagination-nav-button">
															<a class="position-relative wp-block-kubio-pagination-nav-button__link kubio-index__k__ELgmeRXRD--link kubio-local-196-link h-w-100 h-global-transition" href="<?php kubio_get_navigation_button_link(true); ?>">
																<span class="position-relative wp-block-kubio-pagination-nav-button__text kubio-index__k__ELgmeRXRD--text kubio-local-196-text kubio-inherit-typography">
																	<?php esc_html_e('Previous', 'kubio'); ?>
																</span>
															</a>
														</span>
													</div>
													<?php endif; ?>
												</div>
											</div>
										</div>
										<div class="wp-block wp-block-kubio-column  position-relative wp-block-kubio-column__container kubio-index__k__P2OarhUKUK-container kubio-local-197-container d-flex h-col-lg h-col-md h-col" data-kubio="kubio/column">
											<div class="position-relative wp-block-kubio-column__inner kubio-index__k__P2OarhUKUK-inner kubio-local-197-inner d-flex h-flex-basis h-px-lg-2 v-inner-lg-2 h-px-md-2 v-inner-md-2 h-px-1 v-inner-2">
												<div class="position-relative wp-block-kubio-column__align kubio-index__k__P2OarhUKUK-align kubio-local-197-align h-y-container h-column__content h-column__v-align flex-basis-100 align-self-lg-center align-self-md-center align-self-center">
													<div class="wp-block wp-block-kubio-pagination-numbers  position-relative wp-block-kubio-pagination-numbers__outer kubio-index__k__tRiQFlrj8q-outer kubio-local-198-outer" data-kubio="kubio/pagination-numbers">
														<?php kubio_pagination_numbers(); ?>
													</div>
												</div>
											</div>
										</div>
										<div class="wp-block wp-block-kubio-column  position-relative wp-block-kubio-column__container kubio-index__k__2nd5yuWmz9-container kubio-local-199-container d-flex h-col-lg-auto h-col-md-auto h-col-auto" data-kubio="kubio/column">
											<div class="position-relative wp-block-kubio-column__inner kubio-index__k__2nd5yuWmz9-inner kubio-local-199-inner d-flex h-flex-basis h-px-lg-0 v-inner-lg-2 h-px-md-0 v-inner-md-2 h-px-0 v-inner-2">
												<div class="position-relative wp-block-kubio-column__align kubio-index__k__2nd5yuWmz9-align kubio-local-199-align h-y-container h-column__content h-column__v-align flex-basis-auto align-self-lg-center align-self-md-center align-self-center">
													<?php if(kubio_has_pagination_button()): ?>
													<div class="position-relative wp-block-kubio-pagination-nav-button__spacing kubio-index__k__ACSe8L2gsX-spacing kubio-local-200-spacing">
														<span class="wp-block wp-block-kubio-pagination-nav-button  position-relative wp-block-kubio-pagination-nav-button__outer kubio-index__k__ACSe8L2gsX-outer kubio-local-200-outer kubio-button-container" data-kubio="kubio/pagination-nav-button">
															<a class="position-relative wp-block-kubio-pagination-nav-button__link kubio-index__k__ACSe8L2gsX-link kubio-local-200-link h-w-100 h-global-transition" href="<?php kubio_get_navigation_button_link(); ?>">
																<span class="position-relative wp-block-kubio-pagination-nav-button__text kubio-index__k__ACSe8L2gsX-text kubio-local-200-text kubio-inherit-typography">
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
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
