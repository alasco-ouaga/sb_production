<?php

namespace Database\Seeders;

use App\Models\Telephone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $telephone = [
            [
                "phone" => "75455370",
                "structure_id" => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "phone" => "78455370",
                "structure_id" => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "phone" => "70455370",
                "structure_id" => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        Telephone::insert($telephone);
    }
}
