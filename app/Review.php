<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redirect;

class Review extends Model
{
  protected $fillable = ['user_id', 'movie_id'];
}
