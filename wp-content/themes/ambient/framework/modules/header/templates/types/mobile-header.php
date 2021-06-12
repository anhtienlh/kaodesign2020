<?php do_action('ambient_elated_before_mobile_header'); ?>

<header class="eltdf-mobile-header">
    <div class="eltdf-mobile-header-inner">
        <?php do_action( 'ambient_elated_after_mobile_header_html_open' ) ?>
        <div class="eltdf-mobile-header-holder">
            <div class="eltdf-grid">
                <div class="eltdf-vertical-align-containers">
                    <?php if($show_navigation_opener) : ?>
                        <div class="eltdf-mobile-menu-opener">
                            <a href="javascript:void(0)">
                                <div class="eltdf-mo-icon-holder">
                                    <span class="eltdf-mo-lines">
                                        <span class="eltdf-mo-line eltdf-line-1"></span>
                                        <span class="eltdf-mo-line eltdf-line-2"></span>
                                        <span class="eltdf-mo-line eltdf-line-3"></span>
                                    </span>
                                    <?php if($mobile_menu_title !== '') { ?>
                                        <h5 class="eltdf-mobile-menu-text"><?php echo esc_attr($mobile_menu_title); ?></h5>
                                    <?php } ?>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if($show_logo) : ?>
                        <div class="eltdf-position-center">
                            <div class="eltdf-position-center-inner">
                                <?php ambient_elated_get_mobile_logo(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="eltdf-position-right">
                        <div class="eltdf-position-right-inner">
                            <?php if(is_active_sidebar('eltdf-right-from-mobile-logo')) {
                                dynamic_sidebar('eltdf-right-from-mobile-logo');
                            } ?>
                        </div>
                    </div>
                </div> <!-- close .eltdf-vertical-align-containers -->
            </div>
        </div>
        <?php ambient_elated_get_mobile_nav(); ?>
        <?php do_action('ambient_elated_end_of_page_header_html'); ?>
    </div>
</header> <!-- close .eltdf-mobile-header -->

<?php do_action('ambient_elated_after_mobile_header'); ?>