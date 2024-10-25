<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cloudsdale_Theme
 */

?>
<!--
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<link rel='stylesheet' id='lightslider-css'
    href='http://localhost:8888/KingsArms_2/wp-content/themes/KingsArms_2/lightslider.css?ver=1' media='all' />
<script src="http://localhost:8888/KingsArms_2/wp-content/themes/KingsArms_2/js/lightslider.js?ver=1.1"
    id="lightslider-js"></script>-->


<div class="item carosel-section">

    <ul id="hotel" class="content-slider">
        <?php
        $the_query = new WP_Query(array(
            'post_type' => 'features', // Specify the post type
            'posts_per_page' => 7,
            'tax_query' => array(
                array(
                    'taxonomy' => 'feature_category', // Your custom taxonomy
                    'field'    => 'slug',
                    'terms'    => 'hotel', // The slug of the taxonomy term
                ),
            ),
        ));

        if ($the_query->have_posts()) {
            while ($the_query->have_posts()) {
                $the_query->the_post();
                ?>
        <li class="item-body">
            <div class="item-content">

                <div class="hotel-card">

                    <div class="hotel-text">
                        <header class="entry-header">
                            <h3 class="entry-category"><?php the_category(', '); ?></h3>
                            <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>'); ?>
                        </header><!-- .entry-header -->

                        <div class="entry-content">
                            <?php
                    echo '<p>' . wp_trim_words(get_the_content(), 20) . '</p>'; // Using wp_trim_words to limit to 500 words
                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'cloudsdale-master'),
                        'after'  => '</div>',
                    ));
                    ?> <div class="underline_link">
                                <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">Read More</a>
                            </div>

                        </div><!-- .entry-content -->

                    </div>


                    <div class="hotel-img" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
                    </div>




                </div>
            </div>
        </li>
        <?php
            } // End while
            wp_reset_postdata();
        } // End if
        ?>
    </ul>
</div>

<script>
$(document).ready(function() {
    $("#hotel").lightSlider({
        item: 1,
        loop: true,
        slideMove: 1,
        easing: "cubic-bezier(0.25, 0, 0.25, 1)",
        speed: 1000,
        auto: false,
        enableTouch: true,
        pauseOnHover: true,

    });
});
/* Events Loop Side Scroll END */
</script>