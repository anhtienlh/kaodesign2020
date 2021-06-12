<?php

/*** Child Theme Function  ***/

function ambient_elated_child_theme_enqueue_scripts() {
	$parent_style = 'ambient_elated_default_style';

	wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');

	wp_enqueue_style('ambient_elated_child_style',
		get_stylesheet_directory_uri() . '/style.css',
		array($parent_style),
		wp_get_theme()->get('Version')
	);
}

add_action( 'wp_enqueue_scripts', 'ambient_elated_child_theme_enqueue_scripts' );

function enqueue_load_fa() {
	wp_enqueue_style( 'load-fa', 'https://use.fontawesome.com/releases/v5.0.13/css/all.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_load_fa' );