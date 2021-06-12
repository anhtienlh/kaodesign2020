<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php
    /**
     * @see ambient_elated_header_meta() - hooked with 10
     * @see eltd_user_scalable - hooked with 10
     */
    ?>
    <?php if (!ambient_elated_is_ajax_request()) do_action('ambient_elated_header_meta'); ?>

	<?php if (!ambient_elated_is_ajax_request()) wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
<?php if (!ambient_elated_is_ajax_request()) ambient_elated_get_side_area(); ?>
<?php
$id = ambient_elated_get_page_id();

if (ambient_elated_get_meta_field_intersect('smooth_page_transitions',$id) === 'yes' &&
   ambient_elated_get_meta_field_intersect('page_transition_preloader',$id) === 'yes') { ?>
    <div class="eltdf-smooth-transition-loader eltdf-mimic-ajax ?>">
        <div class="eltdf-st-loader">
            <div class="eltdf-st-loader1">
                <?php ambient_elated_loading_spinners(); ?>
            </div>
        </div>
    </div>
<?php } ?>

<div class="eltdf-wrapper">
    <div class="eltdf-wrapper-inner">
        <?php if (!ambient_elated_is_ajax_request()) ambient_elated_get_header(); ?>

        <?php if((!ambient_elated_is_ajax_request()) && ambient_elated_options()->getOptionValue('show_back_button') == "yes") { ?>
            <a id='eltdf-back-to-top' href='#'>
                    <span class="eltdf-icon-stack">
                         <?php ambient_elated_icon_collections()->getBackToTopIcon('font_awesome'); ?>
                    </span>
            </a>
        <?php } ?>
        <?php if (!ambient_elated_is_ajax_request()) ambient_elated_get_full_screen_menu(); ?>
        <div class="eltdf-content" <?php ambient_elated_content_elem_style_attr(); ?>>
            <div class="eltdf-content-inner">