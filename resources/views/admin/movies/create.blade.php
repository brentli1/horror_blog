@extends('layouts.admin')

@section('content')
  <h1 class="admin__title">Create Movie</h1>
  <form class="admin-form" method="POST" files="true" action="/admin/movies/create" accept-charset="UTF-8" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="admin-form__input-wrapper">
      <label class="admin-form__label" for="title">Movie Title</label>
      <input class="admin-form__input" name="title" type="text">
    </div>

    <div class="admin-form__input-wrapper">
      <label class="admin-form__label" for="release_date">Release Date</label>
      <input class="admin-form__input" name="release_date" type="date">
    </div>

    <div class="admin-form__input-wrapper">
      <label class="admin-form__label" for="tags">Movie Tags</label>
      <select class="admin-form__select" multiple="multiple" name="tags[]" id="tags">
        @foreach($tags as $tag)
          <option value="{{$tag->id}}">{{$tag->name}}</option>
        @endforeach
      </select>
    </div>

    <div class="admin-form__input-wrapper">
      <label class="admin-form__label" for="img">Images</label>
      <input class="admin-form__input" type="file" name="img">
    </div>

    <input class="admin-form__submit" type="submit" value="Create Movie">

    @if ($errors->has('title'))
    <span class="help-block">
      <strong>{{ $errors->first('title') }}</strong>
    </span>
    @endif
    
  </form>
@stop