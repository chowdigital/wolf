<?php /* Template Name: Book Food */ get_header(); ?>

<main id="primary" class="site-main">






    <section class="container-white">
        <?php get_template_part( 'template-parts/book-food', get_post_type() ); ?>
    </section>

</main>

<?php get_footer(); ?>