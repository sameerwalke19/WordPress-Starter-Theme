<?php
/**
 * Displays the site branding in the header.
 *
 * This template part is responsible for displaying the site's logo or title and tagline.
 * It is typically included in the main header template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress_Starter_Theme
 * @since   2.0
 * @version 2.0
 */

?>
<div class="site-branding">
	<?php
	if ( has_custom_logo() ) {
		the_custom_logo();
	} else {
		// Site title or logo.
		// On the front page, this is typically an H1. On other pages, it might be a P tag or DIV.
		// For a starter theme, H1 is a common default.
		if ( is_front_page() && is_home() ) :
			?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php
		else :
			?>
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
		endif;
		$starter_theme_description = get_bloginfo( 'description', 'display' );
		if ( $starter_theme_description || is_customize_preview() ) : ?>
			<p class="site-description"><?php echo $starter_theme_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
		<?php endif;
	} ?>
</div><!-- .site-branding -->