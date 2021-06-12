<?php do_action('ambient_elated_before_page_header'); ?>

<header class="eltdf-page-header" <?php ambient_elated_inline_style($menu_area_background_color); ?>>
    <div class="eltdf-menu-area" <?php ambient_elated_inline_style($menu_area_border_bottom); ?>>
		<?php do_action( 'ambient_elated_after_header_menu_area_html_open' )?>
        <?php if($full_screen_header_in_grid) : ?>
            <div class="eltdf-grid" <?php ambient_elated_inline_style($menu_area_border_bottom_grid); ?>>
        <?php endif; ?>
        <div class="eltdf-vertical-align-containers">
            <div class="eltdf-position-left">
                <div class="eltdf-position-left-inner">
                    <?php if(!$hide_logo) {
                        ambient_elated_get_logo();
                    } ?>
                </div>
            </div>
            <div class="eltdf-position-right">
                <div class="eltdf-position-right-inner">
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
        </div>
        <?php if($full_screen_header_in_grid) : ?>
            </div>
        <?php endif; ?>
    </div>
    <?php do_action('ambient_elated_end_of_page_header_html'); ?>
</header>

<?php do_action('ambient_elated_after_page_header'); ?>