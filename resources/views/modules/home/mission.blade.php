@if ($mission = get_field('mission'))
  <section id="mission" class="py-5">
    <div class="container">
      <div class="row">
        <div class="col">
          <h2 class="section-title mb-3">Our <span>Mission</span></h2>
          <blockquote class="mb-3">{!! $mission !!}</blockquote>
          <a href="{{ get_site_url() }}/our-story" class="btn btn-outline-secondary">Learn More</a>
        </div>
      </div>
    </div>
  </section>
@endif
