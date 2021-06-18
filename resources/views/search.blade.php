@extends('layouts.app')

@section('content')
  <section id="shop" class="py-5" >
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="woocommerce-products-header">
            @if ( apply_filters( 'woocommerce_show_page_title', true ) )
              <h1 class="woocommerce-products-header__title page-title text-uppercase h4">{{ woocommerce_page_title() }}</h1>
            @endif
            @php
            /**
              * Hook: woocommerce_archive_description.
              *
              * @hooked woocommerce_taxonomy_archive_description - 10
              * @hooked woocommerce_product_archive_description - 10
              */
            do_action( 'woocommerce_archive_description' );
            @endphp
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg">
          @php
          woocommerce_result_count();
          @endphp
        </div>
        <div class="col-auto text-lg-right">
          @include('modules.archive-product.filters-toggle')
        </div>
        <div class="col col-lg-auto text-right">
          @include('modules.archive-product.ordering')
        </div>
      </div>
      <div class="row">
        <div id="filters" class="col-lg-3 col-xl-2 mb-4 mb-lg-0" style="display: none;">
          @include('modules.archive-product.filters')
        </div>
        <div class="col">
          @if (have_posts())
            <div class="row">
              @while ( have_posts() )
                <div class="col-md-6 col-xl-4 mb-3">
                  @php
                  the_post();
                  /**
                    * Hook: woocommerce_shop_loop.
                    */
                  do_action( 'woocommerce_shop_loop' );
                  wc_get_template_part( 'content', 'product' );
                  @endphp
                </div>
              @endwhile
            </div>
            {{-- {!! get_the_posts_navigation() !!} --}}
          @else
            <div class="alert alert-info">
              <p class="text-info mb-0">{{ __('Sorry, no results were found.', 'sage') }}</p>
            </div>
          @endif
        </div>
      </div>
    </div>
  </section>
  @include('partials.modal.quick-view')
@endsection
