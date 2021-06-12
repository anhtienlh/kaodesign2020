<?php
/*
Template Name: Full Width
*/
?>
<?php
$ambient_elated_sidebar = ambient_elated_sidebar_layout(); ?>

<?php get_header(); ?>
<?php ambient_elated_get_title(); ?>
<?php do_action('ambient_elated_before_slider_action'); ?>
<?php get_template_part('slider'); ?>
<?php do_action('ambient_elated_after_slider_action'); ?>
	<div class="eltdf-full-width">
		<div class="eltdf-full-width-inner">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php if (($ambient_elated_sidebar == 'default') || ($ambient_elated_sidebar == '')) : ?>
					<?php the_content(); ?>
					<?php do_action('ambient_elated_page_after_content'); ?>
				<?php else: ?>
					<div <?php echo ambient_elated_sidebar_columns_class(); ?>>
						<div class="eltdf-column1 eltdf-content-next-to-sidebar">
							<div class="eltdf-column-inner">
								<?php the_content(); ?>
								<?php do_action('ambient_elated_page_after_content'); ?>
							</div>
						</div>
						<div class="eltdf-column2">
							<?php get_sidebar(); ?>
						</div>
					</div>
				<?php endif; ?>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
<?php get_footer(); ?>