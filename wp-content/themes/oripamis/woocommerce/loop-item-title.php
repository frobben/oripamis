<?php

global $product, $post, $woocommerce;
$price = get_post_meta($product->ID, '_price', true);
?>
<div class="product-description d-flex align-items-center justify-content-between">
    <div class="product-meta-data">
        <div class="line"></div>
        <? do_action('oripamis_template_loop_price'); ?>
        <a href="<? the_permalink(); ?>">
            <h6><? the_title() ?></h6>
        </a>
    </div>
    <div class="ratings-cart text-right">
        <? $average = $product->get_average_rating(); ?>
        <div class="ratings">
            <? for ($i = 1; $i <= 5; $i++): ?>
                <i class="fa fa-star" aria-hidden="true" style="<?= $average < $i ? 'color:#6d6d6d' : '' ?>"></i>
            <? endfor; ?>
        </div>
        <div class="cart">
            <? do_action('oripamis_add_to_cart_button') ?>
        </div>
    </div>
</div>

<!--<a href="cart.html" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to Cart"><img src="--><? //= get_template_directory_uri() ?><!--/assets/img/core-img/cart.png" alt=""></a>-->
