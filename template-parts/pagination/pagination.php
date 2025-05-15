<?php
/**
 * Displays the navigation to next/previous set of posts, when applicable.
 *
 * This template part is used on archive pages (like index.php, archive.php, search.php)
 * to allow users to navigate to older or newer sets of posts.
 *
 * @link https://developer.wordpress.org/reference/functions/the_posts_navigation/
 *
 * @package WordPress_Starter_Theme
 * @version 1.0
 * @since   2.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

the_posts_navigation(
	array(
		'prev_text'          => esc_html__( 'Newer posts', 'wordpress-starter-theme' ),
		'next_text'          => esc_html__( 'Older posts', 'wordpress-starter-theme' ),
		'screen_reader_text' => esc_html__( 'Posts navigation', 'wordpress-starter-theme' ),
	)
);

?>