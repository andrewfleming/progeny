<?php

/**
 * Enable site logo upload within customizer
 * @return void
 */
function progeny_customizer_logo() {
	$args = array(
		// 'height'      => 100,
		// 'width'       => 400,
		// 'flex-width' => true,
		// 'flex-width'  => true,
		// 'header-text' => array( 'site-title', 'site-description' ),
	);
	add_theme_support( 'custom-logo', $args );
}
add_action( 'after_setup_theme', 'progeny_customizer_logo' );

/**
 * Replace Header Site Title with Inline Logo
 *
 * Fixes Genesis bug - when using static front page and blog page (admin reading settings) Home page is <p> tag and Blog page is <h1> tag
 *
 * @author AlphaBlossom / Tony Eppright
 * @link http://www.alphablossom.com/a-better-wordpress-genesis-responsive-logo-header/
 *
 * @edited by Sridhar Katakam
 * @link http://www.sridharkatakam.com/use-inline-logo-instead-background-image-genesis/
**/
function progeny_header_inline_logo( $title, $inside, $wrap ) {

	if ( ! has_custom_logo() ) {
		return $title;
	}

	$inside = get_custom_logo();
	$wrap = is_front_page() && 'title' === genesis_get_seo_option( 'home_h1_on' ) ? 'h1' : 'p';
	// A little fallback, in case an SEO plugin is active - changed is_home to is_front_page to fix Genesis bug
	$wrap = is_front_page() && ! genesis_get_seo_option( 'home_h1_on' ) ? 'h1' : $wrap;
	// And finally, $wrap in h1 if HTML5 & semantic headings enabled
	$wrap = genesis_html5() && genesis_get_seo_option( 'semantic_headings' ) ? 'h1' : $wrap;
	return sprintf( '<%1$s %2$s>%3$s</%1$s>', $wrap, genesis_attr( 'site-title' ), $inside );
}
add_filter( 'genesis_seo_title', 'progeny_header_inline_logo', 10, 3 );