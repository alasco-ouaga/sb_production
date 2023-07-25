<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Commande;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CountrySeeder::class,
            CitySeeder::class,
            StructureSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            PermissionSeeder::class,
            PermissionRoleSeeder::class,
            RoleUserSeeder::class,
            ProduitSeeder::class,
            CustumerSeeder::class,
            CommandeSeeder::class,
            TelephoneSeeder::class,
        ]);
    }
}
