<?php
if (!function_exists('ambient_elated_register_side_area_sidebar')) {
	/**
	 * Register side area sidebar
	 */
	function ambient_elated_register_side_area_sidebar() {

		register_sidebar(array(
			'name' => esc_html__('Side Area', 'ambient'),
			'id' => 'sidearea', //TODO Change name of sidebar
			'description' => esc_html__('Side Area', 'ambient'),
			'before_widget' => '<div id="%1$s" class="widget eltdf-sidearea %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="eltdf-sidearea-widget-title">',
			'after_title' => '</h4>'
		));

	}

	add_action('widgets_init', 'ambient_elated_register_side_area_sidebar');

}

if(!function_exists('ambient_elated_side_menu_body_class')) {
    /**
     * Function that adds body classes for different side menu styles
     *
     * @param $classes array original array of body classes
     *
     * @return array modified array of classes
     */
    function ambient_elated_side_menu_body_class($classes) {

		if (is_active_widget( false, false, 'eltdf_side_area_opener' )) {

			$classes[] = 'eltdf-side-menu-slide-from-right';

		}

		return $classes;
    }

    add_filter('body_class', 'ambient_elated_side_menu_body_class');
}

if(!function_exists('ambient_elated_get_side_area')) {
	/**
	 * Loads side area HTML
	 */
	function ambient_elated_get_side_area() {

		if (is_active_widget( false, false, 'eltdf_side_area_opener' )) {

			$parameters = array(
				'show_side_area_title' => ambient_elated_options()->getOptionValue('side_area_title') !== '' ? true : false, //Dont show title if empty
			);

			ambient_elated_get_module_template_part('templates/sidearea', 'sidearea', '', $parameters);
		}
	}
}

if (!function_exists('ambient_elated_get_side_area_title')) {
	/**
	 * Loads side area title HTML
	 */
	function ambient_elated_get_side_area_title() {

		$parameters = array(
			'side_area_title' => ambient_elated_options()->getOptionValue('side_area_title')
		);

		ambient_elated_get_module_template_part('templates/parts/title', 'sidearea', '', $parameters);
	}
}

