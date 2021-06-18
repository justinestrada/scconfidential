@php
global $post;
$cat = get_the_category();
@endphp
<section id="breadcrumb" class="py-1 bg-light-gray mb-5">
  <div class="container">
    <div class="row">
      <div class="col-md mb-1 mb-md-0">
        <a href="{{ get_site_url() . '/blog' }}" title="Blog" class="mr-1" >Blog</a>
        <span class="mr-1">/</span>
        @if ($cat)
          <a href="{{ get_site_url() }}/category/{{ $cat[0]->slug }}" title="{{ $cat[0]->cat_name }}" class="mr-1" >{!! $cat[0]->cat_name !!}</a>
          <span class="mr-1">/</span>
        @endif
        <span style="color: #767676;">
          {!! get_the_title() !!}
        </span>
      </div>
      <div class="col-md-auto text-md-right">
        <ul id="social-shares" class="p-0 m-0">
          <li class="text-gray">Share:</li>
          <li>
            <a href="{{ App\social_shares('linkedin', $post) }}" title="Share" target="_blank" class="text-gray px-2">
              <i class="fa fa-linkedin" aria-hidden="true"></i>
              <span class="sr-only">LinkedIn</span>
            </a>
          </li>
          <li>
            <a href="{{ App\social_shares('twitter', $post) }}" title="Share" target="_blank" class="text-gray px-2">
              <i class="fa fa-twitter" aria-hidden="true"></i>
              <span class="sr-only">Twitter</span>
            </a>
          </li>
          <li>
            <a href="{{ App\social_shares('facebook', $post) }}" title="Share" target="_blank" class="text-gray px-2">
              <i class="fa fa-facebook" aria-hidden="true"></i>
              <span class="sr-only">Facebook</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>
