@extends('layouts.site')

@section('content')
  <div class="reviews content-container">
    <h1 class="reviews__title">{{$movie->title}}</h1>
    <div class="reviews__synopsis">{{$movie->synopsis}}</div>
      @foreach($movie->tags as $tag)
      <li>{{$tag->name}}</li>
      @endforeach
        {!!$movie->reviews->first()->body!!}
  </div>
@endsection

@section('sidebar')
<div class="sidebar reviews-sidebar">
  
</div>
@stop