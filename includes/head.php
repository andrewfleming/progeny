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

/**
 * Enqueue scripts and style.
 * Check if to use production assets or not
 * @return void
 */
function prvsn_enqueue_scripts() {
	$use_production_assets = genesis_get_option('progeny_production_on');
	$use_production_assets = !empty($use_production_assets);
	$assets_version = genesis_get_option('progeny_assets_version');
	$assets_version = !empty($assets_version) ? absint($assets_version) : null;
	// Main theme stylesheet
	$src = $use_production_assets ? '/build/css/style.min.css' : '/build/css/style.css';
	wp_enqueue_style( 'progeny', get_stylesheet_directory_uri() . $src, array( 'dashicons' ), $assets_version );
	wp_enqueue_style( 'dashicons' );
	$src = $use_production_assets ? '/build/js/scripts.min.js' : '/build/js/scripts.js';
	$stylesheet_dir = get_stylesheet_directory_uri();
	wp_enqueue_script( 'progeny', $stylesheet_dir . $src, array('jquery'), $assets_version, true );
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Open+Sans:400,400italic,700,700italic', array(), CHILD_THEME_VERSION );
    // wp_enqueue_style( 'fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', array(), '4.3.0');
}
add_action( 'wp_enqueue_scripts', 'progeny_enqueue_scripts' );