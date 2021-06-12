<?php if($post_info_tags == 'yes' && has_tag()){ ?>
	<div class="eltdf-single-tags-holder eltdf-list-tags">
		<div class="eltdf-tags">
			<?php the_tags('', ',', ''); ?>
		</div>
	</div>
<?php } ?>