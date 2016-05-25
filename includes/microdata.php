<?php

/**
 * Person microdata attributes
 * @param  array $attributes Existing attributes
 * @return array  $attributes             Modified attributes
 */
function progeny_microdata_person( $attributes ) {
	$attributes['itemtype']  = 'http://schema.org/Person';
	$attributes['class'] .= ' staff-member';
	return $attributes;
}

/**
 * Person Name microdata attribute
 * @param  array $attributes Existing attributes for this element
 * @return array             Modified attributes for this element
 */
function progeny_microdata_person_name( $attributes ) {
	$attributes['itemprop'] = 'name';
	return $attributes;
}
