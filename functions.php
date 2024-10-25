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

/*section Features */
function create_posttype_features() {
    register_post_type( 'features',
        // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Features' ),
                'singular_name' => __( 'Feature' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'feature'),
            'show_in_rest' => true,
            'supports' => array( 'title', 'editor', 'revisions', 'thumbnail' ),
            'menu_icon' => 'dashicons-lightbulb',
            'show_in_nav_menus' => true,
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype_features' );

// Register taxonomy for Features
function create_features_taxonomy() {
    register_taxonomy(
        'feature_category',  // Taxonomy name
        'features',          // Post type
        array(
            'hierarchical' => true, // Allows category-like taxonomies
            'label' => 'Feature Categories',
            'query_var' => true,
            'show_in_rest' => true
        )
    );
}

// Hooking up our taxonomy function to the theme setup
add_action( 'init', 'create_features_taxonomy' );

// Add a nofollow to features pages so all feature info can be in the archive
function add_noindex_to_features_post_type() {
    // Check if on a single post of the 'features' custom post type
    if (is_singular('features')) {
        // Adding the noindex, follow meta tag to the head section of the page
        echo '<meta name="robots" content="noindex, follow">';
    }
}

add_action('wp_head', 'add_noindex_to_features_post_type');

// Add a new column to the admin list for the 'features' post type
function add_features_columns($columns) {
    $columns['feature_category'] = __('Feature Categories');
    return $columns;
}
add_filter('manage_features_posts_columns', 'add_features_columns');

// Populate the custom column with the 'feature_category' taxonomy terms
function custom_features_column($column, $post_id) {
    switch ($column) {
        case 'feature_category':
            $terms = get_the_terms($post_id, 'feature_category');
            if (!empty($terms)) {
                $out = array();
                foreach ($terms as $term) {
                    $out[] = sprintf('<a href="%s">%s</a>',
                        esc_url(add_query_arg(['post_type' => 'features', 'feature_category' => $term->slug], 'edit.php')),
                        esc_html(sanitize_term_field('name', $term->name, $term->term_id, 'feature_category', 'display'))
                    );
                }
                echo join(', ', $out);
            } else {
                _e('No Feature Categories');
            }
            break;
    }
}
add_action('manage_features_posts_custom_column', 'custom_features_column', 10, 2);
/* FEATURES END */

// Flushing rewrite rules on theme or plugin activation
function my_theme_or_plugin_activation() {
    // Register custom post types and taxonomies
    create_posttype_features();
    create_features_taxonomy();

    // Flush rewrite rules
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'my_theme_or_plugin_activation');

/* FLUSH END */


/**
 * Opening Time Start
 */

 function custom_theme_customize_register($wp_customize) {
    
	// Section for Custom Images
	$wp_customize->add_section('custom_images_section', array(
	  'title' => 'Custom Page Images',
	  'priority' => 33,
  ));

  // Setting for Food & Drink Page Image
  $wp_customize->add_setting('food_drink_page_image', array(
	  'default' => '',
	  'transport' => 'refresh',
  ));

  // Control for Food & Drink Page Image
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'food_drink_page_image', array(
	  'label' => 'Food & Drink Page Image',
	  'section' => 'custom_images_section',
	  'settings' => 'food_drink_page_image',
  )));

  // Setting for What's On Page Image
  $wp_customize->add_setting('whats_on_page_image', array(
	  'default' => '',
	  'transport' => 'refresh',
  ));

  // Control for What's On Page Image
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'whats_on_page_image', array(
	  'label' => 'What\'s On Page Image',
	  'section' => 'custom_images_section',
	  'settings' => 'whats_on_page_image',
  )));
  

	  
  // Create a section for opening times
  $wp_customize->add_section('opening_times', array(
	  'title' => 'Opening Times',
	  'priority' => 30,
  ));


  $wp_customize->add_section('opening_times_kitchen', array(
	  'title' => 'Opening Times Kitchen',
	  'priority' => 31,
  ));
  $wp_customize->add_section('contact_info', array(
	  'title' => 'Contact Information',
	  'priority' => 32,
  ));


  // Add a control for each day of the week (Opening Times)
  $days_of_week = array('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday');
  foreach ($days_of_week as $day) {
	  $wp_customize->add_setting('opening_times_' . $day, array(
		  'default' => 'Closed', // Set the default value to 'Closed'
	  ));

	  $wp_customize->add_control('opening_times_' . $day, array(
		  'label' => ucfirst($day) . ' Opening Times',
		  'section' => 'opening_times',
		  'type' => 'text',
	  ));
  }

  // Add a control for kitchen opening times (Opening Times Kitchen)
  $days_of_week_kitchen = array('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday');
  foreach ($days_of_week_kitchen as $day) {
	  $wp_customize->add_setting('opening_times_kitchen_' . $day, array(
		  'default' => 'Closed', // Set the default value to 'Closed'
	  ));

	  $wp_customize->add_control('opening_times_kitchen_' . $day, array( // Added an underscore here
		  'label' => ucfirst($day) . ' Opening Times Kitchen',
		  'section' => 'opening_times_kitchen',
		  'type' => 'text',
	  ));
  }
// Add a control for contact information 
$contact_info_fields = array('address', 'map', 'phone', 'email', 'instagram');
foreach ($contact_info_fields as $info_field) {
  $default_value = '';

  if ($info_field === 'email') {
	  $default_value = 'example@example.com'; // Default email
  } elseif ($info_field === 'phone') {
	  $default_value = '+1234567890'; // Default phone number
  }
  $label = ($info_field === 'map') ? 'Enter Google Maps URL' : ucfirst($info_field) . ' Contact Info';
  $label = ($info_field === 'instagram') ? 'Enter Instagram URL' : ucfirst($info_field) . ' Contact Info';

  $wp_customize->add_setting('contact_info_' . $info_field, array(
	  'default' => $default_value,
  ));

  $wp_customize->add_control('contact_info_' . $info_field, array(
	  'label' => $label,
	  'section' => 'contact_info',
	  'type' => 'text',
  ));

}

}
add_action('customize_register', 'custom_theme_customize_register');
  
//




/**
* remove customiser options 
*/ 

function remove_customizer_sections($wp_customize) {
  // Remove sections you don't want
  
  // Remove Header Image
  $wp_customize->remove_section('header_image');
  
  // Remove Colors
  $wp_customize->remove_section('colors');
  
  // Remove Background Image
  $wp_customize->remove_section('background_image');
  
  // Remove Widgets
  $wp_customize->remove_panel('widgets');
  
  // Remove Menus
  $wp_customize->remove_panel('nav_menus');
	  
  // Remove Menus
  $wp_customize->remove_panel('menus');
  
  // Remove Homepage Settings
  $wp_customize->remove_section('static_front_page');
  
  // Remove Additional CSS
  $wp_customize->remove_section('custom_css');
}

add_action('customize_register', 'remove_customizer_sections');

/**
* remove customiser options  END
*/ 
/* custom single page layouts */ 
add_filter('single_template', 'custom_single_template_for_terms');

function custom_single_template_for_terms($single) {
    global $post;

    // Check for 'spaces' term in the 'feature_category' taxonomy
    if (has_term('spaces', 'feature_category', $post->ID)) {
        $custom_template = locate_template('single-spaces.php');
        if (!empty($custom_template)) {
            return $custom_template;
        }
    }

    // Check for 'hotel' term in the 'feature_category' taxonomy
    if (has_term('hotel', 'feature_category', $post->ID)) {
        $custom_template = locate_template('single-hotel.php');
        if (!empty($custom_template)) {
            return $custom_template;
        }
    }

    // Return the default template if none of the conditions are met
    return $single;
}/* custom single page layouts END */ 

function add_google_tag_manager() {
    ?>
<!-- Google tag (gtag.js) google ads -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-347133003"></script>
<script>
window.dataLayer = window.dataLayer || [];

function gtag() {
    dataLayer.push(arguments);
}
gtag('js', new Date());

gtag('config', 'AW-347133003');
</script>
<!-- Google tag (gtag.js) analitics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-4CPSM48164"></script>
<script>
window.dataLayer = window.dataLayer || [];

function gtag() {
    dataLayer.push(arguments);
}
gtag('js', new Date());

gtag('config', 'G-4CPSM48164');
</script>

<?php
}
add_action('wp_head', 'add_google_tag_manager', 999);

function add_gtm_head() {
    ?>
<!-- Google Tag Manager -->
<script>
(function(w, d, s, l, i) {
    w[l] = w[l] || [];
    w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
    });
    var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
    j.async = true;
    j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
    f.parentNode.insertBefore(j, f);
})(window, document, 'script', 'dataLayer', 'GTM-WM4TZZ3W');
</script>
<!-- End Google Tag Manager -->
<?php
}
add_action('wp_head', 'add_gtm_head');

function add_gtm_body() {
    ?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WM4TZZ3W" height="0" width="0"
        style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php
}
add_action('wp_body_open', 'add_gtm_body');