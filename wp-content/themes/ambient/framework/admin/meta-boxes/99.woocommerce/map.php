<?php

if(ambient_elated_is_woocommerce_installed()){
	
	$woo_single_layout = ambient_elated_options()->getOptionValue('single_product_layout');
	$woo_single_layout_hide = '';
	$woo_single_layout_show = '#eltdf_eltdf_show_standard_layout_container';
	
	if($woo_single_layout !== 'standard') {
		$woo_single_layout_hide = '#eltdf_eltdf_show_standard_layout_container';
		$woo_single_layout_show = '';
	}

    $woocommerce_meta_box = ambient_elated_create_meta_box(
        array(
            'scope' => array('product'),
            'title' => esc_html__('Product Meta', 'ambient'),
            'name' => 'woo_product_meta'
        )
    );
	
		ambient_elated_create_meta_box_field(array(
			'name'        => 'eltdf_single_product_layout_meta',
			'type'        => 'select',
			'label'       => esc_html__('Single Product Layout', 'ambient'),
			'description' => esc_html__('Select single product page layout', 'ambient'),
			'parent'      => $woocommerce_meta_box,
			'options'     => array(
				''             => esc_html__('Default', 'ambient'),
				'standard'     => esc_html__('Standard', 'ambient'),
				'sticky-info'  => esc_html__('Sticky Info', 'ambient')
			),
			'args' => array(
				'dependence' => true,
				'hide' => array(
					'' => $woo_single_layout_hide,
					'standard' => '',
					'sticky-info' => '#eltdf_eltdf_show_standard_layout_container'
				),
				'show' => array(
					'' => $woo_single_layout_show,
					'standard' => '#eltdf_eltdf_show_standard_layout_container',
					'sticky-info' => ''
				)
			)
		));
		
			$show_standard_layout_container = ambient_elated_add_admin_container(
				array(
					'parent' => $woocommerce_meta_box,
					'name' => 'eltdf_show_standard_layout_container',
					'hidden_property' => 'eltdf_single_product_layout_meta',
					'hidden_values' => array(
						$woo_single_layout_hide,
						'sticky-info'
					),
				)
			);
		
				ambient_elated_create_meta_box_field(array(
					'name'          => 'eltdf_woo_enable_single_thumb_featured_switch_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__('Switch Featured Image on Thumbnail Click', 'ambient'),
					'description'   => esc_html__('Enabling this option will switch featured image with thumbnail image on thumbnail click', 'ambient'),
					'parent'        => $show_standard_layout_container,
					'options'       => ambient_elated_get_yes_no_select_array()
				));
				
				ambient_elated_create_meta_box_field(array(
					'name'          => 'eltdf_woo_set_thumb_images_position_meta',
					'type'          => 'select',
					'label'         => esc_html__('Set Thumbnail Images Position', 'ambient'),
					'options'		=> array(
						''             => esc_html__('Default', 'ambient'),
						'below-image'  => esc_html__('Below Featured Image', 'ambient'),
						'on-left-side' => esc_html__('On The Left Side Of Featured Image', 'ambient')
					),
					'parent'        => $show_standard_layout_container
				));
	
		ambient_elated_create_meta_box_field(array(
			'name'        => 'eltdf_product_hover_featured_image_meta',
			'type'        => 'image',
			'label'       => esc_html__('Hover Featured Image', 'ambient'),
			'description' => esc_html__('Choose an switched featured image for Product Lists', 'ambient'),
			'parent'      => $woocommerce_meta_box
		));
	
		ambient_elated_create_meta_box_field(array(
			'name'        => 'eltdf_product_featured_image_size',
			'type'        => 'select',
			'label'       => esc_html__('Dimensions for Product List Shortcode', 'ambient'),
			'description' => esc_html__('Choose image layout when it appears in Elated Product List - Masonry layout shortcode', 'ambient'),
			'parent'      => $woocommerce_meta_box,
			'options'     => array(
				'eltdf-woo-image-normal-width' => esc_html__('Default', 'ambient'),
				'eltdf-woo-image-large-width'  => esc_html__('Large Width', 'ambient')
			)
		));
		
		ambient_elated_create_meta_box_field(
            array(
                'name' => 'eltdf_woo_show_title_area_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Show Title Area', 'ambient'),
                'description' => esc_html__('Disabling this option will turn off page title area', 'ambient'),
                'parent' => $woocommerce_meta_box,
                'options' => ambient_elated_get_yes_no_select_array()
            )
        );

        ambient_elated_create_meta_box_field(
            array(
                'name'        => 'eltdf_disable_page_content_top_padding_meta',
                'type'        => 'select',
                'label'       => esc_html__('Disable Content Top Padding', 'ambient'),
                'description' => esc_html__('Enabling this option will disable content top padding', 'ambient'),
                'parent'      => $woocommerce_meta_box,
                'options' => ambient_elated_get_yes_no_select_array()
            )
        ); 
}

