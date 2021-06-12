<?php
$blog_archive_pages_classes = ambient_elated_blog_archive_pages_classes(ambient_elated_get_default_blog_list());
?>
<?php get_header(); ?>
<?php ambient_elated_get_title(); ?>
<div class="<?php echo esc_attr($blog_archive_pages_classes['holder']); ?>">
<?php do_action('ambient_elated_after_container_open'); ?>
	<div class="<?php echo esc_attr($blog_archive_pages_classes['inner']); ?>">
		<?php ambient_elated_get_blog(ambient_elated_get_default_blog_list()); ?>
	</div>
<?php do_action('ambient_elated_before_container_close'); ?>
</div>
<?php do_action('ambient_elated_blog_list_additional_tags'); ?>
<?php get_footer(); ?>