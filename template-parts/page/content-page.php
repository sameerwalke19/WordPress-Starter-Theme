<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @since   1.0
 * @version 2.0
 *
 * @package WordPress_Starter_Theme
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'content-page' ); ?>>
	<header class="entry-header">
		<?php
		the_title( '<h1 class="entry-title">', '</h1>' );
		?>
	</header><!-- .entry-header -->

	<?php
	// Breadcrumbs Navigation - Display if not the front page and after the title
	?>
	<nav class="breadcrumbs-nav" aria-label="<?php esc_attr_e( 'Breadcrumb', 'wordpress-starter-theme' ); ?>">
		<span class="breadcrumb-item">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'wordpress-starter-theme' ); ?></a>
		</span>
		<?php
		$ancestors = get_post_ancestors( get_the_ID() );
		if ( ! empty( $ancestors ) ) {
			$ancestors = array_reverse( $ancestors ); // Reverse to display from top-level parent
			foreach ( $ancestors as $ancestor_id ) {
				echo '<span class="breadcrumb-separator"> &gt; </span>'; // Separator
				echo '<span class="breadcrumb-item">';
				echo '<a href="' . esc_url( get_permalink( $ancestor_id ) ) . '">' . esc_html( get_the_title( $ancestor_id ) ) . '</a>';
				echo '</span>';
			}
		}
		?>
		<span class="breadcrumb-separator"> &gt; </span> <!-- Separator -->
		<span class="breadcrumb-item current-page" aria-current="page">
			<?php the_title(); // Display current page title in breadcrumbs, unlinked ?>
		</span>
	</nav>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'wordpress-starter-theme' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'wordpress-starter-theme' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post. Only visible to screen readers. */
				esc_html__( 'Edit %s', 'wordpress-starter-theme' ),
				'<span class="screen-reader-text">' . get_the_title() . '</span>'
			),
			'<span class="edit-link">',
			'</span>'
		);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->