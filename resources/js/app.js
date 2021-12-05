require('./bootstrap');

import Alpine from 'alpinejs';
import jQuery from './jquery-3.6.0.slim.min';

window.Alpine = Alpine;

Alpine.start();


jQuery(window).scroll(function() {
    const scroll = jQuery(window).scrollTop();

    if (scroll >= 50) {
        jQuery('.sticky-header').addClass('sticky-header-active');
    } else {
        jQuery('.sticky-header').removeClass('sticky-header-active');
    }
});
