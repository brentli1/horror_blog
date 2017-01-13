@extends('layouts.admin')

@section('content')
  <h1 class="admin__title">Edit Tag: {{$tag->name}}</h1>
  <form class="admin-form" method="POST" action="/admin/tags/{{$tag->id}}" accept-charset="UTF-8">
    {{ csrf_field() }}

    <div class="admin-form__input-wrapper">
      <label class="admin-form__label" for="name">Tag Name</label>
      <input class="admin-form__input" name="name" type="text" value="{{$tag->name}}">
    </div>

    <input class="admin-form__submit" type="submit" value="Save Tag">

    @if ($errors->has('name'))
    <span class="help-block">
      <strong>{{ $errors->first('name') }}</strong>
    </span>
    @endif
  </form>
@stop