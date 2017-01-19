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

    return view('tags/show', [
      'tag' => $tag
    ]);
  }

  /***** ADMIN FUNCTIONALITY *****/

  /**
  * Creates new tag with request data
  */
  public function tagCreate(Request $request) {
    $this->validate($request, [
      'name' => 'required|unique:tags'
    ]);

    $tag = new Tag;
    $tag->name = $request->name;
    $tag->save();
    
    return Redirect('/admin/tags');
  }

  /**
  * Edits existing tag with request data
  */
  public function tagEdit($id, Request $request) {
    $this->validate($request, [
      'name' => 'required|unique:tags,name,'.$id
    ]);

    $tag = Tag::find($id);
    $tag->name = $request->name;
    $tag->save();
    
    return Redirect('/admin/tags');
  }

  /**
  * Removes tag and detaches all associated data
  */
  public function tagDelete($id) {
    $tag = Tag::find($id);
    $tag->movies()->detach();
    $tag->delete();
  }
}
