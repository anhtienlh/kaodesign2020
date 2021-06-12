<section class="eltdf-side-menu right">
	<?php if ($show_side_area_title) {
		ambient_elated_get_side_area_title();
	} ?>
	<div class="eltdf-close-side-menu-holder">
		<div class="eltdf-close-side-menu-holder-inner">
			<a href="#" target="_self" class="eltdf-close-side-menu">
				<span class="eltdf-side-menu-lines">
					<span class="eltdf-side-menu-line eltdf-line-1"></span>
					<span class="eltdf-side-menu-line eltdf-line-2"></span>
			        <span class="eltdf-side-menu-line eltdf-line-3"></span>
				</span>
			</a>
		</div>
	</div>
	<?php if(is_active_sidebar('sidearea')) {
		dynamic_sidebar('sidearea');
	} ?>
</section>