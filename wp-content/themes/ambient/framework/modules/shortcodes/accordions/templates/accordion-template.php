<<?php echo esc_attr($title_tag); ?> class="eltdf-title-holder">
    <span class="eltdf-accordion-mark">
		<span class="eltdf_icon_plus icon_plus"></span>
		<span class="eltdf_icon_minus icon_minus-06"></span>
	</span>
	<span class="eltdf-tab-title"><?php echo esc_html($title); ?></span>
</<?php echo esc_attr($title_tag); ?>>
<div class="eltdf-accordion-content">
	<div class="eltdf-accordion-content-inner">
		<?php echo do_shortcode($content); ?>
	</div>
</div>