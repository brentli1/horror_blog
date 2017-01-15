@extends('layouts.site')

@section('content')
  <div class="reviews container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">Movie: {{$movie->title}}</div>
          @foreach($tags as $tag)
          <li>{{$tag->name}}</li>
          @endforeach
          <div class="panel-body">
            {!!$movie->reviews->first()->body!!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection