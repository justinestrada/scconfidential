@php
$social = get_field('social', 'option');
@endphp
@if ($social)
  <ul class="social">
    <li>
      <a href="{{ $social['instagram'] }}" title="Instagram" target="_blank" class="btn text-white">
        <span class="sr-only">Instagram</span>
        <i class="fa fa-instagram" aria-hidden="true"></i>
      </a>
    </li>
    <li>
      <a href="{{ $social['facebook'] }}" title="Facebook" target="_blank" class="btn text-white">
        <span class="sr-only">Facebook</span>
        <i class="fa fa-facebook" aria-hidden="true"></i>
      </a>
    </li>
    <li>
      <a href="{{ $social['twitter'] }}" title="Twitter" target="_blank" class="btn text-white">
        <span class="sr-only">Twitter</span>
        <i class="fa fa-twitter" aria-hidden="true"></i>
      </a>
    </li>
  </ul>
@endif
