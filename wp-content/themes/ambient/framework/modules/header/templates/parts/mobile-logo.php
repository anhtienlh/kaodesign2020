<?php
	$attachment_meta = ambient_elated_get_attachment_meta_from_url($logo_image);
	$hwstring = !empty($attachment_meta) ? image_hwstring( $attachment_meta['width'], $attachment_meta['height'] ) : '';
?>

<?php do_action('ambient_elated_before_mobile_logo'); ?>

<div class="eltdf-mobile-logo-wrapper">
    <a itemprop="url" href="<?php echo esc_url(home_url('/')); ?>" <?php ambient_elated_inline_style($logo_styles); ?>>
        <img itemprop="image" src="<?php echo esc_url($logo_image); ?>" <?php echo ambient_elated_get_module_part( $hwstring ); ?> alt="<?php esc_attr_e('mobile logo','ambient'); ?>"/>
    </a>
</div>

<?php do_action('ambient_elated_after_mobile_logo'); ?>