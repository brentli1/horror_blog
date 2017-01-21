@extends('layouts.site')

@section('content')
  <div class="tag container">
    <div class="tag__section-title">Tags</div>
    <ul class="tag__tag-items">
      @foreach($tags as $tag)
        <li class="tag__tag-item">
          <a class="tag__tag-link" href="/tags/{{$tag->id}}">
            {{$tag->name}}
          </a>
        </li>
      @endforeach
    </ul>
  </div>
@endsection