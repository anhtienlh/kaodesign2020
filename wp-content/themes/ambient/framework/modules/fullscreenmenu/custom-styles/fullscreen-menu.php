<?php

if (!function_exists('ambient_elated_fullscreen_menu_general_styles')) {

	function ambient_elated_fullscreen_menu_general_styles()
	{
		$fullscreen_menu_background_color = '';
		if (ambient_elated_options()->getOptionValue('fullscreen_alignment') !== '') {
			echo ambient_elated_dynamic_css('nav.eltdf-fullscreen-menu ul li, .eltdf-fullscreen-above-menu-widget-holder, .eltdf-fullscreen-below-menu-widget-holder', array(
				'text-align' => ambient_elated_options()->getOptionValue('fullscreen_alignment')
			));
		}

		if (ambient_elated_options()->getOptionValue('fullscreen_menu_background_color') !== '') {
			$fullscreen_menu_background_color = ambient_elated_hex2rgb(ambient_elated_options()->getOptionValue('fullscreen_menu_background_color'));
			if (ambient_elated_options()->getOptionValue('fullscreen_menu_background_transparency') !== '') {
				$fullscreen_menu_background_transparency = ambient_elated_options()->getOptionValue('fullscreen_menu_background_transparency');
			} else {
				$fullscreen_menu_background_transparency = 0.9;
			}
		}

		if ($fullscreen_menu_background_color !== '') {
			echo ambient_elated_dynamic_css('.eltdf-fullscreen-menu-holder', array(
				'background-color' => 'rgba(' . $fullscreen_menu_background_color[0] . ',' . $fullscreen_menu_background_color[1] . ',' . $fullscreen_menu_background_color[2] . ',' . $fullscreen_menu_background_transparency . ')'
			));
		}

		if (ambient_elated_options()->getOptionValue('fullscreen_menu_background_image') !== '') {
			echo ambient_elated_dynamic_css('.eltdf-fullscreen-menu-holder', array(
				'background-image' => 'url(' . ambient_elated_options()->getOptionValue('fullscreen_menu_background_image') . ')',
				'background-position' => 'center 0',
				'background-repeat' => 'no-repeat'
			));
		}

		if (ambient_elated_options()->getOptionValue('fullscreen_menu_pattern_image') !== '') {
			echo ambient_elated_dynamic_css('.eltdf-fullscreen-menu-holder', array(
				'background-image' => 'url(' . ambient_elated_options()->getOptionValue('fullscreen_menu_pattern_image') . ')',
				'background-repeat' => 'repeat',
				'background-position' => '0 0'
			));
		}
	}

	add_action('ambient_elated_style_dynamic', 'ambient_elated_fullscreen_menu_general_styles');
}

if (!function_exists('ambient_elated_fullscreen_menu_first_level_style')) {

	function ambient_elated_fullscreen_menu_first_level_style()	{

		$first_menu_style = array();

		if (ambient_elated_options()->getOptionValue('fullscreen_menu_color') !== '') {
			$first_menu_style['color'] = ambient_elated_options()->getOptionValue('fullscreen_menu_color');
		}

		if (ambient_elated_options()->getOptionValue('fullscreen_menu_google_fonts') !== '-1') {
			$first_menu_style['font-family'] = ambient_elated_get_formatted_font_family(ambient_elated_options()->getOptionValue('fullscreen_menu_google_fonts')) . ',sans-serif';
		}

		if (ambient_elated_options()->getOptionValue('fullscreen_menu_fontsize') !== '') {
			$first_menu_style['font-size'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('fullscreen_menu_fontsize')) . 'px';
		}

		if (ambient_elated_options()->getOptionValue('fullscreen_menu_lineheight') !== '') {
			$first_menu_style['line-height'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('fullscreen_menu_lineheight')) . 'px';
		}

		if (ambient_elated_options()->getOptionValue('fullscreen_menu_fontstyle') !== '') {
			$first_menu_style['font-style'] = ambient_elated_options()->getOptionValue('fullscreen_menu_fontstyle');
		}

		if (ambient_elated_options()->getOptionValue('fullscreen_menu_fontweight') !== '') {
			$first_menu_style['font-weight'] = ambient_elated_options()->getOptionValue('fullscreen_menu_fontweight');
		}

		if (ambient_elated_options()->getOptionValue('fullscreen_menu_letterspacing') !== '') {
			$first_menu_style['letter-spacing'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('fullscreen_menu_letterspacing')) . 'px';
		}

		if (ambient_elated_options()->getOptionValue('fullscreen_menu_texttransform') !== '') {
			$first_menu_style['text-transform'] = ambient_elated_options()->getOptionValue('fullscreen_menu_texttransform');
		}

		if (!empty($first_menu_style)) {
			echo ambient_elated_dynamic_css('nav.eltdf-fullscreen-menu > ul > li > a', $first_menu_style);
		}

		$first_menu_hover_style = array();

		if (ambient_elated_options()->getOptionValue('fullscreen_menu_hover_color') !== '') {
			$first_menu_hover_style['color'] = ambient_elated_options()->getOptionValue('fullscreen_menu_hover_color');
		}

		if (!empty($first_menu_hover_style)) {
			echo ambient_elated_dynamic_css('nav.eltdf-fullscreen-menu > ul > li > a:hover', $first_menu_hover_style);
		}

		$first_menu_active_style = array();

		if (ambient_elated_options()->getOptionValue('fullscreen_menu_active_color') !== '') {
			$first_menu_active_style['color'] = ambient_elated_options()->getOptionValue('fullscreen_menu_active_color');
		}

		if (!empty($first_menu_active_style)) {
			echo ambient_elated_dynamic_css('nav.eltdf-fullscreen-menu > ul > li.eltdf-active-item > a', $first_menu_active_style);
		}
	}

	add_action('ambient_elated_style_dynamic', 'ambient_elated_fullscreen_menu_first_level_style');
}

if (!function_exists('ambient_elated_fullscreen_menu_second_level_style')) {

	function ambient_elated_fullscreen_menu_second_level_style() {
		$second_menu_style = array();
		if (ambient_elated_options()->getOptionValue('fullscreen_menu_color_2nd') !== '') {
			$second_menu_style['color'] = ambient_elated_options()->getOptionValue('fullscreen_menu_color_2nd');
		}

		if (ambient_elated_options()->getOptionValue('fullscreen_menu_google_fonts_2nd') !== '-1') {
			$second_menu_style['font-family'] = ambient_elated_get_formatted_font_family(ambient_elated_options()->getOptionValue('fullscreen_menu_google_fonts_2nd')) . ',sans-serif';
		}

		if (ambient_elated_options()->getOptionValue('fullscreen_menu_fontsize_2nd') !== '') {
			$second_menu_style['font-size'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('fullscreen_menu_fontsize_2nd')) . 'px';
		}

		if (ambient_elated_options()->getOptionValue('fullscreen_menu_lineheight_2nd') !== '') {
			$second_menu_style['line-height'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('fullscreen_menu_lineheight_2nd')) . 'px';
		}

		if (ambient_elated_options()->getOptionValue('fullscreen_menu_fontstyle_2nd') !== '') {
			$second_menu_style['font-style'] = ambient_elated_options()->getOptionValue('fullscreen_menu_fontstyle_2nd');
		}

		if (ambient_elated_options()->getOptionValue('fullscreen_menu_fontweight_2nd') !== '') {
			$second_menu_style['font-weight'] = ambient_elated_options()->getOptionValue('fullscreen_menu_fontweight_2nd');
		}

		if (ambient_elated_options()->getOptionValue('fullscreen_menu_letterspacing_2nd') !== '') {
			$second_menu_style['letter-spacing'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('fullscreen_menu_letterspacing_2nd')) . 'px';
		}

		if (ambient_elated_options()->getOptionValue('fullscreen_menu_texttransform_2nd') !== '') {
			$second_menu_style['text-transform'] = ambient_elated_options()->getOptionValue('fullscreen_menu_texttransform_2nd');
		}

		if (!empty($second_menu_style)) {
			echo ambient_elated_dynamic_css('nav.eltdf-fullscreen-menu ul li ul li a', $second_menu_style);
		}

		$second_menu_hover_style = array();

		if (ambient_elated_options()->getOptionValue('fullscreen_menu_hover_color_2nd') !== '') {
			$second_menu_hover_style['color'] = ambient_elated_options()->getOptionValue('fullscreen_menu_hover_color_2nd');
		}

		if (!empty($second_menu_hover_style)) {
			echo ambient_elated_dynamic_css('nav.eltdf-fullscreen-menu ul li ul li a:hover, nav.eltdf-fullscreen-menu ul li ul li.current-menu-ancestor > a, nav.eltdf-fullscreen-menu ul li ul li.current-menu-item > a', $second_menu_hover_style);
		}
	}

	add_action('ambient_elated_style_dynamic', 'ambient_elated_fullscreen_menu_second_level_style');

}

if (!function_exists('ambient_elated_fullscreen_menu_third_level_style')) {

	function ambient_elated_fullscreen_menu_third_level_style()	{
		$third_menu_style = array();
		if (ambient_elated_options()->getOptionValue('fullscreen_menu_color_3rd') !== '') {
			$third_menu_style['color'] = ambient_elated_options()->getOptionValue('fullscreen_menu_color_3rd');
		}

		if (ambient_elated_options()->getOptionValue('fullscreen_menu_google_fonts_3rd') !== '-1') {
			$third_menu_style['font-family'] = ambient_elated_get_formatted_font_family(ambient_elated_options()->getOptionValue('fullscreen_menu_google_fonts_3rd')) . ',sans-serif';
		}

		if (ambient_elated_options()->getOptionValue('fullscreen_menu_fontsize_3rd') !== '') {
			$third_menu_style['font-size'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('fullscreen_menu_fontsize_3rd')) . 'px';
		}

		if (ambient_elated_options()->getOptionValue('fullscreen_menu_lineheight_3rd') !== '') {
			$third_menu_style['line-height'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('fullscreen_menu_lineheight_3rd')) . 'px';
		}

		if (ambient_elated_options()->getOptionValue('fullscreen_menu_fontstyle_3rd') !== '') {
			$third_menu_style['font-style'] = ambient_elated_options()->getOptionValue('fullscreen_menu_fontstyle_3rd');
		}

		if (ambient_elated_options()->getOptionValue('fullscreen_menu_fontweight_3rd') !== '') {
			$third_menu_style['font-weight'] = ambient_elated_options()->getOptionValue('fullscreen_menu_fontweight_3rd');
		}

		if (ambient_elated_options()->getOptionValue('fullscreen_menu_letterspacing_3rd') !== '') {
			$third_menu_style['letter-spacing'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('fullscreen_menu_letterspacing_3rd')) . 'px';
		}

		if (ambient_elated_options()->getOptionValue('fullscreen_menu_texttransform_3rd') !== '') {
			$third_menu_style['text-transform'] = ambient_elated_options()->getOptionValue('fullscreen_menu_texttransform_3rd');
		}

		if (!empty($third_menu_style)) {
			echo ambient_elated_dynamic_css('nav.eltdf-fullscreen-menu ul li ul li ul li a', $third_menu_style);
		}

		$third_menu_hover_style = array();

		if (ambient_elated_options()->getOptionValue('fullscreen_menu_hover_color_3rd') !== '') {
			$third_menu_hover_style['color'] = ambient_elated_options()->getOptionValue('fullscreen_menu_hover_color_3rd');
		}

		if (!empty($third_menu_hover_style)) {
			echo ambient_elated_dynamic_css('nav.eltdf-fullscreen-menu ul li ul li ul li a:hover, nav.eltdf-fullscreen-menu ul li ul li ul li.current-menu-ancestor > a, nav.eltdf-fullscreen-menu ul li ul li ul li.current-menu-item > a', $third_menu_hover_style);
		}
	}

	add_action('ambient_elated_style_dynamic', 'ambient_elated_fullscreen_menu_third_level_style');

}

if (!function_exists('ambient_elated_fullscreen_menu_icon_styles')) {

	function ambient_elated_fullscreen_menu_icon_styles() {

		if (ambient_elated_options()->getOptionValue('fullscreen_menu_icon_color') !== '') {

			echo ambient_elated_dynamic_css('.eltdf-fullscreen-menu-opener .eltdf-fm-lines .eltdf-fm-line', array(
				'background-color' => ambient_elated_options()->getOptionValue('fullscreen_menu_icon_color')
			));
		}

		if (ambient_elated_options()->getOptionValue('fullscreen_menu_icon_hover_color') !== '') {

			echo ambient_elated_dynamic_css('.eltdf-fullscreen-menu-opener:hover .eltdf-fm-lines .eltdf-fm-line', array(
				'background-color' => ambient_elated_options()->getOptionValue('fullscreen_menu_icon_hover_color')
			));
		}

		if (ambient_elated_options()->getOptionValue('fullscreen_menu_light_icon_color') !== '') {
			echo ambient_elated_dynamic_css('.eltdf-light-header .eltdf-page-header > div:not(.eltdf-sticky-header) .eltdf-fullscreen-menu-opener:not(.eltdf-fm-opened) .eltdf-fm-lines .eltdf-fm-line,
			.eltdf-light-header.eltdf-header-style-on-scroll .eltdf-page-header .eltdf-fullscreen-menu-opener:not(.eltdf-fm-opened) .eltdf-fm-lines .eltdf-fm-line,
			.eltdf-light-header .eltdf-top-bar .eltdf-fullscreen-menu-opener:not(.eltdf-fm-opened) .eltdf-fm-lines .eltdf-fm-line', array(
				'background-color' => ambient_elated_options()->getOptionValue('fullscreen_menu_light_icon_color') . ' !important'
			));
		}

		if (ambient_elated_options()->getOptionValue('fullscreen_menu_light_icon_hover_color') !== '') {

			echo ambient_elated_dynamic_css('.eltdf-light-header .eltdf-page-header > div:not(.eltdf-sticky-header) .eltdf-fullscreen-menu-opener:not(.eltdf-fm-opened):hover .eltdf-fm-lines .eltdf-fm-line,
			.eltdf-light-header.eltdf-header-style-on-scroll .eltdf-page-header .eltdf-fullscreen-menu-opener:not(.eltdf-fm-opened):hover .eltdf-fm-lines .eltdf-fm-line,
			.eltdf-light-header .eltdf-top-bar .eltdf-fullscreen-menu-opener:not(.eltdf-fm-opened):hover .eltdf-fm-lines .eltdf-fm-line', array(
				'background-color' => ambient_elated_options()->getOptionValue('fullscreen_menu_light_icon_hover_color') . ' !important'
			));
		}

		if (ambient_elated_options()->getOptionValue('fullscreen_menu_dark_icon_color') !== '') {

			echo ambient_elated_dynamic_css('.eltdf-dark-header .eltdf-page-header > div:not(.eltdf-sticky-header) .eltdf-fullscreen-menu-opener:not(.eltdf-fm-opened) .eltdf-fm-lines .eltdf-fm-line,
			.eltdf-dark-header.eltdf-header-style-on-scroll .eltdf-page-header .eltdf-fullscreen-menu-opener:not(.eltdf-fm-opened) .eltdf-fm-lines .eltdf-fm-line,
			.eltdf-dark-header .eltdf-top-bar .eltdf-fullscreen-menu-opener:not(.eltdf-fm-opened) .eltdf-fm-lines .eltdf-fm-line', array(
				'background-color' => ambient_elated_options()->getOptionValue('fullscreen_menu_dark_icon_color') . ' !important'
			));
		}

		if (ambient_elated_options()->getOptionValue('fullscreen_menu_dark_icon_hover_color') !== '') {

			echo ambient_elated_dynamic_css('.eltdf-dark-header .eltdf-page-header > div:not(.eltdf-sticky-header) .eltdf-fullscreen-menu-opener:not(.eltdf-fm-opened):hover .eltdf-fm-lines .eltdf-fm-line,
			.eltdf-dark-header.eltdf-header-style-on-scroll .eltdf-page-header .eltdf-fullscreen-menu-opener:not(.eltdf-fm-opened):hover .eltdf-fm-lines .eltdf-fm-line,
			.eltdf-dark-header .eltdf-top-bar .eltdf-fullscreen-menu-opener:not(.eltdf-fm-opened):hover .eltdf-fm-lines .eltdf-fm-line', array(
				'background-color' => ambient_elated_options()->getOptionValue('fullscreen_menu_dark_icon_hover_color') . ' !important'
			));
		}
		
		if (ambient_elated_options()->getOptionValue('fullscreen_menu_close_icon_color') !== '') {
			
			echo ambient_elated_dynamic_css('.eltdf-fullscreen-menu-opener.eltdf-fm-opened .eltdf-fm-lines .eltdf-fm-line', array(
				'background-color' => ambient_elated_options()->getOptionValue('fullscreen_menu_close_icon_color')
			));
		}
		
		if (ambient_elated_options()->getOptionValue('fullscreen_menu_close_icon_hover_color') !== '') {
			
			echo ambient_elated_dynamic_css('.eltdf-fullscreen-menu-opener.eltdf-fm-opened:hover .eltdf-fm-lines .eltdf-fm-line', array(
				'background-color' => ambient_elated_options()->getOptionValue('fullscreen_menu_close_icon_hover_color')
			));
		}
	}

	add_action('ambient_elated_style_dynamic', 'ambient_elated_fullscreen_menu_icon_styles');
}

if (!function_exists('ambient_elated_fullscreen_menu_icon_spacing')) {

	function ambient_elated_fullscreen_menu_icon_spacing() {

		$fullscreen_menu_icon_spacing = array();

		if (ambient_elated_options()->getOptionValue('fullscreen_menu_icon_padding_left') !== '') {
			$fullscreen_menu_icon_spacing['padding-left'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('fullscreen_menu_icon_padding_left')) . 'px';
		}

		if (ambient_elated_options()->getOptionValue('fullscreen_menu_icon_padding_right') !== '') {
			$fullscreen_menu_icon_spacing['padding-right'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('fullscreen_menu_icon_padding_right')) . 'px';
		}

		if (ambient_elated_options()->getOptionValue('fullscreen_menu_icon_margin_left') !== '') {
			$fullscreen_menu_icon_spacing['margin-left'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('fullscreen_menu_icon_margin_left')) . 'px';
		}

		if (ambient_elated_options()->getOptionValue('fullscreen_menu_icon_margin_right') !== '') {
			$fullscreen_menu_icon_spacing['margin-right'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('fullscreen_menu_icon_margin_right')) . 'px';
		}

		if (!empty($fullscreen_menu_icon_spacing)) {
			echo ambient_elated_dynamic_css('a.eltdf-fullscreen-menu-opener', $fullscreen_menu_icon_spacing);
		}
	}

	add_action('ambient_elated_style_dynamic', 'ambient_elated_fullscreen_menu_icon_spacing');
}