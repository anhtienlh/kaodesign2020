<?php
/**
 * Woocommerce helper functions
 */

if(!function_exists('ambient_elated_disable_woocommerce_pretty_photo')) {
    /**
     * Function that disable WooCommerce pretty photo script and style
     */
    function ambient_elated_disable_woocommerce_pretty_photo() {
        //is woocommerce installed?
        if(ambient_elated_is_woocommerce_installed()) {
            if(ambient_elated_load_woo_assets()) {

                wp_deregister_style('woocommerce_prettyPhoto_css');
            }
        }
    }

    add_action('wp_enqueue_scripts', 'ambient_elated_disable_woocommerce_pretty_photo');
}

if (!function_exists('ambient_elated_woocommerce_body_class')) {
	/**
	 * Function that adds class on body for Woocommerce
	 *
	 * @param $classes
	 * @return array
	 */
	function ambient_elated_woocommerce_body_class( $classes ) {
		if(ambient_elated_is_woocommerce_page()) {
			$classes[] = 'eltdf-woocommerce-page';

			if(function_exists('is_shop') && is_shop()) {
				$classes[] = 'eltdf-woo-main-page';
			}

			if (is_singular('product')) {
				$classes[] = 'eltdf-woo-single-page';
			}
		}
		
		return $classes;
	}

	add_filter('body_class', 'ambient_elated_woocommerce_body_class');
}

if(!function_exists('ambient_elated_woocommerce_columns_class')) {
	/**
	 * Function that adds number of columns class to header tag
	 *
	 * @param array array of classes from main filter
	 *
	 * @return array array of classes with added woocommerce class
	 */
	function ambient_elated_woocommerce_columns_class($classes) {
		if(ambient_elated_is_woocommerce_installed()) {
			$products_list_number = ambient_elated_options()->getOptionValue('eltdf_woo_product_list_columns');
			$classes[] = $products_list_number;
		}

		return $classes;
	}

	add_filter('body_class', 'ambient_elated_woocommerce_columns_class');
}

if(!function_exists('ambient_elated_woocommerce_columns_space_class')) {
	/**
	 * Function that adds space between columns class to header tag
	 *
	 * @param array array of classes from main filter
	 *
	 * @return array array of classes with added woocommerce class
	 */
	function ambient_elated_woocommerce_columns_space_class($classes) {
		if(ambient_elated_is_woocommerce_installed()) {
			$columns_space = ambient_elated_options()->getOptionValue('eltdf_woo_product_list_columns_space');
			$classes[] = $columns_space;
		}
		
		return $classes;
	}
	
	add_filter('body_class', 'ambient_elated_woocommerce_columns_space_class');
}

if(!function_exists('ambient_elated_woocommerce_pl_info_position_class')) {
	/**
	 * Function that adds product list info position class to header tag
	 *
	 * @param array array of classes from main filter
	 *
	 * @return array array of classes with added woocommerce class
	 */
	function ambient_elated_woocommerce_pl_info_position_class($classes) {
		if(ambient_elated_is_woocommerce_installed()) {
			$info_position = ambient_elated_options()->getOptionValue('eltdf_woo_product_list_info_position');
			$info_position_class = '';
			if($info_position === 'info_below_image') {
				$info_position_class = 'eltdf-woo-pl-info-below-image';
			} else if ($info_position === 'info_on_image_hover') {
				$info_position_class = 'eltdf-woo-pl-info-on-image-hover';
			}
			
			$classes[] = $info_position_class;
		}
		
		return $classes;
	}
	
	add_filter('body_class', 'ambient_elated_woocommerce_pl_info_position_class');
}

if(!function_exists('ambient_elated_is_woocommerce_page')) {
	/**
	 * Function that checks if current page is woocommerce shop, product or product taxonomy
	 * @return bool
	 *
	 * @see is_woocommerce()
	 */
	function ambient_elated_is_woocommerce_page() {
		if (function_exists('is_woocommerce') && is_woocommerce()) {
			return is_woocommerce();
		} elseif (function_exists('is_cart') && is_cart()) {
			return is_cart();
		} elseif (function_exists('is_checkout') && is_checkout()) {
			return is_checkout();
		} elseif (function_exists('is_account_page') && is_account_page()) {
			return is_account_page();
		}
	}
}

if(!function_exists('ambient_elated_is_woocommerce_shop')) {
	/**
	 * Function that checks if current page is shop or product page
	 * @return bool
	 *
	 * @see is_shop()
	 */
	function ambient_elated_is_woocommerce_shop() {
		return function_exists('is_shop') && (is_shop() || is_product());
	}
}

if(!function_exists('ambient_elated_get_woo_shop_page_id')) {
	/**
	 * Function that returns shop page id that is set in WooCommerce settings page
	 * @return int id of shop page
	 */
	function ambient_elated_get_woo_shop_page_id() {
		if(ambient_elated_is_woocommerce_installed()) {
			return get_option('woocommerce_shop_page_id');
		}
	}
}

if(!function_exists('ambient_elated_is_product_category')) {
	function ambient_elated_is_product_category() {
		return function_exists('is_product_category') && is_product_category();
	}
}

if(!function_exists('ambient_elated_is_product_tag')) {
	function ambient_elated_is_product_tag() {
		return function_exists('is_product_tag') && is_product_tag();
	}
}

if(!function_exists('ambient_elated_load_woo_assets')) {
	/**
	 * Function that checks whether WooCommerce assets needs to be loaded.
	 *
	 * @see ambient_elated_is_woocommerce_page()
	 * @see ambient_elated_has_woocommerce_shortcode()
	 * @see ambient_elated_has_woocommerce_widgets()
	 * @return bool
	 */

	function ambient_elated_load_woo_assets() {
		return ambient_elated_is_woocommerce_installed() && (ambient_elated_is_woocommerce_page() || ambient_elated_has_woocommerce_shortcode() || ambient_elated_has_woocommerce_widgets());
	}
}

if(!function_exists('ambient_elated_return_woocommerce_global_variable')) {
	function ambient_elated_return_woocommerce_global_variable() {
		if(ambient_elated_is_woocommerce_installed()) {
			global $product;

			return $product;
		}
	}
}

if(!function_exists('ambient_elated_has_woocommerce_shortcode')) {
	/**
	 * Function that checks if current page has at least one of WooCommerce shortcodes added
	 * @return bool
	 */
	function ambient_elated_has_woocommerce_shortcode() {
		$woocommerce_shortcodes = array(
			'eltdf_product_info',
			'eltdf_product_list',
			'eltdf_product_list_carousel',
			'eltdf_product_list_simple',
			'add_to_cart',
			'add_to_cart_url',
			'product_page',
			'product',
			'products',
			'product_categories',
			'product_category',
			'recent_products',
			'featured_products',
			'sale_products',
			'best_selling_products',
			'top_rated_products',
			'product_attribute',
			'related_products',
			'woocommerce_messages',
			'woocommerce_cart',
			'woocommerce_checkout',
			'woocommerce_order_tracking',
			'woocommerce_my_account',
			'woocommerce_edit_address',
			'woocommerce_change_password',
			'woocommerce_view_order',
			'woocommerce_pay',
			'woocommerce_thankyou'
		);

		foreach($woocommerce_shortcodes as $woocommerce_shortcode) {
			$has_shortcode = ambient_elated_has_shortcode($woocommerce_shortcode);

			if($has_shortcode) {
				return true;
			}
		}

		return false;
	}
}

if(!function_exists('ambient_elated_has_woocommerce_widgets')) {
	/**
	 * Function that checks if current page has at least one of WooCommerce shortcodes added
	 * @return bool
	 */
	function ambient_elated_has_woocommerce_widgets() {
		$widgets_array = array(
			'eltdf_woocommerce_dropdown_cart',
			'woocommerce_widget_cart',
			'woocommerce_layered_nav',
			'woocommerce_layered_nav_filters',
			'woocommerce_price_filter',
			'woocommerce_product_categories',
			'woocommerce_product_search',
			'woocommerce_product_tag_cloud',
			'woocommerce_products',
			'woocommerce_recent_reviews',
			'woocommerce_recently_viewed_products',
			'woocommerce_top_rated_products'
		);

		foreach($widgets_array as $widget) {
			$active_widget = is_active_widget(false, false, $widget);

			if($active_widget) {
				return true;
			}
		}

		return false;
	}
}

if(!function_exists('ambient_elated_add_woocommerce_shortcode_class')) {
	/**
	 * Function that checks if current page has at least one of WooCommerce shortcodes added
	 * @return string
	 */
	function ambient_elated_add_woocommerce_shortcode_class($classes){
		$woocommerce_shortcodes = array(
			'woocommerce_order_tracking'
		);

		foreach($woocommerce_shortcodes as $woocommerce_shortcode) {
			$has_shortcode = ambient_elated_has_shortcode($woocommerce_shortcode);

			if($has_shortcode) {
				$classes[] = 'eltdf-woocommerce-page woocommerce-account eltdf-'.str_replace('_', '-', $woocommerce_shortcode);
			}
		}

		return $classes;
	}

	add_filter('body_class', 'ambient_elated_add_woocommerce_shortcode_class');
}

if(!function_exists('ambient_elated_woocommerce_product_single_class')) {
	function ambient_elated_woocommerce_product_single_class($classes) {
		if(in_array('woocommerce', $classes)) {
			$product_single_layout = ambient_elated_get_meta_field_intersect('single_product_layout');
			$product_thumbnail_position = ambient_elated_get_meta_field_intersect('woo_set_thumb_images_position');
			
			if($product_single_layout !== '') {
				$classes[] = 'eltdf-woo-single-page-'.ambient_elated_get_meta_field_intersect('single_product_layout');
			}
			
			if($product_single_layout === 'sticky-info' && ambient_elated_options()->getOptionValue('woo_enable_single_sticky_content') === 'yes') {
				$classes[] = 'eltdf-woo-sticky-holder-enabled';
			}
			
			if($product_single_layout === 'standard' && ambient_elated_get_meta_field_intersect('woo_enable_single_thumb_featured_switch') === 'yes') {
				$classes[] = 'eltdf-woo-single-switch-image';
			}
			
			if($product_single_layout === 'standard' &&  !empty($product_thumbnail_position)) {
				$classes[] = 'eltdf-woo-single-thumb-'.$product_thumbnail_position;
			}
		}
		
		return $classes;
	}
	
	add_filter('body_class', 'ambient_elated_woocommerce_product_single_class');
}

if(!function_exists('ambient_elated_woocommerce_share')) {
    /**
     * Function that social share for product page
     * Return array array of WooCommerce pages
     */
    function ambient_elated_woocommerce_share() {
        if (ambient_elated_is_woocommerce_installed()) {

            if ( ambient_elated_core_plugin_installed() && ambient_elated_options()->getOptionValue('enable_social_share') == 'yes' && ambient_elated_options()->getOptionValue('enable_social_share_on_product') == 'yes') :
                print '<div class="eltdf-woo-social-share-holder">';
                print '<span>'.esc_html__('Share:', 'ambient').'</span>';
                echo ambient_elated_get_social_share_html();
                print '</div>';
            endif;
        }
    }
}

if(!function_exists('ambient_elated_woo_change_tabs_to_accordions')) {
	/**
	 * Function that add accordions elements instead of tabs for single product page meta
	 * Return html
	 */
	function ambient_elated_woo_change_tabs_to_accordions($tabs) {
		if(!empty($tabs)) { ?>
			<div class="eltdf-accordion-holder eltdf-ac-default eltdf-accordion eltdf-ac-simple clearfix eltdf-woo-accordions">
				<?php foreach($tabs as $key => $tab) : ?>
					<span class="eltdf-title-holder <?php echo esc_attr($key); ?>_tab">
                        <span class="eltdf-accordion-mark">
							<span class="eltdf_icon_plus icon_plus"></span>
							<span class="eltdf_icon_minus icon_minus-06"></span>
						</span>
						<span class="eltdf-tab-title"><?php echo apply_filters('woocommerce_product_'.$key.'_tab_title', esc_html($tab['title']), $key); ?></span>
					</span>
					<div class="eltdf-accordion-content">
						<div class="eltdf-accordion-content-inner">
							<?php call_user_func($tab['callback'], $key, $tab) ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<?php
		}
	}
}