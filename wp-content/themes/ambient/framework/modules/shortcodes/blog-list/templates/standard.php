<li class="eltdf-bli clearfix">
	<div class="eltdf-bli-inner">
		<?php if ( has_post_thumbnail() ) { ?>
			<div class="eltdf-bli-image">
				<a itemprop="url" href="<?php echo esc_url(get_permalink()); ?>">
					<?php echo get_the_post_thumbnail(get_the_ID(), $thumb_image_size); ?>
				</a>
			</div>
		<?php } ?>
		<div class="eltdf-item-text-holder">
			<?php if($post_info_section === 'yes') { ?>
				<div class="eltdf-bli-info">
					<?php ambient_elated_post_info(array(
						'author' => $post_info_author,
						'date' => $post_info_date,
						'category' => $post_info_category,
						'comments' => $post_info_comments,
						'like' => $post_info_like,
						'share' => $post_info_share
					)) ?>
				</div>
			<?php } ?>

			<<?php echo esc_attr($title_tag)?> itemprop="name" class="eltdf-bli-title entry-title" <?php ambient_elated_inline_style($title_styles); ?>>
				<span class="eltdf-bli-title-inner"><a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></span>
			</<?php echo esc_attr($title_tag) ?>>

			<?php if ($text_length != '0') {
				$excerpt = ($text_length > 0) ? substr(get_the_excerpt(), 0, intval($text_length)) : get_the_excerpt(); ?>
				<div class="eltdf-bli-excerpt-holder"><p itemprop="description" class="eltdf-bli-excerpt"><?php echo esc_html($excerpt)?></p></div>
			<?php } ?>

			<?php
			$params = array();
			$params['post_info_tags'] = $post_info_tags;
			ambient_elated_get_module_template_part('blog-list/templates/parts/tags', 'shortcodes', '', $params);
			?>

			<?php if ($enable_read_more_button === 'yes') { ?>
				<div class="eltdf-bli-read-more-holder">
					<a class="eltdf-btn eltdf-btn-medium eltdf-btn-simple" href="<?php echo get_the_permalink(); ?>" target="_self"><span class="eltdf-btn-text"><?php esc_html_e('Read More', 'ambient'); ?></span></a>
				</div>
			<?php } ?>
		</div>
	</div>	
</li>