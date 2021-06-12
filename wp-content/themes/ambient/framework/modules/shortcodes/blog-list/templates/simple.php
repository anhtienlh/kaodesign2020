<li class="eltdf-bli clearfix">
	<div class="eltdf-bli-inner">
		<?php if ( has_post_thumbnail() ) { ?>
			<div class="eltdf-bli-image">
				<a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<?php echo get_the_post_thumbnail(get_the_ID(), array(84, 84)); ?>
				</a>
			</div>
		<?php } ?>
		<div class="eltdf-item-text-holder">
			<<?php echo esc_attr($title_tag);?> itemprop="name" class="eltdf-bli-title entry-title" <?php ambient_elated_inline_style($title_styles); ?>>
				<span class="eltdf-bli-title-inner"><a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></span>
			</<?php echo esc_attr($title_tag);?>>
            <div class="eltdf-bli-info">
                <?php ambient_elated_post_info(array('date' => 'yes')); ?>
            </div>
		</div>
	</div>
</li>