<?php

if(!function_exists('ambient_elated_404_header_general_styles')) {
    /**
     * Generates general custom styles for 404 header area
     */
    function ambient_elated_404_header_general_styles() {
        $header_styles = array();

        if(ambient_elated_options()->getOptionValue('404_menu_area_background_color_header') !== '') {

            $header_styles['background-color'] = ambient_elated_options()->getOptionValue('404_menu_area_background_color_header');
            $header_styles['background-transparency'] = 1;

            if(ambient_elated_options()->getOptionValue('404_menu_area_background_transparency_header') !== '') {
                $header_styles['background-transparency'] = ambient_elated_options()->getOptionValue('404_menu_area_background_transparency_header');
            }

            echo ambient_elated_dynamic_css('.error404 .eltdf-page-header', array('background-color' => ambient_elated_rgba_color($header_styles['background-color'], $header_styles['background-transparency']) . ' !important'));
        }

        if(ambient_elated_options()->getOptionValue('404_menu_area_background_color_header') === '' && ambient_elated_options()->getOptionValue('404_menu_area_background_transparency_header') !== '') {
        
            $header_styles['background-color'] = '#fff';
            $header_styles['background-transparency'] = ambient_elated_options()->getOptionValue('404_menu_area_background_transparency_header');

            echo ambient_elated_dynamic_css('.error404 .eltdf-page-header', array('background-color' => ambient_elated_rgba_color($header_styles['background-color'], $header_styles['background-transparency']) . ' !important'));
        }

        $menu_styles = array();

        if(ambient_elated_options()->getOptionValue('404_menu_area_border_color_header') !== '') {
            $menu_styles['border-color'] = ambient_elated_options()->getOptionValue('404_menu_area_border_color_header');
        }

        echo ambient_elated_dynamic_css('.error404 .eltdf-page-header .eltdf-menu-area', $menu_styles);
    }

    add_action('ambient_elated_style_dynamic', 'ambient_elated_404_header_general_styles');
}

if(!function_exists('ambient_elated_404_footer_top_general_styles')) {
    /**
     * Generates general custom styles for footer top area
     */
    function ambient_elated_404_footer_top_general_styles() {
        $item_styles = array();

        if(ambient_elated_options()->getOptionValue('404_page_background_color') !== '') {
            $item_styles['background-color'] = ambient_elated_options()->getOptionValue('404_page_background_color');
        }

        if (ambient_elated_options()->getOptionValue('404_page_background_image') !== '') {
            $item_styles['background-image'] = 'url('.ambient_elated_options()->getOptionValue('404_page_background_image').')';
        }

        if (ambient_elated_options()->getOptionValue('404_page_background_pattern_image') !== '') {
            $item_styles['background-image'] = 'url('.ambient_elated_options()->getOptionValue('404_page_background_pattern_image').')';
            $item_styles['background-position'] = '0 0';
            $item_styles['background-repeat'] = 'repeat';
        }

        echo ambient_elated_dynamic_css('body.error404 .eltdf-content', $item_styles);
    }

    add_action('ambient_elated_style_dynamic', 'ambient_elated_404_footer_top_general_styles');
}

if(!function_exists('ambient_elated_404_title_styles')) {
    /**
     * Generates styles for 404 page title
     */
    function ambient_elated_404_title_styles() {
        $item_styles = array();

        if(ambient_elated_options()->getOptionValue('404_title_color') !== '') {
            $item_styles['color'] = ambient_elated_options()->getOptionValue('404_title_color');
        }

        if(ambient_elated_is_font_option_valid(ambient_elated_options()->getOptionValue('404_title_google_fonts'))) {
            $item_styles['font-family'] = ambient_elated_get_formatted_font_family(ambient_elated_options()->getOptionValue('404_title_google_fonts'));
        }

        if(ambient_elated_options()->getOptionValue('404_title_fontsize') !== '') {
            $item_styles['font-size'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('404_title_fontsize')).'px';
        }

        if(ambient_elated_options()->getOptionValue('404_title_lineheight') !== '') {
            $item_styles['line-height'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('404_title_lineheight')).'px';
        }

        if(ambient_elated_options()->getOptionValue('404_title_fontstyle') !== '') {
            $item_styles['font-style'] = ambient_elated_options()->getOptionValue('404_title_fontstyle');
        }

        if(ambient_elated_options()->getOptionValue('404_title_fontweight') !== '') {
            $item_styles['font-weight'] = ambient_elated_options()->getOptionValue('404_title_fontweight');
        }

        if(ambient_elated_options()->getOptionValue('404_title_letterspacing') !== '') {
            $item_styles['letter-spacing'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('404_title_letterspacing')).'px';
        }

        if(ambient_elated_options()->getOptionValue('404_title_texttransform') !== '') {
            $item_styles['text-transform'] = ambient_elated_options()->getOptionValue('404_title_texttransform');
        }

        $item_selector = array(
            '.error404 .eltdf-page-not-found h1'
        );

        echo ambient_elated_dynamic_css($item_selector, $item_styles);
    }

    add_action('ambient_elated_style_dynamic', 'ambient_elated_404_title_styles');
}

if(!function_exists('ambient_elated_404_subtitle_styles')) {
    /**
     * Generates styles for 404 page subtitle
     */
    function ambient_elated_404_subtitle_styles() {
        $item_styles = array();

        if(ambient_elated_options()->getOptionValue('404_subtitle_color') !== '') {
            $item_styles['color'] = ambient_elated_options()->getOptionValue('404_subtitle_color');
        }

        if(ambient_elated_is_font_option_valid(ambient_elated_options()->getOptionValue('404_subtitle_google_fonts'))) {
            $item_styles['font-family'] = ambient_elated_get_formatted_font_family(ambient_elated_options()->getOptionValue('404_subtitle_google_fonts'));
        }

        if(ambient_elated_options()->getOptionValue('404_subtitle_fontsize') !== '') {
            $item_styles['font-size'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('404_subtitle_fontsize')).'px';
        }

        if(ambient_elated_options()->getOptionValue('404_subtitle_lineheight') !== '') {
            $item_styles['line-height'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('404_subtitle_lineheight')).'px';
        }

        if(ambient_elated_options()->getOptionValue('404_subtitle_fontstyle') !== '') {
            $item_styles['font-style'] = ambient_elated_options()->getOptionValue('404_subtitle_fontstyle');
        }

        if(ambient_elated_options()->getOptionValue('404_subtitle_fontweight') !== '') {
            $item_styles['font-weight'] = ambient_elated_options()->getOptionValue('404_subtitle_fontweight');
        }

        if(ambient_elated_options()->getOptionValue('404_subtitle_letterspacing') !== '') {
            $item_styles['letter-spacing'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('404_subtitle_letterspacing')).'px';
        }

        if(ambient_elated_options()->getOptionValue('404_subtitle_texttransform') !== '') {
            $item_styles['text-transform'] = ambient_elated_options()->getOptionValue('404_subtitle_texttransform');
        }

        $item_selector = array(
            '.error404 .eltdf-page-not-found h3'
        );

        echo ambient_elated_dynamic_css($item_selector, $item_styles);
    }

    add_action('ambient_elated_style_dynamic', 'ambient_elated_404_subtitle_styles');
}

if(!function_exists('ambient_elated_404_text_styles')) {
    /**
     * Generates styles for 404 page text
     */
    function ambient_elated_404_text_styles() {
        $item_styles = array();

        if(ambient_elated_options()->getOptionValue('404_text_color') !== '') {
            $item_styles['color'] = ambient_elated_options()->getOptionValue('404_text_color');
        }

        if(ambient_elated_is_font_option_valid(ambient_elated_options()->getOptionValue('404_text_google_fonts'))) {
            $item_styles['font-family'] = ambient_elated_get_formatted_font_family(ambient_elated_options()->getOptionValue('404_text_google_fonts'));
        }

        if(ambient_elated_options()->getOptionValue('404_text_fontsize') !== '') {
            $item_styles['font-size'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('404_text_fontsize')).'px';
        }

        if(ambient_elated_options()->getOptionValue('404_text_lineheight') !== '') {
            $item_styles['line-height'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('404_text_lineheight')).'px';
        }

        if(ambient_elated_options()->getOptionValue('404_text_fontstyle') !== '') {
            $item_styles['font-style'] = ambient_elated_options()->getOptionValue('404_text_fontstyle');
        }

        if(ambient_elated_options()->getOptionValue('404_text_fontweight') !== '') {
            $item_styles['font-weight'] = ambient_elated_options()->getOptionValue('404_text_fontweight');
        }

        if(ambient_elated_options()->getOptionValue('404_text_letterspacing') !== '') {
            $item_styles['letter-spacing'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('404_text_letterspacing')).'px';
        }

        if(ambient_elated_options()->getOptionValue('404_text_texttransform') !== '') {
            $item_styles['text-transform'] = ambient_elated_options()->getOptionValue('404_text_texttransform');
        }

        $item_selector = array(
            '.error404 .eltdf-page-not-found .eltdf-page-not-found-text'
        );

        echo ambient_elated_dynamic_css($item_selector, $item_styles);
    }

    add_action('ambient_elated_style_dynamic', 'ambient_elated_404_text_styles');
}