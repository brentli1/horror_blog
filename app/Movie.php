<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
  public function tags() {
    return $this->belongsToMany('App\Tag', 'movie_tags');
  }

  public function reviews() {
    return $this->hasMany('App\Review');
  }

  public function images() {
    return $this->hasMany('App\Image');
  }
}
