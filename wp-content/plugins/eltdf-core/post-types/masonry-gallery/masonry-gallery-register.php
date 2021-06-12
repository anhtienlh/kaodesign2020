<?php
namespace ElatedCore\CPT\MasonryGallery;

use ElatedCore\Lib;

/**
 * Class MasonryGalleryRegister
 * @package ElatedCore\CPT\MasonryGallery
 */
class MasonryGalleryRegister implements Lib\PostTypeInterface  {
    /**
     * @var string
     */
    private $base;

    public function __construct() {
        $this->base = 'masonry-gallery';
        $this->taxBase = 'masonry-gallery-category';
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
     * Registers custom post type with WordPress
     */

   private function registerPostType() {
	   global $ambient_elated_global_Framework;

	   $menuPosition = 5;
	   $menuIcon = 'dashicons-admin-post';

	   if(eltd_core_theme_installed()) {
		   $menuPosition = $ambient_elated_global_Framework->getSkin()->getMenuItemPosition('masonry-gallery');
		   $menuIcon = $ambient_elated_global_Framework->getSkin()->getMenuIcon('masonry-gallery');
	   }

        register_post_type($this->base,
            array(
                'labels' 		=> array(
                    'name' 				=> esc_html__('Masonry Gallery', 'eltdf-core' ),
                    'all_items'			=> esc_html__('Masonry Gallery Items', 'eltdf-core'),
                    'singular_name' 	=> esc_html__('Masonry Gallery Item', 'eltdf-core' ),
                    'add_item'			=> esc_html__('New Masonry Gallery Item', 'eltdf-core'),
                    'add_new_item' 		=> esc_html__('Add New Masonry Gallery Item', 'eltdf-core'),
                    'edit_item' 		=> esc_html__('Edit Masonry Gallery Item', 'eltdf-core')
                ),
                'public'		=>	false,
                'show_in_menu'	=>	true,
                'rewrite' 		=> 	array('slug' => 'masonry-gallery'),
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
            'name' => esc_html__('Masonry Gallery Categories', 'eltdf-core'),
            'singular_name' => esc_html__('Masonry Gallery Category', 'eltdf-core'),
            'search_items' =>  esc_html__('Search Masonry Gallery Categories', 'eltdf-core'),
            'all_items' => esc_html__('All Masonry Gallery Categories', 'eltdf-core'),
            'parent_item' => esc_html__('Parent Masonry Gallery Category', 'eltdf-core'),
            'parent_item_colon' => esc_html__('Parent Masonry Gallery Category:', 'eltdf-core'),
            'edit_item' => esc_html__('Edit Masonry Gallery Category', 'eltdf-core'),
            'update_item' => esc_html__('Update Masonry Gallery Category', 'eltdf-core'),
            'add_new_item' => esc_html__('Add New Masonry Gallery Category', 'eltdf-core'),
            'new_item_name' => esc_html__('New Masonry Gallery Category Name', 'eltdf-core'),
            'menu_name' => esc_html__('Masonry Gallery Categories', 'eltdf-core'),
        );

        register_taxonomy($this->taxBase, array($this->base), array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'query_var' => true,
            'show_admin_column' => true,
            'rewrite' => array( 'slug' => 'masonry-gallery-category' ),
        ));
    }
}