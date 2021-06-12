<?php if($show_header_top) : ?>

<?php do_action('ambient_elated_before_header_top'); ?>

<div class="eltdf-top-bar">
    <?php if($top_bar_in_grid) : ?>
    <div class="eltdf-grid">
    <?php endif; ?>
		<?php do_action( 'ambient_elated_after_header_top_html_open' ); ?>
        <div class="eltdf-vertical-align-containers eltdf-50-50">
            <div class="eltdf-position-left">
                <div class="eltdf-position-left-inner">
                    <?php if(is_active_sidebar('eltdf-top-bar-left')) : ?>
                        <?php dynamic_sidebar('eltdf-top-bar-left'); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="eltdf-position-right">
                <div class="eltdf-position-right-inner">
                    <?php if(is_active_sidebar('eltdf-top-bar-right')) : ?>
                        <?php dynamic_sidebar('eltdf-top-bar-right'); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php if($top_bar_in_grid) : ?>
    </div>
    <?php endif; ?>
</div>

<?php do_action('ambient_elated_after_header_top'); ?>

<?php endif; ?>