<?php if(get_post_meta(get_the_ID(), "eltdf_post_audio_link_meta", true) !== ""){ ?>
	<div class="eltdf-blog-audio-holder">
		<audio class="eltdf-blog-audio" src="<?php echo esc_url(get_post_meta(get_the_ID(), "eltdf_post_audio_link_meta", true)) ?>" controls="controls">
			<?php esc_html_e("Your browser don't support audio player","ambient"); ?>
		</audio>
	</div>
<?php } ?>