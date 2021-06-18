<section id="banner" class="bg-light-gray py-5 mb-5">
  <div class="container">
    <div class="row">
      <div class="col text-center">
        @if (is_page())
          <h1 class="text-capitalize m-0">{!! App::title() !!}</h1>
        @elseif (is_404())
          <h1 class="text-capitalize m-0">404 - Page Not Found</h1>
        @endif
      </div>
    </div>
  </div>
</section>
