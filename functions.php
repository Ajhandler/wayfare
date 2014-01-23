<?php
/**
 * Wayfare functions and definitions
 *
 * @package Wayfare
 */

/**
* Show all errors, without needing to go back to wp-config.php
*/

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'wf_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wf_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Wayfare, use a find and replace
	 * to change 'wf' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'wf', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'wf' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'wf_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // wf_setup
add_action( 'after_setup_theme', 'wf_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function wf_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'wf' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
    register_sidebar(array(
        'name' => __( 'Homepage Widgets' ),
        'id' => 'homepage-widgets',
        'description' => __( 'Widgets in this area will be shown on the homepage. Please only do multiples of three.' ),
        'before_widget' => '<div id="%1$s" class="widget homepage-widget laptop-four %2$s">',
        'after_widget'  => '</div>',
        'before_title' => '<h3 class="wayfared">',
        'after_title' => '</h3>'
    ));
    register_sidebar(array(
        'name' => __( 'Footer Widgets' ),
        'id' => 'footer-widgets',
        'description' => __( 'Widgets in this area will be shown in the footer. Please only do multiples of three.' ),
        'before_widget' => '<div id="%1$s" class="widget footer-widget laptop-four %2$s">',
        'after_widget'  => '</div>',
        'before_title' => '<h3 class="wayfared">',
        'after_title' => '</h3>'
    ));
}
add_action( 'widgets_init', 'wf_widgets_init' );



/**
 * Enqueue scripts and styles.
 */
function wf_scripts() {
	wp_enqueue_style( 'wf-style', get_stylesheet_uri() );

	wp_enqueue_script( 'wf-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'wf-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true 
	
/* 	wp_enqueue_script( 'fitvid', get_template_directory_uri() . '/js/jquery.fitvid.js', array(), '', true ); */

/* 	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array(), '', true ); */
);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wf_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';