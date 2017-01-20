@extends('layouts.site')

@section('content')
  <div class="reviews content-container">
    <h1 class="reviews__title">{{$movie->title}}</h1>
    <div class="reviews__synopsis">{{$movie->synopsis}}</div>
    <ul class="reviews__tags">
      @foreach($movie->tags as $tag)
      <li class="reviews__tag-item"><a href="/tags/{{$tag->id}}">{{$tag->name}}</a></li>
      @endforeach
    </ul>
    <div class="reviews__reviews-wrapper">
      @foreach($movie->reviews as $review)
      @include ('site/components/author', ['user' => $users->find($review->user_id)])
      <div class="reviews__review-body">
        {!!$review->body!!}
      </div>
      @endforeach
    </div>
  </div>
@endsection

@section('sidebar')
<div class="sidebar reviews-sidebar">
  
</div>
@stop