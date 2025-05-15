/**
 * Custom scripts for the theme.
 *
 * This file contains custom JavaScript for the WordPress Starter Theme.
 * It primarily handles the mobile navigation menu toggle.
 *
 * @package WordPress_Starter_Theme
 * @since   2.0
 * @version 2.0
 */

( function() {
	/**
	 * Handles toggling the navigation menu for small screens and enables TAB key
	 * navigation support for dropdown menus.
	 */
	const siteNavigation = document.getElementById( 'site-navigation' );

	// Return early if the navigation doesn't exist.
	if ( ! siteNavigation ) {
		return;
	}

	const button = siteNavigation.getElementsByTagName( 'button' )[0];

	// Return early if the button doesn't exist.
	if ( 'undefined' === typeof button ) {
		return;
	}

	const menu = siteNavigation.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	button.addEventListener( 'click', function() {
		menu.classList.toggle( 'toggled-on' ); // Toggle class on the menu list (ul)
		button.setAttribute( 'aria-expanded', button.getAttribute( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
	} );
} )();