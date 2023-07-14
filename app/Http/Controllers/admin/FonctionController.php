<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\Structure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class FonctionController extends Controller
{
    public function create_matricule($min , $max) {
        $number = mt_rand($min,$max);
        $code = 'EDG'.$number;
        return $code;
    }

    //fonction pour obtenir le role d'un user
    public function userRoleName($user_id){
        $role_user = RoleUser::where("user_id",$user_id)->where("index",true)->first();
        $role = Role::find($role_user->role_id);
        $role =$role->name;
        return $role;
    }

    public function userRoleId($user_id){
        $role_user = RoleUser::where("user_id",$user_id)->where("index",true)->first();
        $role_id = Role::find($role_user->role_id)->id;
        return $role_id;
    }

    //fonction pour recuperer les roles permits pour creer un user
    public function getPermiteRoles($role_id){
        $role_name = Role::find($role_id)->name;
        $compter = count(Role::all());
        $index = $role_id;
        $roles = [];
        if($role_name != "administrateur"){
            while($index <= $compter){
                $roles[] = Role::find($index);
                $index++;
            }
        }
        else{
            $roles = Role::all();
        }
        return $roles;
    }


    //fonction pour modifier un utilisateur
    public function updateUserSave($user_id,$first_name,$last_name,$phone,$email,$locality,$role_id){

        $response = User::where("id",$user_id)->update([
            "first_name"    => $first_name,
            "last_name"     => $last_name,
            "phone"         => $phone,
            "email"         => $email,
            "locality"      => $locality,
            "access"        => true
        ]);

        if ($response){
            RoleUser::where("user_id",$user_id)->delete();
            $index = $role_id;

            $role = [
                "role_id"=>$role_id,
                "user_id"=>$user_id,
                "index"=>true
            ];
            RoleUser::insert( $role);

            $compter = count(Role::all()) ;
            $index++;

            while($index < $compter){
                $role = [
                    "role_id"=> $index,
                    "user_id"=>$user_id,
                    "index"=>false
                ];
                RoleUser::insert($role);
                $index++;
            }
            return true;
        }
        else{
            return false;
        }
    }

    public function roleUserInsert($user_id,$role_id){
        //recuper le role selectionner
        $index = $role_id;
            
        //Enregistre le role du user
        $role = [
            "role_id"=>$role_id,
            "user_id"=>$user_id,
            "index"=>true
        ];
        RoleUser::insert( $role);

        $compter =count(Role::all()) ;
        $index++;

        while($index <= $compter){
            $role = [
                "role_id"=>$role_id,
                "user_id"=>$user_id,
                "index"=>false
            ];
            RoleUser::insert($role);
            $index++;
        }

        return true;
    }

    //fonction pour enregistrer un users
    public function userCreateSave($first_name,$last_name,$phone,$email,$locality,$role_id)
    {
        $structure_id = Structure::first()->id;

        //generer un matricule
        $min=5000;
        $max=9000;
        #$controller = new FonctionController();
        #$matricule = $controller->create_matricule($min , $max);

        do {
            $matricule = $this->create_matricule($min , $max);
        } while (User::where("matricule",$matricule)->exists());

        //generer un mot de passe aleatoir 
        $password = Str::random(10, 'abcdef123456');
        $response= false;

        //verification de l'email
        if(User::where("email",$email)->exists()){
            return $response;
        }
        else{
            $user = [
                'structure_id'          => $structure_id,
                'first_name'            => $first_name,
                'last_name'             => $last_name,
                'phone'                 => $phone,
                'email'                 => $email,
                'matricule'             => $matricule,
                "locality"              => $locality,
                'password'              => Hash::make($password),
                "access"                => true,
            ];

            $insert =  User::insert($user);
    
            //Enregistrement du user
            if ($insert){
                $user_id = User::where("matricule",$matricule)->first()->id;
                $resultat = $this->roleUserInsert($user_id,$role_id);
                if($resultat){
                    $response = true;
                }
                else{
                    $response = false;
                } 
            }
            else{
                $response = false;
            }
        }
        return $response;
    }
}
