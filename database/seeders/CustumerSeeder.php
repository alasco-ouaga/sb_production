<?php

namespace Database\Seeders;

use App\Models\Custumer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustumerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $commande = [
            [
                "structure_id"          =>1,
                "first_name"            =>"Ilboudo",
                "last_name"             =>"Alassane",
                "locality"              =>"Secteur 4",
                "matricule"             =>"EDG12536",
                "phone"                 =>"74721225",
                "delete"                =>false,
                "access"                =>true,
                'created_at'            => now(),
                'updated_at'            => now(),
            ],

            [
                "structure_id"          =>1,
                "first_name"            =>"Sawadogo",
                "last_name"             =>"mohamed",
                "locality"              =>"Secteur 4",
                "matricule"             =>"EDG12531",
                "phone"                 =>"74721222",
                "delete"                =>false,
                "access"                =>true,
                'created_at'            => now(),
                'updated_at'            => now(),
            ],

            [
                "structure_id"          =>1,
                "first_name"            =>"Kambou",
                "last_name"             =>"Sami",
                "locality"              =>"Secteur 1",
                "matricule"             =>"EDG12532",
                "phone"                 =>"74721227",
                "delete"                =>false,
                "access"                =>true,
                'created_at'            => now(),
                'updated_at'            => now(),
            ],

            [
                "structure_id"          =>1,
                "first_name"            =>"Kabore",
                "last_name"             =>"Fidele",
                "locality"              =>"Secteur 2",
                "matricule"             =>"EDG12538",
                "phone"                 =>"74721228",
                "delete"                =>false,
                "access"                =>true,
                'created_at'            => now(),
                'updated_at'            => now(),
            ]
        ];
        Custumer::insert($commande);
    }
}
