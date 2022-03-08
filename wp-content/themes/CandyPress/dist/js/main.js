(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);throw new Error("Cannot find module '"+o+"'")}var f=n[o]={exports:{}};t[o][0].call(f.exports,function(e){var n=t[o][1][e];return s(n?n:e)},f,f.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
"use strict";

// LOAD MENU AFTER MENU ITEM IS FIXED
var invokeOnLoad = function invokeOnLoad() {
    var nav = document.querySelector(".navbar");
    nav.classList.add("loaded");

    window.addEventListener("scroll", function () {
        var wScroller = window.scrollY;
        var navbarHeight = document.querySelector(".navbar").offsetHeight;

        if (wScroller > navbarHeight) {
            nav.classList.add("sticky");
        } else {
            nav.classList.remove("sticky");
        }
    });

    // Smoth scrol Header hide and show
    var lastKnownScrollY = 0;
    var currentScrollY = 0;
    var ticking = false;
    var idOfHeader = "header";
    var eleHeader = null;
    var classes = {
        pinned: "header-pin",
        unpinned: "header-unpin"
    };

    function onScroll() {
        currentScrollY = window.pageYOffset;
        requestTick();
    }

    function requestTick() {
        if (!ticking) {
            requestAnimationFrame(update);
        }
        ticking = true;
    }

    function update() {
        if (currentScrollY < lastKnownScrollY) {
            pin();
        } else if (currentScrollY > lastKnownScrollY) {
            unpin();
        }
        lastKnownScrollY = currentScrollY;
        ticking = false;
    }

    function pin() {
        if (eleHeader.classList.contains(classes.unpinned)) {
            eleHeader.classList.remove(classes.unpinned);
            eleHeader.classList.add(classes.pinned);
        }
    }

    function unpin() {
        if (eleHeader.classList.contains(classes.pinned) || !eleHeader.classList.contains(classes.unpinned)) {
            eleHeader.classList.remove(classes.pinned);
            eleHeader.classList.add(classes.unpinned);
        }
    }
    window.onload = function () {
        eleHeader = document.getElementById(idOfHeader);
        document.addEventListener("scroll", onScroll, false);
    };
};

invokeOnLoad();

(function () {
    var hamburger = {
        navToggle: document.querySelector(".zw-mobile-hamberg"),
        nav: document.querySelector(".navbar-collapse"),
        menuBox: document.getElementsByTagName("BODY")[0],
        doToggle: function doToggle(e) {
            e.preventDefault();
            this.navToggle.classList.toggle("active");
            this.nav.classList.toggle("open-hamberg");
            this.menuBox.classList.toggle("body-fixed");
            // this.overlayDiv.classList.toggle("show");
        }
    };

    hamburger.navToggle.addEventListener("click", function (e) {
        hamburger.doToggle(e);
    });
})();

// Dropdown
$("ul.nav li.dropdown").hover(function () {
    $(this).find(".dropdown-menu").stop(true, true).delay(200).fadeIn(500);
}, function () {
    $(this).find(".dropdown-menu").stop(true, true).delay(200).fadeOut(500);
});

// collapsble text
$("div.zw-list-block__item-iner-text").hover(function () {
    $(".panel-collapse", $(this).closest(".zw-list-block__item")).collapse("show");
}, function () {
    $(".panel-collapse", $(this).closest(".zw-list-block__item")).collapse("hide");
    console.log("hello");
});

// download document
$(document).ready(function () {
    $(".ui.dropdown").dropdown();
    $(".ui.dropdown").dropdown({ on: "hover" });
});

$(document).ready(function () {
    $("#disclosure-link").click(function (e) {
        e.preventDefault();
        // window.location.href = "./assets/img/home/test-doc.pdf";
        window.open("./file/Form_MGT_7 Zetwerk draft FY 2020-21.pdf", "_blank");
        // var otherWindow = window.open();
        // otherWindow.opener = null;
    });
});

$(document).ready(function () {
    $('.js-niceSelect').niceSelect();

    //logo slider

    // HOME PAGE BANNER SLIDER

    var logoSlider = new Swiper(".js-logo-progressSLider", {
        slidesPerView: 4,
        grabCursor: false,
        spaceBetween: 0,
        keyboard: {
            enabled: true
        },
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false
        },

        breakpoints: {
            320: {
                slidesPerView: 3,
                spaceBetween: 10
            },

            768: {
                slidesPerView: 3.1,
                spaceBetween: 15
            },
            992: {
                slidesPerView: 4,
                spaceBetween: 20
            }
        },
        navigation: {
            nextEl: ".js-arrow-right",
            prevEl: ".js-arrow-left"
        }
    });

    // let thead = gsap.timeline({});
    // thead.fromTo(".gsap-head-item", {
    //     opacity: 0,
    //     // x: -20,
    //     // y: -10,
    //     // duration: 0.6,
    //     // ease: "power2.out",

    // }, {
    //     opacity: 1,
    //     // x: 0,
    //     // y: 0,
    //     duration: 0.6,
    //     ease: "power2.out",
    //     stagger: .1
    // })

    //custom scrollbar
    $(".js-scroll-container").each(function () {
        $(this).overlayScrollbars({
            overflowBehavior: {
                y: "scroll"

            }
        });
    });

    $(".js-apply-btn").click(function () {

        $(".job-content").hide();
        $(".job-form").show();
        $(this).addClass("btn-disable");
    });

    $(".js-filter").click(function () {
        $(".js-filter-content").addClass("show");
    });
    $(".js-filter-close").click(function () {

        $(".js-filter-content").removeClass("show");
    });

    AOS.init({
        duration: 1200,
        once: true
    });
});

// $(".js-careers-drop").hover(function(e) {
//     e.preventDefault()
//     $(".careers-drop-menu").show()

// })
// $("sectin").hover(function() {
//     $(".careers-drop-menu").hide()
// })

// $(".careers-drop-menu").mouseleave(function() {
//         $(".careers-drop-menu").hide()
//     })


$(".ui.dropdown").dropdown();
$(".ui.dropdown").dropdown({ on: "hover" });

$(document).ready(function () {
    var pinScroll = 100;
    $(document).scroll(function () {
        if ($(".nk-mainheader").hasClass("header-pin")) {
            $(".service__lookFor").addClass("active");
            pinScroll = 100;
        } else {
            $(".service__lookFor").removeClass("active");
            pinScroll = 180;
        }
    });

    $(".js-lookfor").click(function (e) {
        e.preventDefault();
        var destDiv = $(this).attr("href");

        $('html, body').animate({
            scrollTop: $(destDiv).offset().top - pinScroll
        }, 300);
    });
});

},{}]},{},[1])//# sourceMappingURL=main.js.map
