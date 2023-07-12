<?php

namespace Database\Seeders;

use App\Models\Structure;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StructureSeeder extends Seeder
{
    public function run(): void
    {
        $structure = [
            'name'      => "Eau Dounya",
            'email'     => "eau.dounia@gmail.com",
            'matricule' => "ED8012523",
            'locality'  => "sud-ouest de la grande gard de Gaoua",
            'web_link'  => "https://www.eaudounia.gv.bf",
            'city_id'=> 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        Structure::insert($structure);
    }
}
