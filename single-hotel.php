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
            <?php the_title( '<h1 class="entry-title pb-5">', ' at The Kings Arms Hampton Court</h1>'); ?>
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
    <section class="container-blue">

        <div class="underline_link">
            <h2>Book direct and save 10% - use code 'DIRECT10'</h2>

            <a target="blank" href="https://direct-book.com/properties/KingsArmHotelDirect">Make a reservation</a>
        </div>

    </section>
    <section class="hotel-container container-white">
        <header class="page-header section-heading">
            <h2>View more rooms, at The Kings Arms Hampton Court</h2>
            <a href="/hotel/"><button class="section-button">Find Out More</button></a>
        </header>


        <?php get_template_part( 'template-parts/hotel-carousel', get_post_type() ); ?>
    </section>
</main><!-- #main -->

<?php
get_footer();