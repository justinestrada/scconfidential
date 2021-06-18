
<article @php post_class() @endphp>
  <div class="container">
    <div class="row">
      <div class="col">
        <h1 class="entry-title">{!! get_the_title() !!}</h1>
        @include('partials/entry-meta')
      </div>
    </div>
    <div class="row mb-5">
      <div class="col">
        <div class="entry-content">
          @php the_content() @endphp
        </div>
      </div>
    </div>
    <div class="row mb-5">
      <div class="col">
        @if ( comments_open() || get_comments_number() )
          @php comments_template(); @endphp
        @endif
      </div>
    </div>
    <div class="row mb-5">
      <div class="col">
        @include('partials.post.prev-next')
      </div>
    </div>
  </div>
</article>

