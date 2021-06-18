@php
$filters = get_field('filters', 'option');
@endphp
<div id="filters-accordion">
  @if ($filters['show_brands'] && $brands = get_terms( array('brand') ))
    <div class="card">
      <div class="card-header bg-white p-0" id="brands">
        <h5 class="mb-0">
          <button class="text-left btn-transparent btn-block p-0 py-3" data-toggle="collapse" data-target="#collapseBrands" aria-expanded="true" aria-controls="collapseBrands">
            Brands <i class="fa fa-angle-down float-right" aria-hidden="true"></i>
          </button>
        </h5>
      </div>
      <div id="collapseBrands" class="collapse show" aria-labelledby="brands" data-parent="#filters-accordion">
        <div class="card-body">
          @foreach( $brands as $key => $brand)
            @if ( $brand->count )
              <a class="d-block grey-text text-capitalize {{ ($key !== (count($brands) - 1)) ? 'mb-2' : '' }}" href="{{ get_site_url() }}/brand/{{ $brand->slug }}" title="{!! $brand->name !!}" >{!! $brand->name !!} <span class="text-gray">({{ $brand->count }})</span></a>
            @endif
          @endforeach
        </div>
      </div>
    </div>
  @endif
  @if ($types = get_terms( array('type') ))
    <div class="card">
      <div class="card-header bg-white p-0" id="types">
        <h5 class="mb-0">
          <button class="text-left btn-transparent btn-block p-0 py-3 collapsed" data-toggle="collapse" data-target="#collapseTypes" aria-expanded="{{ (!$filters['show_brands']) ? 'true' : 'false' }}" aria-controls="collapseTypes">
            Types <i class="fa fa-angle-down float-right" aria-hidden="true"></i>
          </button>
        </h5>
      </div>
      <div id="collapseTypes" class="collapse {{ (!$filters['show_brands']) ? 'show' : '' }}" aria-labelledby="types" data-parent="#filters-accordion">
        <div class="card-body">
          @foreach( $types as $type)
            @if ( $type->count )
              <a class="d-block grey-text text-capitalize mb-2" href="{{ get_site_url() }}/type/{{ $type->slug }}" title="{!! $type->name !!}" >{!! $type->name !!} <span class="text-gray">({{ $type->count }})</span></a>
            @endif
          @endforeach
        </div>
      </div>
    </div>
  @endif
  @if ($tags = get_terms( array('product_tag') ))
    <div class="card">
      <div class="card-header bg-white p-0" id="tags">
        <h5 class="mb-0">
          <button class="text-left btn-transparent btn-block p-0 py-3 collapsed" data-toggle="collapse" data-target="#collapseTags" aria-expanded="false" aria-controls="collapseTags">
            Tags <i class="fa fa-angle-down float-right" aria-hidden="true"></i>
          </button>
        </h5>
      </div>
      <div id="collapseTags" class="collapse" aria-labelledby="tags" data-parent="#filters-accordion">
        <div class="card-body">
          @foreach( $tags as $tag)
            @if ( $tag->count )
              <a class="d-block grey-text text-capitalize mb-2" href="{{ get_site_url() }}/product-tag/{{ $tag->slug }}" title="{!! $tag->name !!}" >{!! $tag->name !!} <span class="text-gray">({{ $tag->count }})</span></a>
            @endif
          @endforeach
        </div>
      </div>
    </div>
  @endif
</div>
