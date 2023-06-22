<?php

namespace Database\Seeders;

use App\Models\RoleUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_users = [
            /* .........administrateur............  */
            [
                'user_id' => 1 ,
                'role_id'    => 1,
                'index' => true
            ],
            [
                'user_id' => 1 ,
                'role_id'    => 2,
                'index' => false,
            ],
            [
                'user_id' => 1 ,
                'role_id'    => 3,
                'index' => false,
            ],

            /* .........gestionnaire............  */
            [
                'user_id' => 2,
                'role_id' => 2,
                'index' => true,
            ],
            [
                'user_id' => 2,
                'role_id' => 3,
                'index' => false,
            ],

            /* .........secretaire............  */
            [
                'user_id' => 3,
                'role_id' => 3,
                'index' => true,
            ],
        ];
        RoleUser::insert($role_users);
    }
}
