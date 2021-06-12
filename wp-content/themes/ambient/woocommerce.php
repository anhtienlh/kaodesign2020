<?php 
/*
Template Name: WooCommerce
*/ 
?>
<?php

$ambient_elated_id = get_option('woocommerce_shop_page_id');
$ambient_elated_sidebar = ambient_elated_sidebar_layout();

if(get_post_meta($ambient_elated_id, 'eltd_page_background_color', true) != ''){
	$background_color = 'background-color: '.esc_attr(get_post_meta($ambient_elated_id, 'eltd_page_background_color', true));
}else{
	$background_color = '';
}

$disable_content_top_padding = get_post_meta(get_the_ID(), "eltdf_disable_page_content_top_padding_meta", true);
if($disable_content_top_padding === 'yes' && is_singular('product')) {
	$disable_content_top_padding = true;
} else {
	$disable_content_top_padding = false;
}

$content_style = '';
if(get_post_meta($ambient_elated_id, 'eltdf_page_content_top_padding', true) !== '' && !$disable_content_top_padding) {
    if(get_post_meta($ambient_elated_id, 'eltdf_page_content_top_padding_mobile', true) == 'yes') {
        $content_style = 'padding-top:'.esc_attr(get_post_meta($ambient_elated_id, 'eltdf_page_content_top_padding', true)).'px !important';
    } else {
        $content_style = 'padding-top:'.esc_attr(get_post_meta($ambient_elated_id, 'eltdf_page_content_top_padding', true)).'px';
    }
} else if ($disable_content_top_padding) {
	$content_style = 'padding-top: 0px';
}

if ( get_query_var('paged') ) {
	$paged = get_query_var('paged');
} elseif ( get_query_var('page') ) {
	$paged = get_query_var('page');
} else {
	$paged = 1;
}

get_header();

ambient_elated_get_title();
do_action('ambient_elated_before_slider_action');
get_template_part('slider');
do_action('ambient_elated_after_slider_action');

//Woocommerce content
if ( ! is_singular('product') ) { ?>
	<div class="eltdf-container" <?php ambient_elated_inline_style($background_color); ?>>
		<div class="eltdf-container-inner clearfix" <?php ambient_elated_inline_style($content_style); ?>>
			<?php
			switch( $ambient_elated_sidebar ) {
				case 'sidebar-33-right': ?>
					<div class="eltdf-two-columns-66-33 eltdf-content-has-sidebar eltdf-woocommerce-with-sidebar clearfix">
						<div class="eltdf-column1">
							<div class="eltdf-column-inner">
								<?php ambient_elated_woocommerce_content(); ?>
							</div>
						</div>
						<div class="eltdf-column2">
							<?php get_sidebar();?>
						</div>
					</div>
				<?php
					break;
				case 'sidebar-25-right': ?>
					<div class="eltdf-two-columns-75-25 eltdf-content-has-sidebar eltdf-woocommerce-with-sidebar clearfix">
						<div class="eltdf-column1">
							<div class="eltdf-column-inner">
								<?php ambient_elated_woocommerce_content(); ?>
							</div>
						</div>
						<div class="eltdf-column2">
							<?php get_sidebar();?>
						</div>
					</div>
				<?php
					break;
				case 'sidebar-33-left': ?>
					<div class="eltdf-two-columns-33-66 eltdf-content-has-sidebar eltdf-woocommerce-with-sidebar clearfix">
						<div class="eltdf-column1">
							<div class="eltdf-column-inner">
								<?php ambient_elated_woocommerce_content(); ?>
							</div>
						</div>
						<div class="eltdf-column2">
							<?php get_sidebar();?>
						</div>
					</div>
				<?php
					break;
				case 'sidebar-25-left': ?>
					<div class="eltdf-two-columns-25-75 eltdf-content-has-sidebar eltdf-woocommerce-with-sidebar clearfix">
						<div class="eltdf-column1">
							<div class="eltdf-column-inner">
								<?php ambient_elated_woocommerce_content(); ?>
							</div>
						</div>
						<div class="eltdf-column2">
							<?php get_sidebar();?>
						</div>
					</div>
				<?php
					break;
				default:
					ambient_elated_woocommerce_content();
			} ?>		
		</div>
	</div>			
<?php } else { ?>
	<div class="eltdf-container" <?php ambient_elated_inline_style($background_color); ?>>
		<div class="eltdf-container-inner clearfix" <?php ambient_elated_inline_style($content_style); ?>>
			<?php ambient_elated_woocommerce_content(); ?>
		</div>
	</div>
<?php } ?>
<?php get_footer(); ?>