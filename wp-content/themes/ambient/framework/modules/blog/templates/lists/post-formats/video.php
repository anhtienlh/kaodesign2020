<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="eltdf-post-content">
		<div class="eltdf-post-video-holder">
			<?php ambient_elated_get_module_template_part('templates/parts/video', 'blog'); ?>
		</div>
		<div class="eltdf-post-text">
			<?php
				$title_param = array();
				$title_param['title_post_format'] = $post_format;
				ambient_elated_get_module_template_part('templates/lists/parts/title', 'blog', '', $title_param);
			?>
			<div class="eltdf-post-info-holder">
				<div class="eltdf-post-info clearfix">
					<?php ambient_elated_post_info(array(
						'author' => $display_author,
						'date' => $display_date,
						'category' => $display_category,
						'comments' => $display_comments,
						'like' => $display_like,
						'share' => $display_share
					)) ?>
				</div>
			</div>
			<?php if($excerpt_length !== '0') { ?>
				<div class="eltdf-post-excerpt-holder">
					<?php ambient_elated_excerpt($excerpt_length); ?>
				</div>
			<?php } ?>
			<?php do_action('ambient_elated_blog_list_tags'); ?>
		</div>
	</div>
</article>