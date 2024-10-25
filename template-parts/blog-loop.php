<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cloudsdale_Theme
 */

?> <div class="blog-loop">
    <!-- Custom loop for latest three posts -->
    <?php 
// Custom loop using WP_Query
$query = new WP_Query(array( 
'post_status' => 'publish',
'orderby' => 'date',
'order' => 'ASC',
'posts_per_page' => 3 // Limit to three posts
));

if ($query->have_posts()) : 
while ($query->have_posts()) : $query->the_post();
?>
    <div class="flex-blog-list">
        <div class="image-block" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
        </div>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h3 class="entry-category"><?php the_category(', '); ?></h3>
                <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php echo '<p>' . wp_trim_words(get_the_content(), 20) . '</p>'; ?>
            </div><!-- .entry-content -->

            <div class="underline_link">
                <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">Read More</a>
            </div>
        </article><!-- #post-<?php the_ID(); ?> -->
    </div>
    <?php endwhile; ?>
    <?php endif; wp_reset_postdata(); // Reset post data ?>
</div>