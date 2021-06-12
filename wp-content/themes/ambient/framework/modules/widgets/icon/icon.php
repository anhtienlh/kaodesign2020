<?php
class AmbientElatedClassIconWidget extends AmbientElatedClassWidget {
    /**
     * Set basic widget options and call parent class construct
     */
    public function __construct() {
        parent::__construct(
            'eltdf_icon_widget',
            esc_html__('Elated Icon Widget', 'ambient'),
            array( 'description' => esc_html__( 'Add icons to widget areas', 'ambient'))
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array_merge(
            ambient_elated_icon_collections()->getIconWidgetParamsArray(),
            array(
                array(
                    'type'  => 'textfield',
                    'name'  => 'link',
                    'title' => esc_html__('Link', 'ambient')
                ),
                array(
                    'type'    => 'dropdown',
                    'name'    => 'target',
                    'title'   => esc_html__('Target', 'ambient'),
                    'options' => array(
                        '_self'  => esc_html__('Same Window', 'ambient'),
                        '_blank' => esc_html__('New Window', 'ambient')
                    )
                ),
                array(
                    'type'  => 'textfield',
                    'name'  => 'icon_size',
                    'title' => esc_html__('Icon Size (px)', 'ambient')
                ),
                array(
                    'type'  => 'textfield',
                    'name'  => 'icon_color',
                    'title' => esc_html__('Icon Color', 'ambient')
                ),
                array(
                    'type'  => 'textfield',
                    'name'  => 'icon_hover_color',
                    'title' => esc_html__('Icon Hover Color', 'ambient')
                ),
                array(
                    'type'        => 'textfield',
                    'name'        => 'icon_margin',
                    'title'       => esc_html__('Icon Margin', 'ambient'),
                    'description' => esc_html__('Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'ambient')
                ),
                array(
                    'type'  => 'textfield',
                    'name'  => 'icon_text',
                    'title' => esc_html__('Icon Text', 'ambient')
                ),
                array(
                    'type'  => 'textfield',
                    'name'  => 'icon_text_size',
                    'title' => esc_html__('Icon Text Size (px)', 'ambient')
                ),
                array(
                    'type'        => 'textfield',
                    'name'        => 'icon_text_margin',
                    'title'       => esc_html__('Icon Text Margin', 'ambient'),
                    'description' => esc_html__('Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'ambient')
                )
            )
        );
    }

    /**
     * Generates widget's HTML
     *
     * @param array $args args from widget area
     * @param array $instance widget's options
     */
    public function widget($args, $instance) {
        $icon_styles = array();
        $icon_only_styles = array();
        $icon_text_only_styles = array();

        if (!empty($instance['icon_size']) && $instance['icon_size'] !== '') {
            $icon_only_styles[] = 'font-size: '.ambient_elated_filter_px($instance['icon_size']).'px';
        }

        if (!empty($instance['icon_margin']) && $instance['icon_margin'] !== '') {
            $icon_only_styles[] = 'margin: '.$instance['icon_margin'];
        }

        if (!empty($instance['icon_text_size']) && $instance['icon_text_size'] !== '') {
            $icon_text_only_styles[] = 'font-size: '.ambient_elated_filter_px($instance['icon_text_size']).'px';
        }

        if (!empty($instance['icon_text_margin']) && $instance['icon_text_margin'] !== '') {
            $icon_text_only_styles[] = 'margin: '.$instance['icon_text_margin'];
        }

        $link = '#';
        if (!empty($instance['link']) && $instance['link'] !== '') {
            $link = $instance['link'];
        }

        $target = '_self';
        if (!empty($instance['target']) && $instance['target'] !== '') {
            $target = $instance['target'];
        }

        $icon_color = '';
        if (!empty($instance['icon_color']) && $instance['icon_color'] !== '') {
            $icon_only_styles[] = 'color: '.$instance['icon_color'];
            $icon_color = $instance['icon_color'];
        }

        $icon_hover_color = '';
        if (!empty($instance['icon_hover_color']) && $instance['icon_hover_color'] !== '') {
            $icon_hover_color = $instance['icon_hover_color'];
        }

        $icon_html = 'fa-facebook';
        $icon_holder_html = '';
        if (!empty($instance['icon_pack']) && $instance['icon_pack'] !== '') {
            if (!empty($instance['fa_icon']) && $instance['fa_icon'] !== '' && $instance['icon_pack'] === 'font_awesome') {
                $icon_html = $instance['fa_icon'];
                $icon_holder_html = '<i class="eltdf-icon-widget fa '.$icon_html.'"></i>';
            } else if (!empty($instance['fe_icon']) && $instance['fe_icon'] !== '' && $instance['icon_pack'] === 'font_elegant') {
                $icon_html = $instance['fe_icon'];
                $icon_holder_html = '<span class="eltdf-icon-widget '.$icon_html.'"></span>';
            } else if (!empty($instance['ion_icon']) && $instance['ion_icon'] !== '' && $instance['icon_pack'] === 'ion_icons') {
                $icon_html = $instance['ion_icon'];
                $icon_holder_html = '<span class="eltdf-icon-widget '.$icon_html.'"></span>';
            } else if (!empty($instance['linea_icon']) && $instance['linea_icon'] !== '' && $instance['icon_pack'] === 'linea_icons') {
                $icon_html = $instance['linea_icon'];
                $icon_holder_html = '<span class="eltdf-icon-widget '.$icon_html.'"></span>';
            } else if (!empty($instance['simple_line_icons']) && $instance['simple_line_icons'] !== '' && $instance['icon_pack'] === 'simple_line_icons') {
                $icon_html = $instance['simple_line_icons'];
                $icon_holder_html = '<span class="eltdf-icon-widget '.$icon_html.'"></span>';
            } else {
                $icon_holder_html = '<i class="eltdf-icon-widget fa '.$icon_html.'"></i>';
            }
        }

        $icon_holder_html = '<span class="eltdf-icon-holder" '.ambient_elated_get_inline_style($icon_only_styles).'>' . $icon_holder_html . '</span>';

        $icon_text_html = '';
        if(!empty($instance['icon_text'])) {
            $icon_text_html = '<span class="eltdf-icon-text-holder" '.ambient_elated_get_inline_style($icon_text_only_styles).'><span class="eltdf-icon-text">'.esc_html($instance['icon_text']).'</span></span>';
        }

        if ($icon_hover_color === '') $icon_hover_color = $icon_color;

        $data = array();
        $data[] = ambient_elated_get_inline_attr($icon_color, 'data-icon-color');
        $data[] = ambient_elated_get_inline_attr($icon_hover_color, 'data-icon-hover-color');
	    
        ?>

        <a class="eltdf-icon-widget-holder" <?php echo implode(' ', $data); ?> href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>" <?php echo ambient_elated_get_inline_style($icon_styles); ?>>
            <?php echo ambient_elated_get_module_part( $icon_holder_html ); ?>
            <?php echo ambient_elated_get_module_part( $icon_text_html ); ?>
        </a>
    <?php
    }
}