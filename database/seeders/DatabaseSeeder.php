<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
            //     'name' => 'Test User',
            //     'email' => 'test@example.com',
            // ]);

            User::truncate();
            Category::truncate();
            Post::truncate();

            $user = User::factory()->create();

            $personal = Category::create([
                'name' => 'Personal',
                'slug' => 'personal'
            ]);

            $business = Category::create([
                'name' => 'Business',
                'slug' => 'business'
            ]);

            $leisure = Category::create([
                'name' => 'Leisure',
                'slug' => 'leisure'
            ]);

            Post::create([
                'user_id' => $user->id,
                'category_id' => $personal->id,
                'title' => 'Personal post one',
                'slug' => 'personal-post-one',
                'excerpt' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>',
                'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'
            ]);
            Post::create([
                'user_id' => $user->id,
                'category_id' => $business->id,
                'title' => 'Business post one',
                'slug' => 'business-post-one',
                'excerpt' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>',
                'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'
            ]);
            Post::create([
                'user_id' => $user->id,
                'category_id' => $leisure->id,
                'title' => 'Leisure post one',
                'slug' => 'leisure-post-one',
                'excerpt' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>',
                'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'
              ]);
    }
}
