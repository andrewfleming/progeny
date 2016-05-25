<?php

//* Rename primary and secondary navigation menus
// add_theme_support( 'genesis-menus' , array( 'primary' => __( 'Meaningful menu name', 'progeny' ), 'secondary' => __( 'Meaningful Menu Name', 'progeny' ) ) );

//* Reposition primary navigation menu
// remove_action( 'genesis_after_header', 'genesis_do_nav' );
// add_action( 'genesis_header', 'genesis_do_nav', 12 );

//* Reposition secondary navigation menu
// remove_action( 'genesis_after_header', 'genesis_do_subnav' );
// add_action( 'genesis_footer', 'genesis_do_subnav', 12 );

//* Reduce secondary navigation menu to one level depth
add_filter( 'wp_nav_menu_args', 'progeny_secondary_menu_args' );
function progeny_secondary_menu_args( $args ){

	if( 'secondary' != $args['theme_location'] )
	return $args;

	$args['depth'] = 1;
	return $args;

}
