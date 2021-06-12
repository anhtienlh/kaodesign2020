<?php

if (!function_exists('ambient_elated_search_opener_icon_size')) {

	function ambient_elated_search_opener_icon_size() {

		if (ambient_elated_options()->getOptionValue('header_search_icon_size')) {
			echo ambient_elated_dynamic_css('.eltdf-search-opener', array(
				'font-size' => ambient_elated_filter_px(ambient_elated_options()->getOptionValue('header_search_icon_size')) . 'px'
			));
		}

	}

	add_action('ambient_elated_style_dynamic', 'ambient_elated_search_opener_icon_size');

}

if (!function_exists('ambient_elated_search_opener_icon_colors')) {

	function ambient_elated_search_opener_icon_colors() {

		if (ambient_elated_options()->getOptionValue('header_search_icon_color') !== '') {
			echo ambient_elated_dynamic_css('.eltdf-search-opener', array(
				'color' => ambient_elated_options()->getOptionValue('header_search_icon_color')
			));
		}

		if (ambient_elated_options()->getOptionValue('header_search_icon_hover_color') !== '') {
			echo ambient_elated_dynamic_css('.eltdf-search-opener:hover', array(
				'color' => ambient_elated_options()->getOptionValue('header_search_icon_hover_color')
			));
		}

		if (ambient_elated_options()->getOptionValue('header_light_search_icon_color') !== '') {
			echo ambient_elated_dynamic_css('.eltdf-light-header .eltdf-page-header > div:not(.eltdf-sticky-header):not(.fixed) .eltdf-search-opener, .eltdf-light-header .eltdf-top-bar .eltdf-search-opener', array(
				'color' => ambient_elated_options()->getOptionValue('header_light_search_icon_color') . ' !important'
			));
		}

		if (ambient_elated_options()->getOptionValue('header_light_search_icon_hover_color') !== '') {
			echo ambient_elated_dynamic_css('.eltdf-light-header .eltdf-page-header > div:not(.eltdf-sticky-header):not(.fixed) .eltdf-search-opener:hover, .eltdf-light-header .eltdf-top-bar .eltdf-search-opener:hover', array(
				'color' => ambient_elated_options()->getOptionValue('header_light_search_icon_hover_color') . ' !important'
			));
		}

		if (ambient_elated_options()->getOptionValue('header_dark_search_icon_color') !== '') {
			echo ambient_elated_dynamic_css('.eltdf-dark-header .eltdf-page-header > div:not(.eltdf-sticky-header):not(.fixed) .eltdf-search-opener, .eltdf-dark-header .eltdf-top-bar .eltdf-search-opener', array(
				'color' => ambient_elated_options()->getOptionValue('header_dark_search_icon_color') . ' !important'
			));
		}
		if (ambient_elated_options()->getOptionValue('header_dark_search_icon_hover_color') !== '') {
			echo ambient_elated_dynamic_css('.eltdf-dark-header .eltdf-page-header > div:not(.eltdf-sticky-header):not(.fixed) .eltdf-search-opener:hover, .eltdf-dark-header .eltdf-top-bar .eltdf-search-opener:hover', array(
				'color' => ambient_elated_options()->getOptionValue('header_dark_search_icon_hover_color') . ' !important'
			));
		}
	}

	add_action('ambient_elated_style_dynamic', 'ambient_elated_search_opener_icon_colors');

}

if (!function_exists('ambient_elated_search_opener_icon_background_colors')) {

	function ambient_elated_search_opener_icon_background_colors()	{

		if (ambient_elated_options()->getOptionValue('search_icon_background_color') !== '') {
			echo ambient_elated_dynamic_css('.eltdf-search-opener', array(
				'background-color' => ambient_elated_options()->getOptionValue('search_icon_background_color')
			));
		}

		if (ambient_elated_options()->getOptionValue('search_icon_background_hover_color') !== '') {
			echo ambient_elated_dynamic_css('.eltdf-search-opener:hover', array(
				'background-color' => ambient_elated_options()->getOptionValue('search_icon_background_hover_color')
			));
		}
	}

	add_action('ambient_elated_style_dynamic', 'ambient_elated_search_opener_icon_background_colors');
}

if (!function_exists('ambient_elated_search_opener_text_styles')) {

	function ambient_elated_search_opener_text_styles() {
		$text_styles = array();

		if (ambient_elated_options()->getOptionValue('search_icon_text_color') !== '') {
			$text_styles['color'] = ambient_elated_options()->getOptionValue('search_icon_text_color');
		}
		if (ambient_elated_options()->getOptionValue('search_icon_text_fontsize') !== '') {
			$text_styles['font-size'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('search_icon_text_fontsize')) . 'px';
		}
		if (ambient_elated_options()->getOptionValue('search_icon_text_lineheight') !== '') {
			$text_styles['line-height'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('search_icon_text_lineheight')) . 'px';
		}
		if (ambient_elated_options()->getOptionValue('search_icon_text_texttransform') !== '') {
			$text_styles['text-transform'] = ambient_elated_options()->getOptionValue('search_icon_text_texttransform');
		}
		if (ambient_elated_options()->getOptionValue('search_icon_text_google_fonts') !== '-1') {
			$text_styles['font-family'] = ambient_elated_get_formatted_font_family(ambient_elated_options()->getOptionValue('search_icon_text_google_fonts')) . ', sans-serif';
		}
		if (ambient_elated_options()->getOptionValue('search_icon_text_fontstyle') !== '') {
			$text_styles['font-style'] = ambient_elated_options()->getOptionValue('search_icon_text_fontstyle');
		}
		if (ambient_elated_options()->getOptionValue('search_icon_text_fontweight') !== '') {
			$text_styles['font-weight'] = ambient_elated_options()->getOptionValue('search_icon_text_fontweight');
		}

		if (!empty($text_styles)) {
			echo ambient_elated_dynamic_css('.eltdf-search-icon-text', $text_styles);
		}
		if (ambient_elated_options()->getOptionValue('search_icon_text_color_hover') !== '') {
			echo ambient_elated_dynamic_css('.eltdf-search-opener:hover .eltdf-search-icon-text', array(
				'color' => ambient_elated_options()->getOptionValue('search_icon_text_color_hover')
			));
		}
	}

	add_action('ambient_elated_style_dynamic', 'ambient_elated_search_opener_text_styles');
}

if (!function_exists('ambient_elated_search_opener_spacing')) {

	function ambient_elated_search_opener_spacing() {
		$spacing_styles = array();

		if (ambient_elated_options()->getOptionValue('search_padding_left') !== '') {
			$spacing_styles['padding-left'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('search_padding_left')) . 'px';
		}
		if (ambient_elated_options()->getOptionValue('search_padding_right') !== '') {
			$spacing_styles['padding-right'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('search_padding_right')) . 'px';
		}
		if (ambient_elated_options()->getOptionValue('search_margin_left') !== '') {
			$spacing_styles['margin-left'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('search_margin_left')) . 'px';
		}
		if (ambient_elated_options()->getOptionValue('search_margin_right') !== '') {
			$spacing_styles['margin-right'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('search_margin_right')) . 'px';
		}

		if (!empty($spacing_styles)) {
			echo ambient_elated_dynamic_css('.eltdf-search-opener', $spacing_styles);
		}
	}

	add_action('ambient_elated_style_dynamic', 'ambient_elated_search_opener_spacing');
}