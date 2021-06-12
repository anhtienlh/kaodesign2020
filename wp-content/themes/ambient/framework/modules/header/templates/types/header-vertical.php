<?php do_action('ambient_elated_before_page_header'); ?>

<aside class="eltdf-vertical-menu-area">
    <div class="eltdf-vertical-menu-area-inner <?php echo esc_attr($vertical_text_align_class); ?>">
        <div class="eltdf-vertical-area-background" <?php ambient_elated_inline_style(array($vertical_header_background_color,$vertical_header_opacity,$vertical_background_image)); ?>></div>
        <?php if(!$hide_logo) {
            ambient_elated_get_logo('vertical');
        } ?>
        
        <?php ambient_elated_get_vertical_main_menu(); ?>

        <div class="eltdf-vertical-area-widget-holder">
            <?php
                if(get_post_meta($page_id, 'eltdf_disable_header_widget_area_meta', 'true') !== 'yes') {
                    if(is_active_sidebar('eltdf-header-widget-area') && get_post_meta($page_id, 'eltdf_custom_header_sidebar_meta', true) === '') {
                        dynamic_sidebar('eltdf-header-widget-area');
                    } else if (get_post_meta($page_id, 'eltdf_custom_header_sidebar_meta', true) !== '') {
                        $sidebar = get_post_meta($page_id, 'eltdf_custom_header_sidebar_meta', true);
                        if (is_active_sidebar($sidebar)) {
                            dynamic_sidebar($sidebar);
                        }
                    }
                }
            ?>
        </div>
    </div>
</aside>

<?php do_action('ambient_elated_after_page_header'); ?>