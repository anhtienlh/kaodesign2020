<?php
namespace AmbientElatedNamespace\Modules\Shortcodes\ElementsHolder;

use AmbientElatedNamespace\Modules\Shortcodes\Lib\ShortcodeInterface;

class ElementsHolder implements ShortcodeInterface {
    private $base;

    function __construct() {
        $this->base = 'eltdf_elements_holder';
        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(array(
            'name'      => esc_html__('Elements Holder', 'ambient'),
            'base'      => $this->base,
            'icon'      => 'icon-wpb-elements-holder extended-custom-icon',
            'category'  => 'by ELATED',
            'as_parent' => array('only' => 'eltdf_elements_holder_item, eltdf_info_box'),
            'js_view'   => 'VcColumnView',
            'params'    => array(
                array(
                    'type'       => 'colorpicker',
                    'class'      => '',
                    'heading'    => esc_html__('Background Color', 'ambient'),
                    'param_name' => 'background_color',
                    'value'      => ''
                ),
                array(
                    'type'        => 'dropdown',
                    'class'       => '',
                    'heading'     => esc_html__('Equal height', 'ambient'),
                    'param_name'  => 'items_float_left',
                    'value'       => array(
                        esc_html__('Yes', 'ambient') => 'yes',
                        esc_html__('No', 'ambient')  => 'no'
                    ),
                    'save_always' => true
                ),
                array(
                    'type'       => 'dropdown',
                    'class'      => '',
                    'heading'    => esc_html__('Border', 'ambient'),
                    'param_name' => 'border',
                    'value'      => array(
                        esc_html__('No', 'ambient')  => 'no',
                        esc_html__('Yes', 'ambient') => 'yes'
                    )
                ),
                array(
                    'type'        => 'textfield',
                    'class'       => '',
                    'heading'     => esc_html__('Border Width', 'ambient'),
                    'param_name'  => 'border_width',
                    'value'       => '',
                    'dependency'  => array(
                        'element' => 'border',
                        'value'   => array('yes')
                    ),
                    'description' => esc_html__('Please insert border width in px. For example: 1 ', 'ambient')
                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => esc_html__('Border Style', 'ambient'),
                    'param_name'  => 'border_style',
                    'value'       => array(
                        esc_html__('Solid', 'ambient')  => 'solid',
                        esc_html__('Dashed', 'ambient') => 'dashed',
                        esc_html__('Dotted', 'ambient') => 'dotted'
                    ),
                    'dependency'  => array(
                        'element' => 'border',
                        'value'   => array('yes')
                    ),
                    'save_always' => true
                ),
                array(
                    'type'       => 'colorpicker',
                    'class'      => '',
                    'heading'    => esc_html__('Border Color', 'ambient'),
                    'param_name' => 'border_color',
                    'value'      => '',
                    'dependency' => array(
                        'element' => 'border',
                        'value'   => array('yes')
                    )
                ),
                array(
                    'type'       => 'dropdown',
                    'class'      => '',
                    'heading'    => esc_html__('Box Shadow', 'ambient'),
                    'param_name' => 'box_shadow',
                    'value'      => array(
                        esc_html__('No', 'ambient')  => 'no',
                        esc_html__('Yes', 'ambient') => 'yes'
                    )
                ),
                array(
                    'type'        => 'dropdown',
                    'class'       => '',
                    'group'       => esc_html__('Width & Responsiveness', 'ambient'),
                    'heading'     => esc_html__('Switch to One Column', 'ambient'),
                    'param_name'  => 'switch_to_one_column',
                    'value'       => array(
                        esc_html__('Default', 'ambient')      => '',
                        esc_html__('Below 1440px', 'ambient') => '1440',
                        esc_html__('Below 1280px', 'ambient') => '1280',
                        esc_html__('Below 1024px', 'ambient') => '1024',
                        esc_html__('Below 768px', 'ambient')  => '768',
                        esc_html__('Below 600px', 'ambient')  => '600',
                        esc_html__('Below 480px', 'ambient')  => '480',
                        esc_html__('Never', 'ambient')        => 'never'
                    ),
                    'description' => esc_html__('Choose on which stage item will be in one column', 'ambient')
                ),
                array(
                    'type'        => 'dropdown',
                    'class'       => '',
                    'group'       => esc_html__('Width & Responsiveness', 'ambient'),
                    'heading'     => esc_html__('Choose Alignment In Responsive Mode', 'ambient'),
                    'param_name'  => 'alignment_one_column',
                    'value'       => array(
                        esc_html__('Default', 'ambient') => '',
                        esc_html__('Left', 'ambient')    => 'left',
                        esc_html__('Center', 'ambient')  => 'center',
                        esc_html__('Right', 'ambient')   => 'right'
                    ),
                    'description' => esc_html__('Alignment When Items are in One Column', 'ambient')
                )
            )
        ));
    }

    public function render($atts, $content = null) {

        $args = array(
            'switch_to_one_column' => '',
            'alignment_one_column' => '',
            'items_float_left'     => '',
            'background_color'     => '',
            'border'               => '',
            'border_width'         => '',
            'border_style'         => '',
            'border_color'         => '',
            'box_shadow'           => ''
        );

        $params = shortcode_atts($args, $atts);
        extract($params);

        $html = '';

        $elements_holder_classes   = array();
        $elements_holder_classes[] = 'eltdf-elements-holder';


        //Elements holder classes
        if($switch_to_one_column != '') {
            $elements_holder_classes[] = 'eltdf-responsive-mode-'.$switch_to_one_column;
        } else {
            $elements_holder_classes[] = 'eltdf-responsive-mode-768';
        }

        if($alignment_one_column != '') {
            $elements_holder_classes[] = 'eltdf-one-column-alignment-'.$alignment_one_column;
        }

        if($items_float_left == 'no') {
            $elements_holder_classes[] = 'eltdf-elements-items-float';
        }

        if($border == 'yes') {
            $elements_holder_classes[] = 'eltdf-border';
        }

        if($box_shadow == 'yes') {
            $elements_holder_classes[] = 'eltdf-shadow';
        }


        //Elements holder styles
        $elements_holder_style = array();

        if($background_color != '') {
            $elements_holder_style[] = 'background-color:'.$background_color.';';
        }

        if($params['border_width'] !== '') {
            $elements_holder_style[] = 'border-width: '.ambient_elated_filter_px($params['border_width']).'px';
        }

        if($params['border_style'] !== '') {
            $elements_holder_style[] = 'border-style: '.$params['border_style'];
        }

        if($params['border_color'] !== '') {
            $elements_holder_style[] = 'border-color: '.$params['border_color'];
        }

        $elements_holder_class = implode(' ', $elements_holder_classes);

        $html .= '<div '.ambient_elated_get_class_attribute($elements_holder_class).' '.ambient_elated_get_inline_style($elements_holder_style, 'style').'>';
        $html .= do_shortcode($content);
        $html .= '</div>';

        return $html;

    }

}
