<?php

/**
 * Unregister unused widget areas
 */
// unregister_sidebar( 'header-right' );

/**
 * Add after entry widget area
 */
add_theme_support( 'genesis-after-entry-widget-area' );

/**
 * Add footer widget areas
 */
add_theme_support( 'genesis-footer-widgets', 3 );

/**
 * Echo primary sidebar default content.
 */
function progeny_do_default_sidebar() {
	if ( ! dynamic_sidebar( 'sidebar' ) ) {
		return;
	}
}
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
add_action( 'genesis_sidebar', 'progeny_do_default_sidebar' );
