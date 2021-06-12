(function($) {
    'use strict';

    var like = {};
    eltdf.modules.like = like;

    like.eltdfLikes = eltdfLikes;

    like.eltdfOnDocumentReady = eltdfOnDocumentReady;
    like.eltdfOnWindowLoad = eltdfOnWindowLoad;
    like.eltdfOnWindowResize = eltdfOnWindowResize;
    like.eltdfOnWindowScroll = eltdfOnWindowScroll;

    $(document).ready(eltdfOnDocumentReady);
    $(window).load(eltdfOnWindowLoad);
    $(window).resize(eltdfOnWindowResize);
    $(window).scroll(eltdfOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function eltdfOnDocumentReady() {
        eltdfLikes();
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
    

    function eltdfLikes() {

        $(document).on('click','.eltdf-like', function() {

            var likeLink = $(this),
                id = likeLink.attr('id'),
                type;

            if ( likeLink.hasClass('liked') ) {
                return false;
            }

            if(typeof likeLink.data('type') !== 'undefined') {
                type = likeLink.data('type');
            }

            var dataToPass = {
                action: 'ambient_elated_like',
                likes_id: id,
                type: type
            };

            var like = $.post(eltdfLike.ajaxurl, dataToPass, function( data ) {

                likeLink.html(data).addClass('liked').attr('title','You already like this!');

                if(type !== 'portfolio_list') {
                    likeLink.children('span').css('opacity',1);
                }

            });

            return false;
        });

    }


})(jQuery);