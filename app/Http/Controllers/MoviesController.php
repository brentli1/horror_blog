<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;
use App\Movie;

class MoviesController extends Controller
{
  public function index() {
    $movies = Movie::all();

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
    
    return Redirect('/admin/movies');
  }

  public function movieDelete($id) {
    $movie = Movie::find($id);
    $movie->tags()->detach();
    $movie->delete();
  }
}
