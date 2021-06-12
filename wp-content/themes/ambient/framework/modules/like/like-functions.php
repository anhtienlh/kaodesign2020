<?php

if ( ! function_exists('ambient_elated_like') ) {
	/**
	 * Returns AmbientElatedClassLike instance
	 *
	 * @return AmbientElatedClassLike
	 */
	function ambient_elated_like() {
		return AmbientElatedClassLike::get_instance();
	}
}

function ambient_elated_get_like() {

	echo wp_kses(ambient_elated_like()->add_like(), array(
		'span' => array(
			'class' => true,
			'aria-hidden' => true,
			'style' => true,
			'id' => true
		),
		'i' => array(
			'class' => true,
			'style' => true,
			'id' => true
		),
		'a' => array(
			'href' => true,
			'class' => true,
			'id' => true,
			'title' => true,
			'style' => true
		)
	));
}

if ( ! function_exists('ambient_elated_like_latest_posts') ) {
	/**
	 * Add like to latest post
	 *
	 * @return string
	 */
	function ambient_elated_like_latest_posts() {
		return ambient_elated_like()->add_like();
	}
}

if ( ! function_exists('ambient_elated_like_portfolio_list') ) {
	/**
	 * Add like to portfolio project
	 *
	 * @param $portfolio_project_id
	 * @return string
	 */
	function ambient_elated_like_portfolio_list($portfolio_project_id) {
		return ambient_elated_like()->add_like_portfolio_list($portfolio_project_id);
	}
}