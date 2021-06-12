<?php
namespace AmbientElatedNamespace\Modules\Shortcodes\ProductList;

use AmbientElatedNamespace\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class ProductList
 */
class ProductList implements ShortcodeInterface {
	/**
	* @var string
	*/
	private $base;
	
	function __construct() {
		$this->base = 'eltdf_product_list';
		
		add_action('vc_before_init', array($this,'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map( array(
			'name' => esc_html__('Elated Product List', 'ambient'),
			'base' => $this->base,
			'icon' => 'icon-wpb-product-list extended-custom-icon',
			'category' => esc_html__('by ELATED', 'ambient'),
			'allowed_container_element' => 'vc_row',
			'params' => array(
					array(
						'type'       => 'dropdown',
						'param_name' => 'type',
						'heading'    => esc_html__('Type', 'ambient'),
						'value'      => array(
							esc_html__('Standard', 'ambient') => 'standard',
							esc_html__('Masonry', 'ambient')  => 'masonry'
						),
						'admin_label' => true
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'info_position',
						'heading'    => esc_html__('Product Info Position', 'ambient'),
						'value'      => array(
							esc_html__('Info On Image Hover', 'ambient')  => 'info_on_image_hover',
							esc_html__('Info Below Image', 'ambient') => 'info_below_image'
						),
						'admin_label' => true
					),
					array(
						'type'       => 'textfield',
						'param_name' => 'number_of_posts',
						'heading'    => esc_html__('Number of Products', 'ambient')
					),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'number_of_columns',
                        'heading'    => esc_html__('Number of Columns', 'ambient'),
                        'value'      => array(
							esc_html__('One', 'ambient') => '1',
							esc_html__('Two', 'ambient') => '2',
							esc_html__('Three', 'ambient') => '3',
							esc_html__('Four', 'ambient') => '4',
							esc_html__('Five', 'ambient') => '5',
							esc_html__('Six', 'ambient') => '6'
                        )
                    ),
                    array(
						'type'       => 'dropdown',
						'param_name' => 'space_between_items',
						'heading'    => esc_html__('Space Between Items', 'ambient'),
						'value'      => array(
							esc_html__('Normal', 'ambient') => 'normal',
							esc_html__('Small', 'ambient') => 'small',
							esc_html__('Tiny', 'ambient') => 'tiny',
							esc_html__('No Space', 'ambient') => 'no'
						)
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'order_by',
						'heading'    => esc_html__('Order By', 'ambient'),
						'value' => array(
							esc_html__('Title', 'ambient') => 'title',
							esc_html__('Date', 'ambient') => 'date',
							esc_html__('Random', 'ambient') => 'rand',
							esc_html__('Post Name', 'ambient') => 'name',
							esc_html__('ID', 'ambient') => 'id',
							esc_html__('Menu Order', 'ambient') => 'menu_order'
						)
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'order',
						'heading'    => esc_html__('Order', 'ambient'),
						'value' => array(
							esc_html__('ASC', 'ambient') => 'ASC',
							esc_html__('DESC', 'ambient') => 'DESC'
						)
					),
					array(
	                    'type'       => 'dropdown',
	                    'param_name' => 'taxonomy_to_display',
	                    'heading'    => esc_html__('Choose Sorting Taxonomy', 'ambient'),
	                    'value' => array(
							esc_html__('Category', 'ambient') => 'category',
							esc_html__('Tag', 'ambient') => 'tag',
							esc_html__('Id', 'ambient') => 'id'
	                    ),
	                    'description' => esc_html__('If you would like to display only certain products, this is where you can select the criteria by which you would like to choose which products to display', 'ambient')
	                ),
	                array(
	                    'type'        => 'textfield',
	                    'param_name'  => 'taxonomy_values',
	                    'heading'     => esc_html__('Enter Taxonomy Values', 'ambient'),
	                    'description' => esc_html__('Separate values (category slugs, tags, or post IDs) with a comma', 'ambient')
	                ),
	                array(
						'type'       => 'dropdown',
						'param_name' => 'image_size',
						'heading'    => esc_html__('Image Proportions', 'ambient'),
						'value'      => array(
							esc_html__('Default', 'ambient') => '',
							esc_html__('Original', 'ambient') => 'full',
							esc_html__('Square', 'ambient') => 'square',
							esc_html__('Landscape', 'ambient') => 'landscape',
							esc_html__('Portrait', 'ambient') => 'portrait',
							esc_html__('Medium', 'ambient') => 'medium',
							esc_html__('Large', 'ambient') => 'large'
						),
						'save_always' => true
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'display_title',
						'heading'     => esc_html__('Display Title', 'ambient'),
						'value'       => array_flip(ambient_elated_get_yes_no_select_array(false, true)),
						'group'	      => esc_html__('Product Info', 'ambient')
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'product_info_skin',
						'heading'    => esc_html__('Product Info Skin', 'ambient'),
						'value'      => array(
							esc_html__('Default', 'ambient')  => 'default',
							esc_html__('Light', 'ambient') => 'light',
							esc_html__('Dark', 'ambient') => 'dark'
						),
						'dependency'  => array('element' => 'info_position', 'value' => array('info_on_image_hover')),
						'group'	      => esc_html__('Product Info Style', 'ambient')
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'title_tag',
						'heading'     => esc_html__('Title Tag', 'ambient'),
						'value'       => array_flip(ambient_elated_get_title_tag(true)),
						'save_always' => true,
						'dependency'  => array('element' => 'display_title', 'value' => array('yes')),
						'group'	      => esc_html__('Product Info Style', 'ambient')
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'title_transform',
						'heading'     => esc_html__('Title Text Transform', 'ambient'),
						'value'       => array_flip(ambient_elated_get_text_transform_array(true)),
						'save_always' => true,
						'dependency'  => array('element' => 'display_title', 'value' => array('yes')),
						'group'	      => esc_html__('Product Info Style', 'ambient')
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'display_category',
						'heading'     => esc_html__('Display Category', 'ambient'),
						'value'       => array_flip(ambient_elated_get_yes_no_select_array(false, true)),
						'group'	      => esc_html__('Product Info', 'ambient')
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'display_excerpt',
						'heading'     => esc_html__('Display Excerpt', 'ambient'),
						'value'       => array_flip(ambient_elated_get_yes_no_select_array(false)),
						'group'	      => esc_html__('Product Info', 'ambient')
					),
					array(
						'type'        => 'textfield',
						'param_name'  => 'excerpt_length',
						'heading'     => esc_html__('Excerpt Length', 'ambient'),
						'description' => esc_html__('Number of characters', 'ambient'),
						'dependency'  => array('element' => 'display_excerpt', 'value' => array('yes')),
						'group'	      => esc_html__('Product Info Style', 'ambient')
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'display_rating',
						'heading'     => esc_html__('Display Rating', 'ambient'),
						'value'       => array_flip(ambient_elated_get_yes_no_select_array(false)),
						'group'	      => esc_html__('Product Info', 'ambient')
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'display_price',
						'heading'     => esc_html__('Display Price', 'ambient'),
						'value'       => array_flip(ambient_elated_get_yes_no_select_array(false, true)),
						'group'	      => esc_html__('Product Info', 'ambient')
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'display_button',
						'heading'     => esc_html__('Display Button', 'ambient'),
						'value'       => array_flip(ambient_elated_get_yes_no_select_array(false, true)),
						'group'	      => esc_html__('Product Info', 'ambient')
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'button_skin',
						'heading'    => esc_html__('Button Skin', 'ambient'),
						'value'      => array(
							esc_html__('Default', 'ambient')  => 'default',
							esc_html__('Light', 'ambient') => 'light',
							esc_html__('Dark', 'ambient') => 'dark'
						),
						'dependency'  => array('element' => 'display_button', 'value' => array('yes')),
						'group'	      => esc_html__('Product Info Style', 'ambient')
					),
					array(
						'type'       => 'colorpicker',
						'param_name' => 'shader_background_color',
						'heading'    => esc_html__('Shader Background Color', 'ambient'),
						'group'	     => esc_html__('Product Info Style', 'ambient')
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'info_bottom_text_align',
						'heading'    => esc_html__('Product Info Text Alignment', 'ambient'),
						'value'      => array(
							esc_html__('Default', 'ambient')  => '',
							esc_html__('Left', 'ambient') => 'left',
							esc_html__('Center', 'ambient') => 'center',
							esc_html__('Right', 'ambient') => 'right'
						),
						'dependency'  => array('element' => 'info_position', 'value' => array('info_below_image')),
						'group'	      => esc_html__('Product Info Style', 'ambient')
					),
					array(
						'type'       => 'textfield',
						'param_name' => 'info_bottom_margin',
						'heading'    => esc_html__('Product Info Bottom Margin (px)', 'ambient'),
						'dependency' => array('element' => 'info_position', 'value' => array('info_below_image')),
						'group'	     => esc_html__('Product Info Style', 'ambient')
					)
				)
		) );
	}

	public function render($atts, $content = null) {
		$default_atts = array(
			'type'					  => 'standard',
			'info_position'			  => 'info_on_image_hover',
            'number_of_posts' 		  => '8',
            'number_of_columns' 	  => '4',
            'space_between_items'	  => 'normal',
            'order_by' 				  => 'date',
            'order' 				  => 'ASC',
            'taxonomy_to_display' 	  => 'category',
            'taxonomy_values' 		  => '',
            'image_size'			  => '',
            'display_title' 		  => 'yes',
			'product_info_skin'       => '',
            'title_tag'				  => 'h4',
            'title_transform'		  => '',
			'display_category'        => 'yes',
            'display_excerpt' 		  => 'no',
            'excerpt_length' 		  => '20',
			'display_rating' 		  => 'no',
			'display_price' 		  => 'yes',
            'display_button' 		  => 'yes',
			'button_skin'             => 'default',
			'shader_background_color' => '',
			'info_bottom_text_align'  => '',
            'info_bottom_margin' 	  => ''
        );
		
		$params = shortcode_atts($default_atts, $atts);
		extract($params);
		
		$params['holder_classes'] = $this->getHolderClasses($params);
		
		$params['title_tag'] = !empty($params['title_tag']) ? $params['title_tag'] : $default_atts['title_tag'];
		$params['title_styles'] = $this->getTitleStyles($params);
		
		$params['shader_styles'] = $this->getShaderStyles($params);

		$params['text_wrapper_styles'] = $this->getTextWrapperStyles($params);

		$queryArray = $this->generateProductQueryArray($params);
		$query_result = new \WP_Query($queryArray);
		$params['query_result'] = $query_result;	

		$html = ambient_elated_get_shortcode_module_template_part('templates/product-list-template', 'product-list', '', $params);
		
		return $html;
	}

	/**
	   * Generates holder classes
	   *
	   * @param $params
	   *
	   * @return string
	*/
	private function getHolderClasses($params){
		$holderClasses = '';

		$productListType = $this->getProductListTypeClass($params);

        $columnsSpace = $this->getColumnsSpaceClass($params);

        $columnNumber = $this->getColumnNumberClass($params);

		$infoPosition = $this->getInfoPositionClass($params);
		
		$productInfoClasses = $this->getProductInfoSkinClass($params);

        $holderClasses .= $productListType . ' ' . $columnsSpace . ' ' . $columnNumber . ' ' . $infoPosition . ' ' . $productInfoClasses;
		
		return $holderClasses;
	}

	/**
     * Generates product list type classes for product list holder
     *
     * @param $params
     *
     * @return string
     */
    private function getProductListTypeClass($params){
        $type = '';
        $productListType = $params['type'];

        switch ($productListType) {
            case 'standard':
                $type = 'eltdf-standard-layout';
                break;
            case 'masonry':
                $type = 'eltdf-masonry-layout';
                break;
            default:
                $type = 'eltdf-standard-layout';
                break;
        }

        return $type;
    }

	/**
     * Generates space between columns classes for product list holder
     *
     * @param $params
     *
     * @return string
     */
    private function getColumnsSpaceClass($params){
        $columnsSpace = '';
        $spaceBetweenItems = $params['space_between_items'];

        switch ($spaceBetweenItems) {
            case 'normal':
                $columnsSpace = 'eltdf-normal-space';
                break;
            case 'small':
                $columnsSpace = 'eltdf-small-space';
                break;
	        case 'tiny':
		        $columnsSpace = 'eltdf-tiny-space';
		        break;
	        case 'no':
		        $columnsSpace = 'eltdf-no-space';
		        break;
            default:
                $columnsSpace = 'eltdf-normal-space';
                break;
        }

        return $columnsSpace;
    }

    /**
     * Generates columns number classes for product list holder
     *
     * @param $params
     *
     * @return string
     */
    private function getColumnNumberClass($params){
        $columnsNumber = '';
        $columns = $params['number_of_columns'];

        switch ($columns) {
            case 1:
                $columnsNumber = 'eltdf-one-column';
                break;
            case 2:
                $columnsNumber = 'eltdf-two-columns';
                break;
            case 3:
                $columnsNumber = 'eltdf-three-columns';
                break;
            case 4:
                $columnsNumber = 'eltdf-four-columns';
                break;
            case 5:
                $columnsNumber = 'eltdf-five-columns';
                break;
            case 6:
                $columnsNumber = 'eltdf-six-columns';
                break;        
            default:
                $columnsNumber = 'eltdf-four-columns';
                break;
        }

        return $columnsNumber;
    }

	/**
	 * Generates product list info position classes for product list holder
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getInfoPositionClass($params){
		$type = '';
		$infoPosition = $params['info_position'];

		switch ($infoPosition) {
			case 'info_on_image_hover':
				$type = 'eltdf-info-on-image';
				break;
			case 'info_below_image':
				$type = 'eltdf-info-below-image';
				break;
			default:
				$type = 'eltdf-info-on-image';
				break;
		}

		return $type;
	}
	
	/**
	 * Generates product info skin class for product list holder
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getProductInfoSkinClass($params){
		$classes = '';
		$infoPosition = $params['info_position'];
		$productInfoSkin = $params['product_info_skin'];
		
		if($infoPosition === 'info_on_image_hover') {
			switch ( $productInfoSkin ) {
				case 'light':
					$classes = 'eltdf-product-info-light';
					break;
				case 'dark':
					$classes = 'eltdf-product-info-dark';
					break;
				default:
					$classes = '';
					break;
			}
		}
		
		return $classes;
	}

	/**
	   * Generates query array
	   *
	   * @param $params
	   *
	   * @return array
	*/
	public function generateProductQueryArray($params){
		$queryArray = array(
			'post_status' => 'publish',
			'post_type' => 'product',
			'ignore_sticky_posts' => 1,
			'posts_per_page' => $params['number_of_posts'],
			'orderby' => $params['order_by'],
			'order' => $params['order'],
			'meta_query' => WC()->query->get_meta_query()
		);

        if ($params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'category') {
            $queryArray['product_cat'] = $params['taxonomy_values'];
        }

        if ($params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'tag') {
            $queryArray['product_tag'] = $params['taxonomy_values'];
        }

        if ($params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'id') {
            $idArray = $params['taxonomy_values'];
            $ids = explode(',', $idArray);
            $queryArray['post__in'] = $ids;
        }

        return $queryArray;
	}

	/**
     * Return Style for Title
     *
     * @param $params
     * @return string
     */
    private function getTitleStyles($params) {
        $styles = array();
		
        if (!empty($params['title_transform'])) {
	        $styles[] = 'text-transform: '.$params['title_transform'];
        }

		return implode(';', $styles);
    }

    /**
     * Return Style for Shader
     *
     * @param $params
     * @return string
     */
    private function getShaderStyles($params) {
	    $styles = array();
		
        if (!empty($params['shader_background_color'])) {
	        $styles[] = 'background-color: '.$params['shader_background_color'];
        }

		return implode(';', $styles);
    }

    /**
     * Return Style for Text Wrapper Holder
     *
     * @param $params
     * @return string
     */
    private function getTextWrapperStyles($params) {
	    $styles = array();
	
	    if (!empty($params['info_bottom_text_align'])) {
		    $styles[] = 'text-align: '.$params['info_bottom_text_align'];
	    }
		
        if ($params['info_bottom_margin'] !== '') {
	        $styles[] = 'margin-bottom: '.ambient_elated_filter_px($params['info_bottom_margin']).'px';
        }

		return implode(';', $styles);
    }
}