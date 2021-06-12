<?php

if(!function_exists('ambient_elated_get_footer_classes')) {
    /**
     * Return all footer classes
     *
     * @param $page_id
     *
     * @return string|void
     */
    function ambient_elated_get_footer_classes($page_id) {

        $footer_classes       = '';
        $footer_classes_array = array();

        if(get_post_meta($page_id, 'eltdf_disable_footer_meta', true) == 'yes') {
            $footer_classes_array[] = 'eltdf-disable-footer';
        }

        //is some class added to footer classes array?
        if(is_array($footer_classes_array) && count($footer_classes_array)) {
            //concat all classes and prefix it with class attribute
            $footer_classes = esc_attr(implode(' ', $footer_classes_array));
        }

        return $footer_classes;
    }
}

if(!function_exists('ambient_elated_footer_body_classes')) {
    /**
     * @param $classes
     *
     * @return array
     */
    function ambient_elated_footer_body_classes($classes) {
        $background_image     = ambient_elated_get_meta_field_intersect('footer_background_image', ambient_elated_get_page_id());
        $enable_image_on_page = get_post_meta(ambient_elated_get_page_id(), 'eltdf_enable_footer_image_meta', true);
        $is_footer_full_width = ambient_elated_options()->getOptionValue('footer_in_grid') !== 'yes';

        if($background_image !== '' && $enable_image_on_page !== 'yes') {
            $classes[] = 'eltdf-footer-with-bg-image';
        }

        if($is_footer_full_width) {
            $classes[] = 'eltdf-fullwidth-footer';
        }

        return $classes;
    }

    add_filter('body_class', 'ambient_elated_footer_body_classes');
}

if(!function_exists('ambient_elated_footer_top_classes')) {
    /**
     * Return classes for footer top
     *
     * @return string
     */
    function ambient_elated_footer_top_classes() {

        $footer_top_classes = array();

        if(ambient_elated_options()->getOptionValue('footer_in_grid') != 'yes') {
            $footer_top_classes[] = 'eltdf-footer-top-full';
        }

        //footer aligment
        if(ambient_elated_options()->getOptionValue('footer_top_columns_alignment') != '') {
            $footer_top_classes[] = 'eltdf-footer-top-alignment-'.ambient_elated_options()->getOptionValue('footer_top_columns_alignment');
        }

        return implode(' ', $footer_top_classes);
    }
}

if(!function_exists('ambient_elated_footer_bottom_classes')) {
    /**
     * Return classes for footer bottom
     *
     * @return string
     */
    function ambient_elated_footer_bottom_classes() {

        $footer_bottom_classes = array();

        if(ambient_elated_options()->getOptionValue('footer_in_grid') != 'yes') {
            $footer_bottom_classes[] = 'eltdf-footer-bottom-full';
        }

        //footer aligment
        if(ambient_elated_options()->getOptionValue('footer_bottom_columns_alignment') != '') {
            $footer_bottom_classes[] = 'eltdf-footer-bottom-alignment-'.ambient_elated_options()->getOptionValue('footer_bottom_columns_alignment');
        }

        return implode(' ', $footer_bottom_classes);
    }
}

if(!function_exists('ambient_elated_footer_page_styles')) {
    /**
     * @param $style
     *
     * @return array
     */
    function ambient_elated_footer_page_styles($style) {

        $background_image = get_post_meta(ambient_elated_get_page_id(), 'eltdf_footer_background_image_meta', true);
        $page_prefix      = ambient_elated_get_unique_page_class();

        if($background_image !== '') {
            $footer_bg_image_style_array['background-image'] = 'url('.$background_image.')';

            $style .= ambient_elated_dynamic_css('body.eltdf-footer-with-bg-image'.$page_prefix.' .eltdf-footer-top-holder', $footer_bg_image_style_array);
        }

        return $style;
    }

    add_filter('ambient_elated_add_page_custom_style', 'ambient_elated_footer_page_styles');
}