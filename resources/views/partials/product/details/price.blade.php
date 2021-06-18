<p class="text-uppercase price {{ isset($class) ? $class : '' }}">
  {!! $product->get_price_html() !!}
  {{-- @if ( $product->is_on_sale() )
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
  @endif --}}
</p>
