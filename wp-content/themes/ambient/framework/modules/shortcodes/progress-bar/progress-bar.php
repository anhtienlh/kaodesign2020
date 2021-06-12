<?php
namespace AmbientElatedNamespace\Modules\Shortcodes\ProgressBar;

use AmbientElatedNamespace\Modules\Shortcodes\Lib\ShortcodeInterface;

class ProgressBar implements ShortcodeInterface {
    private $base;

    function __construct() {
        $this->base = 'eltdf_progress_bar';
        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(array(
            'name'                      => esc_html__('Elated Progress Bar', 'ambient'),
            'base'                      => $this->base,
            'icon'                      => 'icon-wpb-progress-bar extended-custom-icon',
            'category'                  => esc_html__('by ELATED', 'ambient'),
            'allowed_container_element' => 'vc_row',
            'params'                    => array(
                array(
                    'type'       => 'textfield',
                    'param_name' => 'percent',
                    'heading'    => esc_html__('Percentage', 'ambient')
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
                    'value'       => array_flip(ambient_elated_get_title_tag(true, array(
                        'p'    => 'p',
                        'span' => 'span'
                    ))),
                    'save_always' => true,
                    'dependency'  => array('element' => 'title', 'not_empty' => true)
                ),
                array(
                    'type'       => 'colorpicker',
                    'param_name' => 'text_color',
                    'heading'    => esc_html__('Text Color', 'ambient')
                ),
                array(
                    'type'       => 'colorpicker',
                    'param_name' => 'color_active',
                    'heading'    => esc_html__('Active Color', 'ambient')
                ),
                array(
                    'type'       => 'colorpicker',
                    'param_name' => 'color_inactive',
                    'heading'    => esc_html__('Inactive Color', 'ambient')
                )
            )
        ));
    }

    public function render($atts, $content = null) {
        $args   = array(
            'percent'        => '100',
            'title'          => '',
            'title_tag'      => 'h6',
            'text_color'     => '',
            'color_active'   => '',
            'color_inactive' => ''
        );
        $params = shortcode_atts($args, $atts);

        //Extract params for use in method
        extract($params);

        $params['active_bar_style']   = $this->getActiveColor($params);
        $params['text_color_style']   = $this->getTextColor($params);
        $params['inactive_bar_style'] = $this->getInactiveColor($params);
        $params['title_tag']          = !empty($title_tag) ? $title_tag : $args['title_tag'];

        //init variables
        $html = ambient_elated_get_shortcode_module_template_part('templates/progress-bar-template', 'progress-bar', '', $params);

        return $html;
    }

    /**
     * Return active color for active bar
     *
     * @param $params
     *
     * @return array
     */
    private function getActiveColor($params) {
        $styles = array();

        if(!empty($params['color_active'])) {
            $styles[] = 'background-color: '.$params['color_active'];
        }

        return $styles;
    }

    private function getTextColor($params) {
        $styles = array();

        if(!empty($params['text_color'])) {
            $styles[] = 'color: '.$params['text_color'];
        }

        return $styles;
    }

    /**
     * Return active color for inactive bar
     *
     * @param $params
     *
     * @return array
     */
    private function getInactiveColor($params) {
        $styles = array();

        if(!empty($params['color_inactive'])) {
            $styles[] = 'background-color: '.$params['color_inactive'];
        }

        return $styles;
    }
}