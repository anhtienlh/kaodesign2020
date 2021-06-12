<div class="eltdf-gallery-blocks-holder <?php echo esc_attr($holder_classes); ?>">
    <?php
        $rand = rand(0,1000);
        $i = 1;
    ?>
    <div class="eltdf-gb-images">
        <?php foreach ($images as $image) { ?>
	        <?php if($i === 1 && $featured_image_size !== 'no-image') { ?>
	            <div class="eltdf-gb-image eltdf-gb-featured-image">
            <?php } else { ?>
                <div class="eltdf-gb-image">
            <?php } ?>
	                <?php if ($enable_lightbox) { ?>
	                    <a itemprop="image" href="<?php echo esc_url($image['url'])?>" data-rel="prettyPhoto[gallery_blocks_pp-<?php echo esc_attr($rand); ?>]" title="<?php echo esc_attr($image['alt']); ?>">
                    <?php } ?>
	                        <?php
		                        if($i === 1 && $featured_image_size !== 'no-image') {
		                            if(is_array($featured_image_size) && count($featured_image_size)) {
		                                echo ambient_elated_generate_thumbnail($image['id'], null, $featured_image_size[0], $featured_image_size[1]);
		                            } else {
		                                echo wp_get_attachment_image($image['id'], $featured_image_size);
		                            }
		                        } else {
		                            if(is_array($image_size) && count($image_size)) {
		                                echo ambient_elated_generate_thumbnail($image['id'], null, $image_size[0], $image_size[1]);
		                            } else {
		                                echo wp_get_attachment_image($image['id'], $image_size);
		                            }
		                        }
		                        $i++;
	                        ?>
                    <?php if ($enable_lightbox) { ?>
	                    </a>
	                <?php } ?>
                </div>
        <?php } ?>
    </div>
</div>