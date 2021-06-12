<?php
namespace AmbientElatedNamespace\Modules\Shortcodes\CallToAction;

use AmbientElatedNamespace\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class CallToAction
 */
class CallToAction implements ShortcodeInterface {
	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'eltdf_call_to_action';

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
				'name' => esc_html__('Elated Call To Action', 'ambient'),
				'base' => $this->getBase(),
				'category' => esc_html__('by ELATED', 'ambient'),
				'icon' => 'icon-wpb-call-to-action extended-custom-icon',
				'allowed_container_element' => 'vc_row',
				'params' => array(
					array(
						'type'       => 'dropdown',
						'param_name' => 'layout',
						'heading'    => esc_html__('Layout', 'ambient'),
						'value'      => array(
							esc_html__('Normal', 'ambient') => 'normal',
							esc_html__('Simple', 'ambient') => 'simple'
						)
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'content_in_grid',
						'heading'     => esc_html__('Set Content In Grid', 'ambient'),
						'value'       => array_flip(ambient_elated_get_yes_no_select_array(false)),
						'dependency'  => array('element' => 'layout', 'value' => array('normal'))
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'content_elements_proportion',
						'heading'    => esc_html__('Content Elements Proportion', 'ambient'),
						'value'      => array(
							esc_html__('80/20', 'ambient') => '80',
							esc_html__('75/25', 'ambient') => '75',
							esc_html__('66/33', 'ambient') => '66',
							esc_html__('50/50', 'ambient') => '50'
						),
						'dependency'  => array('element' => 'layout', 'value' => array('normal'))
					),
					array(
						'type'        => 'textfield',
						'param_name'  => 'button_text',
						'heading'     => esc_html__('Button Text', 'ambient'),
						'value'       => esc_html__('Button Text', 'ambient'),
						'save_always' => true
					),
					array(
						'type'       => 'textfield',
						'param_name' => 'button_top_margin',
						'heading'    => esc_html__('Button Top Margin (px)', 'ambient'),
						'dependency' => array('element' => 'layout', 'value' => array('simple')),
						'group'      => esc_html__('Button Style', 'ambient')
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'button_type',
						'heading'    => esc_html__('Button Type', 'ambient'),
						'value'      => array(
							esc_html__('Solid', 'ambient')   => 'solid',
							esc_html__('Outline', 'ambient') => 'outline'
						),
						'group'       => esc_html__('Button Style', 'ambient')
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'button_size',
						'heading'    => esc_html__('Button Size', 'ambient'),
						'value'      => array(
							esc_html__('Medium', 'ambient')  => 'medium',
							esc_html__('Small', 'ambient')   => 'small',
							esc_html__('Large', 'ambient')   => 'large'
						),
						'dependency'  => array('element' => 'button_type', 'value' => array('solid', 'outline')),
						'group'       => esc_html__('Button Style', 'ambient')
					),
					array(
						'type'       => 'textfield',
						'param_name' => 'button_link',
						'heading'    => esc_html__('Button Link', 'ambient'),
						'group'      => esc_html__('Button Style', 'ambient')
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'button_target',
						'heading'    => esc_html__('Button Link Target', 'ambient'),
						'value'      => array(
							esc_html__('Same Window', 'ambient')  => '_self',
							esc_html__('New Window', 'ambient') => '_blank'
						),
						'group'      => esc_html__('Button Style', 'ambient')
					),
					array(
						'type'       => 'colorpicker',
						'param_name' => 'button_color',
						'heading'    => esc_html__('Button Color', 'ambient'),
						'group'      => esc_html__('Button Style', 'ambient')
					),
					array(
						'type'       => 'colorpicker',
						'param_name' => 'button_hover_color',
						'heading'    => esc_html__('Button Hover Color', 'ambient'),
						'group'      => esc_html__('Button Style', 'ambient')
					),
					array(
						'type'       => 'colorpicker',
						'param_name' => 'button_background_color',
						'heading'    => esc_html__('Button Background Color', 'ambient'),
						'dependency' => array('element' => 'button_type', 'value' => array('solid')),
						'group'      => esc_html__('Button Style', 'ambient')
					),
					array(
						'type'       => 'colorpicker',
						'param_name' => 'button_hover_background_color',
						'heading'    => esc_html__('Button Hover Background Color', 'ambient'),
						'group'      => esc_html__('Button Style', 'ambient')
					),
					array(
						'type'       => 'colorpicker',
						'param_name' => 'button_border_color',
						'heading'    => esc_html__('Button Border Color', 'ambient'),
						'group'      => esc_html__('Button Style', 'ambient')
					),
					array(
						'type'       => 'colorpicker',
						'param_name' => 'button_hover_border_color',
						'heading'    => esc_html__('Button Hover Border Color', 'ambient'),
						'group'      => esc_html__('Button Style', 'ambient')
					),
					array(
						'type'       => 'textarea_html',
						'param_name' => 'content',
						'heading'    => esc_html__('Content', 'ambient'),
						'value'      => esc_html__('I am test text for Call to Action shortcode content', 'ambient')
					)
				)
			)
		);
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
			'layout'                        => 'normal',
			'content_in_grid'               => 'no',
			'content_elements_proportion'   => '75',
			'button_text'                   => '',
			'button_top_margin'             => '',
			'button_type'                   => 'solid',
			'button_size'                   => 'medium',
			'button_link'                   => '',
			'button_target'                 => '_self',
			'button_color'                  => '',
			'button_hover_color'            => '',
			'button_background_color'       => '',
			'button_hover_background_color' => '',
			'button_border_color'           => '',
			'button_hover_border_color'     => ''
		);

		$params = shortcode_atts($args, $atts);

		$params['content'] = $content = preg_replace('#^<\/p>|<p>$#', '', $content);
		
		$params['holder_classes'] = $this->getHolderClasses($params);
		$params['inner_classes'] = $this->getInnerClasses($params);
		$params['button_holder_styles'] = $this->getButtonHolderStyles($params);
		$params['button_parameters'] = $this->getButtonParameters($params);
		
		//Get HTML from template
		$html = ambient_elated_get_shortcode_module_template_part('templates/call-to-action', 'call-to-action', '', $params);

		return $html;
	}
	
	/**
	 * Generates holder classes
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getHolderClasses($params){
		$holderClasses = '';
		
		if(!empty($params['layout'])){
			$holderClasses .= ' eltdf-'.$params['layout'].'-layout';
		}
		
		if($params['content_in_grid'] === 'yes' && $params['layout'] === 'normal'){
			$holderClasses .= ' eltdf-content-in-grid';
		}
		
		$content_elements_proportion = $params['content_elements_proportion'];
		if($params['layout'] === 'normal') {
			switch ( $content_elements_proportion ):
				case '80':
					$holderClasses .= ' eltdf-four-fifths-columns';
					break;
				case '75':
					$holderClasses .= ' eltdf-three-quarters-columns';
					break;
				case '66':
					$holderClasses .= ' eltdf-two-thirds-columns';
					break;
				case '50':
					$holderClasses .= ' eltdf-two-halves-columns';
					break;
				default:
					$holderClasses .= ' eltdf-three-quarters-columns';
					break;
			endswitch;
		}
		
		return $holderClasses;
	}
	
	/**
	 * Generates inner classes
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getInnerClasses($params){
		$innerClasses = '';
		
		if($params['layout'] === 'normal' && $params['content_in_grid'] === 'yes') {
			$innerClasses .= ' eltdf-grid';
		}
		
		return $innerClasses;
	}
	
	private function getButtonHolderStyles($params) {
		$styles = array();
		
		if (!empty($params['button_top_margin']) && $params['layout'] === 'simple') {
			$styles[] = 'margin-top: '.ambient_elated_filter_px($params['button_top_margin']).'px';
		}
		
		return implode(';', $styles);
	}
	
	private function getButtonParameters($params) {
		$button_params_array = array();
		
		if(!empty($params['button_text'])) {
			$button_params_array['text'] = $params['button_text'];
		}
		
		if(!empty($params['button_type'])) {
			$button_params_array['type'] = $params['button_type'];
		}
		
		if(!empty($params['button_size'])) {
			$button_params_array['size'] = $params['button_size'];
		}
		
		if(!empty($params['button_link'])) {
			$button_params_array['link'] = $params['button_link'];
		}

        if(!empty($params['button_target'])) {
            $button_params_array['target'] = $params['button_target'];
        } else {
        	$button_params_array['target'] = '_self';
        }

        if(!empty($params['button_color'])) {
            $button_params_array['color'] = $params['button_color'];
        }

        if(!empty($params['button_hover_color'])) {
            $button_params_array['hover_color'] = $params['button_hover_color'];
        }

        if(!empty($params['button_background_color'])) {
            $button_params_array['background_color'] = $params['button_background_color'];
        }

        if(!empty($params['button_hover_background_color'])) {
            $button_params_array['hover_background_color'] = $params['button_hover_background_color'];
        }

        if(!empty($params['button_border_color'])) {
            $button_params_array['border_color'] = $params['button_border_color'];
        }

        if(!empty($params['button_hover_border_color'])) {
            $button_params_array['hover_border_color'] = $params['button_hover_border_color'];
        }
		
		return $button_params_array;
	}
}