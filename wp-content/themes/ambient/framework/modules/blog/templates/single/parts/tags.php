<?php if(ambient_elated_options()->getOptionValue('blog_single_tags') == 'yes' && has_tag()){ ?>
    <div class="eltdf-single-tags-holder">
        <div class="eltdf-tags">
            <?php the_tags('', ',', ''); ?>
        </div>
    </div>
<?php } ?>