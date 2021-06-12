<div class="eltdf-core-dashboard wrap about-wrap">
	<div class="eltdf-cd-title-holder">
		<img class="eltdf-cd-logo" src="<?php echo  plugins_url( ELATED_CORE_REL_PATH . '/core-dashboard/assets/img/logo.png' ); ?>" alt="<?php esc_attr_e('Qode', 'ambient-core') ?>" />
		<h1 class="eltdf-cd-title"><?php esc_html_e('Welcome to ', 'ambient-core'); echo wp_get_theme()->Name;  ?></h1>
	</div>
	<h4 class="eltdf-cd-subtitle"><?php echo sprintf( esc_html__( 'Thank you for choosing %s. Now it\'s time to create something awesome.', 'ambient-core' ), wp_get_theme()->Name ); ?></h4>
	<div class="eltdf-core-dashboard-inner">
		<div class="eltdf-core-dashboard-column">
			<div class="eltdf-core-dashboard-box eltdf-core-bottom-space">
				<div class="eltdf-cd-box-title-holder">
					<h2><?php esc_html_e('Registration', 'ambient-core'); ?></h2>
					<?php if(!$is_activated) {  ?>
					<p><?php esc_html_e('Please input the purchase code you received with the theme as well as your email address in order to activate your copy of the theme.', 'ambient-core'); ?></p>
					<?php } else { ?>
					<p><?php esc_html_e('You have successfully registered your copy of the theme! ', 'ambient-core'); ?></p>
					<?php } ?>
				</div>
				<div class="eltdf-cd-box-inner">
					<form method="post" action="" id="eltdf-register-purchase-form">
						<?php if(!$is_activated) { ?>
							<div class="eltdf-cd-box-section eltdf-activation-holder" >
								<h3><?php esc_html_e('Register your theme', 'ambient-core'); ?></h3>
								<div class="eltdf-cd-field-holder" data-empty-field = "<?php esc_html_e('Field is empty', 'ambient-core'); ?>" >
									<label class="eltdf-cd-label"><?php esc_html_e('Purchase Code', 'ambient-core'); ?></label>
									<input type="text" name="purchase_code" class="eltdf-cd-input eltdf-cd-required" required>
								</div>
								<div class="eltdf-cd-field-holder" data-empty-field = "<?php esc_html_e('Field is empty', 'ambient-core'); ?>" data-invalid-field = "<?php esc_html_e('Email is not valid', 'ambient-core'); ?>">
									<label class="eltdf-cd-label"><?php esc_html_e('Email', 'ambient-core'); ?></label>
									<input type="text" name="email" class="eltdf-cd-input eltdf-cd-required" required>
								</div>
								<div class="eltdf-cd-field-holder">
									<input type="submit" class="eltdf-cd-button" value="<?php esc_attr_e('Register Theme', 'ambient-core'); ?>" name="check" id="eltdf-register-purchase-key" />
									<span class="eltdf-cd-button-wait"><?php esc_attr_e('Please Wait...', 'ambient-core'); ?></span>
								</div>
							</div>
						<?php } else { ?>
							<div class="eltdf-cd-box-section eltdf-deactivation-holder">
								<h3><?php esc_html_e('Deregister your theme', 'ambient-core'); ?></h3>
								<div class="eltdf-cd-field-holder">
									<label class="eltdf-cd-label"><?php esc_html_e('Purchase Code', 'ambient-core'); ?></label>
									<input type="text" name="text" class="eltdf-cd-input eltdf-cd-required" value="<?php echo $info['purchase_code']; ?>" disabled>
								</div>
								<div class="eltdf-cd-field-holder">
									<input type="submit" class="eltdf-cd-button" value="<?php esc_attr_e('Deregister Theme', 'ambient-core'); ?>" name="check" id="eltdf-deregister-purchase-key" />
									<span class="eltdf-cd-button-wait"><?php esc_attr_e('Please Wait...', 'ambient-core'); ?></span>
								</div>
							</div>
						<?php } ?>
						<div class="message"></div>
					</form>
				</div>
			</div>
			<div class="eltdf-core-dashboard-box">
				<div class="eltdf-cd-box-title-holder">
					<h2><?php esc_html_e('System Information', 'ambient-core'); ?></h2>
					<p><?php esc_html_e('Here is an overview of your current server configuration info.', 'ambient-core'); ?></p>
				</div>
				<div class="eltdf-cd-box-inner">
					<?php foreach ($system_info as $system_info_key => $system_info_value):
						$class = (isset($system_info_value['pass']) && !$system_info_value['pass']) ? 'eltdf-cdb-value-false' : '';
						?>
						<div class="eltdf-cd-box-row">
							<div class="eltdf-cdb-label"><?php echo esc_attr($system_info_value['title']); ?></div>
							<div class="eltdf-cdb-value <?php echo esc_attr($class); ?>"><span><?php echo wp_kses_post($system_info_value['value']); ?></span>
								<?php if(isset($system_info_value['notice']) && (isset($system_info_value['pass']) && !$system_info_value['pass'])){ ?>
									<?php echo esc_html($system_info_value['notice']); ?>
								<?php } ?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<div class="eltdf-core-dashboard-column eltdf-cd-smaller-column">
			<div class="eltdf-core-dashboard-box">
				<div class="eltdf-cd-box-title-holder">
					<h2><?php esc_html_e('Useful links', 'ambient-core'); ?></h2>
				</div>

				<div class="eltdf-cd-box-inner">
					<ul class="eltdf-cd-box-list">
						<li><a href="<?php echo sprintf('http://ambient.%s-themes.com/documentation/', ELATED_PROFILE_SLUG ); ?>" target="_blank"><?php esc_html_e( 'Theme Documentation', 'ambient-core' ); ?></a></li>
						<li><a href="https://helpcenter.qodeinteractive.com" target="_blank"><?php esc_html_e('Support center', 'ambient-core'); ?></a></li>
						<li><a href="https://www.youtube.com/QodeInteractiveVideos" target="_blank"><?php esc_html_e('Video tutorials', 'ambient-core'); ?></a></li>
						<li><a href="https://qodeinteractive.com" target="_blank"><?php esc_html_e('Qode Interactive themes', 'ambient-core'); ?></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>