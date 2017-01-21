<section class="related">
  <ul class="related__items">
    @foreach($related->sortByDesc('updated_at') as $item)
      <li class="related__item">
        <a href="/movies/{{$item->id}}" class="related__item-link">
          {{$item->title}}
        </a>
      </li>
    @endforeach
  </ul>
</section>