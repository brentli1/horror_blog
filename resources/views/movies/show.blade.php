@extends('layouts.site')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">Movie: {{$movie->title}}</div>
          @foreach($tags as $tag)
          <li>{{$tag->name}}</li>
          @endforeach
          <div class="panel-body">
            Movie Landing Page
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection