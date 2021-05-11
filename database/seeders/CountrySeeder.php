<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        $countries = ([
            ['naziv'=>'Crna Gora'],
            ['naziv'=>'BiH'],
            ['naziv'=>'Srbija'],
            ['naziv'=>'Hrvatska'],
            ['naziv'=>'Makedonija']
        ]);

        foreach ($countries as $country) {
            Country::query()->create($country);

        }
    }
}
