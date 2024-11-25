<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;
class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blog::create([
            'title' => 'mi post',
            'description' => 'este es mi primer post',
            'user_id' => '1'
        ]);
        Blog::create([
            'title' => 'mi post',
            'description' => 'este es mi segundo post',
            'user_id' => '1'
        ]);
    }
}
