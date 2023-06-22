<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user = [
            [
                'first_name'        => "Ilboudo",
                'last_name'         => "Alassane",
                'email'             => "admin@gmail.com",
                'matricule'         => "ED80124",
                'phone'             => "74709404",
                'password'          => bcrypt('admin'),
                'locality'          =>"Bouroum-Bouroum",
                'structure_id'      => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => "Sawadogo",
                'last_name' => "Mohamed",
                'email' => "mohamed@gmail.com",
                'matricule' => "ED80125",
                'phone' => "75709404",
                'password' => bcrypt('password'),
                'locality' => "Gaoua",
                'structure_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => "Ouedraogo",
                'last_name' => "Rahime",
                'email' => "rahime@gmail.com",
                'matricule' => "ED80126",
                'phone' => "74709404",
                'password' => bcrypt('password'),
                'locality' => "Loropeni",
                'structure_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        User::insert($user);
    }
}
