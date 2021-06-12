<div class="eltdf-social-share-holder eltdf-dropdown">
	<a href="javascript:void(0)" target="_self" class="eltdf-social-share-dropdown-opener">
        <span class="eltdf-social-share-title"><?php esc_html_e('Share this', 'ambient') ?></span>
		<i class="social_share"></i>
	</a>
	<div class="eltdf-social-share-dropdown">
		<ul>
			<?php foreach ($networks as $net) {
				echo ambient_elated_get_module_part( $net );
			} ?>
		</ul>
	</div>
</div>