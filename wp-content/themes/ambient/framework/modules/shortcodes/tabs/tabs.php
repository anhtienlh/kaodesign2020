<?php
namespace AmbientElatedNamespace\Modules\Shortcodes\Tabs;

use AmbientElatedNamespace\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class Tabs
 */
class Tabs implements ShortcodeInterface {
	/**
	 * @var string
	 */
	private $base;
	
	function __construct() {
		$this->base = 'eltdf_tabs';
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
			'name' => esc_html__('Elated Tabs', 'ambient'),
			'base' => $this->getBase(),
			'as_parent' => array('only' => 'eltdf_tab'),
			'content_element' => true,
			'category' => esc_html__('by ELATED', 'ambient'),
			'icon' => 'icon-wpb-tabs extended-custom-icon',
			'js_view' => 'VcColumnView'
		));
	}

	public function render($atts, $content = null) {
		$args = array();

        $params  = shortcode_atts($args, $atts);
		extract($params);
		
		// Extract tab titles
		preg_match_all('/title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE);
		$tab_titles = array();

		/**
		 * get tab titles array
		 */
		if (isset($matches[0])) {
			$tab_titles = $matches[0];
		}
		
		$tab_title_array = array();
		
		foreach($tab_titles as $tab) {
			preg_match('/title="([^\"]+)"/i', $tab[0], $tab_matches, PREG_OFFSET_CAPTURE);
			$tab_title_array[] = $tab_matches[1][0];
		}
		
		$params['tabs_titles'] = $tab_title_array;
		$params['content'] = $content;
		
		$output = '';
		
		$output .= ambient_elated_get_shortcode_module_template_part('templates/tab-template','tabs', '', $params);
		
		return $output;
	}
}