<?php

function mk100glass_product_get_default_variation_id($product) {
    if ( $product->get_type() == 'variable' ) {
      $attributes = $product->get_available_variations();
      return $attributes[0]['variation_id'];
    }
    return false;
}

add_action('rest_api_init', function() {
    register_rest_field( 'product', 'theme_meta', [
        'get_callback' => function ($arr, $field_name, $request) {
            $array_data = [];
            $array_data['thumbnail'] = get_the_post_thumbnail_url( $arr['id'], 'full' );

            $_product = wc_get_product( $arr['id'] );

            $attachment_ids = $_product->get_gallery_image_ids();
            $array_data['images'] = [];
            foreach ( $attachment_ids as $index => $attachment_id ) {
                $array_data['images'][] = wp_get_attachment_image_src($attachment_id, 'full');
            }

            $array_data['price'] = $_product->get_price();
            $array_data['price_html'] = $_product->get_price_html();

            $array_data['is_in_stock'] = $_product->is_in_stock();
            $array_data['default_variation_id'] = mk100glass_product_get_default_variation_id( $_product );

            $variation_obj = wc_get_product( $array_data['default_variation_id'] );
            $array_data['default_variation_stock_qty'] = ($variation_obj->get_stock_quantity()) ? $variation_obj->get_stock_quantity() : true;

            return $array_data;
        },
        'update_callback' => null,
        'schema' => null,
      ]
    );
});

