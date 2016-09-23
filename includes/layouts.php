<?php

// Force full-width content
// add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

//* Force content-sidebar layout
// add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_content_sidebar' );

//* Force sidebar-content layout
// add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_sidebar_content' );

//* Force content-sidebar-sidebar layout
// add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_content_sidebar_sidebar' );

//* Force sidebar-sidebar-content layout
// add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_sidebar_sidebar_content' );

//* Force sidebar-content-sidebar layout
// add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_sidebar_content_sidebar' );

//* Remove site layouts
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

//* Add support for structural wraps
add_theme_support( 'genesis-structural-wraps', array(
	'header',
	'nav',
	'subnav',
	'footer-widgets',
	'footer',
) );
