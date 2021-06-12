<?php

add_action('after_setup_theme', 'ambient_elated_meta_boxes_map_init', 1);
function ambient_elated_meta_boxes_map_init() {
    /**
    * Loades all meta-boxes by going through all folders that are placed directly in meta-boxes folder
    * and loads map.php file in each.
    *
    * @see http://php.net/manual/en/function.glob.php
    */

    do_action('ambient_elated_before_meta_boxes_map');

	global $ambient_elated_global_options;
	global $ambient_elated_global_Framework;

    foreach(glob(ELATED_FRAMEWORK_ROOT_DIR.'/admin/meta-boxes/*/map.php') as $meta_box_load) {
        include_once $meta_box_load;
    }

	do_action('ambient_elated_meta_boxes_map');

	do_action('ambient_elated_after_meta_boxes_map');
}