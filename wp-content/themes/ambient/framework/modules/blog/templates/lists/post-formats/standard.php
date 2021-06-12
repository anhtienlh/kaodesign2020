<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="eltdf-post-content">
        <?php if($display_feature_image) {
            $image_param                = array();
            $image_param['post_format'] = $post_format;
            ambient_elated_get_module_template_part('templates/lists/parts/image', 'blog', '', $image_param);
        } ?>
        <div class="eltdf-post-text">
            <?php
            $title_param                      = array();
            $title_param['title_post_format'] = $post_format;
            ambient_elated_get_module_template_part('templates/lists/parts/title', 'blog', '', $title_param);
            ?>
            <div class="eltdf-post-info-holder">
                <div class="eltdf-post-info clearfix">
                    <?php ambient_elated_post_info(array(
                        'date'     => $display_date,
                        'author'   => $display_author,
                        'comments' => $display_comments,
                        'like'     => $display_like,
                        'category' => $display_category,
                        'share'    => $display_share
                    )) ?>
                </div>
            </div>
            <?php if($excerpt_length !== '0') { ?>
                <div class="eltdf-post-excerpt-holder">
                    <?php ambient_elated_excerpt($excerpt_length); ?>
                </div>
            <?php } ?>
            <?php do_action('ambient_elated_blog_list_tags'); ?>
        </div>
    </div>
</article>