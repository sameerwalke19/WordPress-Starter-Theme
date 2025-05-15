<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'wordpress-starter-theme' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

			<div class="search-form-container">
				<?php get_search_form(); ?>
			</div><!-- .search-again-form-container -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 * However, we'll use content-excerpt.php as it's already set up.
				 */
				get_template_part( 'template-parts/post/content', 'excerpt' );

			endwhile; ?>

        <?php // Previous/next post navigation.
		get_template_part( 'template-parts/pagination/pagination' );
		?>

		<?php else :
			?>
			<section class="no-results not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'wordpress-starter-theme' ); ?></h1>
				</header><!-- .page-header -->
				<div class="page-content">
					<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'wordpress-starter-theme' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</section><!-- .no-results -->
			<?php
		endif;
		?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); // Include if your theme uses a sidebar
get_footer();