<?php

if ( ! function_exists('ambient_elated_logo_options_map') ) {

	function ambient_elated_logo_options_map() {

		ambient_elated_add_admin_page(
			array(
				'slug' => '_logo_page',
				'title' => esc_html__('Logo', 'ambient'),
				'icon' => 'fa fa-coffee'
			)
		);

		$panel_logo = ambient_elated_add_admin_panel(
			array(
				'page' => '_logo_page',
				'name' => 'panel_logo',
				'title' => esc_html__('Logo', 'ambient')
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $panel_logo,
				'type' => 'yesno',
				'name' => 'hide_logo',
				'default_value' => 'no',
				'label' => esc_html__('Hide Logo', 'ambient'),
				'description' => esc_html__('Enabling this option will hide logo image', 'ambient'),
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "#eltdf_hide_logo_container",
					"dependence_show_on_yes" => ""
				)
			)
		);

		$hide_logo_container = ambient_elated_add_admin_container(
			array(
				'parent' => $panel_logo,
				'name' => 'hide_logo_container',
				'hidden_property' => 'hide_logo',
				'hidden_value' => 'yes'
			)
		);

		ambient_elated_add_admin_field(
			array(
				'name' => 'logo_image',
				'type' => 'image',
				'default_value' => ELATED_ASSETS_ROOT."/img/logo.png",
				'label' => esc_html__('Logo Image - Default', 'ambient'),
				'parent' => $hide_logo_container
			)
		);

		ambient_elated_add_admin_field(
			array(
				'name' => 'logo_image_dark',
				'type' => 'image',
				'default_value' => ELATED_ASSETS_ROOT."/img/logo.png",
				'label' => esc_html__('Logo Image - Dark', 'ambient'),
				'parent' => $hide_logo_container
			)
		);

		ambient_elated_add_admin_field(
			array(
				'name' => 'logo_image_light',
				'type' => 'image',
				'default_value' => ELATED_ASSETS_ROOT."/img/logo.png",
				'label' => esc_html__('Logo Image - Light', 'ambient'),
				'parent' => $hide_logo_container
			)
		);

		ambient_elated_add_admin_field(
			array(
				'name' => 'logo_image_vertical_header',
				'type' => 'image',
				'default_value' => ELATED_ASSETS_ROOT."/img/logo.png",
				'label' => esc_html__('Logo Image - Vertical Header', 'ambient'),
				'parent' => $hide_logo_container
			)
		);

		ambient_elated_add_admin_field(
			array(
				'name' => 'logo_image_sticky',
				'type' => 'image',
				'default_value' => ELATED_ASSETS_ROOT."/img/logo.png",
				'label' => esc_html__('Logo Image - Sticky', 'ambient'),
				'parent' => $hide_logo_container
			)
		);

		ambient_elated_add_admin_field(
			array(
				'name' => 'logo_image_mobile',
				'type' => 'image',
				'default_value' => ELATED_ASSETS_ROOT."/img/logo.png",
				'label' => esc_html__('Logo Image - Mobile', 'ambient'),
				'parent' => $hide_logo_container
			)
		);
	}

	add_action( 'ambient_elated_options_map', 'ambient_elated_logo_options_map', 2);
}