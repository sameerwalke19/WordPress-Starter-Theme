<?php
/**
 * WordPress Starter Theme Customizer.
 *
 * This file handles the theme's integration with the WordPress Customizer,
 * allowing users to modify theme settings and see a live preview of their changes.
 * It includes registration of settings, controls, and partials for selective refresh.
 *
 * @link https://developer.wordpress.org/themes/customize-api/
 *
 * @package WordPress_Starter_Theme
 * @since   2.0
 * @version 2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wordpress_starter_theme_customize_register( $wp_customize ) {
	// Site Title & Tagline
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'wordpress_starter_theme_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'wordpress_starter_theme_customize_partial_blogdescription',
			)
		);
	}

	// Example: Add a new section for Theme Options
	/*
	$wp_customize->add_section(
		'wordpress_starter_theme_options_section',
		array(
			'title'    => __( 'Theme Options', 'wordpress-starter-theme' ),
			'priority' => 130, // Before Default Sections
		)
	);
	*/

	// Example: Add a setting for a custom text input
	/*
	$wp_customize->add_setting(
		'wordpress_starter_theme_example_text',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage', // or 'refresh'
		)
	);
	$wp_customize->add_control(
		'wordpress_starter_theme_example_text_control',
		array(
			'label'       => __( 'Example Text Input', 'wordpress-starter-theme' ),
			'section'     => 'wordpress_starter_theme_options_section', // ID of the section
			'settings'    => 'wordpress_starter_theme_example_text',   // ID of the setting
			'type'        => 'text',
		)
	);
	*/
}
add_action( 'customize_register', 'wordpress_starter_theme_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function wordpress_starter_theme_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function wordpress_starter_theme_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 * (This would typically be in a separate JS file, e.g., js/customizer.js)
 */
/*
function wordpress_starter_theme_customize_preview_js() {
	wp_enqueue_script( 'wordpress-starter-theme-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), WORDPRESS_STARTER_THEME_VERSION, true );
}
add_action( 'customize_preview_init', 'wordpress_starter_theme_customize_preview_js' );
*/

?>