<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tag;
use App\Movie;

class TagsController extends Controller
{
  public function index() {
    $tags = Tag::all();
    
    return view('tags/index', [
      'tags' => $tags
    ]);
  }

  public function show($id) {
    $tag = Tag::find($id);
    $movies = Tag::find($id)->movies()->get();

    return view('tags/show', [
      'tag' => $tag,
      'movies' => $movies
    ]);
  }
}
