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

        $new = new FonctionController();
        $response = $new->userCreateSave($request->first_name,$request->last_name,$request->phone,$request->email,$request->locality,$request->role_id);

        if($response != false){
            return back()->with("create_success","L'agent a été ajouté avec succès");
        }
        else{
            return back()->with("create_denied","L'ajout de l'agent a echoué (server error) : Actualiser la page svp");
        }
    }

    public function get_role() {
        $user_id = auth()->user()->id;
        $new = new FonctionController();
        $user_connect_role_id = $new->userRoleId($user_id);
        $roles = Role::all();
        return view("admin.user.show.index",compact("roles","user_connect_role_id"));
    }

    public function show_user($role_id){
        $role_users = RoleUser::where("role_id",$role_id)->where("index",true)->get();
        $users = [];
        foreach($role_users as $role_user){
            $user = User::find($role_user->user_id);
            if($user->delete == false){
                $users[] = $user;
            }
        }
        $role_name = Role::find($role_id)->name;
        $compter = count($users);
        return view("admin.user.show.show",compact("users","compter","role_name"));
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

    public function user_delete($user_id){
        if(User::where("id",$user_id)->update(["delete"=>true])){
            return back()->with("delete_success","Agent supprimer avec succès");
        }
        else{
            return back()->with("delete_denied","Echec : Attention suppression refusée");
        }
    }
    

    public function user_blocked($user_id){
        if(User::where("id",$user_id)->update(["access"=>false])){
            return back()->with("blocked_success","Agent suspendu avec succès");
        }
        else{
            return back()->with("blocked_denied","Echec : La suspension de l'agent a echoué");
        }
    }

    public function user_authaurize($user_id){
        if(User::where("id",$user_id)->update(["access"=>true])){
            return back()->with("authaurize_success","Agent authaurisé avec succès");
        }
        else{
            return back()->with("authaurize_denied","Echec : Authaurisation de l'agent a echoué");
        }
    }
}
