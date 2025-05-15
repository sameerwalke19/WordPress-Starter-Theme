<?php
/**
 * Displays the site information in the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress_Starter_Theme
 * @since   2.0
 * @version 2.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="site-info">
	<?php
		$current_year = date_i18n( _x( 'Y', 'copyright current year', 'wordpress-starter-theme' ) );
		$theme_name   = esc_html__( 'WordPress Starter Theme', 'wordpress-starter-theme' );
		$theme_link   = sprintf( '<a href="%s">%s</a>', esc_url( 'https://tr.ee/hqN4DD' ), $theme_name );
		/* translators: 1: Current year, 2: Theme name with link. */
		printf( esc_html__( 'All rights Reserved %1$s | %2$s', 'wordpress-starter-theme' ), esc_html( $current_year ), $theme_link ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		// The $theme_link is already escaped, so we can ignore the PHPCS warning for this specific printf.
	?>
</div><!-- .site-info -->