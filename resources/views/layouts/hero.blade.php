
<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body id="body-wrap" @php body_class('d-flex full-page') @endphp>
    @php do_action('get_header') @endphp
    @include('partials.header')
    @include('partials.header.right-sidebar')
    <main id="page-content-wrap" class="main hero-layout" role="document">
      @include('partials.post.hero')
      <div class="section">
        @yield('content')
        @php do_action('get_footer') @endphp
        @include('partials.footer')
      </div>
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
