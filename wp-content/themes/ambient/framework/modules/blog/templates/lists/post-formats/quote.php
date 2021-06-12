<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="eltdf-quote-content">
        <?php
        $title_param                      = array();
        $title_param['title_post_format'] = $post_format;
        $title_param['title_tag']         = 'h6';

        $quote_text_meta   = esc_html(get_post_meta(get_the_ID(), "eltdf_post_quote_text_meta", true));
        $quote_author_meta = esc_html(get_post_meta(get_the_ID(), "eltdf_post_quote_author_meta", true));

        if($quote_text_meta !== '') {
            $title_param['different_title'] = $quote_text_meta;
        }
        ?>
        <a itemprop="url" class="eltdf-quote-text" href="<?php the_permalink(); ?>">
            <?php ambient_elated_get_module_template_part('templates/lists/parts/title', 'blog', '', $title_param); ?>
            <?php if($quote_text_meta !== '' && $quote_author_meta !== '') { ?>
                <span class="eltdf-quote-author">- <?php echo ambient_elated_get_module_part( $quote_author_meta ); ?> -</span>
            <?php } ?>
        </a>
    </div>
</article>