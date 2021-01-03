<?php /* Template Name: CustomPageT1 */ ?>

<?php get_header(); ?>

    <div id="primary" class="section-padding-100 products-catagories-area">
        <?php
        // Start the loop.
        while (have_posts()) : the_post(); ?>
            <div class="page-title">
                <h1><?php the_title() ?></h1>
            </div>

            <?php

            the_content();

            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) {
                comments_template();
            }

            // End of the loop.
        endwhile;
        ?>


    </div><!-- .content-area -->

<?php get_footer(); ?>