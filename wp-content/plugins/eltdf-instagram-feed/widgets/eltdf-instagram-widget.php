<?php
if(!defined('ABSPATH')) exit;

class ElatedfInstagramWidget extends WP_Widget {

	protected $params;

	public function __construct() {
		parent::__construct(
			'eltdf_instagram_widget',
			'Elated Instagram Widget',
			array(
				'description' => 'Display your Instagram feed'
			)
		);

		$this->setParams();
	}

	protected function setParams() {
		$this->params = array(
			array(
				'name' => 'title',
				'type' => 'textfield',
				'title' => 'Title'
			),
			array(
				'name' => 'tag',
				'type' => 'textfield',
				'title' => 'Tag'
			),
			array(
				'name'	=> 'type',
				'type'	=> 'dropdown',
				'title'	=> 'Type',
				'options'	=> array(
					'gallery' => 'Gallery',
					'carousel' => 'Carousel'
				)
			),
			array(
				'name' => 'number_of_cols',
				'type' => 'dropdown',
				'title' => 'Number of Columns',
				'options' => array(
					'2' => 'Two',
					'3' => 'Three',
					'4' => 'Four',
					'6' => 'Six',
					'9' => 'Nine',
				)
			),
			array(
				'name' => 'number_of_photos',
				'type' => 'textfield',
				'title' => 'Number of Photos'
			),
			array(
				'name' => 'image_size',
				'type' => 'dropdown',
				'title' => 'Image Size',
				'options' => array(
					'thumbnail' => 'Small',
					'low_resolution' => 'Medium',
					'standard_resolution' => 'Large'
				)
			),
			array(
				'name' => 'space_between_items',
				'type' => 'dropdown',
				'title' => 'Space Between Items',
				'options' => array(
					'normal' => 'Normal',
					'small' => 'Small',
					'tiny' => 'Tiny',
					'no' => 'No Space'
				)
			),
			array(
				'name' => 'transient_time',
				'type' => 'textfield',
				'title' => 'Images Cache Time'
			),
		);
	}
	public function getParams() {
		return $this->params;
	}

	public function widget($args, $instance) {
		extract($instance);

		print $args['before_widget'];
		if(!empty($title)) {
			print $args['before_title'].$title.$args['after_title'];
		}

		$instagram_api = ElatedfInstagramApi::getInstance();
		$images_array = $instagram_api->getImages($number_of_photos, $tag, array(
			'use_transients' => true,
			'transient_name' => $args['widget_id'],
			'transient_time' => $transient_time
		));

		$type = !empty($type) ? $type : 'gallery';
		$number_of_cols = $number_of_cols == '' ? 3 : $number_of_cols;
		$space_between_items = !empty($space_between_items) ? $space_between_items : 'normal';

		$widget_class = '';
		$widget_data = '';

		if ($type === 'carousel') {
			$widget_class = 'eltdf-instagram-carousel';
			$widget_data = ' data-items='.esc_attr($number_of_cols). ' data-space-between-items='.esc_attr($space_between_items);
		} else if ($type == 'gallery') {
			$widget_class = 'eltdf-instagram-gallery eltdf-'.esc_attr($space_between_items).'-space';
		}

		if(is_array($images_array) && count($images_array)) { ?>
			<ul class="eltdf-instagram-feed clearfix eltdf-col-<?php echo esc_attr($number_of_cols); ?> <?php echo esc_attr($widget_class);?>" <?php echo esc_attr($widget_data); ?>>
				<?php
				foreach ($images_array as $image) { ?>
					<li>
						<a href="<?php echo esc_url($instagram_api->getHelper()->getImageLink($image)); ?>" target="_blank">
							<?php echo ambient_elated_kses_img($instagram_api->getHelper()->getImageHTML($image, $image_size)); ?>
						</a>
					</li>
				<?php } ?>
			</ul>
		<?php }
		
		print $args['after_widget'];
	}

	public function form($instance) {
		foreach ($this->params as $param_array) {
			$param_name = $param_array['name'];
			${$param_name} = isset( $instance[$param_name] ) ? esc_attr( $instance[$param_name] ) : '';
		}

		$instagram_api = ElatedfInstagramApi::getInstance();

		//user has connected with instagram. Show form
		if($instagram_api->hasUserConnected()) {
			foreach ($this->params as $param) {
				switch($param['type']) {
					case 'textfield':
						?>
						<p>
							<label for="<?php echo esc_attr($this->get_field_id( $param['name'] )); ?>"><?php echo
								esc_html($param['title']); ?></label>
							<input class="widefat" id="<?php echo esc_attr($this->get_field_id( $param['name'] )); ?>" name="<?php echo esc_attr($this->get_field_name( $param['name'] )); ?>" type="text" value="<?php echo esc_attr( ${$param['name']} ); ?>" />
						</p>
						<?php
						break;
					case 'dropdown':
						?>
						<p>
							<label for="<?php echo esc_attr($this->get_field_id( $param['name'] )); ?>"><?php echo
								esc_html($param['title']); ?></label>
							<?php if(isset($param['options']) && is_array($param['options']) && count($param['options'])) { ?>
								<select class="widefat" name="<?php echo esc_attr($this->get_field_name( $param['name'] )); ?>" id="<?php echo esc_attr($this->get_field_id( $param['name'] )); ?>">
									<?php foreach ($param['options'] as $param_option_key => $param_option_val) {
										$option_selected = '';
										if(${$param['name']} == $param_option_key) {
											$option_selected = 'selected';
										}
										?>
										<option <?php echo esc_attr($option_selected); ?> value="<?php echo esc_attr($param_option_key); ?>"><?php echo esc_attr($param_option_val); ?></option>
									<?php } ?>
								</select>
							<?php } ?>
						</p>

						<?php
						break;
				}
			}
		}
	}
}

function eltdf_instagram_widget_load(){
	register_widget('ElatedfInstagramWidget');
}

add_action('widgets_init', 'eltdf_instagram_widget_load');