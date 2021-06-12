<?php

if ( ! function_exists('ambient_elated_search_options_map') ) {

	function ambient_elated_search_options_map() {

		ambient_elated_add_admin_page(
			array(
				'slug' => '_search_page',
				'title' => esc_html__('Search', 'ambient'),
				'icon' => 'fa fa-search'
			)
		);

		$search_page_panel = ambient_elated_add_admin_panel(
			array(
				'title' => esc_html__('Search Page', 'ambient'),
				'name' => 'search_template',
				'page' => '_search_page'
			)
		);

		ambient_elated_add_admin_field(array(
			'name'        => 'enable_search_page_sidebar',
			'type'        => 'select',
			'label'       => esc_html__('Enable Sidebar for Search Pages', 'ambient'),
			'description' => esc_html__('Enabling this option you will display sidebar on your Search Pages', 'ambient'),
			'default_value' => 'no',
			'parent'      => $search_page_panel,
			'options'     => ambient_elated_get_yes_no_select_array(false)
		));

		$ambient_elated_custom_sidebars = ambient_elated_get_custom_sidebars();

		if(count($ambient_elated_custom_sidebars) > 0) {
			ambient_elated_add_admin_field(array(
				'name' => 'search_page_custom_sidebar',
				'type' => 'selectblank',
				'label' => esc_html__('Custom Sidebar to Display', 'ambient'),
				'description' => esc_html__('Choose a custom sidebar to display on your Search Pages. Default sidebar is "Sidebar Page"', 'ambient'),
				'parent' => $search_page_panel,
				'options' => ambient_elated_get_custom_sidebars()
			));
		}

		$search_panel = ambient_elated_add_admin_panel(
			array(
				'title' => esc_html__('Search', 'ambient'),
				'name' => 'search',
				'page' => '_search_page'
			)
		);
		
		ambient_elated_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'select',
				'name'			=> 'search_icon_pack',
				'default_value'	=> 'font_elegant',
				'label'			=> esc_html__('Search Icon Pack', 'ambient'),
				'description'	=> esc_html__('Choose icon pack for search icon', 'ambient'),
				'options'		=> ambient_elated_icon_collections()->getIconCollectionsExclude(array('linea_icons'))
			)
		);
		
		ambient_elated_add_admin_section_title(
			array(
				'parent' 	=> $search_panel,
				'name'		=> 'initial_header_icon_title',
				'title'		=> esc_html__('Initial Search Icon in Header', 'ambient')
			)
		);
		
		ambient_elated_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'text',
				'name'			=> 'header_search_icon_size',
				'default_value'	=> '',
				'label'			=> esc_html__('Icon Size', 'ambient'),
				'description'	=> esc_html__('Set size for icon', 'ambient'),
				'args'			=> array(
					'col_width' => 3,
					'suffix'	=> 'px'
				)
			)
		);
		
		$search_icon_color_group = ambient_elated_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Icon Colors', 'ambient'),
				'description' => esc_html__('Define color style for icon', 'ambient'),
				'name'		=> 'search_icon_color_group'
			)
		);
		
		$search_icon_color_row = ambient_elated_add_admin_row(
			array(
				'parent'	=> $search_icon_color_group,
				'name'		=> 'search_icon_color_row'
			)
		);
		
		ambient_elated_add_admin_field(
			array(
				'parent'	=> $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_search_icon_color',
				'label'		=> esc_html__('Color', 'ambient')
			)
		);
		ambient_elated_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_search_icon_hover_color',
				'label'		=> esc_html__('Hover Color', 'ambient')
			)
		);
		ambient_elated_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_light_search_icon_color',
				'label'		=> esc_html__('Light Header Icon Color', 'ambient')
			)
		);
		ambient_elated_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_light_search_icon_hover_color',
				'label'		=> esc_html__('Light Header Icon Hover Color', 'ambient')
			)
		);
		
		$search_icon_color_row2 = ambient_elated_add_admin_row(
			array(
				'parent'	=> $search_icon_color_group,
				'name'		=> 'search_icon_color_row2',
				'next'		=> true
			)
		);
		
		ambient_elated_add_admin_field(
			array(
				'parent' => $search_icon_color_row2,
				'type'		=> 'colorsimple',
				'name'		=> 'header_dark_search_icon_color',
				'label'		=> esc_html__('Dark Header Icon Color', 'ambient')
			)
		);
		ambient_elated_add_admin_field(
			array(
				'parent' => $search_icon_color_row2,
				'type'		=> 'colorsimple',
				'name'		=> 'header_dark_search_icon_hover_color',
				'label'		=> esc_html__('Dark Header Icon Hover Color', 'ambient')
			)
		);
		
		
		$search_icon_background_group = ambient_elated_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Icon Background Style', 'ambient'),
				'description' => esc_html__('Define background style for icon', 'ambient'),
				'name'		=> 'search_icon_background_group'
			)
		);
		
		$search_icon_background_row = ambient_elated_add_admin_row(
			array(
				'parent'	=> $search_icon_background_group,
				'name'		=> 'search_icon_background_row'
			)
		);
		
		ambient_elated_add_admin_field(
			array(
				'parent'		=> $search_icon_background_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_background_color',
				'label'			=> esc_html__('Background Color', 'ambient')
			)
		);
		
		ambient_elated_add_admin_field(
			array(
				'parent'		=> $search_icon_background_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_background_hover_color',
				'label'			=> esc_html__('Background Hover Color', 'ambient')
			)
		);
		
		ambient_elated_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'yesno',
				'name'			=> 'enable_search_icon_text',
				'default_value'	=> 'no',
				'label'			=> esc_html__('Enable Search Icon Text', 'ambient'),
				'description'	=> esc_html__("Enable this option to show 'Search' text next to search icon in header", 'ambient'),
				'args'			=> array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltdf_enable_search_icon_text_container'
				)
			)
		);
		
		$enable_search_icon_text_container = ambient_elated_add_admin_container(
			array(
				'parent'			=> $search_panel,
				'name'				=> 'enable_search_icon_text_container',
				'hidden_property'	=> 'enable_search_icon_text',
				'hidden_value'		=> 'no'
			)
		);
		
		$enable_search_icon_text_group = ambient_elated_add_admin_group(
			array(
				'parent'	=> $enable_search_icon_text_container,
				'title'		=> esc_html__('Search Icon Text', 'ambient'),
				'name'		=> 'enable_search_icon_text_group',
				'description'	=> esc_html__('Define style for search icon text', 'ambient')
			)
		);
		
		$enable_search_icon_text_row = ambient_elated_add_admin_row(
			array(
				'parent'	=> $enable_search_icon_text_group,
				'name'		=> 'enable_search_icon_text_row'
			)
		);
		
		ambient_elated_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_text_color',
				'label'			=> esc_html__('Text Color', 'ambient')
			)
		);
		
		ambient_elated_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_text_color_hover',
				'label'			=> esc_html__('Text Hover Color', 'ambient')
			)
		);
		
		ambient_elated_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_text_fontsize',
				'label'			=> esc_html__('Font Size', 'ambient'),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);
		
		ambient_elated_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_text_lineheight',
				'label'			=> esc_html__('Line Height', 'ambient'),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);
		
		$enable_search_icon_text_row2 = ambient_elated_add_admin_row(
			array(
				'parent'	=> $enable_search_icon_text_group,
				'name'		=> 'enable_search_icon_text_row2',
				'next'		=> true
			)
		);
		
		ambient_elated_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_icon_text_texttransform',
				'label'			=> esc_html__('Text Transform', 'ambient'),
				'default_value'	=> '',
				'options'		=> ambient_elated_get_text_transform_array()
			)
		);
		
		ambient_elated_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'fontsimple',
				'name'			=> 'search_icon_text_google_fonts',
				'label'			=> esc_html__('Font Family', 'ambient'),
				'default_value'	=> '-1',
			)
		);
		
		ambient_elated_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_icon_text_fontstyle',
				'label'			=> esc_html__('Font Style', 'ambient'),
				'default_value'	=> '',
				'options'		=> ambient_elated_get_font_style_array(),
			)
		);
		
		ambient_elated_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_icon_text_fontweight',
				'label'			=> esc_html__('Font Weight', 'ambient'),
				'default_value'	=> '',
				'options'		=> ambient_elated_get_font_weight_array(),
			)
		);
		
		$enable_search_icon_text_row3 = ambient_elated_add_admin_row(
			array(
				'parent'	=> $enable_search_icon_text_group,
				'name'		=> 'enable_search_icon_text_row3',
				'next'		=> true
			)
		);
		
		ambient_elated_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row3,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_text_letterspacing',
				'label'			=> esc_html__('Letter Spacing', 'ambient'),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);
		
		$search_icon_spacing_group = ambient_elated_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Icon Spacing', 'ambient'),
				'description' => esc_html__('Define padding and margins for Search icon', 'ambient'),
				'name'		=> 'search_icon_spacing_group'
			)
		);
		
		$search_icon_spacing_row = ambient_elated_add_admin_row(
			array(
				'parent'	=> $search_icon_spacing_group,
				'name'		=> 'search_icon_spacing_row'
			)
		);
		
		ambient_elated_add_admin_field(
			array(
				'parent'		=> $search_icon_spacing_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_padding_left',
				'default_value'	=> '',
				'label'			=> esc_html__('Padding Left', 'ambient'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);
		
		ambient_elated_add_admin_field(
			array(
				'parent'		=> $search_icon_spacing_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_padding_right',
				'default_value'	=> '',
				'label'			=> esc_html__('Padding Right', 'ambient'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);
		
		ambient_elated_add_admin_field(
			array(
				'parent'		=> $search_icon_spacing_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_margin_left',
				'default_value'	=> '',
				'label'			=> esc_html__('Margin Left', 'ambient'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);
		
		ambient_elated_add_admin_field(
			array(
				'parent'		=> $search_icon_spacing_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_margin_right',
				'default_value'	=> '',
				'label'			=> esc_html__('Margin Right', 'ambient'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);
	}

	add_action('ambient_elated_options_map', 'ambient_elated_search_options_map', 6);
}