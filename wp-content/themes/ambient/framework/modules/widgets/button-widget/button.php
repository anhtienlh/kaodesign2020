<?php
class AmbientElatedClassButtonWidget extends AmbientElatedClassWidget {
	/**
	 * Set basic widget options and call parent class construct
	 */
	public function __construct() {
		parent::__construct(
			'eltdf_button_widget',
			esc_html__('Elated Button Widget', 'ambient'),
			array( 'description' => esc_html__( 'Add buttons to widget areas', 'ambient'))
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
					'solid' => esc_html__('Solid', 'ambient'),
					'outline' => esc_html__('Outline', 'ambient'),
					'simple' => esc_html__('Simple', 'ambient')
				)
			),
			array(
				'type' => 'dropdown',
				'name' => 'size',
				'title' => esc_html__('Size', 'ambient'),
				'options' => array(
					'small' => esc_html__('Small', 'ambient'),
					'medium' => esc_html__('Medium', 'ambient'),
					'large' => esc_html__('Large', 'ambient'),
					'huge' => esc_html__('Huge', 'ambient')
				),
				'description' => esc_html__('This option is only available for solid and outline button type', 'ambient')
			),
			array(
				'type' => 'textfield',
				'name' => 'text',
				'title' => esc_html__('Text', 'ambient'),
				'default' => esc_html__('Button Text', 'ambient')
			),
			array(
				'type' => 'textfield',
				'name'  => 'link',
				'title' => esc_html__('Link', 'ambient')
			),
			array(
				'type' => 'dropdown',
				'name' => 'target',
				'title' => esc_html__('Link Target', 'ambient'),
				'options' => array(
					'_self' => esc_html__('Same Window', 'ambient'),
					'_blank' => esc_html__('New Window', 'ambient')
				)
			),
			array(
				'type' => 'textfield',
				'name' => 'color',
				'title' => esc_html__('Color', 'ambient')
			),
			array(
				'type' => 'textfield',
				'name' => 'hover_color',
				'title' => esc_html__('Hover Color', 'ambient')
			),
			array(
				'type' => 'textfield',
				'name' => 'background_color',
				'title' => esc_html__('Background Color', 'ambient'),
				'description' => esc_html__('This option is only available for solid button type', 'ambient')
			),
			array(
				'type' => 'textfield',
				'name' => 'hover_background_color',
				'title' => esc_html__('Hover Background Color', 'ambient'),
				'description' => esc_html__('This option is only available for solid button type', 'ambient')
			),
			array(
				'type' => 'textfield',
				'name' => 'border_color',
				'title' => esc_html__('Border Color', 'ambient'),
				'description' => esc_html__('This option is only available for solid and outline button type', 'ambient')
			),
			array(
				'type' => 'textfield',
				'name' => 'hover_border_color',
				'title' => esc_html__('Hover Border Color', 'ambient'),
				'description' => esc_html__('This option is only available for solid and outline button type', 'ambient')
			),
			array(
				'type' => 'textfield',
				'name' => 'margin',
				'title' => esc_html__('Margin', 'ambient'),
				'description' => esc_html__('Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'ambient')
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
		//prepare variables
		$params = '';

		if (!is_array($instance)) { $instance = array(); }

		// Filter out all empty params
		$instance = array_filter($instance, function($array_value) { return trim($array_value) != ''; });

		// Default values
		if (!isset($instance['text'])) { $instance['text'] = 'Button Text'; }

		// Generate shortcode params
		foreach($instance as $key => $value) {
			$params .= " $key='$value' ";
		}

		echo '<div class="widget eltdf-button-widget">';

			//finally call the shortcode
			echo do_shortcode("[eltdf_button $params]"); // XSS OK

		echo '</div>';
	}
}