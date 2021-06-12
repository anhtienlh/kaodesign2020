<div class="eltdf-two-columns-50-50 clearfix">
	<div class="eltdf-two-columns-50-50-inner">
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
	</div>
</div>