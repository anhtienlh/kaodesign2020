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