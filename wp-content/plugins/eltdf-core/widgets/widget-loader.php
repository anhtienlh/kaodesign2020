<?php

if (!function_exists('ambient_elated_register_widgets')) {

	function ambient_elated_register_widgets() {

		$widgets = array(
			'AmbientElatedClassAuthorInfoWidget',
			'AmbientElatedClassBlogListWidget',
			'AmbientElatedClassButtonWidget',
			'AmbientElatedClassFullScreenMenuOpener',
			'AmbientElatedClassIconWidget',
			'AmbientElatedClassImageWidget',
			'AmbientElatedClassSearchOpener',
			'AmbientElatedClassSeparatorWidget',
			'AmbientElatedClassSideAreaOpener',
			'AmbientElatedClassStickySidebar',
			'AmbientElatedClassSocialIconWidget'
		);

		if ( ambient_elated_is_woocommerce_installed() ){
			$widgets[] = 'AmbientElatedClassWoocommerceDropdownCart';

			//Change product tabs to accordions
			remove_filter( 'woocommerce_product_tabs', 'woocommerce_sort_product_tabs', 99 );
			add_filter( 'woocommerce_product_tabs', 'ambient_elated_woo_change_tabs_to_accordions', 10 );
		}

		foreach ($widgets as $widget) {
			register_widget($widget);
		}
	}
}

add_action('widgets_init', 'ambient_elated_register_widgets');