<?php
namespace ElatedCore\CPT\Portfolio;

use ElatedCore\Lib\PostTypeInterface;

/**
 * Class PortfolioRegister
 * @package ElatedCore\CPT\Portfolio
 */
class PortfolioRegister implements PostTypeInterface {
    /**
     * @var string
     */
    private $base;

    public function __construct() {
        $this->base = 'portfolio-item';
        $this->taxBase = 'portfolio-category';

        add_filter('single_template', array($this, 'registerSingleTemplate'));
    }

    /**
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     * Registers custom post type with WordPress
     */
    public function register() {
        $this->registerPostType();
        $this->registerTax();
        $this->registerTagTax();
    }

    /**
     * Registers portfolio single template if one does'nt exists in theme.
     * Hooked to single_template filter
     * @param $single string current template
     * @return string string changed template
     */
    public function registerSingleTemplate($single) {
        global $post;

        if($post->post_type == $this->base) {
            if(!file_exists(get_template_directory().'/single-portfolio-item.php')) {
                return ELATED_CORE_CPT_PATH.'/portfolio/templates/single-'.$this->base.'.php';
            }
        }

        return $single;
    }

    /**
     * Registers custom post type with WordPress
     */
    private function registerPostType() {
        global $ambient_elated_global_Framework, $ambient_elated_global_options;

        $menuPosition = 5;
        $menuIcon = 'dashicons-admin-post';
        $slug = $this->base;

        if(eltd_core_theme_installed()) {
            $menuPosition = $ambient_elated_global_Framework->getSkin()->getMenuItemPosition('portfolio');
            $menuIcon = $ambient_elated_global_Framework->getSkin()->getMenuIcon('portfolio');

            if(isset($ambient_elated_global_options['portfolio_single_slug'])) {
                if($ambient_elated_global_options['portfolio_single_slug'] != ""){
                    $slug = $ambient_elated_global_options['portfolio_single_slug'];
                }
            }
        }

        register_post_type( $this->base,
            array(
                'labels' => array(
                    'name' => esc_html__( 'Portfolio','eltdf-core' ),
                    'singular_name' => esc_html__( 'Portfolio Item','eltdf-core' ),
                    'add_item' => esc_html__('New Portfolio Item','eltdf-core'),
                    'add_new_item' => esc_html__('Add New Portfolio Item','eltdf-core'),
                    'edit_item' => esc_html__('Edit Portfolio Item','eltdf-core')
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => $slug),
                'menu_position' => $menuPosition,
                'show_ui' => true,
                'supports' => array('author', 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes', 'comments'),
                'menu_icon'  =>  $menuIcon
            )
        );
    }

    /**
     * Registers custom taxonomy with WordPress
     */
    private function registerTax() {
        $labels = array(
            'name' => esc_html__( 'Portfolio Categories', 'eltdf-core' ),
            'singular_name' => esc_html__( 'Portfolio Category', 'eltdf-core' ),
            'search_items' =>  esc_html__( 'Search Portfolio Categories','eltdf-core' ),
            'all_items' => esc_html__( 'All Portfolio Categories','eltdf-core' ),
            'parent_item' => esc_html__( 'Parent Portfolio Category','eltdf-core' ),
            'parent_item_colon' => esc_html__( 'Parent Portfolio Category:','eltdf-core' ),
            'edit_item' => esc_html__( 'Edit Portfolio Category','eltdf-core' ),
            'update_item' => esc_html__( 'Update Portfolio Category','eltdf-core' ),
            'add_new_item' => esc_html__( 'Add New Portfolio Category','eltdf-core' ),
            'new_item_name' => esc_html__( 'New Portfolio Category Name','eltdf-core' ),
            'menu_name' => esc_html__( 'Portfolio Categories','eltdf-core' ),
        );

        register_taxonomy($this->taxBase, array($this->base), array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'query_var' => true,
            'show_admin_column' => true,
            'rewrite' => array( 'slug' => 'portfolio-category' ),
        ));
    }

    /**
     * Registers custom tag taxonomy with WordPress
     */
    private function registerTagTax() {
        $labels = array(
            'name' => esc_html__( 'Portfolio Tags', 'eltdf-core' ),
            'singular_name' => esc_html__( 'Portfolio Tag', 'eltdf-core' ),
            'search_items' =>  esc_html__( 'Search Portfolio Tags','eltdf-core' ),
            'all_items' => esc_html__( 'All Portfolio Tags','eltdf-core' ),
            'parent_item' => esc_html__( 'Parent Portfolio Tag','eltdf-core' ),
            'parent_item_colon' => esc_html__( 'Parent Portfolio Tags:','eltdf-core' ),
            'edit_item' => esc_html__( 'Edit Portfolio Tag','eltdf-core' ),
            'update_item' => esc_html__( 'Update Portfolio Tag','eltdf-core' ),
            'add_new_item' => esc_html__( 'Add New Portfolio Tag','eltdf-core' ),
            'new_item_name' => esc_html__( 'New Portfolio Tag Name','eltdf-core' ),
            'menu_name' => esc_html__( 'Portfolio Tags','eltdf-core' ),
        );

        register_taxonomy('portfolio-tag',array($this->base), array(
            'hierarchical' => false,
            'labels' => $labels,
            'show_ui' => true,
            'query_var' => true,
            'show_admin_column' => true,
            'rewrite' => array( 'slug' => 'portfolio-tag' ),
        ));
    }
}