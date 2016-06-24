<?php

/**
 * Hide product detail tabs
 * @param  Array $tabs Product details array
 * @return Array       Modified product details array
 */
function prevision_remove_product_tabs( $tabs ) {
    // unset( $tabs['description'] );      	// Remove the description tab
    unset( $tabs['reviews'] ); 			// Remove the reviews tab
    unset( $tabs['additional_information'] );  	// Remove the additional information tab
    return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'prevision_remove_product_tabs', 98 );

/**
 * Get the book terms of the current post
 * @return Array Array of WP Term objects for the current post
 */
function prevision_get_book_terms() {
	Global $post;
	return get_the_terms( $post->ID, 'book' );
}

function prevision_get_book_by_term( $book = false ) {

	if( ! is_array( $book ) ) {
		return false;
	}

	$terms = array();

	foreach ( $book as $b ) {
		$terms[] = $b->slug;
	}

	$args = array(
		'post_type' => 'product',
		'posts_per_page' => -1,
		'tax_query' => array(
			array(
				'taxonomy'         => 'book',
				'field'            => 'slug',
				'terms'            => $terms,
			),
		)
	);
	return new WP_Query( $args );

}

/**
 * Loop through related contributors and display generated markup
 * @return voit
 */
function prevision_do_related_book() {
	$contributors = prevision_get_book_by_term( prevision_get_book_terms() );

	if ( ! $contributors->have_posts() ) {
		return;
	}

	echo '<aside class="related related--book">';
	echo '<h2 class="related__heading">As featured in</h2>';
	echo '<div class="tiles tiles--cta">';
	remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

	while ( $contributors->have_posts() ) {
		$contributors->the_post();
		get_template_part( 'template-parts/tile', 'CTA' );
	}
	wp_reset_query();
	echo '</div>';
	echo '</aside>';
	genesis_reset_loops();
}
// function prevision_debug() {
// 	$terms = prevision_get_book_terms();
// }
// add_action( 'genesis_header', 'prevision_debug' );