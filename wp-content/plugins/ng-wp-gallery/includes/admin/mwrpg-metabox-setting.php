<?php 

add_action('add_meta_boxes','mwrp_gallery_layout_setting_init');

function mwrp_gallery_layout_setting_init(){
	add_meta_box('mwrp_gallery_layout_setting','Setting','mwrp_gallery_image_layout_setting', 'mwrp_gallery' ,'side','default');
}


function mwrp_gallery_image_layout_setting()
{
    global $post;
    wp_nonce_field(basename(__FILE__), "mwrp_gallery_meta_layout_box_nonce");
    
   ?>
   
   <strong >Layout - </strong>
            <select name="mwrp_gallery_layout">
                <?php 
                    $option_values = array('mwrpg-masonry'=>'Masonry Layout', 'mwrpg-masonry-scroll-load'=> 'Masonry with Scroll Load', 'mwrpg-grid'=>'Grid Layout');

                    foreach($option_values as $key => $value) 
                    {

                        if($key == get_post_meta($post->ID, "mwrp_gallery_layout", true))
                        {
                            ?>
                                <option selected value="<?php echo esc_html($key); ?>"><?php echo esc_html($value); ?></option>
                            <?php    
                        }
                        else
                        {
                            ?>
                                <option value="<?php echo esc_html($key); ?>"><?php echo esc_html($value); ?></option>
                            <?php
                        }
                    }
                ?>
            </select>
           <hr/>         
           <strong >Border: </strong> 
            <?php 
                $nwgBorder = get_post_meta($post->ID, "mwrp_gallery_border", true); 
            ?>         
                <input type="checkbox" name="mwrp_gallery_border" value="1" <?php checked( $nwgBorder != "" ); ?> />
            <hr/>
            <strong >Border Radius: </strong> 
            <?php 
                $nwgBorderRadius = get_post_meta($post->ID, "mwrp_gallery_border_radius", true); 
            ?>         
                <input type="checkbox" name="mwrp_gallery_border_radius" value="1" <?php checked( $nwgBorderRadius != "" ); ?> />
            <hr/>
            <strong >Shortcode: </strong>
            <input type="text" class="large-text" autocomplete="off" readonly="readonly" name="mwrp_gallery_shortcode" value='[mwrp_gallery id="<?php echo esc_html($post->ID); ?>"]' />
            
       <?php     

}

add_action('save_post','mwrp_gallery_layout_meta_save', 10,2);

function mwrp_gallery_layout_meta_save($post_id, $post){
	
	// check request and with authorization,
	if(!isset($_POST['mwrp_gallery_meta_layout_box_nonce']) || !wp_verify_nonce($_POST['mwrp_gallery_meta_layout_box_nonce'], basename(__FILE__))) {
		return $post_id;
	}

	// Is the user allowed to edit the post
	if(!current_user_can('edit_post', $post->ID)) {
		return $post_id;
	}

	// Check post type and save meta data
	if(get_post_type($post_id)=='mwrp_gallery'){
        // Submit meta data into nwg_images key
        
        $MwrpGalleryLayout = sanitize_text_field( $_POST['mwrp_gallery_layout']);
        update_post_meta($post_id, 'mwrp_gallery_layout', $MwrpGalleryLayout);

        $MwrpGalleryBorder = sanitize_text_field( $_POST['mwrp_gallery_border']);
        update_post_meta($post_id, 'mwrp_gallery_border', $MwrpGalleryBorder);

        $MwrpGalleryBorderRadius = sanitize_text_field( $_POST['mwrp_gallery_border_radius']);
        update_post_meta($post_id, 'mwrp_gallery_border_radius', $MwrpGalleryBorderRadius);
	}
} 