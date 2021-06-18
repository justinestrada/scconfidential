@php
$newsletter_modal = get_field('newsletter_modal', get_queried_object_id());
$mc4wp_form_id = get_field('mc4wp_form_id', 'option');
@endphp
@if ($newsletter_modal['enable'])
  <div id="newsletterModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="newsletterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" style="border-radius: 0.5rem;" >
        <div class="modal-body p-0">
          <button type="button" class="btn p-3 close hover-spin" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          @if ( $newsletter_modal['image'] )
            <img src="{{ $newsletter_modal['image']['url'] }}" alt="{{ $newsletter_modal['image']['alt'] }}" class="img-fluid w-100" style="border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;"/>
          @endif
          <div class="text-center p-5">
            <h3 style="font-size: 4rem;" >GET 10% OFF</h3>
            <p>today and also receive all of our future discounts and newsletters right to your email.</p>
            {!! do_shortcode('[mc4wp_form id="' . $mc4wp_form_id . '"]') !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endif
