<?php
/**
 * The template for displaying attachments
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * 
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
				?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'attachment-entry' ); ?>>
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

						<div class="entry-meta">
							<?php
								// Parent post link.
							if ( ! empty( $post->post_parent ) ) :
								?>
									<span class="parent-post-link">
										<a href="<?php echo esc_url( get_permalink( $post->post_parent ) ); ?>" rel="gallery">
											<?php
											/* translators: %s: Parent post title. */
											printf( esc_html__( 'Published in %s', 'wordpress-starter-theme' ), esc_html( get_the_title( $post->post_parent ) ) );
											?>
										</a>
									</span>
									<?php
								endif;

								// Published date.
								printf(
									'<span class="posted-on"><span class="screen-reader-text">%1$s </span><time class="entry-date published updated" datetime="%2$s">%3$s</time></span>',
									esc_html_x( 'Uploaded on', 'Used before publish date for attachments.', 'wordpress-starter-theme' ),
									esc_attr( get_the_date( DATE_W3C ) ),
									esc_html( get_the_date() )
								);

								// Image size, if applicable.
								$metadata = wp_get_attachment_metadata();
								if ( wp_attachment_is_image() && $metadata ) {
									printf(
										' <span class="full-size-link"><a href="%1$s" title="%2$s">%3$s (%4$s &times; %5$s)</a></span>',
										esc_url( wp_get_attachment_url() ),
										esc_attr__( 'Link to full-size image', 'wordpress-starter-theme' ),
										esc_html__( 'Full resolution', 'wordpress-starter-theme' ),
										absint( $metadata['width'] ),
										absint( $metadata['height'] )
									);
								}

							?>
						</div><!-- .entry-meta -->
					</header><!-- .entry-header -->

					<div class="entry-content">
						<div class="attachment-preview">
							<?php
							if ( wp_attachment_is_image() ) :
								// Display the image - 'large' is a good default.
								// You could also use 'full' or a custom registered image size.
								echo wp_get_attachment_image( get_the_ID(), 'large', false, array( 'class' => 'aligncenter' ) );
							else :
								// For non-image attachments, provide a download link.
								echo '<p class="attachment-download-link"><a href="' . esc_url( wp_get_attachment_url() ) . '" rel="attachment">';
								/* translators: %s: Attachment title. */
								printf( esc_html__( 'Download %s', 'wordpress-starter-theme' ), esc_html( get_the_title() ) );
								echo '</a></p>';
							endif;
							?>
						</div><!-- .attachment-preview -->

						<?php if ( has_excerpt() ) : // Display caption if it exists. ?>
							<div class="entry-caption">
								<?php the_excerpt(); // Attachment caption. ?>
							</div><!-- .entry-caption -->
						<?php endif; ?>

						<?php
						// Display the full description if it exists.
						// the_content(); // Uncomment if you use the main content field for attachments.
						?>
					</div><!-- .entry-content -->

					<footer class="entry-footer">
						<nav class="navigation-attachment" role="navigation">
							<h2 class="screen-reader-text"><?php esc_html_e( 'Attachment navigation', 'wordpress-starter-theme' ); ?></h2>
							<div class="nav-links">
								<div class="nav-previous"><?php previous_image_link( false, __( '&larr; Previous Image', 'wordpress-starter-theme' ) ); ?></div>
								<div class="nav-next"><?php next_image_link( false, __( 'Next Image &rarr;', 'wordpress-starter-theme' ) ); ?></div>
							</div><!-- .nav-links -->
						</nav><!-- .navigation-attachment -->
					</footer><!-- .entry-footer -->

				</article><!-- #post-<?php the_ID(); ?> -->

				<?php
				// If comments are open or there is at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar(); // Include if your theme uses a sidebar on attachment pages.
get_footer();