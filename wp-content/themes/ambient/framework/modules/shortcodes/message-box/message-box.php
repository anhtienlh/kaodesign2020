<?php
namespace AmbientElatedNamespace\Modules\Shortcodes\MessageBox;

use AmbientElatedNamespace\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class MessageBox
 */
class MessageBox implements ShortcodeInterface	{
	private $base; 
	
	function __construct() {
		$this->base = 'eltdf_message_box';

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
			'name'                      => esc_html__( 'Elated Message Box', 'ambient' ),
			'base'                      => $this->base,
			'category'                  => esc_html__( 'by ELATED', 'ambient' ),
			'icon'                      => 'icon-wpb-message-box extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array_merge(
				array(
					array(
						'type'       => 'dropdown',
						'param_name' => 'type',
						'heading'    => esc_html__( 'Type', 'ambient' ),
						'value'      => array(
							esc_html__( 'Normal', 'ambient' )    => 'eltdf-mb-normal',
							esc_html__( 'With Icon', 'ambient' ) => 'eltdf-mb-with-icon'
						)
					)
				),
				\AmbientElatedClassIconCollections::get_instance()->getVCParamsArray(),
				array(
					array(
						'type'       => 'colorpicker',
						'param_name' => 'icon_color',
						'heading'    => esc_html__( 'Icon Color', 'ambient' ),
						'dependency' => Array( 'element' => 'type', 'value' => array( 'eltdf-mb-with-icon' ) )
					),
					array(
						'type'       => 'colorpicker',
						'param_name' => 'icon_background_color',
						'heading'    => esc_html__( 'Icon Background Color', 'ambient' ),
						'dependency' => Array( 'element' => 'type', 'value' => array( 'eltdf-mb-with-icon' ) )
					),
					array(
						'type'       => 'colorpicker',
						'param_name' => 'background_color',
						'heading'    => esc_html__( 'Background Color', 'ambient' )
					),
					array(
						'type'       => 'colorpicker',
						'param_name' => 'border_color',
						'heading'    => esc_html__( 'Border Color', 'ambient' )
					),
					array(
						'type'       => 'textfield',
						'param_name' => 'border_width',
						'heading'    => esc_html__( 'Border Width (px)', 'ambient' )
					),
					array(
						'type'       => 'colorpicker',
						'param_name' => 'close_mark_color',
						'heading'    => esc_html__( 'Close Mark Color', 'ambient' )
					),
					array(
						'type'       => 'textarea_html',
						'param_name' => 'content',
						'heading'    => esc_html__( 'Content', 'ambient' ),
						'value'      => '<p>' . 'I am test text for Message shortcode.' . '</p>'
					)
				)
			)
		) );
	}

	public function render($atts, $content = null) {
		$args = array(
            'type'                  => '',
            'background_color'      => '',
            'border_color'          => '',
            'border_width'          => '',
            'icon_size'             => '',
            'icon_custom_size'      => '',
            'icon_color'            => '',
            'icon_background_color' => '',
            'close_mark_color'      => ''
        );
		
		$args = array_merge($args, ambient_elated_icon_collections()->getShortcodeParams());
		$params = shortcode_atts($args, $atts);
		$params['content']= preg_replace('#^<\/p>|<p>$#', '', $content);

		//Extract params for use in method
		extract($params);
		
		//Get HTML from template based on type of team
		$iconPackName = ambient_elated_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
		
		$params['holder_styles'] = $this->getHolderStyles($params);
		$params['icon'] = $params[$iconPackName];
		$params['icon_attributes']['style'] = $this->getIconStyles($params);
		$params['close_styles'] = $this->getCloseMarkStyles($params);
		
		$html = ambient_elated_get_shortcode_module_template_part('templates/message-box', 'message-box', '', $params);
		
		return $html;
	}
	
	/**
	 * Generates message box holder styles
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getHolderStyles($params){
		$styles = array();
		
		if(!empty($params['background_color'])) {
			$styles[] = 'background-color: '.$params['background_color'];
		}
		
		if(!empty($params['border_width']) || !empty($params['border_color'])) {
			$styles[] = 'border-style: solid';
			
			if(!empty($params['border_color'])) {
				$styles[] = 'border-color:'.$params['border_color'];
			}
			
			if(!empty($params['border_width'])) {
				$styles[] = 'border-width:'.ambient_elated_filter_px($params['border_width']).'px';
			}
		}
		
		return implode(';', $styles);
	}
	
	/**
     * Generates message icon styles
     *
     * @param $params
     *
     * @return array
     */
	private function getIconStyles($params){
		$styles = array();

        if(!empty($params['icon_color'])) {
	        $styles[] = 'color: '.$params['icon_color'];
        }

        return implode(';', $styles);
	
	}

	/**
     * Generates message close mark styles
     *
     * @param $params
     *
     * @return array
     */
	private function getCloseMarkStyles($params){
		$styles = array();
		
		if(!empty($params['close_mark_color'])) {
			$styles[] = 'color: '.$params['close_mark_color'];
        }

        return implode(';', $styles);
	}
}