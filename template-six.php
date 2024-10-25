<?php /* Template Name: The Six */ get_header(); ?>

<main id="primary" class="site-main">
    <div id="pageHeadImg" class="page-head-img"
        style="background-image: url(<?php the_post_thumbnail_url(); ?>); background-repeat: no-repeat; background-position: center; background-size: cover;">

    </div>

    <section class="container-white">


        <header class="page-header section-heading">
            <h1><?php the_title(); ?> at The Kings Arms, Hampton Court</h1>
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
    <section class="container-white">
        <header class="page-header section-heading">
            <h2>Special Offers</h2>
            <a href="/whats-on/"><button class="section-button">more special offers</button></a>
        </header>

        <?php get_template_part( 'template-parts/blog-loop', get_post_type() ); ?>

    </section>
    <section id="menuBlocks" class="container-cream">
        <header class="page-header section-heading">
            <h2>Take a look at our sample Menus</h2>
        </header>
        <div class="parent-30-70">



            <div class="child-30">
                <?php 
                    // Setup the query for the 'menus' custom post type
                    $custom_query = new WP_Query(array(
                        'post_type' => 'features',
                        'post_status' => 'publish',
                        'orderby' => 'menu_order',
                        'order' => 'ASC',
                        'posts_per_page' => -1,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'feature_category',
                                'field'    => 'slug', 
                                'terms'    => 'menu', 
                            ),
                        ),
                    ));
                    // Check if the query returns any posts
                    if ($custom_query->have_posts()) : 
                    ?>
                <ul class="nav-tabs" role="tablist">
                    <?php
                            // Loop through the posts to create tabs
                            while ($custom_query->have_posts()) : $custom_query->the_post();
                            // Use the post ID to create a unique tab ID
                            $tabId = 'simple-tab-' . get_the_ID();
                            ?>
                    <li role="presentation" class="underline_link">
                        <a href="#<?php echo $tabId; ?>" role="tab">
                            <?php the_title(); ?>
                        </a>
                    </li>

                    <?php endwhile; ?>
                </ul>
                <?php endif; ?>
            </div>


            <div class="tab-content child-70">
                <?php
                    // Reset post data for creating tab panels
                    $custom_query->rewind_posts();

                    // Loop through the posts again to create tab panels
                    while ($custom_query->have_posts()) : $custom_query->the_post();
                    $tabId = 'simple-tab-' . get_the_ID();
                    ?>
                <div class="tab-pane" id="<?php echo $tabId; ?>" role="tabpanel">
                    <div class="section-heading">
                        <h1><?php the_title(); ?></h1>
                    </div>
                    <div><?php the_content(); ?></div>
                </div>
                <?php endwhile; ?>
            </div>



        </div>
    </section>
    <section class="container-white">
        <?php get_template_part( 'template-parts/book-food', get_post_type() ); ?>
    </section>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('.nav-tabs a');
        const tabPanes = document.querySelectorAll('.tab-pane');
        const container = document.querySelector('.container-cream'); // Get the main container

        function changeTab(activeTab) {
            // Fade out all panes
            tabPanes.forEach((pane) => {
                pane.style.opacity = '0';
                setTimeout(() => {
                    pane.style.display = 'none';
                }, 300); // Hide after fade
            });

            const activePanelId = activeTab.getAttribute('href');
            const activePanel = document.querySelector(activePanelId);

            setTimeout(() => {
                // Display the new active tab content but keep it transparent
                activePanel.style.display = 'block';
                setTimeout(() => {
                    activePanel.style.opacity = '1';
                    // Adjust the container height after the content is visible
                    adjustContainerHeight(activePanel);
                }, 10);

                tabs.forEach(tab => {
                    tab.parentElement.classList.remove('active');
                });
                activeTab.parentElement.classList.add('active');
            }, 310); // Wait for other content to fade out
        }

        function adjustContainerHeight(activePanel) {
            // Temporarily reset the container's height to auto to calculate the new height
            container.style.height = auto;
            const targetHeight = container.offsetHeight + 'px'; // Get the new height

            // Immediately set the container's height back to its current value
            container.style.height = window.getComputedStyle(container).height;

            // Force reflow/repaint to ensure the height change is registered
            container.offsetHeight;

            // Now, transition the height to the new value
            container.style.height = targetHeight;
        }

        tabs.forEach(tab => {
            tab.addEventListener('click', function(event) {
                event.preventDefault();
                changeTab(this);
            });
        });
    });
    </script>


</main>


<?php get_footer(); ?>