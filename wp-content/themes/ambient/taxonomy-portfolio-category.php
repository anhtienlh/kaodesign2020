<?php get_header(); ?>
<?php ambient_elated_get_title(); ?>
<div class="eltdf-container eltdf-default-page-template">
	<?php do_action('ambient_elated_after_container_open'); ?>
	<div class="eltdf-container-inner clearfix">
		<?php
			$cat_id = get_queried_object_id();
			$cat = ! empty($cat_id) ? get_term($cat_id, 'portfolio-category') : '';
			$cat_slug = ! empty($cat) ?  $cat->slug : '';

			ambient_elated_get_portfolio_category_list($cat_slug);
		?>
	</div>
	<?php do_action('ambient_elated_before_container_close'); ?>
</div>
<?php get_footer(); ?>
