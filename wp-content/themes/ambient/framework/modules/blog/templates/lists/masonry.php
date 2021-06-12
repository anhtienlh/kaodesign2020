<div class="eltdf-blog-holder eltdf-blog-type-masonry eltdf-masonry-pagination-<?php echo ambient_elated_options()->getOptionValue('masonry_pagination'); ?>">
	<div class="eltdf-blog-masonry-grid-sizer"></div>
	<div class="eltdf-blog-masonry-grid-gutter"></div>
	<?php
		if($blog_query->have_posts()) : while ( $blog_query->have_posts() ) : $blog_query->the_post();
			ambient_elated_get_post_format_html($blog_type);
		endwhile;
		else:
			ambient_elated_get_module_template_part('templates/parts/no-posts', 'blog');
		endif;
	?>
</div>
<?php
	if(ambient_elated_options()->getOptionValue('pagination') == 'yes') {
		$pagination_type = ambient_elated_options()->getOptionValue('masonry_pagination');
		if($pagination_type !== 'standard'){
			if(get_next_posts_page_link($blog_query->max_num_pages)){ ?>
				<div class="eltdf-bli-loading">
					<div class="eltdf-bli-loading-bounce1"></div>
					<div class="eltdf-bli-loading-bounce2"></div>
					<div class="eltdf-bli-loading-bounce3"></div>
				</div>
				<div class="eltdf-blog-<?php echo esc_attr($pagination_type); ?>-button-holder">
					<span class="eltdf-blog-<?php echo esc_attr($pagination_type); ?>-button" data-rel="<?php echo esc_attr($blog_query->max_num_pages); ?>">
						<?php
							echo ambient_elated_get_button_html(array(
								'link' => get_next_posts_page_link($blog_query->max_num_pages),
								'type' => 'solid',
								'size' => 'large',
								'text' => esc_html__('LOAD MORE', 'ambient')
							));
						?>
					</span>
				</div>
			<?php }
		} else {
			ambient_elated_pagination($blog_query->max_num_pages, $blog_page_range, $paged);
		}
	}
?>