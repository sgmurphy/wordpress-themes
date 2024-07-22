(function($) {
  "use strict";
/* =================================
===        home -slider        ====
=================================== */
function homemain() {
  var homemain = new Swiper('.homemain', {
    direction: 'horizontal',
    loop: true,
    autoplay: true,
    slidesPerView: 1,
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    },

  });              
}
homemain(); 

/* =================================
===         SCROLL TOP       ====
=================================== */
jQuery(".bs_upscr").hide(); 
function taupr() {
  jQuery(window).on('scroll', function() {
    if ($(this).scrollTop() > 500) {
        $('.bs_upscr').fadeIn();
    } else {
      $('.bs_upscr').fadeOut();
    }
  });   
  $('a.bs_upscr').on('click', function()  {
    $('body,html').animate({
      scrollTop: 0
    }, 800);
    return false;
  });
}    
taupr();
})(jQuery);

function addKeydownListener() {
  document.addEventListener('keydown', keydownHandler);
}
function removeKeydownListener() {
  document.removeEventListener('keydown', keydownHandler);
}
function keydownHandler(event) {
  if (event.key === 'Tab') {
    var focusedElement = document.activeElement;
    var parentElement = document.getElementById('navbar-wp');
    var ulParent = parentElement.querySelector("ul.nav.navbar-nav");
    var lastChild = ulParent.lastElementChild.firstElementChild;

    // Check if the focused element is the last child
    if (focusedElement === lastChild) {
      // Prevent the default tab behavior
      event.preventDefault();

      // Perform your actions here
      const returnFocus = document.querySelector('button.navbar-toggler.x');
      returnFocus.click();
      returnFocus.focus();
    }
  }
}
function checkWindowSize() {
  if (window.innerWidth < 992) {
    addKeydownListener();
  } else {
    removeKeydownListener();
  }
}

checkWindowSize();
window.addEventListener('resize', checkWindowSize);

document.addEventListener('DOMContentLoaded', function() {
  var pageTitle = document.querySelector('.bs-card-box.page-entry-title + .row .page-title');
  if (pageTitle) {
    pageTitle.remove();
  }
});