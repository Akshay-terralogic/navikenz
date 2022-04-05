(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);throw new Error("Cannot find module '"+o+"'")}var f=n[o]={exports:{}};t[o][0].call(f.exports,function(e){var n=t[o][1][e];return s(n?n:e)},f,f.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
"use strict";

$(document).ready(function () {
    var linkedInCard = new Swiper(".js-linkedInCards-slider", {
        slidesPerView: 1.2,

        spaceBetween: 12,

        // loop: true,
        // autoplay: {
        //     delay: 5000,
        //     speed: 3000,
        //     disableOnInteraction: false
        // },
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            768: {
                slidesPerView: 1.7,
                spaceBetween: 20
            },
            1024: {
                slidesPerView: 3

            }
        },

        navigation: {
            nextEl: ".js-arrow-left",
            prevEl: ".js-arrow-right"
        }
    });

    $(".lottie").each(function () {
        var animationRemote1 = bodymovin.loadAnimation({
            container: $(this),
            // path: 'https://assets9.lottiefiles.com/packages/lf20_hKebN8.json',
            autoplay: true,
            renderer: 'svg',
            loop: true
        });
    });

    // const animationRemote2 = bodymovin.loadAnimation({
    //     container: document.getElementById('svg__02'),
    //     // path: 'https://assets9.lottiefiles.com/packages/lf20_hKebN8.json',
    //     autoplay: true,
    //     renderer: 'svg',
    //     loop: true
    // })

});

},{}]},{},[1])//# sourceMappingURL=contact-us.js.map
