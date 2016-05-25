<?php

//* Modify size of the Gravatar in the author box
add_filter( 'genesis_author_box_gravatar_size', 'progeny_sample_author_box_gravatar' );
function progeny_sample_author_box_gravatar( $size ) {
	return 90;
}
