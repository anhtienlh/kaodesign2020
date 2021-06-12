<?php

if(!function_exists('ambient_elated_title_classes')) {
    /**
     * Function that adds classes to title div.
     * All other functions are tied to it with add_filter function
     * @param array $classes array of classes
     */
    function ambient_elated_title_classes($classes = array()) {
        $classes = array();
        $classes = apply_filters('ambient_elated_title_classes', $classes);

        if(is_array($classes) && count($classes)) {
            echo implode(' ', $classes);
        }
    }
}

if(!function_exists('ambient_elated_title_type_class')) {
    /**
     * Function that adds class on title based on title type option
     * @param $classes original array of classes
     * @return array changed array of classes
     */
    function ambient_elated_title_type_class($classes) {
	    $title_type_meta = ambient_elated_get_meta_field_intersect('title_area_type');
	    if(!empty($title_type_meta)) {
		    $type = $title_type_meta;
	    } else {
		    $type = 'standard';
	    }

        $classes[] = 'eltdf-'.$type.'-type';

        return $classes;
    }

    add_filter('ambient_elated_title_classes', 'ambient_elated_title_type_class');
}

if(!function_exists('ambient_elated_title_background_image_classes')) {
    function ambient_elated_title_background_image_classes($classes) {
        //init variables
        $id                         = ambient_elated_get_page_id();
        $is_img_responsive 		    = '';
        $is_image_parallax		    = '';
        $is_image_parallax_array    = array('yes', 'yes_zoom');
        $show_title_img			    = true;
        $title_img				    = '';

        //is responsive image is set for current page?
        if(($meta_temp = get_post_meta($id, "eltdf_title_area_background_image_responsive_meta", true)) != "") {
            $is_img_responsive = $meta_temp;
        } else {
            //take value from theme options
            $is_img_responsive = ambient_elated_options()->getOptionValue('title_area_background_image_responsive');
        }

        //is title image chosen for current page?
        if(($meta_temp = get_post_meta($id, "eltdf_title_area_background_image_meta", true)) != ""){
            $title_img = $meta_temp;
        }else{
            //take image that is set in theme options
            $title_img = ambient_elated_options()->getOptionValue('title_area_background_image');
        }

        //is image set to be fixed for current page?
        if(($meta_temp = get_post_meta($id, "eltdf_title_area_background_image_parallax_meta", true)) != ""){
            $is_image_parallax = $meta_temp;
        }else{
            //take setting from theme options
            $is_image_parallax = ambient_elated_options()->getOptionValue('title_area_background_image_parallax');
        }

        //is title image hidden for current page?
        if(get_post_meta($id, "eltdf_hide_background_image_meta", true) == "yes") {
            $show_title_img = false;
        }

        //is title image set and visible?
        if($title_img !== '' && $show_title_img == true) {
            //is image not responsive and parallax title is set?
            $classes[] = 'eltdf-preload-background';
            $classes[] = 'eltdf-has-background';

            if($is_img_responsive == 'no' && in_array($is_image_parallax, $is_image_parallax_array)) {
                $classes[] = 'eltdf-has-parallax-background';

                if($is_image_parallax == 'yes_zoom') {
                    $classes[] = 'eltdf-zoom-out';
                }
            }

            //is image not responsive
            elseif($is_img_responsive == 'yes'){
                $classes[] = 'eltdf-has-responsive-background';
            }
        }

        return $classes;
    }

    add_filter('ambient_elated_title_classes', 'ambient_elated_title_background_image_classes');
}

if(!function_exists('ambient_elated_title_content_alignment_class')) {
    /**
     * Function that adds class on title based on title content alignmnt option
     * Could be left, centered or right
     * @param $classes original array of classes
     * @return array changed array of classes
     */
    function ambient_elated_title_content_alignment_class($classes) {

        //init variables
        $id                      = ambient_elated_get_page_id();
        $title_content_alignment = 'left';

        if(($meta_temp = get_post_meta($id, "eltdf_title_area_content_alignment_meta", true)) != "") {
            $title_content_alignment = $meta_temp;

        } else {
            $title_content_alignment = ambient_elated_options()->getOptionValue('title_area_content_alignment');
        }

        $classes[] = 'eltdf-content-'.$title_content_alignment.'-alignment';

        return $classes;

    }

    add_filter('ambient_elated_title_classes', 'ambient_elated_title_content_alignment_class');
}

if(!function_exists('ambient_elated_title_background_image_div_classes')) {
    function ambient_elated_title_background_image_div_classes($classes) {

        //init variables
        $id                         = ambient_elated_get_page_id();
        $is_img_responsive 		    = '';
        $show_title_img			    = true;
        $title_img				    = '';

        //is responsive image is set for current page?
        if(($meta_temp = get_post_meta($id, "eltdf_title_area_background_image_responsive_meta", true)) != "") {
            $is_img_responsive = $meta_temp;
        } else {
            //take value from theme options
            $is_img_responsive = ambient_elated_options()->getOptionValue('title_area_background_image_responsive');
        }

        //is title image chosen for current page?
        if(($meta_temp = get_post_meta($id, "eltdf_title_area_background_image_meta", true)) != ""){
            $title_img = $meta_temp;
        }else{
            //take image that is set in theme options
            $title_img = ambient_elated_options()->getOptionValue('title_area_background_image');
        }

        //is title image hidden for current page?
        if(get_post_meta($id, "eltdf_hide_background_image_meta", true) == "yes") {
            $show_title_img = false;
        }

        //is title image set, visible and responsive?
        if($title_img !== '' && $show_title_img == true) {

            //is image responsive?
            if($is_img_responsive == 'yes') {
                $classes[] = 'eltdf-title-image-responsive';
            }
            //is image not responsive?
            elseif($is_img_responsive == 'no') {
                $classes[] = 'eltdf-title-image-not-responsive';
            }
        }

        return $classes;
    }

    add_filter('ambient_elated_title_classes', 'ambient_elated_title_background_image_div_classes');
}

if(!function_exists('ambient_elated_title_font_override_class')) {
    /**
     * Function that adds class on title based on title font override options
     * @param $classes original array of classes
     * @return array changed array of classes
     */
    function ambient_elated_title_font_override_class($classes) {

        $title_font_override = false;

        if (!$title_font_override) {

            // Global font override
            $title_type_meta = ambient_elated_get_meta_field_intersect( 'title_area_type' );
            if ( ! empty( $title_type_meta ) ) {
                $title_type = $title_type_meta;
            } else {
                $title_type = 'standard';
            }

            $title_font_size_global = '';
            if ( $title_type == 'standard' ) {
                $title_font_size_global = ambient_elated_options()->getOptionValue( 'page_title_normal_fontsize' );
            } elseif ( $title_type == 'breadcrumbs' ) {
                $title_font_size_global = ambient_elated_options()->getOptionValue( 'page_title_fontsize' );
            }

            if ( ! empty( $title_font_size_global ) ) {
                $title_font_override = true;
            }
        }

        if (!$title_font_override) {

            // Local font override
            $title_font_size_meta = get_post_meta( get_the_ID(), "eltdf_title_text_font_size_meta", true );

            if ( ! empty( $title_font_size_meta ) ) {
                $title_font_override = true;
            }
        }

        if($title_font_override) {
            $classes[] = 'eltdf-title-custom-font-style';
        }

        return $classes;
    }

    add_filter('ambient_elated_title_classes', 'ambient_elated_title_font_override_class');
}