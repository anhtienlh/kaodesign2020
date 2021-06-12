(function($) {
    "use strict";

    window.eltdf = {};
    eltdf.modules = {};

    eltdf.scroll = 0;
    eltdf.window = $(window);
    eltdf.document = $(document);
    eltdf.windowWidth = $(window).width();
    eltdf.windowHeight = $(window).height();
    eltdf.body = $('body');
    eltdf.html = $('html, body');
    eltdf.htmlEl = $('html');
    eltdf.menuDropdownHeightSet = false;
    eltdf.defaultHeaderStyle = '';
    eltdf.minVideoWidth = 1500;
    eltdf.videoWidthOriginal = 1280;
    eltdf.videoHeightOriginal = 720;
    eltdf.videoRatio = 1.61;

    eltdf.eltdfOnDocumentReady = eltdfOnDocumentReady;
    eltdf.eltdfOnWindowLoad = eltdfOnWindowLoad;
    eltdf.eltdfOnWindowResize = eltdfOnWindowResize;
    eltdf.eltdfOnWindowScroll = eltdfOnWindowScroll;

    $(document).ready(eltdfOnDocumentReady);
    $(window).load(eltdfOnWindowLoad);
    $(window).resize(eltdfOnWindowResize);
    $(window).scroll(eltdfOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function eltdfOnDocumentReady() {
        eltdf.scroll = $(window).scrollTop();

        //set global variable for header style which we will use in various functions
        if(eltdf.body.hasClass('eltdf-dark-header')){ eltdf.defaultHeaderStyle = 'eltdf-dark-header';}
        if(eltdf.body.hasClass('eltdf-light-header')){ eltdf.defaultHeaderStyle = 'eltdf-light-header';}
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function eltdfOnWindowLoad() {

    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function eltdfOnWindowResize() {
        eltdf.windowWidth = $(window).width();
        eltdf.windowHeight = $(window).height();
    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function eltdfOnWindowScroll() {
        eltdf.scroll = $(window).scrollTop();
    }

    //set boxed layout width variable for various calculations

    switch(true){
        case eltdf.body.hasClass('eltdf-grid-1300'):
            eltdf.boxedLayoutWidth = 1350;
            break;
        case eltdf.body.hasClass('eltdf-grid-1200'):
            eltdf.boxedLayoutWidth = 1250;
            break;
        case eltdf.body.hasClass('eltdf-grid-1000'):
            eltdf.boxedLayoutWidth = 1050;
            break;
        case eltdf.body.hasClass('eltdf-grid-800'):
            eltdf.boxedLayoutWidth = 850;
            break;
        default :
            eltdf.boxedLayoutWidth = 1150;
            break;
    }

})(jQuery);
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
(function ($) {
	"use strict";

	var header = {};
	eltdf.modules.header = header;

	header.isStickyVisible = false;
	header.stickyAppearAmount = 0;
	header.behaviour = '';

	header.eltdfOnDocumentReady = eltdfOnDocumentReady;
	header.eltdfOnWindowLoad = eltdfOnWindowLoad;
	header.eltdfOnWindowResize = eltdfOnWindowResize;
	header.eltdfOnWindowScroll = eltdfOnWindowScroll;

	$(document).ready(eltdfOnDocumentReady);
	$(window).load(eltdfOnWindowLoad);
	$(window).resize(eltdfOnWindowResize);
	$(window).scroll(eltdfOnWindowScroll);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfHeaderBehaviour();
		eltdfSideArea();
		eltdfSideAreaScroll();
		eltdfFullscreenMenu();
		eltdfInitMobileNavigation();
		eltdfMobileHeaderBehavior();
		eltdfSetDropDownMenuPosition();
		eltdfSearch();
		eltdfVerticalMenu().init();
	}

	/*
	 All functions to be called on $(window).load() should be in this function
	 */
	function eltdfOnWindowLoad() {
		eltdfDropDownMenu();
		eltdfSetDropDownMenuPosition();
	}

	/*
	 All functions to be called on $(window).resize() should be in this function
	 */
	function eltdfOnWindowResize() {
	}

	/*
	 All functions to be called on $(window).scroll() should be in this function
	 */
	function eltdfOnWindowScroll() {
	}

	/*
	 **	Show/Hide sticky header on window scroll
	 */
	function eltdfHeaderBehaviour() {

		var header = $('.eltdf-page-header'),
			stickyHeader = $('.eltdf-sticky-header'),
			fixedHeaderWrapper = $('.eltdf-fixed-wrapper');

		var revSliderHeight = 0;
		if ($('.eltdf-slider').length) {
			revSliderHeight = $('.eltdf-slider').outerHeight();
		}

		var headerMenuAreaOffset = $('.eltdf-page-header').find('.eltdf-fixed-wrapper').length ? $('.eltdf-page-header').find('.eltdf-fixed-wrapper').offset().top - eltdfGlobalVars.vars.eltdfAddForAdminBar : 0;

		var stickyAppearAmount;
		var headerAppear;

		switch (true) {
			// sticky header that will be shown when user scrolls up
			case eltdf.body.hasClass('eltdf-sticky-header-on-scroll-up'):
				eltdf.modules.header.behaviour = 'eltdf-sticky-header-on-scroll-up';
				var docYScroll1 = $(document).scrollTop();
				stickyAppearAmount = eltdfGlobalVars.vars.eltdfTopBarHeight + eltdfGlobalVars.vars.eltdfLogoAreaHeight + eltdfGlobalVars.vars.eltdfMenuAreaHeight + eltdfGlobalVars.vars.eltdfStickyHeaderHeight;

				headerAppear = function () {
					var docYScroll2 = $(document).scrollTop();

					if ((docYScroll2 > docYScroll1 && docYScroll2 > stickyAppearAmount) || (docYScroll2 < stickyAppearAmount)) {
						eltdf.modules.header.isStickyVisible = false;
						stickyHeader.removeClass('header-appear').find('.eltdf-main-menu .second').removeClass('eltdf-drop-down-start');
					} else {
						eltdf.modules.header.isStickyVisible = true;
						stickyHeader.addClass('header-appear');
					}

					docYScroll1 = $(document).scrollTop();
				};
				headerAppear();

				$(window).scroll(function () {
					headerAppear();
				});

				break;

			// sticky header that will be shown when user scrolls both up and down
			case eltdf.body.hasClass('eltdf-sticky-header-on-scroll-down-up'):
				eltdf.modules.header.behaviour = 'eltdf-sticky-header-on-scroll-down-up';

				if (eltdfPerPageVars.vars.eltdfStickyScrollAmount !== 0) {
					eltdf.modules.header.stickyAppearAmount = eltdfPerPageVars.vars.eltdfStickyScrollAmount;
				} else {
					var menuHeight = eltdfGlobalVars.vars.eltdfMenuAreaHeight;

					eltdf.modules.header.stickyAppearAmount = eltdfGlobalVars.vars.eltdfStickyScrollAmount !== 0 ? eltdfGlobalVars.vars.eltdfStickyScrollAmount : eltdfGlobalVars.vars.eltdfTopBarHeight + eltdfGlobalVars.vars.eltdfLogoAreaHeight + menuHeight + revSliderHeight;
				}

				headerAppear = function () {
					if (eltdf.scroll < eltdf.modules.header.stickyAppearAmount) {
						eltdf.modules.header.isStickyVisible = false;
						stickyHeader.removeClass('header-appear').find('.eltdf-main-menu .second').removeClass('eltdf-drop-down-start');
					} else {
						eltdf.modules.header.isStickyVisible = true;
						stickyHeader.addClass('header-appear');
					}
				};

				headerAppear();

				$(window).scroll(function () {
					headerAppear();
				});

				break;

			// on scroll down, part of header will be sticky
			case eltdf.body.hasClass('eltdf-fixed-on-scroll'):
				eltdf.modules.header.behaviour = 'eltdf-fixed-on-scroll';
				var headerFixed = function () {

					if(eltdf.scroll <= headerMenuAreaOffset + eltdfGlobalVars.vars.eltdfAddForAdminBar) {
					   fixedHeaderWrapper.removeClass('fixed');
					   header.css('margin-bottom', '0');
					} else {
					   fixedHeaderWrapper.addClass('fixed');
					}

					if (eltdf.scroll > 0 && eltdf.scroll < eltdfGlobalVars.vars.eltdfTopBarHeight + eltdfGlobalVars.vars.eltdfAddForAdminBar) {
						$('.eltdf-top-bar').css('top', (-eltdf.scroll) + 'px');
						$('.eltdf-page-header .eltdf-fixed-wrapper').css('top', (eltdfGlobalVars.vars.eltdfTopBarHeight - eltdf.scroll) + 'px');
					} else if (eltdf.scroll >= eltdfGlobalVars.vars.eltdfTopBarHeight + eltdfGlobalVars.vars.eltdfAddForAdminBar) {
						$('.eltdf-top-bar').css('top', -eltdfGlobalVars.vars.eltdfTopBarHeight + 'px');
						$('.eltdf-page-header .eltdf-fixed-wrapper').css('top', '0px');
					} else {
						$('.eltdf-top-bar').css('top', '0px');
						$('.eltdf-page-header .eltdf-fixed-wrapper').css('top', (eltdfGlobalVars.vars.eltdfTopBarHeight + eltdfGlobalVars.vars.eltdfAddForAdminBar) + 'px');
					}

					if ((eltdfGlobalVars.vars.eltdfMenuAreaHeight - eltdfGlobalVars.vars.eltdfTopBarHeight - (eltdf.scroll - eltdfGlobalVars.vars.eltdfTopBarHeight) / 4 >= 60) && (eltdf.scroll >= eltdfGlobalVars.vars.eltdfTopBarHeight)) {
						$('.eltdf-header-standard .eltdf-page-header').css('height', eltdfGlobalVars.vars.eltdfMenuAreaHeight - eltdfGlobalVars.vars.eltdfTopBarHeight - (eltdf.scroll - eltdfGlobalVars.vars.eltdfTopBarHeight) / 4 + 'px');
						$('.eltdf-header-full-screen .eltdf-page-header').css('height', eltdfGlobalVars.vars.eltdfMenuAreaHeight - eltdfGlobalVars.vars.eltdfTopBarHeight - (eltdf.scroll - eltdfGlobalVars.vars.eltdfTopBarHeight) / 4 + 'px');
					} else if (eltdf.scroll < eltdfGlobalVars.vars.eltdfTopBarHeight) {
						$('.eltdf-header-standard .eltdf-page-header').css('height', eltdfGlobalVars.vars.eltdfMenuAreaHeight - eltdfGlobalVars.vars.eltdfTopBarHeight);
						$('.eltdf-header-full-screen .eltdf-page-header').css('height', eltdfGlobalVars.vars.eltdfMenuAreaHeight - eltdfGlobalVars.vars.eltdfTopBarHeight);
					} else if ((eltdfGlobalVars.vars.eltdfMenuAreaHeight - eltdfGlobalVars.vars.eltdfTopBarHeight - (eltdf.scroll - eltdfGlobalVars.vars.eltdfTopBarHeight) / 4) < 60) {
						$('.eltdf-header-standard .eltdf-page-header').css('height', '60px');
						$('.eltdf-header-full-screen .eltdf-page-header').css('height', '60px');
					}
				};

				headerFixed();

				$(window).scroll(function () {
					headerFixed();
				});

				break;
		}
	}

	/**
	 * Show/hide side area
	 */
	function eltdfSideArea() {

		var wrapper = $('.eltdf-wrapper'),
			sideMenuButtonOpen = $('a.eltdf-side-menu-button-opener'),
			cssClass = 'eltdf-right-side-menu-opened';

		wrapper.prepend('<div class="eltdf-cover"/>');

		$('a.eltdf-side-menu-button-opener, a.eltdf-close-side-menu').on('click',function (e) {
			e.preventDefault();

			if (!sideMenuButtonOpen.hasClass('opened')) {

				sideMenuButtonOpen.addClass('opened');
				eltdf.body.addClass(cssClass);

				$('.eltdf-wrapper .eltdf-cover').on('click',function () {
					eltdf.body.removeClass('eltdf-right-side-menu-opened');
					sideMenuButtonOpen.removeClass('opened');
				});

				var currentScroll = $(window).scrollTop();
				$(window).scroll(function () {
					if (Math.abs(eltdf.scroll - currentScroll) > 400) {
						eltdf.body.removeClass(cssClass);
						sideMenuButtonOpen.removeClass('opened');
					}
				});
			} else {
				sideMenuButtonOpen.removeClass('opened');
				eltdf.body.removeClass(cssClass);
			}
		});
	}

	/*
	 **  Smooth scroll functionality for Side Area
	 */
	function eltdfSideAreaScroll() {

		var sideMenu = $('.eltdf-side-menu');

		if (sideMenu.length) {
			sideMenu.niceScroll({
				scrollspeed: 60,
				mousescrollstep: 40,
				cursorwidth: 0,
				cursorborder: 0,
				cursorborderradius: 0,
				cursorcolor: "transparent",
				autohidemode: false,
				horizrailenabled: false
			});
		}
	}

	/**
	 * Init Fullscreen Menu
	 */
	function eltdfFullscreenMenu() {

		if ($('a.eltdf-fullscreen-menu-opener').length) {

			var popupMenuOpener = $('a.eltdf-fullscreen-menu-opener'),
				popupMenuHolderOuter = $(".eltdf-fullscreen-menu-holder-outer"),
				cssClass,
			//Flags for type of animation
				fadeRight = false,
				fadeTop = false,
			//Widgets
				widgetAboveNav = $('.eltdf-fullscreen-above-menu-widget-holder'),
				widgetBelowNav = $('.eltdf-fullscreen-below-menu-widget-holder'),
			//Menu
				menuItems = $('.eltdf-fullscreen-menu-holder-outer nav > ul > li > a'),
				menuItemWithChild = $('.eltdf-fullscreen-menu > ul li.has_sub > a'),
				menuItemWithoutChild = $('.eltdf-fullscreen-menu ul li:not(.has_sub) a');


			//set height of popup holder and initialize nicescroll
			popupMenuHolderOuter.height(eltdf.windowHeight).niceScroll({
				scrollspeed: 30,
				mousescrollstep: 20,
				cursorwidth: 0,
				cursorborder: 0,
				cursorborderradius: 0,
				cursorcolor: "transparent",
				autohidemode: false,
				horizrailenabled: false
			}); //200 is top and bottom padding of holder

			//set height of popup holder on resize
			$(window).resize(function () {
				popupMenuHolderOuter.height(eltdf.windowHeight);
			});

			if (eltdf.body.hasClass('eltdf-fade-push-text-right')) {
				cssClass = 'eltdf-push-nav-right';
				fadeRight = true;
			} else if (eltdf.body.hasClass('eltdf-fade-push-text-top')) {
				cssClass = 'eltdf-push-text-top';
				fadeTop = true;
			}

			//Appearing animation
			if (fadeRight || fadeTop) {
				if (widgetAboveNav.length) {
					widgetAboveNav.children().css({
						'-webkit-animation-delay': 0 + 'ms',
						'-moz-animation-delay': 0 + 'ms',
						'animation-delay': 0 + 'ms'
					});
				}
				menuItems.each(function (i) {
					$(this).css({
						'-webkit-animation-delay': (i + 1) * 70 + 'ms',
						'-moz-animation-delay': (i + 1) * 70 + 'ms',
						'animation-delay': (i + 1) * 70 + 'ms'
					});
				});
				if (widgetBelowNav.length) {
					widgetBelowNav.children().css({
						'-webkit-animation-delay': (menuItems.length + 1) * 70 + 'ms',
						'-moz-animation-delay': (menuItems.length + 1) * 70 + 'ms',
						'animation-delay': (menuItems.length + 1) * 70 + 'ms'
					});
				}
			}

			// Open popup menu
			popupMenuOpener.on('click', function (e) {
				e.preventDefault();

				if (!popupMenuOpener.hasClass('eltdf-fm-opened')) {
					popupMenuOpener.addClass('eltdf-fm-opened');
					eltdf.body.addClass('eltdf-fullscreen-menu-opened');
					eltdf.body.removeClass('eltdf-fullscreen-fade-out').addClass('eltdf-fullscreen-fade-in');
					eltdf.body.removeClass(cssClass);
					if (!eltdf.body.hasClass('page-template-full_screen-php')) {
						eltdf.modules.common.eltdfDisableScroll();
					}
					$(document).keyup(function (e) {
						if (e.keyCode == 27) {
							popupMenuOpener.removeClass('eltdf-fm-opened');
							eltdf.body.removeClass('eltdf-fullscreen-menu-opened');
							eltdf.body.removeClass('eltdf-fullscreen-fade-in').addClass('eltdf-fullscreen-fade-out');
							eltdf.body.addClass(cssClass);
							if (!eltdf.body.hasClass('page-template-full_screen-php')) {
								eltdf.modules.common.eltdfEnableScroll();
							}
							$("nav.eltdf-fullscreen-menu ul.sub_menu").slideUp(200, function () {
								$('nav.popup_menu').getNiceScroll().resize();
							});
						}
					});
				} else {
					popupMenuOpener.removeClass('eltdf-fm-opened');
					eltdf.body.removeClass('eltdf-fullscreen-menu-opened');
					eltdf.body.removeClass('eltdf-fullscreen-fade-in').addClass('eltdf-fullscreen-fade-out');
					eltdf.body.addClass(cssClass);
					if (!eltdf.body.hasClass('page-template-full_screen-php')) {
						eltdf.modules.common.eltdfEnableScroll();
					}
					$("nav.eltdf-fullscreen-menu ul.sub_menu").slideUp(200, function () {
						$('nav.popup_menu').getNiceScroll().resize();
					});
				}
			});

			//logic for open sub menus in popup menu
			menuItemWithChild.on('tap click', function (e) {
				e.preventDefault();

				if ($(this).parent().hasClass('has_sub')) {
					var submenu = $(this).parent().find('> ul.sub_menu');
					if (submenu.is(':visible')) {
						submenu.slideUp(450, 'easeInOutQuint', function () {
							popupMenuHolderOuter.getNiceScroll().resize();
						});
						$(this).parent().removeClass('open_sub');
					} else {
						$(this).parent().addClass('open_sub');
						$(this).parent().siblings().removeClass('open_sub').find('.sub_menu').slideUp(450, 'easeInOutQuint', function () {
							popupMenuHolderOuter.getNiceScroll().resize();
							submenu.slideDown(450, 'easeInOutQuint', function () {
								popupMenuHolderOuter.getNiceScroll().resize();
							});
						});
					}
				}
				return false;
			});

			//if link has no submenu and if it's not dead, than open that link
			menuItemWithoutChild.on('click',function (e) {

				if (($(this).attr('href') !== "http://#") && ($(this).attr('href') !== "#")) {

					if (e.which == 1) {
						popupMenuOpener.removeClass('eltdf-fm-opened');
						eltdf.body.removeClass('eltdf-fullscreen-menu-opened');
						eltdf.body.removeClass('eltdf-fullscreen-fade-in').addClass('eltdf-fullscreen-fade-out');
						eltdf.body.addClass(cssClass);
						$("nav.eltdf-fullscreen-menu ul.sub_menu").slideUp(200, function () {
							$('nav.popup_menu').getNiceScroll().resize();
						});
						eltdf.modules.common.eltdfEnableScroll();
					}
				} else {
					return false;
				}
			});
		}
	}

	function eltdfInitMobileNavigation() {
		var navigationOpener = $('.eltdf-mobile-header .eltdf-mobile-menu-opener');
		var navigationHolder = $('.eltdf-mobile-header .eltdf-mobile-nav');
		var dropdownOpener = $('.eltdf-mobile-nav .mobile_arrow, .eltdf-mobile-nav h5, .eltdf-mobile-nav a.eltdf-mobile-no-link');
		var animationSpeed = 200;

		//whole mobile menu opening / closing
		if (navigationOpener.length && navigationHolder.length) {
			navigationOpener.on('tap click', function (e) {
				e.stopPropagation();
				e.preventDefault();

				if (navigationHolder.is(':visible')) {
					navigationHolder.slideUp(animationSpeed);
				} else {
					navigationHolder.slideDown(animationSpeed);
				}
			});
		}

		//dropdown opening / closing
		if (dropdownOpener.length) {
			dropdownOpener.each(function () {
				$(this).on('tap click', function (e) {
					var dropdownToOpen = $(this).nextAll('ul').first();

					if (dropdownToOpen.length) {
						e.preventDefault();
						e.stopPropagation();

						var openerParent = $(this).parent('li');
						if (dropdownToOpen.is(':visible')) {
							dropdownToOpen.slideUp(animationSpeed);
							openerParent.removeClass('eltdf-opened');
						} else {
							dropdownToOpen.slideDown(animationSpeed);
							openerParent.addClass('eltdf-opened');
						}
					}

				});
			});
		}

		$('.eltdf-mobile-nav a, .eltdf-mobile-logo-wrapper a').on('click tap', function (e) {
			if ($(this).attr('href') !== 'http://#' && $(this).attr('href') !== '#') {
				navigationHolder.slideUp(animationSpeed);
			}
		});
	}

	function eltdfMobileHeaderBehavior() {
		if (eltdf.body.hasClass('eltdf-sticky-up-mobile-header')) {
			var stickyAppearAmount,
				mobileHeader = $('.eltdf-mobile-header'),
				adminBar = $('#wpadminbar'),
				mobileHeaderHeight = mobileHeader.length ? mobileHeader.height() : 0,
				sliderHeight = eltdf.body.hasClass('page-template-landing-page') && $('.eltdf-slider').length ? $('.eltdf-slider').outerHeight() : 0;

			var docYScroll1 = $(document).scrollTop();
			stickyAppearAmount = mobileHeaderHeight + eltdfGlobalVars.vars.eltdfAddForAdminBar + sliderHeight;

			$(window).scroll(function () {
				var docYScroll2 = $(document).scrollTop();

				if (docYScroll2 > stickyAppearAmount) {
					mobileHeader.addClass('eltdf-animate-mobile-header');
				} else {
					mobileHeader.removeClass('eltdf-animate-mobile-header');
				}

				if ((docYScroll2 > docYScroll1 && docYScroll2 > stickyAppearAmount) || (docYScroll2 < stickyAppearAmount)) {
					if (docYScroll2 >= '250') {
						mobileHeader.addClass('mobile-header-disappear');
					}
					mobileHeader.removeClass('mobile-header-appear');
					mobileHeader.css('margin-bottom', 0);

					if (adminBar.length) {
						mobileHeader.find('.eltdf-mobile-header-inner').css('top', 0);
					}
				} else {
					mobileHeader.removeClass('mobile-header-disappear');
					mobileHeader.addClass('mobile-header-appear');
					mobileHeader.css('margin-bottom', stickyAppearAmount - sliderHeight);
				}

				docYScroll1 = $(document).scrollTop();
			});
		}
	}

	/**
	 * Set dropdown position
	 */
	function eltdfSetDropDownMenuPosition() {

		var menuItems = $(".eltdf-drop-down > ul > li.narrow");
		menuItems.each(function (i) {

			var browserWidth = eltdf.windowWidth - 16; // 16 is width of scroll bar
			var menuItemPosition = $(this).offset().left;
			var dropdownMenuWidth = $(this).find('.second .inner ul').width();

			var menuItemFromLeft = 0;
			if (eltdf.body.hasClass('eltdf-boxed')) {
				menuItemFromLeft = eltdf.boxedLayoutWidth - (menuItemPosition - (browserWidth - eltdf.boxedLayoutWidth ) / 2);
			} else {
				menuItemFromLeft = browserWidth - menuItemPosition;
			}

			var dropDownMenuFromLeft; //has to stay undefined beacuse 'dropDownMenuFromLeft < dropdownMenuWidth' condition will be true

			if ($(this).find('li.sub').length > 0) {
				dropDownMenuFromLeft = menuItemFromLeft - dropdownMenuWidth;
			}

			if (menuItemFromLeft < dropdownMenuWidth || dropDownMenuFromLeft < dropdownMenuWidth) {
				$(this).find('.second').addClass('right');
				$(this).find('.second .inner ul').addClass('right');
			}
		});
	}

	function eltdfDropDownMenu() {

		var menu_items = $('.eltdf-drop-down > ul > li');

		menu_items.each(function (i) {
			if ($(menu_items[i]).find('.second').length > 0) {

				var dropdown = $(this).find('.inner > ul');
				var dropDownSecondDiv = $(menu_items[i]).find('.second');
				var dropdownWidth = dropdown.outerWidth();
				;

				if ($(menu_items[i]).hasClass('wide')) {

					if (!$(this).hasClass('left_position') && !$(this).hasClass('right_position')) {
						dropDownSecondDiv.css('left', 0);
					}

					//set columns to be same height - start
					var tallest = 0;
					$(this).find('.second > .inner > ul > li').each(function () {
						var thisHeight = $(this).height();
						if (thisHeight > tallest) {
							tallest = thisHeight;
						}
					});

					$(this).find('.second > .inner > ul > li').css("height", ""); // delete old inline css - via resize
					$(this).find('.second > .inner > ul > li').height(tallest);
					//set columns to be same height - end

					var left_position;

					if (!$(this).hasClass('left_position') && !$(this).hasClass('right_position')) {
						if (!eltdf.body.hasClass('eltdf-boxed')) {
							left_position = dropDownSecondDiv.offset().left;

							dropDownSecondDiv.css('left', -left_position);
							dropDownSecondDiv.css('width', eltdf.windowWidth);
						} else {

							left_position = (eltdf.windowWidth - 2 * (eltdf.windowWidth - dropdown.offset().left)) / 2 + dropdownWidth / 2;
							dropDownSecondDiv.css('left', -left_position);
						}
					}
				}

				if (!eltdf.menuDropdownHeightSet) {
					$(menu_items[i]).data('original_height', dropDownSecondDiv.height() + 'px');
					dropDownSecondDiv.height(0);
				}

				if (navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
					$(menu_items[i]).on("touchstart mouseenter", function () {
						dropDownSecondDiv.css({
							'height': $(menu_items[i]).data('original_height'),
							'overflow': 'visible',
							'visibility': 'visible',
							'opacity': '1'
						});
					}).on("mouseleave", function () {
						dropDownSecondDiv.css({
							'height': '0px',
							'overflow': 'hidden',
							'visibility': 'hidden',
							'opacity': '0'
						});
					});

				} else {
					if (eltdf.body.hasClass('eltdf-dropdown-animate-height')) {
						$(menu_items[i]).mouseenter(function () {
							dropDownSecondDiv.css({
								'visibility': 'visible',
								'height': '0px',
								'opacity': '0'
							});
							dropDownSecondDiv.stop().animate({
								'height': $(menu_items[i]).data('original_height'),
								opacity: 1
							}, 300, function () {
								dropDownSecondDiv.css('overflow', 'visible');
							});
						}).mouseleave(function () {
							dropDownSecondDiv.stop().animate({
								'height': '0px'
							}, 150, function () {
								dropDownSecondDiv.css({
									'overflow': 'hidden',
									'visibility': 'hidden'
								});
							});
						});
					} else {
						var config = {
							interval: 0,
							over: function () {
								setTimeout(function () {
									dropDownSecondDiv.addClass('eltdf-drop-down-start');
									dropDownSecondDiv.stop().css({'height': $(menu_items[i]).data('original_height')});
								}, 150);
							},
							timeout: 150,
							out: function () {
								dropDownSecondDiv.stop().css({'height': '0px'});
								dropDownSecondDiv.removeClass('eltdf-drop-down-start');
							}
						};
						$(menu_items[i]).hoverIntent(config);
					}
				}
			}
		});
		$('.eltdf-drop-down ul li.wide ul li a').on('click', function (e) {
			if (e.which == 1) {
				var $this = $(this);
				setTimeout(function () {
					$this.mouseleave();
				}, 500);
			}
		});

		eltdf.menuDropdownHeightSet = true;
	}

	/**
	 * Init Search Types
	 */
	function eltdfSearch() {
		var searchOpener = $('a.eltdf-search-opener'),
			searchClose,
			touch = false;

		if ($('html').hasClass('touch')) {
			touch = true;
		}

		if (searchOpener.length > 0) {
			//Check for type of search
			if (eltdf.body.hasClass('eltdf-fullscreen-search')) {
				var fullscreenSearchFade;

				searchClose = $('.eltdf-fullscreen-search-close');
				fullscreenSearchFade = true;
				eltdfFullscreenSearch(fullscreenSearchFade);
			}

			//Check for hover color of search
			searchOpener.each(function () {
				var thisSearchOpener = $(this);

				if (typeof thisSearchOpener.data('hover-color') !== 'undefined') {
					var changeSearchColor = function (event) {
						event.data.thisSearchOpener.css('color', event.data.color);
					};

					var originalColor = thisSearchOpener.css('color');
					var hoverColor = thisSearchOpener.data('hover-color');

					thisSearchOpener.on('mouseenter', {
						thisSearchOpener: thisSearchOpener,
						color: hoverColor
					}, changeSearchColor);
					thisSearchOpener.on('mouseleave', {
						thisSearchOpener: thisSearchOpener,
						color: originalColor
					}, changeSearchColor);
				}

			});
		}

		/**
		 * Fullscreen search fade
		 */
		function eltdfFullscreenSearch(fade) {

			var searchHolder = $('.eltdf-fullscreen-search-holder');

			searchOpener.on('click',function (e) {
				e.preventDefault();
				var samePosition = false,
					closeTop = 0,
					closeLeft = 0;
				if ($(this).data('icon-close-same-position') === 'yes') {
					closeTop = $(this).find('.eltdf-search-opener-wrapper').offset().top;
					closeLeft = $(this).offset().left;
					samePosition = true;
				}
				//Fullscreen search fade
				if (fade) {
					if (searchHolder.hasClass('eltdf-animate')) {
						eltdf.body.removeClass('eltdf-fullscreen-search-opened');
						eltdf.body.addClass('eltdf-search-fade-out');
						eltdf.body.removeClass('eltdf-search-fade-in');
						searchHolder.removeClass('eltdf-animate');
						setTimeout(function () {
							searchHolder.find('.eltdf-search-field').val('');
							searchHolder.find('.eltdf-search-field').blur();
						}, 300);
						if (!eltdf.body.hasClass('page-template-full_screen-php')) {
							eltdf.modules.common.eltdfEnableScroll();
						}
					} else {
						eltdf.body.addClass('eltdf-fullscreen-search-opened');
						setTimeout(function () {
							searchHolder.find('.eltdf-search-field').focus();
						}, 900);
						eltdf.body.removeClass('eltdf-search-fade-out');
						eltdf.body.addClass('eltdf-search-fade-in');
						searchHolder.addClass('eltdf-animate');
						if (samePosition) {
							searchClose.css({
								'top': closeTop - eltdf.scroll,
								'left': closeLeft
							});
						}
						if (!eltdf.body.hasClass('page-template-full_screen-php')) {
							eltdf.modules.common.eltdfDisableScroll();
						}
					}
					searchClose.on('click',function (e) {
						e.preventDefault();
						eltdf.body.removeClass('eltdf-fullscreen-search-opened');
						searchHolder.removeClass('eltdf-animate');
						setTimeout(function () {
							searchHolder.find('.eltdf-search-field').val('');
							searchHolder.find('.eltdf-search-field').blur();
						}, 300);
						eltdf.body.removeClass('eltdf-search-fade-in');
						eltdf.body.addClass('eltdf-search-fade-out');
						if (!eltdf.body.hasClass('page-template-full_screen-php')) {
							eltdf.modules.common.eltdfEnableScroll();
						}
					});

					//Close on click away
					$(document).mouseup(function (e) {
						var container = $(".eltdf-form-holder-inner");
						if (!container.is(e.target) && container.has(e.target).length === 0) {
							e.preventDefault();
							eltdf.body.removeClass('eltdf-fullscreen-search-opened');
							searchHolder.removeClass('eltdf-animate');
							setTimeout(function () {
								searchHolder.find('.eltdf-search-field').val('');
								searchHolder.find('.eltdf-search-field').blur();
							}, 300);
							eltdf.body.removeClass('eltdf-search-fade-in');
							eltdf.body.addClass('eltdf-search-fade-out');
							if (!eltdf.body.hasClass('page-template-full_screen-php')) {
								eltdf.modules.common.eltdfEnableScroll();
							}
						}
					});

					//Close on escape
					$(document).keyup(function (e) {
						if (e.keyCode == 27) { //KeyCode for ESC button is 27
							eltdf.body.removeClass('eltdf-fullscreen-search-opened');
							searchHolder.removeClass('eltdf-animate');
							setTimeout(function () {
								searchHolder.find('.eltdf-search-field').val('');
								searchHolder.find('.eltdf-search-field').blur();
							}, 300);
							eltdf.body.removeClass('eltdf-search-fade-in');
							eltdf.body.addClass('eltdf-search-fade-out');
							if (!eltdf.body.hasClass('page-template-full_screen-php')) {
								eltdf.modules.common.eltdfEnableScroll();
							}
						}
					});
				}
			});

			//Text input focus change
			$('.eltdf-fullscreen-search-holder .eltdf-search-field').focus(function () {
				$('.eltdf-fullscreen-search-holder .eltdf-field-holder .eltdf-line').css("width", "100%");
			});

			$('.eltdf-fullscreen-search-holder .eltdf-search-field').blur(function () {
				$('.eltdf-fullscreen-search-holder .eltdf-field-holder .eltdf-line').css("width", "0");
			});
		}
	}

	/**
	 * Function object that represents vertical menu area.
	 * @returns {{init: Function}}
	 */
	var eltdfVerticalMenu = function () {
		/**
		 * Main vertical area object that used through out function
		 * @type {jQuery object}
		 */
		var verticalMenuObject = $('.eltdf-vertical-menu-area');

		/**
		 * Resizes vertical area. Called whenever height of navigation area changes
		 * It first check if vertical area is scrollable, and if it is resizes scrollable area
		 */
		var resizeVerticalArea = function () {
			if (verticalAreaScrollable()) {
				verticalMenuObject.getNiceScroll().resize();
			}
		};

		/**
		 * Checks if vertical area is scrollable (if it has eltdf-with-scroll class)
		 *
		 * @returns {bool}
		 */
		var verticalAreaScrollable = function () {
			return verticalMenuObject.hasClass('.eltdf-with-scroll');
		};

		/**
		 * Initialzes navigation functionality. It checks navigation type data attribute and calls proper functions
		 */
		var initNavigation = function () {
			var verticalNavObject = verticalMenuObject.find('.eltdf-vertical-menu');

			dropdownClickToggle();

			/**
			 * Initializes click toggle navigation type. Works the same for touch and no-touch devices
			 */
			function dropdownClickToggle() {
				var menuItems = verticalNavObject.find('ul li.menu-item-has-children');

				menuItems.each(function () {
					var elementToExpand = $(this).find(' > .second, > ul');
					var menuItem = this;
					var dropdownOpener = $(this).find('> a');
					var slideUpSpeed = 'fast';
					var slideDownSpeed = 'slow';

					dropdownOpener.on('click tap', function (e) {
						e.preventDefault();
						e.stopPropagation();

						if (elementToExpand.is(':visible')) {
							$(menuItem).removeClass('open');
							elementToExpand.slideUp(slideUpSpeed, function () {
								resizeVerticalArea();
							});
						} else if (dropdownOpener.parent().parent().children().hasClass('open') && dropdownOpener.parent().parent().parent().hasClass('eltdf-vertical-menu')) {
							$(this).parent().parent().children().removeClass('open');
							$(this).parent().parent().children().find(' > .second').slideUp(slideUpSpeed);

							$(menuItem).addClass('open');
							elementToExpand.slideDown(slideDownSpeed, function () {
								resizeVerticalArea();
							});
						} else {

							if (!$(this).parents('li').hasClass('open')) {
								menuItems.removeClass('open');
								menuItems.find(' > .second, > ul').slideUp(slideUpSpeed);
							}

							if ($(this).parent().parent().children().hasClass('open')) {
								$(this).parent().parent().children().removeClass('open');
								$(this).parent().parent().children().find(' > .second, > ul').slideUp(slideUpSpeed);
							}

							$(menuItem).addClass('open');
							elementToExpand.slideDown(slideDownSpeed, function () {
								resizeVerticalArea();
							});
						}
					});
				});
			}
		};

		/**
		 * Initializes scrolling in vertical area. It checks if vertical area is scrollable before doing so
		 */
		var initVerticalAreaScroll = function () {
			if (verticalAreaScrollable()) {
				verticalMenuObject.niceScroll({
					scrollspeed: 60,
					mousescrollstep: 40,
					cursorwidth: 0,
					cursorborder: 0,
					cursorborderradius: 0,
					cursorcolor: "transparent",
					autohidemode: false,
					horizrailenabled: false
				});
			}
		};

		return {
			/**
			 * Calls all necessary functionality for vertical menu area if vertical area object is valid
			 */
			init: function () {
				if (verticalMenuObject.length) {
					initNavigation();
					initVerticalAreaScroll();
				}
			}
		};
	};

})(jQuery);
(function($) {
    "use strict";

    var title = {};
    eltdf.modules.title = title;

    title.eltdfParallaxTitle = eltdfParallaxTitle;

    title.eltdfOnDocumentReady = eltdfOnDocumentReady;
    title.eltdfOnWindowLoad = eltdfOnWindowLoad;
    title.eltdfOnWindowResize = eltdfOnWindowResize;
    title.eltdfOnWindowScroll = eltdfOnWindowScroll;

    $(document).ready(eltdfOnDocumentReady);
    $(window).load(eltdfOnWindowLoad);
    $(window).resize(eltdfOnWindowResize);
    $(window).scroll(eltdfOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function eltdfOnDocumentReady() {
        eltdfParallaxTitle();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function eltdfOnWindowLoad() {
    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function eltdfOnWindowResize() {
    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function eltdfOnWindowScroll() {

    }

    /*
     **	Title image with parallax effect
     */
    function eltdfParallaxTitle(){
        if($('.eltdf-title.eltdf-has-parallax-background').length > 0 && $('.touch').length === 0){

            var parallaxBackground = $('.eltdf-title.eltdf-has-parallax-background');
            var parallaxBackgroundWithZoomOut = $('.eltdf-title.eltdf-has-parallax-background.eltdf-zoom-out');

            var backgroundSizeWidth = parseInt(parallaxBackground.data('background-width').match(/\d+/));
            var titleHolderHeight = parallaxBackground.data('height');
            var titleRate = (titleHolderHeight / 10000) * 7;
            var titleYPos = -(eltdf.scroll * titleRate);

            //set position of background on doc ready
            parallaxBackground.css({'background-position': 'center '+ (titleYPos+eltdfGlobalVars.vars.eltdfAddForAdminBar) +'px' });
            parallaxBackgroundWithZoomOut.css({'background-size': backgroundSizeWidth-eltdf.scroll + 'px auto'});

            //set position of background on window scroll
            $(window).scroll(function() {
                titleYPos = -(eltdf.scroll * titleRate);
                parallaxBackground.css({'background-position': 'center ' + (titleYPos+eltdfGlobalVars.vars.eltdfAddForAdminBar) + 'px' });
                parallaxBackgroundWithZoomOut.css({'background-size': backgroundSizeWidth-eltdf.scroll + 'px auto'});
            });
        }
    }

})(jQuery);

(function ($) {
	'use strict';

	var shortcodes = {};

	eltdf.modules.shortcodes = shortcodes;

	shortcodes.eltdfOnDocumentReady = eltdfOnDocumentReady;
	shortcodes.eltdfOnWindowLoad = eltdfOnWindowLoad;
	shortcodes.eltdfOnWindowResize = eltdfOnWindowResize;
	shortcodes.eltdfOnWindowScroll = eltdfOnWindowScroll;
	shortcodes.eltdfInitPortfolioFilterTop = eltdfInitPortfolioFilterTop;
	shortcodes.eltdfInitPortfolioFilterLeft = eltdfInitPortfolioFilterLeft;

	$(document).ready(eltdfOnDocumentReady);
	$(window).load(eltdfOnWindowLoad);
	$(window).resize(eltdfOnWindowResize);
	$(window).scroll(eltdfOnWindowScroll);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfInitAccordions();
		eltdfInitAnimationHolder();
		eltdfButton().init();
		eltdfInitClientsCarousel();
		eltdfInitCountdown();
		eltdfInitCounter();
		eltdfInitElementsHolderResponsiveStyle();
		eltdfShowGoogleMap();
		eltdfIcon().init();
		eltdfInitIconList().init();
		eltdfInitImageGallery();
		eltdfInitItemShowcase();
		eltdfInitMasonryGallery();
		eltdfInitMessageBox();
		eltdfInitPieChart();
		eltdfInitProgressBars();
		eltdfIconWidget().init();
		eltdfSocialIconWidget().init();
		eltdfInitTabs();
		eltdfInitTestimonials();
		eltdfInstagramCarousel();
		eltdfTwitterSlider();
		eltdfInitPortfolioFilterLeft();
		eltdfInitPortfolioFilterTop();
	}

	/*
	 All functions to be called on $(window).load() should be in this function
	 */
	function eltdfOnWindowLoad() {
		eltdfStickySidebarWidget().init();
		eltdfInitParallax();
		eltdfInitElementsHolderResponsiveStyle();
	}

	/*
	 All functions to be called on $(window).resize() should be in this function
	 */
	function eltdfOnWindowResize() {
	}

	/*
	 All functions to be called on $(window).scroll() should be in this function
	 */
	function eltdfOnWindowScroll() {
	}

	/**
	 * Init accordions shortcode
	 */
	function eltdfInitAccordions() {
		var accordion = $('.eltdf-accordion-holder');
		if (accordion.length) {
			accordion.each(function () {

				var thisAccordion = $(this);

				if (thisAccordion.hasClass('eltdf-accordion')) {

					thisAccordion.accordion({
						animate: "swing",
						collapsible: true,
						active: 0,
						icons: "",
						heightStyle: "content"
					});
				}

				if (thisAccordion.hasClass('eltdf-toggle')) {

					var toggleAccordion = $(this);
					var toggleAccordionTitle = toggleAccordion.find('.eltdf-title-holder');
					var toggleAccordionContent = toggleAccordionTitle.next();

					toggleAccordion.addClass("accordion ui-accordion ui-accordion-icons ui-widget ui-helper-reset");
					toggleAccordionTitle.addClass("ui-accordion-header ui-state-default ui-corner-top ui-corner-bottom");
					toggleAccordionContent.addClass("ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom").hide();

					toggleAccordionTitle.each(function () {
						var thisTitle = $(this);
						thisTitle.on('mouseenter mouseleave',function () {
							thisTitle.toggleClass("ui-state-hover");
						});

						thisTitle.on('click', function () {
							thisTitle.toggleClass('ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom');
							thisTitle.next().toggleClass('ui-accordion-content-active').slideToggle(400);
						});
					});
				}
			});
		}
	}

	/*
	 **	Elements Holder responsive style
	 */
	function eltdfInitElementsHolderResponsiveStyle() {

		var elementsHolder = $('.eltdf-elements-holder');

		if (elementsHolder.length) {
			elementsHolder.each(function () {
				var thisElementsHolder = $(this),
					elementsHolderItem = thisElementsHolder.children('.eltdf-elements-holder-item'),
					style = '',
					responsiveStyle = '';

				elementsHolderItem.each(function () {
					var thisItem = $(this),
						itemClass = '',
						largeLaptop = '',
						smallLaptop = '',
						ipadLandscape = '',
						ipadPortrait = '',
						mobileLandscape = '',
						mobilePortrait = '';


					if (typeof thisItem.data('item-class') !== 'undefined' && thisItem.data('item-class') !== false) {
						itemClass = thisItem.data('item-class');
					}
					if (typeof thisItem.data('1280-1440') !== 'undefined' && thisItem.data('1280-1440') !== false) {
						largeLaptop = thisItem.data('1280-1440');
					}
					if (typeof thisItem.data('1024-1280') !== 'undefined' && thisItem.data('1024-1280') !== false) {
						smallLaptop = thisItem.data('1024-1280');
					}
					if (typeof thisItem.data('768-1024') !== 'undefined' && thisItem.data('768-1024') !== false) {
						ipadLandscape = thisItem.data('768-1024');
					}
					if (typeof thisItem.data('600-768') !== 'undefined' && thisItem.data('600-768') !== false) {
						ipadPortrait = thisItem.data('600-768');
					}
					if (typeof thisItem.data('480-600') !== 'undefined' && thisItem.data('480-600') !== false) {
						mobileLandscape = thisItem.data('480-600');
					}
					if (typeof thisItem.data('480') !== 'undefined' && thisItem.data('480') !== false) {
						mobilePortrait = thisItem.data('480');
					}

					if (largeLaptop.length || smallLaptop.length || ipadLandscape.length || ipadPortrait.length || mobileLandscape.length || mobilePortrait.length) {

						if (largeLaptop.length) {
							responsiveStyle += "@media only screen and (min-width: 1280px) and (max-width: 1440px) {.eltdf-elements-holder-item-content." + itemClass + " { padding: " + largeLaptop + " !important; } }";
						}
						if (smallLaptop.length) {
							responsiveStyle += "@media only screen and (min-width: 1024px) and (max-width: 1280px) {.eltdf-elements-holder-item-content." + itemClass + " { padding: " + smallLaptop + " !important; } }";
						}
						if (ipadLandscape.length) {
							responsiveStyle += "@media only screen and (min-width: 768px) and (max-width: 1024px) {.eltdf-elements-holder-item-content." + itemClass + " { padding: " + ipadLandscape + " !important; } }";
						}
						if (ipadPortrait.length) {
							responsiveStyle += "@media only screen and (min-width: 600px) and (max-width: 768px) {.eltdf-elements-holder-item-content." + itemClass + " { padding: " + ipadPortrait + " !important; } }";
						}
						if (mobileLandscape.length) {
							responsiveStyle += "@media only screen and (min-width: 480px) and (max-width: 600px) {.eltdf-elements-holder-item-content." + itemClass + " { padding: " + mobileLandscape + " !important; } }";
						}
						if (mobilePortrait.length) {
							responsiveStyle += "@media only screen and (max-width: 480px) {.eltdf-elements-holder-item-content." + itemClass + " { padding: " + mobilePortrait + " !important; } }";
						}
					}
				});

				if (responsiveStyle.length) {
					style = '<style type="text/css" data-type="connect_mikado_modules_shortcodes_eh_custom_css">' + responsiveStyle + '</style>';
				}

				if (style.length) {
					$('head').append(style);
				}
			});
		}
	}

	/*
	 *	Init animation holder shortcode
	 */
	function eltdfInitAnimationHolder() {

		var touchClass = $('.eltdf-no-animations-on-touch'),
			noAnimationsOnTouch = true,
			elements = $('.eltdf-fade-in-down, .eltdf-element-from-fade, .eltdf-element-from-left, .eltdf-element-from-right, .eltdf-element-from-top, .eltdf-element-from-bottom, .eltdf-flip-in, .eltdf-x-rotate, .eltdf-z-rotate, .eltdf-y-translate, .eltdf-fade-in, .eltdf-fade-in-left-x-rotate'),
			animationClass,
			animationData,
			animationDelay;

		if (touchClass.length) {
			noAnimationsOnTouch = false;
		}

		if (elements.length > 0 && noAnimationsOnTouch) {
			elements.each(function () {
				var thisElement = $(this);

				thisElement.appear(function () {
					animationData = thisElement.data('animation');
					animationDelay = parseInt(thisElement.data('animation-delay'));

					if (typeof animationData !== 'undefined' && animationData !== '') {
						animationClass = animationData;
						var newClass = animationClass + '-on';

						setTimeout(function () {
							thisElement.addClass(newClass);
						}, animationDelay);
					}
				}, {accX: 0, accY: eltdfGlobalVars.vars.eltdfElementAppearAmount});
			});
		}
	}

	/**
	 * Button object that initializes whole button functionality
	 * @type {Function}
	 */
	var eltdfButton = eltdf.modules.shortcodes.eltdfButton = function () {
		//all buttons on the page
		var buttons = $('.eltdf-btn');

		/**
		 * Initializes button hover color
		 * @param button current button
		 */
		var buttonHoverColor = function (button) {
			if (typeof button.data('hover-color') !== 'undefined') {
				var changeButtonColor = function (event) {
					event.data.button.css('color', event.data.color);
				};

				var originalColor = button.css('color');
				var hoverColor = button.data('hover-color');

				button.on('mouseenter', {button: button, color: hoverColor}, changeButtonColor);
				button.on('mouseleave', {button: button, color: originalColor}, changeButtonColor);
			}
		};

		/**
		 * Initializes button hover background color
		 * @param button current button
		 */
		var buttonHoverBgColor = function (button) {
			if (typeof button.data('hover-bg-color') !== 'undefined') {
				var changeButtonBg = function (event) {
					event.data.button.css('background-color', event.data.color);
				};

				var originalBgColor = button.css('background-color');
				var hoverBgColor = button.data('hover-bg-color');

				button.on('mouseenter', {button: button, color: hoverBgColor}, changeButtonBg);
				button.on('mouseleave', {button: button, color: originalBgColor}, changeButtonBg);
			}
		};

		/**
		 * Initializes button border color
		 * @param button
		 */
		var buttonHoverBorderColor = function (button) {
			if (typeof button.data('hover-border-color') !== 'undefined') {
				var changeBorderColor = function (event) {
					event.data.button.css('border-color', event.data.color);
				};

				var originalBorderColor = button.css('border-left-color'); //take one of the four sides
				var hoverBorderColor = button.data('hover-border-color');

				button.on('mouseenter', {button: button, color: hoverBorderColor}, changeBorderColor);
				button.on('mouseleave', {button: button, color: originalBorderColor}, changeBorderColor);
			}
		};

		return {
			init: function () {
				if (buttons.length) {
					buttons.each(function () {
						buttonHoverColor($(this));
						buttonHoverBgColor($(this));
						buttonHoverBorderColor($(this));
					});
				}
			}
		};
	};

	/**
	 * Init clients carousel shortcode
	 */
	function eltdfInitClientsCarousel() {

		var carouselHolder = $('.eltdf-clients-carousel-holder');

		if (carouselHolder.length) {
			carouselHolder.each(function () {

				var thisCarouselHolder = $(this),
					thisCarousel = thisCarouselHolder.children('.eltdf-cc-inner'),
					numberOfItems = 4,
					autoplay = thisCarouselHolder.data('autoplay') === 'yes' ? true : false,
					autoplayTimeout = 5000,
					loop = true,
					speed = 650;

				if (typeof thisCarouselHolder.data('number-of-items') !== 'undefined' && thisCarouselHolder.data('number-of-items') !== false) {
					numberOfItems = parseInt(thisCarouselHolder.data('number-of-items'));
				}

				if (typeof thisCarouselHolder.data('autoplay-timeout') !== 'undefined' && thisCarouselHolder.data('autoplay-timeout') !== false) {
					autoplayTimeout = thisCarouselHolder.data('autoplay-timeout');
				}

				if (typeof thisCarouselHolder.data('loop') !== 'undefined' && thisCarouselHolder.data('loop') !== false) {
					loop = thisCarouselHolder.data('loop');
				}

				if (typeof thisCarouselHolder.data('speed') !== 'undefined' && thisCarouselHolder.data('speed') !== false) {
					speed = thisCarouselHolder.data('speed');
				}

				if (numberOfItems === 1) {
					autoplay = false;
					loop = false;
				}

				var responsiveNumberOfItems1 = 1,
					responsiveNumberOfItems2 = 2,
					responsiveNumberOfItems3 = 3;

				if (numberOfItems < 3) {
					responsiveNumberOfItems1 = numberOfItems;
					responsiveNumberOfItems2 = numberOfItems;
					responsiveNumberOfItems3 = numberOfItems;
				}

				thisCarousel.owlCarousel({
					items: numberOfItems,
					autoplay: autoplay,
					autoplayTimeout: autoplayTimeout,
					loop: loop,
					smartSpeed: speed,
					nav: false,
					dots: false,
					responsive: {
						0: {
							items: responsiveNumberOfItems1,
						},
						600: {
							items: responsiveNumberOfItems2
						},
						768: {
							items: responsiveNumberOfItems3,
						},
						1024: {
							items: numberOfItems
						}
					}
				});

				thisCarousel.css({'visibility': 'visible'});
			});
		}
	}

	/**
	 * Countdown Shortcode
	 */
	function eltdfInitCountdown() {

		var countdowns = $('.eltdf-countdown'),
			year,
			month,
			day,
			hour,
			minute,
			timezone,
			monthLabel,
			dayLabel,
			hourLabel,
			minuteLabel,
			secondLabel;

		if (countdowns.length) {
			countdowns.each(function () {
				//Find countdown elements by id-s
				var countdownId = $(this).attr('id'),
					countdown = $('#' + countdownId),
					digitFontSize,
					labelFontSize;

				//Get data for countdown
				year = countdown.data('year');
				month = countdown.data('month');
				day = countdown.data('day');
				hour = countdown.data('hour');
				minute = countdown.data('minute');
				timezone = countdown.data('timezone');
				monthLabel = countdown.data('month-label');
				dayLabel = countdown.data('day-label');
				hourLabel = countdown.data('hour-label');
				minuteLabel = countdown.data('minute-label');
				secondLabel = countdown.data('second-label');
				digitFontSize = countdown.data('digit-size');
				labelFontSize = countdown.data('label-size');

				//Initialize countdown
				countdown.countdown({
					until: new Date(year, month - 1, day, hour, minute, 44),
					labels: ['Years', monthLabel, 'Weeks', dayLabel, hourLabel, minuteLabel, secondLabel],
					format: 'ODHMS',
					timezone: timezone,
					padZeroes: true,
					onTick: setCountdownStyle
				});

				function setCountdownStyle() {
					countdown.find('.countdown-amount').css({
						'font-size': digitFontSize + 'px',
						'line-height': digitFontSize + 'px'
					});
					countdown.find('.countdown-period').css({
						'font-size': labelFontSize + 'px'
					});
				}
			});
		}
	}

	/**
	 * Counter Shortcode
	 */
	function eltdfInitCounter() {
		var counterHolder = $('.eltdf-counter-holder');

		if (counterHolder.length) {
			counterHolder.each(function () {
				var thisCounterHolder = $(this),
					thisCounter = thisCounterHolder.find('.eltdf-counter');

				thisCounterHolder.appear(function () {
					thisCounterHolder.css('opacity', '1');

					//Counter zero type
					if (thisCounter.hasClass('eltdf-zero-counter')) {
						var max = parseFloat(thisCounter.text());
						thisCounter.countTo({
							from: 0,
							to: max,
							speed: 1500,
							refreshInterval: 100
						});
					} else {
						thisCounter.absoluteCounter({
							speed: 2000,
							fadeInDelay: 1000
						});
					}
				}, {accX: 0, accY: eltdfGlobalVars.vars.eltdfElementAppearAmount});
			});
		}
	}

	/**
	 * Initializes portfolio filter with subfilters
	 */
	function eltdfInitPortfolioFilterTop() {
		var thisFilterHolder = $('.eltdf-portfolio-filter-holder.eltdf-portfolio-filter-top');
		thisFilterHolder.each(function () {
			var filter = $(this);
			var parentCategories = filter.find('.parent-filter');
			var children = filter.find('.eltdf-portfolio-filter-child-categories');

			parentCategories.on('click',function () {
				var activeParent = $(this);
				parentCategories.each(function () {
					$(this).removeClass('active');
				});
				activeParent.addClass('active');

				var parentId = activeParent.data('group-id');

				children.each(function () {
					if (parentId == -1) {
						$(this).fadeOut();
					}
					else if ($(this).data('parent-id') == parentId) {
						$(this).fadeIn();
					}
					else {
						$(this).fadeOut();
					}
				});
			});
		});
	}

	/**
	 * Initializes portfolio filter with subfilters
	 */
	function eltdfInitPortfolioFilterLeft() {
		var thisFilterHolder = $('.eltdf-portfolio-filter-holder.eltdf-portfolio-filter-left');
		thisFilterHolder.each(function () {
			var filter = $(this);
			var parentCategories = filter.find('.parent-filter');
			var children = filter.find('.eltdf-portfolio-filter-child-categories');

			parentCategories.on('click',function () {
				var activeParent = $(this);
				parentCategories.each(function () {
					$(this).removeClass('active');
				});
				activeParent.addClass('active');

				var parentId = activeParent.data('group-id');

				children.each(function () {
					if (parentId == -1) {
						$(this).slideUp();
					}
					else if ($(this).data('parent-id') == parentId) {
						$(this).slideDown();
					}
					else {
						$(this).slideUp();
					}
				});
			});
		});
	}

	/*
	 **	Elements Holder responsive style
	 */
	/*
	 **	Elements Holder responsive style
	 */
	function eltdfInitElementsHolderResponsiveStyle() {

		var elementsHolder = $('.eltdf-elements-holder');

		if (elementsHolder.length) {
			elementsHolder.each(function () {
				var thisElementsHolder = $(this),
					elementsHolderItem = thisElementsHolder.children('.eltdf-elements-holder-item'),
					style = '',
					responsiveStyle = '';

				elementsHolderItem.each(function () {
					var thisItem = $(this),
						itemClass = '',
						largeLaptop = '',
						smallLaptop = '',
						ipadLandscape = '',
						ipadPortrait = '',
						mobileLandscape = '',
						mobilePortrait = '';


					if (typeof thisItem.data('item-class') !== 'undefined' && thisItem.data('item-class') !== false) {
						itemClass = thisItem.data('item-class');
					}
					if (typeof thisItem.data('1280-1440') !== 'undefined' && thisItem.data('1280-1440') !== false) {
						largeLaptop = thisItem.data('1280-1440');
					}
					if (typeof thisItem.data('1024-1280') !== 'undefined' && thisItem.data('1024-1280') !== false) {
						smallLaptop = thisItem.data('1024-1280');
					}
					if (typeof thisItem.data('768-1024') !== 'undefined' && thisItem.data('768-1024') !== false) {
						ipadLandscape = thisItem.data('768-1024');
					}
					if (typeof thisItem.data('600-768') !== 'undefined' && thisItem.data('600-768') !== false) {
						ipadPortrait = thisItem.data('600-768');
					}
					if (typeof thisItem.data('480-600') !== 'undefined' && thisItem.data('480-600') !== false) {
						mobileLandscape = thisItem.data('480-600');
					}
					if (typeof thisItem.data('480') !== 'undefined' && thisItem.data('480') !== false) {
						mobilePortrait = thisItem.data('480');
					}

					if (largeLaptop.length || smallLaptop.length || ipadLandscape.length || ipadPortrait.length || mobileLandscape.length || mobilePortrait.length) {

						if (largeLaptop.length) {
							responsiveStyle += "@media only screen and (min-width: 1280px) and (max-width: 1600px) {.eltdf-elements-holder-item-content." + itemClass + " { padding: " + largeLaptop + " !important; } }";
						}
						if (smallLaptop.length) {
							responsiveStyle += "@media only screen and (min-width: 1024px) and (max-width: 1280px) {.eltdf-elements-holder-item-content." + itemClass + " { padding: " + smallLaptop + " !important; } }";
						}
						if (ipadLandscape.length) {
							responsiveStyle += "@media only screen and (min-width: 768px) and (max-width: 1024px) {.eltdf-elements-holder-item-content." + itemClass + " { padding: " + ipadLandscape + " !important; } }";
						}
						if (ipadPortrait.length) {
							responsiveStyle += "@media only screen and (min-width: 600px) and (max-width: 768px) {.eltdf-elements-holder-item-content." + itemClass + " { padding: " + ipadPortrait + " !important; } }";
						}
						if (mobileLandscape.length) {
							responsiveStyle += "@media only screen and (min-width: 480px) and (max-width: 600px) {.eltdf-elements-holder-item-content." + itemClass + " { padding: " + mobileLandscape + " !important; } }";
						}
						if (mobilePortrait.length) {
							responsiveStyle += "@media only screen and (max-width: 480px) {.eltdf-elements-holder-item-content." + itemClass + " { padding: " + mobilePortrait + " !important; } }";
						}
					}
				});

				if (responsiveStyle.length) {
					style = '<style type="text/css" data-type="fleur_mikado_modules_shortcodes_eh_custom_css">' + responsiveStyle + '</style>';
				}

				if (style.length) {
					$('head').append(style);
				}
			});
		}
	}

	/*
	 **	Show Google Map
	 */
	function eltdfShowGoogleMap() {
		var googleMap = $('.eltdf-google-map');

		if (googleMap.length) {
			googleMap.each(function () {
				var element = $(this);

				var customMapStyle;
				if (typeof element.data('custom-map-style') !== 'undefined') {
					customMapStyle = element.data('custom-map-style');
				}

				var colorOverlay;
				if (typeof element.data('color-overlay') !== 'undefined' && element.data('color-overlay') !== false) {
					colorOverlay = element.data('color-overlay');
				}

				var saturation;
				if (typeof element.data('saturation') !== 'undefined' && element.data('saturation') !== false) {
					saturation = element.data('saturation');
				}

				var lightness;
				if (typeof element.data('lightness') !== 'undefined' && element.data('lightness') !== false) {
					lightness = element.data('lightness');
				}

				var zoom;
				if (typeof element.data('zoom') !== 'undefined' && element.data('zoom') !== false) {
					zoom = element.data('zoom');
				}

				var pin;
				if (typeof element.data('pin') !== 'undefined' && element.data('pin') !== false) {
					pin = element.data('pin');
				}

				var mapHeight;
				if (typeof element.data('height') !== 'undefined' && element.data('height') !== false) {
					mapHeight = element.data('height');
				}

				var uniqueId;
				if (typeof element.data('unique-id') !== 'undefined' && element.data('unique-id') !== false) {
					uniqueId = element.data('unique-id');
				}

				var scrollWheel;
				if (typeof element.data('scroll-wheel') !== 'undefined') {
					scrollWheel = element.data('scroll-wheel');
				}
				var addresses;
				if (typeof element.data('addresses') !== 'undefined' && element.data('addresses') !== false) {
					addresses = element.data('addresses');
				}

				var map = "map_" + uniqueId;
				var geocoder = "geocoder_" + uniqueId;
				var holderId = "eltdf-map-" + uniqueId;

				eltdfInitializeGoogleMap(customMapStyle, colorOverlay, saturation, lightness, scrollWheel, zoom, holderId, mapHeight, pin, map, geocoder, addresses);
			});
		}
	}

	/*
	 **	Init Google Map
	 */
	function eltdfInitializeGoogleMap(customMapStyle, color, saturation, lightness, wheel, zoom, holderId, height, pin, map, geocoder, data) {
		var mapStyles = [
			{
				stylers: [
					{hue: color},
					{saturation: saturation},
					{lightness: lightness},
					{gamma: 1}
				]
			}
		];

		var googleMapStyleId;

		if (customMapStyle === 'yes') {
			googleMapStyleId = 'eltdf-style';
		} else {
			googleMapStyleId = google.maps.MapTypeId.ROADMAP;
		}

		if (wheel === 'yes') {
			wheel = true;
		} else {
			wheel = false;
		}

		var qoogleMapType = new google.maps.StyledMapType(mapStyles,
			{name: "Elated Google Map"});

		geocoder = new google.maps.Geocoder();
		var latlng = new google.maps.LatLng(-34.397, 150.644);

		if (!isNaN(height)) {
			height = height + 'px';
		}

		var myOptions = {
			zoom: zoom,
			scrollwheel: wheel,
			center: latlng,
			zoomControl: true,
			zoomControlOptions: {
				style: google.maps.ZoomControlStyle.SMALL,
				position: google.maps.ControlPosition.RIGHT_CENTER
			},
			scaleControl: false,
			scaleControlOptions: {
				position: google.maps.ControlPosition.LEFT_CENTER
			},
			streetViewControl: false,
			streetViewControlOptions: {
				position: google.maps.ControlPosition.LEFT_CENTER
			},
			panControl: false,
			panControlOptions: {
				position: google.maps.ControlPosition.LEFT_CENTER
			},
			mapTypeControl: false,
			mapTypeControlOptions: {
				mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'eltdf-style'],
				style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
				position: google.maps.ControlPosition.LEFT_CENTER
			},
			mapTypeId: googleMapStyleId
		};

		map = new google.maps.Map(document.getElementById(holderId), myOptions);
		map.mapTypes.set('eltdf-style', qoogleMapType);

		var index;

		for (index = 0; index < data.length; ++index) {
			eltdfInitializeGoogleAddress(data[index], pin, map, geocoder);
		}

		var holderElement = document.getElementById(holderId);
		holderElement.style.height = height;
	}

	/*
	 **	Init Google Map Addresses
	 */
	function eltdfInitializeGoogleAddress(data, pin, map, geocoder) {
		if (data === '') {
			return;
		}

		var contentString = '<div id="content">' +
			'<div id="siteNotice">' +
			'</div>' +
			'<div id="bodyContent">' +
			'<p>' + data + '</p>' +
			'</div>' +
			'</div>';

		var infowindow = new google.maps.InfoWindow({
			content: contentString
		});

		geocoder.geocode({'address': data}, function (results, status) {
			if (status === google.maps.GeocoderStatus.OK) {
				map.setCenter(results[0].geometry.location);
				var marker = new google.maps.Marker({
					map: map,
					position: results[0].geometry.location,
					icon: pin,
					title: data['store_title']
				});
				google.maps.event.addListener(marker, 'click', function () {
					infowindow.open(map, marker);
				});

				google.maps.event.addDomListener(window, 'resize', function () {
					map.setCenter(results[0].geometry.location);
				});
			}
		});
	}

	/**
	 * Object that represents icon shortcode
	 * @returns {{init: Function}} function that initializes icon's functionality
	 */
	var eltdfIcon = eltdf.modules.shortcodes.eltdfIcon = function () {
		//get all icons on page
		var icons = $('.eltdf-icon-shortcode');

		/**
		 * Function that triggers icon animation and icon animation delay
		 */
		var iconAnimation = function (icon) {
			if (icon.hasClass('eltdf-icon-animation')) {
				icon.appear(function () {
					icon.parent('.eltdf-icon-animation-holder').addClass('eltdf-icon-animation-show');
				}, {accX: 0, accY: eltdfGlobalVars.vars.eltdfElementAppearAmount});
			}
		};

		/**
		 * Function that triggers icon hover color functionality
		 */
		var iconHoverColor = function (icon) {
			if (typeof icon.data('hover-color') !== 'undefined') {
				var changeIconColor = function (event) {
					event.data.icon.css('color', event.data.color);
				};

				var iconElement = icon.find('.eltdf-icon-element');
				var hoverColor = icon.data('hover-color');
				var originalColor = iconElement.css('color');

				if (hoverColor !== '') {
					icon.on('mouseenter', {icon: iconElement, color: hoverColor}, changeIconColor);
					icon.on('mouseleave', {icon: iconElement, color: originalColor}, changeIconColor);
				}
			}
		};

		/**
		 * Function that triggers icon holder background color hover functionality
		 */
		var iconHolderBackgroundHover = function (icon) {
			if (typeof icon.data('hover-background-color') !== 'undefined') {
				var changeIconBgColor = function (event) {
					event.data.icon.css('background-color', event.data.color);
				};

				var hoverBackgroundColor = icon.data('hover-background-color');
				var originalBackgroundColor = icon.css('background-color');

				if (hoverBackgroundColor !== '') {
					icon.on('mouseenter', {icon: icon, color: hoverBackgroundColor}, changeIconBgColor);
					icon.on('mouseleave', {icon: icon, color: originalBackgroundColor}, changeIconBgColor);
				}
			}
		};

		/**
		 * Function that initializes icon holder border hover functionality
		 */
		var iconHolderBorderHover = function (icon) {
			if (typeof icon.data('hover-border-color') !== 'undefined') {
				var changeIconBorder = function (event) {
					event.data.icon.css('border-color', event.data.color);
				};

				var hoverBorderColor = icon.data('hover-border-color');
				var originalBorderColor = icon.css('border-color');

				if (hoverBorderColor !== '') {
					icon.on('mouseenter', {icon: icon, color: hoverBorderColor}, changeIconBorder);
					icon.on('mouseleave', {icon: icon, color: originalBorderColor}, changeIconBorder);
				}
			}
		};

		return {
			init: function () {
				if (icons.length) {
					icons.each(function () {
						iconAnimation($(this));
						iconHoverColor($(this));
						iconHolderBackgroundHover($(this));
						iconHolderBorderHover($(this));
					});
				}
			}
		};
	};

	/**
	 * Button object that initializes icon list with animation
	 * @type {Function}
	 */
	var eltdfInitIconList = eltdf.modules.shortcodes.eltdfInitIconList = function () {
		var iconList = $('.eltdf-animate-list');

		/**
		 * Initializes icon list animation
		 * @param list current slider
		 */
		var iconListInit = function (list) {
			setTimeout(function () {
				list.appear(function () {
					list.addClass('eltdf-appeared');
				}, {accX: 0, accY: eltdfGlobalVars.vars.eltdfElementAppearAmount});
			}, 30);
		};

		return {
			init: function () {
				if (iconList.length) {
					iconList.each(function () {
						iconListInit($(this));
					});
				}
			}
		};
	};

	/**
	 * Init image gallery shortcode
	 */
	function eltdfInitImageGallery() {

		var galleries = $('.eltdf-image-gallery');

		if (galleries.length) {
			galleries.each(function () {
				var gallery = $(this).find('.eltdf-ig-slider'),
					numberOfItems = gallery.data('number-of-visible-items'),
					autoplay = gallery.data('autoplay'),
					animation = (gallery.data('animation') === 'slide') ? false : gallery.data('animation'),
					navigation = (gallery.data('navigation') === 'yes'),
					pagination = (gallery.data('pagination') === 'yes'),
					margin = gallery.data('item-margin');

				//Responsive breakpoints
				var items = numberOfItems;

				var responsiveItems1 = 4;
				var responsiveItems2 = 3;
				var responsiveItems3 = 2;
				var responsiveItems4 = 1;

				if (items < 3) {
					responsiveItems1 = items;
					responsiveItems2 = items;
				}

				if (items < 2) {
					responsiveItems3 = items;
				}

				gallery.owlCarousel({
					autoplay: true,
					autoplayTimeout: autoplay * 1000,
					loop: true,
					autoplayHoverPause: true,
					smartSpeed: 600,
					animateIn: animation, //slide, fade, fadeUp, backSlide, goDown
					nav: navigation,
					dots: pagination,
					margin: margin,
					navText: [
						'<span class="eltdf-prev-icon"><span class="eltdf-icon-arrow ion-ios-arrow-left"></span></span>',
						'<span class="eltdf-next-icon"><span class="eltdf-icon-arrow ion-ios-arrow-right"></span></span>'
					],
					responsive: {
						1201: {
							items: items
						},
						769: {
							items: responsiveItems1
						},
						601: {
							items: responsiveItems2
						},
						481: {
							items: responsiveItems3
						},
						0: {
							items: responsiveItems4
						}
					}
				});

				gallery.css({'visibility': 'visible'});
			});
		}
	}

	/**
	 * Init item showcase shortcode
	 */
	function eltdfInitItemShowcase() {
		var itemShowcase = $('.eltdf-item-showcase-holder');

		if (itemShowcase.length) {
			itemShowcase.each(function () {
				var thisItemShowcase = $(this),
					leftItems = thisItemShowcase.find('.eltdf-is-left'),
					rightItems = thisItemShowcase.find('.eltdf-is-right'),
					itemImage = thisItemShowcase.find('.eltdf-is-image');

				//logic
				leftItems.wrapAll("<div class='eltdf-is-item-holder eltdf-is-left-holder' />");
				rightItems.wrapAll("<div class='eltdf-is-item-holder eltdf-is-right-holder' />");
				thisItemShowcase.animate({opacity: 1}, 200);

				setTimeout(function () {
					thisItemShowcase.appear(function () {
						itemImage.addClass('eltdf-appeared');
						thisItemShowcase.on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',
							function (e) {
								if (eltdf.windowWidth > 1200) {
									itemAppear('.eltdf-is-left-holder .eltdf-is-item');
									itemAppear('.eltdf-is-right-holder .eltdf-is-item');
								} else {
									itemAppear('.eltdf-is-item');
								}
							});
					}, {accX: 0, accY: eltdfGlobalVars.vars.eltdfElementAppearAmount});
				}, 100);

				//appear animation trigger
				function itemAppear(itemCSSClass) {
					thisItemShowcase.find(itemCSSClass).each(function (i) {
						var thisListItem = $(this);
						setTimeout(function () {
							thisListItem.addClass('eltdf-appeared');
						}, i * 150);
					});
				}
			});
		}
	}

	/**
	 * Masonry gallery, init masonry and resize pictures in grid
	 */
	function eltdfInitMasonryGallery() {

		var galleryHolder = $('.eltdf-masonry-gallery-holder'),
			gallery = galleryHolder.children('.eltdf-mg-inner'),
			gallerySizer = gallery.children('.eltdf-mg-grid-sizer');

		resizeMasonryGallery(gallerySizer.outerWidth(), gallery);

		if (galleryHolder.length) {
			galleryHolder.each(function () {
				var holder = $(this),
					holderGallery = holder.children('.eltdf-mg-inner');

				holderGallery.waitForImages(function () {
					holderGallery.animate({opacity: 1});

					holderGallery.isotope({
						layoutMode: 'packery',
						itemSelector: '.eltdf-mg-item',
						percentPosition: true,
						packery: {
							gutter: '.eltdf-mg-grid-gutter',
							columnWidth: '.eltdf-mg-grid-sizer'
						}
					});
				});
			});

			$(window).resize(function () {
				resizeMasonryGallery(gallerySizer.outerWidth(), gallery);

				gallery.isotope('reloadItems');
			});
		}
	}

	/*
	 **	Function to close message shortcode
	 */
	function eltdfInitMessageBox() {
		var message = $('.eltdf-message-box-holder');

		if (message.length) {
			message.each(function () {
				var thisMessage = $(this);
				thisMessage.find('.eltdf-mb-close').on('click',function (e) {
					e.preventDefault();
					thisMessage.fadeOut(500);
				});
			});
		}
	}

	function resizeMasonryGallery(size, holder) {

		var rectangle_portrait = holder.find('.eltdf-mg-rectangle-portrait'),
			rectangle_landscape = holder.find('.eltdf-mg-rectangle-landscape'),
			square_big = holder.find('.eltdf-mg-square-big'),
			square_small = holder.find('.eltdf-mg-square-small');

		rectangle_portrait.css('height', 2 * size);
		square_small.css('height', size);
		rectangle_landscape.css('height', size);
		square_big.css('height', 2 * size);

		if (window.innerWidth <= 680) {
			square_big.css('height', size);
		}
	}

	/*
	 ** Sections with parallax background image
	 */
	function eltdfInitParallax() {
		var parallaxHolder = $('.eltdf-parallax-holder');

		if (parallaxHolder.length) {
			parallaxHolder.each(function () {
				var parallaxElement = $(this);

				if (parallaxElement.hasClass('eltdf-full-screen-height-parallax')) {
					parallaxElement.height(eltdf.windowHeight);
					parallaxElement.find('.eltdf-parallax-content-outer').css('padding', 0);
				}

				var speed = parallaxElement.data('eltdf-parallax-speed') * 0.4;
				if (eltdf.htmlEl.hasClass('no-touch')) {
					parallaxElement.parallax("50%", speed);
				}
			});
		}
	}

	/**
	 * Init Pie Chart shortcode
	 */
	function eltdfInitPieChart() {
		var pieChartHolder = $('.eltdf-pie-chart-holder');

		if (pieChartHolder.length) {
			pieChartHolder.each(function () {
				var thisPieChartHolder = $(this),
					pieChart = thisPieChartHolder.children('.eltdf-pc-percentage'),
					barColor = '#dfb947',
					trackColor = '#f7f7f7',
					lineWidth = 3,
					size = 176;

				if (typeof pieChart.data('size') !== 'undefined' && pieChart.data('size') !== '') {
					size = pieChart.data('size');
				}

				if (typeof pieChart.data('bar-color') !== 'undefined' && pieChart.data('bar-color') !== '') {
					barColor = pieChart.data('bar-color');
				}

				if (typeof pieChart.data('track-color') !== 'undefined' && pieChart.data('track-color') !== '') {
					trackColor = pieChart.data('track-color');
				}

				pieChart.appear(function () {
					initToCounterPieChart(pieChart);
					thisPieChartHolder.css('opacity', '1');

					pieChart.easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: lineWidth,
						animate: 1500,
						size: size
					});
				}, {accX: 0, accY: eltdfGlobalVars.vars.eltdfElementAppearAmount});
			});
		}
	}

	/*
	 **	Counter for pie chart number from zero to defined number
	 */
	function initToCounterPieChart(pieChart) {
		var counter = pieChart.find('.eltdf-pc-percent'),
			max = parseFloat(counter.text());

		counter.countTo({
			from: 0,
			to: max,
			speed: 1500,
			refreshInterval: 50
		});
	}

	/*
	 **	Horizontal progress bars shortcode
	 */
	function eltdfInitProgressBars() {

		var progressBar = $('.eltdf-progress-bar');

		if (progressBar.length) {

			progressBar.each(function () {

				var thisBar = $(this),
					thisBarContent = thisBar.find('.eltdf-pb-content'),
					percentage = thisBarContent.data('percentage');

				function eltdfProgressBarInit() {
					eltdfInitToCounterProgressBar(thisBar, percentage);
					thisBarContent.css('width', '0%');
					thisBarContent.animate({'width': percentage + '%'}, 2000);
				}

				if (thisBar.parents('.eltdf-vss-ms-section').length) {
					// Do nothing unless section is active
					if (thisBar.parents('.eltdf-vss-ms-section').hasClass('active') && !(thisBar.hasClass('activated'))) {
						eltdfProgressBarInit();
					}
				} else {
					thisBar.appear(function () {
						eltdfProgressBarInit();
					});
				}
			});
		}
	}

	/*
	 **	Counter for horizontal progress bars percent from zero to defined percent
	 */
	function eltdfInitToCounterProgressBar(progressBar, $percentage) {
		var percentage = parseFloat($percentage),
			percent = progressBar.find('.eltdf-pb-percent');

		if (percent.length) {
			percent.each(function () {
				var thisPercent = $(this);
				thisPercent.css('opacity', '1');

				thisPercent.countTo({
					from: 0,
					to: percentage,
					speed: 2000,
					refreshInterval: 50
				});
			});
		}
	}

	/**
	 * Object that represents icon widget
	 * @returns {{init: Function}} function that initializes icon's functionality
	 */
	var eltdfIconWidget = eltdf.modules.shortcodes.eltdfIconWidget = function () {
		//get all icons on page
		var icons = $('.eltdf-icon-widget-holder');

		/**
		 * Function that triggers icon hover color functionality
		 */
		var iconHover = function (icon) {
			if (typeof icon.data('icon-hover-color') !== 'undefined') {
				var changeIconColor = function (event) {
					event.data.icon.css('color', event.data.iColor);
				};

				var iconElement = icon;

				var iconColor = '';
				var iconHoverColor = '';

				if (typeof icon.data('icon-color') !== 'undefined') {
					iconColor = icon.data('icon-color');
				}
				if (typeof icon.data('icon-hover-color') !== 'undefined') {
					iconHoverColor = icon.data('icon-hover-color');
				}

				if (iconHoverColor !== '') {
					icon.on('mouseenter', {
						icon: iconElement.find('.eltdf-icon-holder'),
						iColor: iconHoverColor
					}, changeIconColor);
					icon.on('mouseleave', {
						icon: iconElement.find('.eltdf-icon-holder'),
						iColor: iconColor
					}, changeIconColor);
				}
			}
		};

		return {
			init: function () {
				if (icons.length) {
					icons.each(function () {
						iconHover($(this));
					});
				}
			}
		};
	};

	/**
	 * Object that represents social icon widget
	 * @returns {{init: Function}} function that initializes icon's functionality
	 */
	var eltdfSocialIconWidget = eltdf.modules.shortcodes.eltdfSocialIconWidget = function () {
		//get all social icons on page
		var icons = $('.eltdf-social-icon-widget-holder');

		/**
		 * Function that triggers icon hover color functionality
		 */
		var socialIconHoverColor = function (icon) {
			if (typeof icon.data('hover-color') !== 'undefined') {
				var changeIconColor = function (event) {
					event.data.icon.css('color', event.data.color);
				};

				var iconElement = icon;
				var hoverColor = icon.data('hover-color');
				var originalColor = iconElement.css('color');
				if (typeof icon.data('original-color') !== 'undefined') {
					originalColor = icon.data('original-color');
				}

				if (hoverColor !== '') {
					icon.on('mouseenter', {icon: iconElement, color: hoverColor}, changeIconColor);
					icon.on('mouseleave', {icon: iconElement, color: originalColor}, changeIconColor);
				}
			}
		};

		return {
			init: function () {
				if (icons.length) {
					icons.each(function () {
						socialIconHoverColor($(this));
					});
				}
			}
		};
	};

	/*
	 **  Init sticky sidebar widget
	 */
	function eltdfStickySidebarWidget() {

		var sswHolder = $('.eltdf-widget-sticky-sidebar');
		var headerHeightOffset = 0;
		var widgetTopOffset = 0;
		var widgetTopPosition = 0;
		var sidebarHeight = 0;
		var sidebarWidth = 0;
		var objectsCollection = [];

		function addObjectItems() {
			if (sswHolder.length) {
				sswHolder.each(function () {
					var thisSswHolder = $(this);
					widgetTopOffset = thisSswHolder.offset().top;
					widgetTopPosition = thisSswHolder.position().top;

					if (thisSswHolder.parents('aside.eltdf-sidebar').length) {
						sidebarHeight = thisSswHolder.parents('aside.eltdf-sidebar').outerHeight();
					} else if (thisSswHolder.parents('.wpb_widgetised_column').length) {
						sidebarHeight = thisSswHolder.parents('.wpb_widgetised_column').outerHeight();
					}

					if (thisSswHolder.parents('aside.eltdf-sidebar').length) {
						sidebarWidth = thisSswHolder.parents('aside.eltdf-sidebar').width();
					} else if (thisSswHolder.parents('.wpb_widgetised_column').length) {
						sidebarWidth = thisSswHolder.parents('.wpb_widgetised_column').width();
					}

					objectsCollection.push({
						'object': thisSswHolder,
						'offset': widgetTopOffset,
						'position': widgetTopPosition,
						'height': sidebarHeight,
						'width': sidebarWidth
					});
				});
			}
		}

		function initStickySidebarWidget() {

			if (objectsCollection.length) {
				$.each(objectsCollection, function (i) {

					var thisSswHolder = objectsCollection[i]['object'];
					var thisWidgetTopOffset = objectsCollection[i]['offset'];
					var thisWidgetTopPosition = objectsCollection[i]['position'];
					var thisSidebarHeight = objectsCollection[i]['height'];
					var thisSidebarWidth = objectsCollection[i]['width'];

					if (eltdf.body.hasClass('eltdf-fixed-on-scroll')) {
						headerHeightOffset = 42;
						if ($('.eltdf-fixed-wrapper').hasClass('eltdf-fixed')) {
							headerHeightOffset = $('.eltdf-fixed-wrapper.eltdf-fixed').height();
						}
					} else {
						headerHeightOffset = $('.eltdf-page-header').height();
					}

					if (eltdf.windowWidth > 1024) {

						var widgetBottomMargin = 40;
						var sidebarPosition = -(thisWidgetTopPosition - headerHeightOffset - 10);
						var stickySidebarHeight = thisSidebarHeight - thisWidgetTopPosition - widgetBottomMargin;
						var stickySidebarRowHolderHeight = 0;
						if (thisSswHolder.parents('aside.eltdf-sidebar').length) {
							if (thisSswHolder.parents('.eltdf-content-has-sidebar').children('.eltdf-content-next-to-sidebar').length) {
								stickySidebarRowHolderHeight = thisSswHolder.parents('.eltdf-content-has-sidebar').children('.eltdf-content-next-to-sidebar').outerHeight();
							} else {
								stickySidebarRowHolderHeight = thisSswHolder.parents('.eltdf-content-has-sidebar').children('.eltdf-content-next-to-sidebar').outerHeight();
							}
						} else if (thisSswHolder.parents('.wpb_widgetised_column').length) {
							stickySidebarRowHolderHeight = thisSswHolder.parents('.vc_row').height();
						}

						//move sidebar up when hits the end of section row
						var rowSectionEndInViewport = thisWidgetTopOffset - headerHeightOffset - thisWidgetTopPosition - eltdfGlobalVars.vars.eltdfTopBarHeight + stickySidebarRowHolderHeight;

						if ((eltdf.scroll >= thisWidgetTopOffset - headerHeightOffset) && thisSidebarHeight < stickySidebarRowHolderHeight) {
							if (thisSswHolder.parents('aside.eltdf-sidebar').length) {
								if (thisSswHolder.parents('aside.eltdf-sidebar').hasClass('eltdf-sticky-sidebar-appeared')) {
									thisSswHolder.parents('aside.eltdf-sidebar.eltdf-sticky-sidebar-appeared').css({'top': sidebarPosition + 'px'});
								} else {
									thisSswHolder.parents('aside.eltdf-sidebar').addClass('eltdf-sticky-sidebar-appeared').css({
										'position': 'fixed',
										'top': sidebarPosition + 'px',
										'width': thisSidebarWidth,
										'margin-top': '-10px'
									}).animate({'margin-top': '0'}, 200);
								}
							} else if (thisSswHolder.parents('.wpb_widgetised_column').length) {
								if (thisSswHolder.parents('.wpb_widgetised_column').hasClass('eltdf-sticky-sidebar-appeared')) {
									thisSswHolder.parents('.wpb_widgetised_column.eltdf-sticky-sidebar-appeared').css({'top': sidebarPosition + 'px'});
								} else {
									thisSswHolder.parents('.wpb_widgetised_column').addClass('eltdf-sticky-sidebar-appeared').css({
										'position': 'fixed',
										'top': sidebarPosition + 'px',
										'width': thisSidebarWidth,
										'margin-top': '-10px'
									}).animate({'margin-top': '0'}, 200);
								}
							}

							if (eltdf.scroll + stickySidebarHeight >= rowSectionEndInViewport) {
								if (thisSswHolder.parents('aside.eltdf-sidebar').length) {

									thisSswHolder.parents('aside.eltdf-sidebar.eltdf-sticky-sidebar-appeared').css({
										'position': 'absolute',
										'top': stickySidebarRowHolderHeight - stickySidebarHeight + sidebarPosition - widgetBottomMargin - headerHeightOffset + 'px'
									});

								} else if (thisSswHolder.parents('.wpb_widgetised_column').length) {

									thisSswHolder.parents('.wpb_widgetised_column.eltdf-sticky-sidebar-appeared').css({
										'position': 'absolute',
										'top': stickySidebarRowHolderHeight - stickySidebarHeight + sidebarPosition - widgetBottomMargin - headerHeightOffset + 'px'
									});
								}
							} else {
								if (thisSswHolder.parents('aside.eltdf-sidebar').length) {

									thisSswHolder.parents('aside.eltdf-sidebar.eltdf-sticky-sidebar-appeared').css({
										'position': 'fixed',
										'top': sidebarPosition + 'px'
									});

								} else if (thisSswHolder.parents('.wpb_widgetised_column').length) {

									thisSswHolder.parents('.wpb_widgetised_column.eltdf-sticky-sidebar-appeared').css({
										'position': 'fixed',
										'top': sidebarPosition + 'px'
									});
								}
							}
						} else {

							if (thisSswHolder.parents('aside.eltdf-sidebar').length) {
								thisSswHolder.parents('aside.eltdf-sidebar').removeClass('eltdf-sticky-sidebar-appeared').css({
									'position': 'relative',
									'top': '0',
									'width': 'auto'
								});
							} else if (thisSswHolder.parents('.wpb_widgetised_column').length) {
								thisSswHolder.parents('.wpb_widgetised_column').removeClass('eltdf-sticky-sidebar-appeared').css({
									'position': 'relative',
									'top': '0',
									'width': 'auto'
								});
							}
						}
					} else {
						if (thisSswHolder.parents('aside.eltdf-sidebar').length) {
							thisSswHolder.parents('aside.eltdf-sidebar').removeClass('eltdf-sticky-sidebar-appeared').css({
								'position': 'relative',
								'top': '0',
								'width': 'auto'
							});
						} else if (thisSswHolder.parents('.wpb_widgetised_column').length) {
							thisSswHolder.parents('.wpb_widgetised_column').removeClass('eltdf-sticky-sidebar-appeared').css({
								'position': 'relative',
								'top': '0',
								'width': 'auto'
							});
						}
					}
				});
			}
		}

		return {
			init: function () {
				addObjectItems();

				initStickySidebarWidget();

				$(window).scroll(function () {
					initStickySidebarWidget();
				});
			},
			reInit: initStickySidebarWidget
		};
	}

	/*
	 **	Init tabs shortcode
	 */
	function eltdfInitTabs() {

		var tabs = $('.eltdf-tabs');
		if (tabs.length) {
			tabs.each(function () {
				var thisTabs = $(this);

				thisTabs.children('.eltdf-tab-container').each(function (index) {
					index = index + 1;
					var that = $(this),
						link = that.attr('id'),
						navItem = that.parent().find('.eltdf-tabs-nav li:nth-child(' + index + ') a'),
						navLink = navItem.attr('href');

					link = '#' + link;

					if (link.indexOf(navLink) > -1) {
						navItem.attr('href', link);
					}
				});

				if (thisTabs.hasClass('eltdf-horizontal-tab')) {
					thisTabs.tabs();
				} else if (thisTabs.hasClass('eltdf-vertical-tab')) {
					thisTabs.tabs().addClass('ui-tabs-vertical ui-helper-clearfix');
					thisTabs.find('.eltdf-tabs-nav > ul >li').removeClass('ui-corner-top').addClass('ui-corner-left');
				}
			});
		}
	}

	/**
	 * Init testimonials shortcode
	 */
	function eltdfInitTestimonials() {

		var testimonialsHolder = $('.eltdf-testimonials-holder');

		if (testimonialsHolder.length) {
			testimonialsHolder.each(function () {

				var thisTestimonials = $(this),
					testimonials = thisTestimonials.children('.eltdf-testimonials'),
					numberOfItems = 1,
					loop = true,
					autoplay = true,
					number = 0,
					speed = 4000,
					animationSpeed = 600,
					navArrows = true,
					navDots = true,
					margin = 26;

				if (typeof testimonials.data('number') !== 'undefined' && testimonials.data('number') !== false) {
					number = parseInt(testimonials.data('number'));
				}

				if (typeof testimonials.data('number-visible') !== 'undefined' && testimonials.data('number-visible') !== false) {
					numberOfItems = parseInt(testimonials.data('number-visible'));
				}

				if (typeof testimonials.data('speed') !== 'undefined' && testimonials.data('speed') !== false) {
					speed = testimonials.data('speed');
				}

				if (typeof testimonials.data('animation-speed') !== 'undefined' && testimonials.data('animation-speed') !== false) {
					animationSpeed = testimonials.data('animation-speed');
				}

				if (typeof testimonials.data('nav-arrows') !== 'undefined' && testimonials.data('nav-arrows') !== false && testimonials.data('nav-arrows') === 'no') {
					navArrows = false;
				}

				if (typeof testimonials.data('nav-dots') !== 'undefined' && testimonials.data('nav-dots') !== false && testimonials.data('nav-dots') === 'no') {
					navDots = false;
				}

				var responsiveNumberOfItems1 = 1,
					responsiveNumberOfItems2 = 2,
					responsiveNumberOfItems3 = 3;

				if (numberOfItems < 3) {
					responsiveNumberOfItems2 = numberOfItems;
					responsiveNumberOfItems3 = numberOfItems;
				}

				if (number === 1) {
					loop = false;
					autoplay = false;
					navArrows = false;
					navDots = false;
				}

				testimonials.owlCarousel({
					items: numberOfItems,
					loop: loop,
					autoplay: autoplay,
					autoplayTimeout: speed,
					smartSpeed: animationSpeed,
					margin: margin,
					nav: navArrows,
					dots: navDots,
					responsive: {
						0: {
							items: responsiveNumberOfItems1,
							margin: 0,
						},
						769: {
							items: responsiveNumberOfItems2
						},
						1025: {
							items: responsiveNumberOfItems3,
						},
						1201: {
							items: numberOfItems
						}
					},
					navText: [
						'<span class="eltdf-prev-icon"><span class="eltdf-icon-arrow ion-ios-arrow-left"></span></span>',
						'<span class="eltdf-next-icon"><span class="eltdf-icon-arrow ion-ios-arrow-right"></span></span>'
					]
				});

				thisTestimonials.css({'visibility': 'visible'});
			});
		}
	}

	function eltdfInstagramCarousel() {

		var instagramCarousels = $('.eltdf-instagram-feed.eltdf-instagram-carousel');

		if (instagramCarousels.length) {
			instagramCarousels.each(function () {

				var carousel = $(this),
					items = 6,
					loop = true,
					margin;

				if (typeof carousel.data('items') !== 'undefined' && carousel.data('items') !== false) {
					items = carousel.data('items');
				}

				// Fix for the issue with the carousels holding only one item - the carousel's core issue
				if (carousel.children().length == 1) {
					loop = false;
				}

				if (items === 1) {
					margin = 0;
				} else if ((carousel.data('space-between-items') === 'normal')) {
					margin = 20;
				} else if ((carousel.data('space-between-items') === 'small')) {
					margin = 10;
				} else if ((carousel.data('space-between-items') === 'tiny')) {
					margin = 5;
				} else if ((carousel.data('space-between-items') === 'no')) {
					margin = 0;
				}

				var responsiveItems1 = items;
				var responsiveItems2 = 4;
				var responsiveItems3 = 3;
				var responsiveItems4 = 2;

				if (items > 5) {
					responsiveItems1 = 5;
				}

				if (items < 4) {
					responsiveItems2 = items;
				}

				if (items < 3) {
					responsiveItems3 = items;
				}

				if (items === 1) {
					responsiveItems4 = items;
				}

				carousel.owlCarousel({
					autoplay: true,
					autoplayHoverPause: true,
					autoplayTimeout: 5000,
					smartSpeed: 600,
					items: items,
					margin: margin,
					loop: loop,
					dots: false,
					nav: false,
					responsive: {
						1200: {
							items: items
						},
						1024: {
							items: responsiveItems1
						},
						769: {
							items: responsiveItems2
						},
						601: {
							items: responsiveItems3
						},
						0: {
							items: responsiveItems4
						}
					},
					onInitialized: function () {
						carousel.css({'opacity': 1});
					}
				});

			});
		}
	}

	function eltdfTwitterSlider() {

		var twitterSlider = $('.eltdf-twitter-slider');

		if (twitterSlider.length) {
			twitterSlider.each(function () {

				var thisTwitterSlider = $(this),
				//tweets = thisTwitterSlider.children('.eltdf-tweet-holder'),
					loop = true,
					autoplay = true,
					items = 0,
					speed = 5000,
					animationSpeed = 600,
					navigation = true;

				if (items === 1) {
					loop = false;
					autoplay = false;
					navigation = false;
				}

				thisTwitterSlider.owlCarousel({
					items: 1,
					loop: loop,
					autoplay: autoplay,
					autoplayTimeout: speed,
					smartSpeed: animationSpeed,
					nav: true,
					dots: navigation,
					navText: [
						'<span class="eltdf-prev-icon"><span class="eltdf-icon-arrow ion-ios-arrow-left"></span></span>',
						'<span class="eltdf-next-icon"><span class="eltdf-icon-arrow ion-ios-arrow-right"></span></span>'
					]
				});

				thisTwitterSlider.css({'visibility': 'visible'});
			});
		}
	}

})(jQuery);
(function($) {
	"use strict";

    var blog = {};
    eltdf.modules.blog = blog;

    blog.eltdfInitAudioPlayer = eltdfInitAudioPlayer;
    blog.eltdfInitBlogMasonry = eltdfInitBlogMasonry;
    blog.eltdfInitShortcodeBlogMasonry = eltdfInitShortcodeBlogMasonry;
    blog.eltdfInitBlogMasonryLoadMore = eltdfInitBlogMasonryLoadMore;
    blog.eltdfInitBlogLoadMore = eltdfInitBlogLoadMore;
    blog.eltdfInitBlogShortcodeLoadMore = eltdfInitBlogShortcodeLoadMore;

    blog.eltdfOnDocumentReady = eltdfOnDocumentReady;
    blog.eltdfOnWindowLoad = eltdfOnWindowLoad;
    blog.eltdfOnWindowResize = eltdfOnWindowResize;
    blog.eltdfOnWindowScroll = eltdfOnWindowScroll;

    $(document).ready(eltdfOnDocumentReady);
    $(window).load(eltdfOnWindowLoad);
    $(window).resize(eltdfOnWindowResize);
    $(window).scroll(eltdfOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function eltdfOnDocumentReady() {
        eltdfInitAudioPlayer();
        eltdfInitBlogMasonry();
        eltdfInitShortcodeBlogMasonry();
        eltdfInitBlogMasonryLoadMore();
        eltdfInitBlogLoadMore();
        eltdfInitBlogShortcodeLoadMore();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function eltdfOnWindowLoad() {
        eltdfInitBlogListAnimation();
    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function eltdfOnWindowResize() {
        eltdfInitBlogMasonry();
        eltdfInitShortcodeBlogMasonry();
    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function eltdfOnWindowScroll() {
    }

    /**
     * Initializes blog list article animation
     */
    function eltdfInitBlogListAnimation(){
        var blogList = $('.eltdf-blog-list-holder');

        if(blogList.length){
            blogList.each(function(){
                var thisBlogList = $(this).children('.eltdf-bli-inner');

                thisBlogList.children('article').each(function(l) {
                    var thisArticle = $(this);

                    thisArticle.appear(function() {
                        thisArticle.addClass('eltdf-item-show');

                        setTimeout(function(){
                            thisArticle.addClass('eltdf-item-shown');
                        }, 1000);
                    },{accX: 0, accY: 0});
                });
            });
        }
    }

    /*
    ** Init audio player for Blog list and single pages
    */
    function eltdfInitAudioPlayer() {

        var players = $('audio.eltdf-blog-audio');

        players.mediaelementplayer({
            audioWidth: '100%'
        });
    }

    /*
    ** Init Blog Masonry Layout
    */
    function eltdfInitBlogMasonry() {

        if($('.eltdf-blog-holder.eltdf-blog-type-masonry').length) {

            var container = $('.eltdf-blog-holder.eltdf-blog-type-masonry');

            container.waitForImages(function() {
                container.isotope({
                    itemSelector: 'article',
                    resizable: false,
                    masonry: {
                        columnWidth: '.eltdf-blog-masonry-grid-sizer',
                        gutter: '.eltdf-blog-masonry-grid-gutter'
                    }
                });
                container.css('opacity', 1);
            });
        }
    }

    /*
     ** Init Shortcode Blog List Masonry Layout
     */
    function eltdfInitShortcodeBlogMasonry() {

        if($('.eltdf-blog-list-holder.eltdf-masonry').length) {

            var container = $('.eltdf-blog-list-holder.eltdf-masonry'),
                blogListHolder = container.children('.eltdf-blog-list');

            blogListHolder.waitForImages(function() {
                blogListHolder.isotope({
                    itemSelector: '.eltdf-bli',
                    resizable: false,
                    masonry: {
                        columnWidth: '.eltdf-blog-masonry-grid-sizer',
                        gutter: '.eltdf-blog-masonry-grid-gutter'
                    }
                });
                blogListHolder.css('opacity', 1);
            });
        }
    }

    /*
    ** Init Blog Masonry Load More Functionality
    */
    function eltdfInitBlogMasonryLoadMore() {

        if($('.eltdf-blog-holder.eltdf-blog-type-masonry').length) {

            var container = $('.eltdf-blog-holder.eltdf-blog-type-masonry');

            if(container.hasClass('eltdf-masonry-pagination-load-more')) {
                var i = 1;
                $('.eltdf-blog-load-more-button a').on('click', function(e) {
                    e.preventDefault();
                    var button = $(this);

                    var link = button.attr('href'),
                        content = '.eltdf-masonry-pagination-load-more',
                        anchor = '.eltdf-blog-load-more-button a',
                        loader = $(".eltdf-bli-loading"),
                        nextHref = $(anchor).attr('href');
                        
                        button.hide();
                        loader.show();

                    $.get(link + '', function(data) {
                        var newContent = $(content, data).wrapInner('').html();
                        nextHref = $(anchor, data).attr('href');
                        container.append(newContent).isotope('reloadItems').isotope({sortBy: 'original-order'});
                        eltdf.modules.blog.eltdfInitAudioPlayer();
                        eltdf.modules.common.eltdfOwlSlider();
                        eltdf.modules.common.eltdfFluidVideo();
                        setTimeout(function() {
                            $('.eltdf-masonry-pagination-load-more').isotope('layout');
                            button.show();
                            loader.hide();
                        }, 600);
                        if(button.parent().data('rel') > i) {
                            button.attr('href', nextHref); // Change the next URL
                        } else {
                            button.parent().remove();
                        }
                    });

                    i++;
                });
            }
        }
    }

    /*
    ** Init Blog Load More Functionality
    */
    function eltdfInitBlogLoadMore(){
        var blogHolder = $('.eltdf-blog-holder.eltdf-blog-load-more:not(.eltdf-blog-type-masonry)');
        
        if(blogHolder.length){
            blogHolder.each(function(){
                var thisBlogHolder = $(this);
                var nextPage;
                var maxNumPages;
                var loadMoreButton = thisBlogHolder.find('.eltdf-load-more-ajax-pagination .eltdf-btn');
                maxNumPages =  thisBlogHolder.data('max-pages');                
                
                loadMoreButton.on('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();
	                var loadMoreDatta = eltdf.modules.common.getLoadMoreData(thisBlogHolder);
                    nextPage = loadMoreDatta.nextPage;
	                
                    if(nextPage <= maxNumPages){
	                    var ajaxData = eltdf.modules.common.setLoadMoreAjaxData(loadMoreDatta, 'ambient_elated_blog_load_more');

                        $.ajax({
                            type: 'POST',
                            data: ajaxData,
                            url: eltdfAjaxUrl,
                            success: function (data) {
                                nextPage++;
                                thisBlogHolder.data('next-page', nextPage);
                                var response = $.parseJSON(data);
                                var responseHtml =  response.html;
                                thisBlogHolder.waitForImages(function(){    
                                    thisBlogHolder.find('article:last').after(responseHtml); // Append the new content 

                                    setTimeout(function() {               
                                        eltdfInitAudioPlayer();
                                        eltdf.modules.common.eltdfOwlSlider();
                                        eltdf.modules.common.eltdfFluidVideo();
                                    },400);
                                });
                            }
                        });
                    }
                    
                    if(nextPage === maxNumPages){
                        loadMoreButton.hide();
                    }
                });
            });
        }
    }

    /*
     ** Init Blog Shortcode Load More Functionality
     */
    function eltdfInitBlogShortcodeLoadMore(){
        var blogHolder = $('.eltdf-blog-list-holder');

        if(blogHolder.length){
            blogHolder.each(function(){
                var thisBlogHolder = $(this);
                var nextPage;
                var maxNumPages;
                var loadMoreButton = thisBlogHolder.find('.eltdf-bli-load-more .eltdf-btn');
                maxNumPages =  thisBlogHolder.data('max-num-pages');

                loadMoreButton.on('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();

                    var loadMoreDatta = eltdf.modules.common.getLoadMoreData(thisBlogHolder),
                        loadingItem = thisBlogHolder.find('.eltdf-bli-loading');

                    nextPage = loadMoreDatta.nextPage;

                    if(nextPage <= maxNumPages){
                        loadingItem.addClass('eltdf-showing');
                        loadMoreButton.hide();
                        var ajaxData = eltdf.modules.common.setLoadMoreAjaxData(loadMoreDatta, 'ambient_elated_blog_shortcode_load_more');

                        $.ajax({
                            type: 'POST',
                            data: ajaxData,
                            url: eltdfAjaxUrl,
                            success: function (data) {
                                nextPage++;
                                thisBlogHolder.data('next-page', nextPage);
                                var response = $.parseJSON(data);
                                var responseHtml =  response.html;
                                thisBlogHolder.waitForImages(function(){
                                    if(thisBlogHolder.hasClass('eltdf-masonry')) {
                                        thisBlogHolder.find('.eltdf-blog-list').append(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});
                                    } else {
                                        thisBlogHolder.find('.eltdf-bli:last').after(responseHtml); // Append the new content
                                        eltdfInitBlogListAnimation();
                                    }

                                    loadingItem.removeClass('eltdf-showing');
                                    loadMoreButton.show();

                                    setTimeout(function() {
                                        if(thisBlogHolder.hasClass('eltdf-masonry')) {
                                            thisBlogHolder.find('.eltdf-blog-list').isotope('layout');
                                            eltdfInitBlogListAnimation();
                                        }
                                    }, 600);
                                });
                            }
                        });
                    }

                    if(nextPage === maxNumPages){
                        loadMoreButton.parent().parent().hide();
                    }
                });
            });
        }
    }

})(jQuery);
(function ($) {
	'use strict';

	var portfolio = {};
	eltdf.modules.portfolio = portfolio;

	portfolio.eltdfOnDocumentReady = eltdfOnDocumentReady;
	portfolio.eltdfOnWindowLoad = eltdfOnWindowLoad;
	portfolio.eltdfOnWindowResize = eltdfOnWindowResize;
	portfolio.eltdfOnWindowScroll = eltdfOnWindowScroll;

	$(document).ready(eltdfOnDocumentReady);
	$(window).load(eltdfOnWindowLoad);
	$(window).resize(eltdfOnWindowResize);
	$(window).scroll(eltdfOnWindowScroll);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfInitPortfolioMasonry();
		eltdfInitPortfolioMasonryFilter();
		eltdfInitPortfolioLoadMore();
		eltdfInitPortfolioSlider();
	}

	/*
	 All functions to be called on $(window).load() should be in this function
	 */
	function eltdfOnWindowLoad() {
		eltdfInitPortfolioListAnimation();
		eltdfInitPortfolioListHoverDirection();
		eltdfInitPortfolioInfiniteScroll();
		eltdfPortfolioSingleFollow().init();
	}

	/*
	 All functions to be called on $(window).resize() should be in this function
	 */
	function eltdfOnWindowResize() {
		eltdfInitPortfolioMasonry();
	}

	/*
	 All functions to be called on $(window).scroll() should be in this function
	 */
	function eltdfOnWindowScroll() {
		eltdfInitPortfolioInfiniteScroll();
	}

	/**
	 * Initializes portfolio list article animation
	 */
	function eltdfInitPortfolioListAnimation() {
		var portList = $('.eltdf-portfolio-list-holder.eltdf-pl-has-animation');

			if (portList.length) {
				portList.each(function () {
					var thisPortList = $(this).children('.eltdf-pl-inner'),
						animateCycle = 5, // rewind delay
						animateCycleCounter = 0;

					thisPortList.children('article').each(function(l) {
						var thisArticle = $(this);

						setTimeout(function(){
							thisArticle.appear(function(){
								setTimeout(function(){
									thisArticle.addClass('eltdf-appeared');
								},l * 100);
							},{accX: 0, accY: 0});
						},30);

					});
				});
			}
	}

	function eltdfInitPortfolioListHoverDirection() {
		var portList = $('.eltdf-portfolio-list-holder.eltdf-hover-direction-active');

		if (portList.length) {
			portList.each(function () {

				var thisPortList = $(this);

				thisPortList.find('article').hoverdir({
					hoverElem: '.eltdf-pli-text-holder',
					speed: 330,
					hoverDelay: 35,
					easing: 'ease'
				});

			});
		}
	}

	/**
	 * Initializes portfolio list
	 */
	function eltdfInitPortfolioMasonry() {
		var portList = $('.eltdf-portfolio-list-holder');

		if (portList.length) {
			portList.each(function () {
				var thisPortList = $(this).children('.eltdf-pl-inner'),
					size = thisPortList.find('.eltdf-pl-grid-sizer').width();

				eltdfResizePortfolioItems(size, thisPortList);

				thisPortList.waitForImages(function () {
					thisPortList.isotope({
						layoutMode: 'packery',
						itemSelector: 'article',
						percentPosition: true,
						packery: {
							gutter: '.eltdf-pl-grid-gutter',
							columnWidth: '.eltdf-pl-grid-sizer'
						}
					});

					thisPortList.css('opacity', '1');


				});
			});
		}
	}

	/**
	 * Init Resize Blog Items
	 */
	function eltdfResizePortfolioItems(size, container) {
		var padding = parseInt(container.find('article').css('padding-left')),
			defaultMasonryItem = container.find('.eltdf-pl-masonry-default'),
			largeWidthMasonryItem = container.find('.eltdf-pl-masonry-large-width'),
			largeHeightMasonryItem = container.find('.eltdf-pl-masonry-large-height'),
			largeWidthHeightMasonryItem = container.find('.eltdf-pl-masonry-large-width-height');

		if (eltdf.windowWidth > 600) {
			defaultMasonryItem.css('height', size - 2 * padding);
			largeHeightMasonryItem.css('height', Math.round(2 * size) - 2 * padding);
			largeWidthHeightMasonryItem.css('height', Math.round(2 * size) - 2 * padding);
			largeWidthMasonryItem.css('height', size - 2 * padding);
		} else {
			defaultMasonryItem.css('height', size);
			largeHeightMasonryItem.css('height', size);
			largeWidthHeightMasonryItem.css('height', size);
			largeWidthMasonryItem.css('height', size);
		}
	}

	/**
	 * Initializes portfolio masonry filter
	 */
	function eltdfInitPortfolioMasonryFilter() {

		var filterHolder = $('.eltdf-portfolio-list-holder .eltdf-portfolio-filter-holder .eltdf-portfolio-filter-holder-inner');

		if (filterHolder.length) {
			filterHolder.each(function () {
				var thisFilterHolder = $(this),
					thisPortListHolder = thisFilterHolder.closest('.eltdf-portfolio-list-holder'),
					thisPortListInner = thisPortListHolder.find('.eltdf-pl-inner'),
					portListHasLoadMore = thisPortListHolder.hasClass('eltdf-pl-has-load-more') ? true : false;
				thisFilterHolder.find('.eltdf-portfolio-filter-parent-categories .parent-filter:first').addClass('eltdf-pl-current');


				var resizeFilter = function () {
					if (thisFilterHolder.parent().parent().hasClass('eltdf-pl-filter-position-top')) {

						var maxHeight = Math.max.apply(null, thisFilterHolder.find('.eltdf-portfolio-filter-child-categories').map(function () {
							return $(this).height();
						}).get());

						thisFilterHolder.find('.eltdf-portfolio-filter-child-categories-holder').css('height', maxHeight);
					}
				};

				resizeFilter();

				$(window).resize(function () {
					resizeFilter();
				});

				thisFilterHolder.find('.eltdf-filter span').on('click',function () {
					var thisFilter = $(this).parent(),
						filterValue = thisFilter.attr('data-filter'),
						filterClassName = filterValue.length ? filterValue : '',
						portListHasArtciles = thisPortListInner.children().is(filterClassName) ? true : false,
						filterName = $(".eltdf-pl-current").data("filter");

					thisFilter.parents(".eltdf-portfolio-list-holder").removeClass("eltdf-pl-has-animation");

					thisFilterHolder.find('.eltdf-filter').removeClass('eltdf-pl-current');
					thisFilter.addClass('eltdf-pl-current');

					$('.eltdf-pl-item').css("visibility", "visible");

					if (portListHasLoadMore && !portListHasArtciles) {
						eltdfInitLoadMoreItemsPortfolioMasonryFilter(thisPortListHolder, filterValue, filterClassName);
					} else {
						thisFilterHolder.parents('.eltdf-portfolio-list-holder').children('.eltdf-pl-inner').isotope({filter: filterValue});
					}

				});
			});
		}
	}

	/**
	 * Initializes load more items if portfolio masonry filter item is empty
	 */
	function eltdfInitLoadMoreItemsPortfolioMasonryFilter($portfolioList, $filterValue, $filterClassName) {

		var thisPortList = $portfolioList,
			thisPortListInner = thisPortList.find('.eltdf-pl-inner'),
			filterValue = $filterValue,
			filterClassName = $filterClassName,
			maxNumPages = 0;

		if (typeof thisPortList.data('max-num-pages') !== 'undefined' && thisPortList.data('max-num-pages') !== false) {
			maxNumPages = thisPortList.data('max-num-pages');
		}

		var loadMoreDatta = eltdf.modules.common.getLoadMoreData(thisPortList),
			nextPage = loadMoreDatta.nextPage,
			ajaxData = eltdf.modules.common.setLoadMoreAjaxData(loadMoreDatta, 'eltd_core_portfolio_ajax_load_more'),
			loadingItem = thisPortList.find('.eltdf-pl-loading');

		if (nextPage <= maxNumPages) {
			loadingItem.addClass('eltdf-showing eltdf-filter-trigger');
			thisPortListInner.css('opacity', '0');

			$.ajax({
				type: 'POST',
				data: ajaxData,
				url: eltdfAjaxUrl,
				success: function (data) {
					nextPage++;
					thisPortList.data('next-page', nextPage);
					var response = $.parseJSON(data),
						responseHtml = response.html;

					thisPortList.waitForImages(function () {
						thisPortListInner.append(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});
						var portListHasArtciles = thisPortListInner.children().is(filterClassName) ? true : false;
						if (portListHasArtciles) {
							setTimeout(function () {
								eltdfResizePortfolioItems(thisPortListInner.find('.eltdf-pl-grid-sizer').width(), thisPortList);
								thisPortListInner.isotope('layout').isotope({filter: filterValue});
								loadingItem.removeClass('eltdf-showing eltdf-filter-trigger');

								setTimeout(function () {
									thisPortListInner.css('opacity', '1');
								}, 150);
							}, 400);
						} else {
							loadingItem.removeClass('eltdf-showing eltdf-filter-trigger');
							eltdfInitLoadMoreItemsPortfolioMasonryFilter(thisPortList, filterValue, filterClassName);
						}
					});
				}
			});
		}
	}

	/**
	 * Initializes portfolio load more function
	 */
	function eltdfInitPortfolioLoadMore() {
		var portList = $('.eltdf-portfolio-list-holder.eltdf-pl-has-load-more');

		if (portList.length) {
			portList.each(function () {

				var thisPortList = $(this),
					thisPortListInner = thisPortList.find('.eltdf-pl-inner'),
					nextPage,
					maxNumPages,
					loadMoreButton = thisPortList.find('.eltdf-pl-load-more a');

				if (typeof thisPortList.data('max-num-pages') !== 'undefined' && thisPortList.data('max-num-pages') !== false) {
					maxNumPages = thisPortList.data('max-num-pages');
				}

				loadMoreButton.on('click', function (e) {
					e.preventDefault();
					e.stopPropagation();

					var loadMoreDatta = eltdf.modules.common.getLoadMoreData(thisPortList),
						loadingItem = thisPortList.find('.eltdf-pl-loading');

					nextPage = loadMoreDatta.nextPage;

					if (nextPage <= maxNumPages) {
						loadingItem.addClass('eltdf-showing');
						var ajaxData = eltdf.modules.common.setLoadMoreAjaxData(loadMoreDatta, 'eltd_core_portfolio_ajax_load_more');

						$.ajax({
							type: 'POST',
							data: ajaxData,
							url: eltdfAjaxUrl,
							success: function (data) {
								nextPage++;
								thisPortList.data('next-page', nextPage);
								var response = $.parseJSON(data),
									responseHtml = response.html;

								thisPortList.waitForImages(function () {
									thisPortListInner.append(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});
									loadingItem.removeClass('eltdf-showing');

									setTimeout(function () {
										eltdfResizePortfolioItems(thisPortListInner.find('.eltdf-pl-grid-sizer').width(), thisPortList);
										thisPortListInner.isotope('layout');
										eltdfInitPortfolioListAnimation();
									}, 1000);

									if (thisPortList.hasClass('.eltdf-pl-has-filter')) {
										var filterName = $(".eltdf-pl-current").data("filter");
										thisPortList.find('.eltdf-pl-item').css("visibility", "hidden");
										thisPortList.find('.eltdf-pl-item' + filterName).css("visibility", "visible");
									}

								});
							}
						});
					}

					if (nextPage === maxNumPages) {
						loadMoreButton.parents('.eltdf-pl-load-more-holder').hide();
					}
				});
			});

		}
	}

	/*
	 ** Initializes portfolio infinite scroll function
	 */
	function eltdfInitPortfolioInfiniteScroll() {

		var portList = $('.eltdf-portfolio-list-holder.eltdf-pl-has-infinite-scroll');

		if (portList.length && !portList.hasClass('eltdf-pl-has-load-more')) {
			portList.each(function () {

				var thisPortList = $(this),
					thisPortListInner = thisPortList.find('.eltdf-pl-inner'),
					nextPage = 0,
					maxNumPages = 0,
					portListHeight = 0,
					portListTopOffest = thisPortList.offset().top;

				if (typeof thisPortList.data('max-num-pages') !== 'undefined' && thisPortList.data('max-num-pages') !== false) {
					maxNumPages = thisPortList.data('max-num-pages');
				}

				if (eltdf.scroll >= (portListTopOffest + portListHeight - eltdfGlobalVars.vars.eltdfAddForAdminBar) && !thisPortListInner.hasClass('eltdf-pl-inifite-scroll-start')) {
					thisPortListInner.addClass('eltdf-pl-inifite-scroll-start');
					var loadMoreDatta = eltdf.modules.common.getLoadMoreData(thisPortList);
					nextPage = loadMoreDatta.nextPage;

					if (nextPage <= maxNumPages) {
						var ajaxData = eltdf.modules.common.setLoadMoreAjaxData(loadMoreDatta, 'eltd_core_portfolio_ajax_load_more');

						$.ajax({
							type: 'POST',
							data: ajaxData,
							url: eltdfAjaxUrl,
							success: function (data) {
								nextPage++;
								thisPortList.data('next-page', nextPage);

								portListHeight = thisPortListInner.outerHeight() * 0.7;

								var response = $.parseJSON(data),
									responseHtml = response.html;

								thisPortList.waitForImages(function () {
									thisPortListInner.append(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});

									setTimeout(function () {
										eltdfResizePortfolioItems(thisPortListInner.find('.eltdf-pl-grid-sizer').width(), thisPortList);
										thisPortListInner.isotope('layout');
										thisPortListInner.removeClass('eltdf-pl-inifite-scroll-start');
										eltdfInitPortfolioListAnimation();
									}, 400);
								});
							}
						});
					}
				}
			});
		}
	}

	/**
	 * Initializes portfolio slider
	 */
	function eltdfInitPortfolioSlider() {
		var portSlider = $('.eltdf-portfolio-slider-holder');

		if (portSlider.length) {
			portSlider.each(function () {
				var thisPortSlider = $(this),
					portHolder = thisPortSlider.children('.eltdf-portfolio-list-holder'),
					portSlider = portHolder.children('.eltdf-pl-inner'),
					numberOfItems = 4,
					margin = 0,
					marginLabel,
					sliderSpeed = 5000,
					loop = true,
					autoWidth = false,
					padding = false,
					navigation = true,
					pagination = true,
					holderPadding = 0;

				if (typeof portHolder.data('number-of-columns') !== 'undefined' && portHolder.data('number-of-columns') !== false) {
					numberOfItems = portHolder.data('number-of-columns');
				}

				if (typeof portHolder.data('space-between-items') !== 'undefined' && portHolder.data('space-between-items') !== false) {
					marginLabel = portHolder.data('space-between-items');

					if (marginLabel === 'large') {
						margin = 72;

						if (eltdf.windowWidth < 1025) {
							margin = 30;
						}

					} else if (marginLabel === 'normal') {
						margin = 30;
					} else if (marginLabel === 'small') {
						margin = 20;
					} else if (marginLabel === 'tiny') {
						margin = 10;
					} else {
						margin = 0;
					}
				}

				if (typeof portHolder.data('slider-speed') !== 'undefined' && portHolder.data('slider-speed') !== false) {
					sliderSpeed = portHolder.data('slider-speed');
				}
				if (typeof portHolder.data('loop') !== 'undefined' && portHolder.data('loop') !== false && portHolder.data('loop') === 'no') {
					loop = false;
				}
				if (typeof portHolder.data('enable-variable-width') !== 'undefined' && portHolder.data('enable-variable-width') !== false && portHolder.data('enable-variable-width') === 'yes') {
					autoWidth = true;
				}
				if (typeof portHolder.data('padding') !== 'undefined' && portHolder.data('padding') !== false && portHolder.data('padding') === 'yes') {
					padding = true;
				}
				if (typeof portHolder.data('navigation') !== 'undefined' && portHolder.data('navigation') !== false && portHolder.data('navigation') === 'no') {
					navigation = false;
				}
				if (typeof portHolder.data('pagination') !== 'undefined' && portHolder.data('pagination') !== false && portHolder.data('pagination') === 'no') {
					pagination = false;
				}

				if (padding) {
					holderPadding = thisPortSlider.outerWidth() * 0.1315789473684211;
				}

				var responsiveNumberOfItems1 = 1,
					responsiveNumberOfItems2 = 2,
					responsiveNumberOfItems3 = 3;

				if (numberOfItems < 3) {
					responsiveNumberOfItems1 = numberOfItems;
					responsiveNumberOfItems2 = numberOfItems;
					responsiveNumberOfItems3 = numberOfItems;
				}

				portSlider.owlCarousel({
					items: numberOfItems,
					margin: margin,
					loop: loop,
					autoWidth: autoWidth,
					autoplay: true,
					autoplayTimeout: sliderSpeed,
					autoplayHoverPause: true,
					smartSpeed: 800,
					stagePadding: holderPadding,
					nav: navigation,
					navText: [
						'<span class="eltdf-prev-icon"><span class="icon-arrows-left"></span></span>',
						'<span class="eltdf-next-icon"><span class="icon-arrows-right"></span></span>'
					],
					dots: pagination,
					responsive: {
						0: {
							items: responsiveNumberOfItems1,
							autoWidth: false,
							stagePadding: 0
						},
						600: {
							items: responsiveNumberOfItems2
						},
						768: {
							items: responsiveNumberOfItems3,
							autoWidth: autoWidth,
							stagePadding: holderPadding
						},
						1024: {
							items: numberOfItems
						}
					}
				});

				thisPortSlider.css('opacity', '1');
			});
		}
	}

	var eltdfPortfolioSingleFollow = function () {

		var info = $('.eltdf-follow-portfolio-info .small-images.eltdf-portfolio-single-holder .eltdf-portfolio-info-holder, .eltdf-follow-portfolio-info .small-slider.eltdf-portfolio-single-holder .eltdf-portfolio-info-holder');

		if (info.length) {
			var infoHolder = info.parent(),
				infoHolderOffset = infoHolder.offset().top,
				infoHolderHeight = infoHolder.height(),
				mediaHolder = $('.eltdf-portfolio-media'),
				mediaHolderHeight = mediaHolder.height(),
				header = $('.header-appear, .eltdf-fixed-wrapper'),
				headerHeight = (header.length) ? header.height() : 0;
		}

		var infoHolderPosition = function () {

			if (info.length) {

				if (mediaHolderHeight > infoHolderHeight) {
					if (eltdf.scroll > infoHolderOffset) {
						var marginTop = eltdf.scroll - infoHolderOffset + eltdfGlobalVars.vars.eltdfAddForAdminBar + headerHeight + 20; //20 px is for styling, spacing between header and info holder
						// if scroll is initially positioned below mediaHolderHeight
						if (marginTop + infoHolderHeight > mediaHolderHeight) {
							marginTop = mediaHolderHeight - infoHolderHeight;
						}
						info.animate({
							marginTop: marginTop
						});
					}
				}
			}
		};

		var recalculateInfoHolderPosition = function () {

			if (info.length) {
				if (mediaHolderHeight > infoHolderHeight) {
					if (eltdf.scroll > infoHolderOffset) {

						if (eltdf.scroll + headerHeight + eltdfGlobalVars.vars.eltdfAddForAdminBar + infoHolderHeight + 70 < infoHolderOffset + mediaHolderHeight) {    //70 to prevent mispositioning

							//Calculate header height if header appears
							if ($('.header-appear, .eltdf-fixed-wrapper').length) {
								headerHeight = $('.header-appear, .eltdf-fixed-wrapper').height();
							}
							info.stop().animate({
								marginTop: (eltdf.scroll - infoHolderOffset + eltdfGlobalVars.vars.eltdfAddForAdminBar + headerHeight + 20) //20 px is for styling, spacing between header and info holder
							});
							//Reset header height
							headerHeight = 0;
						}
						else {
							info.stop().animate({
								marginTop: mediaHolderHeight - infoHolderHeight
							});
						}
					} else {
						info.stop().animate({
							marginTop: 0
						});
					}
				}
			}
		};

		return {
			init: function () {
				infoHolderPosition();
				$(window).scroll(function () {
					recalculateInfoHolderPosition();
				});
			}
		};
	};

})(jQuery);

(function($) {
    'use strict';

    var woocommerce = {};
    eltdf.modules.woocommerce = woocommerce;

    woocommerce.eltdfInitQuantityButtons = eltdfInitQuantityButtons;
    woocommerce.eltdfInitSelect2 = eltdfInitSelect2;

    woocommerce.eltdfOnDocumentReady = eltdfOnDocumentReady;
    woocommerce.eltdfOnWindowLoad = eltdfOnWindowLoad;
    woocommerce.eltdfOnWindowResize = eltdfOnWindowResize;
    woocommerce.eltdfOnWindowScroll = eltdfOnWindowScroll;

    $(document).ready(eltdfOnDocumentReady);
    $(window).load(eltdfOnWindowLoad);
    $(window).resize(eltdfOnWindowResize);
    $(window).scroll(eltdfOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function eltdfOnDocumentReady() {
        eltdfInitQuantityButtons();
        eltdfInitSelect2();
        eltdfInitSingleProductLightbox();
	    eltdfInitPaginationFunctionality();
	    eltdfReinitWooStickySidebarOnTabClick();
	    eltdfInitSingleProductImageSwitchLogic();
	    eltdfInitSingleProductLightbox();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function eltdfOnWindowLoad() {
	    eltdfWooCommerceStickySidebar().init();
	    eltdfInitButtonLoading();
        eltdfInitProductListMasonryShortcode();
    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function eltdfOnWindowResize() {
        eltdfInitProductListMasonryShortcode();
    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function eltdfOnWindowScroll() {
    }
    

    /*  
		Adding to cart text when button is clicked
    */
    function eltdfInitButtonLoading() {
        $('.add_to_cart_button').on('click',function(){
            $(this).text(eltdfGlobalVars.vars.eltdAddingToCart);
        });
    }

    /*
    ** Init quantity buttons to increase/decrease products for cart
    */
    function eltdfInitQuantityButtons() {
    
        $(document).on( 'click', '.eltdf-quantity-minus, .eltdf-quantity-plus', function(e) {
            e.stopPropagation();

            var button = $(this),
                inputField = button.siblings('.eltdf-quantity-input'),
                step = parseFloat(inputField.data('step')),
                max = parseFloat(inputField.data('max')),
                minus = false,
                inputValue = parseFloat(inputField.val()),
                newInputValue;

            if (button.hasClass('eltdf-quantity-minus')) {
                minus = true;
            }

            if (minus) {
                newInputValue = inputValue - step;
                if (newInputValue >= 1) {
                    inputField.val(newInputValue);
                } else {
                    inputField.val(0);
                }
            } else {
                newInputValue = inputValue + step;
                if ( max === undefined ) {
                    inputField.val(newInputValue);
                } else {
                    if ( newInputValue >= max ) {
                        inputField.val(max);
                    } else {
                        inputField.val(newInputValue);
                    }
                }
            }

            inputField.trigger( 'change' );
        });
    }

    /*
    ** Init select2 script for select html dropdowns
    */
    function eltdfInitSelect2() {

        var orderByDropDown = $('.woocommerce-ordering .orderby');
        if (orderByDropDown.length) {
            orderByDropDown.select2({
                minimumResultsForSearch: Infinity
            });
        }

        if($('#calc_shipping_country').length) {
            $('#calc_shipping_country').select2();
        }

        if($('.cart-collaterals .shipping select#calc_shipping_state').length) {
            $('.cart-collaterals .shipping select#calc_shipping_state').select2();
        }
    }

    /*
     ** Init Product Single Pretty Photo attributes
     */
    function eltdfInitSingleProductLightbox() {
        var item = $('.eltdf-woo-single-page.eltdf-woo-single-has-pretty-photo .images .woocommerce-product-gallery__image');

        if (item.length) {
            item.children('a').attr('data-rel', 'prettyPhoto[woo_single_pretty_photo]');

            if (typeof eltdf.modules.common.eltdfPrettyPhoto === "function") {
                eltdf.modules.common.eltdfPrettyPhoto();
            }
        }
    }
	
	/*
	 ** Init pagination logic to add additional class for prev/next arrows
	 */
	function eltdfInitPaginationFunctionality() {
		var pagHolder = $('nav.woocommerce-pagination');
		
		if (pagHolder.length) {
			pagHolder.find('> ul > li').each(function(){
				var thisItem = $(this);
				
				if(thisItem.children('a').hasClass('prev')){
					thisItem.addClass('eltdf-prev-arrow');
				}
				if(thisItem.children('a').hasClass('next')){
					thisItem.addClass('eltdf-next-arrow');
				}
			});
		}
	}
	
	/*
	 ** Init sticky sidebar for single product page when single layout is sticky info
	 */
	function eltdfWooCommerceStickySidebar(){
		var sswHolder = $('.eltdf-single-product-summary');
		var headerHeightOffset = 0;
		var widgetTopOffset = 0;
		var widgetTopPosition = 0;
		var sidebarHeight = 0;
		var sidebarWidth = 0;
		var objectsCollection = [];
		
		function addObjectItems() {
			if (sswHolder.length){
				sswHolder.each(function(){
					var thisSswHolder = $(this);
					widgetTopOffset = thisSswHolder.offset().top;
					widgetTopPosition = thisSswHolder.position().top;
					sidebarHeight = thisSswHolder.children('.summary').outerHeight();
					sidebarWidth = thisSswHolder.width();
					
					objectsCollection.push({'object': thisSswHolder, 'offset': widgetTopOffset, 'position': widgetTopPosition, 'height': sidebarHeight, 'width': sidebarWidth});
				});
			}
		}
		
		function initStickySidebarWidget() {
			
			if (objectsCollection.length && eltdf.body.hasClass('eltdf-woo-sticky-holder-enabled')){
				$.each(objectsCollection, function(i){
					
					var thisSswHolder = objectsCollection[i]['object'];
					var thisWidgetTopOffset = objectsCollection[i]['offset'];
					var thisWidgetTopPosition = objectsCollection[i]['position'];
					var thisSidebarHeight = objectsCollection[i]['height'];
					var thisSidebarWidth = objectsCollection[i]['width'];
					
					if (eltdf.body.hasClass('eltdf-fixed-on-scroll')) {
						headerHeightOffset = 80;
						if ($('.eltdf-fixed-wrapper').hasClass('eltdf-fixed')) {
							headerHeightOffset = $('.eltdf-fixed-wrapper.eltdf-fixed').height();
						}
					} else {
						headerHeightOffset = $('.eltdf-page-header').height();
					}
					
					console.log(thisWidgetTopOffset);
					console.log(thisWidgetTopPosition);
					console.log(thisSidebarHeight);
					console.log(thisSidebarWidth);
					console.log(headerHeightOffset);
					
					if (eltdf.windowWidth > 1024) {
						
						var sidebarPosition = -(thisWidgetTopPosition - headerHeightOffset - eltdfGlobalVars.vars.eltdfAddForAdminBar - 10); // 10 is arbitrarily value for smooth sticky animation for first scroll
						var stickySidebarHeight = thisSidebarHeight - thisWidgetTopPosition;
						var summaryContentTopMargin = parseInt($('.eltdf-single-product-summary').css('margin-top'));
						var stickySidebarRowHolderHeight = thisSswHolder.parent().outerHeight() - 10 - summaryContentTopMargin; // 10 is arbitrarily value for smooth sticky animation for first scroll
						
						//move sidebar up when hits the end of section row
						var rowSectionEndInViewport = thisWidgetTopOffset - headerHeightOffset - thisWidgetTopPosition - eltdfGlobalVars.vars.eltdfTopBarHeight + stickySidebarRowHolderHeight;
						
						if ((eltdf.scroll >= thisWidgetTopOffset - headerHeightOffset) && thisSidebarHeight < stickySidebarRowHolderHeight) {
							if(thisSswHolder.children('.summary').hasClass('eltdf-sticky-sidebar-appeared')) {
								thisSswHolder.children('.summary.eltdf-sticky-sidebar-appeared').css({'top': sidebarPosition+'px'});
							} else {
								thisSswHolder.children('.summary').addClass('eltdf-sticky-sidebar-appeared').css({'position': 'fixed', 'top': sidebarPosition+'px', 'width': thisSidebarWidth, 'margin-top': '-10px'}).animate({'margin-top': '0'}, 200);
							}
							
							if (eltdf.scroll + stickySidebarHeight >= rowSectionEndInViewport) {
								thisSswHolder.children('.summary.eltdf-sticky-sidebar-appeared').css({'position': 'absolute', 'top': stickySidebarRowHolderHeight-stickySidebarHeight+sidebarPosition-headerHeightOffset+'px'});
							} else {
								thisSswHolder.children('.summary.eltdf-sticky-sidebar-appeared').css({'position': 'fixed', 'top': sidebarPosition+'px'});
							}
						} else {
							thisSswHolder.children('.summary').removeClass('eltdf-sticky-sidebar-appeared').css({'position': 'relative', 'top': '0',  'width': 'auto'});
						}
					} else {
						thisSswHolder.children('.summary').removeClass('eltdf-sticky-sidebar-appeared').css({'position': 'relative', 'top': '0',  'width': 'auto'});
					}
				});
			}
		}
		
		return {
			init: function() {
				addObjectItems();
				
				initStickySidebarWidget();
				
				$(window).scroll(function(){
					initStickySidebarWidget();
				});
			},
			reInit: initStickySidebarWidget
		};
	}
	
	/*
	 ** ReInit sticky sidebar logic when tabs are clicked on single product
	 */
	function eltdfReinitWooStickySidebarOnTabClick() {
		var item = $('.woocommerce-tabs ul.tabs>li a');
		
		if(item.length) {
			item.on('click', function(){
				if($(this).parents('.summary').hasClass('eltdf-sticky-sidebar-appeared')){
					$(this).parents('.summary').removeClass('eltdf-sticky-sidebar-appeared').css({'position': 'relative', 'top': '0',  'width': 'auto'});
					setTimeout(function(){
						eltdfWooCommerceStickySidebar().init();
					}, 100);
				} else {
					setTimeout(function(){
						eltdfWooCommerceStickySidebar().init();
					}, 100);
				}
			});
		}
	}
	
	/*
	 ** Init switch image logic for thumbnail and featured images on product single page
	 */
	function eltdfInitSingleProductImageSwitchLogic() {
		if(eltdf.body.hasClass('eltdf-woo-single-switch-image')){
			
			var thumbnailImage = $('.eltdf-woo-single-page .product .images .thumbnails > a'),
				featuredImage = $('.eltdf-woo-single-page .product .images .woocommerce-main-image');
			
			if(featuredImage.length) {
				featuredImage.on('click', function() {
					if($('div.pp_overlay').length) {
						$.prettyPhoto.close();
					}
					if(eltdf.body.hasClass('eltdf-disable-thumbnail-prettyphoto')){
						eltdf.body.removeClass('eltdf-disable-thumbnail-prettyphoto');
					}
					if(featuredImage.children('.eltdf-fake-featured-image').length){
						$('.eltdf-fake-featured-image').stop().animate({'opacity': '0'}, 300, function() {
							$(this).remove();
						});
					}
				});
			}
			
			if(thumbnailImage.length) {
				thumbnailImage.each(function(){
					var thisThumbnailImage = $(this),
						thisThumbnailImageSrc = thisThumbnailImage.attr('href');
					
					thisThumbnailImage.on('click', function() {
						if(!eltdf.body.hasClass('eltdf-disable-thumbnail-prettyphoto')){
							eltdf.body.addClass('eltdf-disable-thumbnail-prettyphoto');
						}
						
						if($('div.pp_overlay').length) {
							$.prettyPhoto.close();
						}
						if(thisThumbnailImageSrc !== '' && featuredImage !== '') {
							if (featuredImage.children('.eltdf-fake-featured-image').length) {
								$('.eltdf-fake-featured-image').remove();
							}
							featuredImage.append('<img itemprop="image" class="eltdf-fake-featured-image" src="' + thisThumbnailImageSrc + '" />');
						}
					});
				});
			}
		}
	}
	
	/*
	 ** Init Product List Masonry Shortcode Layout
	 */
	function eltdfInitProductListMasonryShortcode() {
		var container = $('.eltdf-pl-holder.eltdf-masonry-layout .eltdf-pl-outer');
		
		if(container.length) {
			container.each(function(){
				var thisContainer = $(this);
				
				thisContainer.waitForImages(function() {
					thisContainer.isotope({
						itemSelector: '.eltdf-pli',
						resizable: false,
						masonry: {
							columnWidth: '.eltdf-pl-sizer',
							gutter: '.eltdf-pl-gutter'
						}
					});
					
					thisContainer.isotope('layout');
					
					thisContainer.css('opacity', 1);
				});
			});
		}
	}

	/*
	 ** Init Product Single Pretty Photo attributes
	 */
	function eltdfInitSingleProductLightbox() {
		var item = $('.eltdf-woo-single-page:not(.eltdf-woo-single-switch-image) .images .woocommerce-product-gallery__image');
		
		if(item.length) {
			item.children('a').attr('data-rel', 'prettyPhoto[woo_single_pretty_photo]');
			
			if (typeof eltdf.modules.common.eltdfPrettyPhoto === "function") {
				eltdf.modules.common.eltdfPrettyPhoto();
			}
		}
	}

})(jQuery);