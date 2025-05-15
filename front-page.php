<?php
/**
 * The template for displaying the front page.
 *
 * This is the template that displays the front page of your WordPress theme.
 * It is used when a static page is set as the front page in Settings > Reading.
 * It will override home.php and index.php for the front page display.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#front-page-display
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
			// Start the Loop.
			while ( have_posts() ) :
				the_post();

				// Include the page content template.
				get_template_part( 'template-parts/page/content', 'front' );

				// If comments are open or we have at least one comment, load up the comment template.
				// (Optional for front page, depending on design)
				// if ( comments_open() || get_comments_number() ) :
				// comments_template();
				// endif;
			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
// get_sidebar(); // Uncomment if you want a sidebar on your front page.
get_footer();