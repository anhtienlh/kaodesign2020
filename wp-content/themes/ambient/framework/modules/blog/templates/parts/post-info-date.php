<?php
$month = get_the_time('m');
$year = get_the_time('Y');
?>
<div itemprop="dateCreated" class="eltdf-post-info-date entry-date published updated"><?php if(!ambient_elated_post_has_title()) { ?><a itemprop="url" href="<?php the_permalink() ?>"><?php } else { ?><a itemprop="url" href="<?php echo get_month_link($year, $month); ?>"><?php } ?><?php the_time(get_option('date_format')); ?><?php if(!ambient_elated_post_has_title()) { ?></a><?php } else { ?></a><?php } ?><meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(ambient_elated_get_page_id()); ?>"/></div>