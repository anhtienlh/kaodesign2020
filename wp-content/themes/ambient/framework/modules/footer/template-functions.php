<?php

if (!function_exists('ambient_elated_register_footer_sidebar')) {

	function ambient_elated_register_footer_sidebar() {

		register_sidebar(array(
			'name' => esc_html__('Footer Top Column 1', 'ambient'),
			'id' => 'footer_top_column_1',
			'before_widget' => '<div id="%1$s" class="widget eltdf-footer-column-1 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="eltdf-footer-widget-title">',
			'after_title' => '</h4>'
		));

		register_sidebar(array(
			'name' => esc_html__('Footer Top Column 2', 'ambient'),
			'id' => 'footer_top_column_2',
			'before_widget' => '<div id="%1$s" class="widget eltdf-footer-column-2 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="eltdf-footer-widget-title">',
			'after_title' => '</h4>'
		));

		register_sidebar(array(
			'name' => esc_html__('Footer Top Column 3', 'ambient'),
			'id' => 'footer_top_column_3',
			'before_widget' => '<div id="%1$s" class="widget eltdf-footer-column-3 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="eltdf-footer-widget-title">',
			'after_title' => '</h4>'
		));

		register_sidebar(array(
			'name' => esc_html__('Footer Top Column 4', 'ambient'),
			'id' => 'footer_top_column_4',
			'before_widget' => '<div id="%1$s" class="widget eltdf-footer-column-4 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="eltdf-footer-widget-title">',
			'after_title' => '</h4>'
		));

		register_sidebar(array(
			'name' => esc_html__('Footer Bottom Left Column', 'ambient'),
			'id' => 'footer_bottom_column_1',
			'before_widget' => '<div id="%1$s" class="widget eltdf-footer-bottom-column-1 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="eltdf-footer-bottom-widget-title">',
			'after_title' => '</h2>'
		));

		register_sidebar(array(
			'name' => esc_html__('Footer Bottom Middle Column', 'ambient'),
			'id' => 'footer_bottom_column_2',
			'before_widget' => '<div id="%1$s" class="widget eltdf-footer-bottom-column-2 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="eltdf-footer-bottom-widget-title">',
			'after_title' => '</h2>'
		));

		register_sidebar(array(
			'name' => esc_html__('Footer Bottom Right Column', 'ambient'),
			'id' => 'footer_bottom_column_3',
			'before_widget' => '<div id="%1$s" class="widget eltdf-footer-bottom-column-3 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="eltdf-footer-bottom-widget-title">',
			'after_title' => '</h2>'
		));
	}

	add_action('widgets_init', 'ambient_elated_register_footer_sidebar');
}

if (!function_exists('ambient_elated_get_footer')) {
	/**
	 * Loads footer HTML
	 */
	function ambient_elated_get_footer() {

		$parameters = array();
		$id = ambient_elated_get_page_id();

		$parameters['footer_classes'] = ambient_elated_get_footer_classes($id);
		$parameters['display_footer_top'] = (ambient_elated_get_meta_field_intersect('show_footer_top') === 'yes') ? true : false;
		$parameters['display_footer_bottom'] = (ambient_elated_get_meta_field_intersect('show_footer_bottom') === 'yes') ? true : false;
		
		if(!is_active_sidebar('footer_top_column_1') && !is_active_sidebar('footer_top_column_2') && !is_active_sidebar('footer_top_column_3') && !is_active_sidebar('footer_top_column_4')) {
			$parameters['display_footer_top'] = false;
		}
		
		if(!is_active_sidebar('footer_bottom_column_1') && !is_active_sidebar('footer_bottom_column_2') && !is_active_sidebar('footer_bottom_column_3')) {
			$parameters['display_footer_bottom'] = false;
		}

		ambient_elated_get_module_template_part('templates/footer', 'footer', '', $parameters);
	}
}

if (!function_exists('ambient_elated_get_footer_top')) {
	/**
	 * Return footer top HTML
	 */
	function ambient_elated_get_footer_top() {

		$parameters = array();

		$parameters['footer_in_grid'] = (ambient_elated_options()->getOptionValue('footer_in_grid') == 'yes') ? true : false;
		$parameters['footer_top_classes'] = ambient_elated_footer_top_classes();
		$parameters['footer_top_columns'] = ambient_elated_options()->getOptionValue('footer_top_columns');

		ambient_elated_get_module_template_part('templates/parts/footer-top', 'footer', '', $parameters);
	}
}

if (!function_exists('ambient_elated_get_footer_bottom')) {
	/**
	 * Return footer bottom HTML
	 */
	function ambient_elated_get_footer_bottom() {

		$parameters = array();

		$parameters['footer_in_grid'] = (ambient_elated_options()->getOptionValue('footer_in_grid') == 'yes') ? true : false;
		$parameters['footer_bottom_classes'] = ambient_elated_footer_bottom_classes();
		$parameters['footer_bottom_columns'] = ambient_elated_options()->getOptionValue('footer_bottom_columns');

		ambient_elated_get_module_template_part('templates/parts/footer-bottom', 'footer', '', $parameters);
	}
}

//Functions for loading sidebars

if (!function_exists('ambient_elated_get_footer_sidebar_25_25_50')) {

	function ambient_elated_get_footer_sidebar_25_25_50() {
		ambient_elated_get_module_template_part('templates/sidebars/sidebar-three-columns-25-25-50', 'footer');
	}
}

if (!function_exists('ambient_elated_get_footer_sidebar_50_25_25')) {

	function ambient_elated_get_footer_sidebar_50_25_25() {
		ambient_elated_get_module_template_part('templates/sidebars/sidebar-three-columns-50-25-25', 'footer');
	}
}

if (!function_exists('ambient_elated_get_footer_sidebar_four_columns')) {

	function ambient_elated_get_footer_sidebar_four_columns() {
		ambient_elated_get_module_template_part('templates/sidebars/sidebar-four-columns', 'footer');
	}
}

if (!function_exists('ambient_elated_get_footer_sidebar_three_columns')) {

	function ambient_elated_get_footer_sidebar_three_columns() {
		ambient_elated_get_module_template_part('templates/sidebars/sidebar-three-columns', 'footer');
	}
}

if (!function_exists('ambient_elated_get_footer_sidebar_two_columns')) {

	function ambient_elated_get_footer_sidebar_two_columns() {
		ambient_elated_get_module_template_part('templates/sidebars/sidebar-two-columns', 'footer');
	}
}

if (!function_exists('ambient_elated_get_footer_sidebar_one_column')) {

	function ambient_elated_get_footer_sidebar_one_column() {
		ambient_elated_get_module_template_part('templates/sidebars/sidebar-one-column', 'footer');
	}
}

if (!function_exists('ambient_elated_get_footer_bottom_sidebar_three_columns')) {

	function ambient_elated_get_footer_bottom_sidebar_three_columns() {
		ambient_elated_get_module_template_part('templates/sidebars/sidebar-bottom-three-columns', 'footer');
	}
}

if (!function_exists('ambient_elated_get_footer_bottom_sidebar_two_columns')) {

	function ambient_elated_get_footer_bottom_sidebar_two_columns() {
		ambient_elated_get_module_template_part('templates/sidebars/sidebar-bottom-two-columns', 'footer');
	}
}

if (!function_exists('ambient_elated_get_footer_bottom_sidebar_one_column')) {

	function ambient_elated_get_footer_bottom_sidebar_one_column() {
		ambient_elated_get_module_template_part('templates/sidebars/sidebar-bottom-one-column', 'footer');
	}
}