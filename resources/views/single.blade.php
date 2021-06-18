@extends('layouts.hero')

@section('content')
  @include('partials.post.breadcrumb')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-single')
  @endwhile
@endsection
