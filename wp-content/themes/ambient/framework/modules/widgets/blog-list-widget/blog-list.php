<?php
class AmbientElatedClassBlogListWidget extends AmbientElatedClassWidget {
    /**
     * Set basic widget options and call parent class construct
     */
    public function __construct() {
        parent::__construct(
            'eltdf_blog_list_widget',
            esc_html__('Elated Blog List Widget', 'ambient'),
            array( 'description' => esc_html__( 'Display a list of your blog posts', 'ambient'))
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array(
            array(
                'type'  => 'textfield',
                'name'  => 'widget_title',
                'title' => esc_html__('Widget Title', 'ambient')
            ),
            array(
                'type'    => 'dropdown',
                'name'    => 'type',
                'title'   => esc_html__('Type', 'ambient'),
                'options' => array(
                    'simple' => esc_html__('Simple', 'ambient'),
                    'classic' => esc_html__('Classic (text only)', 'ambient')
                )
            ),
            array(
                'type'  => 'textfield',
                'name'  => 'number_of_posts',
                'title' => esc_html__('Number of Posts', 'ambient')
            ),
            array(
                'type'    => 'dropdown',
                'name'    => 'space_between_columns',
                'title'   => esc_html__('Space Between items', 'ambient'),
                'options' => array(
                    'normal' => esc_html__('Normal', 'ambient'),
                    'small' => esc_html__('Small', 'ambient'),
                    'tiny' => esc_html__('Tiny', 'ambient'),
                    'no' => esc_html__('No Space', 'ambient')
                )
            ),
            array(
                'type'    => 'dropdown',
                'name'    => 'order_by',
                'title'   => esc_html__('Order By', 'ambient'),
                'options' => array(
                    'title' => esc_html__('Title', 'ambient'),
                    'date' => esc_html__('Date', 'ambient'),
                    'rand' => esc_html__('Random', 'ambient'),
                    'name' => esc_html__('Post Name', 'ambient')
                )
            ),
            array(
                'type'    => 'dropdown',
                'name'    => 'order',
                'title'   => esc_html__('Order', 'ambient'),
                'options' => array(
                    'ASC' => esc_html__('ASC', 'ambient'),
                    'DESC' => esc_html__('DESC', 'ambient')
                )
            ),
            array(
                'type'        => 'textfield',
                'name'        => 'category',
                'title'       => esc_html__('Category Slug', 'ambient'),
                'description' => esc_html__('Leave empty for all or use comma for list', 'ambient')
            ),
            array(
                'type'    => 'dropdown',
                'name'    => 'title_tag',
                'title'   => esc_html__('Title Tag', 'ambient'),
                'options' => ambient_elated_get_title_tag(true)
            ),
            array(
                'type'    => 'dropdown',
                'name'    => 'title_transform',
                'title'   => esc_html__('Title Text Transform', 'ambient'),
                'options' => ambient_elated_get_text_transform_array(true)
            ),
        );
    }

    /**
     * Generates widget's HTML
     *
     * @param array $args args from widget area
     * @param array $instance widget's options
     */
    public function widget($args, $instance) {
        $params = '';

        if (!is_array($instance)) { $instance = array(); }

        $instance['post_info_section'] = 'yes';
        $instance['number_of_columns'] = '1';

        // Filter out all empty params
        $instance = array_filter($instance, function($array_value) { return trim($array_value) != ''; });

        //generate shortcode params
        foreach($instance as $key => $value) {
            $params .= " $key='$value' ";
        }

        $available_types = array('simple', 'classic');

        if (!in_array($instance['type'], $available_types)) {
            $instance['type'] = 'simple';
        }

        echo '<div class="widget eltdf-blog-list-widget">';

            if(!empty($instance['widget_title'])) {
				echo ambient_elated_get_module_part( $args['before_title'].$instance['widget_title'].$args['after_title'] );
            }

            //finally call the shortcode
            echo do_shortcode("[eltdf_blog_list $params]"); // XSS OK

        echo '</div>';
    }
}