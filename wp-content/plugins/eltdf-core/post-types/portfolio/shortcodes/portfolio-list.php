<?php
namespace ElatedCore\CPT\Portfolio\Shortcodes;

use ElatedCore\Lib;

/**
 * Class PortfolioList
 * @package ElatedCore\CPT\Portfolio\Shortcodes
 */
class PortfolioList implements Lib\ShortcodeInterface {
	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'eltdf_portfolio_list';

		add_action('vc_before_init', array($this, 'vcMap'));

		//Portfolio category filter
		add_filter('vc_autocomplete_eltdf_portfolio_list_category_callback', array(
			&$this,
			'portfolioCategoryAutocompleteSuggester',
		), 10, 1); // Get suggestion(find). Must return an array

		//Portfolio category render
		add_filter('vc_autocomplete_eltdf_portfolio_list_category_render', array(
			&$this,
			'portfolioCategoryAutocompleteRender',
		), 10, 1); // Get suggestion(find). Must return an array

		//Portfolio selected projects filter
		add_filter('vc_autocomplete_eltdf_portfolio_list_selected_projects_callback', array(
			&$this,
			'portfolioIdAutocompleteSuggester',
		), 10, 1); // Get suggestion(find). Must return an array

		//Portfolio selected projects render
		add_filter('vc_autocomplete_eltdf_portfolio_list_selected_projects_render', array(
			&$this,
			'portfolioIdAutocompleteRender',
		), 10, 1); // Render exact portfolio. Must return an array (label,value)

		//Portfolio tag filter
		add_filter('vc_autocomplete_eltdf_portfolio_list_tag_callback', array(
			&$this,
			'portfolioTagAutocompleteSuggester',
		), 10, 1); // Get suggestion(find). Must return an array

		//Portfolio tag render
		add_filter('vc_autocomplete_eltdf_portfolio_list_tag_render', array(
			&$this,
			'portfolioTagAutocompleteRender',
		), 10, 1); // Get suggestion(find). Must return an array
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
	 * @see vc_map
	 */
	public function vcMap() {
		if (function_exists('vc_map')) {
			vc_map(array(
					'name'                      => esc_html__('Elated Portfolio List', 'eltdf-core'),
					'base'                      => $this->getBase(),
					'category'                  => esc_html__('by ELATED', 'eltdf-core'),
					'icon'                      => 'icon-wpb-portfolio extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'dropdown',
							'param_name'  => 'type',
							'heading'     => esc_html__('Portfolio List Template', 'eltdf-core'),
							'value'       => array(
								esc_html__('Gallery', 'eltdf-core') => 'gallery',
								esc_html__('Masonry', 'eltdf-core') => 'masonry'
							),
							'admin_label' => true,
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'number_of_columns',
							'heading'     => esc_html__('Number of Columns', 'eltdf-core'),
							'value'       => array(
								esc_html__('Default', 'eltdf-core') => '',
								esc_html__('One', 'eltdf-core')     => '1',
								esc_html__('Two', 'eltdf-core')     => '2',
								esc_html__('Three', 'eltdf-core')   => '3',
								esc_html__('Four', 'eltdf-core')    => '4',
								esc_html__('Five', 'eltdf-core')    => '5'
							),
							'description' => esc_html__('Default value is Three', 'eltdf-core'),
							'admin_label' => true,
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'space_between_items',
							'heading'     => esc_html__('Space Between Portfolio Items', 'eltdf-core'),
							'value'       => array(
								esc_html__('Normal', 'eltdf-core')   => 'normal',
								esc_html__('No Space', 'eltdf-core') => 'no_space',
								esc_html__('Tiny', 'eltdf-core')     => 'tiny',
								esc_html__('Small', 'eltdf-core')    => 'small',
								esc_html__('Large', 'eltdf-core')    => 'large'
							),
							'admin_label' => true,
							'save_always' => true
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'number_of_items',
							'heading'     => esc_html__('Number of Portfolios Per Page', 'eltdf-core'),
							'description' => esc_html__('Set number of items for your portfolio list. Enter -1 to show all.', 'eltdf-core'),
							'value'       => '-1'
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'image_proportions',
							'heading'     => esc_html__('Image Proportions', 'eltdf-core'),
							'value'       => array(
								esc_html__('Original', 'eltdf-core')  => 'full',
								esc_html__('Square', 'eltdf-core')    => 'square',
								esc_html__('Landscape', 'eltdf-core') => 'landscape',
								esc_html__('Portrait', 'eltdf-core')  => 'portrait',
								esc_html__('Medium', 'eltdf-core')    => 'medium',
								esc_html__('Large', 'eltdf-core')     => 'large'
							),
							'description' => esc_html__('Set image proportions for your portfolio list. Also this option will apply to masonry type if you do not set any option in Portfolio Single page for image proportion.', 'eltdf-core'),
							'save_always' => true
						),
						array(
							'type'        => 'autocomplete',
							'param_name'  => 'category',
							'heading'     => esc_html__('One-Category Portfolio List', 'eltdf-core'),
							'description' => esc_html__('Enter one category slug (leave empty for showing all categories)', 'eltdf-core')
						),
						array(
							'type'        => 'autocomplete',
							'param_name'  => 'selected_projects',
							'heading'     => esc_html__('Show Only Projects with Listed IDs', 'eltdf-core'),
							'settings'    => array(
								'multiple'      => true,
								'sortable'      => true,
								'unique_values' => true
							),
							'description' => esc_html__('Delimit ID numbers by comma (leave empty for all)', 'eltdf-core')
						),
						array(
							'type'        => 'textfield',
							'heading'     => 'Select Categories to be Displayed in Portfolios',
							'param_name'  => 'categories_to_display',
							'value'       => '',
							'admin_label' => true,
							'description' => 'Input the slugs of the portfolio categories you would like to display in the list. Delimit slugs by comma (leave empty for all).'
						),
						array(
							'type'        => 'autocomplete',
							'param_name'  => 'tag',
							'heading'     => esc_html__('One-Tag Portfolio List', 'eltdf-core'),
							'description' => esc_html__('Enter one tag slug (leave empty for showing all tags)', 'eltdf-core')
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'order_by',
							'heading'     => esc_html__('Order By', 'eltdf-core'),
							'value'       => array(
								esc_html__('Date', 'eltdf-core')       => 'date',
								esc_html__('Menu Order', 'eltdf-core') => 'menu_order',
								esc_html__('Random', 'eltdf-core')     => 'rand',
								esc_html__('Slug', 'eltdf-core')       => 'name',
								esc_html__('Title', 'eltdf-core')      => 'title'
							),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'order',
							'heading'     => esc_html__('Order', 'eltdf-core'),
							'value'       => array(
								esc_html__('ASC', 'eltdf-core')  => 'ASC',
								esc_html__('DESC', 'eltdf-core') => 'DESC',
							),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'info_position',
							'heading'     => esc_html__('Info Position', 'eltdf-core'),
							'value'       => array(
								esc_html__('On Image Hover', 'eltdf-core') => 'on-image-hover',
								esc_html__('Below Image', 'eltdf-core')    => 'below-image',
							),
							'save_always' => true,
							'group'       => esc_html__('Content Layout', 'eltdf-core')
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'image_hover_type1',
							'heading'     => esc_html__('Image Hover Type', 'eltdf-core'),
							'value'       => array(
								esc_html__('Slide From Image Bottom', 'eltdf-core') => 'slide-from-image-bottom',
								esc_html__('Overlay Background', 'eltdf-core')      => 'overlay-background',
								esc_html__('Rectangle Info', 'eltdf-core')          => 'rectangle-info',
								esc_html__('Image Zoom', 'eltdf-core')              => 'image-zoom',
								esc_html__('Grayscale', 'eltdf-core')               => 'grayscale'
							),
							'save_always' => true,
							'dependency'  => array(
								'element' => 'info_position',
								'value'   => array('on-image-hover')
							),
							'group'       => esc_html__('Content Layout', 'eltdf-core')
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'image_hover_type2',
							'heading'     => esc_html__('Image Hover Type', 'eltdf-core'),
							'value'       => array(
								esc_html__('Shader Background', 'eltdf-core')      => 'shader-background',
								esc_html__('Switch Featured Images', 'eltdf-core') => 'switch-image',
								esc_html__('Image Zoom', 'eltdf-core')             => 'image-zoom',
								esc_html__('Grayscale', 'eltdf-core')              => 'grayscale'
							),
							'save_always' => true,
							'dependency'  => array('element' => 'info_position', 'value' => array('below-image')),
							'group'       => esc_html__('Content Layout', 'eltdf-core')
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'overlay_background_color1',
							'heading'    => esc_html__('Overlay Background Color', 'eltdf-core'),
							'dependency' => array(
								'element' => 'image_hover_type1',
								'value'   => array('overlay-background')
							),
							'group'      => esc_html__('Content Layout', 'eltdf-core')
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'overlay_content_color1',
							'heading'    => esc_html__('Overlay Content Color', 'eltdf-core'),
							'dependency' => array(
								'element' => 'image_hover_type1',
								'value'   => array('overlay-background')
							),
							'group'      => esc_html__('Content Layout', 'eltdf-core')
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'box_shadow',
							'heading'     => esc_html__('Box Shadow', 'eltdf-core'),
							'value'       => array(
								esc_html__('No', 'eltdf-core')  => 'no',
								esc_html__('Yes', 'eltdf-core') => 'yes',
							),
							'save_always' => true,
							'group'       => esc_html__('Content Layout', 'eltdf-core')
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'overlay_content_v_align1',
							'heading'     => esc_html__('Overlay Content Vertical Alignment', 'eltdf-core'),
							'value'       => array(
								esc_html__('Middle', 'eltdf-core') => 'middle',
								esc_html__('Top', 'eltdf-core')    => 'top',
								esc_html__('Bottom', 'eltdf-core') => 'bottom'
							),
							'save_always' => true,
							'dependency'  => array(
								'element' => 'image_hover_type1',
								'value'   => array('overlay-background')
							),
							'group'       => esc_html__('Content Layout', 'eltdf-core')
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'overlay_content_h_align1',
							'heading'     => esc_html__('Overlay Content Horizontal Alignment', 'eltdf-core'),
							'value'       => array(
								esc_html__('Center', 'eltdf-core') => 'center',
								esc_html__('Left', 'eltdf-core')   => 'left',
								esc_html__('Right', 'eltdf-core')  => 'right'
							),
							'save_always' => true,
							'dependency'  => array(
								'element' => 'image_hover_type1',
								'value'   => array('overlay-background')
							),
							'group'       => esc_html__('Content Layout', 'eltdf-core')
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'shader_background_color',
							'heading'    => esc_html__('Shader Background Color', 'eltdf-core'),
							'dependency' => array(
								'element' => 'image_hover_type2',
								'value'   => array('shader-background')
							),
							'group'      => esc_html__('Content Layout', 'eltdf-core')
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'content_top_margin',
							'heading'    => esc_html__('Content Top Margin (px)', 'eltdf-core'),
							'dependency' => array('element' => 'info_position', 'value' => array('below-image')),
							'group'      => esc_html__('Content Layout', 'eltdf-core')
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'content_bottom_margin',
							'heading'    => esc_html__('Content Bottom Margin (px)', 'eltdf-core'),
							'dependency' => array('element' => 'info_position', 'value' => array('below-image')),
							'group'      => esc_html__('Content Layout', 'eltdf-core')
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'content_text_align',
							'heading'     => esc_html__('Content Text Align', 'eltdf-core'),
							'value'       => array(
								esc_html__('Default', 'eltdf-core') => '',
								esc_html__('Left', 'eltdf-core')    => 'left',
								esc_html__('Center', 'eltdf-core')  => 'center',
								esc_html__('Right', 'eltdf-core')   => 'right'
							),
							'save_always' => true,
							'dependency'  => array('element' => 'info_position', 'value' => array('below-image')),
							'group'       => esc_html__('Content Layout', 'eltdf-core')
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'disable_title',
							'heading'     => esc_html__('Disable Title', 'eltdf-core'),
							'value'       => array(
								esc_html__('No', 'eltdf-core')  => 'no',
								esc_html__('Yes', 'eltdf-core') => 'yes'
							),
							'save_always' => true,
							'group'       => esc_html__('Content Layout', 'eltdf-core')
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'title_tag',
							'heading'     => esc_html__('Title Tag', 'eltdf-core'),
							'value'       => array(
								esc_html__('Default', 'eltdf-core') => '',
								'h1'                                => 'h1',
								'h2'                                => 'h2',
								'h3'                                => 'h3',
								'h4'                                => 'h4',
								'h5'                                => 'h5',
								'h6'                                => 'h6',
							),
							'save_always' => true,
							'dependency'  => array('element' => 'disable_title', 'value' => array('no')),
							'group'       => esc_html__('Content Layout', 'eltdf-core')
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'title_text_transform',
							'heading'     => esc_html__('Title Text Transform', 'eltdf-core'),
							'value'       => array(
								esc_html__('Default', 'eltdf-core')    => '',
								esc_html__('None', 'eltdf-core')       => 'none',
								esc_html__('Capitalize', 'eltdf-core') => 'capitalize',
								esc_html__('Uppercase', 'eltdf-core')  => 'uppercase',
								esc_html__('Lowercase', 'eltdf-core')  => 'lowercase',
								esc_html__('Initial', 'eltdf-core')    => 'initial',
								esc_html__('Inherit', 'eltdf-core')    => 'inherit'
							),
							'save_always' => true,
							'dependency'  => array('element' => 'disable_title', 'value' => array('no')),
							'group'       => esc_html__('Content Layout', 'eltdf-core')
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'disable_category',
							'heading'     => esc_html__('Disable Category', 'eltdf-core'),
							'value'       => array(
								esc_html__('No', 'eltdf-core')  => 'no',
								esc_html__('Yes', 'eltdf-core') => 'yes'
							),
							'save_always' => true,
							'group'       => esc_html__('Content Layout', 'eltdf-core')
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'disable_excerpt',
							'heading'     => esc_html__('Disable Excerpt', 'eltdf-core'),
							'value'       => array(
								esc_html__('Yes', 'eltdf-core') => 'yes',
								esc_html__('No', 'eltdf-core')  => 'no'
							),
							'save_always' => true,
							'group'       => esc_html__('Content Layout', 'eltdf-core')
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'excerpt_length',
							'heading'     => esc_html__('Excerpt Length', 'eltdf-core'),
							'description' => esc_html__('Number of characters', 'eltdf-core'),
							'dependency'  => array('element' => 'disable_excerpt', 'value' => array('no')),
							'group'       => esc_html__('Content Layout', 'eltdf-core')
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'show_load_more',
							'heading'     => esc_html__('Show Load More', 'eltdf-core'),
							'value'       => array(
								esc_html__('No', 'eltdf-core')  => 'no',
								esc_html__('Yes', 'eltdf-core') => 'yes'
							),
							'save_always' => true,
							'description' => esc_html__('Enabling this option will display a Load More button beneath your portfolio list. If you would like to use this option, please disable the "Enable Infinite Scroll" option.', 'eltdf-core'),
							'group'       => esc_html__('Additional Features', 'eltdf-core')
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'load_more_top_margin',
							'heading'    => esc_html__('Load More Top Margin (px)', 'eltdf-core'),
							'dependency' => array('element' => 'show_load_more', 'value' => array('yes')),
							'group'      => esc_html__('Additional Features', 'eltdf-core')
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'enable_infinite_scroll',
							'heading'     => esc_html__('Enable Infinite Scroll', 'eltdf-core'),
							'value'       => array(
								esc_html__('No', 'eltdf-core')  => 'no',
								esc_html__('Yes', 'eltdf-core') => 'yes'
							),
							'save_always' => true,
							'description' => esc_html__('Enabling this option you will enable infinite scroll functionality for your list. Also you will need to disable Show Load More option', 'eltdf-core'),
							'dependency'  => array('element' => 'type', 'value' => array('masonry')),
							'group'       => esc_html__('Additional Features', 'eltdf-core')
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'filter',
							'heading'     => esc_html__('Enable Category Filter', 'eltdf-core'),
							'value'       => array(
								esc_html__('No', 'eltdf-core')  => 'no',
								esc_html__('Yes', 'eltdf-core') => 'yes'
							),
							'save_always' => true,
							'group'       => esc_html__('Additional Features', 'eltdf-core')
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'filter_position',
							'heading'    => esc_html__('Filter Position', 'eltdf-core'),
							'value'      => array(
								esc_html__('Top', 'eltdf-core')  => 'top',
								esc_html__('Left', 'eltdf-core') => 'left'
							),
							'dependency' => array('element' => 'filter', 'value' => array('yes')),
							'group'      => esc_html__('Additional Features', 'eltdf-core')
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'filter_order_by',
							'heading'     => esc_html__('Filter Order By', 'eltdf-core'),
							'value'       => array(
								esc_html__('Name', 'eltdf-core')  => 'name',
								esc_html__('Count', 'eltdf-core') => 'count',
								esc_html__('Id', 'eltdf-core')    => 'id',
								esc_html__('Slug', 'eltdf-core')  => 'slug'
							),
							'save_always' => true,
							'dependency'  => array('element' => 'filter', 'value' => array('yes')),
							'group'       => esc_html__('Additional Features', 'eltdf-core')
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'filter_align',
							'heading'     => esc_html__('Filter Align', 'eltdf-core'),
							'value'       => array(
								esc_html__('Center', 'eltdf-core') => 'center',
								esc_html__('Left', 'eltdf-core')   => 'left',
								esc_html__('Right', 'eltdf-core')  => 'right'
							),
							'save_always' => true,
							'dependency'  => array('element' => 'filter', 'value' => array('yes')),
							'group'       => esc_html__('Additional Features', 'eltdf-core')
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'enable_loading_animation',
							'heading'     => esc_html__('Enable Loading Animation', 'eltdf-core'),
							'value'       => array(
								esc_html__('No', 'eltdf-core')  => 'no',
								esc_html__('Yes', 'eltdf-core') => 'yes'
							),
							'save_always' => true,
							'description' => esc_html__('Enabling this option will enable a content entry animation on your portfolio list.', 'eltdf-core'),
							'group'       => esc_html__('Additional Features', 'eltdf-core')
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'enable_hover_direction',
							'heading'     => esc_html__('Enable Direction-Aware Hover', 'eltdf-core'),
							'value'       => array(
								esc_html__('Yes', 'eltdf-core') => 'yes',
								esc_html__('No', 'eltdf-core')  => 'no'
							),
							'save_always' => true,
							'description' => esc_html__('Set this option to "Yes" if you would like the hover to follow the movement of your mouse pointer', 'eltdf-core'),
							'dependency'  => array(
								'element' => 'image_hover_type1',
								'value'   => array('rectangle-info')
							),
							'group'       => esc_html__('Additional Features', 'eltdf-core')
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'enable_first_content_element',
							'heading'     => esc_html__('Enable Content Element', 'eltdf-core'),
							'value'       => array(
								esc_html__('No', 'eltdf-core')  => 'no',
								esc_html__('Yes', 'eltdf-core') => 'yes'
							),
							'save_always' => true,
							'description' => esc_html__('Enabling this option will enable a content element as first on your list on your portfolio list.', 'eltdf-core'),
							'group'       => esc_html__('Additional Features', 'eltdf-core'),
							'dependency'  => array(
								'element' => 'type',
								'value'   => array('masonry')
							),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__('Content Element Title', 'eltdf-core'),
							'param_name'  => 'first_content_element_title',
							'admin_label' => true,
							'dependency'  => array('element' => 'enable_first_content_element', 'value' => array('yes')),
							'group'       => esc_html__('Additional Features', 'eltdf-core'),
						),
						array(
							'type'        => 'textarea',
							'heading'     => esc_html__('Content Element Text', 'eltdf-core'),
							'param_name'  => 'first_content_element_text',
							'admin_label' => true,
							'dependency'  => array('element' => 'enable_first_content_element', 'value' => array('yes')),
							'group'       => esc_html__('Additional Features', 'eltdf-core'),
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'first_content_element_size',
							'heading'     => esc_html__('Content Element Size', 'eltdf-core'),
							'value'       => array(
								esc_html__('Small', 'eltdf-core')              => 'small',
								esc_html__('Large Width', 'eltdf-core')        => 'large-width',
								esc_html__('Large Height', 'eltdf-core')       => 'large-height',
								esc_html__('Large Width/Height', 'eltdf-core') => 'large-width-height'
							),
							'save_always' => true,
							'group'       => esc_html__('Additional Features', 'eltdf-core'),
							'dependency'  => array('element' => 'enable_first_content_element', 'value' => array('yes')),
						),
					)
				)
			);
		}
	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @param $content string shortcode content
	 *
	 * @return string
	 */
	public function render($atts, $content = null) {
		$args = array(
			'type'                         => 'gallery',
			'number_of_columns'            => '3',
			'space_between_items'          => 'normal',
			'number_of_items'              => '-1',
			'image_proportions'            => 'full',
			'category'                     => '',
			'selected_projects'            => '',
			'categories_to_display'        => '',
			'tag'                          => '',
			'order_by'                     => 'date',
			'order'                        => 'ASC',
			'info_position'                => 'on-image-hover',
			'image_hover_type1'            => 'slide-from-image-bottom',
			'image_hover_type2'            => 'shader-background',
			'overlay_background_color1'    => '',
			'overlay_content_color1'       => '',
			'box_shadow'                   => '',
			'overlay_content_v_align1'     => 'middle',
			'overlay_content_h_align1'     => 'center',
			'shader_background_color'      => '',
			'content_top_margin'           => '',
			'content_bottom_margin'        => '',
			'content_text_align'           => '',
			'disable_title'                => 'no',
			'title_tag'                    => 'h4',
			'title_text_transform'         => '',
			'disable_category'             => 'no',
			'disable_excerpt'              => 'yes',
			'excerpt_length'               => '20',
			'show_load_more'               => 'no',
			'load_more_top_margin'         => '',
			'enable_infinite_scroll'       => 'no',
			'filter'                       => 'no',
			'filter_order_by'              => 'name',
			'filter_align'                 => '',
			'enable_loading_animation'     => 'no',
			'slider'                 	   => '',
			'slider_speed'                 => '',
			'filter_position'              => 'top',
			'enable_loop'                  => '',
			'enable_variable_width'        => 'no',
			'enable_padding'               => '',
			'enable_navigation'            => '',
			'navigation_skin'              => '',
			'enable_pagination'            => 'yes',
			'pagination_skin'              => '',
			'pagination_position'          => '',
			'enable_hover_direction'       => 'no',
			'enable_first_content_element' => 'no',
			'first_content_element_title'  => '',
			'first_content_element_text'   => '',
			'first_content_element_size'   => '',

		);

		$params = shortcode_atts($args, $atts);
		extract($params);

		$query_array = $this->getQueryArray($params);
		$query_results = new \WP_Query($query_array);
		$params['query_results'] = $query_results;

		$params['title_tag'] = !empty($params['title_tag']) ? $params['title_tag'] : $args['title_tag'];
		$params['filter_classes'] = $this->getFilterClasses($params);

		$classes = $this->getPortfolioClasses($params);

		$data_atts = $this->getDataAtts($params);
		$data_atts .= ' data-max-num-pages="' . $query_results->max_num_pages . '"';


		$html = '';

		$html .= '<div class="eltdf-portfolio-list-holder ' . $classes . '" ' . $data_atts . '>';

		if ($filter == 'yes') {
			$params['filter_categories'] = $this->getFilterCategories($params);
			$html .= eltd_core_get_shortcode_module_template_part('portfolio', 'portfolio-filter-' . $params['filter_position'], '', $params);
		}

		$html .= '<div class="eltdf-pl-inner clearfix">';
		
		if($slider !== 'on') {
			$html .= '<div class="eltdf-pl-grid-sizer"></div>';
			$html .= '<div class="eltdf-pl-grid-gutter"></div>';
		}

		if ($type === 'masonry') {
			if ($enable_first_content_element == 'yes') {
				$html .= '<article class="eltdf-pl-item eltdf-pl-first-item eltdf-pl-masonry-' . $first_content_element_size . '">';
				$html .= '<div class="eltdf-pl-item-inner">';
				$html .= '<div class="eltdf-pl-first-item-text">';
				$html .= '<div class="eltdf-pl-first-item-text-inner">';
				$html .= '<h2>';
				$html .= esc_html($first_content_element_title);
				$html .= '</h2>';
				$html .= '<p class="mkd-portfolio-masonry-text">';
				$html .= esc_html($first_content_element_text);
				$html .= '</p>';
				$html .= '<div class="eltdf-separator-holder clearfix eltdf-separator-left eltdf-separator-normal">';
				$html .= '<div class="eltdf-separator" style="width: 80px;border-bottom-width: 2px"></div>';
				$html .= '</div>';
				$html .= '</div>';
				$html .= '</div>';
				$html .= '</div>';
				$html .= '</article>';
			}
		}

		if ($query_results->have_posts()):
			while ($query_results->have_posts()) : $query_results->the_post();

				$params['current_id'] = get_the_ID();
				$params['article_classes'] = $this->getArticleClasses($params);

				$params['thumb_size'] = $this->getImageSize($params);

				$params['text_holder_styles'] = $this->getTextHolderStyles($params);
				$params['shader_styles'] = $this->getShaderStyles($params);
				$params['text_inner_styles'] = $this->getTextInnerStyles($params);
				$params['title_styles'] = $this->getTitleStyles($params);
				$params['excerpt_styles'] = $this->getExcerptStyles($params);
				$params['categories'] = $this->getItemCategories($params);
				$params['switch_featured_image'] = $this->getSwitchFeaturedImage($params);
				$params['category_html'] = $this->getItemCategoriesHtml($params);
				$params['item_link'] = $this->getItemLink($params);

				$html .= eltd_core_get_shortcode_module_template_part('portfolio', 'portfolio-item', '', $params);

			endwhile;
		else:
			$html .= '<p>' . esc_html_e('Sorry, no posts matched your criteria.', 'eltdf-core') . '</p>';
		endif;

		$html .= '</div>';

		if ($show_load_more === 'yes') {
			$params['load_more_styles'] = $this->getLoadMoreStyles($params);
			$html .= eltd_core_get_shortcode_module_template_part('portfolio', 'load-more-template', '', $params);
		}

		wp_reset_postdata();

		$html .= '</div>';

		return $html;
	}

	/**
	 * Generates portfolio list query attribute array
	 *
	 * @param $params
	 *
	 * @return array
	 */
	public function getQueryArray($params) {
		$query_array = array(
			'post_status'    => 'publish',
			'post_type'      => 'portfolio-item',
			'posts_per_page' => $params['number_of_items'],
			'orderby'        => $params['order_by'],
			'order'          => $params['order']
		);

		if (!empty($params['category'])) {
			$query_array['portfolio-category'] = $params['category'];
		}

		if (!empty($params['categories_to_display'])) {
			$categories_selected = explode(',', $params['categories_to_display']);
			$query_array['portfolio-category'] = $categories_selected;
		}

		$project_ids = null;
		if (!empty($params['selected_projects'])) {
			$project_ids = explode(',', $params['selected_projects']);
			$query_array['post__in'] = $project_ids;
		}

		if (!empty($params['tag'])) {
			$query_array['portfolio-tag'] = $params['tag'];
		}

		if (!empty($params['next_page'])) {
			$query_array['paged'] = $params['next_page'];
		} else {
			$query_array['paged'] = 1;
		}

		return $query_array;
	}

	/**
	 * Generates portfolio classes
	 *
	 * @param $params
	 *
	 * @return string
	 */
	public function getPortfolioClasses($params) {
		$classes = array();

		$filter_position = $params['filter_position'];
		$type = $params['type'];
		$number_of_columns = $params['number_of_columns'];
		$space_between_items = $params['space_between_items'];

		if (!empty($params['category'])) {
			$classes[] = 'eltdf-single-category';
		}

		switch ($type):
			case 'gallery':
				$classes[] = 'eltdf-pl-gallery';
				break;
			case 'masonry':
				$classes[] = 'eltdf-pl-masonry';
				break;
			default:
				$classes[] = 'eltdf-pl-gallery';
				break;
		endswitch;

		switch ($number_of_columns):
			case '1':
				$classes[] = 'eltdf-pl-one-column';
				break;
			case '2':
				$classes[] = $filter_position == 'top' ? 'eltdf-pl-two-columns' : 'eltdf-pl-one-column';
				break;
			case '3':
				$classes[] = $filter_position == 'top' ? 'eltdf-pl-three-columns' : 'eltdf-pl-two-columns';
				break;
			case '4':
				$classes[] = $filter_position == 'top' ? 'eltdf-pl-four-columns' : 'eltdf-pl-three-columns';
				break;
			case '5':
				$classes[] = $filter_position == 'top' ? 'eltdf-pl-five-columns' : 'eltdf-pl-four-columns';
				break;
			default:
				$classes[] = $filter_position == 'top' ? 'eltdf-pl-three-columns' : 'eltdf-pl-two-columns';
				break;
		endswitch;

		switch ($space_between_items):
			case 'no_space':
				$classes[] = 'eltdf-pl-no-space';
				break;
			case 'tiny':
				$classes[] = 'eltdf-pl-tiny-space';
				break;
			case 'small':
				$classes[] = 'eltdf-pl-small-space';
				break;
			case 'normal':
				$classes[] = 'eltdf-pl-normal-space';
				break;
			case 'large':
				$classes[] = 'eltdf-pl-large-space';
				break;
			default:
				$classes[] = 'eltdf-pl-normal-space';
				break;
		endswitch;

		if (!empty($params['info_position'])) {
			$classes[] = 'eltdf-pl-info-' . $params['info_position'];
		}

		if (!empty($params['image_hover_type1']) && $params['info_position'] === 'on-image-hover') {
			$classes[] = 'eltdf-pl-hover-' . $params['image_hover_type1'];
		}

		if (!empty($params['image_hover_type2']) && $params['info_position'] === 'below-image') {
			$classes[] = 'eltdf-pl-hover-' . $params['image_hover_type2'];
		}

		if ($params['show_load_more'] === 'yes') {
			$classes[] = 'eltdf-pl-has-load-more';
		}

		if ($params['enable_infinite_scroll'] === 'yes') {
			$classes[] = 'eltdf-pl-has-infinite-scroll';
		}

		if ($params['filter'] === 'yes') {
			$classes[] = 'eltdf-pl-has-filter';
			$classes[] = 'eltdf-pl-filter-position-' . $filter_position;
		}

		if ($params['enable_loading_animation'] === 'yes') {
			$classes[] = 'eltdf-pl-has-animation';
		}

		if (!empty($params['enable_variable_width']) && $params['enable_variable_width'] === 'yes') {
			$classes[] = 'eltdf-slider-variable-width';
		}

		if (!empty($params['navigation_skin'])) {
			$classes[] = 'eltdf-nav-' . $params['navigation_skin'] . '-skin';
		}

		if (!empty($params['pagination_skin'])) {
			$classes[] = 'eltdf-pag-' . $params['pagination_skin'] . '-skin';
		}

		if ($params['pagination_position'] !== '') {
			$classes[] = 'eltdf-pag-' . $params['pagination_position'];
		}

		if ($params['enable_hover_direction'] === 'yes') {
			$classes[] = 'eltdf-hover-direction-active';
		}

		return implode(' ', $classes);
	}

	/**
	 * Generates portfolio article classes
	 *
	 * @param $params
	 *
	 * @return string
	 */
	public function getArticleClasses($params) {
		$classes = array();

		$id = $params['current_id'];
		$type = $params['type'];
		$image_hover_type2 = $params['image_hover_type2'];

		if (get_post_meta($id, "eltdf_portfolio_featured_image_meta", true) !== "" && $image_hover_type2 === 'switch-image') {
			$classes[] = 'eltdf-pl-has-switch-image';
		} elseif (get_post_meta($id, "eltdf_portfolio_featured_image_meta", true) === "" && $image_hover_type2 === 'switch-image') {
			$classes[] = 'eltdf-pl-no-switch-image';
		}

		if ($params['box_shadow'] === 'yes') {
			$classes[] = 'eltdf-box-shadow';
		}

		if ($type === 'masonry') {

			$masonry_size = get_post_meta($id, 'portfolio_masonry_dimenisions', true);

			if ($masonry_size !== '') {
				switch ($masonry_size):
					case 'small' :
						$classes[] = 'eltdf-pl-masonry-small';
						break;
					case 'large_width' :
						$classes[] = 'eltdf-pl-masonry-large-width';
						break;
					case 'large_height' :
						$classes[] = 'eltdf-pl-masonry-large-height';
						break;
					case 'large_width_height' :
						$classes[] = 'eltdf-pl-masonry-large-width-height';
						break;
				endswitch;
			}
		}

		return implode(' ', $classes);
	}

	/**
	 * Generates portfolio image size
	 *
	 * @param $params
	 *
	 * @return string
	 */
	public function getImageSize($params) {
		$thumb_size = 'full';

		if (!empty($params['image_proportions'])) {
			$image_size = $params['image_proportions'];

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
		}

		return $thumb_size;
	}

	/**
	 * Returns array of text holder content styles
	 *
	 * @param $params
	 *
	 * @return array
	 */
	public function getTextHolderStyles($params) {
		$styles = array();

		if (!empty($params['overlay_background_color1']) && $params['image_hover_type1'] === 'overlay-background') {
			$styles[] = 'background-color: ' . $params['overlay_background_color1'];
		}

		if (!empty($params['shader_background_color']) && $params['image_hover_type2'] === 'shader-background' && $params['info_position'] == 'on-image-hover') {
			$styles[] = 'background-color: ' . $params['shader_background_color'];
		}

		if (!empty($params['overlay_content_h_align1']) && $params['image_hover_type1'] === 'overlay-background') {
			$styles[] = 'text-align: ' . $params['overlay_content_h_align1'];
		}

		if (!empty($params['content_top_margin']) && $params['info_position'] === 'below-image') {
			$styles[] = 'margin-top: ' . ambient_elated_filter_px($params['content_top_margin']) . 'px';
		}

		if (!empty($params['content_bottom_margin']) && $params['info_position'] === 'below-image') {
			$styles[] = 'margin-bottom: ' . ambient_elated_filter_px($params['content_bottom_margin']) . 'px';
		}

		if (!empty($params['content_text_align']) && $params['info_position'] === 'below-image') {
			$styles[] = 'text-align: ' . $params['content_text_align'];
		}

		return implode(';', $styles);
	}

	/**
	 * Returns array of text inner content styles
	 *
	 * @param $params
	 *
	 * @return array
	 */
	public function getTextInnerStyles($params) {
		$styles = array();

		if (!empty($params['overlay_content_v_align1']) && $params['image_hover_type1'] === 'overlay-background') {
			$styles[] = 'vertical-align: ' . $params['overlay_content_v_align1'];
		}

		return implode(';', $styles);
	}

	public function getShaderStyles($params) {
		$styles = array();

		if (!empty($params['shader_background_color']) && $params['image_hover_type2'] === 'shader-background' && $params['info_position'] == 'below-image') {
			$styles[] = 'background-color: ' . $params['shader_background_color'];
		}

		return implode(';', $styles);
	}

	/**
	 * Returns array of title element styles
	 *
	 * @param $params
	 *
	 * @return array
	 */
	public function getTitleStyles($params) {
		$styles = array();

		if (!empty($params['overlay_content_color1']) && $params['image_hover_type1'] === 'overlay-background') {
			$styles[] = 'color: ' . $params['overlay_content_color1'];
		}

		if (!empty($params['title_text_transform'])) {
			$styles[] = 'text-transform: ' . $params['title_text_transform'];
		}

		return implode(';', $styles);
	}

	/**
	 * Returns array of excerpt element styles
	 *
	 * @param $params
	 *
	 * @return array
	 */
	public function getExcerptStyles($params) {
		$styles = array();

		if (!empty($params['overlay_content_color1']) && $params['image_hover_type1'] === 'overlay-background') {
			$styles[] = 'color: ' . $params['overlay_content_color1'];
		}

		return implode(';', $styles);
	}

	/**
	 * Get portfolio featured image for switch featured images hover style
	 *
	 * @param $params
	 *
	 * @return string
	 */
	public function getSwitchFeaturedImage($params) {

		$featured_image = '';
		$id = $params['current_id'];

		if (get_post_meta($id, "eltdf_portfolio_featured_image_meta", true) !== "") {
			$featured_image = get_post_meta($id, "eltdf_portfolio_featured_image_meta", true);
		}

		return $featured_image;
	}

	/**
	 * Generates portfolio item categories html based on id
	 *
	 * @param $params
	 *
	 * @return html
	 */
	public function getItemCategoriesHtml($params) {
		$id = $params['current_id'];
		$parent_categories = array();
		$child_categories = array();
		$filter_categories = array();
		$categories = array();
		$args = array();

		/* Get all categories of portfolio  */
		$all_categories = wp_get_post_terms($id, 'portfolio-category', $args);
		/* Check if user wants to display only specific categories and get them */
		if (isset($params['categories_to_display']) && $params['categories_to_display'] != '') {
			$categories_selected = explode(',', $params['categories_to_display']);
			$args = array(
				'taxonomy' => 'portfolio-category',
				'slug'     => $categories_selected
			);

			$filter_categories = get_terms($args);
		}

		/* Loop for sorting on parent categories and child categories */
		foreach ($all_categories as $category) {
			/* Check if specific categories exist */
			if (is_array($filter_categories) && sizeof($filter_categories) > 0) {
				/* Check if portfolio category matches filtered categories */
				foreach ($filter_categories as $filter) {
					if ($category->parent == 0 && $filter->term_id == $category->term_id) {
						$parent_categories[] = $category;
					} else if ($category->parent != 0 && $filter->term_id == $category->parent) {
						$child_categories [] = $category;
					}
				}
			} else {
				if ($category->parent == 0) {
					$parent_categories[] = $category;
				} else if ($category->parent != 0) {
					$child_categories [] = $category;
				}
			}
		}

		/* Display child categories if exists, otherwise display parent category */
		if (sizeof($child_categories) != 0) {
			$categories = $child_categories;
		} else {
			$categories = $parent_categories;
		}

		/* Print category html */
		$category_html = '<div class="eltdf-ptf-category-holder" style="color: ' . $params["overlay_content_color1"] . ';">';
		$k = 1;
		foreach ($categories as $cat) {
			$category_html .= '<span>' . $cat->name . '</span>';
			if (count($categories) != $k) {
				$category_html .= ' / ';
			}
			$k++;
		}
		$category_html .= '</div>';

		return $category_html;
	}

	/**
	 * Generates filter categories array
	 *
	 * @param $params
	 *
	 * @return array
	 */
	public function getFilterCategories($params) {

		$filter_categories = array();

		$cat_id = 0;

		if (isset($params['categories_to_display']) && $params['categories_to_display'] != '') {
			$categories_selected = explode(',', $params['categories_to_display']);

			foreach ($categories_selected as $category) {

				$cat_id = get_term_by('slug', $category, 'portfolio-category')->term_id;
				$filter_categories[$cat_id] = getAllChildCategoriesIds($cat_id, $params);
			}
		} else {
			if (!empty($params['category'])) {
				$top_category = get_term_by('slug', $params['category'], 'portfolio-category');

				if (isset($top_category->term_id)) {
					$cat_id = $top_category->term_id;
				}

				$filter_categories[0] = null;
			} else {
				$filter_categories[0] = getAllChildCategoriesIds($cat_id, $params);
			}

			$categories_selected = getChildCategoriesIds($cat_id, $params);

			foreach ($categories_selected as $category_key => $category_value) {

				$cat_id = $category_value;

				if (!empty($params['category'])) {
					$filter_categories[$cat_id] = false;
				} else {
					$filter_categories[$cat_id] = getAllChildCategoriesIds($cat_id, $params);
				}
			}
		}

		return $filter_categories;
	}

	/**
	 * Returns array of filter classes
	 *
	 * @param $params
	 *
	 * @return array
	 */
	public function getFilterClasses($params) {
		$classes = array('eltdf-portfolio-filter-holder');

		if (!empty($params['filter_position'])) {
			$classes[] = 'eltdf-portfolio-filter-' . $params['filter_position'];
		}

		if (!empty($params['filter_align'])) {
			$classes[] = 'eltd-filter-align-' . $params['filter_align'];
		}

		if ($params['type'] === 'masonry') {
			$classes[] = 'eltdf-masonry-filter';
		}

		return $classes;
	}

	/**
	 * Returns array of load more element styles
	 *
	 * @param $params
	 *
	 * @return array
	 */
	public function getLoadMoreStyles($params) {
		$styles = array();

		if (!empty($params['load_more_top_margin'])) {
			$styles[] = 'margin-top: ' . ambient_elated_filter_px($params['load_more_top_margin']) . 'px';
		}

		return implode(';', $styles);
	}

	/**
	 * Generates data attributes array
	 *
	 * @param $params
	 *
	 * @return array
	 */
	public function getDataAtts($params) {
		$data_attr = array();
		$data_return_string = '';

		if (get_query_var('paged')) {
			$paged = get_query_var('paged');
		} elseif (get_query_var('page')) {
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}

		if (!empty($paged)) {
			$data_attr['data-next-page'] = $paged + 1;
		}

		if (!empty($params['type'])) {
			$data_attr['data-type'] = $params['type'];
		}
		if (!empty($params['number_of_columns'])) {
			$data_attr['data-number-of-columns'] = $params['number_of_columns'];
		} else {
			$data_attr['data-number-of-columns'] = 3;
		}
		if (!empty($params['space_between_items'])) {
			$data_attr['data-space-between-items'] = $params['space_between_items'];
		}
		if (!empty($params['number_of_items'])) {
			$data_attr['data-number-of-items'] = $params['number_of_items'];
		}
		if (!empty($params['image_proportions'])) {
			$data_attr['data-image-proportions'] = $params['image_proportions'];
		}
		if (!empty($params['category'])) {
			$data_attr['data-category'] = $params['category'];
		}

//		if (!empty($params['categories_to_display'])) {
//			$categories_selected = explode(',', $params['categories_to_display']);
//			$data_attr['data-category'] = $categories_selected;
//		}

		if (!empty($params['selected_projects'])) {
			$data_attr['data-selected-projects'] = $params['selected_projects'];
		}
		if (!empty($params['tag'])) {
			$data_attr['data-tag'] = $params['tag'];
		}
		if (!empty($params['order_by'])) {
			$data_attr['data-order-by'] = $params['order_by'];
		}
		if (!empty($params['order'])) {
			$data_attr['data-order'] = $params['order'];
		}
		if (!empty($params['info_position'])) {
			$data_attr['data-info-position'] = $params['info_position'];
		}
		if (!empty($params['image_hover_type1']) && $params['info_position'] === 'on-image-hover') {
			$data_attr['data-image-hover-type1'] = $params['image_hover_type1'];
		}
		if (!empty($params['image_hover_type2']) && $params['info_position'] === 'below-image') {
			$data_attr['data-image-hover-type2'] = $params['image_hover_type2'];
		}
		if (!empty($params['overlay_background_color1']) && $params['image_hover_type1'] === 'overlay-background') {
			$data_attr['data-overlay-background-color1'] = $params['overlay_background_color1'];
		}
		if (!empty($params['overlay_content_color1']) && $params['image_hover_type1'] === 'overlay-background') {
			$data_attr['data-overlay-content-color1'] = $params['overlay_content_color1'];
		}
		if (!empty($params['overlay_content_v_align1']) && $params['image_hover_type1'] === 'overlay-background') {
			$data_attr['data-overlay-content-v-align1'] = $params['overlay_content_v_align1'];
		}
		if (!empty($params['overlay_content_h_align1']) && $params['image_hover_type1'] === 'overlay-background') {
			$data_attr['data-overlay-content-h-align1'] = $params['overlay_content_h_align1'];
		}
		if (!empty($params['shader_background_color']) && $params['image_hover_type2'] === 'shader-background') {
			$data_attr['data-shader-background-color'] = $params['shader_background_color'];
		}
		if (!empty($params['content_top_margin'])) {
			$data_attr['data-content-top-margin'] = $params['content_top_margin'];
		}
		if (!empty($params['content_bottom_margin'])) {
			$data_attr['data-content-bottom-margin'] = $params['content_bottom_margin'];
		}
		if (!empty($params['content_text_align'])) {
			$data_attr['data-content-text-align'] = $params['content_text_align'];
		}
		if (!empty($params['disable_title'])) {
			$data_attr['data-disable-title'] = $params['disable_title'];
		}
		if (!empty($params['title_tag'])) {
			$data_attr['data-title-tag'] = $params['title_tag'];
		}
		if (!empty($params['title_text_transform'])) {
			$data_attr['data-title-text-transform'] = $params['title_text_transform'];
		}
		if (!empty($params['disable_category'])) {
			$data_attr['data-disable-category'] = $params['disable_category'];
		}
		if (!empty($params['disable_excerpt'])) {
			$data_attr['data-disable-excerpt'] = $params['disable_excerpt'];
		}
		if ($params['excerpt_length'] !== '') {
			$data_attr['data-excerpt-length'] = $params['excerpt_length'];
		}
		if (!empty($params['slider_speed'])) {
			$data_attr['data-slider-speed'] = $params['slider_speed'];
		}
		if (!empty($params['enable_loop'])) {
			$data_attr['data-loop'] = $params['enable_loop'];
		}
		if (!empty($params['enable_variable_width'])) {
			$data_attr['data-enable-variable-width'] = $params['enable_variable_width'];
		}
		if (!empty($params['enable_padding'])) {
			$data_attr['data-padding'] = $params['enable_padding'];
		}
		if (!empty($params['enable_navigation'])) {
			$data_attr['data-navigation'] = $params['enable_navigation'];
		}
		if (!empty($params['enable_pagination'])) {
			$data_attr['data-pagination'] = $params['enable_pagination'];
		}
		if ($params['enable_hover_direction'] === 'yes') {
			$data_attr['data-enable-hover-direction'] = $params['enable_hover_direction'];
		}

		foreach ($data_attr as $key => $value) {
			if ($key !== '') {
				$data_return_string .= ' ' . $key . '="' . esc_attr($value) . '"';
			}
		}

		return $data_return_string;
	}

	public function getItemLink($params) {

		$id = $params['current_id'];
		$portfolio_link = array();
		$portfolio_link['link'] = get_permalink($id);
		$portfolio_link['target'] = '_self';

		if (get_post_meta($id, 'portfolio_external_link', true) !== '') {
			$portfolio_link['link'] = get_post_meta($id, 'portfolio_external_link', true);
			$portfolio_link['target'] = '_blank';
		}

		return $portfolio_link;
	}

	/**
	 * Filter portfolio categories
	 *
	 * @param $query
	 *
	 * @return array
	 */
	public function portfolioCategoryAutocompleteSuggester($query) {
		global $wpdb;
		$post_meta_infos = $wpdb->get_results($wpdb->prepare("SELECT a.slug AS slug, a.name AS portfolio_category_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'portfolio-category' AND a.name LIKE '%%%s%%'", stripslashes($query)), ARRAY_A);

		$results = array();
		if (is_array($post_meta_infos) && !empty($post_meta_infos)) {
			foreach ($post_meta_infos as $value) {
				$data = array();
				$data['value'] = $value['slug'];
				$data['label'] = ((strlen($value['portfolio_category_title']) > 0) ? esc_html__('Category', 'eltdf-core') . ': ' . $value['portfolio_category_title'] : '');
				$results[] = $data;
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
	public function portfolioCategoryAutocompleteRender($query) {
		$query = trim($query['value']); // get value from requested
		if (!empty($query)) {
			// get portfolio category
			$portfolio_category = get_term_by('slug', $query, 'portfolio-category');
			if (is_object($portfolio_category)) {

				$portfolio_category_slug = $portfolio_category->slug;
				$portfolio_category_title = $portfolio_category->name;

				$portfolio_category_title_display = '';
				if (!empty($portfolio_category_title)) {
					$portfolio_category_title_display = esc_html__('Category', 'eltdf-core') . ': ' . $portfolio_category_title;
				}

				$data = array();
				$data['value'] = $portfolio_category_slug;
				$data['label'] = $portfolio_category_title_display;

				return !empty($data) ? $data : false;
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
	public function portfolioIdAutocompleteSuggester($query) {
		global $wpdb;
		$portfolio_id = (int)$query;
		$post_meta_infos = $wpdb->get_results($wpdb->prepare("SELECT ID AS id, post_title AS title
					FROM {$wpdb->posts} 
					WHERE post_type = 'portfolio-item' AND ( ID = '%d' OR post_title LIKE '%%%s%%' )", $portfolio_id > 0 ? $portfolio_id : -1, stripslashes($query), stripslashes($query)), ARRAY_A);

		$results = array();
		if (is_array($post_meta_infos) && !empty($post_meta_infos)) {
			foreach ($post_meta_infos as $value) {
				$data = array();
				$data['value'] = $value['id'];
				$data['label'] = esc_html__('Id', 'eltdf-core') . ': ' . $value['id'] . ((strlen($value['title']) > 0) ? ' - ' . esc_html__('Title', 'eltdf-core') . ': ' . $value['title'] : '');
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
	public function portfolioIdAutocompleteRender($query) {
		$query = trim($query['value']); // get value from requested
		if (!empty($query)) {
			// get portfolio
			$portfolio = get_post((int)$query);
			if (!is_wp_error($portfolio)) {

				$portfolio_id = $portfolio->ID;
				$portfolio_title = $portfolio->post_title;

				$portfolio_title_display = '';
				if (!empty($portfolio_title)) {
					$portfolio_title_display = ' - ' . esc_html__('Title', 'eltdf-core') . ': ' . $portfolio_title;
				}

				$portfolio_id_display = esc_html__('Id', 'eltdf-core') . ': ' . $portfolio_id;

				$data = array();
				$data['value'] = $portfolio_id;
				$data['label'] = $portfolio_id_display . $portfolio_title_display;

				return !empty($data) ? $data : false;
			}

			return false;
		}

		return false;
	}

	/**
	 * Generates portfolio item categories ids.This function is used for filtering
	 *
	 * @param $params
	 *
	 * @return array
	 */
	public function getItemCategories($params) {
		$id = $params['current_id'];
		$category_return_array = array();
		$category_return_array[] = 'portfolio_category_0';

		$categories = wp_get_post_terms($id, 'portfolio-category');

		foreach ($categories as $cat) {
			$category_return_array[] = 'portfolio_category_' . $cat->term_id;
			$category_return_array[] = 'portfolio_category_' . $cat->parent;
		}

		return implode(' ', $category_return_array);
	}

	/**
	 * Filter portfolio tags
	 *
	 * @param $query
	 *
	 * @return array
	 */
	public function portfolioTagAutocompleteSuggester($query) {
		global $wpdb;
		$post_meta_infos = $wpdb->get_results($wpdb->prepare("SELECT a.slug AS slug, a.name AS portfolio_tag_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'portfolio-tag' AND a.name LIKE '%%%s%%'", stripslashes($query)), ARRAY_A);

		$results = array();
		if (is_array($post_meta_infos) && !empty($post_meta_infos)) {
			foreach ($post_meta_infos as $value) {
				$data = array();
				$data['value'] = $value['slug'];
				$data['label'] = ((strlen($value['portfolio_tag_title']) > 0) ? esc_html__('Tag', 'eltdf-core') . ': ' . $value['portfolio_tag_title'] : '');
				$results[] = $data;
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
	public function portfolioTagAutocompleteRender($query) {
		$query = trim($query['value']); // get value from requested
		if (!empty($query)) {
			// get portfolio category
			$portfolio_tag = get_term_by('slug', $query, 'portfolio-tag');
			if (is_object($portfolio_tag)) {

				$portfolio_tag_slug = $portfolio_tag->slug;
				$portfolio_tag_title = $portfolio_tag->name;

				$portfolio_tag_title_display = '';
				if (!empty($portfolio_tag_title)) {
					$portfolio_tag_title_display = esc_html__('Tag', 'eltdf-core') . ': ' . $portfolio_tag_title;
				}

				$data = array();
				$data['value'] = $portfolio_tag_slug;
				$data['label'] = $portfolio_tag_title_display;

				return !empty($data) ? $data : false;
			}

			return false;
		}

		return false;
	}
}