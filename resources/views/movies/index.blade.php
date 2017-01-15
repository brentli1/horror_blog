@extends('layouts.site')

@section('content')
<div class="movies container">
  <ul class="movies__list">
    @foreach($movies as $movie)
      <li class="movies__list-item">
        <a class="movies__item-wrapper" href="/movies/{{$movie->id}}">
          <div class="movies__image-container" style="background-image: url({{$movie->path}});"></div>
          <div class="movies__info">
            <div class="movies__title">{{$movie->title}}</div>
            <div class="movies__date">Updated: {{$movie->updated_at->format('l, F Y')}}</div>
          </div>
        </a>
      </li>
    @endforeach
  </ul>
</div>
@stop