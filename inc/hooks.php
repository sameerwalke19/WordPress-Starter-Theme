<?php
/**
 * Custom Hooks.
 *
 * This file is used to add your own custom action and filter hooks,
 * or to hook into existing WordPress or plugin hooks.
 * It helps keep theme-specific hook modifications organized.
 *
 * @link https://developer.wordpress.org/reference/hooks/
 *
 * @package WordPress_Starter_Theme
 * @since   2.0
 * @version 2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
if ( ! function_exists( 'wordpress_starter_theme_excerpt_length' ) ) :
	/**
	 * Filters the_excerpt() length.
	 *
	 * @since 2.0
	 * @param int $length Excerpt length.
	 * @return int (Maybe) modified excerpt length.
	 */
	function wordpress_starter_theme_excerpt_length( $length ) {
		// Return 70 words, or your desired number.
		// The default is 55.
		return 70;
	}
endif;
add_filter( 'excerpt_length', 'wordpress_starter_theme_excerpt_length', 999 );

if ( ! function_exists( 'wordpress_starter_theme_excerpt_more' ) ) :
	/**
	 * Filters the_excerpt() "read more" string.
	 *
	 * @since 2.0
	 * @param string $more The excerpt "read more" string.
	 * @return string (Maybe) modified "read more" string.
	 */
	function wordpress_starter_theme_excerpt_more( $more ) {
		// Check if it's a singular view; if so, don't add "Read More" as the full content is shown.
		if ( is_singular() ) {
			return $more;
		}
		// Return a link to the post.
		return sprintf(
			'&hellip; <a class="read-more" href="%1$s">%2$s</a>',
			esc_url( get_permalink( get_the_ID() ) ),
			esc_html__( 'Read More', 'wordpress-starter-theme' )
		);
	}
endif;
add_filter( 'excerpt_more', 'wordpress_starter_theme_excerpt_more' );


?>