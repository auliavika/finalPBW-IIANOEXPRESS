<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bus;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bus::create(['name' => 'HIACE 1', 'seat_count' => 20]);
        Bus::create(['name' => 'HIACE 2','seat_count' => 25]);
        Bus::create(['name' => 'HIACE 3','seat_count' => 25]);
        // Tambahkan data bus lainnya sesuai kebutuhan Anda
    }
}