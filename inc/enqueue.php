<?php
/**
 * Enqueue scripts and styles.
 *
 * This file is responsible for registering and enqueuing the theme's
 * CSS stylesheets and JavaScript files. It ensures that assets are loaded
 * correctly and efficiently, including handling dependencies and versioning.
 *
 * @link https://developer.wordpress.org/themes/basics/including-css-javascript/
 *
 * @since   2.0
 * @version 2.0
 *
 * @package WordPress_Starter_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'wordpress_starter_theme_scripts' ) ) :
	/**
	 * Enqueue scripts and styles.
	 */
	function wordpress_starter_theme_scripts() {
		// Main stylesheet.
		wp_enqueue_style(
			'wordpress-starter-theme-style',
			get_stylesheet_uri(),
			array(),
			WORDPRESS_STARTER_THEME_VERSION
		);
		

		// Example: Enqueue your custom JavaScript file.
		// Create this file in /assets/js/custom-scripts.js
		/*
		wp_enqueue_script(
			'wordpress-starter-theme-custom-scripts', // Use a unique handle for your script
			get_template_directory_uri() . '/js/main.js',
			array( 'jquery' ), // Add dependencies like 'jquery' if needed
			WORDPRESS_STARTER_THEME_VERSION,
			true // Load in footer
		);
		*/

		// Example: Enqueue Google Fonts.
		/*
		wp_enqueue_style(
			'wordpress-starter-theme-fonts',
			'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap',
			array(),
			null // No version needed for external resources
		);
		*/

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
endif;
add_action( 'wp_enqueue_scripts', 'wordpress_starter_theme_scripts' );

?>