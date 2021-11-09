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
    $user = User::factory()->create(['name' => 'John Doe']);

    Post::factory(4)->create([
        'user_id' => $user->id,
    ]);
  }
}
