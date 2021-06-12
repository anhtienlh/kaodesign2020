<?php

$title_meta_box = ambient_elated_create_meta_box(
    array(
        'scope' => array('page', 'portfolio-item', 'post'),
        'title' => esc_html__('Title', 'ambient'),
        'name' => 'title_meta'
    )
);

    ambient_elated_create_meta_box_field(
        array(
            'name' => 'eltdf_show_title_area_meta',
            'type' => 'select',
            'default_value' => '',
            'label' => esc_html__('Show Title Area', 'ambient'),
            'description' => esc_html__('Disabling this option will turn off page title area', 'ambient'),
            'parent' => $title_meta_box,
            'options' => ambient_elated_get_yes_no_select_array(),
            'args' => array(
                "dependence" => true,
                "hide" => array(
                    "" => "",
                    "no" => "#eltdf_eltdf_show_title_area_meta_container",
                    "yes" => ""
                ),
                "show" => array(
                    "" => "#eltdf_eltdf_show_title_area_meta_container",
                    "no" => "",
                    "yes" => "#eltdf_eltdf_show_title_area_meta_container"
                )
            )
        )
    );

    $show_title_area_meta_container = ambient_elated_add_admin_container(
        array(
            'parent' => $title_meta_box,
            'name' => 'eltdf_show_title_area_meta_container',
            'hidden_property' => 'eltdf_show_title_area_meta',
            'hidden_value' => 'no'
        )
    );

        ambient_elated_create_meta_box_field(
            array(
                'name' => 'eltdf_title_area_type_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Title Area Type', 'ambient'),
                'description' => esc_html__('Choose title type', 'ambient'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => esc_html__('Default', 'ambient'),
                    'standard' => esc_html__('Standard', 'ambient'),
                    'breadcrumbs' => esc_html__('Simple With Breadcrumbs', 'ambient')
                ),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
	                    "" => "#eltdf_eltdf_title_area_type_meta_container",
                        "standard" => "",
                        "breadcrumbs" => "#eltdf_eltdf_title_area_type_meta_container"
                    ),
                    "show" => array(
                        "" => "",
                        "standard" => "#eltdf_eltdf_title_area_type_meta_container",
                        "breadcrumbs" => ""
                    )
                )
            )
        );

		ambient_elated_create_meta_box_field(
			array(
				'name' => 'eltdf_title_area_content_alignment_meta',
				'type' => 'select',
				'default_value' => '',
				'label' => esc_html__('Horizontal Alignment', 'ambient'),
				'description' => esc_html__('Specify title horizontal alignment', 'ambient'),
				'parent' => $show_title_area_meta_container,
				'options' => array(
					'' => esc_html__('Default', 'ambient'),
					'left' => esc_html__('Left', 'ambient'),
					'center' => esc_html__('Center', 'ambient')
				)
			)
		);

        $title_area_type_meta_container = ambient_elated_add_admin_container(
            array(
                'parent' => $show_title_area_meta_container,
                'name' => 'eltdf_title_area_type_meta_container',
                'hidden_property' => 'eltdf_title_area_type_meta',
                'hidden_values' => array('', 'breadcrumbs')
            )
        );

	        ambient_elated_create_meta_box_field(
	            array(
	                'name' => 'eltdf_title_area_vertial_alignment_meta',
	                'type' => 'select',
	                'default_value' => '',
	                'label' => esc_html__('Vertical Alignment', 'ambient'),
	                'description' => esc_html__('Specify title vertical alignment', 'ambient'),
	                'parent' => $title_area_type_meta_container,
	                'options' => array(
	                    '' => esc_html__('Default', 'ambient'),
	                    'header_bottom' => esc_html__('From Bottom of Header', 'ambient'),
	                    'window_top' => esc_html__('From Window Top', 'ambient')
	                )
	            )
	        );

			ambient_elated_create_meta_box_field(array(
				'name' => 'eltdf_title_area_subtitle_meta',
				'type' => 'text',
				'default_value' => '',
				'label' => esc_html__('Subtitle Text', 'ambient'),
				'description' => esc_html__('Enter your subtitle text', 'ambient'),
				'parent' => $title_area_type_meta_container,
				'args' => array(
					'col_width' => 6
				)
			));
			
			ambient_elated_create_meta_box_field(
				array(
					'name' => 'eltdf_subtitle_color_meta',
					'type' => 'color',
					'label' => esc_html__('Subtitle Color', 'ambient'),
					'description' => esc_html__('Choose a color for subtitle text', 'ambient'),
					'parent' => $title_area_type_meta_container
				)
			);

		ambient_elated_create_meta_box_field(
			array(
				'name' => 'eltdf_title_text_font_size_meta',
				'type' => 'text',
				'label' => esc_html__('Title Font Size', 'ambient'),
				'description' => esc_html__('Choose a font size for title text', 'ambient'),
				'parent' => $show_title_area_meta_container,
				'args' => array(
					'col_width' => 2,
					'suffix' => 'px'
				)
			)
		);

		ambient_elated_create_meta_box_field(
			array(
				'name' => 'eltdf_title_text_color_meta',
				'type' => 'color',
				'label' => esc_html__('Title Color', 'ambient'),
				'description' => esc_html__('Choose a color for title text', 'ambient'),
				'parent' => $show_title_area_meta_container
			)
		);

        ambient_elated_create_meta_box_field(
            array(
                'name' => 'eltdf_title_area_background_color_meta',
                'type' => 'color',
                'label' => esc_html__('Background Color', 'ambient'),
                'description' => esc_html__('Choose a background color for title area', 'ambient'),
                'parent' => $show_title_area_meta_container
            )
        );

        ambient_elated_create_meta_box_field(
            array(
                'name' => 'eltdf_hide_background_image_meta',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Hide Background Image', 'ambient'),
                'description' => esc_html__('Enable this option to hide background image in title area', 'ambient'),
                'parent' => $show_title_area_meta_container,
                'args' => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "#eltdf_eltdf_hide_background_image_meta_container",
                    "dependence_show_on_yes" => ""
                )
            )
        );

        $hide_background_image_meta_container = ambient_elated_add_admin_container(
            array(
                'parent' => $show_title_area_meta_container,
                'name' => 'eltdf_hide_background_image_meta_container',
                'hidden_property' => 'eltdf_hide_background_image_meta',
                'hidden_value' => 'yes'
            )
        );

        ambient_elated_create_meta_box_field(
            array(
                'name' => 'eltdf_title_area_background_image_meta',
                'type' => 'image',
                'label' => esc_html__('Background Image', 'ambient'),
                'description' => esc_html__('Choose an Image for title area', 'ambient'),
                'parent' => $hide_background_image_meta_container
            )
        );

        ambient_elated_create_meta_box_field(
            array(
                'name' => 'eltdf_title_area_background_image_responsive_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Background Responsive Image', 'ambient'),
                'description' => esc_html__('Enabling this option will make Title background image responsive', 'ambient'),
                'parent' => $hide_background_image_meta_container,
                'options' => ambient_elated_get_yes_no_select_array(),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "" => "",
                        "no" => "",
                        "yes" => "#eltdf_eltdf_title_area_background_image_responsive_meta_container, #eltdf_eltdf_title_area_height_meta"
                    ),
                    "show" => array(
                        "" => "#eltdf_eltdf_title_area_background_image_responsive_meta_container, #eltdf_eltdf_title_area_height_meta",
                        "no" => "#eltdf_eltdf_title_area_background_image_responsive_meta_container, #eltdf_eltdf_title_area_height_meta",
                        "yes" => ""
                    )
                )
            )
        );

        $title_area_background_image_responsive_meta_container = ambient_elated_add_admin_container(
            array(
                'parent' => $hide_background_image_meta_container,
                'name' => 'eltdf_title_area_background_image_responsive_meta_container',
                'hidden_property' => 'eltdf_title_area_background_image_responsive_meta',
                'hidden_value' => 'yes'
            )
        );

            ambient_elated_create_meta_box_field(
                array(
                    'name' => 'eltdf_title_area_background_image_parallax_meta',
                    'type' => 'select',
                    'default_value' => '',
                    'label' => esc_html__('Background Image in Parallax', 'ambient'),
                    'description' => esc_html__('Enabling this option will make Title background image parallax', 'ambient'),
                    'parent' => $title_area_background_image_responsive_meta_container,
                    'options' => array(
                        '' => esc_html__('Default', 'ambient'),
                        'no' => esc_html__('No', 'ambient'),
                        'yes' => esc_html__('Yes', 'ambient'),
                        'yes_zoom' => esc_html__('Yes, with zoom out', 'ambient')
                    )
                )
            );

        ambient_elated_create_meta_box_field(array(
            'name' => 'eltdf_title_area_height_meta',
            'type' => 'text',
            'label' => esc_html__('Height', 'ambient'),
            'description' => esc_html__('Set a height for Title Area', 'ambient'),
            'parent' => $show_title_area_meta_container,
            'args' => array(
                'col_width' => 2,
                'suffix' => 'px'
            )
        ));