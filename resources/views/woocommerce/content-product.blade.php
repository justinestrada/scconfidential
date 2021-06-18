@php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$post_id = get_the_ID();

$rating = $product->get_average_rating();

$types = get_the_terms($post_id, 'type');

$default_variation_id = App\product_get_default_variation_id($product);
$add_to_cart_id = ($default_variation_id) ? $default_variation_id : $post_id;
@endphp
<article <?php wc_product_class( 'card product-card', $product ); ?>>
  <div class="product-img mb-2" style="background-image: url('{{ wp_get_attachment_url( get_post_thumbnail_id($post_id) ) }}');">
    <div class="content-overlay"></div>
    <div class="content-details fadeIn-top">
      @if (!is_product())
        <button href="{{ get_permalink($post_id) }}" class="btn btn-outline-primary z-depth-1:hover" data-toggle="modal" data-target="#quickViewModal" post-id="{{ $post_id }}" >Quick View</button>
      @else
        <a href="{{ get_permalink($post_id) }}" class="btn btn-outline-primary z-depth-1:hover">View More</a>
      @endif
      {{-- <div class="btn-group">
        <a href="{{ get_permalink($post_id) }}" class="btn btn-secondary">View More</a>
        <form action="{{ get_site_url() }}/shop" method="POST" class="cart btn btn-secondary" enctype="multipart/form-data" >
          <button type="submit" name="add-to-cart" class="single_add_to_cart_button" value="{{ $add_to_cart_id }}" >Add To Cart</button>
        </form>
      </div> --}}
    </div>
  </div>
  <div class="card-body p-0">
    <div class="row mb-1">
      <div class="col pr-0">
        <div class="mb-2">
          <a href="{{ get_permalink($post_id) }}" title="{{ $product->get_title() }}" class="product-title text-black" >{{ $product->get_title() }}</a>
          {{-- TODO: Add .star-rating css to search.blade.php --}}
          @if ($rating && !is_search())
            {{-- <div class="star-rating text-yellow" title="Rating" style="float: none;" >
              <span style="width: {{ ( $rating / 5 ) * 100 }}%;">
                <strong itemprop="ratingValue" class="rating">{{ $rating }}</strong> out of 5
              </span>
            </div> --}}
            <div>
              @for ($i = 0; $i < 5; $i++)
                <i class="fa fa-star" aria-hidden="true"></i>
              @endfor
            </div>
          @else
            <div>
              @for ($i = 0; $i < 5; $i++)
                <i class="fa fa-star-o" aria-hidden="true"></i>
              @endfor
            </div>
          @endif
        </div>
        {{-- {{ var_dump($types[0]) }} --}}
        <a href="{{ get_site_url() }}/type/{{ $types[0]->slug }}" title="{{ $types[0]->name }}" class="d-block text-gray mb-0">
          {{ $types[0]->name }}
        </a>
      </div>
      <div class="col-auto">
        {{-- @if ( $product->is_on_sale() )
          <span class="woocommerce-Price-amount amount sale-price mr-2" >
            <span>{!! get_woocommerce_currency_symbol() !!}</span>{!! str_replace('.00', '', $product->get_sale_price()) !!}
          </span>
          <strike class="woocommerce-Price-amount amount regular-price" >
            <span class="woocommerce-Price-currencySymbol">{!! get_woocommerce_currency_symbol() !!}</span>{!! str_replace('.00', '', $product->get_regular_price()) !!}
          </strike>
        @else
          <span class="woocommerce-Price-amount amount sale-price" >
            <span class="woocommerce-Price-currencySymbol">{!! get_woocommerce_currency_symbol() !!}</span>{!! str_replace('.00', '', $product->get_price()) !!}
          </span>
        @endif --}}
        {!! $product->get_price_html() !!}
      </div>
      {{-- <div class="col text-right">
        <a href="{{ get_permalink($post_id) }}" class="btn btn-outline-black btn-rounded" title="View More" >View More</a>
      </div> --}}
    </div>
    @if ( $product->is_type( 'variable' ) )
      @php
      $attributes = $product->get_attributes();
      @endphp
      @foreach ( $attributes as $attribute_name => $options )
        <div class="attribute row mb-2">
          <div class="col-auto">
            <p class="attribute-name mb-0">{{ count($options['options']) }} <span class="text-capitalize">{{ $attribute_name }}s:</span></p>
          </div>
          <div class="col pl-0">
            <div class="options" style="padding-top: 0.125rem;">
              @foreach( $options['options'] as $key => $option )
                {{-- <a href="{{ get_permalink($post_id) }}" class="swatch swatch-{{ strtolower(str_replace(' ', '-', $option)) }}"
                  variation-image-url="{{ App\get_attribute_variation_image_url( $product, $attribute_name, $option) }}" ></a> --}}
                <span class="swatch swatch-{{ strtolower(str_replace(' ', '-', $option)) }}" variation-image-url="{{ App\get_attribute_variation_image_url( $product, $attribute_name, $option) }}" ></span>
              @endforeach
            </div>
          </div>
        </div>
      @endforeach
    @endif
    @if ( $product->is_in_stock() )
      @if (get_field('product_card', 'option')['show_add_to_cart'] && !is_product())
        {{-- $product->managing_stock() &&  --}}
        <form action="{{ get_site_url() }}/shop" method="POST" class="cart" enctype="multipart/form-data" >
          <button type="submit" name="add-to-cart" class="single_add_to_cart_button btn btn-outline-primary btn-rounded z-depth-1:hover" value="{{ $add_to_cart_id }}" >Add To Cart</button>
        </form>
      @endif
    @else
      <span class="badge badge-danger">Sold Out</span>
    @endif
  </div>
</article>
