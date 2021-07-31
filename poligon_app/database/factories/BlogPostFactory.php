<?php

namespace Database\Factories;

use App\Models\BlogPost;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogPostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogPost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title =  $this->faker->sentence(rand(3,8), true);
        $txt =  $this->faker->realText(rand(1000, 4000));
        $is_published = rand(1, 5) > 1;
        $timestamp =  $this->faker->dateTimeBetween('-2 month', '-1 month');

        $data = [
            'category_id' => rand(1, 11),
            'user_id' => rand(1, 5) == 5 ? 1 : 2,
            'slug' => Str::slug($title),
            'title' => $title,
            'excerpt' => $this->faker->text(rand(40, 100)),
            'content_raw' => $txt,
            'content_html' => $txt,
            'is_published' => $is_published,
            'published_at' =>   $this->faker->dateTimeBetween('-1 month', '-1 day'),
            'created_at' => $timestamp,
            'updated_at' => $timestamp
        ];
        return $data;

    }
}
