<?php 

/**
 * Loads more function for blog posts.
 *
 */
if(!function_exists('ambient_elated_blog_shortcode_load_more')){
	
	function ambient_elated_blog_shortcode_load_more(){
		$return_obj = array();
		$paged = 1;
		$post_number = -1;
		$type = $orderBy = $order = $category = '';

		if (!empty($_POST['nextPage'])) {
	        $paged = $_POST['nextPage'];
	    }
	    if (!empty($_POST['type'])) {
	        $type = $_POST['type'];
	    }
		if (!empty($_POST['numberOfPosts'])) {
	        $post_number = $_POST['numberOfPosts'];
	    }
	    if (!empty($_POST['orderBy'])) {
	        $orderby = $_POST['orderBy'];
	    }
	    if (!empty($_POST['order'])) {
	        $order = $_POST['order'];
	    }
		if (!empty($_POST['category'])) {
			$category = $_POST['category'];
		}

		$query_array = array(
			'post_status' => 'publish',
			'post_type' => 'post',
			'paged' => $paged,
			'posts_per_page' => $post_number,
			'post__not_in' => get_option( 'sticky_posts' )
		);

		if($category !== '') {
			$query_array['category_name'] = $category;
		}

		if($orderby !== '') {
			$query_array['orderby'] = $orderby;
		}

		if($order !== '') {
			$query_array['order'] = $order;
		}

		$query_results = new \WP_Query($query_array);

		$params = array();

		if (!empty($_POST['imageSize'])) {
	        $params['image_size'] = $_POST['imageSize'];
			
			$thumb_size = '';
			$image_size = $params['image_size'];
			
			switch ($image_size) {
				case 'landscape':
					$thumb_size = 'ambient_elated_landscape';
					break;
				case 'portrait':
					$thumb_size = 'ambient_elated_portrait';
					break;
				case 'square':
					$thumb_size = 'ambient_elated_square';
					break;
				case 'medium':
					$thumb_size = 'medium';
					break;
				case 'large':
					$thumb_size = 'large';
					break;
				case 'full':
					$thumb_size = 'full';
					break;
			}
			
			$params['thumb_image_size'] = $thumb_size;
	    }
	    if (!empty($_POST['titleTag'])) {
	        $params['title_tag'] = $_POST['titleTag'];
	    }
	    if ($_POST['textLength'] !== '') {
	        $params['text_length'] = $_POST['textLength'];
	    }
	    if (!empty($_POST['postInfoSection'])) {
	        $params['post_info_section'] = $_POST['postInfoSection'];
	    }
	    if (!empty($_POST['postInfoAuthor'])) {
	        $params['post_info_author'] = $_POST['postInfoAuthor'];
	    }
	    if (!empty($_POST['postInfoDate'])) {
	        $params['post_info_date'] = $_POST['postInfoDate'];
	    }
	    if (!empty($_POST['postInfoCategory'])) {
	        $params['post_info_category'] = $_POST['postInfoCategory'];
	    }
		if (!empty($_POST['boxColor']) && ($_POST['type'] === 'boxed' || $_POST['type'] === 'masonry')) {
			$styles = array();
			$styles[] = 'background-color: '.$_POST['boxColor'];

			$params['box_styles'] = $styles;
		}
	    if (!empty($_POST['postInfoComments'])) {
	        $params['post_info_comments'] = $_POST['postInfoComments'];
	    }
		if (!empty($_POST['postInfoLike'])) {
			$params['post_info_like'] = $_POST['postInfoLike'];
		}
	    if (!empty($_POST['postInfoShare'])) {
	        $params['post_info_share'] = $_POST['postInfoShare'];
	    }
		if (!empty($_POST['postInfoTags'])) {
			$params['post_info_tags'] = $_POST['postInfoTags'];
		}
	    if (!empty($_POST['enableReadMoreButton'])) {
	        $params['enable_read_more_button'] = $_POST['enableReadMoreButton'];
	    }
		if (!empty($_POST['enableLoadMoreButton'])) {
			$params['enable_load_more_button'] = $_POST['enableLoadMoreButton'];
		}

		$html = '';

		if($query_results->have_posts()):
			while ( $query_results->have_posts() ) : $query_results->the_post();
				$html .= ambient_elated_get_shortcode_module_template_part('templates/'.$type, 'blog-list', '', $params);
			endwhile;
			else:
				$html .= '<div class="eltdf-blog-list-messsage"><p>'. esc_html__('No posts were found.', 'ambient') .'</p></div>';
			endif;

		$return_obj = array(
			'html' => $html,
		);

		echo json_encode($return_obj); exit;
	}
}

add_action('wp_ajax_nopriv_ambient_elated_blog_shortcode_load_more', 'ambient_elated_blog_shortcode_load_more');
add_action( 'wp_ajax_ambient_elated_blog_shortcode_load_more', 'ambient_elated_blog_shortcode_load_more' );