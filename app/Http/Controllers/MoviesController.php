<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use App\Http\Requests;
use App\User;
use App\Movie;
use App\Review;
use App\Image;

class MoviesController extends Controller
{
  /**
  * Gets the featured image and returns the movies index view with data
  */
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

  /**
  * Shows the selected movies show template with data
  */
  public function show($id) {
    $movie = Movie::find($id);
    $users = User::all();

    // Get related content
    $tags = $movie->tags->modelKeys();
    $relatedMovies = Movie::whereHas('tags', function ($q) use ($tags) {
        $q->whereIn('tags.id', $tags);
    })->where('id', '<>', $movie->id)->get();

    return view('movies/show', [
      'movie' => $movie,
      'users' => $users,
      'related' => $relatedMovies
    ]);
  }

  /***** ADMIN FUNCTIONALITY *****/

  /**
  * Creates new movie with request data
  */
  public function movieCreate(Request $request) {
    $this->validate($request, [
      'title' => 'required|unique:movies',
      'release_date' => 'required'
    ]);

    $movie = new Movie;
    $movie->title = $request->title;
    $movie->synopsis = $request->synopsis;
    $movie->release_date = Carbon::createFromFormat('Y-m-d', $request->release_date);
    $movie->save();
    
    // Attach tags to movie
    $movie->tags()->attach($request->tags);

    // Use ImagesController to add images to movie
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

  /**
  * Edits existing movie with request data
  */
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

  /**
  * Removes the movie from the database and detaches all associated data
  */
  public function movieDelete($id) {
    $movie = Movie::find($id);
    app('App\Http\Controllers\ImagesController')->removeAllImages($movie->id);
    $movie->tags()->detach();
    $movie->delete();
  }
}
