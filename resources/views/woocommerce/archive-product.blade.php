@php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;
@endphp

@extends('layouts.app')

@section('content')

  <section id="shop" class="py-5" >
    <div class="container">
      <div class="row">
        <div class="col">
          @php
          /**
            * Hook: woocommerce_before_main_content.
            *
            * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
            * @hooked woocommerce_breadcrumb - 20
            * @hooked WC_Structured_Data::generate_website_data() - 30
            */
          // do_action( 'woocommerce_before_main_content' );
          @endphp
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
      @if ( woocommerce_product_loop() )
        @php
        /**
          * Hook: woocommerce_before_shop_loop.
          *
          * @hooked woocommerce_output_all_notices - 10
          * @hooked woocommerce_result_count - 20
          * @hooked woocommerce_catalog_ordering - 30
          */
        // do_action( 'woocommerce_before_shop_loop' );
        // woocommerce_product_loop_start();
        @endphp
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
        @if ( wc_get_loop_prop( 'total' ) )
          <div class="row mb-5">
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
              @else
                <div class="alert alert-info">
                  <p class="text-info mb-0">{{ __('Sorry, no results were found.', 'sage') }}</p>
                </div>
              @endif
            </div>
          </div>
        @endif
        @php
        // woocommerce_product_loop_end();
        /**
          * Hook: woocommerce_after_shop_loop.
          *
          * @hooked woocommerce_pagination - 10
          */
        do_action( 'woocommerce_after_shop_loop' );
        @endphp
      @else
        @php
        /**
          * Hook: woocommerce_no_products_found.
          *
          * @hooked wc_no_products_found - 10
          */
        do_action( 'woocommerce_no_products_found' );
        @endphp
      @endif
      @php
      /**
        * Hook: woocommerce_after_main_content.
        *
        * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
        */
      // do_action( 'woocommerce_after_main_content' );
      /**
        * Hook: woocommerce_sidebar.
        *
        * @hooked woocommerce_get_sidebar - 10
        */
      @endphp
    </div>
  </section>
  @include('partials.modal.quick-view')
@endsection
