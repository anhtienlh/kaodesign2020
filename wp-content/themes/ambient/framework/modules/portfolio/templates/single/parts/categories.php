<?php if(ambient_elated_options()->getOptionValue('portfolio_single_hide_categories') !== 'yes') : ?>
    <?php
    $categories   = wp_get_post_terms(get_the_ID(), 'portfolio-category');
    if(is_array($categories) && count($categories)) : ?>
        <div class="eltdf-portfolio-info-item eltdf-portfolio-categories">
            <h4 class="eltdf-portfolio-info-title"><?php esc_html_e('Category:', 'ambient'); ?></h4>
            <?php foreach($categories as $cat) { ?>
                <h6 class="eltdf-portfolio-info-category"><a itemprop="url" href="<?php echo esc_url(get_term_link($cat->term_id)); ?>"><?php echo esc_html($cat->name); ?></a></h6>
            <?php } ?>
        </div>
    <?php endif; ?>
<?php endif; ?>
