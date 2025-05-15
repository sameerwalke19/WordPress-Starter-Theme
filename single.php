<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress_Starter_Theme
 * @since   1.0
 * @version 2.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header(); ?>

<section id="primary" class="content-area">
	<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/post/content', 'single' ); ?>

			<?php endwhile; ?>
<?php get_template_part( 'template-parts/pagination/pagination', 'single' ); ?>

			<?php
			// If comments are open or there is at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			?>

	<?php else : ?>

		<?php get_template_part( 'template-parts/post/content', 'none' ); ?>

	<?php endif; ?>

	</main><!-- #main -->
</section><!-- #primary -->


<?php get_sidebar(); ?>

<?php get_footer(); ?>