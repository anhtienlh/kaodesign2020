<?php
namespace AmbientElatedNamespace\Modules\Shortcodes\ItemShowcaseItem;

use AmbientElatedNamespace\Modules\Shortcodes\Lib\ShortcodeInterface;

class ItemShowcaseItem implements ShortcodeInterface {
	private $base;

	function __construct() {
		$this->base = 'eltdf_item_showcase_item';
		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map(
			array(
				'name'                    => esc_html__('Elated Item Showcase List Item', 'ambient'),
				'base'                    => $this->base,
				'as_child'                => array('only' => 'eltdf_item_showcase'),
				'as_parent'               => array('except' => 'vc_row'),
				'content_element'         => true,
				'category'                => esc_html__('by ELATED', 'ambient'),
				'icon'                    => 'icon-wpb-item-showcase-item extended-custom-icon',
				'show_settings_on_create' => true,
				'params'                  => array_merge(
					ambient_elated_icon_collections()->getVCParamsArray(array(), '', true),
					array(
						array(
							'type'        => 'dropdown',
							'param_name'  => 'item_position',
							'heading'     => esc_html__('Item Position', 'ambient'),
							'value'       => array(
								esc_html__('Left', 'ambient')  => 'left',
								esc_html__('Right', 'ambient') => 'right'
							),
							'admin_label' => true
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'item_title',
							'heading'     => esc_html__('Item Title', 'ambient'),
							'admin_label' => true
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'item_link',
							'heading'    => esc_html__('Item Link', 'ambient'),
							'dependency' => array('element' => 'item_title', 'not_empty' => true)
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'item_target',
							'heading'    => esc_html__('Item Target', 'ambient'),
							'value'      => array(
								esc_html__('Same Window', 'ambient') => '_self',
								esc_html__('New Window', 'ambient')  => '_blank'
							),
							'dependency' => array('element' => 'item_link', 'not_empty' => true),
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'item_title_tag',
							'heading'     => esc_html__('Item Title Tag', 'ambient'),
							'value'       => array_flip(ambient_elated_get_title_tag(true)),
							'save_always' => true,
							'dependency'  => array('element' => 'item_title', 'not_empty' => true)
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'item_title_color',
							'heading'    => esc_html__('Item Title Color', 'ambient'),
							'dependency' => array('element' => 'item_title', 'not_empty' => true)
						),
						array(
							'type'       => 'textarea',
							'param_name' => 'item_text',
							'heading'    => esc_html__('Item Text', 'ambient')
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'item_text_color',
							'heading'    => esc_html__('Item Text Color', 'ambient'),
							'dependency' => array('element' => 'item_text', 'not_empty' => true)
						)
					)
				)
			)
		);
	}

	public function render($atts, $content = null) {
		$args = array(
			'item_position'    => 'left',
			'item_title'       => '',
			'item_link'        => '',
			'item_target'      => '_self',
			'item_title_tag'   => 'h4',
			'item_title_color' => '',
			'item_text'        => '',
			'item_text_color'  => ''
		);


		$args = array_merge($args, ambient_elated_icon_collections()->getShortcodeParams());
		$params = shortcode_atts($args, $atts);
		extract($params);

		$params['icon_parameters'] = $this->getIconParameters($params);
		$params['showcase_item_class'] = $this->getShowcaseItemClasses($params);
		$params['item_target'] = !empty($item_target) ? $params['item_target'] : $args['item_target'];
		$params['item_title_tag'] = !empty($item_title_tag) ? $params['item_title_tag'] : $args['item_title_tag'];
		$params['item_title_styles'] = $this->getTitleStyles($params);
		$params['item_text_styles'] = $this->getTextStyles($params);

		$html = ambient_elated_get_shortcode_module_template_part('templates/item-showcase-item', 'item-showcase', '', $params);

		return $html;
	}

	/**
	 * Returns parameters for icon shortcode as a string
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getIconParameters($params) {
		$params_array = array();

		$iconPackName = ambient_elated_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);

		$params_array['icon_pack'] = $params['icon_pack'];
		if ($params_array['icon_pack']) {
			$params_array[$iconPackName] = $params[$iconPackName];
		}

		return $params_array;
	}

	/**
	 * Return Showcase Item Classes
	 *
	 * @param $params
	 * @return array
	 */
	private function getShowcaseItemClasses($params) {
		$itemClass = array();

		if (!empty($params['item_position'])) {
			$itemClass[] = 'eltdf-is-' . $params['item_position'];
		}

		return implode(' ', $itemClass);
	}

	private function getTitleStyles($params) {
		$styles = array();

		if (!empty($params['item_title_color'])) {
			$styles[] = 'color: ' . $params['item_title_color'];
		}

		return implode(';', $styles);
	}

	private function getTextStyles($params) {
		$styles = array();

		if (!empty($params['item_text_color'])) {
			$styles[] = 'color: ' . $params['item_text_color'];
		}

		return implode(';', $styles);
	}
}
