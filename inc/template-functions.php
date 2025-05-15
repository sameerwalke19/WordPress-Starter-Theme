<?php
/**
 * Functions which enhance the theme by hooking into WordPress.
 *
 * This file contains functions that hook into various WordPress actions and filters
 * to modify or extend core functionality, such as adding body classes or
 * modifying output in the head section.
 *
 * @link https://developer.wordpress.org/reference/hooks/
 *
 * @since   2.0
 * @version 2.0
 *
 * @package WordPress_Starter_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'wordpress_starter_theme_body_classes' ) ) :
	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 * @return array
	 *
	 * @since 2.0
	 */
	function wordpress_starter_theme_body_classes( $classes ) {
		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		// Adds a class of no-sidebar when there is no sidebar present.
		if ( ! is_active_sidebar( 'main-sidebar' ) ) {
			$classes[] = 'no-sidebar';
		}

		return $classes;
	}
endif;
add_filter( 'body_class', 'wordpress_starter_theme_body_classes' );

if ( ! function_exists( 'wordpress_starter_theme_pingback_header' ) ) :
	/**
	 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
	 *
	 * @since 2.0
	 */
	function wordpress_starter_theme_pingback_header() {
		if ( is_singular() && pings_open() ) {
			printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
		}
	}
endif;
add_action( 'wp_head', 'wordpress_starter_theme_pingback_header' );

?>