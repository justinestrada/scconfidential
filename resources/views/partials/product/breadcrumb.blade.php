
@php
global $post;
@endphp
<section id="breadcrumb" class="bg-light-gray py-3 py-md-1">
  <div class="container">
    <div class="row">
      <div class="col-md mb-3 mb-md-0">
        {!! woocommerce_breadcrumb() !!}
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
