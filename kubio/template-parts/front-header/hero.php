<?php $component = \ColibriWP\Theme\View::getData( 'component' ); ?>
<div class="wp-block wp-block-kubio-hero  position-relative wp-block-kubio-hero__outer kubio-front-header__k__J6FPNZyUrn-outer kubio-local-675-outer d-flex h-section-global-spacing align-items-lg-center align-items-md-center align-items-center" data-kubio="kubio/hero" id="hero">
	<?php $component->printBackground(); ?><?php $component->printSeparator(); ?>
	<div class="position-relative wp-block-kubio-hero__inner kubio-front-header__k__J6FPNZyUrn-inner kubio-local-675-inner h-navigation-padding h-section-grid-container h-section-boxed-container">
		<script type='text/javascript'>
			(function () {
				// forEach polyfill
				if (!NodeList.prototype.forEach) {
					NodeList.prototype.forEach = function (callback) {
						for (var i = 0; i < this.length; i++) {
							callback.call(this, this.item(i));
						}
					}
				}
				var navigation = document.querySelector('[data-colibri-navigation-overlap="true"], .h-navigation_overlap');
				if (navigation) {
					var els = document
						.querySelectorAll('.h-navigation-padding');
					if (els.length) {
						els.forEach(function (item) {
							item.style.paddingTop = navigation.offsetHeight + "px";
						});
					}
				}
			})();
		</script>
		<div class="wp-block wp-block-kubio-row  position-relative wp-block-kubio-row__container kubio-front-header__k__bgnhUSaQMl-container kubio-local-676-container gutters-row-lg-3 gutters-row-v-lg-3 gutters-row-md-3 gutters-row-v-md-3 gutters-row-3 gutters-row-v-3" data-kubio="kubio/row">
			<div class="position-relative wp-block-kubio-row__inner kubio-front-header__k__bgnhUSaQMl-inner kubio-local-676-inner h-row align-items-lg-stretch align-items-md-stretch align-items-stretch justify-content-lg-center justify-content-md-center justify-content-center gutters-col-lg-3 gutters-col-v-lg-3 gutters-col-md-3 gutters-col-v-md-3 gutters-col-3 gutters-col-v-3">
				<div class="wp-block wp-block-kubio-column  position-relative wp-block-kubio-column__container kubio-front-header__k__9IGHpldIpw-container kubio-local-677-container d-flex h-col-lg-auto h-col-md-auto h-col-auto" data-kubio="kubio/column">
					<div class="position-relative wp-block-kubio-column__inner kubio-front-header__k__9IGHpldIpw-inner kubio-local-677-inner d-flex h-flex-basis h-px-lg-3 v-inner-lg-3 h-px-md-3 v-inner-md-3 h-px-3 v-inner-3">
						<div class="position-relative wp-block-kubio-column__align kubio-front-header__k__9IGHpldIpw-align kubio-local-677-align h-y-container h-column__content h-column__v-align flex-basis-100 align-self-lg-center align-self-md-center align-self-center">
							<?php kubio_theme()->get('front-title')->render(); ?><?php kubio_theme()->get('front-subtitle')->render(); ?><?php kubio_theme()->get('buttons')->render(); ?>
						</div>
					</div>
				</div>
				<div class="wp-block wp-block-kubio-column  position-relative wp-block-kubio-column__container kubio-front-header__k__3z5JmMUdl-container kubio-local-686-container d-flex h-col-lg-auto h-col-md-auto h-col-auto" data-kubio="kubio/column">
					<div class="position-relative wp-block-kubio-column__inner kubio-front-header__k__3z5JmMUdl-inner kubio-local-686-inner d-flex h-flex-basis h-px-lg-3 v-inner-lg-3 h-px-md-3 v-inner-md-3 h-px-3 v-inner-3">
						<div class="position-relative wp-block-kubio-column__align kubio-front-header__k__3z5JmMUdl-align kubio-local-686-align h-y-container h-column__content h-column__v-align flex-basis-100 align-self-lg-center align-self-md-center align-self-center">
							<?php kubio_theme()->get('front-image')->render(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
