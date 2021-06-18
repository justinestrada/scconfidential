@php
$cat = get_the_category();
@endphp
<article @php post_class('card article-card radius-0 mb-5 p-3') @endphp>
  <a href="{{ get_the_permalink() }}" title="{!! get_the_title() !!}" class="d-block article-img mb-3" style="background-image: url({{ get_the_post_thumbnail_url( get_the_ID(), 'full' ) }})" >
    <span class="sr-only">{!! get_the_title() !!}</span>
  </a>
  @if ($cat)
    <a href="{{ get_site_url() }}/category/{{ $cat[0]->slug }}" class="entry-category text-uppercase font-weight-bold mb-3">{!! $cat[0]->cat_name !!}</a>
  @endif
  <h3 class="entry-title text-black">
    <a href="{{ get_the_permalink() }}" title="{{ the_title_attribute() }}" class="text-black">{!! get_the_title() !!}</a>
  </h3>
  @include('partials/entry-meta')
  <div class="entry-content text-dark-gray">
    {!! get_the_excerpt() !!}
  </div>
</article>
