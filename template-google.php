<?php /* Template Name: Google */ get_header(); ?>

<!-- Full Page Intro-->
<main>
    <div class="section-video">
        <div class="video-container">
            <div class="fade-in"></div>

            <video playsinline autoplay muted loop id="myVideoLg"
                poster="<?php echo get_template_directory_uri(); ?>/assets/video/KAH_Video__mute.png">
                <source src="<?php echo get_template_directory_uri(); ?>/assets/video/KA.mp4" type="video/mp4">
                <!-- <source src="<?php echo get_template_directory_uri(); ?>/assets/video/DSC_1805_3.webm" type="video/webm">
            <source src="<?php echo get_template_directory_uri(); ?>/assets/video/DSC_1805_3.ogg" type="video/ogg">-->
            </video>

            <div class="main-caption">
                <?php the_title( '<h1 id="keyMessage" class="">', '</h1>');?>
            </div>
        </div>
    </div>



    <section class="container-cream">
        <header class="page-header section-heading">
            <h2>Welcome to The Kings Arms Hotel</h2>
        </header><!-- .page-header -->
        <div class="key-offers">

            <a href="<?php echo get_home_url(); ?>/the-six-restaurant/">
                <div class="card"
                    style="background-image: url('<?php echo home_url(); ?>/wp-content/uploads/2024/03/CD1_8343.jpg');">
                    <div class="text-container">
                        <span>Food and Drink</span>
                    </div>
                </div>
            </a>
            <a href="<?php echo get_home_url(); ?>/events-spaces/">
                <div class="card"
                    style="background-image: url('<?php echo home_url(); ?>/wp-content/uploads/2024/03/KAH_restaurant_001-1024x683-1.jpg');">
                    <div class="text-container">
                        <span>Events</span>
                    </div>
                </div>
            </a>
            <a href="<?php echo get_home_url(); ?>/hotel/">
                <div class="card"
                    style="background-image: url('<?php echo home_url(); ?>/wp-content/uploads/2024/03/About-1.png');">
                    <div class="text-container">
                        <span>The Hotel</span>
                    </div>
                </div>
            </a>
        </div>

        <div class="the-introduction">
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

        </div>
    </section>

    <section class="container-white">
        <header class="page-header section-heading">
            <h2>News and special offers at The Kings Arms</h2>
            <a href="/whats-on/"><button class="section-button">All News</button></a>
        </header>

        <?php get_template_part( 'template-parts/blog-loop', get_post_type() ); ?>

    </section>

    <section class="events-container container-cream">
        <header class="page-header section-heading">
            <h2>Book the perfect space for your private party</h2>
            <a href="/whats-on/"><button class="section-button">View All Spaces</button></a>
        </header>

        <?php get_template_part( 'template-parts/events-carousel', get_post_type() ); ?>
    </section>
    <section class="hotel-container container-white">
        <header class="page-header section-heading">
            <h2>Stay the night at The Kings Arms Hotel, Hampton Court</h2>
            <a href="/hotel/"><button class="section-button">Find Out More</button></a>
        </header>


        <?php get_template_part( 'template-parts/hotel-carousel', get_post_type() ); ?>
    </section>



</main>
<?php get_footer(); ?>