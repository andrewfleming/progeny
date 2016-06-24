<?php

printf( '<article %s>', genesis_attr( 'entry' ) );
	genesis_entry_header_markup_open();
		prevision_do_single_image();
		prevision_related_entry_title_links();
	genesis_entry_header_markup_close();
echo '</article>';
