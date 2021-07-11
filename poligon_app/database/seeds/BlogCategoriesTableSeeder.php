<?php

use Illuminate\Database\Seeder;

class BlogCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = array();

        $cName = 'Без категории';
        $categories[] = array(
            'parent_id' => 0,
            'slug' => \Illuminate\Support\Str::slug($cName),
            'title' => $cName
        );

        for ($i=1; $i<=10; $i++) {
            $cName = 'Категория №' . $i;
            $categories[] = array(
                'parent_id' => $i > 4 ? rand(1, 4) : 1,
                'slug' => \Illuminate\Support\Str::slug($cName),
                'title' => $cName
            );
        }

        \DB::table('blog_categories')->insert($categories);
    }
}
