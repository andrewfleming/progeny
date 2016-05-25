<?php

/**
 * Add SVG to list of allowed mime type to upload to media library
 * @param  array $mimes Allowed mime types
 * @return array        Altered allowed mime types
 */
function progeny_allow_svg_in_media_gallery($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'progeny_allow_svg_in_media_gallery');

//* Add Image Sizes
// add_image_size( 'featured-image', 720, 400, TRUE );