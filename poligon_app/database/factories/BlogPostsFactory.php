<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\BlogPost::class, function (Faker $faker) {
    $title = $faker->sentence(rand(3,8), true);
    $txt = $faker->realText(rand(1000, 4000));
    $is_published = rand(1, 5) > 1;
    $timestamp = $faker->dateTimeBetween('-2 month', '-1 month');

    $data = [
            'category_id' => rand(1, 11),
            'user_id' => rand(1, 5) == 5 ? 1 : 2,
            'slug' => \Illuminate\Support\Str::slug($title),
            'title' => $title,
            'excerpt' => $faker->text(rand(40, 100)),
            'content_raw' => $txt,
            'content_html' => $txt,
            'is_published' => $is_published,
            'published_at' =>  $faker->dateTimeBetween('-1 month', '-1 day'),
            'created_at' => $timestamp,
            'updated_at' => $timestamp
        ];
    return $data;
});
