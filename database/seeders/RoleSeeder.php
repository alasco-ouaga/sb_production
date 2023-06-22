<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            [
                "name"      =>"administrateur",
            ],
            [
                "name"      =>"gestionnaire",
            ],
            [
                "name"      =>"secretaire",
            ]
        ];
        Role::insert($roles);
    }
}
