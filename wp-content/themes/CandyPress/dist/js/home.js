(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);throw new Error("Cannot find module '"+o+"'")}var f=n[o]={exports:{}};t[o][0].call(f.exports,function(e){var n=t[o][1][e];return s(n?n:e)},f,f.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
"use strict";


(function($) {
    $(document).ready(function() {
            var textSlider = new Swiper(".js-text-slider", {
            slidesPerView: 1,

            spaceBetween: 0,
            speed: 1000,
            loop: true,
            autoplay: {
                delay: 5000,
                speed: 1000,
                disableOnInteraction: false
            },

            navigation: {
                nextEl: ".js-arrow-left",
                prevEl: ".js-arrow-right"
            }
        });
    })
})(jQuery);
// $(document).ready(function() {
//     const th = gsap.timeline({});
//     // fullpage customization
//     $('#fullpage').fullpage({
//         // sectionsColor: ['#B8AE9C', '#348899', '#F2AE72', '#5C832F', '#B8B89F'],
//         sectionSelector: '.v-scrolling',
//         // navigation: true,
//         autoScrolling: true,
//         slidesNavigation: true,
//         controlArrows: false,

//         // anchors: ['firstSection', 'secondSection', 'thirdSection', 'fourthSection', 'fifthSection'],
//         onLeave: function(anchorLink, index, direction) {
//             let theaderTrans = gsap.timeline({});
//             if (direction == "down") {

//                 theaderTrans.to(".navbar", {
//                     yPercent: -100,
//                     duration: .5,
//                     ease: "power2.out"
//                 })
//             } else {
//                 theaderTrans.to(".navbar", {
//                     yPercent: 0,
//                     duration: .5,
//                     ease: "power2.out"
//                 })
//             }
//             // alert(isFirst)
//             if ((index == 2)) {

//                 let t2 = gsap.timeline({});

//                 t2
//                     .fromTo(".gsap-card:nth-child(odd)", {
//                         xPercent: -100,
//                         opacity: 0,
//                         ease: "power2.out"
//                     }, {
//                         duration: 1.5,
//                         xPercent: 0,
//                         opacity: 1,
//                         ease: "power2.out",
//                         stagger: 0.5
//                     }, "<")
//                     .fromTo(".gsap-card:nth-child(even)", {
//                         xPercent: 100,
//                         opacity: 0,
//                         ease: "power2.out"
//                     }, {
//                         duration: 1.5,
//                         xPercent: 0,
//                         opacity: 1,
//                         ease: "power2.out",
//                         stagger: .5
//                     }, "<")
//                     .fromTo(".gsap-enage-h", {
//                         opacity: 0,
//                         yPercent: -100,

//                     }, {
//                         yPercent: 0,
//                         opacity: 1,
//                         ease: "power2.out",
//                         duration: 1
//                     }, "<")
//                     .fromTo(".gsap-btn", {
//                         opacity: 0,
//                         y: 100,
//                         duration: 1,
//                         ease: "power2.out",
//                     }, {
//                         opacity: 1,
//                         duration: 1,
//                         y: 0,
//                         ease: "power2.out",
//                     })


//             } else
//             if ((index == 3)) {
//                 let t3 = gsap.timeline({});

//                 t3
//                     .fromTo(".gsap-h2", {
//                         yPercent: -100,
//                         opacity: 0
//                     }, {
//                         opacity: 1,
//                         yPercent: 0,
//                         duration: 2
//                     })
//                     .fromTo(".gsap-tab-item", {
//                         x: -10,
//                         opacity: 0,
//                     }, {
//                         opacity: 1,
//                         x: 0,
//                         ease: "power2.out",
//                         duration: 1,
//                         stagger: .5
//                     }, "<")
//                     .fromTo(".gsap-card-img", {
//                         scaleX: .5,
//                         opacity: 0
//                     }, {
//                         opacity: 1,
//                         scaleX: 1,
//                         duration: .8,
//                         ease: "power2.out",
//                         stagger: .5
//                     }, "<")
//                     .fromTo(".gsap-card-text", {
//                         opacity: 0,
//                         y: 20
//                     }, {
//                         opacity: 1,
//                         y: 0,
//                         duration: .5,
//                         ease: "power2.out",
//                         stagger: .3
//                     }, "<")
//                     .fromTo(".gsap-btn-smcard", {
//                         opacity: 0,
//                         y: 100,
//                         duration: 1,
//                         ease: "power2.out",
//                     }, {
//                         opacity: 1,
//                         duration: 1,
//                         y: 0,
//                         ease: "power2.out",
//                     }, "<")
//                     .fromTo(".gsap-l-btn", {
//                         opacity: 0,
//                         y: 100,
//                     }, {
//                         opacity: 1,
//                         duration: 1,
//                         y: 0,
//                         ease: "power2.out",
//                     }, "-=6")
//             }
//             if ((index == 3) || (index == 7) || (index == 4)) {
//                 $(".nk-mainheader").addClass("nk-dark")
//             } else {
//                 $(".nk-mainheader").removeClass("nk-dark")
//             }
//             if ((index == 7) && (direction == "down")) {
//                 let t7 = gsap.timeline({});

//                 t7
//                     .fromTo(".gsap-h2-d", {
//                         yPercent: -100,
//                         opacity: 0
//                     }, {
//                         opacity: 1,
//                         yPercent: 0,
//                         duration: 2
//                     })
//                     .fromTo(".gsap-tab-item-d", {
//                         x: -10,
//                         opacity: 0,
//                     }, {
//                         opacity: 1,
//                         x: 0,
//                         ease: "power2.out",
//                         duration: 1,
//                         stagger: .5
//                     }, "<")
//                     .fromTo(".gsap-card-img-d", {
//                         scaleX: .5,
//                         opacity: 0
//                     }, {
//                         opacity: 1,
//                         scaleX: 1,
//                         duration: .8,
//                         ease: "power2.out",
//                         stagger: .5
//                     }, "<")
//                     .fromTo(".gsap-card-text-d", {
//                         opacity: 0,
//                         y: 20
//                     }, {
//                         opacity: 1,
//                         y: 0,
//                         duration: .5,
//                         ease: "power2.out",
//                         stagger: .3
//                     }, "<")
//                     .fromTo(".gsap-btn-smcard-d", {
//                         opacity: 0,
//                         y: 100,

//                     }, {
//                         opacity: 1,
//                         duration: 1,
//                         y: 0,
//                         ease: "power2.out",
//                     }, "<")
//                     .fromTo(".gsap-l-btn-d", {
//                         opacity: 0,
//                         y: 100,

//                     }, {
//                         opacity: 1,
//                         duration: 1,
//                         y: 0,
//                         ease: "power2.out",
//                     }, "-=6")
//             } else if ((index == 4)) {
//                 const t4 = gsap.timeline({});

//                 t4
//                     .fromTo(".gsap-plan-h2", {
//                         yPercent: -100,
//                         opacity: 0
//                     }, {
//                         opacity: 1,
//                         yPercent: 0,
//                         duration: 1
//                     })
//                     .fromTo(".post", {
//                         xPercent: -120
//                     }, {
//                         xPercent: 0,
//                         duration: 1,
//                         ease: "power2.out",
//                     })
//                     .fromTo(".post__item", {
//                         opacity: 0,
//                         y: -20
//                     }, {
//                         opacity: 1,
//                         y: 1,
//                         duration: 1,
//                         stagger: .5
//                     }, "+=.1")
//                     // $(".Nk-plan__card").each(function() {
//                     //     let img = $(this > "img")
//                     //     let text = $(this > ".gsap-upDown")
//                     .fromTo(".Nk-plan__card img", {
//                         opacity: 0,
//                         xPercent: 100,
//                     }, {
//                         opacity: 1,
//                         xPercent: 0,
//                         duration: 1,
//                         stagger: .4
//                     }, "-=2.5")


//                 .fromTo(".Nk-plan__card .gsap-upDown-p", {
//                     y: 100,
//                     opacity: 0,
//                     ease: "power2.out",
//                 }, {
//                     duration: 1,
//                     y: 0,
//                     opacity: 1,
//                     ease: "power2.out",
//                     stagger: 0.1
//                 }, "<");
//                 // })


//             } else if ((index == 5)) {
//                 const t5 = gsap.timeline({});
//                 t5.fromTo(".gsap-left", {
//                         xPercent: -100,
//                         opacity: 0,
//                         ease: "power2.out"
//                     }, {
//                         duration: 1,
//                         xPercent: 0,
//                         opacity: 1,
//                         ease: "power2.out",
//                         stagger: 0.5
//                     })
//                     .fromTo(".gsap-right", {
//                         xPercent: 100,
//                         opacity: 0,
//                         ease: "power2.out"
//                     }, {
//                         duration: 1,
//                         xPercent: 0,
//                         opacity: 1,
//                         ease: "power2.out",
//                         stagger: 0.5
//                     })

//             } else if ((index == 6)) {
//                 const t6 = gsap.timeline({});
//                 t6
//                     .fromTo(".gsap-delivary-h2", {
//                         yPercent: -100,
//                         opacity: 0
//                     }, {
//                         opacity: 1,
//                         yPercent: 0,
//                         duration: 1
//                     })
//                     .to(".overlay", {
//                         duration: 1,
//                         opacity: 1,
//                         xPercent: 100,
//                         ease: "power2.out",

//                     }, "+=.1")
//                     .fromTo(".delivary__wrp .gsap-upDown", {
//                         y: 100,
//                         opacity: 0,
//                         ease: "power2.out",
//                     }, {
//                         duration: 1,
//                         y: 0,
//                         opacity: 1,
//                         ease: "power2.out",
//                         stagger: 0.2
//                     }, "<")


//             }


//         },
//         afterLoad: function(anchorLink, index, direction) {

//             if (index == 1) {

//                 th.fromTo(".gsap-upDown", {
//                     y: 100,
//                     opacity: 0,
//                     ease: "power2.out",
//                 }, {
//                     duration: 1.5,
//                     y: 0,
//                     opacity: 1,
//                     ease: "power2.out",
//                     stagger: 0.2
//                 })


//                 const tscroll = gsap.timeline({});
//                 tscroll.fromTo(".js-scroll-arrow", {
//                     y: 0,
//                     duration: 1.5,
//                     ease: "sin.inOut",
//                 }, {
//                     y: 10,
//                     duration: 1.5,
//                     ease: "sin.inOut",
//                 })
//                 tscroll.repeat(-1)
//             }

//         }

//     });


// })

},{}]},{},[1])//# sourceMappingURL=home.js.map
