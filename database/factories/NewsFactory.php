<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Source;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id'   => Category::get()->random()->id,
            'source_id'     => Source::get()->random()->id,
            // slug в модели
            'title'         => $this->faker->sentence(5),
            'text'          => $this->faker->text(),
            'image'         => $this->faker->imageUrl(),
            'author'        => $this->faker->firstName(),
        ];
    }
}
