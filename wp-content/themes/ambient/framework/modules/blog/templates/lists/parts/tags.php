<?php if(ambient_elated_options()->getOptionValue('blog_list_tags') == 'yes' && has_tag()){ ?>
	<div class="eltdf-single-tags-holder eltdf-list-tags">
		<div class="eltdf-tags">
			<?php the_tags('', ',', ''); ?>
		</div>
	</div>
<?php } ?>