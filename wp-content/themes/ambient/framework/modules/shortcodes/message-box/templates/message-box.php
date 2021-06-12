<div class="eltdf-message-box-holder <?php echo esc_attr($type); ?>" <?php echo ambient_elated_get_inline_style($holder_styles); ?>>
	<div class="eltdf-mb-inner">
		<?php if($type === 'eltdf-mb-with-icon'){
			$icon_html = ambient_elated_icon_collections()->renderIcon($icon, $icon_pack);
			?>
			<div class="eltdf-mb-icon"><?php echo ambient_elated_get_module_part( $icon_html ); ?></div>
		<?php } ?>
		<div class="eltdf-mb-text">
			<?php echo do_shortcode($content); ?>
		</div>
		<a href="#" class="eltdf-mb-close" <?php echo ambient_elated_get_inline_style($close_styles); ?>><i class="icon_close"></i></a>
	</div>
</div>