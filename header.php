<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,  initial-scale=1">
        <link rel="profile" href="http://gmpg.org.xfn/11">
        <?php wp_head(); ?>
    </head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

 <div id="page">

 <a href="#content" class="skip-link screen-reader-text">
    <?php esc_html_e( 'skip to content', 'walkestarter' ); ?>
</a>

 <header id="masthead" class="site-header" role="banner">

 <div class="site-branding">
     <p class="site-title">
     <?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php the_custom_logo(); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$walkestarter_description = get_bloginfo( 'description', 'display' );
			if ( $walkestarter_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $walkestarter_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

<div class="theme-menu">
<nav id="site-navigation" class="main-navigation" role="navigation" >

<?php
      wp_nav_menu(
        array(
            'theme_location' => 'menu-1',
            'menu_id'        => 'primary-menu',
        )
    );
?>
</nav>
</div>

</header>
<hr>
<div id="content" class="site-content">