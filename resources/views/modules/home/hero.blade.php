
<section id="hero" class="container-fluid" style="background-image: url('{{ (get_the_post_thumbnail_url( get_the_ID(), 'full' )) ? get_the_post_thumbnail_url( get_the_ID(), 'full' ) : App\asset_path('images/bg-default.jpg') }}');" >
  <div class="row h-100" >
    <div class="container">
      <div class="row h-100 d-flex justify-content-center align-items-center">
        <div class="col">
          <h1 class="text-white title animated fadeInUpOnce" >{!! the_title() !!}</h1>
        </div>
      </div>
    </div>
  </div>
</section>
