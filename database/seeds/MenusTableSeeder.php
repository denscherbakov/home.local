<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            'name' => 'Главная',
            'link' => '/',
            'glyph' => 'home',
            'sort' => 1,
        ]);

        DB::table('menus')->insert([
            'name' => 'Личный кабинет',
            'link' => '/personal',
            'glyph' => 'briefcase',
            'sort' => 2,
        ]);

        DB::table('menus')->insert([
            'name' => 'Пользователи',
            'link' => '/users',
            'glyph' => 'user',
            'sort' => 4,
        ]);
    }
}
