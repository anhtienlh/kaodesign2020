<div <?php ambient_elated_class_attribute($filter_classes); ?>>
	<div class="eltdf-portfolio-filter-holder-inner">
		<?php $rand_number = rand(); ?>
		<ul class="eltdf-portfolio-filter-parent-categories clearfix"
			data-class="filter_<?php print $rand_number ?>">
			<?php
			$parent = array();
			?>

			<li class="parent-filter eltdf-filter filter"
				data-filter=".portfolio_category_0">
					<span>
						<?php esc_html_e('All', 'ambient'); ?>
			</span>
			</li>
			<?php

			foreach ($filter_categories as $parent_key => $parent_value) {
				if ($parent_key !== 0) {
                    $term = get_term( $parent_key, 'portfolio-category');
                    ?>
					<li class="parent-filter eltdf-filter filter"
						data-filter=".portfolio_category_<?php print $parent_key; ?>"
						data-group-id="<?php print $parent_key ?>">
						<span>
							<?php print $term->name; ?>
						</span>
					</li>
				<?php }
			} ?>
		</ul>
		<?php if ($filter_categories) { ?>
			<div class="eltdf-portfolio-filter-child-categories-holder">
				<?php foreach ($filter_categories as $parent_key => $parent_value) {
					if (is_array($parent_value) && $parent_key != 0) { ?>
						<ul class="eltdf-portfolio-filter-child-categories clearfix"
							data-parent-id="<?php print $parent_key; ?>"
							data-class="filter_<?php print $rand_number ?>">
							<?php
							foreach ($parent_value as $child_key => $child_value) {
                                $term = get_term( $child_value, 'portfolio-category'); ?>
								<li data-class="filter" class="eltdf-filter filter"
									data-filter=".portfolio_category_<?php print $child_value ?>">
									<span>
										<?php print $term->name; ?>
									</span>
								</li>
							<?php } ?>
						</ul>
					<?php
					}
				} ?>
			</div>
		<?php } ?>
	</div>
</div>