<div class="eltdf-progress-bar">
    <<?php echo esc_attr($title_tag); ?> class="eltdf-pb-title-holder clearfix">
    <span class="eltdf-pb-title" <?php echo ambient_elated_inline_style($text_color_style) ?>><?php echo esc_html($title) ?></span>
    <span class="eltdf-pb-percent" <?php echo ambient_elated_inline_style($text_color_style) ?>>0</span>
</<?php echo esc_attr($title_tag) ?>>
<div class="eltdf-pb-content-holder" <?php echo ambient_elated_inline_style($inactive_bar_style) ?>>
    <div data-percentage=<?php echo esc_attr($percent) ?> class="eltdf-pb-content" <?php echo ambient_elated_inline_style($active_bar_style) ?>></div>
</div>
</div>