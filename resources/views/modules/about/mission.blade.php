@if ($mission = get_field('mission'))
  <section id="mission" class="container py-5">
    <div class="row">
      <div class="col">
        {{-- TODO: Make this dynamic --}}
        <h2 class="section-title mb-3">Our <span>Mission</span></h2>
        <blockquote>{!! $mission !!}</blockquote>
      </div>
    </div>
  </section>
@endif
