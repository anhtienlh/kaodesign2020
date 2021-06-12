<?php
/**
 * Plugin Name:       Multiple WP Responsive Photo Gallery
 * Plugin URI:        https://github.com/iamgaur/multiple-wp-responsive-photo-gallery
 * Description:       This plugin provide multiple responsive photo gallery layouts
 * Version:           1.0
 * Requires at least: 4.*
 * Requires PHP:      5.6
 * Author:            Naveen Gaur
 * Author URI:        https://iamgaur.github.io/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       mwrp-gallery
 */


if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define('Multiple_WP_Responsive_Photo_Gallery',  plugin_dir_url(__FILE__));

add_action( 'admin_enqueue_scripts', 'mwrpg_load_admin_files' );
function mwrpg_load_admin_files() {
	wp_enqueue_media();
	add_thickbox();
	wp_enqueue_script( 'mwrp-gallery', Multiple_WP_Responsive_Photo_Gallery.'assets/js/mwrpg-script.js', array('jquery'), '1.0', true );
	wp_enqueue_style( 'admin_css', Multiple_WP_Responsive_Photo_Gallery.'assets/css/mwrpg-admin-style.css', false, '1.0' );
}

add_action( 'wp_enqueue_scripts', 'mwrpg_frontend_files');
function mwrpg_frontend_files()
{
	// infinite scroll js include
	wp_enqueue_script( 'mwrpg-infinite', Multiple_WP_Responsive_Photo_Gallery.'assets/js/infinite-scroll-docs.min.js', array('jquery'), '1.0', true );

	// fancybox js
	wp_enqueue_script( 'fancybox', Multiple_WP_Responsive_Photo_Gallery.'assets/js/jquery.fancybox.min.js', array('jquery'), '3.5', true );
	wp_enqueue_style( 'mwrpg-infinite-style', Multiple_WP_Responsive_Photo_Gallery.'assets/css/infinite-scroll-docs.css', false, '1.0' );	
	wp_enqueue_style( 'mwrpg-grid-style', Multiple_WP_Responsive_Photo_Gallery.'assets/css/mwrpg-grid.css', false, '1.0' );
	wp_enqueue_style( 'fancybox-style', Multiple_WP_Responsive_Photo_Gallery.'assets/css/jquery.fancybox.min.css', false, '1.0' );}


// Custom post type register
include_once('includes/admin/mwrpg-post-register.php');

// Add meta box for multiple image upload
include_once('includes/admin/mwrpg-metabox-image.php');

// Setting meta box
include_once('includes/admin/mwrpg-metabox-setting.php');


// Include shortcode file
include_once('includes/mwrpg-shortcode.php');