<?php
/**
 * Cloudsdale_Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Cloudsdale_Theme
 */

if ( ! defined( 'CLOUDSDALE_MASTER_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'CLOUDSDALE_MASTER_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cloudsdale_master_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Cloudsdale_Theme, use a find and replace
		* to change 'cloudsdale-master' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'cloudsdale-master', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'cloudsdale-master' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'cloudsdale_master_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'cloudsdale_master_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cloudsdale_master_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cloudsdale_master_content_width', 640 );
}
add_action( 'after_setup_theme', 'cloudsdale_master_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cloudsdale_master_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'cloudsdale-master' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'cloudsdale-master' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'cloudsdale_master_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cloudsdale_master_scripts() {
	//wp_enqueue_style( 'Bootstrap','https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css', array() );

	wp_enqueue_style( 'cloudsdale-master-style', get_stylesheet_uri(), array(), $ver = 1.1 );
	wp_style_add_data( 'cloudsdale-master-style', 'rtl', 'replace' );
   // wp_enqueue_script( 'Bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', array(), '1.0.0', true );
   
   wp_enqueue_style( 'lightslider', get_template_directory_uri() . '/lightslider.css', array(), $ver = 1.0 );
	wp_enqueue_script( 'cloudsdale-master-navigation', get_template_directory_uri() . '/js/navigation.js', array(), CLOUDSDALE_MASTER_VERSION, true );
	//wp_enqueue_script( 'parallax', get_template_directory_uri() . '/js/simpleParallax.min.js', array(), CLOUDSDALE_MASTER_VERSION, true );
	wp_enqueue_script( 'lightslider', get_template_directory_uri() . '/js/lightslider.js', array(),  $ver = 1.1, false );

	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array(),  $ver = 1.1, true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cloudsdale_master_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Google Fonts
 */
function my_theme_enqueue_styles() {
    // Enqueue Google Fonts: Caudex and Open Sans with Open Sans Light (300)
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Caudex:ital,wght@0,400;0,700;1,400;1,700&family=Open+Sans:wght@300;400;700&display=swap', false);
}

add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');
/**
 * Add custom classes to nav menu
 */
function add_custom_menu_item_class($classes, $item, $args, $depth) {
    // Check if the menu is the one you want to target
    if($args->theme_location == 'menu-1') {
        $classes[] = 'appear2 draw-border-btn';  // Add your custom class
    }

    return $classes;
}
add_filter('nav_menu_css_class', 'add_custom_menu_item_class', 10, 4);
/**
 * Custom excerpt length
 */

function custom_excerpt_length($content, $word_limit = 50) {
    $content_words = explode(' ', strip_tags($content));
    $excerpt = implode(' ', array_slice($content_words, 0, $word_limit));
    
    // Check if original content is longer than the excerpt
    if (count($content_words) > $word_limit) {
        $excerpt .= '...'; // Add an ellipsis to indicate that the content has been truncated
    }

    return $excerpt;
}

// Custom Meta Tags Box

function add_custom_meta_box() {
    add_meta_box("meta-description", "Meta Description", "custom_meta_box_markup", "post", "side", "high", null);
    add_meta_box("meta-description", "Meta Description", "custom_meta_box_markup", "page", "side", "high", null);

    add_meta_box("meta-keywords", "Meta Keywords", "custom_meta_box_markup_keywords", "post", "side", "high", null);
    add_meta_box("meta-keywords", "Meta Keywords", "custom_meta_box_markup_keywords", "page", "side", "high", null);
}

add_action("add_meta_boxes", "add_custom_meta_box");

function custom_meta_box_markup($object) {
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");

    ?>
<div>
    <label for="meta-description-text">Description</label>
    <textarea name="meta-description-text" id="meta-description-text"
        style="width: 100%;"><?php echo get_post_meta($object->ID, "meta-description-text", true); ?></textarea>
</div>
<?php
}

function custom_meta_box_markup_keywords($object) {
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");

    ?>
<div>
    <label for="meta-keywords-text">Keywords</label>
    <input name="meta-keywords-text" id="meta-keywords-text" type="text"
        value="<?php echo get_post_meta($object->ID, "meta-keywords-text", true); ?>">
</div>
<?php
}

function save_custom_meta_box($post_id, $post, $update) {
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__))) {
        return $post_id;
    }

    if (!current_user_can("edit_post", $post_id)) {
        return $post_id;
    }

    if (defined("DOING_AUTOSAVE") && DOING_AUTOSAVE) {
        return $post_id;
    }

    // Check and save the meta-description-text
    if (isset($_POST["meta-description-text"])) {
        update_post_meta($post_id, "meta-description-text", $_POST["meta-description-text"]);
    }

    // Check and save the meta-keywords-text
    if (isset($_POST["meta-keywords-text"])) {
        update_post_meta($post_id, "meta-keywords-text", $_POST["meta-keywords-text"]);
    }
}

add_action("save_post", "save_custom_meta_box", 10, 3);


// Custom Meta tags box END
// Wolf Homepage Metaboxes 
// Hook into WordPress to create custom metaboxes
function custom_add_metaboxes() {
    add_meta_box('services_metabox', 'Services', 'display_services_metabox', 'page', 'normal', 'high');
    add_meta_box('team_metabox', 'Team Members', 'display_team_metabox', 'page', 'normal', 'high');
}
add_action('add_meta_boxes', 'custom_add_metaboxes');

// Display the Services Metabox
function display_services_metabox($post) {
    for ($i = 1; $i <= 6; $i++) {
        $service_title = get_post_meta($post->ID, "service_{$i}_title", true);
        $service_description = get_post_meta($post->ID, "service_{$i}_description", true);
        ?>
<h4>Service <?php echo $i; ?></h4>
<p>
    <label for="service_<?php echo $i; ?>_title">Title:</label>
    <input type="text" id="service_<?php echo $i; ?>_title" name="service_<?php echo $i; ?>_title"
        value="<?php echo esc_attr($service_title); ?>" style="width:100%;" />
</p>
<p>
    <label for="service_<?php echo $i; ?>_description">Description:</label>
    <textarea id="service_<?php echo $i; ?>_description" name="service_<?php echo $i; ?>_description"
        style="width:100%;"><?php echo esc_textarea($service_description); ?></textarea>
</p>
<?php
    }
}

// Display the Team Members Metabox
function display_team_metabox($post) {
    for ($i = 1; $i <= 2; $i++) {
        $team_name = get_post_meta($post->ID, "team_{$i}_name", true);
        $team_bio = get_post_meta($post->ID, "team_{$i}_bio", true);
        $team_email = get_post_meta($post->ID, "team_{$i}_email", true);
        $team_phone = get_post_meta($post->ID, "team_{$i}_phone", true);
        ?>
<h4>Team Member <?php echo $i; ?></h4>
<p>
    <label for="team_<?php echo $i; ?>_name">Name:</label>
    <input type="text" id="team_<?php echo $i; ?>_name" name="team_<?php echo $i; ?>_name"
        value="<?php echo esc_attr($team_name); ?>" style="width:100%;" />
</p>
<p>
    <label for="team_<?php echo $i; ?>_bio">Biography:</label>
    <textarea id="team_<?php echo $i; ?>_bio" name="team_<?php echo $i; ?>_bio"
        style="width:100%;"><?php echo esc_textarea($team_bio); ?></textarea>
</p>
<p>
    <label for="team_<?php echo $i; ?>_email">Email:</label>
    <input type="email" id="team_<?php echo $i; ?>_email" name="team_<?php echo $i; ?>_email"
        value="<?php echo esc_attr($team_email); ?>" style="width:100%;" />
</p>
<p>
    <label for="team_<?php echo $i; ?>_phone">Phone:</label>
    <input type="tel" id="team_<?php echo $i; ?>_phone" name="team_<?php echo $i; ?>_phone"
        value="<?php echo esc_attr($team_phone); ?>" style="width:100%;" />
</p>
<?php
    }
}

// Save the Metabox Data
function save_custom_metaboxes($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    // Save Services Data
    for ($i = 1; $i <= 6; $i++) {
        if (isset($_POST["service_{$i}_title"])) {
            update_post_meta($post_id, "service_{$i}_title", sanitize_text_field($_POST["service_{$i}_title"]));
        }
        if (isset($_POST["service_{$i}_description"])) {
            update_post_meta($post_id, "service_{$i}_description", sanitize_textarea_field($_POST["service_{$i}_description"]));
        }
    }

    // Save Team Members Data
    for ($i = 1; $i <= 2; $i++) {
        if (isset($_POST["team_{$i}_name"])) {
            update_post_meta($post_id, "team_{$i}_name", sanitize_text_field($_POST["team_{$i}_name"]));
        }
        if (isset($_POST["team_{$i}_bio"])) {
            update_post_meta($post_id, "team_{$i}_bio", sanitize_textarea_field($_POST["team_{$i}_bio"]));
        }
        if (isset($_POST["team_{$i}_email"])) {
            update_post_meta($post_id, "team_{$i}_email", sanitize_email($_POST["team_{$i}_email"]));
        }
        if (isset($_POST["team_{$i}_phone"])) {
            update_post_meta($post_id, "team_{$i}_phone", sanitize_text_field($_POST["team_{$i}_phone"]));
        }
    }
}
add_action('save_post', 'save_custom_metaboxes');

// Wolf Homepage Metaboxes END