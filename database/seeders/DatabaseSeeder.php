<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comment;
use App\Models\Follower;
use App\Models\Like;
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
        User::factory(5)
        ->has(
            Post::factory(2)->hasComments(2)->hasLikes(2)
        )
        ->hasFollowers(5)
        ->create();

        User::factory()
        ->create([
            'name' => 'Mark Suckerbig',
            'username' => 'touchmenot',
            'email' => 'mark@example.com',
            'password' => 'override',
            'profile_photo' => 'sampleimage.com',
            'cover_photo' => 'sampleimage.com',
            'city' => 'Bacolod',
            'websites' => 'Facebook.com',
            'introduction' => 'Hello World',
            'company' => 'KodeGo',
        ]);
    }
}
