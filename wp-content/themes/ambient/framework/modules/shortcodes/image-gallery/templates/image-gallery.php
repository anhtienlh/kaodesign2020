<?php $i = 0; ?>

<div class="eltdf-image-gallery">
	<div class="eltdf-ig-grid <?php echo esc_attr($gallery_classes); ?>">
        <?php $rand = rand(0,1000); ?>
		<?php foreach ($images as $image) { ?>
			<div class="eltdf-ig-image">
				<?php if ($pretty_photo) { ?>
					<a class="eltdf-ig-lightbox" href="<?php echo esc_url($image['url'])?>" data-rel="prettyPhoto[single_pretty_photo-<?php echo esc_attr($rand); ?>]" title="<?php echo esc_attr($image['title']); ?>">
				<?php } else if($enable_links){ ?>
	                <a class="eltdf-ig-link" href="<?php echo esc_url($links[$i++]) ?>" title="<?php echo esc_attr($image['title']); ?>" target="<?php echo esc_attr($custom_link_target); ?>">
	            <?php } ?>
					<?php if(is_array($image_size) && count($image_size)) : ?>
						<?php echo ambient_elated_generate_thumbnail($image['image_id'], null, $image_size[0], $image_size[1]); ?>
					<?php else: ?>
						<?php echo wp_get_attachment_image($image['image_id'], $image_size); ?>
					<?php endif; ?>
	            <?php if ($pretty_photo || $enable_links) { ?>
					</a>
				<?php } ?>
			</div>
		<?php } ?>
	</div>
</div>