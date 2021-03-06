<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;


if (post_password_required()) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}
if (function_exists('wc_notice_count') && wc_notice_count() > 0) :
    ?>

    <div class="woocommerce-notices-shortcode woocommerce">
        <?php wc_print_notices(); ?>
    </div>
<?php endif;

?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class('row', $product); ?>>

    <?php
    /**
     * Hook: woocommerce_before_single_product_summary.
     *
     * @hooked woocommerce_show_product_sale_flash - 10
     * @hooked woocommerce_show_product_images - 20
     */
    do_action('woocommerce_before_single_product_summary');
    ?>

    <div class="col-12 col-lg-5 summary entry-summary">
        <div class="single_product_desc">
            <div class="product-meta-data">
                <div class="line"></div>
                <p class="product-price"><?= wc_price(get_post_meta(get_the_ID(), '_price', true)); ?></p>
                <? the_title('<a href="' . get_the_permalink() . '"><h6>', '</h6></a>') ?>
                <!--                <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">-->
                <!--                    --><? // $average = $product->get_average_rating(); ?>
                <!--                    <div class="ratings">-->
                <!--                        --><? // for ($i = 1; $i <= 5; $i++): ?>
                <!--                            <i class="fa fa-star" aria-hidden="true"-->
                <!--                               style="--><? //= $average < $i ? 'color:#6d6d6d' : '' ?><!--"></i>-->
                <!--                        --><? // endfor; ?>
                <!--                    </div>-->
                <!--                    <div class="review">--><? // // TODO ?>
                <!--                        <a href="#">Write A Review</a>-->
                <!--                    </div>-->
                <!--                </div>-->
                <? $inStock = $product->get_stock_quantity() > 0; ?>
                <p class="avaibility"><i class="fa fa-circle"
                                         style="<?= $inStock ? '' : 'color:red' ?>"></i> <?= $inStock ? __('En Stock') : __('Indisponible') ?>
                </p>
            </div>

            <?php
            /**
             * Hook: woocommerce_single_product_summary.
             *
             * @hooked woocommerce_template_single_title - 5
             * @hooked woocommerce_template_single_rating - 10
             * @hooked woocommerce_template_single_price - 10
             * @hooked woocommerce_template_single_excerpt - 20
             * @hooked woocommerce_template_single_add_to_cart - 30
             * @hooked woocommerce_template_single_meta - 40
             * @hooked woocommerce_template_single_sharing - 50
             * @hooked WC_Structured_Data::generate_product_data() - 60
             */
            do_action('woocommerce_single_product_summary');
            ?>
        </div>
    </div>

    <?php
    /**
     * Hook: woocommerce_after_single_product_summary.
     *
     * @hooked woocommerce_output_product_data_tabs - 10
     * @hooked woocommerce_upsell_display - 15
     * @hooked woocommerce_output_related_products - 20
     */
    do_action('woocommerce_after_single_product_summary');
    ?>
</div>

<?php do_action('woocommerce_after_single_product'); ?>
