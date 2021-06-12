<div class="eltdf-two-columns-33-66 clearfix">
    <div class="eltdf-column1">
        <div class="eltdf-column-inner">
            <div class="eltdf-portfolio-info-holder">
                <?php
                //get portfolio content section with author
                ambient_elated_portfolio_get_info_part('content');
        
                //get portfolio custom fields section
                ambient_elated_portfolio_get_info_part('custom-fields');
        
                //get portfolio categories section
                ambient_elated_portfolio_get_info_part('categories');
        
                //get portfolio date section
                ambient_elated_portfolio_get_info_part('date');
        
                //get portfolio tags section
                ambient_elated_portfolio_get_info_part('tags');
        
                //get portfolio share section
                ambient_elated_portfolio_get_info_part('social');
                ?>
            </div>
        </div>
    </div>
    <div class="eltdf-column2">
        <div class="eltdf-column-inner">
            <?php
            $media = ambient_elated_get_portfolio_single_media();
    
            if(is_array($media) && count($media)) : ?>
                <div class="eltdf-portfolio-media">
                    <?php foreach($media as $single_media) : ?>
                        <div class="eltdf-portfolio-single-media">
                            <?php ambient_elated_portfolio_get_media_html($single_media); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>