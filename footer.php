<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cloudsdale_Theme
 */

?>


<footer class="site-footer">
    <section class="hotel-container container-blue">
        <header class="page-header section-heading">
            <h2>Join our mailing list for more news and special offers</h2>

        </header>
        <?php get_template_part( 'template-parts/mail-chimp', get_post_type() ); ?>
    </section>
    <section class="hotel-container container-cream">
        <header class="page-header section-heading">
            <h2>What our customers have been saying about us</h2>
            <a href="/hotel/"><button class="section-button">Read more reviews on Google</button></a>
        </header>
        <?php get_template_part( 'template-parts/reviews', get_post_type() ); ?>
    </section>
    <section class="container-dark">

        <div class="footer-cols">
            <div class="">
                <?php
                $days_of_week = array('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday');
                $contact_info_fields = array('address', 'map','phone', 'email', 'instagram');

                ?>

                <ul class="opening-times-list">
                    <li>
                        <h3>Opening Times</h3>

                    </li>

                    <?php foreach ($days_of_week as $day) : ?>
                    <?php $opening_time = get_theme_mod('opening_times_' . $day, 'Closed'); ?>
                    <li><?php echo strtoupper(substr($day, 0, 1)) . ': ' . esc_html($opening_time); ?></li>
                    <?php endforeach; ?>

                </ul>
            </div>
            <div class="">
                <ul class="opening-times-list">
                    <li>
                        <h3>Kitchen Times</h3>


                    </li>


                    <?php foreach ($days_of_week as $day) : ?>
                    <?php $opening_time_kitchen = get_theme_mod('opening_times_kitchen_' . $day, 'Closed'); ?>
                    <li><?php echo strtoupper(substr($day, 0, 1)) . ': ' . esc_html($opening_time_kitchen); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>



            <div class="">
                <ul class="opening-times-list">
                    <li>
                        <h3>Location</h3>
                    </li>

                    <?php
               $address_value = get_theme_mod('contact_info_address');
                $map_value = get_theme_mod('contact_info_map');
                ?>
                    <li><?php  if ($address_value) : echo 'Address: <br> ' . esc_html($address_value); endif; ?>
                    <li><a target="blank" href="<?php if ($map_value) : echo esc_html($map_value); endif; ?>">Open
                            in Google
                            Maps</a>
                    </li>
                    <?php
                $phone_value = get_theme_mod('contact_info_phone');
                $email_value = get_theme_mod('contact_info_email');
                $instagram_value = get_theme_mod('contact_info_instagram');
                ?>

                    <li><a
                            href="<?php if ($phone_value) : echo 'tel:' . esc_html($phone_value); endif; ?>"><?php if ($phone_value) : echo esc_html($phone_value); endif; ?></a>
                    </li>
                    <li><a
                            href="<?php if ($email_value) : echo 'mailto:' . esc_html($email_value); endif; ?>"><?php if ($email_value) : echo esc_html($email_value); endif; ?></a>
                    </li>
                    <li><a target="_blank"
                            href="<?php if ($instagram_value) : echo esc_html($instagram_value); endif; ?>">Instagram</a>
                    </li>
                </ul>
            </div>


            <div class="">
                <ul class="opening-times-list">
                    <li>
                        <h3>More</h3>
                    </li>


                    <li> <a href="<?php echo get_home_url(); ?>/privacy-policy/">Privacy Policy</a> </li>
                    <li> <a href="<?php echo get_home_url(); ?>/cookie-policy/">Cookie Policy</a> </li>
                    <li><a href="<?php echo get_home_url(); ?>/work-with-us/">Work with us</a> </li>

                </ul>
            </div>




        </div>



    </section>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>