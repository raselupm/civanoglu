require('./bootstrap');


import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


window.$ = window.jQuery = require('jquery');

require('./slick-1.8.1.min');

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
        asNavFor: '.thumbnail-slider'
    });
    $('.thumbnail-slider').slick({
        slidesToShow: 10,
        asNavFor: '.gallery-slider',
        centerMode: true,
        focusOnSelect: true
    });
});
