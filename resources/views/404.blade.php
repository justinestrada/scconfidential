
@extends('layouts.app')

@section('content')
  @include('partials.page.banner')
  <div class="container mb-5">
    <div class="row">
      <div class="col">
        <div class="alert alert-info mb-0">
          <p class="text-info mb-0">{{ __('Sorry, but the page you were trying to view does not exist.', 'sage') }}</p>
        </div>
      </div>
    </div>
  </div>
@endsection
