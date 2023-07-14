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

        return view("admin.user.create.create",compact("roles","role_name"));
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
            return back()->with("create_success","L'agent a été ajouter avec succès");
        }
        else{
            return back()->with("create_denied","L'ajout de l'agent a echoué (server error possible) : Actualiser la page svp");
        }
    }

    public function get_role() {
        $roles = Role::all();
        return view("admin.user.show.index",compact("roles"));
    }

    public function show_user($role_id){
        $role_users = RoleUser::where("role_id",$role_id)->where("index",true)->get();
        $users = [];
        foreach($role_users as $role_user){
            $users[] = User::find($role_user->user_id);
        }
        $role_name = Role::find($role_id)->name;
        $compter = count($users);
        return view("admin.user.show.show",compact("users","compter","role_name"));
    }

    public function delete_user() {
        
    }

    public function authaurize_user() {
        
    }

    public function get_user_data($user_id){
        $user = User::find($user_id);
        $role_user = RoleUser::where("user_id",$user_id)->where("index",true)->first();
        $role_name = Role::find($role_user->role_id)->name;
        return ["user"=>$user , "role"=>$role_name];
    }

    public function get_user_info($user_id){

        //Avoir le role de celui qui s'est connecté
        $log_user_id = auth()->user()->id;
        $response = new FonctionController();
        $role_id =  $response->userRoleId($log_user_id);

        //Avoir la liste des roles qui seront utilisés pour creer le user
        $response = new FonctionController();
        $roles =  $response->getPermiteRoles($role_id);
        $compter = count($roles);

        //recuperation du user
        $user = User::find($user_id);
        $role_id = RoleUser::where("user_id",$user_id)->where("index",true)->first()->role_id;
        return ["user"=>$user, "roles"=>$roles , "compter"=>$compter , "role_id"=>$role_id];
    }

    public function user_update_save(Request $request){
        $new = new FonctionController();
        $response = $new->updateUserSave($request->user_id,$request->first_name,$request->last_name,$request->phone,$request->email,$request->locality,$request->role_id);
        return $response;
    }

    public function get_role_to_create_user(){
        $roles = Role::all();
        $compter = count($roles);
        return ["roles"=>$roles , "compter"=>$compter];
    }

    public function user_create_save(Request $request){
        $new = new FonctionController();
        $response = $new->userCreateSave($request->first_name,$request->last_name,$request->phone,$request->email,$request->locality,$request->role_id);
        return $response;
    }
}
