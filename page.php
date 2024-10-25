<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Cloudsdale_Theme
 */

get_header();
?>

    <main id="primary" class="site-main">

        <div id="pageHeadImg" class="page-head-img"
            style="background-image: url(<?php the_post_thumbnail_url(); ?>); background-repeat: no-repeat; background-position: center; background-size: cover;">

        </div>

        <section class="container-white">

            <header class="page-header section-heading">
                <?php the_title( '<h1 class="entry-title pb-5">', '</h1>'); ?>
            </header>


            <?php
						
						the_content(
							sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'cloudsdale-master' ),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								wp_kses_post( get_the_title() )
							)
						);

	
		?>







        </section>

        <section class="container-cream">
            <?php get_template_part( 'template-parts/book-food', get_post_type() ); ?>
        </section>
        <section class="container-white">
            <header class="page-header section-heading">
                <h2>What's happening at The Kings Arms</h2>
                <a href="/whats-on/"><button class="section-button">All News</button></a>
            </header>

            <?php get_template_part( 'template-parts/blog-loop', get_post_type() ); ?>

        </section>




    </main><!-- #main -->


    <?php
get_footer();