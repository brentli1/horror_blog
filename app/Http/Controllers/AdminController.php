<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Tag;
use App\Movie;

class AdminController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index() { return view('admin/index'); }

  // ADMIN TAGS METHODS
  public function tags() {
    $tags = Tag::all();
    return view('admin/tags/index', [
      'tags' => $tags
    ]); 
  }

  public function showTagCreate() {
    return view('admin/tags/create');
  }

  public function showTagEdit($id) {
    $tag = Tag::find($id);

    return view('admin/tags/edit', [
      'tag' => $tag
    ]);
  }

  // ADMIN MOVIES METHODS
  public function movies() {
    $movies = Movie::all();

    return view('admin/movies/index', [
      'movies' => $movies
    ]); 
  }

  public function showMovieCreate() {
    $tags = Tag::all();
    return view('admin/movies/create', [
      'tags' => $tags
    ]);
  }

  public function showMovieEdit($id) {
    $movie = Movie::find($id);
    $movie->release_date = date('Y-m-d', strtotime($movie->release_date));
    $allTags = Tag::all();
    $tags = $movie->tags()->get();
    $reviews = $movie->reviews()->get();

    if(count($tags) !== 0) {
      foreach($allTags as $tag){
        foreach($tags as $subTag) {
          if($subTag->id == $tag->id) {
            $tag->setAttribute('selected', 'true');
            break;
          }
        }
      }
    }

    return view('admin/movies/edit', [
      'movie' => $movie,
      'allTags' => $allTags,
      'reviews' => $reviews
    ]);
  }
}
