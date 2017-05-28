<?php
/**
 * Theme functions
 *
 * Sets up the theme and provides some helper functions.
 *
 * @package cg_studio
 */


/* OEMBED SIZING
 ========================== */
 
if ( ! isset( $content_width ) )
	$content_width = 600;
	
	
/* THEME SETUP
 ========================== */
 
if ( ! function_exists( 'cg_studio_setup' ) ):
function cg_studio_setup() {

	// Available for translation
	load_theme_textdomain( 'cg-studio', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );

	// Add custom nav menu support
	register_nav_menu( 'primary', __( 'Primary Menu', 'cg-studio' ) );
	
	// Add featured image support
	add_theme_support( 'post-thumbnails' );
	
	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
	
	// Add custom image sizes
	// add_image_size( 'name', 500, 300 );
}
endif;
add_action( 'after_setup_theme', 'cg_studio_setup' );


/* SIDEBARS & WIDGET AREAS
 ========================== */
function cg_studio_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'cg-studio' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'cg_studio_widgets_init' );


/* ENQUEUE TITLE TAG
 ========================== */
function theme_slug_setup() {
   add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'theme_slug_setup' );


/* ENQUEUE SCRIPTS & STYLES
 ========================== */
function cg_studio_scripts() {
	// theme style.css file
	wp_enqueue_style( 'cg-studio-style', get_stylesheet_uri() );
	
	// threaded comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	// vendor scripts
//	wp_enqueue_script(
//		'vendor',
//		get_template_directory_uri() . '/assets/vendor/newscript.js',
//		array('jquery')
//	);
	// theme scripts
//	wp_enqueue_script(
//		'theme-init',
//		get_template_directory_uri() . '/assets/theme.js',
//		array('jquery')
//	);
}    
add_action('wp_enqueue_scripts', 'cg_studio_scripts');


/* GOOGLE WEBFONTS
 ========================== */

function wpb_add_google_fonts() {

    wp_enqueue_style('wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Cormorant+Garamond:400,400i,600|Montserrat:400,500', false);
}

add_action ('wp_enqueue_scripts', 'wpb_add_google_fonts');



/* MISC EXTRAS
 ========================== */
 
// Comments & pingbacks display template
include('inc/functions/comments.php');

// Optional Customizations
// Includes: TinyMCE tweaks, admin menu & bar settings, query overrides
include('inc/functions/customizations.php');

/**
 * Remove the front-end admin bar for everybody, always
 */
show_admin_bar( false );