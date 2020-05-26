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
        DB::table('settings')->insert([
            [
              'phone1' => '0811007753',
              'facebook' => 'https://www.facebook.com/',
              'youtube' => 'https://www.youtube.com/',
              'address' => '20/426 Pruksa Ville',
            ]
        ]);
    }
}
