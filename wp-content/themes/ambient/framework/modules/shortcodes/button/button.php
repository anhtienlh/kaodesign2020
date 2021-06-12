<?php
namespace AmbientElatedNamespace\Modules\Shortcodes\Button;

use AmbientElatedNamespace\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class Button that represents button shortcode
 * @package AmbientElatedNamespace\Modules\Shortcodes\Button
 */
class Button implements ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    /**
     * Sets base attribute and registers shortcode with Visual Composer
     */
    public function __construct() {
        $this->base = 'eltdf_button';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    /**
     * Returns base attribute
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     * Maps shortcode to Visual Composer
     */
    public function vcMap() {
        vc_map(array(
            'name'                      => esc_html__('Elated Button', 'ambient'),
            'base'                      => $this->base,
            'admin_enqueue_css' => array(ambient_elated_get_skin_uri().'/assets/css/eltdf-vc-extend.css'),
            'category'                  => esc_html__('by ELATED', 'ambient'),
            'icon'                      => 'icon-wpb-button extended-custom-icon',
            'allowed_container_element' => 'vc_row',
            'params'                    => array_merge(
                array(
                    array(
                        'type'        => 'textfield',
                        'param_name'  => 'custom_class',
                        'heading'     => esc_html__('Custom CSS Class', 'ambient')
                    ),
                    array(
                        'type'        => 'dropdown',
                        'param_name'  => 'type',
                        'heading'     => esc_html__('Type', 'ambient'),
                        'value'       => array(
						    esc_html__('Solid', 'ambient')   => 'solid',
						    esc_html__('Outline', 'ambient') => 'outline',
						    esc_html__('Simple', 'ambient')  => 'simple'
                        ),
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'dropdown',
                        'param_name'  => 'size',
                        'heading'     => esc_html__('Size', 'ambient'),
                        'value'       => array(
						    esc_html__('Default', 'ambient') => '',
						    esc_html__('Small', 'ambient')   => 'small',
						    esc_html__('Medium', 'ambient')  => 'medium',
						    esc_html__('Large', 'ambient')   => 'large',
						    esc_html__('Huge', 'ambient')    => 'huge'
                        ),
                        'save_always' => true,
                        'dependency'  => array('element' => 'type', 'value' => array('solid', 'outline'))
                    ),
                    array(
                        'type'        => 'textfield',
                        'param_name'  => 'text',
                        'heading'     => esc_html__('Text', 'ambient'),
                        'value'       => esc_html__('Button Text', 'ambient'),
                        'admin_label' => true,
                        'save_always' => true
                    ),
                    array(
                        'type'        => 'textfield',
                        'param_name'  => 'link',
                        'heading'     => esc_html__('Link', 'ambient')
                    ),
                    array(
                        'type'        => 'dropdown',
                        'param_name'  => 'target',
                        'heading'     => esc_html__('Link Target', 'ambient'),
                        'value'       => array(
						    esc_html__('Same Window', 'ambient')  => '_self',
						    esc_html__('New Window', 'ambient') => '_blank'
                        )
                    )
                ),
                ambient_elated_icon_collections()->getVCParamsArray(array(), '', true),
                array(
                    array(
                        'type'        => 'colorpicker',
                        'param_name'  => 'color',
                        'heading'     => esc_html__('Color', 'ambient'),
                        'group'       => esc_html__('Design Options', 'ambient')
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'param_name'  => 'hover_color',
                        'heading'     => esc_html__('Hover Color', 'ambient'),
                        'group'       => esc_html__('Design Options', 'ambient')
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'param_name'  => 'background_color',
                        'heading'     => esc_html__('Background Color', 'ambient'),
                        'dependency'  => array('element' => 'type', 'value' => array('solid')),
                        'group'       => esc_html__('Design Options', 'ambient')
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'param_name'  => 'hover_background_color',
                        'heading'     => esc_html__('Hover Background Color', 'ambient'),
                        'group'       => esc_html__('Design Options', 'ambient')
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'param_name'  => 'border_color',
                        'heading'     => esc_html__('Border Color', 'ambient'),
                        'group'       => esc_html__('Design Options', 'ambient')
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'param_name'  => 'hover_border_color',
                        'heading'     => esc_html__('Hover Border Color', 'ambient'),
                        'group'       => esc_html__('Design Options', 'ambient')
                    ),
                    array(
                        'type'        => 'textfield',
                        'param_name'  => 'font_size',
                        'heading'     => esc_html__('Font Size (px)', 'ambient'),
                        'group'       => esc_html__('Design Options', 'ambient')
                    ),
                    array(
                        'type'        => 'dropdown',
                        'param_name'  => 'font_weight',
                        'heading'     => esc_html__('Font Weight', 'ambient'),
                        'value'       => array_flip(ambient_elated_get_font_weight_array(true)),
                        'save_always' => true,
                        'group'       => esc_html__('Design Options', 'ambient')
                    ),
                    array(
                        'type'        => 'textfield',
                        'param_name'  => 'margin',
                        'heading'     => esc_html__('Margin', 'ambient'),
                        'description' => esc_html__('Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'ambient'),
                        'group'       => esc_html__('Design Options', 'ambient')
                    )
                )
            )
        ));
    }

    /**
     * Renders HTML for button shortcode
     *
     * @param array $atts
     * @param null $content
     *
     * @return string
     */
    public function render($atts, $content = null) {
        $default_atts = array(
            'size'                   => '',
            'type'                   => 'solid',
            'text'                   => '',
            'link'                   => '',
            'target'                 => '_self',
            'color'                  => '',
            'hover_color'            => '',
            'background_color'       => '',
            'hover_background_color' => '',
            'border_color'           => '',
            'hover_border_color'     => '',
            'font_size'              => '',
            'font_weight'            => '',
            'margin'                 => '',
            'custom_class'           => '',
            'html_type'              => 'anchor',
            'input_name'             => '',
            'custom_attrs'           => array()
        );

        $default_atts = array_merge($default_atts, ambient_elated_icon_collections()->getShortcodeParams());
        $params       = shortcode_atts($default_atts, $atts);

        if($params['html_type'] !== 'input') {
            $iconPackName   = ambient_elated_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
            $params['icon'] = $iconPackName ? $params[$iconPackName] : '';
        }

        $params['size'] = !empty($params['size']) ? $params['size'] : 'medium';
        $params['type'] = !empty($params['type']) ? $params['type'] : 'solid';


        $params['link']   = !empty($params['link']) ? $params['link'] : '#';
        $params['target'] = !empty($params['target']) ? $params['target'] : '_self';

        //prepare params for template
        $params['button_classes']      = $this->getButtonClasses($params);
        $params['button_custom_attrs'] = !empty($params['custom_attrs']) ? $params['custom_attrs'] : array();
        $params['button_styles']       = $this->getButtonStyles($params);
        $params['button_data']         = $this->getButtonDataAttr($params);

        return ambient_elated_get_shortcode_module_template_part('templates/'.$params['html_type'], 'button', '', $params);
    }

    /**
     * Returns array of button styles
     *
     * @param $params
     *
     * @return array
     */
    private function getButtonStyles($params) {
        $styles = array();

        if(!empty($params['color'])) {
            $styles[] = 'color: '.$params['color'];
        }

        if(!empty($params['background_color']) && $params['type'] !== 'outline') {
            $styles[] = 'background-color: '.$params['background_color'];
        }

        if(!empty($params['border_color'])) {
            $styles[] = 'border-color: '.$params['border_color'];
        }

        if(!empty($params['font_size'])) {
            $styles[] = 'font-size: '.ambient_elated_filter_px($params['font_size']).'px';
        }

        if(!empty($params['font_weight']) && $params['font_weight'] !== '') {
            $styles[] = 'font-weight: '.$params['font_weight'];
        }

        if(!empty($params['margin'])) {
            $styles[] = 'margin: '.$params['margin'];
        }

        return $styles;
    }

    /**
     *
     * Returns array of button data attr
     *
     * @param $params
     *
     * @return array
     */
    private function getButtonDataAttr($params) {
        $data = array();

        if(!empty($params['hover_color'])) {
            $data['data-hover-color'] = $params['hover_color'];
        }

        if(!empty($params['hover_background_color'])) {
            $data['data-hover-bg-color'] = $params['hover_background_color'];
        }

        if(!empty($params['hover_border_color'])) {
            $data['data-hover-border-color'] = $params['hover_border_color'];
        }

        return $data;
    }

    /**
     * Returns array of HTML classes for button
     *
     * @param $params
     *
     * @return array
     */
    private function getButtonClasses($params) {
        $buttonClasses = array(
            'eltdf-btn',
            'eltdf-btn-'.$params['size'],
            'eltdf-btn-'.$params['type']
        );

        if(!empty($params['hover_background_color'])) {
            $buttonClasses[] = 'eltdf-btn-custom-hover-bg';
        }

        if(!empty($params['hover_border_color'])) {
            $buttonClasses[] = 'eltdf-btn-custom-border-hover';
        }

        if(!empty($params['hover_color'])) {
            $buttonClasses[] = 'eltdf-btn-custom-hover-color';
        }

        if(!empty($params['icon'])) {
            $buttonClasses[] = 'eltdf-btn-icon';
        }

        if(!empty($params['custom_class'])) {
            $buttonClasses[] = esc_attr($params['custom_class']);
        }

        return $buttonClasses;
    }
}