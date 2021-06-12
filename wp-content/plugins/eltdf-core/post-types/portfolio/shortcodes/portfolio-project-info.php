<?php
namespace ElatedCore\CPT\Portfolio\Shortcodes;

use ElatedCore\Lib;

/**
 * Class PortfolioProjectInfo
 * @package ElatedCore\CPT\Portfolio\Shortcodes
 */
class PortfolioProjectInfo implements Lib\ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    public function __construct() {
        $this->base = 'eltdf_portfolio_project_info';

        add_action('vc_before_init', array($this, 'vcMap'));

        //Portfolio project id filter
        add_filter('vc_autocomplete_eltdf_portfolio_project_info_project_id_callback', array(
            &$this,
            'portfolioIdAutocompleteSuggester',
        ), 10, 1); // Get suggestion(find). Must return an array

        //Portfolio project id render
        add_filter('vc_autocomplete_eltdf_portfolio_project_info_project_id_render', array(
            &$this,
            'portfolioIdAutocompleteRender',
        ), 10, 1); // Render exact portfolio. Must return an array (label,value)
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
        if(function_exists('vc_map')) {
            vc_map(array(
                    'name'                      => esc_html__('Elated Portfolio Project Info', 'eltdf-core'),
                    'base'                      => $this->getBase(),
                    'category'                  => esc_html__('by ELATED', 'eltdf-core'),
                    'icon'                      => 'icon-wpb-portfolio-project-info extended-custom-icon',
                    'allowed_container_element' => 'vc_row',
                    'params'                    => array(
                        array(
                            'type'        => 'autocomplete',
                            'param_name'  => 'project_id',
                            'heading'     => esc_html__('Selected Project', 'eltdf-core'),
                            'settings'    => array(
                                'sortable'      => true,
                                'unique_values' => true
                            ),
                            'description' => esc_html__('If you leave empty this field then project ID will be of the current page', 'eltdf-core'),
                            'dependency'  => array('element' => 'set_this_item_as_current', 'value' => array('no'))
                        ),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'project_info_type',
                            'heading'     => esc_html__('Project Info Type', 'eltdf-core'),
                            'value'       => array(
                                esc_html__('Title', 'eltdf-core')    => 'title',
                                esc_html__('Category', 'eltdf-core') => 'category',
                                esc_html__('Tag', 'eltdf-core')      => 'tag',
                                esc_html__('Author', 'eltdf-core')   => 'author',
                                esc_html__('Date', 'eltdf-core')     => 'date'
                            ),
                            'admin_label' => true,
                            'save_always' => true
                        ),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'project_info_title_type_tag',
                            'heading'     => esc_html__('Project Info Title Type Tag', 'eltdf-core'),
                            'value'       => array(
                                esc_html__('Default', 'eltdf-core') => '',
                                'h1'                                => 'h1',
                                'h2'                                => 'h2',
                                'h3'                                => 'h3',
                                'h4'                                => 'h4',
                                'h5'                                => 'h5',
                                'h6'                                => 'h6',
                                'p'                                 => 'p',
                                'span'                              => 'span'
                            ),
                            'save_always' => true,
                            'description' => esc_html__('Set title tag for project title element', 'eltdf-core'),
                            'dependency'  => array('element' => 'project_info_type', 'value' => array('title'))
                        ),
                        array(
                            'type'        => 'textfield',
                            'param_name'  => 'project_info_title',
                            'heading'     => esc_html__('Project Info Title', 'eltdf-core'),
                            'description' => esc_html__('Add project info title before project info element/s', 'eltdf-core')
                        ),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'project_info_title_tag',
                            'heading'     => esc_html__('Project Info Title Tag', 'eltdf-core'),
                            'value'       => array(
                                esc_html__('Default', 'eltdf-core') => '',
                                'h1'                                => 'h1',
                                'h2'                                => 'h2',
                                'h3'                                => 'h3',
                                'h4'                                => 'h4',
                                'h5'                                => 'h5',
                                'h6'                                => 'h6',
                                'p'                                 => 'p',
                                'span'                              => 'span'
                            ),
                            'save_always' => true,
                            'dependency'  => array('element' => 'project_info_title', 'not_empty' => true)
                        )
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
            'project_id'                  => '',
            'project_info_type'           => 'title',
            'project_info_title_type_tag' => 'h5',
            'project_info_title'          => '',
            'project_info_title_tag'      => 'span'
        );

        $params = shortcode_atts($args, $atts);
        extract($params);

        //$params['set_this_item_as_current'] = !empty($params['set_this_item_as_current']) ? $params['set_this_item_as_current'] : $args['set_this_item_as_current'];
        $params['project_id']                  = !empty($params['project_id']) ? $params['project_id'] : get_the_ID();
        $params['project_info_title_type_tag'] = !empty($params['project_info_title_type_tag']) ? $params['project_info_title_type_tag'] : $args['project_info_title_type_tag'];
        $project_info_title_tag                = !empty($params['project_info_title_tag']) ? $params['project_info_title_tag'] : $args['project_info_title_tag'];

        $html = '';

        $html .= '<div class="eltdf-portfolio-project-info">';

        if(!empty($project_info_title)) {
            $html .= '<'.esc_attr($project_info_title_tag).' class="eltdf-ppi-label">'.esc_html($project_info_title).'</'.esc_attr($project_info_title_tag).'>';
        }

        switch($project_info_type) {
            case 'title':
                $html .= $this->getItemTitleHtml($params);
                break;
            case 'category':
                $html .= $this->getItemCategoryHtml($params);
                break;
            case 'tag':
                $html .= $this->getItemTagHtml($params);
                break;
            case 'author':
                $html .= $this->getItemAuthorHtml($params);
                break;
            case 'date':
                $html .= $this->getItemDateHtml($params);
                break;
            default:
                $html .= $this->getItemTitleHtml($params);
                break;
        }

        $html .= '</div>';

        return $html;
    }

    /**
     * Generates portfolio project title html based on id
     *
     * @param $params
     *
     * @return html
     */
    public function getItemTitleHtml($params) {
        $html                        = '';
        $project_id                  = $params['project_id'];
        $title                       = get_the_title($project_id);
        $project_info_title_type_tag = $params['project_info_title_type_tag'];

        if(!empty($title)) {
            $html = '<'.esc_attr($project_info_title_type_tag).' itemprop="name" class="eltdf-ppi-title entry-title">';
            $html .= '<a itemprop="url" href="'.esc_url(get_the_permalink($project_id)).'">'.esc_html($title).'</a>';
            $html .= '</'.esc_attr($project_info_title_type_tag).'>';
        }

        return $html;
    }

    /**
     * Generates portfolio project categories html based on id
     *
     * @param $params
     *
     * @return html
     */
    public function getItemCategoryHtml($params) {
        $html       = '';
        $project_id = $params['project_id'];
        $categories = wp_get_post_terms($project_id, 'portfolio-category');

        if(!empty($categories)) {
            $html = '<div class="eltdf-ppi-category">';
            foreach($categories as $cat) {
                $html .= '<h6><a itemprop="url" class="eltdf-ppi-category-item" href="'.esc_url(get_term_link($cat->term_id)).'">'.esc_html($cat->name).'</a></h6>';
            }
            $html .= '</div>';
        }

        return $html;
    }

    /**
     * Generates portfolio project tags html based on id
     *
     * @param $params
     *
     * @return html
     */
    public function getItemTagHtml($params) {
        $html       = '';
        $project_id = $params['project_id'];
        $tags       = wp_get_post_terms($project_id, 'portfolio-tag');

        if(!empty($tags)) {
            $html = '<div class="eltdf-ppi-tag">';
            foreach($tags as $tag) {
                $html .= '<h6><a itemprop="url" class="eltdf-ppi-tag-item" href="'.esc_url(get_term_link($tag->term_id)).'">'.esc_html($tag->name).'</a></h6>';
            }
            $html .= '</div>';
        }

        return $html;
    }

    /**
     * Generates portfolio project authors html based on id
     *
     * @param $params
     *
     * @return html
     */
    public function getItemAuthorHtml($params) {
        $html         = '';
        $project_id   = $params['project_id'];
        $project_post = get_post($project_id);
        $autor_id     = $project_post->post_author;
        $author       = get_the_author_meta('display_name', $autor_id);

        if(!empty($author)) {
            $html = '<h6 class="eltdf-ppi-author">'.esc_html($author).'</h6>';
        }

        return $html;
    }

    /**
     * Generates portfolio project date html based on id
     *
     * @param $params
     *
     * @return html
     */
    public function getItemDateHtml($params) {
        $html       = '';
        $project_id = $params['project_id'];
        $date       = get_the_time(get_option('date_format'), $project_id);

        if(!empty($date)) {
            $html = '<h6 class="eltdf-ppi-date">'.esc_html($date).'</h6>';
        }

        return $html;
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
        $portfolio_id    = (int) $query;
        $post_meta_infos = $wpdb->get_results($wpdb->prepare("SELECT ID AS id, post_title AS title
					FROM {$wpdb->posts} 
					WHERE post_type = 'portfolio-item' AND ( ID = '%d' OR post_title LIKE '%%%s%%' )", $portfolio_id > 0 ? $portfolio_id : -1, stripslashes($query), stripslashes($query)), ARRAY_A);

        $results = array();
        if(is_array($post_meta_infos) && !empty($post_meta_infos)) {
            foreach($post_meta_infos as $value) {
                $data          = array();
                $data['value'] = $value['id'];
                $data['label'] = esc_html__('Id', 'eltdf-core').': '.$value['id'].((strlen($value['title']) > 0) ? ' - '.esc_html__('Title', 'eltdf-core').': '.$value['title'] : '');
                $results[]     = $data;
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
        if(!empty($query)) {
            // get portfolio
            $portfolio = get_post((int) $query);
            if(!is_wp_error($portfolio)) {

                $portfolio_id    = $portfolio->ID;
                $portfolio_title = $portfolio->post_title;

                $portfolio_title_display = '';
                if(!empty($portfolio_title)) {
                    $portfolio_title_display = ' - '.esc_html__('Title', 'eltdf-core').': '.$portfolio_title;
                }

                $portfolio_id_display = esc_html__('Id', 'eltdf-core').': '.$portfolio_id;

                $data          = array();
                $data['value'] = $portfolio_id;
                $data['label'] = $portfolio_id_display.$portfolio_title_display;

                return !empty($data) ? $data : false;
            }

            return false;
        }

        return false;
    }
}