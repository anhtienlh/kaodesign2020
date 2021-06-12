<?php

$gallery_post_format_meta_box = ambient_elated_create_meta_box(
	array(
		'scope' =>	array('post'),
		'title' => esc_html__('Gallery Post Format', 'ambient'),
		'name' 	=> 'post_format_gallery_meta'
	)
);

ambient_elated_add_multiple_images_field(
	array(
		'name'        => 'eltdf_post_gallery_images_meta',
		'label'       => esc_html__('Gallery Images', 'ambient'),
		'description' => esc_html__('Choose your gallery images', 'ambient'),
		'parent'      => $gallery_post_format_meta_box,
	)
);
