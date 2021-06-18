
<form action="{{ get_the_permalink() }}" method="POST" class="cart row" >
  <div class="col-auto">
  </div>
  <div class="col-auto">
    @if ( $product->is_type( 'variable' ) )
      <input type="hidden" name="variation_id" class="variation_id" value="{{ $default_variation_id }}"/>
    @endif
    <input type="hidden" name="product_id" value="{{ $product->get_ID() }}"/>
    <input type="hidden" name="add-to-cart" value="{{ $product->get_ID() }}"/>
    <button type="submit" class="d-block single_add_to_cart_button quick-view-cart btn btn-primary btn-rounded" >Add To Cart</button>
  </div>
</form>
