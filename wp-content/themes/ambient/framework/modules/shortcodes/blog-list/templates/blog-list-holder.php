<div class="eltdf-blog-list-holder <?php echo esc_attr($holder_classes); ?>" <?php echo esc_attr($data_atts); ?>>
	<?php if ($type === 'standard') { ?>
	<div class="eltdf-blh-inner">
	<?php } ?>
	<ul class="eltdf-blog-list">
		<?php if ($type === 'masonry') { ?>
			<div class="eltdf-blog-masonry-grid-sizer"></div>
			<div class="eltdf-blog-masonry-grid-gutter"></div>
		<?php } ?>
		<?php 
		$html = '';
			if($query_result->have_posts()):
			while ($query_result->have_posts()) : $query_result->the_post();
				$html .= ambient_elated_get_shortcode_module_template_part('templates/'.$type, 'blog-list', '', $params);
			endwhile;
				echo ambient_elated_get_module_part( $html );
			else: ?>
			<div class="eltdf-blog-list-messsage">
				<p><?php esc_html_e('No posts were found.', 'ambient'); ?></p>
			</div>
			<?php endif;
			wp_reset_postdata();
		?>
	</ul>
	<?php if ($type === 'standard') { ?>
	</div>
	<?php } ?>
	<?php if($enable_load_more_button === 'yes') { ?>
		<div class="eltdf-bli-loading">
			<div class="eltdf-bli-loading-bounce1"></div>
			<div class="eltdf-bli-loading-bounce2"></div>
			<div class="eltdf-bli-loading-bounce3"></div>
		</div>
		<div class="eltdf-bli-load-more-holder">
			<div class="eltdf-bli-load-more">
				<?php
				echo ambient_elated_get_button_html(array(
					'link' => '#',
					'type' => 'solid',
					'text' => esc_html__('LOAD MORE', 'ambient'),
					'custom_class' => 'eltdf-btn-custom-hover-color'
				));
				?>
			</div>
		</div>
	<?php } ?>
</div>