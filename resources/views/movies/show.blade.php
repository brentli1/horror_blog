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
        @if ($review->created_at != $review->updated_at)
          @include ('site/components/author', ['user' => $users->find($review->user_id), 'date' => $review->updated_at])
          <div class="reviews__review-body">
            {!!$review->body!!}
          </div>
        @endif
      @endforeach
    </div>
  </div>
@endsection

@section('sidebar')
<div class="sidebar">
  <div class="sidebar__section">
    <h1 class="sidebar__title">Watch?</h1>
    @foreach($movie->reviews as $review)
      @if ($review->created_at != $review->updated_at)
        @include ('site/components/sidebar/rating', ['user' => $users->find($review->user_id), 'rating' => $review->score])
      @endif
    @endforeach
  </div>
  <div class="sidebar__section">
    <h1 class="sidebar__title">Related Reviews</h1>
    @include ('site/components/sidebar/related', ['related' => $related])
  </div>
</div>
@stop