<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user =  User::factory()->create([
            'name'=>'John Doe'
        ]);
        $post = Post::factory(12)->create([
            'user_id'=>$user->id
        ]);
        Comment::factory(10)->create(
        );
    }
}
