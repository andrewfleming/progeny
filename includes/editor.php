<?php

/**
 * Custom styles for editor
 */
add_editor_style( 'editor-styles.css' );

/**
 * Enable TinyMCE style select dropdown
 * The mce_buttons_2 filter applies to the second row of TinyMCE buttons
 * @param  array $buttons Array of TinyMCE buttons
 * @return array          Modified array of TinyMCE buttons
 */
function sm_mce_buttons_2( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}
add_filter('mce_buttons_2', 'sm_mce_buttons_2');

/**
 * Add options to the TinyMCE style dropdown
 * @param  array $init_array TinyMCE configuration array
 * @return array             Modified TinyMCE configuration array
 */
function sm_mce_before_init_insert_formats( $init_array ) {
	// Define the style_formats array
	$style_formats = array(
		// Each array child is a format with it's own settings
		array(
			'title' => 'Bulleted List - Two Column',
			'selector' => 'ul',
			'classes' => 'col-two',
			'wrapper' => 'true'
		),
		array(
			'title' => 'Bulleted List - Three Column',
			'selector' => 'ul',
			'classes' => 'col-three',
			'wrapper' => 'true'
		),
		array(
			'title' => 'Bulleted List - Four Column',
			'selector' => 'ul',
			'classes' => 'col-four',
			'wrapper' => 'true'
		),
		array(
			'title' => 'Figure credit',
			'selector' => 'p',
			'classes' => 'figure__credit',
			'wrapper' => 'true'
		),
	);
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );

	return $init_array;

}
// add_filter( 'tiny_mce_before_init', 'sm_mce_before_init_insert_formats' );
