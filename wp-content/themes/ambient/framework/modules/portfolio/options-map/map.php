<?php

if ( ! function_exists('ambient_elated_portfolio_options_map') ) {
	function ambient_elated_portfolio_options_map() {

		ambient_elated_add_admin_page(array(
			'slug'  => '_portfolio',
			'title' => esc_html__('Portfolio', 'ambient'),
			'icon'  => 'fa fa-camera-retro'
		));

		$panel_archive = ambient_elated_add_admin_panel(array(
			'title' => esc_html__('Portfolio Archive', 'ambient'),
			'name'  => 'panel_portfolio_archive',
			'page'  => '_portfolio'
		));

		ambient_elated_add_admin_field(array(
			'name'        => 'portfolio_archive_number_of_items',
			'type'        => 'text',
			'label'       => esc_html__('Number of Items', 'ambient'),
			'description' => esc_html__('Set number of items for your portfolio list on archive pages. Default value is 12', 'ambient'),
			'parent'      => $panel_archive,
			'args'        => array(
				'col_width' => 3
			)
		));

		ambient_elated_add_admin_field(array(
			'name'        => 'portfolio_archive_number_of_columns',
			'type'        => 'select',
			'label'       => esc_html__('Number of Columns', 'ambient'),
			'default_value' => '4',
			'description' => esc_html__('Set number of columns for your portfolio list on archive pages. Default value is 4 columns', 'ambient'),
			'parent'      => $panel_archive,
			'options'     => array(
				'2' => esc_html__('2 Columns', 'ambient'),
				'3' => esc_html__('3 Columns', 'ambient'),
				'4' => esc_html__('4 Columns', 'ambient'),
				'5' => esc_html__('5 Columns', 'ambient')
			)
		));

		ambient_elated_add_admin_field(array(
			'name'        => 'portfolio_archive_space_between_items',
			'type'        => 'select',
			'label'       => esc_html__('Space Between Items', 'ambient'),
			'default_value' => 'normal',
			'description' => esc_html__('Set space size between portfolio items for your portfolio list on archive pages. Default value is normal', 'ambient'),
			'parent'      => $panel_archive,
			'options'     => array(
				'no_space' => esc_html__('No Space', 'ambient'),
				'small' => esc_html__('Small', 'ambient'),
				'normal' => esc_html__('Normal', 'ambient'),
				'large' => esc_html__('Large', 'ambient')
			)
		));

		ambient_elated_add_admin_field(array(
			'name'        => 'portfolio_archive_image_size',
			'type'        => 'select',
			'label'       => esc_html__('Image Proportions', 'ambient'),
			'default_value' => 'landscape',
			'description' => esc_html__('Set image proportions for your portfolio list on archive pages. Default value is landscape', 'ambient'),
			'parent'      => $panel_archive,
			'options'     => array(
				'full' => esc_html__('Original', 'ambient'),
				'landscape' => esc_html__('Landscape', 'ambient'),
				'portrait' => esc_html__('Portrait', 'ambient'),
				'square' => esc_html__('Square', 'ambient')
			)
		));

		$panel = ambient_elated_add_admin_panel(array(
			'title' => esc_html__('Portfolio Single', 'ambient'),
			'name'  => 'panel_portfolio_single',
			'page'  => '_portfolio'
		));

		ambient_elated_add_admin_field(array(
			'name'        => 'portfolio_single_template',
			'type'        => 'select',
			'label'       => esc_html__('Portfolio Type', 'ambient'),
			'default_value'	=> 'small-images',
			'description' => esc_html__('Choose a default type for Single Project pages', 'ambient'),
			'parent'      => $panel,
			'options'     => array(
				'small-images' => esc_html__('Portfolio Small Images', 'ambient'),
				'small-slider' => esc_html__('Portfolio Small Slider', 'ambient'),
				'big-images' => esc_html__('Portfolio Big Images', 'ambient'),
				'big-slider' => esc_html__('Portfolio Big Slider', 'ambient'),
				'custom' => esc_html__('Portfolio Custom', 'ambient'),
				'full-width-custom' => esc_html__('Portfolio Full Width Custom', 'ambient'),
				'gallery' => esc_html__('Portfolio Gallery', 'ambient')
			)
		));

		ambient_elated_add_admin_field(array(
			'name'          => 'portfolio_single_lightbox_images',
			'type'          => 'yesno',
			'label'         => esc_html__('Lightbox for Images', 'ambient'),
			'description'   => esc_html__('Enabling this option will turn on lightbox functionality for projects with images', 'ambient'),
			'parent'        => $panel,
			'default_value' => 'yes'
		));

		ambient_elated_add_admin_field(array(
			'name'          => 'portfolio_single_lightbox_videos',
			'type'          => 'yesno',
			'label'         => esc_html__('Lightbox for Videos', 'ambient'),
			'description'   => esc_html__('Enabling this option will turn on lightbox functionality for YouTube/Vimeo projects', 'ambient'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		ambient_elated_add_admin_field(array(
			'name'          => 'portfolio_single_hide_categories',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Categories', 'ambient'),
			'description'   => esc_html__('Enabling this option will disable category meta description on single projects', 'ambient'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		ambient_elated_add_admin_field(array(
			'name'          => 'portfolio_single_hide_date',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Date', 'ambient'),
			'description'   => esc_html__('Enabling this option will disable date meta on single projects', 'ambient'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		ambient_elated_add_admin_field(array(
			'name'          => 'portfolio_single_comments',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Comments', 'ambient'),
			'description'   => esc_html__('Enabling this option will show comments on your page', 'ambient'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		ambient_elated_add_admin_field(array(
			'name'          => 'portfolio_single_sticky_sidebar',
			'type'          => 'yesno',
			'label'         => esc_html__('Sticky Side Text', 'ambient'),
			'description'   => esc_html__('Enabling this option will make side text sticky on Single Project pages', 'ambient'),
			'parent'        => $panel,
			'default_value' => 'yes'
		));

		ambient_elated_add_admin_field(array(
			'name'          => 'portfolio_single_hide_pagination',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Pagination', 'ambient'),
			'description'   => esc_html__('Enabling this option will turn off portfolio pagination functionality', 'ambient'),
			'parent'        => $panel,
			'default_value' => 'no',
			'args' => array(
				'dependence' => true,
				'dependence_hide_on_yes' => '#eltdf_navigate_same_category_container'
			)
		));

		$container_navigate_category = ambient_elated_add_admin_container(array(
			'name'            => 'navigate_same_category_container',
			'parent'          => $panel,
			'hidden_property' => 'portfolio_single_hide_pagination',
			'hidden_value'    => 'yes'
		));

		ambient_elated_add_admin_field(array(
			'name'            => 'portfolio_single_nav_same_category',
			'type'            => 'yesno',
			'label'           => esc_html__('Enable Pagination Through Same Category', 'ambient'),
			'description'     => esc_html__('Enabling this option will make portfolio pagination sort through current category', 'ambient'),
			'parent'          => $container_navigate_category,
			'default_value'   => 'no'
		));

		ambient_elated_add_admin_field(array(
			'name'        => 'portfolio_single_numb_columns',
			'type'        => 'select',
			'label'       => esc_html__('Number of Columns', 'ambient'),
			'default_value' => 'three-columns',
			'description' => esc_html__('Enter the number of columns for portfolio gallery type', 'ambient'),
			'parent'      => $panel,
			'options'     => array(
				'two-columns' => esc_html__('2 Columns', 'ambient'),
				'three-columns' => esc_html__('3 Columns', 'ambient'),
				'four-columns' => esc_html__('4 Columns', 'ambient')
			)
		));

		ambient_elated_add_admin_field(array(
			'name'        => 'portfolio_single_slug',
			'type'        => 'text',
			'label'       => esc_html__('Portfolio Single Slug', 'ambient'),
			'description' => esc_html__('Enter if you wish to use a different Single Project slug (Note: After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect)', 'ambient'),
			'parent'      => $panel,
			'args'        => array(
				'col_width' => 3
			)
		));
	}

	add_action( 'ambient_elated_options_map', 'ambient_elated_portfolio_options_map', 12);
}