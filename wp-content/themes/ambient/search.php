<?php get_header(); ?>
<?php 

$blog_page_range = ambient_elated_get_blog_page_range();
$max_number_of_pages = ambient_elated_get_max_number_of_pages();

if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }

$enable_search_page_sidebar = true;
if(ambient_elated_options()->getOptionValue('enable_search_page_sidebar') === "no"){
	$enable_search_page_sidebar = false;
}
?>
<?php ambient_elated_get_title(); ?>
	<div class="eltdf-container">
		<?php do_action('ambient_elated_after_container_open'); ?>
		<div class="eltdf-container-inner clearfix">
			<div class="eltdf-container">
				<?php do_action('ambient_elated_after_container_open'); ?>
				<div class="eltdf-container-inner">
					<?php if($enable_search_page_sidebar) { ?>
					<div class="eltdf-two-columns-75-25 eltdf-content-has-sidebar clearfix">
						<div class="eltdf-column1">
							<div class="eltdf-column-inner">
					<?php } ?>		
								<div class="eltdf-search-page-holder">
									<form action="<?php echo esc_url(home_url('/')); ?>" class="eltdf-search-page-form" method="get">
										<h2 class="eltdf-search-title"><?php esc_html_e('Search results', 'ambient'); ?>:</h2>
										<div class="eltdf-form-holder">
											<div class="eltdf-column-left">
												<input type="text" name="s" class="eltdf-search-field" autocomplete="off" value="" placeholder="<?php esc_attr_e('Type here', 'ambient'); ?>"  />
											</div>
											<div class="eltdf-column-right">
												<button type="submit" class="eltdf-search-submit"><span class="icon_search"></span></button>
											</div>
										</div>
										<div class="eltdf-search-label"><?php esc_html_e("If you are not happy with the results below please do another search", "ambient"); ?></div>
									</form>	
									<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
										<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
											<div class="eltdf-post-content">
												<?php if ( has_post_thumbnail() ) { ?>
													<div class="eltdf-post-image">
														<a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
															<?php the_post_thumbnail('thumbnail'); ?>
														</a>
													</div>
												<?php } ?>
												<div class="eltdf-post-title-area <?php if ( !has_post_thumbnail() ) { echo esc_attr('eltdf-no-thumbnail'); }?>">
													<div class="eltdf-post-title-area-inner">
														<h3 itemprop="name" class="entry-title"><a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
														<?php
															$my_excerpt = get_the_excerpt();
															if ($my_excerpt != '') { ?>
																<p itemprop="description" class="eltdf-post-excerpt"><?php echo esc_html($my_excerpt); ?></p>
															<?php }
														?>
													</div>
												</div>
											</div>
										</article>
									<?php endwhile; ?>
									<?php
										if(ambient_elated_options()->getOptionValue('pagination') == 'yes') {
											ambient_elated_pagination($max_number_of_pages, $blog_page_range, $paged);
										}
									?>
									<?php else: ?>
									<div class="entry">
										<p><?php esc_html_e('No posts were found.', 'ambient'); ?></p>
									</div>
									<?php endif; ?>
								</div>
								<?php do_action('ambient_elated_page_after_content'); ?>
					<?php if($enable_search_page_sidebar) { ?>			
							</div>
						</div>
						<div class="eltdf-column2">
							<?php get_sidebar(); ?>
						</div>
					</div>
					<?php } ?>
				<?php do_action('ambient_elated_before_container_close'); ?>
				</div>
			</div>
		</div>
		<?php do_action('ambient_elated_before_container_close'); ?>
	</div>
<?php get_footer(); ?>