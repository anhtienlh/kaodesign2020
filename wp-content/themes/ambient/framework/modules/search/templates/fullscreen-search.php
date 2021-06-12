<div class="eltdf-fullscreen-search-holder">
	<div class="eltdf-fullscreen-search-close-container">
		<a class="eltdf-fullscreen-search-close" href="javascript:void(0)">
			<span class="icon-arrows-remove"></span>
		</a>
	</div>
	<div class="eltdf-fullscreen-search-table">
		<div class="eltdf-fullscreen-search-cell">
			<form action="<?php echo esc_url(home_url('/')); ?>" class="eltdf-fullscreen-search-form" method="get">
				<div class="eltdf-form-holder">
					<div class="eltdf-form-holder-inner">
						<div class="eltdf-field-holder">
							<input type="text"  placeholder="<?php esc_attr_e('SEARCH FOR...', 'ambient'); ?>" name="s" class="eltdf-search-field" autocomplete="off" />
						</div>
						<button type="submit" class="eltdf-search-submit"><span class="icon_search "></span></button>
						<div class="eltdf-line"></div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>