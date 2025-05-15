<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no front-page.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress_Starter_Theme
 * @since   1.0
 * @version 2.0
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/post/content', get_post_format() ); ?>

		<?php endwhile; ?>

<?php get_template_part( 'template-parts/pagination/pagination' ); // Or use the_posts_pagination(); ?>

	<?php else : ?>

		<?php get_template_part( 'template-parts/post/content', 'none' ); ?>

	<?php endif; ?>

	</main><!-- #primary -->
</section><!-- #primary -->

<?php get_sidebar(); ?>

<?php get_footer(); 