<div class="eltdf-pl-holder <?php echo esc_attr($holder_classes) ?>">
	<div class="eltdf-pl-outer">
		<?php if($type === 'masonry') { ?>
		<div class="eltdf-pl-sizer"></div>
		<div class="eltdf-pl-gutter"></div>
		<?php } ?>
		<?php if($query_result->have_posts()): while ($query_result->have_posts()) : $query_result->the_post(); ?>
			<?php 
				$masonry_image_size = get_post_meta(get_the_ID(), 'eltdf_product_featured_image_size', true);
				if(empty($masonry_image_size)) {
					$masonry_image_size = '';
				}
			
				$hover_image_classes = '';
				$hover_image_meta = get_post_meta(get_the_ID(), 'eltdf_product_hover_featured_image_meta', true);
				if(!empty($hover_image_meta)) {
					$hover_image_classes = 'eltdf-has-hover-image';
				}
			?>
			<div class="eltdf-pli <?php echo esc_html($masonry_image_size); ?>">
				<div class="eltdf-pli-inner">
					<div class="eltdf-pli-image <?php echo esc_attr($hover_image_classes); ?>">
						<?php echo ambient_elated_woocommerce_image_html_part('pli', $image_size, $hover_image_meta); ?>
					</div>
					<?php if($info_position === 'info_on_image_hover') { ?>
						<div class="eltdf-pli-text" <?php echo ambient_elated_get_inline_style($shader_styles); ?>>
							<div class="eltdf-pli-text-outer">
								<div class="eltdf-pli-text-inner">
									<?php if($display_title === 'yes') {
										echo ambient_elated_woocommerce_title_html_part('pli', $title_tag, '', $title_styles);
									} ?>
									<?php if($display_category === 'yes') {
										echo ambient_elated_woocommerce_category_html_part('pli');
									} ?>
									<?php if($display_excerpt === 'yes' && $excerpt_length !== '0') {
										echo ambient_elated_woocommerce_excerpt_html_part('pli', $excerpt_length);
									} ?>
									<?php if ($display_rating === 'yes') {
										echo ambient_elated_woocommerce_rating_html_part('pli');
									} ?>
									<?php if($display_price === 'yes') {
										echo ambient_elated_woocommerce_price_html_part('pli');
									} ?>
									<?php if($display_button === 'yes') {
										echo ambient_elated_woocommerce_add_to_cart_html_part('pli', $button_skin);
									} ?>
								</div>
							</div>
						</div>
					<?php } ?>
					<?php if($display_button === 'yes' && $info_position === 'info_below_image') { ?>
						<div class="eltdf-pli-text" <?php echo ambient_elated_get_inline_style($shader_styles); ?>>
							<div class="eltdf-pli-text-outer">
								<div class="eltdf-pli-text-inner">
									<?php echo ambient_elated_woocommerce_add_to_cart_html_part('pli', $button_skin); ?>
								</div>
							</div>
						</div>
					<?php } ?>
					<a class="eltdf-pli-link" itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>
				</div>
				<?php if($info_position === 'info_below_image') { ?>
					<div class="eltdf-pli-text-wrapper" <?php echo ambient_elated_get_inline_style($text_wrapper_styles); ?>>
						<?php if($display_title === 'yes') {
							echo ambient_elated_woocommerce_title_html_part('pli', $title_tag, 'yes', $title_styles);
						} ?>
						<?php if($display_category === 'yes') {
							echo ambient_elated_woocommerce_category_html_part('pli');
						} ?>
						<?php if($display_excerpt === 'yes' && $excerpt_length !== '0') {
							echo ambient_elated_woocommerce_excerpt_html_part('pli', $excerpt_length);
						} ?>
						<?php if ($display_rating === 'yes') {
							echo ambient_elated_woocommerce_rating_html_part('pli');
						} ?>
						<?php if($display_price === 'yes') {
							echo ambient_elated_woocommerce_price_html_part('pli');
						} ?>
					</div>
				<?php } ?>	
			</div>
		<?php endwhile;	else:
			ambient_elated_woocommerce_no_products_found_html_part('pli');
		endif;
			wp_reset_postdata();
		?>
	</div>
</div>