<?php

if (!function_exists('ambient_elated_header_class')) {
	/**
	 * Function that adds class to header based on theme options
	 * @param array array of classes from main filter
	 * @return array array of classes with added header class
	 */
	function ambient_elated_header_class($classes) {
		$header_type = ambient_elated_get_meta_field_intersect('header_type', ambient_elated_get_page_id());

		$classes[] = 'eltdf-' . $header_type;

		return $classes;
	}

	add_filter('body_class', 'ambient_elated_header_class');
}

if (!function_exists('ambient_elated_header_behaviour_class')) {
	/**
	 * Function that adds behaviour class to header based on theme options
	 * @param array array of classes from main filter
	 * @return array array of classes with added behaviour class
	 */
	function ambient_elated_header_behaviour_class($classes) {

		$classes[] = 'eltdf-' . ambient_elated_options()->getOptionValue('header_behaviour');

		return $classes;
	}

	add_filter('body_class', 'ambient_elated_header_behaviour_class');
}

if (!function_exists('ambient_elated_mobile_header_class')) {
	function ambient_elated_mobile_header_class($classes) {
		$classes[] = 'eltdf-default-mobile-header';

		$classes[] = 'eltdf-sticky-up-mobile-header';

		return $classes;
	}

	add_filter('body_class', 'ambient_elated_mobile_header_class');
}

if (!function_exists('ambient_elated_menu_dropdown_appearance')) {
	/**
	 * Function that adds menu dropdown appearance class to body tag
	 * @param array array of classes from main filter
	 * @return array array of classes with added menu dropdown appearance class
	 */
	function ambient_elated_menu_dropdown_appearance($classes) {

		if (ambient_elated_options()->getOptionValue('menu_dropdown_appearance') !== 'default') {
			$classes[] = 'eltdf-' . ambient_elated_options()->getOptionValue('menu_dropdown_appearance');
		}

		return $classes;
	}

	add_filter('body_class', 'ambient_elated_menu_dropdown_appearance');
}

if (!function_exists('ambient_elated_header_skin_class')) {

	function ambient_elated_header_skin_class($classes) {

		$id = ambient_elated_get_page_id();

		if (($meta_temp = get_post_meta($id, 'eltdf_header_style_meta', true)) !== '') {
			$classes[] = 'eltdf-' . $meta_temp;
		} else if (is_404() && ambient_elated_options()->getOptionValue('404_header_style') !== '') {
			$classes[] = 'eltdf-' . ambient_elated_options()->getOptionValue('404_header_style');
		} else if (ambient_elated_options()->getOptionValue('header_style') !== '') {
			$classes[] = 'eltdf-' . ambient_elated_options()->getOptionValue('header_style');
		}

		return $classes;
	}

	add_filter('body_class', 'ambient_elated_header_skin_class');
}

if (!function_exists('ambient_elated_menu_widgets_separator')) {

	function ambient_elated_menu_widgets_separator($classes) {

		$id = ambient_elated_get_page_id();

		if (ambient_elated_get_meta_field_intersect('enable_separator_between_menu_and_widgets', $id) == 'yes') {
			$classes[] = 'eltdf-header-widget-separator';
		}

		return $classes;
	}

	add_filter('body_class', 'ambient_elated_menu_widgets_separator');
}

if (!function_exists('ambient_elated_header_global_js_var')) {
	function ambient_elated_header_global_js_var($global_variables) {

		$global_variables['eltdfTopBarHeight'] = ambient_elated_get_top_bar_height();
		$global_variables['eltdfStickyHeaderHeight'] = ambient_elated_get_sticky_header_height();
		$global_variables['eltdfStickyHeaderTransparencyHeight'] = ambient_elated_get_sticky_header_height_of_complete_transparency();
		$global_variables['eltdfStickyScrollAmount'] = ambient_elated_get_sticky_scroll_amount();

		return $global_variables;
	}

	add_filter('ambient_elated_js_global_variables', 'ambient_elated_header_global_js_var');
}

if (!function_exists('ambient_elated_header_per_page_js_var')) {
	function ambient_elated_header_per_page_js_var($perPageVars) {

		$perPageVars['eltdfStickyScrollAmount'] = ambient_elated_get_sticky_scroll_amount_per_page();

		return $perPageVars;
	}

	add_filter('ambient_elated_per_page_js_vars', 'ambient_elated_header_per_page_js_var');
}