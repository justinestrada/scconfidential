
@if ($exit_popup = get_field('exit_popup', 'option'))
  @if ($exit_popup['enable'])
    <div class="modal fade" id="exitModal" tabindex="-1" role="dialog" aria-labelledby="exitModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <div id="offer">
              {!! $exit_popup['above_form_html'] !!}
              <div class="mb-3">
                {!! do_shortcode('[mc4wp_form id="' . $exit_popup['mc4wp_form_id'] . '"]') !!}
              </div>
              {!! $exit_popup['below_form_html'] !!}
            </div>
            <div id="success" class="d-none">
              {!! $exit_popup['successful_submission_html'] !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  @endif
@endif
