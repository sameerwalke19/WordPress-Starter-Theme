<?php
/**
 * Template part for displaying content for singular views (posts, pages, etc.).
 * This is typically used by singular.php as a fallback.
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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php
				
				if ( function_exists( 'wordpress_starter_theme_posted_on' ) ) {
					wordpress_starter_theme_posted_on();
				}
				if ( function_exists( 'wordpress_starter_theme_posted_by' ) ) {
					wordpress_starter_theme_posted_by();
				}
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php
	// Post thumbnail: uses wordpress_starter_theme_post_thumbnail() if available.
	if ( function_exists( 'wordpress_starter_theme_post_thumbnail' ) ) {
		wordpress_starter_theme_post_thumbnail();
	} elseif ( has_post_thumbnail() ) { // Basic fallback.
		echo '<div class="post-thumbnail">';
		// Consider 'large', 'full', or a custom image size registered in your theme.
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
		// Entry footer: uses wordpress_starter_theme_entry_footer() if available.
		// Fallback displays tags only for posts (edit link intentionally omitted from this specific fallback).
		if ( function_exists( 'wordpress_starter_theme_entry_footer' ) ) {
			wordpress_starter_theme_entry_footer();
		} else {
			if ( 'post' === get_post_type() ) {
				$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'wordpress-starter-theme' ) );
				if ( $tags_list ) {
					printf(
						/* translators: %s: List of tags. */
						'<span class="tags-links">' . esc_html__( 'Tagged %s', 'wordpress-starter-theme' ) . '</span>',
						$tags_list // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					);
				}
			}
		}
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->