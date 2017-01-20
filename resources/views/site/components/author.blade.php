<section class="author">
  <img class="author__image" src="{{$user->avatar_url}}" alt="{{$user->name}}">
  <div class="author__content-wrapper">
    <span class="author__name">
      {{$user->name}}
      <span class="author__name-extra"> Says...</span>
    </span>
    <div class="author__blurb">{{$user->blurb}}</div>
  </div>
</section>