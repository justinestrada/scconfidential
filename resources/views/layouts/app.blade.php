
<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body id="body-wrap" @php body_class('d-flex') @endphp>
    @php do_action('get_header') @endphp
    @include('partials.header')
    <main id="page-content-wrap" class="main" role="document" style="min-width: 100vw;">
      @yield('content')
      @php do_action('get_footer') @endphp
      @include('partials.toast.cookie-policy')
      @include('partials.footer')
    </main>
    @include('partials.modal.age')
    @include('partials.modal.newsletter')
    @if ( ! is_user_logged_in() )
      {{-- @include('partials.modal.register') --}}
      @include('partials.modal.login')
    @endif
    @php wp_footer() @endphp
  </body>
</html>
