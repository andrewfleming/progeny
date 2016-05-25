<?php

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
