jQuery(document).ready(function ($) {
    if ($('#loader-wrapper').length > 0) {
        // hide preloader when everthing in the document load
        $('#loader-wrapper').css('display', 'none');
    }

    //Open Search form on search icon click
    if ($('.search-icon-box').length > 0) {
        $('.search-icon-box').on('click', function (e) {
            e.preventDefault();
            allure_news_search();

        });
    }


    function allure_news_search(e){
        $('.top-bar-search').addClass('open');
        $('.top-bar-search form input[type="search"]').focus();
    }

    // Close popup search form
    $('.top-bar-search, .top-bar-search button.close').on('click', function (event) {
        if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
            $(this).removeClass('open');
        }
    });

    //Open Close Off Canvas Menu
    // $('.top-menu-icon, .overlay, .offcanvas-menu .close').on('click', function (e) {
    //     e.preventDefault();
    //     $('.offcanvas-menu ').toggleClass('menu-show');
    //     $('.top-menu-icon').toggleClass('clicked');
    //     $('.overlay').toggleClass('show');
    //     $('nav').toggleClass('show');
    //     $('body').toggleClass('overflow');
    // });

    //Post Slider Widget JS
    if ($('.ct-post-carousel').length > 0) {
        $(".ct-post-carousel").slick({
            items: 1,
            dots: false,
            infinite: true,
            centerMode: false,
            autoplay: true,
            lazyLoad: 'ondemand',
            adaptiveHeight: true
        });
    }

    //Post Carousel
    if ($('.ct-header-carousel').length > 0) {
        $(".ct-header-carousel").slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: false,
            infinite: true,
            centerMode: false,
            autoplay: true,
            lazyLoad: 'ondemand',
            speed: 400,
            adaptiveHeight: true,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: false,
                        slidesToShow: 1
                    }
                }
            ]
        });
    }

    //Tabs
    if ($('.ct-tabs').length > 0) {
        $( ".ct-tabs" ).tabs();
    }
    // Initialize gototop button
    if ( $('#toTop').length > 0 ) {
        // Hide the toTop button when the page loads.
        $("#toTop").css("display", "none");

        // This function runs every time the user scrolls the page.
        $(window).scroll(function () {

            // Check weather the user has scrolled down (if "scrollTop()"" is more than 0)
            if ($(window).scrollTop() > 0) {

                // If it's more than or equal to 0, show the toTop button.
                $("#toTop").fadeIn("slow");
            } else {
                // If it's less than 0 (at the top), hide the toTop button.
                $("#toTop").fadeOut("slow");

            }
        });

        // When the user clicks the toTop button, we want the page to scroll to the top.
        jQuery("#toTop").click(function (event) {

            // Disable the default behaviour when a user clicks an empty anchor link.
            // (The page jumps to the top instead of // animating)
            event.preventDefault();

            // Animate the scrolling motion.
            jQuery("html, body").animate({
                scrollTop: 0
            }, "slow");

        });
    }


    //sticky sidebar
    var at_body = $("body");
    var at_window = $(window);

    if ($('.ct-sticky-sidebar').length > 0) {

        if (at_body.hasClass('ct-sticky-sidebar')) {
            if (at_body.hasClass('right-sidebar')) {
                $('#secondary, #primary').theiaStickySidebar();
            } else {
                $('#secondary, #primary').theiaStickySidebar();
            }
        }
    }

    //Trending News Marquee
    if ($('.trending-left').length > 0) {
        $('.trending-left').marquee({
            //speed in milliseconds of the marquee
            duration: 85000,
            //gap in pixels between the tickers
            gap: 0,
            //time in milliseconds before the marquee will start animating
            delayBeforeStart: 0,
            //'left' or 'right'
            direction: 'left',
            //true or false - should the marquee be duplicated to show an effect of continues flow
            duplicated: true,

            pauseOnHover: true,
            startVisible: true
        });
    }

    //Trending News Marquee
    if ($('.trending-right').length > 0) {
        $('.trending-right').marquee({
            duration: 85000,
            //gap in pixels between the tickers
            gap: 0,
            //time in milliseconds before the marquee will start animating
            delayBeforeStart: 0,
            //'left' or 'right'
            direction: 'right',
            //true or false - should the marquee be duplicated to show an effect of continues flow
            duplicated: true,

            pauseOnHover: true,
            startVisible: true
        });
    }

    //Video Widget Popup
   $('.ct-popup').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,

        fixedContentPos: false
    });

    if ( jQuery('.sticky-header').length > 0 ) {
        // grab the initial top offset of the navigation
        var stickyNavTop = $('.sticky-header').offset().top;

        // our function that decides weather the navigation bar should have "fixed" css position or not.
        var stickyNav = function () {
            var width = $(window).width();
            var scrollTop = $(window).scrollTop(); // our current vertical position from the top

            // if we've scrolled more than the navigation, change its position to fixed to stick to top,
            // otherwise change it back to relative
            if ((scrollTop > stickyNavTop) && (width > 768)) {
                $('.sticky-header').addClass('ct-sticky');
                $('.sticky-header').removeClass('hide');
            } else {
                $('.sticky-header').removeClass('ct-sticky');
                $('.sticky-header').addClass('hide');
            }
        };

        stickyNav();
        // and run it again every time you scroll
        $(window).scroll(function () {
            stickyNav();
        });
    }

    if ( jQuery('.ct-show-hide-top').length > 0 ) {
        $('.ct-show-hide-top').on('click', function (e) {
            e.preventDefault();
            $('.top-bar .container-inner').toggle('slow');
            $(this).toggleClass('ct-rotate');
        });
    }

});


jQuery(window).load(function($) {
    if ( jQuery('.ct-masonry .two-columns, .ct-masonry .three-columns').length > 0 ) {
        var $container = jQuery('.ct-masonry');
        // initialize
        $container.masonry({
            itemSelector: '.two-columns, .three-columns',
            columnWidth: '.two-columns, .three-columns',
            percentPosition: true
        });
    }
});