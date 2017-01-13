@extends('layouts.admin')

@section('content')
<h1 class="admin__title">Tags</h1>
<a class="admin__button" href="/admin/tags/create">Create New Tag</a>
<ul class="admin__list">
  @foreach($tags as $tag)
    <li class="admin__list-item">
    <span>{{$tag->name}}</span>
    <span>
      <a class="admin__list-link" href="/admin/tags/{{$tag->id}}">Edit Tag</a>
      <a class="remove-tag admin__list-link" data-tag-id="{{$tag->id}}" href="">Remove Tag</a>
    </span>
    </li>
  @endforeach
</ul>
@endsection

@push('js_footer')
  <script>
    $('a.remove-tag').on('click', function(e) {
      e.preventDefault();
      console.log('hello');
      $.ajax({
        url: '/admin/tags/delete/' + $(this).data('tag-id'),
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