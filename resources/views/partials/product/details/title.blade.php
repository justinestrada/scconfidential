<div class="row mb-3">
  <div class="col pr-0">
    @php
    $type = get_the_terms( $product->get_id(), 'type' );
    @endphp
    @if ($type)
      <a href="{{ get_site_url() }}/type/{{  $type[0]->slug }}" class="d-block text-gray mb-0">{{ $type[0]->name }}</a>
    @endif
    <h2 class="mb-0">{!! get_the_title() !!}</h2>
  </div>
  <div class="col-auto d-flex align-items-center">
    <div class="title-price-html">
      {!! $product->get_price_html() !!}
      {{-- @if ($product->get_type() === 'variable')
      @else
        @if ( $product->is_on_sale() )
          <span class="woocommerce-Price-amount amount sale-price mr-2" >
            <span class="woocommerce-Price-currencySymbol">{!! get_woocommerce_currency_symbol() !!}</span>{!! str_replace('.00', '', $product->get_sale_price()) !!}
          </span>
          <strike class="woocommerce-Price-amount amount regular-price" >
            <span class="woocommerce-Price-currencySymbol">{!! get_woocommerce_currency_symbol() !!}</span>{!! str_replace('.00', '', $product->get_regular_price()) !!}
          </strike>
        @else
          <span class="woocommerce-Price-amount amount sale-price" >
            <span class="woocommerce-Price-currencySymbol">{!! get_woocommerce_currency_symbol() !!}</span>{!! str_replace('.00', '', $product->get_price()) !!}
          </span>
        @endif
      @endif --}}
    </div>
  </div>
</div>
