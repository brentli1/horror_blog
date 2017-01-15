<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Image;

class ImagesController extends Controller
{
  public function saveNewImage($movie_id, $file) {
    // Save Image to movie
    $imgPath = $file->store('public/images');
    $newImg = new Image;
    $newImg->movie_id = $movie_id;
    $newImg->path = $imgPath;
    $newImg->save();
  }

  public function removeAllImages($movie_id) {
    $images = Image::where('movie_id', $movie_id);

    foreach($images as $image) {
      $image->delete();
    }
  }

  public function removeImage($image_id) {
    $image = Image::find($image_id);
    Storage::delete($image->path);
    $image->delete();

    return redirect()->back();
  }

  public function featuredImage($image_id, $movie_id) {
    $image = Image::find($image_id);

    $others = Image::where('movie_id', $movie_id)->get();
    foreach($others as $img) {
      $img->featured = 0;
      $img->save();
    }

    $image->featured = 1;
    $image->save();

    return redirect()->back();
  }
}
