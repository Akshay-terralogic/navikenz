(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);throw new Error("Cannot find module '"+o+"'")}var f=n[o]={exports:{}};t[o][0].call(f.exports,function(e){var n=t[o][1][e];return s(n?n:e)},f,f.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
"use strict";

$(document).ready(function () {
    $('.experiance-slider').rangeslider({
        polyfill: false,
        onInit: function onInit() {
            $(".rangeslider__handle").append("<div class='custom-label'>" + this.value + "<span>Yrs</span><div>");
            if (this.value < 4) {

                $(".custom-label").addClass("left");
            } else {
                $(".custom-label").removeClass("left");
            }
        },
        onSlide: function onSlide(position, value) {
            // console.log(value);
            $(".custom-label").text(value).append("<span>Yrs</span>");
            if (value < 4) {
                $(".custom-label").addClass("left");
            } else {
                $(".custom-label").removeClass("left");
            }
            if (value > 26) {
                $(".custom-label").addClass("right");
            } else {
                $(".custom-label").removeClass("right");
            }
        }
    });

    Dropzone.autoDiscover = false;

    //dropsone opportunity

    //opportunity page
    initFileUploader("#zdrop");

    function initFileUploader(target) {
        var previewNode = document.querySelector("#zdrop-template");
        previewNode.id = "";
        var previewTemplate = previewNode.parentNode.innerHTML;
        previewNode.parentNode.removeChild(previewNode);

        var zdrop = new Dropzone(target, {
            url: ' ',
            maxFiles: 1,
            maxFilesize: 30 / 1024,
            previewTemplate: previewTemplate,
            previewsContainer: "#previews",
            clickable: "#upload-label",
            dictFileTooBig: "File too big ({{filesize}}MB). Must be less than {{maxFilesize}}MB.",
            acceptedFiles: ".pdf,.doc,.docx,"
        });

        zdrop.on("addedfile", function (file) {
            $('.dropzone-custome').css('display', 'none');
        });
        zdrop.on("removedfile", function (file) {

            $('.dropzone-custome').css('display', 'block');
        });

        // zdrop.on("totaluploadprogress", function(progress) {
        //     var progr = document.querySelector(".progress .determinate");
        //     if (progr === undefined || progr === null)
        //         return;

        //     progr.style.width = progress + "%";
        // });

        zdrop.on('dragenter', function () {
            $('.fileuploader').addClass("active");
        });

        zdrop.on('dragleave', function () {
            $('.fileuploader').removeClass("active");
        });

        zdrop.on('drop', function () {
            $('.fileuploader').removeClass("active");
        });
    }

    var exampleModal = document.getElementById('exampleModal-opportunity');
    exampleModal.addEventListener('show.bs.modal', function (event) {
        initFileUploader("#zdrop-module");

        function initFileUploader(target) {
            var previewNode = document.querySelector("#zdrop-template-model");
            previewNode.id = "";
            var previewTemplate = previewNode.parentNode.innerHTML;
            previewNode.parentNode.removeChild(previewNode);

            var zdrop = new Dropzone(target, {
                url: ' ',
                maxFiles: 1,
                maxFilesize: 5,
                previewTemplate: previewTemplate,
                previewsContainer: "#previews-model",
                clickable: "#upload-label-model",
                acceptedFiles: "pdf, doc, docx,"
            });

            zdrop.on("addedfile", function (file) {
                $('.dropzone-custome-model').css('display', 'none');
            });
            zdrop.on("removedfile", function (file) {

                $('.dropzone-custome-model').css('display', 'block');
            });

            // zdrop.on("totaluploadprogress", function(progress) {
            //     var progr = document.querySelector(".progress .determinate");
            //     if (progr === undefined || progr === null)
            //         return;

            //     progr.style.width = progress + "%";
            // });

            zdrop.on('dragenter', function () {
                $('.fileuploader').addClass("active");
            });

            zdrop.on('dragleave', function () {
                $('.fileuploader').removeClass("active");
            });

            zdrop.on('drop', function () {
                $('.fileuploader').removeClass("active");
            });
        }
    });
});

},{}]},{},[1])//# sourceMappingURL=opportunity.js.map
