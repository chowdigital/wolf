<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cloudsdale_Theme
 */

get_header();
?>

<main id="primary" class="site-main">
    <header class="page-header section-heading">
        <h1>News and special offers at The Kings Arms</h1>
    </header><!-- .page-header -->

    <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); // Start the loop ?>
    <div class="flex-blog-list">
        <div class="image-block" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
        </div>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h3 class="entry-category"><?php the_category(', '); ?></h3>
                <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>'); ?>
            </header><!-- .entry-header -->



            <div class="entry-content">
                <?php
                    echo '<p>' . wp_trim_words(get_the_content(), 50) . '</p>'; // Using wp_trim_words to limit to 500 words
                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'cloudsdale-master'),
                        'after'  => '</div>',
                    ));
                    ?>
            </div><!-- .entry-content -->
            <div class="underline_link">
                <a href="<?php the_permalink(); ?>" rel="bookmark">Read More</a>
            </div>
        </article><!-- #post-<?php the_ID(); ?> -->
    </div>

    <?php endwhile; // End of the loop. ?>

    <!-- Pagination -->
    <div class="pagination">
        <?php
            // Previous/next page navigation.
            the_posts_pagination(array(
                'mid_size'  => 2,
                'prev_text' => __('« Previous', 'cloudsdale-master'),
                'next_text' => __('Next »', 'cloudsdale-master'),
            ));
            ?>
    </div>

    <?php else : ?>
    <p><?php _e('Sorry, no posts matched your criteria.', 'cloudsdale-master'); ?></p>
    <?php endif; ?>
    <section class="container-cream">
        <?php get_template_part( 'template-parts/book-food', get_post_type() ); ?>
    </section>
    <section class="container-white">

        <?php get_template_part( 'template-parts/reviews', get_post_type() ); ?>
    </section>
</main><!-- #main -->

<?php
get_footer();