<?php
	if(isset($title_tag)){
		$title_tag = $title_tag;
	}else{
		$title_tag = 'h3';
	}

	$post_link = '';
	if($title_post_format === 'link') {
		if($title_post_link_link !== '') {
			$post_link = $title_post_link_link;
		} else {
			$post_link = '';
		}
	}
?>
<<?php echo esc_attr($title_tag);?> itemprop="name" class="entry-title eltdf-post-title">
	<?php if (isset($use_different_title) && $use_different_title === true) { ?>
		<?php if($post_link !== '') { ?><a itemprop="url" href="<?php echo esc_url($post_link); ?>" title="<?php echo esc_attr($different_title); ?>"><?php echo esc_html($different_title); ?></a><?php } else { echo esc_html($different_title); } ?>
	<?php } else { ?>
		<?php if($post_link !== '') { ?><a itemprop="url" href="<?php echo esc_url($post_link); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a><?php } else { the_title(); } ?>
	<?php } ?>
</<?php echo esc_attr($title_tag);?>>