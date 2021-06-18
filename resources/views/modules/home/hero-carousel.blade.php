
@php
$hero = get_field('hero');
@endphp
<section id="hero-carousel-section" class="container-fluid">
  <div class="row">
    <div id="hero-carousel" class="carousel slide w-100" data-ride="carousel" data-interval="10000" >
      <ol class="carousel-indicators">
        @for ($i = 0; $i < count($hero['carousel']); $i++)
          <li data-target="#hero-carousel" data-slide-to="{{ $i }}" class="{{ $i === 0 ? 'active' : '' }}" ></li>
        @endfor
      </ol>
      <div class="carousel-inner">
        @foreach ( $hero['carousel'] as $key => $slide )
          <div id="hero-carousel-slide-{{ $key }}" class="carousel-item {{ ($key === 0) ? 'active' : '' }}" >
            <style>
            #hero-carousel-slide-{{ $key }} {
              background-image: url('{{ $slide['mobile_bg_img']['url'] }}')
            }
            @media (min-width: 768px) {
              #hero-carousel-slide-{{ $key }} {
                background-image: url('{{ $slide['bg_img']['url'] }}')
              }
            }
            </style>
            <img src="{{ $slide['bg_img']['url'] }}" alt="{{ $slide['bg_img']['alt'] }}" class="w-100" style="visibility: hidden;" />
              <div class="carousel-caption text-left mb-5">
                <h2 class="caption-title text-yellow text-uppercase text-lg-left">
                  {!! $slide['caption'] !!}
                </h2>
                <div class="text-left">
                  <a href="{{ $slide['link'] }}" class="btn btn-secondary btn-rounded" title="See More" style="font-size: 1.25rem;" >See More</a>
                </div>
              </div>
          </div>
        @endforeach
      </div>
      @if ( count($hero['carousel']) > 1 )
        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#hero-carousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      @endif
    </div>
  </div>
</section>
