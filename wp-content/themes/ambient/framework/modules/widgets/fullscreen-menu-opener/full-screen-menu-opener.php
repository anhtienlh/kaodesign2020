<?php
class AmbientElatedClassFullScreenMenuOpener extends AmbientElatedClassWidget {
    public function __construct() {
        parent::__construct(
            'eltdf_full_screen_menu_opener',
	        esc_html__('Elated Full Screen Menu Opener', 'ambient'),
	        array( 'description' => esc_html__( 'Display a "hamburger" icon that opens the full screen menu', 'ambient'))
        );

		$this->setParams();
    }

	protected function setParams() {
		$this->params = array(
			array(
				'type'        => 'textfield',
				'name'        => 'widget_elements_color',
				'title'       => esc_html__('Widget Color', 'ambient'),
				'description' => esc_html__('Define color for full screen menu opener', 'ambient')
			),
			array(
				'type'        => 'textfield',
				'name'        => 'widget_elements_margin',
				'title'       => esc_html__('Widget Margin', 'ambient'),
				'description' => esc_html__('Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'ambient')
			)
		);
	}

    public function widget($args, $instance) {
	    $holder_styles = array();
	    if (!empty($instance['widget_elements_color'])) {
		    $holder_styles[] = 'color: ' . $instance['widget_elements_color'];
	    }
	    if (!empty($instance['widget_elements_margin'])) {
		    $holder_styles[] = 'margin: ' . $instance['widget_elements_margin'];
	    }
	    ?>
        <a href="javascript:void(0)" class="eltdf-fullscreen-menu-opener" <?php ambient_elated_inline_style($holder_styles); ?>>
            <span class="eltdf-fm-lines">
                <span class="eltdf-fm-line eltdf-line-1"></span>
                <span class="eltdf-fm-line eltdf-line-2"></span>
                <span class="eltdf-fm-line eltdf-line-3"></span>
            </span>
        </a>
    <?php }
}