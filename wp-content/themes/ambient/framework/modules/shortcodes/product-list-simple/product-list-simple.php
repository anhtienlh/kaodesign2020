<?php
namespace AmbientElatedNamespace\Modules\Shortcodes\ProductListSimple;

use AmbientElatedNamespace\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class ProductListSimple that represents product list shortcode
 */
class ProductListSimple implements ShortcodeInterface {
    /**
    * @var string
    */
    private $base;
    
    function __construct() {
        $this->base = 'eltdf_product_list_simple';
        
        add_action('vc_before_init', array($this,'vcMap'));
    }
    
    public function getBase() {
        return $this->base;
    }

    public function vcMap() {

        vc_map( array(
            'name' => esc_html__('Elated Product List - Simple', 'ambient'),
            'base' => $this->base,
            'icon' => 'icon-wpb-product-list-simple extended-custom-icon',
            'category' => esc_html__('by ELATED', 'ambient'),
            'allowed_container_element' => 'vc_row',
            'params' => array(
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'type',
                        'heading'    => esc_html__('Type', 'ambient'),
                        'value'      => array(
	                        esc_html__('Sale', 'ambient') => 'sale',
	                        esc_html__('Best Sellers', 'ambient') => 'best-sellers',
	                        esc_html__('Featured', 'ambient') => 'featured'
                        )
                    ),
                    array(
                        'type'        => 'textfield',
                        'param_name'  => 'number',
                        'heading'     => esc_html__('Number of Products', 'ambient'),
                        'description' => esc_html__('Number of products to show (default value is 4)', 'ambient')
                    ),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'order_by',
                        'heading'    => esc_html__('Order By', 'ambient'),
                        'value'      => array(
						    esc_html__('Title', 'ambient') => 'title',
						    esc_html__('Date', 'ambient') => 'date',
						    esc_html__('ID', 'ambient') => 'id',
						    esc_html__('Menu Order', 'ambient') => 'menu_order',
						    esc_html__('Random', 'ambient') => 'rand',
						    esc_html__('Post Name', 'ambient') => 'name'
                        ),
                        'dependency'  => array('element' => 'type', 'value' =>  array('sale', 'featured'))
                    ),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'sort_order',
                        'heading'    => esc_html__('Order', 'ambient'),
                        'value'      => array(
						    esc_html__('ASC', 'ambient') => 'ASC',
						    esc_html__('DESC', 'ambient') => 'DESC'
                        ),
                        'dependency'  => array('element' => 'type', 'value' =>  array('sale', 'featured'))
                    ),
		            array(
			            'type'        => 'dropdown',
			            'param_name'  => 'display_title',
			            'heading'     => esc_html__('Display Title', 'ambient'),
			            'value'       => array_flip(ambient_elated_get_yes_no_select_array(false, true))
		            ),
		            array(
			            'type'        => 'dropdown',
			            'param_name'  => 'title_tag',
			            'heading'     => esc_html__('Title Tag', 'ambient'),
			            'value'       => array_flip(ambient_elated_get_title_tag(true)),
			            'save_always' => true,
			            'dependency'  => array('element' => 'display_title', 'value' => array('yes'))
		            ),
		            array(
			            'type'        => 'dropdown',
			            'param_name'  => 'title_transform',
			            'heading'     => esc_html__('Title Text Transform', 'ambient'),
			            'value'       => array_flip(ambient_elated_get_text_transform_array(true)),
			            'save_always' => true,
			            'dependency'  => array('element' => 'display_title', 'value' => array('yes'))
		            ),
		            array(
			            'type'        => 'dropdown',
			            'param_name'  => 'display_rating',
			            'heading'     => esc_html__('Display Rating', 'ambient'),
			            'value'       => array_flip(ambient_elated_get_yes_no_select_array(false, true))
		            ),
		            array(
			            'type'        => 'dropdown',
			            'param_name'  => 'display_price',
			            'heading'     => esc_html__('Display Price', 'ambient'),
			            'value'       => array_flip(ambient_elated_get_yes_no_select_array(false, true))
		            ),
                )
            ) 
        );
    }

    /**
     * Renders HTML for product list shortcode
     *
     * @param array $atts
     * @param null $content
     *
     * @return string
     */
    public function render($atts, $content = null){
        $default_atts = array(
            'type'            => 'sale',
            'number'          => '4',
            'order_by'        => 'title',
            'sort_order'      => 'ASC',
            'display_title'   => 'yes',
            'title_tag'       => 'h4',
            'title_transform' => 'uppercase',
            'display_price'   => 'yes',
            'display_rating'  => 'yes'
        );
	    
        $params = shortcode_atts($default_atts, $atts);
        extract($params);

        $params['holder_classes'] = $this->getHolderClasses($params);
	
	    $params['title_tag'] = !empty($params['title_tag']) ? $params['title_tag'] : $default_atts['title_tag'];
        $params['title_styles'] = $this->getTitleStyles($params);

        $queryArray = $this->generateProductQueryArray($params);
        $query_result = new \WP_Query($queryArray);
        $params['query_result'] = $query_result;

        $html = ambient_elated_get_shortcode_module_template_part('templates/product-list-template', 'product-list-simple', '', $params);
        
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
        $productListType = $params['type'];

        switch ($productListType) {
            case 'sale':
                $holderClasses = 'eltdf-pls-sale';
                break;
            case 'best-sellers':
                $holderClasses = 'eltdf-pls-best-sellers';
                break;
            case 'featured':
                $holderClasses = 'eltdf-pls-featured';
                break;
            default:
                $holderClasses = 'eltdf-pls-sale';
                break;
        }
        
        return $holderClasses;
    }

    /**
     * Creates an array of args for loop
     *
     * @param $params
     * @return array
     */
    private function generateProductQueryArray($params){
        global $woocommerce;

        switch($params['type']){
            case 'sale':
                $args = array(
	                'post_status'    => 'publish',
	                'post_type'      => 'product',
	                'posts_per_page' => $params['number'],
	                'orderby'        => $params['order_by'],
	                'order'          => $params['sort_order'],
                    'no_found_rows'  => 1,
                    'meta_query'     => WC()->query->get_meta_query(),
                    'post__in'       => array_merge( array( 0 ), wc_get_product_ids_on_sale() )
                );
                break;
            case 'best-sellers':
                $args = array(
	                'post_status'         => 'publish',
	                'post_type'           => 'product',
                    'ignore_sticky_posts' => 1,
                    'posts_per_page'      => $params['number'],
                    'meta_key'            => 'total_sales',
                    'orderby'             => 'meta_value_num'
                );
                break;
            case 'featured':
                $args = array(
	                'post_status'         => 'publish',
	                'post_type'           => 'product',
                    'posts_per_page' => $params['number'],
                    'orderby'        => $params['order_by'],
                    'order'          => $params['sort_order'],
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_visibility',
                            'field'    => 'name',
                            'terms'    => 'featured',
                        ),
                    ),
                );
                break;
        }

        return $args;
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
}