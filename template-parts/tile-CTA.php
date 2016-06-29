<?php

remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

// add_action( 'genesis_entry_header', 'prevision_related_entry_title_links' );

// do_action( 'genesis_before_entry' );
printf( '<article %s>', genesis_attr( 'entry' ) );
	genesis_entry_header_markup_open();
		prevision_do_single_image();
		prevision_related_entry_title_links();
	genesis_entry_header_markup_close();
	// do_action( 'genesis_entry_header' );
	// do_action( 'genesis_before_entry_content' );
	printf( '<div %s>', genesis_attr( 'entry-content' ) );
		the_excerpt();
		echo do_shortcode( '[add_to_cart id="225"]');
		// do_action( 'genesis_entry_content' );
	echo '</div>';
	// do_action( 'genesis_after_entry_content' );
	// do_action( 'genesis_entry_footer' );
echo '</article>';
// do_action( 'genesis_after_entry' );

