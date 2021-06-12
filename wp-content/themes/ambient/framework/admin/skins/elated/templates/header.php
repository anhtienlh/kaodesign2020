<div class="eltdf-page-header page-header clearfix">

    <div class="eltdf-theme-name pull-left" >
        <img src="<?php echo esc_url(ambient_elated_get_skin_uri() . '/assets/img/logo.png'); ?>" alt="<?php esc_attr_e( 'Logo', 'ambient' ); ?>" class="eltdf-header-logo pull-left"/>
        <?php $current_theme = wp_get_theme(); ?>
        <h1 class="pull-left">
            <?php echo esc_html($current_theme->get('Name')); ?>
            <small><?php echo esc_html($current_theme->get('Version')); ?></small>
        </h1>
    </div>
    <div class="eltdf-top-section-holder">
        <div class="eltdf-top-section-holder-inner">
            <?php $this->getAnchors($active_page); ?>
            <div class="eltdf-top-buttons-holder">
                <?php if($show_save_btn) { ?>
                    <input type="button" id="eltdf_top_save_button" class="btn btn-info btn-sm" value="<?php esc_html_e('Save Changes', 'ambient'); ?>"/>
                <?php } ?>
            </div>

            <?php if($show_save_btn) { ?>
                <div class="eltdf-input-change">
                    <i class="fa fa-exclamation-circle"></i>
                    <?php esc_html_e('You should save your changes', 'ambient') ?>
                </div>
                <div class="eltdf-changes-saved">
                    <i class="fa fa-check-circle"></i>
                    <?php esc_html_e('All your changes are successfully saved', 'ambient') ?>
                </div>
            <?php } ?>
        </div>
    </div>

</div> <!-- close div.eltdf-page-header -->