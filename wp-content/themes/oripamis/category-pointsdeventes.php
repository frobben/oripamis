<? get_header(); ?>

    <section class="section-padding-100-0 products-catagories-area">
        <div class="page-title">
            <h1><?= single_cat_title(); ?></h1>
        </div>
        <div class="partenaire-wrapper">
            <?php
            if (have_posts()) :
                $i = 1;
                while (have_posts()): the_post(); ?>
                    <div class="partenaire-row row <?= $i == 2 ? "img-left" : "img-right" ?>">
                        <div class="partenaire-img">
                            <? the_post_thumbnail(); ?>
                            <h2><? the_title() ?></h2>
                        </div>
                        <div class="partenaire-description">
                            <? the_content() ?>
                        </div>
                    </div>

                    <? $i++; endwhile;endif; ?>
        </div>

    </section>

<? get_footer();