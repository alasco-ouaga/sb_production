<?php

namespace Database\Seeders;

use App\Models\Produit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProduitSeeder extends Seeder
{
    public function run(): void
    {
        $produit = [
            [
                "name"          =>"paquer d'eau",
                "amount"        =>500,
                "created_at"    =>now(),
                "updated_at"    =>now()
            ]
        ];
        Produit::insert($produit);
    }
}
