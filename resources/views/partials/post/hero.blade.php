
@php
$feat_img = (get_the_post_thumbnail_url( get_the_ID(), 'full' )) ? get_the_post_thumbnail_url( get_the_ID(), 'full' ) : App\asset_path('images/feat-img-default.jpg');
@endphp
<section id="hero" class="section" style="background-image: url('{{ $feat_img }}')">
  <div class="d-flex justify-content-center align-items-center h-100">
    <div style="z-index: 1;">
      <h1 class="text-white mb-5">{!! get_the_title() !!}</h1>
      <div class="text-center">
        <img src="{{ App\asset_path('images/icon/double-down-angle-white.svg') }}" alt="Double Down Angle" class="angle-down"/>
      </div>
    </div>
  </div>
</section>

