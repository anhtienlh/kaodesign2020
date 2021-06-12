<?php
namespace AmbientElatedNamespace\Modules\Shortcodes\PieChart;

use AmbientElatedNamespace\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class Pie Chart
 */
class PieChart implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'eltdf_pie_chart';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	/**
	 * Maps shortcode to Visual Composer. Hooked on vc_before_init
	 */
	public function vcMap() {
		vc_map( array(
			'name' => esc_html__('Elated Pie Chart', 'ambient'),
			'base' => $this->getBase(),
			'icon' => 'icon-wpb-pie-chart extended-custom-icon',
			'category' => esc_html__('by ELATED', 'ambient'),
			'allowed_container_element' => 'vc_row',
			'params' => array(
				array(
					'type'       => 'textfield',
					'param_name' => 'percent',
					'heading'    => esc_html__('Percentage', 'ambient')
				),
				array(
					'type'       => 'colorpicker',
					'param_name' => 'percent_color',
					'heading'    => esc_html__('Percentage Color', 'ambient'),
					'dependency' => array('element' => 'percent', 'not_empty' => true)
				),
				array(
					'type'       => 'colorpicker',
					'param_name' => 'active_color',
					'heading'    => esc_html__('Pie Chart Active Color', 'ambient')
				),
				array(
					'type'       => 'colorpicker',
					'param_name' => 'inactive_color',
					'heading'    => esc_html__('Pie Chart Inactive Color', 'ambient')
				),
				array(
					'type'       => 'textfield',
					'param_name' => 'size',
					'heading'    => esc_html__('Pie Chart Size (px)', 'ambient')
				),
				array(
					'type'       => 'textfield',
					'param_name' => 'title',
					'heading'    => esc_html__('Title', 'ambient')
				),
				array(
					'type'        => 'dropdown',
					'param_name'  => 'title_tag',
					'heading'     => esc_html__('Title Tag', 'ambient'),
					'value'       => array_flip(ambient_elated_get_title_tag(true)),
					'save_always' => true,
					'dependency'  => array('element' => 'title', 'not_empty' => true)
				),
				array(
					'type'       => 'colorpicker',
					'param_name' => 'title_color',
					'heading'    => esc_html__('Title Color', 'ambient'),
					'dependency' => array('element' => 'title', 'not_empty' => true)
				),
				array(
					'type'       => 'textarea',
					'param_name' => 'text',
					'heading'    => esc_html__('Text', 'ambient')
				),
				array(
					'type'       => 'colorpicker',
					'param_name' => 'text_color',
					'heading'    => esc_html__('Text Color', 'ambient'),
					'dependency' => array('element' => 'text', 'not_empty' => true)
				)
			)
		) );
	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @param $content string shortcode content
	 * @return string
	 */
	public function render($atts, $content = null) {

		$args = array(
			'percent'           => '69',
			'percent_color'     => '',
			'active_color'      => '',
			'inactive_color'    => '',
			'size'              => '',
			'title'             => '',
			'title_tag'         => 'h4',
			'title_color'       => '',
			'text'              => '',
			'text_color'        => ''
		);

		$params = shortcode_atts($args, $atts);
		
		$params['pie_chart_data'] = $this->getPieChartData($params);
		$params['title_tag'] = !empty($params['title_tag']) ? $params['title_tag'] : $args['title_tag'];
		$params['percent_styles'] = $this->getPercentStyles($params);
		$params['title_styles'] = $this->getTitleStyles($params);
		$params['text_styles'] = $this->getTextStyles($params);

		$html = ambient_elated_get_shortcode_module_template_part('templates/pie-chart', 'pie-chart', '', $params);

		return $html;
	}

	/**
	 * Return data attributes for Pie Chart
	 *
	 * @param $params
	 * @return array
	 */
	private function getPieChartData($params) {

		$pieChartData = array();
		
		if(!empty($params['percent'])) {
			$pieChartData['data-percent'] = $params['percent'];
		}
		if(!empty($params['size'])) {
			$pieChartData['data-size'] = $params['size'];
		}
        if(!empty($params['active_color'])) {
            $pieChartData['data-bar-color'] = $params['active_color'];
        }
        if(!empty($params['inactive_color'])) {
            $pieChartData['data-track-color'] = $params['inactive_color'];
        }

		return $pieChartData;
	}
	
	private function getPercentStyles($params) {
		$percentStyle = array();
		
		if (!empty($params['percent_color'])) {
			$percentStyle[] = 'color: '.$params['percent_color'];
		}
		
		return implode(';', $percentStyle);
	}
	
	private function getTitleStyles($params) {
		$titleStyle = array();
		
		if (!empty($params['title_color'])) {
			$titleStyle[] = 'color: '.$params['title_color'];
		}
		
		return implode(';', $titleStyle);
	}
	
	private function getTextStyles($params) {
		$textStyle = array();
		
		if (!empty($params['text_color'])) {
			$textStyle[] = 'color: '.$params['text_color'];
		}
		
		return implode(';', $textStyle);
	}
}