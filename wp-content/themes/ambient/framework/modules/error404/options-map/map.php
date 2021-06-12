<?php

if ( ! function_exists('ambient_elated_error_404_options_map') ) {

	function ambient_elated_error_404_options_map() {

		ambient_elated_add_admin_page(array(
			'slug' => '__404_error_page',
			'title' => esc_html__('404 Error Page', 'ambient'),
			'icon' => 'fa fa-exclamation-triangle'
		));

		$panel_404_header = ambient_elated_add_admin_panel(array(
			'page' => '__404_error_page',
			'name'	=> 'panel_404_header',
			'title'	=> esc_html__('Header', 'ambient')
		));

		ambient_elated_add_admin_field(
			array(
				'parent' => $panel_404_header,
				'type' => 'color',
				'name' => '404_menu_area_background_color_header',
				'label' => esc_html__('Background Color', 'ambient'),
				'description' => esc_html__('Choose a background color for header area', 'ambient')
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $panel_404_header,
				'type' => 'text',
				'name' => '404_menu_area_background_transparency_header',
				'default_value' => '',
				'label' => esc_html__('Background Transparency', 'ambient'),
				'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'ambient'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $panel_404_header,
				'type' => 'color',
				'name' => '404_menu_area_border_color_header',
				'default_value' => '',
				'label' => esc_html__('Border Color', 'ambient'),
				'description' => esc_html__('Choose a border bottom color for header area', 'ambient')
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $panel_404_header,
				'type' => 'select',
				'name' => '404_header_style',
				'default_value' => '',
				'label' => esc_html__('Header Skin', 'ambient'),
				'description' => esc_html__('Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'ambient'),
				'options' => array(
					'' => esc_html__('Default', 'ambient'),
					'light-header' => esc_html__('Light', 'ambient'),
					'dark-header' => esc_html__('Dark', 'ambient')
				)
			)
		);

		$panel_404_options = ambient_elated_add_admin_panel(array(
			'page' => '__404_error_page',
			'name'	=> 'panel_404_options',
			'title'	=> esc_html__('404 Page Options', 'ambient')
		));

		ambient_elated_add_admin_field(
			array(
				'parent' => $panel_404_options,
				'type' => 'color',
				'name' => '404_page_background_color',
				'label' => esc_html__('Background Color', 'ambient')
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $panel_404_options,
				'type' => 'image',
				'name' => '404_page_background_image',
				'label' => esc_html__('Background Image', 'ambient'),
				'description' => esc_html__('Choose a background image for 404 page', 'ambient')
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $panel_404_options,
				'type' => 'image',
				'name' => '404_page_background_pattern_image',
				'label' => esc_html__('Pattern Background Image', 'ambient'),
				'description' => esc_html__('Choose a pattern image for 404 page', 'ambient')
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $panel_404_options,
				'type' => 'image',
				'name' => '404_page_title_image',
				'label' => esc_html__('Title Image', 'ambient'),
				'description' => esc_html__('Choose a background image for displaying above 404 page Title', 'ambient')
			)
		);

		ambient_elated_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_title',
			'default_value' => '',
			'label' => esc_html__('Title', 'ambient'),
			'description' => esc_html__('Enter title for 404 page. Default label is "404".', 'ambient')
		));

		$first_level_group = ambient_elated_add_admin_group(
			array(
				'parent' => $panel_404_options,
				'name' => 'first_level_group',
				'title' => esc_html__('Title Style', 'ambient'),
				'description' => esc_html__('Define styles for 404 page title', 'ambient')
			)
		);

		$first_level_row1 = ambient_elated_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row1'
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'colorsimple',
				'name' => '404_title_color',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'ambient'),
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'fontsimple',
				'name' => '404_title_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'ambient'),
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'textsimple',
				'name' => '404_title_fontsize',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'ambient'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'textsimple',
				'name' => '404_title_lineheight',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'ambient'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$first_level_row2 = ambient_elated_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row2',
				'next' => true
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'selectblanksimple',
				'name' => '404_title_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'ambient'),
				'options' => ambient_elated_get_font_style_array()
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'selectblanksimple',
				'name' => '404_title_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'ambient'),
				'options' => ambient_elated_get_font_weight_array()
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'textsimple',
				'name' => '404_title_letterspacing',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing', 'ambient'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'selectblanksimple',
				'name' => '404_title_texttransform',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'ambient'),
				'options' => ambient_elated_get_text_transform_array()
			)
		);

		$second_level_group = ambient_elated_add_admin_group(
			array(
				'parent' => $panel_404_options,
				'name' => 'second_level_group',
				'title' => esc_html__('Subtitle Style', 'ambient'),
				'description' => esc_html__('Define styles for 404 page subtitle', 'ambient')
			)
		);

		$second_level_row1 = ambient_elated_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row1'
			)
		);

		$second_level_row2 = ambient_elated_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row2',
				'next' => true
			)
		);

		ambient_elated_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_text',
			'default_value' => '',
			'label' => esc_html__('Text', 'ambient'),
			'description' => esc_html__('Enter text for 404 page.', 'ambient')
		));

		$third_level_group = ambient_elated_add_admin_group(
			array(
				'parent' => $panel_404_options,
				'name' => '$third_level_group',
				'title' => esc_html__('Text Style', 'ambient'),
				'description' => esc_html__('Define styles for 404 page text', 'ambient')
			)
		);

		$third_level_row1 = ambient_elated_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name' => '$third_level_row1'
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'colorsimple',
				'name' => '404_text_color',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'ambient'),
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'fontsimple',
				'name' => '404_text_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'ambient'),
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'textsimple',
				'name' => '404_text_fontsize',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'ambient'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'textsimple',
				'name' => '404_text_lineheight',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'ambient'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$third_level_row2 = ambient_elated_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name' => '$third_level_row2',
				'next' => true
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'selectblanksimple',
				'name' => '404_text_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'ambient'),
				'options' => ambient_elated_get_font_style_array()
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'selectblanksimple',
				'name' => '404_text_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'ambient'),
				'options' => ambient_elated_get_font_weight_array()
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'textsimple',
				'name' => '404_text_letterspacing',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing', 'ambient'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'selectblanksimple',
				'name' => '404_text_texttransform',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'ambient'),
				'options' => ambient_elated_get_text_transform_array()
			)
		);

		ambient_elated_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_back_to_home',
			'label' => esc_html__('Back to Home Button Label', 'ambient'),
			'description' => esc_html__('Enter label for "BACK TO HOME" button', 'ambient')
		));

		ambient_elated_add_admin_field(
			array(
				'parent' => $panel_404_options,
				'type' => 'select',
				'name' => '404_button_style',
				'default_value' => '',
				'label' => esc_html__('Button Skin', 'ambient'),
				'description' => esc_html__('Choose a style to make Back to Home button in that predefined style', 'ambient'),
				'options' => array(
					'' => esc_html__('Default', 'ambient'),
					'light-button' => esc_html__('Light', 'ambient'),
					'dark-button' => esc_html__('Dark', 'ambient')
				)
			)
		);
	}

	add_action( 'ambient_elated_options_map', 'ambient_elated_error_404_options_map', 14);
}