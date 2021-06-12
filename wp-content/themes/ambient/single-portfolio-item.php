<?php

get_header();
ambient_elated_get_title();
do_action('ambient_elated_before_slider_action');
get_template_part('slider');
do_action('ambient_elated_after_slider_action');
ambient_elated_single_portfolio();
get_footer();

?>