<div class="eltdf-related-posts-holder clearfix">
	<div class="eltdf-related-posts-holder-inner">
		<?php if ( $related_posts && $related_posts->have_posts() ) : ?>
			<div class="eltdf-related-posts-title">
				<h4><?php esc_html_e('RELATED POSTS', 'ambient' ); ?></h4>
			</div>
			<div class="eltdf-related-posts-inner clearfix">
				<?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
					<div class="eltdf-related-post">
						<div class="eltdf-related-post-inner">
							<div class="eltdf-related-post-image">
								<?php if (has_post_thumbnail()) { ?>
									<a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
										<?php if($related_posts_image_size !== '') {
											the_post_thumbnail(array($related_posts_image_size, 0));
										} else {
											the_post_thumbnail('ambient_elated_landscape');
										} ?>
									</a>
								<?php }	?>
							</div>
							<h4><a itemprop="name" class="entry-title eltdf-post-title" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
							<div class="eltdf-post-info">
								<?php ambient_elated_post_info(array(
									'author' => 'yes',
									'date' => 'yes'
								)) ?>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif;
		wp_reset_postdata();
		?>
	</div>
</div>