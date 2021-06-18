<section id="details" class="container mb-5">
  <section id="title" class="d-lg-none">
    @include('partials.product.details.title')
  </section>
  <div class="row">
    <div class="col-lg-8 mb-3 mb-lg-0">
      @include('partials.product.details.images')
      @include('partials.product.details.content')
    </div>
    <div class="col-lg-4">
      <section id="title-desktop" class="d-none d-lg-block">
        @include('partials.product.details.title')
      </section>
      <hr class="mb-3"/>
      @include( 'partials.product.details.rating' )
      <div class="mb-3">{!! get_the_excerpt(get_the_ID()) !!} <a href="#content" title="Read More" class="d-block text-black smooth-scroll"><u>Read more...</u></a></div>
      @php
      woocommerce_template_single_add_to_cart();
      @endphp
      <hr class="mb-3"/>
      {{-- @include('partials.product.details.price') --}}
      @include('partials.product.details.tags')
      @if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) )
        <span class="sku_wrapper">
          {{ esc_html_e( 'SKU:', 'woocommerce' ) }}
          <span class="sku">{{ ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ) }}</span>
        </span>
      @endif
      <hr class="mb-0"/>
      @include('partials.product.details.reviews')
    </div>
  </div>
</section>
@include('partials.modal.exit')
