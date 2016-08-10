<?php
/**
 * Controls all the markup within the <head> tags
 */

/**
 * Clean up unused tags
 */
remove_action( 'wp_head', 'rsd_link' );									// RSD link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );				// Parent rel link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );				// Start post rel link
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );	// Adjacent post rel link
remove_action( 'wp_head', 'wp_generator' );								// WP Version
remove_action( 'wp_head', 'wlwmanifest_link');							// WLW Manifest
remove_action( 'wp_head', 'feed_links_extra', 3 ); // Remove comment feed links

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

/**
 * Enqueue scripts and style.
 * Check if to use production assets or not
 * @return void
 */
function progeny_enqueue_scripts() {
	$use_production_assets = WP_DEBUG ? 0 : 1;
	$assets_version = genesis_get_option('progeny_assets_version');
	$assets_version = !empty($assets_version) ? absint($assets_version) : null;
	$stylesheet_dir = get_stylesheet_directory_uri();

	// Styles
	wp_register_style( 'normalize', get_stylesheet_directory_uri().'/build/css/vendor/normalize.css', array(), '4.1.1', 'screen' );
	$src = $use_production_assets ? '/build/css/progeny-style.min.css' : '/build/css/progeny-style.css';
	wp_enqueue_style( 'progeny-style', get_stylesheet_directory_uri() . $src, array( 'normalize' ), $assets_version );

	// Fonts
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=PT+Sans+Narrow:400,70|PT+Sans:400,400italic,900', array(), CHILD_THEME_VERSION );
	// wp_enqueue_style( 'fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', array(), '4.3.0');

	// Scripts
	$src = $use_production_assets ? '/build/js/scripts.min.js' : '/build/js/scripts.js';
	wp_enqueue_script( 'progeny', $stylesheet_dir . $src, array('jquery'), $assets_version, true );
}
add_action( 'wp_enqueue_scripts', 'progeny_enqueue_scripts' );

/**
 * Stop mobile browsers turing phone numbers into links. Sometimes they convert numbers which are not phone numbers
 * We will create our own tel: links if we want clickable phone numbers
 * @return void
 */
function progeny_format_detection_metatag() {
	echo '<meta name="format-detection" content="telephone=no">';
}
add_action( 'wp_head', 'progeny_format_detection_metatag' );