jQuery.noConflict();
(function ($) {
    'use strict';

    $(document).ready(function () {
        $('body').addClass('loaded');
    });

    $('.navbar .dropdown-toggle').hover(function () {
        $(this).addClass('disabled');
    });

    $(window).scroll(function () {
        var $unstick = $('body.unstick-menu');
        if (!$unstick.length) {
            var $headerdiv = $('.site-header');
            if ($headerdiv.length) {
                var header = $('.site-header').outerHeight();
            } else {
                var header = 1;
            }
            if ($(document).scrollTop() > (header + 60)) {
                $('nav#site-navigation').addClass('shrink');
            } else {
                $('nav#site-navigation').removeClass('shrink');
            }
        }
    });

    var $myDiv = $('#futurio-floating');
    if ($myDiv.length) {
        $(window).scroll(function () {
            var distanceTop = $myDiv.prev().position().top + $myDiv.prev().height() + 80;

            if ($(document).scrollTop() > distanceTop) {
                $myDiv.addClass('floating-element');
            } else {
                $myDiv.removeClass('floating-element');
            }
        });
    }

    // Menu fixes
    function MenuFix() {
        $(function () {
            if ($(window).width() > 767) {
                $('.dropdown, .dropdown-submenu').hover(
                        function () {
                            $(this).addClass('open')
                        },
                        function () {
                            $(this).removeClass('open')
                        }
                );
                $('.dropdown, .dropdown-submenu').focusin(
                        function () {
                            $(this).addClass('open')
                        }
                );
                $('.dropdown, .dropdown-submenu').focusout(
                        function () {
                            $(this).removeClass('open')
                        }
                );
            } else {
                $(".dropdown, .dropdown-submenu").hover(
                        function () {
                            $(this).removeClass('open')
                        }
                );
            }
        });
    }
    MenuFix();
    $(window).on('resize', MenuFix);

    // Mobile menu function
    function FuturioMobileMenu() {
        $('.open-panel').each(function () {
            var menu = $(this).data('panel');
            $("#" + menu).click(function (e) {
                e.preventDefault();
                $("body").toggleClass("openNav");
                $("#" + menu + ".open-panel").toggleClass("open");
            });
            $("#site-navigation .menu-container a").click(function () {
                $("body").toggleClass("openNav");
                $("#" + menu + ".open-panel").toggleClass("open");
            });

        });
    }
    var $openPanel = $('.open-panel');
    if ($openPanel.length) {
        // Fire mobile menu
        FuturioMobileMenu();

    }

    $('.top-search-icon .fa').click(function () {
        $(".top-search-box").toggle('slow');
        $(".top-search-icon .fa").toggleClass("fa-times fa-search");
    });

    $('.offcanvas-sidebar-toggle').on('click', function () {
        $('body').toggleClass('offcanvas-sidebar-expanded');
    });
    $('.offcanvas-sidebar-close').on('click', function () {
        $('body').toggleClass('offcanvas-sidebar-expanded');
    });

    var sections = $('section')
            , nav = $('#site-navigation.navbar')
            , nav_height = nav.outerHeight();

    $(window).on('scroll', function () {
        var cur_pos = $(this).scrollTop();

        sections.each(function () {
            var top = $(this).offset().top - nav_height - 30,
                    bottom = top + $(this).outerHeight();

            if (cur_pos >= top && cur_pos <= bottom) {
                nav.find('a').parent().removeClass('active');
                sections.removeClass('active');

                $(this).addClass('active');
                nav.find('a[href="#' + $(this).attr('id') + '"]').parent().addClass('active');
            }
        });
    });

    $(document).on('click', '.button.ajax_add_to_cart', function (e) {
        //e.preventDefault();
        $('body.open-head-cart').addClass('product-added-to-cart');
    });
    $(document).on('mouseover', '.product-added-to-cart ul.site-header-cart', function (e) {
        e.preventDefault();
        $('body.open-head-cart').removeClass('product-added-to-cart');
    });
    $(document).on('resize, ready', function() {
        // Add class if screen size equals
        var $window = $(window),
        $html = $('body');

        function resize() {
           $html.removeClass('xs sm md lg');

           if ($window.width() < 768) {
             return $html.addClass('xs');
           }
           else if ($window.width() > 768 && $window.width() < 992) {
             return $html.addClass('sm');
           }
           else if ($window.width() > 992 && $window.width() < 1200) {
             return $html.addClass('md');
           }
           else if ($window.width() > 1200) {
             return $html.addClass('lg');
           }
         }
         $window.resize(resize).trigger('resize');
         $window.load(resize).trigger('resize');
   });
})(jQuery);
