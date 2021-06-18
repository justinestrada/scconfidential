{{--
  Template Name: Only Content
--}}

@extends('layouts.app')

@section('content')
<style>
body {
  padding-top: 0 !important;
  margin-top: 0 !important;
}
#announcement,
#header,
footer {
  display: none;
}
</style>
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page.banner')
    @include('partials.content-page')
  @endwhile
@endsection
