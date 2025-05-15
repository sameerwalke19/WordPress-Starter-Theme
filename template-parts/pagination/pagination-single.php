<?php
/**
 * Displays the navigation to next/previous post, when applicable.
 *
 * This template part is used on single post views to allow users to navigate
 * to the chronologically next or previous post.
 *
 * @link https://developer.wordpress.org/reference/functions/the_post_navigation/
 *
 * @package WordPress_Starter_Theme
 * @since   1.0
 * @version 2.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( is_singular( 'post' ) ) : // You can add other CPTs here: is_singular( array( 'post', 'your_cpt' ) )

	the_post_navigation(
		array(
			'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous Post:', 'wordpress-starter-theme' ) . '</span> <span class="nav-title">%title</span>',
			'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next Post:', 'wordpress-starter-theme' ) . '</span> <span class="nav-title">%title</span>',
			'screen_reader_text' => esc_html__( 'Post navigation', 'wordpress-starter-theme' ),
		)
	);

endif;
?>