
@php
function sort_name() {
  if (!isset($_GET['orderby'])) {
    return '';
  }
  $orderby = $_GET['orderby'];
  if ($orderby === 'menu_order') {
    return 'Default';
  }
  if ($orderby === 'popularity') {
    return 'Popularity';
  }
  if ($orderby === 'date') {
    return 'Newest';
  }
  if ($orderby === 'rating') {
    return 'Rating';
  }
  if ($orderby === 'price-desc') {
    return 'Price: High-Low';
  }
  if ($orderby === 'price') {
    return 'Price: Low-High';
  }
}
@endphp
<div id="sort-by" class="btn-group">
  <button type="button" class="btn btn-transparent px-0 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="mr-3">Sort By{!! (isset($_GET['orderby'])) ? '<span class="text-gray">: ' . sort_name() . '</span>' : '' !!}</span><i class="fa fa-angle-down float-right" aria-hidden="true" style="font-size: 1.5rem;"></i>
  </button>
  <div class="dropdown-menu dropdown-menu-right">
    <button class="dropdown-item" type="button" data-value="menu_order">Default</button>
    <button class="dropdown-item" type="button" data-value="popularity">Popularity</button>
    <button class="dropdown-item" type="button" data-value="date">Newest</button>
    <button class="dropdown-item" type="button" data-value="rating">Rating</button>
    <button class="dropdown-item" type="button" data-value="price-desc">Price: High-Low</button>
    <button class="dropdown-item" type="button" data-value="price">Price: Low-High</button>
  </div>
</div>
<div class="d-none">
  @php
  woocommerce_catalog_ordering();
  @endphp
</div>
{{--
// Smooth slide down

<script>
(function($) {
$('.dropdown').on('show.bs.dropdown', function(e){
  $(this).find('.dropdown-menu').first().stop(true, true).slideDown(300);
});

$('.dropdown').on('hide.bs.dropdown', function(e){
  $(this).find('.dropdown-menu').first().stop(true, true).slideUp(300);
});
})(jQuery);
</script> --}}
