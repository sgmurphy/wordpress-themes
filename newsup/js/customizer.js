/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	var myCustomizer = window.parent.window.wp.customize;

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	
	// Header text hide and show and text color.
	wp.customize( 'header_textcolor', function( value ) {
		if(value() == 'blank'){
			myCustomizer.control('newsup_title_font_size', function(control) {
				control.container.hide();
			});
		}else{
			myCustomizer.control('newsup_title_font_size', function(control) {
				control.container.show();
			});
		}
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
				$( '.site-branding-text ' ).addClass('d-none');
				myCustomizer.control('newsup_title_font_size', function(control) {
					control.container.hide();
				});
			} else {
				$('.site-title').css('position', 'unset');
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-branding-text ' ).removeClass('d-none');
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
				myCustomizer.control('newsup_title_font_size', function(control) {
					control.container.show();
				});
			}
		} );
	} );
	
	// Site Title Font Size.
	wp.customize( 'newsup_title_font_size', function( value ) {
		value.bind( function( newVal ) {
			$( '.site-title a' ).css( {
				'font-size': newVal+'px',
			} );
		} );
	} );

	// Header Banner, Site Title and Site Tagline Cent Alignment.
	wp.customize( 'newsup_center_logo_title', function( value ) {
		value.bind( function( newVal ) {
			var firstChild = $('.mg-nav-widget-area .row.align-items-center').children(':nth-child(1)');
			var secondChild = $('.mg-nav-widget-area .row.align-items-center').children(':nth-child(2)');	
			if(newVal == true){
				if(firstChild.hasClass('col-md-3 text-center-xs')){
					firstChild.removeClass('col-md-3 text-center-xs');
				} 
				firstChild.addClass('col-md-12 text-center mx-auto');

				if(secondChild.hasClass('col-md-9')){
					secondChild.removeClass('col-md-9');
				} 
				secondChild.addClass('col text-center mx-auto');
			}else{
				if(firstChild.hasClass('col-md-12 text-center mx-auto')){
					firstChild.removeClass('col-md-12 text-center mx-auto');
				} 
				firstChild.addClass('col-md-3 text-center-xs');

				if(secondChild.hasClass('col text-center mx-auto')){
					secondChild.removeClass('col text-center mx-auto');
				} 
				secondChild.addClass('col-md-9');
			}
		} );
	} );

	// Footer Background Image
	wp.customize( 'newsup_footer_widget_background', function( value ) {
		value.bind( function( newVal ) {
			if(newVal !== ''){
				$('footer.footer').css('background-image', 'url(' + newVal + ')');
				$('footer.footer').addClass('back-img');
			}else{
				$('footer.footer').removeAttr('style');
				$('footer.footer').removeClass('back-img');
			}
		});
	});

	// Footer Background overlay color.
	wp.customize( 'newsup_footer_overlay_color', function( value ) {
		value.bind( function( newVal ) {
			if(newVal !== ''){
				$('footer .overlay').css('background', newVal);
			}else{
				$('footer .overlay').css('background', '');
			}
		} );
	} );
	// Footer all Text color.
	wp.customize( 'newsup_footer_text_color', function( value ) {
		value.bind( function( newVal ) {
			if(newVal !== ''){
				$('footer .mg-widget p, footer .site-title-footer a, footer .site-title a:hover , footer .site-description-footer, footer .site-description:hover').css('color', newVal);
			}else{
				$('footer .mg-widget p, footer .site-title-footer a, footer .site-title a:hover , footer .site-description-footer, footer .site-description:hover').css('color', '');
			}
		} );
	} );
	// Footer all Text color.
	wp.customize( 'newsup_footer_column_layout', function( value ) {
		var colum = 12 / value();
		var wclass = $('.animated.mg-widget');
		if(wclass.hasClass('col-md-12')){
			wclass.removeClass('col-md-12');
		}else if(wclass.hasClass('col-md-6')){
			wclass.removeClass('col-md-6');
		}else if(wclass.hasClass('col-md-4')){
			wclass.removeClass('col-md-4');
		}else if(wclass.hasClass('col-md-3')){
			wclass.removeClass('col-md-3');
		}
		wclass.addClass(`col-md-${colum}`);

		value.bind( function( newVal ) {
			colum = 12 / newVal;
			wclass = $('.animated.mg-widget');
			if(wclass.hasClass('col-md-12')){
				wclass.removeClass('col-md-12');
			}else if(wclass.hasClass('col-md-6')){
				wclass.removeClass('col-md-6');
			}else if(wclass.hasClass('col-md-4')){
				wclass.removeClass('col-md-4');
			}else if(wclass.hasClass('col-md-3')){
				wclass.removeClass('col-md-3');
			}
			wclass.addClass(`col-md-${colum}`);
			console.log(wclass);
		} );
	} );

	myCustomizer.state( 'previewedDevice' ).bind( function( device ) {
		console.log(device);
		if(device == 'desktop'){
			wp.customize( 'newsup_title_font_size', function( value ) {
				$( '.site-title a' ).css( {
					'font-size': value()+'px',
				} );
			} );
		} else if(device == 'tablet' || device == 'mobile'){
			$('.site-title a').css('font-size', '');
		}
	});
} )( jQuery );
