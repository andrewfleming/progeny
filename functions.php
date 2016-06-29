<?php

/**
 * This file organises all functions into inclue files
 */

/**
 * Start the engine
 */
include_once( get_template_directory() . '/lib/init.php' );

/**
 * Theme meta data
 */
define( 'CHILD_THEME_VERSION', '0.1.0' );
define( 'CHILD_THEME_NAME', __( 'Progeny', 'progeny' ) );
define( 'CHILD_THEME_INCLUDES_DIR', dirname( __FILE__ ) . '/includes/' );

/**
 * Internationalisation
 */
load_child_theme_textdomain( 'progeny', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'progeny' ) );

/**
 * Set up functions directory location and include function files
 */
$includes = array(
	'author-box',
	'comments',
	'entry-content',
	'entry-image',
	'footer-credits',
	'head',
	'layouts',
	'markup',
	'media',
	'menus',
	'microdata',
	'site-title',
	'theme-options',
	'widgets',
);

foreach ( $includes as $i ) {
	require_once( CHILD_THEME_INCLUDES_DIR . $i . '.php' );
}

if ( is_admin() ) {
	require_once( CHILD_THEME_INCLUDES_DIR . 'editor.php' );
}