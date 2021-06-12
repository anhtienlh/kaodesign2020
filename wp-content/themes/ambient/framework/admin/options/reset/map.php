<?php

if ( ! function_exists('ambient_elated_reset_options_map') ) {
	/**
	 * Reset options panel
	 */
	function ambient_elated_reset_options_map() {

		ambient_elated_add_admin_page(
			array(
				'slug'  => '_reset_page',
				'title' => esc_html__('Reset', 'ambient'),
				'icon'  => 'fa fa-retweet'
			)
		);

		$panel_reset = ambient_elated_add_admin_panel(
			array(
				'page'  => '_reset_page',
				'name'  => 'panel_reset',
				'title' => esc_html__('Reset', 'ambient')
			)
		);

		ambient_elated_add_admin_field(array(
			'type'	=> 'yesno',
			'name'	=> 'reset_to_defaults',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Reset to Defaults', 'ambient'),
			'description'	=> esc_html__('This option will reset all Select Options values to defaults', 'ambient'),
			'parent'		=> $panel_reset
		));
	}

	add_action( 'ambient_elated_options_map', 'ambient_elated_reset_options_map', 100 );
}