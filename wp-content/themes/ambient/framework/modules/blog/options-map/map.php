<?php

if ( ! function_exists('ambient_elated_blog_options_map') ) {

	function ambient_elated_blog_options_map() {

		ambient_elated_add_admin_page(
			array(
				'slug' => '_blog_page',
				'title' => esc_html__('Blog', 'ambient'),
				'icon' => 'fa fa-files-o'
			)
		);

		/**
		 * Blog Lists
		 */
		$panel_blog_lists = ambient_elated_add_admin_panel(
			array(
				'page' => '_blog_page',
				'name' => 'panel_blog_lists',
				'title' => esc_html__('Blog Lists', 'ambient')
			)
		);

		ambient_elated_add_admin_field(array(
			'name'        => 'blog_list_type',
			'type'        => 'select',
			'label'       => esc_html__('Blog Layout for Archive Pages', 'ambient'),
			'description' => esc_html__('Choose a default blog layout', 'ambient'),
			'default_value' => 'standard',
			'parent'      => $panel_blog_lists,
			'options'     => array(
				'standard'			 => esc_html__('Blog: Standard', 'ambient'),
				'masonry' 			 => esc_html__('Blog: Masonry', 'ambient'),
				'masonry-full-width' => esc_html__('Blog: Masonry Full Width', 'ambient')
			)
		));

		ambient_elated_add_admin_field(array(
			'name'        => 'archive_sidebar_layout',
			'type'        => 'select',
			'label'       => esc_html__('Archive and Category Sidebar', 'ambient'),
			'description' => esc_html__('Choose a sidebar layout for archived blog post lists and category blog lists', 'ambient'),
			'parent'      => $panel_blog_lists,
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
				'name' => 'blog_custom_sidebar',
				'type' => 'selectblank',
				'label' => esc_html__('Sidebar to Display', 'ambient'),
				'description' => esc_html__('Choose a sidebar to display on blog post lists and category blog lists. Default sidebar is "Sidebar Page"', 'ambient'),
				'parent' => $panel_blog_lists,
				'options' => ambient_elated_get_custom_sidebars()
			));
		}

		ambient_elated_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'pagination',
				'default_value' => 'yes',
				'label' => esc_html__('Pagination', 'ambient'),
				'description' => esc_html__('Enabling this option will display pagination links on bottom of blog post list', 'ambient'),
				'parent' => $panel_blog_lists,
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltdf_eltdf_pagination_container'
				)
			)
		);

		$pagination_container = ambient_elated_add_admin_container(
			array(
				'name' => 'eltdf_pagination_container',
				'hidden_property' => 'pagination',
				'hidden_value' => 'no',
				'parent' => $panel_blog_lists,
			)
		);

		ambient_elated_add_admin_field(
			array(
				'parent' => $pagination_container,
				'type' => 'text',
				'name' => 'blog_page_range',
				'default_value' => '4',
				'label' => esc_html__('Pagination Range Limit', 'ambient'),
				'description' => esc_html__('Enter a number that will limit pagination to a certain range of links', 'ambient'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		ambient_elated_add_admin_field(array(
			'name'        => 'masonry_pagination',
			'type'        => 'select',
			'label'       => esc_html__('Pagination on Masonry', 'ambient'),
			'description' => esc_html__('Choose a pagination style for Masonry Blog List', 'ambient'),
			'parent'      => $pagination_container,
			'default_value' => 'standard',
			'options'     => array(
				'standard'			=> esc_html__('Standard', 'ambient'),
				'load-more'			=> esc_html__('Load More', 'ambient')
			),
		));

        ambient_elated_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'enable_load_more_pag',
				'default_value' => 'no',
				'label' => esc_html__('Load More Pagination on Other Lists', 'ambient'),
				'description' => esc_html__('Enable Load More Pagination on other lists', 'ambient'),
				'parent' => $pagination_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);
	
		ambient_elated_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'number_of_chars',
				'default_value' => '',
				'label' => esc_html__('Number of Words in Excerpt', 'ambient'),
				'description' => esc_html__('Enter a number of words in excerpt (article summary)', 'ambient'),
				'parent' => $panel_blog_lists,
				'args' => array(
					'col_width' => 3
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'standard_number_of_chars',
				'default_value' => '',
				'label' => esc_html__('Standard Type Number of Words in Excerpt', 'ambient'),
				'description' => esc_html__('Enter a number of words in excerpt (article summary)', 'ambient'),
				'parent' => $panel_blog_lists,
				'args' => array(
					'col_width' => 3
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'masonry_number_of_chars',
				'default_value' => '',
				'label' => esc_html__('Masonry Type Number of Words in Excerpt', 'ambient'),
				'description' => esc_html__('Enter a number of words in excerpt (article summary)', 'ambient'),
				'parent' => $panel_blog_lists,
				'args' => array(
					'col_width' => 3
				)
			)
		);

		ambient_elated_add_admin_field(array(
			'name'          => 'blog_list_feature_image',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Feature Image', 'ambient'),
			'description'   => esc_html__('Enabling this option will show feature image for your posts on your blog page', 'ambient'),
			'parent'        => $panel_blog_lists,
			'default_value' => 'yes',
		));

		ambient_elated_add_admin_field(array(
			'name'          => 'blog_list_category',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Category', 'ambient'),
			'description'   => esc_html__('Enabling this option will show category post info on your blog page', 'ambient'),
			'parent'        => $panel_blog_lists,
			'default_value' => 'yes'
		));

		ambient_elated_add_admin_field(array(
			'name'          => 'blog_list_date',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Date', 'ambient'),
			'description'   => esc_html__('Enabling this option will show date post info on your blog page', 'ambient'),
			'parent'        => $panel_blog_lists,
			'default_value' => 'yes'
		));

		ambient_elated_add_admin_field(array(
			'name'          => 'blog_list_author',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Author', 'ambient'),
			'description'   => esc_html__('Enabling this option will show author post info on your blog page', 'ambient'),
			'parent'        => $panel_blog_lists,
			'default_value' => 'yes'
		));

		ambient_elated_add_admin_field(array(
			'name'          => 'blog_list_comment',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Comments', 'ambient'),
			'description'   => esc_html__('Enabling this option will show comments post info on your blog page', 'ambient'),
			'parent'        => $panel_blog_lists,
			'default_value' => 'yes'
		));

		ambient_elated_add_admin_field(array(
			'name'          => 'blog_list_like',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Like', 'ambient'),
			'description'   => esc_html__('Enabling this option will show like post info on your blog page', 'ambient'),
			'parent'        => $panel_blog_lists,
			'default_value' => 'yes'
		));

		ambient_elated_add_admin_field(array(
			'name'          => 'blog_list_share',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Share', 'ambient'),
			'description'   => esc_html__('Enabling this option will show share post info on your blog page', 'ambient'),
			'parent'        => $panel_blog_lists,
			'default_value' => 'no'
		));

		ambient_elated_add_admin_field(array(
			'name'          => 'blog_list_tags',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Tags', 'ambient'),
			'description'   => esc_html__('Enabling this option will show post tags on your blog page', 'ambient'),
			'parent'        => $panel_blog_lists,
			'default_value' => 'no'
		));

		/**
		 * Blog Single
		 */
		$panel_blog_single = ambient_elated_add_admin_panel(
			array(
				'page' => '_blog_page',
				'name' => 'panel_blog_single',
				'title' => esc_html__('Blog Single', 'ambient')
			)
		);

		ambient_elated_add_admin_field(array(
			'name'        => 'blog_single_sidebar_layout',
			'type'        => 'select',
			'label'       => esc_html__('Sidebar Layout', 'ambient'),
			'description' => esc_html__('Choose a sidebar layout for Blog Single pages', 'ambient'),
			'parent'      => $panel_blog_single,
			'options'     => array(
				'default'			=> esc_html__('No Sidebar', 'ambient'),
				'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'ambient'),
				'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'ambient'),
				'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'ambient'),
				'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'ambient')
			),
			'default_value'	=> 'default'
		));


		if(count($ambient_elated_custom_sidebars) > 0) {
			ambient_elated_add_admin_field(array(
				'name' => 'blog_single_custom_sidebar',
				'type' => 'selectblank',
				'label' => esc_html__('Sidebar to Display', 'ambient'),
				'description' => esc_html__('Choose a sidebar to display on Blog Single pages. Default sidebar is "Sidebar"', 'ambient'),
				'parent' => $panel_blog_single,
				'options' => ambient_elated_get_custom_sidebars()
			));
		}

		ambient_elated_add_admin_field(array(
			'name'          => 'blog_single_title_in_title_area',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Post Title in Title Area', 'ambient'),
			'description'   => esc_html__('Enabling this option will show post title in title area on single post pages', 'ambient'),
			'parent'        => $panel_blog_single,
			'default_value' => 'no'
		));

		ambient_elated_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'blog_single_feature_image_max_width',
				'label' => esc_html__('Featured Image Max Width', 'ambient'),
				'description' => esc_html__('Define maximum width for featured image on single post pages. Default value is 1100', 'ambient'),
				'parent' => $panel_blog_single,
				'args' => array(
					'col_width' => 3
				)
			)
		);

		ambient_elated_add_admin_field(array(
			'name'          => 'blog_single_category',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Category', 'ambient'),
			'description'   => esc_html__('Enabling this option will show category post info on your single post page', 'ambient'),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes'
		));

		ambient_elated_add_admin_field(array(
			'name'          => 'blog_single_date',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Date', 'ambient'),
			'description'   => esc_html__('Enabling this option will show date post info on your single post page', 'ambient'),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes'
		));

		ambient_elated_add_admin_field(array(
			'name'          => 'blog_single_author',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Author', 'ambient'),
			'description'   => esc_html__('Enabling this option will show author post info on your single post page', 'ambient'),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes'
		));

		ambient_elated_add_admin_field(array(
			'name'          => 'blog_single_comment',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Comments', 'ambient'),
			'description'   => esc_html__('Enabling this option will show comments post info on your single post page', 'ambient'),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes'
		));

		ambient_elated_add_admin_field(array(
			'name'          => 'blog_single_like',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Like', 'ambient'),
			'description'   => esc_html__('Enabling this option will show like post info on your single post page', 'ambient'),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes'
		));

		ambient_elated_add_admin_field(array(
			'name'          => 'blog_single_share',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Share', 'ambient'),
			'description'   => esc_html__('Enabling this option will show share post info on your single post page', 'ambient'),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes'
		));

		ambient_elated_add_admin_field(array(
			'name'          => 'blog_single_tags',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Tags', 'ambient'),
			'description'   => esc_html__('Enabling this option will show post tags on your single post page', 'ambient'),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes'
		));

		ambient_elated_add_admin_field(array(
			'name'			=> 'blog_single_related_posts',
			'type'			=> 'yesno',
			'label'			=> esc_html__('Show Related Posts', 'ambient'),
			'description'   => esc_html__('Enabling this option will show related posts on your single post page', 'ambient'),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes',
			'args' => array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#eltdf_related_image_container'
			)
		));

		$related_image_container = ambient_elated_add_admin_container(
			array(
				'name' => 'related_image_container',
				'hidden_property' => 'blog_single_related_posts',
				'hidden_value' => 'no',
				'parent' => $panel_blog_single,
			)
		);

		ambient_elated_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'blog_single_related_image_size',
				'label' => esc_html__('Related Posts Image Max Width', 'ambient'),
				'description' => esc_html__('Define maximum width for related posts images on your single post pages. Default value is 1100', 'ambient'),
				'parent' => $related_image_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);

		ambient_elated_add_admin_field(array(
			'name'          => 'blog_single_comments',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Comments Form', 'ambient'),
			'description'   => esc_html__('Enabling this option will show comments form on your page', 'ambient'),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes'
		));

		ambient_elated_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_single_navigation',
				'default_value' => 'no',
				'label' => esc_html__('Enable Prev/Next Single Post Navigation Links', 'ambient'),
				'description' => esc_html__('Enable navigation links through the blog posts (left and right arrows will appear)', 'ambient'),
				'parent' => $panel_blog_single,
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltdf_eltdf_blog_single_navigation_container'
				)
			)
		);

		$blog_single_navigation_container = ambient_elated_add_admin_container(
			array(
				'name' => 'eltdf_blog_single_navigation_container',
				'hidden_property' => 'blog_single_navigation',
				'hidden_value' => 'no',
				'parent' => $panel_blog_single,
			)
		);

		ambient_elated_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_navigation_through_same_category',
				'default_value' => 'no',
				'label'       => esc_html__('Enable Navigation Only in Current Category', 'ambient'),
				'description' => esc_html__('Limit your navigation only through current category', 'ambient'),
				'parent'      => $blog_single_navigation_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_author_info',
				'default_value' => 'yes',
				'label' => esc_html__('Show Author Info Box', 'ambient'),
				'description' => esc_html__('Enabling this option will display author name and descriptions on Blog Single pages', 'ambient'),
				'parent' => $panel_blog_single,
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltdf_eltdf_blog_single_author_info_container'
				)
			)
		);

		$blog_single_author_info_container = ambient_elated_add_admin_container(
			array(
				'name' => 'eltdf_blog_single_author_info_container',
				'hidden_property' => 'blog_author_info',
				'hidden_value' => 'no',
				'parent' => $panel_blog_single,
			)
		);

		ambient_elated_add_admin_field(
			array(
				'type'        => 'yesno',
				'name' => 'blog_author_info_email',
				'default_value' => 'no',
				'label'       => esc_html__('Show Author Email', 'ambient'),
				'description' => esc_html__('Enabling this option will show author email', 'ambient'),
				'parent'      => $blog_single_author_info_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);

		ambient_elated_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_single_author_social',
				'default_value' => 'yes',
				'label'       => esc_html__('Show Author Social Icons', 'ambient'),
				'description' => esc_html__('Enabling this option will show author social icons on your single post page', 'ambient'),
				'parent'      => $blog_single_author_info_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);
	}

	add_action( 'ambient_elated_options_map', 'ambient_elated_blog_options_map', 11);
}