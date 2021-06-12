<?php
namespace AmbientElatedNamespace\Modules\Shortcodes\PricingTables;

use AmbientElatedNamespace\Modules\Shortcodes\Lib\ShortcodeInterface;

class PricingTables implements ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'eltdf_pricing_tables';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map(
			array(
				'name' => esc_html__('Elated Pricing Tables', 'ambient'),
				'base' => $this->base,
				'as_parent' => array('only' => 'eltdf_pricing_table'),
				'content_element' => true,
				'category' => esc_html__('by ELATED', 'ambient'),
				'icon' => 'icon-wpb-pricing-tables extended-custom-icon',
				'js_view' => 'VcColumnView',
				'params' => array(
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Number of Columns', 'ambient'),
						'param_name' => 'columns',
						'value' => array(
							esc_html__('One', 'ambient') => 'eltdf-one-column',
							esc_html__('Two', 'ambient') => 'eltdf-two-columns',
							esc_html__('Three', 'ambient') => 'eltdf-three-columns',
							esc_html__('Four', 'ambient') => 'eltdf-four-columns',
							esc_html__('Five', 'ambient') => 'eltdf-five-columns',
						)
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'space_between_columns',
						'heading'    => esc_html__('Space Between Columns', 'ambient'),
						'value'      => array(
							esc_html__('Normal', 'ambient') => 'normal',
							esc_html__('Small', 'ambient') => 'small',
							esc_html__('Tiny', 'ambient') => 'tiny',
							esc_html__('No Space', 'ambient') => 'no'
						)
					)
				)
			)
		);
	}

	public function render($atts, $content = null) {
		$args = array(
			'columns'         	    => 'eltdf-two-columns',
			'space_between_columns' => 'normal'
		);
		
		$params = shortcode_atts($args, $atts);
		extract($params);

		$holder_class = '';
		
		if (!empty($columns)) {
			$holder_class .= ' '.$columns;
		}

		if (!empty($space_between_columns)) {
			$holder_class .= ' eltdf-pt-'.$space_between_columns.'-space';
		}
		
		$html = '<div class="eltdf-pricing-tables clearfix '.esc_attr($holder_class).'">';
			$html .= '<div class="eltdf-pt-wrapper">';
				$html .= do_shortcode($content);
			$html .= '</div>';
		$html .= '</div>';

		return $html;
	}
}