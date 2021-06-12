(function ($) {
    "use strict";

    var common = {};
    eltdf.modules.common = common;

    common.eltdfFluidVideo = eltdfFluidVideo;
    common.eltdfEnableScroll = eltdfEnableScroll;
    common.eltdfDisableScroll = eltdfDisableScroll;
    common.eltdfOwlSlider = eltdfOwlSlider;
    common.getLoadMoreData = getLoadMoreData;
    common.setLoadMoreAjaxData = setLoadMoreAjaxData;

    common.eltdfOnDocumentReady = eltdfOnDocumentReady;
    common.eltdfOnWindowLoad = eltdfOnWindowLoad;
    common.eltdfOnWindowResize = eltdfOnWindowResize;
    common.eltdfOnWindowScroll = eltdfOnWindowScroll;
    common.eltdfEnable404FullScreen = eltdfEnable404FullScreen;
    common.eltdfPrettyPhoto = eltdfPrettyPhoto;

    $(document).ready(eltdfOnDocumentReady);
    $(window).load(eltdfOnWindowLoad);
    $(window).resize(eltdfOnWindowResize);
    $(window).scroll(eltdfOnWindowScroll);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function eltdfOnDocumentReady() {
        eltdfFluidVideo();
        eltdfPreloadBackgrounds();
        eltdfPrettyPhoto();
        eltdfInitAnchor().init();
        eltdfOwlSlider();
        eltdfInitSelfHostedVideoPlayer();
        eltdfSelfHostedVideoSize();
        eltdfInitBackToTop();
        eltdfBackButtonShowHide();
        eltdfIEversion();
    }

    /*
     All functions to be called on $(window).load() should be in this function
     */
    function eltdfOnWindowLoad() {
        eltdfSmoothTransition();
        eltdfEnable404FullScreen();

        if (eltdf.body.hasClass('wpb-js-composer')) {
            window.vc_rowBehaviour(); //call vc row behavior on load, this is for parallax on row since it is not loaded after some other shortcodes are loaded
        }
    }

    /*
     All functions to be called on $(window).resize() should be in this function
     */
    function eltdfOnWindowResize() {
        eltdfSelfHostedVideoSize();
        eltdfEnable404FullScreen();
    }

    /*
     All functions to be called on $(window).scroll() should be in this function
     */
    function eltdfOnWindowScroll() {

    }

    function eltdfFluidVideo() {
        fluidvids.init({
            selector: ['iframe'],
            players: ['www.youtube.com', 'player.vimeo.com']
        });
    }

    /**
     * Init Owl Carousel
     */
    function eltdfOwlSlider() {

        var sliders = $('.eltdf-owl-slider');

        if (sliders.length) {
            sliders.each(function () {
                var slider = $(this);

                slider.owlCarousel({
                    autoplay: true,
                    autoplayTimeout: 5000,
                    smartSpeed: 600,
                    items: 1,
                    animateOut: 'fadeOut',
                    animateIn: 'fadeIn',
                    loop: true,
                    dots: false,
                    nav: true,
                    navText: [
                        '<span class="eltdf-prev-icon"><span class="eltdf-icon-arrow ion-ios-arrow-left"></span></span>',
                        '<span class="eltdf-next-icon"><span class="eltdf-icon-arrow ion-ios-arrow-right"></span></span>'
                    ]
                });
            });
        }
    }

    /*
     *	Preload background images for elements that have 'eltdf-preload-background' class
     */
    function eltdfPreloadBackgrounds() {

        $(".eltdf-preload-background").each(function () {
            var preloadBackground = $(this);
            if (preloadBackground.css("background-image") !== "" && preloadBackground.css("background-image") != "none") {

                var bgUrl = preloadBackground.attr('style');

                bgUrl = bgUrl.match(/url\(["']?([^'")]+)['"]?\)/);
                bgUrl = bgUrl ? bgUrl[1] : "";

                if (bgUrl) {
                    var backImg = new Image();
                    backImg.src = bgUrl;
                    $(backImg).load(function () {
                        preloadBackground.removeClass('eltdf-preload-background');
                    });
                }
            } else {
                $(window).load(function () {
                    preloadBackground.removeClass('eltdf-preload-background');
                }); //make sure that eltdf-preload-background class is removed from elements with forced background none in css
            }
        });
    }

    function eltdfPrettyPhoto() {
        /*jshint multistr: true */
        var markupWhole = '<div class="pp_pic_holder"> \
                        <div class="ppt">&nbsp;</div> \
                        <div class="pp_top"> \
                            <div class="pp_left"></div> \
                            <div class="pp_middle"></div> \
                            <div class="pp_right"></div> \
                        </div> \
                        <div class="pp_content_container"> \
                            <div class="pp_left"> \
                            <div class="pp_right"> \
                                <div class="pp_content"> \
                                    <div class="pp_loaderIcon"></div> \
                                    <div class="pp_fade"> \
                                        <a href="#" class="pp_expand" title="Expand the image">Expand</a> \
                                        <div class="pp_hoverContainer"> \
                                            <a class="pp_next" href="#"><span class="fa fa-angle-right"></span></a> \
                                            <a class="pp_previous" href="#"><span class="fa fa-angle-left"></span></a> \
                                        </div> \
                                        <div id="pp_full_res"></div> \
                                        <div class="pp_details"> \
                                            <div class="pp_nav"> \
                                                <a href="#" class="pp_arrow_previous">Previous</a> \
                                                <p class="currentTextHolder">0/0</p> \
                                                <a href="#" class="pp_arrow_next">Next</a> \
                                            </div> \
                                            <p class="pp_description"></p> \
                                            {pp_social} \
                                            <a class="pp_close" href="#">Close</a> \
                                        </div> \
                                    </div> \
                                </div> \
                            </div> \
                            </div> \
                        </div> \
                        <div class="pp_bottom"> \
                            <div class="pp_left"></div> \
                            <div class="pp_middle"></div> \
                            <div class="pp_right"></div> \
                        </div> \
                    </div> \
                    <div class="pp_overlay"></div>';

        $("a[data-rel^='prettyPhoto']").prettyPhoto({
            hook: 'data-rel',
            animation_speed: 'normal', /* fast/slow/normal */
            slideshow: false, /* false OR interval time in ms */
            autoplay_slideshow: false, /* true/false */
            opacity: 0.80, /* Value between 0 and 1 */
            show_title: true, /* true/false */
            allow_resize: true, /* Resize the photos bigger than viewport. true/false */
            horizontal_padding: 0,
            default_width: 960,
            default_height: 540,
            counter_separator_label: '/', /* The separator for the gallery counter 1 "of" 2 */
            theme: 'pp_default', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
            hideflash: false, /* Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto */
            wmode: 'opaque', /* Set the flash wmode attribute */
            autoplay: true, /* Automatically start videos: True/False */
            modal: false, /* If set to true, only the close button will close the window */
            overlay_gallery: false, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
            keyboard_shortcuts: true, /* Set to false if you open forms inside prettyPhoto */
            deeplinking: false,
            custom_markup: '',
            social_tools: false,
            markup: markupWhole
        });
    }

    /*
     **	Anchor functionality
     */
    var eltdfInitAnchor = eltdf.modules.common.eltdfInitAnchor = function () {
        /**
         * Set active state on clicked anchor
         * @param anchor, clicked anchor
         */
        var setActiveState = function (anchor) {

            $('.eltdf-main-menu .eltdf-active-item, .eltdf-mobile-nav .eltdf-active-item, .eltdf-fullscreen-menu .eltdf-active-item').removeClass('eltdf-active-item');
            anchor.parent().addClass('eltdf-active-item');

            $('.eltdf-main-menu a, .eltdf-mobile-nav a, .eltdf-fullscreen-menu a').removeClass('current');
            anchor.addClass('current');
        };

        /**
         * Check anchor active state on scroll
         */
        var checkActiveStateOnScroll = function () {

            $('[data-eltdf-anchor]').waypoint(function (direction) {
                if (direction === 'down') {
                    setActiveState($("a[href='" + window.location.href.split('#')[0] + "#" + $(this.element).data("eltdf-anchor") + "']"));
                }
            }, {offset: '50%'});

            $('[data-eltdf-anchor]').waypoint(function (direction) {
                if (direction === 'up') {
                    setActiveState($("a[href='" + window.location.href.split('#')[0] + "#" + $(this.element).data("eltdf-anchor") + "']"));
                }
            }, {
                offset: function () {
                    return -($(this.element).outerHeight() - 150);
                }
            });

        };

        /**
         * Check anchor active state on load
         */
        var checkActiveStateOnLoad = function () {
            var hash = window.location.hash.split('#')[1];

            if (hash !== "" && $('[data-eltdf-anchor="' + hash + '"]').length > 0) {
                anchorClickOnLoad(hash);
            }
        };

        /**
         * Handle anchor on load
         */
        var anchorClickOnLoad = function ($this) {
            var scrollAmount;
            var anchor = $('a');
            var hash = $this;
            if (hash !== "" && $('[data-eltdf-anchor="' + hash + '"]').length > 0) {
                var anchoredElementOffset = $('[data-eltdf-anchor="' + hash + '"]').offset().top;
                scrollAmount = $('[data-eltdf-anchor="' + hash + '"]').offset().top - headerHeihtToSubtract(anchoredElementOffset) - eltdfGlobalVars.vars.eltdfAddForAdminBar;

                setActiveState(anchor);

                eltdf.html.stop().animate({
                    scrollTop: Math.round(scrollAmount)
                }, 1000, function () {
                    //change hash tag in url
                    if (history.pushState) {
                        history.pushState(null, null, '#' + hash);
                    }
                });
                return false;
            }
        };

        /**
         * Calculate header height to be substract from scroll amount
         * @param anchoredElementOffset, anchorded element offest
         */
        var headerHeihtToSubtract = function (anchoredElementOffset) {

            if (eltdf.modules.header.behaviour === 'eltdf-sticky-header-on-scroll-down-up') {
                eltdf.modules.header.isStickyVisible = (anchoredElementOffset > eltdf.modules.header.stickyAppearAmount);
            }

            if (eltdf.modules.header.behaviour === 'eltdf-sticky-header-on-scroll-up') {
                if ((anchoredElementOffset > eltdf.scroll)) {
                    eltdf.modules.header.isStickyVisible = false;
                }
            }

            var headerHeight = eltdf.modules.header.isStickyVisible ? eltdfGlobalVars.vars.eltdfStickyHeaderTransparencyHeight : eltdfPerPageVars.vars.eltdfHeaderTransparencyHeight;

            if (eltdf.windowWidth < 1025) {
                headerHeight = 0;
            }

            return headerHeight;
        };

        /**
         * Handle anchor click
         */
        var anchorClick = function () {
            eltdf.document.on("click", ".eltdf-main-menu a, .eltdf-fullscreen-menu a, .eltdf-btn, .eltdf-anchor, .eltdf-mobile-nav a", function () {
                var scrollAmount;
                var anchor = $(this);
                var hash = anchor.prop("hash").split('#')[1];

                if (hash !== "" && $('[data-eltdf-anchor="' + hash + '"]').length > 0) {

                    var anchoredElementOffset = $('[data-eltdf-anchor="' + hash + '"]').offset().top;
                    scrollAmount = $('[data-eltdf-anchor="' + hash + '"]').offset().top - headerHeihtToSubtract(anchoredElementOffset) - eltdfGlobalVars.vars.eltdfAddForAdminBar;

                    setActiveState(anchor);

                    eltdf.html.stop().animate({
                        scrollTop: Math.round(scrollAmount)
                    }, 1000, function () {
                        //change hash tag in url
                        if (history.pushState) {
                            history.pushState(null, null, '#' + hash);
                        }
                    });
                    return false;
                }
            });
        };

        return {
            init: function () {
                if ($('[data-eltdf-anchor]').length) {
                    anchorClick();
                    checkActiveStateOnScroll();
                    $(window).load(function () {
                        checkActiveStateOnLoad();
                    });
                }
            }
        };
    };

    function eltdfDisableScroll() {
        if (window.addEventListener) {
            window.addEventListener('wheel', eltdfWheel, {passive: false});
        }

        // window.onmousewheel = document.onmousewheel = eltdfWheel;
        document.onkeydown = eltdfKeydown;
    }

    function eltdfEnableScroll() {
        if (window.removeEventListener) {
            window.removeEventListener('wheel', eltdfWheel, {passive: false});
        }

        window.onmousewheel = document.onmousewheel = document.onkeydown = null;
    }

    function eltdfWheel(e) {
        eltdfPreventDefaultValue(e);
    }

    function eltdfKeydown(e) {
        var keys = [37, 38, 39, 40];

        for (var i = keys.length; i--;) {
            if (e.keyCode === keys[i]) {
                eltdfPreventDefaultValue(e);
                return;
            }
        }
    }

    function eltdfPreventDefaultValue(e) {
        e = e || window.event;
        if (e.preventDefault) {
            e.preventDefault();
        }
        e.returnValue = false;
    }

    function eltdfInitSelfHostedVideoPlayer() {

        var players = $('.eltdf-self-hosted-video');
        players.mediaelementplayer({
            audioWidth: '100%'
        });
    }

    function eltdfEnable404FullScreen() {
        if (eltdf.body.hasClass('error404')) {
            var content404 = $('.eltdf-404-background');
            content404.css({'height': (eltdf.windowHeight) + 'px'});
            content404.css({'width': (eltdf.windowWidth) + 'px'});
        }

    }

    function eltdfSelfHostedVideoSize() {

        $('.eltdf-self-hosted-video-holder .eltdf-video-wrap').each(function () {
            var thisVideo = $(this);

            var videoWidth = thisVideo.closest('.eltdf-self-hosted-video-holder').outerWidth();
            var videoHeight = videoWidth / eltdf.videoRatio;

            if (navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini)/)) {
                thisVideo.parent().width(videoWidth);
                thisVideo.parent().height(videoHeight);
            }

            thisVideo.width(videoWidth);
            thisVideo.height(videoHeight);

            thisVideo.find('video, .mejs-overlay, .mejs-poster').width(videoWidth);
            thisVideo.find('video, .mejs-overlay, .mejs-poster').height(videoHeight);
        });
    }

    function eltdfToTopButton(a) {

        var b = $("#eltdf-back-to-top");
        b.removeClass('off on');
        if (a === 'on') {
            b.addClass('on');
        } else {
            b.addClass('off');
        }
    }

    function eltdfBackButtonShowHide() {
        eltdf.window.scroll(function () {
            var b = $(this).scrollTop();
            var c = $(this).height();
            var d;
            if (b > 0) {
                d = b + c / 2;
            } else {
                d = 1;
            }
            if (d < 1e3) {
                eltdfToTopButton('off');
            } else {
                eltdfToTopButton('on');
            }
        });
    }

    function eltdfInitBackToTop() {
        var backToTopButton = $('#eltdf-back-to-top');
        backToTopButton.on('click', function (e) {
            e.preventDefault();
            eltdf.html.animate({scrollTop: 0}, eltdf.window.scrollTop() / 3, 'linear');
        });
    }

    function eltdfSmoothTransition() {
        if (eltdf.body.hasClass('eltdf-smooth-page-transitions')) {

            //check for preload animation
            if (eltdf.body.hasClass('eltdf-smooth-page-transitions-preloader')) {
                var loader = $('body > .eltdf-smooth-transition-loader.eltdf-mimic-ajax');
                loader.fadeOut(500);
                $(window).on("pageshow", function (event) {
                    if (event.originalEvent.persisted) {
                        loader.fadeOut(500);
                    }
                });
            }

            // if back button is pressed, than show content to avoid state where content is on display:none
            window.addEventListener( "pageshow", function ( event ) {
                var historyPath = event.persisted || ( typeof window.performance != "undefined" && window.performance.navigation.type === 2 );
                if ( historyPath ) {
                    $('.eltdf-wrapper-inner').show();
                }
            });

            //check for fade out animation
            if (eltdf.body.hasClass('eltdf-smooth-page-transitions-fadeout')) {
                if ($('a').parent().hasClass('eltdf-blog-load-more-button') || $('a').parent().hasClass('eltdf-ptf-list-load-more')) {
                    return false;
                }
                $('a').on('click',function (e) {
                    var a = $(this);
                    if (
                        e.which == 1 && // check if the left mouse button has been pressed
                        a.attr('href').indexOf(window.location.host) >= 0 && // check if the link is to the same domain
                        (typeof a.data('rel') === 'undefined') && //Not pretty photo link
                        (typeof a.attr('rel') === 'undefined') && //Not VC pretty photo link
                        (typeof a.attr('target') === 'undefined' || a.attr('target') === '_self') && // check if the link opens in the same window
                        (a.attr('href').split('#')[0] !== window.location.href.split('#')[0]) // check if it is an anchor aiming for a different page
                    ) {
                        e.preventDefault();
                        $('.eltdf-wrapper-inner').fadeOut(1000, function () {
                            window.location = a.attr('href');
                        });
                    }
                });
            }
        }
    }

    /*
     * IE version
     */
    function eltdfIEversion() {
        var ua = window.navigator.userAgent;
        var msie = ua.indexOf("MSIE ");

        if (msie > 0) {
            var version = parseInt(ua.substring(msie + 5, ua.indexOf(".", msie)));
            eltdf.body.addClass('eltdf-ms-ie' + version);
        }
        return false;
    }

    /**
     * Initializes load more data params
     * @param container with defined data params
     * return array
     */
    function getLoadMoreData(container) {
        var dataList = container.data(),
            returnValue = {};

        for (var property in dataList) {
            if (dataList.hasOwnProperty(property)) {
                if (typeof dataList[property] !== 'undefined' && dataList[property] !== false) {
                    returnValue[property] = dataList[property];
                }
            }
        }

        return returnValue;
    }

    /**
     * Sets load more data params for ajax function
     * @param container with defined data params
     * return array
     */
    function setLoadMoreAjaxData(container, action) {
        var returnValue = {
            action: action
        };

        for (var property in container) {
            if (container.hasOwnProperty(property)) {

                if (typeof container[property] !== 'undefined' && container[property] !== false) {
                    returnValue[property] = container[property];
                }
            }
        }

        return returnValue;
    }

})(jQuery);