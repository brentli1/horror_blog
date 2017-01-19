@extends('layouts.admin')

@section('content')
<h1 class="admin__title">Edit Movie: {{$movie->title}}</h1>

<form class="admin-form" method="POST" files="true" action="/admin/movies/{{$movie->id}}" accept-charset="UTF-8" enctype="multipart/form-data">
  {{ csrf_field() }}

  <div class="admin-form__input-wrapper">
    <label class="admin-form__label" for="title">Movie Title</label>
    <input class="admin-form__input" name="title" type="text" value="{{$movie->title}}">
  </div>
  
  <div class="admin-form__input-wrapper">
    <label class="admin-form__label" for="release_date">Release Date</label>
    <input class="admin-form__input" name="release_date" type="date" value="{{$movie->release_date}}">
  </div>

  <div class="admin-form__input-wrapper">
    <label class="admin-form__label" for="synopsis">Movie Synopsis</label>
    <input class="admin-form__input" name="synopsis" type="text" value="{{$movie->synopsis}}">
  </div>

  <div class="admin-form__input-wrapper">
    <label class="admin-form__label" for="tags">Movie Tags</label>
    <select class="admin-form__select" multiple="multiple" name="tags[]" id="tags">
      @foreach($allTags as $tag)
        <option value="{{$tag->id}}" @if($tag->selected == 'true') selected @endif">{{$tag->name}}</option>
        }
      @endforeach
    </select>
  </div>

  <div class="admin-form__input-wrapper">
    <label class="admin-form__label" for="img">Add Image</label>
    <input class="admin-form__input" type="file" name="img">
  </div>

  <input class="admin-form__submit" type="submit" value="Save Movie">

  @if ($errors->has('title'))
  <span class="help-block">
    <strong>{{ $errors->first('title') }}</strong>
  </span>
  @endif
</form>

<h1 class="admin__title">Edit Your Review</h1>
<form class="admin-form" method="POST" action="/admin/reviews/{{$review[0]->id}}" accept-charset="UTF-8">
  {{ csrf_field() }}

  <div class="admin-form__input-wrapper">
    <label class="admin-form__label" for="score">Movie Score</label>
    <input class="admin-form__input" name="score" type="number" value="{{$review[0]->score}}">
  </div>
  
  <div class="admin-form__input-wrapper admin-form__textarea-wrapper">
    <label class="admin-form__label" for="body">Review</label>
    <textarea class="admin-form__input admin-form__textarea" name="body">{{$review[0]->body}}</textarea>
  </div>

  <input class="admin-form__submit" type="submit" value="Save Review">

  @if ($errors->has('title'))
  <span class="help-block">
    <strong>{{ $errors->first('title') }}</strong>
  </span>
  @endif
</form>

<h1 class="admin__title">Current Images</h1>
<ul class="admin__image-list">
  @foreach($movie->images as $image)
  <li class="admin__image-item">
    <div class="admin__image-wrapper">
      <img src="/{{$image->path}}" alt="{{$image->id}}" class="admin__image @if ($image->featured == 1) admin__image-featured @endif">
      @unless ($image->featured == 1)
        <a class="admin__image-action" href="/admin/images/{{$image->id}}/featured/{{$movie->id}}">Make Featured</a>
      @endunless
      <a class="admin__image-action" href="/admin/images/{{$image->id}}/delete">Remove Image</a>
    </div>
    <div class="admin__image-info">
      <input class="admin-form__input" type="text" value="/{{$image->path}}">
    </div>
  </li>
  @endforeach
</ul>
@stop
