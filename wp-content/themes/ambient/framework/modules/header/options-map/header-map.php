<?php

if (!function_exists('ambient_elated_header_options_map')) {

	function ambient_elated_header_options_map() {

		ambient_elated_add_admin_page(
			array(
				'slug'  => '_header_page',
				'title' => esc_html__('Header', 'ambient'),
				'icon'  => 'fa fa-header'
			)
		);

		$panel_header = ambient_elated_add_admin_panel(
			array(
				'page'  => '_header_page',
				'name'  => 'panel_header',
				'title' => esc_html__('Header', 'ambient')
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $panel_header,
				'type'          => 'radiogroup',
				'name'          => 'header_type',
				'default_value' => 'header-standard',
				'label'         => esc_html__('Choose Header Type', 'ambient'),
				'description'   => esc_html__('Select the type of header you would like to use', 'ambient'),
				'options'       => array(
					'header-standard'    => array(
						'image' => ELATED_FRAMEWORK_ADMIN_ASSETS_ROOT . '/img/header-standard.png'
					),
					'header-full-screen' => array(
						'image' => ELATED_FRAMEWORK_ADMIN_ASSETS_ROOT . '/img/header-full-screen.png'
					),
					'header-vertical'    => array(
						'image' => ELATED_FRAMEWORK_ADMIN_ASSETS_ROOT . '/img/header-vertical.png'
					)
				),
				'args'          => array(
					'use_images'  => true,
					'hide_labels' => true,
					'dependence'  => true,
					'show'        => array(
						'header-standard'    => '#eltdf_panel_header_standard,#eltdf_header_behaviour,#eltdf_panel_fixed_header,#eltdf_panel_sticky_header,#eltdf_panel_main_menu',
						'header-full-screen' => '#eltdf_panel_header_full_screen',
						'header-vertical'    => '#eltdf_panel_header_vertical,#eltdf_panel_vertical_main_menu'
					),
					'hide'        => array(
						'header-standard'    => '#eltdf_panel_header_full_screen,#eltdf_panel_header_vertical,#eltdf_panel_vertical_main_menu',
						'header-full-screen' => '#eltdf_panel_header_standard,#eltdf_panel_header_vertical,#eltdf_panel_vertical_main_menu,#eltdf_panel_main_menu,#eltdf_header_behaviour,#eltdf_panel_fixed_header,#eltdf_panel_sticky_header',
						'header-vertical'    => '#eltdf_panel_header_standard,#eltdf_panel_header_full_screen,#eltdf_header_behaviour,#eltdf_panel_fixed_header,#eltdf_panel_sticky_header,#eltdf_panel_main_menu'
					)
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'          => $panel_header,
				'type'            => 'select',
				'name'            => 'header_behaviour',
				'default_value'   => 'fixed-on-scroll',
				'label'           => esc_html__('Choose Header Behaviour', 'ambient'),
				'description'     => esc_html__('Select the behaviour of header when you scroll down to page', 'ambient'),
				'options'         => array(
					'sticky-header-on-scroll-up'      => esc_html__('Sticky on scroll up', 'ambient'),
					'sticky-header-on-scroll-down-up' => esc_html__('Sticky on scroll up/down', 'ambient'),
					'fixed-on-scroll'                 => esc_html__('Fixed on scroll', 'ambient')
				),
				'args'            => array(
					'dependence' => true,
					'show'       => array(
						'sticky-header-on-scroll-up'      => '#eltdf_panel_sticky_header',
						'sticky-header-on-scroll-down-up' => '#eltdf_panel_sticky_header',
						'fixed-on-scroll'                 => '#eltdf_panel_fixed_header'
					),
					'hide'       => array(
						'sticky-header-on-scroll-up'      => '#eltdf_panel_fixed_header',
						'sticky-header-on-scroll-down-up' => '#eltdf_panel_fixed_header',
						'fixed-on-scroll'                 => '#eltdf_panel_sticky_header'
					)
				),
				'hidden_property' => 'header_type',
				'hidden_value'    => '',
				'hidden_values'   => array(
					'header-full-screen',
					'header-vertical'
				)
			)
		);

		/***************** Top Header Layout **********************/

		ambient_elated_add_admin_field(
			array(
				'name'          => 'top_bar',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Top Bar', 'ambient'),
				'description'   => esc_html__('Enabling this option will show top bar area', 'ambient'),
				'parent'        => $panel_header,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltdf_top_bar_container"
				)
			)
		);

		$top_bar_container = ambient_elated_add_admin_container(array(
			'name'            => 'top_bar_container',
			'parent'          => $panel_header,
			'hidden_property' => 'top_bar',
			'hidden_value'    => 'no'
		));

		ambient_elated_add_admin_field(
			array(
				'name'          => 'top_bar_in_grid',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Top Bar in Grid', 'ambient'),
				'description'   => esc_html__('Set top bar content to be in grid', 'ambient'),
				'parent'        => $top_bar_container
			)
		);

		ambient_elated_add_admin_field(array(
			'name'        => 'top_bar_background_color',
			'type'        => 'color',
			'label'       => esc_html__('Background Color', 'ambient'),
			'description' => esc_html__('Choose a background color for header area', 'ambient'),
			'parent'      => $top_bar_container
		));

		ambient_elated_add_admin_field(array(
			'name'        => 'top_bar_background_transparency',
			'type'        => 'text',
			'label'       => esc_html__('Background Transparency', 'ambient'),
			'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'ambient'),
			'parent'      => $top_bar_container,
			'args'        => array('col_width' => 3)
		));

		ambient_elated_add_admin_field(array(
			'name'        => 'top_bar_height',
			'type'        => 'text',
			'label'       => esc_html__('Top Bar Height', 'ambient'),
			'description' => esc_html__('Enter top bar height (Default is 30px)', 'ambient'),
			'parent'      => $top_bar_container,
			'args'        => array(
				'col_width' => 2,
				'suffix'    => 'px'
			)
		));

		/***************** Top Header Layout **********************/

		/***************** Header Skin Options ********************/

		ambient_elated_add_admin_field(
			array(
				'parent'        => $panel_header,
				'type'          => 'select',
				'name'          => 'header_style',
				'default_value' => '',
				'label'         => esc_html__('Header Skin', 'ambient'),
				'description'   => esc_html__('Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'ambient'),
				'options'       => array(
					''             => esc_html__('Default', 'ambient'),
					'light-header' => esc_html__('Light', 'ambient'),
					'dark-header'  => esc_html__('Dark', 'ambient')
				)
			)
		);

		/***************** Header Skin Options ********************/

		/***************** Standard Header Layout *****************/

		$panel_header_standard = ambient_elated_add_admin_panel(
			array(
				'page'            => '_header_page',
				'name'            => 'panel_header_standard',
				'title'           => esc_html__('Header Standard', 'ambient'),
				'hidden_property' => 'header_type',
				'hidden_value'    => '',
				'hidden_values'   => array(
					'header-full-screen',
					'header-vertical'
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $panel_header_standard,
				'type'          => 'yesno',
				'name'          => 'enable_grid_layout_header',
				'default_value' => 'no',
				'label'         => esc_html__('Enable Grid Layout', 'ambient'),
				'description'   => esc_html__('Enabling this option you will set standard header area to be in grid and menu will be on the right side', 'ambient'),
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $panel_header_standard,
				'type'          => 'yesno',
				'name'          => 'enable_separator_between_menu_and_widgets',
				'default_value' => 'no',
				'label'         => esc_html__('Separator between Menu and Widgets', 'ambient'),
				'description'   => esc_html__('Enabling this option you will add separator between menu and widget area', 'ambient'),
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $panel_header_standard,
				'type'          => 'select',
				'name'          => 'set_menu_area_position',
				'default_value' => 'center',
				'label'         => esc_html__('Choose Menu Area Position', 'ambient'),
				'description'   => esc_html__('Select menu area position in your header', 'ambient'),
				'options'       => array(
					'center' => esc_html__('Center', 'ambient'),
					'right'  => esc_html__('Right', 'ambient')
				)
			)
		);

		ambient_elated_add_admin_section_title(
			array(
				'parent' => $panel_header_standard,
				'name'   => 'menu_area_title',
				'title'  => esc_html__('Menu Area', 'ambient')
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $panel_header_standard,
				'type'          => 'color',
				'name'          => 'menu_area_background_color_header_standard',
				'default_value' => '',
				'label'         => esc_html__('Background Color', 'ambient'),
				'description'   => esc_html__('Choose a background color for header area', 'ambient'),
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $panel_header_standard,
				'type'          => 'text',
				'name'          => 'menu_area_background_transparency_header_standard',
				'default_value' => '',
				'label'         => esc_html__('Background Transparency', 'ambient'),
				'description'   => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'ambient'),
				'args'          => array(
					'col_width' => 3
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $panel_header_standard,
				'type'          => 'text',
				'name'          => 'menu_area_height_header_standard',
				'default_value' => '',
				'label'         => esc_html__('Height', 'ambient'),
				'description'   => esc_html__('Enter Header Height (default is 80px)', 'ambient'),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);

		/***************** Standard Header Layout *****************/

		/***************** Full Screen Header Layout *******************/

		$panel_header_full_screen = ambient_elated_add_admin_panel(
			array(
				'page'            => '_header_page',
				'name'            => 'panel_header_full_screen',
				'title'           => esc_html__('Header Full Screen', 'ambient'),
				'hidden_property' => 'header_type',
				'hidden_value'    => '',
				'hidden_values'   => array(
					'header-standard',
					'header-vertical'
				)
			)
		);

		ambient_elated_add_admin_section_title(
			array(
				'parent' => $panel_header_full_screen,
				'name'   => 'header_full_screen_title',
				'title'  => esc_html__('Header Full Screen', 'ambient')
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $panel_header_full_screen,
				'type'          => 'yesno',
				'name'          => 'enable_grid_layout_header_full_screen',
				'default_value' => 'yes',
				'label'         => esc_html__('Enable Grid Layout', 'ambient'),
				'description'   => esc_html__('Enabling this option you will set full screen header area to be in grid', 'ambient'),
			)
		);

		ambient_elated_add_admin_section_title(
			array(
				'parent' => $panel_header_full_screen,
				'name'   => 'menu_area_title',
				'title'  => esc_html__('Menu Area', 'ambient')
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $panel_header_full_screen,
				'type'          => 'color',
				'name'          => 'menu_area_background_color_header_full_screen',
				'default_value' => '',
				'label'         => esc_html__('Background Color', 'ambient'),
				'description'   => esc_html__('Choose a background color for header area', 'ambient'),
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $panel_header_full_screen,
				'type'          => 'text',
				'name'          => 'menu_area_background_transparency_header_full_screen',
				'default_value' => '',
				'label'         => esc_html__('Background Transparency', 'ambient'),
				'description'   => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'ambient'),
				'args'          => array(
					'col_width' => 3
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $panel_header_full_screen,
				'type'          => 'yesno',
				'name'          => 'menu_area_border_header_full_screen',
				'default_value' => 'no',
				'label'         => esc_html__('Enable Bottom Border', 'ambient'),
				'description'   => esc_html__('Enabling this option you will set bottom border on header area', 'ambient'),
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltdf_menu_area_border_header_full_screen_container"
				)
			)
		);

		$menu_area_border_header_full_screen_container = ambient_elated_add_admin_container(array(
			'name'            => 'menu_area_border_header_full_screen_container',
			'parent'          => $panel_header_full_screen,
			'hidden_property' => 'menu_area_border_header_full_screen',
			'hidden_value'    => 'no'
		));

		ambient_elated_add_admin_field(
			array(
				'parent'        => $menu_area_border_header_full_screen_container,
				'type'          => 'color',
				'name'          => 'menu_area_border_color_header_full_screen',
				'default_value' => '',
				'label'         => esc_html__('Border Color', 'ambient'),
				'description'   => esc_html__('Set border color for header', 'ambient')
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $panel_header_full_screen,
				'type'          => 'text',
				'name'          => 'menu_area_height_header_full_screen',
				'default_value' => '',
				'label'         => esc_html__('Height', 'ambient'),
				'description'   => esc_html__('Enter Header Height (default is 80px)', 'ambient'),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);

		/***************** Full Screen Header Layout *******************/

		/***************** Vertical Header Layout *****************/

		$panel_header_vertical = ambient_elated_add_admin_panel(
			array(
				'page'            => '_header_page',
				'name'            => 'panel_header_vertical',
				'title'           => esc_html__('Header Vertical', 'ambient'),
				'hidden_property' => 'header_type',
				'hidden_value'    => '',
				'hidden_values'   => array(
					'header-standard',
					'header-full-screen'
				)
			)
		);

		ambient_elated_add_admin_field(array(
			'name'        => 'vertical_header_background_color',
			'type'        => 'color',
			'label'       => esc_html__('Background Color', 'ambient'),
			'description' => esc_html__('Choose a background color for header area', 'ambient'),
			'parent'      => $panel_header_vertical
		));

		ambient_elated_add_admin_field(array(
			'name'        => 'vertical_header_transparency',
			'type'        => 'text',
			'label'       => esc_html__('Background Transparency', 'ambient'),
			'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'ambient'),
			'parent'      => $panel_header_vertical,
			'args'        => array(
				'col_width' => 1
			)
		));

		ambient_elated_add_admin_field(
			array(
				'name'        => 'vertical_header_background_image',
				'type'        => 'image',
				'label'       => esc_html__('Background Image', 'ambient'),
				'description' => esc_html__('Set background image for vertical menu', 'ambient'),
				'parent'      => $panel_header_vertical
			)
		);

		ambient_elated_add_admin_field(
			array(
				'name'          => 'vertical_header_text_align',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__('Choose Text Alignment', 'ambient'),
				'description'   => esc_html__('Choose text alignment for Vertical Header elements (logo, menu and widgets)', 'ambient'),
				'parent'        => $panel_header_vertical,
				'options'       => array(
					''       => esc_html__('Default', 'ambient'),
					'left'   => esc_html__('Left', 'ambient'),
					'center' => esc_html__('Center', 'ambient')
				)
			)
		);

		/***************** Vertical Header Layout *****************/

		/***************** Sticky Header Layout *******************/

		$panel_sticky_header = ambient_elated_add_admin_panel(
			array(
				'title'           => esc_html__('Sticky Header', 'ambient'),
				'name'            => 'panel_sticky_header',
				'page'            => '_header_page',
				'hidden_property' => 'header_type',
				'hidden_value'    => '',
				'hidden_values'   => array(
					'header-full-screen',
					'header-vertical'
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'name'        => 'scroll_amount_for_sticky',
				'type'        => 'text',
				'label'       => esc_html__('Scroll Amount for Sticky', 'ambient'),
				'description' => esc_html__('Enter scroll amount for Sticky Menu to appear (deafult is header height). This value can be overriden on a page level basis', 'ambient'),
				'parent'      => $panel_sticky_header,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'name'          => 'sticky_header_in_grid',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Sticky Header in Grid', 'ambient'),
				'description'   => esc_html__('Enabling this option will put sticky header in grid', 'ambient'),
				'parent'        => $panel_sticky_header,
			)
		);

		ambient_elated_add_admin_field(array(
			'name'        => 'sticky_header_background_color',
			'type'        => 'color',
			'label'       => esc_html__('Background Color', 'ambient'),
			'description' => esc_html__('Choose a background color for header area', 'ambient'),
			'parent'      => $panel_sticky_header
		));

		ambient_elated_add_admin_field(array(
			'name'        => 'sticky_header_transparency',
			'type'        => 'text',
			'label'       => esc_html__('Background Transparency', 'ambient'),
			'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'ambient'),
			'parent'      => $panel_sticky_header,
			'args'        => array(
				'col_width' => 1
			)
		));

		ambient_elated_add_admin_field(array(
			'name'        => 'sticky_header_border_color',
			'type'        => 'color',
			'label'       => esc_html__('Border Color', 'ambient'),
			'description' => esc_html__('Set border bottom color for header area', 'ambient'),
			'parent'      => $panel_sticky_header
		));

		ambient_elated_add_admin_field(array(
			'name'        => 'sticky_header_height',
			'type'        => 'text',
			'label'       => esc_html__('Sticky Header Height', 'ambient'),
			'description' => esc_html__('Enter height for sticky header (default is 60px)', 'ambient'),
			'parent'      => $panel_sticky_header,
			'args'        => array(
				'col_width' => 2,
				'suffix'    => 'px'
			)
		));

		$group_sticky_header_menu = ambient_elated_add_admin_group(array(
			'title'       => esc_html__('Sticky Header Menu', 'ambient'),
			'name'        => 'group_sticky_header_menu',
			'parent'      => $panel_sticky_header,
			'description' => esc_html__('Define styles for sticky menu items', 'ambient')
		));

		$row1_sticky_header_menu = ambient_elated_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $group_sticky_header_menu
		));

		ambient_elated_add_admin_field(array(
			'name'        => 'sticky_color',
			'type'        => 'colorsimple',
			'label'       => esc_html__('Text Color', 'ambient'),
			'description' => '',
			'parent'      => $row1_sticky_header_menu
		));

		ambient_elated_add_admin_field(array(
			'name'        => 'sticky_hovercolor',
			'type'        => 'colorsimple',
			'label'       => esc_html__(esc_html__('Hover/Active Color', 'ambient'), 'ambient'),
			'description' => '',
			'parent'      => $row1_sticky_header_menu
		));

		$row2_sticky_header_menu = ambient_elated_add_admin_row(array(
			'name'   => 'row2',
			'parent' => $group_sticky_header_menu
		));

		ambient_elated_add_admin_field(
			array(
				'name'          => 'sticky_google_fonts',
				'type'          => 'fontsimple',
				'label'         => esc_html__('Font Family', 'ambient'),
				'default_value' => '-1',
				'parent'        => $row2_sticky_header_menu,
			)
		);

		ambient_elated_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'sticky_fontsize',
				'label'         => esc_html__('Font Size', 'ambient'),
				'default_value' => '',
				'parent'        => $row2_sticky_header_menu,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'sticky_lineheight',
				'label'         => esc_html__('Line Height', 'ambient'),
				'default_value' => '',
				'parent'        => $row2_sticky_header_menu,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'type'          => 'selectblanksimple',
				'name'          => 'sticky_texttransform',
				'label'         => esc_html__('Text Transform', 'ambient'),
				'default_value' => '',
				'options'       => ambient_elated_get_text_transform_array(),
				'parent'        => $row2_sticky_header_menu
			)
		);

		$row3_sticky_header_menu = ambient_elated_add_admin_row(array(
			'name'   => 'row3',
			'parent' => $group_sticky_header_menu
		));

		ambient_elated_add_admin_field(
			array(
				'type'          => 'selectblanksimple',
				'name'          => 'sticky_fontstyle',
				'default_value' => '',
				'label'         => esc_html__('Font Style', 'ambient'),
				'options'       => ambient_elated_get_font_style_array(),
				'parent'        => $row3_sticky_header_menu
			)
		);

		ambient_elated_add_admin_field(
			array(
				'type'          => 'selectblanksimple',
				'name'          => 'sticky_fontweight',
				'default_value' => '',
				'label'         => esc_html__('Font Weight', 'ambient'),
				'options'       => ambient_elated_get_font_weight_array(),
				'parent'        => $row3_sticky_header_menu
			)
		);

		ambient_elated_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'sticky_letterspacing',
				'label'         => esc_html__('Letter Spacing', 'ambient'),
				'default_value' => '',
				'parent'        => $row3_sticky_header_menu,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		/***************** Sticky Header Layout *******************/

		/***************** Fixed Header Layout ********************/

		$panel_fixed_header = ambient_elated_add_admin_panel(
			array(
				'title'           => esc_html__('Fixed Header', 'ambient'),
				'name'            => 'panel_fixed_header',
				'page'            => '_header_page',
				'hidden_property' => 'header_type',
				'hidden_value'    => '',
				'hidden_values'   => array(
					'header-full-screen',
					'header-vertical'
				)
			)
		);

		ambient_elated_add_admin_field(array(
			'name'          => 'fixed_header_background_color',
			'type'          => 'color',
			'default_value' => '',
			'label'         => esc_html__('Background Color', 'ambient'),
			'description'   => esc_html__('Choose a background color for header area', 'ambient'),
			'parent'        => $panel_fixed_header
		));

		ambient_elated_add_admin_field(array(
			'name'        => 'fixed_header_transparency',
			'type'        => 'text',
			'label'       => esc_html__('Background Transparency', 'ambient'),
			'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'ambient'),
			'parent'      => $panel_fixed_header,
			'args'        => array(
				'col_width' => 1
			)
		));

		ambient_elated_add_admin_field(
			array(
				'parent'        => $panel_fixed_header,
				'type'          => 'color',
				'name'          => 'fixed_header_border_bottom_color',
				'default_value' => '',
				'label'         => esc_html__('Border Color', 'ambient'),
				'description'   => esc_html__('Set border bottom color for header area', 'ambient'),
			)
		);

		$group_fixed_header_menu = ambient_elated_add_admin_group(array(
			'title'       => esc_html__('Fixed Header Menu', 'ambient'),
			'name'        => 'group_fixed_header_menu',
			'parent'      => $panel_fixed_header,
			'description' => esc_html__('Define styles for fixed menu items', 'ambient')
		));

		$row1_fixed_header_menu = ambient_elated_add_admin_row(array(
			'name'   => 'row1',
			'parent' => $group_fixed_header_menu
		));

		ambient_elated_add_admin_field(array(
			'name'        => 'fixed_color',
			'type'        => 'colorsimple',
			'label'       => esc_html__('Text Color', 'ambient'),
			'description' => '',
			'parent'      => $row1_fixed_header_menu
		));

		ambient_elated_add_admin_field(array(
			'name'        => 'fixed_hovercolor',
			'type'        => 'colorsimple',
			'label'       => esc_html__(esc_html__('Hover/Active Color', 'ambient'), 'ambient'),
			'description' => '',
			'parent'      => $row1_fixed_header_menu
		));

		$row2_fixed_header_menu = ambient_elated_add_admin_row(array(
			'name'   => 'row2',
			'parent' => $group_fixed_header_menu
		));

		ambient_elated_add_admin_field(
			array(
				'name'          => 'fixed_google_fonts',
				'type'          => 'fontsimple',
				'label'         => esc_html__('Font Family', 'ambient'),
				'default_value' => '-1',
				'parent'        => $row2_fixed_header_menu,
			)
		);

		ambient_elated_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'fixed_fontsize',
				'label'         => esc_html__('Font Size', 'ambient'),
				'default_value' => '',
				'parent'        => $row2_fixed_header_menu,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'fixed_lineheight',
				'label'         => esc_html__('Line Height', 'ambient'),
				'default_value' => '',
				'parent'        => $row2_fixed_header_menu,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'type'          => 'selectblanksimple',
				'name'          => 'fixed_texttransform',
				'label'         => esc_html__('Text Transform', 'ambient'),
				'default_value' => '',
				'options'       => ambient_elated_get_text_transform_array(),
				'parent'        => $row2_fixed_header_menu
			)
		);

		$row3_fixed_header_menu = ambient_elated_add_admin_row(array(
			'name'   => 'row3',
			'parent' => $group_fixed_header_menu
		));

		ambient_elated_add_admin_field(
			array(
				'type'          => 'selectblanksimple',
				'name'          => 'fixed_fontstyle',
				'default_value' => '',
				'label'         => esc_html__('Font Style', 'ambient'),
				'options'       => ambient_elated_get_font_style_array(),
				'parent'        => $row3_fixed_header_menu
			)
		);

		ambient_elated_add_admin_field(
			array(
				'type'          => 'selectblanksimple',
				'name'          => 'fixed_fontweight',
				'default_value' => '',
				'label'         => esc_html__('Font Weight', 'ambient'),
				'options'       => ambient_elated_get_font_weight_array(),
				'parent'        => $row3_fixed_header_menu
			)
		);

		ambient_elated_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'fixed_letterspacing',
				'label'         => esc_html__('Letter Spacing', 'ambient'),
				'default_value' => '',
				'parent'        => $row3_fixed_header_menu,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		/***************** Fixed Header Layout ********************/

		/******************* Main Menu Layout *********************/

		$panel_main_menu = ambient_elated_add_admin_panel(
			array(
				'title'           => esc_html__('Main Menu', 'ambient'),
				'name'            => 'panel_main_menu',
				'page'            => '_header_page',
				'hidden_property' => 'header_type',
				'hidden_values'   => array(
					'header-full-screen',
					'header-vertical'
				)
			)
		);

		ambient_elated_add_admin_section_title(
			array(
				'parent' => $panel_main_menu,
				'name'   => 'main_menu_area_title',
				'title'  => esc_html__('Main Menu General Settings', 'ambient')
			)
		);

		$drop_down_group = ambient_elated_add_admin_group(
			array(
				'parent'      => $panel_main_menu,
				'name'        => 'drop_down_group',
				'title'       => esc_html__('Main Dropdown Menu', 'ambient'),
				'description' => esc_html__('Choose a color and transparency for the main menu background (0 = fully transparent, 1 = opaque)', 'ambient')
			)
		);

		$drop_down_row1 = ambient_elated_add_admin_row(
			array(
				'parent' => $drop_down_group,
				'name'   => 'drop_down_row1',
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $drop_down_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_background_color',
				'default_value' => '',
				'label'         => esc_html__('Background Color', 'ambient'),
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $drop_down_row1,
				'type'          => 'textsimple',
				'name'          => 'dropdown_background_transparency',
				'default_value' => '',
				'label'         => esc_html__('Background Transparency', 'ambient'),
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $panel_main_menu,
				'type'          => 'select',
				'name'          => 'menu_dropdown_appearance',
				'default_value' => 'dropdown-animate-height',
				'label'         => esc_html__('Main Dropdown Menu Appearance', 'ambient'),
				'description'   => esc_html__('Choose appearance for dropdown menu', 'ambient'),
				'options'       => array(
					'dropdown-default'           => esc_html__('Default', 'ambient'),
					'dropdown-animate-height'    => esc_html__('Animate Height', 'ambient'),
					'dropdown-slide-from-bottom' => esc_html__('Slide From Bottom', 'ambient'),
					'dropdown-slide-from-top'    => esc_html__('Slide From Top', 'ambient'),
					'dropdown-slide-from-left'   => esc_html__('Slide From Left', 'ambient')
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $panel_main_menu,
				'type'          => 'text',
				'name'          => 'dropdown_top_position',
				'default_value' => '',
				'label'         => esc_html__('Dropdown Position', 'ambient'),
				'description'   => esc_html__('Enter value in percentage of entire header height', 'ambient'),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => '%'
				)
			)
		);

		$first_level_group = ambient_elated_add_admin_group(
			array(
				'parent'      => $panel_main_menu,
				'name'        => 'first_level_group',
				'title'       => esc_html__('1st Level Menu', 'ambient'),
				'description' => esc_html__('Define styles for 1st level in Top Navigation Menu', 'ambient')
			)
		);

		$first_level_row1 = ambient_elated_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row1'
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $first_level_row1,
				'type'          => 'colorsimple',
				'name'          => 'menu_color',
				'default_value' => '',
				'label'         => esc_html__('Text Color', 'ambient'),
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $first_level_row1,
				'type'          => 'colorsimple',
				'name'          => 'menu_hovercolor',
				'default_value' => '',
				'label'         => esc_html__('Hover Text Color', 'ambient'),
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $first_level_row1,
				'type'          => 'colorsimple',
				'name'          => 'menu_activecolor',
				'default_value' => '',
				'label'         => esc_html__('Active Text Color', 'ambient'),
			)
		);

		$first_level_row3 = ambient_elated_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row3',
				'next'   => true
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $first_level_row3,
				'type'          => 'colorsimple',
				'name'          => 'menu_light_hovercolor',
				'default_value' => '',
				'label'         => esc_html__('Light Menu Hover Text Color', 'ambient'),
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $first_level_row3,
				'type'          => 'colorsimple',
				'name'          => 'menu_light_activecolor',
				'default_value' => '',
				'label'         => esc_html__('Light Menu Active Text Color', 'ambient'),
			)
		);

		$first_level_row4 = ambient_elated_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row4',
				'next'   => true
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $first_level_row4,
				'type'          => 'colorsimple',
				'name'          => 'menu_dark_hovercolor',
				'default_value' => '',
				'label'         => esc_html__('Dark Menu Hover Text Color', 'ambient'),
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $first_level_row4,
				'type'          => 'colorsimple',
				'name'          => 'menu_dark_activecolor',
				'default_value' => '',
				'label'         => esc_html__('Dark Menu Active Text Color', 'ambient'),
			)
		);

		$first_level_row5 = ambient_elated_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row5',
				'next'   => true
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $first_level_row5,
				'type'          => 'fontsimple',
				'name'          => 'menu_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__('Font Family', 'ambient'),
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $first_level_row5,
				'type'          => 'textsimple',
				'name'          => 'menu_fontsize',
				'default_value' => '',
				'label'         => esc_html__('Font Size', 'ambient'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $first_level_row5,
				'type'          => 'textsimple',
				'name'          => 'menu_lineheight',
				'default_value' => '',
				'label'         => esc_html__('Line Height', 'ambient'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		$first_level_row6 = ambient_elated_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row6',
				'next'   => true
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $first_level_row6,
				'type'          => 'selectblanksimple',
				'name'          => 'menu_fontstyle',
				'default_value' => '',
				'label'         => esc_html__('Font Style', 'ambient'),
				'options'       => ambient_elated_get_font_style_array()
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $first_level_row6,
				'type'          => 'selectblanksimple',
				'name'          => 'menu_fontweight',
				'default_value' => '',
				'label'         => esc_html__('Font Weight', 'ambient'),
				'options'       => ambient_elated_get_font_weight_array()
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $first_level_row6,
				'type'          => 'textsimple',
				'name'          => 'menu_letterspacing',
				'default_value' => '',
				'label'         => esc_html__('Letter Spacing', 'ambient'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $first_level_row6,
				'type'          => 'selectblanksimple',
				'name'          => 'menu_texttransform',
				'default_value' => '',
				'label'         => esc_html__('Text Transform', 'ambient'),
				'options'       => ambient_elated_get_text_transform_array()
			)
		);

		$first_level_row7 = ambient_elated_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row7',
				'next'   => true
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $first_level_row7,
				'type'          => 'textsimple',
				'name'          => 'menu_padding_left_right',
				'default_value' => '',
				'label'         => esc_html__('Padding Left/Right', 'ambient'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $first_level_row7,
				'type'          => 'textsimple',
				'name'          => 'menu_margin_left_right',
				'default_value' => '',
				'label'         => esc_html__('Margin Left/Right', 'ambient'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_group = ambient_elated_add_admin_group(
			array(
				'parent'      => $panel_main_menu,
				'name'        => 'second_level_group',
				'title'       => esc_html__('2nd Level Menu', 'ambient'),
				'description' => esc_html__('Define styles for 2nd level in Top Navigation Menu', 'ambient')
			)
		);

		$second_level_row1 = ambient_elated_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row1'
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $second_level_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_color',
				'default_value' => '',
				'label'         => esc_html__('Text Color', 'ambient')
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $second_level_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_hovercolor',
				'default_value' => '',
				'label'         => esc_html__('Hover/Active Color', 'ambient')
			)
		);

		$second_level_row2 = ambient_elated_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row2',
				'next'   => true
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $second_level_row2,
				'type'          => 'fontsimple',
				'name'          => 'dropdown_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__('Font Family', 'ambient')
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $second_level_row2,
				'type'          => 'textsimple',
				'name'          => 'dropdown_fontsize',
				'default_value' => '',
				'label'         => esc_html__('Font Size', 'ambient'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $second_level_row2,
				'type'          => 'textsimple',
				'name'          => 'dropdown_lineheight',
				'default_value' => '',
				'label'         => esc_html__('Line Height', 'ambient'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_row3 = ambient_elated_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row3',
				'next'   => true
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $second_level_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_fontstyle',
				'default_value' => '',
				'label'         => esc_html__('Font Style', 'ambient'),
				'options'       => ambient_elated_get_font_style_array()
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $second_level_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_fontweight',
				'default_value' => '',
				'label'         => esc_html__('Font Weight', 'ambient'),
				'options'       => ambient_elated_get_font_weight_array()
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $second_level_row3,
				'type'          => 'textsimple',
				'name'          => 'dropdown_letterspacing',
				'default_value' => '',
				'label'         => esc_html__('Letter Spacing', 'ambient'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $second_level_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_texttransform',
				'default_value' => '',
				'label'         => esc_html__('Text Transform', 'ambient'),
				'options'       => ambient_elated_get_text_transform_array()
			)
		);

		$second_level_wide_group = ambient_elated_add_admin_group(
			array(
				'parent'      => $panel_main_menu,
				'name'        => 'second_level_wide_group',
				'title'       => esc_html__('2nd Level Wide Menu', 'ambient'),
				'description' => esc_html__('Define styles for 2nd level in Wide Menu', 'ambient')
			)
		);

		$second_level_wide_row1 = ambient_elated_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name'   => 'second_level_wide_row1'
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $second_level_wide_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_wide_color',
				'default_value' => '',
				'label'         => esc_html__('Text Color', 'ambient')
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $second_level_wide_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_wide_hovercolor',
				'default_value' => '',
				'label'         => esc_html__('Hover/Active Color', 'ambient')
			)
		);

		$second_level_wide_row2 = ambient_elated_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name'   => 'second_level_wide_row2',
				'next'   => true
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $second_level_wide_row2,
				'type'          => 'fontsimple',
				'name'          => 'dropdown_wide_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__('Font Family', 'ambient')
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $second_level_wide_row2,
				'type'          => 'textsimple',
				'name'          => 'dropdown_wide_fontsize',
				'default_value' => '',
				'label'         => esc_html__('Font Size', 'ambient'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $second_level_wide_row2,
				'type'          => 'textsimple',
				'name'          => 'dropdown_wide_lineheight',
				'default_value' => '',
				'label'         => esc_html__('Line Height', 'ambient'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_wide_row3 = ambient_elated_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name'   => 'second_level_wide_row3',
				'next'   => true
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $second_level_wide_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_wide_fontstyle',
				'default_value' => '',
				'label'         => esc_html__('Font Style', 'ambient'),
				'options'       => ambient_elated_get_font_style_array()
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $second_level_wide_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_wide_fontweight',
				'default_value' => '',
				'label'         => esc_html__('Font Weight', 'ambient'),
				'options'       => ambient_elated_get_font_weight_array()
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $second_level_wide_row3,
				'type'          => 'textsimple',
				'name'          => 'dropdown_wide_letterspacing',
				'default_value' => '',
				'label'         => esc_html__('Letter Spacing', 'ambient'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $second_level_wide_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_wide_texttransform',
				'default_value' => '',
				'label'         => esc_html__('Text Transform', 'ambient'),
				'options'       => ambient_elated_get_text_transform_array()
			)
		);

		$third_level_group = ambient_elated_add_admin_group(
			array(
				'parent'      => $panel_main_menu,
				'name'        => 'third_level_group',
				'title'       => esc_html__('3nd Level Menu', 'ambient'),
				'description' => esc_html__('Define styles for 3nd level in Top Navigation Menu', 'ambient')
			)
		);

		$third_level_row1 = ambient_elated_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name'   => 'third_level_row1'
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $third_level_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_color_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__('Text Color', 'ambient')
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $third_level_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_hovercolor_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__('Hover/Active Color', 'ambient')
			)
		);

		$third_level_row2 = ambient_elated_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name'   => 'third_level_row2',
				'next'   => true
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $third_level_row2,
				'type'          => 'fontsimple',
				'name'          => 'dropdown_google_fonts_thirdlvl',
				'default_value' => '-1',
				'label'         => esc_html__('Font Family', 'ambient')
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $third_level_row2,
				'type'          => 'textsimple',
				'name'          => 'dropdown_fontsize_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__('Font Size', 'ambient'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $third_level_row2,
				'type'          => 'textsimple',
				'name'          => 'dropdown_lineheight_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__('Line Height', 'ambient'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		$third_level_row3 = ambient_elated_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name'   => 'third_level_row3',
				'next'   => true
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $third_level_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_fontstyle_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__('Font Style', 'ambient'),
				'options'       => ambient_elated_get_font_style_array()
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $third_level_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_fontweight_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__('Font Weight', 'ambient'),
				'options'       => ambient_elated_get_font_weight_array()
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $third_level_row3,
				'type'          => 'textsimple',
				'name'          => 'dropdown_letterspacing_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__('Letter Spacing', 'ambient'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $third_level_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_texttransform_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__('Text Transform', 'ambient'),
				'options'       => ambient_elated_get_text_transform_array()
			)
		);

		$third_level_wide_group = ambient_elated_add_admin_group(
			array(
				'parent'      => $panel_main_menu,
				'name'        => 'third_level_wide_group',
				'title'       => esc_html__('3rd Level Wide Menu', 'ambient'),
				'description' => esc_html__('Define styles for 3rd level in Wide Menu', 'ambient')
			)
		);

		$third_level_wide_row1 = ambient_elated_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name'   => 'third_level_wide_row1'
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $third_level_wide_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_wide_color_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__('Text Color', 'ambient')
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $third_level_wide_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_wide_hovercolor_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__('Hover/Active Color', 'ambient')
			)
		);

		$third_level_wide_row2 = ambient_elated_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name'   => 'third_level_wide_row2',
				'next'   => true
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $third_level_wide_row2,
				'type'          => 'fontsimple',
				'name'          => 'dropdown_wide_google_fonts_thirdlvl',
				'default_value' => '-1',
				'label'         => esc_html__('Font Family', 'ambient')
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $third_level_wide_row2,
				'type'          => 'textsimple',
				'name'          => 'dropdown_wide_fontsize_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__('Font Size', 'ambient'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $third_level_wide_row2,
				'type'          => 'textsimple',
				'name'          => 'dropdown_wide_lineheight_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__('Line Height', 'ambient'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		$third_level_wide_row3 = ambient_elated_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name'   => 'third_level_wide_row3',
				'next'   => true
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $third_level_wide_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_wide_fontstyle_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__('Font Style', 'ambient'),
				'options'       => ambient_elated_get_font_style_array()
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $third_level_wide_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_wide_fontweight_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__('Font Weight', 'ambient'),
				'options'       => ambient_elated_get_font_weight_array()
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $third_level_wide_row3,
				'type'          => 'textsimple',
				'name'          => 'dropdown_wide_letterspacing_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__('Letter Spacing', 'ambient'),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent'        => $third_level_wide_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_wide_texttransform_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__('Text Transform', 'ambient'),
				'options'       => ambient_elated_get_text_transform_array()
			)
		);

		/******************* Main Menu Layout *********************/

		/****************** Vertical Main Menu Layout ********************/

		$panel_vertical_main_menu = ambient_elated_add_admin_panel(
			array(
				'title'           => esc_html__('Vertical Main Menu', 'ambient'),
				'name'            => 'panel_vertical_main_menu',
				'page'            => '_header_page',
				'hidden_property' => 'header_type',
				'hidden_values'   => array(
					'header-standard',
					'header-full-screen'
				)
			)
		);

		$drop_down_group = ambient_elated_add_admin_group(
			array(
				'parent'      => $panel_vertical_main_menu,
				'name'        => 'vertical_drop_down_group',
				'title'       => esc_html__('Main Dropdown Menu', 'ambient'),
				'description' => esc_html__('Set a style for dropdown menu', 'ambient')
			)
		);

		$vertical_drop_down_row1 = ambient_elated_add_admin_row(
			array(
				'parent' => $drop_down_group,
				'name'   => 'eltdf_drop_down_row1',
			)
		);

		ambient_elated_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'vertical_menu_top_margin',
			'default_value' => '',
			'label'         => esc_html__('Top Margin', 'ambient'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $vertical_drop_down_row1
		));

		ambient_elated_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'vertical_menu_bottom_margin',
			'default_value' => '',
			'label'         => esc_html__('Bottom Margin', 'ambient'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $vertical_drop_down_row1
		));

		$group_vertical_first_level = ambient_elated_add_admin_group(array(
			'name'        => 'group_vertical_first_level',
			'title'       => esc_html__('1st level', 'ambient'),
			'description' => esc_html__('Define styles for 1st level menu', 'ambient'),
			'parent'      => $panel_vertical_main_menu
		));

		$row_vertical_first_level_1 = ambient_elated_add_admin_row(array(
			'name'   => 'row_vertical_first_level_1',
			'parent' => $group_vertical_first_level
		));

		ambient_elated_add_admin_field(array(
			'type'          => 'colorsimple',
			'name'          => 'vertical_menu_1st_color',
			'default_value' => '',
			'label'         => esc_html__('Text Color', 'ambient'),
			'parent'        => $row_vertical_first_level_1
		));

		ambient_elated_add_admin_field(array(
			'type'          => 'colorsimple',
			'name'          => 'vertical_menu_1st_hover_color',
			'default_value' => '',
			'label'         => esc_html__('Hover/Active Color', 'ambient'),
			'parent'        => $row_vertical_first_level_1
		));

		ambient_elated_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'vertical_menu_1st_fontsize',
			'default_value' => '',
			'label'         => esc_html__('Font Size', 'ambient'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_vertical_first_level_1
		));

		ambient_elated_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'vertical_menu_1st_lineheight',
			'default_value' => '',
			'label'         => esc_html__('Line Height', 'ambient'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_vertical_first_level_1
		));

		$row_vertical_first_level_2 = ambient_elated_add_admin_row(array(
			'name'   => 'row_vertical_first_level_2',
			'parent' => $group_vertical_first_level,
			'next'   => true
		));

		ambient_elated_add_admin_field(array(
			'type'          => 'selectblanksimple',
			'name'          => 'vertical_menu_1st_texttransform',
			'default_value' => '',
			'label'         => esc_html__('Text Transform', 'ambient'),
			'options'       => ambient_elated_get_text_transform_array(),
			'parent'        => $row_vertical_first_level_2
		));

		ambient_elated_add_admin_field(array(
			'type'          => 'fontsimple',
			'name'          => 'vertical_menu_1st_google_fonts',
			'default_value' => '-1',
			'label'         => esc_html__('Font Family', 'ambient'),
			'parent'        => $row_vertical_first_level_2
		));

		ambient_elated_add_admin_field(array(
			'type'          => 'selectblanksimple',
			'name'          => 'vertical_menu_1st_fontstyle',
			'default_value' => '',
			'label'         => esc_html__('Font Style', 'ambient'),
			'options'       => ambient_elated_get_font_style_array(),
			'parent'        => $row_vertical_first_level_2
		));

		ambient_elated_add_admin_field(array(
			'type'          => 'selectblanksimple',
			'name'          => 'vertical_menu_1st_fontweight',
			'default_value' => '',
			'label'         => esc_html__('Font Weight', 'ambient'),
			'options'       => ambient_elated_get_font_weight_array(),
			'parent'        => $row_vertical_first_level_2
		));

		$row_vertical_first_level_3 = ambient_elated_add_admin_row(array(
			'name'   => 'row_vertical_first_level_3',
			'parent' => $group_vertical_first_level,
			'next'   => true
		));

		ambient_elated_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'vertical_menu_1st_letter_spacing',
			'default_value' => '',
			'label'         => esc_html__('Letter Spacing', 'ambient'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_vertical_first_level_3
		));

		$group_vertical_second_level = ambient_elated_add_admin_group(array(
			'name'        => 'group_vertical_second_level',
			'title'       => esc_html__('2nd level', 'ambient'),
			'description' => esc_html__('Define styles for 2nd level menu', 'ambient'),
			'parent'      => $panel_vertical_main_menu
		));

		$row_vertical_second_level_1 = ambient_elated_add_admin_row(array(
			'name'   => 'row_vertical_second_level_1',
			'parent' => $group_vertical_second_level
		));

		ambient_elated_add_admin_field(array(
			'type'          => 'colorsimple',
			'name'          => 'vertical_menu_2nd_color',
			'default_value' => '',
			'label'         => esc_html__('Text Color', 'ambient'),
			'parent'        => $row_vertical_second_level_1
		));

		ambient_elated_add_admin_field(array(
			'type'          => 'colorsimple',
			'name'          => 'vertical_menu_2nd_hover_color',
			'default_value' => '',
			'label'         => esc_html__('Hover/Active Color', 'ambient'),
			'parent'        => $row_vertical_second_level_1
		));

		ambient_elated_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'vertical_menu_2nd_fontsize',
			'default_value' => '',
			'label'         => esc_html__('Font Size', 'ambient'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_vertical_second_level_1
		));

		ambient_elated_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'vertical_menu_2nd_lineheight',
			'default_value' => '',
			'label'         => esc_html__('Line Height', 'ambient'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_vertical_second_level_1
		));

		$row_vertical_second_level_2 = ambient_elated_add_admin_row(array(
			'name'   => 'row_vertical_second_level_2',
			'parent' => $group_vertical_second_level,
			'next'   => true
		));

		ambient_elated_add_admin_field(array(
			'type'          => 'selectblanksimple',
			'name'          => 'vertical_menu_2nd_texttransform',
			'default_value' => '',
			'label'         => esc_html__('Text Transform', 'ambient'),
			'options'       => ambient_elated_get_text_transform_array(),
			'parent'        => $row_vertical_second_level_2
		));

		ambient_elated_add_admin_field(array(
			'type'          => 'fontsimple',
			'name'          => 'vertical_menu_2nd_google_fonts',
			'default_value' => '-1',
			'label'         => esc_html__('Font Family', 'ambient'),
			'parent'        => $row_vertical_second_level_2
		));

		ambient_elated_add_admin_field(array(
			'type'          => 'selectblanksimple',
			'name'          => 'vertical_menu_2nd_fontstyle',
			'default_value' => '',
			'label'         => esc_html__('Font Style', 'ambient'),
			'options'       => ambient_elated_get_font_style_array(),
			'parent'        => $row_vertical_second_level_2
		));

		ambient_elated_add_admin_field(array(
			'type'          => 'selectblanksimple',
			'name'          => 'vertical_menu_2nd_fontweight',
			'default_value' => '',
			'label'         => esc_html__('Font Weight', 'ambient'),
			'options'       => ambient_elated_get_font_weight_array(),
			'parent'        => $row_vertical_second_level_2
		));

		$row_vertical_second_level_3 = ambient_elated_add_admin_row(array(
			'name'   => 'row_vertical_second_level_3',
			'parent' => $group_vertical_second_level,
			'next'   => true
		));

		ambient_elated_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'vertical_menu_2nd_letter_spacing',
			'default_value' => '',
			'label'         => esc_html__('Letter Spacing', 'ambient'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_vertical_second_level_3
		));

		$group_vertical_third_level = ambient_elated_add_admin_group(array(
			'name'        => 'group_vertical_third_level',
			'title'       => esc_html__('3rd level', 'ambient'),
			'description' => esc_html__('Define styles for 3rd level menu', 'ambient'),
			'parent'      => $panel_vertical_main_menu
		));

		$row_vertical_third_level_1 = ambient_elated_add_admin_row(array(
			'name'   => 'row_vertical_third_level_1',
			'parent' => $group_vertical_third_level
		));

		ambient_elated_add_admin_field(array(
			'type'          => 'colorsimple',
			'name'          => 'vertical_menu_3rd_color',
			'default_value' => '',
			'label'         => esc_html__('Text Color', 'ambient'),
			'parent'        => $row_vertical_third_level_1
		));

		ambient_elated_add_admin_field(array(
			'type'          => 'colorsimple',
			'name'          => 'vertical_menu_3rd_hover_color',
			'default_value' => '',
			'label'         => esc_html__('Hover/Active Color', 'ambient'),
			'parent'        => $row_vertical_third_level_1
		));

		ambient_elated_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'vertical_menu_3rd_fontsize',
			'default_value' => '',
			'label'         => esc_html__('Font Size', 'ambient'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_vertical_third_level_1
		));

		ambient_elated_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'vertical_menu_3rd_lineheight',
			'default_value' => '',
			'label'         => esc_html__('Line Height', 'ambient'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_vertical_third_level_1
		));

		$row_vertical_third_level_2 = ambient_elated_add_admin_row(array(
			'name'   => 'row_vertical_third_level_2',
			'parent' => $group_vertical_third_level,
			'next'   => true
		));

		ambient_elated_add_admin_field(array(
			'type'          => 'selectblanksimple',
			'name'          => 'vertical_menu_3rd_texttransform',
			'default_value' => '',
			'label'         => esc_html__('Text Transform', 'ambient'),
			'options'       => ambient_elated_get_text_transform_array(),
			'parent'        => $row_vertical_third_level_2
		));

		ambient_elated_add_admin_field(array(
			'type'          => 'fontsimple',
			'name'          => 'vertical_menu_3rd_google_fonts',
			'default_value' => '-1',
			'label'         => esc_html__('Font Family', 'ambient'),
			'parent'        => $row_vertical_third_level_2
		));

		ambient_elated_add_admin_field(array(
			'type'          => 'selectblanksimple',
			'name'          => 'vertical_menu_3rd_fontstyle',
			'default_value' => '',
			'label'         => esc_html__('Font Style', 'ambient'),
			'options'       => ambient_elated_get_font_style_array(),
			'parent'        => $row_vertical_third_level_2
		));

		ambient_elated_add_admin_field(array(
			'type'          => 'selectblanksimple',
			'name'          => 'vertical_menu_3rd_fontweight',
			'default_value' => '',
			'label'         => esc_html__('Font Weight', 'ambient'),
			'options'       => ambient_elated_get_font_weight_array(),
			'parent'        => $row_vertical_third_level_2
		));

		$row_vertical_third_level_3 = ambient_elated_add_admin_row(array(
			'name'   => 'row_vertical_third_level_3',
			'parent' => $group_vertical_third_level,
			'next'   => true
		));

		ambient_elated_add_admin_field(array(
			'type'          => 'textsimple',
			'name'          => 'vertical_menu_3rd_letter_spacing',
			'default_value' => '',
			'label'         => esc_html__('Letter Spacing', 'ambient'),
			'args'          => array(
				'suffix' => 'px'
			),
			'parent'        => $row_vertical_third_level_3
		));

		/****************** Vertical Main Menu Layout ********************/


		$panel_mobile_header = ambient_elated_add_admin_panel(array(
			'title' => esc_html__('Mobile Header', 'ambient'),
			'name'  => 'panel_mobile_header',
			'page'  => '_header_page'
		));

		$mobile_header_group = ambient_elated_add_admin_group(
			array(
				'parent' => $panel_mobile_header,
				'name'   => 'mobile_header_group',
				'title'  => esc_html__('Mobile Header Styles', 'ambient')
			)
		);

		$mobile_header_row1 = ambient_elated_add_admin_row(
			array(
				'parent' => $mobile_header_group,
				'name'   => 'mobile_header_row1'
			)
		);

		ambient_elated_add_admin_field(array(
			'name'   => 'mobile_header_height',
			'type'   => 'textsimple',
			'label'  => esc_html__('Height', 'ambient'),
			'parent' => $mobile_header_row1,
			'args'   => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		ambient_elated_add_admin_field(array(
			'name'   => 'mobile_header_background_color',
			'type'   => 'colorsimple',
			'label'  => esc_html__('Background Color', 'ambient'),
			'parent' => $mobile_header_row1
		));

		ambient_elated_add_admin_field(array(
			'name'   => 'mobile_header_border_bottom_color',
			'type'   => 'colorsimple',
			'label'  => esc_html__('Border Bottom Color', 'ambient'),
			'parent' => $mobile_header_row1
		));

		$mobile_menu_group = ambient_elated_add_admin_group(
			array(
				'parent' => $panel_mobile_header,
				'name'   => 'mobile_menu_group',
				'title'  => esc_html__('Mobile Menu Styles', 'ambient')
			)
		);

		$mobile_menu_row1 = ambient_elated_add_admin_row(
			array(
				'parent' => $mobile_menu_group,
				'name'   => 'mobile_menu_row1'
			)
		);

		ambient_elated_add_admin_field(array(
			'name'   => 'mobile_menu_background_color',
			'type'   => 'colorsimple',
			'label'  => esc_html__('Background Color', 'ambient'),
			'parent' => $mobile_menu_row1
		));

		ambient_elated_add_admin_field(array(
			'name'   => 'mobile_menu_border_bottom_color',
			'type'   => 'colorsimple',
			'label'  => esc_html__('Border Bottom Color', 'ambient'),
			'parent' => $mobile_menu_row1
		));

		ambient_elated_add_admin_field(array(
			'name'   => 'mobile_menu_separator_color',
			'type'   => 'colorsimple',
			'label'  => esc_html__('Menu Item Separator Color', 'ambient'),
			'parent' => $mobile_menu_row1
		));

		ambient_elated_add_admin_field(array(
			'name'        => 'mobile_logo_height',
			'type'        => 'text',
			'label'       => esc_html__('Logo Height For Mobile Header', 'ambient'),
			'description' => esc_html__('Define logo height for screen size smaller than 1024px', 'ambient'),
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		ambient_elated_add_admin_field(array(
			'name'        => 'mobile_logo_height_phones',
			'type'        => 'text',
			'label'       => esc_html__('Logo Height For Mobile Devices', 'ambient'),
			'description' => esc_html__('Define logo height for screen size smaller than 480px', 'ambient'),
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		ambient_elated_add_admin_section_title(array(
			'parent' => $panel_mobile_header,
			'name'   => 'mobile_header_fonts_title',
			'title'  => esc_html__('Typography', 'ambient')
		));

		$first_level_group = ambient_elated_add_admin_group(
			array(
				'parent'      => $panel_mobile_header,
				'name'        => 'first_level_group',
				'title'       => esc_html__('1st Level Menu', 'ambient'),
				'description' => esc_html__('Define styles for 1st level in Mobile Menu Navigation', 'ambient')
			)
		);

		$first_level_row1 = ambient_elated_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row1'
			)
		);

		ambient_elated_add_admin_field(array(
			'name'   => 'mobile_text_color',
			'type'   => 'colorsimple',
			'label'  => esc_html__('Text Color', 'ambient'),
			'parent' => $first_level_row1
		));

		ambient_elated_add_admin_field(array(
			'name'   => 'mobile_text_hover_color',
			'type'   => 'colorsimple',
			'label'  => esc_html__('Hover/Active Text Color', 'ambient'),
			'parent' => $first_level_row1
		));

		ambient_elated_add_admin_field(array(
			'name'   => 'mobile_font_family',
			'type'   => 'fontsimple',
			'label'  => esc_html__('Font Family', 'ambient'),
			'parent' => $first_level_row1
		));

		ambient_elated_add_admin_field(array(
			'name'   => 'mobile_font_size',
			'type'   => 'textsimple',
			'label'  => esc_html__('Font Size', 'ambient'),
			'parent' => $first_level_row1,
			'args'   => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		$first_level_row2 = ambient_elated_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row2'
			)
		);

		ambient_elated_add_admin_field(array(
			'name'   => 'mobile_line_height',
			'type'   => 'textsimple',
			'label'  => esc_html__('Line Height', 'ambient'),
			'parent' => $first_level_row2,
			'args'   => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		ambient_elated_add_admin_field(array(
			'name'    => 'mobile_text_transform',
			'type'    => 'selectsimple',
			'label'   => esc_html__('Text Transform', 'ambient'),
			'parent'  => $first_level_row2,
			'options' => ambient_elated_get_text_transform_array()
		));

		ambient_elated_add_admin_field(array(
			'name'    => 'mobile_font_style',
			'type'    => 'selectsimple',
			'label'   => esc_html__('Font Style', 'ambient'),
			'parent'  => $first_level_row2,
			'options' => ambient_elated_get_font_style_array()
		));

		ambient_elated_add_admin_field(array(
			'name'    => 'mobile_font_weight',
			'type'    => 'selectsimple',
			'label'   => esc_html__('Font Weight', 'ambient'),
			'parent'  => $first_level_row2,
			'options' => ambient_elated_get_font_weight_array()
		));

		$second_level_group = ambient_elated_add_admin_group(
			array(
				'parent'      => $panel_mobile_header,
				'name'        => 'second_level_group',
				'title'       => esc_html__('Dropdown Menu', 'ambient'),
				'description' => esc_html__('Define styles for drop down menu items in Mobile Menu Navigation', 'ambient')
			)
		);

		$second_level_row1 = ambient_elated_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row1'
			)
		);

		ambient_elated_add_admin_field(array(
			'name'   => 'mobile_dropdown_text_color',
			'type'   => 'colorsimple',
			'label'  => esc_html__('Text Color', 'ambient'),
			'parent' => $second_level_row1
		));

		ambient_elated_add_admin_field(array(
			'name'   => 'mobile_dropdown_text_hover_color',
			'type'   => 'colorsimple',
			'label'  => esc_html__('Hover/Active Text Color', 'ambient'),
			'parent' => $second_level_row1
		));

		ambient_elated_add_admin_field(array(
			'name'   => 'mobile_dropdown_font_family',
			'type'   => 'fontsimple',
			'label'  => esc_html__('Font Family', 'ambient'),
			'parent' => $second_level_row1
		));

		ambient_elated_add_admin_field(array(
			'name'   => 'mobile_dropdown_font_size',
			'type'   => 'textsimple',
			'label'  => esc_html__('Font Size', 'ambient'),
			'parent' => $second_level_row1,
			'args'   => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		$second_level_row2 = ambient_elated_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row2'
			)
		);

		ambient_elated_add_admin_field(array(
			'name'   => 'mobile_dropdown_line_height',
			'type'   => 'textsimple',
			'label'  => esc_html__('Line Height', 'ambient'),
			'parent' => $second_level_row2,
			'args'   => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		ambient_elated_add_admin_field(array(
			'name'    => 'mobile_dropdown_text_transform',
			'type'    => 'selectsimple',
			'label'   => esc_html__('Text Transform', 'ambient'),
			'parent'  => $second_level_row2,
			'options' => ambient_elated_get_text_transform_array()
		));

		ambient_elated_add_admin_field(array(
			'name'    => 'mobile_dropdown_font_style',
			'type'    => 'selectsimple',
			'label'   => esc_html__('Font Style', 'ambient'),
			'parent'  => $second_level_row2,
			'options' => ambient_elated_get_font_style_array()
		));

		ambient_elated_add_admin_field(array(
			'name'    => 'mobile_dropdown_font_weight',
			'type'    => 'selectsimple',
			'label'   => esc_html__('Font Weight', 'ambient'),
			'parent'  => $second_level_row2,
			'options' => ambient_elated_get_font_weight_array()
		));

		ambient_elated_add_admin_section_title(array(
			'name'   => 'mobile_opener_panel',
			'parent' => $panel_mobile_header,
			'title'  => esc_html__('Mobile Menu Opener', 'ambient')
		));

		ambient_elated_add_admin_field(array(
			'name'          => 'mobile_menu_title',
			'type'          => 'text',
			'label'         => esc_html__('Mobile Navigation Title', 'ambient'),
			'description'   => esc_html__('Enter title for mobile menu navigation', 'ambient'),
			'parent'        => $panel_mobile_header,
			'default_value' => esc_html__('Menu', 'ambient'),
			'args'          => array(
				'col_width' => 3
			)
		));

		ambient_elated_add_admin_field(array(
			'name'   => 'mobile_icon_color',
			'type'   => 'color',
			'label'  => esc_html__('Mobile Navigation Icon Color', 'ambient'),
			'parent' => $panel_mobile_header
		));

		ambient_elated_add_admin_field(array(
			'name'   => 'mobile_icon_hover_color',
			'type'   => 'color',
			'label'  => esc_html__('Mobile Navigation Icon Hover Color', 'ambient'),
			'parent' => $panel_mobile_header
		));
	}

	add_action('ambient_elated_options_map', 'ambient_elated_header_options_map', 3);
}