<?php

add_theme_support('post-thumbnails');
remove_filter('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_filter('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_filter('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_filter('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_filter('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
remove_action('woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10);
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);

add_action('oripamis_woocommerce_notice', 'woocommerce_output_all_notices', 10);
add_action('oripamis_add_to_cart_button', 'woocommerce_template_loop_add_to_cart', 10);
add_action('woocommerce_before_shop_loop_item_title', 'oripamis_template_loop_product_thumbnail', 10);
add_action('woocommerce_shop_loop_item_title', 'oripamis_template_loop_product_title', 10);
add_action('oripamis_template_loop_price', 'woocommerce_template_loop_price', 10);

function oripamis_add_theme_scripts()
{

    wp_enqueue_style('base_style', get_template_directory_uri() . '/assets/css/core-style.css');
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css');

    wp_enqueue_script('popper', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), 1.1, true);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), 1.1, true);
    wp_enqueue_script('plugins', get_template_directory_uri() . '/assets/js/plugins.js', array('jquery'), 1.1, true);
    wp_enqueue_script('active', get_template_directory_uri() . '/assets/js/active.js', array('jquery'), 1.1, true);
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), 1.1, true);


}

add_action('wp_enqueue_scripts', 'oripamis_add_theme_scripts');

function oripamis_add_woocommerce_support()
{
    add_theme_support('woocommerce');
}

add_action('after_setup_theme', 'oripamis_add_woocommerce_support');

function oripamis_main_menu()
{
    register_nav_menu('oripamis_main_menu', __('Oripamis Main Menu'));
}

add_action('init', 'oripamis_main_menu');

add_filter('woocommerce_breadcrumb_defaults', 'oripamis_woocommerce_breadcrumbs', 20);
function oripamis_woocommerce_breadcrumbs()
{
    return array(
        'delimiter' => ' ',
        'wrap_before' => '<div class="row"><div class="col-12"><nav aria-label="breadcrumb"><ol class="breadcrumb mt-50">',
        'wrap_after' => '</ol></nav></div></div>',
        'before' => '<li class="breadcrumb-item">',
        'after' => '</li>',
        'home' => _x('Home', 'breadcrumb', 'woocommerce'),
    );
}

function oripamis_widget_setup()
{
    register_sidebar(array(
        'name' => 'OripamisShopSideBar',
        'id' => 'shop-sidebar',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h6>',
        'after_title' => '</h6>',
    ));

    register_sidebar(array(
        'name' => 'OripamisMenuWidget',
        'id' => 'menu-sidebar',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h6 class="widget-title mb-15">',
        'after_title' => '</h6>',
    ));

    register_sidebar(array(
        'name' => 'OripamisCartWidget',
        'id' => 'cart-sidebar',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h6 class="widget-title mb-15">',
        'after_title' => '</h6>',
    ));
}

add_action('widgets_init', 'oripamis_widget_setup');

function oripamis_template_loop_product_link_open()
{
    global $product;

    $link = apply_filters('woocommerce_loop_product_link', get_the_permalink(), $product);

    echo '<a href="' . esc_url($link) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link single-product-wrapper">';
}

function oripamis_template_loop_product_thumbnail()
{

    wc_get_template_part('loop-item-image');

}

function oripamis_template_loop_product_title()
{
    wc_get_template_part('loop-item-title');
}

function oripamis_template_loop_product_link_close()
{
    echo '</a>';
}

add_filter('woocommerce_layered_nav_count', '__return_false');