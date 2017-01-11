@extends('layouts.site')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">Tag {{$tag->name}}</div>
          @foreach($movies as $movie)
            <li>{{$movie->title}}</li>
          @endforeach
          <div class="panel-body">
            Tags Landing Page
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection