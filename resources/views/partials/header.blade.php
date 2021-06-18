
<style>
#header #header-nav>.menu-item.dropdown:hover .dropdown-menu>.menu-item-has-children {
  min-width: 6rem;
}
</style>
@include('partials.header.announcement')
<header id="header" style="border-bottom: 1px solid #ddd">
  <div class="container">
    <div class="row">
      <div class="col-auto col-lg-3 py-md-2 py-lg-3">
        <a href="{{ home_url('/') }}" title="{{ bloginfo('name') }}" class="d-block py-1 py-lg-0" >
          <img src="{{ App\asset_path('images/logo-crown.png') }}" alt="{{ bloginfo('name') }}" class="header-logo" />
        </a>
      </div>
      <div class="d-none d-lg-flex col-lg justify-content-center">
        @if (has_nav_menu('header_nav'))
          {!! wp_nav_menu([
            'theme_location' => 'header_nav',
            'menu_id' => 'header-nav',
            'container' => 'div',
            'menu_class' => 'nav',
            'depth' => 3,
            'walker' => new WP_Bootstrap_Navwalker()
          ])!!}
        @endif
      </div>
      <div class="col col-lg-3 text-right pl-lg-0">
        <ul id="header-icons" class="pl-0 py-0 m-0">
          <li class="mr-lg-3">
            <button id="toggle-search" class="btn btn-transparent btn-toggle-search" type="button">
              <span class="sr-only">Search</span>
              <i class="fa fa-search" aria-hidden="true"></i>
            </button>
          </li>
          <li class="mr-lg-3">
            @if (is_user_logged_in())
              <a href="{{ get_site_url() }}/my-account" class="btn btn-transparent" >
                <span class="sr-only">My Account</span>
                <i class="fa fa-user" aria-hidden="true"></i>
              </a>
            @else
              <button type="button" class="btn btn-transparent" data-toggle="modal" data-target="#loginModal" >
                <span class="sr-only">Login</span>
                <i class="fa fa-user" aria-hidden="true"></i>
              </button>
            @endif
          </li>
          <li>
            <button id="toggle-cart" class="btn btn-transparent btn-toggle-cart" type="button">
              <span class="sr-only">Cart</span>
              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </button>
          </li>
          <li class="d-lg-none">
            <button id="toggle-menu" class="btn btn-transparent btn-toggle-menu" type="button">
              <span class="sr-only">Menu</span>
              <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
          </li>
        </ul>
      </div>
    </div>
  </div>
</header>
@include('partials.header.right-sidebar')
@include('partials.header.search')
