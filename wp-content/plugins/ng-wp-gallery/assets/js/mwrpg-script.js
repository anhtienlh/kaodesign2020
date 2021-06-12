(function($){

  jQuery('#mwrpg_images_add').click(function(e) {
    e.preventDefault();
  
    var imageFrame;
    if(imageFrame){
      imageFrame.open();
    }
    // Define image_frame as wp.media object
    imageFrame = wp.media({
        
        title: 'Select Image',
        multiple : true,
        library : {
          type : 'image',
        }
      });
      imageFrame.on( 'select', function(){
        var attachments = imageFrame.state().get('selection').toJSON();
         console.log(attachments);
          for(var i=0; i< attachments.length; i++){
            $('ul.mwrp-gallery-data-list').append("<li class='mwrp_gallery_listing'><img class='ng_gallery_img' src='"+attachments[i].url+"'/><input type='hidden' name='mwrpg_images[]' value='"+attachments[i].id+"'/><div class='img-option'><a href='"+attachments[i].url+"' class='thickbox dashicons dashicons-search alignleft'></a> <a class='dashicons dashicons-trash alignright remove-ngw-image'></a> </div></li>");
            
          }
      });
                  
    imageFrame.open();
  });

  // Remove image 
  $(document).on('click', '.img-option .remove-ngw-image', function(e) {
		e.preventDefault();
    
    $(this).parent().parent('.mwrp_gallery_listing').remove();
  });
  
  // Sortable implement on gallery images
  $( ".mwrp_gallery_images .mwrp-gallery-data-list" ).sortable();
  $( ".mwrp_gallery_images .mwrp-gallery-data-list" ).disableSelection();
  

})(jQuery);