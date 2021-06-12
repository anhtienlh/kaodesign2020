<?php

$testimonial_meta_box = ambient_elated_create_meta_box(
    array(
        'scope' => array('testimonials'),
        'title' => esc_html__('Testimonial', 'ambient'),
        'name' => 'testimonial_meta'
    )
);

    ambient_elated_create_meta_box_field(
        array(
            'name'        	=> 'eltdf_testimonial_title',
            'type'        	=> 'text',
            'label'       	=> esc_html__('Title', 'ambient'),
            'description' 	=> esc_html__('Enter testimonial title', 'ambient'),
            'parent'      	=> $testimonial_meta_box,
        )
    );

    ambient_elated_create_meta_box_field(
        array(
            'name'        	=> 'eltdf_testimonial_text',
            'type'        	=> 'text',
            'label'       	=> esc_html__('Text', 'ambient'),
            'description' 	=> esc_html__('Enter testimonial text', 'ambient'),
            'parent'      	=> $testimonial_meta_box,
        )
    );

    ambient_elated_create_meta_box_field(
        array(
            'name'        	=> 'eltdf_testimonial_author',
            'type'        	=> 'text',
            'label'       	=> esc_html__('Author', 'ambient'),
            'description' 	=> esc_html__('Enter author name', 'ambient'),
            'parent'      	=> $testimonial_meta_box,
        )
    );

    ambient_elated_create_meta_box_field(
        array(
            'name'        	=> 'eltdf_testimonial_author_position',
            'type'        	=> 'text',
            'label'       	=> esc_html__('Job Position', 'ambient'),
            'description' 	=> esc_html__('Enter job position', 'ambient'),
            'parent'      	=> $testimonial_meta_box,
        )
    );