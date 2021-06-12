<?php

if ( ! function_exists('ambient_elated_page_options_map') ) {

    function ambient_elated_page_options_map() {

        ambient_elated_add_admin_page(
            array(
                'slug'  => '_page_page',
                'title' => esc_html__('Page', 'ambient'),
                'icon'  => 'fa fa-file-text-o'
            )
        );

        /***************** Page Layout - begin **********************/

            $panel_sidebar = ambient_elated_add_admin_panel(
                array(
                    'page'  => '_page_page',
                    'name'  => 'panel_sidebar',
                    'title' => esc_html__('Page Style', 'ambient')
                )
            );

            ambient_elated_add_admin_field(array(
                'name'        => 'page_sidebar_layout',
                'type'        => 'select',
                'label'       => esc_html__('Sidebar Layout', 'ambient'),
                'description' => esc_html__('Choose a sidebar layout for pages', 'ambient'),
                'default_value' => 'default',
                'parent'      => $panel_sidebar,
                'options'     => array(
                    'default'			=> esc_html__('No Sidebar', 'ambient'),
                    'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'ambient'),
                    'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'ambient'),
                    'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'ambient'),
                    'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'ambient')
                )
            ));
	
	        $ambient_elated_custom_sidebars = ambient_elated_get_custom_sidebars();
            if(count($ambient_elated_custom_sidebars) > 0) {
                ambient_elated_add_admin_field(array(
                    'name' => 'page_custom_sidebar',
                    'type' => 'selectblank',
                    'label' => esc_html__('Sidebar to Display', 'ambient'),
                    'description' => esc_html__('Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'ambient'),
                    'parent' => $panel_sidebar,
                    'options' => $ambient_elated_custom_sidebars
                ));
            }

            ambient_elated_add_admin_field(array(
                'name'        => 'page_show_comments',
                'type'        => 'yesno',
                'label'       => esc_html__('Show Comments', 'ambient'),
                'description' => esc_html__('Enabling this option will show comments on your page', 'ambient'),
                'default_value' => 'yes',
                'parent'      => $panel_sidebar
            ));

        /***************** Page Layout - end **********************/

        /***************** Content Layout - begin **********************/

            $panel_content = ambient_elated_add_admin_panel(
                array(
                    'page'  => '_page_page',
                    'name'  => 'panel_content',
                    'title' => esc_html__('Content Style', 'ambient')
                )
            );

            ambient_elated_add_admin_field(array(
                'type'          => 'text',
                'name'          => 'content_top_padding',
                'default_value' => '0',
                'label'         => esc_html__('Content Top Padding for Template in Full Width', 'ambient'),
                'description'   => esc_html__('Enter top padding for content area for templates in full width. If you set this value then it\'s important to set also Content top padding for mobile header value', 'ambient'),
                'args'          => array(
                    'suffix'    => 'px',
                    'col_width' => 3
                ),
                'parent'        => $panel_content
            ));

            ambient_elated_add_admin_field(array(
                'type'          => 'text',
                'name'          => 'content_top_padding_in_grid',
                'default_value' => '40',
	            'label'         => esc_html__('Content Top Padding for Templates in Grid', 'ambient'),
	            'description'   => esc_html__('Enter top padding for content area for Templates in grid. If you set this value then it\'s important to set also Content top padding for mobile header value', 'ambient'),
                'args'          => array(
                    'suffix'    => 'px',
                    'col_width' => 3
                ),
                'parent'        => $panel_content
            ));

            ambient_elated_add_admin_field(array(
                'type'          => 'text',
                'name'          => 'content_top_padding_mobile',
                'default_value' => '40',
	            'label'         => esc_html__('Content Top Padding for Mobile Header', 'ambient'),
	            'description'   => esc_html__('Enter top padding for content area for Mobile Header', 'ambient'),
                'args'          => array(
                    'suffix'    => 'px',
                    'col_width' => 3
                ),
                'parent'        => $panel_content
            ));

        /***************** Content Layout - end **********************/

    }

    add_action( 'ambient_elated_options_map', 'ambient_elated_page_options_map', 5);
}