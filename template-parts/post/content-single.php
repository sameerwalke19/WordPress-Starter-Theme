<?php
/**
 * Template part for displaying single post content.
 * This is the primary template part for single posts, typically called from single.php.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress_Starter_Theme
 * @since   1.0
 * @version 2.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'content-single' ); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php // DATE (Most recent: modified or published if not modified)
			// Uses get_the_modified_date().
			$time_string = '<span class="date-prefix">' . esc_html_x( 'on', 'post date prefix', 'wordpress-starter-theme' ) . '</span> <time class="entry-date" datetime="%1$s">%2$s</time>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- $time_string is safe.
			printf(
				$time_string,
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- $time_string is safe.
				esc_attr( get_the_modified_date( DATE_W3C ) ),
				esc_html( get_the_modified_date() )
			);

			// "by" AUTHOR
			$author_id = get_the_author_meta( 'ID' ); // Check if an author is assigned.
			if ( $author_id ) { // Check if an author is assigned to the post.
				echo ' <span class="byline-prefix">' . esc_html_x( 'by', 'post author prefix', 'wordpress-starter-theme' ) . '</span> ';
				$author_display_name = get_the_author();
				$author_link_html  = sprintf(
						'<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
						esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
						esc_html( $author_display_name )
					);
				echo $author_link_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			// "in" CATEGORIES (Only for 'post' type)
			// This checks if the post type is 'post' before trying to display categories.
			if ( 'post' === get_post_type() ) {
				/* translators: used between list items, there is a space after the comma. */
				$categories_list = get_the_category_list( esc_html__( ', ', 'wordpress-starter-theme' ) );
				if ( $categories_list ) {
					echo ' <span class="cat-prefix">' . esc_html_x( 'in', 'post category prefix', 'wordpress-starter-theme' ) . '</span> ';
					/* translators: 1: list of categories. */
					// $categories_list is already HTML with links.
					printf( '<span class="cat-links">%s</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
			}
			?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php
	// Display post thumbnail. Expected in /inc/template-functions.php or /inc/template-tags.php
	if ( function_exists( 'wordpress_starter_theme_post_thumbnail' ) ) {
		wordpress_starter_theme_post_thumbnail();
	} elseif ( has_post_thumbnail() ) { // Basic fallback
		// Consider using a specific image size like 'full', 'post-thumbnail', or a custom registered size.
		// 'large' is a good default. 'alignwide' can be useful with block editor themes.
		the_post_thumbnail( 'large', array( 'class' => 'alignwide' ) );
		echo '</div><!-- .post-thumbnail -->';
	}
	?>

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers. */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'wordpress-starter-theme' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'wordpress-starter-theme' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
		// Display post tags. Expected in /inc/template-tags.php
		if ( function_exists( 'wordpress_starter_theme_tags_list' ) ) {
		} elseif ( 'post' === get_post_type() ) { // Basic fallback for tags
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'wordpress-starter-theme' ) );
			if ( $tags_list ) {
				echo '<div class="entry-tags">'; // Keep .entry-tags for specific styling if needed
				printf(
					/* translators: 1: list of tags. */
					'<span class="tags-links">' . esc_html__( 'Tagged: %1$s', 'wordpress-starter-theme' ) . '</span>',
					$tags_list // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				);
				echo '</div><!-- .entry-tags -->';
			}
		}
		?>
	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
