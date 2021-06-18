
<section id="search-section" class="d-none w-100 py-5" >
  <div class="container">
    <div class="row justify-content-center h-100">
      <div class="col-lg-10 col-xl-8">
        <form id="search-form" action="{{ get_site_url() }}" method="GET" class="w-100" >
          <div class="w-100 input-group mb-3">
            <div class="input-group-prepend">
              <button class="input-group-text" type="submit">
                <i class="fa fa-search mx-auto" aria-hidden="true"></i>
                <span class="sr-only">Search</span>
              </button>
            </div>
            <label for="search" class="d-none">Search</label>
            <input id="search" type="text" class="form-control" aria-label="Search" name="s" {!! (is_search()) ? 'value="' . get_query_var('s') . '"' : '' !!} autocomplete="off" />
            <div class="input-group-append">
              <button class="input-group-text btn-close-search" type="button">
                <i class="fa fa-times mx-auto" aria-hidden="true"></i>
                <span class="sr-only">Close</span>
              </button>
            </div>
          </div>
        </form>
        @php
        $products = get_posts( array(
          'post_type' => 'product',
          'posts_per_page' => '-1',
        ) );
        @endphp
        @if (!empty($products))
          <ul id="quick-search-listing">
            @foreach($products as $product)
              <li class="d-none">
                <a href="{{ get_the_permalink($product->ID) }}" class="d-block text-black">{!! $product->post_title !!}</a>
              </li>
            @endforeach
          </ul>
        @endif
      </div>
    </div>
  </div>
</section>
