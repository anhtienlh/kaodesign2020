<?php 

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Register custom post type NG Gallery
function mwrp_gallery_post_register() {
    $labels = array(
      'name'               => _x( 'MWRP Gallery', 'post type general name' ),
      'singular_name'      => _x( 'MWRP Gallery', 'post type singular name' ),
      'add_new'            => _x( 'Add New', 'mwrp_gallery' ),
      'add_new_item'       => __( 'Add Photo Gallery' ),
      'edit_item'          => __( 'Edit Photo Gallery' ),
      'new_item'           => __( 'New Gallery' ),
      'all_items'          => __( 'All Gallery' ),
      'view_item'          => __( 'View Gallery' ),
      'search_items'       => __( 'Search' ),
      'not_found'          => __( 'No Gallery found' ),
      'not_found_in_trash' => __( 'No Gallery found in the Trash' ), 
      'menu_name'          => 'MWRP Gallery'
    );
    $args = array(
      'labels'        => $labels,
      'description'   => 'Holds our Gallery specific data',
      'public'             => false,
		  'show_ui'            => true,
		  'show_in_menu'       => true,
		  'query_var'          => true,
		  'capability_type'    => 'post',
		  'has_archive'        => false,
      'hierarchical'       => false,
      'menu_icon'			 => 'dashicons-format-gallery',
      'menu_position' => 5,
      'supports'      => array( 'title',),
      'has_archive'   => true,
    );
    register_post_type( 'mwrp_gallery', $args ); 
  }
  add_action( 'init', 'mwrp_gallery_post_register');


// Add the custom columns to the MWRP Gallery post type:
add_filter( 'manage_mwrp_gallery_posts_columns', 'setCustom_edit_mwrp_gallery_columns' );
function setCustom_edit_mwrp_gallery_columns($columns) {
   unset( $columns['author'] );
   // Remove Date
   unset($columns['date']);

    $columns['shortcode'] = __( 'Shortcode', 'mwrp-wp-gallery' );
    $columns['date'] = 'Date';

    return $columns;
}

// Add the data to the custom columns for the MWRP Gallery post type:
add_action( 'manage_mwrp_gallery_posts_custom_column' , 'mwrp_gallery_custom_column', 10, 2 );
function mwrp_gallery_custom_column( $column, $post_id ) {
  if($column == 'shortcode')  {
    echo '<input type="text" class="nwg-text" width="30%" autocomplete="off" readonly="readonly" name="nwg_shortcode" value="[mwrp_gallery id='.esc_html($post_id).']" />';
  }
}