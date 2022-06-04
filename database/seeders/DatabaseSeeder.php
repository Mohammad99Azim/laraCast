<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Post::truncate();
        Category::truncate();

        $user = User::factory()->create();

      $cate = Category::create([
          'name' => 'personal',
          'slug' => 'personal-cat'
      ]);

        Category::create([
            'name' => 'family',
            'slug' => 'family-cat'
        ]);

        Category::create([
            'name' => 'work',
            'slug' => 'work-cat'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $cate->id,
            'title' => 'My First Post',
            'slug' => 'my-first-post',
            'excerpt' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'body' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
             Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum'
        ]);
    }
}
