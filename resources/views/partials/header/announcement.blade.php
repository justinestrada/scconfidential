@php
$announcement = get_field('announcement', 'option');
@endphp
@if ($announcement['show'])
  <section id="announcement" class="w-100 bg-light-gray d-none" >
    <div class="container position-relative py-1">
      <div class="row">
        <div class="col text-center">
          {!! $announcement['text'] !!}
        </div>
      </div>
      {{-- <button type="button" class="btn btn-dismiss">
        <i class="fa fa-times text-black" aria-hidden="true"></i>
      </button> --}}
    </div>
  </section>
@endif
