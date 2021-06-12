<?php
    /*
    	Template Name: Blog: Masonry
    */
?>
<?php get_header(); ?>
<?php ambient_elated_get_title(); ?>
<?php do_action('ambient_elated_before_slider_action'); ?>
<?php get_template_part('slider'); ?>
<?php do_action('ambient_elated_after_slider_action'); ?>
	<div class="eltdf-container">
	    <?php do_action('ambient_elated_after_container_open'); ?>
	    <div class="eltdf-container-inner" >
	        <?php ambient_elated_get_blog('masonry'); ?>
	    </div>
	    <?php do_action('ambient_elated_before_container_close'); ?>
	</div>
	<?php do_action('ambient_elated_blog_list_additional_tags'); ?>
<?php get_footer(); ?>