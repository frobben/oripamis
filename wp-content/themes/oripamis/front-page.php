<? get_header(); ?>

    <!-- Product Catagories Area Start -->
    <div class="products-catagories-area clearfix">

        <div class="presentation">
            <? $intro = get_post(1); ?>
            <?= get_the_post_thumbnail($intro); ?>
            <div class="presentation-text">
                <?= $intro->post_content ?>
            </div>

        </div>

        <div class="amado-pro-catagory clearfix">

            <?
            /* Get Featured Products */

            $meta_query = WC()->query->get_meta_query();
            $tax_query = WC()->query->get_tax_query();

            $tax_query[] = array(
                'taxonomy' => 'product_visibility',
                'field' => 'name',
                'terms' => 'featured',
                'operator' => 'IN',
            );

            $args = array(
                'post_type' => 'product',
                'post_status' => 'publish',
                'ignore_sticky_posts' => 1,
                'posts_per_page' => 9,
                'orderby' => 'menu',
                'order' => 'ASC',
                'meta_query' => $meta_query,
                'tax_query' => $tax_query,
            );
            $loop = new WP_Query($args);

            while ($loop->have_posts()) : $loop->the_post();
                $price = get_post_meta(get_the_ID(), '_price', true);
                ?>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="<? the_permalink(); ?>">

                        <? the_post_thumbnail('large'); ?>
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p><?= wc_price($price); ?></p>
                            <h4><? the_title(); ?></h4>
                        </div>
                    </a>
                </div>
            <? endwhile;
            wp_reset_postdata(); ?>
            <!-- Single Catagory -->
            <!--            <div class="single-products-catagory clearfix">-->
            <!--                <a href="shop.html">-->
            <!--                    <img src="https://colorlib.com/preview/theme/amado/img/bg-img/2.jpg" alt="">-->
            <!--                    Hover Content -->
            <!--                    <div class="hover-content">-->
            <!--                        <div class="line"></div>-->
            <!--                        <p>From $180</p>-->
            <!--                        <h4>Minimalistic Plant Pot</h4>-->
            <!--                    </div>-->
            <!--                </a>-->
            <!--            </div>-->

        </div>
    </div>
    <!-- Product Catagories Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
    <div class="intagram-wrapper">
        <? do_shortcode('[instagram-feed]') ?>
    </div>

    <!-- ##### Newsletter Area Start ##### -->
    <section class="newsletter-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center">
                <!-- Newsletter Text -->
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="newsletter-text mb-100">
                        <h2>Subscribe for a <span>25% Discount</span></h2>
                        <p>Nulla ac convallis lorem, eget euismod nisl. Donec in libero sit amet mi vulputate
                            consectetur. Donec auctor interdum purus, ac finibus massa bibendum nec.</p>
                    </div>
                </div>
                <!-- Newsletter Form -->
                <div class="col-12 col-lg-6 col-xl-5">
                    <div class="newsletter-form mb-100">
                        <form action="#" method="post">
                            <input type="email" name="email" class="nl-email" placeholder="Your E-mail">
                            <input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Newsletter Area End ##### -->
<? wp_footer(); ?>