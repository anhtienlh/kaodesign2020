<div <?php ambient_elated_class_attribute($elements_holder_item_class) ?> <?php echo ambient_elated_get_inline_attrs($elements_holder_item_data); ?> <?php ambient_elated_inline_style($elements_holder_item_style) ?>>
    <?php if($link != '') { ?>
        <a class="eltdf-elements-holder-item-link" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>"></a>
    <?php } ?>
    <div class="eltdf-elements-holder-item-inner">
        <div class="eltdf-elements-holder-item-content <?php echo esc_attr($elements_holder_item_content_class); ?>" <?php ambient_elated_inline_style($elements_holder_item_content_style); ?>>
            <div class="eltdf-elements-holder-item-content-inner">
                <?php echo do_shortcode($content); ?>
            </div>
        </div>
    </div>
    <?php if ($zoom_effect == 'yes') { ?>
        <div class="eltdf-elements-holder-item-image-zoom" <?php echo ambient_elated_get_inline_style($background_image_div_styles) ?>></div>
    <?php } ?>
</div>