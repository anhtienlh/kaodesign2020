<?php
$article_class = get_post_class(array($article_classes));
$article_class = implode(' ', $article_class);
?>
<article class="eltdf-pl-item <?php echo esc_attr($article_class); ?> <?php echo esc_attr($categories)?>">
	<div class="eltdf-pl-item-inner">
		<div class="eltdf-pli-image">
            <?php if($info_position == 'below-image'){ ?>
                <div class="eltdf-pli-image-shader" <?php ambient_elated_inline_style($shader_styles); ?>></div>
            <?php
            }
            ?>
			<?php if(has_post_thumbnail()) { ?>
				<?php echo get_the_post_thumbnail(get_the_ID(),$thumb_size); ?>
			<?php } else { ?>
				<img itemprop="image" class="eltdf-pl-original-image" width="800" height="600" src="<?php echo ELATED_ASSETS_ROOT.'/img/portfolio_featured_image.jpg'; ?>" alt="<?php esc_html_e('Portfolio Featured Image', 'eltdf-core'); ?>" />
			<?php } ?>
			<?php if($image_hover_type2 === 'switch-image' && $switch_featured_image !== '' && $info_position === 'below-image') { ?>
				<img itemprop="image" class="eltdf-pl-switch-image" src="<?php echo esc_url($switch_featured_image); ?>" alt="<?php esc_html_e('Portfolio Switch Featured Image', 'eltdf-core'); ?>" />
			<?php } ?>
		</div>
		<?php if($disable_title !== 'yes' || $disable_category !== 'yes' || $disable_excerpt !== 'yes') { ?>
			<div class="eltdf-pli-text-holder" <?php ambient_elated_inline_style($text_holder_styles); ?>>
				<div class="eltdf-pli-text-wrapper">
					<div class="eltdf-pli-text" <?php ambient_elated_inline_style($text_inner_styles); ?>>
						<div class="eltdf-pli-text-inner">
						<?php if ($disable_title !== 'yes') { ?>
							<<?php echo esc_attr($title_tag); ?> itemprop="name" class="eltdf-pli-title entry-title" <?php ambient_elated_inline_style($title_styles); ?>>
								<?php echo esc_attr(get_the_title()); ?>
							</<?php echo esc_attr($title_tag); ?>>
						<?php } ?>

						<?php if ($disable_category !== 'yes') {
							print $category_html;
						} ?>
					
						<?php if ($excerpt_length !== '0' && $excerpt_length !== '' && $disable_excerpt !== 'yes') {
							$excerpt = ($excerpt_length > 0) ? substr(get_the_excerpt(), 0, intval($excerpt_length)) : get_the_excerpt(); ?>
							<p itemprop="description" class="eltdf-pli-excerpt" <?php ambient_elated_inline_style($excerpt_styles); ?>><?php echo esc_html($excerpt)?></p>
						<?php } ?>
					</div>
			</div>
				</div>
			</div>
		<?php } ?>
		<a itemprop="url" class="eltdf-pli-link" href="<?php echo esc_url($item_link['link']); ?>" target="<?php echo esc_attr($item_link['target']); ?>"></a>
	</div>
</article>