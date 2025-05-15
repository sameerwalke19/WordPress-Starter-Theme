<?php
/**
 * The template for displaying the blog posts index (often referred to as the home page if set in Settings > Reading).
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#home-page-display
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

			<?php
			// Optionally, add a page title if this is the posts page and not the front page.
			if ( is_home() && ! is_front_page() ) :
				?>
				<header class="page-header">
					<h1 class="page-title"><?php single_post_title(); ?></h1>
				</header>
				<?php
				// Display breadcrumbs if this is the posts page
				$posts_page_id = get_option( 'page_for_posts' );
				if ( $posts_page_id ) :
					?>
				<nav class="breadcrumbs-nav" aria-label="<?php esc_attr_e( 'Breadcrumb', 'wordpress-starter-theme' ); ?>">
					<span class="breadcrumb-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'wordpress-starter-theme' ); ?></a></span>
					<span class="breadcrumb-separator"> &gt; </span>
					<span class="breadcrumb-item current-page" aria-current="page"><?php echo esc_html( get_the_title( $posts_page_id ) ); ?></span>
				</nav>
					<?php
				endif;
				?>

			<?php endif; ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/post/content', 'excerpt' ); ?>

			<?php endwhile; ?>

			<?php get_template_part( 'template-parts/pagination/pagination' ); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/post/content', 'none' ); ?>

		<?php endif; ?>

	</main><!-- #main -->
</section><!-- #primary -->


<?php get_sidebar(); ?>

<?php get_footer(); 