<?php

if(!function_exists('ambient_elated_mobile_header_general_styles')) {
    /**
     * Generates general custom styles for mobile header
     */
    function ambient_elated_mobile_header_general_styles() {
        $mobile_header_styles = array();
        if(ambient_elated_options()->getOptionValue('mobile_header_height') !== '') {
            $mobile_header_styles['height'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('mobile_header_height')).'px';
        }

        if(ambient_elated_options()->getOptionValue('mobile_header_background_color')) {
            $mobile_header_styles['background-color'] = ambient_elated_options()->getOptionValue('mobile_header_background_color');
        }

        if(ambient_elated_options()->getOptionValue('mobile_header_border_bottom_color')) {
            $mobile_header_styles['border-color'] = ambient_elated_options()->getOptionValue('mobile_header_border_bottom_color');
        }

        echo ambient_elated_dynamic_css('.eltdf-mobile-header .eltdf-mobile-header-inner', $mobile_header_styles);
    }

    add_action('ambient_elated_style_dynamic', 'ambient_elated_mobile_header_general_styles');
}

if(!function_exists('ambient_elated_mobile_navigation_styles')) {
    /**
     * Generates styles for mobile navigation
     */
    function ambient_elated_mobile_navigation_styles() {
        $mobile_nav_styles = array();
        if(ambient_elated_options()->getOptionValue('mobile_menu_background_color')) {
            $mobile_nav_styles['background-color'] = ambient_elated_options()->getOptionValue('mobile_menu_background_color');
        }

        if(ambient_elated_options()->getOptionValue('mobile_menu_border_bottom_color')) {
            $mobile_nav_styles['border-color'] = ambient_elated_options()->getOptionValue('mobile_menu_border_bottom_color');
        }

        echo ambient_elated_dynamic_css('.eltdf-mobile-header .eltdf-mobile-nav', $mobile_nav_styles);

        $mobile_nav_item_styles = array();
        if(ambient_elated_options()->getOptionValue('mobile_menu_separator_color') !== '') {
            $mobile_nav_item_styles['border-bottom-color'] = ambient_elated_options()->getOptionValue('mobile_menu_separator_color');
        }

        if(ambient_elated_options()->getOptionValue('mobile_text_color') !== '') {
            $mobile_nav_item_styles['color'] = ambient_elated_options()->getOptionValue('mobile_text_color');
        }

        if(ambient_elated_is_font_option_valid(ambient_elated_options()->getOptionValue('mobile_font_family'))) {
            $mobile_nav_item_styles['font-family'] = ambient_elated_get_formatted_font_family(ambient_elated_options()->getOptionValue('mobile_font_family'));
        }

        if(ambient_elated_options()->getOptionValue('mobile_font_size') !== '') {
            $mobile_nav_item_styles['font-size'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('mobile_font_size')).'px';
        }

        if(ambient_elated_options()->getOptionValue('mobile_line_height') !== '') {
            $mobile_nav_item_styles['line-height'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('mobile_line_height')).'px';
        }

        if(ambient_elated_options()->getOptionValue('mobile_text_transform') !== '') {
            $mobile_nav_item_styles['text-transform'] = ambient_elated_options()->getOptionValue('mobile_text_transform');
        }

        if(ambient_elated_options()->getOptionValue('mobile_font_style') !== '') {
            $mobile_nav_item_styles['font-style'] = ambient_elated_options()->getOptionValue('mobile_font_style');
        }

        if(ambient_elated_options()->getOptionValue('mobile_font_weight') !== '') {
            $mobile_nav_item_styles['font-weight'] = ambient_elated_options()->getOptionValue('mobile_font_weight');
        }

        $mobile_nav_item_selector = array(
            '.eltdf-mobile-header .eltdf-mobile-nav .eltdf-grid > ul > li > a',
            '.eltdf-mobile-header .eltdf-mobile-nav .eltdf-grid > ul > li > h5'
        );

        echo ambient_elated_dynamic_css($mobile_nav_item_selector, $mobile_nav_item_styles);

        $mobile_nav_item_hover_styles = array();
        if(ambient_elated_options()->getOptionValue('mobile_text_hover_color') !== '') {
            $mobile_nav_item_hover_styles['color'] = ambient_elated_options()->getOptionValue('mobile_text_hover_color');
        }

        $mobile_nav_item_selector_hover = array(
            '.eltdf-mobile-header .eltdf-mobile-nav .eltdf-grid > ul > li.eltdf-active-item > a',
            '.eltdf-mobile-header .eltdf-mobile-nav .eltdf-grid > ul > li > a:hover',
            '.eltdf-mobile-header .eltdf-mobile-nav .eltdf-grid > ul > li > h5:hover'
        );

        echo ambient_elated_dynamic_css($mobile_nav_item_selector_hover, $mobile_nav_item_hover_styles);

        $mobile_nav_dropdown_item_styles = array();
        if(ambient_elated_options()->getOptionValue('mobile_menu_separator_color') !== '') {
            $mobile_nav_dropdown_item_styles['border-bottom-color'] = ambient_elated_options()->getOptionValue('mobile_menu_separator_color');
        }

        if(ambient_elated_options()->getOptionValue('mobile_dropdown_text_color') !== '') {
            $mobile_nav_dropdown_item_styles['color'] = ambient_elated_options()->getOptionValue('mobile_dropdown_text_color');
        }

        if(ambient_elated_is_font_option_valid(ambient_elated_options()->getOptionValue('mobile_dropdown_font_family'))) {
            $mobile_nav_dropdown_item_styles['font-family'] = ambient_elated_get_formatted_font_family(ambient_elated_options()->getOptionValue('mobile_dropdown_font_family'));
        }

        if(ambient_elated_options()->getOptionValue('mobile_dropdown_font_size') !== '') {
            $mobile_nav_dropdown_item_styles['font-size'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('mobile_dropdown_font_size')).'px';
        }

        if(ambient_elated_options()->getOptionValue('mobile_dropdown_line_height') !== '') {
            $mobile_nav_dropdown_item_styles['line-height'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('mobile_dropdown_line_height')).'px';
        }

        if(ambient_elated_options()->getOptionValue('mobile_dropdown_text_transform') !== '') {
            $mobile_nav_dropdown_item_styles['text-transform'] = ambient_elated_options()->getOptionValue('mobile_dropdown_text_transform');
        }

        if(ambient_elated_options()->getOptionValue('mobile_dropdown_font_style') !== '') {
            $mobile_nav_dropdown_item_styles['font-style'] = ambient_elated_options()->getOptionValue('mobile_dropdown_font_style');
        }

        if(ambient_elated_options()->getOptionValue('mobile_dropdown_font_weight') !== '') {
            $mobile_nav_dropdown_item_styles['font-weight'] = ambient_elated_options()->getOptionValue('mobile_dropdown_font_weight');
        }

        $mobile_nav_dropdown_item_selector = array(
            '.eltdf-mobile-header .eltdf-mobile-nav ul ul li a',
            '.eltdf-mobile-header .eltdf-mobile-nav ul ul li h5'
        );

        echo ambient_elated_dynamic_css($mobile_nav_dropdown_item_selector, $mobile_nav_dropdown_item_styles);

        $mobile_nav_dropdown_item_hover_styles = array();
        if(ambient_elated_options()->getOptionValue('mobile_dropdown_text_hover_color') !== '') {
            $mobile_nav_dropdown_item_hover_styles['color'] = ambient_elated_options()->getOptionValue('mobile_dropdown_text_hover_color');
        }

        $mobile_nav_dropdown_item_selector_hover = array(
            '.eltdf-mobile-header .eltdf-mobile-nav ul ul li.current-menu-ancestor > a',
            '.eltdf-mobile-header .eltdf-mobile-nav ul ul li.current-menu-item > a',
            '.eltdf-mobile-header .eltdf-mobile-nav ul ul li a:hover',
            '.eltdf-mobile-header .eltdf-mobile-nav ul ul li h5:hover'
        );

        echo ambient_elated_dynamic_css($mobile_nav_dropdown_item_selector_hover, $mobile_nav_dropdown_item_hover_styles);
    }

    add_action('ambient_elated_style_dynamic', 'ambient_elated_mobile_navigation_styles');
}

if(!function_exists('ambient_elated_mobile_logo_styles')) {
    /**
     * Generates styles for mobile logo
     */
    function ambient_elated_mobile_logo_styles() {
        if(ambient_elated_options()->getOptionValue('mobile_logo_height') !== '') { ?>
            @media only screen and (max-width: 1024px) {
            <?php echo ambient_elated_dynamic_css(
                '.eltdf-mobile-header .eltdf-mobile-logo-wrapper a',
                array('height' => ambient_elated_filter_px(ambient_elated_options()->getOptionValue('mobile_logo_height')).'px !important')
            ); ?>
            }
        <?php }

        if(ambient_elated_options()->getOptionValue('mobile_logo_height_phones') !== '') { ?>
            @media only screen and (max-width: 480px) {
            <?php echo ambient_elated_dynamic_css(
                '.eltdf-mobile-header .eltdf-mobile-logo-wrapper a',
                array('height' => ambient_elated_filter_px(ambient_elated_options()->getOptionValue('mobile_logo_height_phones')).'px !important')
            ); ?>
            }
        <?php }

        if(ambient_elated_options()->getOptionValue('mobile_header_height') !== '') {
            $max_height = intval(ambient_elated_filter_px(ambient_elated_options()->getOptionValue('mobile_header_height'))).'px';
            echo ambient_elated_dynamic_css('.eltdf-mobile-header .eltdf-mobile-logo-wrapper a', array('max-height' => $max_height));
        }
    }

    add_action('ambient_elated_style_dynamic', 'ambient_elated_mobile_logo_styles');
}

if(!function_exists('ambient_elated_mobile_icon_styles')) {
    /**
     * Generates styles for mobile icon opener
     */
    function ambient_elated_mobile_icon_styles() {
        $mobile_icon_styles = array();
	    $mobile_text_styles = array();
        if(ambient_elated_options()->getOptionValue('mobile_icon_color') !== '') {
            $mobile_icon_styles['background-color'] = ambient_elated_options()->getOptionValue('mobile_icon_color');
	        $mobile_text_styles['color'] = ambient_elated_options()->getOptionValue('mobile_icon_color');
        }

        echo ambient_elated_dynamic_css('.eltdf-mobile-header .eltdf-mobile-menu-opener a .eltdf-mo-lines .eltdf-mo-line', $mobile_icon_styles);
	    echo ambient_elated_dynamic_css('.eltdf-mobile-header .eltdf-mobile-menu-opener a .eltdf-mobile-menu-text', $mobile_text_styles);

        if(ambient_elated_options()->getOptionValue('mobile_icon_hover_color') !== '') {
            echo ambient_elated_dynamic_css(
                '.eltdf-mobile-header .eltdf-mobile-menu-opener a:hover .eltdf-mo-lines .eltdf-mo-line',
                array('background-color' => ambient_elated_options()->getOptionValue('mobile_icon_hover_color')));

	        echo ambient_elated_dynamic_css(
		        '.eltdf-mobile-header .eltdf-mobile-menu-opener a:hover .eltdf-mobile-menu-text',
		        array('color' => ambient_elated_options()->getOptionValue('mobile_icon_hover_color')));
        }
    }

    add_action('ambient_elated_style_dynamic', 'ambient_elated_mobile_icon_styles');
}