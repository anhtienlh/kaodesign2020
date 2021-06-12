<?php
namespace AmbientElatedNamespace\Modules\Shortcodes\IconWithText;

use AmbientElatedNamespace\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class IconWithText
 * @package AmbientElatedNamespace\Modules\Shortcodes\IconWithText
 */
class IconWithText implements ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    /**
     *
     */
    public function __construct() {
        $this->base = 'eltdf_icon_with_text';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(array(
            'name'                      => esc_html__('Elated Icon With Text', 'ambient'),
            'base'                      => $this->base,
            'icon'                      => 'icon-wpb-icon-with-text extended-custom-icon',
            'category'                  => esc_html__('by ELATED', 'ambient'),
            'allowed_container_element' => 'vc_row',
            'params'                    => array_merge(
                array(
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'type',
                        'heading'    => esc_html__('Type', 'ambient'),
                        'value'      => array(
                            esc_html__('Icon Left From Text', 'ambient') => 'icon-left',
                            esc_html__('Icon Top', 'ambient')            => 'icon-top'
                        )
                    )
                ),
                ambient_elated_icon_collections()->getVCParamsArray(),
                array(
                    array(
                        'type'       => 'attach_image',
                        'param_name' => 'custom_icon',
                        'heading'    => esc_html__('Custom Icon', 'ambient')
                    ),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'icon_type',
                        'heading'    => esc_html__('Icon Type', 'ambient'),
                        'value'      => array(
                            esc_html__('Normal', 'ambient') => 'eltdf-normal',
                            esc_html__('Circle', 'ambient') => 'eltdf-circle',
                            esc_html__('Square', 'ambient') => 'eltdf-square'
                        ),
                        'group'      => esc_html__('Icon Settings', 'ambient')
                    ),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'icon_size',
                        'heading'    => esc_html__('Icon Size', 'ambient'),
                        'value'      => array(
                            esc_html__('Medium', 'ambient')     => 'eltdf-icon-medium',
                            esc_html__('Tiny', 'ambient')       => 'eltdf-icon-tiny',
                            esc_html__('Small', 'ambient')      => 'eltdf-icon-small',
                            esc_html__('Large', 'ambient')      => 'eltdf-icon-large',
                            esc_html__('Very Large', 'ambient') => 'eltdf-icon-huge'
                        ),
                        'group'      => esc_html__('Icon Settings', 'ambient')
                    ),
                    array(
                        'type'       => 'textfield',
                        'param_name' => 'custom_icon_size',
                        'heading'    => esc_html__('Custom Icon Size (px)', 'ambient'),
                        'group'      => esc_html__('Icon Settings', 'ambient')
                    ),
                    array(
                        'type'       => 'textfield',
                        'param_name' => 'shape_size',
                        'heading'    => esc_html__('Shape Size (px)', 'ambient'),
                        'group'      => esc_html__('Icon Settings', 'ambient')
                    ),
                    array(
                        'type'       => 'colorpicker',
                        'param_name' => 'icon_color',
                        'heading'    => esc_html__('Icon Color', 'ambient'),
                        'group'      => esc_html__('Icon Settings', 'ambient')
                    ),
                    array(
                        'type'       => 'colorpicker',
                        'param_name' => 'icon_hover_color',
                        'heading'    => esc_html__('Icon Hover Color', 'ambient'),
                        'group'      => esc_html__('Icon Settings', 'ambient')
                    ),
                    array(
                        'type'       => 'colorpicker',
                        'param_name' => 'icon_background_color',
                        'heading'    => esc_html__('Icon Background Color', 'ambient'),
                        'dependency' => array(
                            'element' => 'icon_type',
                            'value'   => array('eltdf-square', 'eltdf-circle')
                        ),
                        'group'      => esc_html__('Icon Settings', 'ambient')
                    ),
                    array(
                        'type'       => 'colorpicker',
                        'param_name' => 'icon_hover_background_color',
                        'heading'    => esc_html__('Icon Hover Background Color', 'ambient'),
                        'dependency' => array(
                            'element' => 'icon_type',
                            'value'   => array('eltdf-square', 'eltdf-circle')
                        ),
                        'group'      => esc_html__('Icon Settings', 'ambient')
                    ),
                    array(
                        'type'       => 'colorpicker',
                        'param_name' => 'icon_border_color',
                        'heading'    => esc_html__('Icon Border Color', 'ambient'),
                        'dependency' => array(
                            'element' => 'icon_type',
                            'value'   => array('eltdf-square', 'eltdf-circle')
                        ),
                        'group'      => esc_html__('Icon Settings', 'ambient')
                    ),
                    array(
                        'type'       => 'colorpicker',
                        'param_name' => 'icon_border_hover_color',
                        'heading'    => esc_html__('Icon Border Hover Color', 'ambient'),
                        'dependency' => array(
                            'element' => 'icon_type',
                            'value'   => array('eltdf-square', 'eltdf-circle')
                        ),
                        'group'      => esc_html__('Icon Settings', 'ambient')
                    ),
                    array(
                        'type'       => 'textfield',
                        'param_name' => 'icon_border_width',
                        'heading'    => esc_html__('Border Width (px)', 'ambient'),
                        'dependency' => array(
                            'element' => 'icon_type',
                            'value'   => array('eltdf-square', 'eltdf-circle')
                        ),
                        'group'      => esc_html__('Icon Settings', 'ambient')
                    ),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'icon_animation',
                        'heading'    => esc_html__('Icon Animation', 'ambient'),
                        'value'      => array_flip(ambient_elated_get_yes_no_select_array(false)),
                        'group'      => esc_html__('Icon Settings', 'ambient')
                    ),
                    array(
                        'type'       => 'textfield',
                        'param_name' => 'icon_animation_delay',
                        'heading'    => esc_html__('Icon Animation Delay (ms)', 'ambient'),
                        'dependency' => array('element' => 'icon_animation', 'value' => array('yes')),
                        'group'      => esc_html__('Icon Settings', 'ambient')
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
                        'dependency'  => array('element' => 'title', 'not_empty' => true),
                        'group'       => esc_html__('Text Settings', 'ambient')
                    ),
                    array(
                        'type'       => 'colorpicker',
                        'param_name' => 'title_color',
                        'heading'    => esc_html__('Title Color', 'ambient'),
                        'dependency' => array('element' => 'title', 'not_empty' => true),
                        'group'      => esc_html__('Text Settings', 'ambient')
                    ),
                    array(
                        'type'       => 'textfield',
                        'param_name' => 'title_top_margin',
                        'heading'    => esc_html__('Title Top Margin (px)', 'ambient'),
                        'dependency' => array('element' => 'title', 'not_empty' => true),
                        'group'      => esc_html__('Text Settings', 'ambient')
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
                        'dependency' => array('element' => 'text', 'not_empty' => true),
                        'group'      => esc_html__('Text Settings', 'ambient')
                    ),
                    array(
                        'type'       => 'textfield',
                        'param_name' => 'text_top_margin',
                        'heading'    => esc_html__('Text Top Margin (px)', 'ambient'),
                        'dependency' => array('element' => 'text', 'not_empty' => true),
                        'group'      => esc_html__('Text Settings', 'ambient')
                    ),
                    array(
                        'type'        => 'textfield',
                        'param_name'  => 'link',
                        'heading'     => esc_html__('Link', 'ambient'),
                        'description' => esc_html__('Set link around icon and title', 'ambient')
                    ),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'target',
                        'heading'    => esc_html__('Target', 'ambient'),
                        'value'      => array(
                            esc_html__('Same Window', 'ambient') => '_self',
                            esc_html__('New Window', 'ambient')  => '_blank'
                        ),
                        'dependency' => array('element' => 'link', 'not_empty' => true),
                    ),
                    array(
                        'type'        => 'textfield',
                        'param_name'  => 'text_padding',
                        'heading'     => esc_html__('Text Padding (px)', 'ambient'),
                        'description' => esc_html__('Set left or top padding dependence of type for your text holder. Default value is 13 for left type and 25 for top icon with text type', 'ambient'),
                        'group'       => esc_html__('Text Settings', 'ambient')
                    )
                )
            )
        ));
    }

    /**
     * @param array $atts
     * @param null $content
     *
     * @return string
     */
    public function render($atts, $content = null) {
        $default_atts = array(
            'type'                        => 'icon-left',
            'custom_icon'                 => '',
            'icon_type'                   => 'eltdf-normal',
            'icon_size'                   => 'eltdf-icon-medium',
            'custom_icon_size'            => '',
            'shape_size'                  => '',
            'icon_color'                  => '',
            'icon_hover_color'            => '',
            'icon_background_color'       => '',
            'icon_hover_background_color' => '',
            'icon_border_color'           => '',
            'icon_border_hover_color'     => '',
            'icon_border_width'           => '',
            'icon_animation'              => 'no',
            'icon_animation_delay'        => '',
            'title'                       => '',
            'title_tag'                   => 'h4',
            'title_color'                 => '',
            'title_top_margin'            => '',
            'text'                        => '',
            'text_color'                  => '',
            'text_top_margin'             => '',
            'link'                        => '',
            'target'                      => '_self',
            'text_padding'                => ''
        );

        $default_atts = array_merge($default_atts, ambient_elated_icon_collections()->getShortcodeParams());
        $params       = shortcode_atts($default_atts, $atts);

        $params['icon_parameters'] = $this->getIconParameters($params);
        $params['holder_classes']  = $this->getHolderClasses($params);
        $params['content_styles']  = $this->getContentStyles($params);
        $params['title_styles']    = $this->getTitleStyles($params);
        $params['title_tag']       = !empty($params['title_tag']) ? $params['title_tag'] : $default_atts['title_tag'];
        $params['text_styles']     = $this->getTextStyles($params);
        $params['target']          = !empty($params['target']) ? $params['target'] : '_self';

        return ambient_elated_get_shortcode_module_template_part('templates/iwt', 'icon-with-text', '', $params);
    }

    /**
     * Returns parameters for icon shortcode as a string
     *
     * @param $params
     *
     * @return array
     */
    private function getIconParameters($params) {
        $params_array = array();

        if(empty($params['custom_icon'])) {
            $iconPackName = ambient_elated_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);

            $params_array['icon_pack']   = $params['icon_pack'];
            $params_array[$iconPackName] = $params[$iconPackName];

            if(!empty($params['icon_size'])) {
                $params_array['size'] = $params['icon_size'];
            }

            if(!empty($params['custom_icon_size'])) {
                $params_array['custom_size'] = ambient_elated_filter_px($params['custom_icon_size']).'px';
            }

            if(!empty($params['icon_type'])) {
                $params_array['type'] = $params['icon_type'];
            }

            if(!empty($params['shape_size'])) {
                $params_array['shape_size'] = ambient_elated_filter_px($params['shape_size']).'px';
            }

            if(!empty($params['icon_border_color'])) {
                $params_array['border_color'] = $params['icon_border_color'];
            }

            if(!empty($params['icon_border_hover_color'])) {
                $params_array['hover_border_color'] = $params['icon_border_hover_color'];
            }

            if($params['icon_border_width'] !== '') {
                $params_array['border_width'] = ambient_elated_filter_px($params['icon_border_width']).'px';
            }

            if(!empty($params['icon_background_color'])) {
                $params_array['background_color'] = $params['icon_background_color'];
            }

            if(!empty($params['icon_hover_background_color'])) {
                $params_array['hover_background_color'] = $params['icon_hover_background_color'];
            }

            $params_array['icon_color'] = $params['icon_color'];

            if(!empty($params['icon_hover_color'])) {
                $params_array['hover_icon_color'] = $params['icon_hover_color'];
            }

            $params_array['icon_animation']       = $params['icon_animation'];
            $params_array['icon_animation_delay'] = $params['icon_animation_delay'];
        }

        return $params_array;
    }

    /**
     * Returns array of holder classes
     *
     * @param $params
     *
     * @return array
     */
    private function getHolderClasses($params) {
        $classes = array('eltdf-iwt', 'clearfix');

        if(!empty($params['type'])) {
            $classes[] = 'eltdf-iwt-'.$params['type'];
        }

        if(!empty($params['icon_size'])) {
            $classes[] = 'eltdf-iwt-'.str_replace('eltdf-', '', $params['icon_size']);
        }

        return $classes;
    }

    /**
     * Returns inline content styles
     *
     * @param $params
     *
     * @return string
     */
    private function getContentStyles($params) {
        $styles = array();

        if(!empty($params['text_padding']) && $params['type'] === 'icon-left') {
            $styles[] = 'padding-left: '.ambient_elated_filter_px($params['text_padding']).'px';
        }

        if(!empty($params['text_padding']) && $params['type'] === 'icon-top') {
            $styles[] = 'padding-top: '.ambient_elated_filter_px($params['text_padding']).'px';
        }

        return implode(';', $styles);
    }

    /**
     * Returns inline title styles
     *
     * @param $params
     *
     * @return string
     */
    private function getTitleStyles($params) {
        $styles = array();

        if(!empty($params['title_color'])) {
            $styles[] = 'color: '.$params['title_color'];
        }

        if(!empty($params['title_top_margin'])) {
            $styles[] = 'margin-top: '.ambient_elated_filter_px($params['title_top_margin']).'px';
        }

        return implode(';', $styles);
    }

    /**
     * Returns inline text styles
     *
     * @param $params
     *
     * @return string
     */
    private function getTextStyles($params) {
        $styles = array();

        if(!empty($params['text_color'])) {
            $styles[] = 'color: '.$params['text_color'];
        }

        if(!empty($params['text_top_margin'])) {
            $styles[] = 'margin-top: '.ambient_elated_filter_px($params['text_top_margin']).'px';
        }

        return implode(';', $styles);
    }
}