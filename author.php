<?php
/**
 * The template for displaying author archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#author-archive
 *
 * @package WordPress_Starter_Theme
 * @since   1.0
 * @version 2.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


get_header();

?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		// Display author information using the new template part.
		get_template_part( 'template-parts/post/content', 'author' );
		?>

		<?php if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * We'll use content-excerpt.php as it's already set up for summaries.
				 */
				get_template_part( 'template-parts/post/content', 'excerpt' );

			endwhile;

			get_template_part( 'template-parts/pagination/pagination' );

		else : // If no posts are found
			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/post/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar(); // Include if your theme uses a sidebar
get_footer();