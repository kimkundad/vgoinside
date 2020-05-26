<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $sql = file_get_contents(database_path() . '/seeds/users.sql');

       DB::statement($sql);
    }
}
