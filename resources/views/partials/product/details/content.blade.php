<section id="content" class="mb-5">
  <div class="row mb-5">
    <div class="col">
      {!! get_the_content() !!}
    </div>
  </div>
  <div class="row">
    <div class="col">
      @php do_action( 'woocommerce_product_additional_information', $product ); @endphp
    </div>
  </div>
</section>
