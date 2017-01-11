<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
