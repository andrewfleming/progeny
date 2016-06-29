<?php

function prevision_get_contributors_by_book( $book = false ) {

	if( ! is_array( $book ) ) {
		return false;
	}

	$terms = array();

	foreach ( $book as $b ) {
		$terms[] = $b->slug;
	}

	$args = array(
		'post_type' => 'contributor',
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
 * @return void
 */
function prevision_do_contributors_by_book() {
	$contributors = prevision_get_contributors_by_book( prevision_get_book_terms() );

	if ( ! $contributors->have_posts() ) {
		return;
	}

	echo '<aside class="related related--contributors">';
	echo '<h2 class="related__heading">Contributors</h2>';
	echo '<div class="tiles">';
	remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

	while ( $contributors->have_posts() ) {
		$contributors->the_post();
		get_template_part( 'template-parts/tile', 'contributor' );
	}

	wp_reset_query();
	echo '</div>';
	echo '</aside>';
	genesis_reset_loops();
}



/**
 * Display contributor block
 * @param  integer $contributor_id Post ID of post with contributor relationship
 * @return void
 */
function prevision_do_contributor( $contributor_id = 0 ) {

	if ( ! $contributor = get_field( 'contributor', $contributor_id ) ) {
		return;
	}

	$contributor = array_shift( $contributor );
	$website = get_field( 'website', $contributor->ID );
	$html = '<aside class="recipe__contributor">';
	$html .= '<h2>'. $contributor->post_title .'</h2>';
	$html .= '<p>'. $contributor->post_content ;
	$html .= $website ? '<br /><a href="'.$website.'">'.$website.'</a>' : '';
	$html .= '</p>';
	$html .= '</aside>';
	echo $html;
}

