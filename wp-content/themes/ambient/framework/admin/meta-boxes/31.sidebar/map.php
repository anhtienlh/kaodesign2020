<?php

$ambient_elated_sidebar_meta_box = ambient_elated_create_meta_box(
    array(
        'scope' => array('page', 'portfolio-item', 'post'),
        'title' => esc_html__('Sidebar', 'ambient'),
        'name' => 'sidebar_meta'
    )
);

    ambient_elated_create_meta_box_field(
        array(
            'name'        => 'eltdf_sidebar_meta',
            'type'        => 'select',
            'label'       => esc_html__('Layout', 'ambient'),
            'description' => esc_html__('Choose the sidebar layout', 'ambient'),
            'parent'      => $ambient_elated_sidebar_meta_box,
            'options'     => array(
				''			        => esc_html__('Default', 'ambient'),
				'no-sidebar'		=> esc_html__('No Sidebar', 'ambient'),
				'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'ambient'),
				'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'ambient'),
				'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'ambient'),
				'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'ambient')
			)
        )
    );

	$ambient_elated_custom_sidebars = ambient_elated_get_custom_sidebars();
	if(count($ambient_elated_custom_sidebars) > 0) {
	    ambient_elated_create_meta_box_field(array(
	        'name' => 'eltdf_custom_sidebar_meta',
	        'type' => 'selectblank',
	        'label' => esc_html__('Choose Widget Area in Sidebar', 'ambient'),
	        'description' => esc_html__('Choose Custom Widget area to display in Sidebar"', 'ambient'),
	        'parent' => $ambient_elated_sidebar_meta_box,
	        'options' => $ambient_elated_custom_sidebars
	    ));
	}