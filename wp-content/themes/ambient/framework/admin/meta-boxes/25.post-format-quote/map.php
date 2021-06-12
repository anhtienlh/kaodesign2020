<?php

$quote_post_format_meta_box = ambient_elated_create_meta_box(
	array(
		'scope' =>	array('post'),
		'title' => esc_html__('Quote Post Format', 'ambient'),
		'name' 	=> 'post_format_quote_meta'
	)
);

ambient_elated_create_meta_box_field(
	array(
		'name'        => 'eltdf_post_quote_text_meta',
		'type'        => 'text',
		'label'       => esc_html__('Quote Text', 'ambient'),
		'description' => esc_html__('Enter Quote text', 'ambient'),
		'parent'      => $quote_post_format_meta_box,

	)
);

ambient_elated_create_meta_box_field(
	array(
		'name'        => 'eltdf_post_quote_author_meta',
		'type'        => 'text',
		'label'       => esc_html__('Quote Author', 'ambient'),
		'description' => esc_html__('Enter Quote author', 'ambient'),
		'parent'      => $quote_post_format_meta_box,
	)
);