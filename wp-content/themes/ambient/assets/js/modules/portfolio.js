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