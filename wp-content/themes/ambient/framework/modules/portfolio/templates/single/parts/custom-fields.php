<?php
$custom_fields = get_post_meta(get_the_ID(), 'eltd_portfolios', true);

if(is_array($custom_fields) && count($custom_fields)) :
    usort($custom_fields, 'ambient_elated_compare_portfolio_options');
    foreach($custom_fields as $custom_field) : ?>
        <div class="eltdf-portfolio-info-item eltdf-portfolio-custom-field">
            <?php if(!empty($custom_field['optionLabel'])) : ?>
                <h4 class="eltdf-portfolio-info-title"><?php echo esc_html($custom_field['optionLabel'].':'); ?></h4>
            <?php endif; ?>
            <h6>
                <?php if(!empty($custom_field['optionUrl'])) : ?><a itemprop="url" href="<?php echo esc_url($custom_field['optionUrl']); ?>"><?php endif; ?>
                    <?php echo esc_html($custom_field['optionValue']); ?>
                <?php if(!empty($custom_field['optionUrl'])) : ?></a><?php endif; ?>
            </h6>
        </div>
    <?php endforeach; ?>
<?php endif; ?>