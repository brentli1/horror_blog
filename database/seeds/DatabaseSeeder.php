<?php

use Illuminate\Database\Seeder;
use App\Tag;

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
