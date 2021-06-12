<?php
namespace ElatedCore\CPT\Portfolio\Shortcodes;

use ElatedCore\Lib;

/**
 * Class PortfolioSlider
 * @package ElatedCore\CPT\Portfolio\Shortcodes
 */
class PortfolioSlider implements Lib\ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    public function __construct() {
        $this->base = 'eltdf_portfolio_slider';

	    add_action('vc_before_init', array($this, 'vcMap'));

	    //Portfolio category filter
	    add_filter( 'vc_autocomplete_eltdf_portfolio_slider_category_callback', array( &$this, 'portfolioCategoryAutocompleteSuggester', ), 10, 1 ); // Get suggestion(find). Must return an array

	    //Portfolio category render
	    add_filter( 'vc_autocomplete_eltdf_portfolio_slider_category_render', array( &$this, 'portfolioCategoryAutocompleteRender', ), 10, 1 ); // Get suggestion(find). Must return an array

	    //Portfolio selected projects filter
	    add_filter( 'vc_autocomplete_eltdf_portfolio_slider_selected_projects_callback', array( &$this, 'portfolioIdAutocompleteSuggester', ), 10, 1 ); // Get suggestion(find). Must return an array

	    //Portfolio selected projects render
	    add_filter( 'vc_autocomplete_eltdf_portfolio_slider_selected_projects_render', array( &$this, 'portfolioIdAutocompleteRender', ), 10, 1 ); // Render exact portfolio. Must return an array (label,value)

	    //Portfolio tag filter
	    add_filter( 'vc_autocomplete_eltdf_portfolio_slider_tag_callback', array( &$this, 'portfolioTagAutocompleteSuggester', ), 10, 1 ); // Get suggestion(find). Must return an array

	    //Portfolio tag render
	    add_filter( 'vc_autocomplete_eltdf_portfolio_slider_tag_render', array( &$this, 'portfolioTagAutocompleteRender', ), 10, 1 ); // Get suggestion(find). Must return an array
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
     *
     * @see vc_map()
     */
    public function vcMap() {
        if(function_exists('vc_map')) {
	        vc_map( array(
		        'name'                      => esc_html__( 'Elated Portfolio Slider', 'eltdf-core' ),
		        'base'                      => $this->base,
		        'category'                  => esc_html__( 'by ELATED', 'eltdf-core' ),
		        'icon'                      => 'icon-wpb-portfolio-slider extended-custom-icon',
		        'allowed_container_element' => 'vc_row',
		        'params'                    => array(
			        array(
				        'type'        => 'textfield',
				        'param_name'  => 'number_of_items',
				        'heading'     => esc_html__( 'Number of Portfolios Items', 'eltdf-core' ),
				        'admin_label' => true,
				        'description' => esc_html__( 'Set number of items for your portfolio list inside tabs. Enter -1 to show all', 'eltdf-core' )
			        ),
			        array(
				        'type'        => 'dropdown',
				        'param_name'  => 'number_of_columns',
				        'heading'     => esc_html__( 'Number of Columns', 'eltdf-core' ),
				        'value'       => array(
					        esc_html__( 'Default', 'eltdf-core' ) => '',
					        esc_html__( 'One', 'eltdf-core' )     => '1',
					        esc_html__( 'Two', 'eltdf-core' )     => '2',
					        esc_html__( 'Three', 'eltdf-core' )   => '3',
					        esc_html__( 'Four', 'eltdf-core' )    => '4',
					        esc_html__( 'Five', 'eltdf-core' )    => '5'
				        ),
				        'description' => esc_html__( 'Number of portfolios that are showing at the same time in slider (on smaller screens is responsive so there will be less items shown). Default value is Four', 'eltdf-core' ),
				        'admin_label' => true,
				        'save_always' => true
			        ),
			        array(
				        'type'        => 'dropdown',
				        'param_name'  => 'space_between_items',
				        'heading'     => esc_html__( 'Space Between Portfolio Items', 'eltdf-core' ),
				        'value'       => array(
					        esc_html__( 'Normal', 'eltdf-core' )   => 'normal',
					        esc_html__( 'No Space', 'eltdf-core' ) => 'no_space',
					        esc_html__( 'Tiny', 'eltdf-core' )     => 'tiny',
					        esc_html__( 'Small', 'eltdf-core' )    => 'small',
					        esc_html__( 'Large', 'eltdf-core' )    => 'large'
				        ),
				        'admin_label' => true,
				        'save_always' => true
			        ),
			        array(
				        'type'        => 'dropdown',
				        'param_name'  => 'image_proportions',
				        'heading'     => esc_html__( 'Image Proportions', 'eltdf-core' ),
				        'value'       => array(
					        esc_html__( 'Original', 'eltdf-core' )  => 'full',
					        esc_html__( 'Square', 'eltdf-core' )    => 'square',
					        esc_html__( 'Landscape', 'eltdf-core' ) => 'landscape',
					        esc_html__( 'Portrait', 'eltdf-core' )  => 'portrait',
					        esc_html__( 'Medium', 'eltdf-core' )    => 'medium',
					        esc_html__( 'Large', 'eltdf-core' )     => 'large'
				        ),
				        'description' => esc_html__( 'Set image proportions for your portfolio list.', 'eltdf-core' ),
				        'save_always' => true
			        ),
			        array(
				        'type'        => 'autocomplete',
				        'param_name'  => 'category',
				        'heading'     => esc_html__( 'One-Category Portfolio List', 'eltdf-core' ),
				        'description' => esc_html__( 'Enter one category slug (leave empty for showing all categories)', 'eltdf-core' )
			        ),
			        array(
				        'type'        => 'autocomplete',
				        'param_name'  => 'selected_projects',
				        'heading'     => esc_html__( 'Show Only Projects with Listed IDs', 'eltdf-core' ),
				        'settings'    => array(
					        'multiple'      => true,
					        'sortable'      => true,
					        'unique_values' => true
				        ),
				        'description' => esc_html__( 'Delimit ID numbers by comma (leave empty for all)', 'eltdf-core' )
			        ),
			        array(
				        'type'        => 'autocomplete',
				        'param_name'  => 'tag',
				        'heading'     => esc_html__( 'One-Tag Portfolio List', 'eltdf-core' ),
				        'description' => esc_html__( 'Enter one tag slug (leave empty for showing all tags)', 'eltdf-core' )
			        ),
			        array(
				        'type'        => 'dropdown',
				        'param_name'  => 'order_by',
				        'heading'     => esc_html__( 'Order By', 'eltdf-core' ),
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
				        'param_name'  => 'order',
				        'heading'     => esc_html__( 'Order', 'eltdf-core' ),
				        'value'       => array(
					        esc_html__( 'ASC', 'eltdf-core' )  => 'ASC',
					        esc_html__( 'DESC', 'eltdf-core' ) => 'DESC',
				        ),
				        'save_always' => true
			        ),
			        array(
				        'type'        => 'dropdown',
				        'param_name'  => 'info_position',
				        'heading'     => esc_html__( 'Info Position', 'eltdf-core' ),
				        'value'       => array(
					        esc_html__( 'On Image Hover', 'eltdf-core' ) => 'on-image-hover',
					        esc_html__( 'Below Image', 'eltdf-core' )    => 'below-image',
				        ),
				        'save_always' => true,
				        'group'       => esc_html__( 'Content Layout', 'eltdf-core' )
			        ),
			        array(
				        'type'        => 'dropdown',
				        'param_name'  => 'image_hover_type1',
				        'heading'     => esc_html__( 'Image Hover Type', 'eltdf-core' ),
				        'value'       => array(
					        esc_html__( 'Slide From Image Bottom', 'eltdf-core' ) => 'slide-from-image-bottom',
					        esc_html__( 'Overlay Background', 'eltdf-core' )      => 'overlay-background',
					        esc_html__( 'Rectangle Info', 'eltdf-core' )          => 'rectangle-info',
					        esc_html__( 'Square Info', 'eltdf-core' )             => 'square-info',
					        esc_html__( 'Circle Info', 'eltdf-core' )             => 'circle-info',
					        esc_html__( 'Image Zoom', 'eltdf-core' )              => 'image-zoom',
					        esc_html__( 'Grayscale', 'eltdf-core' )               => 'grayscale'
				        ),
				        'save_always' => true,
				        'dependency'  => array( 'element' => 'info_position', 'value' => array( 'on-image-hover' ) ),
				        'group'       => esc_html__( 'Content Layout', 'eltdf-core' )
			        ),
			        array(
				        'type'        => 'dropdown',
				        'param_name'  => 'image_hover_type2',
				        'heading'     => esc_html__( 'Image Hover Type', 'eltdf-core' ),
				        'value'       => array(
					        esc_html__( 'Shader Background', 'eltdf-core' )      => 'shader-background',
					        esc_html__( 'Switch Featured Images', 'eltdf-core' ) => 'switch-image',
					        esc_html__( 'Image Zoom', 'eltdf-core' )             => 'image-zoom',
					        esc_html__( 'Grayscale', 'eltdf-core' )              => 'grayscale'
				        ),
				        'save_always' => true,
				        'dependency'  => array( 'element' => 'info_position', 'value' => array( 'below-image' ) ),
				        'group'       => esc_html__( 'Content Layout', 'eltdf-core' )
			        ),
			        array(
				        'type'       => 'colorpicker',
				        'param_name' => 'overlay_background_color1',
				        'heading'    => esc_html__( 'Overlay Background Color', 'eltdf-core' ),
				        'dependency' => array(
					        'element' => 'image_hover_type1',
					        'value'   => array( 'overlay-background' )
				        ),
				        'group'      => esc_html__( 'Content Layout', 'eltdf-core' )
			        ),
			        array(
				        'type'       => 'colorpicker',
				        'param_name' => 'overlay_content_color1',
				        'heading'    => esc_html__( 'Overlay Content Color', 'eltdf-core' ),
				        'dependency' => array(
					        'element' => 'image_hover_type1',
					        'value'   => array( 'overlay-background' )
				        ),
				        'group'      => esc_html__( 'Content Layout', 'eltdf-core' )
			        ),
			        array(
				        'type'        => 'dropdown',
				        'param_name'  => 'overlay_content_v_align1',
				        'heading'     => esc_html__( 'Overlay Content Vertical Alignment', 'eltdf-core' ),
				        'value'       => array(
					        esc_html__( 'Middle', 'eltdf-core' ) => 'middle',
					        esc_html__( 'Top', 'eltdf-core' )    => 'top',
					        esc_html__( 'Bottom', 'eltdf-core' ) => 'bottom'
				        ),
				        'save_always' => true,
				        'dependency'  => array(
					        'element' => 'image_hover_type1',
					        'value'   => array( 'overlay-background' )
				        ),
				        'group'       => esc_html__( 'Content Layout', 'eltdf-core' )
			        ),
			        array(
				        'type'        => 'dropdown',
				        'param_name'  => 'overlay_content_h_align1',
				        'heading'     => esc_html__( 'Overlay Content Horizontal Alignment', 'eltdf-core' ),
				        'value'       => array(
					        esc_html__( 'Center', 'eltdf-core' ) => 'center',
					        esc_html__( 'Left', 'eltdf-core' )   => 'left',
					        esc_html__( 'Right', 'eltdf-core' )  => 'right'
				        ),
				        'save_always' => true,
				        'dependency'  => array(
					        'element' => 'image_hover_type1',
					        'value'   => array( 'overlay-background' )
				        ),
				        'group'       => esc_html__( 'Content Layout', 'eltdf-core' )
			        ),
			        array(
				        'type'       => 'colorpicker',
				        'param_name' => 'shader_background_color',
				        'heading'    => esc_html__( 'Shader Background Color', 'eltdf-core' ),
				        'dependency' => array(
					        'element' => 'image_hover_type2',
					        'value'   => array( 'shader-background' )
				        ),
				        'group'      => esc_html__( 'Content Layout', 'eltdf-core' )
			        ),
			        array(
				        'type'       => 'textfield',
				        'param_name' => 'content_top_margin',
				        'heading'    => esc_html__( 'Content Top Margin (px)', 'eltdf-core' ),
				        'dependency' => array( 'element' => 'info_position', 'value' => array( 'below-image' ) ),
				        'group'      => esc_html__( 'Content Layout', 'eltdf-core' )
			        ),
			        array(
				        'type'       => 'textfield',
				        'param_name' => 'content_bottom_margin',
				        'heading'    => esc_html__( 'Content Bottom Margin (px)', 'eltdf-core' ),
				        'dependency' => array( 'element' => 'info_position', 'value' => array( 'below-image' ) ),
				        'group'      => esc_html__( 'Content Layout', 'eltdf-core' )
			        ),
			        array(
				        'type'        => 'dropdown',
				        'param_name'  => 'content_text_align',
				        'heading'     => esc_html__( 'Content Text Align', 'eltdf-core' ),
				        'value'       => array(
					        esc_html__( 'Default', 'eltdf-core' ) => '',
					        esc_html__( 'Left', 'eltdf-core' )    => 'left',
					        esc_html__( 'Center', 'eltdf-core' )  => 'center',
					        esc_html__( 'Right', 'eltdf-core' )   => 'right'
				        ),
				        'save_always' => true,
				        'dependency'  => array( 'element' => 'info_position', 'value' => array( 'below-image' ) ),
				        'group'       => esc_html__( 'Content Layout', 'eltdf-core' )
			        ),
			        array(
				        'type'        => 'dropdown',
				        'param_name'  => 'disable_title',
				        'heading'     => esc_html__( 'Disable Title', 'eltdf-core' ),
				        'value'       => array(
					        esc_html__( 'No', 'eltdf-core' )  => 'no',
					        esc_html__( 'Yes', 'eltdf-core' ) => 'yes'
				        ),
				        'save_always' => true,
				        'group'       => esc_html__( 'Content Layout', 'eltdf-core' )
			        ),
			        array(
				        'type'        => 'dropdown',
				        'param_name'  => 'title_tag',
				        'heading'     => esc_html__( 'Title Tag', 'eltdf-core' ),
				        'value'       => array(
					        esc_html__( 'Default', 'eltdf-core' ) => '',
					        'h1'                                  => 'h1',
					        'h2'                                  => 'h2',
					        'h3'                                  => 'h3',
					        'h4'                                  => 'h4',
					        'h5'                                  => 'h5',
					        'h6'                                  => 'h6',
				        ),
				        'save_always' => true,
				        'dependency'  => array( 'element' => 'disable_title', 'value' => array( 'no' ) ),
				        'group'       => esc_html__( 'Content Layout', 'eltdf-core' )
			        ),
			        array(
				        'type'        => 'dropdown',
				        'param_name'  => 'title_text_transform',
				        'heading'     => esc_html__( 'Title Text Transform', 'eltdf-core' ),
				        'value'       => array(
					        esc_html__( 'Default', 'eltdf-core' )    => '',
					        esc_html__( 'None', 'eltdf-core' )       => 'none',
					        esc_html__( 'Capitalize', 'eltdf-core' ) => 'capitalize',
					        esc_html__( 'Uppercase', 'eltdf-core' )  => 'uppercase',
					        esc_html__( 'Lowercase', 'eltdf-core' )  => 'lowercase',
					        esc_html__( 'Initial', 'eltdf-core' )    => 'initial',
					        esc_html__( 'Inherit', 'eltdf-core' )    => 'inherit'
				        ),
				        'save_always' => true,
				        'dependency'  => array( 'element' => 'disable_title', 'value' => array( 'no' ) ),
				        'group'       => esc_html__( 'Content Layout', 'eltdf-core' )
			        ),
			        array(
				        'type'        => 'dropdown',
				        'param_name'  => 'disable_category',
				        'heading'     => esc_html__( 'Disable Category', 'eltdf-core' ),
				        'value'       => array(
					        esc_html__( 'No', 'eltdf-core' )  => 'no',
					        esc_html__( 'Yes', 'eltdf-core' ) => 'yes'
				        ),
				        'save_always' => true,
				        'group'       => esc_html__( 'Content Layout', 'eltdf-core' )
			        ),
			        array(
				        'type'        => 'dropdown',
				        'param_name'  => 'disable_excerpt',
				        'heading'     => esc_html__( 'Disable Excerpt', 'eltdf-core' ),
				        'value'       => array(
					        esc_html__( 'Yes', 'eltdf-core' ) => 'yes',
					        esc_html__( 'No', 'eltdf-core' )  => 'no'
				        ),
				        'save_always' => true,
				        'group'       => esc_html__( 'Content Layout', 'eltdf-core' )
			        ),
			        array(
				        'type'        => 'textfield',
				        'param_name'  => 'excerpt_length',
				        'heading'     => esc_html__( 'Excerpt Length', 'eltdf-core' ),
				        'description' => esc_html__( 'Number of characters', 'eltdf-core' ),
				        'dependency'  => array( 'element' => 'disable_excerpt', 'value' => array( 'no' ) ),
				        'group'       => esc_html__( 'Content Layout', 'eltdf-core' )
			        ),
			        array(
				        'type'        => 'textfield',
				        'param_name'  => 'slider_speed',
				        'heading'     => esc_html__( 'Slider Speed', 'eltdf-core' ),
				        'description' => esc_html__( 'Default value is 5000 (ms)', 'eltdf-core' ),
				        'group'       => esc_html__( 'Slider Settings', 'eltdf-core' )
			        ),
			        array(
				        'type'        => 'dropdown',
				        'param_name'  => 'enable_loop',
				        'heading'     => esc_html__( 'Enable Slider Loop', 'eltdf-core' ),
				        'value'       => array(
					        esc_html__( 'Yes', 'eltdf-core' ) => 'yes',
					        esc_html__( 'No', 'eltdf-core' )  => 'no'
				        ),
				        'save_always' => true,
				        'group'       => esc_html__( 'Slider Settings', 'eltdf-core' )
			        ),
			        array(
				        'type'        => 'dropdown',
				        'param_name'  => 'enable_variable_width',
				        'heading'     => esc_html__( 'Enable Slider Variable Width', 'eltdf-core' ),
				        'value'       => array(
					        esc_html__( 'No', 'eltdf-core' )  => 'no',
					        esc_html__( 'Yes', 'eltdf-core' ) => 'yes'
				        ),
				        'save_always' => true,
				        'description' => esc_html__( 'Enabling this option you will set your slider elements to have auto width. Also you need to enable loop option', 'eltdf-core' ),
				        'group'       => esc_html__( 'Slider Settings', 'eltdf-core' )
			        ),
			        array(
				        'type'        => 'dropdown',
				        'param_name'  => 'enable_padding',
				        'heading'     => esc_html__( 'Enable Slider Left/Right Padding', 'eltdf-core' ),
				        'value'       => array(
					        esc_html__( 'No', 'eltdf-core' )  => 'no',
					        esc_html__( 'Yes', 'eltdf-core' ) => 'yes'
				        ),
				        'save_always' => true,
				        'group'       => esc_html__( 'Slider Settings', 'eltdf-core' )
			        ),
			        array(
				        'type'        => 'dropdown',
				        'param_name'  => 'enable_navigation',
				        'heading'     => esc_html__( 'Enable Navigation', 'eltdf-core' ),
				        'value'       => array(
					        esc_html__( 'Yes', 'eltdf-core' ) => 'yes',
					        esc_html__( 'No', 'eltdf-core' )  => 'no'
				        ),
				        'save_always' => true,
				        'group'       => esc_html__( 'Slider Settings', 'eltdf-core' )
			        ),
			        array(
				        'type'        => 'dropdown',
				        'param_name'  => 'navigation_skin',
				        'heading'     => esc_html__( 'Navigation Skin', 'eltdf-core' ),
				        'value'       => array(
					        esc_html__( 'Default', 'eltdf-core' ) => '',
					        esc_html__( 'Light', 'eltdf-core' )   => 'light',
					        esc_html__( 'Dark', 'eltdf-core' )    => 'dark'
				        ),
				        'save_always' => true,
				        'dependency'  => array( 'element' => 'enable_navigation', 'value' => array( 'yes' ) ),
				        'group'       => esc_html__( 'Slider Settings', 'eltdf-core' )
			        ),
			        array(
				        'type'        => 'dropdown',
				        'param_name'  => 'enable_pagination',
				        'heading'     => esc_html__( 'Enable Pagination', 'eltdf-core' ),
				        'value'       => array(
					        esc_html__( 'Yes', 'eltdf-core' ) => 'yes',
					        esc_html__( 'No', 'eltdf-core' )  => 'no'
				        ),
				        'save_always' => true,
				        'group'       => esc_html__( 'Slider Settings', 'eltdf-core' )
			        ),
			        array(
				        'type'        => 'dropdown',
				        'param_name'  => 'pagination_skin',
				        'heading'     => esc_html__( 'Pagination Skin', 'eltdf-core' ),
				        'value'       => array(
					        esc_html__( 'Default', 'eltdf-core' ) => '',
					        esc_html__( 'Light', 'eltdf-core' )   => 'light',
					        esc_html__( 'Dark', 'eltdf-core' )    => 'dark'
				        ),
				        'save_always' => true,
				        'dependency'  => array( 'element' => 'enable_pagination', 'value' => array( 'yes' ) ),
				        'group'       => esc_html__( 'Slider Settings', 'eltdf-core' )
			        ),
			        array(
				        'type'        => 'dropdown',
				        'param_name'  => 'pagination_position',
				        'heading'     => esc_html__( 'Pagination Position', 'eltdf-core' ),
				        'value'       => array(
					        esc_html__( 'On Slider', 'eltdf-core' )     => 'on-slider',
					        esc_html__( 'Bellow Slider', 'eltdf-core' ) => 'bellow-slider'
				        ),
				        'save_always' => true,
				        'dependency'  => array( 'element' => 'enable_pagination', 'value' => array( 'yes' ) ),
				        'group'       => esc_html__( 'Slider Settings', 'eltdf-core' )
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
        $args = array(
	        'number_of_items'           => '9',
	        'number_of_columns'         => '4',
	        'space_between_items'       => 'normal',
	        'image_proportions'         => 'full',
	        'category'                  => '',
	        'selected_projects'         => '',
	        'tag'                       => '',
	        'order_by'                  => 'date',
	        'order'                     => 'ASC',
	        'info_position'             => 'on-image-hover',
	        'image_hover_type1'         => 'slide-from-image-bottom',
	        'image_hover_type2'         => 'shader-background',
	        'overlay_background_color1' => '',
	        'overlay_content_color1'    => '',
	        'overlay_content_v_align1'  => 'middle',
	        'overlay_content_h_align1'  => 'center',
	        'shader_background_color'   => '',
	        'content_top_margin'        => '',
	        'content_bottom_margin'     => '',
	        'content_text_align'        => '',
	        'disable_title'             => 'no',
	        'title_tag'                 => 'h4',
	        'title_text_transform'      => '',
	        'disable_category'          => 'no',
	        'disable_excerpt'           => 'yes',
	        'excerpt_length'            => '20',
	        'slider_speed'              => '5000',
	        'enable_loop'               => 'yes',
	        'enable_variable_width'     => 'no',
	        'enable_padding'            => 'no',
	        'enable_navigation'         => 'yes',
	        'navigation_skin'           => '',
	        'enable_pagination'         => 'yes',
	        'pagination_skin'           => '',
	        'pagination_position'       => 'on-slider'
        );

		$params = shortcode_atts($args, $atts);
		
		extract($params);
		
        $params['type'] = 'gallery';
        $params['slider'] = 'on';

		$html = '';

	    $html .= '<div class="eltdf-portfolio-slider-holder">';
			$html .= ambient_elated_execute_shortcode('eltdf_portfolio_list', $params);
	    $html .= '</div>';

        return $html;
    }

	/**
	 * Filter portfolio categories
	 *
	 * @param $query
	 *
	 * @return array
	 */
	public function portfolioCategoryAutocompleteSuggester( $query ) {
		global $wpdb;
		$post_meta_infos       = $wpdb->get_results( $wpdb->prepare( "SELECT a.slug AS slug, a.name AS portfolio_category_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'portfolio-category' AND a.name LIKE '%%%s%%'", stripslashes( $query ) ), ARRAY_A );

		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data          = array();
				$data['value'] = $value['slug'];
				$data['label'] = ( ( strlen( $value['portfolio_category_title'] ) > 0 ) ? esc_html__( 'Category', 'eltdf-core' ) . ': ' . $value['portfolio_category_title'] : '' );
				$results[]     = $data;
			}
		}

		return $results;

	}

	/**
	 * Find portfolio category by slug
	 * @since 4.4
	 *
	 * @param $query
	 *
	 * @return bool|array
	 */
	public function portfolioCategoryAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get portfolio category
			$portfolio_category = get_term_by( 'slug', $query, 'portfolio-category' );
			if ( is_object( $portfolio_category ) ) {

				$portfolio_category_slug = $portfolio_category->slug;
				$portfolio_category_title = $portfolio_category->name;

				$portfolio_category_title_display = '';
				if ( ! empty( $portfolio_category_title ) ) {
					$portfolio_category_title_display = esc_html__( 'Category', 'eltdf-core' ) . ': ' . $portfolio_category_title;
				}

				$data          = array();
				$data['value'] = $portfolio_category_slug;
				$data['label'] = $portfolio_category_title_display;

				return ! empty( $data ) ? $data : false;
			}

			return false;
		}

		return false;
	}

	/**
	 * Filter portfolios by ID or Title
	 *
	 * @param $query
	 *
	 * @return array
	 */
	public function portfolioIdAutocompleteSuggester( $query ) {
		global $wpdb;
		$portfolio_id = (int) $query;
		$post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT ID AS id, post_title AS title
					FROM {$wpdb->posts} 
					WHERE post_type = 'portfolio-item' AND ( ID = '%d' OR post_title LIKE '%%%s%%' )", $portfolio_id > 0 ? $portfolio_id : - 1, stripslashes( $query ), stripslashes( $query ) ), ARRAY_A );

		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data = array();
				$data['value'] = $value['id'];
				$data['label'] = esc_html__( 'Id', 'eltdf-core' ) . ': ' . $value['id'] . ( ( strlen( $value['title'] ) > 0 ) ? ' - ' . esc_html__( 'Title', 'eltdf-core' ) . ': ' . $value['title'] : '' );
				$results[] = $data;
			}
		}

		return $results;

	}

	/**
	 * Find portfolio by id
	 * @since 4.4
	 *
	 * @param $query
	 *
	 * @return bool|array
	 */
	public function portfolioIdAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get portfolio
			$portfolio = get_post( (int) $query );
			if ( ! is_wp_error( $portfolio ) ) {

				$portfolio_id = $portfolio->ID;
				$portfolio_title = $portfolio->post_title;

				$portfolio_title_display = '';
				if ( ! empty( $portfolio_title ) ) {
					$portfolio_title_display = ' - ' . esc_html__( 'Title', 'eltdf-core' ) . ': ' . $portfolio_title;
				}

				$portfolio_id_display = esc_html__( 'Id', 'eltdf-core' ) . ': ' . $portfolio_id;

				$data          = array();
				$data['value'] = $portfolio_id;
				$data['label'] = $portfolio_id_display . $portfolio_title_display;

				return ! empty( $data ) ? $data : false;
			}

			return false;
		}

		return false;
	}

	/**
	 * Filter portfolio tags
	 *
	 * @param $query
	 *
	 * @return array
	 */
	public function portfolioTagAutocompleteSuggester( $query ) {
		global $wpdb;
		$post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT a.slug AS slug, a.name AS portfolio_tag_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'portfolio-tag' AND a.name LIKE '%%%s%%'", stripslashes( $query ) ), ARRAY_A );

		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data          = array();
				$data['value'] = $value['slug'];
				$data['label'] = ( ( strlen( $value['portfolio_tag_title'] ) > 0 ) ? esc_html__( 'Tag', 'eltdf-core' ) . ': ' . $value['portfolio_tag_title'] : '' );
				$results[]     = $data;
			}
		}

		return $results;

	}

	/**
	 * Find portfolio tag by slug
	 * @since 4.4
	 *
	 * @param $query
	 *
	 * @return bool|array
	 */
	public function portfolioTagAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get portfolio category
			$portfolio_tag = get_term_by( 'slug', $query, 'portfolio-tag' );
			if ( is_object( $portfolio_tag ) ) {

				$portfolio_tag_slug = $portfolio_tag->slug;
				$portfolio_tag_title = $portfolio_tag->name;

				$portfolio_tag_title_display = '';
				if ( ! empty( $portfolio_tag_title ) ) {
					$portfolio_tag_title_display = esc_html__( 'Tag', 'eltdf-core' ) . ': ' . $portfolio_tag_title;
				}

				$data          = array();
				$data['value'] = $portfolio_tag_slug;
				$data['label'] = $portfolio_tag_title_display;

				return ! empty( $data ) ? $data : false;
			}

			return false;
		}

		return false;
	}
}