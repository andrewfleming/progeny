<?php

printf( '<article %s>', genesis_attr( 'entry' ) );
	genesis_entry_header_markup_open();
		prevision_do_single_image();
		genesis_do_post_title();
	genesis_entry_header_markup_close();
	printf( '<div %s>', genesis_attr( 'entry-content' ) );
		the_content();
		echo ($website = get_field('website')) ? '<a href="'. $website .'" class="contributor__website">'. str_replace( 'http://', '', $website ) .'</a>' : '';
	echo '</div>';
echo '</article>';

