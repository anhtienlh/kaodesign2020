<?php

if(!function_exists('ambient_elated_map_portfolio_settings')) {
    function ambient_elated_map_portfolio_settings() {
        $meta_box = ambient_elated_create_meta_box(array(
            'scope' => 'portfolio-item',
            'title' => esc_html__('Portfolio Settings', 'ambient'),
            'name'  => 'portfolio_settings_meta_box'
        ));

        ambient_elated_create_meta_box_field(array(
            'name'        => 'eltdf_portfolio_single_template_meta',
            'type'        => 'select',
            'label'       => esc_html__('Portfolio Type', 'ambient'),
            'description' => esc_html__('Choose a default type for Single Project pages', 'ambient'),
            'parent'      => $meta_box,
            'options'     => array(
                ''                  => esc_html__('Default', 'ambient'),
                'small-images'      => esc_html__('Portfolio Small Images', 'ambient'),
                'small-slider'      => esc_html__('Portfolio Small Slider', 'ambient'),
                'big-images'        => esc_html__('Portfolio Big Images', 'ambient'),
                'big-slider'        => esc_html__('Portfolio Big Slider', 'ambient'),
                'custom'            => esc_html__('Portfolio Custom', 'ambient'),
                'full-width-custom' => esc_html__('Portfolio Full Width Custom', 'ambient'),
                'gallery'           => esc_html__('Portfolio Gallery', 'ambient')
            )
        ));

	    ambient_elated_create_meta_box_field(array(
		    'name'        => 'portfolio_info_top_padding',
		    'type'        => 'text',
		    'label'       => esc_html__('Portfolio Info Top Padding', 'ambient'),
		    'description' => esc_html__('Set top padding for portfolio info elements holder. This option works only for Portfolio Big Images, Big Slider and Gallery portfolio types', 'ambient'),
		    'parent'      => $meta_box,
		    'args'        => array(
			    'col_width' => 3,
			    'suffix' => 'px'
		    )
	    ));

        $all_pages = array();
        $pages     = get_pages();
        foreach($pages as $page) {
            $all_pages[$page->ID] = $page->post_title;
        }

        ambient_elated_create_meta_box_field(array(
            'name'        => 'portfolio_single_back_to_link',
            'type'        => 'select',
            'label'       => esc_html__('"Back To" Link', 'ambient'),
            'description' => esc_html__('Choose "Back To" page to link from portfolio Single Project page', 'ambient'),
            'parent'      => $meta_box,
            'options'     => $all_pages
        ));

        ambient_elated_create_meta_box_field(array(
            'name'        => 'portfolio_external_link',
            'type'        => 'text',
            'label'       => esc_html__('Portfolio External Link', 'ambient'),
            'description' => esc_html__('Enter URL to link from Portfolio List page', 'ambient'),
            'parent'      => $meta_box,
            'args'        => array(
                'col_width' => 3
            )
        ));
	
	    ambient_elated_create_meta_box_field(
		    array(
			    'name' => 'eltdf_portfolio_featured_image_meta',
			    'type' => 'image',
			    'label' => esc_html__('Featured Image', 'ambient'),
			    'description' => esc_html__('Choose an image for Portfolio Lists shortcode where Hover Type option is Switch Featured Images', 'ambient'),
			    'parent' => $meta_box
		    )
	    );

        ambient_elated_create_meta_box_field(array(
            'name'        => 'portfolio_masonry_dimenisions',
            'type'        => 'select',
            'label'       => esc_html__('Dimensions for Masonry', 'ambient'),
            'description' => esc_html__('Choose image layout when it appears in Masonry type portfolio lists', 'ambient'),
            'parent'      => $meta_box,
            'options'     => array(
                ''                   => esc_html__('Default', 'ambient'),
                'small'              => esc_html__('Small', 'ambient'),
                'large_width'        => esc_html__('Large Width', 'ambient'),
                'large_height'       => esc_html__('Large Height', 'ambient'),
                'large_width_height' => esc_html__('Large Width/Height', 'ambient')
            )
        ));
    }

    add_action('ambient_elated_meta_boxes_map', 'ambient_elated_map_portfolio_settings');
}