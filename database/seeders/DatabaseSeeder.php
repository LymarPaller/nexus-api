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
        Post::factory(5)->hasLikes(2);

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
        ->hasFollowers(10)
        ->create([
            'name' => 'Wanda Zurbano',
            'username' => 'wandaring',
            'email' => 'wanda@example.com',
            'password' => 'override',
            'profile_photo' => 'https://images.pexels.com/photos/18025212/pexels-photo-18025212/free-photo-of-wanda-the-wonderdog.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
            'cover_photo' => 'https://images.pexels.com/photos/307008/pexels-photo-307008.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
            'city' => 'Raining in Manila',
            'websites' => 'Instagram.com',
            'introduction' => 'Pawsitively picture purrfect!',
            'company' => 'KodeGo',
        ]);
    }
}
