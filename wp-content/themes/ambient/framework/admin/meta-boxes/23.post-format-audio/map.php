<?php

$audio_post_format_meta_box = ambient_elated_create_meta_box(
	array(
		'scope' =>	array('post'),
		'title' => esc_html__('Audio Post Format', 'ambient'),
		'name' 	=> 'post_format_audio_meta'
	)
);

ambient_elated_create_meta_box_field(
	array(
		'name'        => 'eltdf_post_audio_link_meta',
		'type'        => 'text',
		'label'       => esc_html__('Link', 'ambient'),
		'description' => esc_html__('Enter audion link', 'ambient'),
		'parent'      => $audio_post_format_meta_box,
	)
);