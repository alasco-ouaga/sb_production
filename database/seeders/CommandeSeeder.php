<?php

namespace Database\Seeders;

use App\Models\Commande;
use Illuminate\Console\Command;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommandeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $commande = [
            [
                "custumer_id"           =>1,
                "produit_id"            =>1,
                "quantity"              =>20,
                "note"                  =>"Neant",
                "excess"                =>2,
                "code"                  =>1205450,
                "delete"                =>false,
                "pay"                   =>false,
                "completed"             =>false,
                "created_at"            =>now(),
                "updated_at"            =>now()
            ],
            [
                "custumer_id"           =>1,
                "produit_id"            =>1,
                "quantity"              =>10,
                "note"                  =>"Neant",
                "excess"                =>3,
                "code"                  =>1205452,
                "delete"                =>false,
                "pay"                   =>false,
                "completed"             =>false,
                "created_at"            =>now(),
                "updated_at"            =>now()
            ],
            [
                "custumer_id"           =>1,
                "produit_id"            =>1,
                "quantity"              =>50,
                "note"                  =>"Neant",
                "excess"                =>15,
                "code"                  =>1205453,
                "delete"                =>false,
                "pay"                   =>false,
                "completed"             =>false,
                "created_at"            =>now(),
                "updated_at"            =>now()
            ],
            [
                "custumer_id"           =>1,
                "produit_id"            =>1,
                "quantity"              =>60,
                "note"                  =>"Neant",
                "excess"                =>18,
                "code"                  =>1205454,
                "delete"                =>false,
                "pay"                   =>true,
                "completed"             =>true,
                "created_at"            =>now(),
                "updated_at"            =>now()
            ],
            [
                "custumer_id"           =>1,
                "produit_id"            =>1,
                "quantity"              =>60,
                "note"                  =>"Neant",
                "excess"                =>18,
                "code"                  =>1205455,
                "delete"                =>false,
                "pay"                   =>false,
                "completed"             =>false,
                "created_at"            =>now(),
                "updated_at"            =>now()
            ],
            [
                "custumer_id"           =>1,
                "produit_id"            =>1,
                "quantity"              =>10,
                "note"                  =>"Neant",
                "excess"                =>6,
                "code"                  =>1205456,
                "delete"                =>false,
                "pay"                   =>false,
                "completed"             =>false,
                "created_at"            =>now(),
                "updated_at"            =>now()
            ],
            [
                "custumer_id"           =>1,
                "produit_id"            =>1,
                "quantity"              =>30,
                "note"                  =>"Neant",
                "excess"                =>9,
                "code"                  =>1205457,
                "delete"                =>false,
                "pay"                   =>true,
                "completed"             =>true,
                "created_at"            =>now(),
                "updated_at"            =>now()
            ],
            [
                "custumer_id"           =>1,
                "produit_id"            =>1,
                "quantity"              =>20,
                "note"                  =>"Neant",
                "excess"                =>6,
                "code"                  =>1205459,
                "delete"                =>false,
                "pay"                   =>false,
                "completed"             =>false,
                "created_at"            =>now(),
                "updated_at"            =>now()
            ],
            [
                "custumer_id"           =>1,
                "produit_id"            =>1,
                "quantity"              =>30,
                "note"                  =>"Neant",
                "excess"                =>9,
                "code"                  =>1205410,
                "delete"                =>false,
                "pay"                   =>false,
                "completed"             =>false,
                "created_at"            =>now(),
                "updated_at"            =>now()
            ],
            [
                "custumer_id"           =>1,
                "produit_id"            =>1,
                "quantity"              =>80,
                "note"                  =>"Neant",
                "excess"                =>24,
                "code"                  =>1205412,
                "delete"                =>false,
                "pay"                   =>false,
                "completed"             =>false,
                "created_at"            =>now(),
                "updated_at"            =>now()
            ],
            [
                "custumer_id"           =>1,
                "produit_id"            =>1,
                "quantity"              =>70,
                "note"                  =>"Neant",
                "excess"                =>21,
                "code"                  =>1205413,
                "delete"                =>false,
                "pay"                   =>true,
                "completed"             =>true,
                "created_at"            =>now(),
                "updated_at"            =>now()
            ],
            [
                "custumer_id"           =>1,
                "produit_id"            =>1,
                "quantity"              =>100,
                "note"                  =>"Neant",
                "excess"                =>30,
                "code"                  =>1205414,
                "delete"                =>false,
                "pay"                   =>false,
                "completed"             =>false,
                "created_at"            =>now(),
                "updated_at"            =>now()
            ],
            [
                "custumer_id"           =>1,
                "produit_id"            =>1,
                "quantity"              =>100,
                "note"                  =>"Neant",
                "excess"                =>30,
                "code"                  =>1205415,
                "delete"                =>false,
                "pay"                   =>false,
                "completed"             =>false,
                "created_at"            =>now(),
                "updated_at"            =>now()
            ],
            [
                "custumer_id"           =>1,
                "produit_id"            =>1,
                "quantity"              =>90,
                "note"                  =>"Neant",
                "excess"                =>27,
                "code"                  =>1205416,
                "delete"                =>false,
                "pay"                   =>false,
                "completed"             =>false,
                "created_at"            =>now(),
                "updated_at"            =>now()
            ],
            [
                "custumer_id"           =>1,
                "produit_id"            =>1,
                "quantity"              =>200,
                "note"                  =>"Neant",
                "excess"                =>20,
                "code"                  =>1205417,
                "delete"                =>false,
                "pay"                   =>false,
                "completed"             =>false,
                "created_at"            =>now(),
                "updated_at"            =>now()
            ],
            [
                "custumer_id"           =>1,
                "produit_id"            =>1,
                "quantity"              =>70,
                "note"                  =>"Neant",
                "excess"                =>14,
                "code"                  =>1205419,
                "delete"                =>false,
                "pay"                   =>true,
                "completed"             =>true,
                "created_at"            =>now(),
                "updated_at"            =>now()
            ],
        ];
        Commande::insert($commande);
       
    }
}
