(function ($) {
    'use strict';

    var browserWindow = $(window);

    // :: 1.0 Preloader Active Code
    browserWindow.on('load', function () {
        $('.preloader').fadeOut('slow', function () {
            $(this).remove();
        });
    });

    // :: 2.0 Nav Active Code
    if ($.fn.classyNav) {
        $('#oneMusicNav').classyNav();
    }

    // :: 3.0 Sliders Active Code
    if ($.fn.owlCarousel) {
        var welcomeSlide = $('.hero-slides');
        var testimonials = $('.testimonials-slide');
        var albumSlides = $('.albums-slideshow');

        welcomeSlide.owlCarousel({
            items: 1,
            margin: 0,
            loop: true,
            nav: false,
            dots: false,
            autoplay: true,
            autoplayTimeout: 7000,
            smartSpeed: 1000,
            animateIn: 'fadeIn',
            animateOut: 'fadeOut'
        });

        welcomeSlide.on('translate.owl.carousel', function () {
            var slideLayer = $("[data-animation]");
            slideLayer.each(function () {
                var anim_name = $(this).data('animation');
                $(this).removeClass('animated ' + anim_name).css('opacity', '0');
            });
        });

        welcomeSlide.on('translated.owl.carousel', function () {
            var slideLayer = welcomeSlide.find('.owl-item.active').find("[data-animation]");
            slideLayer.each(function () {
                var anim_name = $(this).data('animation');
                $(this).addClass('animated ' + anim_name).css('opacity', '1');
            });
        });

        $("[data-delay]").each(function () {
            var anim_del = $(this).data('delay');
            $(this).css('animation-delay', anim_del);
        });

        $("[data-duration]").each(function () {
            var anim_dur = $(this).data('duration');
            $(this).css('animation-duration', anim_dur);
        });

        testimonials.owlCarousel({
            items: 1,
            margin: 0,
            loop: true,
            dots: false,
            autoplay: true
        });

        albumSlides.owlCarousel({
            items: 3,
            margin: 30,
            loop: true,
            nav: true,
            navText: ['<i class="fa fa-angle-double-left"></i>', '<i class="fa fa-angle-double-right"></i>'],
            dots: false,
            autoplay: true,
            autoplayTimeout: 5000,
            smartSpeed: 750,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            }
        });
    }

    // :: 4.0 Masonary Gallery Active Code
    if ($.fn.imagesLoaded) {
        $('.oneMusic-albums').imagesLoaded(function () {
            // filter items on button click
            $('.catagory-menu').on('click', 'a', function () {
                var filterValue = $(this).attr('data-filter');
                $grid.isotope({
                    filter: filterValue
                });
            });
            // init Isotope
            var $grid = $('.oneMusic-albums').isotope({
                itemSelector: '.single-album-item',
                percentPosition: true,
                masonry: {
                    columnWidth: '.single-album-item'
                }
            });
        });
    }

    // :: 5.0 Video Active Code
    if ($.fn.magnificPopup) {
        $('.video--play--btn').magnificPopup({
            disableOn: 0,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: true,
            fixedContentPos: false
        });
    }

    // :: 6.0 ScrollUp Active Code
    if ($.fn.scrollUp) {
        browserWindow.scrollUp({
            scrollSpeed: 1500,
            scrollText: '<i class="fa fa-angle-up"></i>'
        });
    }

    // :: 7.0 CounterUp Active Code
    if ($.fn.counterUp) {
        $('.counter').counterUp({
            delay: 10,
            time: 1500
        });
    }

    // :: 8.0 Sticky Active Code
    if ($.fn.sticky) {
        $(".oneMusic-main-menu").sticky({
            topSpacing: 0
        });
    }

    // :: 9.0 Progress Bar Active Code
    if ($.fn.circleProgress && $('.circle').length) {
        var el = $('.circle'),
            inited = false;

        el.circleProgress({
            value: 0,
            size: 160,
            emptyFill: "rgba(0, 0, 0, .0)",
            fill: '#000000',
            thickness: '3',
            reverse: true
        });

        el.appear({ force_process: true });

        el.on('appear', function() {
            if (!inited) {
                el.each((index, item) => {
                    $(item).circleProgress({
                        value: $(item).attr('data-value')
                    })
                })
                inited = true;
            }
        });

        // el.on('disappear', () => {
        //     if (inited) {
        //         el.circleProgress({ 
        //             value: 0
        //         });
        //         inited = false;                
        //     }
        // });

        el.on('circle-animation-progress', function(event, progress, stepValue) {
            $(this).find('span').html(Math.floor(stepValue * 100) + '<i>%</i>');
        });

        // el.on('disapear', function() {
        //     if (inited) {
        //         el.circleProgress({ 
        //             value: 0
        //         });
        //         el.circleProgress('redraw');
        //         inited = false;                
        //     }
        // });

        // $('#circle').circleProgress({
        //     size: 160,
        //     emptyFill: "rgba(0, 0, 0, .0)",
        //     fill: '#000000',
        //     thickness: '3',
        //     reverse: true
        // });
        // $('#circle2').circleProgress({
        //     size: 160,
        //     emptyFill: "rgba(0, 0, 0, .0)",
        //     fill: '#000000',
        //     thickness: '3',
        //     reverse: true
        // });
        // $('#circle3').circleProgress({
        //     size: 160,
        //     emptyFill: "rgba(0, 0, 0, .0)",
        //     fill: '#000000',
        //     thickness: '3',
        //     reverse: true
        // });
        // $('#circle4').circleProgress({
        //     size: 160,
        //     emptyFill: "rgba(0, 0, 0, .0)",
        //     fill: '#000000',
        //     thickness: '3',
        //     reverse: true
        // });
    }

    // :: 10.0 audioPlayer Active Code
    if ($.fn.audioPlayer) {
        $('audio').audioPlayer();
    }

    // :: 11.0 Tooltip Active Code
    if ($.fn.tooltip) {
        $('[data-toggle="tooltip"]').tooltip()
    }

    // :: 12.0 prevent default a click
    $('a[href="#"]').on('click', function ($) {
        $.preventDefault();
    });

    // :: 13.0 wow Active Code
    if (browserWindow.width() > 767) {
        new WOW().init();
    }
    
    // :: 14.0 Gallery Menu Active Code
    $('.catagory-menu a').on('click', function () {
        $('.catagory-menu a').removeClass('active');
        $(this).addClass('active');
    })
    // LINEAR SKILL
    let elements = $('.skillbar');
    elements.appear({ force_process: true });

    if (elements.length){
        elements.each((index, item) => {
            $(item).on('appear', function() {
                $(this).find('.skillbar-bar').animate({
                    width: $(this).attr('data-percent')
                }, 1500);
            });
        });
    }
    $.force_appear();

    // MASONRY LIBRARIE
    let masonry = $('.content-masonry').masonry({
        'iten-selector': 'masonry-item'
    });
    masonry.masonry();
    
    //Video responsive en custom post
    $('.custom-post-content iframe').parent().addClass('wp-block-embed__wrapper');
    $('.custom-post-content img.aligncenter').parent('p').addClass('text-center');
})(jQuery);