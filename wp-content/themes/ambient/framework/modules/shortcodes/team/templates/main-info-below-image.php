<div class="eltdf-team-holder <?php echo esc_attr($holder_classes); ?>">
	<div class="eltdf-team-inner">
		<?php if ($team_image !== '') { ?>
			<div class="eltdf-team-image">
                <?php echo wp_get_attachment_image($team_image, 'full'); ?>
			</div>
		<?php } ?>
		<div class="eltdf-team-info">
			<?php if ($team_name !== '') { ?>
				<<?php echo esc_attr($team_name_tag); ?> class="eltdf-team-name" <?php echo ambient_elated_get_inline_style($team_name_styles); ?>><?php echo esc_html($team_name); ?></<?php echo esc_attr($team_name_tag); ?>>
			<?php } ?>
			<?php if ($team_position !== "") { ?>
				<h6 class="eltdf-team-position" <?php echo ambient_elated_get_inline_style($team_position_styles); ?>><?php echo esc_html($team_position); ?></h6>
			<?php } ?>
			<?php if ($team_excerpt !== "") { ?>
				<p class="eltdf-team-excerpt" <?php echo ambient_elated_get_inline_style($team_excerpt_styles); ?>><?php echo esc_html($team_excerpt); ?></p>
			<?php } ?>
			<?php if (!empty($team_social_icons)) { ?>
				<div class="eltdf-team-social-holder" <?php echo ambient_elated_get_inline_style($team_social_styles); ?>>
					<?php foreach( $team_social_icons as $team_social_icon ) { ?>
						<span class="eltdf-team-icon"><?php echo ambient_elated_get_module_part( $team_social_icon ); ?></span>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
	</div>
</div>