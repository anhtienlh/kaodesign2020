<?php

if (!function_exists('ambient_elated_get_blog')) {
	/**
	 * Function which return holder for all blog lists
	 *
	 * @return holder.php template
	 */
	function ambient_elated_get_blog($type) {

		$ambient_elated_sidebar = ambient_elated_sidebar_layout();

		$params = array(
			"blog_type" => $type,
			"sidebar"   => $ambient_elated_sidebar
		);
		ambient_elated_get_module_template_part('templates/lists/holder', 'blog', '', $params);
	}
}

if (!function_exists('ambient_elated_get_blog_type')) {
	/**
	 * Function which create query for blog lists
	 *
	 * @return blog list template
	 */
	function ambient_elated_get_blog_type($type) {

		$blog_query = ambient_elated_get_blog_query();

		$paged = ambient_elated_paged();
		$blog_classes = '';

		if (ambient_elated_options()->getOptionValue('blog_page_range') != "") {
			$blog_page_range = esc_attr(ambient_elated_options()->getOptionValue('blog_page_range'));
		} else {
			$blog_page_range = $blog_query->max_num_pages;
		}
		$show_load_more = ambient_elated_enable_load_more();

		if ($show_load_more) {
			$blog_classes .= ' eltdf-blog-load-more';
		}

		$params = array(
			'blog_query'      => $blog_query,
			'paged'           => $paged,
			'blog_page_range' => $blog_page_range,
			'blog_type'       => $type,
			'blog_classes'    => $blog_classes
		);

		ambient_elated_get_module_template_part('templates/lists/' . $type, 'blog', '', $params);
	}
}

if (!function_exists('ambient_elated_get_blog_query')) {
	/**
	 * Function which create query for blog lists
	 *
	 * @return wp query object
	 */
	function ambient_elated_get_blog_query() {
		global $wp_query;

		$id = ambient_elated_get_page_id();
		$category = esc_attr(get_post_meta($id, "eltdf_blog_category_meta", true));
		if (esc_attr(get_post_meta($id, "eltdf_show_posts_per_page_meta", true)) != "") {
			$post_number = esc_attr(get_post_meta($id, "eltdf_show_posts_per_page_meta", true));
		} else {
			$post_number = esc_attr(get_option('posts_per_page'));
		}

		$paged = ambient_elated_paged();
		$query_array = array(
			'post_status'    => 'publish',
			'post_type'      => 'post',
			'paged'          => $paged,
			'cat'            => $category,
			'posts_per_page' => $post_number
		);
		if (is_archive()) {
			$blog_query = $wp_query;
		} else {
			$blog_query = new WP_Query($query_array);
		}

		return $blog_query;
	}
}

if (!function_exists('ambient_elated_get_post_format_html')) {

	/**
	 * Function which return html for post formats
	 *
	 * @param $type
	 *
	 * @return post hormat template
	 */
	function ambient_elated_get_post_format_html($type = "", $ajax = '') {

		$post_format = get_post_format();

		$supported_post_formats = array('audio', 'video', 'link', 'quote', 'gallery');
		if (in_array($post_format, $supported_post_formats)) {
			$post_format = $post_format;
		} else {
			$post_format = 'standard';
		}

		$slug = '';
		if ($type !== "") {
			$slug = $type;
		}

		$params = array();
		$params['blog_template_type'] = $type;
		$params['post_format'] = $post_format;

		$chars_array = ambient_elated_blog_lists_number_of_chars();
		if (isset($chars_array[$type])) {
			$params['excerpt_length'] = $chars_array[$type];
		} else {
			$params['excerpt_length'] = '';
		}

		$params['display_date'] = 'yes';
		if (ambient_elated_options()->getOptionValue('blog_list_date') !== '') {
			$params['display_date'] = ambient_elated_options()->getOptionValue('blog_list_date');
		}

		$params['display_category'] = 'no';
		if (ambient_elated_options()->getOptionValue('blog_list_category') !== '') {
			$params['display_category'] = ambient_elated_options()->getOptionValue('blog_list_category');
		}

		$params['display_author'] = 'yes';
		if (ambient_elated_options()->getOptionValue('blog_list_author') !== '') {
			$params['display_author'] = ambient_elated_options()->getOptionValue('blog_list_author');
		}

		$params['display_comments'] = 'yes';
		if (ambient_elated_options()->getOptionValue('blog_list_comment') !== '') {
			$params['display_comments'] = ambient_elated_options()->getOptionValue('blog_list_comment');
		}

		$params['display_like'] = 'yes';
		if (ambient_elated_options()->getOptionValue('blog_list_like') !== '') {
			$params['display_like'] = ambient_elated_options()->getOptionValue('blog_list_like');
		}

		$params['display_share'] = 'no';
		if (ambient_elated_options()->getOptionValue('blog_list_share') !== '') {
			$params['display_share'] = ambient_elated_options()->getOptionValue('blog_list_share');
		}

		$params['display_feature_image'] = true;
		if (ambient_elated_options()->getOptionValue('blog_list_feature_image') === 'no') {
			$params['display_feature_image'] = false;
		}

		if ($type === 'masonry') {
			$params['display_category'] = 'no';
			$params['display_share'] = 'no';
		}

		if ($ajax == '') {
			ambient_elated_get_module_template_part('templates/lists/post-formats/' . $post_format, 'blog', $slug, $params);
		}
		if ($ajax == 'yes') {
			return ambient_elated_get_blog_module_template_part('templates/lists/post-formats/' . $post_format, $slug, $params);
		}
	}
}

if (!function_exists('ambient_elated_get_default_blog_list')) {
	/**
	 * Function which return default blog list for archive post types
	 *
	 * @return post format template
	 */

	function ambient_elated_get_default_blog_list() {

		$blog_list = ambient_elated_options()->getOptionValue('blog_list_type');

		return $blog_list;
	}
}

if (!function_exists('ambient_elated_pagination')) {

	/**
	 * Function which return pagination
	 *
	 * @return blog list pagination html
	 */
	function ambient_elated_pagination($pages = '', $range = 4, $paged = 1) {

		$showitems = $range + 1;

		if ($pages == '') {
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if (!$pages) {
				$pages = 1;
			}
		}

		$show_load_more = ambient_elated_enable_load_more();
		$masonry_template = ambient_elated_is_masonry_template();

		$search_template = 'no';
		if (is_search()) {
			$search_template = 'yes';
		}

		if ($pages != 1) {
			if ($show_load_more == 'yes' && $search_template !== 'yes' && !$masonry_template) {
				$params = array(
					'type' => 'solid',
					'size' => 'large',
					'text' => esc_html__('LOAD MORE', 'ambient')
				);
				echo '<div class="eltdf-load-more-ajax-pagination">';
				echo ambient_elated_get_button_html($params);
				echo '</div>';
			} else {
				echo '<span class="eltdf-pagination-new-holder">' . get_the_posts_pagination() . '</span>';

				echo '<div class="eltdf-pagination">';
				echo '<ul>';
//						if($paged > 2 && $paged > $range+1 && $showitems < $pages){
//							echo '<li class="eltdf-pagination-first-page"><a href="'.esc_url(get_pagenum_link(1)).'"><i class="eltdf-pagination-icon icon-arrows-left-double-32"></i></a></li>';
//						}
				if ($paged > 1) {
					echo "<li class='eltdf-pagination-prev'><a href='" . esc_url(get_pagenum_link($paged - 1)) . "'><i class='eltdf-pagination-icon ion-ios-arrow-thin-left'></i><span>" . esc_html__('previous', 'ambient') . "</span></a></li>";
				}
				for ($i = 1; $i <= $pages; $i++) {
					if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
						echo esc_attr($paged == $i) ? "<li class='active'><span>" . $i . "</span></li>" : "<li><a href='" . get_pagenum_link($i) . "' class='inactive'>" . $i . "</a></li>";
					}
				}
				if ($paged !== intval($pages)) {
					echo '<li class="eltdf-pagination-next"><a href="';
					if ($pages > $paged) {
						echo esc_url(get_pagenum_link($paged + 1));
					} else {
						echo esc_url(get_pagenum_link($paged));
					}
					echo '"><span>' . esc_html__('next', 'ambient') . '</span><i class="eltdf-pagination-icon ion-ios-arrow-thin-right"></i></a></li>';
				}
				echo '</ul>';
				echo "</div>";
			}
		}
	}
}

if (!function_exists('ambient_elated_post_info')) {
	/**
	 * Function that loads parts of blog post info section
	 * Possible options are:
	 * 1. date
	 * 2. category
	 * 3. author
	 * 4. comments
	 * 5. like
	 * 6. share
	 *
	 * @param $config array of sections to load
	 */
	function ambient_elated_post_info($config) {
		$default_config = array(
			'author'   => '',
			'date'     => '',
			'category' => '',
			'comments' => '',
			'like'     => '',
			'share'    => '',
		);

		extract(shortcode_atts($default_config, $config));

		if ($author == 'yes') {
			ambient_elated_get_module_template_part('templates/parts/post-info-author', 'blog');
		}
		if ($date == 'yes') {
			ambient_elated_get_module_template_part('templates/parts/post-info-date', 'blog');
		}
		if ($category == 'yes') {
			ambient_elated_get_module_template_part('templates/parts/post-info-category', 'blog');
		}
		if ($comments == 'yes' && comments_open()) {
			ambient_elated_get_module_template_part('templates/parts/post-info-comments', 'blog');
		}
		if ($like == 'yes') {
			ambient_elated_get_module_template_part('templates/parts/post-info-like', 'blog');
		}
		if ($share == 'yes') {
			ambient_elated_get_module_template_part('templates/parts/post-info-share', 'blog');
		}
	}
}

if (!function_exists('ambient_elated_text_crop')) {
	/**
	 * Function that cuts plain text to the number of words supplied
	 *
	 */
	function ambient_elated_text_crop($text, $word_count = 45, $suffix = true) {

		$text = trim($text);
		$word_count = (int)$word_count;
		$suffix = (bool)$suffix;

		//explode current text to words
		$text_word_array = explode(' ', $text);

		// Filter out all empty words
		$text_word_array = array_filter($text_word_array, function ($text_word_array_item) {
			return trim($text_word_array_item) != '';
		});

		// Real word count
		$text_word_array_count = count($text_word_array);

		//cut down that array based on the number of the words option
		$text_word_array = array_slice($text_word_array, 0, $word_count);

		//and finally implode words together
		$cropped_text = implode(' ', $text_word_array);

		// adds three dots only if it is needed
		if ($suffix && $text_word_array_count > $word_count) {
			$cropped_text .= '...';
		}

		return $cropped_text;
	}
}

if (!function_exists('ambient_elated_excerpt')) {
	/**
	 * Function that cuts post excerpt to the number of word based on previosly set global
	 * variable $word_count, which is defined in eltd_set_blog_word_count function.
	 *
	 * It current post has read more tag set it will return content of the post, else it will return post excerpt
	 *
	 */
	function ambient_elated_excerpt($excerpt_length = '') {
		global $post;

		if (post_password_required()) {
			echo get_the_password_form();
		} //does current post has read more tag set?
		elseif (ambient_elated_post_has_read_more()) {
			global $more;

			//override global $more variable so this can be used in blog templates
			$more = 0;
			the_content(true);
		} //is word count set to something different that 0?
		elseif ($excerpt_length != '0') {
			//if word count is set and different than empty take that value, else that general option from theme options
			$word_count = '45';
			if (isset($excerpt_length) && $excerpt_length != "") {
				$word_count = $excerpt_length;

			} elseif (ambient_elated_options()->getOptionValue('number_of_chars') != '') {
				$word_count = esc_attr(ambient_elated_options()->getOptionValue('number_of_chars'));
			}
			//if post excerpt field is filled take that as post excerpt, else that content of the post
			$post_excerpt = $post->post_excerpt != "" ? $post->post_excerpt : strip_tags($post->post_content);

			//remove leading dots if those exists
			$clean_excerpt = strlen($post_excerpt) && strpos($post_excerpt, '...') ? strstr($post_excerpt, '...', true) : $post_excerpt;

			//if clean excerpt has text left
			if ($clean_excerpt !== '') {
				//explode current excerpt to words
				$excerpt_word_array = explode(' ', $clean_excerpt);

				//cut down that array based on the number of the words option
				$excerpt_word_array = array_slice($excerpt_word_array, 0, $word_count);

				//and finally implode words together
				$excerpt = implode(' ', $excerpt_word_array);

				//is excerpt different than empty string?
				if ($excerpt !== '') {
					echo '<p itemprop="description" class="eltdf-post-excerpt">' . rtrim(wp_kses_post($excerpt)) . '</p>';
				}
			}
		}
	}
}

if (!function_exists('ambient_elated_get_blog_single')) {

	/**
	 * Function which return holder for single posts
	 *
	 * @return single holder.php template
	 */

	function ambient_elated_get_blog_single() {
		$ambient_elated_sidebar = ambient_elated_sidebar_layout();

		$params = array(
			"sidebar" => $ambient_elated_sidebar
		);

		ambient_elated_get_module_template_part('templates/single/holder', 'blog', '', $params);
	}
}

if (!function_exists('ambient_elated_get_single_html')) {
	/**
	 * Function return all parts on single.php page
	 *
	 *
	 * @return single.php html
	 */
	function ambient_elated_get_single_html() {

		$post_format = get_post_format();
		$supported_post_formats = array('audio', 'video', 'link', 'quote', 'gallery');
		if (in_array($post_format, $supported_post_formats)) {
			$post_format = $post_format;
		} else {
			$post_format = 'standard';
		}

		//Related posts
		$related_posts_params = array();
		$show_related = (ambient_elated_options()->getOptionValue('blog_single_related_posts') == 'yes') ? true : false;
		if ($show_related) {
			$hasSidebar = ambient_elated_sidebar_layout();
			$post_id = get_the_ID();
			$related_post_number = ($hasSidebar == '' || $hasSidebar == 'default' || $hasSidebar == 'no-sidebar') ? 4 : 3;
			$related_posts_options = array(
				'posts_per_page' => $related_post_number
			);
			$related_posts_image_size = '';
			if (ambient_elated_options()->getOptionValue('blog_single_related_image_size') !== '') {
				$related_posts_image_size = intval(ambient_elated_options()->getOptionValue('blog_single_related_image_size'));
			}
			$related_posts_params = array(
				'related_posts'            => ambient_elated_get_related_post_type($post_id, $related_posts_options),
				'related_posts_image_size' => $related_posts_image_size
			);
		}

		$params = array();
		$params['post_format'] = $post_format;

		$params['display_category'] = 'yes';
		if (ambient_elated_options()->getOptionValue('blog_single_category') !== '') {
			$params['display_category'] = ambient_elated_options()->getOptionValue('blog_single_category');
		}

		$params['display_date'] = 'yes';
		if (ambient_elated_options()->getOptionValue('blog_single_date') !== '') {
			$params['display_date'] = ambient_elated_options()->getOptionValue('blog_single_date');
		}

		$params['display_author'] = 'yes';
		if (ambient_elated_options()->getOptionValue('blog_single_author') !== '') {
			$params['display_author'] = ambient_elated_options()->getOptionValue('blog_single_author');
		}

		$params['display_comments'] = 'yes';
		if (ambient_elated_options()->getOptionValue('blog_single_comment') !== '') {
			$params['display_comments'] = ambient_elated_options()->getOptionValue('blog_single_comment');
		}

		$params['display_like'] = 'yes';
		if (ambient_elated_options()->getOptionValue('blog_single_like') !== '') {
			$params['display_like'] = ambient_elated_options()->getOptionValue('blog_single_like');
		}

		$params['display_share'] = 'no';
		ambient_elated_get_module_template_part('templates/single/post-formats/' . $post_format, 'blog', '', $params);

		$author_params = array();
		$author_params['display_author_social'] = true;
		if (ambient_elated_options()->getOptionValue('blog_single_author_social') === 'no') {
			$author_params['display_author_social'] = false;
		}
		ambient_elated_get_module_template_part('templates/single/parts/author-info', 'blog', '', $author_params);

		$navigation_params = array();
		$navigation_params['blog_single_navigation'] = true;

		if (ambient_elated_options()->getOptionValue('blog_single_navigation') === 'no') {
			$navigation_params['blog_single_navigation'] = false;
		}

		$navigation_params['blog_navigation_through_same_category'] = true;

		if (ambient_elated_options()->getOptionValue('blog_navigation_through_same_category') === 'no') {
			$navigation_params['blog_navigation_through_same_category'] = false;
		}

		ambient_elated_get_module_template_part('templates/single/parts/single-navigation', 'blog', '', $navigation_params);

		if ($show_related) {
			ambient_elated_get_module_template_part('templates/single/parts/related-posts', 'blog', '', $related_posts_params);
		}

		if (ambient_elated_show_comments()) {
			comments_template('', true);
		}
	}
}

if (!function_exists('ambient_elated_get_user_custom_fields')) {
	/**
	 * Function returns links and icons for author social networks
	 *
	 * return array
	 */
	function ambient_elated_get_user_custom_fields() {

		$user_social_array = array();
		$social_network_array = array(
			'facebook',
			'twitter',
			'linkedin',
			'instagram',
			'pinterest',
			'tumblr',
			'googleplus'
		);

		foreach ($social_network_array as $network) {
			if (get_the_author_meta($network) !== '') {
				$$network = array(
					'link'  => get_the_author_meta($network),
					'class' => 'social_' . $network . ' eltdf-author-social-' . $network . ' eltdf-author-social-icon'
				);
				$user_social_array[$network] = $$network;
			}
		}

		return $user_social_array;
	}
}

if (!function_exists('ambient_elated_additional_post_items')) {
	/**
	 * Function which return parts on single.php which are just below content
	 *
	 * @return single.php html
	 */
	function ambient_elated_additional_post_items() {

		$tags_params = array();
		$tags_params['blog_single_tags'] = false;
		if (ambient_elated_options()->getOptionValue('blog_single_tags') === 'yes' && has_tag()) {
			$tags_params['blog_single_tags'] = true;
		}

		$social_params = array();
		$social_params['display_social_share'] = true;
		if (ambient_elated_options()->getOptionValue('blog_single_share') === 'no') {
			$social_params['display_social_share'] = false;
		}

		if ($tags_params['blog_single_tags'] || $social_params['display_social_share']) {
			print '<div class="eltdf-social-share-tags-holder clearfix">';

			if ($tags_params['blog_single_tags']) {
				ambient_elated_get_module_template_part('templates/single/parts/tags', 'blog');
			}
			if ($social_params['display_social_share']) {
				ambient_elated_get_module_template_part('templates/single/parts/single-social-share', 'blog', '', $social_params);
			}

			print '</div>';
		}

		$args_pages = array(
			'before'      => '<div class="eltdf-single-links-pages"><div class="eltdf-single-links-pages-inner">',
			'after'       => '</div></div>',
			'link_before' => '<span>' . esc_html__('Post Page Link: ', 'ambient'),
			'link_after'  => '</span>',
			'pagelink'    => '%'
		);

		wp_link_pages($args_pages);
	}

	add_action('ambient_elated_before_blog_article_closed_tag', 'ambient_elated_additional_post_items');
}

if (!function_exists('ambient_elated_additional_post_list_items')) {
	/**
	 * Function which return parts on default blog list which are just below content
	 *
	 * @return tags html
	 */
	function ambient_elated_additional_post_list_items() {

		ambient_elated_get_module_template_part('templates/lists/parts/tags', 'blog');

		$args_pages = array(
			'before'      => '<div class="eltdf-single-links-pages"><div class="eltdf-single-links-pages-inner">',
			'after'       => '</div></div>',
			'link_before' => '<span>' . esc_html__('Post Page Link: ', 'ambient'),
			'link_after'  => '</span>',
			'pagelink'    => '%'
		);

		wp_link_pages($args_pages);
	}

	add_action('ambient_elated_blog_list_tags', 'ambient_elated_additional_post_list_items');
}

if (!function_exists('ambient_elated_comment')) {

	/**
	 * Function which modify default wordpress comments
	 *
	 * @return comments html
	 */
	function ambient_elated_comment($comment, $args, $depth) {

		$GLOBALS['comment'] = $comment;

		global $post;

		$is_pingback_comment = $comment->comment_type == 'pingback';
		$is_author_comment = $post->post_author == $comment->user_id;

		$comment_class = 'eltdf-comment clearfix';

		if ($is_author_comment) {
			$comment_class .= ' eltdf-post-author-comment';
		}

		if ($is_pingback_comment) {
			$comment_class .= ' eltdf-pingback-comment';
		}
		?>

		<li>
		<div class="<?php echo esc_attr($comment_class); ?>">
			<?php if (!$is_pingback_comment) { ?>
				<div
					class="eltdf-comment-image"> <?php echo ambient_elated_kses_img(get_avatar($comment, 'thumbnail')); ?> </div>
			<?php } ?>
			<div class="eltdf-comment-text">
				<div class="eltdf-comment-date"><?php comment_time(get_option('date_format')); ?></div>
				<?php
				comment_reply_link(array_merge($args, array(
					'reply_text' => esc_html__('reply', 'ambient'),
					'depth'      => $depth,
					'max_depth'  => $args['max_depth']
				)));
				edit_comment_link(esc_html__('edit', 'ambient'));
				?>
				<div class="eltdf-comment-info">
					<h4 class="eltdf-comment-name">
						<?php if ($is_pingback_comment) {
							esc_html_e('Pingback:', 'ambient');
						} ?>
						<?php echo wp_kses_post(get_comment_author_link()); ?>
					</h4>
				</div>
				<?php if (!$is_pingback_comment) { ?>
					<div class="eltdf-text-holder" id="comment-<?php echo comment_ID(); ?>">
						<?php comment_text(); ?>
					</div>
				<?php } ?>
			</div>
		</div>
		<?php //li tag will be closed by WordPress after looping through child elements ?>
	<?php
	}
}

if (!function_exists('ambient_elated_blog_archive_pages_classes')) {

	/**
	 * Function which create classes for container in archive pages
	 *
	 * @return array
	 */
	function ambient_elated_blog_archive_pages_classes($blog_type) {

		$classes = array();

		if (in_array($blog_type, ambient_elated_blog_full_width_types())) {
			$classes['holder'] = 'eltdf-full-width';
			$classes['inner'] = 'eltdf-full-width-inner';
		} elseif (in_array($blog_type, ambient_elated_blog_grid_types())) {
			$classes['holder'] = 'eltdf-container';
			$classes['inner'] = 'eltdf-container-inner clearfix';
		}

		return $classes;
	}
}

if (!function_exists('ambient_elated_blog_full_width_types')) {

	/**
	 * Function which return all full width blog types
	 *
	 * @return array
	 */
	function ambient_elated_blog_full_width_types() {

		$types = array('masonry-full-width');

		return $types;
	}
}

if (!function_exists('ambient_elated_blog_grid_types')) {

	/**
	 * Function which return in grid blog types
	 *
	 * @return array
	 */

	function ambient_elated_blog_grid_types() {

		$types = array('standard', 'masonry');

		return $types;
	}
}

if (!function_exists('ambient_elated_blog_types')) {

	/**
	 * Function which return all blog types
	 *
	 * @return array
	 */
	function ambient_elated_blog_types() {

		$types = array_merge(ambient_elated_blog_grid_types(), ambient_elated_blog_full_width_types());

		return $types;
	}
}

if (!function_exists('ambient_elated_blog_templates')) {

	/**
	 * Function which return all blog templates names
	 *
	 * @return array
	 */
	function ambient_elated_blog_templates() {

		$templates = array();
		$grid_templates = ambient_elated_blog_grid_types();
		$full_templates = ambient_elated_blog_full_width_types();
		foreach ($grid_templates as $grid_template) {
			array_push($templates, 'blog-' . $grid_template);
		}
		foreach ($full_templates as $full_template) {
			array_push($templates, 'blog-' . $full_template);
		}

		return $templates;
	}
}

if (!function_exists('ambient_elated_blog_lists_number_of_chars')) {

	/**
	 * Function that return number of characters for different lists based on options
	 *
	 * @return int
	 */
	function ambient_elated_blog_lists_number_of_chars() {

		$number_of_chars = array();

		if (ambient_elated_options()->getOptionValue('standard_number_of_chars')) {
			$number_of_chars['standard'] = ambient_elated_options()->getOptionValue('standard_number_of_chars');
		}
		if (ambient_elated_options()->getOptionValue('masonry_number_of_chars')) {
			$number_of_chars['masonry'] = ambient_elated_options()->getOptionValue('masonry_number_of_chars');
			$number_of_chars['masonry-full-width'] = ambient_elated_options()->getOptionValue('masonry_number_of_chars');
		}

		return $number_of_chars;
	}
}

if (!function_exists('ambient_elated_excerpt_length')) {
	/**
	 * Function that changes excerpt length based on theme options
	 *
	 * @param $length int original value
	 *
	 * @return int changed value
	 */
	function ambient_elated_excerpt_length($length) {

		if (ambient_elated_options()->getOptionValue('number_of_chars') !== '') {
			return esc_attr(ambient_elated_options()->getOptionValue('number_of_chars'));
		} else {
			return 45;
		}
	}

	add_filter('excerpt_length', 'ambient_elated_excerpt_length', 999);
}

if (!function_exists('ambient_elated_post_has_read_more')) {
	/**
	 * Function that checks if current post has read more tag set
	 * @return int position of read more tag text. It will return false if read more tag isn't set
	 */
	function ambient_elated_post_has_read_more() {
		global $post;

		return strpos($post->post_content, '<!--more-->');
	}
}

if (!function_exists('ambient_elated_post_has_title')) {
	/**
	 * Function that checks if current post has title or not
	 * @return bool
	 */
	function ambient_elated_post_has_title() {
		return get_the_title() !== '';
	}
}

if (!function_exists('ambient_elated_modify_read_more_link')) {
	/**
	 * Function that modifies read more link output.
	 * Hooks to the_content_more_link
	 * @return string modified output
	 */
	function ambient_elated_modify_read_more_link() {
		$link = '<div class="eltdf-more-link-container">';

		$link .= '<a itemprop="url" href="' . get_permalink() . '#more-' . get_the_ID() . '" target="_self" class="eltdf-btn eltdf-btn-medium eltdf-btn-solid"><span class="eltdf-btn-text">' . esc_html__('CONTINUE READING', 'ambient') . '</span></a>';

		$link .= '</div>';

		return $link;
	}

	add_filter('the_content_more_link', 'ambient_elated_modify_read_more_link');
}

if (!function_exists('ambient_elated_has_blog_widget')) {
	/**
	 * Function that checks if latest posts widget is added to widget area
	 * @return bool
	 */
	function ambient_elated_has_blog_widget() {
		$widgets_array = array(
			'eltdf_blog_list_widget'
		);

		foreach ($widgets_array as $widget) {
			$active_widget = is_active_widget(false, false, $widget);

			if ($active_widget) {
				return true;
			}
		}

		return false;
	}
}

if (!function_exists('ambient_elated_has_blog_shortcode')) {
	/**
	 * Function that checks if any of blog shortcodes exists on a page
	 * @return bool
	 */
	function ambient_elated_has_blog_shortcode() {
		$blog_shortcodes = array(
			'eltdf_blog_list'
		);

		$slider_field = get_post_meta(ambient_elated_get_page_id(), 'eltdf_page_slider_meta', true); //TODO change

		foreach ($blog_shortcodes as $blog_shortcode) {
			$has_shortcode = ambient_elated_has_shortcode($blog_shortcode) || ambient_elated_has_shortcode($blog_shortcode, $slider_field);

			if ($has_shortcode) {
				return true;
			}
		}

		return false;
	}
}

if (!function_exists('ambient_elated_read_more_button')) {
	/**
	 * Function that outputs read more button html if necessary.
	 * It checks if read more button should be outputted only if option for given template is enabled and post does'nt have read more tag
	 * and if post isn't password protected
	 *
	 * @param string $option name of option to check
	 * @param string $class additional class to add to button
	 *
	 */
	function ambient_elated_read_more_button($option = '', $class = '') {
		if ($option != '') {
			$show_read_more_button = ambient_elated_options()->getOptionValue($option) == 'yes';
		} else {
			$show_read_more_button = 'yes';
		}
		if ($show_read_more_button && !ambient_elated_post_has_read_more() && !post_password_required()) {
			if (isset($shortcode_tags['eltdf_button'])) {
				echo ambient_elated_get_button_html(array(
					'type'         => 'simple',
					'size'         => 'medium',
					'link'         => get_the_permalink(),
					'text'         => esc_html__('Read More', 'ambient'),
					'custom_class' => $class
				));
			} else {
				$link_htnl = '<a itemprop="url" class="eltdf-btn eltdf-btn-medium eltdf-btn-simple eltdf-blog-list-button" href="' . get_the_permalink() . '" target="_self">' . esc_html__('Read More', 'ambient') . '</a>';

				echo wp_kses($link_htnl, array(
					'a' => array(
						'itemprop' => array(),
						'class'    => array(),
						'href'     => array(),
						'target'   => array(),
						'title'    => array()
					)
				));
			}
		}
	}
}

if (!function_exists('ambient_elated_set_blog_holder_data_params')) {
	/**
	 * Function which set data params on blog holder div
	 */
	function ambient_elated_set_blog_holder_data_params() {

		$show_load_more = ambient_elated_enable_load_more();
		if ($show_load_more) {
			$current_query = ambient_elated_get_blog_query();

			$data_params = array();
			$data_return_string = '';

			$paged = ambient_elated_paged();

			$posts_number = '';
			if (get_post_meta(get_the_ID(), "eltdf_show_posts_per_page_meta", true) != "") {
				$posts_number = get_post_meta(get_the_ID(), "eltdf_show_posts_per_page_meta", true);
			} else {
				$posts_number = get_option('posts_per_page');
			}
			$category = get_post_meta(ambient_elated_get_page_id(), 'eltdf_blog_category_meta', true);

			//set data params
			$data_params['data-next-page'] = $paged + 1;
			$data_params['data-max-pages'] = $current_query->max_num_pages;

			if ($posts_number != '') {
				$data_params['data-post-number'] = $posts_number;
			}

			if ($category != '') {
				$data_params['data-category'] = $category;
			}
			if (is_archive()) {
				if (is_category()) {
					$cat_id = get_queried_object_id();
					$data_params['data-archive-category'] = $cat_id;
				}
				if (is_author()) {
					$author_id = get_queried_object_id();
					$data_params['data-archive-author'] = $author_id;
				}
				if (is_tag()) {
					$current_tag_id = get_queried_object_id();
					$data_params['data-archive-tag'] = $current_tag_id;
				}
				if (is_date()) {
					$day = get_query_var('day');
					$month = get_query_var('monthnum');
					$year = get_query_var('year');

					$data_params['data-archive-day'] = $day;
					$data_params['data-archive-month'] = $month;
					$data_params['data-archive-year'] = $year;
				}
			}
			if (is_search()) {
				$search_query = get_search_query();
				$data_params['data-archive-search-string'] = $search_query; // to do, not finished
			}

			foreach ($data_params as $key => $value) {
				if ($key !== '') {
					$data_return_string .= $key . '= ' . esc_attr($value) . ' ';
				}
			}

			return $data_return_string;
		}
	}
}

if (!function_exists('ambient_elated_enable_load_more')) {
	/**
	 * Function that check if load more is enabled
	 *
	 * return boolean
	 */
	function ambient_elated_enable_load_more() {
		$enable_load_more = false;

		if (ambient_elated_options()->getOptionValue('enable_load_more_pag') == 'yes') {
			$enable_load_more = true;
		}

		return $enable_load_more;
	}
}

if (!function_exists('ambient_elated_is_masonry_template')) {
	/**
	 * Check if is masonry template enabled
	 * return boolean
	 */
	function ambient_elated_is_masonry_template() {
		$page_id = ambient_elated_get_page_id();
		$page_template = get_page_template_slug($page_id);
		$page_options_template = ambient_elated_options()->getOptionValue('blog_list_type');

		if (!is_archive()) {
			if ($page_template == 'blog-masonry.php' || $page_template == 'blog-masonry-full-width.php') {
				return true;
			}
		} elseif (is_archive() || is_home()) {
			if ($page_options_template == 'masonry' || $page_options_template == 'masonry-full-width') {
				return true;
			}
		} else {
			return false;
		}
	}
}

if (!function_exists('ambient_elated_set_ajax_url')) {
	/**
	 * load themes ajax functionality
	 */
	function ambient_elated_set_ajax_url() {
		echo '<script type="application/javascript">var eltdfAjaxUrl = "' . admin_url('admin-ajax.php') . '"</script>';
	}

	add_action('wp_enqueue_scripts', 'ambient_elated_set_ajax_url');
}

/**
 * Loads more function for blog posts.
 *
 */
if (!function_exists('ambient_elated_blog_load_more')) {

	function ambient_elated_blog_load_more() {
		$return_obj = array();
		$paged = $post_number = $category = $blog_type = '';
		$archive_category = $archive_author = $archive_tag = $archive_day = $archive_month = $archive_year = '';

		if (!empty($_POST['nextPage'])) {
			$paged = $_POST['nextPage'];
		}
		if (!empty($_POST['number'])) {
			$post_number = $_POST['number'];
		}
		if (!empty($_POST['category'])) {
			$category = $_POST['category'];
		}
		if (!empty($_POST['blogType'])) {
			$blog_type = $_POST['blogType'];
		}
		if (!empty($_POST['archiveCategory'])) {
			$archive_category = $_POST['archiveCategory'];
		}
		if (!empty($_POST['archiveAuthor'])) {
			$archive_author = $_POST['archiveAuthor'];
		}
		if (!empty($_POST['archiveTag'])) {
			$archive_tag = $_POST['archiveTag'];
		}
		if (!empty($_POST['archiveDay'])) {
			$archive_day = $_POST['archiveDay'];
		}
		if (!empty($_POST['archiveMonth'])) {
			$archive_month = $_POST['archiveMonth'];
		}
		if (!empty($_POST['archiveYear'])) {
			$archive_year = $_POST['archiveYear'];
		}

		$html = '';
		$query_array = array(
			'post_status'    => 'publish',
			'post_type'      => 'post',
			'paged'          => $paged,
			'posts_per_page' => $post_number,
			'post__not_in'   => get_option('sticky_posts')
		);
		if ($category != '') {
			$query_array['cat'] = $category;
		}
		if ($archive_category != '') {
			$query_array['cat'] = $archive_category;
		}
		if ($archive_author != '') {
			$query_array['author'] = $archive_author;
		}
		if ($archive_tag != '') {
			$query_array['tag'] = $archive_tag;
		}
		if ($archive_day != '' && $archive_month != '' && $archive_year != '') {
			$query_array['day'] = $archive_day;
			$query_array['monthnum'] = $archive_month;
			$query_array['year'] = $archive_year;
		}
		$query_results = new \WP_Query($query_array);

		if ($query_results->have_posts()):
			while ($query_results->have_posts()) : $query_results->the_post();
				$html .= ambient_elated_get_post_format_html($blog_type, 'yes');
			endwhile;
		else:
			$html .= '<p>' . esc_html__('Sorry, no posts matched your criteria.', 'ambient') . '</p>';
		endif;

		$return_obj = array(
			'html' => $html,
		);

		echo json_encode($return_obj);
		exit;
	}
}

add_action('wp_ajax_nopriv_ambient_elated_blog_load_more', 'ambient_elated_blog_load_more');
add_action('wp_ajax_ambient_elated_blog_load_more', 'ambient_elated_blog_load_more');

if (!function_exists('ambient_elated_get_post_by_ajax')) {
	/**
	 * Function loads page content via ajax
	 */
	function ambient_elated_get_post_by_ajax() {
		global $wp_query;

		$item_id = $html = '';

		if (!empty($_POST['currentPostUrl'])) {
			$item_id = url_to_postid($_POST['currentPostUrl']);
		}

		$query_array = array(
			'post_status' => 'publish',
			'post_type'   => 'post',
			'p'           => $item_id
		);

		$query_results = new \WP_Query($query_array);

		$wp_query = $query_results;

		if ($query_results->have_posts()):
			while ($query_results->have_posts()) : $query_results->the_post();
				$html .= ambient_elated_get_single_html('yes');
			endwhile;
		else:
			$html .= ambient_elated_get_module_template_part('templates/parts/no-posts', 'blog');
		endif;

		$return_obj = array(
			'html' => $html
		);

		$wp_query = null;

		echo json_encode($return_obj);
		exit;
	}
}

add_action('wp_ajax_nopriv_ambient_elated_get_post_by_ajax', 'ambient_elated_get_post_by_ajax');
add_action('wp_ajax_ambient_elated_get_post_by_ajax', 'ambient_elated_get_post_by_ajax');

if (!function_exists('ambient_elated_get_max_number_of_pages')) {
	/**
	 * Function that return max number of posts/pages for pagination
	 * @return int
	 *
	 * @version 0.1
	 */
	function ambient_elated_get_max_number_of_pages() {
		global $wp_query;

		$max_number_of_pages = 10; //default value

		if ($wp_query) {
			$max_number_of_pages = $wp_query->max_num_pages;
		}

		return $max_number_of_pages;
	}
}

if (!function_exists('ambient_elated_get_blog_page_range')) {
	/**
	 * Function that return current page for blog list pagination
	 * @return int
	 *
	 * @version 0.1
	 */
	function ambient_elated_get_blog_page_range($query = '') {
		global $wp_query;

		if ($query == '') {
			$query = $wp_query;
		}

		if (ambient_elated_options()->getOptionValue('blog_page_range') != "") {
			$blog_page_range = esc_attr(ambient_elated_options()->getOptionValue('blog_page_range'));
		} else {
			$blog_page_range = $query->max_num_pages;
		}

		return $blog_page_range;
	}
}
?>