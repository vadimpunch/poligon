<?php

use Illuminate\Database\Seeder;

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
              'password' => bcrypt(str_random(16))
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
