<?php
/**
 * Template part for displaying author information.
 * Called from author.php.
 *
 * @package WordPress_Starter_Theme
 * @since   2.0
 * @version 2.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$current_author = get_queried_object(); // Get the author object for the current author archive page.

if ( ! $current_author instanceof WP_User ) {
	return; // Exit if we don't have a valid author object.
}
?>

<section class="author-profile-box">
	<div class="author-avatar">
		<?php echo get_avatar( $current_author->ID, 120 ); // Use $current_author->ID for consistency ?>
	</div>
	<div class="author-details">
		<h1 class="author-name page-title"><?php echo esc_html( $current_author->display_name ); ?></h1>
		<?php
		// Display the author description if it exists.
		$author_description = get_the_author_meta( 'description', $current_author->ID );
		if ( ! empty( $author_description ) ) :
			?>
			<div class="author-bio">
				<?php echo wp_kses_post( $author_description ); ?>
			</div><!-- .author-bio -->
			<?php
		endif;
		?>
	</div><!-- .author-details -->
</section><!-- .author-profile-box -->