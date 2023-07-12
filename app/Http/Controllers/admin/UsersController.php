<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FonctionControler;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\Structure;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function user_create_form(){
        $user_id = Auth::id();

        //Avoir le role de celui qui s'est connecté
        $response = new FonctionController();
        $role_name =  $response->userRoleName($user_id);

        //Avoir tous les roles
        $roles = Role::all();

        return view("admin.user.show",compact("roles","role_name"));
    }

    public function save_user_create(Request $request){

        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'phone'=>'required',
        ]);


        $structure_id = Structure::first()->id;

        //generer un matricule
        $min=5000;
        $max=9000;
        $controller = new FonctionController();
        $matricule = $controller->create_matricule($min , $max);

        do {
            $matricule = $controller->create_matricule($min , $max);
        } while (User::where("matricule",$matricule)->exists());

        //generer un mot de passe aleatoir 
        $password = Str::random(10, 'abcdef123456');

        //verification de l'email
        if($request->email != null){
            if( User::where("email",$request->email)->exists()){
                return back()->with("email_find_error","L'email est deja utilisé")->withInput();
            }
        }
       
        $user = [
            'structure_id'          => $structure_id,
            'first_name'            =>$request->first_name,
            'last_name'             =>$request->last_name,
            'phone'                 =>$request->phone,
            'email'                 =>$request->email,
            'matricule'             =>$matricule,
            'password'              => Hash::make($password),
        ];

        //Enregistrement du user
        if (User::insert($user)){
            //Enregistrement des roles du user
            $user = User::where("matricule",$matricule)->first();

            //recuper le role selectionner
            $index = $request->role_id;

            //Enregistre le role du user
            $role = [
                "role_id"=>$request->role_id,
                "user_id"=>$user->id,
                "index"=>true
            ];
            RoleUser::insert( $role);

            $compter =count(Role::all()) ;
            $index++;

            while($index < $compter){
                $role = [
                    "role_id"=>$request->role_id,
                    "user_id"=>$user->id,
                    "index"=>false
                ];
                RoleUser::insert($role);
                $index++;
            }
            return back()->with("create_success","L'ajout de l'agent a reussi avec succès");
        }
        else{
            return back()->with("create_denied","L'ajout de l'agent a echoué (server error) : Actualiser la page svp");
        }
    }
}
