{{--
  Template Name: About
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page.banner')
    @include('modules.about.mission')
    @include('modules.about.our-story')
    @include('modules.about.instagram')
  @endwhile
@endsection
