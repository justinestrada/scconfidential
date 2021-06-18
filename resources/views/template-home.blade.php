{{--
  Template Name: Home
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('modules.home.hero-carousel')
    @include('modules.home.mission')
    @include('modules.home.trending')
    @include('modules.home.best-sellers')
    @include('modules.home.latest-post')
    @include('modules.home.social')
    {{-- @include('partials.content-page') --}}
  @endwhile
@endsection
