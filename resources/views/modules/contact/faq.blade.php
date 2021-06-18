
@if ($questions = get_field('questions'))
  <section id="faq" class="container mb-5">
    <div class="row">
      <div class="col">
        <h2 class="section-title mb-5">Frequently <span>Asked Questions</span></h2>
        <div id="accordion">
          @foreach ($questions as $index => $item)
            <div class="card mb-3">
              <div class="card-header" id="heading{{ $index }}">
                <h5 class="mb-0">
                  <button class="btn btn-link text-black text-left w-100 px-0" data-toggle="collapse" data-target="#collapse{{ $index }}" aria-expanded="{{ ($index) ? 'false' : 'true' }}" aria-controls="collapse{{ $index }}">
                    {!! $item['question'] !!}
                    {{-- <img src="{{ App\asset_path('images/icon/arrow.svg') }}" class="float-right" style="height: 24px; margin: 6px 0;" /> --}}
                    <i class="fa fa-angle-down float-right" aria-hidden="true"></i>
                  </button>
                </h5>
              </div>
              <div id="collapse{{ $index }}" class="collapse {{ ($index) ? 'false' : 'show' }}" aria-labelledby="heading{{ $index }}" data-parent="#accordion">
                <div class="card-body">
                  {!! $item['answer'] !!}
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>
@endif
