<div class="eltdf-three-columns clearfix">
	<div class="eltdf-three-columns-inner">
		<div class="eltdf-column">
			<div class="eltdf-column-inner">
				<?php if(is_active_sidebar('footer_top_column_1')) {
					dynamic_sidebar( 'footer_top_column_1' );
				} ?>
			</div>
		</div>
		<div class="eltdf-column">
			<div class="eltdf-column-inner">
				<?php if(is_active_sidebar('footer_top_column_2')) {
					dynamic_sidebar( 'footer_top_column_2' );
				} ?>
			</div>
		</div>
		<div class="eltdf-column">
			<div class="eltdf-column-inner">
				<?php if(is_active_sidebar('footer_top_column_3')) {
					dynamic_sidebar( 'footer_top_column_3' );
				} ?>
			</div>
		</div>
	</div>
</div>