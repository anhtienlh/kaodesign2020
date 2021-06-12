<?php

/**
 * Loads more function for portfolio.
 *
 */
if(!function_exists('eltd_core_portfolio_ajax_load_more')) {
	
	function eltd_core_portfolio_ajax_load_more() {
		$shortcode_params = array();
		
		if (!empty($_POST['type'])) {
			$shortcode_params['type'] = $_POST['type'];
		}
		if(!empty($_POST['numberOfColumns'])){
			$shortcode_params['columns'] = $_POST['numberOfColumns'];
		}
		if(!empty($_POST['spaceBetweenItems'])){
			$shortcode_params['space_between_items'] = $_POST['spaceBetweenItems'];
		}
		if(!empty($_POST['numberOfItems'])){
			$shortcode_params['number_of_items'] = $_POST['numberOfItems'];
		}
		if(!empty($_POST['imageProportions'])){
			$shortcode_params['image_proportions'] = $_POST['imageProportions'];
		}
		if(!empty($_POST['category'])){
			$shortcode_params['category'] = $_POST['category'];
		}
		if(!empty($_POST['selectedProjects'])){
			$shortcode_params['selected_projects'] = $_POST['selectedProjects'];
		}
		if(!empty($_POST['tag'])){
			$shortcode_params['tag'] = $_POST['tag'];
		}
		if(!empty($_POST['orderBy'])){
			$shortcode_params['order_by'] = $_POST['orderBy'];
		}
		if(!empty($_POST['order'])){
			$shortcode_params['order'] = $_POST['order'];
		}
		if(!empty($_POST['infoPosition'])){
			$shortcode_params['info_position'] = $_POST['infoPosition'];
		}
		if(!empty($_POST['imageHoverType1'])){
			$shortcode_params['image_hover_type1'] = $_POST['imageHoverType1'];
		}
		if(!empty($_POST['imageHoverType2'])){
			$shortcode_params['image_hover_type2'] = $_POST['imageHoverType2'];
		}
		if(!empty($_POST['overlayBackgroundColor1'])){
			$shortcode_params['overlay_background_color1'] = $_POST['overlayBackgroundColor1'];
		}
		if(!empty($_POST['overlayContentColor1'])){
			$shortcode_params['overlay_content_color1'] = $_POST['overlayContentColor1'];
		}
		if(!empty($_POST['overlayContentVAlign1'])){
			$shortcode_params['overlay_content_v_align1'] = $_POST['overlayContentVAlign1'];
		}
		if(!empty($_POST['overlayContentHAlign1'])){
			$shortcode_params['overlay_content_h_align1'] = $_POST['overlayContentHAlign1'];
		}
		if(!empty($_POST['shaderBackgroundColor'])){
			$shortcode_params['shader_background_color'] = $_POST['shaderBackgroundColor'];
		}
		if(!empty($_POST['contentTopMargin'])){
			$shortcode_params['content_top_margin'] = $_POST['contentTopMargin'];
		}
		if(!empty($_POST['contentBottomMargin'])){
			$shortcode_params['content_bottom_margin'] = $_POST['contentBottomMargin'];
		}
		if(!empty($_POST['contentTextAlign'])){
			$shortcode_params['content_text_align'] = $_POST['contentTextAlign'];
		}
		if(!empty($_POST['disableTitle'])){
			$shortcode_params['disable_title'] = $_POST['disableTitle'];
		}
		if(!empty($_POST['titleTag'])){
			$shortcode_params['title_tag'] = $_POST['titleTag'];
		}
		if(!empty($_POST['titleTextTransform'])){
			$shortcode_params['title_text_transform'] = $_POST['titleTextTransform'];
		}
		if(!empty($_POST['disableCategory'])){
			$shortcode_params['disable_category'] = $_POST['disableCategory'];
		}
		if(!empty($_POST['disableExcerpt'])){
			$shortcode_params['disable_excerpt'] = $_POST['disableExcerpt'];
		}
		if($_POST['excerptLength'] !== ''){
			$shortcode_params['excerpt_length'] = $_POST['excerptLength'];
		}
		if (!empty($_POST['enableHoverDirection'])) {
			$shortcode_params['enable_hover_direction'] = $_POST['enableHoverDirection'];
		}
		if (!empty($_POST['nextPage'])) {
			$shortcode_params['next_page'] = $_POST['nextPage'];
		}
		
		$html = '';
		
		$port_list = new \ElatedCore\CPT\Portfolio\Shortcodes\PortfolioList();
		
		$query_array = $port_list->getQueryArray($shortcode_params);
		$query_results = new \WP_Query($query_array);
		
		if($query_results->have_posts()):
			while ( $query_results->have_posts() ) : $query_results->the_post();
				
				$shortcode_params['current_id'] = get_the_ID();
				$shortcode_params['article_classes'] = $port_list->getArticleClasses($shortcode_params);
				
				$shortcode_params['thumb_size'] = $port_list->getImageSize($shortcode_params);
				
				$shortcode_params['text_holder_styles'] = $port_list->getTextHolderStyles($shortcode_params);
				$shortcode_params['text_inner_styles'] = $port_list->getTextInnerStyles($shortcode_params);
				$shortcode_params['title_styles'] = $port_list->getTitleStyles($shortcode_params);
				$shortcode_params['excerpt_styles'] = $port_list->getExcerptStyles($shortcode_params);
				$shortcode_params['categories'] = $port_list->getItemCategories($shortcode_params);
				$shortcode_params['switch_featured_image'] = $port_list->getSwitchFeaturedImage($shortcode_params);
				$shortcode_params['category_html'] = $port_list->getItemCategoriesHtml($shortcode_params);
				$shortcode_params['item_link'] = $port_list->getItemLink($shortcode_params);
				
				$html .= eltd_core_get_shortcode_module_template_part('portfolio', 'portfolio-item', '', $shortcode_params);
			
			endwhile;
		else:
			$html .= '<p>'. esc_html__('Sorry, no posts matched your criteria.', 'eltdf-core') .'</p>';
		endif;
		
		$return_obj = array(
			'html' => $html,
		);
		
		echo json_encode($return_obj); exit;
	}
}

add_action('wp_ajax_nopriv_eltd_core_portfolio_ajax_load_more', 'eltd_core_portfolio_ajax_load_more');
add_action( 'wp_ajax_eltd_core_portfolio_ajax_load_more', 'eltd_core_portfolio_ajax_load_more' );