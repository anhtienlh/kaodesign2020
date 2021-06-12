<div class="eltdf-price-table">
	<div class="eltdf-pt-inner" <?php echo ambient_elated_get_inline_style($holder_styles); ?>>
		<ul>
			<li class="eltdf-pt-title-holder">
				<span class="eltdf-pt-title" <?php echo ambient_elated_get_inline_style($title_styles); ?>><?php echo esc_html($title); ?></span>
			</li>
			<li class="eltdf-pt-prices">
				<sup class="eltdf-pt-value" <?php echo ambient_elated_get_inline_style($currency_styles); ?>><?php echo esc_html($currency); ?></sup>
				<span class="eltdf-pt-price" <?php echo ambient_elated_get_inline_style($price_styles); ?>><?php echo esc_html($price); ?></span>
				<h6 class="eltdf-pt-mark" <?php echo ambient_elated_get_inline_style($price_period_styles); ?>><?php echo esc_html($price_period); ?></h6>
			</li>
			<li class="eltdf-pt-content">
				<?php echo do_shortcode($content); ?>
			</li>
			<?php 
			if(!empty($button_text)) { ?>
				<li class="eltdf-pt-button <?php echo esc_attr($button_classes); ?>">
					<?php echo ambient_elated_get_button_html(array(
						'link' => $link,
						'text' => $button_text,
						'type' => $button_type
					)); ?>
				</li>				
			<?php } ?>
		</ul>
	</div>
</div>