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

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );
	
	// Header text hide and show and text color.
	wp.customize( 'header_textcolor', function( value ) {
		if(value() == 'blank'){
			myCustomizer.control('blogus_title_font_size').container.hide();
		}else{
			myCustomizer.control('blogus_title_font_size').container.show();
		}
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
				$( '.site-branding-text ' ).addClass('d-none');
				myCustomizer.control('blogus_title_font_size').container.hide();
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
				myCustomizer.control('blogus_title_font_size').container.show();
			}
		} );
	} );
	
	// Site Background Color.
	// wp.customize( 'background_color', function( value ) {
	// 	value.bind( function( newVal ) {
	// 		$( 'body.custom-background .wrapper' ).css( { 'background-color': newVal, } );
	// 	} );
	// } );
	
	// Site Title Font Size.
	wp.customize( 'blogus_title_font_size', function( value ) {
		value.bind( function( newVal ) {
			$( '.site-title a' ).css( {
				'font-size': newVal+'px',
			} );
		} );
	} );
	
	// Sidebar Width.
	wp.customize( 'blogus_theme_sidebar_width', function( value ) {
		value.bind( function( newVal ) {
			var contentRightElements = document.querySelectorAll('.content-right');
			var Rightsidebar = document.querySelectorAll('.sidebar-right');
			var Leftsidebar = document.querySelectorAll('.sidebar-left');
			contentRightElements.forEach(function(element) {
				element.style.setProperty('width', `calc((1130px - ${newVal}px))`, 'important');
			});
			Rightsidebar.forEach(function(element) {
				element.style.setProperty('width', `${newVal}px`, 'important');
			});
			Leftsidebar.forEach(function(element) {
				element.style.setProperty('width', `${newVal}px`, 'important');
			});
		} );
	} );
	
	// Footer logo width.
	wp.customize( 'blogus_footer_logo_width', function( value ) {
		value.bind( function( newVal ) {
			$( 'footer .footer-logo img' ).css( {
				'width': newVal+'px',
			} );
		} );
	} );
	
	// Footer logo Height.
	wp.customize( 'blogus_footer_logo_height', function( value ) {
		value.bind( function( newVal ) {
			$( 'footer .footer-logo img' ).css( {
				'height': newVal+'px',
			} );
		} );
	} );

	// Footer Widget Area Column.
	wp.customize( 'blogus_footer_column_layout', function( value ) {
		var colum = 12 / value();
		var wclass = $('.animated.bs-widget');
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
			wclass = $('.animated.bs-widget');
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
} )( jQuery );
