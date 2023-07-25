<?php

namespace Database\Seeders;

use App\Models\Telephone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TelephoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $telephone = [
            [
                "structure_id"      =>1,
                "phone"             =>"75451236",
                'created_at'        => now(),
                'updated_at'        => now()
            ],
            [
                "structure_id"      =>1,
                "phone"             =>"70451236",
                'created_at'        => now(),
                'updated_at'        => now()

            ],
            [
                "structure_id"      =>1,
                "phone"             =>"78451236",
                'created_at'        => now(),
                'updated_at'        => now()
            ]
            ];
            Telephone::insert($telephone);
    }
}
