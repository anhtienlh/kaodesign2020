<?php 

add_action('add_meta_boxes','mwrpg_meta_init');

function mwrpg_meta_init(){
	add_meta_box('mwrpg_meta_box','Gallery Images','mwrpg_meta_form', 'mwrp_gallery' ,'normal','default');
}


function mwrpg_meta_form()
{
	global $post;
	wp_nonce_field(basename(__FILE__),'mwrpg_meta_box_nonce');
    ?>
    <div id="mwrpg_images" class="mwrp_gallery_images">
		<ul class="mwrp-gallery-data-list">
			<?php
				$imagesData = get_post_meta($post->ID, 'mwrpg_images', true);

				if (!empty($imagesData)) {
					foreach ($imagesData as $value) {
						if(file_exists(get_attached_file($value))){
						?>
							<li class='mwrp_gallery_listing'><img class="ng_gallery_img" src="<?php echo esc_url(wp_get_attachment_url($value)); ?>"><input type="hidden" name="mwrpg_images[]" value="<?php echo esc_html($value); ?>"><div class="img-option"><a href="<?php echo esc_url(wp_get_attachment_url($value)); ?>" class="thickbox dashicons dashicons-search alignleft"></a> <a class="dashicons dashicons-trash alignright remove-ngw-image"></a> </div></li>
						<?php	
						}
					}
				}
			?>
		</ul>
	</div>

	<!---Gallery images upload button -->
	<hr/>
	<button type="button" id="mwrpg_images_add" class="button button-primary button-large">Upload Image</button>
	
    <?php 
}

add_action('save_post','mwrp_gallery_meta_save', 10,2);

function mwrp_gallery_meta_save($post_id, $post){
	
	// check request and with authorization,
	if(!isset($_POST['mwrpg_meta_box_nonce']) || !wp_verify_nonce($_POST['mwrpg_meta_box_nonce'], basename(__FILE__))) {
		return $post_id;
	}

	// Is the user allowed to edit the post
	if(!current_user_can('edit_post', $post->ID)) {
		return $post_id;
	}

	// Check post type and save meta data
	if(get_post_type($post_id)=='mwrp_gallery'){
		
		// Submit meta data into mwrpg_images key
		update_post_meta($post_id, 'mwrpg_images', filter_var_array($_POST['mwrpg_images'],FILTER_SANITIZE_NUMBER_INT));
	}
} 