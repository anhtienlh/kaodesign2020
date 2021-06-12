<?php do_action('ambient_elated_before_page_header'); ?>

	<header
		class="eltdf-page-header" <?php ambient_elated_inline_style($menu_area_background_color . $header_bottom_margin); ?>>
		<?php if ($show_fixed_wrapper) : ?>
		<div class="eltdf-fixed-wrapper">
			<?php endif; ?>
			<?php do_action('ambient_elated_after_header_area_html_open'); ?>
			<div
				class="eltdf-menu-area <?php echo esc_attr($standard_menu_area_class); ?>">
				<?php do_action('ambient_elated_after_header_menu_area_html_open') ?>
				<?php if ($header_in_grid) : ?>
				<div class="eltdf-grid">
					<?php endif; ?>
					<div class="eltdf-vertical-align-containers">
						<div class="eltdf-position-left">
							<div class="eltdf-position-left-inner">
								<?php if (!$hide_logo) {
									ambient_elated_get_logo();
								} ?>
							</div>
						</div>
						<?php if ($set_menu_area_position === 'center') : ?>
							<div class="eltdf-position-center">
								<div class="eltdf-position-center-inner">
									<?php ambient_elated_get_main_menu(); ?>
								</div>
							</div>
						<?php endif; ?>
						<div class="eltdf-position-right">
							<div class="eltdf-position-right-inner">
								<?php
								if ($set_menu_area_position === 'right'):
									ambient_elated_get_main_menu();
								endif;

								if (get_post_meta($page_id, 'eltdf_disable_header_widget_area_meta', 'true') !== 'yes') { ?>
									<div class="eltdf-main-menu-widget-area">
										<?php if (is_active_sidebar('eltdf-header-widget-area') && get_post_meta($page_id, 'eltdf_custom_header_sidebar_meta', true) === '') {
											dynamic_sidebar('eltdf-header-widget-area');
										} else if (get_post_meta($page_id, 'eltdf_custom_header_sidebar_meta', true) !== '') {
											$sidebar = get_post_meta($page_id, 'eltdf_custom_header_sidebar_meta', true);
											if (is_active_sidebar($sidebar)) {
												dynamic_sidebar($sidebar);
											}
										} ?>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<?php if ($header_in_grid) : ?>
				</div>
			<?php endif; ?>
			</div>
			<?php if ($show_fixed_wrapper) { ?>
			<?php do_action('ambient_elated_end_of_page_header_html'); ?>
		</div>
	<?php } else {
		do_action('ambient_elated_end_of_page_header_html');
	} ?>
		<?php if ($show_sticky) {
			ambient_elated_get_sticky_header();
		} ?>
	</header>

<?php do_action('ambient_elated_after_page_header'); ?>