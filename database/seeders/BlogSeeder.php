<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        Blog::truncate();
        DB::table('blog_category')->truncate();

        $posts = Blog::factory()->count(20)->create();
        foreach (Category::get() as $key => $category) {

            $category->posts()->attach(
                $posts->random(3)->pluck('id')
            );
        }
    }
}
