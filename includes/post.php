<?php

/**
 * Copy of Genesis function, with the ! is_single conditional removed so the title is linked in all locations
 * Echo the title of a post.
 *
 * The `genesis_post_title_text` filter is applied on the text of the title, while the `genesis_post_title_output`
 * filter is applied on the echoed markup.
 *
 * @since 1.1.0
 *
 * @uses genesis_html5()          Check for HTML5 support.
 * @uses genesis_get_SEO_option() Get SEO setting value.
 * @uses genesis_markup()         Contextual markup.
 *
 * @return null Return early if the length of the title string is zero.
 */
function prevision_related_entry_title_links() {

	$title = apply_filters( 'genesis_post_title_text', get_the_title() );

	if ( 0 === mb_strlen( $title ) )
		return;

	if ( $short_title = get_field( 'short_title', get_the_ID() ) ) {
		$title = $short_title;
	}

	//* Link it, if necessary
	if ( apply_filters( 'genesis_link_post_title', true ) ){
		$title = sprintf( '<a href="%s" rel="bookmark">%s</a>', get_permalink(), $title );
	}

	//* Wrap in H1 on singular pages
	$wrap = is_singular() ? 'h1' : 'h2';

	//* Also, if HTML5 with semantic headings, wrap in H1
	$wrap = genesis_html5() && genesis_get_seo_option( 'semantic_headings' ) ? 'h1' : $wrap;

	/**
	 * Entry title wrapping element
	 *
	 * The wrapping element for the entry title.
	 *
	 * @since 2.2.3
	 *
	 * @param string $wrap The wrapping element (h1, h2, p, etc.).
	 */
	$wrap = apply_filters( 'genesis_entry_title_wrap', $wrap );

	//* Build the output
	$output = genesis_markup( array(
		'html5'   => "<{$wrap} %s>",
		'xhtml'   => sprintf( '<%s class="entry-title">%s</%s>', $wrap, $title, $wrap ),
		'context' => 'entry-title',
		'echo'    => false,
	) );

	$output .= genesis_html5() ? "{$title}</{$wrap}>" : '';

	echo apply_filters( 'genesis_post_title_output', "$output \n" );

}

/**
 * Display feature image
 * @return void
 */
function prevision_feature_image( $args ) {
	$defaults = array();
	$args = wp_parse_args( $args, $defaults );
	echo '<div class="entry-image">';
	genesis_image( $args );
	echo '</div>';
}
