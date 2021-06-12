<div class="eltdf-google-map-holder">
	<div class="eltdf-google-map" id="<?php echo esc_attr($map_id); ?>" <?php echo wp_kses($map_data, array('data')); ?>></div>
	<?php if ($scroll_wheel == 'no') { ?>
		<div class="eltdf-google-map-overlay"></div>
	<?php } ?>
</div>
