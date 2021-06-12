<?php

$header_meta_box = ambient_elated_create_meta_box(
	array(
		'scope' => array('page', 'portfolio-item', 'post'),
		'title' => esc_html__('Header', 'ambient'),
		'name'  => 'header_meta'
	)
);

ambient_elated_create_meta_box_field(
	array(
		'name'          => 'eltdf_header_type_meta',
		'type'          => 'select',
		'default_value' => '',
		'label'         => esc_html__('Choose Header Type', 'ambient'),
		'description'   => esc_html__('Select header type layout', 'ambient'),
		'parent'        => $header_meta_box,
		'options'       => array(
			''                   => 'Default',
			'header-standard'    => esc_html__('Standard Header Layout', 'ambient'),
			'header-full-screen' => esc_html__('Full Screen Header Layout', 'ambient'),
			'header-vertical'    => esc_html__('Vertical Header Layout', 'ambient')
		),
		'args'          => array(
			"dependence" => true,
			"hide"       => array(
				""                   => '#eltdf_eltdf_header_standard_type_meta_container, #eltdf_eltdf_header_full_screen_type_meta_container, #eltdf_eltdf_header_vertical_type_meta_container',
				"header-standard"    => '#eltdf_eltdf_header_full_screen_type_meta_container, #eltdf_eltdf_header_vertical_type_meta_container',
				"header-full-screen" => '#eltdf_eltdf_header_standard_type_meta_container, #eltdf_eltdf_header_vertical_type_meta_container',
				"header-vertical"    => '#eltdf_eltdf_header_standard_type_meta_container, #eltdf_eltdf_header_full_screen_type_meta_container'
			),
			"show"       => array(
				""                   => '',
				"header-standard"    => '#eltdf_eltdf_header_standard_type_meta_container',
				"header-full-screen" => '#eltdf_eltdf_header_full_screen_type_meta_container',
				"header-vertical"    => '#eltdf_eltdf_header_vertical_type_meta_container'
			)
		)
	)
);

$header_standard_type_meta_container = ambient_elated_add_admin_container(
	array(
		'parent'          => $header_meta_box,
		'name'            => 'eltdf_header_standard_type_meta_container',
		'hidden_property' => 'eltdf_header_type_meta',
		'hidden_values'   => array(
			'header-full-screen',
			'header-vertical'
		),
	)
);

ambient_elated_create_meta_box_field(
	array(
		'name'          => 'eltdf_enable_grid_layout_header_meta',
		'type'          => 'select',
		'default_value' => '',
		'label'         => esc_html__('Enable Grid Layout', 'ambient'),
		'description'   => esc_html__('Enabling this option you will set standard header area to be in grid', 'ambient'),
		'parent'        => $header_standard_type_meta_container,
		'options'       => ambient_elated_get_yes_no_select_array()
	)
);

ambient_elated_create_meta_box_field(
	array(
		'name'          => 'eltdf_enable_separator_between_menu_and_widgets_meta',
		'type'          => 'select',
		'default_value' => '',
		'label'         => esc_html__('Separator between Menu and Widgets', 'ambient'),
		'description'   => esc_html__('Enabling this option you will add separator between menu and widget area', 'ambient'),
		'parent'        => $header_standard_type_meta_container,
		'options'       => ambient_elated_get_yes_no_select_array()
	)
);

ambient_elated_create_meta_box_field(
	array(
		'name'          => 'eltdf_set_menu_area_position_meta',
		'type'          => 'select',
		'default_value' => '',
		'label'         => esc_html__('Choose Menu Area Position', 'ambient'),
		'description'   => esc_html__('Select menu area position in your header', 'ambient'),
		'parent'        => $header_standard_type_meta_container,
		'options'       => array(
			''       => esc_html__('Default', 'ambient'),
			'center' => esc_html__('Center', 'ambient'),
			'right'  => esc_html__('Right', 'ambient')
		)
	)
);

ambient_elated_create_meta_box_field(
	array(
		'name'        => 'eltdf_menu_area_background_color_header_standard_meta',
		'type'        => 'color',
		'label'       => esc_html__('Background Color', 'ambient'),
		'description' => esc_html__('Choose a background color for header area', 'ambient'),
		'parent'      => $header_standard_type_meta_container
	)
);

ambient_elated_create_meta_box_field(
	array(
		'name'        => 'eltdf_menu_area_background_transparency_header_standard_meta',
		'type'        => 'text',
		'label'       => esc_html__('Background Transparency', 'ambient'),
		'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'ambient'),
		'parent'      => $header_standard_type_meta_container,
		'args'        => array(
			'col_width' => 2
		)
	)
);

$header_full_screen_type_meta_container = ambient_elated_add_admin_container(
	array(
		'parent'          => $header_meta_box,
		'name'            => 'eltdf_header_full_screen_type_meta_container',
		'hidden_property' => 'eltdf_header_type_meta',
		'hidden_values'   => array(
			'header-standard',
			'header-vertical'
		),
	)
);

ambient_elated_create_meta_box_field(
	array(
		'name'          => 'eltdf_enable_grid_layout_header_full_screen_meta',
		'type'          => 'select',
		'default_value' => '',
		'label'         => esc_html__('Enable Grid Layout', 'ambient'),
		'description'   => esc_html__('Enabling this option you will set full screen header area to be in grid', 'ambient'),
		'parent'        => $header_full_screen_type_meta_container,
		'options'       => ambient_elated_get_yes_no_select_array()
	)
);

ambient_elated_create_meta_box_field(
	array(
		'name'        => 'eltdf_menu_area_background_color_header_full_screen_meta',
		'type'        => 'color',
		'label'       => esc_html__('Background Color', 'ambient'),
		'description' => esc_html__('Choose a background color for header area', 'ambient'),
		'parent'      => $header_full_screen_type_meta_container
	)
);

ambient_elated_create_meta_box_field(
	array(
		'name'        => 'eltdf_menu_area_background_transparency_header_full_screen_meta',
		'type'        => 'text',
		'label'       => esc_html__('Background Transparency', 'ambient'),
		'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'ambient'),
		'parent'      => $header_full_screen_type_meta_container,
		'args'        => array(
			'col_width' => 2
		)
	)
);

ambient_elated_create_meta_box_field(
	array(
		'name'          => 'eltdf_menu_area_border_header_full_screen_meta',
		'type'          => 'select',
		'default_value' => '',
		'label'         => esc_html__('Enable Bottom Border', 'ambient'),
		'description'   => esc_html__('Enabling this option you will set bottom border on header area', 'ambient'),
		'parent'        => $header_full_screen_type_meta_container,
		'options'       => ambient_elated_get_yes_no_select_array(),
		'args'          => array(
			"dependence" => true,
			'show'       => array(
				''    => '',
				'yes' => '#eltdf_eltdf_menu_area_border_header_full_screen_container_container',
				'no'  => '',

			),
			'hide'       => array(
				''    => '#eltdf_eltdf_menu_area_border_header_full_screen_container_container',
				'yes' => '',
				'no'  => '#eltdf_eltdf_menu_area_border_header_full_screen_container_container',
			)
		)
	)
);

$menu_area_border_header_full_screen_container = ambient_elated_add_admin_container(
	array(
		'parent'          => $header_full_screen_type_meta_container,
		'name'            => 'eltdf_menu_area_border_header_full_screen_container_container',
		'hidden_property' => 'eltdf_menu_area_border_header_full_screen_meta',
		'hidden_values'   => array(
			'',
			'no'
		),
	)
);


	ambient_elated_create_meta_box_field(
		array(
			'name'        => 'eltdf_menu_area_border_color_header_full_screen_meta',
			'type'        => 'color',
			'label'       => esc_html__('Border Color', 'ambient'),
			'description' => esc_html__('Choose a border bottom color for header area', 'ambient'),
			'parent'      => $menu_area_border_header_full_screen_container
		)
	);

$header_vertical_type_meta_container = ambient_elated_add_admin_container(
	array(
		'parent'          => $header_meta_box,
		'name'            => 'eltdf_header_vertical_type_meta_container',
		'hidden_property' => 'eltdf_header_type_meta',
		'hidden_values'   => array(
			'header-standard',
			'header-full-screen'
		),
	)
);

ambient_elated_create_meta_box_field(array(
	'name'        => 'eltdf_vertical_header_background_color_meta',
	'type'        => 'color',
	'label'       => esc_html__('Background Color', 'ambient'),
	'description' => esc_html__('Choose a background color for header area', 'ambient'),
	'parent'      => $header_vertical_type_meta_container
));

ambient_elated_create_meta_box_field(array(
	'name'        => 'eltdf_vertical_header_transparency_meta',
	'type'        => 'text',
	'label'       => esc_html__('Transparency', 'ambient'),
	'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'ambient'),
	'parent'      => $header_vertical_type_meta_container,
	'args'        => array(
		'col_width' => 1
	)
));

ambient_elated_create_meta_box_field(
	array(
		'name'          => 'eltdf_vertical_header_background_image_meta',
		'type'          => 'image',
		'default_value' => '',
		'label'         => esc_html__('Background Image', 'ambient'),
		'description'   => esc_html__('Set background image for vertical menu', 'ambient'),
		'parent'        => $header_vertical_type_meta_container
	)
);

ambient_elated_create_meta_box_field(
	array(
		'name'          => 'eltdf_disable_vertical_header_background_image_meta',
		'type'          => 'yesno',
		'default_value' => 'no',
		'label'         => esc_html__('Disable Background Image', 'ambient'),
		'description'   => esc_html__('Enabling this option will hide background image in header area', 'ambient'),
		'parent'        => $header_vertical_type_meta_container
	)
);

ambient_elated_create_meta_box_field(
	array(
		'name'          => 'eltdf_vertical_header_text_align_meta',
		'type'          => 'select',
		'default_value' => '',
		'label'         => esc_html__('Choose Text Alignment', 'ambient'),
		'description'   => esc_html__('Choose text alignment for header area elements (logo, menu and widgets)', 'ambient'),
		'parent'        => $header_vertical_type_meta_container,
		'options'       => array(
			''       => esc_html__('Default', 'ambient'),
			'left'   => esc_html__('Left', 'ambient'),
			'center' => esc_html__('Center', 'ambient')
		)
	)
);

ambient_elated_create_meta_box_field(
	array(
		'name'          => 'eltdf_disable_header_widget_area_meta',
		'type'          => 'yesno',
		'default_value' => 'no',
		'label'         => esc_html__('Disable Header Widget Area', 'ambient'),
		'description'   => esc_html__('Enabling this option will hide widget area from the right hand side of main menu', 'ambient'),
		'parent'        => $header_meta_box
	)
);

$ambient_elated_custom_sidebars = ambient_elated_get_custom_sidebars();
if (count($ambient_elated_custom_sidebars) > 0) {
	ambient_elated_create_meta_box_field(array(
		'name'        => 'eltdf_custom_header_sidebar_meta',
		'type'        => 'selectblank',
		'label'       => esc_html__('Choose Custom Widget Area in Header', 'ambient'),
		'description' => esc_html__('Choose custom widget area to display in header area from the right hand side of main menu"', 'ambient'),
		'parent'      => $header_meta_box,
		'options'     => $ambient_elated_custom_sidebars
	));
}

ambient_elated_create_meta_box_field(
	array(
		'name'          => 'eltdf_top_bar_meta',
		'type'          => 'select',
		'default_value' => '',
		'label'         => esc_html__('Header Top Bar', 'ambient'),
		'description'   => esc_html__('Enabling this option will show header top bar area', 'ambient'),
		'parent'        => $header_meta_box,
		'options'       => ambient_elated_get_yes_no_select_array()
	)
);

ambient_elated_create_meta_box_field(
	array(
		'name'          => 'eltdf_header_style_meta',
		'type'          => 'select',
		'default_value' => '',
		'label'         => esc_html__('Header Skin', 'ambient'),
		'description'   => esc_html__('Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'ambient'),
		'parent'        => $header_meta_box,
		'options'       => array(
			''             => esc_html__('Default', 'ambient'),
			'light-header' => esc_html__('Light', 'ambient'),
			'dark-header'  => esc_html__('Dark', 'ambient')
		)
	)
);

ambient_elated_create_meta_box_field(
	array(
		'name'            => 'eltdf_scroll_amount_for_sticky_meta',
		'type'            => 'text',
		'label'           => esc_html__('Scroll amount for sticky header appearance', 'ambient'),
		'description'     => esc_html__('Define scroll amount for sticky header appearance', 'ambient'),
		'parent'          => $header_meta_box,
		'args'            => array(
			'col_width' => 2,
			'suffix'    => 'px'
		),
		'hidden_property' => 'header_behaviour',
		'hidden_values'   => array("sticky-header-on-scroll-up", "fixed-on-scroll")
	)
);