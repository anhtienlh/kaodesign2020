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