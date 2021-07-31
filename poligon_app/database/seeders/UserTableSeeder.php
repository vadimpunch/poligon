<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $data = array(
          [
              'name' => 'Aвтор не известен',
              'email' => 'author_unknown@g.g',
              'password' => bcrypt(Str::random(16))
          ],
          [
              'name' => 'Aвтор',
              'email' => 'author1@g.g',
              'password' => bcrypt('123123')
          ]
      );

      DB::table('users')->insert($data);
    }
}
