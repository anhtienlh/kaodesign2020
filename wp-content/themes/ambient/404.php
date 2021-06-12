<?php get_header(); ?>

	<div class="eltdf-404-background">
		<div class="eltdf-page-not-found">
			<?php if (ambient_elated_options()->getOptionValue('404_page_title_image')) { ?>
				<div class="eltdf-404-title-image">
					<img src="<?php echo esc_url(ambient_elated_options()->getOptionValue('404_page_title_image')); ?>"
						 alt="<?php esc_attr_e('Image12', 'ambient'); ?>"/>
				</div>
			<?php } ?>
			<h1>
				<?php if (ambient_elated_options()->getOptionValue('404_title')) {
					echo esc_html(ambient_elated_options()->getOptionValue('404_title'));
				} else {
					esc_html_e('Page not found', 'ambient');
				} ?>
			</h1>
			<h5 class="eltdf-page-not-found-text">
				<?php if (ambient_elated_options()->getOptionValue('404_text')) {
					echo esc_html(ambient_elated_options()->getOptionValue('404_text'));
				} else {
					esc_html_e('Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'ambient');
				} ?>
			</h5>
			<?php
			if (ambient_elated_core_plugin_installed()) {
				$params = array();
				if (ambient_elated_options()->getOptionValue('404_back_to_home')) {
					$params['text'] = ambient_elated_options()->getOptionValue('404_back_to_home');
				} else {
					$params['text'] = esc_html__('BACK TO HOME', 'ambient');
				}
				$params['link'] = esc_url(home_url('/'));
				$params['target'] = '_self';
				$params['type'] = 'solid';
				$params['size'] = 'large';

				if (ambient_elated_options()->getOptionValue('404_button_style') == 'light-button') {
					$params['custom_class'] = 'eltdf-btn-light';
				}

				echo ambient_elated_execute_shortcode('eltdf_button', $params);
			} else { ?>
				<a itemprop="url" href="<?php echo esc_url(home_url('/')); ?>" target="_self"
				   class="eltdf-btn eltdf-btn-large eltdf-btn-solid">
					<span class="eltdf-btn-text"><?php esc_html_e('BACK TO HOME', 'ambient'); ?></span>
				</a>
			<?php } ?>
		</div>
	</div>
<?php wp_footer(); ?>