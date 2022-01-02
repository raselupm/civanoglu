require('./bootstrap');

import feather from 'feather-icons/dist/feather.min'

feather.replace();

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


window.$ = window.jQuery = require('jquery');

require('./slick-1.8.1.min');
require('./lity.min');

jQuery(window).scroll(function() {
    const scroll = jQuery(window).scrollTop();

    if (scroll >= 50) {
        jQuery('.sticky-header').addClass('sticky-header-active');
    } else {
        jQuery('.sticky-header').removeClass('sticky-header-active');
    }
});

jQuery(document).ready(function ($) {
    $('.gallery-slider').slick({
        asNavFor: '.thumbnail-slider',
        //centerMode: true,
        prevArrow: '<div class="left-icon"><img src="/img/chevron-left.svg"/></div>',
        nextArrow: '<div class="right-icon"><img src="/img/chevron-right.svg"/></div>',
        dots: false
    });
    $('.thumbnail-slider').slick({
        slidesToShow: 7,
        asNavFor: '.gallery-slider',
        centerMode: true,
        focusOnSelect: true,
        prevArrow: '<div class="left-icon"><img src="/img/chevron-left.svg"/></div>',
        nextArrow: '<div class="right-icon"><img src="/img/chevron-right.svg"/></div>',
        dots: false,
        responsive: [
            // {
            //     breakpoint: 1024,
            //     settings: {
            //         slidesToShow: 3,
            //         slidesToScroll: 3,
            //         infinite: true,
            //         dots: true
            //     }
            // },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 4
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 3
                }
            }
        ]
    });

    $(".civanoglu-menu, .civanoglu-menu-items a").on("click", function () {
        $(".civanoglu-menu-items").toggleClass('active');
    });
});
