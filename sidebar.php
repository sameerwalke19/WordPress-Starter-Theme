<?php 
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress_Starter_Theme
 * @since   1.0
 * @version 2.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! is_active_sidebar( 'main-sidebar' ) ) {
    return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">

    <?php dynamic_sidebar( 'main-sidebar' )?>

</aside>