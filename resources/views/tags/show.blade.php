@extends('layouts.site')

@section('content')
<div class="tag container">
  <h1 class="tag__section-title">{{$tag->name}}</h1>
  <ul class="tag__list">
    @foreach($tag->movies->sortByDesc('updated_at') as $movie)
      <li class="tag__list-item">
        <a class="tag__item-wrapper" href="/movies/{{$movie->id}}">
          <div class="tag__image-container" style="background-image: url({{$movie->path}});"></div>
          <div class="tag__info">
            <div class="tag__title">{{$movie->title}}</div>
            <div class="tag__date">Updated: {{$movie->updated_at->format('F, d Y')}}</div>
          </div>
        </a>
      </li>
    @endforeach
  </ul>
</div>
@stop