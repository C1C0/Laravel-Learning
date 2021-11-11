<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
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
        // create 4 user and assign them posts
        $users = [];
        $names = ['John Doe', 'Foo Bar'];
        $numberOfUsers = random_int(6, 10);

        for($i = 0; $i < $numberOfUsers; $i++){
            if($names[$i] ?? false){
                $users[] = User::factory()->create(['name' => $names[$i]]);
            }else{
                $users[] = User::factory()->create();
            }
        }

        foreach ($users as $user){
            Post::factory(random_int(2, 6))->create(
                [
                    'user_id' => $user->id,
                ]
            );
        }
    }
}
