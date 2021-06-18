@php
$categories = get_the_terms( $product->get_id(), 'types' );
@endphp
<p class="categories text-darkGray">{!! $categories !!}</p>
