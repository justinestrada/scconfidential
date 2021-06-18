
<div class="row">
  @while(have_posts()) @php the_post() @endphp
    <div class="col-lg-4">
      @include('partials.blog.content-single')
    </div>
  @endwhile
</div>
