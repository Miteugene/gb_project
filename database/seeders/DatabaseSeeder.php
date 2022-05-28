<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use Database\Factories\NewsFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        Source::factory(5)->create();
        Category::factory(10)->create();
        News::factory(100)->create();
    }
}
