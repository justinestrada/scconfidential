
@php
$footer = get_field('footer', 'option');
@endphp
<footer class="bg-black py-5">
  <div class="container">
    <div class="row mb-5">
      <div class="col-sm-6 col-lg-2 mb-3 mb-lg-0">
        <h5 class="text-uppercase text-white">Shop</h5>
        @if (has_nav_menu('footer_menu_1'))
          {!! wp_nav_menu([
            'theme_location' => 'footer_menu_1',
            'menu_id' => 'footer-menu-1-nav',
            'container' => 'div',
            'menu_class' => 'nav',
          ])!!}
        @endif
      </div>
      <div class="col-sm-6 col-lg-2 mb-3 mb-lg-0">
        <h5 class="text-uppercase text-white">About</h5>
        @if (has_nav_menu('footer_menu_2'))
          {!! wp_nav_menu([
            'theme_location' => 'footer_menu_2',
            'menu_id' => 'footer-menu-2-nav',
            'container' => 'div',
            'menu_class' => 'nav',
          ])!!}
        @endif
      </div>
      <div class="col-sm-6 col-lg-2 mb-5 mb-lg-0">
        <h5 class="text-uppercase text-white">More</h5>
        @if (has_nav_menu('footer_menu_3'))
          {!! wp_nav_menu([
            'theme_location' => 'footer_menu_3',
            'menu_id' => 'footer-menu-3-nav',
            'container' => 'div',
            'menu_class' => 'nav',
          ])!!}
        @endif
      </div>
      <div class="col-12 col-lg text-center text-lg-right">
        <a href="{{ home_url('/') }}" title="{{ bloginfo('name') }}" class="d-block">
          <img src="{{ App\asset_path('images/logo-white.png') }}" alt="Footer Logo" class="mb-3" style="height: 96px;"/>
        </a>
        <div class="mb-3">
          @include('partials.social-icons')
        </div>
        {{-- <ul class="credit-cards">
          <li>
            <img src="{{ App\asset_path('images/icon/payment-visa.svg') }}" alt="Visa"/>
          </li>
          <li>
            <img src="{{ App\asset_path('images/icon/payment-amex.svg') }}" alt="American Express"/>
          </li>
          <li>
            <img src="{{ App\asset_path('images/icon/payment-mcrd.svg') }}" alt="Mastercard"/>
          </li>
          <li>
            <img src="{{ App\asset_path('images/icon/payment-disc.svg') }}" alt="Discover"/>
          </li>
        </ul> --}}
        <img src="{{ App\asset_path('images/credit-card-logos.png') }}" alt="Credit Card Logos" style="height: 48px;"/>
      </div>
    </div>
    <hr/>
    <div class="row">
      <div class="col-md text-center text-lg-left mb-3 mb-md-0">
        <ul id="footer-bottom-menu" >
          <li class="menu-item">
            <a href="{{ get_site_url() }}/terms-of-use" class="mr-3"><small>Terms of Use</small></a>
          </li>
          <li class="menu-item">
            <a href="{{ get_site_url() }}/privacy-policy" ><small>Privacy Policy</small></a>
          </li>
        </ul>
      </div>
      @if ($footer['bottom_text'])
        <div class="col-md text-center">
          <small class="text-gray">{{ $footer['bottom_text'] }}</small>
        </div>
      @endif
      <div class="col-md text-center text-lg-right">
        <small class="text-gray m-0">Copyright &copy; {{ date('Y') }}, {{ bloginfo('name') }}. All Rights Reserved</small>
      </div>
    </div>
  </div>
</footer>
