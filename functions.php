<?php 

//Add Theme Support
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails', array( 'post' ) ); 
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-formats',  array( 'aside', 'gallery', 'quote', 'image', 'video' ) );
add_theme_support( 'responsive-embeds' );
add_theme_support( 'editor-styles' );
add_theme_support( 'html5', array( 'style','script' ) );

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
add_theme_support( 'custom-background' );
add_theme_support( 'customize-selective-refresh-widgets' );
add_theme_support( 'starter-content' );
add_theme_support( "align-wide" );
add_theme_support( "wp-block-styles" ) ;


// Register Menu Location
register_nav_menus(
    array(
        'menu-1' => esc_html__( 'Primary', 'walkestarter' ),
    )
);

// Load in our CSS
function walkestarter_enqueue_styles() {

    wp_enqueue_style( 'style', get_stylesheet_uri() );
  }
  add_action( 'wp_enqueue_scripts', 'walkestarter_enqueue_styles' );
  

// Widget Areas
function walkestarter_widgets_init() {

    register_sidebar( [
        'name'          => esc_html__( 'Main Sidebar', 'walkestarter' ),
        'id'            => 'main-sidebar',
        'description'   => esc_html__( 'Add widgets for main sidebar here', 'walkestarter' ),
        'before_widget' => '<section class="widget">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ] );
    register_sidebar( [
        'name'          => esc_html__( 'Footer Widget', 'walkestarter' ),
        'id'            => 'footer-widget',
        'description'   => esc_html__( 'Add footer widgets here', 'walkestarter' ),
        'before_widget' => '<section class="widget">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ] );
}
add_action( 'widgets_init', 'walkestarter_widgets_init' );




/**
 * Registers an editor stylesheet for the theme.
 */
function walkestarter_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'walkestarter_add_editor_styles' );

function walkestarter_enqueue_comments_reply() {
	if( get_option( 'thread_comments' ) )  {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'comment_form_before', 'walkestarter_enqueue_comments_reply' );

?>