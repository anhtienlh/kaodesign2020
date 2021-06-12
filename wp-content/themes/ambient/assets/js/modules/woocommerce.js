
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