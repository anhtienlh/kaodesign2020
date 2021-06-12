<div class="eltdf-testimonial-content" id="eltdf-testimonials-<?php echo esc_attr($current_id) ?>">
    <div class="eltdf-testimonial-text-holder">
        <?php if(!empty($title)) { ?>
            <h2 class="eltdf-testimonial-title"><?php echo esc_html($title); ?></h2>
        <?php } ?>
        <?php if(!empty($text)) { ?>
            <p class="eltdf-testimonial-text"><?php echo esc_html($text); ?></p>
        <?php } ?>
        <?php if(!empty($author)) { ?>
            <div class="eltdf-testimonial-author-holder">
                <h6 class="eltdf-testimonial-author"><?php echo esc_html($author); ?></h6>
                <?php if(!empty($position)) { ?>
                    <h6 class="eltdf-testimonial-position"><?php echo esc_html($position); ?></h6>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
    <?php if(has_post_thumbnail() && $show_image === 'yes') { ?>
        <div class="eltdf-testimonial-image">
            <?php echo get_the_post_thumbnail(get_the_ID(), array(66, 66)); ?>
        </div>
    <?php } ?>
</div>