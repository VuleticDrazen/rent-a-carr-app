<?php

namespace Database\Seeders;

use App\Models\Equipment;
use Illuminate\Database\Seeder;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        $equipments = ([
            ['naziv'=>'GPS'],
            ['naziv'=>'Sjediste za bebe'],
            ['naziv'=>'Rezervni tocak'],
            ['naziv'=>'Punjac'],
            ['naziv'=>'Dizalica'],
            ['naziv'=>'Zeleni karton']
        ]);

        foreach ($equipments as $equipment) {
            Equipment::query()->create($equipment);

        }
    }

}
