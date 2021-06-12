<?php

if (!function_exists('ambient_elated_woocommerce_options_map')) {

    /**
     * Add Woocommerce options page
     */
    function ambient_elated_woocommerce_options_map() {

        ambient_elated_add_admin_page(
            array(
                'slug'  => '_woocommerce_page',
                'title' => esc_html__('Woocommerce', 'ambient'),
                'icon'  => 'fa fa-shopping-cart'
            )
        );

        /**
         * Product List Settings
         */
        $panel_product_list = ambient_elated_add_admin_panel(
            array(
                'page'  => '_woocommerce_page',
                'name'  => 'panel_product_list',
                'title' => esc_html__('Product List', 'ambient')
            )
        );

        ambient_elated_add_admin_field(array(
            'name'          => 'eltdf_woo_product_list_columns',
            'type'          => 'select',
            'label'         => esc_html__('Product List Columns', 'ambient'),
            'default_value' => 'eltdf-woocommerce-columns-4',
            'description'   => esc_html__('Choose number of columns for product listing and related products on single product', 'ambient'),
            'options'       => array(
                'eltdf-woocommerce-columns-3' => esc_html__('3 Columns (2 with sidebar)', 'ambient'),
                'eltdf-woocommerce-columns-4' => esc_html__('4 Columns (3 with sidebar)', 'ambient')
            ),
            'parent'        => $panel_product_list,
        ));

        ambient_elated_add_admin_field(array(
            'name'          => 'eltdf_woo_product_list_columns_space',
            'type'          => 'select',
            'label'         => esc_html__('Space Between Products', 'ambient'),
            'default_value' => 'eltdf-woo-normal-space',
            'description'   => esc_html__('Select space between products for product listing and related products on single product', 'ambient'),
            'options'       => array(
                'eltdf-woo-normal-space' => esc_html__('Normal', 'ambient'),
                'eltdf-woo-small-space'  => esc_html__('Small', 'ambient'),
                'eltdf-woo-no-space'     => esc_html__('No Space', 'ambient')
            ),
            'parent'        => $panel_product_list,
        ));

        ambient_elated_add_admin_field(array(
            'name'          => 'eltdf_woo_product_list_info_position',
            'type'          => 'select',
            'label'         => esc_html__('Product Info Position', 'ambient'),
            'default_value' => 'info_below_image',
            'description'   => esc_html__('Select product info position for product listing and related products on single product', 'ambient'),
            'options'       => array(
                'info_below_image'    => esc_html__('Info Below Image', 'ambient'),
                'info_on_image_hover' => esc_html__('Info On Image Hover', 'ambient')
            ),
            'parent'        => $panel_product_list,
        ));

        ambient_elated_add_admin_field(array(
            'name'          => 'eltdf_woo_products_per_page',
            'type'          => 'text',
            'label'         => esc_html__('Number of products per page', 'ambient'),
            'default_value' => '',
            'description'   => esc_html__('Set number of products on shop page', 'ambient'),
            'parent'        => $panel_product_list,
            'args'          => array(
                'col_width' => 3
            )
        ));

        ambient_elated_add_admin_field(array(
            'name'          => 'eltdf_products_list_title_tag',
            'type'          => 'select',
            'label'         => esc_html__('Products Title Tag', 'ambient'),
            'default_value' => 'h4',
            'description'   => '',
            'options'       => ambient_elated_get_title_tag(),
            'parent'        => $panel_product_list,
        ));

        /**
         * Single Product Settings
         */
        $panel_single_product = ambient_elated_add_admin_panel(
            array(
                'page'  => '_woocommerce_page',
                'name'  => 'panel_single_product',
                'title' => esc_html__('Single Product', 'ambient')
            )
        );

        ambient_elated_add_admin_field(array(
            'name'          => 'single_product_layout',
            'type'          => 'select',
            'label'         => esc_html__('Single Product Layout', 'ambient'),
            'default_value' => 'standard',
            'description'   => esc_html__('Choose layout for single product pages', 'ambient'),
            'options'       => array(
                'standard'    => esc_html__('Standard', 'ambient'),
                'sticky-info' => esc_html__('Sticky Info', 'ambient')
            ),
            'parent'        => $panel_single_product,
            'args'          => array(
                'dependence' => true,
                'show'       => array(
                    'standard'    => '#eltdf_panel_single_product_standard',
                    'sticky-info' => '#eltdf_panel_single_product_sticky_info'
                ),
                'hide'       => array(
                    'standard'    => '#eltdf_panel_single_product_sticky_info',
                    'sticky-info' => '#eltdf_panel_single_product_standard'
                )
            )
        ));

        /********************** Standard - Single Product Layout **********************/

        $panel_single_product_standard = ambient_elated_add_admin_container(array(
            'name'            => 'panel_single_product_standard',
            'parent'          => $panel_single_product,
            'hidden_property' => 'single_product_layout',
            'hidden_values'   => array(
                'sticky-info'
            )
        ));

        ambient_elated_add_admin_field(array(
            'name'          => 'woo_enable_single_thumb_featured_switch',
            'type'          => 'yesno',
            'label'         => esc_html__('Switch Featured Image on Thumbnail Click', 'ambient'),
            'description'   => esc_html__('Enabling this option will switch featured image with thumbnail image on thumbnail click', 'ambient'),
            'default_value' => 'yes',
            'parent'        => $panel_single_product_standard
        ));

        ambient_elated_add_admin_field(array(
            'name'          => 'woo_set_thumb_images_position',
            'type'          => 'select',
            'label'         => esc_html__('Set Thumbnail Images Position', 'ambient'),
            'default_value' => 'below-image',
            'options'       => array(
                'below-image'  => esc_html__('Below Featured Image', 'ambient'),
                'on-left-side' => esc_html__('On The Left Side Of Featured Image', 'ambient')
            ),
            'parent'        => $panel_single_product_standard
        ));

        ambient_elated_add_admin_field(
            array(
                'type'          => 'select',
                'name'          => 'woo_enable_single_product_zoom_image',
                'default_value' => 'no',
                'label'         => esc_html__('Enable Zoom Maginfier', 'ambient'),
                'description'   => esc_html__('Enabling this option will show magnifier image on featured image hover', 'ambient'),
                'parent'        => $panel_single_product_standard,
                'options'       => array(
                    'no'  => esc_html__('No', 'ambient'),
                    'yes' => esc_html__('Yes', 'ambient'),
                ),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

        ambient_elated_add_admin_field(
            array(
                'name'          => 'woo_set_single_images_behavior',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__('Set Images Behavior', 'ambient'),
                'options'       => array(
                    ''             => esc_html__('No Behavior', 'ambient'),
                    'pretty-photo' => esc_html__('Pretty Photo Lightbox', 'ambient'),
                    'photo-swipe'  => esc_html__('Photo Swipe Lightbox', 'ambient')
                ),
                'parent'        => $panel_single_product_standard
            )
        );


        /********************** Standard - Single Product Layout **********************/

        /********************** Sticky Info - Single Product Layout **********************/

        $panel_single_product_sticky_info = ambient_elated_add_admin_container(array(
            'name'            => 'panel_single_product_sticky_info',
            'parent'          => $panel_single_product,
            'hidden_property' => 'single_product_layout',
            'hidden_values'   => array(
                'standard'
            )
        ));

        ambient_elated_add_admin_field(array(
            'name'          => 'woo_enable_single_sticky_content',
            'type'          => 'yesno',
            'label'         => esc_html__('Sticky Side Text', 'ambient'),
            'description'   => esc_html__('Enabling this option will make side text sticky on Single Product pages', 'ambient'),
            'default_value' => 'yes',
            'parent'        => $panel_single_product_sticky_info
        ));

        /********************** Sticky Info - Single Product Layout **********************/

        ambient_elated_add_admin_field(array(
            'name'          => 'eltdf_single_product_title_tag',
            'type'          => 'select',
            'label'         => esc_html__('Single Product Title Tag', 'ambient'),
            'default_value' => 'h2',
            'description'   => '',
            'options'       => ambient_elated_get_title_tag(),
            'parent'        => $panel_single_product,
        ));

        /**
         * DropDown Cart Widget Settings
         */
        $panel_dropdown_cart = ambient_elated_add_admin_panel(
            array(
                'page'  => '_woocommerce_page',
                'name'  => 'panel_dropdown_cart',
                'title' => esc_html__('Dropdown Cart Widget', 'ambient')
            )
        );

        ambient_elated_add_admin_field(array(
            'name'          => 'eltdf_woo_dropdown_cart_description',
            'type'          => 'text',
            'label'         => esc_html__('Cart Description', 'ambient'),
            'default_value' => '',
            'description'   => esc_html__('Enter dropdown cart description', 'ambient'),
            'parent'        => $panel_dropdown_cart
        ));
    }

    add_action('ambient_elated_options_map', 'ambient_elated_woocommerce_options_map', 16);
}