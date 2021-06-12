<?php

if(!function_exists('ambient_elated_register_full_screen_menu_nav')) {
    function ambient_elated_register_full_screen_menu_nav() {
	    register_nav_menus(
		    array(
			    'popup-navigation' => esc_html__('Fullscreen Navigation', 'ambient')
		    )
	    );
    }

	add_action('after_setup_theme', 'ambient_elated_register_full_screen_menu_nav');
}

if ( !function_exists('ambient_elated_register_full_screen_menu_sidebars') ) {

	function ambient_elated_register_full_screen_menu_sidebars() {

		register_sidebar(array(
			'name' => esc_html__('Fullscreen Menu Top', 'ambient'),
			'id' => 'fullscreen_menu_above',
			'description' => esc_html__('This widget area is rendered above fullscreen menu', 'ambient'),
			'before_widget' => '<div class="%2$s eltdf-fullscreen-menu-above-widget">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="eltdf-fullscreen-widget-title">',
			'after_title' => '</h4>'
		));

		register_sidebar(array(
			'name' => esc_html__('Fullscreen Menu Bottom', 'ambient'),
			'id' => 'fullscreen_menu_below',
			'description' => esc_html__('This widget area is rendered below fullscreen menu', 'ambient'),
			'before_widget' => '<div class="%2$s eltdf-fullscreen-menu-below-widget">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="eltdf-fullscreen-widget-title">',
			'after_title' => '</h4>'
		));

	}

	add_action('widgets_init', 'ambient_elated_register_full_screen_menu_sidebars');

}

if(!function_exists('ambient_elated_fullscreen_menu_body_class')) {
	/**
	 * Function that adds body classes for different full screen menu types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function ambient_elated_fullscreen_menu_body_class($classes) {

		if ( is_active_widget( false, false, 'eltdf_full_screen_menu_opener' ) ) {

			$classes[] = 'eltdf-' . ambient_elated_options()->getOptionValue('fullscreen_menu_animation_style');

		}

		return $classes;
	}

	add_filter('body_class', 'ambient_elated_fullscreen_menu_body_class');
}

if ( !function_exists('ambient_elated_get_full_screen_menu') ) {
	/**
	 * Loads fullscreen menu HTML template
	 */
	function ambient_elated_get_full_screen_menu() {

		if ( is_active_widget( false, false, 'eltdf_full_screen_menu_opener' ) ) {

			$parameters = array(
				'fullscreen_menu_in_grid' => ambient_elated_options()->getOptionValue('fullscreen_in_grid') === 'yes' ? true : false
			);

			ambient_elated_get_module_template_part('templates/fullscreen-menu', 'fullscreenmenu', '', $parameters);
		}
	}
}

if ( !function_exists('ambient_elated_get_full_screen_menu_navigation') ) {
	/**
	 * Loads fullscreen menu navigation HTML template
	 */
	function ambient_elated_get_full_screen_menu_navigation() {

		ambient_elated_get_module_template_part('templates/parts/navigation', 'fullscreenmenu');
	}
}