<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cloudsdale_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
if (is_single() || is_page()) {
    $meta_description = get_post_meta(get_the_ID(), "meta-description-text", true);
    $meta_keywords = get_post_meta(get_the_ID(), "meta-keywords-text", true);
    if ($meta_description) {
        echo '<meta name="description" content="' . esc_attr($meta_description) . '">' . "\n";
    }
    if ($meta_keywords) {
        echo '<meta name="keywords" content="' . esc_attr($meta_keywords) . '">' . "\n";
    }
}
?>
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>

    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text"
            href="#primary"><?php esc_html_e( 'Skip to content', 'cloudsdale-master' ); ?></a>



        <header id="masthead" class="site-header">
            <div class="nav-background"></div>
            <div id="off-canvas-menu" class="off-canvas-menu">
                <button id="open-menu" class="menu-button container-checkbox">
                    <input type="checkbox" id="checkbox1" class="checkbox1 visuallyHidden">
                    <label for="checkbox1">
                        <div class="hamburger hamburger1">
                            <span class="bar bar1"></span>
                            <span class="bar bar2"></span>
                            <span class="bar bar3"></span>
                            <span class="bar bar4"></span>
                        </div>
                    </label>
                </button>
                <div class="menu-content">
                    <?php /* wp_nav_menu(array('theme_location' => 'primary-menu')); */ ?>

                    <div id="fancyMenu" class="menu">
                        <div class="menu-logo"><a href="<?php echo esc_url(home_url('/')); ?>"><img class="appear2"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/logos/logo_wolftipple_white.svg"
                                    alt="Kings Arms Hotel - Hampton Court"></a></div>
                        <?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
									'container'      => 'div',
									'menu_class'     => 'navbar-nav',
									
								)
							);
							?>
                    </div>
                </div>

            </div>
            <div id="bookBtn" class="row">
                <a href="#contact">Get in touch</a>


            </div>
            <a href="<?php echo esc_url(home_url('/')); ?>" id="mainLogo" class="">
                <img class="text-logo"
                    src="<?php echo get_template_directory_uri(); ?>/assets/logos/logo_wolftipple_wide.svg" alt="">
                <img class="img-logo" src="<?php echo get_template_directory_uri(); ?>/assets/logos/logo-icon-blue.svg"
                    alt="">
            </a>
        </header><!-- #masthead -->