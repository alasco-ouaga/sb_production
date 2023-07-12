<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;

class FonctionController extends Controller
{
    public function create_matricule($min , $max) {
        $number = mt_rand($min,$max);
        $code = 'EDG'.$number;
        return $code;
    }

    public function userRoleName($user_id){
        $role_user = RoleUser::where("user_id",$user_id)->where("index",true)->first();
        $role = Role::find($role_user->role_id);
        $role =$role->name;
        return $role;
    }
}
