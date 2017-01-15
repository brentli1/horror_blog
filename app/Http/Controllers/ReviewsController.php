<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Review;

class ReviewsController extends Controller
{
  public function updateReview($review_id, Request $request) {
    $review = Review::find($review_id);

    $review->body = $request->body;
    $review->score = $request->score;

    $review->save();

    return Redirect::back();
  }
}
