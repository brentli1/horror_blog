@extends('layouts.admin')

@section('content')
<h1 class="admin__title">Edit Movie: {{$movie->title}}</h1>

<form class="admin-form" method="POST" action="/admin/movies/{{$movie->id}}" accept-charset="UTF-8">
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
    <label class="admin-form__label" for="tags">Movie Tags</label>
    <select class="admin-form__select" multiple="multiple" name="tags" id="tags">
      @foreach($allTags as $tag)
        <option value="{{$tag->id}}" @if($tag->selected == 'true') selected @endif">{{$tag->name}}</option>
        }
      @endforeach
    </select>
  </div>

  <input class="admin-form__submit" type="submit" value="Save Movie">

  @if ($errors->has('title'))
  <span class="help-block">
    <strong>{{ $errors->first('title') }}</strong>
  </span>
  @endif
</form>
@stop
