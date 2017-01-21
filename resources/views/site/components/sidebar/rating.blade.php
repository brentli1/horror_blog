<section class="rating">
  <img class="rating__image" src="{{$user->avatar_url}}" alt="{{$user->name}}">
  <div class="rating__name">{{$user->name}} thinks you should...</div>
  <div class="rating__score">
    @if ($rating == 1)
      WATCH
    @else
      NOT WATCH
    @endif
  </div>
</section>