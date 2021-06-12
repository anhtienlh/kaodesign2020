<?php

if(!function_exists('ambient_elated_footer_top_general_styles')) {
    /**
     * Generates general custom styles for footer top area
     */
    function ambient_elated_footer_top_general_styles() {
        $item_styles = array();

        if(ambient_elated_options()->getOptionValue('footer_top_background_color')) {
            $item_styles['background-color'] = ambient_elated_options()->getOptionValue('footer_top_background_color');
        }

        echo ambient_elated_dynamic_css('footer .eltdf-footer-top-holder', $item_styles);
    }

    add_action('ambient_elated_style_dynamic', 'ambient_elated_footer_top_general_styles');
}

if(!function_exists('ambient_elated_footer_bottom_general_styles')) {
    /**
     * Generates general custom styles for footer bottom area
     */
    function ambient_elated_footer_bottom_general_styles() {
        $item_styles = array();
        if(ambient_elated_options()->getOptionValue('footer_bottom_height') !== '') {
            $item_styles['height'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('footer_bottom_height')).'px';
        }

        if(ambient_elated_options()->getOptionValue('footer_bottom_background_color')) {
            $item_styles['background-color'] = ambient_elated_options()->getOptionValue('footer_bottom_background_color');
        }

        if(ambient_elated_options()->getOptionValue('footer_bottom_border_top_color')) {
            $item_styles['border-top'] = '1px solid '.ambient_elated_options()->getOptionValue('footer_bottom_border_top_color');
        }

        echo ambient_elated_dynamic_css('footer .eltdf-footer-bottom-holder', $item_styles);
    }

    add_action('ambient_elated_style_dynamic', 'ambient_elated_footer_bottom_general_styles');
}

if(!function_exists('ambient_elated_footer_bg_image_styles')) {
    /**
     * Outputs background image styles for footer
     */
    function ambient_elated_footer_bg_image_styles() {
        $background_image = ambient_elated_options()->getOptionValue('footer_background_image');

        if($background_image !== '') {
            $footer_bg_image_styles['background-image'] = 'url('.$background_image.')';

            echo ambient_elated_dynamic_css('body.eltdf-footer-with-bg-image .eltdf-footer-top-holder', $footer_bg_image_styles);
        }
    }

    add_action('ambient_elated_style_dynamic', 'ambient_elated_footer_bg_image_styles');
}