<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlogPost;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserTableSeeder::class);
         $this->call(BlogCategoriesTableSeeder::class);
         BlogPost::factory()->count(100)->create();
//        factory(App\Models\BlogPost::class, 100)->create();
    }
}
