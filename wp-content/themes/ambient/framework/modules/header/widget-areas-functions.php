<?php

if(!function_exists('ambient_elated_register_top_header_areas')) {
    /**
     * Registers widget areas for top header bar when it is enabled
     */
    function ambient_elated_register_top_header_areas() {

    	if ( ambient_elated_core_plugin_installed() ) {

			register_sidebar(array(
				'name' => esc_html__('Top Bar Left Column', 'ambient'),
				'id' => 'eltdf-top-bar-left',
				'before_widget' => '<div id="%1$s" class="widget %2$s eltdf-top-bar-widget">',
				'after_widget' => '</div>',
				'description' => esc_html__('Widgets added here will appear on the left side in top bar header', 'ambient')
			));

			register_sidebar(array(
				'name' => esc_html__('Top Bar Right Column', 'ambient'),
				'id' => 'eltdf-top-bar-right',
				'before_widget' => '<div id="%1$s" class="widget %2$s eltdf-top-bar-widget">',
				'after_widget' => '</div>',
				'description' => esc_html__('Widgets added here will appear on the right side in top bar header', 'ambient')
			));
		}
    }

    add_action('widgets_init', 'ambient_elated_register_top_header_areas');
}

if(!function_exists('ambient_elated_header_widget_areas')) {
    /**
     * Registers widget areas for header types
     */
    function ambient_elated_header_standard_widget_areas() {

		if ( ambient_elated_core_plugin_installed() ) {

			register_sidebar(array(
				'name' => esc_html__('Header Widget Area', 'ambient'),
				'id' => 'eltdf-header-widget-area',
				'before_widget' => '<div id="%1$s" class="widget %2$s eltdf-header-widget-area">',
				'after_widget' => '</div>',
				'description' => esc_html__('Widgets added here will appear on the right hand side from the main menu', 'ambient')
			));
		}
    }

    add_action('widgets_init', 'ambient_elated_header_standard_widget_areas');
}

if(!function_exists('ambient_elated_register_mobile_header_areas')) {
    /**
     * Registers widget areas for mobile header
     */
    function ambient_elated_register_mobile_header_areas() {
        if( ambient_elated_is_responsive_on() && ambient_elated_core_plugin_installed() ) {
            register_sidebar(array(
                'name'          => esc_html__('Mobile Header Widget Area', 'ambient'),
                'id'            => 'eltdf-right-from-mobile-logo',
                'before_widget' => '<div id="%1$s" class="widget %2$s eltdf-right-from-mobile-logo">',
                'after_widget'  => '</div>',
                'description'   => esc_html__('Widgets added here will appear on the right hand side from the mobile logo on mobile header', 'ambient')
            ));
        }
    }

    add_action('widgets_init', 'ambient_elated_register_mobile_header_areas');
}

if(!function_exists('ambient_elated_register_sticky_header_areas')) {
    /**
     * Registers widget area for sticky header
     */
    function ambient_elated_register_sticky_header_areas() {
        if(in_array(ambient_elated_options()->getOptionValue('header_behaviour'), array('sticky-header-on-scroll-up','sticky-header-on-scroll-down-up'))) {
            register_sidebar(array(
                'name'          => esc_html__('Sticky Header Widget Area', 'ambient'),
                'id'            => 'eltdf-sticky-right',
                'before_widget' => '<div id="%1$s" class="widget %2$s eltdf-sticky-right">',
                'after_widget'  => '</div>',
                'description'   => esc_html__('Widgets added here will appear on the right hand side from the sticky menu', 'ambient')
            ));
        }
    }

    add_action('widgets_init', 'ambient_elated_register_sticky_header_areas');
}