<?php

if(!function_exists('ambient_elated_load_modules')) {
    /**
     * Loades all modules by going through all folders that are placed directly in modules folder
     * and loads load.php file in each. Hooks to ambient_elated_after_options_map action
     *
     * @see http://php.net/manual/en/function.glob.php
     */
    function ambient_elated_load_modules() {
        foreach(glob(ELATED_FRAMEWORK_ROOT_DIR.'/modules/*/load.php') as $module_load) {
            include_once $module_load;
        }
    }

    add_action('ambient_elated_before_options_map', 'ambient_elated_load_modules');
}

if(!function_exists('ambient_elated_load_shortcode_interface')) {

    function ambient_elated_load_shortcode_interface() {

        include_once ELATED_FRAMEWORK_MODULES_ROOT_DIR.'/shortcodes/lib/shortcode-interface.php';
    }

    add_action('ambient_elated_before_options_map', 'ambient_elated_load_shortcode_interface');
}

if(!function_exists('ambient_elated_load_shortcodes')) {
    /**
     * Loades all shortcodes by going through all folders that are placed directly in shortcodes folder
     * and loads load.php file in each. Hooks to ambient_elated_after_options_map action
     *
     * @see http://php.net/manual/en/function.glob.php
     */
    function ambient_elated_load_shortcodes() {
        foreach(glob(ELATED_FRAMEWORK_ROOT_DIR.'/modules/shortcodes/*/load.php') as $shortcode_load) {
            include_once $shortcode_load;
        }

        do_action('ambient_elated_shortcode_loader');
    }

    add_action('ambient_elated_before_options_map', 'ambient_elated_load_shortcodes');
}