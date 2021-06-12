<?php if (($sidebar == "default") || ($sidebar == "")) : ?>
	<div class="eltdf-blog-holder eltdf-blog-single">
		<?php ambient_elated_get_single_html(); ?>
	</div>
<?php else: ?>
	<div <?php echo ambient_elated_sidebar_columns_class(); ?>>
		<div class="eltdf-column1 eltdf-content-next-to-sidebar">
			<div class="eltdf-column-inner">
				<div class="eltdf-blog-holder eltdf-blog-single">
					<?php ambient_elated_get_single_html(); ?>
				</div>
			</div>
		</div>
		<div class="eltdf-column2">
			<?php get_sidebar(); ?>
		</div>
	</div>
<?php endif; ?>
