{{--
  Template Name: Splash
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('modules.splash.content')
  @endwhile
@endsection
