<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Custumer;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\Structure;
use App\Models\Commande;
use App\Models\User;
use Illuminate\Console\Command;
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

    public function commandeCreateMatricule($min , $max) {
        $matricule = mt_rand($min,$max);
        return $matricule;
    }

    //fonction pour obtenir le role d'un user
    public function userRoleName($user_id){
        $role_user = RoleUser::where("user_id",$user_id)->where("index",true)->first();
        $role = Role::find($role_user->role_id);
        $role = $role->name;
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
                "delete"                => false,
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

        if($response = true ){
            return $password;
        }
        else{
            return $response;
        }
    }

    //suprimer un agent
    public function deleteUser($user_id){
        if(User::where("id",$user_id)->update(["delete"=>true])){
            return true;
        }
        else{
            return false;
        }
    }

    /* ----------------les fonctions pour la partie concernants  les clients----------------- */
    /* ----------------les fonctions pour la partie concernants  les clients----------------- */

    //fonction pour enregistrer un client
    public function custumerCreateSave($first_name,$last_name,$phone,$locality)
    {
        $structure_id = Structure::first()->id;

        //generer un matricule
        $min = 5000 ;
        $max = 9000 + count(Custumer::all()) ;

        do {
            $matricule = $this->create_matricule($min , $max);
        }while (Custumer::where("matricule",$matricule)->exists());

        //verification de l'email
        if(Custumer::where("phone",$phone)->exists()){
            $response = false;
        }
        else{
            $custumer = [
                'structure_id'          => $structure_id,
                'first_name'            => $first_name,
                'last_name'             => $last_name,
                'phone'                 => $phone,
                'matricule'             => $matricule,
                'locality'              => $locality,
                'access'                => true,
                'delete'                => false,
                'created_at'            => now(),
                'updated_at'            => now(),
            ];
            if(Custumer::insert($custumer)){
                $response = true;
            }
        }
        return $response;
    }

    //fonction pour modifier un client
    public function custumerUpdateSave($custumer_id,$first_name,$last_name,$phone,$locality)
    {
        if(Custumer::where("phone",$phone)->where("id","!=",$custumer_id)->exists()){
            $response = false;
        }
        else{
            $update = Custumer::where("id",$custumer_id)->update([
                'first_name'            => $first_name,
                'last_name'             => $last_name,
                'phone'                 => $phone,
                'locality'              => $locality,
            ]);
            if($update){
                $response = true ;
            }
            else{
                $response = false ;
            }
        }
        return $response;
    }

    /* -----------------les fonctions pour la partie concernants  les commande----------------- */
    /* -----------------les fonctions pour la partie concernants  les commande----------------- */

    //Enegistrer une nouvelle commande 
    public function commandeCreateSave($custumer_id,$produit_id,$quantity,$susplus,$note) {
        
        $min = 1000000 ;
        $max = $min + count(Commande::all());
       
        do {
            $code = $this->commandeCreateMatricule($min,$max);
        }while (Commande::where("code",$code)->exists());

        $commande = [
            "custumer_id"           =>$custumer_id,
            "produit_id"            =>$produit_id,
            "quantity"              =>$quantity,
            "note"                  =>$note,
            "excess"                =>$susplus,
            "code"                  =>$code,
            "delete"                =>false,
            "pay"                   =>false,
            "completed"             =>false,
            "created_at"            =>now(),
            "updated_at"            =>now()
        ];

        if(Commande::insert($commande)){
            return true;
        }
        else{
            return false;
        }
    }

    //Modification d'une  commande 
    public function commandeUpdateSave($commande_id,$custumer_id,$quantity,$surplus,$note) {
        
        $update = Commande::where("id",$commande_id)->update([
                    "custumer_id"   =>$custumer_id,
                    "quantity"      =>$quantity,
                    "note"          =>$note,
                    "excess"        =>$surplus,
                    "updated_at"    =>now()
                ]);

        if($update){
            return true;
        }
        else{
            return false;
        }
    }

    //suprimer une commande 
    public function commandeDelete($commande_id)
    {
        $role_id = $this->userRoleId(auth()->user()->id);
        if($role_id == 3){
            return false ;
        }
        else{
            Commande::where("id",$commande_id)->update([
                "delete"    => true
            ]);
            return true;
        }
    }

    //Recuper les commandes payés
    public function commandePayementCompleted()
    {
        $commande = Commande::where("pay",false)
                    ->where("completed",false)
                    ->orderBy('id','desc')
                    ->paginate(10);

        if($commande){
            return $commande;
        }
    }

    //Recuper les commandes impayés
    public function commandeUnpaid(){

        $commande = Commande::where("delete",false)
                ->orderBy('id','desc')
                ->get();

        if($commande){
            return $commande;
        }
    }

}
