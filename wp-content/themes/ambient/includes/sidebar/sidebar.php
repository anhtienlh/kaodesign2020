<?php

if(!function_exists('ambient_elated_register_sidebars')) {
    /**
     * Function that registers theme's sidebars
     */
    function ambient_elated_register_sidebars() {

        register_sidebar(array(
            'name' => esc_html__('Sidebar', 'ambient'),
            'id' => 'sidebar',
            'description' => esc_html__('Default Sidebar', 'ambient'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4>',
            'after_title' => '</h4>'
        ));
    }

    add_action('widgets_init', 'ambient_elated_register_sidebars');
}

if(!function_exists('ambient_elated_add_support_custom_sidebar')) {
    /**
     * Function that adds theme support for custom sidebars. It also creates AmbientElatedClassSidebar object
     */
    function ambient_elated_add_support_custom_sidebar() {
        add_theme_support('AmbientElatedClassSidebar');
        if (get_theme_support('AmbientElatedClassSidebar')) new AmbientElatedClassSidebar();
    }

    add_action('after_setup_theme', 'ambient_elated_add_support_custom_sidebar');
}