<?php if(ambient_elated_options()->getOptionValue('portfolio_single_hide_date') !== 'yes') : ?>
    <div class="eltdf-portfolio-info-item eltdf-portfolio-date">
        <h4 class="eltdf-portfolio-info-title"><?php esc_html_e('Date:', 'ambient'); ?></h4>
        <h6 itemprop="dateCreated" class="eltdf-portfolio-info-date entry-date updated"><?php the_time(get_option('date_format')); ?></h6>
        <meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(ambient_elated_get_page_id()); ?>"/>
    </div>
<?php endif; ?>