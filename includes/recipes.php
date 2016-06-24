<?php

/**
 * Retreive recipes related to current content
 * @param  Array $book Array of WP Term objects
 * @return Object        WP Query Object
 */
function prevision_get_recipes_by_book( $book = false ) {

	if( ! is_array( $book ) ) {
		return false;
	}

	$terms = array();

	foreach ( $book as $b ) {
		$terms[] = $b->slug;
	}

	$args = array(
		'post_type' => 'recipe',
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
 * Loop through related recipes and display generated markup
 * @return void
 */
function prevision_do_recipes_by_book() {
	$recipes = prevision_get_recipes_by_book( prevision_get_book_terms() );

	if ( ! $recipes->have_posts() ) {
		return;
	}

	echo '<aside class="related related--recipes">';
	echo '<h2 class="related__heading">Recipes</h2>';
	echo '<div class="tiles">';

	remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
	remove_action( 'genesis_entry_content', 'genesis_do_post_content' );

	while ( $recipes->have_posts() ) {
		$recipes->the_post();
		get_template_part( 'template-parts/tile' );
	}

	wp_reset_query();
	echo '</div>';
	echo '</aside>';
	genesis_reset_loops();

}

/**
 * Display recipe yield
 * @return void
 */
function prevision_do_yeild() {

	if ( ! $yield = get_field('yeild') ) {
		return;
	}

	echo '<div class="recipe__yield">Serves: '. $yield .'</div>';
}

/**
 * Displays recipe ingredients
 * @return voit
 */
function prevision_do_ingredients() {

	if ( ! $ingredients = get_field( 'ingredients' ) ) {
		return;
	}

	echo '<div class="recipe__ingredients">'. $ingredients .'</div>';
}
