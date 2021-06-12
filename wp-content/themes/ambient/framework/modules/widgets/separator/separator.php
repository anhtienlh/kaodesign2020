<?php
class AmbientElatedClassSeparatorWidget extends AmbientElatedClassWidget {
    /**
     * Set basic widget options and call parent class construct
     */
    public function __construct() {
        parent::__construct(
            'eltdf_separator_widget',
	        esc_html__('Elated Separator Widget', 'ambient'),
	        array( 'description' => esc_html__( 'Add a separator element to your widget areas', 'ambient'))
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array(
            array(
                'type' => 'dropdown',
                'name' => 'type',
                'title' => esc_html__('Type', 'ambient'),
                'options' => array(
                    'normal' => esc_html__('Normal', 'ambient'),
                    'full-width' => esc_html__('Full Width', 'ambient')
                )
            ),
            array(
                'type' => 'dropdown',
                'name' => 'position',
                'title' => esc_html__('Position', 'ambient'),
                'options' => array(
                    'center' => esc_html__('Center', 'ambient'),
                    'left' => esc_html__('Left', 'ambient'),
                    'right' => esc_html__('Right', 'ambient')
                )
            ),
            array(
                'type' => 'dropdown',
                'name' => 'border_style',
                'title' => esc_html__('Style', 'ambient'),
                'options' => array(
                    'solid' => esc_html__('Solid', 'ambient'),
                    'dashed' => esc_html__('Dashed', 'ambient'),
                    'dotted' => esc_html__('Dotted', 'ambient')
                )
            ),
            array(
                'type' => 'textfield',
                'name' => 'color',
                'title' => esc_html__('Color', 'ambient')
            ),
            array(
                'type' => 'textfield',
                'name' => 'width',
                'title' => esc_html__('Width', 'ambient')
            ),
            array(
                'type' => 'textfield',
                'name' => 'thickness',
                'title' => esc_html__('Thickness (px)', 'ambient')
            ),
            array(
                'type' => 'textfield',
                'name' => 'top_margin',
                'title' => esc_html__('Top Margin', 'ambient')
            ),
            array(
                'type' => 'textfield',
                'name' => 'bottom_margin',
                'title' => esc_html__('Bottom Margin', 'ambient')
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
        extract($args);

        //prepare variables
        $params = '';

        //is instance empty?
        if(is_array($instance) && count($instance)) {
            //generate shortcode params
            foreach($instance as $key => $value) {
                $params .= " $key='$value' ";
            }
        }

        echo '<div class="widget eltdf-separator-widget">';
	    
        echo do_shortcode("[eltdf_separator $params]"); // XSS OK

        echo '</div>';
    }
}