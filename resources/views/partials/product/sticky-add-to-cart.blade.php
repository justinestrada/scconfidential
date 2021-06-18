<style>
#sticky-add-to-cart {
  position: fixed;
  width: 100%;
  bottom: 0;
  z-index: 2;
}
</style>
<section id="sticky-add-to-cart" class="bg-black py-1">
  <div class="container">
    <div class="row justify-content-lg-end">
      <div class="col-auto">
        <form action="{{ get_the_permalink() }}" method="POST" class="cart" >
          @if ( $product->is_type( 'variable' ) )
            <input type="hidden" name="variation_id" class="variation_id" value="{{ $default_variation_id }}"/>
          @endif
          <input type="hidden" name="product_id" value="{{ $product->get_ID() }}"/>
          <input type="hidden" name="add-to-cart" value="{{ $product->get_ID() }}"/>
          <button type="submit" class="d-block single_add_to_cart_button quick-view-cart btn btn-secondary btn-rounded" >Add To Cart</button>
        </form>
      </div>
    </div>
  </div>
</section>
