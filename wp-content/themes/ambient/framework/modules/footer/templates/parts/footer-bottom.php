<div class="eltdf-footer-bottom-holder">
	<div class="eltdf-footer-bottom <?php echo esc_attr($footer_bottom_classes) ?>">
		<?php if($footer_in_grid) { ?>

		<div class="eltdf-container">
			<div class="eltdf-container-inner">
		<?php }

		switch ($footer_bottom_columns) {
			case 3:
				ambient_elated_get_footer_bottom_sidebar_three_columns();
				break;
			case 2:
				ambient_elated_get_footer_bottom_sidebar_two_columns();
				break;
			case 1:
				ambient_elated_get_footer_bottom_sidebar_one_column();
				break;
		}
		if($footer_in_grid) { ?>
			</div>
		</div>
	<?php } ?>
	</div>
</div>