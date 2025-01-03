<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('posts')->insert([
        'user_id' => 1,
        'title' => 'first post',
        'body' => 'first post body',
        'created_at' => now(),
        'updated_at' => now()
      ]);
    }
}
