<?php
namespace AmbientElatedNamespace\Modules\Shortcodes\Tab;

use AmbientElatedNamespace\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class Tab
 */
class Tab implements ShortcodeInterface {
	/**
	 * @var string
	 */
	private $base;
	
	function __construct() {
		$this->base = 'eltdf_tab';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	
	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('Elated Tab', 'ambient'),
			'base' => $this->getBase(),
			'as_parent' => array('except' => 'vc_row'),
			'as_child' => array('only' => 'eltdf_tabs'),
			'is_container' => true,
			'category' => esc_html__('by ELATED', 'ambient'),
			'icon' => 'icon-wpb-tab extended-custom-icon',
			'show_settings_on_create' => true,
			'js_view' => 'VcColumnView',
			'params' => array(
				array(
					'type'       => 'textfield',
					'param_name' => 'title',
					'heading'    => esc_html__('Title', 'ambient')
                )
			)
		));
	}

	public function render($atts, $content = null) {
		$default_atts = array(
			'title' => 'Tab',
			'tab_id' => ''
		);

		$params       = shortcode_atts($default_atts, $atts);
		extract($params);

		$rand_number = rand(0, 1000);
		$params['title'] = $params['title'].'-'.$rand_number;

		$params['content'] = $content;
		
		$output = '';
		
		$output .= ambient_elated_get_shortcode_module_template_part('templates/tab-content','tabs', '', $params);
		
		return $output;
	}
}