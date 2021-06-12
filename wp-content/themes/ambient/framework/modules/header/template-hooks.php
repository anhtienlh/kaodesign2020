<?php

//top header bar
add_action('ambient_elated_before_page_header', 'ambient_elated_get_header_top');

//mobile header
add_action('ambient_elated_after_page_header', 'ambient_elated_get_mobile_header');