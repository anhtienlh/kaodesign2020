<?php 

// The shortcode function
function mwrp_gallery_shortcode($args) { 
    
    if ( empty( $args['id'] ) || filter_var($args['id'], FILTER_VALIDATE_INT) === false ) {
        return '<span class="data-error">Error - no data found</span>';
    } else {
        // Get post id
        $postId = esc_html($args['id']);

        // Get post layout
        $layout = get_post_meta($postId, "mwrp_gallery_layout", true);
        ob_start();
        // Include layout 
        include_once(WP_PLUGIN_DIR.'/ng-wp-gallery/template/'.esc_html($layout).'.php');
        return ob_get_clean();
    }

}

// Register shortcode
add_shortcode('mwrp_gallery', 'mwrp_gallery_shortcode');
