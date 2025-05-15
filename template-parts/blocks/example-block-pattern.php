<?php
/**
 * Example Block Pattern.
 *
 * This file provides an example of how to register a custom block pattern
 * for the WordPress block editor. Block patterns are pre-designed layouts
 * made of blocks that users can insert into their content.
 *
 * @link https://developer.wordpress.org/block-editor/reference-guides/block-api/block-patterns/
 *
 * @package WordPress_Starter_Theme
 * @since   2.0
 * @version 2.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'wordpress-starter-theme/example-pattern', // Unique pattern name (theme-slug/pattern-slug)
		array(
			'title'       => __( 'Example Pattern', 'wordpress-starter-theme' ),
			'description' => _x( 'A simple example pattern with a heading and a paragraph.', 'Block pattern description', 'wordpress-starter-theme' ),
			'categories'  => array( 'text', 'featured' ), // Add relevant categories.
			'keywords'    => array( 'example', 'simple', 'intro' ), // Add relevant keywords.
			'viewportWidth' => 800, // Optional: The width of the viewport in pixels for the preview.
			'content'     => '<!-- wp:heading {"level":2} -->
							<h2>' . esc_html__( 'My Example Heading', 'wordpress-starter-theme' ) . '</h2>
							<!-- /wp:heading -->

							<!-- wp:paragraph -->
							<p>' . esc_html__( 'This is a sample paragraph that demonstrates a simple block pattern. You can replace this with your own content and more complex block arrangements.', 'wordpress-starter-theme' ) . '</p>
							<!-- /wp:paragraph -->',
		)
	);
}

/**
 * Optional: Register a block pattern category if you need custom ones.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {
	register_block_pattern_category(
		'starter-theme-patterns', // Category slug
		array( 'label' => __( 'Starter Theme Patterns', 'wordpress-starter-theme' ) )
	);
}
