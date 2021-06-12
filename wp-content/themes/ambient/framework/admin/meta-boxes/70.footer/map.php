<?php

$footer_meta_box = ambient_elated_create_meta_box(
    array(
        'scope' => array('page', 'portfolio-item', 'post'),
        'title' => esc_html__('Footer', 'ambient'),
        'name'  => 'footer_meta'
    )
);

ambient_elated_create_meta_box_field(
    array(
        'name'          => 'eltdf_disable_footer_meta',
        'type'          => 'yesno',
        'default_value' => 'no',
        'label'         => esc_html__('Disable Footer for this Page', 'ambient'),
        'description'   => esc_html__('Enabling this option will hide footer on this page', 'ambient'),
        'parent'        => $footer_meta_box
    )
);

ambient_elated_create_meta_box_field(
    array(
        'name'            => 'eltdf_footer_background_image_meta',
        'type'            => 'image',
        'label'           => esc_html__('Background Image', 'ambient'),
        'description'     => esc_html__('Choose Background Image for Footer Area on this page', 'ambient'),
        'parent'          => $footer_meta_box,
        'hidden_property' => 'eltdf_enable_footer_background_image_meta',
        'hidden_value'    => 'yes'
    )
);

ambient_elated_create_meta_box_field(
    array(
        'name'          => 'eltdf_show_footer_top_meta',
        'type'          => 'select',
        'default_value' => '',
        'label'         => esc_html__('Enable Top Footer Area', 'ambient'),
        'description'   => esc_html__('Disabling this option will hide top footer area on this page', 'ambient'),
        'parent'        => $footer_meta_box,
        'options'       => ambient_elated_get_yes_no_select_array()
    )
);

ambient_elated_create_meta_box_field(
    array(
        'name'          => 'eltdf_show_footer_bottom_meta',
        'type'          => 'select',
        'default_value' => '',
        'label'         => esc_html__('Enable Bottom Footer Area', 'ambient'),
        'description'   => esc_html__('Disabling this option will hide bottom footer area on this page', 'ambient'),
        'parent'        => $footer_meta_box,
        'options'       => ambient_elated_get_yes_no_select_array()
    )
);