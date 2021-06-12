<?php
namespace AmbientElatedNamespace\Modules\Shortcodes\ElementsHolderItem;

use AmbientElatedNamespace\Modules\Shortcodes\Lib\ShortcodeInterface;

class ElementsHolderItem implements ShortcodeInterface {
    private $base;

    function __construct() {
        $this->base = 'eltdf_elements_holder_item';
        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        if(function_exists('vc_map')) {
            vc_map(
                array(
                    'name'                    => esc_html__('Elements Holder Item', 'ambient'),
                    'base'                    => $this->base,
                    'as_child'                => array('only' => 'eltdf_elements_holder'),
                    'as_parent'               => array('except' => 'vc_row, vc_accordion, no_cover_boxes, no_portfolio_list, no_portfolio_slider'),
                    'content_element'         => true,
                    'category'                => 'by ELATED',
                    'icon'                    => 'icon-wpb-elements-holder-item extended-custom-icon',
                    'show_settings_on_create' => true,
                    'js_view'                 => 'VcColumnView',
                    'params'                  => array(
                        array(
                            'type'        => 'dropdown',
                            'class'       => '',
                            'heading'     => esc_html__('Width', 'ambient'),
                            'param_name'  => 'item_width',
                            'value'       => array(
                                '1/1' => '1-1',
                                '1/2' => '1-2',
                                '1/3' => '1-3',
                                '2/3' => '2-3',
                                '1/4' => '1-4',
                                '3/4' => '3-4',
                                '1/5' => '1-5',
                                '2/5' => '2-5',
                                '3/5' => '3-5',
                                '4/5' => '4-5',
                                '1/6' => '1-6',
                                '5/6' => '5-6',
                            ),
                            'save_always' => true
                        ),
                        array(
                            'type'       => 'colorpicker',
                            'class'      => '',
                            'heading'    => esc_html__('Background Color', 'ambient'),
                            'param_name' => 'background_color',
                            'value'      => ''
                        ),
                        array(
                            'type'       => 'attach_image',
                            'class'      => '',
                            'heading'    => esc_html__('Background Image', 'ambient'),
                            'param_name' => 'background_image',
                            'value'      => ''
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Zoom Effect','ambient'),
                            'param_name' => 'zoom_effect',
                            'value' => array(
                                esc_html__('No', 'ambient')    => 'no',
                                esc_html__('Yes', 'ambient')   => 'yes'
                            ),
                            'dependency' => array('element' => 'background_image', 'not_empty' => true)
                        ),
                        array(
                            'type'        => 'textfield',
                            'class'       => '',
                            'heading'     => esc_html__('Inner Padding', 'ambient'),
                            'param_name'  => 'item_padding',
                            'value'       => '',
                            'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px', 'ambient')
                        ),
                        array(
                            'type'        => 'textfield',
                            'class'       => '',
                            'heading'     => esc_html__('Inner Margin', 'ambient'),
                            'param_name'  => 'item_margin',
                            'value'       => '',
                            'description' => esc_html__('Please insert margin in format 0px 10px 0px 10px', 'ambient')
                        ),
                        array(
                            'type'       => 'dropdown',
                            'class'      => '',
                            'heading'    => esc_html__('Inner Border', 'ambient'),
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
                            'type'       => 'textfield',
                            'class'      => '',
                            'heading'    => esc_html__('Border radius', 'ambient'),
                            'param_name' => 'border_radius',
                            'value'      => ''
                        ),
                        array(
                            'type'        => 'dropdown',
                            'class'       => '',
                            'heading'     => esc_html__('Horizontal Alignment', 'ambient'),
                            'param_name'  => 'horizontal_aligment',
                            'value'       => array(
                                esc_html__('Left', 'ambient')   => 'left',
                                esc_html__('Right', 'ambient')  => 'right',
                                esc_html__('Center', 'ambient') => 'center'
                            ),
                            'save_always' => true
                        ),
                        array(
                            'type'        => 'dropdown',
                            'class'       => '',
                            'heading'     => esc_html__('Vertical Alignment', 'ambient'),
                            'param_name'  => 'vertical_alignment',
                            'value'       => array(
                                esc_html__('Middle', 'ambient') => 'middle',
                                esc_html__('Top', 'ambient')    => 'top',
                                esc_html__('Bottom', 'ambient') => 'bottom'
                            ),
                            'save_always' => true
                        ),
                        array(
                            'type'        => 'textfield',
                            'heading'     => esc_html__('Link', 'ambient'),
                            'param_name'  => 'link',
                            'group' => esc_html__('Link', 'ambient'),
                            'admin_label' => true
                        ),
                        array(
                            'type'        => 'dropdown',
                            'heading'     => esc_html__('Link Target', 'ambient'),
                            'param_name'  => 'target',
                            'group' => esc_html__('Link', 'ambient'),
                            'value'       => array(
                                esc_html__('Self', 'ambient')  => '_self',
                                esc_html__('Blank', 'ambient') => '_blank'
                            ),
                            'save_always' => true,
                            'admin_label' => true
                        ),
                        array(
                            'type'       => 'dropdown',
                            'class'      => '',
                            'heading'    => esc_html__('Animation Name', 'ambient'),
                            'param_name' => 'animation_name',
                            'value'      => array(
                                esc_html__('No Animation', 'ambient')          => '',
                                esc_html__('Flip In', 'ambient')               => 'flip-in',
                                esc_html__('Grow In', 'ambient')               => 'grow-in',
                                esc_html__('X Rotate', 'ambient')              => 'x-rotate',
                                esc_html__('Z Rotate', 'ambient')              => 'z-rotate',
                                esc_html__('Y Translate', 'ambient')           => 'y-translate',
                                esc_html__('Fade In', 'ambient')               => 'fade-in',
                                esc_html__('Fade In Down', 'ambient')          => 'fade-in-down',
                                esc_html__('Fade In Left X Rotate', 'ambient') => 'fade-in-left-x-rotate'
                            )
                        ),
                        array(
                            'type'       => 'textfield',
                            'class'      => '',
                            'heading'    => esc_html__('Animation Delay (ms)', 'ambient'),
                            'param_name' => 'animation_delay',
                            'value'      => '',
                            'dependency' => array(
                                'element'   => 'animation_name',
                                'not_empty' => true
                            )
                        ),
                        array(
                            'type'        => 'textfield',
                            'class'       => '',
                            'group'       => esc_html__('Width & Responsiveness', 'ambient'),
                            'heading'     => esc_html__('Padding on screen size between 1280px-1440px', 'ambient'),
                            'param_name'  => 'item_padding_1280_1440',
                            'value'       => '',
                            'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px', 'ambient')
                        ),
                        array(
                            'type'        => 'textfield',
                            'class'       => '',
                            'group'       => esc_html__('Width & Responsiveness', 'ambient'),
                            'heading'     => esc_html__('Padding on screen size between 1024px-1280px', 'ambient'),
                            'param_name'  => 'item_padding_1024_1280',
                            'value'       => '',
                            'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px', 'ambient')
                        ),
                        array(
                            'type'        => 'textfield',
                            'class'       => '',
                            'group'       => esc_html__('Width & Responsiveness', 'ambient'),
                            'heading'     => esc_html__('Padding on screen size between 768px-1024px', 'ambient'),
                            'param_name'  => 'item_padding_768_1024',
                            'value'       => '',
                            'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px', 'ambient')
                        ),
                        array(
                            'type'        => 'textfield',
                            'class'       => '',
                            'group'       => esc_html__('Width & Responsiveness', 'ambient'),
                            'heading'     => esc_html__('Padding on screen size between 600px-768px', 'ambient'),
                            'param_name'  => 'item_padding_600_768',
                            'value'       => '',
                            'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px', 'ambient')
                        ),
                        array(
                            'type'        => 'textfield',
                            'class'       => '',
                            'group'       => esc_html__('Width & Responsiveness', 'ambient'),
                            'heading'     => esc_html__('Padding on screen size between 480px-600px', 'ambient'),
                            'param_name'  => 'item_padding_480_600',
                            'value'       => '',
                            'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px', 'ambient')
                        ),
                        array(
                            'type'        => 'textfield',
                            'class'       => '',
                            'group'       => esc_html__('Width & Responsiveness', 'ambient'),
                            'heading'     => esc_html__('Padding on Screen Size Bellow 480px', 'ambient'),
                            'param_name'  => 'item_padding_480',
                            'value'       => '',
                            'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px', 'ambient')
                        )
                    )
                )
            );
        }
    }

    public function render($atts, $content = null) {
        $args = array(
            'item_width'             => '1-1',
            'background_color'       => '',
            'zoom_effect'            => '',
            'background_image'       => '',
            'item_margin'            => '',
            'item_padding'           => '',
            'border'                 => '',
            'border_width'           => '',
            'border_style'           => '',
            'border_color'           => '',
            'border_radius'          => '',
            'box_shadow'             => '',
            'horizontal_aligment'    => 'left',
            'vertical_alignment'     => '',
            'animation_name'         => '',
            'animation_delay'        => '',
            'link'                   => '',
            'target'                 => '_self',
            'item_padding_1280_1440' => '',
            'item_padding_1024_1280' => '',
            'item_padding_768_1024'  => '',
            'item_padding_600_768'   => '',
            'item_padding_480_600'   => '',
            'item_padding_480'       => ''
        );

        $params = shortcode_atts($args, $atts);
        extract($params);
        $params['content'] = $content;

        $rand_class = 'eltdf-elements-holder-custom-'.mt_rand(100000, 1000000);

        $params['elements_holder_item_style']         = $this->getElementsHolderItemStyle($params);
        $params['background_image_div_styles']        = $this->getBackgroundImageDivStyles($params);
        $params['elements_holder_item_content_style'] = $this->getElementsHolderItemContentStyle($params);
        $params['elements_holder_item_class']         = $this->getElementsHolderItemClass($params);
        $params['elements_holder_item_content_class'] = $rand_class;
        $params['elements_holder_item_data']          = $this->getData($params);

        $html = ambient_elated_get_shortcode_module_template_part('templates/elements-holder-item-template', 'elements-holder', '', $params);

        return $html;
    }


    /**
     * Return Elements Holder Item style
     *
     * @param $params
     *
     * @return array
     */
    private function getElementsHolderItemStyle($params) {

        $element_holder_item_style = array();

        if($params['animation_delay'] !== '') {
            $element_holder_item_style[] = 'transition-delay:'.$params['animation_delay'].'ms;'.'-webkit-transition-delay:'.$params['animation_delay'].'ms';
        }

        if($params['background_image'] !== '' && $params['zoom_effect'] !== 'yes') {
            $element_holder_item_style[] = 'background-image: url('.wp_get_attachment_url($params['background_image']).')';
        }

        if($params['background_color'] !== '') {
            $element_holder_item_style[] = 'background-color: '.$params['background_color'];
        }

        return $element_holder_item_style;

    }

    /**
     * Return Background Image Div Styles
     *
     * @param $params
     * @return array
     */
    private function getBackgroundImageDivStyles($params) {

        $background_image_div_styles = array();

        if ($params['background_image'] !== '' && $params['zoom_effect'] == 'yes') {
            $background_image_div_styles[] = 'background-image: url('. wp_get_attachment_url($params['background_image']).')';
        }

        return implode(';', $background_image_div_styles);
    }

    /**
     * Return Elements Holder Item Content style
     *
     * @param $params
     *
     * @return array
     */
    private function getElementsHolderItemContentStyle($params) {

        $element_holder_item_content_style = array();

        if($params['border_radius'] !== '') {
            $element_holder_item_content_style[] = 'border-radius: '.ambient_elated_filter_px($params['border_radius']).'px';
        }

        if($params['item_padding'] !== '') {
            $element_holder_item_content_style[] = 'padding: '.$params['item_padding'];
        }

        if($params['item_margin'] !== '') {
            $element_holder_item_content_style[] = 'margin: '.$params['item_margin'];
        }

        if($params['border_width'] !== '') {
            $element_holder_item_content_style[] = 'border-width: '.ambient_elated_filter_px($params['border_width']).'px';
        }

        if($params['border_style'] !== '') {
            $element_holder_item_content_style[] = 'border-style: '.$params['border_style'];
        }

        if($params['border_color'] !== '') {
            $element_holder_item_content_style[] = 'border-color: '.$params['border_color'];
        }

        return $element_holder_item_content_style;
    }

    /**
     * Return Elements Holder Item classes
     *
     * @param $params
     *
     * @return array
     */
    private function getElementsHolderItemClass($params) {

        $element_holder_item_class = array('eltdf-elements-holder-item');

        if($params['item_width'] !== '') {
            $element_holder_item_class[] = 'eltdf-width-'.$params['item_width'];
        }

        if($params['vertical_alignment'] !== '') {
            $element_holder_item_class[] = 'eltdf-vertical-alignment-'.$params['vertical_alignment'];
        }

        if($params['horizontal_aligment'] !== '') {
            $element_holder_item_class[] = 'eltdf-horizontal-alignment-'.$params['horizontal_aligment'];
        }

        if($params['animation_name'] !== '') {
            $element_holder_item_class[] = 'eltdf-'.$params['animation_name'];
        }

        if ($params['zoom_effect'] == 'yes') {
            $element_holder_item_class[] = 'eltdf-elements-holder-with-zoom';
        }

        if($params['border'] == 'yes') {
            $element_holder_item_class[] = 'eltdf-border';
        }

        if($params['box_shadow'] == 'yes') {
            $element_holder_item_class[] = 'eltdf-shadow';
        }

        return $element_holder_item_class;
    }

    private function getData($params) {
        $data = array();

        if($params['animation_name'] !== '') {
            $data['data-animation'] = 'eltdf-'.$params['animation_name'];
        }

        $data['data-item-class'] = $params['elements_holder_item_content_class'];

        if($params['item_padding_1280_1440'] !== '') {
            $data['data-1280-1440'] = $params['item_padding_1280_1440'];
        }

        if($params['item_padding_1024_1280'] !== '') {
            $data['data-1024-1280'] = $params['item_padding_1024_1280'];
        }

        if($params['item_padding_768_1024'] !== '') {
            $data['data-768-1024'] = $params['item_padding_768_1024'];
        }

        if($params['item_padding_600_768'] !== '') {
            $data['data-600-768'] = $params['item_padding_600_768'];
        }

        if($params['item_padding_480_600'] !== '') {
            $data['data-480-600'] = $params['item_padding_480_600'];
        }

        if($params['item_padding_480'] !== '') {
            $data['data-480'] = $params['item_padding_480'];
        }

        return $data;
    }
}
