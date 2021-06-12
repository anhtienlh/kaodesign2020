<?php
namespace AmbientElatedNamespace\Modules\Shortcodes\SectionTitle;

use AmbientElatedNamespace\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class SectionTitle
 */
class SectionTitle implements ShortcodeInterface	{
	private $base; 
	
	function __construct() {
		$this->base = 'eltdf_section_title';

		add_action('vc_before_init', array($this, 'vcMap'));
	}
	
	/**
	* Returns base for shortcode
	* @return string
	 */
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
						
		vc_map( array(
			'name' => esc_html__('Elated Section Title', 'ambient'),
			'base' => $this->base,
			'category' => esc_html__('by ELATED', 'ambient'),
			'icon' => 'icon-wpb-section-title extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params' =>	array(
				array(
					'type'       => 'dropdown',
					'param_name' => 'position',
					'heading'    => esc_html__('Horizontal Position', 'ambient'),
					'value'      => array(
						esc_html__('Default', 'ambient')   => '',
						esc_html__('Left', 'ambient') => 'left',
						esc_html__('Center', 'ambient') => 'center',
						esc_html__('Right', 'ambient') => 'right'
					),
					'save_always' => true
				),
                array(
                    'type'       => 'textfield',
                    'param_name' => 'title',
                    'heading'    => esc_html__('Title', 'ambient'),
					'admin_label' => true
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
				),
				array(
					'type'       => 'textfield',
					'param_name' => 'text_margin',
					'heading'    => esc_html__('Text Top Margin (px)', 'ambient'),
					'dependency' => array('element' => 'text', 'not_empty' => true)
				),
            )
		) );
	}

	public function render($atts, $content = null) {
		$args = array(
			'position'    => '',
            'title'       => '',
            'title_tag'   => 'h2',
            'title_color' => '',
			'text'        => '',
			'text_color'  => '',
			'text_margin' => ''
        );
		$params = shortcode_atts($args, $atts);

		$params['holder_styles'] = $this->getHolderStyles($params);
		$params['title_tag'] = !empty($params['title_tag']) ? $params['title_tag'] : $args['title_tag'];
		$params['title_styles'] = $this->getTitleStyles($params);
		$params['text_styles'] = $this->getTextStyles($params);

		$html = ambient_elated_get_shortcode_module_template_part('templates/section-title', 'section-title', '', $params);
		
		return $html;
	}
	
	private function getHolderStyles($params) {
		$holderStyle = array();
		
		if (!empty($params['position'])) {
			$holderStyle[] = 'text-align: '.$params['position'];
		}
		
		return implode(';', $holderStyle);
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
		
		if (!empty($params['text_margin'])) {
			$textStyle[] = 'margin-top: '.ambient_elated_filter_px($params['text_margin']).'px';
		}
		
		return implode(';', $textStyle);
	}
}