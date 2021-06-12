<?php
$post_link = get_the_permalink();

if($post_format === 'link') {

	if($image_post_link_link !== '') {
		$post_link = $image_post_link_link;
	} else {
		$post_link = get_the_permalink();
	}
}
?>
<?php if ( has_post_thumbnail() ) { ?>
	<div class="eltdf-post-image">
		<a itemprop="url" href="<?php echo esc_url($post_link); ?>" title="<?php the_title_attribute(); ?>">
			<?php the_post_thumbnail('full'); ?>
			<div class="eltdf-bli-overlay"></div>
		</a>
		<?php if ($post_format === 'audio') {
			ambient_elated_get_module_template_part('templates/parts/audio', 'blog');
		} ?>
	</div>
<?php } else {
	if ($post_format === 'audio') {
		ambient_elated_get_module_template_part('templates/parts/audio', 'blog');
	}
} ?>