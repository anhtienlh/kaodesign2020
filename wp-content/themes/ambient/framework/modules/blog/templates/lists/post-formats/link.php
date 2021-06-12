<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="eltdf-link-content">
		<?php
			$title_param = array();
			$title_param['title_post_format'] = $post_format;
			$title_param['title_tag'] = 'h3';

			$post_link_link = esc_html(get_post_meta(get_the_ID(), "eltdf_post_link_link_meta", true));
		?>
		<?php if ($post_link_link !== '') { ?>
			<a itemprop="url" class="eltdf-link-text" href="<?php echo ambient_elated_get_module_part( $post_link_link ); ?>" target="_blank">
				<?php ambient_elated_get_module_template_part('templates/lists/parts/title', 'blog', '', $title_param); ?>
				<span class="eltdf-link-url"><?php echo ambient_elated_get_module_part( $post_link_link ); ?></span>
			</a>
		<?php } ?>
	</div>
</article>