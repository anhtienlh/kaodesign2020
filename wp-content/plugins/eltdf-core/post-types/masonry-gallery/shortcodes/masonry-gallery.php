<?php
namespace ElatedCore\CPT\MasonryGallery\Shortcodes;

use ElatedCore\Lib\ShortcodeInterface;

/**
 * Class MasonryGallery
 * @package ElatedCore\CPT\MasonryGallery\Shortcodes
 */
class MasonryGallery implements ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    public function __construct() {
        $this->base = 'eltdf_masonry_gallery';

        add_action('vc_before_init', array($this, 'vcMap'));
	
	    //Masonry Gallery category filter
	    add_filter( 'vc_autocomplete_eltdf_masonry_gallery_category_callback', array( &$this, 'masonryGalleryCategoryAutocompleteSuggester', ), 10, 1 ); // Get suggestion(find). Must return an array
	
	    //Masonry Gallery category render
	    add_filter( 'vc_autocomplete_eltdf_masonry_gallery_category_render', array( &$this, 'masonryGalleryCategoryAutocompleteRender', ), 10, 1 ); // Get suggestion(find). Must return an array
	
    }

    /**
     * Returns base for shortcode
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     * Maps shortcode to Visual Composer
     */
    public function vcMap() {
	    if ( function_exists( 'vc_map' ) ) {
		    vc_map( array(
			    'name'                      => esc_html__( 'Elated Masonry Gallery', 'eltdf-core' ),
			    'base'                      => $this->base,
			    'category'                  => esc_html__( 'by ELATED', 'eltdf-core' ),
			    'icon'                      => 'icon-wpb-masonry-gallery extended-custom-icon',
			    'allowed_container_element' => 'vc_row',
			    'params'                    => array(
				    array(
					    'type'       => 'textfield',
					    'param_name' => 'number',
					    'heading'    => esc_html__( 'Number of Items', 'eltdf-core' )
				    ),
				    array(
					    'type'        => 'dropdown',
					    'heading'     => esc_html__( 'Space Between Items', 'eltdf-core' ),
					    'param_name'  => 'space_between_items',
					    'value'       => array(
						    esc_html__( 'Normal', 'eltdf-core' )   => 'normal',
						    esc_html__( 'Small', 'eltdf-core' )    => 'small',
						    esc_html__( 'Tiny', 'eltdf-core' )     => 'tiny',
						    esc_html__( 'No Space', 'eltdf-core' ) => 'no'
					    ),
					    'save_always' => true
				    ),
				    array(
					    'type'        => 'autocomplete',
					    'param_name'  => 'category',
					    'heading'     => esc_html__( 'Category', 'eltdf-core' ),
					    'description' => esc_html__( 'Enter one category slug (leave empty for showing all categories)', 'eltdf-core' )
				    ),
				    array(
					    'type'        => 'dropdown',
					    'heading'     => esc_html__( 'Order By', 'eltdf-core' ),
					    'param_name'  => 'order_by',
					    'value'       => array(
						    esc_html__( 'Date', 'eltdf-core' )       => 'date',
						    esc_html__( 'Menu Order', 'eltdf-core' ) => 'menu_order',
						    esc_html__( 'Random', 'eltdf-core' )     => 'rand',
						    esc_html__( 'Slug', 'eltdf-core' )       => 'name',
						    esc_html__( 'Title', 'eltdf-core' )      => 'title'
					    ),
					    'save_always' => true
				    ),
				    array(
					    'type'        => 'dropdown',
					    'heading'     => esc_html__( 'Order', 'eltdf-core' ),
					    'param_name'  => 'order',
					    'value'       => array(
						    esc_html__( 'ASC', 'eltdf-core' )  => 'ASC',
						    esc_html__( 'DESC', 'eltdf-core' ) => 'DESC'
					    ),
					    'save_always' => true
				    )
			    )
		    ) );
	    }
    }

    /**
     * Renders shortcodes HTML
     *
     * @param $atts array of shortcode params
     * @param $content string shortcode content
     * @return string
     */
    public function render($atts, $content = null) {
        $default_args = array(
	        'number'		        => -1,
	        'space_between_items'   => 'normal',
	        'category'		        => '',
	        'order_by'              => 'date',
            'order'			        => 'ASC'
		);
	    
        extract(shortcode_atts($default_args, $atts));
		
        $html = '';

        /* Query for items */
        $query_args = array(
            'post_type' => 'masonry-gallery',
            'orderby' => $order_by,
            'order' => $order,
            'posts_per_page' => $number
        );
	
	    if(!empty($category)){
            $query_args['masonry-gallery-category'] = $category;
        }
        
        $holder_classes = '';
	    if(!empty($space_between_items)) {
		    $holder_classes = 'eltdf-mg-'.$space_between_items.'-space';
	    }
        
        $query = new \WP_Query( $query_args );

        $html .= '<div class="eltdf-masonry-gallery-holder '.esc_attr($holder_classes).'">';
	        $html .= '<div class="eltdf-mg-inner">';
	            $html .= '<div class="eltdf-mg-grid-sizer"></div>';
		        $html .= '<div class="eltdf-mg-grid-gutter"></div>';
	
		        if ($query->have_posts()) :
		            while ( $query->have_posts() ) : $query->the_post();
		
						if (get_post_meta(get_the_ID(), 'eltdf_masonry_gallery_item_type', true) !== '') {
							$type = get_post_meta(get_the_ID(), 'eltdf_masonry_gallery_item_type', true);
						} else {
							$type = 'standard';
						}
						if (get_the_title(get_the_ID()) !== '') {
		                    $params['item_title'] = get_the_title(get_the_ID());
		                }
			            if (get_post_meta(get_the_ID(), 'eltdf_masonry_gallery_item_title_tag', true) !== '') {
				            $params['item_title_tag'] = get_post_meta(get_the_ID(), 'eltdf_masonry_gallery_item_title_tag', true);
			            } else {
				            $params['item_title_tag'] = 'h4';
			            }
			            if (get_post_meta(get_the_ID(), 'eltdf_masonry_gallery_item_text', true) !== '') {
				            $params['item_text'] = get_post_meta(get_the_ID(), 'eltdf_masonry_gallery_item_text', true);
			            }
		                if (get_post_meta(get_the_ID(), 'eltdf_masonry_gallery_item_link', true) !== '') {
							$params['item_link'] = get_post_meta(get_the_ID(), 'eltdf_masonry_gallery_item_link', true);
		                }
		                if (get_post_meta(get_the_ID(), 'eltdf_masonry_gallery_item_link_target', true) !== '') {
							$params['item_link_target'] = get_post_meta(get_the_ID(), 'eltdf_masonry_gallery_item_link_target', true);
		                }
						if (get_post_meta(get_the_ID(), 'eltdf_masonry_gallery_button_label', true) !== '') {
							$params['item_button_label'] = get_post_meta(get_the_ID(), 'eltdf_masonry_gallery_button_label', true);
		                }
		
						$params['current_id'] = get_the_ID();
						$params['item_classes']  = $this->getItemClasses();
			            $params['item_image'] = $this->getItemImage($params);
						$params['background_image_url'] = $this->getBackgroundImage($params);
		
						$html .= eltd_core_get_shortcode_module_template_part('masonry-gallery', 'masonry-gallery-'. $type . '-template', '', $params);
		
		            endwhile;
		        else:
		            $html .= esc_html__('Sorry, no posts matched your criteria.', 'eltdf-core');
		        endif;
				wp_reset_postdata();
	        $html .= '</div>';
	    $html .= '</div>';

        return $html;
    }

	private function getItemClasses(){
		$classes = array('eltdf-mg-item');
		
		if (get_post_meta(get_the_ID(), 'eltdf_masonry_gallery_item_type', true) !== '') {
			$classes[] = 'eltdf-mg-' . get_post_meta(get_the_ID(), 'eltdf_masonry_gallery_item_type', true);
		}

		if (get_post_meta(get_the_ID(), 'eltdf_masonry_gallery_item_size', true) !== '') {
			$classes[] = 'eltdf-mg-' . get_post_meta(get_the_ID(), 'eltdf_masonry_gallery_item_size', true);
		}
		
		if (get_post_meta(get_the_ID(), 'eltdf_masonry_gallery_simple_content_background_skin', true) !== '') {
			$classes[] = 'eltdf-mg-skin-' . get_post_meta(get_the_ID(), 'eltdf_masonry_gallery_simple_content_background_skin', true);
		}

		return implode(' ', $classes);
	}
	
	public function getItemImage($params){
		$id = $params['current_id'];
		$item_image = array();
		
		if(get_post_meta($id, 'eltdf_masonry_gallery_item_image', true) !== '') {
			$image_url = get_post_meta($id, 'eltdf_masonry_gallery_item_image', true);
			$image_id = ambient_elated_get_attachment_id_from_url($image_url);
			
			$image['url'] = $image_url;
			$image['alt'] = get_post_meta( $image_id, '_wp_attachment_image_alt', true);
			$item_image = $image;
		}
		
		return $item_image;
	}

	public function getBackgroundImage($params){
		$id = $params['current_id'];
		$masonry_image_url = wp_get_attachment_url(get_post_thumbnail_id($id));

		return $masonry_image_url;
	}
	
	/**
	 * Filter masonry gallery categories
	 *
	 * @param $query
	 *
	 * @return array
	 */
	public function masonryGalleryCategoryAutocompleteSuggester( $query ) {
		global $wpdb;
		$post_meta_infos       = $wpdb->get_results( $wpdb->prepare( "SELECT a.slug AS slug, a.name AS masonry_gallery_category_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'masonry-gallery-category' AND a.name LIKE '%%%s%%'", stripslashes( $query ) ), ARRAY_A );
		
		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data          = array();
				$data['value'] = $value['slug'];
				$data['label'] = ( ( strlen( $value['masonry_gallery_category_title'] ) > 0 ) ? esc_html__( 'Category', 'eltdf-core' ) . ': ' . $value['masonry_gallery_category_title'] : '' );
				$results[]     = $data;
			}
		}
		
		return $results;
		
	}
	
	/**
	 * Find masonry gallery category by slug
	 * @since 4.4
	 *
	 * @param $query
	 *
	 * @return bool|array
	 */
	public function masonryGalleryCategoryAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get portfolio category
			$masonry_gallery_category = get_term_by( 'slug', $query, 'masonry-gallery-category' );
			if ( is_object( $masonry_gallery_category ) ) {
				
				$masonry_gallery_category_slug = $masonry_gallery_category->slug;
				$masonry_gallery_category_title = $masonry_gallery_category->name;
				
				$masonry_gallery_category_title_display = '';
				if ( ! empty( $masonry_gallery_category_title ) ) {
					$masonry_gallery_category_title_display = esc_html__( 'Category', 'eltdf-core' ) . ': ' . $masonry_gallery_category_title;
				}
				
				$data          = array();
				$data['value'] = $masonry_gallery_category_slug;
				$data['label'] = $masonry_gallery_category_title_display;
				
				return ! empty( $data ) ? $data : false;
			}
			
			return false;
		}
		
		return false;
	}
}