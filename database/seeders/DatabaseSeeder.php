<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run() {
    // create 1 user and assign him posts
    $user1 = User::factory()->create(['name' => 'John Doe']);
    $user2 = User::factory()->create(['name' => 'Foo Bar']);

    Post::factory(4)->create([
        'user_id' => $user2->id,
    ]);


    Post::factory(2)->create([
        'user_id' => $user1->id,
    ]);
  }
}
