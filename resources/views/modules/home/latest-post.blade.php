@php
$latest_post = new WP_Query( array(
  'posts_per_page' => 1,
));
@endphp
@if ($latest_post->have_posts())
  @while ( $latest_post->have_posts() ) @php $latest_post->the_post(); @endphp
    <section id="latest-post" class="bg-light-gray py-5">
      <div class="container">
        <div class="row mb-3">
          <div class="col">
            <h2 class="section-title mb-0">Our <span>Latest Post</span></h2>
          </div>
        </div>
        @php
        $cat = get_the_category();
        @endphp
        <article class="row mb-3">
        {{-- @php post_class('row') @endphp --}}
          @if ($feat_img_url = get_the_post_thumbnail_url( get_the_ID(), 'full' ))
            <div class="col-lg-5 mb-3 mb-lg-0">
              <a href="{{ get_the_permalink() }}" class="d-block" title="Read More" style="border: 1px solid #ddd;">
                <img src="{{ $feat_img_url }}" alt="{{ the_title_attribute() }}" class="w-100 img-fluid"/>
              </a>
            </div>
          @endif
          <div class="col-lg">
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
          </div>
        </article>
        <div class="row">
          <div class="col">
            <a href="{{ get_site_url() }}/blog" class="btn btn-primary">Read All</a>
          </div>
        </div>
      </div>
    </section>
  @endwhile
@endif
