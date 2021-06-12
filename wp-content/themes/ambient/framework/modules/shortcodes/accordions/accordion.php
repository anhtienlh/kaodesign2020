<?php
namespace AmbientElatedNamespace\Modules\Shortcodes\Accordion;

use AmbientElatedNamespace\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
* class Accordions
*/
class Accordion implements ShortcodeInterface{
	/**
	 * @var string
	 */
	private $base;

	function __construct() {
		$this->base = 'eltdf_accordion';
		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return	$this->base;
	}

	public function vcMap() {
		vc_map( array(
			'name' =>  esc_html__('Elated Accordion', 'ambient'),
			'base' => $this->base,
			'as_parent' => array('only' => 'eltdf_accordion_tab'),
			'content_element' => true,
			'category' => esc_html__('by ELATED', 'ambient'),
			'icon' => 'icon-wpb-accordion extended-custom-icon',
			'show_settings_on_create' => true,
			'js_view' => 'VcColumnView',
			'params' => array(
				array(
					'type'       => 'textfield',
					'param_name' => 'el_class',
					'heading'    => esc_html__('Custom CSS Class', 'ambient')
				),
                array(
					'type'       => 'dropdown',
					'param_name' => 'style',
					'heading'    => esc_html__('Style', 'ambient'),
					'value'      => array(
						esc_html__('Accordion', 'ambient') => 'accordion',
						esc_html__('Toggle', 'ambient') => 'toggle'
					)
				),
				array(
					'type'       => 'dropdown',
					'param_name' => 'layout',
					'heading'    => esc_html__('Layout', 'ambient'),
					'value'      => array(
						esc_html__('Boxed', 'ambient') => 'boxed',
						esc_html__('Simple', 'ambient') => 'simple'
					)
				),
				array(
					'type'       => 'dropdown',
					'param_name' => 'background_skin',
					'heading'    => esc_html__('Background Skin', 'ambient'),
					'value' => array(
						esc_html__('Default', 'ambient') => '',
						esc_html__('White', 'ambient') => 'white'
					),
					'dependency'  => array('element' => 'layout', 'value' => array('boxed'))
				)
			)
		) );
	}
	
	public function render($atts, $content = null) {
		$default_atts=(array(
			'el_class'        => '',
			'title'           => '',
			'style'           => 'accordion',
			'layout'          => 'boxed',
			'background_skin' => ''
		));
		$params = shortcode_atts($default_atts, $atts);
		extract($params);

		$params['acc_class'] = $this->getAccordionClasses($params);
		$params['content'] = $content;

		$output = '';

		$output .= ambient_elated_get_shortcode_module_template_part('templates/accordion-holder-template','accordions', '', $params);

		return $output;
	}

	/**
	   * Generates accordion classes
	   *
	   * @param $params
	   *
	   * @return string
	*/
	private function getAccordionClasses($params){

		$acc_class = 'eltdf-ac-default';

		switch($params['style']) {
            case 'toggle':
                $acc_class .= ' eltdf-toggle';
                break;
            default:
                $acc_class .= ' eltdf-accordion';
                break;
        }
		
		if (!empty($params['layout'])) {
			$acc_class .= ' eltdf-ac-'.esc_attr($params['layout']);
		}
		
		if (!empty($params['background_skin'])) {
			$acc_class .= ' eltdf-'.esc_attr($params['background_skin']).'-skin';
		}

		if (!empty($params['el_class'])) {
			$acc_class .= ' '.esc_attr($params['el_class']);
		}

        return $acc_class;
	}
}
