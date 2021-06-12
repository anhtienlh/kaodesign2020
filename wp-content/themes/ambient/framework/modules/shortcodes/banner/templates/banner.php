<div class="eltdf-banner-holder">
    <div class="eltdf-banner-image">
	    <?php echo wp_get_attachment_image($image, 'full'); ?>
    </div>
	<div class="eltdf-banner-overlay">
		<div class="eltdf-banner-text-holder">
			<div class="eltdf-banner-text-inner">
				<?php if(!empty($subtitle)) { ?>
					<<?php echo esc_attr($subtitle_tag); ?> class="eltdf-banner-subtitle" <?php echo ambient_elated_get_inline_style($subtitle_styles); ?>><?php echo esc_html($subtitle); ?></<?php echo esc_attr($subtitle_tag); ?>>
				<?php } ?>
				<?php if(!empty($title)) { ?>
					<<?php echo esc_attr($title_tag); ?> class="eltdf-banner-title" <?php echo ambient_elated_get_inline_style($title_styles); ?>><?php echo esc_html($title); ?></<?php echo esc_attr($title_tag); ?>>
				<?php } ?>
				<?php if(!empty($text)) { ?>
					<p class="eltdf-banner-text" <?php echo ambient_elated_get_inline_style($text_styles); ?>><?php echo esc_html($text); ?></p>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php if (!empty($link)) { ?>
		<a itemprop="url" class="eltdf-banner-link" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>"></a>
	<?php } ?>
</div>