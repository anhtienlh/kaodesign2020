<?php

if (!function_exists('ambient_elated_side_area_slide_from_right_type_style')) {

	function ambient_elated_side_area_slide_from_right_type_style()	{

		if (ambient_elated_options()->getOptionValue('side_area_width') !== '') {
			echo ambient_elated_dynamic_css('.eltdf-side-menu-slide-from-right .eltdf-side-menu', array(
				'right' => '-'.ambient_elated_filter_px(ambient_elated_options()->getOptionValue('side_area_width')) . 'px',
				'width' => ambient_elated_filter_px(ambient_elated_options()->getOptionValue('side_area_width')) . 'px'
			));
		}
	}

	add_action('ambient_elated_style_dynamic', 'ambient_elated_side_area_slide_from_right_type_style');
}

if (!function_exists('ambient_elated_side_area_icon_color_styles')) {

	function ambient_elated_side_area_icon_color_styles() {

		if (ambient_elated_options()->getOptionValue('side_area_icon_color') !== '') {

			echo ambient_elated_dynamic_css('a.eltdf-side-menu-button-opener .eltdf-side-menu-lines .eltdf-side-menu-line', array(
				'background-color' => ambient_elated_options()->getOptionValue('side_area_icon_color')
			));
		}

		if (ambient_elated_options()->getOptionValue('side_area_icon_hover_color') !== '') {

			echo ambient_elated_dynamic_css('a.eltdf-side-menu-button-opener:hover .eltdf-side-menu-lines .eltdf-side-menu-line', array(
				'background-color' => ambient_elated_options()->getOptionValue('side_area_icon_hover_color') . '!important'
			));
		}

		if (ambient_elated_options()->getOptionValue('side_area_light_icon_color') !== '') {

			echo ambient_elated_dynamic_css('.eltdf-light-header .eltdf-page-header > div:not(.eltdf-sticky-header):not(.fixed) .eltdf-side-menu-button-opener .eltdf-side-menu-lines .eltdf-side-menu-line,
			.eltdf-light-header.eltdf-header-style-on-scroll .eltdf-page-header .eltdf-side-menu-button-opener .eltdf-side-menu-lines .eltdf-side-menu-line,
			.eltdf-light-header .eltdf-top-bar .eltdf-side-menu-button-opener .eltdf-side-menu-lines .eltdf-side-menu-line', array(
				'background-color' => ambient_elated_options()->getOptionValue('side_area_light_icon_color') . ' !important'
			));
		}

		if (ambient_elated_options()->getOptionValue('side_area_light_icon_hover_color') !== '') {

			echo ambient_elated_dynamic_css('.eltdf-light-header .eltdf-page-header > div:not(.eltdf-sticky-header):not(.fixed) .eltdf-side-menu-button-opener:hover .eltdf-side-menu-lines .eltdf-side-menu-line,
			.eltdf-light-header.eltdf-header-style-on-scroll .eltdf-page-header .eltdf-side-menu-button-opener:hover .eltdf-side-menu-lines .eltdf-side-menu-line,
			.eltdf-light-header .eltdf-top-bar .eltdf-side-menu-button-opener:hover .eltdf-side-menu-lines .eltdf-side-menu-line', array(
				'background-color' => ambient_elated_options()->getOptionValue('side_area_light_icon_hover_color') . ' !important'
			));
		}

		if (ambient_elated_options()->getOptionValue('side_area_dark_icon_color') !== '') {

			echo ambient_elated_dynamic_css('.eltdf-dark-header .eltdf-page-header > div:not(.eltdf-sticky-header):not(.fixed) .eltdf-side-menu-button-opener .eltdf-side-menu-lines .eltdf-side-menu-line,
			.eltdf-dark-header.eltdf-header-style-on-scroll .eltdf-page-header .eltdf-side-menu-button-opener .eltdf-side-menu-lines .eltdf-side-menu-line,
			.eltdf-dark-header .eltdf-top-bar .eltdf-side-menu-button-opener .eltdf-side-menu-lines .eltdf-side-menu-line', array(
				'background-color' => ambient_elated_options()->getOptionValue('side_area_dark_icon_color') . ' !important'
			));
		}

		if (ambient_elated_options()->getOptionValue('side_area_dark_icon_hover_color') !== '') {

			echo ambient_elated_dynamic_css('.eltdf-dark-header .eltdf-page-header > div:not(.eltdf-sticky-header):not(.fixed) .eltdf-side-menu-button-opener:hover .eltdf-side-menu-lines .eltdf-side-menu-line,
			.eltdf-dark-header.eltdf-header-style-on-scroll .eltdf-page-header .eltdf-side-menu-button-opener:hover .eltdf-side-menu-lines .eltdf-side-menu-line,
			.eltdf-dark-header .eltdf-top-bar .eltdf-side-menu-button-opener:hover .eltdf-side-menu-lines .eltdf-side-menu-line', array(
				'background-color' => ambient_elated_options()->getOptionValue('side_area_dark_icon_hover_color') . ' !important'
			));
		}

		if (ambient_elated_options()->getOptionValue('side_area_close_icon_color') !== '') {

			echo ambient_elated_dynamic_css('.eltdf-side-menu a.eltdf-close-side-menu .eltdf-side-menu-lines .eltdf-side-menu-line', array(
				'background-color' => ambient_elated_options()->getOptionValue('side_area_close_icon_color')
			));
		}

		if (ambient_elated_options()->getOptionValue('side_area_close_icon_hover_color') !== '') {

			echo ambient_elated_dynamic_css('.eltdf-side-menu a.eltdf-close-side-menu:hover .eltdf-side-menu-lines .eltdf-side-menu-line', array(
				'background-color' => ambient_elated_options()->getOptionValue('side_area_close_icon_hover_color')
			));
		}
	}

	add_action('ambient_elated_style_dynamic', 'ambient_elated_side_area_icon_color_styles');
}

if (!function_exists('ambient_elated_side_area_icon_spacing_styles')) {

	function ambient_elated_side_area_icon_spacing_styles()	{
		$icon_spacing = array();

		if (ambient_elated_options()->getOptionValue('side_area_icon_padding_left') !== '') {
			$icon_spacing['padding-left'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('side_area_icon_padding_left')) . 'px';
		}

		if (ambient_elated_options()->getOptionValue('side_area_icon_padding_right') !== '') {
			$icon_spacing['padding-right'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('side_area_icon_padding_right')) . 'px';
		}

		if (ambient_elated_options()->getOptionValue('side_area_icon_margin_left') !== '') {
			$icon_spacing['margin-left'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('side_area_icon_margin_left')) . 'px';
		}

		if (ambient_elated_options()->getOptionValue('side_area_icon_margin_right') !== '') {
			$icon_spacing['margin-right'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('side_area_icon_margin_right')) . 'px';
		}

		if (!empty($icon_spacing)) {

			echo ambient_elated_dynamic_css('a.eltdf-side-menu-button-opener', $icon_spacing);
		}
	}

	add_action('ambient_elated_style_dynamic', 'ambient_elated_side_area_icon_spacing_styles');
}

if (!function_exists('ambient_elated_side_area_alignment')) {

	function ambient_elated_side_area_alignment() {

		if (ambient_elated_options()->getOptionValue('side_area_aligment')) {

			echo ambient_elated_dynamic_css('.eltdf-side-menu-slide-from-right .eltdf-side-menu', array(
				'text-align' => ambient_elated_options()->getOptionValue('side_area_aligment')
			));

			if(ambient_elated_options()->getOptionValue('side_area_aligment') == 'center') {
				echo ambient_elated_dynamic_css('.eltdf-side-menu .widget img', array(
					'margin' => '0 auto'
				));
			}
		}
	}

	add_action('ambient_elated_style_dynamic', 'ambient_elated_side_area_alignment');
}

if (!function_exists('ambient_elated_side_area_styles')) {

	function ambient_elated_side_area_styles() {

		$side_area_styles = array();

		if (ambient_elated_options()->getOptionValue('side_area_background_color') !== '') {
			$side_area_styles['background-color'] = ambient_elated_options()->getOptionValue('side_area_background_color');
		}

		if (ambient_elated_options()->getOptionValue('side_area_padding_top') !== '') {
			$side_area_styles['padding-top'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('side_area_padding_top')) . 'px';
		}

		if (ambient_elated_options()->getOptionValue('side_area_padding_right') !== '') {
			$side_area_styles['padding-right'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('side_area_padding_right')) . 'px';
		}

		if(ambient_elated_options()->getOptionValue('side_area_padding_right') !== '') {
			echo ambient_elated_dynamic_css('.eltdf-side-menu .eltdf-close-side-menu-holder', array(
				'right' => ambient_elated_filter_px(ambient_elated_options()->getOptionValue('side_area_padding_right')) . 'px'
			));
		}

		if (ambient_elated_options()->getOptionValue('side_area_padding_bottom') !== '') {
			$side_area_styles['padding-bottom'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('side_area_padding_bottom')) . 'px';
		}

		if (ambient_elated_options()->getOptionValue('side_area_padding_left') !== '') {
			$side_area_styles['padding-left'] = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('side_area_padding_left')) . 'px';
		}

		if (!empty($side_area_styles)) {
			echo ambient_elated_dynamic_css('.eltdf-side-menu', $side_area_styles);
		}
	}

	add_action('ambient_elated_style_dynamic', 'ambient_elated_side_area_styles');
}