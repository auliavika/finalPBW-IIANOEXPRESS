<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    public function run()
    {
        $cities = [
            'Banda Aceh',
            'Langsa',
            'Lhokseumawe',
            'Pidie',
            'Aceh Tengah',
            'Aceh Selatan',
            'Aceh Barat',
            'Aceh Barat Daya',
            'Aceh Singkil',
            'Bireuen',
            'Nagan Raya',
            'Aceh Tamiang',
            'Bener Meriah',
        ];

        foreach ($cities as $city) {
            City::create(['name' => $city]);
        }
    }
}
