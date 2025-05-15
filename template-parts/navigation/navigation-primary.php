<?php
/**
 * Displays the primary navigation menu.
 *
 * @package WordPress_Starter_Theme
 * @since 2.0
 * @version 2.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>
<nav id="site-navigation" class="main-navigation">
	<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
		<?php
		// translators: %s: Screen reader text for the menu toggle button.
		printf( esc_html__( '%s Menu', 'wordpress-starter-theme' ), '<span class="screen-reader-text">' . esc_html__( 'Primary', 'wordpress-starter-theme' ) . '</span>' );
		?>
	</button>
	<?php
	if ( has_nav_menu( 'primary' ) ) {
		wp_nav_menu(
			array(
				'theme_location' => 'primary',
				'menu_id'        => 'primary-menu',
				'menu_class'     => 'primary-menu-list', // Added a class for the <ul>
				'container'      => false, // Use the <nav> as the container
			)
		);
	} elseif ( current_user_can( 'edit_theme_options' ) ) {
		// Offer a link to the Menu editor if no menu is assigned and the user can edit theme options.
		?>
		<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>" class="no-menu-assigned">
			<?php esc_html_e( 'Assign a menu to the primary navigation location.', 'wordpress-starter-theme' ); ?>
		</a>
		<?php
	}
	?>
</nav><!-- #site-navigation -->