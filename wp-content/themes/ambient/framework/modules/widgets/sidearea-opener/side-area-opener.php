<?php
class AmbientElatedClassSideAreaOpener extends AmbientElatedClassWidget {
    public function __construct() {
        parent::__construct(
            'eltdf_side_area_opener',
	        esc_html__('Elated Side Area Opener', 'ambient'),
	        array( 'description' => esc_html__( 'Display a "hamburger" icon that opens the side area', 'ambient'))
        );

        $this->setParams();
    }

    protected function setParams() {
		$this->params = array(
            array(
                'type'        => 'textfield',
                'name'        => 'widget_elements_color',
                'title'       => esc_html__('Widget Color', 'ambient'),
                'description' => esc_html__('Define color for side area opener', 'ambient')
            ),
			array(
				'type'        => 'textfield',
				'name'        => 'widget_elements_margin',
				'title'       => esc_html__('Widget Margin', 'ambient'),
				'description' => esc_html__('Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'ambient')
			),
			array(
				'type' => 'textfield',
				'name' => 'widget_title',
				'title' => esc_html__('Side Area Opener Title', 'ambient')
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
        <a class="eltdf-side-menu-button-opener" href="javascript:void(0)" <?php ambient_elated_inline_style($holder_styles); ?>>
            <?php if (!empty($instance['widget_title'])) { ?>
                <h5 class="eltdf-side-menu-title"><?php echo esc_html($instance['widget_title']); ?></h5>
            <?php } ?>
			<i class="eltdf-icon-linear-icon lnr lnr-menu eltdf-icon-element eltdf-side-menu-icon"></i>
        </a>
    <?php }
}