<?php if (($sidebar == 'default') || ($sidebar == '')) : ?>
	<?php ambient_elated_get_blog_type($blog_type); ?>
<?php else: ?>
	<div <?php echo ambient_elated_sidebar_columns_class(); ?>>
		<div class="eltdf-column1">
			<div class="eltdf-column-inner">
				<?php ambient_elated_get_blog_type($blog_type); ?>
			</div>
		</div>
		<div class="eltdf-column2">
			<?php get_sidebar(); ?>
		</div>
	</div>
<?php endif; ?>