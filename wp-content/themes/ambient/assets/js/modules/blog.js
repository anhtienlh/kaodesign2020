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