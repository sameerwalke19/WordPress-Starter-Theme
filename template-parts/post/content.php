<?php
/**
 * Template part for displaying posts.
 *
 * This is the default content template part used for displaying posts in various contexts,
 * such as the main blog index (index.php) or other archive views if a more specific
 * template part (like content-excerpt.php or content-archive.php) is not used.
 * It handles displaying the title, meta, content/excerpt, and footer.
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
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
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
	// Display post thumbnail using the theme's template tag.
	if ( function_exists( 'wordpress_starter_theme_post_thumbnail' ) ) {
		wordpress_starter_theme_post_thumbnail();
	}
	?>

	<div class="entry-content">
		<?php
		if ( is_singular() ) {
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'wordpress-starter-theme' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() ) // Ensure title is properly escaped for screen reader text.
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wordpress-starter-theme' ),
					'after'  => '</div>',
				)
			);
		} else {
			the_excerpt(); // Or the_content( __( 'Continue reading &rarr;', 'wordpress-starter-theme' ) );
		}
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
		if ( function_exists( 'wordpress_starter_theme_entry_footer' ) ) {
			wordpress_starter_theme_entry_footer();
		}
		?>
	</footer><!-- .entry-footer -->

</article><!-- #post -->