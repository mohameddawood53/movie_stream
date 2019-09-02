// -----------------------------

//   js index
/* =================== */
/*  
    

    

*/
// -----------------------------


(function ($) {
    "use strict";



    /*---------------------
    preloader
    --------------------- */

    $(window).on('load', function () {
        $('#preloader').fadeOut('slow', function () {
            $(this).remove();
        });
    });


    /*----------------------------
     slick nav
    ------------------------------ */
    // $('#menu').slicknav();
    $('.menu').slicknav({
        prependTo: '.responsive-menu',
        label: '',
        allowParentLinks: true
    });


    /*------------------------
    meanmenu-remove-class
    ------------------------*/
    $(window).on('resize', function () {
        var wWidth = $(this).width();

        if (wWidth < 991) {
            // removing class
            $('.drop').addClass('m-d-removed');
            $('.m-d-removed').removeClass('drop');

            $('.third').addClass('t-h-m-removed');
            $('.t-h-m-removed').removeClass('third');

            $('.mega-menu').addClass('m-g-removed');
            $('.m-g-removed').removeClass('mega-menu');
        } else {
            // adding class
            $('.m-d-removed').addClass('drop');
            $('.drop').removeClass('m-d-removed');

            $('.third').removeClass('t-h-m-removed');
            $('.t-h-m-removed').addClass('third');

            $('.mega-menu').removeClass('m-g-removed');
            $('.m-g-removed').addClass('mega-menu');
        }
    }).resize();

    /*-----------------
    sticky
    -----------------*/
    $(window).on('scroll', function () {
        if ($(window).scrollTop() > 220) {
            $('.header-top-area').addClass('navbar-fixed-top');
        } else {
            $('.header-top-area').removeClass('navbar-fixed-top');
        }
    });

    /*-----------------
    h2-sticky
    -----------------*/
    $(window).on('scroll', function () {
        if ($(window).scrollTop() > 200) {
            $('.h2-header-bottom-area').addClass('navbar-fixed-top');
        } else {
            $('.h2-header-bottom-area').removeClass('navbar-fixed-top');
        }
    });

    /*-----------------
    scroll-up
    -----------------*/
    $.scrollUp({
        scrollText: '<i class="fa fa-arrow-up" aria-hidden="true"></i>',
        easingType: 'linear',
        scrollSpeed: 1500,
        animation: 'fade'
    });

    /*------------------------------
         counter
    ------------------------------ */
    $('.counter-up').counterUp();


    /*---------------------
    smooth scroll
    --------------------- */
    $('.smoothscroll').on('click', function (e) {
        e.preventDefault();
        var target = this.hash;

        $('html, body').stop().animate({
            'scrollTop': $(target).offset().top - 80
        }, 1200);
    });


    /*---------------------
    countdown
    --------------------- */
    $('[data-countdown]').each(function () {
        var $this = $(this),
            finalDate = $(this).data('countdown');
        $this.countdown(finalDate, function (event) {
            $this.html(event.strftime('<span class="cdown days"><span class="time-count">%-D</span> <p>Days</p></span> <span class="cdown hour"><span class="time-count">%-H</span> <p>Hour</p></span> <span class="cdown minutes"><span class="time-count">%M</span> <p>Min</p></span> <span class="cdown second"> <span><span class="time-count">%S</span> <p>Sec</p></span>'));
        });
    });


    /*---------------------
    video-popup
    --------------------- */
    $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 300,
        preloader: false,
        fixedContentPos: false
    });


    /*---------------------
    slider-carousel
    --------------------- */
    function slider_carousel() {
        var owl = $(".slider-carousel");
        owl.owlCarousel({
            loop: true,
            margin: 0,
            responsiveClass: true,
            navigation: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            nav: false,
            items: 1,
            smartSpeed: 500,
            dots: true,
            autoplay: true,
            autoplayTimeout: 4000,
            center: false,
            animateIn: 'fadeIn',
            animateOut: 'fadeOut',
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                760: {
                    items: 1
                }
            }
        });
    }
    slider_carousel();


    /*---------------------
    top-movie-carousel
    --------------------- */
    function top_movie_carousel() {
        var owl = $(".top-movie-carousel");
        owl.owlCarousel({
            loop: true,
            margin: 20,
            responsiveClass: true,
            navigation: true,
            navText: ["<i class='fas fa-arrow-left'></i>", "<i class='fas fa-arrow-right'></i>"],
            nav: false,
            items: 4,
            smartSpeed: 1000,
            dots: false,
            autoplay: false,
            autoplayTimeout: 4000,
            center: false,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                760: {
                    items: 3
                },
                992: {
                    items: 4
                },
            }
        });
    }
    top_movie_carousel();


    /*---------------------
    ums-carousel
    --------------------- */
    function ums_carousel() {
        var owl = $(".ums-carousel");
        owl.owlCarousel({
            loop: true,
            margin: 20,
            responsiveClass: true,
            navigation: true,
            navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
            nav: true,
            items: 1,
            smartSpeed: 1000,
            dots: false,
            autoplay: false,
            autoplayTimeout: 4000,
            center: false,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                760: {
                    items: 3
                },
                992: {
                    items: 1
                },
            }
        });
    }
    ums_carousel();


    /*---------------------
    tab-carousel
    --------------------- */
    function tab_carousel() {
        var owl = $(".tab-carousel");
        owl.owlCarousel({
            loop: true,
            margin: 20,
            responsiveClass: true,
            navigation: true,
            navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
            nav: true,
            items: 4,
            smartSpeed: 1000,
            dots: false,
            autoplay: false,
            autoplayTimeout: 4000,
            center: false,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                760: {
                    items: 3
                },
                992: {
                    items: 4
                },
            }
        });
    }
    tab_carousel();

    /*---------------------
    about-movie-carousel
    --------------------- */
    function about_movie_carousel() {
        var owl = $(".about-movie-carousel");
        owl.owlCarousel({
            loop: true,
            margin: 20,
            responsiveClass: true,
            navigation: true,
            navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
            nav: true,
            items: 1,
            smartSpeed: 1000,
            dots: false,
            autoplay: false,
            autoplayTimeout: 4000,
            center: false,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                760: {
                    items: 1
                },
                992: {
                    items: 1
                },
            }
        });
    }
    about_movie_carousel();

    /*---------------------
    news-carousel
    --------------------- */
    function news_carousel() {
        var owl = $(".news-carousel");
        owl.owlCarousel({
            loop: true,
            margin: 20,
            responsiveClass: true,
            navigation: true,
            navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
            nav: true,
            items: 1,
            smartSpeed: 1000,
            dots: false,
            autoplay: false,
            autoplayTimeout: 4000,
            center: false,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                760: {
                    items: 1
                },
                992: {
                    items: 1
                },
            }
        });
    }
    news_carousel();


    /*---------------------
    h2-slider-carousel
    --------------------- */
    function h2_slider_carousel() {
        var owl = $(".h2-slider-carousel");
        owl.owlCarousel({
            loop: true,
            margin: 0,
            responsiveClass: true,
            navigation: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            nav: false,
            items: 1,
            smartSpeed: 500,
            dots: true,
            autoplay: true,
            autoplayTimeout: 4000,
            center: false,
            animateIn: 'fadeIn',
            animateOut: 'fadeOut',
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                760: {
                    items: 1
                }
            }
        });
    }
    h2_slider_carousel();

    /*---------------------
    h3-slider-carousel
    --------------------- */
    function h3_slider_carousel() {
        var owl = $(".h3-slider-carousel");
        owl.owlCarousel({
            loop: true,
            margin: 0,
            responsiveClass: true,
            navigation: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            nav: false,
            items: 1,
            smartSpeed: 500,
            dots: true,
            autoplay: false,
            autoplayTimeout: 4000,
            center: false,
            animateIn: 'fadeIn',
            animateOut: 'fadeOut',
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                760: {
                    items: 1
                }
            }
        });
    }
    h3_slider_carousel();


    /*---------------------
    all-album-carousel
    --------------------- */
    function all_album_carousel() {
        var owl = $(".all-album-carousel");
        owl.owlCarousel({
            loop: true,
            margin: 20,
            responsiveClass: true,
            navigation: true,
            navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
            nav: true,
            items: 4,
            smartSpeed: 1000,
            dots: false,
            autoplay: false,
            autoplayTimeout: 4000,
            center: false,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                760: {
                    items: 3
                },
                992: {
                    items: 4
                },
            }
        });
    }
    all_album_carousel();

    /*---------------------
    dba - right - carousel
    --------------------- */
    function dba_right_carousel() {
        var owl = $(".dba-right-carousel");
        owl.owlCarousel({
            loop: true,
            margin: 20,
            responsiveClass: true,
            navigation: true,
            navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
            nav: true,
            items: 1,
            smartSpeed: 1000,
            dots: false,
            autoplay: false,
            autoplayTimeout: 4000,
            center: false,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                760: {
                    items: 2
                },
                992: {
                    items: 1
                },
            }
        });
    }
    dba_right_carousel();


    /*-----------------------------------------------------
    Audio Player
    ------------------------------------------------------*/
    var songs = $('.amplitude-song-container');
    var songObj = [];

    songs.each(function () {
        var songUrl = $(this).data('song');
        var songCover = $(this).data('cover');
        var songName = $(this).find('.song-title').html();
        var songArtist = $(this).find('.song-artist').html();

        var item = {}
        item["name"] = songName;
        item["artist"] = songArtist;
        item["url"] = songUrl;
        item["cover_art_url"] = songCover;

        songObj.push(item);
    });

    Amplitude.init({
        "songs": songObj,
        "playlists": {
            "rock_and_roll": [
                0, 1, 2, 3, 4, 5, 6, 7, 8, 9
            ]
        }
    });

    $('.player-track-list-block').slimScroll({
        height: $('#player-one').outerHeight()
    });

    $("#playListBtn").on('click', function () {
        $(".slimScrollDiv").slideToggle("slow");
    });

    // Get the current width of the slider
    var sliderWidth = $('[type=range]').width();
    // Remove previously created style elements
    $('.custom-style-element-related-to-range').remove();
    // Add our updated styling
    $('<style class="custom-style-element-related-to-range">input[type="range"]::-webkit-slider-thumb { box-shadow: -' + sliderWidth + 'px 0 0 ' + sliderWidth + 'px;}<style/>').appendTo('head');

    /*------------------------------
    newsletter-area-parallax
    ------------------------------ */
    $('.newsletter-area').parallax("50%", -0.2);


}(jQuery));