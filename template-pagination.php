<?php /* Template Name: Pagination */ get_header(); ?>

<main id="primary" class="site-main">
    <section class="container-white">
        <header class="page-header section-heading">
            <h1>News and special offers at The Kings Arms</h1>
        </header><!-- .page-header -->
        <div class="blog-loop">
            <?php 
            //get the current page
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

            //pagination fixes prior to loop
            $temp =  $query;
            $query = null;

            //custom loop using WP_Query
            $query = new WP_Query( array( 
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'ASC',
                'posts_per_page' => 10,
                'paged' => $paged
            )); 

            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    // Each post content starts
                    ?>
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
                                echo '<p>' . wp_trim_words(get_the_content(), 20) . '</p>';
                                wp_link_pages(array(
                                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'cloudsdale-master'),
                                    'after'  => '</div>',
                                ));
                                ?>
                    </div><!-- .entry-content -->

                    <div class="underline_link">
                        <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">Read More</a>
                    </div>
                </article><!-- #post-<?php the_ID(); ?> -->
            </div>
            <?php 
                // Each post content ends
                endwhile;
            endif; 
            ?>

            <?php if ($query->max_num_pages > 1): // Check if there's more than one page ?>
            <div class="pagenav">
                <div class="alignleft"><?php previous_posts_link('Previous', $query->max_num_pages); ?></div>
                <div class="alignright"><?php next_posts_link('Next', $query->max_num_pages); ?></div>
            </div>
            <?php endif; ?>

            <?php 
            // Reset postdata
            wp_reset_postdata();
            ?>
        </div><!-- Closes .blog-loop -->
    </section><!-- Closes .container-white -->

</main><!-- Closes .site-main -->
<?php get_footer(); ?>