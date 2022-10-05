<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquipmentUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i = 2; $i <= 51; $i++) {
          \DB::table('equipment_user')->insert([
              'user_id' => rand(1,5),
              'equipment_id' => $i
          ]);
      }
    }
}
