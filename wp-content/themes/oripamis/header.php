<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><? wp_title(); ?>></title>

    <!-- Favicon  -->
    <link rel="icon" href="https://colorlib.com/preview/theme/amado/img/core-img/favicon.ico">

    <? wp_head(); ?>

</head>

<body>

<!-- Search Wrapper Area Start -->
<div class="search-wrapper section-padding-100">
    <div class="search-close">
        <i class="fa fa-close" aria-hidden="true"></i>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="search-content">
                    <form action="#" method="get">
                        <input type="search" name="search" id="search" placeholder="Type your keyword...">
                        <button type="submit"><img
                                    src="https://colorlib.com/preview/theme/amado/img/core-img/search.png" alt="">
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Search Wrapper Area End -->

<!-- Cart Widget -->
<? if (is_active_sidebar('cart-sidebar') && !is_cart() && !is_checkout()): ?>
    <div id="side-cart" class="sidenav">
        <div>
            <span id="closeCart" onclick="handleCart()">X</span>
            <div class="shop_sidebar_area">
                <? dynamic_sidebar('cart-sidebar'); ?>
            </div>

        </div>
    </div>
    <? if (!WC()->cart->is_empty()): ?>
        <span id="openCartButton" onclick="handleCart()"><img alt="Ouvrir le panier"
                                                              src="<?= get_template_directory_uri() ?>/assets/img/core-img/cart.png"></span>
    <? endif; ?>
<? endif; ?>
<!-- Cart Widget end -->

<!-- ##### Main Content Wrapper Start ##### -->
<div class="main-content-wrapper d-flex clearfix">

    <!-- Mobile Nav (max width 767px)-->
    <div class="mobile-nav">
        <!-- Navbar Brand -->
        <div class="amado-navbar-brand">
            <a href="<?= home_url(); ?>"><img src="<?= get_template_directory_uri() ?>/assets/img/logo.jpg" alt=""></a>
        </div>
        <!-- Navbar Toggler -->
        <div class="amado-navbar-toggler">
            <span></span><span></span><span></span>
        </div>
    </div>

    <!-- Header Area Start -->
    <header class="header-area clearfix">
        <!-- Close Icon -->
        <div class="nav-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <!-- Logo -->
        <div class="logo">
            <a href="<?= home_url(); ?>"><img src="<?= get_template_directory_uri() ?>/assets/img/logo.jpg" alt=""></a>
        </div>
        <!-- Amado Nav -->
        <?
        wp_nav_menu(array(
            'theme_location' => 'oripamis_main_menu',
            'container' => 'nav',
            'container_class' => 'amado-nav'));
        ?>

        <!-- Button Group -->
        <!--        <div class="amado-btn-group mt-30 mb-100">-->
        <!--            <a href="#" class="btn amado-btn mb-15">%Discount%</a>-->
        <!--            <a href="#" class="btn amado-btn active">New this week</a>-->
        <!--        </div>-->
        <!-- Cart Menu -->
        <!--        <div class="cart-fav-search mb-100">-->
        <!--            <a href="cart.html" class="cart-nav"><img-->
        <!--                        src="https://colorlib.com/preview/theme/amado/img/core-img/cart.png" alt=""> Cart-->
        <!--                <span>(0)</span></a>-->
        <!--            <a href="#" class="fav-nav"><img src="https://colorlib.com/preview/theme/amado/img/core-img/favorites.png"-->
        <!--                                             alt=""> Favourite</a>-->
        <!--            <a href="#" class="search-nav"><img src="https://colorlib.com/preview/theme/amado/img/core-img/search.png"-->
        <!--                                                alt=""> Search</a>-->
        <!--        </div>-->
        <!-- Social Button -->
        <div class="social-info d-flex">
            <!--            <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>-->
            <a href="https://www.instagram.com/oripamis/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="https://www.facebook.com/Oripamis-1720587664719126"><i class="fa fa-facebook"
                                                                            aria-hidden="true"></i></a>
            <!--            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>-->
        </div>
    </header>
    <!-- Header Area End -->