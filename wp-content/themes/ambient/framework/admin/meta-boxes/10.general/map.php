<?php

$general_meta_box = ambient_elated_create_meta_box(
    array(
        'scope' => array('page', 'portfolio-item', 'post'),
        'title' => esc_html__('General', 'ambient'),
        'name'  => 'general_meta'
    )
);

ambient_elated_create_meta_box_field(
    array(
        'name'          => 'eltdf_smooth_page_transitions_meta',
        'type'          => 'select',
        'default_value' => '',
        'label'         => esc_html__('Smooth Page Transitions', 'ambient'),
        'description'   => esc_html__('Enabling this option will perform a smooth transition between pages when clicking on links', 'ambient'),
        'parent'        => $general_meta_box,
        'options'       => array(
            ''    => esc_html__('Default', 'ambient'),
            'yes' => esc_html__('Yes', 'ambient'),
            'no'  => esc_html__('No', 'ambient'),
        ),
        'args'          => array(
            "dependence" => true,
            "hide"       => array(
                ""    => "#eltdf_page_transitions_container_meta",
                "no"  => "#eltdf_page_transitions_container_meta",
                "yes" => ""
            ),
            "show"       => array(
                ""    => "",
                "no"  => "",
                "yes" => "#eltdf_page_transitions_container_meta"
            )
        )
    )
);

$page_transitions_container_meta = ambient_elated_add_admin_container(
    array(
        'parent'          => $general_meta_box,
        'name'            => 'page_transitions_container_meta',
        'hidden_property' => 'eltdf_smooth_page_transitions_meta',
        'hidden_values'   => array('', 'no')
    )
);

ambient_elated_create_meta_box_field(
    array(
        'name'          => 'eltdf_page_transition_preloader_meta',
        'type'          => 'select',
        'default_value' => '',
        'label'         => esc_html__('Enable Preloading Animation', 'ambient'),
        'description'   => esc_html__('Enabling this option will display an animated preloader while the page content is loading', 'ambient'),
        'parent'        => $page_transitions_container_meta,
        'options'       => array(
            ''    => esc_html__('Default', 'ambient'),
            'yes' => esc_html__('Yes', 'ambient'),
            'no'  => esc_html__('No', 'ambient'),
        ),
        'args'          => array(
            "dependence" => true,
            "hide"       => array(
                ""    => "#eltdf_page_transition_preloader_container_meta",
                "no"  => "#eltdf_page_transition_preloader_container_meta",
                "yes" => ""
            ),
            "show"       => array(
                ""    => "",
                "no"  => "",
                "yes" => "#eltdf_page_transition_preloader_container_meta"
            )
        )
    )
);

$page_transition_preloader_container_meta = ambient_elated_add_admin_container(
    array(
        'parent'          => $page_transitions_container_meta,
        'name'            => 'page_transition_preloader_container_meta',
        'hidden_property' => 'eltdf_page_transition_preloader_meta',
        'hidden_values'   => array('', 'no')
    )
);

ambient_elated_create_meta_box_field(
    array(
        'name'   => 'eltdf_smooth_pt_bgnd_color_meta',
        'type'   => 'color',
        'label'  => esc_html__('Page Loader Background Color', 'ambient'),
        'parent' => $page_transition_preloader_container_meta
    )
);

$group_pt_spinner_animation_meta = ambient_elated_add_admin_group(
    array(
        'name'        => 'group_pt_spinner_animation_meta',
        'title'       => esc_html__('Loader Style', 'ambient'),
        'description' => esc_html__('Define styles for loader spinner animation', 'ambient'),
        'parent'      => $page_transition_preloader_container_meta
    )
);

$row_pt_spinner_animation_meta = ambient_elated_add_admin_row(
    array(
        'name'   => 'row_pt_spinner_animation_meta',
        'parent' => $group_pt_spinner_animation_meta
    )
);

ambient_elated_create_meta_box_field(
    array(
        'type'          => 'selectsimple',
        'name'          => 'eltdf_smooth_pt_spinner_type_meta',
        'default_value' => '',
        'label'         => esc_html__('Spinner Type', 'ambient'),
        'parent'        => $row_pt_spinner_animation_meta,
        'options'       => array(
            'rotate_circles'        => esc_html__('Rotate Circles', 'ambient'),
            'pulse'                 => esc_html__('Pulse', 'ambient'),
            'double_pulse'          => esc_html__('Double Pulse', 'ambient'),
            'cube'                  => esc_html__('Cube', 'ambient'),
            'rotating_cubes'        => esc_html__('Rotating Cubes', 'ambient'),
            'stripes'               => esc_html__('Stripes', 'ambient'),
            'wave'                  => esc_html__('Wave', 'ambient'),
            'two_rotating_circles'  => esc_html__('2 Rotating Circles', 'ambient'),
            'five_rotating_circles' => esc_html__('5 Rotating Circles', 'ambient'),
            'atom'                  => esc_html__('Atom', 'ambient'),
            'clock'                 => esc_html__('Clock', 'ambient'),
            'mitosis'               => esc_html__('Mitosis', 'ambient'),
            'lines'                 => esc_html__('Lines', 'ambient'),
            'fussion'               => esc_html__('Fussion', 'ambient'),
            'wave_circles'          => esc_html__('Wave Circles', 'ambient'),
            'pulse_circles'         => esc_html__('Pulse Circles', 'ambient')
        ),
        'args'          => array(
            "dependence" => true,
            'show'       => array(
                "pulse"                 => "#eltdf_smooth_pt_spinner_gradient_container",
                "double_pulse"          => "",
                "cube"                  => "#eltdf_smooth_pt_spinner_gradient_container",
                "rotating_cubes"        => "",
                "stripes"               => "",
                "wave"                  => "",
                "two_rotating_circles"  => "",
                "five_rotating_circles" => "",
                "atom"                  => "",
                "clock"                 => "",
                "mitosis"               => "",
                "lines"                 => "",
                "fussion"               => "",
                "wave_circles"          => "",
                "pulse_circles"         => ""
            ),
            'hide'       => array(
                "pulse"                 => "",
                "double_pulse"          => "#eltdf_smooth_pt_spinner_gradient_container",
                "cube"                  => "",
                "rotating_cubes"        => "#eltdf_smooth_pt_spinner_gradient_container",
                "stripes"               => "#eltdf_smooth_pt_spinner_gradient_container",
                "wave"                  => "#eltdf_smooth_pt_spinner_gradient_container",
                "two_rotating_circles"  => "#eltdf_smooth_pt_spinner_gradient_container",
                "five_rotating_circles" => "#eltdf_smooth_pt_spinner_gradient_container",
                "atom"                  => "#eltdf_smooth_pt_spinner_gradient_container",
                "clock"                 => "#eltdf_smooth_pt_spinner_gradient_container",
                "mitosis"               => "#eltdf_smooth_pt_spinner_gradient_container",
                "lines"                 => "#eltdf_smooth_pt_spinner_gradient_container",
                "fussion"               => "#eltdf_smooth_pt_spinner_gradient_container",
                "wave_circles"          => "#eltdf_smooth_pt_spinner_gradient_container",
                "pulse_circles"         => "#eltdf_smooth_pt_spinner_gradient_container"
            )
        )
    )
);

ambient_elated_create_meta_box_field(
    array(
        'type'          => 'colorsimple',
        'name'          => 'eltdf_smooth_pt_spinner_color_meta',
        'default_value' => '',
        'label'         => esc_html__('Spinner Color', 'ambient'),
        'parent'        => $row_pt_spinner_animation_meta
    )
);

$smooth_pt_spinner_gradient_container = ambient_elated_add_admin_container(
    array(
        'parent'          => $page_transition_preloader_container_meta,
        'name'            => 'smooth_pt_spinner_gradient_container',
        'hidden_property' => 'smooth_pt_spinner_type',
        'hidden_value'    => '',
        'hidden_values'   => array(
            "double_pulse",
            "rotating_cubes",
            "stripes",
            "wave",
            "two_rotating_circles",
            "five_rotating_circles",
            "atom",
            "clock",
            "mitosis",
            "lines",
            "fussion",
            "wave_circles",
            "pulse_circles"
        )
    )
);

ambient_elated_create_meta_box_field(
    array(
        'name'        => 'eltdf_page_background_color_meta',
        'type'        => 'color',
        'label'       => esc_html__('Page Background Color', 'ambient'),
        'description' => esc_html__('Choose background color for page content', 'ambient'),
        'parent'      => $general_meta_box
    )
);

ambient_elated_create_meta_box_field(
    array(
        'name'          => 'eltdf_page_slider_meta',
        'type'          => 'text',
        'default_value' => '',
        'label'         => esc_html__('Slider Shortcode', 'ambient'),
        'description'   => esc_html__('Paste your slider shortcode here', 'ambient'),
        'parent'        => $general_meta_box
    )
);

$eltdf_content_padding_group = ambient_elated_add_admin_group(array(
    'name'        => 'content_padding_group',
    'title'       => esc_html__('Content Style', 'ambient'),
    'description' => esc_html__('Define styles for Content area', 'ambient'),
    'parent'      => $general_meta_box
));

$eltdf_content_padding_row = ambient_elated_add_admin_row(array(
    'name'   => 'eltdf_content_padding_row',
    'next'   => true,
    'parent' => $eltdf_content_padding_group
));

ambient_elated_create_meta_box_field(
    array(
        'name'          => 'eltdf_page_content_top_padding',
        'type'          => 'textsimple',
        'default_value' => '',
        'label'         => esc_html__('Content Top Padding', 'ambient'),
        'parent'        => $eltdf_content_padding_row,
        'args'          => array(
            'suffix' => 'px'
        )
    )
);

ambient_elated_create_meta_box_field(
    array(
        'name'          => 'eltdf_page_transition_fadeout_meta',
        'type'          => 'select',
        'default_value' => '',
        'label'         => esc_html__('Enable Fade Out Animation', 'ambient'),
        'description'   => esc_html__('Enabling this option will turn on fade out animation when leaving page', 'ambient'),
        'options'       => array(
            ''    => esc_html__('Default', 'ambient'),
            'yes' => esc_html__('Yes', 'ambient'),
            'no'  => esc_html__('No', 'ambient'),
        ),
        'parent'        => $page_transitions_container_meta

    )
);

ambient_elated_create_meta_box_field(
    array(
        'name'    => 'eltdf_page_content_top_padding_mobile',
        'type'    => 'selectsimple',
        'label'   => esc_html__('Set this top padding for mobile header', 'ambient'),
        'parent'  => $eltdf_content_padding_row,
        'options' => ambient_elated_get_yes_no_select_array(false)
    )
);

ambient_elated_create_meta_box_field(
    array(
        'name'        => 'eltdf_page_comments_meta',
        'type'        => 'select',
        'label'       => esc_html__('Show Comments', 'ambient'),
        'description' => esc_html__('Enabling this option will show comments on your page', 'ambient'),
        'parent'      => $general_meta_box,
        'options'     => ambient_elated_get_yes_no_select_array()
    )
);

ambient_elated_create_meta_box_field(
	array(
		'name'          => 'eltdf_boxed_meta',
		'type'          => 'select',
		'default_value' => '',
		'label'         => esc_html__('Boxed Layout', 'ambient'),
		'parent'        => $general_meta_box,
		'options'     => array(
			'' => '',
			'yes' => esc_html__('Yes', 'ambient'),
			'no' => esc_html__('No', 'ambient'),
		),
		'args'          => array(
			"dependence" => true,
			'show' => array(
				'' => '',
				'yes' => '#eltdf_eltdf_boxed_container_meta',
				'no' => '',

			),
			'hide' => array(
				'' => '#eltdf_eltdf_boxed_container_meta',
				'yes' => '',
				'no' => '#eltdf_eltdf_boxed_container_meta',
			)
		)
	)
);

$boxed_container = ambient_elated_add_admin_container(
	array(
		'parent'            => $general_meta_box,
		'name'              => 'eltdf_boxed_container_meta',
		'hidden_property'   => 'eltdf_boxed_meta',
		'hidden_values'     => array('','no')
	)
);

ambient_elated_create_meta_box_field(
	array(
		'name'        => 'eltdf_page_background_color_in_box_meta',
		'type'        => 'color',
		'label'       => esc_html__('Page Background Color', 'ambient'),
		'description' => esc_html__('Choose the page background color outside box.', 'ambient'),
		'parent'      => $boxed_container
	)
);

ambient_elated_create_meta_box_field(
	array(
		'name'        => 'eltdf_boxed_background_image_meta',
		'type'        => 'image',
		'label'       => esc_html__('Background Image', 'ambient'),
		'description' => esc_html__('Choose an image to be displayed in background', 'ambient'),
		'parent'      => $boxed_container,
	)
);

ambient_elated_create_meta_box_field(
	array(
		'name'        => 'eltdf_boxed_pattern_background_image_meta',
		'type'        => 'image',
		'label'       => esc_html__('Background Pattern', 'ambient'),
		'description' => esc_html__('Choose an image to be used as background pattern', 'ambient'),
		'parent'      => $boxed_container
	)
);

ambient_elated_create_meta_box_field(
	array(
		'name'          => 'eltdf_boxed_background_image_attachment_meta',
		'type'          => 'select',
		'default_value' => 'fixed',
		'label'         => esc_html__('Background Image Attachment', 'ambient'),
		'description'   => esc_html__('Choose background image attachment if background image option is set', 'ambient'),
		'parent'        => $boxed_container,
		'options'       => array(
			'fixed'  => esc_html__('Fixed', 'ambient'),
			'scroll' => esc_html__('Scroll', 'ambient')
		)
	)
);