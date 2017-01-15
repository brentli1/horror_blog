<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use App\Http\Requests;
use App\Movie;
use App\Review;
use App\Image;

class MoviesController extends Controller
{
  public function index() {
    $movies = Movie::all();

    foreach($movies as $movie) {
      $featured_img = $movie->images->where('featured', 1)->first()['path'];
      $movie->setAttribute('path', "/".$featured_img);
    }

    return view('movies/index', [
      'movies' => $movies
    ]);
  }

  public function show($id) {
    $movie = Movie::find($id);
    $tags = Movie::find($id)->tags()->get();
    $reviews = Movie::find($id)->reviews()->get();

    return view('movies/show', [
      'movie' => $movie,
      'tags' => $tags,
      'reviews' => $reviews
    ]);
  }

  // ADMIN FUNCTIONALITY
  public function movieCreate(Request $request) {
    $this->validate($request, [
      'title' => 'required|unique:movies',
      'release_date' => 'required'
    ]);

    $movie = new Movie;
    $movie->title = $request->title;
    $movie->release_date = Carbon::createFromFormat('Y-m-d', $request->release_date);
    $movie->save();
    
    // Attach tags to movie
    $movie->tags()->attach($request->tags);

    if($request->file('img')) {
      app('App\Http\Controllers\ImagesController')->saveNewImage($movie->id, $request->file('img'));
    }

    // Create 2 blank reviews
    $reviews = [
      ['user_id' => 1, 'movie_id' => $movie->id],
      ['user_id' => 2, 'movie_id' => $movie->id]
    ];

    foreach($reviews as $review){
      Review::create($review);
    }

    // Redirect to movies landing page
    return Redirect('/admin/movies');
  }

  public function movieEdit($id, Request $request) {
    $this->validate($request, [
      'title' => 'required|unique:movies,title,'.$id
    ]);

    $movie = Movie::find($id);
    $movie->title = $request->title;
    $movie->release_date = Carbon::createFromFormat('Y-m-d', $request->release_date);
    $movie->save();

    if($request->file('img')) {
      app('App\Http\Controllers\ImagesController')->saveNewImage($movie->id, $request->file('img'));
    }

    $movie->tags()->detach();
    $movie->tags()->attach($request->tags);
    
    return Redirect::back();
  }

  public function movieDelete($id) {
    $movie = Movie::find($id);
    app('App\Http\Controllers\ImagesController')->removeAllImages($movie->id);
    $movie->tags()->detach();
    $movie->delete();
  }
}
