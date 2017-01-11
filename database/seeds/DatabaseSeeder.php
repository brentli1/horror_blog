<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Tag;
use App\Movie;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->call(TagsTableSeeder::class);
      $this->call(MoviesTableSeeder::class);
    }
}

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('tags')->delete();

      $tags = [
          ['name' => 'Slasher'],
          ['name' => 'Gory']
      ];

      foreach($tags as $tag){
        Tag::create($tag);
      }
    }
}

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('movies')->delete();

      $movies = [
          ['title' => 'Halloween', 'release_date' => Carbon::createFromDate(1978, 10, 25)],
          ['title' => 'Friday the 13th', 'release_date' => Carbon::createFromDate(1980, 5, 9)]
      ];

      foreach($movies as $movie){
        Movie::create($movie);
      }
    }
}
