<?php $icon_html = ambient_elated_icon_collections()->renderIcon($icon, $icon_pack, $params); ?>
<div class="eltdf-icon-list-holder" <?php echo ambient_elated_get_inline_style($holder_styles); ?>>
	<div class="eltdf-il-icon-holder">
		<?php echo ambient_elated_get_module_part( $icon_html );	?>
	</div>
	<p class="eltdf-il-text" <?php echo ambient_elated_get_inline_style($title_styles); ?>> <?php echo esc_html($title); ?></p>
</div>