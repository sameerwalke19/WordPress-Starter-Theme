<?php
/**
 * Template part for displaying post content in archive pages.
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

<article id="post-<?php the_ID(); ?>" <?php post_class( 'content-archive' ); ?>>
	<header class="entry-header">
		<?php
		the_title(
			sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h2>'
		);
		?>

		<?php if ( 'post' === get_post_type() ) : // Display meta only for 'post' type, adjust if needed ?>
		<div class="entry-meta">
			<?php
			// DATE (Published date, no link)
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
			printf(
				$time_string,
				esc_attr( get_the_date( DATE_W3C ) ),
				esc_html( get_the_date() )
			);

			// "by" AUTHOR
			$author_id = get_the_author_meta( 'ID' );
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
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php
	// You can include a post thumbnail here if desired, similar to content-excerpt.php
	// wordpress_starter_theme_post_thumbnail( 'thumbnail' );
	?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
</article><!-- #post-<?php the_ID(); ?> -->
<hr class="excerpt-separator">