<section class="author">
  <img class="author__image" src="{{$user->avatar_url}}" alt="{{$user->name}}">
  <div class="author__content-wrapper">
    <div class="author__blurb">{{$user->blurb}}</div>
    <span class="author__name">
      <span>{{$user->name}}<span class="author__name-extra"> Says...</span></span>
      <span class="author__date">Updated: {{$date->format('F, d Y')}}</span>
    </span>
  </div>
</section>