<?php
namespace ElatedCore\CPT\Testimonials;

use ElatedCore\Lib;

/**
 * Class TestimonialsRegister
 * @package ElatedCore\CPT\Testimonials
 */
class TestimonialsRegister implements Lib\PostTypeInterface {
    /**
     * @var string
     */
    private $base;

    public function __construct() {
        $this->base = 'testimonials';
        $this->taxBase = 'testimonials-category';
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
    }

    /**
     * Regsiters custom post type with WordPress
     */
    private function registerPostType() {
        global $ambient_elated_global_Framework;

        $menuPosition = 5;
        $menuIcon = 'dashicons-admin-post';

        if(eltd_core_theme_installed()) {
            $menuPosition = $ambient_elated_global_Framework->getSkin()->getMenuItemPosition('testimonial');
            $menuIcon = $ambient_elated_global_Framework->getSkin()->getMenuIcon('testimonial');
        }

        register_post_type('testimonials',
            array(
                'labels' 		=> array(
                    'name' 				=> esc_html__('Testimonials','eltdf-core' ),
                    'singular_name' 	=> esc_html__('Testimonial','eltdf-core' ),
                    'add_item'			=> esc_html__('New Testimonial','eltdf-core'),
                    'add_new_item' 		=> esc_html__('Add New Testimonial','eltdf-core'),
                    'edit_item' 		=> esc_html__('Edit Testimonial','eltdf-core')
                ),
                'public'		=>	false,
                'show_in_menu'	=>	true,
                'rewrite' 		=> 	array('slug' => 'testimonials'),
                'menu_position' => 	$menuPosition,
                'show_ui'		=>	true,
                'has_archive'	=>	false,
                'hierarchical'	=>	false,
                'supports'		=>	array('title', 'thumbnail'),
                'menu_icon'  =>  $menuIcon
            )
        );
    }

    /**
     * Registers custom taxonomy with WordPress
     */
    private function registerTax() {
        $labels = array(
            'name' => esc_html__( 'Testimonials Categories', 'eltdf-core' ),
            'singular_name' => esc_html__( 'Testimonial Category', 'eltdf-core' ),
            'search_items' =>  esc_html__( 'Search Testimonials Categories','eltdf-core' ),
            'all_items' => esc_html__( 'All Testimonials Categories','eltdf-core' ),
            'parent_item' => esc_html__( 'Parent Testimonial Category','eltdf-core' ),
            'parent_item_colon' => esc_html__( 'Parent Testimonial Category:','eltdf-core' ),
            'edit_item' => esc_html__( 'Edit Testimonials Category','eltdf-core' ),
            'update_item' => esc_html__( 'Update Testimonials Category','eltdf-core' ),
            'add_new_item' => esc_html__( 'Add New Testimonials Category','eltdf-core' ),
            'new_item_name' => esc_html__( 'New Testimonials Category Name','eltdf-core' ),
            'menu_name' => esc_html__( 'Testimonials Categories','eltdf-core' ),
        );

        register_taxonomy($this->taxBase, array($this->base), array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'query_var' => true,
            'show_admin_column' => true,
            'rewrite' => array( 'slug' => 'testimonials-category' ),
        ));
    }
}