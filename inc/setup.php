<?php
/**
 * Theme setup functions.
 *
 * This file is responsible for setting up core theme functionalities,
 * registering theme support for various WordPress features, defining navigation menus,
 * and initializing widget areas.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress_Starter_Theme
 * @since   2.0
 * @version 2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'wordpress_starter_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since 1.0
	 */
	function wordpress_starter_theme_setup() {
		// Make theme available for translation. Translations are in /languages/.
		load_theme_textdomain( 'wordpress-starter-theme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		// Example: set_post_thumbnail_size( 1568, 9999 );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary Menu', 'wordpress-starter-theme' ),
				// You can add more menu locations here, e.g., 'footer' => esc_html__( 'Footer Menu', 'wordpress-starter-theme' ),
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
		// add_theme_support( 'custom-background', apply_filters( 'wordpress_starter_theme_custom_background_args', array(
		// 'default-color' => 'ffffff',
		// 'default-image' => '',
		// ) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );
		// Enqueue editor styles. Path is relative to the theme root.
		add_editor_style( 'assets/css/editor-style.css' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for post formats.
		add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );

		// Add support for custom logo.
		add_theme_support( 'custom-logo', array(
			'height'      => 100, // Default height.
			'width'       => 400, // Default width.
			'flex-height' => true,
			'flex-width'  => true,
		) );

		// Remove theme support for a core feature.
		// remove_theme_support( 'core-block-patterns' );
	}
endif;
add_action( 'after_setup_theme', 'wordpress_starter_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since 1.0
 */
function wordpress_starter_theme_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'wordpress_starter_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'wordpress_starter_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @since 1.0
 */
function wordpress_starter_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Main Sidebar', 'wordpress-starter-theme' ),
			'id'            => 'main-sidebar',
			'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'wordpress-starter-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	// You can register more sidebars here if needed.
}
add_action( 'widgets_init', 'wordpress_starter_theme_widgets_init' );

/**
 * Register block patterns.
 *
 * @since 2.0
 */
function wordpress_starter_theme_register_block_patterns() {
	if ( function_exists( 'register_block_pattern' ) ) {
		// Register a custom pattern category if needed
		if ( function_exists( 'register_block_pattern_category' ) ) {
			register_block_pattern_category(
				'starter-theme-custom', // Category slug
				array( 'label' => __( 'Starter Custom Patterns', 'wordpress-starter-theme' ) )
			);
		}

		// Automatically load all PHP files from the /inc/block-patterns/ directory.
		$block_pattern_files = glob( get_theme_file_path( '/inc/block-patterns/*.php' ) );
		foreach ( $block_pattern_files as $block_pattern_file ) {
			require_once $block_pattern_file;
		}
	}
}
add_action( 'init', 'wordpress_starter_theme_register_block_patterns' );

/**
 * Enqueue the main CSS file.
 * This is separate from style.css, which is enqueued in inc/enqueue.php.
 *
 * @since 2.1
 */
function wordpress_starter_theme_enqueue_main_styles() {
    wp_enqueue_style( 'wordpress-starter-theme-main', get_template_directory_uri() . '/assets/css/main.css', array(), WORDPRESS_STARTER_THEME_VERSION );
}
add_action( 'wp_enqueue_scripts', 'wordpress_starter_theme_enqueue_main_styles' );

// If you plan to use WooCommerce, you can uncomment the following lines:
/*
function wordpress_starter_theme_woocommerce_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'wordpress_starter_theme_woocommerce_setup' );
*/

?>