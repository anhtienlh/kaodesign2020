<form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
	<div><label class="screen-reader-text" for="s"><?php esc_html_e('Search for:', 'ambient'); ?></label>
		<input type="text" value="" placeholder="<?php esc_attr_e('Search', 'ambient'); ?>" name="s" id="s"/>
		<button type="submit" id="searchsubmit"><span class="lnr lnr-magnifier"></span></button>
	</div>
</form>