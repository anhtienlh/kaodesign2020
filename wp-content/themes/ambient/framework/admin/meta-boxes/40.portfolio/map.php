<?php

$eltd_pages = array();
$pages = get_pages(); 
foreach($pages as $page) {
	$eltd_pages[$page->ID] = $page->post_title;
}

//Portfolio Images

$eltdPortfolioImages = new AmbientElatedClassMetaBox('portfolio-item', esc_html__('Portfolio Images (multiple upload)', 'ambient'), '', '', 'portfolio_images');
$ambient_elated_global_Framework->eltdMetaBoxes->addMetaBox('portfolio_images',$eltdPortfolioImages);

	$eltd_portfolio_image_gallery = new AmbientElatedClassMultipleImages('eltd_portfolio-image-gallery', esc_html__('Portfolio Images', 'ambient'), esc_html__('Choose your portfolio images', 'ambient'));
	$eltdPortfolioImages->addChild('eltd_portfolio-image-gallery', $eltd_portfolio_image_gallery);

//Portfolio Images/Videos 2

$eltdPortfolioImagesVideos2 = new AmbientElatedClassMetaBox('portfolio-item', esc_html__('Portfolio Images/Videos (single upload)', 'ambient'));
$ambient_elated_global_Framework->eltdMetaBoxes->addMetaBox('portfolio_images_videos2', $eltdPortfolioImagesVideos2);

	$eltd_portfolio_images_videos2 = new AmbientElatedClassImagesVideosFramework('', '');
	$eltdPortfolioImagesVideos2->addChild('eltd_portfolio_images_videos2', $eltd_portfolio_images_videos2);

//Portfolio Additional Sidebar Items

$eltdAdditionalSidebarItems = ambient_elated_create_meta_box(
    array(
        'scope' => array('portfolio-item'),
        'title' => esc_html__('Additional Portfolio Sidebar Items', 'ambient'),
        'name' => 'portfolio_properties'
    )
);

	$eltd_portfolio_properties = ambient_elated_add_options_framework(
	    array(
	        'label' => esc_html__('Portfolio Properties', 'ambient'),
	        'name' => 'eltd_portfolio_properties',
	        'parent' => $eltdAdditionalSidebarItems
	    )
	);