@php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
@endphp
@if ( $related_products )
	<section id="related" class="related products container">
    <div class="row mb-3">
      <div class="col">
        <h2 class="section-title mb-0">You <span>May Also Like</span></h2>
      </div>
    </div>
    <div class="row">
      @foreach ( $related_products as $related_product )
        <div class="col-lg-4 mb-3">
          @php
          $post_object = get_post( $related_product->get_id() );
          setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found
          wc_get_template_part( 'content', 'product' );
          @endphp
        </div>
      @endforeach
    </div>
	</section>
@endif
