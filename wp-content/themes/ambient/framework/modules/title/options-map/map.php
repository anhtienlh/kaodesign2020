<?php

if ( ! function_exists('ambient_elated_title_options_map') ) {

	function ambient_elated_title_options_map() {

		ambient_elated_add_admin_page(
			array(
				'slug' => '_title_page',
				'title' => esc_html__('Title', 'ambient'),
				'icon' => 'fa fa-list-alt'
			)
		);

		$panel_title = ambient_elated_add_admin_panel(
			array(
				'page' => '_title_page',
				'name' => 'panel_title',
				'title' => esc_html__('Title Settings', 'ambient')
			)
		);

		ambient_elated_add_admin_field(
			array(
				'name' => 'show_title_area',
				'type' => 'yesno',
				'default_value' => 'yes',
				'label' => esc_html__('Show Title Area', 'ambient'),
				'description' => esc_html__('This option will enable/disable Title Area', 'ambient'),
				'parent' => $panel_title,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltdf_show_title_area_container"
				)
			)
		);

		$show_title_area_container = ambient_elated_add_admin_container(
			array(
				'parent' => $panel_title,
				'name' => 'show_title_area_container',
				'hidden_property' => 'show_title_area',
				'hidden_value' => 'no'
			)
		);

		ambient_elated_add_admin_field(
			array(
				'name' => 'title_area_type',
				'type' => 'select',
				'default_value' => 'breadcrumbs',
				'label' => esc_html__('Title Area Type', 'ambient'),
				'description' => esc_html__('Choose title type', 'ambient'),
				'parent' => $show_title_area_container,
				'options' => array(
					'standard' => esc_html__('Standard', 'ambient'),
					'breadcrumbs' => esc_html__('Simple With Breadcrumbs', 'ambient')
				),
				'args' => array(
					"dependence" => true,
					"hide" => array(
						"standard" => "",
						"breadcrumbs" => "#eltdf_title_area_type_container"
					),
					"show" => array(
						"standard" => "#eltdf_title_area_type_container",
						"breadcrumbs" => ""
					)
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'name' => 'title_area_content_alignment',
				'type' => 'select',
				'default_value' => 'left',
				'label' => esc_html__('Horizontal Alignment', 'ambient'),
				'description' => esc_html__('Specify title horizontal alignment', 'ambient'),
				'parent' => $show_title_area_container,
				'options' => array(
					'left' => esc_html__('Left', 'ambient'),
					'center' => esc_html__('Center', 'ambient')
				)
			)
		);

		$title_area_type_container = ambient_elated_add_admin_container(
			array(
				'parent' => $show_title_area_container,
				'name' => 'title_area_type_container',
				'hidden_property' => 'title_area_type',
				'hidden_values' => array('breadcrumbs'),
			)
		);

			ambient_elated_add_admin_field(
				array(
					'name' => 'title_area_vertial_alignment',
					'type' => 'select',
					'default_value' => 'header_bottom',
					'label' => esc_html__('Vertical Alignment', 'ambient'),
					'description' => esc_html__('Specify title vertical alignment', 'ambient'),
					'parent' => $title_area_type_container,
					'options' => array(
						'header_bottom' => esc_html__('From Bottom of Header', 'ambient'),
						'window_top' => esc_html__('From Window Top', 'ambient')
					)
				)
			);

		ambient_elated_add_admin_field(
			array(
				'name' => 'title_area_background_color',
				'type' => 'color',
				'label' => esc_html__('Background Color', 'ambient'),
				'description' => esc_html__('Choose a background color for Title Area', 'ambient'),
				'parent' => $show_title_area_container
			)
		);

		ambient_elated_add_admin_field(
			array(
				'name' => 'title_area_background_image',
				'type' => 'image',
				'label' => esc_html__('Background Image', 'ambient'),
				'description' => esc_html__('Choose an Image for Title Area', 'ambient'),
				'parent' => $show_title_area_container
			)
		);

		ambient_elated_add_admin_field(
			array(
				'name' => 'title_area_background_image_responsive',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__('Background Responsive Image', 'ambient'),
				'description' => esc_html__('Enabling this option will make Title background image responsive', 'ambient'),
				'parent' => $show_title_area_container,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "#eltdf_title_area_background_image_responsive_container",
					"dependence_show_on_yes" => ""
				)
			)
		);

		$title_area_background_image_responsive_container = ambient_elated_add_admin_container(
			array(
				'parent' => $show_title_area_container,
				'name' => 'title_area_background_image_responsive_container',
				'hidden_property' => 'title_area_background_image_responsive',
				'hidden_value' => 'yes'
			)
		);

		ambient_elated_add_admin_field(
			array(
				'name' => 'title_area_background_image_parallax',
				'type' => 'select',
				'default_value' => 'no',
				'label' => esc_html__('Background Image in Parallax', 'ambient'),
				'description' => esc_html__('Enabling this option will make Title background image parallax', 'ambient'),
				'parent' => $title_area_background_image_responsive_container,
				'options' => array(
					'no' => esc_html__('No', 'ambient'),
					'yes' => esc_html__('Yes', 'ambient'),
					'yes_zoom' => esc_html__('Yes, with zoom out', 'ambient')
				)
			)
		);

		ambient_elated_add_admin_field(array(
			'name' => 'title_area_height',
			'type' => 'text',
			'label' => esc_html__('Height', 'ambient'),
			'description' => esc_html__('Set a height for Title Area', 'ambient'),
			'parent' => $title_area_background_image_responsive_container,
			'args' => array(
				'col_width' => 2,
				'suffix' => 'px'
			)
		));


		$panel_typography = ambient_elated_add_admin_panel(
			array(
				'page' => '_title_page',
				'name' => 'panel_title_typography',
				'title' => esc_html__('Typography', 'ambient')
			)
		);

        ambient_elated_add_admin_section_title(array(
            'name' => 'type_section_title',
            'title' => esc_html__('Title', 'ambient'),
            'parent' => $panel_typography
        ));

        $group_page_title_styles = ambient_elated_add_admin_group(array(
			'name'			=> 'group_page_title_styles',
			'title'			=> esc_html__('Simple Type', 'ambient'),
			'description'	=> esc_html__('Define styles for page title simple with breadcrumbs type', 'ambient'),
			'parent'		=> $panel_typography
		));

			$row_page_title_styles_1 = ambient_elated_add_admin_row(array(
				'name'		=> 'row_page_title_styles_1',
				'parent'	=> $group_page_title_styles
			));
		
				ambient_elated_add_admin_field(array(
					'type'			=> 'colorsimple',
					'name'			=> 'page_title_color',
					'default_value'	=> '',
					'label'			=> esc_html__('Text Color', 'ambient'),
					'parent'		=> $row_page_title_styles_1
				));
		
				ambient_elated_add_admin_field(array(
					'type'			=> 'textsimple',
					'name'			=> 'page_title_fontsize',
					'default_value'	=> '',
					'label'			=> esc_html__('Font Size', 'ambient'),
					'args'			=> array(
						'suffix'	=> 'px'
					),
					'parent'		=> $row_page_title_styles_1
				));
		
				ambient_elated_add_admin_field(array(
					'type'			=> 'textsimple',
					'name'			=> 'page_title_lineheight',
					'default_value'	=> '',
					'label'			=> esc_html__('Line Height', 'ambient'),
					'args'			=> array(
						'suffix'	=> 'px'
					),
					'parent'		=> $row_page_title_styles_1
				));
		
				ambient_elated_add_admin_field(array(
					'type'			=> 'selectblanksimple',
					'name'			=> 'page_title_texttransform',
					'default_value'	=> '',
					'label'			=> esc_html__('Text Transform', 'ambient'),
					'options'		=> ambient_elated_get_text_transform_array(),
					'parent'		=> $row_page_title_styles_1
				));
		
			$row_page_title_styles_2 = ambient_elated_add_admin_row(array(
				'name'		=> 'row_page_title_styles_2',
				'parent'	=> $group_page_title_styles,
				'next'		=> true
			));
		
				ambient_elated_add_admin_field(array(
					'type'			=> 'fontsimple',
					'name'			=> 'page_title_google_fonts',
					'default_value'	=> '-1',
					'label'			=> esc_html__('Font Family', 'ambient'),
					'parent'		=> $row_page_title_styles_2
				));
		
				ambient_elated_add_admin_field(array(
					'type'			=> 'selectblanksimple',
					'name'			=> 'page_title_fontstyle',
					'default_value'	=> '',
					'label'			=> esc_html__('Font Style', 'ambient'),
					'options'		=> ambient_elated_get_font_style_array(),
					'parent'		=> $row_page_title_styles_2
				));
		
				ambient_elated_add_admin_field(array(
					'type'			=> 'selectblanksimple',
					'name'			=> 'page_title_fontweight',
					'default_value'	=> '',
					'label'			=> esc_html__('Font Weight', 'ambient'),
					'options'		=> ambient_elated_get_font_weight_array(),
					'parent'		=> $row_page_title_styles_2
				));
		
				ambient_elated_add_admin_field(array(
					'type'			=> 'textsimple',
					'name'			=> 'page_title_letter_spacing',
					'default_value'	=> '',
					'label'			=> esc_html__('Letter Spacing', 'ambient'),
					'args'			=> array(
						'suffix'	=> 'px'
					),
					'parent'		=> $row_page_title_styles_2
				));

        $group_page_title_normal_styles = ambient_elated_add_admin_group(array(
            'name'			=> 'group_page_title_normal_styles',
            'title'			=> esc_html__('Standard Type', 'ambient'),
            'description'	=> esc_html__('Define styles for page title standard type', 'ambient'),
            'parent'		=> $panel_typography
        ));

	        $row_page_title_normal_styles_1 = ambient_elated_add_admin_row(array(
	            'name'		=> 'row_page_title_normal_styles_1',
	            'parent'	=> $group_page_title_normal_styles
	        ));

		        ambient_elated_add_admin_field(array(
		            'type'			=> 'colorsimple',
		            'name'			=> 'page_title_normal_color',
		            'default_value'	=> '',
		            'label'			=> esc_html__('Text Color', 'ambient'),
		            'parent'		=> $row_page_title_normal_styles_1
		        ));
		
		        ambient_elated_add_admin_field(array(
		            'type'			=> 'textsimple',
		            'name'			=> 'page_title_normal_fontsize',
		            'default_value'	=> '',
		            'label'			=> esc_html__('Font Size', 'ambient'),
		            'args'			=> array(
		                'suffix'	=> 'px'
		            ),
		            'parent'		=> $row_page_title_normal_styles_1
		        ));
		
		        ambient_elated_add_admin_field(array(
		            'type'			=> 'textsimple',
		            'name'			=> 'page_title_normal_lineheight',
		            'default_value'	=> '',
		            'label'			=> esc_html__('Line Height', 'ambient'),
		            'args'			=> array(
		                'suffix'	=> 'px'
		            ),
		            'parent'		=> $row_page_title_normal_styles_1
		        ));
		
		        ambient_elated_add_admin_field(array(
		            'type'			=> 'selectblanksimple',
		            'name'			=> 'page_title_normal_texttransform',
		            'default_value'	=> '',
		            'label'			=> esc_html__('Text Transform', 'ambient'),
		            'options'		=> ambient_elated_get_text_transform_array(),
		            'parent'		=> $row_page_title_normal_styles_1
		        ));

	        $row_page_title_normal_styles_2 = ambient_elated_add_admin_row(array(
	            'name'		=> 'row_page_title_normal_styles_2',
	            'parent'	=> $group_page_title_normal_styles,
	            'next'		=> true
	        ));

		        ambient_elated_add_admin_field(array(
		            'type'			=> 'fontsimple',
		            'name'			=> 'page_title_normal_google_fonts',
		            'default_value'	=> '-1',
		            'label'			=> esc_html__('Font Family', 'ambient'),
		            'parent'		=> $row_page_title_normal_styles_2
		        ));
		
		        ambient_elated_add_admin_field(array(
		            'type'			=> 'selectblanksimple',
		            'name'			=> 'page_title_normal_fontstyle',
		            'default_value'	=> '',
		            'label'			=> esc_html__('Font Style', 'ambient'),
		            'options'		=> ambient_elated_get_font_style_array(),
		            'parent'		=> $row_page_title_normal_styles_2
		        ));
		
		        ambient_elated_add_admin_field(array(
		            'type'			=> 'selectblanksimple',
		            'name'			=> 'page_title_normal_fontweight',
		            'default_value'	=> '',
		            'label'			=> esc_html__('Font Weight', 'ambient'),
		            'options'		=> ambient_elated_get_font_weight_array(),
		            'parent'		=> $row_page_title_normal_styles_2
		        ));
		
		        ambient_elated_add_admin_field(array(
		            'type'			=> 'textsimple',
		            'name'			=> 'page_title_normal_letter_spacing',
		            'default_value'	=> '',
		            'label'			=> esc_html__('Letter Spacing', 'ambient'),
		            'args'			=> array(
		                'suffix'	=> 'px'
		            ),
		            'parent'		=> $row_page_title_normal_styles_2
		        ));
		

        ambient_elated_add_admin_section_title(array(
            'name' => 'type_section_subtitle',
            'title' => esc_html__('Subtitle', 'ambient'),
            'parent' => $panel_typography
        ));

			$group_page_subtitle_styles = ambient_elated_add_admin_group(array(
				'name'			=> 'group_page_subtitle_styles',
				'title'			=> esc_html__('Subtitle', 'ambient'),
				'description'	=> esc_html__('Define styles for page subtitle', 'ambient'),
				'parent'		=> $panel_typography
			));

				$row_page_subtitle_styles_1 = ambient_elated_add_admin_row(array(
					'name'		=> 'row_page_subtitle_styles_1',
					'parent'	=> $group_page_subtitle_styles
				));

					ambient_elated_add_admin_field(array(
						'type'			=> 'colorsimple',
						'name'			=> 'page_subtitle_color',
						'default_value'	=> '',
						'label'			=> esc_html__('Text Color', 'ambient'),
						'parent'		=> $row_page_subtitle_styles_1
					));
			
					ambient_elated_add_admin_field(array(
						'type'			=> 'textsimple',
						'name'			=> 'page_subtitle_fontsize',
						'default_value'	=> '',
						'label'			=> esc_html__('Font Size', 'ambient'),
						'args'			=> array(
							'suffix'	=> 'px'
						),
						'parent'		=> $row_page_subtitle_styles_1
					));
			
					ambient_elated_add_admin_field(array(
						'type'			=> 'textsimple',
						'name'			=> 'page_subtitle_lineheight',
						'default_value'	=> '',
						'label'			=> esc_html__('Line Height', 'ambient'),
						'args'			=> array(
							'suffix'	=> 'px'
						),
						'parent'		=> $row_page_subtitle_styles_1
					));
			
					ambient_elated_add_admin_field(array(
						'type'			=> 'selectblanksimple',
						'name'			=> 'page_subtitle_texttransform',
						'default_value'	=> '',
						'label'			=> esc_html__('Text Transform', 'ambient'),
						'options'		=> ambient_elated_get_text_transform_array(),
						'parent'		=> $row_page_subtitle_styles_1
					));

				$row_page_subtitle_styles_2 = ambient_elated_add_admin_row(array(
					'name'		=> 'row_page_subtitle_styles_2',
					'parent'	=> $group_page_subtitle_styles,
					'next'		=> true
				));

					ambient_elated_add_admin_field(array(
						'type'			=> 'fontsimple',
						'name'			=> 'page_subtitle_google_fonts',
						'default_value'	=> '-1',
						'label'			=> esc_html__('Font Family', 'ambient'),
						'parent'		=> $row_page_subtitle_styles_2
					));
			
					ambient_elated_add_admin_field(array(
						'type'			=> 'selectblanksimple',
						'name'			=> 'page_subtitle_fontstyle',
						'default_value'	=> '',
						'label'			=> esc_html__('Font Style', 'ambient'),
						'options'		=> ambient_elated_get_font_style_array(),
						'parent'		=> $row_page_subtitle_styles_2
					));
			
					ambient_elated_add_admin_field(array(
						'type'			=> 'selectblanksimple',
						'name'			=> 'page_subtitle_fontweight',
						'default_value'	=> '',
						'label'			=> esc_html__('Font Weight', 'ambient'),
						'options'		=> ambient_elated_get_font_weight_array(),
						'parent'		=> $row_page_subtitle_styles_2
					));
			
					ambient_elated_add_admin_field(array(
						'type'			=> 'textsimple',
						'name'			=> 'page_subtitle_letter_spacing',
						'default_value'	=> '',
						'label'			=> esc_html__('Letter Spacing', 'ambient'),
						'args'			=> array(
							'suffix'	=> 'px'
						),
						'parent'		=> $row_page_subtitle_styles_2
					));

        ambient_elated_add_admin_section_title(array(
            'name' => 'type_section_breadcrumbs',
            'title' => esc_html__('Breadcrumbs', 'ambient'),
            'parent' => $panel_typography
        ));

			$group_page_breadcrumbs_styles = ambient_elated_add_admin_group(array(
				'name'			=> 'group_page_breadcrumbs_styles',
				'title'			=> esc_html__('Breadcrumbs', 'ambient'),
				'description'	=> esc_html__('Define styles for page breadcrumbs', 'ambient'),
				'parent'		=> $panel_typography
			));

				$row_page_breadcrumbs_styles_1 = ambient_elated_add_admin_row(array(
					'name'		=> 'row_page_breadcrumbs_styles_1',
					'parent'	=> $group_page_breadcrumbs_styles
				));

					ambient_elated_add_admin_field(array(
						'type'			=> 'colorsimple',
						'name'			=> 'page_breadcrumbs_color',
						'default_value'	=> '',
						'label'			=> esc_html__('Text Color', 'ambient'),
						'parent'		=> $row_page_breadcrumbs_styles_1
					));
			
					ambient_elated_add_admin_field(array(
						'type'			=> 'textsimple',
						'name'			=> 'page_breadcrumbs_fontsize',
						'default_value'	=> '',
						'label'			=> esc_html__('Font Size', 'ambient'),
						'args'			=> array(
							'suffix'	=> 'px'
						),
						'parent'		=> $row_page_breadcrumbs_styles_1
					));
			
					ambient_elated_add_admin_field(array(
						'type'			=> 'textsimple',
						'name'			=> 'page_breadcrumbs_lineheight',
						'default_value'	=> '',
						'label'			=> esc_html__('Line Height', 'ambient'),
						'args'			=> array(
							'suffix'	=> 'px'
						),
						'parent'		=> $row_page_breadcrumbs_styles_1
					));
			
					ambient_elated_add_admin_field(array(
						'type'			=> 'selectblanksimple',
						'name'			=> 'page_breadcrumbs_texttransform',
						'default_value'	=> '',
						'label'			=> esc_html__('Text Transform', 'ambient'),
						'options'		=> ambient_elated_get_text_transform_array(),
						'parent'		=> $row_page_breadcrumbs_styles_1
					));

				$row_page_breadcrumbs_styles_2 = ambient_elated_add_admin_row(array(
					'name'		=> 'row_page_breadcrumbs_styles_2',
					'parent'	=> $group_page_breadcrumbs_styles,
					'next'		=> true
				));

					ambient_elated_add_admin_field(array(
						'type'			=> 'fontsimple',
						'name'			=> 'page_breadcrumbs_google_fonts',
						'default_value'	=> '-1',
						'label'			=> esc_html__('Font Family', 'ambient'),
						'parent'		=> $row_page_breadcrumbs_styles_2
					));
			
					ambient_elated_add_admin_field(array(
						'type'			=> 'selectblanksimple',
						'name'			=> 'page_breadcrumbs_fontstyle',
						'default_value'	=> '',
						'label'			=> esc_html__('Font Style', 'ambient'),
						'options'		=> ambient_elated_get_font_style_array(),
						'parent'		=> $row_page_breadcrumbs_styles_2
					));
			
					ambient_elated_add_admin_field(array(
						'type'			=> 'selectblanksimple',
						'name'			=> 'page_breadcrumbs_fontweight',
						'default_value'	=> '',
						'label'			=> esc_html__('Font Weight', 'ambient'),
						'options'		=> ambient_elated_get_font_weight_array(),
						'parent'		=> $row_page_breadcrumbs_styles_2
					));
			
					ambient_elated_add_admin_field(array(
						'type'			=> 'textsimple',
						'name'			=> 'page_breadcrumbs_letter_spacing',
						'default_value'	=> '',
						'label'			=> esc_html__('Letter Spacing', 'ambient'),
						'args'			=> array(
							'suffix'	=> 'px'
						),
						'parent'		=> $row_page_breadcrumbs_styles_2
					));

				$row_page_breadcrumbs_styles_3 = ambient_elated_add_admin_row(array(
					'name'		=> 'row_page_breadcrumbs_styles_3',
					'parent'	=> $group_page_breadcrumbs_styles,
					'next'		=> true
				));

					ambient_elated_add_admin_field(array(
						'type'			=> 'colorsimple',
						'name'			=> 'page_breadcrumbs_hovercolor',
						'default_value'	=> '',
						'label'			=> esc_html__('Hover/Active Text Color', 'ambient'),
						'parent'		=> $row_page_breadcrumbs_styles_3
					));
    }

	add_action( 'ambient_elated_options_map', 'ambient_elated_title_options_map', 4);
}