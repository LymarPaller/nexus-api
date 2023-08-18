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
            Post::factory(2)->hasComments(3)->hasLikes(2)
        )
        ->hasFollowers(2)
        ->create();

        User::factory()
        ->has(
            Post::factory(3)->hasComments(1)->hasLikes(1)
        )
        ->hasFollowers(1)
        ->create([
            'name' => 'Mark Suckerbig',
            'username' => 'touchmenot',
            'email' => 'mark@example.com',
            'password' => 'override',
            'profile_photo' => 'https://images.pexels.com/photos/895259/pexels-photo-895259.jpeg?auto=compress&cs=tinysrgb&w=600',
            'cover_photo' => 'https://images.pexels.com/photos/307008/pexels-photo-307008.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
            'city' => 'Bacolod',
            'websites' => 'Instagram.com',
            'introduction' => 'Hello World',
            'company' => 'KodeGo',
        ]);
    }
}
