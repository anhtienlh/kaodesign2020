<?php

$video_post_format_meta_box = ambient_elated_create_meta_box(
	array(
		'scope' =>	array('post'),
		'title' => esc_html__('Video Post Format', 'ambient'),
		'name' 	=> 'post_format_video_meta'
	)
);

ambient_elated_create_meta_box_field(
	array(
		'name'        => 'eltdf_video_type_meta',
		'type'        => 'select',
		'label'       => esc_html__('Video Type', 'ambient'),
		'description' => esc_html__('Choose video type', 'ambient'),
		'parent'      => $video_post_format_meta_box,
		'default_value' => 'social_networks',
		'options'     => array(
			'social_networks' => esc_html__('Youtube or Vimeo', 'ambient'),
			'self' => esc_html__('Self Hosted', 'ambient')
		),
		'args' => array(
			'dependence' => true,
			'hide' => array(
				'social_networks' => '#eltdf_eltdf_video_self_hosted_container',
				'self' => '#eltdf_eltdf_video_embedded_container'
			),
			'show' => array(
				'social_networks' => '#eltdf_eltdf_video_embedded_container',
				'self' => '#eltdf_eltdf_video_self_hosted_container')
		)
	)
);

$eltdf_video_embedded_container = ambient_elated_add_admin_container(
	array(
		'parent' => $video_post_format_meta_box,
		'name' => 'eltdf_video_embedded_container',
		'hidden_property' => 'eltdf_video_type_meta',
		'hidden_value' => 'self'
	)
);

$eltdf_video_self_hosted_container = ambient_elated_add_admin_container(
	array(
		'parent' => $video_post_format_meta_box,
		'name' => 'eltdf_video_self_hosted_container',
		'hidden_property' => 'eltdf_video_type_meta',
		'hidden_value' => 'social_networks'
	)
);

ambient_elated_create_meta_box_field(
	array(
		'name'        => 'eltdf_post_video_link_meta',
		'type'        => 'text',
		'label'       => esc_html__('Video URL', 'ambient'),
		'description' => esc_html__('Enter Video URL', 'ambient'),
		'parent'      => $eltdf_video_embedded_container,
	)
);

ambient_elated_create_meta_box_field(
	array(
		'name'        => 'eltdf_post_video_image_meta',
		'type'        => 'image',
		'label'       => esc_html__('Video Image', 'ambient'),
		'description' => esc_html__('Upload video image', 'ambient'),
		'parent'      => $eltdf_video_self_hosted_container,
	)
);

ambient_elated_create_meta_box_field(
	array(
		'name'        => 'eltdf_post_video_mp4_link_meta',
		'type'        => 'text',
		'label'       => esc_html__('Video MP4', 'ambient'),
		'description' => esc_html__('Enter video URL for MP4 format', 'ambient'),
		'parent'      => $eltdf_video_self_hosted_container,
	)
);