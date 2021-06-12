<?php

if(!function_exists('ambient_elated_general_options_map')) {
    /**
     * General options page
     */
    function ambient_elated_general_options_map() {

        ambient_elated_add_admin_page(
            array(
                'slug'  => '',
                'title' => esc_html__('General', 'ambient'),
                'icon'  => 'fa fa-institution'
            )
        );

        $panel_design_style = ambient_elated_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_design_style',
                'title' => esc_html__('Design Style', 'ambient')
            )
        );

        ambient_elated_add_admin_field(
            array(
                'name'          => 'google_fonts',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Google Font Family', 'ambient'),
                'description'   => esc_html__('Choose a default Google font for your site', 'ambient'),
                'parent'        => $panel_design_style
            )
        );

        ambient_elated_add_admin_field(
            array(
                'name'          => 'additional_google_fonts',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Additional Google Fonts', 'ambient'),
                'parent'        => $panel_design_style,
                'args'          => array(
                    "dependence"             => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#eltdf_additional_google_fonts_container"
                )
            )
        );

        $additional_google_fonts_container = ambient_elated_add_admin_container(
            array(
                'parent'          => $panel_design_style,
                'name'            => 'additional_google_fonts_container',
                'hidden_property' => 'additional_google_fonts',
                'hidden_value'    => 'no'
            )
        );

        ambient_elated_add_admin_field(
            array(
                'name'          => 'additional_google_font1',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'ambient'),
                'description'   => esc_html__('Choose additional Google font for your site', 'ambient'),
                'parent'        => $additional_google_fonts_container
            )
        );

        ambient_elated_add_admin_field(
            array(
                'name'          => 'additional_google_font2',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'ambient'),
                'description'   => esc_html__('Choose additional Google font for your site', 'ambient'),
                'parent'        => $additional_google_fonts_container
            )
        );

        ambient_elated_add_admin_field(
            array(
                'name'          => 'additional_google_font3',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'ambient'),
                'description'   => esc_html__('Choose additional Google font for your site', 'ambient'),
                'parent'        => $additional_google_fonts_container
            )
        );

        ambient_elated_add_admin_field(
            array(
                'name'          => 'additional_google_font4',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'ambient'),
                'description'   => esc_html__('Choose additional Google font for your site', 'ambient'),
                'parent'        => $additional_google_fonts_container
            )
        );

        ambient_elated_add_admin_field(
            array(
                'name'          => 'additional_google_font5',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'ambient'),
                'description'   => esc_html__('Choose additional Google font for your site', 'ambient'),
                'parent'        => $additional_google_fonts_container
            )
        );

        ambient_elated_add_admin_field(
            array(
                'name'          => 'google_font_weight',
                'type'          => 'checkboxgroup',
                'default_value' => '',
                'label'         => esc_html__('Google Fonts Style & Weight', 'ambient'),
                'description'   => esc_html__('Choose a default Google font weights for your site. Impact on page load time', 'ambient'),
                'parent'        => $panel_design_style,
                'options'       => array(
                    '100'       => esc_html__('100 Thin', 'ambient'),
                    '100italic' => esc_html__('100 Thin Italic', 'ambient'),
                    '200'       => esc_html__('200 Extra-Light', 'ambient'),
                    '200italic' => esc_html__('200 Extra-Light Italic', 'ambient'),
                    '300'       => esc_html__('300 Light', 'ambient'),
                    '300italic' => esc_html__('300 Light Italic', 'ambient'),
                    '400'       => esc_html__('400 Regular', 'ambient'),
                    '400italic' => esc_html__('400 Regular Italic', 'ambient'),
                    '500'       => esc_html__('500 Medium', 'ambient'),
                    '500italic' => esc_html__('500 Medium Italic', 'ambient'),
                    '600'       => esc_html__('600 Semi-Bold', 'ambient'),
                    '600italic' => esc_html__('600 Semi-Bold Italic', 'ambient'),
                    '700'       => esc_html__('700 Bold', 'ambient'),
                    '700italic' => esc_html__('700 Bold Italic', 'ambient'),
                    '800'       => esc_html__('800 Extra-Bold', 'ambient'),
                    '800italic' => esc_html__('800 Extra-Bold Italic', 'ambient'),
                    '900'       => esc_html__('900 Ultra-Bold', 'ambient'),
                    '900italic' => esc_html__('900 Ultra-Bold Italic', 'ambient')
                )
            )
        );

        ambient_elated_add_admin_field(
            array(
                'name'          => 'google_font_subset',
                'type'          => 'checkboxgroup',
                'default_value' => '',
                'label'         => esc_html__('Google Fonts Subset', 'ambient'),
                'description'   => esc_html__('Choose a default Google font subsets for your site', 'ambient'),
                'parent'        => $panel_design_style,
                'options'       => array(
                    'latin'        => esc_html__('Latin', 'ambient'),
                    'latin-ext'    => esc_html__('Latin Extended', 'ambient'),
                    'cyrillic'     => esc_html__('Cyrillic', 'ambient'),
                    'cyrillic-ext' => esc_html__('Cyrillic Extended', 'ambient'),
                    'greek'        => esc_html__('Greek', 'ambient'),
                    'greek-ext'    => esc_html__('Greek Extended', 'ambient'),
                    'vietnamese'   => esc_html__('Vietnamese', 'ambient')
                )
            )
        );

        ambient_elated_add_admin_field(
            array(
                'name'        => 'first_color',
                'type'        => 'color',
                'label'       => esc_html__('First Main Color', 'ambient'),
                'description' => esc_html__('Choose the most dominant theme color. Default color is #00bbb3', 'ambient'),
                'parent'      => $panel_design_style
            )
        );

        ambient_elated_add_admin_field(
            array(
                'name'        => 'page_background_color',
                'type'        => 'color',
                'label'       => esc_html__('Page Background Color', 'ambient'),
                'description' => esc_html__('Choose the background color for page content. Default color is #ffffff', 'ambient'),
                'parent'      => $panel_design_style
            )
        );

        ambient_elated_add_admin_field(
            array(
                'name'        => 'selection_color',
                'type'        => 'color',
                'label'       => esc_html__('Text Selection Color', 'ambient'),
                'description' => esc_html__('Choose the color users see when selecting text', 'ambient'),
                'parent'      => $panel_design_style
            )
        );

        ambient_elated_add_admin_field(
            array(
                'name'          => 'boxed',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Boxed Layout', 'ambient'),
                'description'   => '',
                'parent'        => $panel_design_style,
                'args'          => array(
                    "dependence"             => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#eltdf_boxed_container"
                )
            )
        );

        $boxed_container = ambient_elated_add_admin_container(
            array(
                'parent'          => $panel_design_style,
                'name'            => 'boxed_container',
                'hidden_property' => 'boxed',
                'hidden_value'    => 'no'
            )
        );

        ambient_elated_add_admin_field(
            array(
                'name'        => 'page_background_color_in_box',
                'type'        => 'color',
                'label'       => esc_html__('Page Background Color', 'ambient'),
                'description' => esc_html__('Choose the page background color outside box', 'ambient'),
                'parent'      => $boxed_container
            )
        );

        ambient_elated_add_admin_field(
            array(
                'name'        => 'boxed_background_image',
                'type'        => 'image',
                'label'       => esc_html__('Background Image', 'ambient'),
                'description' => esc_html__('Choose an image to be displayed in background', 'ambient'),
                'parent'      => $boxed_container
            )
        );

        ambient_elated_add_admin_field(
            array(
                'name'        => 'boxed_pattern_background_image',
                'type'        => 'image',
                'label'       => esc_html__('Background Pattern', 'ambient'),
                'description' => esc_html__('Choose an image to be used as background pattern', 'ambient'),
                'parent'      => $boxed_container
            )
        );

        ambient_elated_add_admin_field(
            array(
                'name'          => 'boxed_background_image_attachment',
                'type'          => 'select',
                'default_value' => 'fixed',
                'label'         => esc_html__('Background Image Attachment', 'ambient'),
                'description'   => esc_html__('Choose background image attachment', 'ambient'),
                'parent'        => $boxed_container,
                'options'       => array(
                    'fixed'  => esc_html__('Fixed', 'ambient'),
                    'scroll' => esc_html__('Scroll', 'ambient')
                )
            )
        );

        ambient_elated_add_admin_field(
            array(
                'name'          => 'paspartu',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Passepartout', 'ambient'),
                'description'   => esc_html__('Enabling this option will display passepartout around site content', 'ambient'),
                'parent'        => $panel_design_style,
                'args'          => array(
                    "dependence"             => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#eltdf_paspartu_container"
                )
            )
        );

        $paspartu_container = ambient_elated_add_admin_container(
            array(
                'parent'          => $panel_design_style,
                'name'            => 'paspartu_container',
                'hidden_property' => 'paspartu',
                'hidden_value'    => 'no'
            )
        );

        ambient_elated_add_admin_field(
            array(
                'name'        => 'paspartu_color',
                'type'        => 'color',
                'label'       => esc_html__('Passepartout Color', 'ambient'),
                'description' => esc_html__('Choose passepartout color, default value is #ffffff', 'ambient'),
                'parent'      => $paspartu_container
            )
        );

        ambient_elated_add_admin_field(
            array(
                'name'        => 'paspartu_width',
                'type'        => 'text',
                'label'       => esc_html__('Passepartout Size', 'ambient'),
                'description' => esc_html__('Enter size amount for passepartout', 'ambient'),
                'parent'      => $paspartu_container,
                'args'        => array(
                    'col_width' => 2,
                    'suffix'    => '%'
                )
            )
        );

        ambient_elated_add_admin_field(
            array(
                'parent'        => $paspartu_container,
                'type'          => 'yesno',
                'default_value' => 'no',
                'name'          => 'disable_top_paspartu',
                'label'         => esc_html__('Disable Top Passepartout', 'ambient')
            )
        );

        ambient_elated_add_admin_field(
            array(
                'name'          => 'initial_content_width',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__('Initial Width of Content', 'ambient'),
                'description'   => esc_html__('Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'ambient'),
                'parent'        => $panel_design_style,
                'options'       => array(
                    'grid-1100' => esc_html__('1100px - default', 'ambient'),
                    'grid-1300' => esc_html__('1300px', 'ambient'),
                    'grid-1200' => esc_html__('1200px', 'ambient'),
                    'grid-1000' => esc_html__('1000px', 'ambient'),
                    'grid-800'  => esc_html__('800px', 'ambient')
                )
            )
        );

        $panel_settings = ambient_elated_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_settings',
                'title' => esc_html__('Settings', 'ambient')
            )
        );

        ambient_elated_add_admin_field(
            array(
                'name'          => 'smooth_page_transitions',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Smooth Page Transitions', 'ambient'),
                'description'   => esc_html__('Enabling this option will perform a smooth transition between pages when clicking on links', 'ambient'),
                'parent'        => $panel_settings,
                'args'          => array(
                    "dependence"             => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#eltdf_page_transitions_container"
                )
            )
        );

        $page_transitions_container = ambient_elated_add_admin_container(
            array(
                'parent'          => $panel_settings,
                'name'            => 'page_transitions_container',
                'hidden_property' => 'smooth_page_transitions',
                'hidden_value'    => 'no'
            )
        );

        ambient_elated_add_admin_field(
            array(
                'name'          => 'page_transition_preloader',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Enable Preloading Animation', 'ambient'),
                'description'   => esc_html__('Enabling this option will display an animated preloader while the page content is loading', 'ambient'),
                'parent'        => $page_transitions_container,
                'args'          => array(
                    "dependence"             => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#eltdf_page_transition_preloader_container"
                )
            )
        );

        $page_transition_preloader_container = ambient_elated_add_admin_container(
            array(
                'parent'          => $page_transitions_container,
                'name'            => 'page_transition_preloader_container',
                'hidden_property' => 'page_transition_preloader',
                'hidden_value'    => 'no'
            )
        );

        ambient_elated_add_admin_field(
            array(
                'name'   => 'smooth_pt_bgnd_color',
                'type'   => 'color',
                'label'  => esc_html__('Page Loader Background Color', 'ambient'),
                'parent' => $page_transition_preloader_container
            )
        );

        $group_pt_spinner_animation = ambient_elated_add_admin_group(array(
            'name'        => 'group_pt_spinner_animation',
            'title'       => esc_html__('Loader Style', 'ambient'),
            'description' => esc_html__('Define styles for loader spinner animation', 'ambient'),
            'parent'      => $page_transition_preloader_container
        ));

        $row_pt_spinner_animation = ambient_elated_add_admin_row(array(
            'name'   => 'row_pt_spinner_animation',
            'parent' => $group_pt_spinner_animation
        ));

        ambient_elated_add_admin_field(array(
            'type'          => 'selectsimple',
            'name'          => 'smooth_pt_spinner_type',
            'default_value' => '',
            'label'         => esc_html__('Spinner Type', 'ambient'),
            'parent'        => $row_pt_spinner_animation,
            'options'       => array(
                'rotate_circles'        => esc_html__('Rotate Circles', 'ambient'),
                'pulse'                 => esc_html__('Pulse', 'ambient'),
                'double_pulse'          => esc_html__('Double Pulse', 'ambient'),
                'cube'                  => esc_html__('Cube', 'ambient'),
                'rotating_cubes'        => esc_html__('Rotating Cubes', 'ambient'),
                'stripes'               => esc_html__('Stripes', 'ambient'),
                'wave'                  => esc_html__('Wave', 'ambient'),
                'two_rotating_circles'  => esc_html__('2 Rotating Circles', 'ambient'),
                'five_rotating_circles' => esc_html__('5 Rotating Circles', 'ambient'),
                'atom'                  => esc_html__('Atom', 'ambient'),
                'clock'                 => esc_html__('Clock', 'ambient'),
                'mitosis'               => esc_html__('Mitosis', 'ambient'),
                'lines'                 => esc_html__('Lines', 'ambient'),
                'fussion'               => esc_html__('Fussion', 'ambient'),
                'wave_circles'          => esc_html__('Wave Circles', 'ambient'),
                'pulse_circles'         => esc_html__('Pulse Circles', 'ambient')
            )
        ));

        ambient_elated_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'smooth_pt_spinner_color',
            'default_value' => '',
            'label'         => esc_html__('Spinner Color', 'ambient'),
            'parent'        => $row_pt_spinner_animation
        ));

        ambient_elated_add_admin_field(
            array(
                'name'          => 'page_transition_fadeout',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Enable Fade Out Animation', 'ambient'),
                'description'   => esc_html__('Enabling this option will turn on fade out animation when leaving page', 'ambient'),
                'parent'        => $page_transitions_container
            )
        );

        ambient_elated_add_admin_field(
            array(
                'name'          => 'show_back_button',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label'         => esc_html__('Show "Back To Top Button"', 'ambient'),
                'description'   => esc_html__('Enabling this option will display a Back to Top button on every page', 'ambient'),
                'parent'        => $panel_settings
            )
        );

        ambient_elated_add_admin_field(
            array(
                'name'          => 'responsiveness',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label'         => esc_html__('Responsiveness', 'ambient'),
                'description'   => esc_html__('Enabling this option will make all pages responsive', 'ambient'),
                'parent'        => $panel_settings
            )
        );

        $panel_custom_code = ambient_elated_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_custom_code',
                'title' => esc_html__('Custom Code', 'ambient')
            )
        );

        ambient_elated_add_admin_field(
            array(
                'name'        => 'custom_css',
                'type'        => 'textarea',
                'label'       => esc_html__('Custom CSS', 'ambient'),
                'description' => esc_html__('Enter your custom CSS here', 'ambient'),
                'parent'      => $panel_custom_code
            )
        );

        ambient_elated_add_admin_field(
            array(
                'name'        => 'custom_js',
                'type'        => 'textarea',
                'label'       => esc_html__('Custom JS', 'ambient'),
                'description' => esc_html__('Enter your custom Javascript here', 'ambient'),
                'parent'      => $panel_custom_code
            )
        );

        $panel_google_api = ambient_elated_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_google_api',
                'title' => esc_html__('Google API', 'ambient')
            )
        );

        ambient_elated_add_admin_field(
            array(
                'name'        => 'google_maps_api_key',
                'type'        => 'text',
                'label'       => esc_html__('Google Maps Api Key', 'ambient'),
                'description' => esc_html__('Insert your Google Maps API key here. For instructions on how to create a Google Maps API key, please refer to our to our documentation.', 'ambient'),
                'parent'      => $panel_google_api
            )
        );
    }

    add_action('ambient_elated_options_map', 'ambient_elated_general_options_map', 1);
}