(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);throw new Error("Cannot find module '"+o+"'")}var f=n[o]={exports:{}};t[o][0].call(f.exports,function(e){var n=t[o][1][e];return s(n?n:e)},f,f.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
"use strict";

$(document).ready(function () {
    $(".img-wrp").click(function () {

        $(this).hide();
        $(this).next(".theVedio").show();
    });
    var slider = new Swiper('.js-vedio-slider', {
        slidesPerView: 1,
        centeredSlides: true,
        loop: true,
        loopedSlides: 6

    });

    var thumbs = new Swiper('.js-vedio-thumbnail', {
        slidesPerView: 5,
        spaceBetween: 20,
        centeredSlides: true,
        loop: true,
        slideToClickedSlide: true,
        navigation: {
            nextEl: '.vedio-button-prev',
            prevEl: '.vedio-button-next'
        }
    });

    slider.controller.control = thumbs;
    thumbs.controller.control = slider;

    $(".player-fram").each(function () {
        var player = new Vimeo.Player(this);
        $('button').on('click', function () {
            var method = $(this).text().toLowerCase();
            player[method]();
        });
    });
});

},{}]},{},[1])//# sourceMappingURL=culture.js.map
