<?php

//* Modify size of the Gravatar in the entry comments
add_filter( 'genesis_comment_list_args', 'progeny_sample_comments_gravatar' );
function progeny_sample_comments_gravatar( $args ) {
	$args['avatar_size'] = 60;
	return $args;
}
