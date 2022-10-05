<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->insert([
            'name' => 'Desktop',
        ]);

        \DB::table('categories')->insert([
            'name' => 'Laptop',
        ]);

        \DB::table('categories')->insert([
            'name' => 'Tablet',
        ]);
    }
}
