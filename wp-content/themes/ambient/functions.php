<?php
include_once get_template_directory() . '/theme-includes.php';

if (!function_exists('ambient_elated_styles')) {
	/**
	 * Function that includes theme's core styles
	 */
	function ambient_elated_styles() {

		//include theme's core styles
		wp_enqueue_style('ambient-elated-default-style', ELATED_ROOT . '/style.css');
		wp_enqueue_style('ambient-elated-modules', ELATED_ASSETS_ROOT . '/css/modules.min.css');

		ambient_elated_icon_collections()->enqueueStyles();

		wp_enqueue_style('wp-mediaelement');

		//is woocommerce installed?
		if (ambient_elated_is_woocommerce_installed()) {
			if (ambient_elated_load_woo_assets()) {

				//include theme's woocommerce styles
				wp_enqueue_style('ambient-elated-woo', ELATED_ASSETS_ROOT . '/css/woocommerce.min.css');
			}
		}

		//define files afer which style dynamic needs to be included. It should be included last so it can override other files
		$style_dynamic_deps_array = array();

		//is responsive option turned on?
		if (ambient_elated_is_responsive_on()) {
			wp_enqueue_style('ambient-elated-modules-responsive', ELATED_ASSETS_ROOT . '/css/modules-responsive.min.css');

			//is woocommerce installed?
			if (ambient_elated_is_woocommerce_installed()) {
				if (ambient_elated_load_woo_assets()) {

					//include theme's woocommerce responsive styles
					wp_enqueue_style('ambient-elated-woo-responsive', ELATED_ASSETS_ROOT . '/css/woocommerce-responsive.min.css');
					$style_dynamic_deps_array = array('ambient-elated-woo', 'ambient-elated-woo-responsive');
				}
			}

			//include proper styles
			if (file_exists(ELATED_ROOT_DIR . '/assets/css/style_dynamic_responsive.css') && ambient_elated_is_css_folder_writable() && !is_multisite()) {
				wp_enqueue_style('ambient-elated-style-dynamic-responsive', ELATED_ASSETS_ROOT . '/css/style_dynamic_responsive.css', array(), filemtime(ELATED_ROOT_DIR . '/assets/css/style_dynamic_responsive.css'));
			}
		}

		if (file_exists(ELATED_ROOT_DIR . '/assets/css/style_dynamic.css') && ambient_elated_is_css_folder_writable() && !is_multisite()) {
			wp_enqueue_style('ambient-elated-style-dynamic', ELATED_ASSETS_ROOT . '/css/style_dynamic.css', $style_dynamic_deps_array, filemtime(ELATED_ROOT_DIR . '/assets/css/style_dynamic.css')); //it must be included after woocommerce styles so it can override it
		}

		//include Visual Composer styles
		if (class_exists('WPBakeryVisualComposerAbstract')) {
			wp_enqueue_style('js_composer_front');
		}
	}

	add_action('wp_enqueue_scripts', 'ambient_elated_styles');
}

if (!function_exists('ambient_elated_google_fonts_styles')) {
	/**
	 * Function that includes google fonts defined anywhere in the theme
	 */
	function ambient_elated_google_fonts_styles() {
		$font_simple_field_array = ambient_elated_options()->getOptionsByType('fontsimple');
		if (!(is_array($font_simple_field_array) && count($font_simple_field_array) > 0)) {
			$font_simple_field_array = array();
		}

		$font_field_array = ambient_elated_options()->getOptionsByType('font');
		if (!(is_array($font_field_array) && count($font_field_array) > 0)) {
			$font_field_array = array();
		}

		$available_font_options = array_merge($font_simple_field_array, $font_field_array);

		$google_font_weight_array = ambient_elated_options()->getOptionValue('google_font_weight');
		if (!empty($google_font_weight_array)) {
			$google_font_weight_array = array_slice(ambient_elated_options()->getOptionValue('google_font_weight'), 1);
		}

		$font_weight_str = '300,400,400italic,600';
		if (!empty($google_font_weight_array) && $google_font_weight_array !== '') {
			$font_weight_str = implode(',', $google_font_weight_array);
		}

		$google_font_subset_array = ambient_elated_options()->getOptionValue('google_font_subset');
		if (!empty($google_font_subset_array)) {
			$google_font_subset_array = array_slice(ambient_elated_options()->getOptionValue('google_font_subset'), 1);
		}

		$font_subset_str = 'latin-ext';
		if (!empty($google_font_subset_array) && $google_font_subset_array !== '') {
			$font_subset_str = implode(',', $google_font_subset_array);
		}

		//define available font options array
		$fonts_array = array();
		foreach ($available_font_options as $font_option) {
			//is font set and not set to default and not empty?
			$font_option_value = ambient_elated_options()->getOptionValue($font_option);
			if (ambient_elated_is_font_option_valid($font_option_value) && !ambient_elated_is_native_font($font_option_value)) {
				$font_option_string = $font_option_value . ':' . $font_weight_str;
				if (!in_array($font_option_string, $fonts_array)) {
					$fonts_array[] = $font_option_string;
				}
			}
		}

		wp_reset_postdata();

		$fonts_array = array_diff($fonts_array, array('-1:' . $font_weight_str));
		$google_fonts_string = implode('|', $fonts_array);

		//default fonts
		// kiendx: $default_font_string = 'Open Sans:' . $font_weight_str . '|Titillium Web:' . $font_weight_str;
		$default_font_string = 'Open Sans:' . $font_weight_str . '|Archivo Narrow:' . $font_weight_str;
		$protocol = is_ssl() ? 'https:' : 'http:';

		//is google font option checked anywhere in theme?
		if (count($fonts_array) > 0) {

			//include all checked fonts
			$fonts_full_list = $default_font_string . '|' . str_replace('+', ' ', $google_fonts_string);
			$fonts_full_list_args = array(
				'family' => urlencode($fonts_full_list),
				'subset' => urlencode($font_subset_str),
			);

			$ambient_elated_global_fonts = add_query_arg($fonts_full_list_args, $protocol . '//fonts.googleapis.com/css');
			wp_enqueue_style('ambient-elated-google-fonts', esc_url_raw($ambient_elated_global_fonts), array(), '1.0.0');

		} else {
			//include default google font that theme is using
			$default_fonts_args = array(
				'family' => urlencode($default_font_string),
				'subset' => urlencode($font_subset_str),
			);
			$ambient_elated_global_fonts = add_query_arg($default_fonts_args, $protocol . '//fonts.googleapis.com/css');
			wp_enqueue_style('ambient-elated-google-fonts', esc_url_raw($ambient_elated_global_fonts), array(), '1.0.0');
		}

	}

	add_action('wp_enqueue_scripts', 'ambient_elated_google_fonts_styles');
}

if (!function_exists('ambient_elated_scripts')) {
	/**
	 * Function that includes all necessary scripts
	 */
	function ambient_elated_scripts() {
		global $wp_scripts;

		//init theme core scripts
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-tabs');
		wp_enqueue_script('jquery-ui-accordion');
		wp_enqueue_script('wp-mediaelement');

		// 3rd party JavaScripts that we used in our theme
		wp_enqueue_script('appear', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.appear.js', array('jquery'), false, true);
		wp_enqueue_script('modernizr', ELATED_ASSETS_ROOT . '/js/modules/plugins/modernizr.min.js', array('jquery'), false, true);
		wp_enqueue_script('hoverIntent', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.hoverIntent.min.js', array('jquery'), false, true);
		wp_enqueue_script('hoverDir', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.hoverDir.min.js', array('jquery'), false, true);
		wp_enqueue_script('jquery-plugin', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.plugin.js', array('jquery'), false, true);
		wp_enqueue_script('countdown', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.countdown.min.js', array('jquery'), false, true);
		wp_enqueue_script('owl-carousel', ELATED_ASSETS_ROOT . '/js/modules/plugins/owl.carousel.min.js', array('jquery'), false, true);
		wp_enqueue_script('parallax', ELATED_ASSETS_ROOT . '/js/modules/plugins/parallax.min.js', array('jquery'), false, true);
		wp_enqueue_script('easypiechart', ELATED_ASSETS_ROOT . '/js/modules/plugins/easypiechart.js', array('jquery'), false, true);
		wp_enqueue_script('waypoints', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.waypoints.min.js', array('jquery'), false, true);
		wp_enqueue_script('chart', ELATED_ASSETS_ROOT . '/js/modules/plugins/Chart.min.js', array('jquery'), false, true);
		wp_enqueue_script('counter', ELATED_ASSETS_ROOT . '/js/modules/plugins/counter.js', array('jquery'), false, true);
		wp_enqueue_script('absoluteCounter', ELATED_ASSETS_ROOT . '/js/modules/plugins/absoluteCounter.min.js', array('jquery'), false, true);
		wp_enqueue_script('fluidvids', ELATED_ASSETS_ROOT . '/js/modules/plugins/fluidvids.min.js', array('jquery'), false, true);
		wp_enqueue_script('prettyPhoto', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.prettyPhoto.js', array('jquery'), false, true);
		wp_enqueue_script('nicescroll', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.nicescroll.min.js', array('jquery'), false, true);
		wp_enqueue_script('ScrollToPlugin', ELATED_ASSETS_ROOT . '/js/modules/plugins/ScrollToPlugin.min.js', array('jquery'), false, true);
		wp_enqueue_script('waitforimages', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.waitforimages.js', array('jquery'), false, true);
		wp_enqueue_script('jquery-easing-1.3', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.easing.1.3.js', array('jquery'), false, true);
		wp_enqueue_script('multiscroll', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.multiscroll.min.js', array('jquery'), false, true);
		wp_enqueue_script('isotope', ELATED_ASSETS_ROOT . '/js/modules/plugins/isotope.pkgd.min.js', array('jquery'), false, true);
		wp_enqueue_script('packery', ELATED_ASSETS_ROOT . '/js/modules/plugins/packery-mode.pkgd.min.js', array('jquery'), false, true);

		if (ambient_elated_is_woocommerce_installed()) {
			wp_enqueue_script('select2');
		}

		//include google map api script
		$eltdf_google_maps_api_key = ambient_elated_options()->getOptionValue('google_maps_api_key');
		if (!empty($eltdf_google_maps_api_key)) {
			wp_enqueue_script('ambient-elated-google-map-api', '//maps.googleapis.com/maps/api/js?key=' . $eltdf_google_maps_api_key, array(), false, true);
		}

		wp_enqueue_script('ambient-elated-modules', ELATED_ASSETS_ROOT . '/js/modules.min.js', array('jquery'), false, true);

		//include comment reply script
		$wp_scripts->add_data('comment-reply', 'group', 1);
		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}

		//include Visual Composer script
		if (class_exists('WPBakeryVisualComposerAbstract')) {
			wp_enqueue_script('wpb_composer_front_js');
		}
	}

	add_action('wp_enqueue_scripts', 'ambient_elated_scripts');
}

//defined content width variable
if (!isset($content_width)) {
	$content_width = 1060;
}

if (!function_exists('ambient_elated_theme_setup')) {
	/**
	 * Function that adds various features to theme. Also defines image sizes that are used in a theme
	 */
	function ambient_elated_theme_setup() {
		//add support for feed links
		add_theme_support('automatic-feed-links');

		//add support for post formats
		add_theme_support('post-formats', array('gallery', 'link', 'quote', 'video', 'audio'));

		//add theme support for post thumbnails
		add_theme_support('post-thumbnails');

		//add theme support for title tag
		add_theme_support('title-tag');

		//define thumbnail sizes
		add_image_size('ambient_elated_square', 550, 550, true);
		add_image_size('ambient_elated_landscape', 800, 600, true);
		add_image_size('ambient_elated_portrait', 600, 800, true);

		load_theme_textdomain('ambient', get_template_directory() . '/languages');
	}

	add_action('after_setup_theme', 'ambient_elated_theme_setup');
}

if (!function_exists('ambient_elated_is_responsive_on')) {
	/**
	 * Checks whether responsive mode is enabled in theme options
	 * @return bool
	 */
	function ambient_elated_is_responsive_on() {
		return ambient_elated_options()->getOptionValue('responsiveness') !== 'no';
	}
}

if (!function_exists('ambient_elated_rgba_color')) {
	/**
	 * Function that generates rgba part of css color property
	 *
	 * @param $color string hex color
	 * @param $transparency float transparency value between 0 and 1
	 *
	 * @return string generated rgba string
	 */
	function ambient_elated_rgba_color($color, $transparency) {
		if ($color !== '' && $transparency !== '') {
			$rgba_color = '';

			$rgb_color_array = ambient_elated_hex2rgb($color);
			$rgba_color .= 'rgba(' . implode(', ', $rgb_color_array) . ', ' . $transparency . ')';

			return $rgba_color;
		}
	}
}

if (!function_exists('ambient_elated_header_meta')) {
	/**
	 * Function that echoes meta data if our seo is enabled
	 */
	function ambient_elated_header_meta() { ?>

		<meta charset="<?php bloginfo('charset'); ?>"/>
		<link rel="profile" href="http://gmpg.org/xfn/11"/>
		<?php if (is_singular() && pings_open(get_queried_object())) : ?>
			<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<?php endif; ?>

	<?php }

	add_action('ambient_elated_header_meta', 'ambient_elated_header_meta');
}

if (!function_exists('ambient_elated_user_scalable_meta')) {
	/**
	 * Function that outputs user scalable meta if responsiveness is turned on
	 * Hooked to ambient_elated_header_meta action
	 */
	function ambient_elated_user_scalable_meta() {
		//is responsiveness option is chosen?
		if (ambient_elated_is_responsive_on()) { ?>
			<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
		<?php } else { ?>
			<meta name="viewport" content="width=1200,user-scalable=yes">
		<?php }
	}

	add_action('ambient_elated_header_meta', 'ambient_elated_user_scalable_meta');
}

if (!function_exists('ambient_elated_get_page_id')) {
	/**
	 * Function that returns current page / post id.
	 * Checks if current page is woocommerce page and returns that id if it is.
	 * Checks if current page is any archive page (category, tag, date, author etc.) and returns -1 because that isn't
	 * page that is created in WP admin.
	 *
	 * @return int
	 *
	 * @version 0.1
	 *
	 * @see ambient_elated_is_woocommerce_installed()
	 * @see ambient_elated_is_woocommerce_shop()
	 */
	function ambient_elated_get_page_id() {
		if (ambient_elated_is_woocommerce_installed() && ambient_elated_is_woocommerce_shop()) {
			return ambient_elated_get_woo_shop_page_id();
		}

		if (is_archive() || is_search() || is_404() || (is_home() && is_front_page())) {
			return -1;
		}

		return get_queried_object_id();
	}
}

if (!function_exists('ambient_elated_is_default_wp_template')) {
	/**
	 * Function that checks if current page archive page, search, 404 or default home blog page
	 * @return bool
	 *
	 * @see is_archive()
	 * @see is_search()
	 * @see is_404()
	 * @see is_front_page()
	 * @see is_home()
	 */
	function ambient_elated_is_default_wp_template() {
		return is_archive() || is_search() || is_404() || (is_front_page() && is_home());
	}
}

if (!function_exists('ambient_elated_has_shortcode')) {
	/**
	 * Function that checks whether shortcode exists on current page / post
	 *
	 * @param string shortcode to find
	 * @param string content to check. If isn't passed current post content will be used
	 *
	 * @return bool whether content has shortcode or not
	 */
	function ambient_elated_has_shortcode($shortcode, $content = '') {
		$has_shortcode = false;

		if ($shortcode) {
			//if content variable isn't past
			if ($content == '') {
				//take content from current post
				$page_id = ambient_elated_get_page_id();
				if (!empty($page_id)) {
					$current_post = get_post($page_id);

					if (is_object($current_post) && property_exists($current_post, 'post_content')) {
						$content = $current_post->post_content;
					}
				}
			}

			//does content has shortcode added?
			if (stripos($content, '[' . $shortcode) !== false) {
				$has_shortcode = true;
			}
		}

		return $has_shortcode;
	}
}

if (!function_exists('ambient_elated_get_sidebar')) {
	/**
	 * Return Sidebar
	 *
	 * @return string
	 */
	function ambient_elated_get_sidebar() {

		$id = ambient_elated_get_page_id();

		$sidebar = "sidebar";

		if (get_post_meta($id, 'eltdf_custom_sidebar_meta', true) != '') {
			$sidebar = get_post_meta($id, 'eltdf_custom_sidebar_meta', true);
		} else {
			if (is_single() && ambient_elated_options()->getOptionValue('blog_single_custom_sidebar') != '') {
				$sidebar = esc_attr(ambient_elated_options()->getOptionValue('blog_single_custom_sidebar'));
			} elseif ((ambient_elated_is_product_category() || ambient_elated_is_product_tag()) && ambient_elated_get_woo_shop_page_id()) {
				$shop_id = ambient_elated_get_woo_shop_page_id();
				if (get_post_meta($shop_id, 'eltdf_custom_sidebar_meta', true) != '') {
					$sidebar = esc_attr(get_post_meta($shop_id, 'eltdf_custom_sidebar_meta', true));
				}
			} elseif ((is_archive() || (is_home() && is_front_page())) && ambient_elated_options()->getOptionValue('blog_custom_sidebar') != '') {
				$sidebar = esc_attr(ambient_elated_options()->getOptionValue('blog_custom_sidebar'));
			} elseif (is_search() && ambient_elated_options()->getOptionValue('search_page_custom_sidebar') != '') {
				$sidebar = esc_attr(ambient_elated_options()->getOptionValue('search_page_custom_sidebar'));
			} elseif (is_page() && ambient_elated_options()->getOptionValue('page_custom_sidebar') != '') {
				$sidebar = esc_attr(ambient_elated_options()->getOptionValue('page_custom_sidebar'));
			}
		}

		return $sidebar;
	}
}

if (!function_exists('ambient_elated_sidebar_columns_class')) {

	/**
	 * Return classes for columns holder when sidebar is active
	 *
	 * @return array
	 */

	function ambient_elated_sidebar_columns_class() {

		$sidebar_class = array();
		$sidebar_layout = ambient_elated_sidebar_layout();

		switch ($sidebar_layout):
			case 'sidebar-33-right':
				$sidebar_class[] = 'eltdf-two-columns-66-33';
				break;
			case 'sidebar-25-right':
				$sidebar_class[] = 'eltdf-two-columns-75-25';
				break;
			case 'sidebar-33-left':
				$sidebar_class[] = 'eltdf-two-columns-33-66';
				break;
			case 'sidebar-25-left':
				$sidebar_class[] = 'eltdf-two-columns-25-75';
				break;

		endswitch;

		$sidebar_class[] = ' eltdf-content-has-sidebar clearfix';

		return ambient_elated_class_attribute($sidebar_class);
	}
}

if (!function_exists('ambient_elated_sidebar_layout')) {

	/**
	 * Function that check is sidebar is enabled and return type of sidebar layout
	 */
	function ambient_elated_sidebar_layout() {

		$sidebar_layout = '';
		$page_id = ambient_elated_get_page_id();

		$page_sidebar_meta = get_post_meta($page_id, 'eltdf_sidebar_meta', true);

		if (($page_sidebar_meta !== '') && $page_id !== -1) {
			if ($page_sidebar_meta == 'no-sidebar') {
				$sidebar_layout = '';
			} else {
				$sidebar_layout = $page_sidebar_meta;
			}
		} else {
			if (is_single() && ambient_elated_options()->getOptionValue('blog_single_sidebar_layout')) {
				$sidebar_layout = esc_attr(ambient_elated_options()->getOptionValue('blog_single_sidebar_layout'));
			} elseif ((is_archive() || (is_home() && is_front_page())) && ambient_elated_options()->getOptionValue('archive_sidebar_layout')) {
				$sidebar_layout = esc_attr(ambient_elated_options()->getOptionValue('archive_sidebar_layout'));
			} elseif (is_page() && ambient_elated_options()->getOptionValue('page_sidebar_layout')) {
				$sidebar_layout = esc_attr(ambient_elated_options()->getOptionValue('page_sidebar_layout'));
			}
		}

		if ( ! empty( $sidebar_layout ) && ! is_active_sidebar( ambient_elated_get_sidebar() ) ) {
			$sidebar_layout = '';
		}

		return $sidebar_layout;
	}
}


if (!function_exists('ambient_elated_page_custom_style')) {
	/**
	 * Function that print custom page style
	 */
	function ambient_elated_page_custom_style() {
		
		$style = apply_filters('ambient_elated_add_page_custom_style', $style = array());

		if ($style !== '') {
			wp_add_inline_style('ambient-elated-modules', $style);
		}
	}

	add_action('wp_enqueue_scripts', 'ambient_elated_page_custom_style');
}

if (!function_exists('ambient_elated_container_style')) {
	/**
	 * Function that return container style
	 */
	function ambient_elated_container_style($style) {
		$id = ambient_elated_get_page_id();
		$class_id = ambient_elated_get_page_id();
		if (ambient_elated_is_woocommerce_installed() && is_product()) {
			$class_id = get_the_ID();
		}

		$class_prefix = ambient_elated_get_unique_page_class($class_id);

		$container_selector = array(
			$class_prefix . ' .eltdf-content .eltdf-content-inner > .eltdf-container',
			$class_prefix . ' .eltdf-content .eltdf-content-inner > .eltdf-full-width',
		);

		$container_class = array();
		$page_backgorund_color = get_post_meta($id, "eltdf_page_background_color_meta", true);

		if ($page_backgorund_color) {
			$container_class['background-color'] = $page_backgorund_color;
		}

		$current_style = ambient_elated_dynamic_css($container_selector, $container_class);
		$style[] = $current_style;

		return $current_style;
	}

	add_filter('ambient_elated_add_page_custom_style', 'ambient_elated_container_style');
}

if (!function_exists('ambient_elated_content_padding_top')) {
	/**
	 * Function that return padding for content
	 */
	function ambient_elated_content_padding_top($style) {
		$id = ambient_elated_get_page_id();
		$class_id = ambient_elated_get_page_id();
		if (ambient_elated_is_woocommerce_installed() && is_product()) {
			$class_id = get_the_ID();
		}

		$class_prefix = ambient_elated_get_unique_page_class($class_id);

		$current_style = '';

		$content_selector = array(
			$class_prefix . ' .eltdf-content .eltdf-content-inner > .eltdf-container > .eltdf-container-inner',
			$class_prefix . ' .eltdf-content .eltdf-content-inner > .eltdf-full-width > .eltdf-full-width-inner',
		);

		$content_class = array();

		$page_padding_top = get_post_meta($id, "eltdf_page_content_top_padding", true);

		if (!ambient_elated_core_plugin_installed() && empty($page_padding_top)) {
			$page_padding_top = 40;
		}

		if ($page_padding_top !== '') {
			if (get_post_meta($id, "eltdf_page_content_top_padding_mobile", true) == 'yes') {
				$content_class['padding-top'] = ambient_elated_filter_px($page_padding_top) . 'px !important';
			} else {
				$content_class['padding-top'] = ambient_elated_filter_px($page_padding_top) . 'px';
			}
			$current_style .= ambient_elated_dynamic_css($content_selector, $content_class);
		}

		$current_style = $current_style . $style;

		return $current_style;
	}

	add_filter('ambient_elated_add_page_custom_style', 'ambient_elated_content_padding_top');
}

if (!function_exists('ambient_elated_boxed_style')) {

	/**
	 * Function that return container style
	 */

	function ambient_elated_boxed_style($style) {

		$id = ambient_elated_get_page_id();

		$class_prefix = ambient_elated_get_unique_page_class();

		$container_selector = array(
			$class_prefix . '.eltdf-boxed .eltdf-wrapper'
		);

		$container_style = array();

		if (get_post_meta($id, "eltdf_boxed_meta", true) == 'yes') {
			$page_backgorund_color = get_post_meta($id, "eltdf_page_background_color_in_box_meta", true);
			$page_backgorund_image = get_post_meta($id, "eltdf_boxed_background_image_meta", true);
			$page_backgorund_image_pattern = get_post_meta($id, "eltdf_boxed_pattern_background_image_meta", true);
			$page_backgorund_attachment = get_post_meta($id, "eltdf_boxed_background_image_attachment_meta", true);

			if ($page_backgorund_color) {
				$container_style['background-color'] = $page_backgorund_color;
			}

			if ($page_backgorund_image) {
				$container_style['background-image'] = 'url(' . $page_backgorund_image . ')';
				$container_style['background-position'] = 'center 0px';
				$container_style['background-repeat'] = 'no-repeat';
			}

			if ($page_backgorund_image_pattern) {
				$container_style['background-image'] = 'url(' . $page_backgorund_image_pattern . ')';
				$container_style['background-position'] = '0px 0px';
				$container_style['background-repeat'] = 'repeat';
			}

			$container_style['background-attachment'] = $page_backgorund_attachment;

			if ($page_backgorund_image) {
				if ($page_backgorund_attachment == 'fixed') {
					$container_style['background-size'] = 'cover';
				} else {
					$container_style['background-size'] = 'contain';
				}
			}
		}
		$current_style = ambient_elated_dynamic_css($container_selector, $container_style);

		$current_style = $current_style . $style;
		return $current_style;

	}

	add_filter('ambient_elated_add_page_custom_style', 'ambient_elated_boxed_style');
}

if (!function_exists('ambient_elated_get_unique_page_class')) {
	/**
	 * Returns unique page class based on post type and page id
	 *
	 * @return string
	 */
	function ambient_elated_get_unique_page_class() {
		$id = ambient_elated_get_page_id();
		$page_class = '';

		if (is_single()) {
			$page_class = '.postid-' . get_queried_object_id();
		} elseif ($id === ambient_elated_get_woo_shop_page_id()) {
			$page_class = '.archive';
		} else {
			$page_class .= '.page-id-' . $id;
		}

		return $page_class;
	}
}

if (!function_exists('ambient_elated_print_custom_css')) {
	/**
	 * Prints out custom css from theme options
	 */
	function ambient_elated_print_custom_css() {
		$custom_css = ambient_elated_options()->getOptionValue('custom_css');

		if ($custom_css !== '') {
			wp_add_inline_style('ambient-elated-modules', $custom_css);
		}
	}

	add_action('wp_enqueue_scripts', 'ambient_elated_print_custom_css');
}

if (!function_exists('ambient_elated_print_custom_js')) {
	/**
	 * Prints out custom css from theme options
	 */
	function ambient_elated_print_custom_js() {
		$custom_js = ambient_elated_options()->getOptionValue('custom_js');

		if ($custom_js !== '') {
			wp_add_inline_script('ambient-elated-modules', $custom_js);
		}
	}

	add_action('wp_enqueue_scripts', 'ambient_elated_print_custom_js');
}

if (!function_exists('ambient_elated_get_global_variables')) {
	/**
	 * Function that generates global variables and put them in array so they could be used in the theme
	 */
	function ambient_elated_get_global_variables() {

		$global_variables = array();

		$global_variables['eltdfAddForAdminBar'] = is_admin_bar_showing() ? 32 : 0;
		$global_variables['eltdfElementAppearAmount'] = -50;
		$global_variables['eltdfFinishedMessage'] = esc_html__('No more posts', 'ambient');
		$global_variables['eltdfMessage'] = esc_html__('Loading new posts...', 'ambient');
		$global_variables['eltdAddingToCart'] = esc_html__('Adding to Cart...', 'ambient');

		$global_variables = apply_filters('ambient_elated_js_global_variables', $global_variables);

		wp_localize_script('ambient-elated-modules', 'eltdfGlobalVars', array(
			'vars' => $global_variables
		));
	}

	add_action('wp_enqueue_scripts', 'ambient_elated_get_global_variables');
}

if (!function_exists('ambient_elated_per_page_js_variables')) {
	/**
	 * Outputs global JS variable that holds page settings
	 */
	function ambient_elated_per_page_js_variables() {
		$per_page_js_vars = apply_filters('ambient_elated_per_page_js_vars', array());

		wp_localize_script('ambient-elated-modules', 'eltdfPerPageVars', array(
			'vars' => $per_page_js_vars
		));
	}

	add_action('wp_enqueue_scripts', 'ambient_elated_per_page_js_variables');
}

if (!function_exists('ambient_elated_content_elem_style_attr')) {
	/**
	 * Defines filter for adding custom styles to content HTML element
	 */
	function ambient_elated_content_elem_style_attr() {
		$styles = apply_filters('ambient_elated_content_elem_style_attr', array());

		ambient_elated_inline_style($styles);
	}
}

if (!function_exists('ambient_elated_is_woocommerce_installed')) {
	/**
	 * Function that checks if woocommerce is installed
	 * @return bool
	 */
	function ambient_elated_is_woocommerce_installed() {
		return function_exists('is_woocommerce');
	}
}

if (!function_exists('ambient_elated_core_plugin_installed')) {
	//is Elated CPT installed?
	function ambient_elated_core_plugin_installed() {
		return defined('ELATED_CORE_VERSION');
	}
}

if (!function_exists('ambient_elated_visual_composer_installed')) {
	/**
	 * Function that checks if visual composer installed
	 * @return bool
	 */
	function ambient_elated_visual_composer_installed() {
		//is Visual Composer installed?
		if (class_exists('WPBakeryVisualComposerAbstract')) {
			return true;
		}

		return false;
	}
}

if (!function_exists('ambient_elated_contact_form_7_installed')) {
	/**
	 * Function that checks if contact form 7 installed
	 * @return bool
	 */
	function ambient_elated_contact_form_7_installed() {
		//is Contact Form 7 installed?
		if (defined('WPCF7_VERSION')) {
			return true;
		}

		return false;
	}
}

if (!function_exists('ambient_elated_is_wpml_installed')) {
	/**
	 * Function that checks if WPML plugin is installed
	 * @return bool
	 *
	 * @version 0.1
	 */
	function ambient_elated_is_wpml_installed() {
		return defined('ICL_SITEPRESS_VERSION');
	}
}

if (!function_exists('ambient_elated_max_image_width_srcset')) {
	/**
	 * Set max width for srcset to 1920
	 *
	 * @return int
	 */
	function ambient_elated_max_image_width_srcset() {
		return 1920;
	}

	add_filter('max_srcset_image_width', 'ambient_elated_max_image_width_srcset');
}

if (!function_exists('ambient_elated_is_ajax_request')) {
	/**
	 * Function that checks if the incoming request is made by ajax function
	 */
	function ambient_elated_is_ajax_request() {

		return isset($_POST['ajaxReq']) && $_POST['ajaxReq'] == 'yes';

	}
}

function getChildCategoriesIds($cat_ids, $params) {
	$categoriesIds = array();
	$order = ($params['filter_order_by'] === 'count') ? 'DESC' : 'ASC';

	$args = array(
		'taxonomy'   => 'portfolio-category',
		'hide_empty' => false,
		'parent'     => $cat_ids,
		'orderby'    => $params['filter_order_by'],
		'order'      => $order
	);

	$categories = get_terms($args);

	foreach ($categories as $category) {
		$categoriesIds[] = $category->term_id;
	}

	return $categoriesIds;
}

function getAllChildCategoriesIds($cat_id, $params) {
	$categoriesIds = array();
	$order = ($params['filter_order_by'] === 'count') ? 'DESC' : 'ASC';

	$args = array(
		'taxonomy'   => 'portfolio-category',
		'hide_empty' => false,
		'child_of'     => $cat_id,
		'orderby'    => $params['filter_order_by'],
		'order'      => $order
	);

	$categories = get_terms($args);

	foreach ($categories as $category) {
		$categoriesIds[] = $category->term_id;
	}

	return $categoriesIds;
}

if ( ! function_exists( 'ambient_elated_get_module_part' ) ) {
	function ambient_elated_get_module_part( $module ) {
		return $module;
	}
}

if ( ! function_exists( 'ambient_elated_enqueue_editor_customizer_styles' ) ) {
	/**
	 * Enqueue supplemental block editor styles
	 */
	function ambient_elated_enqueue_editor_customizer_styles() {
		wp_enqueue_style( 'ambient-style-modules-admin-styles', ELATED_FRAMEWORK_ADMIN_ASSETS_ROOT . '/css/eltdf-modules-admin.css' );
		wp_enqueue_style( 'ambient-style-handle-editor-customizer-styles', ELATED_FRAMEWORK_ADMIN_ASSETS_ROOT . '/css/editor-customizer-style.css' );
	}

	// add google font
	add_action( 'enqueue_block_editor_assets', 'ambient_elated_google_fonts_styles' );
	// add action
	add_action( 'enqueue_block_editor_assets', 'ambient_elated_enqueue_editor_customizer_styles' );
}

if ( ! function_exists( 'ambient_elated_is_gutenberg_installed' ) ) {
    /**
     * Function that checks if Gutenberg plugin installed
     * @return bool
     */
    function ambient_elated_is_gutenberg_installed() {
        return function_exists( 'is_gutenberg_page' ) && is_gutenberg_page();
    }
}

if ( ! function_exists( 'ambient_elated_is_wp_gutenberg_installed' ) ) {
    /**
     * Function that checks if WordPress 5.x with Gutenberg editor installed
     * @return bool
     */
    function ambient_elated_is_wp_gutenberg_installed() {
        return class_exists( 'WP_Block_Type' );
    }
}
