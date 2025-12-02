<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function Symfony\Component\Clock\now;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('posts')->insert(
            [
                [
                    'user_id' => 1,
                    'content' => fake()->text(),
                    'image_url' => 'https://placehold.co/400',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'user_id' => 1,
                    'content' => fake()->text(),
                    'image_url' => 'https://placehold.co/400',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'user_id' => 2,
                    'content' => fake()->text(),
                    'image_url' => 'https://placehold.co/400',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]
        );
    }
}
