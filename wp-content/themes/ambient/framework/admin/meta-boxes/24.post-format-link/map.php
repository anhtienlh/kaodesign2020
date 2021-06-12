<?php

$link_post_format_meta_box = ambient_elated_create_meta_box(
	array(
		'scope' => array('post'),
		'title' => esc_html__('Link Post Format', 'ambient'),
		'name' => 'post_format_link_meta'
	)
);

ambient_elated_create_meta_box_field(
	array(
		'name'        => 'eltdf_post_link_link_meta',
		'type'        => 'text',
		'label'       => esc_html__('Link', 'ambient'),
		'description' => esc_html__('Enter link', 'ambient'),
		'parent'      => $link_post_format_meta_box,

	)
);

