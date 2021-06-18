<?php

function str_replace_zero_w_free( $price, $product ) {
    return ($price === 0 || $price === 0.00 || $price === '0' || $price === '0.00') ? 'FREE' : $price;
}
add_filter( 'woocommerce_product_get_price', 'str_replace_zero_w_free', 10, 2 );
add_filter( 'woocommerce_product_variation_get_price', 'str_replace_zero_w_free', 10, 2 );
add_filter( 'woocommerce_product_get_regular_price', 'str_replace_zero_w_free', 10, 2 );
add_filter( 'woocommerce_product_get_sale_price', 'str_replace_zero_w_free', 10, 2 );

/*
* Automatically adding the product to the cart when cart total amount reach to $500.
*/
add_action( 'template_redirect',  function () {
    // if (! $GLOBALS['wp']->query_vars['rest_route']) {
    // if (! isset($GLOBALS['wp']->query_vars['rest_route'])) {
    //     return false;
    // }
    if ( class_exists('acf') && $promotion = get_field('promotion', 'option') ) {
        if ($promotion['enable']) {
            global $woocommerce;
            $cart_total	= $promotion['criteria']['cart_total'];
            if ( $woocommerce->cart->total >= $cart_total ) {
                if ( ! is_admin() ) {
                    $free_product_id = $promotion['criteria']['free_product_id'];  // Product Id of the free product which will get added to cart
                    // TODO: check if the free product is in stock!
                    $found = false;
                    //check if product already in cart
                    if ( sizeof( WC()->cart->get_cart() ) > 0 ) {
                        foreach ( WC()->cart->get_cart() as $cart_item_key => $values ) {
                            $_product = $values['data'];
                            if ( $_product->get_id() == $free_product_id )
                                $found = true;
                        }
                        // if product not found, add it
                        if ( ! $found )
                            WC()->cart->add_to_cart( $free_product_id );
                    } else {
                        // if no products in cart, add it
                        WC()->cart->add_to_cart( $free_product_id );
                    }
                }
            }
        }
    }
});

/**
 * Related products
 */
add_filter( 'woocommerce_output_related_products_args', function( $args ) {
    $args['posts_per_page'] = 3;
    return $args;
}, 20 );

/**
 * Hide shipping rates when free shipping is available.
 * Updated to support WooCommerce 2.6 Shipping Zones.
 *
 * @param array $rates Array of rates found for the package.
 * @return array
 */
add_filter( 'woocommerce_package_rates', function ( $rates ) {
	$free = array();
	foreach ( $rates as $rate_id => $rate ) {
		if ( 'free_shipping' === $rate->method_id ) {
			$free[ $rate_id ] = $rate;
			break;
		}
	}
	return ! empty( $free ) ? $free : $rates;
}, 100 );

/**
 * Make the WooCommerce Terms & Conditions checkbox checked by default
 */
add_filter( 'woocommerce_terms_is_checked', function ( $terms_is_checked ) {
    return true;
}, 10 );
add_filter( 'woocommerce_terms_is_checked_default', function ( $terms_is_checked ) {
    return true;
}, 10 );

/**
 * Change add to cart text on single product page
 */
add_filter( 'woocommerce_product_single_add_to_cart_text', function () {
    return __( 'Add to Cart', 'woocommerce' );
});

/**
 * Product Get Rating HTML
 */
add_filter( 'woocommerce_product_get_rating_html', function ( $rating_html, $rating ) {
    $rating_html = '<div class="d-inline-block">';
    for ($i = 0; $i < $rating; $i++) {
        if ($i !== (int)$rating) {
            $rating_html .= '<i class="fa fa-star text-black"></i>';
        } else {
            $rating_html .= '<i class="fa fa-star-half-o text-black"></i>';
        }
    }
    $rating_html .= '</div>';
    return $rating_html;
}, 10, 2 );

/**
 * Availability Text - Sold Outs
 */
add_filter('woocommerce_get_availability', function ($availability) {
    $availability['availability'] = str_ireplace('Out of stock', 'Sold Out', $availability['availability']);
    return $availability;
});
