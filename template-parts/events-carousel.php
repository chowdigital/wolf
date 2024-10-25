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

    <ul id="responsive" class="content-slider">
        <?php
        $the_query = new WP_Query(array(
            'post_type' => 'features', // Specify the post type
            'posts_per_page' => 7,
            'tax_query' => array(
                array(
                    'taxonomy' => 'feature_category', // Your custom taxonomy
                    'field'    => 'slug',
                    'terms'    => 'spaces', // The slug of the taxonomy term
                ),
            ),
        ));

        if ($the_query->have_posts()) {
            while ($the_query->have_posts()) {
                $the_query->the_post();
                ?>
        <li class="item-body">
            <div class="item-content">

                <div class="event-card">
                    <a href="<?php echo get_permalink() ?>">
                        <div class="event-card" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
                            <div class="text-container">
                                <span><?php the_title(); ?></span>

                                <div class="entry-content">
                                    <?php
                                echo '<p>' . wp_trim_words(get_the_content(), 20) . '</p>';
                    ?>
                                </div><!-- .entry-content -->

                            </div>
                        </div>
                    </a>

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