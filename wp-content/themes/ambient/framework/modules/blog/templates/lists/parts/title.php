<?php
	if(isset($title_tag)){
		$title_tag = $title_tag;
	} else {
		$title_tag = 'h3';
	}

	$post_link = get_the_permalink();
?>
<<?php echo esc_attr($title_tag);?> itemprop="name" class="entry-title eltdf-post-title">
	<?php if($title_post_format === 'link') { ?>
		<?php the_title(); ?>
	<?php } elseif($title_post_format === 'quote') { ?>
		<?php (isset($different_title) && $different_title !== '') ? print esc_html($different_title) : the_title(); ?>
	<?php } else { ?>
		<a itemprop="url" href="<?php echo esc_url($post_link); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
	<?php } ?>
</<?php echo esc_attr($title_tag);?>>