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



    <section class="events-container container-cream">
        <header class="page-header section-heading">
            <h2>More spaces</h2>
            <p>With adjoining rooms and outside areas too, you can book multiple spaces for your</p>

        </header>
        <?php get_template_part( 'template-parts/events-carousel', get_post_type() ); ?>
    </section>
    <section class="container-white">
        <div class="floor-plan">
            <header class="page-header section-heading">
                <h2>Flexible adjoining event spaces</h2>
                <p>Take a look at our floor plan</p>

            </header>
            <img src=" <?php echo get_template_directory_uri(); ?>/assets/img/hotelplan.png" alt="">

        </div>
    </section>
    <section id="packageBlocks" class="container-white">
        <header class="page-header section-heading">
            <h2>Take a look at our Party Packages</h2>
        </header>
        <!-- Changed ID -->
        <div class="parent-30-70">
            <div class="child-30">
                <?php 
                // Setup the query for the 'packages' custom post type with a unique variable name
                $packages_query = new WP_Query(array(
                    'post_type' => 'features',
                    'post_status' => 'publish',
                    'orderby' => 'menu_order',
                    'order' => 'ASC',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'feature_category',
                            'field'    => 'slug', 
                            'terms'    => 'packages', // Changed to 'packages'
                        ),
                    ),
                ));
                // Check if the query returns any posts
                if ($packages_query->have_posts()) : 
                ?>
                <ul class="nav-tabs" role="tablist">
                    <?php
                    // Loop through the posts to create tabs
                    while ($packages_query->have_posts()) : $packages_query->the_post();
                    $tabId = 'package-tab-' . get_the_ID(); // Changed ID prefix to 'package-tab-'
                    ?>
                    <li role="presentation" class="underline_link">
                        <a href="#<?php echo $tabId; ?>" aria-controls="<?php echo $tabId; ?>" role="tab"
                            data-toggle="tab">
                            <?php the_title(); ?>
                        </a>
                    </li>
                    <?php endwhile; ?>
                </ul>
                <?php endif; ?>
            </div>
            <div class="tab-content child-70">
                <?php
                $packages_query->rewind_posts();
                while ($packages_query->have_posts()) : $packages_query->the_post();
                $tabId = 'package-tab-' . get_the_ID(); // Ensure consistent ID prefix
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
    <section class="container-cream">
        <?php echo do_shortcode('[contact-form-7 id="5d17f5f" title="event Enquiry"]'); ?>

    </section>
</main>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize tabs and panels for both menus and packages
    initializeTabs('#menuBlocks .nav-tabs a', '#menuBlocks'); // For menus
    initializeTabs('#packageBlocks .nav-tabs a', '#packageBlocks'); // For packages

    function initializeTabs(selector, containerSelector) {
        const tabs = document.querySelectorAll(selector);
        const container = document.querySelector(containerSelector);

        tabs.forEach(tab => {
            tab.addEventListener('click', function(event) {
                event.preventDefault();
                changeTab(this, container);
            });
        });
    }

    function changeTab(activeTab, container) {
        const tabPanes = container.querySelectorAll('.tab-pane');
        const activePanelId = activeTab.getAttribute('href');
        const activePanel = document.querySelector(activePanelId);

        // Hide all tab panes smoothly
        tabPanes.forEach((pane) => {
            if (pane !== activePanel) { // Check if the pane is not the active pane
                pane.style.opacity = '0';
                setTimeout(() => {
                    pane.style.display = 'none';
                }, 300); // Wait for the opacity transition
            }
        });

        // Show the selected tab pane with a delay to allow for the hide animation to complete
        setTimeout(() => {
            activePanel.style.display = 'block';
            // This timeout ensures the display: block takes effect before starting the opacity transition
            setTimeout(() => {
                activePanel.style.opacity = '1';
            }, 10); // A short delay is enough
        }, 300); // Match the hide animation duration

        // Update active state for tabs
        tabs.forEach(tab => {
            tab.parentElement.classList.remove('active');
        });
        activeTab.parentElement.classList.add('active');
    }
});
</script>
<?php get_footer(); ?>