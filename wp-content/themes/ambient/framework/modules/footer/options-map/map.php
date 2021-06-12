<?php

if(!function_exists('ambient_elated_footer_options_map')) {
    /**
     * Add footer options
     */
    function ambient_elated_footer_options_map() {

        ambient_elated_add_admin_page(
            array(
                'slug'  => '_footer_page',
                'title' => esc_html__('Footer', 'ambient'),
                'icon'  => 'fa fa-sort-amount-asc'
            )
        );

        $footer_panel = ambient_elated_add_admin_panel(
            array(
                'title' => esc_html__('Footer', 'ambient'),
                'name'  => 'footer',
                'page'  => '_footer_page'
            )
        );

        ambient_elated_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'footer_in_grid',
                'default_value' => 'no',
                'label'         => esc_html__('Footer in Grid', 'ambient'),
                'description'   => esc_html__('Enabling this option will place Footer content in grid', 'ambient'),
                'parent'        => $footer_panel,
            )
        );

        ambient_elated_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'show_footer_top',
                'default_value' => 'yes',
                'label'         => esc_html__('Show Footer Top', 'ambient'),
                'description'   => esc_html__('Enabling this option will show Footer Top area', 'ambient'),
                'args'          => array(
                    'dependence'             => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#eltdf_show_footer_top_container'
                ),
                'parent'        => $footer_panel,
            )
        );

        $show_footer_top_container = ambient_elated_add_admin_container(
            array(
                'name'            => 'show_footer_top_container',
                'hidden_property' => 'show_footer_top',
                'hidden_value'    => 'no',
                'parent'          => $footer_panel
            )
        );

        ambient_elated_add_admin_field(
            array(
                'type'          => 'select',
                'name'          => 'footer_top_columns',
                'default_value' => '4',
                'label'         => esc_html__('Footer Top Columns', 'ambient'),
                'description'   => esc_html__('Choose number of columns for Footer Top area', 'ambient'),
                'options'       => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '3(25%+25%+50%)',
                    '6' => '3(50%+25%+25%)'
                ),
                'parent'        => $show_footer_top_container,
            )
        );

        ambient_elated_add_admin_field(
            array(
                'type'          => 'select',
                'name'          => 'footer_top_columns_alignment',
                'default_value' => '',
                'label'         => esc_html__('Footer Top Columns Alignment', 'ambient'),
                'description'   => esc_html__('Text Alignment in Footer Columns', 'ambient'),
                'options'       => array(
                    ''       => esc_html__('Default', 'ambient'),
                    'left'   => esc_html__('Left', 'ambient'),
                    'center' => esc_html__('Center', 'ambient'),
                    'right'  => esc_html__('Right', 'ambient')
                ),
                'parent'        => $show_footer_top_container,
            )
        );

        ambient_elated_add_admin_field(array(
            'name'        => 'footer_top_background_color',
            'type'        => 'color',
            'label'       => esc_html__('Background Color', 'ambient'),
            'description' => esc_html__('Set background color for top footer area', 'ambient'),
            'parent'      => $show_footer_top_container
        ));

        ambient_elated_add_admin_field(
            array(
                'name'        => 'footer_background_image',
                'type'        => 'image',
                'label'       => esc_html__('Background Image', 'ambient'),
                'description' => esc_html__('Choose Background Image for Footer Area', 'ambient'),
                'parent'      => $footer_panel
            )
        );

        ambient_elated_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'show_footer_bottom',
                'default_value' => 'yes',
                'label'         => esc_html__('Show Footer Bottom', 'ambient'),
                'description'   => esc_html__('Enabling this option will show Footer Bottom area', 'ambient'),
                'args'          => array(
                    'dependence'             => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#eltdf_show_footer_bottom_container'
                ),
                'parent'        => $footer_panel,
            )
        );

        $show_footer_bottom_container = ambient_elated_add_admin_container(
            array(
                'name'            => 'show_footer_bottom_container',
                'hidden_property' => 'show_footer_bottom',
                'hidden_value'    => 'no',
                'parent'          => $footer_panel
            )
        );

        ambient_elated_add_admin_field(
            array(
                'type'          => 'select',
                'name'          => 'footer_bottom_columns',
                'default_value' => '4',
                'label'         => esc_html__('Footer Bottom Columns', 'ambient'),
                'description'   => esc_html__('Choose number of columns for Footer Bottom area', 'ambient'),
                'options'       => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3'
                ),
                'parent'        => $show_footer_bottom_container,
            )
        );

        ambient_elated_add_admin_field(
            array(
                'type'          => 'select',
                'name'          => 'footer_bottom_columns_alignment',
                'default_value' => '',
                'label'         => esc_html__('Footer Bottom Columns Alignment', 'ambient'),
                'description'   => esc_html__('Text Alignment in Footer Columns', 'ambient'),
                'options'       => array(
                    ''       => esc_html__('Default', 'ambient'),
                    'left'   => esc_html__('Left', 'ambient'),
                    'center' => esc_html__('Center', 'ambient'),
                    'right'  => esc_html__('Right', 'ambient')
                ),
                'parent'        => $show_footer_bottom_container,
            )
        );

        ambient_elated_add_admin_field(array(
            'name'        => 'footer_bottom_height',
            'type'        => 'text',
            'label'       => esc_html__('Height', 'ambient'),
            'description' => esc_html__('Enter footer bottom bar height (Default is 60)', 'ambient'),
            'parent'      => $show_footer_bottom_container,
            'args'        => array(
                'col_width' => 2,
                'suffix'    => 'px'
            )
        ));

        ambient_elated_add_admin_field(array(
            'name'        => 'footer_bottom_background_color',
            'type'        => 'color',
            'label'       => esc_html__('Background Color', 'ambient'),
            'description' => esc_html__('Set background color for bottom footer area', 'ambient'),
            'parent'      => $show_footer_bottom_container
        ));

        ambient_elated_add_admin_field(array(
            'name'        => 'footer_bottom_border_top_color',
            'type'        => 'color',
            'label'       => esc_html__('Border Top Color', 'ambient'),
            'description' => esc_html__('Set border top color for bottom footer area', 'ambient'),
            'parent'      => $show_footer_bottom_container
        ));
    }

    add_action('ambient_elated_options_map', 'ambient_elated_footer_options_map', 9);
}