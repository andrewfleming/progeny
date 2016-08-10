<?php

/**
 * Required to build Woocommerce enabled genesis child themes
 * Used by Genesis Woocommerce Connect plugin https://wordpress.org/plugins/genesis-connect-woocommerce/
 */
// add_theme_support( 'genesis-connect-woocommerce' );

/**
 * Remove breadcrumbs
 * @return void
 */
function progeny_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}
// add_action( 'init', 'progeny_remove_wc_breadcrumbs' );

/**
 * Modify cart links update via ajax when product added
 * @param  array $fragments ?
 * @return array            HTML fragments
 */
function progeny_header_add_to_cart_fragment( $fragments ) {
	ob_start();
	?>
	<a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo sprintf (_n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a>
	<?php

	$fragments['a.cart-contents'] = ob_get_clean();

	return $fragments;
}
// add_filter( 'woocommerce_add_to_cart_fragments', 'progeny_header_add_to_cart_fragment' );

/**
 * Display checkout link
 * @return void
 */
function progeny_do_checkout_links() {
	global $woocommerce;
	echo '<a href="' . $woocommerce->cart->get_checkout_url() . '" title="' . __( 'Checkout' ) . '">' . __( 'Checkout' ) . '</a>';
}
// add_action( 'genesis_header', 'progeny_do_checkout_links' );

/**
 * Display cart totals
 * @return void
 */
function progeny_do_cart_link() {
	?>
		<a class="cart-contents" href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'storefront' ); ?>">
			<span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span> <span class="count"><?php echo wp_kses_data( sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'storefront' ), WC()->cart->get_cart_contents_count() ) );?></span>
		</a>
	<?php
}
// add_action( 'genesis_header', 'progeny_do_cart_link' );

