<?php
/**
 * Wojciech Floriański functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Wojciech_Floriański
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wflorianski_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Wojciech Floriański, use a find and replace
		* to change 'wflorianski' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'wflorianski', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'wflorianski' ),
			'menu-mobile' => esc_html__( 'Mobile', 'wflorianski' ),
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
			'wflorianski_custom_background_args',
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
add_action( 'after_setup_theme', 'wflorianski_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wflorianski_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wflorianski_content_width', 640 );
}
add_action( 'after_setup_theme', 'wflorianski_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wflorianski_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'wflorianski' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'wflorianski' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'wflorianski_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wflorianski_scripts() {
	wp_enqueue_style( 'wflorianski-style', get_stylesheet_uri(), array(), _S_VERSION );
	
	// Main style
	wp_enqueue_style( 'wflorianski-custom-style', get_template_directory_uri() . '/css/style.css', array(), _S_VERSION );

	// jQuery
	wp_register_script( 'jQuery', get_template_directory_uri() . '/plugins/jQuery/jquery-3.6.0.min.js', null, null, true );
	wp_enqueue_script('jQuery');

	// Main script
	wp_register_script( 'wflorianski-script', get_template_directory_uri() . '/js/custom.js', null, null, true );
	wp_enqueue_script('wflorianski-script');
	wp_localize_script( 'wflorianski-script', 'wf', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'wflorianski_scripts' );

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
 * Disable WordPress Admin Bar for all users
 */
add_filter( 'show_admin_bar', '__return_false' );

/**
 * String translations
 */
add_action('init', function() {
	pll_register_string('wflorainski', 'Wszystkie prawa zastrzeżone.');
	pll_register_string('wflorainski', 'Polityka Cookies');
	pll_register_string('wflorainski', 'Czujesz to samo?');
	pll_register_string('wflorainski', 'Skontaktuj się ze mną i obserwuj');
	pll_register_string('wflorainski', 'O mnie');
	pll_register_string('wflorainski', 'Inne posty, które mogą Ci się spodobać');
});

/* ACF local JSON */
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
function my_acf_json_save_point( $path ) {
    $path = get_stylesheet_directory() . '/acf-json';
    return $path;
}

add_filter('acf/settings/load_json', 'my_acf_json_load_point');
function my_acf_json_load_point( $paths ) {
    unset($paths[0]);
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
}

/**
 * Register ACF Blocks
 */
add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

		// Opis i wylgąd rasy
        acf_register_block_type(array(
            'name'              => 'fleximage',
            'title'             => __('Dwa zdjęcia'),
            'description'       => __('Wyświetla dwa zdjęcia obok siebie.'),
            'render_template'   => 'blocks/fleximage/fleximage.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array('fleximage', 'zdjecia', 'image'),
        ));
    }
}