<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Image;

class ImagesController extends Controller
{
  /**
  * Called to save a new image to an existing movie
  */
  public function saveNewImage($movie_id, $file) {
    // Save Image to movie
    $imgPath = $file->store('public/images');
    $newImg = new Image;
    $newImg->movie_id = $movie_id;
    $newImg->path = $imgPath;
    $newImg->save();
  }

  /**
  * Removes all images from a movie in the images table
  */
  public function removeAllImages($movie_id) {
    $images = Image::where('movie_id', $movie_id)->get();

    foreach($images as $image) {
      Storage::delete($image->path);
      $image->delete();
    }
  }

  /**
  * Removes a single image from storage and the images table
  */
  public function removeImage($image_id) {
    $image = Image::find($image_id);
    Storage::delete($image->path);
    $image->delete();

    return redirect()->back();
  }

  /**
  * Resets and assigns new featured image for a movie
  */
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
