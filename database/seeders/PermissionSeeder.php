<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                "name"      =>"accès_à_entreprise",
            ],
            [
                "name"      =>"voir_entreprise_information",
            ],
            [
                "name"      =>"modifier_endreprise_information",
            ],
            [
                "name"      =>"voir_entreprise_roles",
            ],


            /* ...............agents......5-9........... */
            [
                "name"      => "accès_aux_agents",
            ],
            [
                "name"      => "voir_des_agents",
            ],
            [
                "name"      => "creer_des_agents",
            ],
            [
                "name"      => "modifier_des_agents",
            ],
            [
                "name"      => "supprimer_des_agents",
            ],


            /* ...............clients....10-15............. */
            [
                "name" => "accès_aux_clients",
            ],
            [
                "name" => "voir_des_clients",
            ],
            [
                "name" => "creer_des_clients",
            ],
            [
                "name" => "modifier_des_clients",
            ],
            [
                "name" => "bloquer_des_clients",
            ],
            [
                "name" => "supprimer_des_clients",
            ],


            /* ...............commandes........16-20......... */
            [
                "name" => "accès_aux_commandes",
            ],
            [
                "name" => "voir_des_commandes",
            ],
            [
                "name" => "creer_des_commandes",
            ],
            [
                "name" => "modifier_des_commandes",
            ],
            [
                "name" => "supprimer_des_commandes",
            ],

            /* ...............paiements.......21-25.......... */
            [
                "name" => "accès_aux_paiements",
            ],
            [
                "name" => "voir_des_paiements",
            ],
            [
                "name" => "creer_des_paiements",
            ],
            [
                "name" => "modifier_des_paiements",
            ],
            [
                "name" => "supprimer_des_paiements",
            ],


            /* autre */    
            [
                "name" => "voir_entreprise_telephone",
            ]

        ];
        Permission::insert($permissions);
    }
}
