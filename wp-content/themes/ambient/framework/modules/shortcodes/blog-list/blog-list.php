<?php
namespace AmbientElatedNamespace\Modules\Shortcodes\BlogList;

use AmbientElatedNamespace\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class BlogList
 */
class BlogList implements ShortcodeInterface {
	/**
	* @var string
	*/
	private $base;
	
	function __construct() {
		$this->base = 'eltdf_blog_list';
		
		add_action('vc_before_init', array($this,'vcMap'));
		
		//Category filter
		add_filter( 'vc_autocomplete_eltdf_blog_list_category_callback', array( &$this, 'blogCategoryAutocompleteSuggester', ), 10, 1 ); // Get suggestion(find). Must return an array
		
		//Category render
		add_filter( 'vc_autocomplete_eltdf_blog_list_category_render', array( &$this, 'blogCategoryAutocompleteRender', ), 10, 1 ); // Get suggestion(find). Must return an array
		
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name' => esc_html__('Elated Blog List', 'ambient'),
			'base' => $this->base,
			'icon' => 'icon-wpb-blog-list extended-custom-icon',
			'category' => esc_html__('by ELATED', 'ambient'),
			'allowed_container_element' => 'vc_row',
			'params' => array(
					array(
						'type'       => 'dropdown',
						'param_name' => 'type',
						'heading'    => esc_html__('Type', 'ambient'),
						'value'      => array(
							esc_html__('Standard', 'ambient') => 'standard',
							esc_html__('Boxed', 'ambient') => 'boxed',
							esc_html__('Masonry', 'ambient') => 'masonry',
							esc_html__('Simple', 'ambient') => 'simple',
							esc_html__('Classic (text only)', 'ambient') => 'classic'
						),
						'save_always' => true
					),
					array(
						'type'       => 'textfield',
						'param_name' => 'number_of_posts',
						'heading'    => esc_html__('Number of Posts', 'ambient')
					),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'number_of_columns',
                        'heading'    => esc_html__('Number of Columns', 'ambient'),
                        'value'      => array(
							esc_html__('One', 'ambient') => '1',
							esc_html__('Two', 'ambient') => '2',
							esc_html__('Three', 'ambient') => '3',
							esc_html__('Four', 'ambient') => '4'
                        ),
                        'save_always' => true
                    ),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'space_between_columns',
                        'heading'    => esc_html__('Space Between Columns', 'ambient'),
                        'value' => array(
	                        esc_html__('Normal', 'ambient') => 'normal',
	                        esc_html__('Small', 'ambient') => 'small',
	                        esc_html__('Tiny', 'ambient') => 'tiny',
	                        esc_html__('No Space', 'ambient') => 'no'
                        ),
                        'save_always' => true
                    ),
					array(
						'type'       => 'dropdown',
						'param_name' => 'order_by',
						'heading'    => esc_html__('Order By', 'ambient'),
						'value'      => array(
							esc_html__('Title', 'ambient') => 'title',
							esc_html__('Date', 'ambient') => 'date',
							esc_html__('Random', 'ambient') => 'rand',
							esc_html__('Post Name', 'ambient') => 'name'
						),
						'save_always' => true
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'order',
						'heading'    => esc_html__('Order', 'ambient'),
						'value'      => array(
							esc_html__('ASC', 'ambient') => 'ASC',
							esc_html__('DESC', 'ambient') => 'DESC'
						),
						'save_always' => true
					),
					array(
						'type'        => 'autocomplete',
						'param_name'  => 'category',
						'heading'     => esc_html__('Category', 'ambient'),
						'description' => esc_html__('Enter one category slug (leave empty for showing all categories)', 'ambient')
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'image_size',
						'heading'    => esc_html__('Image Size', 'ambient'),
						'value'      => array(
							esc_html__('Original', 'ambient') => 'full',
							esc_html__('Square', 'ambient') => 'square',
							esc_html__('Landscape', 'ambient') => 'landscape',
							esc_html__('Portrait', 'ambient') => 'portrait',
							esc_html__('Medium', 'ambient') => 'medium',
							esc_html__('Large', 'ambient') => 'large'
                        ),
						'save_always' => true,
						'dependency'  => Array('element' => 'type', 'value' => array('standard', 'boxed', 'masonry'))
					),
					array(
						'type'        => 'colorpicker',
						'param_name'  => 'box_color',
						'heading'     => esc_html__('Content Box Color', 'ambient'),
						'dependency'  => Array('element' => 'type', 'value' => array('boxed', 'masonry'))
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'title_tag',
						'heading'     => esc_html__('Title Tag', 'ambient'),
						'value'       => array_flip(ambient_elated_get_title_tag(true)),
						'save_always' => true,
						'dependency'  => Array('element' => 'type', 'value' => array('standard', 'boxed', 'masonry', 'simple'))
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'title_transform',
						'heading'     => esc_html__('Title Text Transform', 'ambient'),
						'value'       => array_flip(ambient_elated_get_text_transform_array(true)),
						'save_always' => true
					),
					array(
						'type'        => 'textfield',
						'param_name'  => 'text_length',
						'heading'     => esc_html__('Text Length', 'ambient'),
						'description' => esc_html__('Number of characters', 'ambient'),
						'dependency'  => Array('element' => 'type', 'value' => array('standard', 'boxed', 'masonry')),
					),
                    array(
                        'type'        => 'dropdown',
                        'param_name'  => 'post_info_section',
                        'heading'     => esc_html__('Enable Post Info Section', 'ambient'),
                        'value'       => array_flip(ambient_elated_get_yes_no_select_array(false, true)),
                        'save_always' => true,
                        'dependency'  => Array('element' => 'type', 'value' => array('standard', 'boxed', 'masonry')),
                    ),
                    array(
                        'type'        => 'dropdown',
                        'param_name'  => 'post_info_author',
                        'heading'     => esc_html__('Enable Post Info Author', 'ambient'),
                        'value'       => array_flip(ambient_elated_get_yes_no_select_array(false, true)),
                        'save_always' => true,
                        'dependency'  => Array('element' => 'post_info_section', 'value' => array('yes'))
                    ),
                    array(
                        'type'        => 'dropdown',
                        'param_name'  => 'post_info_date',
                        'heading'     => esc_html__('Enable Post Info Date', 'ambient'),
                        'value'       => array_flip(ambient_elated_get_yes_no_select_array(false, true)),
                        'save_always' => true,
                        'dependency'  => Array('element' => 'post_info_section', 'value' => array('yes'))
                    ),
                    array(
                        'type'        => 'dropdown',
                        'param_name'  => 'post_info_category',
                        'heading'     => esc_html__('Enable Post Info Category', 'ambient'),
                        'value'       => array_flip(ambient_elated_get_yes_no_select_array(false, true)),
                        'save_always' => true,
                        'dependency'  => Array('element' => 'post_info_section', 'value' => array('yes'))
                    ),
                    array(
                        'type'        => 'dropdown',
                        'param_name'  => 'post_info_comments',
                        'heading'     => esc_html__('Enable Post Info Comments', 'ambient'),
                        'value'       => array_flip(ambient_elated_get_yes_no_select_array(false)),
                        'save_always' => true,
                        'dependency'  => Array('element' => 'post_info_section', 'value' => array('yes'))
                    ),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'post_info_like',
						'heading'     => esc_html__('Enable Post Info Like', 'ambient'),
						'value'       => array_flip(ambient_elated_get_yes_no_select_array(false)),
						'save_always' => true,
						'dependency'  => Array('element' => 'post_info_section', 'value' => array('yes'))
					),
                    array(
                        'type'        => 'dropdown',
                        'param_name'  => 'post_info_share',
                        'heading'     => esc_html__('Enable Post Info Share', 'ambient'),
                        'value'       => array_flip(ambient_elated_get_yes_no_select_array(false)),
                        'save_always' => true,
                        'dependency'  => Array('element' => 'post_info_section', 'value' => array('yes'))
                    ),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'post_info_tags',
						'heading'     => esc_html__('Enable Post Info Tags', 'ambient'),
						'value'       => array_flip(ambient_elated_get_yes_no_select_array(false)),
						'save_always' => true,
						'dependency'  => Array('element' => 'post_info_section', 'value' => array('yes'))
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'enable_read_more_button',
						'heading'     => esc_html__('Enable Read More Button', 'ambient'),
						'value'       => array_flip(ambient_elated_get_yes_no_select_array(false, true)),
						'save_always' => true,
						'dependency'  => Array('element' => 'type', 'value' => array('standard', 'boxed', 'masonry')),
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'enable_load_more_button',
						'heading'     => esc_html__('Enable Load More Button', 'ambient'),
						'value'       => array_flip(ambient_elated_get_yes_no_select_array(false)),
						'save_always' => true,
						'dependency'  => Array('element' => 'type', 'value' => array('standard', 'boxed', 'masonry')),
					)
				)
		) );
	}

	public function render($atts, $content = null) {
		$default_atts = array(
			'type'                    => 'boxed',
            'number_of_posts'         => '-1',
            'number_of_columns'       => '',
            'space_between_columns'   => 'normal',
			'category'                => '',
			'order_by'                => '',
			'order'                   => '',
			'image_size'              => 'full',
			'box_color'               => '',
            'title_tag'               => 'h4',
            'title_transform'         => '',
			'text_length'             => '90',
            'post_info_section'       => 'yes',
			'post_info_author'        => 'yes',
			'post_info_date'          => 'yes',
			'post_info_category'      => 'yes',
			'post_info_comments'      => 'no',
			'post_info_like'          => 'no',
			'post_info_share'         => 'no',
			'post_info_tags'          => 'no',
			'enable_read_more_button' => 'yes',
			'enable_load_more_button' => 'no'
        );

		$params = shortcode_atts($default_atts, $atts);
		extract($params);

		$params = $this->validate_params($params, $default_atts);

		$params['holder_classes'] = $this->getBlogHolderClasses($params);
	
		$queryArray = $this->generateBlogQueryArray($params);
		$query_result = new \WP_Query($queryArray);
		$params['query_result'] = $query_result;

		$params['box_styles'] = $this->getBoxStyles($params);
		$params['title_styles'] = $this->getTitleStyles($params);
		$params['thumb_image_size'] = $this->generateImageSize($params);

		$params['data_atts'] = $this->getDataAtts($params);

		$html ='';
		
        $html .= ambient_elated_get_shortcode_module_template_part('templates/blog-list-holder', 'blog-list', '', $params);
		
		return $html;	
	}

	/**
	 * Validates params
	 *
	 * @param $params
	 * @param $defaults
	 *
	 * @return array
	 */
	private function validate_params($params, $defaults) {
		$params_validation_rules = array(
			'dropdown' => array(
				'type' => array('standard', 'boxed', 'masonry', 'simple', 'classic'),
				'title_tag' => array('h1', 'h2', 'h3', 'h4', 'h5', 'h6')
			)
		);

		foreach ($params_validation_rules as $validation_type => $validation_standards) {

			switch ($validation_type) {

				case 'dropdown':

					foreach ($validation_standards as $type => $valid_values) {

						if (!in_array($params[$type], $valid_values)) {

							$params[$type] = $defaults[$type];
						}
					}

					break;
				default:
					break;
			}
		}

		return $params;
	}

	/**
	   * Generates holder classes
	   *
	   * @param $params
	   *
	   * @return string
	*/
	private function getBlogHolderClasses($params){
		$holderClasses = '';

		$holderClasses .= !empty($params['number_of_columns']) ? ' eltdf-blog-list-columns-' . $params['number_of_columns'] : ' eltdf-blog-list-columns-3';
		$holderClasses .= !empty($params['space_between_columns']) ? ' eltdf-blog-list-' . $params['space_between_columns'] . '-space' : ' eltdf-blog-list-normal-space';

		if(!empty($params['type'])){
			switch($params['type']){
				case 'standard' :
                    $holderClasses .= ' eltdf-standard';
                break;
				case 'boxed':
					$holderClasses .= ' eltdf-boxed';
					break;
				case 'masonry':
					$holderClasses .= ' eltdf-masonry';
					break;
				case 'simple':
                    $holderClasses .= ' eltdf-simple';
                    break;
				case 'classic':
					$holderClasses .= ' eltdf-classic';
					break;
				default: 
					$holderClasses .= ' eltdf-boxed';
			}
		}

		if($params['enable_load_more_button'] === 'yes' && ($params['type'] === 'standard' || $params['type'] === 'boxed' || $params['type'] === 'masonry')) {
			$holderClasses .= ' eltdf-load-more-pag-enabled';
		}
		
		return $holderClasses;
	}

	/**
	   * Generates query array
	   *
	   * @param $params
	   *
	   * @return array
	*/
	public function generateBlogQueryArray($params){
		$queryArray = array(
			'post_status' => 'publish',
			'post_type' => 'post',
			'orderby' => $params['order_by'],
			'order' => $params['order'],
			'posts_per_page' => $params['number_of_posts'],
			'category_name' => $params['category']
		);

		return $queryArray;
	}

	/**
	   * Generates image size option
	   *
	   * @param $params
	   *
	   * @return string
	*/
	public function generateImageSize($params){
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

		return $thumb_size;
	}

	/**
	 * Returns array of box styles
	 *
	 * @param $params
	 *
	 * @return array
	 */
	public function getBoxStyles($params) {
		$styles = array();

		if(!empty($params['box_color']) && ($params['type'] === 'boxed' || $params['type'] === 'masonry')) {
			$styles[] = 'background-color: '.$params['box_color'];
		}

		return $styles;
	}

	/**
	 * Return Style for Title
	 *
	 * @param $params
	 * @return string
	 */
	private function getTitleStyles($params) {
		$styles = array();

		if ($params['title_transform'] !== '') {
			$styles[] = 'text-transform: '.$params['title_transform'];
		}

		return implode(';', $styles);
	}

	/**
	 * Generates datta attributes array
	 *
	 * @param $params
	 *
	 * @return array
	 */
	public function getDataAtts($params){
		$data_attr = array();
		$data_return_string = '';

		if(get_query_var('paged')) {
			$paged = get_query_var('paged');
		} elseif(get_query_var('page')) {
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}

		$query_result = $params['query_result'];

		$data_attr['data-max-num-pages'] = $query_result->max_num_pages;

		if(!empty($paged)) {
			$data_attr['data-next-page'] = $paged+1;
		}
		if(!empty($params['type'])){
			$data_attr['data-type'] = $params['type'];
		}
		if(!empty($params['number_of_posts'])){
			$data_attr['data-number-of-posts'] = $params['number_of_posts'];
		}
		if(!empty($params['number_of_columns'])){
			$data_attr['data-number-of-columns'] = $params['number_of_columns'];
		}
		if(!empty($params['image_size'])){
			$data_attr['data-image-size'] = $params['image_size'];
		}
		if(!empty($params['order_by'])){
			$data_attr['data-order-by'] = $params['order_by'];
		}
		if(!empty($params['order'])){
			$data_attr['data-order'] = $params['order'];
		}
		if(!empty($params['category'])){
			$data_attr['data-category'] = $params['category'];
		}
		if(!empty($params['box_color'])){
			$data_attr['data-box-color'] = $params['box_color'];
		}
		if(!empty($params['title_tag'])){
			$data_attr['data-title-tag'] = $params['title_tag'];
		}
		if($params['text_length'] !== ''){
			$data_attr['data-text-length'] = $params['text_length'];
		}
		if(!empty($params['post_info_section'])){
			$data_attr['data-post-info-section'] = $params['post_info_section'];
		}
		if(!empty($params['post_info_author'])){
			$data_attr['data-post-info-author'] = $params['post_info_author'];
		}
		if(!empty($params['post_info_date'])){
			$data_attr['data-post-info-date'] = $params['post_info_date'];
		}
		if(!empty($params['post_info_category'])){
			$data_attr['data-post-info-category'] = $params['post_info_category'];
		}
		if(!empty($params['post_info_comments'])){
			$data_attr['data-post-info-comments'] = $params['post_info_comments'];
		}
		if(!empty($params['post_info_like'])){
			$data_attr['data-post-info-like'] = $params['post_info_like'];
		}
		if(!empty($params['post_info_share'])){
			$data_attr['data-post-info-share'] = $params['post_info_share'];
		}
		if(!empty($params['post_info_tags'])){
			$data_attr['data-post-info-tags'] = $params['post_info_tags'];
		}
		if(!empty($params['enable_read_more_button'])){
			$data_attr['data-enable-read-more-button'] = $params['enable_read_more_button'];
		}
		if(!empty($params['enable_load_more_button'])){
			$data_attr['data-enable-load-more-button'] = $params['enable_load_more_button'];
		}

		foreach($data_attr as $key => $value) {
			if($key !== '') {
				$data_return_string .= $key.'= '.esc_attr($value).' ';
			}
		}
		
		return $data_return_string;
	}
	
	/**
	 * Filter blog categories
	 *
	 * @param $query
	 *
	 * @return array
	 */
	public function blogCategoryAutocompleteSuggester( $query ) {
		global $wpdb;
		$post_meta_infos       = $wpdb->get_results( $wpdb->prepare( "SELECT a.slug AS slug, a.name AS category_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'category' AND a.name LIKE '%%%s%%'", stripslashes( $query ) ), ARRAY_A );
		
		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data          = array();
				$data['value'] = $value['slug'];
				$data['label'] = ( ( strlen( $value['category_title'] ) > 0 ) ? esc_html__( 'Category', 'ambient' ) . ': ' . $value['category_title'] : '' );
				$results[]     = $data;
			}
		}
		
		return $results;
	}
	
	/**
	 * Find blog category by slug
	 * @since 4.4
	 *
	 * @param $query
	 *
	 * @return bool|array
	 */
	public function blogCategoryAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get portfolio category
			$category = get_term_by( 'slug', $query, 'category' );
			if ( is_object( $category ) ) {
				
				$category_slug = $category->slug;
				$category_title = $category->name;
				
				$category_title_display = '';
				if ( ! empty( $category_title ) ) {
					$category_title_display = esc_html__( 'Category', 'ambient' ) . ': ' . $category_title;
				}
				
				$data          = array();
				$data['value'] = $category_slug;
				$data['label'] = $category_title_display;
				
				return ! empty( $data ) ? $data : false;
			}
			
			return false;
		}
		
		return false;
	}
}