<?
global $product, $post, $woocommerce;
$attachment_ids = $product->get_gallery_image_ids();
?>

<div class="product-img">
    <a href="<? the_permalink(); ?>">
        <? the_post_thumbnail($post->ID); ?>
        <? if (!empty($attachment_ids[0])): ?>

            <img class="hover-img" src="<?= wp_get_attachment_url($attachment_ids[0]); ?>" alt="<?= the_title() ?>">

        <? endif; ?>
    </a>
</div>