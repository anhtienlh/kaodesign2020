<div class="eltdf-pls-holder <?php echo esc_attr($holder_classes) ?>">
    <ul class="eltdf-pls-inner">
        <?php if($query_result->have_posts()): while ($query_result->have_posts()) : $query_result->the_post(); ?>
            <li class="eltdf-pls-item">
                <div class="eltdf-pls-image">
                    <a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <?php echo get_the_post_thumbnail(get_the_ID(), apply_filters('ambient_elated_product_list_simple_image_size', 'shop_thumbnail')) ?>
                    </a>    
                </div>
                <div class="eltdf-pls-text">
                    <?php if($display_title === 'yes') {
                        echo ambient_elated_woocommerce_title_html_part('pls', $title_tag, 'yes', $title_styles);
                    } ?>
                    <?php if ($display_rating === 'yes') {
                        echo ambient_elated_woocommerce_rating_html_part('pls');
                    } ?>
                    <?php if($display_price === 'yes') {
                        echo ambient_elated_woocommerce_price_html_part('pls');
                    } ?>
                </div>
            </li>
        <?php endwhile; else: ?>
            <li class="eltdf-pls-messsage">
                <?php ambient_elated_woocommerce_no_products_found_html_part('pls'); ?>
            </li>
        <?php endif;
            wp_reset_postdata();
        ?>
    </ul>
</div>