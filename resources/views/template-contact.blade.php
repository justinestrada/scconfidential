{{--
  Template Name: Contact
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page.banner')
    @include('partials.content-page')
    @include('modules.contact.faq')
  @endwhile
@endsection
