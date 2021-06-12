<?php 
  
  // get meta
  $metaData = get_post_meta( $postId, 'mwrpg_images', false )[0];

  // get page number
  $page = get_query_var( 'page' );
  $page = !empty( $page ) ? (int) $page : 1;

    $total = count( $metaData );
    $limit = 9; //per page   
    $totalPages = ceil( $total/ $limit ); //calculate total pages

    $page = max($page, 1); 
    $page = min($page, $totalPages);
    $offset = ($page - 1) * $limit;
    if( $offset < 0 ) $offset = 0;

    $imagesData = array_slice( $metaData, $offset, $limit );

?>
<div class="container">
  <div class="ngw_gallery_image_grid" data-js="image-grid" data-infinite-scroll='{  "append": ".ngw_gallery_image_grid", "history": false,"debug":false }'>
      <div class="image-grid__col-sizer"></div>
      <div class="image-grid__gutter-sizer"></div>
      <?php 
        if (!empty($imagesData)) {
            foreach ($imagesData as $value) {
            if(file_exists(get_attached_file($value))) {
              
    ?>
        <div class="image-grid__item">
          <a data-fancybox="gallery" href="<?php echo esc_url(wp_get_attachment_url($value)); ?>"><img class="image-grid__image" src="<?php echo esc_url(wp_get_attachment_url($value)); ?>"></a>
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
    </div>
    <?php if($totalPages > $page) { ?>
      <p class="pagination">
        <a class="pagination__next" href="<?php echo get_permalink().esc_html($page); ?>">Next page</a>
      </p>
    <?php } ?>
  </div>
</div>