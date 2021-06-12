<?php do_action('ambient_elated_before_page_title'); ?>
<?php if($show_title_area) { ?>

    <div class="eltdf-title <?php echo ambient_elated_title_classes(); ?>" style="<?php echo esc_attr($title_height); echo esc_attr($title_background_color); echo esc_attr($title_background_image); ?>" data-height="<?php echo esc_attr(intval(preg_replace('/[^0-9]+/', '', $title_height), 10));?>" <?php echo esc_attr($title_background_image_width); ?>>
        <div class="eltdf-title-image"><?php if($title_background_image_src != ""){ ?><img itemprop="image" src="<?php echo esc_url($title_background_image_src); ?>" alt="<?php esc_attr_e('Image11', 'ambient'); ?>" /> <?php } ?></div>
        <div class="eltdf-title-holder" <?php ambient_elated_inline_style($title_holder_height); ?>>
            <div class="eltdf-container clearfix">
                <div class="eltdf-container-inner">
                    <div class="eltdf-title-subtitle-holder" style="<?php echo esc_attr($title_subtitle_holder_padding); ?>">
                    <?php switch ($type){
                        case 'standard': ?>
                            <h1 itemprop="name" class="eltdf-title-text entry-title" style="<?php echo esc_attr($title_font_size); echo esc_attr($title_color); ?>"><span><?php ambient_elated_title_text(); ?></span></h1>
                            <?php if($has_subtitle){ ?>
                                <h4 class="eltdf-subtitle" <?php ambient_elated_inline_style($subtitle_color); ?>><span><?php ambient_elated_subtitle_text(); ?></span></h4>
                            <?php } ?>
                        <?php break;
                        case 'breadcrumbs': ?>
                            <h1 itemprop="name" class="eltdf-title-text entry-title" style="<?php echo esc_attr($title_font_size); echo esc_attr($title_color); ?>"><span><?php ambient_elated_title_text(); ?></span></h1>
                            <div class="eltdf-breadcrumbs-holder"><?php ambient_elated_custom_breadcrumbs(); ?></div>
                        <?php break;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>
<?php do_action('ambient_elated_after_page_title'); ?>