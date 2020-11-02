<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters('woocommerce_product_tabs', array());

if (!empty($product_tabs)) : ?>
    <div class="col-12">
        <nav>
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                <?php $i = 0;
                foreach ($product_tabs as $key => $product_tab) : ?>
                    <a class="nav-item nav-link <?= $i === 0 ? 'active' : '' ?>" id="nav-home-tab" data-toggle="tab"
                       href="#tab-<?php echo esc_attr($key); ?>" role="tab" aria-controls="nav-home"
                       aria-selected="true">
                        <?php echo wp_kses_post(apply_filters('woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key)); ?>
                    </a>
                    <?php $i++; endforeach; ?>
            </div>
        </nav>
        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
            <?php $i = 0;
            foreach ($product_tabs as $key => $product_tab) : ?>
                <div class="tab-pane fade <?= $i === 0 ? 'show active' : '' ?>" id="tab-<?php echo esc_attr($key); ?>"
                     role="tabpanel" aria-labelledby="nav-home-tab">
                    <?php
                    if (isset($product_tab['callback'])) {
                        call_user_func($product_tab['callback'], $key, $product_tab);
                    }
                    ?>
                </div>
                <?php $i++; endforeach; ?>
        </div>


    </div>
    <?php do_action('woocommerce_product_after_tabs'); ?>

<?php endif; ?>
