<?php do_action('ambient_elated_before_sticky_header'); ?>

<div class="eltdf-sticky-header">
    <?php do_action( 'ambient_elated_after_sticky_menu_html_open' ); ?>
    <div class="eltdf-sticky-holder">
    <?php if($sticky_header_in_grid) : ?>
        <div class="eltdf-grid">
            <?php endif; ?>
            <div class=" eltdf-vertical-align-containers">
                
                						<div class="eltdf-position-left">
							<div class="eltdf-position-left-inner">
								<?php if (1==0) { // kien-dx
									ambient_elated_get_logo();
								} ?>
							</div>
						</div>
						<?php if (1 === 1) : ?>
							<div class="eltdf-position-center kao-d-flex kao-header-customized sticky">
								<div class="eltdf-position-center-inner kao-col kao-nav-float-right">
									<?php ambient_elated_get_main_menu(); ?>
								</div>
								<?php if (!$hide_logo) { // kien-dx
									ambient_elated_get_logo();
								} ?>
								<div class="eltdf-position-center-inner kao-col-30 kao-nav-float-left">

									<div class="eltdf-position-right kao-nav-float-left-inner">
										<?php ambient_elated_get_main_menu_kao_right(); ?>

										<div class="eltdf-position-right kao-padding-r-30">
												<div class="eltdf-position-right-inner" style="vertical-align:unset;">
													<?php
													if ($set_menu_area_position === 'right'):
														ambient_elated_get_main_menu();
													endif;


													if ('no' !== 'yes') { ?>
														<div class="eltdf-main-menu-widget-area">
															<?php if (is_active_sidebar('eltdf-header-widget-area') && '' === '') {
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

								</div>
								
							</div>
						<?php endif; ?>
                
            </div>
            <?php if($sticky_header_in_grid) : ?>
        </div>
        <?php endif; ?>
    </div>
    <?php do_action('ambient_elated_end_of_page_header_html'); ?>
</div>

<?php do_action('ambient_elated_after_sticky_header'); ?>