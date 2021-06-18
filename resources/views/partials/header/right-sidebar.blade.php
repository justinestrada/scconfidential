
<style>
#right-sidebar .accordion .card .card-header {
  border-bottom: 1px solid #ddd;
}
#right-sidebar .accordion .card .btn {
  padding: 0.5rem;
  padding-left: 15px;
  border-radius: 0;
  border-bottom: 1px solid #ddd;
}
#right-sidebar .accordion .card:first-child .btn {
  border-top: 1px solid #ddd;
}
#right-sidebar .accordion .sub-menu .text-body {
  padding-left: 30px;
}
#right-sidebar .accordion .sub-menu a {
  border-bottom: 1px solid #ddd;
}
#right-sidebar .accordion .sub-menu a:hover,
#right-sidebar .accordion .sub-menu a:focus {
  text-decoration: none;
}
.child-child-menu-title {
  padding: 0.5rem;
  margin-bottom: 0;
  border-bottom: 1px solid #ddd;
}
.child-child-menu {
  list-style: none;
  padding: 0;
  margin: 0;
}
.child-child-menu li a {
  display: block;
  padding: 0.5rem;
  padding-left: 45px;
}
</style>
<section id="right-sidebar" class="bg-white" >
  <div class="container h-100">
    <div class="row">
      <div class="col right-sidebar-header">
        <p class="d-inline-block text-uppercase mb-0">Menu</p>
        <button type="button" class="btn btn-transparent btn-close-menu float-right">
          <span class="sr-only">Close</span>
          <i class="fa fa-times text-black" aria-hidden="true"></i>
        </button>
      </div>
    </div>
    <div class="row h-100">
      <div class="col px-0" style="height: calc(100vh - 110px); overflow-y: scroll;">
        <div>
          @if (has_nav_menu('right_sidebar_nav'))
            @php
            $menu_locations = get_nav_menu_locations();
            $menu_id = $menu_locations['right_sidebar_nav'];
            $right_sidebar_nav = wp_get_nav_menu_items($menu_id);
            $right_sidebar_nav = App\nest_menu($right_sidebar_nav);
            @endphp
            {{-- {!! wp_nav_menu([
              'theme_location' => 'right_sidebar_nav',
              'menu_id' => 'full-screen-nav',
              'container' => 'div',
              'menu_class' => 'nav',
            ])!!} --}}
            <div id="sidebarAccordion" class="accordion">
              @foreach ($right_sidebar_nav as $item)
                @if (!count($item['children']))
                  <div class="card rounded-0">
                    <div class="card-header p-0" id="heading{{ $item['id'] }}">
                      <a href="{{ $item['url'] }}" class="btn btn-link text-capitalize w-100 text-left text-decoration-none" type="button" title="{{ $item['title'] }}" >
                        {{ $item['title'] }}
                      </a>
                    </div>
                  </div>
                @else
                  <div class="card rounded-0">
                    <div id="heading{{ $item['id'] }}" class="card-header p-0">
                      <button
                        class="btn btn-link text-capitalize w-100 text-left text-decoration-none"
                        type="button"
                        data-toggle="collapse"
                        data-target="#collapse{{ $item['id'] }}"
                        aria-expanded="false"
                        aria-controls="collapse{{ $item['id'] }}">
                        {{ $item['title'] }}
                        <span class="d-inline-block float-right mr-1"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                      </button>
                    </div>
                    <div id="collapse{{ $item['id'] }}" class="sub-menu collapse" aria-labelledby="heading{{ $item['id'] }}" data-parent="#sidebarAccordion">
                      @foreach ($item['children'] as $child)
                        @if (!count($child['children']))
                          <a href="{{ $child['url'] }}" title="{{ $child['title'] }}" class="d-block py-2" >
                            <span class="text-body">{{ $child['title'] }}</span>
                          </a>
                        @else
                          <p class="child-child-menu-title text-body">{{ $child['title'] }}</p>
                          <ul class="child-child-menu">
                            @foreach ($child['children'] as $child_child_item)
                              <li>
                                <a href="{{ $child_child_item['url'] }}" title="{{ $child_child_item['title'] }}">
                                  {{ $child_child_item['title'] }}
                                </a>
                              </li>
                            @endforeach
                          </ul>
                        @endif
                      @endforeach
                    </div>
                  </div>
                @endif
              @endforeach
            </div>
          @endif
          <ul class="nav">
            @if ( WC()->cart->get_cart_contents_count() )
              <li class="menu-item">
                <a href="javascript:void(0);" class="btn-toggle-cart" style="border-top: none;">Cart {!! ( WC()->cart->get_cart_contents_count() ) ? '<span class="cart-count">(' . WC()->cart->get_cart_contents_count() . ')</span>' : '' !!}</a>
              </li>
              <li class="sweep-to-right">
                <a href="{{ get_site_url() }}/checkout" >Checkout</a>
              </li>
            @endif
            @if ( ! is_user_logged_in() )
              <li class="menu-item">
                <a href="#login" title="Login" data-toggle="modal" data-target="#loginModal" style="border-top: none;" >Login</a>
              </li>
              {{-- <li class="menu-item">
                <a href="#register" title="Register" data-toggle="modal" data-target="#registerModal" >Register</a>
              </li> --}}
            @else
              <li class="menu-item">
                <a href="{{ get_site_url() }}/my-account" title="My Account" style="border-top: none;" >My Account</a>
              </li>
            @endif
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
