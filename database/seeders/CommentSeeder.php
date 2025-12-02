<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comments')->insert([
            [
                'user_id' => 1,
                'post_id' => 2,
                'comment_content' => fake()->sentence(),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'user_id' => 2,
                'post_id' => 3,
                'comment_content' => fake()->sentence(),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'user_id' => 1,
                'post_id' => 3,
                'comment_content' => fake()->sentence(),
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
