<?php

/**
 * Alter the credits text
 * @param  string $creds Credits text
 * @return string        Altered credits text
 */
function progeny_credits( $creds ) {
	$title = get_bloginfo();
	$creds = '[footer_copyright] '. $title .' &middot; [footer_loginout]';
	return $creds;
}
add_filter('genesis_footer_creds_text', 'progeny_credits');
