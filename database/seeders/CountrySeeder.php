<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $country = [
            "name" => "Burkina Faso",
            'created_at' => now(),
            'updated_at' => now(),
        ];
        Country::insert($country);
    }
}
