@extends('layouts.site')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">Tags</div>
          @each('site.components.tag', $tags, 'tag')
          <div class="panel-body">
            Tags Landing Page
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection