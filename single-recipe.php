<?php

remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

add_action( 'genesis_entry_content', 'prevision_do_single_image', 5 );
add_action( 'genesis_entry_content', function() {
	prevision_do_contributor( get_the_ID() );
}, 5 );
add_action( 'genesis_entry_content', 'prevision_do_yeild', 5 );
add_action( 'genesis_entry_content', 'prevision_do_ingredients', 15 );
add_action( 'genesis_after_content', 'prevision_do_related_book' );
add_action( 'genesis_after_content', 'prevision_do_recipes_by_book' );


genesis();