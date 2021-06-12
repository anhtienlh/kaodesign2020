<?php

class AmbientElatedClassFieldPortfolioFollow extends AmbientElatedClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		
		$dependence = false;
		if(isset($args["dependence"])) {
			$dependence = true;
		}
		
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"])) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"])) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>

		<div class="eltdf-page-form-section" id="eltdf_<?php echo esc_attr($name); ?>">
			<div class="eltdf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="eltdf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
								<label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
									   class="cb-enable<?php if (ambient_elated_option_get_value($name) == "portfolio_single_follow") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Yes', 'ambient') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									   class="cb-disable<?php if (ambient_elated_option_get_value($name) == "portfolio_single_no_follow") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'ambient') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo esc_attr($name); ?>_portfoliofollow" value="portfolio_single_follow"<?php if (ambient_elated_option_get_value($name) == "portfolio_single_follow") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_portfoliofollow" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(ambient_elated_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class AmbientElatedClassFieldZeroOne extends AmbientElatedClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		
		$dependence = false;
		if(isset($args["dependence"])) {
			$dependence = true;
		}
		
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"])) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"])) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>

		<div class="eltdf-page-form-section" id="eltdf_<?php echo esc_attr($name); ?>">
			<div class="eltdf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="eltdf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
								<label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
									   class="cb-enable<?php if (ambient_elated_option_get_value($name) == "1") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Yes', 'ambient') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									   class="cb-disable<?php if (ambient_elated_option_get_value($name) == "0") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'ambient') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo esc_attr($name); ?>_zeroone" value="1"<?php if (ambient_elated_option_get_value($name) == "1") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_zeroone" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(ambient_elated_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class AmbientElatedClassFieldImageVideo extends AmbientElatedClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		
		$dependence = false;
		if(isset($args["dependence"])) {
			$dependence = true;
		}
		
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"])) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"])) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>
		
		<div class="eltdf-page-form-section" id="eltdf_<?php echo esc_attr($name); ?>">
			<div class="eltdf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="eltdf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch switch-type">
								<label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
									   class="cb-enable<?php if (ambient_elated_option_get_value($name) == "image") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Image', 'ambient') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									   class="cb-disable<?php if (ambient_elated_option_get_value($name) == "video") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Video', 'ambient') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo esc_attr($name); ?>_imagevideo" value="image"<?php if (ambient_elated_option_get_value($name) == "image") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_imagevideo" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(ambient_elated_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class AmbientElatedClassFieldYesEmpty extends AmbientElatedClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		
		$dependence = false;
		if(isset($args["dependence"])) {
			$dependence = true;
		}
		
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"])) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"])) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>

		<div class="eltdf-page-form-section" id="eltdf_<?php echo esc_attr($name); ?>">
			<div class="eltdf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="eltdf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
								<label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
									   class="cb-enable<?php if (ambient_elated_option_get_value($name) == "yes") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Yes', 'ambient') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									   class="cb-disable<?php if (ambient_elated_option_get_value($name) == "") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'ambient') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo esc_attr($name); ?>_yesempty" value="yes"<?php if (ambient_elated_option_get_value($name) == "yes") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_yesempty" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(ambient_elated_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class AmbientElatedClassFieldFlagPage extends AmbientElatedClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		
		$dependence = false;
		if(isset($args["dependence"])) {
			$dependence = true;
		}
		
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"])) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"])) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>

		<div class="eltdf-page-form-section" id="eltdf_<?php echo esc_attr($name); ?>">
			<div class="eltdf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="eltdf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
								<label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
									   class="cb-enable<?php if (ambient_elated_option_get_value($name) == "page") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Yes', 'ambient') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									   class="cb-disable<?php if (ambient_elated_option_get_value($name) == "") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'ambient') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo esc_attr($name); ?>_flagpage" value="page"<?php if (ambient_elated_option_get_value($name) == "page") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_flagpage" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(ambient_elated_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class AmbientElatedClassFieldFlagPost extends AmbientElatedClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {

		$dependence = false;
		if(isset($args["dependence"])) {
			$dependence = true;
		}
		
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"])) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"])) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>

		<div class="eltdf-page-form-section" id="eltdf_<?php echo esc_attr($name); ?>">
			<div class="eltdf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="eltdf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
								<label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
									   class="cb-enable<?php if (ambient_elated_option_get_value($name) == "post") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Yes', 'ambient') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									   class="cb-disable<?php if (ambient_elated_option_get_value($name) == "") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'ambient') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo esc_attr($name); ?>_flagpost" value="post"<?php if (ambient_elated_option_get_value($name) == "post") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_flagpost" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(ambient_elated_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class AmbientElatedClassFieldFlagMedia extends AmbientElatedClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		
		$dependence = false;
		if(isset($args["dependence"])) {
			$dependence = true;
		}
		
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"])) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"])) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>

		<div class="eltdf-page-form-section" id="eltdf_<?php echo esc_attr($name); ?>">
			<div class="eltdf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="eltdf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
								<label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
									   class="cb-enable<?php if (ambient_elated_option_get_value($name) == "attachment") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Yes', 'ambient') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									   class="cb-disable<?php if (ambient_elated_option_get_value($name) == "") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'ambient') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo esc_attr($name); ?>_flagmedia" value="attachment"<?php if (ambient_elated_option_get_value($name) == "attachment") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_flagmedia" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(ambient_elated_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class AmbientElatedClassFieldFlagPortfolio extends AmbientElatedClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		
		$dependence = false;
		if(isset($args["dependence"])) {
			$dependence = true;
		}
		
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"])) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"])) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>

		<div class="eltdf-page-form-section" id="eltdf_<?php echo esc_attr($name); ?>">
			<div class="eltdf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="eltdf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
								<label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
									   class="cb-enable<?php if (ambient_elated_option_get_value($name) == "portfolio_page") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Yes', 'ambient') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									   class="cb-disable<?php if (ambient_elated_option_get_value($name) == "") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'ambient') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo esc_attr($name); ?>_flagportfolio" value="portfolio_page"<?php if (ambient_elated_option_get_value($name) == "portfolio_page") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_flagportfolio" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(ambient_elated_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class AmbientElatedClassFieldFlagProduct extends AmbientElatedClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		
		$dependence = false;
		if(isset($args["dependence"])) {
			$dependence = true;
		}
		
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"])) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"])) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>

		<div class="eltdf-page-form-section" id="eltdf_<?php echo esc_attr($name); ?>">
			<div class="eltdf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="eltdf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
								<label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
									   class="cb-enable<?php if (ambient_elated_option_get_value($name) == "product") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Yes', 'ambient') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									   class="cb-disable<?php if (ambient_elated_option_get_value($name) == "") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'ambient') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo esc_attr($name); ?>_flagproduct" value="product"<?php if (ambient_elated_option_get_value($name) == "product") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_flagproduct" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(ambient_elated_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class AmbientElatedClassFieldRange extends AmbientElatedClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		$range_min = 0;
		$range_max = 1;
		$range_step = 0.01;
		$range_decimals = 2;
		if(isset($args["range_min"])) {
			$range_min = $args["range_min"];
		}
		
		if(isset($args["range_max"])) {
			$range_max = $args["range_max"];
		}
		
		if(isset($args["range_step"])) {
			$range_step = $args["range_step"];
		}
		
		if(isset($args["range_decimals"])) {
			$range_decimals = $args["range_decimals"];
		}
		?>

		<div class="eltdf-page-form-section">
			<div class="eltdf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="eltdf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="eltdf-slider-range-wrapper">
								<div class="form-inline">
									<input type="text" class="form-control eltdf-form-element eltdf-form-element-xsmall pull-left eltdf-slider-range-value" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(ambient_elated_option_get_value($name)); ?>"/>
									<div class="eltdf-slider-range small" data-step="<?php echo esc_attr($range_step); ?>" data-min="<?php echo esc_attr($range_min); ?>" data-max="<?php echo esc_attr($range_max); ?>" data-decimals="<?php echo esc_attr($range_decimals); ?>" data-start="<?php echo esc_attr(ambient_elated_option_get_value($name)); ?>"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class AmbientElatedClassFieldRangeSimple extends AmbientElatedClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {	?>

		<div class="col-lg-3" id="eltdf_<?php echo esc_attr($name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<div class="eltdf-slider-range-wrapper">
				<div class="form-inline">
					<em class="eltdf-field-description"><?php echo esc_html($label); ?></em>
					<input type="text" class="form-control eltdf-form-element eltdf-form-element-xxsmall pull-left eltdf-slider-range-value" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(ambient_elated_option_get_value($name)); ?>"/>
					<div class="eltdf-slider-range xsmall" data-step="0.01" data-max="1" data-start="<?php echo esc_attr(ambient_elated_option_get_value($name)); ?>"></div>
				</div>
			</div>
		</div>
	<?php
	}
}

class AmbientElatedClassFieldRadio extends AmbientElatedClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {

		$checked = "";
		if ($default_value == $value) {
			$checked = "checked";
		}
		
		$html = '<input type="radio" name="'.$name.'" value="'.$default_value.'" '.$checked.' /> '.$label.'<br />';
		echo wp_kses($html, array(
			'input' => array(
				'type' => true,
				'name' => true,
				'value' => true,
				'checked' => true
			),
			'br' => true
		));
	}
}

class AmbientElatedClassFieldRadioGroup extends AmbientElatedClassFieldType {

    public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
        $dependence = isset($args["dependence"]) && $args["dependence"] ? true : false;
        $show = !empty($args["show"]) ? $args["show"] : array();
        $hide = !empty($args["hide"]) ? $args["hide"] : array();

        $use_images = isset($args["use_images"]) && $args["use_images"] ? true : false;
        $hide_labels = isset($args["hide_labels"]) && $args["hide_labels"] ? true : false;
        $hide_radios = $use_images ? 'display: none' : '';
        $checked_value = ambient_elated_option_get_value($name);
        ?>

        <div class="eltdf-page-form-section" id="eltdf_<?php echo esc_attr($name); ?>" <?php if ($hidden) { ?> style="display: none"<?php } ?>>
            <div class="eltdf-field-desc">
                <h4><?php echo esc_html($label); ?></h4>
                <p><?php echo esc_html($description); ?></p>
            </div>
            <div class="eltdf-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if(is_array($options) && count($options)) { ?>
                                <div class="eltdf-radio-group-holder <?php if($use_images) echo "with-images"; ?>">
                                    <?php foreach($options as $key => $atts) {
                                        $selected = false;
                                        if($checked_value == $key) {
                                            $selected = true;
                                        }

                                        $show_val = "";
                                        $hide_val = "";
                                        if($dependence) {
                                            if(array_key_exists($key, $show)) {
                                                $show_val = $show[$key];
                                            }

                                            if(array_key_exists($key, $hide)) {
                                                $hide_val = $hide[$key];
                                            }
                                        }
                                    ?>
                                        <label class="radio-inline">
                                            <input <?php echo ambient_elated_get_inline_attr($show_val, 'data-show'); ?> <?php echo ambient_elated_get_inline_attr($hide_val, 'data-hide'); ?>
                                                <?php if($selected) echo "checked"; ?> <?php ambient_elated_inline_style($hide_radios); ?>
                                                type="radio" name="<?php echo esc_attr($name);  ?>" value="<?php echo esc_attr($key); ?>"
                                                <?php if($dependence) ambient_elated_class_attribute("dependence"); ?>> <?php if(!empty($atts["label"]) && !$hide_labels) echo esc_attr($atts["label"]); ?>

                                            <?php if($use_images) { ?>
                                                <img title="<?php if(!empty($atts["label"])) echo esc_attr($atts["label"]); ?>" src="<?php echo esc_url($atts['image']); ?>" alt="<?php echo esc_attr("$key image") ?>"/>
                                            <?php } ?>
                                        </label>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
}

class AmbientElatedClassFieldCheckBoxGroup extends AmbientElatedClassFieldType {

	public function render($name, $label = '', $description = '', $options = array(), $args = array(), $hidden = false) {
		if(!(is_array($options) && count($options))) {
			return;
		}

		$saved_value = ambient_elated_option_get_value($name); ?>
		
		<div class="eltdf-page-form-section" id="eltdf_<?php echo esc_attr($name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<div class="eltdf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="eltdf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="eltdf-checkbox-group-holder">
									<div class="checkbox-inline" style="display: none">
										<label>
											<input checked type="checkbox" value="" name="<?php echo esc_attr($name.'[]'); ?>">
										</label>
									</div>
								<?php foreach($options as $option_key => $option_label) : ?>
									<?php
									$i = 1;
									$checked = is_array($saved_value) && in_array($option_key, $saved_value);
									$checked_attr = $checked ? 'checked' : '';
									?>
									<div class="checkbox-inline">
										<label>
											<input <?php echo esc_attr($checked_attr); ?> type="checkbox" id="<?php echo esc_attr($option_key).'-'.$i; ?>" value="<?php echo esc_attr($option_key); ?>" name="<?php echo esc_attr($name.'[]'); ?>">
											<label for="<?php echo esc_attr($option_key).'-'.$i; ?>"><?php echo esc_html($option_label); ?></label>  
										</label>
									</div>
								<?php $i++; endforeach; ?>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

class AmbientElatedClassFieldCheckBox extends AmbientElatedClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {

		$checked = "";
		if ($default_value == $value) {
			$checked = "checked";
		}
		
		$html = '<input type="checkbox" name="'.$name.'" value="'.$default_value.'" '.$checked.' /> '.$label.'<br />';
		echo wp_kses($html, array(
			'input' => array(
				'type' => true,
				'name' => true,
				'value' => true,
				'checked' => true
			),
			'br' => true
		));
	}
}

class AmbientElatedClassFieldDate extends AmbientElatedClassFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		$col_width = 2;
		if(isset($args["col_width"]))
			$col_width = $args["col_width"];
		?>

		<div class="eltdf-page-form-section" id="eltdf_<?php echo esc_attr($name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<div class="eltdf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>
				<p><?php echo esc_html($description); ?></p>
			</div>
			<div class="eltdf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-<?php echo esc_attr($col_width); ?>">
							<input type="text" id="portfolio_date" class="datepicker form-control eltdf-input eltdf-form-element" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(ambient_elated_option_get_value($name)); ?>" />
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

class AmbientElatedClassFieldFactory {

	public function render( $field_type, $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		
		switch ( strtolower( $field_type ) ) {

			case 'text':
				$field = new AmbientElatedClassFieldText();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'textsimple':
				$field = new AmbientElatedClassFieldTextSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'textarea':
				$field = new AmbientElatedClassFieldTextArea();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'textareasimple':
				$field = new AmbientElatedClassFieldTextAreaSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'color':
				$field = new AmbientElatedClassFieldColor();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'colorsimple':
				$field = new AmbientElatedClassFieldColorSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'image':
				$field = new AmbientElatedClassFieldImage();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
            case 'imagesimple':
				$field = new AmbientElatedClassFieldImageSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'font':
				$field = new AmbientElatedClassFieldFont();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'fontsimple':
				$field = new AmbientElatedClassFieldFontSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'select':
				$field = new AmbientElatedClassFieldSelect();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'selectblank':
				$field = new AmbientElatedClassFieldSelectBlank();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'selectsimple':
				$field = new AmbientElatedClassFieldSelectSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'selectblanksimple':
				$field = new AmbientElatedClassFieldSelectBlankSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'yesno':
				$field = new AmbientElatedClassFieldYesNo();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'yesnosimple':
				$field = new AmbientElatedClassFieldYesNoSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'onoff':
				$field = new AmbientElatedClassFieldOnOff();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'portfoliofollow':
				$field = new AmbientElatedClassFieldPortfolioFollow();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'zeroone':
				$field = new AmbientElatedClassFieldZeroOne();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'imagevideo':
				$field = new AmbientElatedClassFieldImageVideo();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'yesempty':
				$field = new AmbientElatedClassFieldYesEmpty();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'flagpost':
				$field = new AmbientElatedClassFieldFlagPost();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'flagpage':
				$field = new AmbientElatedClassFieldFlagPage();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'flagmedia':
				$field = new AmbientElatedClassFieldFlagMedia();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'flagportfolio':
				$field = new AmbientElatedClassFieldFlagPortfolio();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'flagproduct':
				$field = new AmbientElatedClassFieldFlagProduct();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'range':
				$field = new AmbientElatedClassFieldRange();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'rangesimple':
				$field = new AmbientElatedClassFieldRangeSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'radio':
				$field = new AmbientElatedClassFieldRadio();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'checkbox':
				$field = new AmbientElatedClassFieldCheckBox();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			case 'date':
				$field = new AmbientElatedClassFieldDate();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
            case 'radiogroup':
                $field = new AmbientElatedClassFieldRadioGroup();
                $field->render( $name, $label, $description, $options, $args, $hidden );
                break;
            case 'checkboxgroup':
                $field = new AmbientElatedClassFieldCheckBoxGroup();
                $field->render( $name, $label, $description, $options, $args, $hidden );
                break;    
			default:
				break;
		}
	}
}