<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress_Starter_Theme
 * @since   1.0
 * @version 2.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); // Hook for plugins and themes, introduced in WP 5.2. ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'wordpress-starter-theme' ); ?></a>

		<?php
		/**
		 * Hook: wordpress_starter_theme_before_header
		 */
		do_action( 'wordpress_starter_theme_before_header' );
		?>

		<header id="masthead" class="site-header">
			<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
			<?php get_template_part( 'template-parts/navigation/navigation', 'primary' ); ?>
		</header><!-- #masthead -->

		<?php
		/**
		 * Hook: wordpress_starter_theme_after_header
		 */
		do_action( 'wordpress_starter_theme_after_header' );
		?>
	<div id="content" class="site-content">