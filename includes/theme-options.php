<?php

/**
 * Set default values for custom theme options.
 */
add_filter( 'genesis_theme_settings_defaults', 'prvsn_theme_settings_defaults' );
function prvsn_theme_settings_defaults( $defaults ) {
	$defaults['prvsn_production_on'] = false;
	$defaults['prvsn_assets_version'] = null;
	return $defaults;
}

/**
 * Set filters for custom theme options.
 */
add_action( 'genesis_settings_sanitizer_init', 'prvsn_settings_sanitizer' );
function prvsn_settings_sanitizer() {

	genesis_add_option_filter(
		'one_zero',
		GENESIS_SETTINGS_FIELD,
		array(
			'sm_production_on',
		)
	);

	genesis_add_option_filter(
	'absint',
	GENESIS_SETTINGS_FIELD,
	array(
		'sm_assets_version',
	)
);


}

/**
 * Add meta boxes for custom theme options.
 */
add_action( 'genesis_theme_settings_metaboxes', 'prvsn_theme_settings_metaboxes' );
function prvsn_theme_settings_metaboxes( $pagehook ) {

	add_meta_box(
		'prvsn-environment-settings',
		'Environment',
		'prvsn_environment_settings_box',
		$pagehook,
		'main',
		'high'
	);

}

/**
 * Render the 'Environment' meta box.
 */
function prvsn_environment_settings_box() {

	?>
	<p>
		<label>
			<input type="checkbox" name="<?php echo GENESIS_SETTINGS_FIELD; ?>[prvsn_production_on]" value="1" <?php checked( genesis_get_option('prvsn_production_on'), 1 ); ?> >
		<?php _e( 'Use Production Assets?', 'sm' ); ?></label>
	</p>

	<p>
		<label>
			<?php _e( 'Assets Version Number:', 'sm' ); ?><br>
			<input type="text" name="<?php echo GENESIS_SETTINGS_FIELD; ?>[prvsn_assets_version]" value="<?php echo esc_attr( genesis_get_option('prvsn_assets_version') ); ?>" class="regular-text" id="<?php echo GENESIS_SETTINGS_FIELD; ?>[prvsn_assets_version]">
		</label>
	</p>

	<p>
		<span class="description">
			Add or change the value here to force users' browsers to re-download the theme CSS/JS.
		</span>
	</p>
	<?php

}

function prevision_archive_settings( $pagehook ) {
	add_meta_box( 'prevision-entry-layout-settings', __( 'Entry Layout Settings', 'prevision' ), 'prevision_do_archive_settings_metabox', $pagehook, 'main', 'high' );
}
// add_action( 'genesis_cpt_archives_settings_metaboxes', 'prevision_archive_settings' );

function prevision_do_archive_settings_metabox( $post ) {
	echo 'ajf';
}

