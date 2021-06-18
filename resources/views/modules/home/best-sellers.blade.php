
@php
$best_sellers = get_field('best_sellers');
@endphp
@if ($best_sellers)
  <section id="best-sellers" class="py-5">
    <div class="container">
      <div class="row mb-3">
        <div class="col">
          <h2 class="section-title">Best <span>Sellers</span></h2>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-12">
          <div class="slick" style="display: none;">
            @foreach ($best_sellers as $product)
              @if ($product)
                @php
                $product_id = $product['product']->ID;
                $product = wc_get_product($product_id);
                @endphp
                {{-- <div class="col">
                </div> --}}
                  <div class="product product-card bg-white mx-lg-3">
                    <a href="{{ get_the_permalink($product_id) }}" class="d-block product-img mb-3" style="background-image: url({{ get_the_post_thumbnail_url( $product_id, 'full' ) }})" ></a>
                    <div>
                      <a href="{{ get_the_permalink($product_id) }}" title="{{ get_the_title($product_id) }}" class="text-black mb-3" >
                        <h4 class="m-0">{!! get_the_title($product_id) !!}</h4>
                      </a>
                      <p class="text-gray fs-1.25x mb-0" >Starting At<br>${{ $product->get_price() }}</p>
                    </div>
                  </div>
              @endif
            @endforeach
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <a href="{{ get_site_url() }}/shop" class="btn btn-outline-primary">Shop All</a>
        </div>
      </div>
    </div>
  </section>
@endif
