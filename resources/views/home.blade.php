@extends('layouts.app')

@section('content')
  <section id="blog" class="bg-dark-white py-5">
    <div class="container">
      @include('partials.blog.articles')
      @include('partials.pagination')
    </div>
  </section>
@endsection
