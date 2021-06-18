
@if ($trending = get_field('trending'))
  <section id="trending" class="bg-light-gray py-5">
    <div class="container">
      <div class="row mb-3">
        <div class="col">
          <h2 class="section-title m-0">Trending <span>Products</span></h2>
        </div>
      </div>
      <div class="row mb-3">
        @if ($trending['sort'] === 'manual')
          @foreach( $trending['products'] as $key => $product )
            @php
            $product_id = $product->ID;
            // $product = wc_get_product($product_id);
            // var_dump($product['product'])
            @endphp
            <div class="col-sm-6 col-lg-4 mb-3 mb-lg-0  {{ ($key === 3) ? 'd-lg-none' : '' }}  ">
              <a href="{{ get_the_permalink($product_id) }}" class="d-block view" style="cursor: pointer;">
                <img src="{{ get_the_post_thumbnail_url( $product_id, 'full' ) }})" alt="{{ get_the_title($product_id) }}" class="img-fluid w-100" />
                <div class="mask d-flex align-items-end">
                  <div class="p-3 p-lg-5">
                    <h3 class="text-white mb-lg-3">Must-Have <br>{!! get_the_title($product_id) !!}</h3>
                    <button type="button" class="btn btn-secondary" title="Shop">Shop</button>
                  </div>
                </div>
              </a>
            </div>
          @endforeach
        @endif
      </div>
      <div class="row">
        <div class="col">
          <a href="{{ get_site_url() }}/shop" class="btn btn-primary">Shop All</a>
        </div>
      </div>
    </div>
  </section>
@endif
