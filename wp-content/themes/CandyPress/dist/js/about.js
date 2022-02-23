(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);throw new Error("Cannot find module '"+o+"'")}var f=n[o]={exports:{}};t[o][0].call(f.exports,function(e){var n=t[o][1][e];return s(n?n:e)},f,f.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
"use strict";

$(document).ready(function () {
    $(".advisory__card__img").hover(function () {
        // let t1 = gsap.timeline();

        // t1.fromTo(".gsap-cardFooter", { opacity: 0, y: 100 }, { opacity: 1, y: 0 })
    });

    var modelSlider = new Swiper(".js-model-slider", {
        slidesPerView: 1,
        spaceBetween: 15,
        navigation: {
            nextEl: ".js-arrow-left",
            prevEl: ".js-arrow-right"
        }
    });

    $(".js-model-btn").click(function () {

        setTimeout(function () {
            modelSlider.update();
        }, 200);
    });
});

},{}]},{},[1])//# sourceMappingURL=about.js.map
