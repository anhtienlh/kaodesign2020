<?php 

  // Set border
  $ngwgborder = get_post_meta($postId, "mwrp_gallery_border", true);
  $ngwgborder = esc_html($ngwgborder) ? "nwg-border" : "";

  // Set Border Radius 
  $ngwgborderRadius = get_post_meta($postId, "mwrp_gallery_border_radius", true);
  $ngwgborderRadius = esc_html($ngwgborderRadius) ? " nwg-border-radius" : "";
?>
<div class="container">
  <div class="ngw_gallery_image_grid" data-js="image-grid" data-infinite-scroll='{  "loadOnScroll": false
,"append": ".ngw_gallery_image_grid", "history": false,"debug":false }'>
    <div class="image-grid__col-sizer"></div>
    <div class="image-grid__gutter-sizer"></div>
    <?php $imagesData = get_post_meta($postId, 'mwrpg_images', true);

      if (!empty($imagesData)) {
        foreach ($imagesData as $value) {
          if(file_exists(get_attached_file($value))) {
    ?>
          <div class="image-grid__item">
            <a data-fancybox="gallery" href="<?php echo esc_url(wp_get_attachment_url($value)); ?>"><img class="image-grid__image <?php echo $ngwgborder.$ngwgborderRadius; ?>" src="<?php echo esc_url(wp_get_attachment_url($value)); ?>"></a>
          </div>
    <?php
          }
        }
      }
    ?>
    <div class="scroller-status">
      <div class="loader-ellips infinite-scroll-request">
        <span class="loader-ellips__dot"></span>
        <span class="loader-ellips__dot"></span>
        <span class="loader-ellips__dot"></span>
        <span class="loader-ellips__dot"></span>
      </div>
      <p class="scroller-status__message infinite-scroll-last">End of content</p>
      <p class="scroller-status__message infinite-scroll-error">No more pages to load</p>
      <a class="pagination__next" href="<?php echo get_permalink(); ?>/1">Next</a>

    </div>
	</div>
</div>
