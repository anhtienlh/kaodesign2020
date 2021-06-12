<?php

if(!function_exists('ambient_elated_header_register_main_navigation')) {
    /**
     * Registers main navigation
     */
    function ambient_elated_header_register_main_navigation() {
        register_nav_menus(
            array(
                'main-navigation' => esc_html__('Main Navigation', 'ambient'),
                'vertical-navigation' => esc_html__('Vertical Navigation', 'ambient'),
                'mobile-navigation' => esc_html__('Mobile Navigation', 'ambient')
            )
        );
    }

    add_action('after_setup_theme', 'ambient_elated_header_register_main_navigation');
}

if(!function_exists('ambient_elated_is_top_bar_transparent')) {
    /**
     * Checks if top bar is transparent or not
     *
     * @return bool
     */
    function ambient_elated_is_top_bar_transparent() {
        $top_bar_enabled = ambient_elated_is_top_bar_enabled();

        $top_bar_bg_color = ambient_elated_options()->getOptionValue('top_bar_background_color');
        $top_bar_transparency = ambient_elated_options()->getOptionValue('top_bar_background_transparency');

        if($top_bar_enabled && $top_bar_bg_color !== '' && $top_bar_transparency !== '') {
            return $top_bar_transparency >= 0 && $top_bar_transparency < 1;
        }

        return false;
    }
}

if(!function_exists('ambient_elated_is_top_bar_completely_transparent')) {
    function ambient_elated_is_top_bar_completely_transparent() {
        $top_bar_enabled = ambient_elated_is_top_bar_enabled();

        $top_bar_bg_color = ambient_elated_options()->getOptionValue('top_bar_background_color');
        $top_bar_transparency = ambient_elated_options()->getOptionValue('top_bar_background_transparency');

        if($top_bar_enabled && $top_bar_bg_color !== '' && $top_bar_transparency !== '') {
            return $top_bar_transparency === '0';
        }

        return false;
    }
}

if(!function_exists('ambient_elated_is_top_bar_enabled')) {
    function ambient_elated_is_top_bar_enabled() {
        $top_bar_enabled = ambient_elated_get_meta_field_intersect('top_bar') === 'yes';

        return $top_bar_enabled;
    }
}

if(!function_exists('ambient_elated_get_top_bar_height')) {
    /**
     * Returns top bar height
     *
     * @return bool|int|void
     */
    function ambient_elated_get_top_bar_height() {
        if(ambient_elated_is_top_bar_enabled()) {
            $top_bar_height = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('top_bar_height'));

            return $top_bar_height !== '' ? intval($top_bar_height) : 30;
        }

        return 0;
    }
}

if(!function_exists('ambient_elated_get_header_behaviour')) {
    /**
     * Returns header behaviour
     *
     * @return bool|int|void
     */
    function ambient_elated_get_header_behaviour() {

        return ambient_elated_get_meta_field_intersect('header_behaviour');

    }
}

if(!function_exists('ambient_elated_get_sticky_header_height')) {
    /**
     * Returns top sticky header height
     *
     * @return bool|int|void
     */
    function ambient_elated_get_sticky_header_height() {
        //sticky menu height, needed only for sticky header on scroll up
        if(ambient_elated_get_meta_field_intersect('header_type') === 'header-standard' && in_array(ambient_elated_options()->getOptionValue('header_behaviour'), array('sticky-header-on-scroll-up'))) {

            $sticky_header_height = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('sticky_header_height'));

            return $sticky_header_height !== '' ? intval($sticky_header_height) : 60;
        }

        return 0;

    }
}

if(!function_exists('ambient_elated_get_sticky_header_height_of_complete_transparency')) {
    /**
     * Returns top sticky header height it is fully transparent. used in anchor logic
     *
     * @return bool|int|void
     */
    function ambient_elated_get_sticky_header_height_of_complete_transparency() {

        if(ambient_elated_get_meta_field_intersect('header_type') === 'header-standard') {
            $stickyHeaderTransparent = ambient_elated_options()->getOptionValue('sticky_header_background_color') !== '' && ambient_elated_options()->getOptionValue('sticky_header_transparency') === '0';

            if($stickyHeaderTransparent) {
                return 0;
            } else {
                $sticky_header_height = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('sticky_header_height'));

                return $sticky_header_height !== '' ? intval($sticky_header_height) : 60;
            }
        }

        return 0;
    }
}

if(!function_exists('ambient_elated_get_sticky_scroll_amount')) {
    /**
     * Returns top sticky scroll amount
     *
     * @return bool|int|void
     */
    function ambient_elated_get_sticky_scroll_amount() {

        //sticky menu scroll amount
        if(ambient_elated_get_meta_field_intersect('header_type') === 'header-standard' && in_array(ambient_elated_options()->getOptionValue('header_behaviour'), array('sticky-header-on-scroll-up','sticky-header-on-scroll-down-up'))) {

            $sticky_scroll_amount = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('scroll_amount_for_sticky'));

            return $sticky_scroll_amount !== '' ? intval($sticky_scroll_amount) : 0;
        }

        return 0;
    }
}

if(!function_exists('ambient_elated_get_sticky_scroll_amount_per_page')) {
    /**
     * Returns top sticky scroll amount
     *
     * @return bool|int|void
     */
    function ambient_elated_get_sticky_scroll_amount_per_page() {
        $post_id =  get_the_ID();
        //sticky menu scroll amount
        if(ambient_elated_get_meta_field_intersect('header_type') === 'header-standard' && in_array(ambient_elated_options()->getOptionValue('header_behaviour'), array('sticky-header-on-scroll-up','sticky-header-on-scroll-down-up'))) {

            $sticky_scroll_amount_per_page = ambient_elated_filter_px(get_post_meta($post_id, "eltdf_scroll_amount_for_sticky_meta", true));

            return $sticky_scroll_amount_per_page !== '' ? intval($sticky_scroll_amount_per_page) : 0;
        }

        return 0;
    }
}