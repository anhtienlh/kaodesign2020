<?php
$display_custom_feature_image_width = '';
if(ambient_elated_options()->getOptionValue('blog_single_feature_image_max_width') !== ''){
	$display_custom_feature_image_width = intval(ambient_elated_options()->getOptionValue('blog_single_feature_image_max_width'));
}
?>
<?php if ( has_post_thumbnail() ) { ?>
	<div class="eltdf-post-image">
		<?php if($display_custom_feature_image_width !== '' && !empty($display_custom_feature_image_width)) {
			the_post_thumbnail(array($display_custom_feature_image_width, 0));
		} else {
			the_post_thumbnail('full');
		} ?>
		<?php if ($post_format === 'audio') {
			ambient_elated_get_module_template_part('templates/parts/audio', 'blog');
		} ?>
	</div>
<?php } else {
	if ($post_format === 'audio') {
		ambient_elated_get_module_template_part('templates/parts/audio', 'blog');
	}
} ?>