<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="eltdf-post-content">
        <?php
        $image_param                = array();
        $image_param['post_format'] = $post_format;
        ambient_elated_get_module_template_part('templates/single/parts/image', 'blog', '', $image_param); ?>
        <div class="eltdf-post-text">
            <?php
            $title_param                      = array();
            $title_param['title_post_format'] = $post_format;
            ambient_elated_get_module_template_part('templates/single/parts/title', 'blog', '', $title_param);
            ?>
            <div class="eltdf-post-info-holder clearfix">
                <div class="eltdf-post-info">
                    <?php ambient_elated_post_info(array(
                        'author'   => $display_author,
                        'date'     => $display_date,
                        'category' => $display_category,
                        'comments' => $display_comments,
                        'like'     => $display_like,
                        'share'    => $display_share
                    )) ?>
                </div>
            </div>
            <?php the_content(); ?>
        </div>
    </div>
    <?php do_action('ambient_elated_before_blog_article_closed_tag'); ?>
</article>