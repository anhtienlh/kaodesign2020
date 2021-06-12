<li class="eltdf-bli">
	<div class="eltdf-bli-inner">
		<div class="eltdf-item-text-holder">
			<div class="eltdf-bli-info">
				<?php ambient_elated_post_info(array('date' => 'yes')); ?>
			</div>
			<span itemprop="name" class="eltdf-bli-title entry-title" <?php ambient_elated_inline_style($title_styles); ?>>
				<span class="eltdf-bli-title-inner"><a itemprop="url" href="<?php echo the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></span>
			</span>
		</div>
	</div>
</li>