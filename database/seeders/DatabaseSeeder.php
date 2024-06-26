<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::truncate();
        Post::truncate();
        Category::truncate();

        $user = User::factory(1)->create();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        $family = Category::create([
            'name' => 'Family',
            'slug' => 'family'
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);

        Post::create([
            'user_id' => $user->first()->id,
            'category_id' => $personal->id,
            'slug' => 'My-First-Post',
            'title' => 'My First Post',
            'excerpt' => 'My First Post excerpt',
            'body' => 'My First Post body'
        ]);

        Post::create([
            'user_id' => $user->first()->id,
            'category_id' => $family->id,
            'slug' => 'My-Second-Post',
            'title' => 'My Second Post',
            'excerpt' => 'My Second Post excerpt',
            'body' => 'My Second Post body'
        ]);

        Post::create([
            'user_id' => $user->first()->id,
            'category_id' => $work->id,
            'slug' => 'My-Third-Post',
            'title' => 'My Third Post',
            'excerpt' => 'My Third Post excerpt',
            'body' => 'My Third Post body'
        ]);
    }
}
