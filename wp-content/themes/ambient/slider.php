<?php
$ambient_elated_slider_shortcode = get_post_meta(ambient_elated_get_page_id(), 'eltdf_page_slider_meta', true);
if (!empty($ambient_elated_slider_shortcode)) { ?>
	<div class="eltdf-slider">
		<div class="eltdf-slider-inner">
			<?php echo do_shortcode(wp_kses_post($ambient_elated_slider_shortcode)); // XSS OK ?>
		</div>
	</div>
<?php } ?>