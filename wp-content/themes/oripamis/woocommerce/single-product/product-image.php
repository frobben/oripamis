<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.1
 */

defined('ABSPATH') || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if (!function_exists('wc_get_gallery_image_html')) {
    return;
}

global $product;

$columns = apply_filters('woocommerce_product_thumbnails_columns', 4);
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes = apply_filters(
    'woocommerce_single_product_image_gallery_classes',
    array(
        'carousel',
        'slide',
//		'woocommerce-product-gallery--' . ( $product->get_image_id() ? 'with-images' : 'without-images' ),
//		'woocommerce-product-gallery--columns-' . absint( $columns ),
//		'images',
    )
);
?>
<div class="col-12 col-lg-7">
    <div class="single_product_thumb">
        <div id="product_details_slider"
             class="<?php echo esc_attr(implode(' ', array_map('sanitize_html_class', $wrapper_classes))); ?>">
            <?
            $attachment_ids = [$product->get_image_id()];
            $attachment_ids = array_merge($attachment_ids, $product->get_gallery_image_ids());

            $i = 0;
            if ($attachment_ids && $product->get_image_id()): ?>
                <ol class="carousel-indicators">
                    <? foreach ($attachment_ids as $attachment_id) :
                        $src = wp_get_attachment_image_src($attachment_id);
                        ?>
                        <li class="<?= $i === 0 ? 'active' : '' ?>" data-target="#product_details_slider"
                            data-slide-to="<?= $i ?>" style="background-image: url('<?= esc_url_raw($src[0]) ?>')">
                        </li>
                        <? $i++; endforeach; ?>
                </ol>
            <? endif ?>

            <? $i = 0;
            if ($attachment_ids && $product->get_image_id()): ?>
                <div class="carousel-inner">
                    <? foreach ($attachment_ids as $attachment_id) :
                        $src = wp_get_attachment_image_src($attachment_id, 'large');
                        ?>
                        <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
                            <a class="gallery-img" href="<?= $src[0] ?>">
                                <img class="d-block w-100" src="<?= $src[0] ?>"
                                     alt="<?= get_post_meta($attachment_id, '_wp_attachment_image_alt', TRUE); ?>">
                            </a>
                        </div>
                        <? $i++; endforeach; ?>
                </div>
            <? endif ?>
        </div>
    </div>
</div>
