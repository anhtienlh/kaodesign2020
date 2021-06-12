<?php

if(!function_exists('ambient_elated_header_top_bar_styles')) {
    /**
     * Generates styles for header top bar
     */
    function ambient_elated_header_top_bar_styles() {
        global $ambient_elated_global_options;

        if($ambient_elated_global_options['top_bar_height'] !== '') {
            echo ambient_elated_dynamic_css('.eltdf-top-bar', array('height' => ambient_elated_filter_px($ambient_elated_global_options['top_bar_height']).'px'));
            echo ambient_elated_dynamic_css('.eltdf-top-bar .eltdf-logo-wrapper a', array('max-height' => ambient_elated_filter_px($ambient_elated_global_options['top_bar_height']).'px'));
        }

        $background_color = ambient_elated_options()->getOptionValue('top_bar_background_color');
        $top_bar_styles = array();
        if($background_color !== '') {
            $background_transparency = 1;
            if(ambient_elated_options()->getOptionValue('top_bar_background_transparency') !== '') {
               $background_transparency = ambient_elated_options()->getOptionValue('top_bar_background_transparency');
            }

            $background_color = ambient_elated_rgba_color($background_color, $background_transparency);
            $top_bar_styles['background-color'] = $background_color;
        }

        echo ambient_elated_dynamic_css('.eltdf-top-bar', $top_bar_styles);
    }

    add_action('ambient_elated_style_dynamic', 'ambient_elated_header_top_bar_styles');
}

if(!function_exists('ambient_elated_header_standard_menu_area_styles')) {
    /**
     * Generates styles for header standard menu
     */
    function ambient_elated_header_standard_menu_area_styles() {
        global $ambient_elated_global_options;

        if($ambient_elated_global_options['menu_area_background_color_header_standard'] !== '') {
            $menu_area_background_color        = $ambient_elated_global_options['menu_area_background_color_header_standard'];
            $menu_area_background_transparency = 1;

            if($ambient_elated_global_options['menu_area_background_transparency_header_standard'] !== '') {
                $menu_area_background_transparency = $ambient_elated_global_options['menu_area_background_transparency_header_standard'];
            }

            $holder_area_header_standard_styles['background-color'] = ambient_elated_rgba_color($menu_area_background_color, $menu_area_background_transparency);
        }

        if($ambient_elated_global_options['menu_area_background_color_header_standard'] === '' && $ambient_elated_global_options['menu_area_background_transparency_header_standard'] !== '') {
            $menu_area_background_color        = '#fff';
            $menu_area_background_transparency = $ambient_elated_global_options['menu_area_background_transparency_header_standard'];

            $holder_area_header_standard_styles['background-color'] = ambient_elated_rgba_color($menu_area_background_color, $menu_area_background_transparency);
        }

        $holder_area_header_standard_selector = array(
            '.eltdf-header-standard .eltdf-page-header'
        );

        echo ambient_elated_dynamic_css($holder_area_header_standard_selector, $holder_area_header_standard_styles);

        $menu_area_header_standard_styles = array();

        if($ambient_elated_global_options['menu_area_height_header_standard'] !== '') {
            $max_height = intval(ambient_elated_filter_px($ambient_elated_global_options['menu_area_height_header_standard'])).'px';
            echo ambient_elated_dynamic_css('.eltdf-header-standard .eltdf-page-header .eltdf-logo-wrapper a', array('max-height' => $max_height));

            $menu_area_header_standard_styles['height'] = ambient_elated_filter_px($ambient_elated_global_options['menu_area_height_header_standard']).'px';
        }

        echo ambient_elated_dynamic_css('.eltdf-header-standard .eltdf-page-header .eltdf-menu-area', $menu_area_header_standard_styles);
    }

    add_action('ambient_elated_style_dynamic', 'ambient_elated_header_standard_menu_area_styles');
}

if(!function_exists('ambient_elated_header_full_screen_menu_area_styles')) {
    /**
     * Generates styles for header full_screen menu
     */
    function ambient_elated_header_full_screen_menu_area_styles() {
        global $ambient_elated_global_options;

        $holder_area_header_full_screen_styles = array();

        if($ambient_elated_global_options['menu_area_background_color_header_full_screen'] !== '') {
            $menu_area_background_color        = $ambient_elated_global_options['menu_area_background_color_header_full_screen'];
            $menu_area_background_transparency = 1;

            if($ambient_elated_global_options['menu_area_background_transparency_header_full_screen'] !== '') {
                $menu_area_background_transparency = $ambient_elated_global_options['menu_area_background_transparency_header_full_screen'];
            }

            $holder_area_header_full_screen_styles['background-color'] = ambient_elated_rgba_color($menu_area_background_color, $menu_area_background_transparency);
        }

        if($ambient_elated_global_options['menu_area_background_color_header_full_screen'] === '' && $ambient_elated_global_options['menu_area_background_transparency_header_full_screen'] !== '') {
            $menu_area_background_color        = '#fff';
            $menu_area_background_transparency = $ambient_elated_global_options['menu_area_background_transparency_header_full_screen'];

            $holder_area_header_full_screen_styles['background-color'] = ambient_elated_rgba_color($menu_area_background_color, $menu_area_background_transparency);
        }

        $holder_area_header_full_screen_selector = array(
            '.eltdf-header-full-screen .eltdf-page-header'
        );

        echo ambient_elated_dynamic_css($holder_area_header_full_screen_selector, $holder_area_header_full_screen_styles);

        $menu_area_header_full_screen_styles = array();

        if($ambient_elated_global_options['menu_area_height_header_full_screen'] !== '') {
            $max_height = intval(ambient_elated_filter_px($ambient_elated_global_options['menu_area_height_header_full_screen'])).'px';
            echo ambient_elated_dynamic_css('.eltdf-header-full-screen .eltdf-page-header .eltdf-logo-wrapper a', array('max-height' => $max_height));

            $menu_area_header_full_screen_styles['height'] = ambient_elated_filter_px($ambient_elated_global_options['menu_area_height_header_full_screen']).'px';

        }

        echo ambient_elated_dynamic_css('.eltdf-header-full-screen .eltdf-page-header .eltdf-menu-area', $menu_area_header_full_screen_styles);
    }

    add_action('ambient_elated_style_dynamic', 'ambient_elated_header_full_screen_menu_area_styles');
}

if(!function_exists('ambient_elated_vertical_menu_styles')) {
    function ambient_elated_vertical_menu_styles() {

        $vertical_header_styles = array();

        $vertical_header_selectors = array(
            '.eltdf-header-vertical .eltdf-vertical-area-background'
        );

        if(ambient_elated_options()->getOptionValue('vertical_header_background_color') !== '') {
            $vertical_header_styles['background-color'] = ambient_elated_options()->getOptionValue('vertical_header_background_color');
        }

        if(ambient_elated_options()->getOptionValue('vertical_header_transparency') !== '') {
            $vertical_header_styles['opacity'] = ambient_elated_options()->getOptionValue('vertical_header_transparency');
        }

        if(ambient_elated_options()->getOptionValue('vertical_header_background_image') !== '') {
            $vertical_header_styles['background-image'] = 'url('.ambient_elated_options()->getOptionValue('vertical_header_background_image').')';
        }

        echo ambient_elated_dynamic_css($vertical_header_selectors, $vertical_header_styles);
    }

    add_action('ambient_elated_style_dynamic', 'ambient_elated_vertical_menu_styles');
}

if(!function_exists('ambient_elated_vertical_holder_styles')) {
    function ambient_elated_vertical_holder_styles() {

        $vertical_header_styles = array();

        $vertical_header_selectors = array(
            '.eltdf-header-vertical .eltdf-vertical-menu-area-inner'
        );

        if(ambient_elated_options()->getOptionValue('vertical_header_text_align') !== '') {
            $vertical_header_styles['text-align'] = ambient_elated_options()->getOptionValue('vertical_header_text_align');
        }

        echo ambient_elated_dynamic_css($vertical_header_selectors, $vertical_header_styles);
    }

    add_action('ambient_elated_style_dynamic', 'ambient_elated_vertical_holder_styles');
}

if(!function_exists('ambient_elated_sticky_header_styles')) {
    /**
     * Generates styles for sticky haeder
     */
    function ambient_elated_sticky_header_styles() {
        global $ambient_elated_global_options;

        if($ambient_elated_global_options['sticky_header_background_color'] !== '') {

            $sticky_header_background_color              = $ambient_elated_global_options['sticky_header_background_color'];
            $sticky_header_background_color_transparency = 1;

            if($ambient_elated_global_options['sticky_header_transparency'] !== '') {
                $sticky_header_background_color_transparency = $ambient_elated_global_options['sticky_header_transparency'];
            }

            echo ambient_elated_dynamic_css('.eltdf-page-header .eltdf-sticky-header .eltdf-sticky-holder', array('background-color' => ambient_elated_rgba_color($sticky_header_background_color, $sticky_header_background_color_transparency)));
        }

        if($ambient_elated_global_options['sticky_header_border_color'] !== '') {

            $sticky_header_border_color = $ambient_elated_global_options['sticky_header_border_color'];

            echo ambient_elated_dynamic_css('.eltdf-page-header .eltdf-sticky-header .eltdf-sticky-holder', array('border-color' => $sticky_header_border_color));
        }

        if($ambient_elated_global_options['sticky_header_height'] !== '') {
            $max_height = intval(ambient_elated_filter_px($ambient_elated_global_options['sticky_header_height'])).'px';

            echo ambient_elated_dynamic_css('.eltdf-page-header .eltdf-sticky-header', array('height' => $ambient_elated_global_options['sticky_header_height'].'px'));
            echo ambient_elated_dynamic_css('.eltdf-page-header .eltdf-sticky-header .eltdf-logo-wrapper a', array('max-height' => $max_height));
        }

        $sticky_menu_item_styles = array();
        if($ambient_elated_global_options['sticky_color'] !== '') {
            $sticky_menu_item_styles['color'] = $ambient_elated_global_options['sticky_color'];
        }
        if($ambient_elated_global_options['sticky_google_fonts'] !== '-1') {
            $sticky_menu_item_styles['font-family'] = ambient_elated_get_formatted_font_family($ambient_elated_global_options['sticky_google_fonts']);
        }
        if($ambient_elated_global_options['sticky_fontsize'] !== '') {
            $sticky_menu_item_styles['font-size'] = ambient_elated_filter_px($ambient_elated_global_options['sticky_fontsize']).'px';
        }
        if($ambient_elated_global_options['sticky_lineheight'] !== '') {
            $sticky_menu_item_styles['line-height'] = ambient_elated_filter_px($ambient_elated_global_options['sticky_lineheight']).'px';
        }
        if($ambient_elated_global_options['sticky_texttransform'] !== '') {
            $sticky_menu_item_styles['text-transform'] = $ambient_elated_global_options['sticky_texttransform'];
        }
        if($ambient_elated_global_options['sticky_fontstyle'] !== '') {
            $sticky_menu_item_styles['font-style'] = $ambient_elated_global_options['sticky_fontstyle'];
        }
        if($ambient_elated_global_options['sticky_fontweight'] !== '') {
            $sticky_menu_item_styles['font-weight'] = $ambient_elated_global_options['sticky_fontweight'];
        }
        if($ambient_elated_global_options['sticky_letterspacing'] !== '') {
            $sticky_menu_item_styles['letter-spacing'] = ambient_elated_filter_px($ambient_elated_global_options['sticky_letterspacing']).'px';
        }

        $sticky_menu_item_selector = array(
            '.eltdf-main-menu.eltdf-sticky-nav > ul > li > a'
        );

        echo ambient_elated_dynamic_css($sticky_menu_item_selector, $sticky_menu_item_styles);

        $sticky_menu_item_hover_styles = array();
        if($ambient_elated_global_options['sticky_hovercolor'] !== '') {
            $sticky_menu_item_hover_styles['color'] = $ambient_elated_global_options['sticky_hovercolor'];
        }

        $sticky_menu_item_hover_selector = array(
            '.eltdf-main-menu.eltdf-sticky-nav > ul > li:hover > a',
            '.eltdf-main-menu.eltdf-sticky-nav > ul > li.eltdf-active-item > a'
        );

        echo ambient_elated_dynamic_css($sticky_menu_item_hover_selector, $sticky_menu_item_hover_styles);
    }

    add_action('ambient_elated_style_dynamic', 'ambient_elated_sticky_header_styles');
}

if(!function_exists('ambient_elated_fixed_header_styles')) {
    /**
     * Generates styles for fixed haeder
     */
    function ambient_elated_fixed_header_styles() {
        global $ambient_elated_global_options;

        $fixed_area_styles = array();

        if($ambient_elated_global_options['fixed_header_background_color'] !== '') {
            $fixed_header_background_color        = $ambient_elated_global_options['fixed_header_background_color'];
            $fixed_header_background_color_transparency = 1;

            if($ambient_elated_global_options['fixed_header_transparency'] !== '') {
                $fixed_header_background_color_transparency = $ambient_elated_global_options['fixed_header_transparency'];
            }

            $fixed_area_styles['background-color'] = ambient_elated_rgba_color($fixed_header_background_color, $fixed_header_background_color_transparency) . '!important';
        }

        if($ambient_elated_global_options['fixed_header_background_color'] === '' && $ambient_elated_global_options['fixed_header_transparency'] !== '') {
            $fixed_header_background_color        = '#fff';
            $fixed_header_background_color_transparency = $ambient_elated_global_options['fixed_header_transparency'];

            $fixed_area_styles['background-color'] = ambient_elated_rgba_color($fixed_header_background_color, $fixed_header_background_color_transparency) . '!important';
        }

        $selector = array(
            '.eltdf-page-header .eltdf-fixed-wrapper.fixed .eltdf-menu-area'
        );

        echo ambient_elated_dynamic_css($selector, $fixed_area_styles);

        $fixed_area_holder_styles = array();

        if($ambient_elated_global_options['fixed_header_border_bottom_color'] !== '') {
            $fixed_area_holder_styles['border-bottom-color'] = $ambient_elated_global_options['fixed_header_border_bottom_color'];
        }

        $selector_holder = array(
            '.eltdf-page-header .eltdf-fixed-wrapper.fixed'
        );

        echo ambient_elated_dynamic_css($selector_holder, $fixed_area_holder_styles);

        $fixed_menu_item_styles = array();
        if($ambient_elated_global_options['fixed_color'] !== '') {
            $fixed_menu_item_styles['color'] = $ambient_elated_global_options['fixed_color'];
        }
        if($ambient_elated_global_options['fixed_google_fonts'] !== '-1') {
            $fixed_menu_item_styles['font-family'] = ambient_elated_get_formatted_font_family($ambient_elated_global_options['fixed_google_fonts']);
        }
        if($ambient_elated_global_options['fixed_fontsize'] !== '') {
            $fixed_menu_item_styles['font-size'] = ambient_elated_filter_px($ambient_elated_global_options['fixed_fontsize']).'px';
        }
        if($ambient_elated_global_options['fixed_lineheight'] !== '') {
            $fixed_menu_item_styles['line-height'] = ambient_elated_filter_px($ambient_elated_global_options['fixed_lineheight']).'px';
        }
        if($ambient_elated_global_options['fixed_texttransform'] !== '') {
            $fixed_menu_item_styles['text-transform'] = $ambient_elated_global_options['fixed_texttransform'];
        }
        if($ambient_elated_global_options['fixed_fontstyle'] !== '') {
            $fixed_menu_item_styles['font-style'] = $ambient_elated_global_options['fixed_fontstyle'];
        }
        if($ambient_elated_global_options['fixed_fontweight'] !== '') {
            $fixed_menu_item_styles['font-weight'] = $ambient_elated_global_options['fixed_fontweight'];
        }
        if($ambient_elated_global_options['fixed_letterspacing'] !== '') {
            $fixed_menu_item_styles['letter-spacing'] = ambient_elated_filter_px($ambient_elated_global_options['fixed_letterspacing']).'px';
        }

        $fixed_menu_item_selector = array(
            '.eltdf-fixed-wrapper.fixed .eltdf-main-menu > ul > li > a'
        );

        echo ambient_elated_dynamic_css($fixed_menu_item_selector, $fixed_menu_item_styles);

        $fixed_menu_item_hover_styles = array();
        if($ambient_elated_global_options['fixed_hovercolor'] !== '') {
            $fixed_menu_item_hover_styles['color'] = $ambient_elated_global_options['fixed_hovercolor'];
        }

        $fixed_menu_item_hover_selector = array(
            '.eltdf-fixed-wrapper.fixed .eltdf-main-menu > ul > li:hover > a',
            '.eltdf-fixed-wrapper.fixed .eltdf-main-menu > ul > li.eltdf-active-item > a'
        );

        echo ambient_elated_dynamic_css($fixed_menu_item_hover_selector, $fixed_menu_item_hover_styles);
    }

    add_action('ambient_elated_style_dynamic', 'ambient_elated_fixed_header_styles');
}

if(!function_exists('ambient_elated_main_menu_styles')) {
    /**
     * Generates styles for main menu
     */
    function ambient_elated_main_menu_styles() {
        global $ambient_elated_global_options;

        if($ambient_elated_global_options['menu_color'] !== '' || $ambient_elated_global_options['menu_fontsize'] !== '' || $ambient_elated_global_options['menu_lineheight'] !== "" ||$ambient_elated_global_options['menu_fontstyle'] !== '' || $ambient_elated_global_options['menu_fontweight'] !== '' || $ambient_elated_global_options['menu_texttransform'] !== '' || $ambient_elated_global_options['menu_letterspacing'] !== '' || $ambient_elated_global_options['menu_google_fonts'] != "-1") { ?>
            .eltdf-main-menu > ul > li > a {
            <?php if($ambient_elated_global_options['menu_color']) { ?> color: <?php echo esc_attr($ambient_elated_global_options['menu_color']); ?>; <?php } ?>
            <?php if($ambient_elated_global_options['menu_google_fonts'] != "-1") { ?>
                font-family: '<?php echo esc_attr(str_replace('+', ' ', $ambient_elated_global_options['menu_google_fonts'])); ?>', sans-serif;
            <?php } ?>
            <?php if($ambient_elated_global_options['menu_fontsize'] !== '') { ?> font-size: <?php echo esc_attr($ambient_elated_global_options['menu_fontsize']); ?>px; <?php } ?>
            <?php if($ambient_elated_global_options['menu_lineheight'] !== '') { ?> line-height: <?php echo esc_attr($ambient_elated_global_options['menu_lineheight']); ?>px; <?php } ?>
            <?php if($ambient_elated_global_options['menu_fontstyle'] !== '') { ?> font-style: <?php echo esc_attr($ambient_elated_global_options['menu_fontstyle']); ?>; <?php } ?>
            <?php if($ambient_elated_global_options['menu_fontweight'] !== '') { ?> font-weight: <?php echo esc_attr($ambient_elated_global_options['menu_fontweight']); ?>; <?php } ?>
            <?php if($ambient_elated_global_options['menu_texttransform'] !== '') { ?> text-transform: <?php echo esc_attr($ambient_elated_global_options['menu_texttransform']); ?>;  <?php } ?>
            <?php if($ambient_elated_global_options['menu_letterspacing'] !== '') { ?> letter-spacing: <?php echo esc_attr($ambient_elated_global_options['menu_letterspacing']); ?>px; <?php } ?>
            }
        <?php } ?>

        <?php if($ambient_elated_global_options['menu_hovercolor'] !== '') { ?>
            .eltdf-main-menu > ul > li > a:hover,
            .eltdf-main-menu > ul > li.eltdf-active-item:hover > a {
                color: <?php echo esc_attr($ambient_elated_global_options['menu_hovercolor']); ?> !important;
            }
        <?php } ?>

        <?php if($ambient_elated_global_options['menu_activecolor'] !== '') { ?>
            .eltdf-main-menu > ul > li.eltdf-active-item > a {
                color: <?php echo esc_attr($ambient_elated_global_options['menu_activecolor']); ?>;
            }
        <?php } ?>

        <?php if($ambient_elated_global_options['menu_light_hovercolor'] !== '') { ?>
            .eltdf-light-header .eltdf-page-header > div:not(.eltdf-sticky-header):not(.eltdf-fixed-wrapper) .eltdf-main-menu > ul > li > a:hover,
            .eltdf-light-header .eltdf-page-header > div:not(.eltdf-sticky-header):not(.eltdf-fixed-wrapper) .eltdf-main-menu > ul > li.eltdf-active-item:hover > a {
                color: <?php echo esc_attr($ambient_elated_global_options['menu_light_hovercolor']); ?> !important;
            }
        <?php } ?>

        <?php if($ambient_elated_global_options['menu_light_activecolor'] !== '') { ?>
            .eltdf-light-header .eltdf-page-header > div:not(.eltdf-sticky-header):not(.eltdf-fixed-wrapper) .eltdf-main-menu > ul > li.eltdf-active-item > a {
                color: <?php echo esc_attr($ambient_elated_global_options['menu_light_activecolor']); ?> !important;
            }
        <?php } ?>

        <?php if($ambient_elated_global_options['menu_dark_hovercolor'] !== '') { ?>
            .eltdf-dark-header .eltdf-page-header > div:not(.eltdf-sticky-header):not(.eltdf-fixed-wrapper) .eltdf-main-menu > ul > li > a:hover,
            .eltdf-dark-header .eltdf-page-header > div:not(.eltdf-sticky-header):not(.eltdf-fixed-wrapper) .eltdf-main-menu > ul > li.eltdf-active-item:hover > a {
                color: <?php echo esc_attr($ambient_elated_global_options['menu_dark_hovercolor']); ?> !important;
            }
        <?php } ?>

        <?php if($ambient_elated_global_options['menu_dark_activecolor'] !== '') { ?>
            .eltdf-dark-header .eltdf-page-header > div:not(.eltdf-sticky-header):not(.eltdf-fixed-wrapper) .eltdf-main-menu > ul > li.eltdf-active-item > a {
                color: <?php echo esc_attr($ambient_elated_global_options['menu_dark_activecolor']); ?>;
            }
        <?php } ?>

        <?php if( $ambient_elated_global_options['menu_padding_left_right'] !== '') { ?>
            .eltdf-main-menu > ul > li > a {
                padding: 0  <?php echo esc_attr($ambient_elated_global_options['menu_padding_left_right']); ?>px;
            }
        <?php } ?>

        <?php if($ambient_elated_global_options['menu_margin_left_right'] !== '') { ?>
            .eltdf-main-menu > ul > li > a {
                margin: 0  <?php echo esc_attr($ambient_elated_global_options['menu_margin_left_right']); ?>px;
            }
        <?php } ?>

        <?php if($ambient_elated_global_options['dropdown_top_position'] !== '') { ?>
            header .eltdf-drop-down .second {
                top: <?php echo esc_attr($ambient_elated_global_options['dropdown_top_position']).'%;'; ?>
            }
        <?php } ?>

        <?php if($ambient_elated_global_options['dropdown_color'] !== '' || $ambient_elated_global_options['dropdown_fontsize'] !== '' || $ambient_elated_global_options['dropdown_lineheight'] !== '' || $ambient_elated_global_options['dropdown_fontstyle'] !== '' || $ambient_elated_global_options['dropdown_fontweight'] !== '' || $ambient_elated_global_options['dropdown_google_fonts'] != "-1" || $ambient_elated_global_options['dropdown_texttransform'] !== '' || $ambient_elated_global_options['dropdown_letterspacing'] !== '') { ?>
                .eltdf-drop-down .second .inner > ul > li > a{
                    <?php if(!empty($ambient_elated_global_options['dropdown_color'])) { ?> color: <?php echo esc_attr($ambient_elated_global_options['dropdown_color']); ?>; <?php } ?>
                    <?php if($ambient_elated_global_options['dropdown_google_fonts'] != "-1") { ?>
                        font-family: '<?php echo esc_attr(str_replace('+', ' ', $ambient_elated_global_options['dropdown_google_fonts'])); ?>', sans-serif !important;
                    <?php } ?>
                    <?php if($ambient_elated_global_options['dropdown_fontsize'] !== '') { ?> font-size: <?php echo esc_attr($ambient_elated_global_options['dropdown_fontsize']); ?>px; <?php } ?>
                    <?php if($ambient_elated_global_options['dropdown_lineheight'] !== '') { ?> line-height: <?php echo esc_attr($ambient_elated_global_options['dropdown_lineheight']); ?>px; <?php } ?>
                    <?php if($ambient_elated_global_options['dropdown_fontstyle'] !== '') { ?> font-style: <?php echo esc_attr($ambient_elated_global_options['dropdown_fontstyle']); ?>;  <?php } ?>
                    <?php if($ambient_elated_global_options['dropdown_fontweight'] !== '') { ?>font-weight: <?php echo esc_attr($ambient_elated_global_options['dropdown_fontweight']); ?>; <?php } ?>
                    <?php if($ambient_elated_global_options['dropdown_texttransform'] !== '') { ?> text-transform: <?php echo esc_attr($ambient_elated_global_options['dropdown_texttransform']); ?>;  <?php } ?>
                    <?php if($ambient_elated_global_options['dropdown_letterspacing'] !== '') { ?> letter-spacing: <?php echo esc_attr($ambient_elated_global_options['dropdown_letterspacing']); ?>px;  <?php } ?>
                }
        <?php } ?>

        <?php if(!empty($ambient_elated_global_options['dropdown_hovercolor'])) { ?>
            .eltdf-drop-down .second .inner > ul > li > a:hover,
            .eltdf-drop-down .second .inner > ul > li.current-menu-ancestor > a,
            .eltdf-drop-down .second .inner > ul > li.current-menu-item > a {
                color: <?php echo esc_attr($ambient_elated_global_options['dropdown_hovercolor']); ?> !important;
            }
        <?php } ?>

        <?php if($ambient_elated_global_options['dropdown_wide_color'] !== '' || $ambient_elated_global_options['dropdown_wide_fontsize'] !== '' || $ambient_elated_global_options['dropdown_wide_lineheight'] !== '' || $ambient_elated_global_options['dropdown_wide_fontstyle'] !== '' || $ambient_elated_global_options['dropdown_wide_fontweight'] !== '' || $ambient_elated_global_options['dropdown_wide_google_fonts'] !== "-1" || $ambient_elated_global_options['dropdown_wide_texttransform'] !== '' || $ambient_elated_global_options['dropdown_wide_letterspacing'] !== '') { ?>
            .eltdf-drop-down .wide .second .inner > ul > li > a {
            <?php if($ambient_elated_global_options['dropdown_wide_color'] !== '') { ?> color: <?php echo esc_attr($ambient_elated_global_options['dropdown_wide_color']); ?>; <?php } ?>
            <?php if($ambient_elated_global_options['dropdown_wide_google_fonts'] != "-1") { ?>
                font-family: '<?php echo esc_attr(str_replace('+', ' ', $ambient_elated_global_options['dropdown_wide_google_fonts'])); ?>', sans-serif !important;
            <?php } ?>
            <?php if($ambient_elated_global_options['dropdown_wide_fontsize'] !== '') { ?> font-size: <?php echo esc_attr($ambient_elated_global_options['dropdown_wide_fontsize']); ?>px; <?php } ?>
            <?php if($ambient_elated_global_options['dropdown_wide_lineheight'] !== '') { ?> line-height: <?php echo esc_attr($ambient_elated_global_options['dropdown_wide_lineheight']); ?>px; <?php } ?>
            <?php if($ambient_elated_global_options['dropdown_wide_fontstyle'] !== '') { ?> font-style: <?php echo esc_attr($ambient_elated_global_options['dropdown_wide_fontstyle']); ?>;  <?php } ?>
            <?php if($ambient_elated_global_options['dropdown_wide_fontweight'] !== '') { ?>font-weight: <?php echo esc_attr($ambient_elated_global_options['dropdown_wide_fontweight']); ?>; <?php } ?>
            <?php if($ambient_elated_global_options['dropdown_wide_texttransform'] !== '') { ?> text-transform: <?php echo esc_attr($ambient_elated_global_options['dropdown_wide_texttransform']); ?>;  <?php } ?>
            <?php if($ambient_elated_global_options['dropdown_wide_letterspacing'] !== '') { ?> letter-spacing: <?php echo esc_attr($ambient_elated_global_options['dropdown_wide_letterspacing']); ?>px;  <?php } ?>
            }
        <?php } ?>

        <?php if($ambient_elated_global_options['dropdown_wide_hovercolor'] !== '') { ?>
            .eltdf-drop-down .wide .second .inner > ul > li > a:hover,
            .eltdf-drop-down .wide .second .inner > ul > li.current-menu-ancestor > a,
            .eltdf-drop-down .wide .second .inner > ul > li.current-menu-item > a {
                color: <?php echo esc_attr($ambient_elated_global_options['dropdown_wide_hovercolor']); ?> !important;
            }
        <?php } ?>

        <?php if($ambient_elated_global_options['dropdown_color_thirdlvl'] !== '' || $ambient_elated_global_options['dropdown_fontsize_thirdlvl'] !== '' || $ambient_elated_global_options['dropdown_lineheight_thirdlvl'] !== '' || $ambient_elated_global_options['dropdown_fontstyle_thirdlvl'] !== '' || $ambient_elated_global_options['dropdown_fontweight_thirdlvl'] !== '' || $ambient_elated_global_options['dropdown_google_fonts_thirdlvl'] != "-1" || $ambient_elated_global_options['dropdown_texttransform_thirdlvl'] !== '' || $ambient_elated_global_options['dropdown_letterspacing_thirdlvl'] !== '') { ?>
            .eltdf-drop-down .second .inner ul li ul li a {
            <?php if($ambient_elated_global_options['dropdown_color_thirdlvl'] !== '') { ?> color: <?php echo esc_attr($ambient_elated_global_options['dropdown_color_thirdlvl']); ?>;  <?php } ?>
            <?php if($ambient_elated_global_options['dropdown_google_fonts_thirdlvl'] != "-1") { ?>
                font-family: '<?php echo esc_attr(str_replace('+', ' ', $ambient_elated_global_options['dropdown_google_fonts_thirdlvl'])); ?>', sans-serif;
            <?php } ?>
            <?php if($ambient_elated_global_options['dropdown_fontsize_thirdlvl'] !== '') { ?> font-size: <?php echo esc_attr($ambient_elated_global_options['dropdown_fontsize_thirdlvl']); ?>px;  <?php } ?>
            <?php if($ambient_elated_global_options['dropdown_lineheight_thirdlvl'] !== '') { ?> line-height: <?php echo esc_attr($ambient_elated_global_options['dropdown_lineheight_thirdlvl']); ?>px;  <?php } ?>
            <?php if($ambient_elated_global_options['dropdown_fontstyle_thirdlvl'] !== '') { ?> font-style: <?php echo esc_attr($ambient_elated_global_options['dropdown_fontstyle_thirdlvl']); ?>;   <?php } ?>
            <?php if($ambient_elated_global_options['dropdown_fontweight_thirdlvl'] !== '') { ?> font-weight: <?php echo esc_attr($ambient_elated_global_options['dropdown_fontweight_thirdlvl']); ?>;  <?php } ?>
            <?php if($ambient_elated_global_options['dropdown_texttransform_thirdlvl'] !== '') { ?> text-transform: <?php echo esc_attr($ambient_elated_global_options['dropdown_texttransform_thirdlvl']); ?>;  <?php } ?>
            <?php if($ambient_elated_global_options['dropdown_letterspacing_thirdlvl'] !== '') { ?> letter-spacing: <?php echo esc_attr($ambient_elated_global_options['dropdown_letterspacing_thirdlvl']); ?>px;  <?php } ?>
            }
        <?php } ?>
        
        <?php if($ambient_elated_global_options['dropdown_hovercolor_thirdlvl'] !== '') { ?>
            .eltdf-drop-down .second .inner ul li ul li a:hover,
            .eltdf-drop-down .second .inner ul li ul li.current-menu-ancestor > a,
            .eltdf-drop-down .second .inner ul li ul li.current-menu-item > a {
                color: <?php echo esc_attr($ambient_elated_global_options['dropdown_hovercolor_thirdlvl']); ?> !important;
            }
        <?php } ?>

        <?php if($ambient_elated_global_options['dropdown_wide_color_thirdlvl'] !== '' || $ambient_elated_global_options['dropdown_wide_fontsize_thirdlvl'] !== '' || $ambient_elated_global_options['dropdown_wide_lineheight_thirdlvl'] !== '' || $ambient_elated_global_options['dropdown_wide_fontstyle_thirdlvl'] !== '' || $ambient_elated_global_options['dropdown_wide_fontweight_thirdlvl'] !== '' || $ambient_elated_global_options['dropdown_wide_google_fonts_thirdlvl'] != "-1" || $ambient_elated_global_options['dropdown_wide_texttransform_thirdlvl'] !== '' || $ambient_elated_global_options['dropdown_wide_letterspacing_thirdlvl'] !== '') { ?>
            .eltdf-drop-down .wide .second .inner ul li ul li a {
            <?php if($ambient_elated_global_options['dropdown_wide_color_thirdlvl'] !== '') { ?> color: <?php echo esc_attr($ambient_elated_global_options['dropdown_wide_color_thirdlvl']); ?>;  <?php } ?>
            <?php if($ambient_elated_global_options['dropdown_wide_google_fonts_thirdlvl'] != "-1") { ?>
                font-family: '<?php echo esc_attr(str_replace('+', ' ', $ambient_elated_global_options['dropdown_wide_google_fonts_thirdlvl'])); ?>', sans-serif;
            <?php } ?>
            <?php if($ambient_elated_global_options['dropdown_wide_fontsize_thirdlvl'] !== '') { ?> font-size: <?php echo esc_attr($ambient_elated_global_options['dropdown_wide_fontsize_thirdlvl']); ?>px;  <?php } ?>
            <?php if($ambient_elated_global_options['dropdown_wide_lineheight_thirdlvl'] !== '') { ?> line-height: <?php echo esc_attr($ambient_elated_global_options['dropdown_wide_lineheight_thirdlvl']); ?>px;  <?php } ?>
            <?php if($ambient_elated_global_options['dropdown_wide_fontstyle_thirdlvl'] !== '') { ?> font-style: <?php echo esc_attr($ambient_elated_global_options['dropdown_wide_fontstyle_thirdlvl']); ?>;   <?php } ?>
            <?php if($ambient_elated_global_options['dropdown_wide_fontweight_thirdlvl'] !== '') { ?> font-weight: <?php echo esc_attr($ambient_elated_global_options['dropdown_wide_fontweight_thirdlvl']); ?>;  <?php } ?>
            <?php if($ambient_elated_global_options['dropdown_wide_texttransform_thirdlvl'] !== '') { ?> text-transform: <?php echo esc_attr($ambient_elated_global_options['dropdown_wide_texttransform_thirdlvl']); ?>;  <?php } ?>
            <?php if($ambient_elated_global_options['dropdown_wide_letterspacing_thirdlvl'] !== '') { ?> letter-spacing: <?php echo esc_attr($ambient_elated_global_options['dropdown_wide_letterspacing_thirdlvl']); ?>px;  <?php } ?>
            }
        <?php } ?>

        <?php if($ambient_elated_global_options['dropdown_wide_hovercolor_thirdlvl'] !== '') { ?>
            .eltdf-drop-down .wide .second .inner ul li ul li a:hover,
            .eltdf-drop-down .wide .second .inner ul li ul li.current-menu-ancestor > a,
            .eltdf-drop-down .wide .second .inner ul li ul li.current-menu-item > a {
                color: <?php echo esc_attr($ambient_elated_global_options['dropdown_wide_hovercolor_thirdlvl']); ?> !important;
            }
        <?php }
    }

    add_action('ambient_elated_style_dynamic', 'ambient_elated_main_menu_styles');
}

if(!function_exists('ambient_elated_vertical_main_menu_styles')) {
	/**
	 * Generates styles for vertical main main menu
	 */
	function ambient_elated_vertical_main_menu_styles() {

		$menu_holder_styles = array();

		if(ambient_elated_options()->getOptionValue('vertical_menu_top_margin') !== '') {
			$menu_holder_styles['margin-top'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('vertical_menu_top_margin')).'px';
		}
		if(ambient_elated_options()->getOptionValue('vertical_menu_bottom_margin') !== '') {
			$menu_holder_styles['margin-bottom'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('vertical_menu_bottom_margin')).'px';
		}

		$menu_holder_selector = array(
			'.eltdf-header-vertical .eltdf-vertical-menu'
		);

		echo ambient_elated_dynamic_css($menu_holder_selector, $menu_holder_styles);

		$first_level_styles = array();
		$first_level_hover_styles = array();

		if(ambient_elated_options()->getOptionValue('vertical_menu_1st_color') !== '') {
			$first_level_styles['color'] = ambient_elated_options()->getOptionValue('vertical_menu_1st_color');
		}
		if(ambient_elated_options()->getOptionValue('vertical_menu_1st_google_fonts') !== '-1') {
			$first_level_styles['font-family'] = ambient_elated_get_formatted_font_family(ambient_elated_options()->getOptionValue('vertical_menu_1st_google_fonts'));
		}
		if(ambient_elated_options()->getOptionValue('vertical_menu_1st_fontsize') !== '') {
			$first_level_styles['font-size'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('vertical_menu_1st_fontsize')).'px';
		}
		if(ambient_elated_options()->getOptionValue('vertical_menu_1st_lineheight') !== '') {
			$first_level_styles['line-height'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('vertical_menu_1st_lineheight')).'px';
		}
		if(ambient_elated_options()->getOptionValue('vertical_menu_1st_texttransform') !== '') {
			$first_level_styles['text-transform'] = ambient_elated_options()->getOptionValue('vertical_menu_1st_texttransform');
		}
		if(ambient_elated_options()->getOptionValue('vertical_menu_1st_fontstyle') !== '') {
			$first_level_styles['font-style'] = ambient_elated_options()->getOptionValue('vertical_menu_1st_fontstyle');
		}
		if(ambient_elated_options()->getOptionValue('vertical_menu_1st_fontweight') !== '') {
			$first_level_styles['font-weight'] = ambient_elated_options()->getOptionValue('vertical_menu_1st_fontweight');
		}
		if(ambient_elated_options()->getOptionValue('vertical_menu_1st_letter_spacing') !== '') {
			$first_level_styles['letter-spacing'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('vertical_menu_1st_letter_spacing')).'px';
		}

		if(ambient_elated_options()->getOptionValue('vertical_menu_1st_hover_color') !== '') {
			$first_level_hover_styles['color'] = ambient_elated_options()->getOptionValue('vertical_menu_1st_hover_color');
		}

		$first_level_selector = array(
			'.eltdf-header-vertical .eltdf-vertical-menu > ul > li > a'
		);
		$first_level_hover_selector = array(
			'.eltdf-header-vertical .eltdf-vertical-menu > ul > li > a:hover',
			'.eltdf-header-vertical .eltdf-vertical-menu > ul > li > a.eltdf-active-item',
			'.eltdf-header-vertical .eltdf-vertical-menu > ul > li > a.current-menu-ancestor'
		);

		echo ambient_elated_dynamic_css($first_level_selector, $first_level_styles);
		echo ambient_elated_dynamic_css($first_level_hover_selector, $first_level_hover_styles);

		$second_level_styles = array();
		$second_level_hover_styles = array();

		if(ambient_elated_options()->getOptionValue('vertical_menu_2nd_color') !== '') {
			$second_level_styles['color'] = ambient_elated_options()->getOptionValue('vertical_menu_2nd_color');
		}
		if(ambient_elated_options()->getOptionValue('vertical_menu_2nd_google_fonts') !== '-1') {
			$second_level_styles['font-family'] = ambient_elated_get_formatted_font_family(ambient_elated_options()->getOptionValue('vertical_menu_2nd_google_fonts'));
		}
		if(ambient_elated_options()->getOptionValue('vertical_menu_2nd_fontsize') !== '') {
			$second_level_styles['font-size'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('vertical_menu_2nd_fontsize')).'px';
		}
		if(ambient_elated_options()->getOptionValue('vertical_menu_2nd_lineheight') !== '') {
			$second_level_styles['line-height'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('vertical_menu_2nd_lineheight')).'px';
		}
		if(ambient_elated_options()->getOptionValue('vertical_menu_2nd_texttransform') !== '') {
			$second_level_styles['text-transform'] = ambient_elated_options()->getOptionValue('vertical_menu_2nd_texttransform');
		}
		if(ambient_elated_options()->getOptionValue('vertical_menu_2nd_fontstyle') !== '') {
			$second_level_styles['font-style'] = ambient_elated_options()->getOptionValue('vertical_menu_2nd_fontstyle');
		}
		if(ambient_elated_options()->getOptionValue('vertical_menu_2nd_fontweight') !== '') {
			$second_level_styles['font-weight'] = ambient_elated_options()->getOptionValue('vertical_menu_2nd_fontweight');
		}
		if(ambient_elated_options()->getOptionValue('vertical_menu_2nd_letter_spacing') !== '') {
			$second_level_styles['letter-spacing'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('vertical_menu_2nd_letter_spacing')).'px';
		}

		if(ambient_elated_options()->getOptionValue('vertical_menu_2nd_hover_color') !== '') {
			$second_level_hover_styles['color'] = ambient_elated_options()->getOptionValue('vertical_menu_2nd_hover_color');
		}

		$second_level_selector = array(
			'.eltdf-header-vertical .eltdf-vertical-menu .second .inner > ul > li > a'
		);

		$second_level_hover_selector = array(
			'.eltdf-header-vertical .eltdf-vertical-menu .second .inner > ul > li > a:hover',
			'.eltdf-header-vertical .eltdf-vertical-menu .second .inner > ul > li.current_page_item > a',
			'.eltdf-header-vertical .eltdf-vertical-menu .second .inner > ul > li.current-menu-item > a',
			'.eltdf-header-vertical .eltdf-vertical-menu .second .inner > ul > li.current-menu-ancestor > a'
		);

		echo ambient_elated_dynamic_css($second_level_selector, $second_level_styles);
		echo ambient_elated_dynamic_css($second_level_hover_selector, $second_level_hover_styles);

		$third_level_styles = array();
		$third_level_hover_styles = array();

		if(ambient_elated_options()->getOptionValue('vertical_menu_3rd_color') !== '') {
			$third_level_styles['color'] = ambient_elated_options()->getOptionValue('vertical_menu_3rd_color');
		}
		if(ambient_elated_options()->getOptionValue('vertical_menu_3rd_google_fonts') !== '-1') {
			$third_level_styles['font-family'] = ambient_elated_get_formatted_font_family(ambient_elated_options()->getOptionValue('vertical_menu_3rd_google_fonts'));
		}
		if(ambient_elated_options()->getOptionValue('vertical_menu_3rd_fontsize') !== '') {
			$third_level_styles['font-size'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('vertical_menu_3rd_fontsize')).'px';
		}
		if(ambient_elated_options()->getOptionValue('vertical_menu_3rd_lineheight') !== '') {
			$third_level_styles['line-height'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('vertical_menu_3rd_lineheight')).'px';
		}
		if(ambient_elated_options()->getOptionValue('vertical_menu_3rd_texttransform') !== '') {
			$third_level_styles['text-transform'] = ambient_elated_options()->getOptionValue('vertical_menu_3rd_texttransform');
		}
		if(ambient_elated_options()->getOptionValue('vertical_menu_3rd_fontstyle') !== '') {
			$third_level_styles['font-style'] = ambient_elated_options()->getOptionValue('vertical_menu_3rd_fontstyle');
		}
		if(ambient_elated_options()->getOptionValue('vertical_menu_3rd_fontweight') !== '') {
			$third_level_styles['font-weight'] = ambient_elated_options()->getOptionValue('vertical_menu_3rd_fontweight');
		}
		if(ambient_elated_options()->getOptionValue('vertical_menu_3rd_letter_spacing') !== '') {
			$third_level_styles['letter-spacing'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('vertical_menu_3rd_letter_spacing')).'px';
		}

		if(ambient_elated_options()->getOptionValue('vertical_menu_3rd_hover_color') !== '') {
			$third_level_hover_styles['color'] = ambient_elated_options()->getOptionValue('vertical_menu_3rd_hover_color');
		}

		$third_level_selector = array(
			'.eltdf-header-vertical .eltdf-vertical-menu .second .inner ul li ul li a'
		);

		$third_level_hover_selector = array(
			'.eltdf-header-vertical .eltdf-vertical-menu .second .inner ul li ul li a:hover',
			'.eltdf-header-vertical .eltdf-vertical-menu .second .inner ul li ul li a.eltdf-active-item',
			'.eltdf-header-vertical .eltdf-vertical-menu .second .inner ul li ul li.current_page_item a',
			'.eltdf-header-vertical .eltdf-vertical-menu .second .inner ul li ul li.current-menu-item a'
		);

		echo ambient_elated_dynamic_css($third_level_selector, $third_level_styles);
		echo ambient_elated_dynamic_css($third_level_hover_selector, $third_level_hover_styles);
	}

	add_action('ambient_elated_style_dynamic', 'ambient_elated_vertical_main_menu_styles');
}