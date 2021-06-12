<div class="eltdf-fullscreen-menu-holder-outer">
	<div class="eltdf-fullscreen-menu-holder">
		<div class="eltdf-fullscreen-menu-holder-inner">
			<?php if ($fullscreen_menu_in_grid) : ?>
				<div class="eltdf-container-inner">
			<?php endif;

			//Sidearea above menu
			if(is_active_sidebar( 'fullscreen_menu_above' ) ) : ?>
				<div class="eltdf-fullscreen-above-menu-widget-holder">
					<?php dynamic_sidebar('fullscreen_menu_above'); ?>
				</div>
			<?php endif;

			//Navigation
			ambient_elated_get_full_screen_menu_navigation();

			//Sidearea under menu
			if(is_active_sidebar('fullscreen_menu_below')) : ?>
				<div class="eltdf-fullscreen-below-menu-widget-holder">
					<?php dynamic_sidebar('fullscreen_menu_below'); ?>
				</div>
			<?php endif;

			if ($fullscreen_menu_in_grid) : ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>