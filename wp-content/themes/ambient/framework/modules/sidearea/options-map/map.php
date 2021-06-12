<?php

if ( ! function_exists('ambient_elated_sidearea_options_map') ) {

	function ambient_elated_sidearea_options_map() {

		ambient_elated_add_admin_page(
			array(
				'slug' => '_side_area_page',
				'title' => esc_html__('Side Area', 'ambient'),
				'icon' => 'fa fa-indent'
			)
		);

		$side_area_panel = ambient_elated_add_admin_panel(
			array(
				'title' => esc_html__('Side Area', 'ambient'),
				'name' => 'side_area',
				'page' => '_side_area_page'
			)
		);

		$side_area_icon_style_group = ambient_elated_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'side_area_icon_style_group',
				'title' => esc_html__('Side Area Icon Style', 'ambient'),
				'description' => esc_html__('Define styles for Side Area icon', 'ambient')
			)
		);

		$side_area_icon_style_row1 = ambient_elated_add_admin_row(
			array(
				'parent'	=> $side_area_icon_style_group,
				'name'		=> 'side_area_icon_style_row1'
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row1,
				'type' => 'colorsimple',
				'name' => 'side_area_icon_color',
				'label' => esc_html__('Color', 'ambient')
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row1,
				'type' => 'colorsimple',
				'name' => 'side_area_icon_hover_color',
				'label' => esc_html__('Hover Color', 'ambient')
			)
		);

		$side_area_icon_style_row2 = ambient_elated_add_admin_row(
			array(
				'parent'	=> $side_area_icon_style_group,
				'name'		=> 'side_area_icon_style_row2',
				'next'		=> true
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row2,
				'type' => 'colorsimple',
				'name' => 'side_area_light_icon_color',
				'label' => esc_html__('Light Menu Icon Color', 'ambient')
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row2,
				'type' => 'colorsimple',
				'name' => 'side_area_light_icon_hover_color',
				'label' => esc_html__('Light Menu Icon Hover Color', 'ambient')
			)
		);

		$side_area_icon_style_row3 = ambient_elated_add_admin_row(
			array(
				'parent'	=> $side_area_icon_style_group,
				'name'		=> 'side_area_icon_style_row3',
				'next'		=> true
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row3,
				'type' => 'colorsimple',
				'name' => 'side_area_dark_icon_color',
				'label' => esc_html__('Dark Menu Icon Color', 'ambient')
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row3,
				'type' => 'colorsimple',
				'name' => 'side_area_dark_icon_hover_color',
				'label' => esc_html__('Dark Menu Icon Hover Color', 'ambient')
			)
		);

		$side_area_icon_style_row4 = ambient_elated_add_admin_row(
			array(
				'parent'	=> $side_area_icon_style_group,
				'name'		=> 'side_area_icon_style_row4'
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row4,
				'type' => 'colorsimple',
				'name' => 'side_area_close_icon_color',
				'label' => esc_html__('Close Icon Color', 'ambient')
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row4,
				'type' => 'colorsimple',
				'name' => 'side_area_close_icon_hover_color',
				'label' => esc_html__('Close Icon Hover Color', 'ambient')
			)
		);

		$icon_spacing_group = ambient_elated_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'icon_spacing_group',
				'title' => esc_html__('Side Area Icon Spacing', 'ambient'),
				'description' => esc_html__('Define padding and margin for side area icon', 'ambient')
			)
		);

		$icon_spacing_row = ambient_elated_add_admin_row(
			array(
				'parent'	=> $icon_spacing_group,
				'name'		=> 'icon_spancing_row',
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $icon_spacing_row,
				'type' => 'textsimple',
				'name' => 'side_area_icon_padding_left',
				'label' => esc_html__('Padding Left', 'ambient'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $icon_spacing_row,
				'type' => 'textsimple',
				'name' => 'side_area_icon_padding_right',
				'label' => esc_html__('Padding Right', 'ambient'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $icon_spacing_row,
				'type' => 'textsimple',
				'name' => 'side_area_icon_margin_left',
				'label' => esc_html__('Margin Left', 'ambient'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $icon_spacing_row,
				'type' => 'textsimple',
				'name' => 'side_area_icon_margin_right',
				'label' => esc_html__('Margin Right', 'ambient'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'text',
				'name' => 'side_area_title',
				'default_value' => '',
				'label' => esc_html__('Side Area Title', 'ambient'),
				'description' => esc_html__('Enter a title to appear in Side Area', 'ambient'),
				'args' => array(
					'col_width' => 3,
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'text',
				'name' => 'side_area_width',
				'default_value' => '',
				'label' => esc_html__('Side Area Width', 'ambient'),
				'description' => esc_html__('Enter a width for Side Area', 'ambient'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'color',
				'name' => 'side_area_background_color',
				'label' => esc_html__('Background Color', 'ambient'),
				'description' => esc_html__('Choose a background color for Side Area', 'ambient')
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'selectblank',
				'name' => 'side_area_aligment',
				'default_value' => '',
				'label' => esc_html__('Text Alignment', 'ambient'),
				'description' => esc_html__('Choose text alignment for side area', 'ambient'),
				'options' => array(
					'' => esc_html__('Default', 'ambient'),
					'left' => esc_html__('Left', 'ambient'),
					'center' => esc_html__('Center', 'ambient'),
					'right' => esc_html__('Right', 'ambient')
				)
			)
		);

		$padding_group = ambient_elated_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'padding_group',
				'title' => esc_html__('Padding', 'ambient'),
				'description' => esc_html__('Define padding for Side Area', 'ambient')
			)
		);

		$padding_row = ambient_elated_add_admin_row(
			array(
				'parent' => $padding_group,
				'name' => 'padding_row',
				'next' => true
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $padding_row,
				'type' => 'textsimple',
				'name' => 'side_area_padding_top',
				'label' => esc_html__('Top Padding', 'ambient'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $padding_row,
				'type' => 'textsimple',
				'name' => 'side_area_padding_right',
				'label' => esc_html__('Right Padding', 'ambient'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $padding_row,
				'type' => 'textsimple',
				'name' => 'side_area_padding_bottom',
				'label' => esc_html__('Bottom Padding', 'ambient'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $padding_row,
				'type' => 'textsimple',
				'name' => 'side_area_padding_left',
				'label' => esc_html__('Left Padding', 'ambient'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);
	}

	add_action('ambient_elated_options_map', 'ambient_elated_sidearea_options_map', 7);
}