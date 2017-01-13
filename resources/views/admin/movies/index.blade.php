@extends('layouts.admin')

@section('content')
<h1 class="admin__title">Movies</h1>
<a class="admin__button" href="/admin/movies/create">Create New Movie</a>
<ul class="admin__list">
  @foreach($movies as $movie)
    <li class="admin__list-item">
    <span>{{$movie->title}}</span>
    <span>
      <a class="admin__list-link" href="/admin/movies/{{$movie->id}}">Edit Movie</a>
      <a class="remove-movie admin__list-link" data-movie-id="{{$movie->id}}" href="">Remove Movie</a>
    </span>
    </li>
  @endforeach
</ul>
@endsection

@push('js_footer')
  <script>
    $('a.remove-movie').on('click', function(e) {
      e.preventDefault();
      $.ajax({
        url: '/admin/movies/delete/' + $(this).data('movie-id'),
        type: 'DELETE',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(result) {
          location.reload();
        }
      });
    });
  </script>
@endpush