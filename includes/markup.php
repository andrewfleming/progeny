<?php

/**
 * Add HTML5 markup structure
 */
add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ) );

/**
 * Add Accessibility support
 */
add_theme_support( 'genesis-accessibility', array( '404-page', 'drop-down-menu', 'headings', 'rems', 'search-form', 'skip-links' ) );

//* Add screen reader class to archive description
add_filter( 'genesis_attr_author-archive-description', 'genesis_attributes_screen_reader_class' );