<?php
namespace AmbientElatedNamespace\Modules\Shortcodes\Team;

use AmbientElatedNamespace\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class Team
 */
class Team implements ShortcodeInterface {
	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'eltdf_team';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	/**
	 * Maps shortcode to Visual Composer. Hooked on vc_before_init
	 */
	public function vcMap()	{
		$team_social_icons_array = array();
		for ($x = 1; $x<6; $x++) {
			$teamIconCollections = ambient_elated_icon_collections()->getCollectionsWithSocialIcons();
			foreach($teamIconCollections as $collection_key => $collection) {

				$team_social_icons_array[] = array(
					'type' => 'dropdown',
					'heading' => esc_html__('Social Icon ', 'ambient').$x,
					'param_name' => 'team_social_'.$collection->param.'_'.$x,
					'value' => $collection->getSocialIconsArrayVC(),
					'dependency' => Array('element' => 'team_social_icon_pack', 'value' => array($collection_key))
				);
			}

			$team_social_icons_array[] = array(
				'type' => 'textfield',
				'heading' => esc_html__('Social Icon ', 'ambient').$x.esc_html__(' Link', 'ambient'),
				'param_name' => 'team_social_icon_'.$x.'_link',
				'dependency' => array('element' => 'team_social_icon_pack', 'value' => ambient_elated_icon_collections()->getIconCollectionsKeys())
			);

			$team_social_icons_array[] = array(
				'type' => 'dropdown',
				'heading' => esc_html__('Social Icon ', 'ambient').$x.esc_html__(' Target', 'ambient'),
				'param_name' => 'team_social_icon_'.$x.'_target',
				'value' => array(
					esc_html__('Same Window', 'ambient') => '_self',
					esc_html__('New Window', 'ambient') => '_blank'
				),
				'dependency' => Array('element' => 'team_social_icon_'.$x.'_link', 'not_empty' => true)
			);
		}

		vc_map( array(
			'name' => esc_html__('Elated Team', 'ambient'),
			'base' => $this->base,
			'category' => esc_html__('by ELATED', 'ambient'),
			'icon' => 'icon-wpb-team extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params' => array_merge(
				array(
					array(
						'type'       => 'dropdown',
						'param_name' => 'team_type',
						'heading'    => esc_html__('Type', 'ambient'),
						'value'      => array(
							esc_html__('Main Info on Hover', 'ambient')     => 'main-info-on-hover',
							esc_html__('Main Info Below Image', 'ambient')  => 'main-info-below-image'
						),
						'admin_label' => true
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'team_info_skin',
						'heading'    => esc_html__('Info Elements Skin', 'ambient'),
						'value'      => array(
							esc_html__('Default', 'ambient') => '',
							esc_html__('Light', 'ambient') => 'light',
							esc_html__('Dark', 'ambient') => 'dark'
						),
						'dependency'  => array('element' => 'team_type', 'value' => array('main-info-on-hover'))
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'team_info_indented',
						'heading'     => esc_html__('Set Indented Overlay', 'ambient'),
						'value'       => array_flip(ambient_elated_get_yes_no_select_array(false)),
						'dependency'  => array('element' => 'team_type', 'value' => array('main-info-on-hover'))
					),
					array(
						'type'       => 'attach_image',
						'param_name' => 'team_image',
						'heading'    => esc_html__('Image', 'ambient')
					),
					array(
						'type'       => 'textfield',
						'param_name' => 'team_name',
						'heading'    => esc_html__('Name', 'ambient')
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'team_name_tag',
						'heading'     => esc_html__('Name Tag', 'ambient'),
						'value'       => array_flip(ambient_elated_get_title_tag(true)),
						'save_always' => true,
						'dependency'  => array('element' => 'team_name', 'not_empty' => true)
					),
					array(
	                    'type'       => 'colorpicker',
	                    'param_name' => 'team_name_color',
	                    'heading'    => esc_html__('Name Color', 'ambient'),
	                    'dependency' => array('element' => 'team_name', 'not_empty' => true)
	                ),
					array(
						'type'       => 'textfield',
						'param_name' => 'team_position',
						'heading'    => esc_html__('Position', 'ambient')
					),
					array(
	                    'type'       => 'colorpicker',
	                    'param_name' => 'team_position_color',
	                    'heading'    => esc_html__('Position Color', 'ambient'),
	                    'dependency' => array('element' => 'team_position', 'not_empty' => true)
	                ),
					array(
						'type'       => 'textfield',
						'param_name' => 'team_excerpt',
						'heading'    => esc_html__('Excerpt', 'ambient')
					),
					array(
						'type'       => 'colorpicker',
						'param_name' => 'team_excerpt_color',
						'heading'    => esc_html__('Excerpt Color', 'ambient'),
						'dependency' => array('element' => 'team_excerpt', 'not_empty' => true)
					),
					array(
						'type'       => 'textfield',
						'param_name' => 'team_social_margin',
						'heading'    => esc_html__('Social Icon Holder Top Margin (px)', 'ambient')
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'team_social_icon_pack',
						'heading'     => esc_html__('Social Icon Pack', 'ambient'),
						'value'       => array_merge(array('' => ''),ambient_elated_icon_collections()->getIconCollectionsVCExclude('linea_icons')),
						'save_always' => true
					)
				),
				$team_social_icons_array
			)
		) );
	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @param $content string shortcode content
	 * @return string
	 */
	public function render($atts, $content = null) {
		$args = array(
			'team_type'             => 'main-info-on-hover',
			'team_info_skin'        => '',
			'team_info_indented'    => '',
			'team_image'            => '',
			'team_name'             => '',
			'team_name_tag'         => 'h4',
			'team_name_color'       => '',
			'team_position'         => '',
			'team_position_color'   => '',
			'team_excerpt'          => '',
			'team_excerpt_color'    => '',
			'team_social_margin'    => '',
			'team_social_icon_pack' => ''
		);

		$team_social_icons_form_fields = array();
		$number_of_social_icons = 5;

		for ($x = 1; $x <= $number_of_social_icons; $x++) {

			foreach (ambient_elated_icon_collections()->iconCollections as $collection_key => $collection) {
				$team_social_icons_form_fields['team_social_' . $collection->param . '_' . $x] = '';
			}

			$team_social_icons_form_fields['team_social_icon_'.$x.'_link'] = '';
			$team_social_icons_form_fields['team_social_icon_'.$x.'_target'] = '';
		}

		$args = array_merge($args, $team_social_icons_form_fields);

		$params = shortcode_atts($args, $atts);
		
		$params['holder_classes'] = $this->getHolderClasses($params);

		$params['number_of_social_icons'] = 5;
		
		$params['team_name_tag'] = !empty($params['team_name_tag']) ? $params['team_name_tag'] : $args['team_name_tag'];
		$params['team_social_icons'] = $this->getTeamSocialIcons($params);
		$params['team_name_styles'] = $this->getTeamNameStyles($params);
		$params['team_position_styles'] = $this->getTeamPositionStyles($params);
		$params['team_excerpt_styles'] = $this->getTeamExcerptStyles($params);
		$params['team_social_styles'] = $this->getTeamSocialStyles($params);

		//Get HTML from template based on type of team
		$html = ambient_elated_get_shortcode_module_template_part('templates/' . $params['team_type'], 'team', '', $params);

		return $html;
	}
	
	/**
	 * Generates holder classes
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getHolderClasses($params){
		$holderClasses = '';
		
		if(!empty($params['team_type'])){
			$holderClasses .= ' eltdf-'.$params['team_type'];
		}
		
		if(!empty($params['team_info_skin']) && $params['team_type'] === 'main-info-on-hover'){
			$holderClasses .= ' eltdf-'.$params['team_info_skin'].'-skin';
		}
		
		if($params['team_info_indented'] === 'yes' && $params['team_type'] === 'main-info-on-hover') {
			$holderClasses .= ' eltdf-indented-overlay';
		}
		
		return $holderClasses;
	}

	private function getTeamSocialIcons($params) {

		extract($params);
		$social_icons = array();

		if ($team_social_icon_pack !== '') {

			$icon_pack = ambient_elated_icon_collections()->getIconCollection($team_social_icon_pack);
			$team_social_icon_type_label = 'team_social_' . $icon_pack->param;
			$team_social_icon_param_label = $icon_pack->param;

			for ( $i = 1; $i <= $params['number_of_social_icons']; $i++ ) {

				$team_social_icon = ${$team_social_icon_type_label . '_' . $i};
				$team_social_link = ${'team_social_icon_' . $i . '_link'};
				$team_social_target = ${'team_social_icon_' . $i . '_target'};

				if ($team_social_icon !== '') {

					$team_icon_params = array();
					$team_icon_params['icon_pack'] = $team_social_icon_pack;
					$team_icon_params[$team_social_icon_param_label] =   $team_social_icon;
					$team_icon_params['link'] = ($team_social_link !== '') ? $team_social_link : '';
					$team_icon_params['target'] = ($team_social_target !== '') ? $team_social_target : '';

					$social_icons[] = ambient_elated_execute_shortcode('eltdf_icon', $team_icon_params);
				}
			}
		}

		return $social_icons;
	}

	private function getTeamNameStyles($params) {
		$styles = array();

        if (!empty($params['team_name_color'])) {
	        $styles[] = 'color: '.$params['team_name_color'];
        }

        return implode(';', $styles);
    }

    private function getTeamPositionStyles($params) {
	    $styles = array();

        if (!empty($params['team_position_color'])) {
	        $styles[] = 'color: '.$params['team_position_color'];
        }

        return implode(';', $styles);
    }

	private function getTeamExcerptStyles($params) {
		$styles = array();

		if (!empty($params['team_excerpt_color'])) {
			$styles[] = 'color: '.$params['team_excerpt_color'];
		}

		return implode(';', $styles);
	}
	
	private function getTeamSocialStyles($params) {
		$styles = array();
		
		if (!empty($params['team_social_margin'])) {
			$styles[] = 'margin-top: '.ambient_elated_filter_px($params['team_social_margin']).'px';
		}
		
		return implode(';', $styles);
	}
}