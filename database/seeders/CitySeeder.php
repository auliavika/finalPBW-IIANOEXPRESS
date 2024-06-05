<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    public function run()
    {
        $cities = ['Banda Aceh', 'Langsa', 'Lhokseumawe', 'Sabang', 'Subulussalam'];

        foreach ($cities as $city) {
            City::create(['name' => $city]);
        }
    }
}
