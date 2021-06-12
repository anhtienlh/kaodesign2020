<?php

/*
   Class: AmbientElatedClassMultipleImages
   A class that initializes Elated Multiple Images
*/
class AmbientElatedClassMultipleImages implements iAmbientElatedInterfaceRender {
	private $name;
	private $label;
	private $description;
	
	function __construct($name,$label="",$description="") {
		global $ambient_elated_global_Framework;
		$this->name = $name;
		$this->label = $label;
		$this->description = $description;
		$ambient_elated_global_Framework->eltdMetaBoxes->addOption($this->name,"");
	}

	public function render($factory) {
		global $post;
		?>

		<div class="eltdf-page-form-section">
			<div class="eltdf-field-desc">
				<h4><?php echo esc_html($this->label); ?></h4>
				<p><?php echo esc_html($this->description); ?></p>
			</div>
			<div class="eltdf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<ul class="eltd-gallery-images-holder clearfix">
								<?php
								$image_gallery_val = get_post_meta( $post->ID, $this->name , true );
								if($image_gallery_val!='' ) $image_gallery_array=explode(',',$image_gallery_val);

								if(isset($image_gallery_array) && count($image_gallery_array)!=0):
									foreach($image_gallery_array as $gimg_id):
										$gimage_wp = wp_get_attachment_image_src($gimg_id,'thumbnail', true);
										echo '<li class="eltd-gallery-image-holder"><img src="'.esc_url($gimage_wp[0]).'"/></li>';
									endforeach;
								endif;
								?>
							</ul>
							<input type="hidden" value="<?php echo esc_attr($image_gallery_val); ?>" id="<?php echo esc_attr( $this->name) ?>" name="<?php echo esc_attr( $this->name) ?>">
							<div class="eltdf-gallery-uploader">
								<a class="eltdf-gallery-upload-btn btn btn-sm btn-primary" href="javascript:void(0)"><?php esc_html_e('Upload', 'ambient'); ?></a>
								<a class="eltdf-gallery-clear-btn btn btn-sm btn-default pull-right" href="javascript:void(0)"><?php esc_html_e('Remove All', 'ambient'); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

/*
   Class: AmbientElatedClassImagesVideos
   A class that initializes Elated Images Videos
*/
class AmbientElatedClassImagesVideos implements iAmbientElatedInterfaceRender {
	private $label;
	private $description;
	
	function __construct($label="",$description="") {
		$this->label = $label;
		$this->description = $description;
	}

	public function render($factory) {
		global $post;
		?>
		
		<div class="eltdf_hidden_portfolio_images" style="display: none">
			<div class="eltdf-page-form-section">
				<div class="eltdf-field-desc">
					<h4><?php echo esc_html($this->label); ?></h4>
					<p><?php echo esc_html($this->description); ?></p>
				</div>
				<div class="eltdf-section-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-2">
								<em class="eltdf-field-description"><?php esc_html_e( 'Order Number', 'ambient' ); ?></em>
								<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfolioimgordernumber_x" name="portfolioimgordernumber_x" />
							</div>
							<div class="col-lg-10">
								<em class="eltdf-field-description"><?php esc_html_e( 'Image/Video title (only for gallery layout - Portfolio Style 6)', 'ambient' ); ?></em>
								<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfoliotitle_x" name="portfoliotitle_x" />
							</div>
						</div>
						<div class="row next-row">
							<div class="col-lg-12">
								<em class="eltdf-field-description"><?php esc_html_e( 'Image', 'ambient' ); ?></em>
								<div class="eltdf-media-uploader">
									<div style="display: none" class="eltdf-media-image-holder">
										<img src="" alt="<?php esc_attr_e('Image1', 'ambient'); ?>" class="eltdf-media-image img-thumbnail" />
									</div>
									<div style="display: none" class="eltdf-media-meta-fields">
										<input type="hidden" class="eltdf-media-upload-url" name="portfolioimg_x" id="portfolioimg_x" />
										<input type="hidden" class="eltdf-media-upload-height" name="eltd_options_theme[media-upload][height]" value="" />
										<input type="hidden" class="eltdf-media-upload-width" name="eltd_options_theme[media-upload][width]" value="" />
									</div>
									<a class="eltdf-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_attr_e('Select Image', 'ambient'); ?>" data-frame-button-text="<?php esc_attr_e('Select Image', 'ambient'); ?>"><?php esc_html_e('Upload', 'ambient'); ?></a>
									<a style="display: none;" href="javascript: void(0)" class="eltdf-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'ambient'); ?></a>
								</div>
							</div>
						</div>
						<div class="row next-row">
							<div class="col-lg-3">
								<em class="eltdf-field-description"><?php esc_html_e( 'Video type', 'ambient' ); ?></em>
								<select class="form-control eltdf-form-element eltdf-portfoliovideotype" name="portfoliovideotype_x" id="portfoliovideotype_x">
									<option value=""></option>
									<option value="youtube"><?php esc_html_e( 'Youtube', 'ambient' ); ?></option>
									<option value="vimeo"><?php esc_html_e( 'Vimeo', 'ambient' ); ?></option>
									<option value="self"><?php esc_html_e( 'Self hosted', 'ambient' ); ?></option>
								</select>
							</div>
							<div class="col-lg-3">
								<em class="eltdf-field-description"><?php esc_html_e( 'Video ID', 'ambient' ); ?></em>
								<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfoliovideoid_x" name="portfoliovideoid_x" />
							</div>
						</div>
						<div class="row next-row">
							<div class="col-lg-12">
								<em class="eltdf-field-description"><?php esc_html_e( 'Video image', 'ambient' ); ?></em>
								<div class="eltdf-media-uploader">
									<div style="display: none" class="eltdf-media-image-holder">
										<img src="" alt="<?php esc_attr_e('Image2', 'ambient'); ?>" class="eltdf-media-image img-thumbnail" />
									</div>
									<div style="display: none" class="eltdf-media-meta-fields">
										<input type="hidden" class="eltdf-media-upload-url" name="portfoliovideoimage_x" id="portfoliovideoimage_x" />
										<input type="hidden" class="eltdf-media-upload-height" name="eltd_options_theme[media-upload][height]" value="" />
										<input type="hidden" class="eltdf-media-upload-width" name="eltd_options_theme[media-upload][width]" value="" />
									</div>
									<a class="eltdf-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_attr_e('Select Image', 'ambient'); ?>" data-frame-button-text="<?php esc_attr_e('Select Image', 'ambient'); ?>"><?php esc_html_e('Upload', 'ambient'); ?></a>
									<a style="display: none;" href="javascript: void(0)" class="eltdf-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'ambient'); ?></a>
								</div>
							</div>
						</div>
						<div class="row next-row">
							<div class="col-lg-4">
								<em class="eltdf-field-description"><?php esc_html_e( 'Video webm', 'ambient' ); ?></em>
								<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfoliovideowebm_x" name="portfoliovideowebm_x" />
							</div>
							<div class="col-lg-4">
								<em class="eltdf-field-description"><?php esc_html_e( 'Video mp4', 'ambient' ); ?></em>
								<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfoliovideomp4_x" name="portfoliovideomp4_x" />
							</div>
							<div class="col-lg-4">
								<em class="eltdf-field-description"><?php esc_html_e( 'Video ogv', 'ambient' ); ?></em>
								<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfoliovideoogv_x" name="portfoliovideoogv_x" />
							</div>
						</div>
						<div class="row next-row">
							<div class="col-lg-12">
								<a class="eltdf_remove_image btn btn-sm btn-primary" href="/" onclick="javascript: return false;"><?php esc_html_e( 'Remove portfolio image/video', 'ambient' ); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
		$no = 1;
		$portfolio_images = get_post_meta( $post->ID, 'eltd_portfolio_images', true );
		if (count($portfolio_images)>1) {
			usort($portfolio_images, "ambient_elated_compare_portfolio_videos");
		}
		while (isset($portfolio_images[$no-1])) {
			$portfolio_image = $portfolio_images[$no-1];
			?>
			
			<div class="eltdf_portfolio_image" rel="<?php echo esc_attr($no); ?>" style="display: block;">
				<div class="eltdf-page-form-section">
					<div class="eltdf-field-desc">
						<h4><?php echo esc_html($this->label); ?></h4>
						<p><?php echo esc_html($this->description); ?></p>
					</div>
					<div class="eltdf-section-content">
						<div class="container-fluid">
							<div class="row">
								<div class="col-lg-2">
									<em class="eltdf-field-description"><?php esc_html_e( 'Order Number', 'ambient' ); ?></em>
									<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfolioimgordernumber_<?php echo esc_attr($no); ?>" name="portfolioimgordernumber[]" value="<?php echo isset($portfolio_image['portfolioimgordernumber']) ? esc_attr(stripslashes($portfolio_image['portfolioimgordernumber'])) : ""; ?>" />
								</div>
								<div class="col-lg-10">
									<em class="eltdf-field-description"><?php esc_html_e( 'Image/Video title (only for gallery layout - Portfolio Style 6)', 'ambient' ); ?></em>
									<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfoliotitle_<?php echo esc_attr($no); ?>" name="portfoliotitle[]" value="<?php echo isset($portfolio_image['portfoliotitle']) ? esc_attr(stripslashes($portfolio_image['portfoliotitle'])) : ""; ?>" />
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-12">
									<em class="eltdf-field-description"><?php esc_html_e( 'Image', 'ambient' ); ?></em>
									<div class="eltdf-media-uploader">
										<div<?php if (stripslashes($portfolio_image['portfolioimg']) == false) { ?> style="display: none"<?php } ?> class="eltdf-media-image-holder">
											<img src="<?php if (stripslashes($portfolio_image['portfolioimg']) == true) { echo esc_url(ambient_elated_generate_filename(stripslashes($portfolio_image['portfolioimg']),get_option( 'thumbnail' . '_size_w' ),get_option( 'thumbnail' . '_size_h' ))); } ?>" alt="<?php esc_attr_e('Image3', 'ambient'); ?>" class="eltdf-media-image img-thumbnail" />
										</div>
										<div style="display: none" class="eltdf-media-meta-fields">
											<input type="hidden" class="eltdf-media-upload-url" name="portfolioimg[]" id="portfolioimg_<?php echo esc_attr($no); ?>" value="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>"/>
											<input type="hidden" class="eltdf-media-upload-height" name="eltd_options_theme[media-upload][height]" value="" />
											<input type="hidden" class="eltdf-media-upload-width" name="eltd_options_theme[media-upload][width]" value="" />
										</div>
										<a class="eltdf-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_attr_e('Select Image', 'ambient'); ?>" data-frame-button-text="<?php esc_attr_e('Select Image', 'ambient'); ?>"><?php esc_html_e('Upload', 'ambient'); ?></a>
										<a style="display: none;" href="javascript: void(0)" class="eltdf-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'ambient'); ?></a>
									</div>
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-3">
									<em class="eltdf-field-description"><?php esc_html_e( 'Video type', 'ambient' ); ?></em>
									<select class="form-control eltdf-form-element eltdf-portfoliovideotype" name="portfoliovideotype[]" id="portfoliovideotype_<?php echo esc_attr($no); ?>">
										<option value=""></option>
										<option <?php if ($portfolio_image['portfoliovideotype'] == "youtube") { echo "selected='selected'"; } ?>  value="youtube"><?php esc_html_e( 'Youtube', 'ambient' ); ?></option>
										<option <?php if ($portfolio_image['portfoliovideotype'] == "vimeo") { echo "selected='selected'"; } ?>  value="vimeo"><?php esc_html_e( 'Vimeo', 'ambient' ); ?></option>
										<option <?php if ($portfolio_image['portfoliovideotype'] == "self") { echo "selected='selected'"; } ?>  value="self"><?php esc_html_e( 'Self hosted', 'ambient' ); ?></option>
									</select>
								</div>
								<div class="col-lg-3">
									<em class="eltdf-field-description"><?php esc_html_e( 'Video ID', 'ambient' ); ?></em>
									<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfoliovideoid_<?php echo esc_attr($no); ?>" name="portfoliovideoid[]" value="<?php echo isset($portfolio_image['portfoliovideoid']) ? esc_attr(stripslashes($portfolio_image['portfoliovideoid'])) : ""; ?>" />
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-12">
									<em class="eltdf-field-description"><?php esc_html_e( 'Video image', 'ambient' ); ?></em>
									<div class="eltdf-media-uploader">
										<div<?php if (stripslashes($portfolio_image['portfoliovideoimage']) == false) { ?> style="display: none"<?php } ?> class="eltdf-media-image-holder">
											<img src="<?php if (stripslashes($portfolio_image['portfoliovideoimage']) == true) { echo esc_url(ambient_elated_generate_filename(stripslashes($portfolio_image['portfoliovideoimage']),get_option( 'thumbnail' . '_size_w' ),get_option( 'thumbnail' . '_size_h' ))); } ?>" alt="<?php esc_attr_e('Image4', 'ambient'); ?>" class="eltdf-media-image img-thumbnail"/>
										</div>
										<div style="display: none" class="eltdf-media-meta-fields">
											<input type="hidden" class="eltdf-media-upload-url" name="portfoliovideoimage[]" id="portfoliovideoimage_<?php echo esc_attr($no); ?>" value="<?php echo stripslashes($portfolio_image['portfoliovideoimage']); ?>"/>
											<input type="hidden" class="eltdf-media-upload-height" name="eltd_options_theme[media-upload][height]" value=""/>
											<input type="hidden" class="eltdf-media-upload-width" name="eltd_options_theme[media-upload][width]" value=""/>
										</div>
										<a class="eltdf-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_attr_e('Select Image', 'ambient'); ?>" data-frame-button-text="<?php esc_attr_e('Select Image', 'ambient'); ?>"><?php esc_html_e('Upload', 'ambient'); ?></a>
										<a style="display: none;" href="javascript: void(0)" class="eltdf-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'ambient'); ?></a>
									</div>
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-4">
									<em class="eltdf-field-description"><?php esc_html_e( 'Video webm', 'ambient' ); ?></em>
									<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfoliovideowebm_<?php echo esc_attr($no); ?>" name="portfoliovideowebm[]" value="<?php echo isset($portfolio_image['portfoliovideowebm']) ? esc_attr(stripslashes($portfolio_image['portfoliovideowebm'])) : ""; ?>" />
								</div>
								<div class="col-lg-4">
									<em class="eltdf-field-description"><?php esc_html_e( 'Video mp4', 'ambient' ); ?></em>
									<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfoliovideomp4_<?php echo esc_attr($no); ?>" name="portfoliovideomp4[]" value="<?php echo isset($portfolio_image['portfoliovideomp4']) ? esc_attr(stripslashes($portfolio_image['portfoliovideomp4'])) : ""; ?>" />
								</div>
								<div class="col-lg-4">
									<em class="eltdf-field-description"><?php esc_html_e( 'Video ogv', 'ambient' ); ?></em>
									<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfoliovideoogv_<?php echo esc_attr($no); ?>" name="portfoliovideoogv[]" value="<?php echo isset($portfolio_image['portfoliovideoogv']) ? esc_attr(stripslashes($portfolio_image['portfoliovideoogv'])):""; ?>" />
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-12">
									<a class="eltdf_remove_image btn btn-sm btn-primary" href="/" onclick="javascript: return false;"><?php esc_html_e( 'Remove portfolio image/video', 'ambient' ); ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
			$no++;
		}
		?>
		<br />
		<a class="eltdf_add_image btn btn-sm btn-primary" onclick="javascript: return false;" href="/" ><?php esc_html_e( 'Add portfolio image/video', 'ambient' ); ?></a>
	<?php
	}
}

/*
   Class: AmbientElatedClassImagesVideos
   A class that initializes Elated Images Videos
*/
class AmbientElatedClassImagesVideosFramework implements iAmbientElatedInterfaceRender {
	private $label;
	private $description;

	function __construct($label="",$description="") {
		$this->label = $label;
		$this->description = $description;
	}

	public function render($factory) {
		global $post;
		?>
		
		<div class="eltdf-hidden-portfolio-images"  style="display: none">
			<div class="eltdf-portfolio-toggle-holder">
				<div class="eltdf-portfolio-toggle eltdf-toggle-desc">
					<span class="number">1</span><span class="eltdf-toggle-inner"><?php esc_html_e( 'Image - ', 'ambient' ); ?><em><?php esc_html_e( '(Order Number, Image Title)', 'ambient' ); ?></em></span>
				</div>
				<div class="eltdf-portfolio-toggle eltdf-portfolio-control">
					<span class="toggle-portfolio-media"><i class="fa fa-caret-up"></i></span>
					<a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="eltdf-portfolio-toggle-content">
				<div class="eltdf-page-form-section">
					<div class="eltdf-section-content">
						<div class="container-fluid">
							<div class="row">
								<div class="col-lg-2">
									<div class="eltdf-media-uploader">
										<em class="eltdf-field-description"><?php esc_html_e( 'Image ', 'ambient' ); ?></em>
										<div style="display: none" class="eltdf-media-image-holder">
											<img src="" alt="<?php esc_attr_e('Image5', 'ambient'); ?>" class="eltdf-media-image img-thumbnail">
										</div>
										<div class="eltdf-media-meta-fields">
											<input type="hidden" class="eltdf-media-upload-url" name="portfolioimg_x" id="portfolioimg_x">
											<input type="hidden" class="eltdf-media-upload-height" name="eltd_options_theme[media-upload][height]" value="">
											<input type="hidden" class="eltdf-media-upload-width" name="eltd_options_theme[media-upload][width]" value="">
										</div>
										<a class="eltdf-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_attr_e( 'Select Image', 'ambient' ); ?>" data-frame-button-text="Select Image"><?php esc_html_e( 'Upload', 'ambient' ); ?></a>
										<a style="display: none;" href="javascript: void(0)" class="eltdf-media-remove-btn btn btn-default btn-sm"><?php esc_html_e( 'Remove', 'ambient' ); ?></a>
									</div>
								</div>
								<div class="col-lg-2">
									<em class="eltdf-field-description"><?php esc_html_e( 'Order Number', 'ambient' ); ?></em>
									<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfolioimgordernumber_x" name="portfolioimgordernumber_x" >
								</div>
								<div class="col-lg-8">
									<em class="eltdf-field-description"><?php esc_html_e( 'Image Title (works only for Gallery portfolio type selected) ', 'ambient' ); ?></em>
									<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfoliotitle_x" name="portfoliotitle_x" >
								</div>
							</div>
							<input type="hidden" name="portfoliovideoimage_x" id="portfoliovideoimage_x">
							<input type="hidden" name="portfoliovideotype_x" id="portfoliovideotype_x">
							<input type="hidden" name="portfoliovideoid_x" id="portfoliovideoid_x">
							<input type="hidden" name="portfoliovideowebm_x" id="portfoliovideowebm_x">
							<input type="hidden" name="portfoliovideomp4_x" id="portfoliovideomp4_x">
							<input type="hidden" name="portfoliovideoogv_x" id="portfoliovideoogv_x">
							<input type="hidden" name="portfolioimgtype_x" id="portfolioimgtype_x" value="image">
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="eltdf-hidden-portfolio-videos"  style="display: none">
			<div class="eltdf-portfolio-toggle-holder">
				<div class="eltdf-portfolio-toggle eltdf-toggle-desc">
					<span class="number">2</span><span class="eltdf-toggle-inner"><?php esc_html_e( 'Video - ', 'ambient' ); ?><em><?php esc_html_e( '(Order Number, Video Title)', 'ambient' ); ?></em></span>
				</div>
				<div class="eltdf-portfolio-toggle eltdf-portfolio-control">
					<span class="toggle-portfolio-media"><i class="fa fa-caret-up"></i></span> <a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="eltdf-portfolio-toggle-content">
				<div class="eltdf-page-form-section">
					<div class="eltdf-section-content">
						<div class="container-fluid">
							<div class="row">
								<div class="col-lg-2">
									<div class="eltdf-media-uploader">
										<em class="eltdf-field-description"><?php esc_html_e( 'Cover Video Image ', 'ambient' ); ?></em>
										<div style="display: none" class="eltdf-media-image-holder">
											<img src="" alt="<?php esc_attr_e('Image6', 'ambient'); ?>" class="eltdf-media-image img-thumbnail">
										</div>
										<div style="display: none" class="eltdf-media-meta-fields">
											<input type="hidden" class="eltdf-media-upload-url" name="portfoliovideoimage_x" id="portfoliovideoimage_x">
											<input type="hidden" class="eltdf-media-upload-height" name="eltd_options_theme[media-upload][height]" value="">
											<input type="hidden" class="eltdf-media-upload-width" name="eltd_options_theme[media-upload][width]" value="">
										</div>
										<a class="eltdf-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_attr_e( 'Select Image', 'ambient' ); ?>" data-frame-button-text="Select Image"><?php esc_html_e( 'Upload', 'ambient' ); ?></a>
										<a style="display: none;" href="javascript: void(0)" class="eltdf-media-remove-btn btn btn-default btn-sm"><?php esc_html_e( 'Remove', 'ambient' ); ?></a>
									</div>
								</div>
								<div class="col-lg-10">
									<div class="row">
										<div class="col-lg-2">
											<em class="eltdf-field-description"><?php esc_html_e( 'Order Number', 'ambient' ); ?></em>
											<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfolioimgordernumber_x" name="portfolioimgordernumber_x" >
										</div>
										<div class="col-lg-10">
											<em class="eltdf-field-description"><?php esc_html_e( 'Video Title (works only for Gallery portfolio type selected)', 'ambient' ); ?></em>
											<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfoliotitle_x" name="portfoliotitle_x" >
										</div>
									</div>
									<div class="row next-row">
										<div class="col-lg-2">
											<em class="eltdf-field-description"><?php esc_html_e( 'Video type', 'ambient' ); ?></em>
											<select class="form-control eltdf-form-element eltdf-portfoliovideotype" name="portfoliovideotype_x" id="portfoliovideotype_x">
												<option value=""></option>
												<option value="youtube"><?php esc_html_e( 'Youtube', 'ambient' ); ?></option>
												<option value="vimeo"><?php esc_html_e( 'Vimeo', 'ambient' ); ?></option>
												<option value="self"><?php esc_html_e( 'Self hosted', 'ambient' ); ?></option>
											</select>
										</div>
										<div class="col-lg-2 eltdf-video-id-holder">
											<em class="eltdf-field-description" id="videoId"><?php esc_html_e( 'Video ID', 'ambient' ); ?></em>
											<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfoliovideoid_x" name="portfoliovideoid_x" >
										</div>
									</div>

									<div class="row next-row eltdf-video-self-hosted-path-holder">
										<div class="col-lg-4">
											<em class="eltdf-field-description"><?php esc_html_e( 'Video webm', 'ambient' ); ?></em>
											<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfoliovideowebm_x" name="portfoliovideowebm_x" >
										</div>
										<div class="col-lg-4">
											<em class="eltdf-field-description"><?php esc_html_e( 'Video mp4', 'ambient' ); ?></em>
											<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfoliovideomp4_x" name="portfoliovideomp4_x" >
										</div>
										<div class="col-lg-4">
											<em class="eltdf-field-description"><?php esc_html_e( 'Video ogv', 'ambient' ); ?></em>
											<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfoliovideoogv_x" name="portfoliovideoogv_x" >
										</div>
									</div>
								</div>
							</div>
							<input type="hidden" name="portfolioimg_x" id="portfolioimg_x">
							<input type="hidden" name="portfolioimgtype_x" id="portfolioimgtype_x" value="video">
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
		$no = 1;
		$portfolio_images = get_post_meta( $post->ID, 'eltd_portfolio_images', true );
		if (count(array($portfolio_images))>1) {
			usort($portfolio_images, "ambient_elated_compare_portfolio_videos");
		}
		while (isset($portfolio_images[$no-1])) {
			$portfolio_image = $portfolio_images[$no-1];
			if (isset($portfolio_image['portfolioimgtype']))
				$portfolio_img_type = $portfolio_image['portfolioimgtype'];
			else {
				if (stripslashes($portfolio_image['portfolioimg']) == true)
					$portfolio_img_type = "image";
				else
					$portfolio_img_type = "video";
			}
			if ($portfolio_img_type == "image") {
				?>

				<div class="eltdf-portfolio-images eltdf-portfolio-media" rel="<?php echo esc_attr($no); ?>">
					<div class="eltdf-portfolio-toggle-holder">
						<div class="eltdf-portfolio-toggle eltdf-toggle-desc">
							<span class="number"><?php echo esc_html($no); ?></span><span class="eltdf-toggle-inner"><?php esc_html_e( 'Image - ', 'ambient' ); ?><em>(<?php echo stripslashes($portfolio_image['portfolioimgordernumber']); ?>, <?php echo stripslashes($portfolio_image['portfoliotitle']); ?>)</em></span>
						</div>
						<div class="eltdf-portfolio-toggle eltdf-portfolio-control">
							<a href="#" class="toggle-portfolio-media"><i class="fa fa-caret-down"></i></a>
							<a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
						</div>
					</div>
					<div class="eltdf-portfolio-toggle-content" style="display: none">
						<div class="eltdf-page-form-section">
							<div class="eltdf-section-content">
								<div class="container-fluid">
									<div class="row">
										<div class="col-lg-2">
											<div class="eltdf-media-uploader">
												<em class="eltdf-field-description"><?php esc_html_e( 'Image ', 'ambient' ); ?></em>
												<div<?php if (stripslashes($portfolio_image['portfolioimg']) == false) { ?> style="display: none"<?php } ?> class="eltdf-media-image-holder">
													<img src="<?php if (stripslashes($portfolio_image['portfolioimg']) == true) { echo esc_url(ambient_elated_generate_filename(stripslashes($portfolio_image['portfolioimg']),get_option( 'thumbnail' . '_size_w' ),get_option( 'thumbnail' . '_size_h' ))); } ?>" alt="<?php esc_attr_e('Image7', 'ambient'); ?>" class="eltdf-media-image img-thumbnail"/>
												</div>
												<div style="display: none" class="eltdf-media-meta-fields">
													<input type="hidden" class="eltdf-media-upload-url" name="portfolioimg[]" id="portfolioimg_<?php echo esc_attr($no); ?>" value="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>"/>
													<input type="hidden" class="eltdf-media-upload-height" name="eltd_options_theme[media-upload][height]" value=""/>
													<input type="hidden" class="eltdf-media-upload-width" name="eltd_options_theme[media-upload][width]" value=""/>
												</div>
												<a class="eltdf-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_attr_e('Select Image', 'ambient'); ?>" data-frame-button-text="<?php esc_attr_e('Select Image', 'ambient'); ?>"><?php esc_html_e('Upload', 'ambient'); ?></a>
												<a style="display: none;" href="javascript: void(0)" class="eltdf-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'ambient'); ?></a>
											</div>
										</div>
										<div class="col-lg-2">
											<em class="eltdf-field-description"><?php esc_html_e( 'Order Number', 'ambient' ); ?></em>
											<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfolioimgordernumber_<?php echo esc_attr($no); ?>" name="portfolioimgordernumber[]" value="<?php echo isset($portfolio_image['portfolioimgordernumber']) ? esc_attr(stripslashes($portfolio_image['portfolioimgordernumber'])) : ""; ?>" >
										</div>
										<div class="col-lg-8">
											<em class="eltdf-field-description"><?php esc_html_e( 'Image Title (works only for Gallery portfolio type selected) ', 'ambient' ); ?></em>
											<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfoliotitle_<?php echo esc_attr($no); ?>" name="portfoliotitle[]" value="<?php echo isset($portfolio_image['portfoliotitle']) ? esc_attr(stripslashes($portfolio_image['portfoliotitle'])) : ""; ?>" >
										</div>
									</div>
									<input type="hidden" id="portfoliovideoimage_<?php echo esc_attr($no); ?>" name="portfoliovideoimage[]">
									<input type="hidden" id="portfoliovideotype_<?php echo esc_attr($no); ?>" name="portfoliovideotype[]">
									<input type="hidden" id="portfoliovideoid_<?php echo esc_attr($no); ?>" name="portfoliovideoid[]">
									<input type="hidden" id="portfoliovideowebm_<?php echo esc_attr($no); ?>" name="portfoliovideowebm[]">
									<input type="hidden" id="portfoliovideomp4_<?php echo esc_attr($no); ?>" name="portfoliovideomp4[]">
									<input type="hidden" id="portfoliovideoogv_<?php echo esc_attr($no); ?>" name="portfoliovideoogv[]">
									<input type="hidden" id="portfolioimgtype_<?php echo esc_attr($no); ?>" name="portfolioimgtype[]" value="image">
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php
			} else {
				?>
				<div class="eltdf-portfolio-videos eltdf-portfolio-media" rel="<?php echo esc_attr($no); ?>">
					<div class="eltdf-portfolio-toggle-holder">
						<div class="eltdf-portfolio-toggle eltdf-toggle-desc">
							<span class="number"><?php echo esc_html($no); ?></span><span class="eltdf-toggle-inner"><?php esc_html_e( 'Video - ', 'ambient' ); ?><em>(<?php echo stripslashes($portfolio_image['portfolioimgordernumber']); ?>, <?php echo stripslashes($portfolio_image['portfoliotitle']); ?></em>) </span>
						</div>
						<div class="eltdf-portfolio-toggle eltdf-portfolio-control">
							<a href="#" class="toggle-portfolio-media"><i class="fa fa-caret-down"></i></a> <a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
						</div>
					</div>
					<div class="eltdf-portfolio-toggle-content" style="display: none">
						<div class="eltdf-page-form-section">
							<div class="eltdf-section-content">
								<div class="container-fluid">
									<div class="row">
										<div class="col-lg-2">
											<div class="eltdf-media-uploader">
												<em class="eltdf-field-description"><?php esc_html_e( 'Cover Video Image ', 'ambient' ); ?></em>
												<div<?php if (stripslashes($portfolio_image['portfoliovideoimage']) == false) { ?> style="display: none"<?php } ?> class="eltdf-media-image-holder">
													<img src="<?php if (stripslashes($portfolio_image['portfoliovideoimage']) == true) { echo esc_url(ambient_elated_generate_filename(stripslashes($portfolio_image['portfoliovideoimage']),get_option( 'thumbnail' . '_size_w' ),get_option( 'thumbnail' . '_size_h' ))); } ?>" alt="<?php esc_attr_e('Image8', 'ambient'); ?>" class="eltdf-media-image img-thumbnail"/>
												</div>
												<div style="display: none" class="eltdf-media-meta-fields">
													<input type="hidden" class="eltdf-media-upload-url" name="portfoliovideoimage[]" id="portfoliovideoimage_<?php echo esc_attr($no); ?>" value="<?php echo stripslashes($portfolio_image['portfoliovideoimage']); ?>"/>
													<input type="hidden" class="eltdf-media-upload-height" name="eltd_options_theme[media-upload][height]" value=""/>
													<input type="hidden" class="eltdf-media-upload-width" name="eltd_options_theme[media-upload][width]" value=""/>
												</div>
												<a class="eltdf-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_attr_e('Select Image', 'ambient'); ?>" data-frame-button-text="<?php esc_attr_e('Select Image', 'ambient'); ?>"><?php esc_html_e('Upload', 'ambient'); ?></a>
												<a style="display: none;" href="javascript: void(0)" class="eltdf-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'ambient'); ?></a>
											</div>
										</div>
										<div class="col-lg-10">
											<div class="row">
												<div class="col-lg-2">
													<em class="eltdf-field-description"><?php esc_html_e( 'Order Number', 'ambient' ); ?></em>
													<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfolioimgordernumber_<?php echo esc_attr($no); ?>" name="portfolioimgordernumber[]" value="<?php echo isset($portfolio_image['portfolioimgordernumber']) ? esc_attr(stripslashes($portfolio_image['portfolioimgordernumber'])) : ""; ?>" >
												</div>
												<div class="col-lg-10">
													<em class="eltdf-field-description"><?php esc_html_e( 'Video Title (works only for Gallery portfolio type selected) ', 'ambient' ); ?></em>
													<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfoliotitle_<?php echo esc_attr($no); ?>" name="portfoliotitle[]" value="<?php echo isset($portfolio_image['portfoliotitle']) ? esc_attr(stripslashes($portfolio_image['portfoliotitle'])) : ""; ?>" >
												</div>
											</div>
											<div class="row next-row">
												<div class="col-lg-2">
													<em class="eltdf-field-description"><?php esc_html_e( 'Video Type', 'ambient' ); ?></em>
													<select class="form-control eltdf-form-element eltdf-portfoliovideotype" name="portfoliovideotype[]" id="portfoliovideotype_<?php echo esc_attr($no); ?>">
														<option value=""></option>
														<option <?php if ($portfolio_image['portfoliovideotype'] == "youtube") { echo "selected='selected'"; } ?>  value="youtube"><?php esc_html_e( 'Youtube', 'ambient' ); ?></option>
														<option <?php if ($portfolio_image['portfoliovideotype'] == "vimeo") { echo "selected='selected'"; } ?>  value="vimeo"><?php esc_html_e( 'Vimeo', 'ambient' ); ?></option>
														<option <?php if ($portfolio_image['portfoliovideotype'] == "self") { echo "selected='selected'"; } ?>  value="self"><?php esc_html_e( 'Self hosted', 'ambient' ); ?></option>
													</select>
												</div>
												<div class="col-lg-2 eltdf-video-id-holder">
													<em class="eltdf-field-description"><?php esc_html_e( 'Video ID', 'ambient' ); ?></em>
													<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfoliovideoid_<?php echo esc_attr($no); ?>" name="portfoliovideoid[]" value="<?php echo isset($portfolio_image['portfoliovideoid']) ? esc_attr(stripslashes($portfolio_image['portfoliovideoid'])) : ""; ?>" />
												</div>
											</div>

											<div class="row next-row eltdf-video-self-hosted-path-holder">
												<div class="col-lg-4">
													<em class="eltdf-field-description"><?php esc_html_e( 'Video webm', 'ambient' ); ?></em>
													<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfoliovideowebm_<?php echo esc_attr($no); ?>" name="portfoliovideowebm[]" value="<?php echo isset($portfolio_image['portfoliovideowebm'])? esc_attr(stripslashes($portfolio_image['portfoliovideowebm'])) : ""; ?>" />
												</div>
												<div class="col-lg-4">
													<em class="eltdf-field-description"><?php esc_html_e( 'Video mp4', 'ambient' ); ?></em>
													<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfoliovideomp4_<?php echo esc_attr($no); ?>" name="portfoliovideomp4[]" value="<?php echo isset($portfolio_image['portfoliovideomp4']) ? esc_attr(stripslashes($portfolio_image['portfoliovideomp4'])) : ""; ?>" />
												</div>
												<div class="col-lg-4">
													<em class="eltdf-field-description"><?php esc_html_e( 'Video ogv', 'ambient' ); ?></em>
													<input type="text" class="form-control eltdf-input eltdf-form-element" id="portfoliovideoogv_<?php echo esc_attr($no); ?>" name="portfoliovideoogv[]" value="<?php echo isset($portfolio_image['portfoliovideoogv']) ? esc_attr(stripslashes($portfolio_image['portfoliovideoogv'])) : ""; ?>" />
												</div>
											</div>
										</div>
									</div>
									<input type="hidden" id="portfolioimg_<?php echo esc_attr($no); ?>" name="portfolioimg[]">
									<input type="hidden" id="portfolioimgtype_<?php echo esc_attr($no); ?>" name="portfolioimgtype[]" value="video">
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php
			}
			$no++;
		}
		?>

		<div class="eltdf-portfolio-add">
			<a class="eltdf-add-image btn btn-sm btn-primary" href="#"><i class="fa fa-camera"></i><?php esc_html_e( ' Add Image', 'ambient' ); ?></a>
			<a class="eltdf-add-video btn btn-sm btn-primary" href="#"><i class="fa fa-video-camera"></i><?php esc_html_e( ' Add Video', 'ambient' ); ?></a>
			<a class="eltdf-toggle-all-media btn btn-sm btn-default pull-right" href="#"><?php esc_html_e( ' Expand All', 'ambient' ); ?></a>
		</div>
	<?php
	}
}

class AmbientElatedClassTwitterFramework implements  iAmbientElatedInterfaceRender {
    public function render($factory) {
        $twitterApi = ElatedfTwitterApi::getInstance();
        $message = '';

        if(!empty($_GET['oauth_token']) && !empty($_GET['oauth_verifier'])) {
            if(!empty($_GET['oauth_token'])) {
                update_option($twitterApi::AUTHORIZE_TOKEN_FIELD, $_GET['oauth_token']);
            }

            if(!empty($_GET['oauth_verifier'])) {
                update_option($twitterApi::AUTHORIZE_VERIFIER_FIELD, $_GET['oauth_verifier']);
            }

            $responseObj = $twitterApi->obtainAccessToken();
            if($responseObj->status) {
                $message = esc_html__('You have successfully connected with your Twitter account. If you have any issues fetching data from Twitter try reconnecting.', 'ambient');
            } else {
                $message = $responseObj->message;
            }
        }

        $buttonText = $twitterApi->hasUserConnected() ? esc_html__('Re-connect with Twitter', 'ambient') : esc_html__('Connect with Twitter', 'ambient');
    ?>
        <?php if($message !== '') { ?>
            <div class="alert alert-success" style="margin-top: 20px;">
                <span><?php echo esc_html($message); ?></span>
            </div>
        <?php } ?>
        <div class="eltdf-page-form-section" id="eltdf_enable_social_share">
            <div class="eltdf-field-desc">
                <h4><?php esc_html_e('Connect with Twitter', 'ambient'); ?></h4>
                <p><?php esc_html_e('Connecting with Twitter will enable you to show your latest tweets on your site', 'ambient'); ?></p>
            </div>
            <div class="eltdf-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <a id="eltdf-tw-request-token-btn" class="btn btn-primary" href="#"><?php echo esc_html($buttonText); ?></a>
                            <input type="hidden" data-name="current-page-url" value="<?php echo esc_url($twitterApi->buildCurrentPageURI()); ?>"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }
}

class AmbientElatedClassInstagramFramework implements  iAmbientElatedInterfaceRender {
    public function render($factory) {
        $instagram_api = ElatedfInstagramApi::getInstance();
        $message = '';

        //if code wasn't saved to database
		if(!get_option('eltdf_instagram_code')) {
			//check if code parameter is set in URL. That means that user has connected with Instagram
			if(!empty($_GET['code'])) {
				//update code option so we can use it later
				$instagram_api->storeCode();
				$instagram_api->getAccessToken();
				$message = esc_html__('You have successfully connected with your Instagram account. If you have any issues fetching data from Instagram try reconnecting.', 'ambient');
				
			} else {
				$instagram_api->storeCodeRequestURI();
			}
		}

		$buttonText = $instagram_api->hasUserConnected() ? esc_html__('Re-connect with Instagram', 'ambient') : esc_html__('Connect with Instagram', 'ambient');

    ?>
        <?php if($message !== '') { ?>
            <div class="alert alert-success" style="margin-top: 20px;">
                <span><?php echo esc_html($message); ?></span>
            </div>
        <?php } ?>
        <div class="eltdf-page-form-section" id="eltdf_enable_social_share">
            <div class="eltdf-field-desc">
                <h4><?php esc_html_e('Connect with Instagram', 'ambient'); ?></h4>
                <p><?php esc_html_e('Connecting with Instagram will enable you to show your latest photos on your site', 'ambient'); ?></p>
            </div>
            <div class="eltdf-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <a class="btn btn-primary" href="<?php echo esc_url($instagram_api->getAuthorizeUrl()); ?>"><?php echo esc_html($buttonText); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }
}

/*
   Class: AmbientElatedClassImagesVideos
   A class that initializes Elated Images Videos
*/
class AmbientElatedClassOptionsFramework implements iAmbientElatedInterfaceRender {
	private $label;
	private $description;


	function __construct($label="",$description="") {
		$this->label = $label;
		$this->description = $description;
	}

	public function render($factory) {
		global $post;
		?>

		<div class="eltdf-portfolio-additional-item-holder" style="display: none">
			<div class="eltdf-portfolio-toggle-holder">
				<div class="eltdf-portfolio-toggle eltdf-toggle-desc">
					<span class="number">1</span><span class="eltdf-toggle-inner"><?php esc_html_e( 'Additional Sidebar Item ', 'ambient' ); ?><em><?php esc_html_e( '(Order Number, Item Title)', 'ambient' ); ?></em></span>
				</div>
				<div class="eltdf-portfolio-toggle eltdf-portfolio-control">
					<span class="toggle-portfolio-item"><i class="fa fa-caret-up"></i></span>
					<a href="#" class="remove-portfolio-item"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="eltdf-portfolio-toggle-content">
				<div class="eltdf-page-form-section">
					<div class="eltdf-section-content">
						<div class="container-fluid">
							<div class="row">
								<div class="col-lg-2">
									<em class="eltdf-field-description"><?php esc_html_e( 'Order Number', 'ambient' ); ?></em>
									<input type="text" class="form-control eltdf-input eltdf-form-element" id="optionlabelordernumber_x" name="optionlabelordernumber_x" >
								</div>
								<div class="col-lg-10">
									<em class="eltdf-field-description"><?php esc_html_e( 'Item Title ', 'ambient' ); ?></em>
									<input type="text" class="form-control eltdf-input eltdf-form-element" id="optionLabel_x" name="optionLabel_x" >
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-12">
									<em class="eltdf-field-description"><?php esc_html_e( 'Item Text', 'ambient' ); ?></em>
									<textarea class="form-control eltdf-input eltdf-form-element" id="optionValue_x" name="optionValue_x" ></textarea>
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-12">
									<em class="eltdf-field-description"><?php esc_html_e( 'Enter Full URL for Item Text Link', 'ambient' ); ?></em>
									<input type="text" class="form-control eltdf-input eltdf-form-element" id="optionUrl_x" name="optionUrl_x" >
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		$no = 1;
		$portfolios = get_post_meta( $post->ID, 'eltd_portfolios', true );
		if (count((array)$portfolios)>1) {
			usort($portfolios, "ambient_elated_compare_portfolio_options");
		}
		while (isset($portfolios[$no-1])) {
			$portfolio = $portfolios[$no-1];
			?>
			<div class="eltdf-portfolio-additional-item" rel="<?php echo esc_attr($no); ?>">
				<div class="eltdf-portfolio-toggle-holder">
					<div class="eltdf-portfolio-toggle eltdf-toggle-desc">
						<span class="number"><?php echo esc_html($no); ?></span><span class="eltdf-toggle-inner"><?php esc_html_e( 'Additional Sidebar Item - ', 'ambient' ); ?><em>(<?php echo stripslashes($portfolio['optionlabelordernumber']); ?>, <?php echo stripslashes($portfolio['optionLabel']); ?>)</em></span>
					</div>
					<div class="eltdf-portfolio-toggle eltdf-portfolio-control">
						<span class="toggle-portfolio-item"><i class="fa fa-caret-down"></i></span>
						<a href="#" class="remove-portfolio-item"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="eltdf-portfolio-toggle-content" style="display: none">
					<div class="eltdf-page-form-section">
						<div class="eltdf-section-content">
							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-2">
										<em class="eltdf-field-description"><?php esc_html_e( 'Order Number', 'ambient' ); ?></em>
										<input type="text" class="form-control eltdf-input eltdf-form-element" id="optionlabelordernumber_<?php echo esc_attr($no); ?>" name="optionlabelordernumber[]" value="<?php echo isset($portfolio['optionlabelordernumber']) ? esc_attr(stripslashes($portfolio['optionlabelordernumber'])) : ""; ?>" >
									</div>
									<div class="col-lg-10">
										<em class="eltdf-field-description"><?php esc_html_e( 'Item Title ', 'ambient' ); ?></em>
										<input type="text" class="form-control eltdf-input eltdf-form-element" id="optionLabel_<?php echo esc_attr($no); ?>" name="optionLabel[]" value="<?php echo esc_attr(stripslashes($portfolio['optionLabel'])); ?>" >
									</div>
								</div>
								<div class="row next-row">
									<div class="col-lg-12">
										<em class="eltdf-field-description"><?php esc_html_e( 'Item Text', 'ambient' ); ?></em>
										<textarea class="form-control eltdf-input eltdf-form-element" id="optionValue_<?php echo esc_attr($no); ?>" name="optionValue[]" ><?php echo esc_attr(stripslashes($portfolio['optionValue'])); ?></textarea>
									</div>
								</div>
								<div class="row next-row">
									<div class="col-lg-12">
										<em class="eltdf-field-description"><?php esc_html_e( 'Enter Full URL for Item Text Link', 'ambient' ); ?></em>
										<input type="text" class="form-control eltdf-input eltdf-form-element" id="optionUrl_<?php echo esc_attr($no); ?>" name="optionUrl[]" value="<?php echo stripslashes($portfolio['optionUrl']); ?>" >
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
			$no++;
		}
		?>

		<div class="eltdf-portfolio-add">
			<a class="eltdf-add-item btn btn-sm btn-primary" href="#"><?php esc_html_e( ' Add New Item', 'ambient' ); ?></a>
			<a class="eltdf-toggle-all-item btn btn-sm btn-default pull-right" href="#"><?php esc_html_e( ' Expand All', 'ambient' ); ?></a>
		</div>
	<?php
	}
}